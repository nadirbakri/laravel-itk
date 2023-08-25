<?php

namespace App\Http\Controllers;

use App\Exports\WorkflowPermitExport;
use App\Exports\MultipleChecking;
use App\Exports\WorkflowLeaveExport;
use App\Exports\ReimbursementExport;
use App\Exports\MedicalExport;
use App\Exports\AttendanceExport;
use App\Exports\TransportExport;
use App\Exports\OvertimeExport;
use App\Exports\BusinessTripExport;
use App\Exports\BusinessTripAllExport;
use App\Exports\BusinessTripSeattleExport;
use App\Exports\BusinessTripExportPDF;
// use App\Exports\ BusinessTripSeattleExportPDF;
use App\Exports\BusinessTripSeattleExportPDF;
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
    public function pageExport(Request $request){
        try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ],
	    	]);

	    	$response = $client->post(env('API_URL') . '/menumasterwebdetail/getmenumasterwebdetail',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
                        'groupAccessID' => Session::get('groupAccessID'),
                        'moduleID' => $request->moduleID,
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
	    			]
	    		)]
	    	);

        } catch (RequestException $e) {
	    	$response = $e->getResponse();
			// var_dump($response);
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
	    }

	    $arrResult = json_decode($response->getBody()->getContents());

        // dd($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            return view ('export.exp_main', ['dataMenu' => [], 'dataParent' => \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess([], null)]);
        }else{
            return view ('export.exp_main', ['dataMenu' => $arrResult->dataListSet, 'dataParent' => \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess($arrResult->dataListSet, 15)]);
        }

        // return view('export.exp_main');
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

    public function printExportWorkflow(Request $request)
    {
        // dd($request->business_unit);
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }


        if ($request->workflow_type === "ER") {
            return Excel::download(new WorkflowPermitExport($request->claim_date_from, $request->claim_date_to, $request->business_unit, $dataLevel), 'Employee List Permit Report.xlsx');
        } else {
            return Excel::download(new WorkflowLeaveExport($request->claim_date_from, $request->claim_date_to, $request->business_unit, $dataLevel), 'Employee List Leave Report.xlsx');
        }
    }
    
    public function printExportMedical(Request $request)
    {
        // dd($request->business_unit);
        // dd($request->reimbursement_type[0]); 
        // $business_unit = $request->business_unit;
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new MedicalExport($request->claim_date_from, $request->claim_date_to, $request->business_unit, $request->reimbursement_type, $dataLevel), 'Employee List Reimbursement Medical Report.xlsx');
    
    }
   
    public function printExportReimbursement(Request $request)
    {
        // dd($request);
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new ReimbursementExport($request->claim_date_from, $request->claim_date_to, $request->reimbursement_type, $request->business_unit,  $dataLevel), 'Employee List Reimbursement Report.xlsx');
    
    }
   
    public function printExportTransport(Request $request)
    {
        // dd($request);
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new TransportExport($request->claim_date_from, $request->claim_date_to, $request->reimbursement_type, $request->business_unit, $dataLevel), 'Employee List Transport Report.xlsx');
    
    }
    
    public function printExportOvertime(Request $request)
    {
        // dd($request);
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new OvertimeExport($request->claim_date_from, $request->claim_date_to, $request->reimbursement_type, $request->business_unit, $dataLevel), 'Employee List Overtime Report.xlsx');
    
    }
    
    public function printExportBusinessTrip(Request $request)
    {
        // dd($request);
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        if ($request->travel_type == "TTA"){
            return Excel::download(new BusinessTripExport($request->claim_date_from, $request->claim_date_to,$request->business_unit, $dataLevel), 'Employee List Business Advance Trip Report.xlsx');
        } elseif ($request->travel_type == "TTB"){
            return Excel::download(new BusinessTripSeattleExport($request->claim_date_from, $request->claim_date_to,$request->business_unit, $dataLevel), 'Employee List Business Seattle Trip Report.xlsx');
        }else{
            return Excel::download(new BusinessTripAllExport($request->claim_date_from, $request->claim_date_to,$request->business_unit, $dataLevel), 'Employee List Business Seattle Trip Report.xlsx');
        }
    
    }
   
    public function printExportBusinessTripPDF(Request $request){
      if ($request->travel_type == "TTA"){
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [ 
                'startDate' => $request->claim_date_from,
                'endDate' => $request->claim_date_to,
                'companyCode' => Session::get('companyCode'), 
                'languageCode' => App::getLocale(), 
                'sessionID' => 0, 
                'exportMenu' => true,
                'type' => 'REQUEST',
                'businessUnit' =>$request->business_unit,
                'sessionUserID' => Session::get('userID')
            ];

            $response = $client->post(env('API_URL') . '/businesstrip/getbusinesstripandsettlement',
            ['body' => json_encode($param)]
        );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());
        
        // var_dump($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            $pdf = PDF::loadView('export.exp_businesstrippdf_list', ['data' => []])->setPaper('a4', 'landscape')->setOptions(['isPhpEnabled'=> true]);
            return $pdf->stream('Business Trip.pdf');
        }else{
            $pdf = PDF::loadView('export.exp_businesstrippdf_list', ['data' =>$arrResult->dataListSet])->setPaper('a4', 'landscape')->setOptions(['isPhpEnabled'=> true]);
            return $pdf->stream('Business Trip.pdf');
        }
      }else{
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [ 
                'startDate' => $request->claim_date_from,
                'endDate' => $request->claim_date_to,
                'companyCode' => Session::get('companyCode'), 
                'languageCode' => App::getLocale(), 
                'sessionID' => 0, 
                'exportMenu' => true,
                'type' => 'SETTLEMENT',
                'businessUnit' =>$request->business_unit,
                'sessionUserID' => Session::get('userID')
            ];

            $response = $client->post(env('API_URL') . '/businesstrip/getbusinesstripandsettlement',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        dd(json_encode($param));

        if($arrResult->dataListSet == null){
            $pdf = PDF::loadView('export.exp_businesstripsettlementpdf', ['data' => []])->setPaper('a4', 'landscape')->setOptions(['isPhpEnabled'=> true]);
            return $pdf->stream('Business Trip Settlement.pdf');
        }else{
            $pdf = PDF::loadView('export.exp_businesstripsettlementpdf', ['data' => $arrResult->dataListSet])->setPaper('a4', 'landscape')->setOptions(['isPhpEnabled'=> true]);
            return $pdf->stream('Business Trip Settlement.pdf');
        }
      }
       
        // $dataLevel = [];

        // for($i = 0; $i < $request->level_format; $i++){
        //     $dataLevel[] = $request->{'level' . ($i+1)};
        // }

        // if ($request->travel_type[0] == "TTA"){
        //     return PDF::download(new BusinessTripExportPDF($request->claim_date_from, $request->claim_date_to, $request->travel_type[0],$request->business_unit, $dataLevel));
        // } else {
        //     return PDF::download(new BusinessTripSeattleExportPDF($request->claim_date_from, $request->claim_date_to, $request->travel_type[0],$request->business_unit, $dataLevel));
        // }
    }
   
    public function printExportBusinessTripChecking(Request $request){
        // dd($request);
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new MultipleChecking($request->claim_date_from, $request->claim_date_to, $request->business_unit, $request->user_id, $dataLevel), 'Multiple Checking.xlsx');

    }
    
    public function printAttendanceExport(Request $request)
    {
        // dd($request);
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new AttendanceExport($request->claim_date_from, $request->claim_date_to, $request->business_unit, $request->employee_status, $dataLevel), 'Employee List Attendance Report.xlsx');
    
    }
}