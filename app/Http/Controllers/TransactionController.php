<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
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
use App\Imports\UpdateReimbursement;
use App\Imports\UpdateMedical;
use App\Imports\UpdateOvertime;
use App\Imports\UpdateTransport;
use App\Imports\UpdateBusinessTrip;

class TransactionController extends Controller
{
    public function pageTransaction(Request $request){
        try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ],
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/MenuMasterWebDetail/getMenuMasterWebDetail',
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
            return view ('transaction.trc_main', ['dataMenu' => [], 'dataParent' => \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess([], null)]);
        }else{
            return view ('transaction.trc_main', ['dataMenu' => $arrResult->dataListSet, 'dataParent' => \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess($arrResult->dataListSet, 16)]);
        }

        // return view('transaction.trc_main');
    }

    public function pageTransactionReimbursement(){
        return view('transaction.trc_trans_reimbursement');
    }

    public function pageTransactionMassLeave(){
        return view('transaction.trc_trans_mass_leave');
    }

    public function pageTransactionWorkflow(){
        return view('transaction.trc_trans_workflow');
    }

    public function pageTransactionTransport(){
        return view('transaction.trc_trans_transport');
    }

    public function pageTransactionMedicalList(){
        return view('transaction.trc_trans_medical_list');
    }

    public function pageTransactionMedicalHistory(){
        return view('transaction.trc_trans_medical_history');
    }

    public function pageTransactionAttendance(){
        return view('transaction.trc_trans_attendance');
    }

    public function pageTransactionBusinessTrip(){
        return view('transaction.trc_trans_business_trip');
    }

    public function pageTransactionOvertime(){
        return view('transaction.trc_trans_overtime');
    }

    public function pageTransactionActiveDocument(){
        return view('transaction.trc_trans_active_document');
    }

    public function pageTransactionCheckinList(){
        return view('admin_menu.admin_main_menu_checkin_list');
    }
    public function pageTransactionMapsCheckinList(){
        return view('transaction.trc_trans_checkin_list');
    }

    public function pageTransactionSalaryComplaintList(){
        return view('transaction.trc_trans_salary_complaint_list');
    }

    public function pageTransactionDeathBenefitList(){
        return view('transaction.trc_trans_death_benefit_list');
    }

    // public function tableInputTransactionTransport(Request $request)
    // {
    //     try {
    //         $client = new Client([
    //             'verify' => false,
    //             'headers' => [ 'Content-Type' => 'application/json',
    //             'Authorization' => 'Bearer ' . Session::get('token') ]
    //         ]);

    //         $response = $client->post(env('API_URL') . '/mobile/Transport/getTransportDetailListAll',
    //             ['body' => json_encode(
    //                 [
    //                     // 'companyCode' => Session::get('companyCode'),
    //                     // 'employeeNo' => $request->employeeNo,
    //                     // 'logActionUserID' => Session::get('userID'),
    //                     // 'logActionUsername' => Session::get('userName'),
    //                     'startDate' => Carbon::parse($request->claimDateFrom)->format('Y-d-m'),
    //                     'endDate' => Carbon::parse($request->claimDateTo)->format('Y-d-m'),
    //                     'processDate' => $request->processDate, 
    //                     'type' =>  $request->transportType,
    //                     'businessUnit'=> $request->businessUnit,
    //                     'directSuperiorID'=> $request->directSuperiorID,
    //                     'companyCode' => Session::get('companyCode'), 
    //                     'languageCode' => App::getLocale(), 
    //                     'userID' => Session::get('userID'),
    //                     'sessionID' => 0, 
    //                     'sessionUserID' => Session::get('userID'),
    //                 ]
    //             )]
    //         );
    //     } catch (RequestException $e) {
    //         $response = $e->getResponse();
    //         if($response->getStatusCode() == 401){
    //             return view('error.login');
    //         }else if($response->getStatusCode() == 404){
    //             return view('error.not_found');
    //         }else{
    //             return view('error.bad_request');
    //         }
    //     }

    //     $arrResult = json_decode($response->getBody()->getContents());
    //     // var_dump($arrResult->dataListSet);

    //     if($arrResult->dataListSet == null){
    //         return Datatables::of([])->make(true);
    //     }else{
    //         return Datatables::of($arrResult->dataListSet)->make(true);
    //     }
    // }
    
    public function tableDetailTransactionMedical(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/ReimbursementMedical/getReimbursementDetailListAllWeb',
                ['body' => json_encode(
                    [
                        'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                        'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                        'employeeNo'=> $request->employeeNo,
                        'medicalType1'=> $request->medicalType1,
                        'businessUnit' => $request->businessUnit,
                        'status' => ($request->status == 'ALL') ? null : $request->status,
                        'exportMenu' => false,
                        'isWeb' => true,
                        'onlyHeader' => true,
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => strtoupper(App::getLocale()), 
                        'userID' => Session::get('userID'),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            // dd($response);
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
            // return Datatables::of([])->make(true);
            return response()->json([]);
        }else{
            // return Datatables::of($arrResult->dataListSet)->make(true);
            return response()->json($arrResult->dataListSet);
        }
    }

    public function dataDetailTransactionMedical(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/ReimbursementMedical/getReimbursementDetailListAll',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'receiptDate' => $request->receiptDate,
                        'employeeNo'=> $request->employeeNo,
                        'ticketNo'=> $request->ticketNo,
                        'languageCode' => strtoupper(App::getLocale()), 
                        'userID' => Session::get('userID'),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                    ]
                )]
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
        
        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet[0];
        }

        return response()->json($data);
    }

    public function tableDetailTransactionMedicalHistory(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/ReimbursementMedical/getReimbursementHistoryAll',
                ['body' => json_encode(
                    [
                        'startDate' => Carbon::parse($request->year)->format('Y-m-d'),
                        'employeeNo'=> $request->employeeNo,
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => strtoupper(App::getLocale()), 
                        'userID' => Session::get('userID'),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            // dd($response);
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
            // return Datatables::of([])->make(true);
            return response()->json([]);
        }else{
            $data = [];

            foreach ($arrResult->dataListSet as $item) {
                $data[] = array_merge(
                    (array) $item->reimbursementEntity,
                    [
                        "attachmentEntity" => $item->attachmentEntity,
                        "totalClaim" => $item->totalClaim,
                        "balance" => $item->balance,
                    ]
                );
            }
            // dd(response()->json($data));
            return response()->json($data);
        }
    }
   
    public function tableDetailBusinesstrip(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/BusinessTrip/getExportBST',
                ['body' => json_encode(
                    [
                        // 'companyCode' => Session::get('companyCode'),
                        // 'employeeNo' => $request->employeeNo,
                        // 'logActionUserID' => Session::get('userID'),
                        // 'logActionUsername' => Session::get('userName'),
                        'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                        'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                        'employeeNo'=> $request->employeeNo,
                        'type'=> ($request->type == 'ALL') ? null : $request->type,
                        'businessUnit' => ($request->businessUnit == 'ALL') ? null : $request->businessUnit,
                        'status'=> ($request->status == 'ALL') ? null : $request->status,
                        'exportMenu' => false,
                        'isWeb' => true,
                        "allWaitingPayment" => false,
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => strtoupper(App::getLocale()), 
                        'userID' => Session::get('userID'),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            // dd($response);
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());
        
        if($arrResult->dataListSet == null){
            // return Datatables::of([])->make(true);
            return response()->json([]);
        }else{
            return response()->json($arrResult->dataListSet);
        }
    }

    public function tableAttachmentBusinesstrip(Request $request)
    {
        if ($request->type == "Business Trip") {
            $url = '/mobile/BusinessTrip/gettraveladvancelist';
        } else {
            $url = '/mobile/BusinessTrip/getSettlementDetailList';
        }

        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . $url,
                ['body' => json_encode(
                    [
                        'ticketNo'=> $request->ticketNo,
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => strtoupper(App::getLocale()), 
                        'userID' => Session::get('userID'),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID')
                    ]
                )]
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

        // dd($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            return response()->json([]);
        }else{
            return response()->json($arrResult->dataListSet);
        }
    }

    public function tableDetailOvertime(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/TmOvertime/GetOvertimeDetailListWeb',
                ['body' => json_encode(
                    [
                        'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                        'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                        'businessUnit' => $request->businessUnit,
                        'employeeNo'=> $request->employeeNo,
                        'status' => $request->status === 'ALL' ? null : $request->status,
                        // 'type' => $request->type,
                        'exportMenu' => false,
                        'isWeb' => true,
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => strtoupper(App::getLocale()), 
                        'userID' => Session::get('userID'),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                    ]
                )]
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
            // return Datatables::of([])->make(true);
            return response()->json([]);
        }else{
            // return Datatables::of($arrResult->dataListSet)->make(true);
            return response()->json($arrResult->dataListSet);
        }
    }
 
    public function tableDetailWorkflow(Request $request)
    {
        if($request->workflowType == "ER"){
            try {
                $client = new Client([
                    'verify' => false,
                    'headers' => [ 'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . Session::get('token') ]
                ]);
    
                $response = $client->post(env('API_URL') . '/mobile/TmPermit/getTmPermitDetailListWeb',
                    ['body' => json_encode(
                        [
                            'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                            'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                            'businessUnit' => $request->businessUnit,
                            'exportMenu' => false,
                            'isWeb' => true,
                            'companyCode' => Session::get('companyCode'), 
                            'workflowType' => "ER",
                            'languageCode' => strtoupper(App::getLocale()), 
                            'employeeNo'=> $request->employeeNo,
                            'status' => $request->status,
                            'userID' => Session::get('userID'),
                            'sessionID' => 0, 
                            'sessionUserID' => Session::get('userID'),
                        ]
                    )]
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
    
            if($arrResult->dataListSet == null){
                // return Datatables::of([])->make(true);
                return response()->json([]);
            }else{
                // return Datatables::of($arrResult->dataListSet)->make(true);
                return response()->json($arrResult->dataListSet);
            }
        }else{
            try {
                $client = new Client([
                    'verify' => false,
                    'headers' => [ 'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . Session::get('token') ]
                ]);
    
                $response = $client->post(env('API_URL') . '/mobile/TmLeave/getLeaveDetailList',
                    ['body' => json_encode(
                        [
                            'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                            'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                            'employeeNo'=> $request->employeeNo,
                            'businessUnit' => $request->businessUnit,
                            'workflowType' => "EW",
                            'status' => $request->status,
                            'isWeb' => true,
                            'companyCode' => Session::get('companyCode'), 
                            'languageCode' => strtoupper(App::getLocale()), 
                            'userID' => Session::get('userID'),
                            'sessionID' => 0, 
                            'sessionUserID' => Session::get('userID'),
                        ]
                    )]
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
    
            if($arrResult->dataListSet == null){
                // return Datatables::of([])->make(true);
                return response()->json([]);
            }else{
                // return Datatables::of($arrResult->dataListSet)->make(true);
                return response()->json($arrResult->dataListSet);
            }
        }
    }
    public function tableDetailReimbursement(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/TmReimbursement/getReimbursementDetailListAllWeb',
                ['body' => json_encode(
                    [
                        'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                        'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                        'employeeNo'=> $request->employeeNo,
                        'reimbursementType'=> $request->reimbursementType,
                        'businessUnit' => $request->businessUnit,
                        'reimbursementStatus' => ($request->reimbursementStatus == "ALL") ? null : $request->reimbursementStatus,
                        'exportMenu' => false,
                        'isWeb' => true,
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => strtoupper(App::getLocale()), 
                        'userID' => Session::get('userID'),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID')
                    ]
                )]
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

        if($arrResult->dataListSet == null){
            // return Datatables::of([])->make(true);
            return response()->json([]);
        }else{
            // return Datatables::of($arrResult->dataListSet)->make(true);
            return response()->json($arrResult->dataListSet);
        }
    }

    public function dataDetailTransactionReimbursement(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/TmReimbursement/getReimbursementDetailListAll',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'receiptDate' => $request->receiptDate,
                        'employeeNo'=> $request->employeeNo,
                        'ticketNo'=> $request->ticketNo,
                        'languageCode' => strtoupper(App::getLocale()), 
                        'userID' => Session::get('userID'),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                    ]
                )]
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
        
        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet[0];
        }

        return response()->json($data);
    }
   
    public function tableDetailCheckinList(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/MultipleCheckIn/getMultipleCheckInByAdmin',
                ['body' => json_encode(
                    [
                        'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                        'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                        'employeeNo' => $request->employeeNo,
                        'businessUnit' => 'ALL',
                        'exportMenu' => false,
                        'isWeb' => true,
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => strtoupper(App::getLocale()), 
                        'userID' => Session::get('userID'),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID')
                    ]
                )]
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

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }
  
    public function tableDetailMapsCheckinList(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump(json_encode(
            //     [
            //         'lastCheckIn' => Carbon::parse($request->lastCheckIn)->format('Y-m-d'),
            //             'employeeNo'=> $request->employeeNo,
            //             'companyCode' => Session::get('companyCode'), 
            //             'languageCode' => App::getLocale(), 
            //             'sessionID' => 0, 
            //             'sessionUserID' => Session::get('userID')
            //     ]
            //     ));
            $response = $client->post(env('API_URL') . '/mobile/CheckIn/getCheckIn',
                ['body' => json_encode(
                    [
                        // 'companyCode' => Session::get('companyCode'),
                        // 'employeeNo' => $request->employeeNo,
                        // 'logActionUserID' => Session::get('userID'),
                        // 'logActionUsername' => Session::get('userName'),
                        'lastCheckIn' => Carbon::parse($request->lastCheckIn)->format('Y-m-d'),
                        'employeeNo'=> $request->employeeNo,
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => strtoupper(App::getLocale()), 
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID')
                    ]
                )]
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
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }
  
    public function tableDetailCheckinListAll(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump(json_encode(
            //     [
            //         'checkInDate' => Carbon::parse($request->checkInDate)->format('Y-m-d'),
            //         'employeeNo'=> $request->employeeNo,
            //         'exportMenu' => false,
            //         'companyCode' => Session::get('companyCode'), 
            //         'languageCode' => App::getLocale(), 
            //         'sessionID' => 0, 
            //         'sessionUserID' => Session::get('userID')
            //     ]
            //     ));
            $response = $client->post(env('API_URL') . '/mobile/MultipleCheckIn/getMultipleCheckIn',
                ['body' => json_encode(
                    [
                        // 'companyCode' => Session::get('companyCode'),
                        // 'employeeNo' => $request->employeeNo,
                        // 'logActionUserID' => Session::get('userID'),
                        // 'logActionUsername' => Session::get('userName'),
                        'checkInDate' => Carbon::parse($request->checkInDate)->format('Y-m-d'),
                        'employeeNo'=> $request->employeeNo,
                        'exportMenu' => false,
                        'isWeb' => true,
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => strtoupper(App::getLocale()), 
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID')
                    ]
                )]
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
        return $arrResult;
        // if($arrResult->dataListSet == null){
        //     return Datatables::of([])->make(true);
        // }else{
        //     return Datatables::of($arrResult->dataListSet)->make(true);
        // }
    }
    
    public function tableDetailTransport(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/Transport/getTransportDetailListAllWeb',
                ['body' => json_encode(
                    [
                        'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                        'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                        'exportMenu' => false,
                        'isWeb' => true,
                        'processDate'=> isset($request->processDate) ? Carbon::parse($request->processDate)->format('Y-m-d') : null,
                        'type' =>  $request->type,
                        'businessUnit'=> $request->businessUnit,
                        'employeeNo'=> $request->employeeNo,
                        'status' => ($request->status == 'ALL') ? null : $request->status,
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => strtoupper(App::getLocale()), 
                        'userID' => Session::get('userID'),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                    ]
                    )]
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

        // dd($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            // return Datatables::of([])->make(true);
            return response()->json([]);
        }else{
            // return Datatables::of($arrResult->dataListSet)->make(true);
            return response()->json($arrResult->dataListSet);
        }
    }

    public function dataDetailTransactionTransport(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/Transport/getTransportDetailListAll',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'receiptDate' => $request->receiptDate,
                        'employeeNo'=> $request->employeeNo,
                        'ticketNo'=> $request->ticketNo,
                        'languageCode' => strtoupper(App::getLocale()), 
                        'userID' => Session::get('userID'),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                    ]
                )]
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
        
        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet[0];
        }

        return response()->json($data);
    }
   
    public function tableDetailTransactionList(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
              
            // var_dump(json_encode(
            //     [
            //         'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
            //         'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
            //         'exportMenu' =>false,
            //         'processDate'=> Carbon::parse($request->processDate)->format('Y-m-d'),
            //         'type' =>  $request->type,
            //         'businessUnit'=> $request->businessUnit,
            //         'directSuperiorID'=> $request->directSuperiorID,
            //         'companyCode' => Session::get('companyCode'), 
            //         'languageCode' => App::getLocale(), 
            //         'sessionID' => 0, 
            //         'sessionUserID' => Session::get('userID'),
            //     ]
            //     ));

            $response = $client->post(env('API_URL') . '/personel/PeMaster/getPeMasterGrid',
                ['body' => json_encode(
                    [
                        // 'companyCode' => Session::get('companyCode'),
                        // 'employeeNo' => $request->employeeNo,
                        // 'logActionUserID' => Session::get('userID'),
                        // 'logActionUsername' => Session::get('userName'),
                        // 'startDate' => Carbon::parse($request->claimDateFrom)->format('Y-d-m'),
                        // 'endDate' => Carbon::parse($request->claimDateTo)->format('Y-d-m'),
                        // 'processDate' => $request->processDate, 
                        // 'type' =>  $request->transportType,
                        // 'businessUnit'=> $request->businessUnit,
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => strtoupper(App::getLocale()), 
                        'userID' => Session::get('userID'),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                    ]
                )]
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
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }
   
    public function tableUpdateTrans(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/mobile/TmReimbursement/UpdateByAdmin',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'languageCode' => App::getLocale(), 
                        'sessionID' => 0,
                        'sessionUserID' => Session::get('userID'),
                        'approvalRemarks'=> $request->approvalRemarks,
                        'logActionUserID'=> Session::get('userID'),
                        'logActionUsername'=> Session::get('userName'),
                        'status'=> $request->status,
                        'paidAmount'=> (int) $request->paidAmount,
                        'ticketNo' => $request->ticketNo
                    ]
                )]
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
        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
        // if($arrResult->dataListSet == null){
        //     return Datatables::of([])->make(true);
        // }else{
        //     return Datatables::of($arrResult->dataListSet)->make(true);
        // }
    }

    public function tableUpdateTransPermit(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/mobile/TmPermit/UpdateByAdmin',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'languageCode' => App::getLocale(), 
                        'listRefPermitID' => null,
                        'sessionUserID' => Session::get('userID'),
                        'directSuperiorCode'=> $request->directSuperiorCode,
                        'approvalRemarks'=> $request->approvalRemarks,
                        'logActionUserID'=> Session::get('userID'),
                        'logActionUsername'=> Session::get('userName'),
                        'status'=> $request->status,
                        'ticketNo' => $request->ticketNo
                    ]
                )]
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

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function tableUpdateTransLeave(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/mobile/TmLeave/UpdateByAdmin',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'languageCode' => App::getLocale(), 
                        'listRefLeaveID' => null,
                        'sessionUserID' => Session::get('userID'),
                        'directSuperiorCode'=> $request->directSuperiorCode,
                        'approvalRemarks'=> $request->approvalRemarks,
                        'logActionUserID'=> Session::get('userID'),
                        'logActionUsername'=> Session::get('userName'),
                        'status'=> $request->status,
                        'ticketNo' => $request->ticketNo
                    ]
                )]
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

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }
  
    public function tableUpdateTransTransport(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/mobile/Transport/UpdateByAdmin',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'languageCode' => strtoupper(App::getLocale()), 
                        'sessionID' => 0,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID'=> Session::get('userID'),
                        'logActionUsername'=> Session::get('userName'),
                        'status'=> $request->status,
                        'paidAmount'=> (int) $request->paidAmount,
                        'ticketNo' => $request->ticketNo,
                        'approvalRemarks' => $request->approvalRemarks
                    ]
                )]
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
        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
        // if($arrResult->dataListSet == null){
        //     return Datatables::of([])->make(true);
        // }else{
        //     return Datatables::of($arrResult->dataListSet)->make(true);
        // }
    }
   
    public function tableUpdateApprovalBusinesstrip(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // return response()->json(['status' => "true", 'message' => "Test"]);
            // dd('Test');

            $response = $client->put(env('API_URL') . '/mobile/BusinessTrip/UpdateByAdmin',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'languageCode' => strtoupper(App::getLocale()),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID'=> Session::get('userID'),
                        'logActionUsername'=> Session::get('userName'),
                        'status'=> $request->status,
                        'paidAmount'=>(int) $request->paidAmount,
                        'ticketNo' => $request->ticketNo,
                        'approvalRemarks' => $request->approvalRemarks
                    ]
                )]
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

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesTransactionActiveDocument(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

                foreach($request->ticketNo as $key=>$value){
                    $param[] = [
                        "companyCode" => Session::get('companyCode'),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
                        "languageCode" => App::getLocale(),
                        'changeBy' => Session::get('userID'),
                        "status" => "APPROVED",
                        "ticketNo" => $value,
                        "paidAmount" => (int)$request->paidAmount[$key]
                    ];
                }
                $response = $client->put(env('API_URL') . '/mobile/BusinessTrip/UpdateListTicketNo',
                    ['body' => json_encode($param)]
                );
                // var_dump(json_encode($param));
    
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
        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function tableUpdateListBusinesstrip(Request $request)
    {
        $param = [];
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            
            foreach($request->data as $value){
                // var_dump($value);
                $param[] = [
                    "companyCode" => Session::get('companyCode'),
                    "sessionID" => 0,
                    "sessionUserID" => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    "languageCode" => App::getLocale(),
                    "changedBy" => Session::get('userID'),
                    "status" => $value['status'],
                    "ticketNo" => $value['ticketNo'],
                    "paidAmount" => $value['checkPaid']
                ];
            }

            // return response()->json(['status' => "true", 'message' => "Test"]);
            // dd('Test');

            $response = $client->put(env('API_URL') . '/mobile/BusinessTrip/UpdateListTicketNo',
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
        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);

        // if($arrResult->dataListSet == null){
        //     return Datatables::of([])->make(true);
        // }else{
        //     return Datatables::of($arrResult->dataListSet)->make(true);
        // }
    }
   
    public function tableUpdateOvertime(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $checkExtend = (isset($request->checkExtendExpiredDate) && $request->checkExtendExpiredDate == 'true') ? (bool) $request->checkExtendExpiredDate : false;

            if($checkExtend){
                $url = '/mobile/tmovertime/extendovertime';
                $param = [
                    'companyCode' => Session::get('companyCode'),
                    'ticketNo' => $request->ticketNo,
                    'offExpiredDate' => $request->expiredDate,
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    'languageCode' => App::getLocale()
                ];
            }else{
                $url = '/mobile/tmovertime/updateovtapprovalbyadmin';
                $param = [
                    'status'=> $request->status,
                    'companyCode' => Session::get('companyCode'),
                    'listRefLeaveID' => null,
                    'ticketNo' => $request->ticketNo,
                    'directSuperiorCode'=> $request->directSuperior,
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    'approvalRemarks' => $request->approvalRemarks,
                    'languageCode' => App::getLocale()
                ];
            }

            // dd(json_encode($param));

            $response = $client->put(env('API_URL') . $url,
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
        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function tableUpdateTransMassLeave(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                'leaveType' => $request->leaveType,
                'leaveTime' => $request->leaveTime,
                'submitType' => $request->submitType,
                'dateFrom' => $request->dateFrom,
                'dateTo' => $request->dateTo,
                'description' => $request->remarks,
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID'),
                'logActionUserID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName'),
                'languageCode' => strtoupper(App::getLocale())
            ];


            if($request->submitType == "STB"){
                if(isset($request->selectedEmployees)){
                    foreach ($request->selectedEmployees as $dataSelected) {
                        $dataEmployee[] = [
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $dataSelected['employeeId'],
                            'userID' => $dataSelected['userId']
                        ];
                    }
                    $param['employeeList'] = $dataEmployee;
                }else{
                    $param['employeeList'] = [];
                }
            }else{
                $param['employeeList'] = [];
            }

            // dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/mobile/TmLeave/MassLeave',
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
        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }
   
    public function tableUpdateTransMedical(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                'status'=> $request->status,
                'ticketNo' => $request->ticketNo,
                'directSuperiorID'=> $request->directSuperiorID,
                'TotalApprovalHRD'=> $request->totalPayment,
                // 'paidAmount'=> (int) $request->paidAmount,
                // 'approvalRemarks'=> $request->approvalRemarks,
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID'),
                'logActionUserID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName'),
                'languageCode' => strtoupper(App::getLocale())
            ];

            if (isset($request->claimForDetail)) {
                foreach($request->claimForDetail as $key => $value) {
                    $dataClaimForDetail[] = [
                        'companyCode' => Session::get('companyCode'),
                        'ticketNo' => $request->ticketNo,
                        'serviceCode' => $value['serviceCode'],
                        'claimForCode' => $value['claimForCode'],
                        'paidAmount' => $value['paidAmount'],
                    ];
                }
            }
            else {
                $dataClaimForDetail = [];
            }

            $param['claimForDetail'] = $dataClaimForDetail;

            $response = $client->put(env('API_URL') . '/mobile/reimbursementmedical/updatebyadmin',
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

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);

        // if($arrResult->dataListSet == null){
        //     return Datatables::of([])->make(true);
        // }else{
        //     return Datatables::of($arrResult->dataListSet)->make(true);
        // }
    }

    public function tableUpdateTransSalaryComplaint(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/TmSalaryComplain/UpdateApproval',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'status'=> $request->status,
                        'ticketNo' => $request->ticketNo,
                        'employeeNo' => $request->employeeNo,
                        'approvalRemarks' => $request->approvalRemarks,
                        'isWeb' => true,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionID' => 0,
                        'sessionUserID' => 'Admin',
                        'logActionUserID'=> Session::get('userID'),
                        'logActionUsername'=> Session::get('userName'),
                        'languageCode' => App::getLocale(), 
                    ]
                )]
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
        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
        // if($arrResult->dataListSet == null){
        //     return Datatables::of([])->make(true);
        // }else{
        //     return Datatables::of($arrResult->dataListSet)->make(true);
        // }
    }

    public function tableUpdateTransDeathBenefit(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/mobile/TmTunjanganKematian/UpdateApproval',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'status'=> $request->status,
                        'ticketNo' => $request->ticketNo,
                        'employeeNo' => $request->employeeNo,
                        'approvalRemarks' => $request->approvalRemarks,
                        'isWeb' => true,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionID' => 0,
                        'sessionUserID' => 'Admin',
                        'logActionUserID'=> Session::get('userID'),
                        'logActionUsername'=> Session::get('userName'),
                        'languageCode' => App::getLocale(), 
                    ]
                )]
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
        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
        // if($arrResult->dataListSet == null){
        //     return Datatables::of([])->make(true);
        // }else{
        //     return Datatables::of($arrResult->dataListSet)->make(true);
        // }
    }

    public function tableDetailAttendance(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/TmAbsence/GetExportTmAbsence',
                ['body' => json_encode(
                    [
                        // 'companyCode' => Session::get('companyCode'),
                        // 'employeeNo' => $request->employeeNo,
                        // 'logActionUserID' => Session::get('userID'),
                        // 'logActionUsername' => Session::get('userName'),
                        'companyCode' => Session::get('companyCode'), 
                        'employeeNo'=> $request->employeeNo,
                        'languageCode' => strtoupper(App::getLocale()), 
                        'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                        'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                        'isWeb' => true,
                        'userID' => Session::get('userID'),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID')
                    ]
                )]
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
            // return Datatables::of([])->make(true);
            return response()->json([]);
        }else{
            // return Datatables::of($arrResult->dataListSet)->make(true);
            return response()->json($arrResult->dataListSet);
        }
    }

    public function dataDetailTransactionAttendance(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/TmAbsence/getTmAbsence',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'seqNo' => $request->seqNo,
                        'employeeNo'=> $request->employeeNo,
                        'isWeb'=> true,
                        'languageCode' => strtoupper(App::getLocale()), 
                        'userID' => Session::get('userID'),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                    ]
                )]
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

        // dd($arrResult->dataListSet);
        
        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet[0];
        }

        return response()->json($data);
    }

    public function tableDetailMassLeave(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/TmLeave/GetMassLeaveHeader',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => strtoupper(App::getLocale()), 
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                        "logActionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userName')
                    ]
                )]
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
            // return Datatables::of([])->make(true);
            return response()->json([]);
        }else{
            // return Datatables::of($arrResult->dataListSet)->make(true);
            return response()->json($arrResult->dataListSet);
        }
    }

    public function tableDetailSalaryComplaint(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/TmSalaryComplain/GetSalaryComplainDetailList',
                ['body' => json_encode(
                    [
                        'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                        'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                        'employeeNo'=> $request->employeeNo,
                        'businessUnit' => $request->businessUnit,
                        'status' => $request->salaryComplaintStatus,
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => strtoupper(App::getLocale()), 
                        'userID' => Session::get('userID'),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID')
                    ]
                )]
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

        if($arrResult->dataListSet == null){
            // return Datatables::of([])->make(true);
            return response()->json([]);
        }else{
            // return Datatables::of($arrResult->dataListSet)->make(true);
            return response()->json($arrResult->dataListSet);
        }
    }

    public function dataDetailSalaryComplaint(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/TmSalaryComplain/GetSalaryComplainDetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'complainDate' => $request->complainDate,
                        'employeeNo'=> $request->employeeNo,
                        'ticketNo'=> $request->ticketNo,
                        'languageCode' => strtoupper(App::getLocale()), 
                        'userID' => Session::get('userID'),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                    ]
                )]
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
        
        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet[0];
        }

        return response()->json($data);
    }

    public function tableDetailDeathBenefit(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/TmTunjanganKematian/GetTunjanganKematianDetailList',
                ['body' => json_encode(
                    [
                        'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                        'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                        'employeeNo'=> $request->employeeNo,
                        'businessUnit' => $request->businessUnit,
                        'ReimbursementStatus' => $request->reimbursementStatus,
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => App::getLocale(), 
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID')
                    ]
                )]
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

        if($arrResult->dataListSet == null){
            // return Datatables::of([])->make(true);
            return response()->json([]);
        }else{
            // return Datatables::of($arrResult->dataListSet)->make(true);
            return response()->json($arrResult->dataListSet);
        }
    }

    public function importUpdateReimbursement(Request $request)
    {     
        try{
            $file = $request->file('file_reimbursement');
            $import = new UpdateReimbursement;
            Excel::import($import, $file->getRealPath(), null, \Maatwebsite\Excel\Excel::XLSX);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $objError = (object) ['status' => false, 'message' => $failures[0]->errors()[0]];
            return array(0 => $objError);
        }
        
        return $import->getArrResult();
    }
   
    public function importUpdateBusinesstrip(Request $request)
    {     
        try{
            $file = $request->file('file_business_trip');
            $import = new UpdateBusinessTrip;
            Excel::import($import, $file->getRealPath(), null, \Maatwebsite\Excel\Excel::XLSX);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $objError = (object) ['status' => false, 'message' => $failures[0]->errors()[0]];
            return array(0 => $objError);
        }
        
        return $import->getArrResult();
    }
   
    public function importUpdateTransport(Request $request)
    {     
        try{
            $file = $request->file('file_transport');
            $import = new UpdateTransport;
            Excel::import($import, $file->getRealPath(), null, \Maatwebsite\Excel\Excel::XLSX);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $objError = (object) ['status' => false, 'message' => $failures[0]->errors()[0]];
            return array(0 => $objError);
        }
        
        return $import->getArrResult();
    }
   
    public function importUpdateMedical(Request $request)
    {
        try{
            $file = $request->file('file_medical');
            $import = new UpdateMedical;
            Excel::import($import, $file->getRealPath(), null, \Maatwebsite\Excel\Excel::XLSX);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $objError = (object) ['status' => false, 'message' => $failures[0]->errors()[0]];
            return array(0 => $objError);
        }
        
        return $import->getArrResult();
    }
   
    public function importUpdateOvertime(Request $request)
    {
        try{
            $file = $request->file('file_overtime');
            $import = new UpdateOvertime;
            Excel::import($import, $file->getRealPath(), null, \Maatwebsite\Excel\Excel::XLSX);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $objError = (object) ['status' => false, 'message' => $failures[0]->errors()[0]];
            return array(0 => $objError);
        }
        
        return $import->getArrResult();
    }
}