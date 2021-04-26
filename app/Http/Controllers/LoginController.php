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
	    	var_dump($e->getResponse());
	    }

	    $arrResult = json_decode($response->getBody()->getContents());

	    if($arrResult->status == "true"){
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
	    	Session::put('menuList', [[ 'title' => 'Home', 'icon' => 'home.png', 'icon-name' => 'home', 'link' => '/home' ], [ 'title' => 'Personel', 'icon' => 'personel.png', 'icon-name' => 'personel', 'link' => '/personel' ],  [ 'title' => 'Time Management', 'icon' => 'time_management.png', 'icon-name' => 'time_management', 'link' => '/time_management' ], [ 'title' => 'Payroll', 'icon' => 'payroll.png', 'icon-name' => 'payroll', 'link' => '/payroll' ], [ 'title' => 'Report', 'icon' => 'report.png', 'icon-name' => 'report', 'link' => '/report' ], [ 'title' => 'Medical', 'icon' => 'medical.png', 'icon-name' => 'medical', 'link' => '/medical' ]]);

	    	return response()->json(["status" => $arrResult->status, "message" => "/home"]);
	    }else{
	    	return response()->json(["status" => $arrResult->status, "message" => $arrResult->message]);
	    }
    }

    public function prosesLogout()
    {
    	Session::flush();
    	return redirect('login');
    }
}
