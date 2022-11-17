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
    		return redirect('main');
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
	    	Session::put('menuList', [
				[ 'title' => 'Home', 'icon' => 'home.svg', 'icon-name' => 'home', 'link' => '/home' ],
				[ 'title' => 'Personel', 'icon' => 'personel.svg', 'icon-name' => 'personel', 'link' => '/personel' ],
				[ 'title' => 'Time Management', 'icon' => 'time_management.svg', 'icon-name' => 'time_management', 'link' => '/time_management' ], 
				[ 'title' => 'Payroll', 'icon' => 'payroll.svg', 'icon-name' => 'payroll', 'link' => '/payroll' ],  
				[ 'title' => 'Report', 'icon' => 'report.svg', 'icon-name' => 'report', 'link' => '/report' ],  
				[ 'title' => 'Medical', 'icon' => 'medical.svg', 'icon-name' => 'medical', 'link' => '/medical' ]]);
			Session::put('menuListMob', [
				[ 'title' => 'Dashboard', 'icon' => 'streammobportal-navbar-dashboard.svg', 'icon-name' => 'streammobportal-navbar-dashboard', 'link' => '/dashboard_mob' ], 
				[ 'title' => 'Export', 'icon' => 'streammobportal-navbar-export.svg', 'icon-name' => 'streammobportal-navbar-export', 'link' => '/export' ], 
				[ 'title' => 'Transaction', 'icon' => 'streammobportal-navbar-transaction.svg', 'icon-name' => 'streammobportal-navbar-transaction', 'link' => '/transaction' ], 
				[ 'title' => 'Master Data', 'icon' => 'streammobportal-navbar-masterdata.svg', 'icon-name' => 'streammobportal-navbar-masterdata', 'link' => '/master_data' ], 
				[ 'title' => 'Admin Menu', 'icon' => 'streammobportal-navbar-adminmenu.svg', 'icon-name' => 'streammobportal-navbar-adminmenu', 'link' => '/admin_menu' ]]);
				
	    	return response()->json(["status" => $arrResult->status, "message" => "/main"]);
	    }else{
	    	return response()->json(["status" => $arrResult->status, "message" => $arrResult->message]);
	    }
    }

    public function prosesLogout()
    {
    	Session::flush();
    	return redirect('login');
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
