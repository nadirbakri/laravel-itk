<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;
use DataTables;
use Excel;

class PayrollController extends Controller
{
    public function pagePayroll() 
    {
        return view ('payroll.py_main');
    }

    

}