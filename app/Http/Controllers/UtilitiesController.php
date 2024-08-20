<?php

namespace App\Http\Controllers;

use App\Exports\AuditTrailExport;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;
use DataTables;
use Excel;

class UtilitiesController extends Controller
{
    public function pageUtilitiesMain(Request $request)
    {
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

        if($arrResult->dataListSet == null){
            return view ('utilities.utilities_main', ['dataMenu' => [], 'dataParent' => \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess([], null)]);
        }else{
            return view ('utilities.utilities_main', ['dataMenu' => $arrResult->dataListSet, 'dataParent' => \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess($arrResult->dataListSet, 42)]);
        }

    	// return view('utilities.utilities_main');
    }

    public function pageOrganizationStructureUtilities()
    {
    	return view('utilities.utilities_organization_structure');
    }

    public function pageUserSecurityMaintenanceUtilities()
    {
    	return view('utilities.utilities_user_security_maintenance');
    }

    public function pageMenuMasterUtilities()
    {
    	return view('utilities.utilities_menu_master');
    }

    public function pageMenuMasterWebUtilities()
    {
    	return view('utilities.utilities_menu_master_web');
    }

    public function pageMenuMasterMobileUtilities()
    {
    	return view('utilities.utilities_menu_master_mobile');
    }

    public function pageMenuMasterMobileSettingUtilities()
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/MasterMenuMobile/getlistmenumobile',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
						"languageCode" => strtoupper(App::getLocale()),
						"logActionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userID')
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

        if(empty($arrResult) && !isset($arrResult->dataListSet)){
            return view('utilities.utilities_menu_master_mobile_setting', ['data' => []]);
        }else{
            return view('utilities.utilities_menu_master_mobile_setting', ['data' => $arrResult->dataListSet]);
        }
    }

    public function pageAuthorizationCodeGroupUtilities()
    {
    	return view('utilities.utilities_authorization_code_group');
    }

    public function pageUserAccessGroupUtilities()
    {
    	return view('utilities.utilities_user_access_group');
    }

    public function pageChangeEmployeeNumberUtilities()
    {
    	return view('utilities.utilities_change_employee_number');
    }

    public function pageUserLogUtilities()
    {
    	return view('utilities.utilities_user_log');
    }

    public function pageAuditTrailUtilities()
    {
    	return view('utilities.utilities_audit_trail');
    }

    public function pageExportPersonalDataUtilities()
    {
    	return view('utilities.utilities_export_personal_data');
    }

    public function pageDashboardESSUtilities()
    {
    	return view('utilities.utilities_dashboard_ess');
    }

    public function pageNewsMasterUtilities()
    {
    	return view('admin_menu.admin_main_menu_news_master');
    }

    public function pageAnnouncementUtilities()
    {
    	return view('admin_menu.admin_main_announcement');
    }

    public function pageCompanyUtilities()
    {
    	return view('utilities.utilities_company_master');
    }

    public function pageProcessUserIDUtilities()
    {
    	return view('utilities.utilities_process_user_id');
    }

    public function pageMasterBannerUtilities()
    {
    	return view('utilities.utilities_master_banner');
    }

    public function pageAnnouncementCategoryUtilities()
    {
    	return view('utilities.utilities_announcement_category');
    }

    public function pageNewsCategoryUtilities()
    {
    	return view('utilities.utilities_news_category');
    }

    public function tableUserSecurityMaintenanceUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/User/getUserView',
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

    public function tableMenuMasterUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/MenuMasterWebDetail/getMenuMasterWebDetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'groupAccessID' => $request->groupAccessID,
                        'userID' => Session::get('userID'),
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

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableAuthorizationCodeGroupUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GroupAuthorize/getGroupAuthorize',
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

    public function tableCompanyUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/Company/getcompany',
                ['body' => json_encode(
                    [
                        'userID' => Session::get('userID'),
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

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableUserAccessGroupUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GroupUserAccess/getGroupUserAccess',
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

    public function tableUserLogUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/UserLog/getUserLog',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => $request->user_id,
                        'actionTime' => $request->log_date,
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

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableChangeEmployeeNumberEmployeeUtilities(Request $request)
    {
        if ($request->ajax()) {
        	$data = collect([
        		(object) [
        			'employee_no' => 1110001,
        			'employee_name' => 'Joko Santoso',
        			'employee_nickname' => 'Joko'
        		],
        	]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableMenuMasterWebUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/MenuMasterWeb/getMenuMasterWeb',
                ['body' => json_encode(
                    [
						"languageCode" => App::getLocale(),
						"logActionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userID')
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

        if(empty($arrResult) && !isset($arrResult->dataListSet)){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableMenuMasterMobileUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/MasterMenuMobile/getlistmenumobilenc',
                ['body' => json_encode(
                    [
						"languageCode" => strtoupper(App::getLocale()),
						"logActionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userID')
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

        if(empty($arrResult) && !isset($arrResult->dataListSet)){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableMenuMasterMobileSettingUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/MasterMenuMobile/getlistmenumobile',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
						"languageCode" => strtoupper(App::getLocale()),
						"logActionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userID')
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

        if(empty($arrResult) && !isset($arrResult->dataListSet)){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableMasterBannerUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/MasterBanner/getmasterbanner',
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

        if(empty($arrResult) && !isset($arrResult->dataListSet)){
            return Datatables::of([])->make(true);
        }else{
            if(empty($arrResult->dataListSet)){
                return Datatables::of([])->make(true);
            }else{
                return Datatables::of($arrResult->dataListSet)->make(true);
            }
        }
    }

    public function tableAnnouncementCategoryUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/Announcement/getAnnouncementCat',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        "languageCode" => strtoupper(App::getLocale()),
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

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableNewsCategoryUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/News/getNewsCat',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        "languageCode" => strtoupper(App::getLocale()),
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

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function dataDetailUserSecurityMaintenanceUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/User/getUserView',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => $request->userID,
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

        return view('utilities.utilities_user_security_maintenance_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailAuthorizationCodeGroupUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GroupAuthorize/getGroupAuthorize',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'groupAuthorizeCode' => (int) $request->groupAuthorizeCode,
                        'userID' => Session::get('userID'),
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

        return view('utilities.utilities_authorization_code_group_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailCompanyUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/Company/getcompany',
                ['body' => json_encode(
                    [
                        'companyCode' => $request->companyCode,
                        'userID' => Session::get('userID'),
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

        return view('utilities.utilities_company_master_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailUserAccessGroupUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GroupUserAccess/getGroupUserAccess',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'groupAccessID' => $request->groupAccessID,
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response2 = $client->post(env('API_URL') . '/personel/GroupUserAccessDetail/getGroupUserAccessDetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'groupAccessID' => $request->groupAccessID,
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
        $arrResult2 = json_decode($response2->getBody()->getContents());  

        return view('utilities.utilities_user_access_group_detail', ['data' => $arrResult->dataListSet, 'data2' => $arrResult2->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailMenuMasterWebUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/MenuMasterWeb/getMenuMasterWeb',
                ['body' => json_encode(
                    [
                        'menuID' => $request->menuID,
                        "languageCode" => App::getLocale(),
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

        if(empty($arrResult) && !isset($arrResult->dataListSet)){
            return view('utilities.utilities_menu_master_web_detail', ['data' => [], 'func' => $request->func]);
        }else{
            return view('utilities.utilities_menu_master_web_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
        }
    }

    public function dataDetailMenuMasterMobileUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/MasterMenuMobile/getlistmenumobilenc',
                ['body' => json_encode(
                    [
                        'menuID' => $request->menuID,
                        "languageCode" => strtoupper(App::getLocale()),
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

        if(empty($arrResult) && !isset($arrResult->dataListSet)){
            return view('utilities.utilities_menu_master_mobile_detail', ['data' => [], 'func' => $request->func]);
        }else{
            return view('utilities.utilities_menu_master_mobile_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
        }
    }

    public function dataDetailMenuMasterMobileSettingUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/MasterMenuMobile/getlistmenumobile',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'menuID' => $request->menuID,
                        "languageCode" => strtoupper(App::getLocale()),
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

        if(empty($arrResult) && !isset($arrResult->dataListSet)){
            return view('utilities.utilities_menu_master_mobile_setting_detail', ['data' => []]);
        }else{
            return view('utilities.utilities_menu_master_mobile_setting_detail', ['data' => $arrResult->dataListSet]);
        }
    }

    public function dataDetailMasterBannerUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/MasterBanner/getmasterbanner',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'bannerID' => $request->bannerID
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

        if(empty($arrResult) && !isset($arrResult->dataListSet)){
            return view('utilities.utilities_master_banner_detail', ['data' => [], 'func' => $request->func]);
        }else{
            return view('utilities.utilities_master_banner_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
        }
    }

    public function dataDetailAnnouncementCategoryUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/Announcement/getAnnouncementCat',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'categoryCode' => $request->categoryCode,
                        "languageCode" => strtoupper(App::getLocale()),
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

        return view('utilities.utilities_announcement_category_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailNewsCategoryUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/News/getNewsCat',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'categoryCode' => $request->categoryCode,
                        "languageCode" => strtoupper(App::getLocale()),
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

        return view('utilities.utilities_news_category_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function tableUserSecurityMaintenanceLevelUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/User/getUserLevelList',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => $request->userID,
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

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableUserSecurityMaintenanceCompanyUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/User/getUserDetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => $request->userID,
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

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet[0]->detailList)->make(true);
        }
    }

    public function tableUserSecurityMaintenanceModuleUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/User/getUserAccessView',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => $request->userID,
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

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableUserSecurityMaintenanceLevelAuthorizationUtilities(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'levelCode' => 'ALL',
                    'levelName' => 'All'
                ]
            ]);

            try {
                $client = new Client([
                'verify' => false,
                    'headers' => [ 'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . Session::get('token') ]
                ]);

                $response = $client->post(env('API_URL') . '/personel/Level/getLevel',
                    ['body' => json_encode(
                        [
                            'recordStatus' => 'A',
                            'companyCode' => Session::get('companyCode'),
                            'levelType' => $request->levelType
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
                return Datatables::of($data)->make(true);
            }else{
                $data = $data->merge($arrResult->dataListSet);
                return Datatables::of($data)->make(true);
            }

            // return response()->json($data);
        }
    }

    public function tableUserAccessGroupUserUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GroupUserAccessDetail/getGroupUserAccessDetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'groupAccessID' => $request->groupAccessID,
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

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableMenuMasterConfigureMenuUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/MenuMasterWeb/getConfigureMenu',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'groupAccessID' => $request->groupAccessID,
                        'moduleID' => $request->moduleID,
                        'userID' => Session::get('userID'),
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

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableMenuMasterMobileChildUtilities(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/MasterMenuMobile/getlistmenumobile',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'menuID' => $request->menuID,
                        "languageCode" => strtoupper(App::getLocale()),
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

        if(!isset($arrResult->dataListSet[0]->menuChild) && empty($arrResult)){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet[0]->menuChild)->make(true);
        }
    }

    public function statusAuthorizationCodeGroupUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/GroupAuthorize',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'groupAuthorizeCode' => (int) $request->groupAuthorizeCode,
                        'groupAuthorizeDesc' => $request->groupAuthorizeDesc,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
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

    public function statusUserAccessGroupUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/GroupUserAccess',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'groupAccessID' => $request->groupAccessID,
                        'groupAccessName' => $request->groupAccessName,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
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

    public function statusUserUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/User',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'userID' => $request->userID,
                        "token" => "",
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "sessionUserID" => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
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

    public function statusCompanyUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/Company',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => $request->companyCode,
                        'companyName' => $request->companyName,
                        'npwpNo' => $request->npwpNo,
                        'holdingCompany' => $request->holdingCompany,
                        'locationCode' => $request->locationCode,
                        'address' => $request->address,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "sessionUserID" => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
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

    public function statusAnnouncementCategoryUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/mobile/Announcement/updateAnnouncementCat',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'categoryCode' => $request->categoryCode,
                        'categoryName' => $request->categoryName,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => strtoupper(App::getLocale())
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

    public function statusNewsCategoryUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/mobile/News/updateNewsCat',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'categoryCode' => $request->categoryCode,
                        'categoryName' => $request->categoryName,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => strtoupper(App::getLocale())
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

    public function deleteAnnouncementCategoryUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/mobile/Announcement/deleteAnnouncementCategory',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'categoryCode' => $request->categoryCode,
                        'categoryName' => $request->categoryName,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => strtoupper(App::getLocale())
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

    public function deleteNewsCategoryUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/mobile/News/deleteNewsCategory',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'categoryCode' => $request->categoryCode,
                        'categoryName' => $request->categoryName,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => strtoupper(App::getLocale())
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

    public function prosesAuthorizationCodeGroupUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([  
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/GroupAuthorize',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'groupAuthorizeCode' => (int) $request->group_authorization_code,
                            'groupAuthorizeDesc' => $request->group_authorization_description,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'sessionID' => 0,
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/GroupAuthorize',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'groupAuthorizeCode' => (int) $request->group_authorization_code,
                            'groupAuthorizeDesc' => $request->group_authorization_description,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'sessionID' => 0,
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }


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

    public function prosesCompanyUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/Company',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => $request->company_code,
                            'companyName' => $request->company_name,
                            'npwpNo' => $request->npwp_no,
                            'holdingCompany' => isset($request->check_holding_company) ? $request->company_code : $request->holding_company,
                            'locationCode' => $request->location_code,
                            'address' => $request->address,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'sessionID' => 0,
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/Company',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => $request->company_code,
                            'companyName' => $request->company_name,
                            'npwpNo' => $request->npwp_no,
                            'holdingCompany' => $request->holding_company,
                            'locationCode' => $request->location_code,
                            'address' => $request->address,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'sessionID' => 0,
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }


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

    public function prosesUserAccessGroupUtilities(Request $request)
    {
        $param = [];
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/GroupUserAccess',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'groupAccessID' => $request->group_id,
                            'groupAccessName' => $request->group_name,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'sessionID' => 0,
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );

                if(count($request->userid_group) > 0){
                    foreach($request->userid_group as $key => $value){
                        $param[] = [
                            'recordStatus' => 'A',
                            'companyCode' => Session::get('companyCode'),
                            'groupAccessID' => $request->group_id,
                            'userID' => $value,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionUserID' => Session::get('userID'),
                            'sessionID' => 0,
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ];
                    }

                    $response2 = $client->post(env('API_URL') . '/personel/GroupUserAccessDetail',
                        ['body' => json_encode($param)]
                    );

                    $arrResult2 = json_decode($response2->getBody()->getContents());
                }
            }else{
                $response = $client->put(env('API_URL') . '/personel/GroupUserAccess',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'groupAccessID' => $request->group_id,
                            'groupAccessName' => $request->group_name,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );

                if(count($request->userid_group) > 0){
                    foreach($request->userid_group as $key => $value){
                        $param[] = [
                            'recordStatus' => 'A',
                            'companyCode' => Session::get('companyCode'),
                            'groupAccessID' => $request->group_id,
                            'userID' => $value,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionUserID' => Session::get('userID'),
                            'sessionID' => 0,
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ];
                    }

                    // var_dump(json_encode($param));

                    $response2 = $client->put(env('API_URL') . '/personel/GroupUserAccessDetail',
                        ['body' => json_encode($param)]
                    );

                    $arrResult2 = json_decode($response2->getBody()->getContents());
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

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->status == "false"){
            return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
        }else if(isset($arrResult2->status) && $arrResult2->status == "false"){
            return response()->json(['status' => $arrResult2->status, 'message' => $arrResult2->message]);
        }else{
            return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
        }
    }

    public function addUserAccessGroupUserUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GroupUserAccessDetail',
                ['body' => json_encode(
                    [
                        'recordStatus' => 'A',
                        'companyCode' => Session::get('companyCode'),
                        'groupAccessID' => $request->group_id_user,
                        'userID' => $request->user_id,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'sessionID' => 0,
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
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

    public function prosesMenuMasterUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/MenuMasterWebDetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'menuID' => (int) $request->menuID,
                        'groupAccessID' => $request->groupAccessID,
                        'allowAccess' => $request->allowAccess,
                        'allowAdd' => $request->allowAdd,
                        'allowEdit' => $request->allowEdit,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
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
        // return response()->json($request->allowAccess);
    }

    public function prosesMenuMasterConfigureMenuUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            foreach($request->menu_id_configure_menu as $key => $value){
                if(!empty($request->selected_configure_menu) && isset($request->selected_configure_menu[$value])){
                    $data_menu[] = [
                        'companyCode' => Session::get('companyCode'),
                        'menuID' => (int) $value,
                        'groupAccessID' => $request->group_id_configure_menu[$key],
                        'allowAccess' => isset($request->allow_access_configure_menu[$value]) ? $request->allow_access_configure_menu[$value] : 'N',
                        'allowAdd' => isset($request->allow_add_configure_menu[$value]) ? $request->allow_add_configure_menu[$value] : 'N',
                        "allowEdit" => isset($request->allow_edit_configure_menu[$value]) ? $request->allow_edit_configure_menu[$value] : 'N',
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID')
                    ];
                }
            }

            $response = $client->post(env('API_URL') . '/personel/MenuMasterWebDetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'sessionID' => 0,
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale(),
                        "groupAccessID" => $request->group_id_configure_menu[0],
                        "moduleID" => $request->module_id_configure_menu[0],
                        "list" => $data_menu
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
        // return response()->json(!is_null($request->selected_configure_menu[10]));
    }

    public function prosesMenuMasterCopyToAnotherGroupUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/MenuMasterWebDetail/CopytoAnother',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'groupAccessIDFrom' => $request->group_id_copy_from,
                        'groupAccessIDTo' => $request->group_id_copy_destination,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
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

    public function prosesUserUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/User',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->record_status,
                        'companyCode' => Session::get('companyCode'),
                        'userID' => $request->user_id,
                        'userName' => $request->user_name,
                        "token" => "",
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
                    ]
                )]
            );

            $response = $client->put(env('API_URL') . '/personel/User/UpdateDetail',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->record_status,
                        'companyCode' => Session::get('companyCode'),
                        'userID' => $request->user_id,
                        'employeeNo' => $request->employee_no,
                        'userType' => $request->user_type,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
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

    public function prosesChangeEmployeeNumberUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/ChangeEmployeeNo/UpdateChangeEmployeeNo',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNoOld' => $request->employee_no,
                        'employeeNoNew' => $request->employee_no_new,
                        "sessionID" => 0,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
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

    public function prosesUserSecurityMaintenanceLevelUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            foreach($request->selected_authorization as $key => $value){
                $arrLevel[] = $key;
            }

            $dataLevel = implode(",", $arrLevel);

            $response = $client->put(env('API_URL') . '/personel/User/UpdateLevel',
                ['body' => json_encode(
                    [
                        'userID' => $request->user_id_level,
                        'levelType' => (int) $request->level_type,
                        'levelAuthorize' => $dataLevel,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
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
        // return response()->json($request->level_type);
    }

    public function prosesUserSecurityMaintenanceCompanyUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function_company == 'New'){
                $response = $client->post(env('API_URL') . '/personel/User/Detail',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->status,
                            'userID' => $request->user_id_company,
                            'companyCode' => $request->company_code,
                            'employeeNo' => $request->employee_no_company,
                            'email' => $request->email_company,
                            'defaultCompany' => ($request->company_default_checkbox == 'true') ? true : false,
                            'flagAppLead' => ($request->company_overtime_app_leader_checkbox == 'true') ? true : false,
                            'flagAppHRD' => ($request->company_overtime_app_hrd_checkbox == 'true') ? true : false,
                            'userType' => $request->user_type_company,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionUserID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/User/UpdateDetail',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->status,
                            'userID' => $request->user_id_company,
                            'companyCode' => $request->company_code_edit,
                            'employeeNo' => $request->employee_no_company,
                            'email' => $request->email_company,
                            'defaultCompany' => ($request->company_default_checkbox == 'true') ? true : false,
                            'flagAppLead' => ($request->company_overtime_app_leader_checkbox == 'true') ? true : false,
                            'flagAppHRD' => ($request->company_overtime_app_hrd_checkbox == 'true') ? true : false,
                            'userType' => $request->user_type_company,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionUserID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }


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
        // return response()->json($request->company_default_checkbox);
    }

    public function prosesUserSecurityMaintenanceModuleUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function_module == 'New'){
                $response = $client->post(env('API_URL') . '/personel/User/Access',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'userID' => $request->user_id_module,
                            'moduleID' => $request->module_name,
                            'groupAuthorizeCode' => (int) $request->group_authorization,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionUserID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/User/UpdateAkses',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'userID' => $request->user_id_module,
                            'moduleID' => $request->module_id,
                            'groupAuthorizeCode' => (int) $request->group_authorization,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionUserID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }


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
        // return response()->json($request->company_default_checkbox);
    }

    public function prosesProcessUserIDUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/BulkSendEmail/SendEmails',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        "new" => isset($request->new) ? (bool) $request->new : false,
                        "range" => isset($request->range) ? (bool) $request->range : false,
                        'employeeNoFrom' => $request->employee_no_from,
                    'employeeNoTo' => $request->employee_no_to,
                        "sessionID" => 0,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesMenuMasterWebUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'menuName' => $request->menu_name,
                'pageURL' => $request->page_url,
                "isHaveChild" => isset($request->check_have_child) ? $request->check_have_child : "0",
                "parentID" => (int) $request->parent_id,
                "moduleID" => $request->module_id,
                "iconURL" => $request->icon_url,
                "changedNo" => 0,
                "createdDate" => date("Y-m-d\TH:i:s"),
                "createdBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "changedBy" => Session::get('userID'),
                'sessionUserID' => Session::get('userID'),
                'logActionUserID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName'),
                "languageCode" => strtoupper(App::getLocale()),
            ];

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/MenuMasterWeb',
                    ['body' => json_encode($param)]
                );
            }else{
                $param['menuID'] = $request->menu_id;
                $response = $client->put(env('API_URL') . '/personel/MenuMasterWeb',
                    ['body' => json_encode($param)]
                );
            }


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

    public function prosesMenuMasterMobileUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'menuDesc' => $request->menu_desc,
                'className' => $request->class_name,
                "changedNo" => 0,
                "createdDate" => date("Y-m-d\TH:i:s"),
                "createdBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "changedBy" => Session::get('userID'),
                'sessionUserID' => Session::get('userID'),
                'logActionUserID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName'),
                "languageCode" => strtoupper(App::getLocale()),
            ];

            if($request->hasFile('fileInput')) {
                $file = $request->file('fileInput');
                $fileContent = file_get_contents($file->getRealPath());

                $param['icon'] = base64_encode($fileContent);
            }

            // dd(json_encode($param));

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/mobile/MasterMenuMobile/insertmenumobile',
                    ['body' => json_encode([$param])]
                );
            }else{
                $param['menuID'] = $request->menu_id;
                $response = $client->put(env('API_URL') . '/mobile/MasterMenuMobile/updatemenumobile',
                    ['body' => json_encode([$param])]
                );
            }


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

    public function prosesMenuMasterMobileSettingUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $data = $request->json()->all();

            if (!empty($data)) {
                foreach ($data as $key => $value) {
                    $param[] = [
                        'companyCode' => Session::get('companyCode'),
                        'lineNo' => (int) $value['lineNo'],
                        'menuID' => $value['menuID'],
                        'parentMenuID' => $value['parentMenuID'],
                        'changedNo' => 0,
                        'createdDate' => date("Y-m-d\TH:i:s"),
                        'createdBy' => Session::get('userID'),
                        'changedDate' => date("Y-m-d\TH:i:s"),
                        'changedBy' => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        'languageCode' => strtoupper(App::getLocale()),
                    ];
                }
            } else {
                $param = [];
            }

            // dd(json_encode($param));

            $response = $client->put(env('API_URL') . '/mobile/MasterMenuMobile/updatesettingmobile',
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

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesMasterBannerUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                'infoURL' => $request->info_url,
                "createdDate" => date("Y-m-d\TH:i:s"),
                "createdBy" => Session::get('userID')
            ];

            if($request->hasFile('fileInput')) {
                $file = $request->file('fileInput');
                $fileContent = file_get_contents($file->getRealPath());

                $param['imageBanner'] = base64_encode($fileContent);
            }

            // dd(json_encode($param));

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/mobile/MasterBanner',
                    ['body' => json_encode([$param])]
                );
            }else{
                $param['bannerID'] = $request->banner_id;
                $response = $client->put(env('API_URL') . '/mobile/MasterBanner',
                    ['body' => json_encode([$param])]
                );
            }


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

    public function prosesAnnouncementCategoryUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/mobile/Announcement/insertAnnouncementCat',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'categoryCode' => $request->category_code,
                            'categoryName' => $request->category_name,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'sessionID' => 0,
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => strtoupper(App::getLocale())
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/mobile/Announcement/updateAnnouncementCat',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'categoryCode' => $request->category_code,
                            'categoryName' => $request->category_name,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'sessionID' => 0,
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => strtoupper(App::getLocale())
                        ]
                    )]
                );
            }


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

    public function prosesNewsCategoryUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/mobile/News/insertNewsCat',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'categoryCode' => $request->category_code,
                            'categoryName' => $request->category_name,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'sessionID' => 0,
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => strtoupper(App::getLocale())
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/mobile/News/updateNewsCat',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'categoryCode' => $request->category_code,
                            'categoryName' => $request->category_name,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'sessionID' => 0,
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => strtoupper(App::getLocale())
                        ]
                    )]
                );
            }


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

    public function exportAuditTrailUtilities(Request $request)
    {
        return Excel::download(new AuditTrailExport($request->user_id, $request->user_name, $request->log_date_from, $request->log_date_to, $request->url_log), 'Audit Trail ' . $request->table . 'Log.xlsx');
    }

    public function removeUserAccessGroupUserUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/personel/GroupUserAccessDetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'groupAccessID' => $request->groupAccessID,
                        'userID' => $request->userID,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
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

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removeUserSecurityMaintenanceModuleUtilities(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/personel/User/DeleteAkses',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => $request->userID,
                        'moduleID' => $request->moduleID,
                        'groupAuthorizeCode' => (int) $request->groupAuthorizeCode,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
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

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }
}