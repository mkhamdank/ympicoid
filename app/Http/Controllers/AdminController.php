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

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        if (Auth::user()->role_code != "admin") {
            return redirect()->route('home') ;
        }
        
        $title = 'Dashboard Admin';
        $title_jp = '';

        return view('admin.home', array(
            'title' => $title,
            'title_jp' => $title_jp
        ))->with('page', 'Dashboard Admin');
    }
}
