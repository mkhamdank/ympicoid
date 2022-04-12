<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Response;
use Hash;

class RawMaterialController extends Controller {

	public function __construct(){
		$this->db_connection = 'ympimis';
	}

	public function indexPoConfirmation(Request $request){
		$po = $request->get('po');

		return view('raw_material.po_confirmation',
			array('check_po' => $po));
	}

	public function indexPoDelivery(Request $request){
		$vendor_code = $request->get('vendor_code');
		$due_date = $request->get('due_date');

		return view('raw_material.po_reminder_delivery',
			array(
				'vendor_code' => $vendor_code,
				'due_date' => $due_date,
			));
	}

	public function fetchPo(Request $request) {
		$po_number = $request->get('po_number');

		$data = db::connection($this->db_connection)->table('material_plan_deliveries')
		->leftJoin('material_controls', 'material_controls.material_number', '=', 'material_plan_deliveries.material_number')
		->where('material_plan_deliveries.po_number', $po_number)
		->where('material_plan_deliveries.po_confirm', 0)
		->orderBy('item_line', 'ASC')
		->get();

		$response = array(
			'status' => true,
			'data' => $data
		);
		return Response::json($response);

	}

	public function fetchPoDelivery(Request $request) {
		$vendor_code = $request->get('vendor_code');
		$due_date = $request->get('due_date');

		$data = db::connection($this->db_connection)->table('material_plan_deliveries')
		->leftJoin('material_controls', 'material_controls.material_number', '=', 'material_plan_deliveries.material_number')
		->where('material_plan_deliveries.issue_date', '>=', '2022-01-01')
		->where('material_plan_deliveries.due_date', $due_date)
		->where('material_controls.vendor_code', $vendor_code)
		->whereNull('material_plan_deliveries.reminder_confirm_at')
		->orderBy('po_number', 'ASC')
		->orderBy('item_line', 'ASC')
		->get();

		$response = array(
			'status' => true,
			'data' => $data
		);
		return Response::json($response);

	}

	public function inputPoConfirmation(Request $request) {
		$po_number = $request->get('po_number');
		$plan = $request->get('plan_delivery');
		$additional = $request->get('additional_delivery');
		$now = date('Y-m-d H:i:s');

		$po = db::connection($this->db_connection)->table('material_plan_deliveries')
		->where('material_plan_deliveries.po_number', $po_number)
		->orderBy('item_line', 'ASC')
		->get();

		DB::beginTransaction();
		try {

			for ($i=0; $i < count($plan); $i++) { 
				if($plan[$i]['eta_date'] == $plan[$i]['due_date']){
					$status = 'ON TIME';
				}else if($plan[$i]['eta_date'] < $plan[$i]['due_date']){
					$status = 'DELAY';
				}else if($plan[$i]['eta_date'] > $plan[$i]['due_date']){
					$status = 'ACCELERATE';
				}

				$update = db::connection($this->db_connection)->table('material_plan_deliveries')
				->where('material_plan_deliveries.po_number', $po_number)
				->where('material_plan_deliveries.item_line', $plan[$i]['item_line'])
				->update([
					'po_confirm' => 1,
					'po_confirm_at' => $now,
					'due_date' => $plan[$i]['due_date'],
					'quantity' => $plan[$i]['quantity'],
					'status' => $status
				]);
			}


			for ($i=0; $i < count($additional); $i++) {
				$get_delivery = db::connection($this->db_connection)->table('material_plan_deliveries')
				->where('material_plan_deliveries.po_number', $po_number)
				->where('material_plan_deliveries.item_line', $additional[$i]['item_line'])
				->first();

				if($get_delivery->eta_date == $additional[$i]['due_date']){
					$status = 'ON TIME';
				}else if($get_delivery->eta_date < $additional[$i]['due_date']){
					$status = 'DELAY';
				}else if($get_delivery->eta_date > $additional[$i]['due_date']){
					$status = 'ACCELERATE';
				}

				$update = db::connection($this->db_connection)->table('material_plan_deliveries')
				->insert([
					'po_number' => $get_delivery->po_number,
					'item_line' => $get_delivery->item_line,
					'material_number' => $get_delivery->material_number,
					'po_send' => $get_delivery->po_send,
					'po_send_at' => $get_delivery->po_send_at,
					'po_confirm' => 1,
					'po_confirm_at' => $now,
					'po_reminder_at' => $get_delivery->po_reminder_at,
					'reminder_confirm_at' => $get_delivery->reminder_confirm_at,
					'issue_date' => $get_delivery->issue_date,
					'eta_date' => $get_delivery->eta_date,
					'due_date' => $additional[$i]['due_date'],
					'quantity' => $additional[$i]['quantity'],
					'status' => $status,
					'created_by' => 1,
					'created_at' => $now,
					'updated_at' => $now
				]);
			}

			$notification = $this->sendPoNotification($po_number);

			DB::commit();
			$response = array(
				'status' => true
			);
			return Response::json($response);

		} catch (Exception $e) {
			DB::rollback();

			$response = array(
				'status' => false,
				'message' => $e->getMessage(),
			);
			return Response::json($response);		
		}

	}

	public function inputPoDelivery(Request $request){

		$po_number = explode(',', $request->input('po_number'));
		$delivery = json_decode($request->input('delivery'));
		$due_date = $request->input('due_date');
		$count_files = $request->input('count_files');
		$upload_directory = 'files/raw_material/delivery_order';
		$now = date('Y-m-d H:i:s');


		$update = db::connection($this->db_connection)->table('material_plan_deliveries')
		->whereIn('material_plan_deliveries.po_number', $po_number)
		->where('material_plan_deliveries.due_date', $due_date)
		->get();

		try {
			DB::beginTransaction();

			//Save PO
			for ($i=0; $i < $count_files; $i++) { 
				$file = $request->file('file_data_' . $i);
				$file_original_name = $file->getClientOriginalName();

				$do_number = preg_replace('/[^A-Za-z0-9 _ .-]/', '', $request->input('do_number_' . $i));
				$extension = pathinfo($file_original_name, PATHINFO_EXTENSION);

				$filename = $do_number.'.'.$extension;

				$file->move($upload_directory, $filename);

				$data[] = $filename;
			}

			$file_saved = json_encode($data);	

			for ($i=0; $i < count($delivery); $i++) { 
				$dev = db::connection($this->db_connection)->table('material_plan_deliveries')
				->where('material_plan_deliveries.po_number', $delivery[$i]->po_number)
				->where('material_plan_deliveries.item_line', $delivery[$i]->item_line)
				->where('material_plan_deliveries.material_number', $delivery[$i]->material_number)
				->where('material_plan_deliveries.due_date', $delivery[$i]->eta_date)
				->first();

				$update = db::connection($this->db_connection)->table('material_plan_deliveries')
				->where('material_plan_deliveries.po_number', $delivery[$i]->po_number)
				->where('material_plan_deliveries.item_line', $delivery[$i]->item_line)
				->where('material_plan_deliveries.material_number', $delivery[$i]->material_number)
				->where('material_plan_deliveries.due_date', $delivery[$i]->eta_date)
				->update([
					'plan' => $dev->plan + $delivery[$i]->plan
				]);

			}

			$update = db::connection($this->db_connection)->table('material_plan_deliveries')
			->whereIn('material_plan_deliveries.po_number', $po_number)
			->where('material_plan_deliveries.due_date', $due_date)
			->update([
				'reminder_confirm_at' => $now,
				'do_number' => $file_saved,
			]);

			$notification = $this->sendDeliveryNotification($po_number, $due_date, $data);
			$invoice = $this->sendInvoice($po_number, $due_date, $data);

			DB::commit();
			$response = array(
				'status' => true
			);
			return Response::json($response);
			
		} catch (Exception $e) {
			DB::rollback();

			$response = array(
				'status' => false,
				'message' => $e->getMessage(),
			);
			return Response::json($response);
		}

	}

	public function sendInvoice($po_number, $due_date, $ship_doc_data){
		$delivery = db::connection($this->db_connection)
		->table('material_plan_deliveries')
		->leftJoin('material_controls', 'material_controls.material_number', '=', 'material_plan_deliveries.material_number')
		->whereIn('material_plan_deliveries.po_number', $po_number)
		->where('material_plan_deliveries.due_date', $due_date)
		->select(
			'material_plan_deliveries.po_number',
			'material_plan_deliveries.item_line',
			'material_controls.vendor_code',
			'material_controls.vendor_name',
			'material_plan_deliveries.material_number',
			'material_controls.material_description',
			'material_controls.category',
			'material_plan_deliveries.issue_date',
			'material_plan_deliveries.due_date',
			'material_plan_deliveries.plan'
		)	
		->get();

		if(count($delivery) > 0){

			$material = db::connection($this->db_connection)
			->table('material_controls')
			->leftJoin('users AS buyer_proc', 'buyer_proc.username', '=', 'material_controls.pic')
			->leftJoin('users AS control_proc', 'control_proc.username', '=', 'material_controls.control')
			->where('material_number', $delivery[0]->material_number)
			->select(
				'material_controls.vendor_code',
				'material_controls.vendor_name',
				db::raw('buyer_proc.email AS buyer_email'),
				db::raw('control_proc.email AS control_email')
			)
			->first();

			$attention = '';
			$to = [];
			if($delivery[0]->category == 'LOKAL'){
				array_push($to, 'rudianto@music.yamaha.com');
			}elseif ($delivery[0]->category == 'IMPORT') {
				array_push($to, 'telasati.murnomo.fitri@music.yamaha.com');		
				array_push($to, 'lailatul.chusnah@music.yamaha.com');		
			}

			$cc = [
				$material->buyer_email,
				$material->control_email
			];
			$bcc = [
				'muhammad.ikhlas@music.yamaha.com'
			];

			$ship_doc = [];
			for ($i=0; $i < count($ship_doc_data); $i++) { 
				array_push($ship_doc, explode('.', $ship_doc_data[$i])[0]);
			}

			$data = [
				'buyer' => $material->buyer_email,
				'control' => $material->control_email,
				'vendor_code' => $material->vendor_code,
				'vendor_name' => $material->vendor_name,
				'delivery' => $delivery,
				'ship_doc' => $ship_doc_data,
				'subject' => 'MIRAI NOTIF : SHIPPING DOCUMENT/INVOICE_ '. implode(', ', $ship_doc) .' _ '. $material->vendor_name
			];

			try {
				Mail::to($to)
				->cc($cc)
				->bcc($bcc)
				->send(new SendEmail($data, 'send_invoice'));

			} catch (Exception $e) {

				$insert = DB::table('error_logs')
				->insert([
					'error_message' => '[PO] : '. $e->getMessage(),
					'created_by' => 1,
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s')
				]);

			}

		}else{
			return false;
		}

	}

	public function sendDeliveryNotification($po_number, $due_date, $ship_doc_data){
		$exclude = [
			'Y31504',
			'Y10022',
			'Y81801'
		];

		$bcc = [
			'muhammad.ikhlas@music.yamaha.com'
		];

		$delivery = db::connection($this->db_connection)
		->table('material_plan_deliveries')
		->whereIn('po_number', $po_number)
		->where('due_date', $due_date)
		->first();


		$material = db::connection($this->db_connection)
		->table('material_controls')
		->leftJoin('users AS buyer_proc', 'buyer_proc.username', '=', 'material_controls.pic')
		->leftJoin('users AS control_proc', 'control_proc.username', '=', 'material_controls.control')
		->where('material_number', $delivery->material_number)
		->select(
			'material_controls.vendor_code',
			'material_controls.vendor_name',
			db::raw('buyer_proc.email AS buyer_email'),
			db::raw('control_proc.email AS control_email')
		)
		->first();

		$attention = '';
		$to = [];
		$cc = [
			$material->buyer_email,
			$material->control_email
		];
		
		$vendor_mails =db::connection($this->db_connection)
		->table('vendor_mails')
		->where('vendor_code', $material->vendor_code)
		->get();
		
		for ($j=0; $j < count($vendor_mails); $j++) { 
			if($vendor_mails[$j]->remark == 'to'){
				$attention = $vendor_mails[$j]->name;
				$to[] = $vendor_mails[$j]->email;
			}else{
				$cc[] = $vendor_mails[$j]->email;
			}
		}

        // If Yamaha Group
		if(in_array($material->vendor_code, $exclude)){
			$to = [
				$material->buyer_email,
				$material->control_email
			];
			$cc = [];                            
		}

		$ship_doc = [];
		for ($i=0; $i < count($ship_doc_data); $i++) { 
			array_push($ship_doc, explode('.', $ship_doc_data[$i])[0]);
		}

		
		$data = [
			'buyer' => $material->buyer_email,
			'control' => $material->control_email,
			'po_number' => implode(', ', $po_number),
			'due_date' => $due_date,
			'vendor_code' => $material->vendor_code,
			'vendor_name' => $material->vendor_name,
			'delivery' => $delivery,
			'subject' => 'MIRAI NOTIF : SHIPPING DOCUMENT/INVOICE '. implode(',', $ship_doc) .'_'. $material->vendor_name
		];

		try {
			Mail::to($to)
			->cc($cc)
			->bcc($bcc)
			->send(new SendEmail($data, 'send_reminder_notification'));

		} catch (Exception $e) {

			$insert = DB::table('error_logs')
			->insert([
				'error_message' => '[PO] : '. $e->getMessage(),
				'created_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			]);

		}

	}

	public function sendPoNotification($po_number) {

		$exclude = [
			'Y31504',
			'Y10022',
			'Y81801'
		];

		$bcc = [
			'muhammad.ikhlas@music.yamaha.com'
		];

		$delivery = db::connection($this->db_connection)
		->table('material_plan_deliveries')
		->where('po_number', $po_number)
		->first();


		$notes = db::connection($this->db_connection)
		->table('material_plan_deliveries')
		->leftJoin('material_controls', 'material_controls.material_number', '=', 'material_plan_deliveries.material_number')
		->where('po_number', $po_number)
		->whereNotNull('note')
		->select(
			'material_plan_deliveries.*',
			'material_controls.material_description'
		)
		->get();

		$material = db::connection($this->db_connection)
		->table('material_plan_deliveries')
		->leftJoin('material_controls', 'material_controls.material_number', '=', 'material_plan_deliveries.material_number')
		->leftJoin('users AS buyer_proc', 'buyer_proc.username', '=', 'material_controls.pic')
		->leftJoin('users AS control_proc', 'control_proc.username', '=', 'material_controls.control')
		->where('po_number', $po_number)
		->select(
			'material_controls.vendor_code',
			'material_controls.vendor_name',
			db::raw('buyer_proc.email AS buyer_email'),
			db::raw('control_proc.email AS control_email')
		)
		->first();

		$attention = '';
		$to = [];
		$cc = [
			$material->buyer_email,
			$material->control_email
		];
		
		$vendor_mails =db::connection($this->db_connection)
		->table('vendor_mails')
		->where('vendor_code', $material->vendor_code)
		->get();
		
		for ($j=0; $j < count($vendor_mails); $j++) { 
			if($vendor_mails[$j]->remark == 'to'){
				$attention = $vendor_mails[$j]->name;
				$to[] = $vendor_mails[$j]->email;
			}else{
				$cc[] = $vendor_mails[$j]->email;
			}
		}

        // If Yamaha Group
		if(in_array($material->vendor_code, $exclude)){
			$to = [
				$material->buyer_email,
				$material->control_email
			];
			$cc = [];                            
		}

		$data = [
			'buyer' => $material->buyer_email,
			'control' => $material->control_email,
			'po_number' => $po_number,    
			'vendor_code' => $material->vendor_code,
			'vendor_name' => $material->vendor_name,
			'subject' => 'PO CONFIRMATION REPORT : '. $po_number . '_' . $material->vendor_name,
			'delivery' => $delivery,
			'notes' => $notes
		];

		try {
			Mail::to($to)
			->cc($cc)
			->bcc($bcc)
			->send(new SendEmail($data, 'send_po_notification'));

		} catch (Exception $e) {

			$insert = DB::table('error_logs')
			->insert([
				'error_message' => '[PO] : '. $e->getMessage(),
				'created_by' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			]);

		}

	}


}
