<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use DataTables;
use File;
use Illuminate\Database\QueryException;
use PDF;
use Excel;
use App\User;
use Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
   
    public function resetPassword($id)
    {
    	return view('auth.passwords.reset')->with('id',$id);
    }

    public function resetPasswordNew($id)
    {
        return view('auth.passwords.reset')->with('id',base64_decode($id));
    }

    public function requestResetPassword(Request $request)
    {
		$cek = User::where('email',$request->get('email'))->first();
		if (count($cek) > 0) {
			$suhu = $cek->id;
	    	$mail_to = $request->get('email');
	    	$contactList = [];
	        $contactList[0] = 'mokhamad.khamdan.khabibi@music.yamaha.com';
	        $contactList[1] = 'rio.irvansyah@music.yamaha.com';
	    	Mail::to($mail_to)->bcc($contactList,'BCC')->send(new SendEmail($suhu, 'request_reset_password'));

	    	return back()->with('success', "Please check your email.")->with('user',$cek);
		}else{
	    	return back()->with('error', "Your email doesn't exists.");
		}
    }

    public function requestResetPasswordWhatsapp(Request $request)
    {
        try {
            $cekuser = User::where('username',strtoupper($request->get('employee_id')))->first();
            if ($cekuser) {
                $cekemp = DB::table('employee_syncs')->where('employee_id',strtoupper($request->get('employee_id')))->first();
                if ($cekemp) {
                    // $new_pass = rand(10000000,99999999);
                    // $cekuser->password = bcrypt($new_pass);
                    // $cekuser->status_ganti = "";
                    // $cekuser->save();

                    if(substr($cekemp->phone, 0, 1) == '+' ){
                       $phone = substr($cekemp->phone, 1, 15);
                     }
                     else if(substr($cekemp->phone, 0, 1) == '0'){
                       $phone = "62".substr($cekemp->phone, 1, 15);
                     }
                     else{
                       $phone = $cekemp->phone;
                     }

                            // $phone = '6281132210003';
                     // dengan password ".$new_pass."
                     $nik = strtoupper($request->get('employee_id'));
                     // $messages = "Permintaan Reset Password https://ympi.co.id. Jangan Berikan Password Ini Kepada Siapapun, Termasuk ke Karyawan YMPI! Masuk ke Akun https://ympi.co.id. Klik Link Berikut : http://ympi.co.id/ympicoid/public/reset/password/new/".base64_encode($nik);
                     $messages = "Permintaan Reset Password YMPICOID. Abaikan pesan berikut jika ini bukan Anda! Klik Link Berikut Untuk Mengubah Password : http://ympi.co.id/ympicoid/public/reset/password/new/".base64_encode($nik);

                     $curl = curl_init();

                     curl_setopt_array($curl, array(
                      CURLOPT_URL => 'https://app.whatspie.com/api/messages',
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => '',
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => 'POST',
                      CURLOPT_POSTFIELDS => 'receiver='.$phone.'&device=6281130561777&message='.urlencode ($messages).'&type=chat',
                      CURLOPT_HTTPHEADER => array(
                        'Accept: application/json',
                        'Content-Type: application/x-www-form-urlencoded',
                        'Authorization: Bearer UAqINT9e23uRiQmYttEUiFQ9qRMUXk8sADK2EiVSgLODdyOhgU'
                      ),
                    ));
                     curl_exec($curl);

                    $response = array(
                        'status' => true,
                    );
                    return Response::json($response);
                }else{
                    $response = array(
                        'status' => false,
                        'message' => 'Karyawan Tidak Ditemukan'
                    );
                    return Response::json($response);
                }
            }else{
                $response = array(
                    'status' => false,
                    'message' => 'User Tidak Ditemukan'
                );
                return Response::json($response);
            }
        } catch (\Exception $e) {
            $response = array(
                'status' => false,
                'message' => $e->getMessage()
            );
            return Response::json($response);
        }
        // if (count($cek) > 0) {
        //     $suhu = $cek->id;
        //     $mail_to = $request->get('email');
        //     $contactList = [];
        //     $contactList[0] = 'mokhamad.khamdan.khabibi@music.yamaha.com';
        //     $contactList[1] = 'rio.irvansyah@music.yamaha.com';
        //     Mail::to($mail_to)->bcc($contactList,'BCC')->send(new SendEmail($suhu, 'request_reset_password'));

        //     return back()->with('success', "Please check your email.")->with('user',$cek);
        // }else{
        //     return back()->with('error', "Your email doesn't exists.");
        // }
    }

    public function resetPasswordConfirm(Request $request)
    {
    	$password = $request->get('password');
    	$password_confirm = $request->get('password_confirm');
    	if ($password == $password_confirm) {
    		if ($request->get('validation') > 0) {
    			return back()->with('error', "Please Follow Rule Password");
    		}else{
    			$user = User::where('username',$request->get('id'))->first();
	    		$user->password = bcrypt($request->get('password'));
	            $user->status_ganti = date('Y-m-d H:i:s');
	    		$user->save();
	    		// return redirect('')->with('success','Reset password was successful.');
                // return redirect()->route('logout');
                Auth::logout();
                Session::flush();
                return redirect('/');
    		}
    		
    	}else{
    		return back()->with('error', "Password doesn't match.");
    	}
    }

    public function register()
    {
    	return view('auth.register');
    }

    public function confirmRegister(Request $request)
    {
    	$password = $request->get('password');
    	$password_confirm = $request->get('password_confirm');

    	if ($password == $password_confirm) {
    		$cek = User::where('username',$request->get('username'))->first();
    		if (count($cek) == 0) {
    			$users = User::create(
					[
						'name' => $request->get('full_name'),
						'username' => $request->get('username'),
						'email' => $request->get('email'),
						'password' => Hash::make($request->get('password')),
						'company' => $request->get('company'),
						'role_code' => '',
						'status' => 'Unconfirmed',
						'avatar' => 'image-user.png',
						'created_by' => 1
					]
				);
				$users->save();

				$to = [
					'erlangga.kharisma@music.yamaha.com',
					'shega.erik.wicaksono@music.yamaha.com',
					'ali.murdani@music.yamaha.com',
					'amelia.novrinta@music.yamaha.com',
					'bakhtiar.muslim@music.yamaha.com'
				];

				Mail::to($to)->bcc(['mokhamad.khamdan.khabibi@music.yamaha.com','rio.irvansyah@music.yamaha.com'])->send(new SendEmail($users, 'register'));

	    		return redirect('')->with('success','Your account has been created. Please Wait For the Confirmation');
    		}else{
    			return back()->with('error', "This credentials already exists.");
    		}
    	
    	}else{
    		return back()->with('error', "Password doesn't match.");
    	}
    }

	// $full_name = $request->get('full_name');
	// $mail_to = $request->get('email');
	// $contactList = [];
 //    $contactList[0] = 'mokhamad.khamdan.khabibi@music.yamaha.com';
 //    $contactList[1] = 'rio.irvansyah@music.yamaha.com';
	// Mail::to($mail_to)->bcc($contactList,'BCC')->send(new SendEmail($full_name, 'register'));

    public function terms()
    {
        # code...
    }

    public function policy()
    {
    	return view('billing.policy');
    }
}
