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
            //             'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
            //             'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
            //             'employeeNo'=> $request->employeeNo,
            //             'medicalType1'=> $request->medicalType1,
            //             'businessUnit' => $request->businessUnit,
            //             'exportMenu' => false,
            //             'companyCode' => Session::get('companyCode'), 
            //             'languageCode' => App::getLocale(), 
            //             'sessionID' => 0, 
            //             'sessionUserID' => Session::get('userID'),
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

    }else if ($request->type == "TTB"){
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
            //         'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
            //         'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
            //         'businessUnit' => $request->businessUnit,
            //         'employeeNo'=> $request->employeeNo,
            //         'type' => "TOT",
            //         'exportMenu' => false,
            //         'companyCode' => Session::get('companyCode'), 
            //         'languageCode' => App::getLocale(), 
            //         'sessionID' => 0, 
            //         'sessionUserID' => Session::get('userID'),
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
    
   
    public function tableDetailCheckinList(Request $request)
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
            $response = $client->post(env('API_URL') . '/multiplecheckin/getmultiplecheckin ',
                ['body' => json_encode(
                    [
                        // 'companyCode' => Session::get('companyCode'),
                        // 'employeeNo' => $request->employeeNo,
                        // 'logActionUserID' => Session::get('userID'),
                        // 'logActionUsername' => Session::get('userName'),
                        'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                        'employeeNo'=> $request->employeeNo,
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
            //             'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
            //             'exportMenu' =>false,
            //             'processDate'=> Carbon::parse($request->processDate)->format('Y-m-d'),
            //             'type' =>  $request->type,
            //             'businessUnit'=> $request->businessUnit,
            //             'directSuperiorID'=> $request->directSuperiorID,
            //             'companyCode' => Session::get('companyCode'), 
            //             'languageCode' => App::getLocale(), 
            //             'sessionID' => 0, 
            //             'sessionUserID' => Session::get('userID'),
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

            // var_dump(json_encode(
            //     [
            //         'companyCode' => Session::get('companyCode'),
            //             'languageCode' => App::getLocale(), 
            //             'sessionUserID' => Session::get('userID'),
            //             'employeeNo'=> $request->employeeNo,
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
            //             'paidAmount'=> (int) $request->paidAmount,
            //             'ticketNo' => $request->ticketNo
            //     ]
            //     ));

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
  
    public function tableUpdateTransTransport(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump(json_encode(
            //     [
            //         'companyCode' => Session::get('companyCode'),
            //         'languageCode' => App::getLocale(), 
            //         'sessionUserID' => Session::get('userID'),
            //         'employeeNo'=> $request->employeeNo,
            //         // 'employeeNo' => $request->employeeNo,
            //         // 'logActionUserID' => Session::get('userID'),
            //         // 'logActionUsername' => Session::get('userName'),
            //         // 'startDate' => Carbon::parse($request->claimDateFrom)->format('Y-d-m'),
            //         // 'endDate' => Carbon::parse($request->claimDateTo)->format('Y-d-m'),
            //         // 'processDate' => $request->processDate, 
            //         // 'type' =>  $request->transportType,
            //         // 'businessUnit'=> $request->businessUnit,
            //         'approvalRemarks'=> 'string',
            //         'logActionUserID'=> 'string',
            //         'logActionUsername'=> 'string',
            //         'status'=> $request->status,
            //         'paidAmount'=> (int) $request->paidAmount,
            //         'ticketNo' => $request->ticketNo
            //     ]
            //     ));

            $response = $client->put(env('API_URL') . '/transport/updatetransportapproval',
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
   
    public function tableUpdateApprovalBusinesstrip(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump(json_encode(
            //     [
            //         'companyCode' => Session::get('companyCode'),
            //             'languageCode' => App::getLocale(), 
            //             'sessionUserID' => Session::get('userID'),
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
            //             'paidAmount'=> $request->paidAmpunt,
            //             'ticketNo' => $request->ticketNo,
            //             'employeeNo'=> $request->employeeNo
            //     ]
            //     ));

            $response = $client->put(env('API_URL') . '/businesstrip/updatebusinesstripapproval',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'languageCode' => App::getLocale(), 
                        'sessionUserID' => Session::get('userID'),
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
                        'paidAmount'=> $request->paidAmpunt,
                        'ticketNo' => $request->ticketNo,
                        'employeeNo'=> $request->employeeNo
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

    public function prosesTransactionActiveDocument(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

                foreach($request->ticketNo as $key=>$value){
                    $param[] = [
                        "companyCode" => Session::get('companyCode'),
                        "sessionID" => 0,
                        "sessionUserID" => 'edwin',
                        "languageCode" => App::getLocale(),
                        'changeBy' => 'edwin',
                        "status" => 'APPROVED',
                        "ticketNo" => $value,
                        "paidAmount" => $request->paidAmount[$key]
                    ];
                }
                
                $response = $client->put(env('API_URL') . '/businesstrip/updatelistticketno',
                    ['body' => json_encode($param)]
                );
    
        } catch (RequestException $e) {
            $response = $e->getResponse();
            var_dump($response);
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            
            foreach($request->data as $value){
                var_dump($value);
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
            

            $response = $client->put(env('API_URL') . '/businesstrip/updatelistticketno',
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump(json_encode(
            //     [
            //         'status'=> $request->status,
            //         'ticketNo' => $request->ticketNo,
            //         'employeeNo'=> $request->employeeNo,
            //         'companyCode' => Session::get('companyCode'),
            //         'languageCode' => App::getLocale(), 
            //         'sessionUserID' => Session::get('userID'),
            //         // 'employeeNo' => $request->employeeNo,
            //         // 'logActionUserID' => Session::get('userID'),
            //         // 'logActionUsername' => Session::get('userName'),
            //         // 'startDate' => Carbon::parse($request->claimDateFrom)->format('Y-d-m'),
            //         // 'endDate' => Carbon::parse($request->claimDateTo)->format('Y-d-m'),
            //         // 'processDate' => $request->processDate, 
            //         // 'type' =>  $request->transportType,
            //         // 'businessUnit'=> $request->businessUnit,
            //         'approvalRemarks'=> 'string',
            //         'logActionUserID'=> 'string',
            //         'logActionUsername'=> 'string'
            // 'status'=> $request->status,
            //             'companyCode' => Session::get('companyCode'),
            //             'ticketNo' => $request->ticketNo,
            //             'employeeNo'=> $request->employeeNo,
            //             'sessionUserID' => Session::get('userID'),
            //             'languageCode' => App::getLocale(), 
            //     ]
                // ));

            $response = $client->put(env('API_URL') . '/tmovertime/updateovertimeapproval',
                ['body' => json_encode(
                    [
                        // 'status'=> $request->status,
                        // 'companyCode' => Session::get('companyCode'),
                        // 'ticketNo' => $request->ticketNo,
                        // 'directSuperiorID'=> $request->directSuperiorID,
                        // 'sessionUserID' => Session::get('userID'),
                        // 'languageCode' => App::getLocale(), 
                        // 'paidAmount'=> (int) $request->paidAmount

                        'status'=> $request->status,
                        'ticketNo' => $request->ticketNo,
                        'employeeNo'=> $request->employeeNo,
                        'companyCode' => Session::get('companyCode'),
                        'languageCode' => App::getLocale(), 
                        'sessionUserID' => Session::get('userID'),
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
                        'logActionUsername'=> 'string'
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

    }
   
    public function tableUpdateTransMedical(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            //  var_dump(json_encode(
            //     [
            //         'status'=> $request->status,
            //         'companyCode' => Session::get('companyCode'),
            //         'ticketNo' => $request->ticketNo,
            //         'directSuperiorID'=> $request->directSuperiorID,
            //         'sessionUserID' => Session::get('userID'),
            //         'languageCode' => App::getLocale(), 
            //         'paidAmount'=> (int) $request->paidAmount
                   
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
                        'paidAmount'=> (int) $request->paidAmount
                       
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
            $response = $client->post(env('API_URL') . '/tmabsence/gettmabsence',
                ['body' => json_encode(
                    [
                        // 'companyCode' => Session::get('companyCode'),
                        // 'employeeNo' => $request->employeeNo,
                        // 'logActionUserID' => Session::get('userID'),
                        // 'logActionUsername' => Session::get('userName'),
                        'companyCode' => Session::get('companyCode'), 
                        'employeeNo'=> $request->employeeNo,
                        'languageCode' => App::getLocale(), 
                        'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                        'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
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

    public function importUpdateReimbursement(Request $request)
    {     
        try{
            $file = $request->file('file_overtime');
            $nama_file = rand().$file->getClientOriginalName();
            $file->move('file_excel', $nama_file);
            $import = new UpdateReimbursement;
            Excel::import($import, public_path('file_excel/'.$nama_file));
            File::delete('file_excel/'.$nama_file);
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
            $file = $request->file('file_overtime');
            $nama_file = rand().$file->getClientOriginalName();
            $file->move('file_excel', $nama_file);
            $import = new UpdateBusinessTrip;
            Excel::import($import, public_path('file_excel/'.$nama_file));
            File::delete('file_excel/'.$nama_file);
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
            $file = $request->file('file_overtime');
            $nama_file = rand().$file->getClientOriginalName();
            $file->move('file_excel', $nama_file);
            $import = new UpdateTransport;
            Excel::import($import, public_path('file_excel/'.$nama_file));
            File::delete('file_excel/'.$nama_file);
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
            $nama_file = rand().$file->getClientOriginalName();
            $file->move('file_excel', $nama_file);
            $import = new UpdateMedical;
            Excel::import($import, public_path('file_excel/'.$nama_file));
            File::delete('file_excel/'.$nama_file);
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
            $nama_file = rand().$file->getClientOriginalName();
            $file->move('file_excel', $nama_file);
            $import = new UpdateOvertime;
            Excel::import($import, public_path('file_excel/'.$nama_file));
            File::delete('file_excel/'.$nama_file);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $objError = (object) ['status' => false, 'message' => $failures[0]->errors()[0]];
            return array(0 => $objError);
        }
        
        return $import->getArrResult();
    }
}