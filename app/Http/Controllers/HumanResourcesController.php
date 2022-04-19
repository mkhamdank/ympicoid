<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\User;
use Response;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use App\Pkb;
use App\PkbPeriode;
use App\PkbQuestion;
use App\KodeEtikQuestion;
use App\KodeEtikAnswer;
use App\VaksinRegisterNew;
use App\VaksinSurvey;

class HumanResourcesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function indexVaksin(){
		$empsync = DB::select('select * from employee_syncs where employee_id = "'.Auth::user()->username.'" and end_date is null limit 1');

		return view('human_resources.vaksin.index', array(
			'tgl' => date('Y-m-d H:i:s'),
			'empsync' => $empsync,
			'page' => 'Vaksin'
		));
	}

	public function checkEmpVaksin(Request $request)
	{
		try {
			$vaksin = VaksinSurvey::where('employee_id',$request->get('employee_id'))->first();
			$vaksin_3 = VaksinRegisterNew::where('employee_id',$request->get('employee_id'))->where('remark','vaksin_3')->first();
			$vaksin_3_data = null;
			if (count($vaksin) > 0) {
				$vaksin_3_data = $vaksin->vaksin_3;
			}
			$response = array(
				'status' => true,
				'vaksin' => $vaksin,
				'vaksin_3' => $vaksin_3,
				'vaksin_3_data' => $vaksin_3_data,
				'date_vaksin_regis' => '2022-04-28 23:59:59'
			);
			return Response::json($response);
		} catch (\Exception $e) {
			$response = array(
				'status' => false,
				'message' => $e->getMessage()
			);
			return Response::json($response);
		}
	}

	public function inputVaksin(Request $request)
	{
		try {
			$forms = VaksinSurvey::updateOrCreate(
				[
					'employee_id' => $request->get('employee_id')
				],
				[
					'tanggal' => date('Y-m-d'),
					'employee_id' => $request->get('employee_id'),
					'name' => $request->get('name'),
					'department' => $request->get('department'),
					'vaksin_1' => $request->get('vaksin_1'),
					'vaksin_2' => $request->get('vaksin_2'),
					'vaksin_3' => $request->get('vaksin_3'),
					// 'call_vaksin_3' => $request->get('call_vaksin_3'),
					'jenis_vaksin' => $request->get('jenis_vaksin'),
					'jenis_vaksin_3' => $request->get('jenis_vaksin_3'),
					'created_by' => 1,
				]
			);

			$response = array(
				'status' => true,
			);
			return Response::json($response);
		} catch (\Exception $e) {
			$response = array(
				'status' => false,
				'message' => $e->getMessage()
			);
			return Response::json($response);
		}
	}

	public function inputVaksinRegistration(Request $request)
	{
		try {
			$forms = VaksinRegisterNew::create([
				'tanggal' => date('Y-m-d'),
				'employee_id' => $request->get('employee_id'),
				'name' => $request->get('name'),
				'department' => $request->get('department'),
				'birth_place' => $request->get('birth_place'),
				'birth_date' => $request->get('birth_date'),
				'card_id' => $request->get('ktp'),
				'address' => $request->get('address'),
				'no_hp' => $request->get('no_hp'),
				'jumlah_keluarga' => 0,
				// 'keluarga_hubungan' => $keluarga_hubungan,
				// 'keluarga_name' => $keluarga_name,
				// 'keluarga_ktp' => $keluarga_ktp,
				// 'keluarga_birth_place' => $keluarga_birth_place,
				// 'keluarga_birth_date' => $keluarga_birth_date,
				// 'keluarga_address' => $keluarga_address,
				// 'keluarga_no_hp' => $keluarga_phone,
				'call_vaksin_3' => $request->get('call_vaksin_3'),
				'remark' => 'vaksin_3',
				'created_by' => 1,
			]);

			$forms2 = VaksinSurvey::where('employee_id',$request->get('employee_id'))->update(
				[
					'call_vaksin_3' => $request->get('call_vaksin_3'),
				]
			);

			$response = array(
				'status' => true,
			);
			return Response::json($response);
		} catch (\Exception $e) {
			$response = array(
				'status' => false,
				'message' => $e->getMessage()
			);
			return Response::json($response);
		}
	}

	public function indexPkb()
	{
		$periode = PkbPeriode::where('status','Active')->first();
		$pkb_question = PkbQuestion::where('periode',$periode->periode)->get();

		$cek_pkb = Pkb::where('periode',$periode->periode)->where('employee_id',Auth::user()->username)->first();

		$empsync = DB::select('select * from employee_syncs where employee_id = "'.Auth::user()->username.'" and end_date is null limit 1');

		return view('human_resources.pkb.index', array(
			'pkb_question' => $pkb_question,
			'tgl' => date('Y-m-d H:i:s'),
			'periode' => $periode->periode,
			'cek_pkb' => $cek_pkb,
			'empsync' => $empsync,
			'page' => 'PKB'
		));
	}

	public function inputPkb(Request $request)
	{
		try {
			$periode = $request->get('periode');
			$employee_id = $request->get('employee_id');
			$persetujuan = $request->get('persetujuan');
			$question = $request->get('question');
			$answer = $request->get('answer');

			$pkbcheck = Pkb::where('periode',$periode)->where('employee_id',$employee_id)->first();

			if (count($pkbcheck) > 0) {
				$response = array(
					'status' => false,
					'datas' => 'Anda sudah pernah menyetujui PKB Periode'.$periode
				);
				return Response::json($response);	
			}else{
				$pkb = Pkb::create([
					'periode' => $periode,
					'employee_id' => $employee_id,
					'agreement' => $persetujuan,
					'question' => join('_',$question),
					'answer' => join('_',$answer),
					'created_by' => 1,
				]);
				$pkb->save();
				$response = array(
					'status' => true,
					'datas' => 'Berhasil Menyetujui',
					'datetime' => date('Y-m-d H:i:s')
				);
				return Response::json($response);
			}
		} catch (\Exception $e) {
			$response = array(
				'status' => false,
				'datas' => $e->getMessage()
			);
			return Response::json($response);
		}
	}

	public function indexKodeEtik()
	{
		$kode_etik_question = KodeEtikQuestion::get();
		$cek_kode_etik = KodeEtikAnswer::where('employee_id',Auth::user()->username)->first();
		$empsync = DB::select('select * from employee_syncs where employee_id = "'.Auth::user()->username.'" and end_date is null limit 1');

		return view('human_resources.kode_etik.index', array(
			'kode_etik_question' => $kode_etik_question,
			'tgl' => date('Y-m-d H:i:s'),
			'cek_kode_etik' => $cek_kode_etik,
			'empsync' => $empsync,
			'page' => 'Kode Etik'
		));
	}


	public function inputKodeEtik(Request $request)
	{
		try {
			$employee_id = $request->get('employee_id');
			$question = $request->get('question');
			$answer = $request->get('answer');
			$kodeEtikcheck = KodeEtikAnswer::where('employee_id',$employee_id)->first();

			if (count($kodeEtikcheck) > 0) {
				$response = array(
					'status' => false,
					'datas' => 'Anda sudah pernah Melakukan Post Test Kode Etik Kepatuhan'
				);
				return Response::json($response);	
			}else{
				$kode_etik = KodeEtikAnswer::create([
					'employee_id' => $employee_id,
					'question' => join('_',$question),
					'answer' => join('_',$answer),
					'created_by' => 1,
				]);
				$kode_etik->save();
				$response = array(
					'status' => true,
					'datas' => 'Berhasil Disimpan',
					'datetime' => date('Y-m-d H:i:s')

				);
				return Response::json($response);
			}
		} catch (\Exception $e) {
			$response = array(
				'status' => false,
				'datas' => $e->getMessage()
			);
			return Response::json($response);
		}
	}

}
