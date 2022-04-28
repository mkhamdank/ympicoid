<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\EmployeeCommunication;
use App\VaksinSurvey;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        if (Auth::user()->status_ganti == null || Auth::user()->status_ganti == "") {
            return redirect('reset/password/'.Auth::user()->username);
        } else {
            $vaksin = VaksinSurvey::where('employee_id',Auth::user()->username)->first();
            $mudik = EmployeeCommunication::where('employee_id',Auth::user()->username)->first();

            return view('home', array(
                'vaksin' => $vaksin,
                'mudik' => $mudik,
            ))->with('page', 'Dashboard');
        }
    }
}
