<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App;

class DashboardController extends Controller
{
    public function pageHomeDashboard()
    {
    	if(Session::has('token')){
    		return view('home_dashboard');
    	}
    }
}
