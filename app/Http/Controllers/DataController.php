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
	    				'languageCode' => 'id'
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
	    				'languageCode' => 'id'
	    			]
	    		)]
	    	);
	    } catch (RequestException $e) {
	    	var_dump($e->getResponse());
	    }

	    $arrResult = json_decode($response->getBody()->getContents());

	    return response()->json($arrResult->dataListSet);
	}
}
