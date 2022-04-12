<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Response;
use App\User;
use App\QuizLog;
use Hash;
use App\Employee;
use App\EmergencySurvey;
use App\SurveyLog;
use App\GuestLog;
use App\VendorLog;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class VaksinController extends Controller
{
    public function indexVaksin()
    {
    	return view('vaksin');
    }

    public function get_employee( Request $request)
	{
		try {

			$emp = DB::SELECT("SELECT
			    employee_id,
			    name,
			    department,
                password
			FROM
			    `employees` 
			WHERE
		    `employee_id` = '".$request->get('employee_id')."'
		    AND `end_date` IS NULL");

		    if (count($emp) > 0) {
				$response = array(
		            'status' => true,
		            'message' => 'Success',
		            'employee' => $emp
		        );
		        return Response::json($response);
		    }else{
		    	$response = array(
		            'status' => false,
		            'message' => 'Failed',
		            'employee' => ''
		        );
		        return Response::json($response);
		    }


		} 	
			catch (\Exception $e) {
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

        	$cek_input = db::select("select * from emergency_surveys 
        		where employee_id='".$request->get('employee_id')."' 
        		and keterangan = '".$request->get('keterangan')."'");

        	if (count($cek_input) > 0) {
        		$response = array(
                   'status' => false,
                   'datas' => 'Anda Sudah Mengisi Form Survey Ini'
             	);
             	return Response::json($response);
        	}

        	else{
	            $forms = EmergencySurvey::create([
	               'tanggal' => date('Y-m-d'),
	               'employee_id' => $request->get('employee_id'),
	               'name' => $request->get('name'),
	               'department' => $request->get('department'),
	               'jawaban' => $request->get('jawaban'),
	               'keterangan' => $request->get('keterangan'),
	               'nama' => $request->get('nama'),
	               'hubungan' => $request->get('hubungan'),
	              ]);

	            $forms->save();

		        $response = array(
		            'status' => true,
		            'datas' => 'Berhasil Input Data',
		        );
		        return Response::json($response);
        	}


         } catch (QueryException $e){
             $error_code = $e->errorInfo[1];
            	if($error_code == 1062){
              		$response = array(
	                   'status' => false,
	                   'datas' => 'Anda Sudah Mengisi Laporan Untuk Hari ini'
	             	);
	             	return Response::json($response);
            	}
            	else{
              		$response = array(
	                   'status' => false,
	                   'datas' => $e->getMessage()
	             	);
	             	return Response::json($response);
            	}
         }
	}
}
