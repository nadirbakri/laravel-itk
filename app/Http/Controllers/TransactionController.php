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
                        'directSuperiorID'=> $request->directSuperiorID,
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
            return Datatables::of($arrResult->dataListSet)->make(true);
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
            return Datatables::of($arrResult->dataListSet)->make(true);
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
            //         'directSuperiorID'=> $request->directSuperiorID,
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
                        'directSuperiorID'=> $request->directSuperiorID,
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
    public function tableDetailReimbursement(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            var_dump(json_encode(
                [
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
                ));
            $response = $client->post(env('API_URL') . '/tmreimbursement/getreimbursementdetaillistall',
                ['body' => json_encode(
                    [
                        // 'companyCode' => Session::get('companyCode'),
                        // 'employeeNo' => $request->employeeNo,
                        // 'logActionUserID' => Session::get('userID'),
                        // 'logActionUsername' => Session::get('userName'),
                        'startDate' => Carbon::parse($request->startDate)->format('Y-m-d'),
                        'endDate' => Carbon::parse($request->endDate)->format('Y-m-d'),
                        'employeeNo'=> $request->directSuperiorID,
                        'reimbursementType'=> $request->medicalType1,
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
    
    public function tableDetailTransport(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump(json_encode(
            //     [
            //         'startDate' => Carbon::parse($request->claimDateFrom)->format('Y-d-m'),
            //         'endDate' => Carbon::parse($request->claimDateTo)->format('Y-d-m'),
            //         'processDate'=> Carbon::parse($request->processDate)->format('Y-d-m'),
            //         'type' =>  $request->transportType,
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

}