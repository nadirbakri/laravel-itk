<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Str;
use \Firebase\JWT\JWT;
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
		$arrResult = null;
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json' ]
	    	]);

			$promises = [
				'response1' => $client->postAsync(env('API_URL') . '/auth', [
					'body' => json_encode(
						[
							'username' => $request->username_login,
							'password' => $request->password_login,
							'languageCode' => App::getLocale()
						]
					)
				])
			];

			Promise\all($promises)
				->then(function ($responses) {
					$this->arrResult = json_decode($responses['response1']->getBody()->getContents());
				})
				->wait();
			
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

		// var_dump($this->arrResult->dataListSet);

		if(!isset($this->arrResult->dataListSet[0]->userAccess) || $this->arrResult->dataListSet[0]->userAccess == '' || $this->arrResult->dataListSet[0]->userAccess == null){
			$menuList = [];
		}else{
			$menuList = $this->arrResult->dataListSet[0]->userAccess;
		}

	    if($this->arrResult->status == "true"){
	    	Session::flush();
	    	
	    	Session::put('userID', $this->arrResult->dataListSet[0]->userID);
	    	Session::put('userName', $this->arrResult->dataListSet[0]->userName);
	    	Session::put('employeeNo', $this->arrResult->dataListSet[0]->employeeNo);
	    	Session::put('email', $this->arrResult->dataListSet[0]->email);
	    	Session::put('companyCode', $this->arrResult->dataListSet[0]->companyCode);
	    	Session::put('companyName', $this->arrResult->dataListSet[0]->companyName);
	    	Session::put('token', $this->arrResult->dataListSet[0]->token);
	    	Session::put('defaultCompany', $this->arrResult->dataListSet[0]->defaultCompany);
	    	Session::put('photo', $this->arrResult->dataListSet[0]->photo);
	    	Session::put('officeLocation', $this->arrResult->dataListSet[0]->officeLocation);
	    	Session::put('userType', $this->arrResult->dataListSet[0]->userType);
			Session::put('groupAccessID', $this->arrResult->dataListSet[0]->groupAccessID);

			foreach($menuList as $key => $value){
				if($value->moduleID == 'UTI'){
					Session::put('haveUtilities', true);
					unset($menuList[$key]);
				}
				if($value->moduleID == 'HOME'){
					Session::put('haveHome', true);
					$value->{"moduleName"} = 'HOME';
					$value->{"sort"} = 1;
					$value->{"icon"} = 'home.svg';
					$value->{"icon_name"} = 'home';
					$value->{"link"} = '/home';
				}
				if($value->moduleID == 'TM'){
					$value->{"moduleName"} = 'TIME MANAGEMENT';
					$value->{"sort"} = 3;
					$value->{"icon"} = 'time_management.svg';
					$value->{"icon_name"} = 'time_management';
					$value->{"link"} = '/time_management';
				}
				if($value->moduleID == 'PE'){
					$value->{"moduleName"} = 'PERSONNEL';
					$value->{"sort"} = 2;
					$value->{"icon"} = 'personel.svg';
					$value->{"icon_name"} = 'personel';
					$value->{"link"} = '/personnel';
				}
				if($value->moduleID == 'PY'){
					$value->{"moduleName"} = 'PAYROLL';
					$value->{"sort"} = 4;
					$value->{"icon"} = 'payroll.svg';
					$value->{"icon_name"} = 'payroll';
					$value->{"link"} = '/payroll';
				}
				if($value->moduleID == 'MD'){
					$value->{"moduleName"} = 'MEDICAL';
					$value->{"sort"} = 6;
					$value->{"icon"} = 'medical.svg';
					$value->{"icon_name"} = 'medical';
					$value->{"link"} = '/medical';
				}
				if($value->moduleID == 'REP'){
					$value->{"moduleName"} = 'REPORT';
					$value->{"sort"} = 5;
					$value->{"icon"} = 'report.svg';
					$value->{"icon_name"} = 'report';
					$value->{"link"} = '/report';
				}
			}

			usort($menuList, function($a, $b) {return strcmp($a->sort, $b->sort);});

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
				
	    	return response()->json(["status" => $this->arrResult->status, "message" => "/main"]);
	    }else{
	    	return response()->json(["status" => $this->arrResult->status, "message" => $this->arrResult->message]);
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

	public function redirectToAzure()
    {
        $query = http_build_query([
            'client_id' => env('AZURE_AD_CLIENT_ID'),
            'response_type' => 'code',
            'redirect_uri' => env('AZURE_AD_REDIRECT_URI'),
            'scope' => 'openid profile email User.Read',
			'response_mode' => 'query',
        	'state' => Str::random(40),
        ]);
        $authorizeUrl = env('AZURE_AD_AUTHORITY') . '/oauth2/v2.0/authorize?' . $query;
        return redirect()->away($authorizeUrl);
    }

    public function handleAzureCallback(Request $request)
    {
		// try {
			$client = new Client([
				'headers' => [ 'Content-Type' => 'application/json' ],
				'verify' => false
			]);

			$response = $client->post(env('AZURE_AD_AUTHORITY') . '/oauth2/v2.0/token', [
				'form_params' => [
					'grant_type' => 'authorization_code',
					'client_id' => env('AZURE_AD_CLIENT_ID'),
					'client_secret' => env('AZURE_AD_CLIENT_SECRET'),
					'redirect_uri' => env('AZURE_AD_REDIRECT_URI'),
					'code' => $request->code,
				],
			]);

			$accessToken = json_decode((string) $response->getBody(), true)['access_token'];

			$graphResponse = $client->get('https://graph.microsoft.com/v1.0/me', [
				'headers' => [
					'Authorization' => 'Bearer ' . $accessToken,
					'Accept' => 'application/json',
				],
			]);

			$graphData = json_decode((string) $graphResponse->getBody(), true);

			// dd($graphData);

		// } catch (RequestException $e) {
	    // 	$response = $e->getResponse();
		// 	// var_dump($response);
        //     if($response->getStatusCode() == 401){
        //         return view('error.login');
        //     }else if($response->getStatusCode() == 404){
        //         return view('error.not_found');
        //     }else{
        //         return view('error.bad_request');
        //     }
	    // }

		if(count($graphData) > 0){
			$email = $graphData['mail'];
			$secret_key = env('JWT_SECRET_KEY');

			$payload = array(
				"email" => $email,
				"exp" => time() + 86400 // token akan kadaluarsa dalam 24 jam
			);

			// dd($payload);
			
			$token = JWT::encode($payload, $secret_key, 'HS512');

			Session::flush();
	    	
	    	Session::put('userID', $graphData['id']);
	    	Session::put('userName', $graphData['displayName']);
	    	Session::put('employeeNo', NULL);
	    	Session::put('email', $graphData['mail']);
	    	Session::put('companyCode', NULL);
	    	Session::put('companyName', NULL);
	    	Session::put('token', $token);
	    	// Session::put('defaultCompany', $this->arrResult->dataListSet[0]->defaultCompany);
	    	Session::put('photo', "");
	    	Session::put('officeLocation', $graphData['officeLocation']);
	    	Session::put('userType', $graphData['userPrincipalName']);
			Session::put('groupAccessID', NULL);

			Session::put('menuList', []);
			Session::put('menuListMob', []);

			return redirect()->route('main');
				
	    	// return response()->json(["status" => true, "message" => "/main"]);
	    }else{
			return redirect()->route('login')->with('message', "Cannot Login Using Microsoft Account");
	    	// return response()->json(["status" => false, "message" => "Cannot Login Using Microsoft Account"]);
	    }
	}
}
