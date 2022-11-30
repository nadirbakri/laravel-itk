<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
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

class TransactionController extends Controller
{
    public function pageTransaction(){
        return view('transaction.trc_main');
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

    // public function tableInputTransactionTransport(Request $request)
    // {
    //     try {
    //         $client = new Client([
    //             'headers' => [ 'Content-Type' => 'application/json',
    //             'Authorization' => 'Bearer ' . Session::get('token') ]
    //         ]);

    //         $response = $client->post(env('API_URL') . '/transport/gettransportdetaillistall',
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump(json_encode(
            //     [
            //         'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
            //         'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
            //         'employeeNo'=> $request->employeeNo,
            //         'medicalType1'=> $request->medicalType1,
            //         'businessUnit' => $request->businessUnit,
            //         // 'exportMenu' => false,
            //         'companyCode' => Session::get('companyCode'), 
            //         'languageCode' => App::getLocale(), 
            //         'sessionID' => 0, 
            //         'sessionUserID' => Session::get('userID'),
            //     ]
            //     ));
            $response = $client->post(env('API_URL') . '/reimbursementmedical/getreimbursementhistoryall',
                ['body' => json_encode(
                    [
                        // 'companyCode' => Session::get('companyCode'),
                        // 'employeeNo' => $request->employeeNo,
                        // 'logActionUserID' => Session::get('userID'),
                        // 'logActionUsername' => Session::get('userName'),
                        'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                        'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                        'employeeNo'=> $request->employeeNo,
                        'medicalType1'=> $request->medicalType1,
                        'businessUnit' => $request->businessUnit,
                        // 'exportMenu' => false,
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => App::getLocale(), 
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
   
    public function tableDetailBusinesstrip(Request $request)
    {
    
        if ($request->reimbursement_type == "TTA"){
            try {
                $client = new Client([
                    'headers' => [ 'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . Session::get('token') ]
                ]);

                // var_dump(json_encode(
                //     [
                //         'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                //         'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                //         'employeeNo'=> $request->employeeNo,
                //         'type'=> "REQUEST",
                //         'businessUnit' => $request->businessUnit,
                //         // 'exportMenu' => false,
                //         'companyCode' => Session::get('companyCode'), 
                //         'languageCode' => App::getLocale(), 
                //         'sessionID' => 0, 
                //         'sessionUserID' => Session::get('userID')
                //     ]
                //     ));
                $response = $client->post(env('API_URL') . '/businesstrip/getbusinesstripandsettlement',
                    ['body' => json_encode(
                        [
                            // 'companyCode' => Session::get('companyCode'),
                            // 'employeeNo' => $request->employeeNo,
                            // 'logActionUserID' => Session::get('userID'),
                            // 'logActionUsername' => Session::get('userName'),
                            'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                            'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                            'employeeNo'=> $request->employeeNo,
                            'type'=> "REQUEST",
                            'businessUnit' => $request->businessUnit,
                            // 'exportMenu' => false,
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
        // var_dump($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet[0]->responseBusinessTrip)->make(true);
        }

    }else if ($request->reimbursement_type == "TTB"){
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump(json_encode(
            //     [
            //         'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
            //         'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
            //         'employeeNo'=> $request->employeeNo,
            //         'medicalType1'=> $request->medicalType1,
            //         'businessUnit' => $request->businessUnit,
            //         'companyCode' => Session::get('companyCode'), 
            //         'languageCode' => App::getLocale(), 
            //         'sessionID' => 0, 
            //         'sessionUserID' => Session::get('userID'),
            //     ]
            //     ));
            $response = $client->post(env('API_URL') . '/businesstrip/getbusinesstripandsettlement',
                ['body' => json_encode(
                    [
                        // 'companyCode' => Session::get('companyCode'),
                        // 'employeeNo' => $request->employeeNo,
                        // 'logActionUserID' => Session::get('userID'),
                        // 'logActionUsername' => Session::get('userName'),
                        'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                        'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                        'employeeNo'=> $request->employeeNo,
                        'type'=> "SETTLEMENT",
                        'businessUnit' => $request->businessUnit,
                        // 'exportMenu' => false,
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => App::getLocale(), 
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
            return Datatables::of($arrResult->dataListSet[0]->responseBusinessTrip)->make(true);
        }


    }else{
         try {
                $client = new Client([
                    'headers' => [ 'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . Session::get('token') ]
                ]);

                // var_dump(json_encode(
                //     [
                //         'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                //         'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                //         'employeeNo'=> $request->employeeNo,
                //         'medicalType1'=> $request->medicalType1,
                //         'businessUnit' => $request->businessUnit,
                //         'companyCode' => Session::get('companyCode'), 
                //         'languageCode' => App::getLocale(), 
                //         'sessionID' => 0, 
                //         'sessionUserID' => Session::get('userID'),
                //     ]
                //     ));
                $response = $client->post(env('API_URL') . '/businesstrip/getbusinesstripandsettlement',
                    ['body' => json_encode(
                        [
                            // 'companyCode' => Session::get('companyCode'),
                            // 'employeeNo' => $request->employeeNo,
                            // 'logActionUserID' => Session::get('userID'),
                            // 'logActionUsername' => Session::get('userName'),
                            'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                            'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                            'employeeNo'=> $request->employeeNo,
                            'type'=> "ALL",
                            'businessUnit' => $request->businessUnit,
                            // 'exportMenu' => false,
                            'companyCode' => Session::get('companyCode'), 
                            'languageCode' => App::getLocale(), 
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
            return Datatables::of($arrResult->dataListSet[0]->responseBusinessTrip)->make(true);
        }

    }
}

    public function tableDetailOvertime(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump(json_encode(
            //     [
            //             'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
            //             'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
            //             'businessUnit' => $request->businessUnit,
            //             'employeeNo'=> $request->employeeNo,
            //             'type' => "TOT",
            //             'exportMenu' => false,
            //             'companyCode' => Session::get('companyCode'), 
            //             'languageCode' => App::getLocale(), 
            //             'sessionID' => 0, 
            //             'sessionUserID' => Session::get('userID'),
            //     ]
            //     ));
            $response = $client->post(env('API_URL') . '/tmovertime/getovertimedetaillist',
                ['body' => json_encode(
                    [
                        'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                        'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                        'businessUnit' => $request->businessUnit,
                        'employeeNo'=> $request->employeeNo,
                        'type' => "TOT",
                        'exportMenu' => false,
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => App::getLocale(), 
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
 
    public function tableDetailWorkflow(Request $request)
    {
        if($request->workflowType == "ER"){
            try {
                $client = new Client([
                    'headers' => [ 'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . Session::get('token') ]
                ]);
    
                // var_dump(json_encode(
                //     [
                //         'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                //         'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                //         'employeeNo'=> $request->employeeNo,
                //         'businessUnit' => $request->businessUnit,
                //         'workflowType' => "ER",
                //         'companyCode' => Session::get('companyCode'), 
                //         'languageCode' => App::getLocale(), 
                //         'sessionID' => 0, 
                //         'sessionUserID' => Session::get('userID'),
                //     ]
                //     ));
                $response = $client->post(env('API_URL') . '/tmpermit/gettmpermitdetailList',
                    ['body' => json_encode(
                        [
                            'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                            'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                            'businessUnit' => $request->businessUnit,
                            'exportMenu' => false,
                            'companyCode' => Session::get('companyCode'), 
                            'workflowType' => "ER",
                            'languageCode' => App::getLocale(), 
                            'employeeNo'=> $request->employeeNo,
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
        }else{
            try {
                $client = new Client([
                    'headers' => [ 'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . Session::get('token') ]
                ]);
    
                // var_dump(json_encode(
                //     [
                //         'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                //         'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                //         'employeeNo'=> $request->employeeNo,
                //         'businessUnit' => $request->businessUnit,
                //         'workflowType' => $request->workflowType,
                //         'companyCode' => Session::get('companyCode'), 
                //         'languageCode' => App::getLocale(), 
                //         'sessionID' => 0, 
                //         'sessionUserID' => Session::get('userID'),
                //     ]
                //     ));
                $response = $client->post(env('API_URL') . '/tmleave/getleavedetaillist',
                    ['body' => json_encode(
                        [
                            'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                            'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                            'employeeNo'=> $request->employeeNo,
                            'businessUnit' => $request->businessUnit,
                            'workflowType' => "EW",
                            'companyCode' => Session::get('companyCode'), 
                            'languageCode' => App::getLocale(), 
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
    }
    public function tableDetailReimbursement(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump(json_encode(
            //     [
            //         'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
            //         'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
            //         'employeeNo'=> $request->employeeNo,
            //         'reimbursementType'=> $request->reimbursementType,
            //         'businessUnit' => $request->businessUnit,
            //         'exportMenu' => false,
            //         'companyCode' => Session::get('companyCode'), 
            //         'languageCode' => App::getLocale(), 
            //         'sessionID' => 0, 
            //         'sessionUserID' => Session::get('userID')
            //     ]
            //     ));
            $response = $client->post(env('API_URL') . '/tmreimbursement/getreimbursementdetaillistall',
                ['body' => json_encode(
                    [
                        // 'companyCode' => Session::get('companyCode'),
                        // 'employeeNo' => $request->employeeNo,
                        // 'logActionUserID' => Session::get('userID'),
                        // 'logActionUsername' => Session::get('userName'),
                        'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                        'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                        'employeeNo'=> $request->employeeNo,
                        'reimbursementType'=> $request->reimbursementType,
                        'businessUnit' => $request->businessUnit,
                        'exportMenu' => false,
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
        // var_dump($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }
    
    public function tableDetailTransport(Request $request)
    {
        try {
            $client = new Client([
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

            $response = $client->post(env('API_URL') . '/transport/gettransportdetaillistall',
                ['body' => json_encode(
                    [
                        'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                        'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                        'exportMenu' =>false,
                        'processDate'=> Carbon::parse($request->processDate)->format('Y-m-d'),
                        'type' =>  $request->type,
                        'businessUnit'=> $request->businessUnit,
                        'directSuperiorID'=> $request->directSuperiorID,
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => App::getLocale(), 
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
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
        // var_dump($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }
   
    public function tableDetailTransactionList(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pemaster/getpemastergrid',
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
                        'languageCode' => App::getLocale(), 
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            var_dump(json_encode(
                [
                    'companyCode' => Session::get('companyCode'),
                    'languageCode' => App::getLocale(), 
                    'sessionUserID' => Session::get('userID'),
                    'directSuperiorID'=> $request->directSuperiorID,
                    // 'employeeNo' => $request->employeeNo,
                    // 'logActionUserID' => Session::get('userID'),
                    // 'logActionUsername' => Session::get('userName'),
                    // 'startDate' => Carbon::parse($request->claimDateFrom)->format('Y-d-m'),
                    // 'endDate' => Carbon::parse($request->claimDateTo)->format('Y-d-m'),
                    // 'processDate' => $request->processDate, 
                    // 'type' =>  $request->transportType,
                    // 'businessUnit'=> $request->businessUnit,
                    'status'=> $request->status,
                    'totalPaidMonth'=> $request->totalPaidMonth,
                    'ticketNo' => $request->ticketNo
                ]
                ));

            $response = $client->put(env('API_URL') . '/tmreimbursement/updatereimbursementapproval',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'languageCode' => App::getLocale(), 
                        'sessionUserID' => Session::get('userID'),
                        'employeeNo'=> $request->employeeNo,
                        // 'employeeNo' => $request->employeeNo,
                        // 'logActionUserID' => Session::get('userID'),
                        // 'logActionUsername' => Session::get('userName'),
                        // 'startDate' => Carbon::parse($request->claimDateFrom)->format('Y-d-m'),
                        // 'endDate' => Carbon::parse($request->claimDateTo)->format('Y-d-m'),
                        // 'processDate' => $request->processDate, 
                        // 'type' =>  $request->transportType,
                        // 'businessUnit'=> $request->businessUnit,
                        'approvalRemarks'=> 'string',
                        'logActionUserID'=> 'string',
                        'logActionUsername'=> 'string',
                        'status'=> $request->status,
                        'totalPaidMonth'=> $request->totalPaidMonth,
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

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }
   
    public function tableUpdateTransMedical(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump(json_encode(
            //     [
            //             'companyCode' => Session::get('companyCode'),
            //             'languageCode' => App::getLocale(), 
            //             'sessionUserID' => Session::get('userID'),
            //             'directSuperiorID'=> $request->directSuperiorID,
            //             // 'employeeNo' => $request->employeeNo,
            //             // 'logActionUserID' => Session::get('userID'),
            //             // 'logActionUsername' => Session::get('userName'),
            //             // 'startDate' => Carbon::parse($request->claimDateFrom)->format('Y-d-m'),
            //             // 'endDate' => Carbon::parse($request->claimDateTo)->format('Y-d-m'),
            //             // 'processDate' => $request->processDate, 
            //             // 'type' =>  $request->transportType,
            //             // 'businessUnit'=> $request->businessUnit,
            //             'approvalRemarks'=> 'string',
            //             'logActionUserID'=> 'string',
            //             'logActionUsername'=> 'string',
            //             'status'=> $request->status,
            //             'paidAmount'=> $request->paidAmount,
            //             'ticketNo' => $request->ticketNo
            //     ]
            //     ));

            $response = $client->put(env('API_URL') . '/reimbursementmedical/updatereimbursementapproval',
                ['body' => json_encode(
                    [
                        'status'=> $request->status,
                        'companyCode' => Session::get('companyCode'),
                        'ticketNo' => $request->ticketNo,
                        'directSuperiorID'=> $request->directSuperiorID,
                        'sessionUserID' => Session::get('userID'),
                        'languageCode' => App::getLocale(), 
                        'TotalPaidMonth'=> $request->TotalPaidMonth
                        // 'employeeNo' => $request->employeeNo,
                        // 'logActionUserID' => Session::get('userID'),
                        // 'logActionUsername' => Session::get('userName'),
                        // 'startDate' => Carbon::parse($request->claimDateFrom)->format('Y-d-m'),
                        // 'endDate' => Carbon::parse($request->claimDateTo)->format('Y-d-m'),
                        // 'processDate' => $request->processDate, 
                        // 'type' =>  $request->transportType,
                        // 'businessUnit'=> $request->businessUnit,
                        // 'approvalRemarks'=> 'string',
                        // 'logActionUserID'=> 'string',
                        // 'logActionUsername'=> 'string',
                        // {"status": "APPROVED",
                        //     "companyCode": "ITK",
                        //     "ticketNo": "2022R000001",
                        //     "directSuperiorID": "0809",
                        //     "sessionUserID": "edwin",
                        //     "languageCode": "ID",
                        //    "totalPaidMonth" : 500
                        //     }
                       
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

}