<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

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
            return view('home')->with('page', 'Dashboard');
        }
    }
}
