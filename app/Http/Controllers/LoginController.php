<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;

class LoginController extends Controller
{
    public function pageLogin()
    {
    	if(Session::has('token')){
    		return redirect()->route('main');
    	}else{
    		return view('login.login');
    	}
    }

    public function prosesLogin(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json' ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/auth',
	    		['body' => json_encode(
	    			[
	    				'username' => $request->username_login,
	    				'password' => $request->password_login,
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);

			$arrResult = json_decode($response->getBody()->getContents());

			$client2 = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $arrResult->dataListSet[0]->token ]
            ]);

			$response2 = $client2->post(env('API_URL') . '/module/getmodule',
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
			var_dump($response);
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
	    }

	    $arrResult2 = json_decode($response2->getBody()->getContents());

		// var_dump($arrResult2);

		if(!isset($arrResult2->dataListSet) || $arrResult2->dataListSet == '' || $arrResult2->dataListSet == null){
			$menuList = [];
		}else{
			$menuList = $arrResult2->dataListSet;
		}

	    if($arrResult->status == "true"){
	    	Session::flush();
	    	
	    	Session::put('userID', $arrResult->dataListSet[0]->userID);
	    	Session::put('userName', $arrResult->dataListSet[0]->userName);
	    	Session::put('employeeNo', $arrResult->dataListSet[0]->employeeNo);
	    	Session::put('email', $arrResult->dataListSet[0]->email);
	    	Session::put('companyCode', $arrResult->dataListSet[0]->companyCode);
	    	Session::put('companyName', $arrResult->dataListSet[0]->companyName);
	    	Session::put('token', $arrResult->dataListSet[0]->token);
	    	Session::put('defaultCompany', $arrResult->dataListSet[0]->defaultCompany);
	    	Session::put('photo', $arrResult->dataListSet[0]->photo);
	    	Session::put('officeLocation', $arrResult->dataListSet[0]->officeLocation);
	    	Session::put('userType', $arrResult->dataListSet[0]->userType);
			Session::put('groupAccessID', $arrResult->dataListSet[0]->groupAccessID);

			foreach($menuList as $key => $value){
				if($value->moduleID == 'HOME'){
					$value->{"icon"} = 'home.svg';
					$value->{"icon_name"} = 'home';
					$value->{"link"} = '/home';
				}
				if($value->moduleID == 'MD'){
					$value->{"icon"} = 'medical.svg';
					$value->{"icon_name"} = 'medical';
					$value->{"link"} = '/medical';
				}
				if($value->moduleID == 'PE'){
					$value->{"icon"} = 'personel.svg';
					$value->{"icon_name"} = 'personel';
					$value->{"link"} = '/personnel';
				}
				if($value->moduleID == 'PY'){
					$value->{"icon"} = 'payroll.svg';
					$value->{"icon_name"} = 'payroll';
					$value->{"link"} = '/payroll';
				}
				if($value->moduleID == 'REP'){
					$value->{"icon"} = 'report.svg';
					$value->{"icon_name"} = 'report';
					$value->{"link"} = '/report';
				}
				if($value->moduleID == 'TM'){
					$value->{"icon"} = 'time_management.svg';
					$value->{"icon_name"} = 'time_management';
					$value->{"link"} = '/time_management';
				}
				if($value->moduleID == 'UTI'){
					unset($menuList[$key]);
				}
			}

			Session::put('menuList', $menuList);
	    	// Session::put('menuList', [
			// 	[ 'moduleName' => 'Home', 'icon' => 'home.svg', 'icon_name' => 'home', 'link' => '/home' ],
			// 	[ 'moduleName' => 'Personel', 'icon' => 'personel.svg', 'icon_name' => 'personel', 'link' => '/personel' ],
			// 	[ 'moduleName' => 'Time Management', 'icon' => 'time_management.svg', 'icon_name' => 'time_management', 'link' => '/time_management' ], 
			// 	[ 'moduleName' => 'Payroll', 'icon' => 'payroll.svg', 'icon_name' => 'payroll', 'link' => '/payroll' ],  
			// 	[ 'moduleName' => 'Report', 'icon' => 'report.svg', 'icon_name' => 'report', 'link' => '/report' ],  
			// 	[ 'moduleName' => 'Medical', 'icon' => 'medical.svg', 'icon_name' => 'medical', 'link' => '/medical' ]]);
			Session::put('menuListMob', [
				[ 'title' => 'Export', 'icon' => 'streammobportal-navbar-export.svg', 'icon-name' => 'streammobportal-navbar-export', 'link' => '/export' ], 
				[ 'title' => 'Transaction', 'icon' => 'streammobportal-navbar-transaction.svg', 'icon-name' => 'streammobportal-navbar-transaction', 'link' => '/transaction' ], 
				[ 'title' => 'Master Data', 'icon' => 'streammobportal-navbar-masterdata.svg', 'icon-name' => 'streammobportal-navbar-masterdata', 'link' => '/master_data' ]]);
				
	    	return response()->json(["status" => $arrResult->status, "message" => "/main"]);
	    }else{
	    	return response()->json(["status" => $arrResult->status, "message" => $arrResult->message]);
	    }
    }

    public function prosesLogout()
    {
    	Session::flush();
    	return redirect()->route('login');
    }

	public function prosesAuthentication(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json' ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/auth',
	    		['body' => json_encode(
	    			[
	    				'username' => $request->user_id,
	    				'password' => $request->password,
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

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }
}
