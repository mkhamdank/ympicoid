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
			array(
				'check_po' => $po
			)
		);
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

	public function inputPoConfirmation(Request $request) {
		$po_number = $request->get('po_number');
		$data = $request->get('data');
		$now = date('Y-m-d H:i:s');

		$po = db::connection($this->db_connection)->table('material_plan_deliveries')
		->where('material_plan_deliveries.po_number', $po_number)
		->orderBy('item_line', 'ASC')
		->get();


		DB::beginTransaction();

		try {
			for ($i=0; $i < count($po); $i++) { 
				for ($j=0; $j < count($data); $j++) { 
					if($po[$i]->item_line == $data[$j]['item_line']){
						$update = db::connection($this->db_connection)->table('material_plan_deliveries')
						->where('material_plan_deliveries.po_number', $po_number)
						->where('material_plan_deliveries.item_line', $data[$j]['item_line'])
						->update([
							'po_confirm' => 1,
							'po_confirm_at' => $now,
							'note' => $data[$j]['note'],
						]);

						break;
					}	
				}
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
