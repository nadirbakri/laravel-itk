<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App;

class DashboardController extends Controller
{
    public function pageDashboard()
    {
    	if(Session::has('token')){
    		return view('dashboard');
    	}
    }
}
