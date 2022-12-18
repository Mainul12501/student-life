<?php

namespace App\Http\Controllers\Testauth;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        /*
         * Uncomment the line below if you want to use verified middleware
         */
        //$this->middleware('verified:testauth.verification.notice');
    }


    public function index(){
        return view('testauth.dashboard');
    }
}
