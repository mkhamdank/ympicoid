<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Response;
use Hash;


class StocktakingController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}


	public function indexSurvey(){

		$question = db::connection('ympimis_2')
		->select("SELECT DISTINCT question, image FROM stocktaking_survey_questions
			WHERE remark = 'stoctaking_survey'
			AND deleted_at IS NULL");

		return view('stocktaking.survey', array(
			'question' => $question
		));
		
	}

	public function fetchSurvey(Request $request) {

		$month_text = array (
			1 => 'Januari',
			2 => 'Februari',
			3 => 'Maret',
			4 => 'April',
			5 => 'Mei',
			6 => 'Juni',
			7 => 'Juli',
			8 => 'Agustus',
			9 => 'September',
			10 => 'Oktober',
			11 => 'November',
			12 => 'Desember'
		);

		$day_text = array (
			0 => 'Minggu',
			1 => 'Senin',
			2 => 'Selasa',
			3 => 'Rabu',
			4 => 'Kamis',
			5 => 'Jumat',
			6 => 'Sabtu'
		);

		$survey_date = date('Y-m-') . '20';
		$survey_date =   $day_text[ (int) date('w', strtotime($survey_date))] .', '. date('j', strtotime($survey_date)) . ' ' . $month_text[ (int) date('n', strtotime($survey_date))] . ' ' . date('Y', strtotime($survey_date));

		$emp = db::connection('ympimis')
		->table('employee_syncs')
		->where('employee_id', $request->get('employee_id'))
		->first();

		$cek_stocktaking_survey = db::connection('ympimis_2')
		->table('stocktaking_surveys')
		->where('employee_id', $request->get('employee_id'))
		->get();

		$response = array(
			'status' => true,
			'cek_stocktaking_survey' => $cek_stocktaking_survey,
			'date' => date('j'),
			'survey_date' => $survey_date,
			'employee' => $emp
		);
		return Response::json($response);

	}

	public function inputSurvey(Request $request) {
		try {

			$now = date('Y-m-d H:i:s');
			$calendar = db::connection('ympimis')
			->table('stocktaking_calendars')
			->where('status', 'planned')
			->first();

			$emp = db::connection('ympimis')
			->table('employee_syncs')
			->where('employee_id', $request->get('employee_id'))
			->first();

			$master_question = db::connection('ympimis_2')
			->select("SELECT * FROM stocktaking_survey_questions
				WHERE remark = 'stoctaking_survey'
				AND deleted_at IS NULL");

			$count_question = $request->get('count_question');
			$question = $request->get('question');
			$answer = $request->get('answer');

			$poin = [];
			$score = 0;
			$remark = "";

			for ($i=0; $i < $count_question; $i++) { 
				for ($j=0; $j < count($master_question); $j++) { 
					if( ($question[$i] == $master_question[$j]->question) && ($answer[$i] == $master_question[$j]->answer) ){
						array_push( $poin, $master_question[$j]->score );
						$score += $master_question[$j]->score;
					}
				}
			}

			if($score <= 25){
				$remark = "TIDAK MENGERTI";
			}

			if($score > 25 && $score <= 50){
				$remark = "KURANG";
			}

			if($score > 50 && $score <= 75){
				$remark = "CUKUP";
			}

			if($score > 75){
				$remark = "MENGERTI";
			}

			$insert = db::connection('ympimis_2')
			->table('stocktaking_surveys')
			->insert([
				'survey_code' => 'stoctaking_survey',
				'date' => $calendar->date,
				'employee_id' => $emp->employee_id,
				'name' => $emp->name,
				'department' => $emp->department,
				'question' => json_encode($question),
				'answer' => json_encode($answer),
				'poin' => json_encode($poin),
				'score' => $score,
				'remark' => $remark,
				'created_at' => $now,
				'updated_at' => $now
			]);           

			$response = array(
				'status' => true,
				'message' => 'Data Survey Berhasil Disimpan',
				'now' => $now
			);
			return Response::json($response);

		} catch (QueryException $e){
			$error_code = $e->errorInfo[1];
			if($error_code == 1062){
				$response = array(
					'status' => false,
					'message' => 'Anda Sudah Mengisi Survey Stocktaking Untuk Bulan ini'
				);
				return Response::json($response);
			}else{
				$response = array(
					'status' => false,
					'message' => $e->getMessage()
				);
				return Response::json($response);
			}
		}
	}


}
