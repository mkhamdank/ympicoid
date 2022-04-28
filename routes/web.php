<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

Route::get('index/employee/service', 'EmployeeController@indexEmployeeService')->name('emp_service');

Route::get('xml_parser', 'TrialController@xmlParser');
Route::post('xml_parser_upload', 'TrialController@xmlParserUpload');



Auth::routes();

Route::get('/', function () {
	if (Auth::check()) {
		if (Auth::user()->role_code == 'admin') {
			// // return view('admin/home');
			// Route::get('admin/home', 'AdminController@index');

            return redirect()->route('admin_home') ;
			// return redirect()->action('EmployeeController@indexEmployeeService', ['id' => 1]);
			// return \redirect()->route('emp_service', ['id' => 1, 'tahun' => date('Y')]);
			// return redirect()->route('index/employee/service/{ctg}', ['ctg' => 'home']);
		} else {
			if (Auth::user()->status_ganti == "" || Auth::user()->status_ganti == null) {
				return redirect('reset/password/'.Auth::user()->username);
			}else{
				return view('home');
			}
		}
	} else {
		return view('auth.login');
	}
});

Route::get('/forgot/password', function () {
    return view('auth.passwords.email')->with('success');
})->middleware('guest')->name('password.request');

Route::get('reset/password/{id}', 'PasswordController@resetPassword');
Route::post('request/reset/password', 'PasswordController@requestResetPassword');
Route::post('reset/password/confirm', 'PasswordController@resetPasswordConfirm');

Route::get('register', 'PasswordController@register');
Route::post('register/confirm', 'PasswordController@confirmRegister');

Route::get('404', function() {
	// return view('404');
});

Route::get('trial', function() {
	return view('admin.layouts.trial');
});

Route::get('terms', 'PasswordController@terms');
Route::get('policy', 'PasswordController@policy');

Route::group(['nav' => 'A1', 'middleware' => 'permission'], function(){
	Route::get('index/batch_setting', 'BatchSettingController@index');
	Route::get('create/batch_setting', 'BatchSettingController@create');
	Route::post('create/batch_setting','BatchSettingController@store');
	Route::get('destroy/batch_setting/{id}', 'BatchSettingController@destroy');
	Route::get('edit/batch_setting/{id}', 'BatchSettingController@edit');
	Route::post('edit/batch_setting/{id}', 'BatchSettingController@update');
	Route::get('show/batch_setting/{id}', 'BatchSettingController@show');
});

Route::group(['nav' => 'A6', 'middleware' => 'permission'], function(){
	Route::get('index/user', 'UserController@index');
	Route::get('create/user', 'UserController@create');
	Route::post('create/user','UserController@store');
	Route::get('destroy/user/{id}', 'UserController@destroy');
	Route::get('edit/user/{id}', 'UserController@edit');
	Route::post('edit/user/{id}', 'UserController@update');
	Route::get('show/user/{id}', 'UserController@show');
});

Route::group(['nav' => 'A11', 'middleware' => 'permission'], function(){
	Route::get('index/rio', 'RioController@indexrio');
});

Route::group(['nav' => 'A7', 'middleware' => 'permission'], function(){
	Route::get('index/daily_report', 'DailyReportController@index');
	Route::post('create/daily_report', 'DailyReportController@create');
	Route::post('update/daily_report', 'DailyReportController@update');
	Route::post('delete/daily_report', 'DailyReportController@delete');
	Route::get('fetch/daily_report', 'DailyReportController@fetchDailyReport');
	Route::get('download/daily_report', 'DailyReportController@downloadDailyReport');
	Route::get('fetch/daily_report_detail', 'DailyReportController@fetchDailyReportDetail');
	Route::get('edit/daily_report', 'DailyReportController@edit');
});

Route::get('setting/user', 'UserController@index_setting');
Route::post('setting/user', 'UserController@setting');
Route::post('register', 'RegisterController@register')->name('register');

Route::group(['nav' => 'A3', 'middleware' => 'permission'], function(){
	Route::get('index/navigation', 'NavigationController@index');
	Route::get('create/navigation', 'NavigationController@create');
	Route::post('create/navigation','NavigationController@store');
	Route::get('destroy/navigation/{id}', 'NavigationController@destroy');
	Route::get('edit/navigation/{id}', 'NavigationController@edit');
	Route::post('edit/navigation/{id}', 'NavigationController@update');
	Route::get('show/navigation/{id}', 'NavigationController@show');
});

Route::group(['nav' => 'A4', 'middleware' => 'permission'], function(){
	Route::get('index/role', 'RoleController@index');
	Route::get('create/role', 'RoleController@create');
	Route::post('create/role','RoleController@store');
	Route::get('destroy/role/{id}', 'RoleController@destroy');
	Route::get('edit/role/{id}', 'RoleController@edit');
	Route::post('edit/role/{id}', 'RoleController@update');
	Route::get('show/role/{id}', 'RoleController@show');
});

Route::get('laporan_kesehatan', 'MasterController@laporan_kesehatan');
Route::get('laporan_kesehatan/input', 'MasterController@input_laporan_kesehatan');
Route::get('survey_covid', 'MasterController@survey_covid');
Route::post('survey_covid/input', 'MasterController@input_survey_covid');

Route::get('check/data','MasterController@checkData');

Route::get('vaksin', 'HumanResourcesController@indexVaksin');
Route::get('vaksin/check', 'HumanResourcesController@checkEmpVaksin');
Route::get('vaksin/input', 'HumanResourcesController@inputVaksin');
Route::get('vaksin/registration/input', 'HumanResourcesController@inputVaksinRegistration');

Route::get('pkb', 'HumanResourcesController@indexPkb');
Route::get('pkb/input', 'HumanResourcesController@inputPkb');

Route::get('kode_etik', 'HumanResourcesController@indexKodeEtik');
Route::get('kodeetik/input', 'HumanResourcesController@inputKodeEtik');

Route::get('index/survey_stocktaking', 'StocktakingController@indexSurvey');
Route::get('fetch/check_survey_stocktaking', 'StocktakingController@fetchSurvey');
Route::post('input/survey_stocktaking', 'StocktakingController@inputSurvey');

Route::get('emergency', 'MasterController@emergency');
Route::get('post/emergency', 'MasterController@postEmergency');

Route::get('data_komunikasi', 'MasterController@DataKomunikasi');
Route::get('post/data_komunikasi', 'MasterController@postDataKomunikasi');

Route::get('mcu', 'HumanResourcesController@mcu');
Route::get('post/mcu', 'HumanResourcesController@postMcu');

Route::get('mudik/{id}', 'MasterController@indexMudik');
Route::post('post/mudik', 'MasterController@postMudik');


Route::get('/home', [
	'middleware' => 'permission', 
	'nav' => 'Dashboard', 
	'uses' => 'HomeController@index'
])->name('home');

Route::get('/admin/home', [
	'middleware' => 'permission', 
	'nav' => 'Dashboard', 
	'uses' => 'Admincontroller@index'
])->name('admin_home');

Route::get('pdf','TrialController@trialPdf');

Route::get('generateUser','MasterController@generateUser');


// OTHER YMPI.CO.ID
Route::get('/esport','MasterController@indexEsport');
Route::post('/esport/input','MasterController@inputEsport');
Route::get('/esport/quiz/{id}','MasterController@indexEsportQuiz');

Route::get('/guest_assessment','VendorController@guest_assessment');
Route::post('post/guest_assessment', 'VendorController@inputGuestAssessment');

Route::get('/wpos','VendorController@wpos');
Route::post('post/wpos', 'VendorController@inputWpos');

Route::get('/vendor_assessment','VendorController@vendor_assessment');
Route::post('post/vendor_assessment', 'VendorController@inputVendorAssessment');

Route::get('/cms','VendorController@indexCms');
Route::post('post/cms', 'VendorController@inputCms');

//RAW MATERIAL
Route::get('po_confirmation','RawMaterialController@indexPoConfirmation');
Route::get('fetch/po','RawMaterialController@fetchPo');
Route::post('input/po_confirmation', 'RawMaterialController@inputPoConfirmation');
Route::get('send/po_notification/{po_number}', 'RawMaterialController@sendPoNotification');

//END RAW MATERIAL
