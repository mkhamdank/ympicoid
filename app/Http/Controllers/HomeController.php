<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        // if (Auth::user()->role_code == 'emp-srv') {
        //     return redirect()->action('EmployeeController@indexEmployeeService');
        // } else {
            return view('home')->with('page', 'Dashboard');
        // }
    }
}
