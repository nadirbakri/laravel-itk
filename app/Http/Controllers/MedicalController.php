<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;
use File;
use DataTables;
use Excel;

class MedicalController extends Controller
{
    public function pageMedical() 
    {
        return view ('medical.md_main');
    }
}
