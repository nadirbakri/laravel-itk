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

class TimeManagementController extends Controller
{
    public function pageTimeManagement() 
    {
        return view ('time_management.tm_main');
    }

    public function pageTimeRecordingProcessForm() 
    {
        return view ('time_management.tm_process_form');
    }

    public function pageUpdateAbsenteeismData()
    {
        return view ('time_management.tm_update_absenteeism_data');
    }

    public function pageUpdateShiftByDate()
    {
        return view ('time_management.tm_update_shift_by_date');
    }

    public function pageInputBalanceLeave()
    {
        return view ('time_management.tm_input_balance_leave');
    }

    public function pageCompanyWorkingCalendar()
    {
        return view ('time_management.tm_company_working_calendar');
    }

    public function pageLeaveTransactionByEmployeeNo()
    {
        return view ('time_management.tm_leave_transaction_by_employee_no');
    }

    public function tableCompanyWorkingCalendar()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/tmcalendar/gettmcalendar',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableInputBalanceLeave(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pemasterleave/getpemasterleave',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }

        // var_dump($arrResult);
    }

    public function dataDetailRankingPersonel(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmranking/getgmranking',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'rankingCode' => $request->rankingCode,
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return view('personel.personel_ranking_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailPeriodTM () 
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/referencetm/getreferencetm',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents()); 

        return response()->json($arrResult->dataListSet);
    }

    public function dataDetailInputBalanceLeave(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pemasterleave/getpemasterleave',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'leaveCode' => $request->leaveCode,
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  
        // var_dump($arrResult->dataListSet);
        return view('time_management.tm_input_balance_leave_detail', ['data' => $arrResult->dataListSet]);
    }

    // public function prosesUpdateShiftByDate(Request $request)
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     try {
    //         $client = new Client([
    //             'headers' => [ 'Content-Type' => 'application/json',
    //             'Authorization' => 'Bearer ' . Session::get('token') ]
    //         ]);
            
    //         $response = $client->put(env('API_URL') . '/tempabsentmachine/updateshiftbydate',
    //             ['body' => json_encode(
    //                 [
    //                     "companyCode" => Session::get('companyCode'),
    //                     "dateFrom" => $request->date_from,
    //                     "dateTo" => $request->date_to,
    //                     "shiftFrom" => $request->shift_from,
    //                     "shiftTo" => $request->shift_to,
    //                     "locationCode" => $request->location,
    //                     "religionCode" => $request->religion,
    //                     "positionCode" => $request->position,
    //                     "level" = [
    //                         "levelType" => ,
    //                         "levelCode" => 
    //                     ],
    //                     "languageCode" => App::getLocale(),
    //                     "sessionID" => 0,
    //                     "sessionUserID" => Session::get('userID'),
    //                     "logActionUserID" => Session::get('userID'),
    //                     "logActionUsername" => Session::get('userName')
    //                 ]
    //             )]
    //         );
    //     } catch (RequestException $e) {
    //         var_dump($e->getResponse());
    //     }

    //     $arrResult = json_decode($response->getBody()->getContents());

    //     return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    // }

    public function prosesInputBalanceLeaveTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            // var_dump($request->expired_date);
            // var_dump($request->employee_no);
            // var_dump($request->leave_name);
            $response = $client->put(env('API_URL') . '/pemasterleave',
                ['body' => json_encode(
                    [
                        "companyCode" => Session::get('companyCode'),
                        "employeeNo" => $request->employee_no,
                        "leaveCode" => $request->leave_code,
                        "leaveBalance" => (int) $request->leave_balance,
                        "leaveBalanceBefore" => (int) $request->leave_balance_before,
                        "leaveBalanceBeforeExpiredDate" => $request->expired_date,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "languageCode" => App::getLocale(),
                        "sessionID" => 0,
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesCompanyWorkingCalendar(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            // var_dump($request->calendar_date);
            if($request->record_function == 'Add'){
                $response = $client->post(env('API_URL') . '/tmcalendar',
                    ['body' => json_encode(
                        [
                            "companyCode" => Session::get('companyCode'),
                            "calendar" => $request->calendar_date,
                            "description" => $request->description,
                            "flagType" => $request->calendar_type,
                            "locationCode" => $request->location,
                            "changedNo" => 0,
                  
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            'sessionUserID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/position',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'positionCode' => $request->position_code,
                            'positionName' => $request->position_name,
                            'supervisorPositionCode' => $request->supervisor_position_code,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }
}
