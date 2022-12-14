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

class MasterDataController extends Controller
{
    public function pageMasterData(){
        return view('master_data.master_data_main');
    }

    public function pageMasterDataEmployeeMaster(){
        return view('master_data.master_data_employee_master');
    }

    public function pageMasterDataEmployeeGroup(){
        return view('master_data.master_data_employee_group');
    }

    public function pageMasterDataEmployeeGroupDetail(){
        return view('master_data.master_data_employee_group_detail');
    }
   
    public function pageMasterDataEmployeeGroupReimbursement(){
        return view('master_data.master_data_employee_group_reimbursement');
    }
    
    public function pageMasterDataHolidayCalender(){
        return view('master_data.master_data_holiday_calender');
    }
    
    public function pageMasterDataBussinesTrip(){
        return view('master_data.master_data_bussines_trip');
    }
    
    public function pageMasterDataBussinesTripDetail(){
        return view('master_data.master_data_bussines_trip_detail');
    }
  
    public function pageMasterDataEmployeeGroupReimbursementDetail(){
        return view('master_data.master_data_reimbursement_detail');
    }

    public function tabelDetailEmployee(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmgroup/getgroupcode',
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
                        // 'languageCode' => App::getLocale(), 
                        // 'sessionID' => 0, 
                        // 'sessionUserID' => Session::get('userID'),
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
   
    public function tabelDetailReimbursement(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmgroup/getgroupcodereimbursement',
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
   
    public function tabelDetailBusinessTrip(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmgroup/getgroupcodebusinesstrip',
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
   
    public function tabelDetailEmployeeGroup(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmgroup/getemployeegroupdetails',
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
                        'sessionUserID' => Session::get('userID'),
                        // 'sessionID' => 0, 
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
   
    public function tabelDetailEmail(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            

            $response = $client->post(env('API_URL') . '/gmgroup/getemployeegroupdetails',
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
                        'sessionUserID' => Session::get('userID'),
                        // 'sessionID' => 0, 
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
    //    var_dump($arrResult->dataListSet->emailSetting);
    // foreach($arrResult->dataListSet as $key=>$value){
    //     foreach($key=>$value as )
    // }
        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet[]->emailSettings)->make(true);
        }
    }
   
    
   
    public function tableDirectApproval(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/groupapproval/getgroupapproval',
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
                        'tableApproval' => "PERMIT", 
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
   
    public function tableEmployeeGroupDetail(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmgroupapprovalmember/getgmgroupapprovalmember',
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
   
    public function tableEmployeeGroupTambahUser(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmgroupapprovalmember/getpersonenoincludeapprovalmember',
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
    
    public function tableHolidayCalendar(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/tmcalendar/gettmcalendar',
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
   
    public function tableEmailSettings(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmgroupapprovalcc/getgroupapprovalcc',
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
                        'tableAppproval' => "leave",
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

    public function prosesEmployeeGroup(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

                foreach($request->approvalCode as $key=>$value){
                    $a[] = [
                        "approvalLevel" => (int) $request->approvalLevel[$key],
                        "approvalCode" => $value
                    ];
                }

                foreach($request->groupName as $key=>$value){
                    $b[] = [
                        "groupID" => $request->groupID[$key],
                        "groupName" => $value
                    ];
                }
                // var_dump(json_encode(
                //     [
                //         'companyCode' => Session::get('companyCode'),
                //         'groupCode' => $request->group_code,
                //         'groupName' => $request->group_name,
                //         'directApproval' => $a,
                //         "sessionID" => 0,
                //         "sessionUserID" => Session::get('userID'),
                //         "languageCode" => App::getLocale()
                //     ]
                //     ));
                $response = $client->post(env('API_URL') . '/gmgroup/insertgroupcode',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'groupCode' => $request->group_code,
                            'groupName' => $request->group_name,
                            'directApproval' => $a,
                            'emailSetting' =>$b,
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "languageCode" => App::getLocale()
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
        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }
    
   
    public function prosesEmployeeReimbursement(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

                foreach($request->approvalCode as $key=>$value){
                    $a[] = [
                        "approvalLevel" => (int) $request->approvalLevel[$key],
                        "approvalCode" => $value,
                        "limit" => (int) $request->total_limit[$key]
                    ];
                }

                foreach($request->groupName as $key=>$value){
                    $b[] = [
                        "groupID" => $request->groupID[$key],
                        "groupName" => $value
                    ];
                }
                // var_dump(json_encode(
                //     [
                //         'companyCode' => Session::get('companyCode'),
                //         'groupCode' => $request->group_code,
                //         'groupName' => $request->group_name,
                //         'limit' => $request->limit,
                //         'directApproval' => $a,
                //         'emailSetting' =>$b,
                //         "sessionID" => 0,
                //         "sessionUserID" => Session::get('userID'),
                //         "languageCode" => App::getLocale()
                //     ]
                //     ));
                $response = $client->post(env('API_URL') . '/gmgroup/insertgroupcodereimbursement',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'groupCode' => $request->group_code,
                            'groupName' => $request->group_name,
                            'limit' => $request->limit,
                            'directApproval' => $a,
                            'emailSetting' =>$b,
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "languageCode" => App::getLocale()
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
        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }
   
    public function prosesEmployeeHolidayCalendar(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

                // var_dump(json_encode(
                //     [
                //         'companyCode' => Session::get('companyCode'),
                //         "sessionID" => 0,
                //         "sessionUserID" => Session::get('userID'),
                //         "languageCode" => App::getLocale(),
                //         'calendar' => $request->date_holiday,
                //         'description' => $request->description_date
                //     ]
                //     ));
                $response = $client->post(env('API_URL') . '/tmcalendar',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "languageCode" => App::getLocale(),
                            'calendar' => $request->date_holiday,
                            'description' => $request->description_date,
                            'changedBy' => Session::get('userID'),
                            'createdBy' => Session::get('userID')

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
        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }
   
    public function prosesEmployeeBusinessTrip(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

                foreach($request->approvalCode as $key=>$value){
                    $a[] = [
                        "approvalLevel" => (int) $request->approvalLevel[$key],
                        "approvalCode" => $value,
                        "limit" => (int) $request->total_limit[$key]
                    ];
                }

                foreach($request->groupName as $key=>$value){
                    $b[] = [
                        "groupID" => $request->groupID[$key],
                        "groupName" => $value
                    ];
                }
                // var_dump(json_encode(
                //     [
                //         'companyCode' => Session::get('companyCode'),
                //         'groupCode' => $request->group_code,
                //         'groupName' => $request->group_name,
                //         'directApproval' => $a,
                //         'emailSetting' =>$b,
                //         "sessionID" => 0,
                //         "sessionUserID" => Session::get('userID'),
                //         "languageCode" => App::getLocale()
                //     ]
                //     ));
                $response = $client->post(env('API_URL') . '/gmgroup/insertgroupcodebusinesstrip',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'groupCode' => $request->group_code,
                            'groupName' => $request->group_name,
                            'directApproval' => $a,
                            'emailSetting' =>$b,
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "languageCode" => App::getLocale()
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
        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }
    
    public function prosesEmployeeGroupDetail(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

                foreach($request->fullName as $key=>$value){
                    $a[] = [
                        "employeeNo" =>$request->employeeNo[$key],
                        "fullName" => $value
                    ];
                }
                

                // var_dump(json_encode(
                //     [
                //         'companyCode' => Session::get('companyCode'),
                //             'groupCode' => $request->group_code,
                //             'groupMember' => $a,
                //             'emailSetting' => $b,
                //             "sessionID" => 0,
                //             "sessionUserID" => Session::get('userID'),
                //             "languageCode" => App::getLocale()
                //     ]
                //     ));
                $response = $client->post(env('API_URL') . '/gmgroup/insertemployeegroupdetails',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'groupCode' => $request->group_code,
                            'groupMember' => $a,
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "languageCode" => App::getLocale()
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
        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }
}