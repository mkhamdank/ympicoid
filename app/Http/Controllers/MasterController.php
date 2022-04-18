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
use App\QuizLog;
use App\Employee;
use App\Pkb;
use App\EmergencySurvey;
use App\EmployeeCommunication;
use App\SurveyLog;
use App\KodeEtikAnswer;

class MasterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function laporan_kesehatan(){

        $title = 'Laporan Kesehatan Karyawan';
        $title_jp = '';

        $empsync = DB::select('select * from employee_syncs where employee_id = "'.Auth::user()->username.'" and end_date is null limit 1');

        return view('laporan_kesehatan', array(
            'title' => $title,
            'title_jp' => $title_jp,
            'empsync' => $empsync,
        ))->with('page', 'Laporan Kesehatan');
    }

    public function input_laporan_kesehatan(Request $request)
    {
      try {
        $quiz = $request->get('question');
        $answer = $request->get('answer');

        $jumlah_pertanyaan = $request->get('jumlah_pertanyaan');

        for ($i=0; $i < $jumlah_pertanyaan+1; $i++) { 
          $forms = QuizLog::create([
            'question_code' => 'corona-2',
            'answer_date' => date('Y-m-d'),
            'employee_id' => $request->get('employee_id'),
            'name' => $request->get('name'),
            'department' => $request->get('department'),
            'question' => $quiz[$i],
            'answer' => $answer[$i],
            // 'latitude' => $request->get('latitude'),
            // 'longitude' => $request->get('longitude'),
            // 'ip_address' => $ipaddress,
          ]);

          $forms->save();                  
        }
        $response = array(
          'status' => true,
          'message' => 'Sukses Input Laporan Kesehatan'
        );
        return Response::json($response);
      } catch (\Exception $e) {
        $response = array(
          'status' => false,
          'message' => $e->getMessage().' on Line '.$e->getLine(),
        );
        return Response::json($response);
      }
    }

    public function survey_covid(){
        $question = db::select("select distinct pertanyaan from health_surveys where remark = 'covid' and deleted_at is null");
        $empsync = DB::select('select * from employee_syncs where employee_id = "'.Auth::user()->username.'" and end_date is null LIMIT 1');

        return view('survey_covid', array(
            'question' => $question,
            'empsync' => $empsync,
            'tgl' => date('Y-m-d H:i:s')
        ))->with('page', 'Survey Covid');
    }

    public function input_survey_covid(Request $request)
    {
        try {
            $quiz = $request->get('question');
            $answer = $request->get('answer');
            $jumlah_pertanyaan = $request->get('jumlah_pertanyaan_survey');

            $nilai = [];
            $total_nilai = 0;
            $keterangan = "";

            for ($i=0; $i < $jumlah_pertanyaan; $i++) { 
                $point = db::select("SELECT * FROM health_surveys where pertanyaan = '".$quiz[$i]."' and jawaban = '".$answer[$i]."' ");

                foreach ($point as $poin) {
                    $ni = $poin->nilai;
                    array_push($nilai,$ni);
                    $total_nilai += $ni;
                }
            }
            if ($total_nilai <= 35) {
                $keterangan = "Rendah";
            }
            else if ($total_nilai > 35 && $total_nilai <= 80){
                $keterangan = "Sedang";
            }
            else if ($total_nilai > 80){
                $keterangan = "Tinggi";
            }

            $forms = SurveyLog::create([
                'survey_code' => 'covid',
                'tanggal' => date('Y-m-d'),
                'employee_id' => $request->get('employee_id'),
                'name' => $request->get('name'),
                'department' => $request->get('department'),
                'question' => json_encode($quiz),
                'answer' => json_encode($answer),
                'poin' => json_encode($nilai),
                'total' => $total_nilai,
                'keterangan' => $keterangan
            ]);

            $forms->save();                  

            $response = array(
                'status' => true,
                'datas' => 'Berhasil Input Data',
                'tanggal' => date('Y-m-d H:i:s')
            );
            return Response::json($response);

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

    public function checkData(Request $request)
    {
        try {
            $cek_survey = DB::SELECT('SELECT DISTINCT employee_id,total,created_at from survey_logs where employee_id = "'.$request->get('employee_id').'"');

            $cek_pkb = Pkb::where('periode',$request->get('periode'))->where('employee_id',$request->get('employee_id'))->first();
            $cek_kode_etik = KodeEtikAnswer::where('employee_id',$request->get('employee_id'))->first();
            
            // $cek_stocktaking_survey = db::connection('ympimis_2')
            // ->select("SELECT * FROM stocktaking_surveys
            //     WHERE employee_id = '".$request->get('employee_id'). "'");

            // $cek_stocktaking_emp = db::connection('ympimis')
            // ->table('employee_syncs')
            // ->where('employee_id' , $request->get('employee_id') )
            // ->first();

            $response = array(
                'status' => true,
                'cek_survey' => $cek_survey,
                // 'cek_stocktaking_survey' => $cek_stocktaking_survey,
                // 'cek_stocktaking_emp' => $cek_stocktaking_emp,
                'cek_pkb' => $cek_pkb,
                'cek_kode_etik' => $cek_kode_etik
            );
            return Response::json($response);
        } catch (QueryException $e) {
            $response = array(
                'status' => false,
                'message' => $e->getMessage()
            );
            return Response::json($response);
        }
    }

    public function generateUser()
    {
        try {
            $emp = db::select("select employee_id, name, password from employees");
            foreach ($emp as $e) {
              User::create([
                  'name' => ucwords($e->name),
                  'email' => strtoupper($e->employee_id).'@gmail.com',
                  'password' => bcrypt($e->password),
                  'username' => strtoupper($e->employee_id),
                  'role_code' => 'user',
                  'avatar' => strtoupper($e->employee_id).'.jpg',
                  'created_by' => '1'
              ]);
            }

            return 'SUDAH';
        } 
        catch (\Exception $e) {
            return $e->getMessage().' on Line '.$e->getLine();
        }
    }
    public function emergency(){

        $title = 'Kuisioner Emergency';
        $title_jp = '';

        $empsync = DB::select('select * from employee_syncs where employee_id = "'.Auth::user()->username.'" and end_date is null LIMIT 1');

        return view('emergency', array(
            'title' => $title,
            'title_jp' => $title_jp,
            'empsync' => $empsync
        ))->with('page', 'Kuisioner Emergency');
    }

    public function postEmergency(Request $request)
    {
        try {

            $cek_input = db::select("select * from emergency_surveys where employee_id='".$request->get('employee_id')."' 
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

    public function DataKomunikasi(){

        $title = 'Data Komunikasi Lebaran';
        $title_jp = '';

        $empsync = DB::select('select * from employee_syncs where employee_id = "'.Auth::user()->username.'" and end_date is null LIMIT 1');

        $communication = DB::select('select * from employee_communications where department = "'.$empsync[0]->department.'"');
        // $employee = DB::select('select * from employee_communications where employee_id = "'.Auth::user()->username.'" limit 1');
        $employee = EmployeeCommunication::where('employee_id',Auth::user()->username)->first();

        return view('data_komunikasi', array(
            'title' => $title,
            'title_jp' => $title_jp,
            'empsync' => $empsync,
            'communication' => $communication,
            'employee' => $employee,
        ))->with('page', 'Data Komunikasi');
    }

    public function postDataKomunikasi(Request $request)
    {
        try {

            // $cek_input = db::select("select * from employee_communications where employee_id='".$request->get('employee_id')."'");

            // if (count($cek_input) > 0) {
            //     $response = array(
            //         'status' => false,
            //         'datas' => 'Anda Sudah Mengisi Form Survey Ini'
            //     );
            //     return Response::json($response);
            // }

            // else{



                // 'tanggal' => date('Y-m-d'),
                // 'employee_id' => $request->get('employee_id'),
                // 'name' => $request->get('name'),
                // 'department' => $request->get('department'),
                // 'no_hp' => $request->get('no_hp'),
                // 'no_telp' => $request->get('no_telp'),
                // 'no_alternatif' => $request->get('no_alternatif'),
                // 'keterangan' => $request->get('hubungan'),
                // 'rencana_mudik' => $request->get('rencana_mudik'),
                // 'tanggal_berangkat' => $request->get('tanggal_berangkat'),
                // 'tanggal_kembali' => $request->get('tanggal_kembali')
        

            $forms = EmployeeCommunication::firstOrNew(['employee_id' => $request->get('employee_id')]);
            $forms->tanggal = date('Y-m-d');
            $forms->name = $request->get('name');
            $forms->department = $request->get('department');
            $forms->no_hp = $request->get('no_hp');
            $forms->no_telp = $request->get('no_telp');
            $forms->no_alternatif = $request->get('no_alternatif');
            $forms->keterangan = $request->get('hubungan');
            $forms->rencana_mudik = $request->get('rencana_mudik');
            $forms->tanggal_berangkat = $request->get('tanggal_berangkat');
            $forms->tanggal_kembali = $request->get('tanggal_kembali');
            $forms->created_by = Auth::id();

            $forms->save();

            $response = array(
                'status' => true,
                'datas' => 'Berhasil Input Data',
            );
            return Response::json($response);
            // }

        } catch (QueryException $e){
            $error_code = $e->errorInfo[1];
            if($error_code == 1062){
                $response = array(
                    'status' => false,
                    'datas' => 'Anda Sudah Mengisi Laporan Hari ini'
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