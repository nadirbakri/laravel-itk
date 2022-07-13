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

class ReportController extends Controller
{
    public function pageReport(){
        return view('report.rp_main');
    }

    public function pageExportMedical(){
        return view('report.rp_export_medical');
    }

    public function pageExportReimbursement(){
        return view('report.rp_export_reimbursement');
    }

    public function pageExportWorkflow(){
        return view('report.rp_export_Workflow');
    }
    
    public function pageExportTransport(){
        return view('report.rp_export_transport');
    }
    
    public function pageExportAttendance(){
        return view('report.rp_export_attendance');
    }
    
    public function pageExportBusinessTrip(){
        return view('report.rp_export_business_trip');
    }
    
    public function pageExportOvertime(){
        return view('report.rp_export_overtime');
    }
    
    public function pageExportPDFBusinessTrip(){
        return view('report.rp_export_pdf_business_trip');
    }
    
    public function pageExportBusinessTripChecking(){
        return view('report.rp_export_business_trip_checking');
    }
}