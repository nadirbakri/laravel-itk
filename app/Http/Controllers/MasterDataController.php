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
    public function pageMasterData(Request $request){
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
            return view ('master_data.master_data_main', ['dataMenu' => [], 'dataParent' => \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess([], null)]);
        }else{
            return view ('master_data.master_data_main', ['dataMenu' => $arrResult->dataListSet, 'dataParent' => \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess($arrResult->dataListSet, 17)]);
        }

        // return view('master_data.master_data_main');
    }

    public function pageMasterDataEmployeeMaster(){
        return view('master_data.master_data_employee_master');
    }

    public function pageMasterDataEmployeeGroup(){
        return view('master_data.master_data_employee_group');
    }
   
    public function pageMasterDataEmployeeGroupLeave(){
        return view('master_data.master_data_employee_groupleave');
    }
   
    public function pageMasterDataEmployeeGroupOvertime(){
        return view('master_data.master_data_employee_groupovertime');
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

    public function pageMasterDataEmployeeGroupMultipleCheckin(){
        return view('master_data.master_data_employee_group_multiple_checkin');
    }

    public function tabelDetailEmployee(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/gmgroup/getgroupcode',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode')
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

    public function tabelDetailEmployeeMaster(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeMaster/getPeMasterGrid',
                ['body' => json_encode(
                    [
                        'recordStatus' => 'A',
                        'companyCode' => Session::get('companyCode')
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
  
    public function tabelDetailEmployeeLeave(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/gmgroup/getgroupcodeleave',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode')
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

    public function tabelDetailEmployeeOvertime(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/gmgroup/getgroupcodeovertime',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode')
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/gmgroup/getgroupcodereimbursement',
                ['body' => json_encode(
                    [
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
        // dd($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tabelEmployeeGroupMultipleCheckin(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/Mobile/PeMasterESS/GetESSWFA',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'), 
                        'levelType' => $request->levelType,
                        'levelCode' => $request->levelCode,
                        'languageCode' => App::getLocale(),
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
        // exit;

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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/gmgroup/getgroupcodebusinesstrip',
                ['body' => json_encode(
                    [
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/gmgroup/getemployeegroupdetails',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => App::getLocale(), 
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
   
    public function tabelDetailEmail(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            

            $response = $client->post(env('API_URL') . '/mobile/gmgroup/getemployeegroupdetails',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => App::getLocale(), 
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
            return Datatables::of($arrResult->dataListSet[]->emailSettings)->make(true);
        }
    }
   
    
   
    public function tableDirectApproval(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/GroupApproval/GetGroupApproval',
                ['body' => json_encode(
                    [
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/gmgroupapprovalmember/getgmgroupapprovalmember',
                ['body' => json_encode(
                    [
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

    public function getMasterDataEmployeeGroupDetail(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/Mobile/GmGroup/getlistavailablemembergroup',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'), 
                        'employeeNo' => Session::get('userID'),
                        'languageCode' => App::getLocale()
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
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }
   
    public function tableEmployeeGroupTambahUser(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/gmgroupapprovalmember/getpersonenoincludeapprovalmember',
                ['body' => json_encode(
                    [
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/TmCalendar/getTmCalendar',
                ['body' => json_encode(
                    [
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/gmgroupapprovalcc/getgroupapprovalcc',
                ['body' => json_encode(
                    [
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

    public function getMasterData(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/gmgroup/getgroupcode',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'), 
                        'groupCode' => $request->groupCode
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

        return response()->json($arrResult->dataListSet);
    }

    public function getEmployeeMasterData(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeMaster/getPeMasterDetail',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employeeNo,
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
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

        return response()->json($arrResult->dataListSet);
    }

    public function getLeaveMasterData(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/gmgroup/getgroupcodeleave',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'), 
                        'groupCode' => $request->groupCode
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

        return response()->json($arrResult->dataListSet);
    }

    public function getOvertimeMasterData(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/gmgroup/getgroupcodeovertime',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'), 
                        'groupCode' => $request->groupCode
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

        return response()->json($arrResult->dataListSet);
    }

    public function getDetailMasterData(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/gmgroup/getemployeegroupdetails',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'), 
                        'groupCode' => $request->groupCode
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

        return response()->json($arrResult->dataListSet);
    }

    public function getReimbursementMasterData(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/gmgroup/getgroupcodereimbursement',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'), 
                        'groupCode' => $request->groupCode
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

        return response()->json($arrResult->dataListSet);
    }

    public function getHolidayCalendarMasterData(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/TmCalendar/getTmCalendar',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'), 
                        'calendar' => $request->calendar
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

        return response()->json($arrResult->dataListSet);
    }

    public function getBusinessTripMasterData(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/gmgroup/getgroupcodebusinesstrip',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'), 
                        'groupCode' => $request->groupCode
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

        return response()->json($arrResult->dataListSet);
    }

    public function prosesEmployeeGroup(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if(isset($request->approvalCode)){
                foreach($request->approvalCode as $key=>$value){
                    $a[] = [
                        "approvalLevel" => (int) $request->approvalLevel[$key],
                        "approvalCode" => $value,
                        "delegateGroup" => $request->delegateGroup[$key]
                    ];
                }
            }else{
                $a = [];
            }

            if(isset($request->groupName)){
                foreach($request->groupName as $key=>$value){
                    $b[] = [
                        "groupID" => $request->groupID[$key],
                        "groupName" => $value
                    ];
                }
            }else{
                $b = [];
            }

            $response = $client->post(env('API_URL') . '/mobile/gmgroup/insertgroupcode',
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
 
    public function prosesEmployeeGroupLeave(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if(isset($request->approvalCode)){
                foreach($request->approvalCode as $key=>$value){
                    $a[] = [
                        "approvalLevel" => (int) $request->approvalLevel[$key],
                        "approvalCode" => $value,
                        "delegateGroup" => $request->delegateGroup[$key]
                    ];
                }
            }else{
                $a = [];
            }

            if(isset($request->groupName)){
                foreach($request->groupName as $key=>$value){
                    $b[] = [
                        "groupID" => $request->groupID[$key],
                        "groupName" => $value
                    ];
                }
            }else{
                $b = [];
            }

            $response = $client->post(env('API_URL') . '/mobile/gmgroup/insertgroupcodeleave',
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

    public function prosesEmployeeGroupOvertime(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if(isset($request->approvalCode)){
                foreach($request->approvalCode as $key=>$value){
                    $a[] = [
                        "approvalLevel" => (int) $request->approvalLevel[$key],
                        "approvalCode" => $value
                    ];
                }
            }else{
                $a = [];
            }

            if(isset($request->groupName)){
                foreach($request->groupName as $key=>$value){
                    $b[] = [
                        "groupID" => $request->groupID[$key],
                        "groupName" => $value
                    ];
                }
            }else{
                $b = [];
            }

            $response = $client->post(env('API_URL') . '/mobile/gmgroup/insertgroupcodeovertime',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if(isset($request->approvalCode)){
                foreach($request->approvalCode as $key=>$value){
                    $a[] = [
                        "approvalLevel" => (int) $request->approvalLevel[$key],
                        "approvalCode" => $value,
                        "limit" => (int) $request->total_limit[$key]
                    ];
                }
            }else{
                $a = [];
            }

            if(isset($request->groupName)){
                foreach($request->groupName as $key=>$value){
                    $b[] = [
                        "groupID" => $request->groupID[$key],
                        "groupName" => $value
                    ];
                }
            }else{
                $b = [];
            }
            // dd(json_encode(
            //     [
            //         'companyCode' => Session::get('companyCode'),
            //             'groupCode' => $request->group_code,
            //             'groupName' => $request->group_name,
            //             'limit' => $request->limit,
            //             'directApproval' => $a,
            //             'emailSetting' =>$b,
            //             "sessionID" => 0,
            //             "sessionUserID" => Session::get('userID'),
            //             "languageCode" => App::getLocale()
            //     ]
            // ));
            $response = $client->post(env('API_URL') . '/mobile/gmgroup/insertgroupcodereimbursement',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'groupCode' => $request->group_code,
                        'groupName' => $request->group_name,
                        // 'limit' => $request->limit,
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
                'verify' => false,
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
                $response = $client->post(env('API_URL') . '/mobile/TmCalendar',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if(isset($request->approvalCode)){
                foreach($request->approvalCode as $key=>$value){
                    $a[] = [
                        "approvalLevel" => (int) $request->approvalLevel[$key],
                        "approvalCode" => $value,
                        "limit" => (int) $request->total_limit[$key]
                    ];
                }
            }else{
                $a = [];
            }

            if(isset($request->groupName)){
                foreach($request->groupName as $key=>$value){
                    $b[] = [
                        "groupID" => $request->groupID[$key],
                        "groupName" => $value
                    ];
                }
            }else{
                $b = [];
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
            $response = $client->post(env('API_URL') . '/mobile/gmgroup/insertgroupcodebusinesstrip',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if(isset($request->fullName)){
                foreach($request->fullName as $key=>$value){
                    $a[] = [
                        "employeeNo" =>$request->employeeNo[$key],
                        "fullName" => $value
                    ];
                }
            }else{
                $a = [];
            }

            // var_dump(json_encode(
            //     [
            //         'companyCode' => Session::get('companyCode'),
            //         'groupCode' => $request->group_code,
            //         'groupName' => $request->group_name,
            //         'groupMember' => $a,
            //         "sessionID" => 0,
            //         "sessionUserID" => Session::get('userID'),
            //         "languageCode" => App::getLocale()
            //     ]
            //     ));
            $response = $client->post(env('API_URL') . '/mobile/gmgroup/insertemployeegroupdetails',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'groupCode' => $request->group_code,
                        'groupName' => $request->group_name,
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

    public function selectLevelEmployeeGroupMultipleCheckin(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            for($i = 0; $i < $request->level_format; $i++){
                if(isset($request->{'level' . ($i+1)})){
                    $dataLevel = $request->{'level' . ($i+1)};
                    $noLevel = ($i+1);
                }
            }
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

        return response()->json(['dataLevel' => $dataLevel, 'noLevel' => $noLevel]);
    }
    
    public function prosesEmployeeGroupMultipleCheckin(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if(isset($request->employeeNo)){
                foreach($request->employeeNo as $key => $value){
                    $a[] = [
                        'companyCode' => Session::get('companyCode'),
                        "employeeNo" => $value,
                        "wfa" => isset($request->wfa[$key]) ? true : false,
                        "createdBy" => Session::get('userID'),
                        "changedBy" => Session::get('userID'),
                        "languageCode" => App::getLocale()
                    ];
                }
            }else{
                $a = [];
            }

            $response = $client->post(env('API_URL') . '/PeMasterESS/BulkUpdateWFA',
                [
                    'body' => json_encode($a)
                ]
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