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
use PDF;
use PhpParser\Node\NullableType;

class ExportController extends Controller
{
    public function pageExport(){
        return view('export.exp_main');
    }

    public function pageExportMedical(){
        return view('export.exp_export_medical');
    }

    public function pageExportReimbursement(){
        return view('export.exp_export_reimbursement');
    }

    public function pageExportWorkflow(){
        return view('export.exp_export_Workflow');
    }
    
    public function pageExportTransport(){
        return view('export.exp_export_transport');
    }
    
    public function pageExportAttendance(){
        return view('export.exp_export_attendance');
    }
    
    public function pageExportBusinessTrip(){
        return view('export.exp_export_business_trip');
    }
    
    public function pageExportOvertime(){
        return view('export.exp_export_overtime');
    }
    
    public function pageExportPDFBusinessTrip(){
        return view('export.exp_export_pdf_business_trip');
    }
    
    public function pageExportBusinessTripChecking(){
        return view('export.exp_export_business_trip_checking');
    }
}