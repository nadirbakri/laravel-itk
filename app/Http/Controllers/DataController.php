<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;

class DataController extends Controller
{
    public function dataGenderAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'gender_',
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);
	    } catch (RequestException $e) {
	    	var_dump($e->getResponse());
	    }

	    $arrResult = json_decode($response->getBody()->getContents());
	    
	    return response()->json($arrResult->dataListSet);
	}

	public function dataBloodAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'blood_',
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);
	    } catch (RequestException $e) {
	    	var_dump($e->getResponse());
	    }

	    $arrResult = json_decode($response->getBody()->getContents());

	    return response()->json($arrResult->dataListSet);
	}

	public function dataReligionAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'religion_',
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);
	    } catch (RequestException $e) {
	    	var_dump($e->getResponse());
	    }

	    $arrResult = json_decode($response->getBody()->getContents());

	    return response()->json($arrResult->dataListSet);
	}

	public function dataStatusAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'recordstatus_',
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);
	    } catch (RequestException $e) {
	    	var_dump($e->getResponse());
	    }

	    $arrResult = json_decode($response->getBody()->getContents());

	    return response()->json($arrResult->dataListSet);
	}

	public function dataEmployeeNoAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/pemaster/getpemaster',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode')
	    			]
	    		)]
	    	);
	    } catch (RequestException $e) {
	    	var_dump($e->getResponse());
	    }

	    $arrResult = json_decode($response->getBody()->getContents());

	    if($search == ''){
	    	$employees = $arrResult->dataListSet;
	    }else{
	    	$employees    = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->fullName)){
	    				return preg_match('/' . $search . '/i', $value->fullName);
	    			}else if(preg_match('/' . $search . '/i', $value->employeeNo)){
	    				return preg_match('/' . $search . '/i', $value->employeeNo);
	    			}
	    		}
	    	);
	    }

        return response()->json($employees);
	}

	public function dataCompanyAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/company/getcompany',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A'
	    			]
	    		)]
	    	);
	    } catch (RequestException $e) {
	    	var_dump($e->getResponse());
	    }

	    $arrResult = json_decode($response->getBody()->getContents());

	    if($search == ''){
	    	$company = $arrResult->dataListSet;
	    }else{
	    	$company    = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->companyCode)){
	    				return preg_match('/' . $search . '/i', $value->companyCode);
	    			}else if(preg_match('/' . $search . '/i', $value->companyName)){
	    				return preg_match('/' . $search . '/i', $value->companyName);
	    			}
	    		}
	    	);
	    }

        return response()->json($company);
	}

	public function dataModuleAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/module/getmodule',
	    		['body' => json_encode(
	    			[
	    				'' => ''
	    			]
	    		)]
	    	);
	    } catch (RequestException $e) {
	    	var_dump($e->getResponse());
	    }

	    $arrResult = json_decode($response->getBody()->getContents());

	    if($search == ''){
	    	$module = $arrResult->dataListSet;
	    }else{
	    	$module    = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->moduleID)){
	    				return preg_match('/' . $search . '/i', $value->moduleID);
	    			}else if(preg_match('/' . $search . '/i', $value->moduleName)){
	    				return preg_match('/' . $search . '/i', $value->moduleName);
	    			}
	    		}
	    	);
	    }

        return response()->json($module);
	}

	public function dataGroupAuthorizeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/groupauthorize/getgroupauthorize',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode')
	    			]
	    		)]
	    	);
	    } catch (RequestException $e) {
	    	var_dump($e->getResponse());
	    }

	    $arrResult = json_decode($response->getBody()->getContents());

	    if($search == ''){
	    	$groupAuthorize = $arrResult->dataListSet;
	    }else{
	    	$groupAuthorize    = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->groupAuthorizeCode)){
	    				return preg_match('/' . $search . '/i', $value->groupAuthorizeCode);
	    			}else if(preg_match('/' . $search . '/i', $value->groupAuthorizeDesc)){
	    				return preg_match('/' . $search . '/i', $value->groupAuthorizeDesc);
	    			}
	    		}
	    	);
	    }

        return response()->json($groupAuthorize);
	}
}
