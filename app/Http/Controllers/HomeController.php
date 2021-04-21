<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App;

class HomeController extends Controller
{
    public function pageHome()
    {
        if(Session::has('token')){
    		return view('home');
    	}else{
    		return redirect('login');
    	}
    }
}
