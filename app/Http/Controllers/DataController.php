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

	public function dataProcessStatusAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'ProcessStatus_',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataProcessStatusDetailAPI(Request $request)
	{
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'ProcessStatus_',
						'comGenCode' => $request->processStatus,
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataDeductDayAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'DeductOvt_',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataBloodAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'BloodType_',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataMaritalStatusAPI()
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
	    				'variable' => 'MaritalStatus_',
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

	    return response()->json($arrResult->dataListSet);
	}

	public function dataNationalityAPI()
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
	    				'variable' => 'Nationality_',
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

	    return response()->json($arrResult->dataListSet);
	}

	public function dataDrivingLicenseCarTypeAPI(Request $request)
    {
		$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'DrivingLicense_',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataRelationAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'Relation_',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataTerminationCodeAPI()
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
	    				'variable' => 'TerminationCode_',
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

	    return response()->json($arrResult->dataListSet);
	}

	public function dataBenefitsAPI()
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
	    				'variable' => 'FringeBenefit_',
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

	    return response()->json($arrResult->dataListSet);
	}

	public function dataTaxStatusAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'TaxStatus_',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataAbsenteeismTypeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'PeMasterAbsenteeismType_',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataAbsenteeismTypeFuncAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'PeMasterAbsenteeismType_',
						'comGenCode' => $request->absentType,
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataDeductLeaveAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'DeductLeave_',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataDeductLeaveFuncAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'DeductLeave_',
						'comGenCode' => $request->deductLeave,
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataTaxOfficeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'TaxOffice_',
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataTaxCalculationMethodAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'TaxMethod_',
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataCurrencyAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'Currency_',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataCurrencyCodeLoanDataEntryAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/prloandataentry/getloanemployee',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'currencyCode' => $request->currencyCode
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

        return response()->json($arrResult->dataListSet[0]);
	}

	public function dataCurrencyCodeFullPartialLoanPaymentAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/prloanpayment/getprloanpayment',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'currencyCode' => $request->currencyCode
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

        return response()->json($arrResult->dataListSet[0]);
	}

	public function dataZipCodeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/zipcode/getzipcode',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->zipCode)){
	    				return preg_match('/' . $search . '/i', $value->zipCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataZipCodePersonalDataAPI(Request $request)
    {

		// var_dump($request->employeeNo);
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/zipcode/getzipcode',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'zipCode' => $request->homeZipCode
	    			]
	    		)]
	    	);

			$response2 = $client->post(env('API_URL') . '/zipcode/getzipcode',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'zipCode' => $request->otherZipCode
	    			]
	    		)]
	    	);

			$response3 = $client->post(env('API_URL') . '/zipcode/getzipcode',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'zipCode' => $request->workZipCode
	    			]
	    		)]
	    	);

			$response4 = $client->post(env('API_URL') . '/zipcode/getzipcode',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'zipCode' => $request->correspondenceZipCode
	    			]
	    		)]
	    	);

			$response5 = $client->post(env('API_URL') . '/zipcode/getzipcode',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'zipCode' => $request->homeDistrictCode
	    			]
	    		)]
	    	);

			$response6 = $client->post(env('API_URL') . '/zipcode/getzipcode',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'zipCode' => $request->otherDistrictCode
	    			]
	    		)]
	    	);

			$response7 = $client->post(env('API_URL') . '/zipcode/getzipcode',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'zipCode' => $request->homeSubDistrictCode
	    			]
	    		)]
	    	);

			$response8 = $client->post(env('API_URL') . '/zipcode/getzipcode',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'zipCode' => $request->otherSubDistrictCode
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
	    $arrResult3 = json_decode($response3->getBody()->getContents());
	    $arrResult4 = json_decode($response4->getBody()->getContents());
	    $arrResult5 = json_decode($response5->getBody()->getContents());
	    $arrResult6 = json_decode($response6->getBody()->getContents());
	    $arrResult7 = json_decode($response7->getBody()->getContents());
	    $arrResult8 = json_decode($response8->getBody()->getContents());

	    return response()->json(
			[
				'data_home_zip_code' => ($request->homeZipCode == null) ? [] : $arrResult->dataListSet[0],
				'data_other_zip_code' => ($request->otherZipCode == null) ? [] : $arrResult2->dataListSet[0],
				'data_work_zip_code' => ($request->workZipCode == null) ? [] : $arrResult3->dataListSet[0],
				'data_correspondence_zip_code' => ($request->correspondenceZipCode == null) ? [] : $arrResult4->dataListSet[0],
				'data_home_district_code' => ($request->homeDistrictCode == null) ? [] : $arrResult5->dataListSet[0],
				'data_other_district_code' => ($request->otherDistrictCode == null) ? [] : $arrResult6->dataListSet[0],
				'data_home_subdistrict_code' => ($request->homeSubdistrictCode == null) ? [] : $arrResult7->dataListSet[0],
				'data_other_district_code' => ($request->otherSubDistrictCode == null) ? [] : $arrResult8->dataListSet[0],
			]
		);
	}

	public function dataDistrictAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/zipcode/getzipcode',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->propinsi)){
	    				return preg_match('/' . $search . '/i', $value->propinsi);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	// public function dataDistrictPersonalDataAPI(Request $request)
    // {

	// 	// var_dump($request->employeeNo);
    // 	try {
	//     	$client = new Client([
	//     		'headers' => [ 'Content-Type' => 'application/json',
	//     						'Authorization' => 'Bearer ' . Session::get('token') ]
	//     	]);

	//     	$response = $client->post(env('API_URL') . '/zipcode/getzipcode',
	//     		['body' => json_encode(
	//     			[
	//     				'companyCode' => Session::get('companyCode'),
	//     				'propinsi' => $request->homeDistrictCode
	//     			]
	//     		)]
	//     	);

	//     } catch (RequestException $e) {
	//     	$response = $e->getResponse();
            // if($response->getStatusCode() == 401){
            //     return view('error.login');
            // }else if($response->getStatusCode() == 404){
            //     return view('error.not_found');
            // }else{
            //     return view('error.bad_request');
            // }
	//     }

	//     $arrResult = json_decode($response->getBody()->getContents());

	//     return response()->json(
	// 		[
	// 			'data_home_district_code' => $arrResult->dataListSet[0],
	// 		]
	// 	);
	// }

	public function dataSubdistrictAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/zipcode/getzipcode',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->kabupaten)){
	    				return preg_match('/' . $search . '/i', $value->kabupaten);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataWorkPatternCodeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/tmworkpattern/gettmworkpatternservice',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->patternCode)){
	    				return preg_match('/' . $search . '/i', $value->patternCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataWorkPatternPersonalDataAPI(Request $request)
    {

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/tmworkpattern/gettmworkpatternservice',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'patternCode' => $request->workPatternCode
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

		if ($request->workPatternCode) {
			return response()->json([]);
		}
		else {
			return response()->json($arrResult->dataListSet[0]);
		}
	}

	public function dataCompanyBankCodeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/companybank/getcompanybank',
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

	    if($search == ''){
	    	$company_bank = $arrResult->dataListSet;
	    }else{
	    	$company_bank = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->bankCode)){
	    				return preg_match('/' . $search . '/i', $value->bankCode);
	    			} else if(preg_match('/' . $search . '/i', $value->accountNo)){
	    				return preg_match('/' . $search . '/i', $value->accountNo);
	    			} else if(preg_match('/' . $search . '/i', $value->description)){
	    				return preg_match('/' . $search . '/i', $value->description);
	    			} 
	    		}
	    	);
	    }

        return response()->json($company_bank);
	}

	public function dataCompanyBankCodePersonalDataAPI(Request $request)
    {

		// var_dump($request->employeeNo);
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/companybank/getcompanybank',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'bankCode' => $request->companyBankCode1
	    			]
	    		)]
	    	);

			$response2 = $client->post(env('API_URL') . '/companybank/getcompanybank',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'bankCode' => $request->companyBankCode2
	    			]
	    		)]
	    	);

			$response3 = $client->post(env('API_URL') . '/companybank/getcompanybank',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'bankCode' => $request->companyBankCode3
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
	    $arrResult3 = json_decode($response3->getBody()->getContents());

		// var_dump($arrResult->dataListSet[0]);

	    return response()->json(
			[
				'data_company_bank_code_one' => ($request->companyBankCode1 == null) ? [] : $arrResult->dataListSet[0],
				'data_company_bank_code_two' => ($request->companyBankCode2 == null) ? [] : $arrResult2->dataListSet[0],
				'data_company_bank_code_three' => ($request->companyBankCode3 == null) ? [] : $arrResult3->dataListSet[0],
			]
		);
	}

	public function dataEmployeeBankCodeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/gmbank/getgmbank',
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

	    if($search == ''){
	    	$company_bank = $arrResult->dataListSet;
	    }else{
	    	$company_bank = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->bankCode)){
	    				return preg_match('/' . $search . '/i', $value->bankCode);
	    			} else if(preg_match('/' . $search . '/i', $value->bankName)){
	    				return preg_match('/' . $search . '/i', $value->bankName);
	    			}
	    		}
	    	);
	    }

        return response()->json($company_bank);
	}

	public function dataEmployeeBankCodePersonalDataAPI(Request $request)
    {

		// var_dump($request->employeeNo);
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/gmbank/getgmbank',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'bankCode' => $request->employeeBankCode1
	    			]
	    		)]
	    	);

			$response2 = $client->post(env('API_URL') . '/gmbank/getgmbank',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'bankCode' => $request->employeeBankCode2
	    			]
	    		)]
	    	);

			$response3 = $client->post(env('API_URL') . '/gmbank/getgmbank',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'bankCode' => $request->employeeBankCode3
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
	    $arrResult3 = json_decode($response3->getBody()->getContents());

		// var_dump($arrResult->dataListSet[0]);

	    return response()->json(
			[
				'data_employee_bank_code_one' => ($request->employeeBankCode1 == null) ? [] : $arrResult->dataListSet[0],
				'data_employee_bank_code_two' => ($request->employeeBankCode2 == null) ? [] : $arrResult2->dataListSet[0],
				'data_employee_bank_code_three' => ($request->employeeBankCode3 == null) ? [] : $arrResult3->dataListSet[0],
			]
		);
	}

	public function dataReligionFunctionAPI()
    {
    	$religion[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
		];

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
						'variable' => 'Religion_',
	    				'companyCode' => Session::get('companyCode'),
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

	    $religion = array_merge($religion, $arrResult->dataListSet);

        return response()->json($religion[0]);
	}

	public function dataReligionAPI(Request $request)
    {
		$search = $request->search;

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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataReligionAllAPI(Request $request)
    {
    	$search = $request->search;

		$religion[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
    	];

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
						'variable' => 'Religion_',
	    				'companyCode' => Session::get('companyCode'),
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

	    if($search == ''){
	    	$religion = array_merge($religion, $arrResult->dataListSet);
	    }else{
			$religion = array_merge($religion, $arrResult->dataListSet);
	    	$religion = array_filter(
	    		$religion,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}else if(preg_match('/' . $search . '/i', $value->comGenCode)){
	    				return preg_match('/' . $search . '/i', $value->comGenCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($religion);
	}

	public function dataReligionCodeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/prformulathr/getprformulathr',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->religionCode)){
	    				return preg_match('/' . $search . '/i', $value->religionCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
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

	public function dataEmployeeNoAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/pemaster/getpemastergrid',
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

	// public function unique_multidim_array($array, $key) { 
	// 	$temp_array = array(); 
	// 	$i = 0; 
	// 	$key_array = array(); 
		
	// 	foreach($array as $val) { 
	// 		if (!in_array($val[$key], $key_array)) { 
	// 			$key_array[$i] = $val[$key]; 
	// 			$temp_array[$i] = $val; 
	// 		} 
	// 		$i++; 
	// 	} 
	// 	return $temp_array; 
	// }

	public function dataEmployeeNoAPI2(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/pemasterleave/getpemasterleave',
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

		// $arrData = unique_multidim_array($arrResult->dataListSet, 'employeeNo');

		// var_dump($arrResult->dataListSet->pluck('employeeNo'));

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->employeeNo)){
	    				return preg_match('/' . $search . '/i', $value->employeeNo);
	    			}
	    		}
	    	);
	    }
		// var_dump($arrResult);
        return response()->json($data);
	}

	public function dataEmployeeNoReqAPI2(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/pemasterleave/getpemasterleave',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'employeeNo' => $request->employeeNo
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->employeeNo)){
	    				return preg_match('/' . $search . '/i', $value->employeeNo);
	    			}
	    		}
	    	);
	    }
		// var_dump($arrResult);
        return response()->json($data);
	}

	public function dataEmployeeNoNoAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/pemaster/getpemastergrid',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'employeeNo' => $request->employeeNo
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

	public function dataEmployeeNoLoanPaymentAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/prloandataentry/loanlookup',
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

	    if($search == ''){
	    	$employees = $arrResult->dataListSet;
	    }else{
	    	$employees    = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->employeeNo)){
	    				return preg_match('/' . $search . '/i', $value->employeeNo);
	    			}else if(preg_match('/' . $search . '/i', $value->fullName)){
	    				return preg_match('/' . $search . '/i', $value->fullName);
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
						'companyCode' => Session::get('companyCode'),
	    				'recordStatus' => 'A'
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

	public function dataCompanyDetailAPI(Request $request)
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
	    				'recordStatus' => 'A',
						'companyCode' => $request->companyCode
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

	    if($search == ''){
	    	$module = $arrResult->dataListSet;
	    }else{
	    	$module = array_filter(
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

	public function dataGroupAuthorizeFunctionAPI(Request $request)
    {
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

	    if($request->func == 'First'){
	    	return response()->json($arrResult->dataListSet[0]);
	    }else if($request->func == 'Last'){
	    	end($arrResult->dataListSet);
	    	$key = key($arrResult->dataListSet);
	    	return response()->json($arrResult->dataListSet[$key]);
	    }
	}

	public function dataGroupAuthorizeGroupAPI(Request $request)
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
	    				'companyCode' => Session::get('companyCode'),
	    				'groupAuthorizeCode' => (int) $request->groupAuthorizeCode
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

	    if(!isset($request->groupAuthorizeCode)){
	    	$groupAuthorize = [];
	    }else{
	    	$arrResult = json_decode($response->getBody()->getContents());

		    if($search == ''){
		    	$groupAuthorize = $arrResult->dataListSet;
		    }else{
		    	$groupAuthorize = array_filter(
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
	    }

        return response()->json($groupAuthorize);
	}

	public function dataGroupAuthorizePersonalDataAPI(Request $request)
    {

		// var_dump($request->employeeNo);
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/groupauthorize/getgroupauthorize',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'groupAuthorizeCode' => (int) $request->groupAuthorizeCode
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

		if ((int) $request->groupAuthorizeCode == null) {
			return response()->json([]);
		}
		else {
			return response()->json($arrResult->dataListSet[0]);
		}
	}

	public function dataPositionAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/position/getposition',
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

	    if($search == ''){
	    	$position = $arrResult->dataListSet;
	    }else{
	    	$position = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->positionName)){
	    				return preg_match('/' . $search . '/i', $value->positionName);
	    			}else if(preg_match('/' . $search . '/i', $value->positionCode)){
	    				return preg_match('/' . $search . '/i', $value->positionCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($position);
	}

	public function dataPositionDetailAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/position/getposition',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
						'positionCode' => $request->positionCode
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

	    if($search == ''){
			if($request->positionCode == ''){
				$position = '';
			}else{
				$position = $arrResult->dataListSet;
			}	    	
	    }else{
	    	$position = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->positionName)){
	    				return preg_match('/' . $search . '/i', $value->positionName);
	    			}else if(preg_match('/' . $search . '/i', $value->positionCode)){
	    				return preg_match('/' . $search . '/i', $value->positionCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($position);
	}

	public function dataPositionAllAPI(Request $request)
    {
    	$search = $request->search;

		$position[] = (object) [
    		'positionCode' => 'ALL',
    		'positionName' => 'ALL'
    	];

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/position/getposition',
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

	    if($search == ''){
	    	$position = array_merge($position, $arrResult->dataListSet);
	    }else{
			$position = array_merge($position, $arrResult->dataListSet);
	    	$position = array_filter(
	    		$position,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->positionName)){
	    				return preg_match('/' . $search . '/i', $value->positionName);
	    			}else if(preg_match('/' . $search . '/i', $value->positionCode)){
	    				return preg_match('/' . $search . '/i', $value->positionCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($position);
	}
	
	public function dataSupervisorPositionAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/position/getposition',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'positionCode' => $request->supervisorCode
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

        return response()->json($arrResult->dataListSet[0]);
	}

	public function dataEmployeeNoPositionAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/pemaster/getpemastergrid',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'positionCode' => $request->positionCode
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

	public function dataUserAccessGroupAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/groupuseraccess/getgroupuseraccess',
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

	    if($search == ''){
	    	$group_access = $arrResult->dataListSet;
	    }else{
	    	$group_access    = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->groupAccessID)){
	    				return preg_match('/' . $search . '/i', $value->groupAccessID);
	    			}else if(preg_match('/' . $search . '/i', $value->groupAccessName)){
	    				return preg_match('/' . $search . '/i', $value->groupAccessName);
	    			}
	    		}
	    	);
	    }

        return response()->json($group_access);
	}

	public function dataUserAccessGroupIDAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/groupuseraccess/getgroupuseraccess',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'groupAccessID' => $request->groupAccessID
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

	    if($search == ''){
	    	$group_access = $arrResult->dataListSet[0];
	    }else{
	    	$group_access    = array_filter(
	    		$arrResult->dataListSet[0],
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->groupAccessID)){
	    				return preg_match('/' . $search . '/i', $value->groupAccessID);
	    			}else if(preg_match('/' . $search . '/i', $value->groupAccessName)){
	    				return preg_match('/' . $search . '/i', $value->groupAccessName);
	    			}
	    		}
	    	);
	    }

        return response()->json($group_access);
	}

	public function dataUserAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/user/getusermaster',
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

	    if($search == ''){
	    	$user_data = $arrResult->dataListSet;
	    }else{
	    	$user_data    = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->userID)){
	    				return preg_match('/' . $search . '/i', $value->userID);
	    			}else if(preg_match('/' . $search . '/i', $value->userName)){
	    				return preg_match('/' . $search . '/i', $value->userName);
	    			}
	    		}
	    	);
	    }

        return response()->json($user_data);
	}

	public function dataUserDetailAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/getuserdetail',
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

	    if($search == ''){
	    	$user_data = $arrResult->dataListSet;
	    }else{
	    	$user_data    = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->employeeNo)){
	    				return preg_match('/' . $search . '/i', $value->employeeNo);
	    			}else if(preg_match('/' . $search . '/i', $value->fullName)){
	    				return preg_match('/' . $search . '/i', $value->fullName);
	    			}
	    		}
	    	);
	    }

        return response()->json($user_data);
	}

	public function dataDecreeAPI(Request $request)
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
	    				'variable' => 'Decree_',
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
	    
	    return response()->json($arrResult->dataListSet);
	}

	public function dataSanctionAPI(Request $request)
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
	    				'variable' => 'Sanction_',
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
	    
	    return response()->json($arrResult->dataListSet);
	}

	public function dataLanguageAPI(Request $request)
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
	    				'variable' => 'Language_',
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
	    
	    return response()->json($arrResult->dataListSet);
	}

	public function dataProficiencyAPI(Request $request)
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
	    				'variable' => 'SkillProficiency_',
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
	    
	    return response()->json($arrResult->dataListSet);
	}

	public function dataEducationAPI(Request $request)
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
	    				'variable' => 'Education_',
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

        return response()->json($arrResult->dataListSet);
	}

	public function dataInstitutionAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/gminstitution/getgminstitution',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->institutionCode)){
	    				return preg_match('/' . $search . '/i', $value->institutionCode);
	    			}else if(preg_match('/' . $search . '/i', $value->institutionName)){
	    				return preg_match('/' . $search . '/i', $value->institutionName);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataMajorAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/gmmajor/getgmmajor',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->majorCode)){
	    				return preg_match('/' . $search . '/i', $value->majorCode);
	    			}else if(preg_match('/' . $search . '/i', $value->majorName)){
	    				return preg_match('/' . $search . '/i', $value->majorName);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataEducationStatusAPI(Request $request)
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
	    				'variable' => 'EduStatus_',
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

	    return response()->json($arrResult->dataListSet);
	}

	public function dataTitleAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/gmtitle/getgmtitle',
	    		['body' => json_encode(
	    			[
						'companyCode' => Session::get('companyCode'),
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->titleCode)){
	    				return preg_match('/' . $search . '/i', $value->titleCode);
	    			}else if(preg_match('/' . $search . '/i', $value->titleName)){
	    				return preg_match('/' . $search . '/i', $value->titleName);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataCityAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/city/getcity',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->cityCode)){
	    				return preg_match('/' . $search . '/i', $value->cityCode);
	    			}else if(preg_match('/' . $search . '/i', $value->cityName)){
	    				return preg_match('/' . $search . '/i', $value->cityName);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataCityPersonalDataAPI(Request $request)
    {

		// var_dump($request->employeeNo);
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/city/getcity',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'cityCode' => $request->birthPlace
	    			]
	    		)]
	    	);

			$response2 = $client->post(env('API_URL') . '/city/getcity',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'cityCode' => $request->drivingLicenseMobilNoPlaceRegistration
	    			]
	    		)]
	    	);

			$response3 = $client->post(env('API_URL') . '/city/getcity',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'cityCode' => $request->drivingLicenseMotorNoPlaceRegistration
	    			]
	    		)]
	    	);

			$response4 = $client->post(env('API_URL') . '/city/getcity',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'cityCode' => $request->homeCityCode
	    			]
	    		)]
	    	);

			$response5 = $client->post(env('API_URL') . '/city/getcity',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'cityCode' => $request->otherCityCode
	    			]
	    		)]
	    	);

			$response6 = $client->post(env('API_URL') . '/city/getcity',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'cityCode' => $request->workCityCode
	    			]
	    		)]
	    	);

			$response7 = $client->post(env('API_URL') . '/city/getcity',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'cityCode' => $request->correspondenceCityCode
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
	    $arrResult3 = json_decode($response3->getBody()->getContents());
	    $arrResult4 = json_decode($response4->getBody()->getContents());
	    $arrResult5 = json_decode($response5->getBody()->getContents());
	    $arrResult6 = json_decode($response6->getBody()->getContents());
	    $arrResult7 = json_decode($response7->getBody()->getContents());

	    return response()->json(
			[
				'data_birth_place' => ($request->birthPlace == null) ? [] : $arrResult->dataListSet[0],
				'data_driving_license_car_no_place_registration' => ($request->drivingLicenseMobilNoPlaceRegistration == null) ? [] : $arrResult2->dataListSet[0],
				'data_driving_license_motorcycle_no_place_registration' => ($request->drivingLicenseMotorNoPlaceRegistration == null) ? [] : $arrResult3->dataListSet[0],
				'data_home_city_code' => ($request->homeCityCode == null) ? [] : $arrResult4->dataListSet[0],
				'data_other_city_code' => ($request->otherCityCode == null) ? [] : $arrResult5->dataListSet[0],
				'data_work_city_code' => ($request->workCityCode == null) ? [] : $arrResult6->dataListSet[0],
				'data_correspondence_city_code' => ($request->correspondenceCityCode == null) ? [] : $arrResult7->dataListSet[0],
			]
		);
	}

	public function dataSkillAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/gmskill/getgmskill',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->skillCode)){
	    				return preg_match('/' . $search . '/i', $value->skillCode);
	    			}else if(preg_match('/' . $search . '/i', $value->skillName)){
	    				return preg_match('/' . $search . '/i', $value->skillName);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataAbilityAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/ability/getability',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->abilityCode)){
	    				return preg_match('/' . $search . '/i', $value->abilityCode);
	    			}else if(preg_match('/' . $search . '/i', $value->abilityName)){
	    				return preg_match('/' . $search . '/i', $value->abilityName);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataTableLogAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/audittrail/getaudittrail',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'module' => $request->module_id
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

	    if(!isset($request->module_id)){
	    	$data = [];
	    }else{
	    	$arrResult = json_decode($response->getBody()->getContents());

		    if($search == ''){
		    	$data = $arrResult->dataListSet;
		    }else{
		    	$data = array_filter(
		    		$arrResult->dataListSet,
		    		function($value) use ($search){
		    			if(preg_match('/' . $search . '/i', $value->table)){
		    				return preg_match('/' . $search . '/i', $value->table);
		    			}
		    		}
		    	);
		    }
	    }

        return response()->json($data);
	}

	public function dataDetailFieldAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/printletter/getfields',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value)){
	    				return preg_match('/' . $search . '/i', $value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataLetterTypeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/printletter/getlettertemplate',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->letterType)){
	    				return preg_match('/' . $search . '/i', $value->letterType);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataFieldNameListAPI(Request $request)
    {

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/reportformatemployee/getfieldnamelist',
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

        return response()->json($arrResult->dataListSet);
	}

	public function dataLevelTypeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/levelmaster/getlevelmaster',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->levelType)){
	    				return preg_match('/' . $search . '/i', $value->levelType);
	    			}else if(preg_match('/' . $search . '/i', $value->levelDescription)){
	    				return preg_match('/' . $search . '/i', $value->levelDescription);
	    			}	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataLevelTypeTypeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/levelmaster/getlevelmaster',
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

	    return response()->json($arrResult->dataListSet[0]);
	}

	public function dataModuleUserSecurityMaintenanceAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/user/getmodulelist',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'userID' => $request->userID
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

	    if(!isset($request->userID)){
	    	$module = [];
	    }else{
	    	$arrResult = json_decode($response->getBody()->getContents());

		    if($search == ''){
		    	$module = $arrResult->dataListSet;
		    }else{
		    	$module = array_filter(
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
	    }

        return response()->json($module);
	}

	public function dataEmployeeNoFunctionAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/pemaster/getpemastergrid',
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

	    if($request->func == 'First'){
	    	return response()->json($arrResult->dataListSet[0]);
	    }else if($request->func == 'Last'){
	    	end($arrResult->dataListSet);
	    	$key = key($arrResult->dataListSet);
	    	return response()->json($arrResult->dataListSet[$key]);
	    }
	}

	public function dataPositionFunctionAPI(Request $request)
    {
    	$position[] = (object) [
    		'positionCode' => 'ALL',
    		'positionName' => 'ALL'
		];

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/position/getposition',
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

	    $position = array_merge($position, $arrResult->dataListSet);

        return response()->json($position[0]);
	}

	public function dataEmploymentStatusFunctionAPI(Request $request)
    {
    	$employment_status[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
		];

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
						'variable' => 'EmploymentStatus_',
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

	    $employment_status = array_merge($employment_status, $arrResult->dataListSet);

        return response()->json($employment_status[0]);
	}

	public function dataLocationAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/location/getlocation',
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

	    if($search == ''){
	    	$location = $arrResult->dataListSet;
	    }else{
	    	$location = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->locationName)){
	    				return preg_match('/' . $search . '/i', $value->locationName);
	    			}else if(preg_match('/' . $search . '/i', $value->locationCode)){
	    				return preg_match('/' . $search . '/i', $value->locationCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($location);
	}

	public function dataLocationDetailAPI(Request $request)
    {
    	$search = $request->search;

		if($request->locationCode == "ALL"){
			$location[] = (object) [
				'locationCode' => 'ALL',
				'locationName' => 'ALL'
			];
			
			return response()->json($location);
		}else{
			try {
				$client = new Client([
					'headers' => [ 'Content-Type' => 'application/json',
									'Authorization' => 'Bearer ' . Session::get('token') ]
				]);
	
				$response = $client->post(env('API_URL') . '/location/getlocation',
					['body' => json_encode(
						[
							'recordStatus' => 'A',
							'companyCode' => Session::get('companyCode'),
							'locationCode' => $request->locationCode
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
	
			if($search == ''){
				$location = $arrResult->dataListSet;
			}else{
				$location = array_filter(
					$arrResult->dataListSet,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->locationName)){
							return preg_match('/' . $search . '/i', $value->locationName);
						}else if(preg_match('/' . $search . '/i', $value->locationCode)){
							return preg_match('/' . $search . '/i', $value->locationCode);
						}
					}
				);
			}

			return response()->json($location);	
		}
	}

	public function dataLocationAllAPI(Request $request)
    {
    	$search = $request->search;

		$location[] = (object) [
    		'locationCode' => 'ALL',
    		'locationName' => 'ALL'
    	];

		// var_dump($location);

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/location/getlocation',
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

	    if($search == ''){
	    	$location = array_merge($location, $arrResult->dataListSet);
	    }else{
			$location = array_merge($location, $arrResult->dataListSet);
	    	$location = array_filter(
	    		$location,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->locationName)){
	    				return preg_match('/' . $search . '/i', $value->locationName);
	    			}else if(preg_match('/' . $search . '/i', $value->locationCode)){
	    				return preg_match('/' . $search . '/i', $value->locationCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($location);
	}

	public function dataLocationFunctionAPI(Request $request)
    {
    	$location[] = (object) [
    		'locationCode' => 'ALL',
    		'locationName' => 'ALL'
		];

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/location/getlocation',
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

	    $location = array_merge($location, $arrResult->dataListSet);

        return response()->json($location[0]);
	}

	public function dataRankingAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/gmranking/getgmranking',
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

	    if($search == ''){
	    	$ranking = $arrResult->dataListSet;
	    }else{
	    	$ranking = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->rankingName)){
	    				return preg_match('/' . $search . '/i', $value->rankingName);
	    			}else if(preg_match('/' . $search . '/i', $value->rankingCode)){
	    				return preg_match('/' . $search . '/i', $value->rankingCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($ranking);
	}

	public function dataRankingDetailAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/gmranking/getgmranking',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
						'rankingCode' => $request->rankingCode
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

	    if($search == ''){
			if($request->rankingCode == ''){
				$ranking = '';
			}else{
				$ranking = $arrResult->dataListSet;
			}
	    	
	    }else{
	    	$ranking = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->rankingName)){
	    				return preg_match('/' . $search . '/i', $value->rankingName);
	    			}else if(preg_match('/' . $search . '/i', $value->rankingCode)){
	    				return preg_match('/' . $search . '/i', $value->rankingCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($ranking);
	}

	public function dataRankingAllAPI(Request $request)
    {
    	$search = $request->search;

		$ranking[] = (object) [
    		'rankingCode' => 'ALL',
    		'rankingName' => 'ALL'
    	];

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/gmranking/getgmranking',
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

	    if($search == ''){
	    	$ranking = array_merge($ranking, $arrResult->dataListSet);
	    }else{
			$ranking = array_merge($ranking, $arrResult->dataListSet);
	    	$ranking = array_filter(
	    		$ranking,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->rankingName)){
	    				return preg_match('/' . $search . '/i', $value->rankingName);
	    			}else if(preg_match('/' . $search . '/i', $value->rankingCode)){
	    				return preg_match('/' . $search . '/i', $value->rankingCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($ranking);
	}

	public function dataRankingFunctionAPI(Request $request)
    {
    	$ranking[] = (object) [
    		'rankingCode' => 'ALL',
    		'rankingName' => 'ALL'
		];

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/gmranking/getgmranking',
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

	    $ranking = array_merge($ranking, $arrResult->dataListSet);

        return response()->json($ranking[0]);
	}

	public function dataLevelAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/level/getlevel',
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

	    if($search == ''){
	    	$level = $arrResult->dataListSet;
	    }else{
	    	$level = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->levelName)){
	    				return preg_match('/' . $search . '/i', $value->levelName);
	    			}else if(preg_match('/' . $search . '/i', $value->levelCode)){
	    				return preg_match('/' . $search . '/i', $value->levelCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($level);
	}

	public function dataLevelDetailAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/level/getlevel',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
						'levelType' => $request->levelType,
						'levelCode' => $request->levelCode
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

	    if($search == ''){
	    	$level = $arrResult->dataListSet;
	    }else{
	    	$level = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->levelName)){
	    				return preg_match('/' . $search . '/i', $value->levelName);
	    			}else if(preg_match('/' . $search . '/i', $value->levelCode)){
	    				return preg_match('/' . $search . '/i', $value->levelCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($level);
	}

	public function dataLevelAllAPI(Request $request)
    {
    	$search = $request->search;

		$level[] = (object) [
    		'levelCode' => 'ALL',
    		'levelName' => 'ALL'
    	];

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/level/getlevel',
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

	    if($search == ''){
	    	$level = array_merge($level, $arrResult->dataListSet);
	    }else{
			$level = array_merge($level, $arrResult->dataListSet);
	    	$level = array_filter(
	    		$level,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->levelName)){
	    				return preg_match('/' . $search . '/i', $value->levelName);
	    			}else if(preg_match('/' . $search . '/i', $value->levelCode)){
	    				return preg_match('/' . $search . '/i', $value->levelCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($level);
	}

	public function dataLevelFunctionAPI(Request $request)
    {
    	$level[] = (object) [
    		'levelCode' => 'ALL',
    		'levelName' => 'ALL'
		];

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/level/getlevel',
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

	    $level = array_merge($level, $arrResult->dataListSet);

        return response()->json($level[0]);
	}

	public function dataEvaluationFormAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/evaluationform/getevaluationform',
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

	    if($search == ''){
	    	$form = $arrResult->dataListSet;
	    }else{
	    	$form = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->formName)){
	    				return preg_match('/' . $search . '/i', $value->formName);
	    			}else if(preg_match('/' . $search . '/i', $value->formCode)){
	    				return preg_match('/' . $search . '/i', $value->formCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($form);
	}

	public function dataEvaluationFormDetailAPI($formCode)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/evaluationform/getevaluationdetailpoint',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'formCode' => $formCode,
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
	    
	    return response()->json($arrResult->dataListSet);
	}

	public function dataGradeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/grade/getgrade',
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

	    if($search == ''){
	    	$grade = $arrResult->dataListSet;
	    }else{
	    	$grade = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->gradeName)){
	    				return preg_match('/' . $search . '/i', $value->gradeName);
	    			}else if(preg_match('/' . $search . '/i', $value->gradeCode)){
	    				return preg_match('/' . $search . '/i', $value->gradeCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($grade);
	}

	public function dataGradeDetailAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/grade/getgrade',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
						'gradeCode' => $request->gradeCode
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

	    if($search == ''){
	    	$grade = $arrResult->dataListSet;
	    }else{
	    	$grade = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->gradeName)){
	    				return preg_match('/' . $search . '/i', $value->gradeName);
	    			}else if(preg_match('/' . $search . '/i', $value->gradeCode)){
	    				return preg_match('/' . $search . '/i', $value->gradeCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($grade);
	}

	public function dataGroupAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/group/getgroup',
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

	    if($search == ''){
	    	$group = $arrResult->dataListSet;
	    }else{
	    	$group = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->groupName)){
	    				return preg_match('/' . $search . '/i', $value->groupName);
	    			}else if(preg_match('/' . $search . '/i', $value->groupCode)){
	    				return preg_match('/' . $search . '/i', $value->groupCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($group);
	}

	public function dataGroupDetailAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/group/getgroup',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
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

	    if($search == ''){
	    	$group = $arrResult->dataListSet;
	    }else{
	    	$group = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->groupName)){
	    				return preg_match('/' . $search . '/i', $value->groupName);
	    			}else if(preg_match('/' . $search . '/i', $value->groupCode)){
	    				return preg_match('/' . $search . '/i', $value->groupCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($group);
	}

	public function dataNatureofWorkAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/worknature/getworknature',
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

	    if($search == ''){
	    	$work_nature = $arrResult->dataListSet;
	    }else{
	    	$work_nature = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->workNatureName)){
	    				return preg_match('/' . $search . '/i', $value->workNatureName);
	    			}else if(preg_match('/' . $search . '/i', $value->workNatureCode)){
	    				return preg_match('/' . $search . '/i', $value->workNatureCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($work_nature);
	}

	public function dataNatureofWorkDetailAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/worknature/getworknature',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
						'workNatureCode' => $request->workNatureCode
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

	    if($search == ''){
	    	$work_nature = $arrResult->dataListSet;
	    }else{
	    	$work_nature = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->workNatureName)){
	    				return preg_match('/' . $search . '/i', $value->workNatureName);
	    			}else if(preg_match('/' . $search . '/i', $value->workNatureCode)){
	    				return preg_match('/' . $search . '/i', $value->workNatureCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($work_nature);
	}

	public function dataFreeFormatFieldAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/freeformatfield/getgmfreeformatfield',
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

	    if($search == ''){
	    	$free_format = $arrResult->dataListSet;
	    }else{
	    	$free_format = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->description)){
	    				return preg_match('/' . $search . '/i', $value->description);
	    			}else if(preg_match('/' . $search . '/i', $value->freeFormatCode)){
	    				return preg_match('/' . $search . '/i', $value->freeFormatCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($free_format);
	}

	public function dataFreeFormatFieldDetailAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/freeformatfield/getgmfreeformatdetail',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
						'freeFormatCode' => $request->freeFormatCode
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

	    if($search == ''){
	    	$free_format = $arrResult->dataListSet;
	    }else{
	    	$free_format = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->listValue)){
	    				return preg_match('/' . $search . '/i', $value->listValue);
	    			}else if(preg_match('/' . $search . '/i', $value->listCode)){
	    				return preg_match('/' . $search . '/i', $value->listCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($free_format);
	}

	public function dataEmploymentStatusAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'EmploymentStatus_',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataEmploymentStatusAllAPI(Request $request)
    {
    	$search = $request->search;

		$employment_status[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
    	];

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
						'variable' => 'EmploymentStatus_',
	    				'companyCode' => Session::get('companyCode'),
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

	    if($search == ''){
	    	$employment_status = array_merge($employment_status, $arrResult->dataListSet);
	    }else{
			$employment_status = array_merge($employment_status, $arrResult->dataListSet);
	    	$employment_status = array_filter(
	    		$employment_status,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}else if(preg_match('/' . $search . '/i', $value->comGenCode)){
	    				return preg_match('/' . $search . '/i', $value->comGenCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($employment_status);
	}

	public function dataEmploymentTypeAPI(Request $request)
    {
		$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'EmploymentType_',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataMutationTypeAPI(Request $request)
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
	    				'variable' => 'MutationType_',
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

	    return response()->json($arrResult->dataListSet);
	}

	public function dataCompanyWorkingCalendarAPI(Request $request)
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
	    				'variable' => 'CalendarType_',
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

	    return response()->json($arrResult->dataListSet);
	}

	public function dataDayCodeAPI(Request $request)
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
	    				'variable' => 'DayCode_',
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

	    return response()->json($arrResult->dataListSet);
	}

	public function dataDayCodeFunctionAPI(Request $request)
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
	    				'variable' => 'DayCode_',
						'comGenCode' => $request->dayCode,
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

	    return response()->json($arrResult->dataListSet);
	}

	public function dataNPWPAPI(Request $request)
    {
		$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/npwp/getnpwp',
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

		if($search == ''){
	    	$npwp = $arrResult->dataListSet;
	    }else{
	    	$npwp = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->npwpCode)){
	    				return preg_match('/' . $search . '/i', $value->npwpCode);
	    			} else if(preg_match('/' . $search . '/i', $value->pemotongKuasa)){
	    				return preg_match('/' . $search . '/i', $value->pemotongKuasa);
					} else if(preg_match('/' . $search . '/i', $value->companyName)){
	    				return preg_match('/' . $search . '/i', $value->companyName);
					}
	    		}
	    	);
	    }

        return response()->json($npwp);
	}

	public function dataNPWPPersonalDataAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/npwp/getnpwp',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'npwpCode' => $request->npwpCode
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

		if ($request->npwpCode = '') {
			return response()->json([]);
		}
		else {
			return response()->json($arrResult->dataListSet[0]);
		}
	}

	public function dataBPJSAPI(Request $request)
    {
		$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/bpjs/getbpjs',
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

		if($search == ''){
	    	$bpjs = $arrResult->dataListSet;
	    }else{
	    	$bpjs = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->bpjsCode)){
	    				return preg_match('/' . $search . '/i', $value->bpjsCode);
	    			} else if(preg_match('/' . $search . '/i', $value->bpjsNo)){
	    				return preg_match('/' . $search . '/i', $value->bpjsNo);
					}
	    		}
	    	);
	    }

        return response()->json($bpjs);
	}

	public function dataBPJSFunctionAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/bpjs/getbpjs',
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

	    if($request->func == 'First'){
	    	return response()->json($arrResult->dataListSet[0]);
	    }else if($request->func == 'Last'){
	    	end($arrResult->dataListSet);
	    	$key = key($arrResult->dataListSet);
	    	return response()->json($arrResult->dataListSet[$key]);
	    }
	}

	public function dataBPJSPersonalDataAPI(Request $request)
    {

		// var_dump($request->employeeNo);
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/bpjs/getbpjs',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'bpjsCode' => $request->bpjsCode
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

		if ($request->bpjsCode = '') {
			return response()->json([]);
		}
		else {
			return response()->json($arrResult->dataListSet[0]);
		}
	}

	public function dataCostCenterAPI(Request $request)
    {
		$search = $request->search;
		
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/costcenter/getcostcenter',
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

		if($search == ''){
	    	$cost_center = $arrResult->dataListSet;
	    }else{
	    	$cost_center = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->costCenterCode)){
	    				return preg_match('/' . $search . '/i', $value->costCenterCode);
	    			}else if(preg_match('/' . $search . '/i', $value->costCenterDescription)){
	    				return preg_match('/' . $search . '/i', $value->costCenterDescription);
	    			}
	    		}
	    	);
	    }

        return response()->json($cost_center);
	}

	public function dataCostCenterFunctionAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/costcenter/getcostcenter',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
						'costCenterCode' => $request->costCenterCode
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

		if ($request->costCenterCode = '') {
			return response()->json([]);
		}
		else {
			return response()->json($arrResult->dataListSet);
		}
	}

	public function dataCalendarTypeAPI(Request $request)
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
						'variable' => 'CalendarType_',
	    				'comGenCode' => $request->flagType,
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

        return response()->json($arrResult->dataListSet[0]);
	}

	public function dataShiftAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/tmshiftcode/gettmshiftcode',
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

	    if($search == ''){
	    	$shift = $arrResult->dataListSet;
	    }else{
	    	$shift    = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->shiftName)){
	    				return preg_match('/' . $search . '/i', $value->shiftName);
	    			}else if(preg_match('/' . $search . '/i', $value->shiftCode)){
	    				return preg_match('/' . $search . '/i', $value->shiftCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($shift);
	}

	public function dataShiftCodeFunctionAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/tmshiftcode/gettmshiftcode',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
						'shiftCode' => $request->shiftCode
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

	public function dataLeaveCodeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/tmabsentcode/gettmabsentcode',
	    		['body' => json_encode(
	    			[
						'absentType' => 'L',
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

	    if($search == ''){
	    	$absent = $arrResult->dataListSet;
	    }else{
	    	$absent    = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->absentCode)){
	    				return preg_match('/' . $search . '/i', $value->absentCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($absent);
	}

	public function dataCodeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/tmabsentcode/gettmabsentcode',
	    		['body' => json_encode(
	    			[
	    				'absentType' => 'O',
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

		// var_dump($arrResult->message);

	    if($search == ''){
	    	$absent = $arrResult->dataListSet;
	    }else{
	    	$absent    = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->absentCode)){
	    				return preg_match('/' . $search . '/i', $value->absentCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($absent);
	}

	public function dataAbsentCodeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/tmabsentcode/gettmabsentcode',
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

	    return response()->json($arrResult->dataListSet);
	}

	public function dataShiftMasterCodeAPI(Request $request)
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
	    				'variable' => 'groupshift_',
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
	    
	    return response()->json($arrResult->dataListSet);
	}

	public function dataShiftMasterCodeFunctionAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'groupshift_',
						'comGenCode' => $request->groupShift,
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

	    if ($request->groupShift = '') {
			return response()->json([]);
		}
		else {
			return response()->json($arrResult->dataListSet);
		}
	}

	public function dataAbsentCodeFunctionAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/tmabsentcode/gettmabsentcode',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
						'absentCode' => $request->absentCode
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

		if ($request->absentCode = '') {
			return response()->json([]);
		}
		else {
			return response()->json($arrResult->dataListSet);
		}
	}

	public function dataInsuranceCodeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'InsuranceCode_',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataInsuranceClassAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'InsuranceClass_',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataComGenAPI(Request $request)
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
						'variable' => 'Gender_',
	    				'comGenCode' => $request->gender,
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);

			$response2 = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'MaritalStatus_',
	    				'comGenCode' => $request->maritalStatus,
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);

			$response3 = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'Religion_',
	    				'comGenCode' => $request->religionCode,
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);

			$response4 = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'Nationality_',
	    				'comGenCode' => $request->nationality,
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);

			$response5 = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'EmploymentStatus_',
	    				'comGenCode' => $request->employmentStatus,
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);

			$response6 = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'EmploymentType_',
	    				'comGenCode' => $request->employmentType,
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);

			$response7 = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'TerminationCode_',
	    				'comGenCode' => $request->terminationCode,
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);

			$response8 = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'AbsenteeismType_',
	    				'comGenCode' => $request->absenteeismType,
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);

			$response9 = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'TaxStatus_',
	    				'comGenCode' => $request->taxStatus,
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);

			$response10 = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'TaxStatus_',
	    				'comGenCode' => $request->taxStatusNextYear,
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);

			$response11 = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'TaxOffice_',
	    				'comGenCode' => $request->taxOffice,
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);

			$response12 = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'TaxMethod_',
	    				'comGenCode' => $request->taxCalculationMethod,
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);

			$response13 = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'Currency_',
	    				'comGenCode' => $request->currencyCode1,
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);

			$response14 = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'Currency_',
	    				'comGenCode' => $request->currencyCode2,
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);

			$response15 = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'Currency_',
	    				'comGenCode' => $request->currencyCode3,
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);

			$response16 = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'BloodType_',
	    				'comGenCode' => $request->bloodType,
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);

			$response17 = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'DrivingLicense_',
	    				'comGenCode' => $request->drivingLicenseMobilType,
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);

			$response18 = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'InsuranceCode_',
	    				'comGenCode' => $request->insuranceCode,
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);

			$response19 = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'InsuranceClass_',
	    				'comGenCode' => $request->insuranceClassCode,
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

		// var_dump($request->variable);

	    $arrResult = json_decode($response->getBody()->getContents());
	    $arrResult2 = json_decode($response2->getBody()->getContents());
	    $arrResult3 = json_decode($response3->getBody()->getContents());
	    $arrResult4 = json_decode($response4->getBody()->getContents());
	    $arrResult5 = json_decode($response5->getBody()->getContents());
	    $arrResult6 = json_decode($response6->getBody()->getContents());
	    $arrResult7 = json_decode($response7->getBody()->getContents());
	    $arrResult8 = json_decode($response8->getBody()->getContents());
	    $arrResult9 = json_decode($response9->getBody()->getContents());
	    $arrResult10 = json_decode($response10->getBody()->getContents());
	    $arrResult11 = json_decode($response11->getBody()->getContents());
	    $arrResult12 = json_decode($response12->getBody()->getContents());
	    $arrResult13 = json_decode($response13->getBody()->getContents());
	    $arrResult14 = json_decode($response14->getBody()->getContents());
	    $arrResult15 = json_decode($response15->getBody()->getContents());
	    $arrResult16 = json_decode($response16->getBody()->getContents());
	    $arrResult17 = json_decode($response17->getBody()->getContents());
	    $arrResult18 = json_decode($response18->getBody()->getContents());
	    $arrResult19 = json_decode($response19->getBody()->getContents());

	    return response()->json(
			[
			'data_gender' => ($request->gender == null) ? [] : $arrResult->dataListSet[0], 
			'data_marital_status' => ($request->maritalStatus == null) ? [] : $arrResult2->dataListSet[0], 
			'data_religion' => ($request->religionCode == null) ? [] : $arrResult3->dataListSet[0], 
			'data_nationality' => ($request->nationality == null) ? [] : $arrResult4->dataListSet[0], 
			'data_employment_status' => ($request->employmentStatus == null) ? [] : $arrResult5->dataListSet[0], 
			'data_employment_type' => ($request->employmentType == null) ? [] : $arrResult6->dataListSet[0], 
			'data_termination_code' => ($request->terminationCode == null) ? [] : $arrResult7->dataListSet[0], 
			'data_absenteeism_type' => ($request->absenteeismType == null) ? [] : $arrResult8->dataListSet[0], 
			'data_tax_status' => ($request->taxStatus == null) ? [] : $arrResult9->dataListSet[0], 
			'data_tax_status_next_year' => ($request->taxStatusNextYear == null) ? [] : $arrResult10->dataListSet[0], 
			'data_tax_office' => ($request->taxOffice == null) ? [] : $arrResult11->dataListSet[0],
			'data_tax_calculation_method' => ($request->taxCalculationMethod == null) ? [] : $arrResult12->dataListSet[0],
			'data_currency_code_1' => ($request->currencyCode1 == null) ? [] : $arrResult13->dataListSet[0],
			'data_currency_code_2' => ($request->currencyCode2 == null) ? [] : $arrResult14->dataListSet[0],
			'data_currency_code_3' => ($request->currencyCode3 == null) ? [] : $arrResult15->dataListSet[0],
			'data_blood_type' => ($request->bloodType == null) ? [] : $arrResult16->dataListSet[0],
			'data_driving_license_car_type' => ($request->drivingLicenseMobilType == null) ? [] : $arrResult17->dataListSet[0],
			'data_insurance_code' => ($request->insuranceCode == null) ? [] : $arrResult18->dataListSet[0],
			'data_insurance_class' => ($request->insuranceClassCode == null) ? [] : $arrResult19->dataListSet[0],
			]
		);
	}

	public function dataPerformanceResultAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/gmperformanceresult/getgmperformanceresult',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}	    		
				}
	    	);
	    }

        return response()->json($data);
	}

	public function dataEmployeeNoReqDetailAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    			'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/pemaster/getpemasterdetail',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'employeeNo' => $request->employeeNo
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

		// var_dump($arrResult->dataListSet[0]);

        return response()->json($arrResult->dataListSet[0]);
	}

	public function dataEmployeeNoTermDateNotNullAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/pemaster/gettermdatenotnull',
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

        if($search == ''){
	    	$employees = $arrResult->dataListSet;
	    }else{
	    	$employees    = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value)){
	    				return preg_match('/' . $search . '/i', $value);
	    			}
				}
	    	);
	    }

        return response()->json($employees);
	}

	public function dataEmployeeNoSeveranceAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/prpensionseverance/getprpensionseverance',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'employeeNo' => $request->employeeNo
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

        return response()->json($arrResult->dataListSet[0]);
	}

	public function dataEmployeeNoLoanDataEntryAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/prloandataentry/getloanemployee',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'employeeNo' => $request->employeeNo
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

        return response()->json($arrResult->dataListSet[0]);
	}

	public function dataEmployeeNoFullPartialLoanPaymentAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/prloanpayment/getprloanpayment',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'employeeNo' => $request->employeeNo
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

        return response()->json($arrResult->dataListSet[0]);
	}

	public function dataPerformanceResultBonusTHRAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/gmperformanceresult/getgmperformanceresult',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'value' => $request->value
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

		if ($request->value == null) {
			return response()->json([]);
		}
		else {
			return response()->json($arrResult->dataListSet[0]);
		}
	}

	public function dataFieldAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/prformulathr/gettablefield',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'tableName' => $request->tableName
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->tableName)){
	    				return preg_match('/' . $search . '/i', $value->tableName);
	    			}	    		
				}
	    	);
	    }

        return response()->json($data);
	}

	public function dataLoanCodeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/prloanmaster/getloanmaster',
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

	    if($search == ''){
	    	$loan = $arrResult->dataListSet;
	    }else{
	    	$loan    = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->loanDescription)){
	    				return preg_match('/' . $search . '/i', $value->loanDescription);
	    			}else if(preg_match('/' . $search . '/i', $value->loanCode)){
	    				return preg_match('/' . $search . '/i', $value->loanCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($loan);
	}

	public function dataFieldNameSalaryComponentAPI(Request $request)
    {

        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/salarycomponentdata/getsalarycomponentdata',
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

        return response()->json($arrResult->dataListSet);
    }
	
	public function dataLoanCodeLoanDataEntryAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/prloandataentry/getloanemployee',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'loanCode' => $request->loanCode
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

        return response()->json($arrResult->dataListSet[0]);
    }

	public function dataEditFieldNameSalaryComponentAPI(Request $request)
    {

        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

			// var_dump($request->fieldName);

            $response = $client->post(env('API_URL') . '/salarycomponentdata/getsalarycomponentdata',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
						'fieldName' => $request->fieldName
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

		if ($request->absentCode = '') {
			return response()->json([]);
		}
		else {
			return response()->json($arrResult->dataListSet);
		}
    }

	public function dataEmployeeNoSlipFormatAPI(Request $request)
    {

        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

			// var_dump($request->fieldName);

            $response = $client->post(env('API_URL') . '/pemaster/getpemasterdetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
						'employeeNo' => "8890"
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

        if ($request->absentCode = '') {
            return response()->json([]);
        }
        else {
            return response()->json($arrResult->dataListSet);
        }
    }

	public function dataAttachmentCodeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'variable' => 'AttachmentCode_',
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

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataPaymentMethodFullPartialLoanPaymentAPI(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/prloanpayment/getprloanpayment',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'paymentFlag' => $request->paymentFlag
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

        return response()->json($arrResult->dataListSet[0]);
	}

	public function dataColumnAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/importfromexcel/getsalaryyearly',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'transferTo' => $request->transferTo
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->transferTo)){
	    				return preg_match('/' . $search . '/i', $value->transferTo);
	    			}	    		
				}
	    	);
	    }

        return response()->json($data);
	}

	public function dataMedicalLimitTypeAPI(Request $request)
    {
		$search = $request->search;
		
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
						'variable' => 'MedicalLimitType_',
	    				'companyCode' => Session::get('companyCode'),
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataMedicalLimitTypeFunctionAPI(Request $request)
    {
		$search = $request->search;
		
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'MedicalLimitType_',
						'comGenCode' => $request->limitType,
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataAccountAPI(Request $request)
    {
		$search = $request->search;
		
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/gmaccount/getgmaccount',
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->costCenterCode)){
	    				return preg_match('/' . $search . '/i', $value->costCenterCode);
	    			}else if(preg_match('/' . $search . '/i', $value->costCenterDescription)){
	    				return preg_match('/' . $search . '/i', $value->costCenterDescription);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataEditAccountAPI(Request $request)
    {
		$search = $request->search;
		
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);
	    	
	    	$response = $client->post(env('API_URL') . '/gmaccount/getgmaccount',
	    		['body' => json_encode(
	    			[
						'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
						'accountNo' => $request->accountNo
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

		if($search == ''){
	    	$cost_center = $arrResult->dataListSet;
	    }else{
	    	$cost_center = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->costCenterCode)){
	    				return preg_match('/' . $search . '/i', $value->costCenterCode);
	    			}else if(preg_match('/' . $search . '/i', $value->costCenterDescription)){
	    				return preg_match('/' . $search . '/i', $value->costCenterDescription);
	    			}
	    		}
	    	);
	    }

        return response()->json($cost_center);
	}

	public function dataLimitEligibleAPI(Request $request)
	{
		$search = $request->search;
		
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

			$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
						'variable' => 'LimitEligible_',
	    				'companyCode' => Session::get('companyCode'),
						'languageCode' => App::getLocale(),
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
					}
				}
			);
	    }

		return response()->json($data);
	}

	public function dataLimitEligibleFunctionAPI(Request $request)
    {
		$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'LimitEligible_',
						'comGenCode' => $request->limitEligible,
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataMinimumServiceLengthAPI(Request $request)
    {
		$search = $request->search;
		
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
						'variable' => 'MinimumServiceLength_',
	    				'companyCode' => Session::get('companyCode'),
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataMinimumServiceLengthFunctionAPI(Request $request)
    {
		$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'MinimumServiceLength_',
						'comGenCode' => $request->minServiceLengthBy,
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataDefaultMedicalPaymentBankTypeAPI(Request $request)
    {
		$search = $request->search;
		
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
						'variable' => 'DefaultMedicalPaymentBankType_',
	    				'companyCode' => Session::get('companyCode'),
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataDefaultMedicalPaymentBankTypeFunctionAPI(Request $request)
    {
		$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'DefaultMedicalPaymentBankType_',
						'comGenCode' => $request->defaultMedicalPaymentBankType,
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataRateTypeAPI(Request $request)
    {
		$search = $request->search;
		
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
						'variable' => 'RateType_',
	    				'companyCode' => Session::get('companyCode'),
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataRateTypeFunctionAPI(Request $request)
    {
		$search = $request->search;

    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'RateType_',
						'comGenCode' => $request->transactionRateTypeCode,
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataRoundingMethodAPI(Request $request)
    {
		$search = $request->search;
		
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
						'variable' => 'RoundingMethod_',
	    				'companyCode' => Session::get('companyCode'),
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataRoundingMethodFunctionAPI(Request $request)
    {
		$search = $request->search;
		
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/comgen/getcomgen',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'variable' => 'RoundingMethod_',
						'comGenCode' => $request->roundingMethod,
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataClaimCodeAPI(Request $request)
    {
		$search = $request->search;
		
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/claimcode/getclaimcode',
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->claimCode)){
	    				return preg_match('/' . $search . '/i', $value->claimCode);
	    			}else if(preg_match('/' . $search . '/i', $value->claimName)){
	    				return preg_match('/' . $search . '/i', $value->claimName);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataClaimCodeFunctionAPI(Request $request)
    {
		$search = $request->search;
		
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/claimcode/getclaimcode',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'claimCode' => $request->claimCode,
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->claimCode)){
	    				return preg_match('/' . $search . '/i', $value->claimCode);
	    			}else if(preg_match('/' . $search . '/i', $value->claimName)){
	    				return preg_match('/' . $search . '/i', $value->claimName);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataReportFormatAPI(Request $request)
    {
		$search = $request->search;
		
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/prreportformat/getreportformatlist',
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->reportCode)){
	    				return preg_match('/' . $search . '/i', $value->reportCode);
	    			}else if(preg_match('/' . $search . '/i', $value->description)){
	    				return preg_match('/' . $search . '/i', $value->description);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataClaimToAPI(Request $request)
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
	    				'variable' => 'ClaimTo_',
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

	    return response()->json($arrResult->dataListSet);
	}

	public function dataClaimToFunctionAPI(Request $request)
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
	    				'variable' => 'ClaimTo_',
						'comGenCode' => $request->dayCode,
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

	    return response()->json($arrResult->dataListSet);
	}

	public function dataClaimForAPI(Request $request)
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
	    				'variable' => 'ClaimFor_',
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

	    return response()->json($arrResult->dataListSet);
	}

	public function dataClaimForFunctionAPI(Request $request)
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
	    				'variable' => 'ClaimFor_',
						'comGenCode' => $request->dayCode,
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

	    return response()->json($arrResult->dataListSet);
	}

	public function dataDiseaseCodeAPI(Request $request)
    {
		$search = $request->search;
		
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/diseasecode/getdiseasecode',
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->diseaseCode)){
	    				return preg_match('/' . $search . '/i', $value->diseaseCode);
	    			}else if(preg_match('/' . $search . '/i', $value->description)){
	    				return preg_match('/' . $search . '/i', $value->description);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataDiseaseCodeFunctionAPI(Request $request)
    {
		$search = $request->search;
		
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/diseasecode/getdiseasecode',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'diseaseCode' => $request->diseaseCode,
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

		if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->diseaseCode)){
	    				return preg_match('/' . $search . '/i', $value->diseaseCode);
	    			}else if(preg_match('/' . $search . '/i', $value->description)){
	    				return preg_match('/' . $search . '/i', $value->description);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}
}
