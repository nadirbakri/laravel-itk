<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use DataTables;
use Validator;
use Session;
use App;

class DataController extends Controller
{
    public function dataGenderAPI(Request $request)
    {
    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'Gender_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'ProcessStatus_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'ProcessStatus_',
						'comGenCode' => $request->processStatus,
	    				'languageCode' => strtoupper(App::getLocale())
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

	public function dataBusinessTypeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'BusinessType_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'DeductOvt_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'BloodType_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'MaritalStatus_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'Nationality_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'DrivingLicense_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'Relation_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'TerminationCode_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'FringeBenefit_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'TaxStatus_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'PeMasterAbsenteeismType_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'PeMasterAbsenteeismType_',
						'comGenCode' => $request->absentType,
	    				'languageCode' => strtoupper(App::getLocale())
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

	public function dataAbsentTypeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'AbsentType_',
	    				'languageCode' => strtoupper(App::getLocale())
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

	public function dataAbsentTypeFuncAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'AbsentType_',
						'comGenCode' => $request->absentType,
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'DeductLeave_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'DeductLeave_',
						'comGenCode' => $request->deductLeave,
	    				'languageCode' => strtoupper(App::getLocale())
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

		if(empty($request->deductLeave)){
			$data = [];
		}else{
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
		}

        return response()->json($data);
	}

	public function dataTaxOfficeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'TaxOffice_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'TaxMethod_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'Currency_',
	    				'languageCode' => strtoupper(App::getLocale())
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

	public function dataCurrencyFunctionAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'Currency_',
	    				'languageCode' => strtoupper(App::getLocale())
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

	public function dataCurrencyCodeLoanDataEntryAPI(Request $request)
    {
    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/payroll/getLoanEmployee',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/payroll/getPrLoanPayment',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ZipCode/getZipCode',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ZipCode/getZipCode',
	    		['body' => json_encode(
	    			[
						'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'zipCode' => $request->homeZipCode
	    			]
	    		)]
	    	);

			$response2 = $client->post(env('API_URL') . '/personel/ZipCode/getZipCode',
	    		['body' => json_encode(
	    			[
						'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'zipCode' => $request->otherZipCode
	    			]
	    		)]
	    	);

			$response3 = $client->post(env('API_URL') . '/personel/ZipCode/getZipCode',
	    		['body' => json_encode(
	    			[
						'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'zipCode' => $request->workZipCode
	    			]
	    		)]
	    	);

			$response4 = $client->post(env('API_URL') . '/personel/ZipCode/getZipCode',
	    		['body' => json_encode(
	    			[
						'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'zipCode' => $request->correspondenceZipCode
	    			]
	    		)]
	    	);

			$response5 = $client->post(env('API_URL') . '/personel/ZipCode/getZipCode',
	    		['body' => json_encode(
	    			[
						'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'zipCode' => $request->homeDistrictCode
	    			]
	    		)]
	    	);

			$response6 = $client->post(env('API_URL') . '/personel/ZipCode/getZipCode',
	    		['body' => json_encode(
	    			[
						'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'zipCode' => $request->otherDistrictCode
	    			]
	    		)]
	    	);

			$response7 = $client->post(env('API_URL') . '/personel/ZipCode/getZipCode',
	    		['body' => json_encode(
	    			[
						'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'zipCode' => $request->homeSubDistrictCode
	    			]
	    		)]
	    	);

			$response8 = $client->post(env('API_URL') . '/personel/ZipCode/getZipCode',
	    		['body' => json_encode(
	    			[
						'recordStatus' => 'A',
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
				'data_home_zip_code' => ($request->homeZipCode == null || $arrResult->dataListSet == null) ? [] : $arrResult->dataListSet[0],
				'data_other_zip_code' => ($request->otherZipCode == null || $arrResult2->dataListSet == null) ? [] : $arrResult2->dataListSet[0],
				'data_work_zip_code' => ($request->workZipCode == null || $arrResult3->dataListSet == null) ? [] : $arrResult3->dataListSet[0],
				'data_correspondence_zip_code' => ($request->correspondenceZipCode == null || $arrResult4->dataListSet == null) ? [] : $arrResult4->dataListSet[0],
				'data_home_district_code' => ($request->homeDistrictCode == null || $arrResult5->dataListSet == null) ? [] : $arrResult5->dataListSet[0],
				'data_other_district_code' => ($request->otherDistrictCode == null || $arrResult6->dataListSet == null) ? [] : $arrResult6->dataListSet[0],
				'data_home_subdistrict_code' => ($request->homeSubdistrictCode == null || $arrResult7->dataListSet == null) ? [] : $arrResult7->dataListSet[0],
				'data_other_subdistrict_code' => ($request->otherSubDistrictCode == null || $arrResult8->dataListSet == null) ? [] : $arrResult8->dataListSet[0],
			]
		);
	}

	public function dataDistrictAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ZipCode/getZipCode',
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
		

		$arrPropinsi = [];
		if($arrResult->dataListSet != null){
			foreach($arrResult->dataListSet as $val) {
				if(!array_key_exists($val->propinsi, $arrPropinsi)) {
					$arrPropinsi[$val->propinsi] = [
						'zipCode' => $val->zipCode,
						'propinsi' => $val->propinsi,
					];
				}
			}
		}

		// Reset keys untuk membuat array numerik
		$arrPropinsi = array_values($arrPropinsi);

		// Urutkan berdasarkan abjad
		usort($arrPropinsi, function ($a, $b) {
			return strcmp($a['propinsi'], $b['propinsi']);
		});

	    if($search == ''){
	    	$data = $arrPropinsi;
	    }else{
	    	$data = array_filter(
	    		$arrPropinsi,
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

	//     	$response = $client->post(env('API_URL') . '/personel/ZipCode/getZipCode',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ZipCode/getZipCode',
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

		$arrKabupaten = [];
		if ($arrResult->dataListSet != null) {
			foreach ($arrResult->dataListSet as $val) {
				if (!array_key_exists($val->kabupaten, $arrKabupaten)) {
					$arrKabupaten[$val->kabupaten] = [
						'zipCode' => $val->zipCode,
						'kabupaten' => $val->kabupaten,
					];
				}
			}
		}

		// Reset keys untuk membuat array numerik
		$arrKabupaten = array_values($arrKabupaten);

		// Urutkan berdasarkan abjad
		usort($arrKabupaten, function ($a, $b) {
			return strcmp($a['kabupaten'], $b['kabupaten']);
		});

	    if($search == ''){
	    	$data = $arrKabupaten;
	    }else{
	    	$data = array_filter(
	    		$arrKabupaten,
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/mobile/TmWorkPattern/getTmWorkPatternService',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/mobile/TmWorkPattern/getTmWorkPatternService',
	    		['body' => json_encode(
	    			[
						'recordStatus' => 'A',
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

		if ($arrResult->dataListSet == null) {
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/CompanyBank/getCompanyBank',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/CompanyBank/getCompanyBank',
	    		['body' => json_encode(
	    			[
						'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'bankCode' => $request->companyBankCode1
	    			]
	    		)]
	    	);

			$response2 = $client->post(env('API_URL') . '/personel/CompanyBank/getCompanyBank',
	    		['body' => json_encode(
	    			[
						'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'bankCode' => $request->companyBankCode2
	    			]
	    		)]
	    	);

			$response3 = $client->post(env('API_URL') . '/personel/CompanyBank/getCompanyBank',
	    		['body' => json_encode(
	    			[
						'recordStatus' => 'A',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GmBank/getGmBank',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GmBank/getGmBank',
	    		['body' => json_encode(
	    			[
						'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'bankCode' => $request->employeeBankCode1
	    			]
	    		)]
	    	);

			$response2 = $client->post(env('API_URL') . '/personel/GmBank/getGmBank',
	    		['body' => json_encode(
	    			[
						'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'bankCode' => $request->employeeBankCode2
	    			]
	    		)]
	    	);

			$response3 = $client->post(env('API_URL') . '/personel/GmBank/getGmBank',
	    		['body' => json_encode(
	    			[
						'recordStatus' => 'A',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
						'variable' => 'Religion_',
	    				// 'companyCode' => Session::get('companyCode'),
						'languageCode' => strtoupper(App::getLocale())
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

		if($arrResult->dataListSet !== null){
	    	$religion = array_merge($religion, $arrResult->dataListSet);
		}

        return response()->json($religion[0]);
	}

	
// Ini
	public function dataReligionAPI(Request $request)
    {
		$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'Religion_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
						'variable' => 'Religion_',
	    				// 'companyCode' => Session::get('companyCode'),
						'languageCode' => strtoupper(App::getLocale())
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

		if($arrResult->dataListSet !== null){
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
		}

        return response()->json($religion);
	}

	public function dataReligionCodeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/payroll/getPrFormulaTHR',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'RecordStatus_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/PeMaster/getPeMasterGrid',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
						'userID' => Session::get('userID'),
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
	    	$employees = array_filter(
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

		if ($employees) {
			usort($employees, function ($a, $b) {
				return strcmp($a->employeeNo, $b->employeeNo);
			});
		}

        return response()->json($employees);
	}

	public function dataEmployeeNoTableAPI(Request $request)
    {
    	$search = $request->search;

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
	    				'companyCode' => Session::get('companyCode'),
						'userID' => Session::get('userID'),
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

		usort($arrResult->dataListSet, function ($a, $b) {
			return strcmp($a->employeeNo, $b->employeeNo);
		});

        return Datatables::of($arrResult->dataListSet)->make(true);
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/PeMasterLeave/getPeMasterLeave',
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
	    	$filteredData = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->employeeNo)){
	    				return preg_match('/' . $search . '/i', $value->employeeNo);
	    			} else if(preg_match('/' . $search . '/i', $value->employeeName)){
	    				return preg_match('/' . $search . '/i', $value->employeeName);
	    			}
	    		}
	    	);

			$data = array_values($filteredData);
	    }

		usort($data, function ($a, $b) {
			return strcmp($a->employeeNo, $b->employeeNo);
		});

		// dd($data);
        return response()->json($data);
	}

	public function dataEmployeeNoReqAPI2(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/PeMasterLeave/getPeMasterLeave',
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

		usort($data, function ($a, $b) {
			return strcmp($a->employeeNo, $b->employeeNo);
		});
		
        return response()->json($data);
	}

	public function dataEmployeeNoNoAPI(Request $request)
    {
    	$search = $request->search;

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
	    				'companyCode' => Session::get('companyCode'),
	    				'employeeNo' => $request->employeeNo,
						'userID' => Session::get('userID'),
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

		usort($employees, function ($a, $b) {
			return strcmp($a->employeeNo, $b->employeeNo);
		});

        return response()->json($employees);
	}

	public function dataEmployeeNoLoanPaymentAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/payroll/LoanLookUp',
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

		usort($employees, function ($a, $b) {
			return strcmp($a->employeeNo, $b->employeeNo);
		});

        return response()->json($employees);
	}

	public function dataCompanyAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/Company/getcompany',
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

	public function dataCompanyUnderHoldingAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/Company/getcompany',
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
			$company = [];
		}else{
			if($search == ''){
				$company = $arrResult->dataListSet[0]->companyUnderHolding;
			}else{
				$company    = array_filter(
					$arrResult->dataListSet[0]->companyUnderHolding,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->companyCode)){
							return preg_match('/' . $search . '/i', $value->companyCode);
						}else if(preg_match('/' . $search . '/i', $value->companyName)){
							return preg_match('/' . $search . '/i', $value->companyName);
						}
					}
				);
			}
		}

        return response()->json($company);
	}

	public function dataCompanyDetailAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/Company/getcompany',
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

	public function dataSessionCompanyAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/User/getuserholdingcompany',
	    		['body' => json_encode(
	    			[
						'recordStatus' => 'A',
						'userName' => Session::get('userID'),
						"sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
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

        return response()->json($arrResult->dataListSet);
	}

	public function changeSessionCompanyAPI(Request $request)
    {
		Session::forget('companyCode');
		Session::forget('companyName');
		Session::put('companyCode', $request->companyCode);
		Session::put('companyName', $request->companyName);
		
		$menuList = Session::get('menuListTemp');

		foreach($menuList as $value){
			if ($value->companyCode != $request->companyCode){
				continue;
			}

			if($value->moduleID == 'UTI'){
				Session::forget('groupAuthorizeUtilities');
				Session::put('groupAuthorizeUtilities', $value->groupAuthorizeCode);
				// unset($menuList[$key]);
			}
			if($value->moduleID == 'HOME'){
				Session::forget('groupAuthorizeHome');
				Session::put('groupAuthorizeHome', $value->groupAuthorizeCode);
			}
			if($value->moduleID == 'TM'){
				Session::forget('groupAuthorizeTimeManagement');
				Session::put('groupAuthorizeTimeManagement', $value->groupAuthorizeCode);
			}
			if($value->moduleID == 'PE'){
				Session::forget('groupAuthorizePersonnel');
				Session::put('groupAuthorizePersonnel', $value->groupAuthorizeCode);
			}
			if($value->moduleID == 'PY'){
				Session::forget('groupAuthorizePayroll');
				Session::put('groupAuthorizePayroll', $value->groupAuthorizeCode);
			}
			if($value->moduleID == 'MD'){
				Session::forget('groupAuthorizeMedical');
				Session::put('groupAuthorizeMedical', $value->groupAuthorizeCode);
			}
			if($value->moduleID == 'REP'){
				Session::forget('groupAuthorizeReport');
				Session::put('groupAuthorizeReport', $value->groupAuthorizeCode);
			}
			if($value->moduleID == 'RPT'){
				Session::forget('groupAuthorizeExport');
				Session::put('groupAuthorizeExport', $value->groupAuthorizeCode);
			}
			if($value->moduleID == 'TRX'){
				Session::forget('groupAuthorizeTransaction');
				Session::put('groupAuthorizeTransaction', $value->groupAuthorizeCode);
			}
			if($value->moduleID == 'MOB'){
				Session::forget('groupAuthorizeMasterData');
				Session::put('groupAuthorizeMasterData', $value->groupAuthorizeCode);
			}
		}

        return response()->json(["status" => true, "message" => "Success!"]);
	}

	public function dataMenuMasterWebAPI(Request $request)
    {
    	$search = $request->search;

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

	    if($search == ''){
	    	$menu = $arrResult->dataListSet;
	    }else{
	    	$menu = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->menuID)){
	    				return preg_match('/' . $search . '/i', $value->menuID);
	    			}else if(preg_match('/' . $search . '/i', $value->menuName)){
	    				return preg_match('/' . $search . '/i', $value->menuName);
	    			}
	    		}
	    	);
	    }

        return response()->json($menu);
	}

	public function dataMenuMasterWebDetailAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/MenuMasterWeb/getMenuMasterWeb',
	    		['body' => json_encode(
	    			[
						"menuID" => $request->menuID,
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

	    if($search == ''){
			if(empty($request->menuID)){
				$menu = [];
			}else{
				$menu = $arrResult->dataListSet;
			}	    	
	    }else{
	    	$menu = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->menuName)){
	    				return preg_match('/' . $search . '/i', $value->menuName);
	    			}else if(preg_match('/' . $search . '/i', $value->menuID)){
	    				return preg_match('/' . $search . '/i', $value->menuID);
	    			}
	    		}
	    	);
	    }

        return response()->json($menu);
	}

	public function dataModuleAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/Module/getModule',
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

	public function dataModuleDetailAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/Module/getModule',
	    		['body' => json_encode(
	    			[
	    				'moduleID' => $request->moduleID
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
			if(empty($request->moduleID)){
				$module = [];
			}else{
				$module = $arrResult->dataListSet;
			}	    	
	    }else{
	    	$module = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->moduleName)){
	    				return preg_match('/' . $search . '/i', $value->moduleName);
	    			}else if(preg_match('/' . $search . '/i', $value->moduleID)){
	    				return preg_match('/' . $search . '/i', $value->moduleID);
	    			}
	    		}
	    	);
	    }

        return response()->json($module);
	}

	// Reimbursement


	public function dataGroupAuthorizeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

			$param = [
				'recordStatus' => 'A',
	    		'companyCode' => Session::get('companyCode'),
				'isRange' => (bool) $request->isRange
			];

			if(isset($request->isRange) && $request->isRange == true && $request->isModule == false){
				$param['groupAuthorizeCode'] = Session::get('groupAuthorizeUtilities');
			}

	    	$response = $client->post(env('API_URL') . '/personel/GroupAuthorize/getGroupAuthorize',
	    		['body' => json_encode($param)]
	    	);

			if(isset($request->module)){
				$response2 = $client->post(env('API_URL') . '/personel/User/getUserAccessView',
					['body' => json_encode(
						[
							'companyCode' => Session::get('companyCode'),
							'userID' => Session::get('userID'),
							'moduleID' => $request->module,
							'logActionUserID' => Session::get('userID'),
							'logActionUsername' => Session::get('userName')
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

		// dd($arrResult->dataListSet);

		if(isset($request->module)){
			$arrResult2 = json_decode($response2->getBody()->getContents());

			if($arrResult2->dataListSet != null || $arrResult2->dataListSet != ''){
				$arrResult->dataListSet = array_filter($arrResult->dataListSet, fn($n) => $n->groupAuthorizeCode <= $arrResult2->dataListSet[0]->groupAuthorizeCode);
			}
		}

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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GroupAuthorize/getGroupAuthorize',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode')
	    			]
	    		)]
	    	);

			if(isset($request->module)){
				$response2 = $client->post(env('API_URL') . '/personel/User/getUserAccessView',
					['body' => json_encode(
						[
							'companyCode' => Session::get('companyCode'),
							'userID' => Session::get('userID'),
							'moduleID' => $request->module,
							'logActionUserID' => Session::get('userID'),
							'logActionUsername' => Session::get('userName')
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

		if(isset($request->module)){
			$arrResult2 = json_decode($response2->getBody()->getContents());

			if($arrResult2->dataListSet != null || $arrResult2->dataListSet != ''){
				$arrResult->dataListSet = array_filter($arrResult->dataListSet, fn($n) => $n->groupAuthorizeCode <= $arrResult2->dataListSet[0]->groupAuthorizeCode);
			}
		}

		usort($arrResult->dataListSet, function($a, $b) {
			return $a->groupAuthorizeCode <=> $b->groupAuthorizeCode;
		});

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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GroupAuthorize/getGroupAuthorize',
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
    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GroupAuthorize/getGroupAuthorize',
	    		['body' => json_encode(
	    			[
						'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'groupAuthorizeCode' => (int) $request->groupAuthorizeCode,
						'isRange' => false
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GmPosition/getgmPosition',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GmPosition/getgmPosition',
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
		// dd($arrResult->dataListSet);

	    if($search == ''){
			if(empty($request->positionCode)){
				$position = [];
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GmPosition/getgmPosition',
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
		
		if($arrResult->dataListSet !== null){
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
		}

        return response()->json($position);
	}
	
	public function dataSupervisorPositionAPI(Request $request)
    {
    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GmPosition/getgmPosition',
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

		if(empty($request->supervisorCode)){
			return response()->json([]);
		}else{
			return response()->json($arrResult->dataListSet[0]);
		}
	}

	public function dataEmployeeNoPositionAPI(Request $request)
    {
    	$search = $request->search;

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
	    				'companyCode' => Session::get('companyCode'),
	    				'positionCode' => $request->positionCode,
						'userID' => Session::get('userID'),
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

		usort($employees, function ($a, $b) {
			return strcmp($a->employeeNo, $b->employeeNo);
		});

        return response()->json($employees);
	}

	public function dataEmployeeNoSupervisorPositionAPI(Request $request)
    {
    	$search = $request->search;

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
	    				'companyCode' => Session::get('companyCode'),
	    				'supervisorPositionCode' => $request->supervisorPositionCode,
						'userID' => Session::get('userID'),
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

		usort($employees, function ($a, $b) {
			return strcmp($a->employeeNo, $b->employeeNo);
		});

        return response()->json($employees);
	}

	public function dataUserAccessGroupAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GroupUserAccess/getGroupUserAccess',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GroupUserAccess/getGroupUserAccess',
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

		usort($user_data, function ($a, $b) {
			return strcmp($a->employeeNo, $b->employeeNo);
		});

        return response()->json($user_data);
	}

	public function dataUserDetailAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/getuserdetail',
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

		usort($user_data, function ($a, $b) {
			return strcmp($a->employeeNo, $b->employeeNo);
		});

        return response()->json($user_data);
	}

	public function dataDecreeAPI(Request $request)
    {
    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'Decree_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'Sanction_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'Language_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'SkillProficiency_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'Education_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GmInstitution/getgmInstitution',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GmMajor/getgmMajor',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'EduStatus_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GmTitle/getgmTitle',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/City/getCity',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/City/getCity',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'cityCode' => $request->birthPlace
	    			]
	    		)]
	    	);

			$response2 = $client->post(env('API_URL') . '/personel/City/getCity',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'cityCode' => $request->drivingLicenseMobilNoPlaceRegistration
	    			]
	    		)]
	    	);

			$response3 = $client->post(env('API_URL') . '/personel/City/getCity',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'cityCode' => $request->drivingLicenseMotorNoPlaceRegistration
	    			]
	    		)]
	    	);

			$response4 = $client->post(env('API_URL') . '/personel/City/getCity',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'cityCode' => $request->homeCityCode
	    			]
	    		)]
	    	);

			$response5 = $client->post(env('API_URL') . '/personel/City/getCity',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'cityCode' => $request->otherCityCode
	    			]
	    		)]
	    	);

			$response6 = $client->post(env('API_URL') . '/personel/City/getCity',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'cityCode' => $request->workCityCode
	    			]
	    		)]
	    	);

			$response7 = $client->post(env('API_URL') . '/personel/City/getCity',
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
				'data_birth_place' => ($request->birthPlace == null || $arrResult->dataListSet == null) ? [] : $arrResult->dataListSet[0],
				'data_driving_license_car_no_place_registration' => ($request->drivingLicenseMobilNoPlaceRegistration == null || $arrResult2->dataListSet == null) ? [] : $arrResult2->dataListSet[0],
				'data_driving_license_motorcycle_no_place_registration' => ($request->drivingLicenseMotorNoPlaceRegistration == null || $arrResult3->dataListSet == null) ? [] : $arrResult3->dataListSet[0],
				'data_home_city_code' => ($request->homeCityCode == null || $arrResult4->dataListSet == null) ? [] : $arrResult4->dataListSet[0],
				'data_other_city_code' => ($request->otherCityCode == null || $arrResult5->dataListSet == null) ? [] : $arrResult5->dataListSet[0],
				'data_work_city_code' => ($request->workCityCode == null || $arrResult6->dataListSet == null) ? [] : $arrResult6->dataListSet[0],
				'data_correspondence_city_code' => ($request->correspondenceCityCode == null || $arrResult7->dataListSet == null) ? [] : $arrResult7->dataListSet[0],
			]
		);
	}

	public function dataSkillAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GmSkill/getgmSkill',
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
                'verify' => false,
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/audittrail/UserLog/getUserLog',
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
                'verify' => false,
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
                'verify' => false,
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
		$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/reportformatemployee/v2/getFieldNameList',
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
				});
	    }

        return response()->json($data);
	}

	public function dataLevelTypeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/LevelMaster/getLevelMaster',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/LevelMaster/getLevelMaster',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/User/getModuleList',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/PeMaster/getPeMasterGrid',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
						'userID' => Session::get('userID'),
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

		if ($arrResult->dataListSet) {
			usort($arrResult->dataListSet, function ($a, $b) {
				return strcmp($a->employeeNo, $b->employeeNo);
			});

			if($request->func == 'First'){
				return response()->json($arrResult->dataListSet[0]);
			}else if($request->func == 'Last'){
				end($arrResult->dataListSet);
				$key = key($arrResult->dataListSet);
				return response()->json($arrResult->dataListSet[$key]);
			}
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GmPosition/getgmPosition',
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
		
		if($arrResult->dataListSet !== null){
	    	$position = array_merge($position, $arrResult->dataListSet);
		}

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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
						'variable' => 'EmploymentStatus_',
						'languageCode' => strtoupper(App::getLocale())
	    				// 'companyCode' => Session::get('companyCode')
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

		if($arrResult->dataListSet !== null){
	    	$employment_status = array_merge($employment_status, $arrResult->dataListSet);
		}

        return response()->json($employment_status[0]);
	}

	public function dataLocationAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/Location/getLocation',
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
                'verify' => false,
					'headers' => [ 'Content-Type' => 'application/json',
									'Authorization' => 'Bearer ' . Session::get('token') ]
				]);
	
				$response = $client->post(env('API_URL') . '/personel/Location/getLocation',
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

	
	//ini buat data per data  
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/Location/getLocation',
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

		if($arrResult->dataListSet !== null){
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
		}

        return response()->json($location);
	}

// ini buat ALL
	public function dataLocationFunctionAPI(Request $request)
    {
    	$location[] = (object) [
    		'locationCode' => 'ALL',
    		'locationName' => 'ALL'
		];

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/Location/getLocation',
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

		if($arrResult->dataListSet !== null){
	    	$location = array_merge($location, $arrResult->dataListSet);
		}

        return response()->json($location[0]);
	}

	public function dataRankingAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GmRanking/getgmRanking',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GmRanking/getgmRanking',
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
			if(empty($request->rankingCode)){
				$ranking = [];
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GmRanking/getgmRanking',
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

		if($arrResult->dataListSet !== null){
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GmRanking/getgmRanking',
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

		if($arrResult->dataListSet !== null){
	    	$ranking = array_merge($ranking, $arrResult->dataListSet);
		}

        return response()->json($ranking[0]);
	}

	public function dataLevelAPI(Request $request)
    {
    	$search = $request->search;

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

	public function dataLevelAccessAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/UserAccessLevelView/GetUserAccessLevelList',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'levelType' => $request->levelType,
						'userId' => Session::get('userID'),
						"languageCode" => strtoupper(App::getLocale()),
						"level" => [
							"additionalProp1" => Session::get('userID'),
							"additionalProp2" => Session::get('userID'),
							"additionalProp3" => Session::get('userID')
						],
						"sessionID" => 0,
						"userSessionID" => Session::get('userID'),
						"sessionUserID" => Session::get('userID'),
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

	    if($search == ''){
	    	$level = $arrResult->dataListSet[0]->levelCode;
	    }else{
	    	$level = array_filter(
	    		$arrResult->dataListSet[0]->levelCode,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value)){
	    				return preg_match('/' . $search . '/i', $value);
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/Level/getLevel',
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

		if($arrResult->dataListSet != null){
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
		}

        return response()->json($level);
	}

	public function dataLevelAccessAllAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/UserAccessLevelView/GetUserAccessLevelList',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'levelType' => $request->levelType,
						'userId' => Session::get('userID'),
						"languageCode" => strtoupper(App::getLocale()),
						"level" => [
							"additionalProp1" => Session::get('userID'),
							"additionalProp2" => Session::get('userID'),
							"additionalProp3" => Session::get('userID')
						],
						"sessionID" => 0,
						"userSessionID" => Session::get('userID'),
						"sessionUserID" => Session::get('userID'),
						"logActionUserID" => Session::get('userID'),
						"logActionUsername" => Session::get('userID')
	    			]
	    		)]
	    	);
	    } catch (RequestException $e) {
	    	// $response = $e->getResponse();
            // if($response->getStatusCode() == 401){
            //     return view('error.login');
            // }else if($response->getStatusCode() == 404){
            //     return view('error.not_found');
            // }else{
            //     return view('error.bad_request');
            // }
			return "ALL";
	    }

	    $arrResult = json_decode($response->getBody()->getContents());

		if($arrResult->dataListSet != null){
			if($search == ''){
				$level = array_merge(["ALL"], $arrResult->dataListSet[0]->levelCode);
			}else{
				$level = array_merge(["ALL"], $arrResult->dataListSet[0]->levelCode);
				$level = array_filter(
					$level,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value)){
							return preg_match('/' . $search . '/i', $value);
						}
					}
				);
			}
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

		if($arrResult->dataListSet !== null){
			$level = array_merge($level, $arrResult->dataListSet);	
		}

        return response()->json($level[0]);
	}

	public function dataLevelAccessFunctionAPI(Request $request)
    {
    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/UserAccessLevelView/GetUserAccessLevelList',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'levelType' => $request->levelType,
						'userId' => Session::get('userID'),
						"languageCode" => strtoupper(App::getLocale()),
						"level" => [
							"additionalProp1" => Session::get('userID'),
							"additionalProp2" => Session::get('userID'),
							"additionalProp3" => Session::get('userID')
						],
						"sessionID" => 0,
						"userSessionID" => Session::get('userID'),
						"sessionUserID" => Session::get('userID'),
						"logActionUserID" => Session::get('userID'),
						"logActionUsername" => Session::get('userID')
	    			]
	    		)]
	    	);
	    } catch (RequestException $e) {
	    	// $response = $e->getResponse();
            // if($response->getStatusCode() == 401){
            //     return view('error.login');
            // }else if($response->getStatusCode() == 404){
            //     return view('error.not_found');
            // }else{
            //     return view('error.bad_request');
            // }
			return "ALL";
	    }

		$level = ["ALL"];

	    $arrResult = json_decode($response->getBody()->getContents());

		if($arrResult->dataListSet !== null){
			$level = array_merge($level, $arrResult->dataListSet[0]->levelCode);	
		}

        return response()->json($level[0]);
	}

	public function dataLevelSelectFunctionAPI(Request $request)
    {
    	$level[] = (object) [
    		'levelCode' => 'ALL',
    		'levelName' => 'ALL'
		];

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

		if($arrResult->dataListSet !== null){
			return response()->json($arrResult->dataListSet[0]);
		}else{
			return response()->json([]);
		}
	}

	public function dataEvaluationFormAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/EvaluationForm/getEvaluationForm',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/EvaluationForm/getEvaluationDetailPoint',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/Grade/getGrade',
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

	public function dataGradeFunctionAPI(Request $request)
    {
    	$grade[] = (object) [
    		'gradeCode' => 'ALL',
    		'gradeName' => 'ALL'
		];

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/Grade/getGrade',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/Grade/getGrade',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/Group/getGroup',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/Group/getGroup',
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

		if(empty($request->groupCode)){
			$group = [];
		}

        return response()->json($group);
	}

	public function dataGroupFunctionAPI(Request $request)
    {
    	$group[] = (object) [
    		'groupCode' => 'ALL',
    		'groupName' => 'ALL'
		];

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/Group/getGroup',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode')
	    			]
	    		)]
	    	);
	    } catch (RequestException $e) {
	    	$response = $e->getResponse();
			dd($response);
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
	    }

	    $arrResult = json_decode($response->getBody()->getContents());

		if($arrResult->dataListSet !== null){
			$group = array_merge($group, $arrResult->dataListSet);	
		}

        return response()->json($group[0]);
	}

	public function dataGroupAllAPI(Request $request)
    {
    	$search = $request->search;

		$group[] = (object) [
    		'groupCode' => 'ALL',
    		'groupName' => 'ALL'
    	];

		// var_dump($location);

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/Group/getGroup',
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

		if($arrResult->dataListSet !== null){
			if($search == ''){
				$group = array_merge($group, $arrResult->dataListSet);
			}else{
				$group = array_merge($group, $arrResult->dataListSet);
				$group = array_filter(
					$group,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->groupName)){
							return preg_match('/' . $search . '/i', $value->groupName);
						}else if(preg_match('/' . $search . '/i', $value->groupCode)){
							return preg_match('/' . $search . '/i', $value->groupCode);
						}
					}
				);
			}
		}

        return response()->json($group);
	}

	public function dataGroupingTypeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/payroll/PrPeriodicalReport/GetGroupingType',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/WorkNature/getWorkNature',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/WorkNature/getWorkNature',
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
                'verify' => false,
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
                'verify' => false,
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'EmploymentStatus_',
	    				'languageCode' => strtoupper(App::getLocale())
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

	public function dataEmployeeStatusAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'RecordStatus_',
	    				'languageCode' => strtoupper(App::getLocale())
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

	public function dataEmployeeStatusAllAPI(Request $request)
    {
    	$search = $request->search;

		$employee_status[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
    	];

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'RecordStatus_',
	    				'languageCode' => strtoupper(App::getLocale())
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

		if($arrResult->dataListSet !== null){
			if($search == ''){
				$employee_status = array_merge($employee_status, $arrResult->dataListSet);
			}else{
				$employee_status = array_merge($employee_status, $arrResult->dataListSet);
				$employee_status = array_filter(
					$employee_status,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->value)){
							return preg_match('/' . $search . '/i', $value->value);
						}
					}
				);
			}
		}

        return response()->json($employee_status);
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
						'variable' => 'EmploymentStatus_',
	    				// 'companyCode' => Session::get('companyCode'),
						'languageCode' => strtoupper(App::getLocale())
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

		if($arrResult->dataListSet !== null){
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
		}

        return response()->json($employment_status);
	}

	public function dataEmploymentTypeAPI(Request $request)
    {
		$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'EmploymentType_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'TransactionType_',
	    				'languageCode' => strtoupper(App::getLocale())
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

	public function dataTerminationReasonAPI(Request $request)
    {
    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'TerminationCode_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'CalendarType_',
	    				'languageCode' => strtoupper(App::getLocale())
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
		$search = $request->search;

		try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'DayCode_',
	    				'languageCode' => strtoupper(App::getLocale())
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
		
		$data = [];

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

	public function dataDayCodeFunctionAPI(Request $request)
    {
    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'DayCode_',
						'comGenCode' => $request->dayCode,
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/NPWP/getNPWP',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/NPWP/getNPWP',
	    		['body' => json_encode(
	    			[
						'recordStatus' => 'A',
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

		if (empty($request->npwpCode)) {
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/BPJS/getBPJS',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/BPJS/getBPJS',
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
    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/BPJS/getBPJS',
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

		if (empty($request->bpjsCode)) {
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/CostCenter/getCostCenter',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/CostCenter/getCostCenter',
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

		if (empty($request->costCenterCode)) {
			return response()->json([]);
		}
		else {
			return response()->json($arrResult->dataListSet);
		}
	}

	public function dataCostCenterAllAPI(Request $request)
    {	
    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/CostCenter/getCostCenter',
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

	public function dataCalendarTypeAPI(Request $request)
	{
		try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'CalendarType_',
	    				'comGenCode' => $request->flagType,
						'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/TmShiftCode/getTmShiftCode',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/TmShiftCode/getTmShiftCode',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/mobile/TmAbsentCode/getAbsentCode',
	    		['body' => json_encode(
	    			[
						'absentType' => 'A',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/mobile/TmAbsentCode/getAbsentCode',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/mobile/TmAbsentCode/getAbsentCode',
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

		if ($request->feature === 'AbsenteeismCORI') {
			$absent = array_filter($arrResult->dataListSet, function ($item) use ($search) {
				if (stripos($item->description ?? '', 'leave') !== false || stripos($item->description ?? '', 'cuti') !== false) {
					return false;
				}

				if ($search) {
					return stripos($item->absentCode, $search) !== false ||
						stripos($item->description, $search) !== false;
				}

				return true;
			});
		}
		else {
			if($search == ''){
	    		$absent = $arrResult->dataListSet;
			}else{
				$absent = array_filter(
					$arrResult->dataListSet,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->absentCode)){
							return preg_match('/' . $search . '/i', $value->absentCode);
						}else if(preg_match('/' . $search . '/i', $value->description)){
							return preg_match('/' . $search . '/i', $value->description);
						}
					}
				);
			}
		}

		// dd($absent);

        return response()->json($absent);
	}

	public function dataShiftMasterCodeAPI(Request $request)
    {
    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'groupshift_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'groupshift_',
						'comGenCode' => $request->groupShift,
	    				'languageCode' => strtoupper(App::getLocale())
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

	    if (empty($request->groupShift)) {
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/mobile/TmAbsentCode/getAbsentCode',
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

		if (empty($request->absentCode)) {
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'InsuranceCode_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'InsuranceClass_',
	    				'languageCode' => strtoupper(App::getLocale())
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

	public function dataInsuranceCodeFunction2API(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'InsuranceCode_',
	    				'languageCode' => strtoupper(App::getLocale())
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

	public function dataInsuranceClassFunction2API(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'InsuranceClass_',
	    				'languageCode' => strtoupper(App::getLocale())
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

	public function dataComGenAPI(Request $request)
    {
    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'Gender_',
	    				'comGenCode' => $request->gender,
	    				'languageCode' => strtoupper(App::getLocale())
	    			]
	    		)]
	    	);

			$response2 = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'MaritalStatus_',
	    				'comGenCode' => $request->maritalStatus,
	    				'languageCode' => strtoupper(App::getLocale())
	    			]
	    		)]
	    	);

			$response3 = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'Religion_',
	    				'comGenCode' => $request->religionCode,
	    				'languageCode' => strtoupper(App::getLocale())
	    			]
	    		)]
	    	);

			$response4 = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'Nationality_',
	    				'comGenCode' => $request->nationality,
	    				'languageCode' => strtoupper(App::getLocale())
	    			]
	    		)]
	    	);

			$response5 = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'EmploymentStatus_',
	    				'comGenCode' => $request->employmentStatus,
	    				'languageCode' => strtoupper(App::getLocale())
	    			]
	    		)]
	    	);

			$response6 = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'EmploymentType_',
	    				'comGenCode' => $request->employmentType,
	    				'languageCode' => strtoupper(App::getLocale())
	    			]
	    		)]
	    	);

			$response7 = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'TerminationCode_',
	    				'comGenCode' => $request->terminationCode,
	    				'languageCode' => strtoupper(App::getLocale())
	    			]
	    		)]
	    	);

			$response8 = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'PeMasterAbsenteeismType_',
	    				'comGenCode' => $request->absenteeismType,
	    				'languageCode' => strtoupper(App::getLocale())
	    			]
	    		)]
	    	);

			$response9 = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'TaxStatus_',
	    				'comGenCode' => $request->taxStatus,
	    				'languageCode' => strtoupper(App::getLocale())
	    			]
	    		)]
	    	);

			$response10 = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'TaxStatus_',
	    				'comGenCode' => $request->taxStatusNextYear,
	    				'languageCode' => strtoupper(App::getLocale())
	    			]
	    		)]
	    	);

			$response11 = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'TaxOffice_',
	    				'comGenCode' => $request->taxOffice,
	    				'languageCode' => strtoupper(App::getLocale())
	    			]
	    		)]
	    	);

			$response12 = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'TaxMethod_',
	    				'comGenCode' => $request->taxCalculationMethod,
	    				'languageCode' => strtoupper(App::getLocale())
	    			]
	    		)]
	    	);

			$response13 = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'Currency_',
	    				'comGenCode' => $request->currencyCode1,
	    				'languageCode' => strtoupper(App::getLocale())
	    			]
	    		)]
	    	);

			$response14 = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'Currency_',
	    				'comGenCode' => $request->currencyCode2,
	    				'languageCode' => strtoupper(App::getLocale())
	    			]
	    		)]
	    	);

			$response15 = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'Currency_',
	    				'comGenCode' => $request->currencyCode3,
	    				'languageCode' => strtoupper(App::getLocale())
	    			]
	    		)]
	    	);

			$response16 = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'BloodType_',
	    				'comGenCode' => $request->bloodType,
	    				'languageCode' => strtoupper(App::getLocale())
	    			]
	    		)]
	    	);

			$response17 = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'DrivingLicense_',
	    				'comGenCode' => $request->drivingLicenseMobilType,
	    				'languageCode' => strtoupper(App::getLocale())
	    			]
	    		)]
	    	);

			$response18 = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'InsuranceCode_',
	    				'comGenCode' => $request->insuranceCode,
	    				'languageCode' => strtoupper(App::getLocale())
	    			]
	    		)]
	    	);

			$response19 = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'InsuranceClass_',
	    				'comGenCode' => $request->insuranceClassCode,
	    				'languageCode' => strtoupper(App::getLocale())
	    			]
	    		)]
	    	);

			$response20 = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'Relation_',
	    				'comGenCode' => $request->relationCode,
	    				'languageCode' => strtoupper(App::getLocale())
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
	    $arrResult20 = json_decode($response20->getBody()->getContents());

	    return response()->json(
			[
			'data_gender' => ($request->gender == null || $arrResult->dataListSet == null) ? [] : $arrResult->dataListSet[0], 
			'data_marital_status' => ($request->maritalStatus == null || $arrResult2->dataListSet == null) ? [] : $arrResult2->dataListSet[0], 
			'data_religion' => ($request->religionCode == null || $arrResult3->dataListSet == null) ? [] : $arrResult3->dataListSet[0], 
			'data_nationality' => ($request->nationality == null || $arrResult4->dataListSet == null) ? [] : $arrResult4->dataListSet[0], 
			'data_employment_status' => ($request->employmentStatus == null || $arrResult5->dataListSet == null) ? [] : $arrResult5->dataListSet[0], 
			'data_employment_type' => ($request->employmentType == null || $arrResult6->dataListSet == null) ? [] : $arrResult6->dataListSet[0], 
			'data_termination_code' => ($request->terminationCode == null || $arrResult7->dataListSet == null) ? [] : $arrResult7->dataListSet[0], 
			'data_absenteeism_type' => ($request->absenteeismType == null || $arrResult8->dataListSet == null) ? [] : $arrResult8->dataListSet[0], 
			'data_tax_status' => ($request->taxStatus == null || $arrResult9->dataListSet == null) ? [] : $arrResult9->dataListSet[0], 
			'data_tax_status_next_year' => ($request->taxStatusNextYear == null || $arrResult10->dataListSet == null) ? [] : $arrResult10->dataListSet[0], 
			'data_tax_office' => ($request->taxOffice == null || $arrResult11->dataListSet == null) ? [] : $arrResult11->dataListSet[0],
			'data_tax_calculation_method' => ($request->taxCalculationMethod == null || $arrResult12->dataListSet == null) ? [] : $arrResult12->dataListSet[0],
			'data_currency_code_1' => ($request->currencyCode1 == null || $arrResult13->dataListSet == null) ? [] : $arrResult13->dataListSet[0],
			'data_currency_code_2' => ($request->currencyCode2 == null || $arrResult14->dataListSet == null) ? [] : $arrResult14->dataListSet[0],
			'data_currency_code_3' => ($request->currencyCode3 == null || $arrResult15->dataListSet == null) ? [] : $arrResult15->dataListSet[0],
			'data_blood_type' => ($request->bloodType == null || $arrResult16->dataListSet == null) ? [] : $arrResult16->dataListSet[0],
			'data_driving_license_car_type' => ($request->drivingLicenseMobilType == null || $arrResult17->dataListSet == null) ? [] : $arrResult17->dataListSet[0],
			'data_insurance_code' => ($request->insuranceCode == null || $arrResult18->dataListSet == null) ? [] : $arrResult18->dataListSet[0],
			'data_insurance_class' => ($request->insuranceClassCode == null || $arrResult19->dataListSet == null) ? [] : $arrResult19->dataListSet[0],
			'data_relation_code' => ($request->relationCode == null || $arrResult20->dataListSet == null) ? [] : $arrResult20->dataListSet[0],
			]
		);
	}

	public function dataPerformanceResultAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GmPerformanceResult/getGmPerformanceResult',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    			'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/PeMaster/getPeMasterDetail',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/PeMaster/getTermDateNotNull',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/payroll/getPrPensionSeverance',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/payroll/getLoanEmployee',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/payroll/getPrLoanPayment',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/GmPerformanceResult/getGmPerformanceResult',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/payroll/getTableField',
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
	    			if(preg_match('/' . $search . '/i', $value)){
	    				return preg_match('/' . $search . '/i', $value);
	    			}	    		
				}
	    	);
	    }

        return response()->json($data);
	}

	public function dataFieldSlipAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
				'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/payroll/getTableField',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				'tableName' => 'PrSalaryActual'
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

		usort($data, function ($a, $b) {
			return strcmp($a, $b);
		});

        return response()->json($data);
	}

	public function dataLoanCodeAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/payroll/getLoanMaster',
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

	public function dataLoanCodeFuncAPI(Request $request)
    {
    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/payroll/getLoanMaster',
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

	public function dataFieldNameSalaryComponentAPI(Request $request)
    {
		$search = $request->search;

        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getSalaryComponentData',
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
	    	$field = $arrResult->dataListSet;
	    }else{
			$field    = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->description)){
	    				return preg_match('/' . $search . '/i', $value->description);
	    			}else if(preg_match('/' . $search . '/i', $value->fieldName)){
	    				return preg_match('/' . $search . '/i', $value->fieldName);
	    			}
	    		}
	    	);
		}

        return response()->json($field);
    }
	
	public function dataLoanCodeLoanDataEntryAPI(Request $request)
    {
    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/payroll/getLoanEmployee',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

			// var_dump($request->fieldName);

            $response = $client->post(env('API_URL') . '/payroll/getSalaryComponentData',
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

		if (empty($arrResult->dataListSet)) {
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

			// var_dump($request->fieldName);

            $response = $client->post(env('API_URL') . '/personel/PeMaster/getPeMasterDetail',
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

        if (empty($request->absentCode)) {
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'AttachmentCode_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/payroll/getPrLoanPayment',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/payroll/getSalaryYearly',
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
	    			if(preg_match('/' . $search . '/i', $value)){
	    				return preg_match('/' . $search . '/i', $value);
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
						'variable' => 'MedicalLimitType_',
	    				// 'companyCode' => Session::get('companyCode'),
						'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'MedicalLimitType_',
						'comGenCode' => $request->limitType,
						'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/payroll/getgmAccount',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);
	    	
	    	$response = $client->post(env('API_URL') . '/payroll/getgmAccount',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

			$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
						'variable' => 'LimitEligible_',
	    				// 'companyCode' => Session::get('companyCode'),
						'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'LimitEligible_',
						'comGenCode' => $request->limitEligible,
						'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
						'variable' => 'MinimumServiceLength_',
	    				// 'companyCode' => Session::get('companyCode'),
						'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'MinimumServiceLength_',
						'comGenCode' => $request->minServiceLengthBy,
						'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
						'variable' => 'DefaultMedicalPaymentBankType_',
	    				// 'companyCode' => Session::get('companyCode'),
						'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'DefaultMedicalPaymentBankType_',
						'comGenCode' => $request->defaultMedicalPaymentBankType,
						'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
						'variable' => 'RateType_',
	    				// 'companyCode' => Session::get('companyCode'),
						'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'RateType_',
						'comGenCode' => $request->transactionRateTypeCode,
						'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
						'variable' => 'RoundingMethod_',
	    				// 'companyCode' => Session::get('companyCode'),
						'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => 'RoundingMethod_',
						'comGenCode' => $request->roundingMethod,
						'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ClaimCode/GetClaimCode',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ClaimCode/GetClaimCode',
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

	public function dataClaimCodeFunction2API(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ClaimCode/GetClaimCode',
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

	    if($request->func == 'First'){
	    	return response()->json($arrResult->dataListSet[0]);
	    }else if($request->func == 'Last'){
	    	end($arrResult->dataListSet);
	    	$key = key($arrResult->dataListSet);
	    	return response()->json($arrResult->dataListSet[$key]);
	    }
	}

	public function dataReportFormatAPI(Request $request)
    {
		$search = $request->search;
		
    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/payroll/getReportFormatList',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'ClaimTo_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'ClaimTo_',
						'comGenCode' => $request->dayCode,
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'ClaimFor_',
	    				'languageCode' => strtoupper(App::getLocale())
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
	    				'variable' => 'ClaimFor_',
						'comGenCode' => $request->dayCode,
	    				'languageCode' => strtoupper(App::getLocale())
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

	public function dataDependentsAPI(Request $request)
    {
		$search = $request->search;
		
    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/PeDependents/getPeDependents',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'employeeNo' => $request->employeeNo,
						'flagMedical' => true,
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
	    			if(preg_match('/' . $search . '/i', $value->dependentName)){
	    				return preg_match('/' . $search . '/i', $value->dependentName);
	    			}
	    		}
	    	);
	    }

        return response()->json($data);
	}

	public function dataDiseaseCodeAPI(Request $request)
    {
		$search = $request->search;
		
    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/DiseaseCode/GetDiseaseCode',
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
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/DiseaseCode/GetDiseaseCode',
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

	public function dataDiseaseCodeFunction2API(Request $request)
    {
    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/DiseaseCode/GetDiseaseCode',
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

		if($request->func == 'First'){
	    	return response()->json($arrResult->dataListSet[0]);
	    }else if($request->func == 'Last'){
	    	end($arrResult->dataListSet);
	    	$key = key($arrResult->dataListSet);
	    	return response()->json($arrResult->dataListSet[$key]);
	    }
	}

	public function dataReportCodeAPI(Request $request)
    {
		$search = $request->search;
		
    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/payroll/getReportFormatList',
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

	// Export Reimbursment Medical
	public function dataReimbursementTypeAPI(Request $request)
	{
		$search = $request->search;
		$reimbursement_type[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
		];

    	try {
			$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);
	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
			['body' => json_encode(
				[
					// 'companyCode' => Session::get('companyCode'),
					"variable" => "Export_Medical_",
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

			if($arrResult->dataListSet !== null){
				$reimbursement_type = array_merge($reimbursement_type, $arrResult->dataListSet);
			}

			if($search == ''){
				$data = $arrResult->dataListSet;
			}else{
				$data    = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }
		return response()->json($data, $reimbursement_type[0]);
	}

	public function dataReimbursementTypeMedicalAPI(Request $request)
	{
		$search = $request->search;

		$reimbursement_type[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
		];

    	try {
			$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);
	    	$response = $client->post(env('API_URL') . '/mobile/ReferenceMobile/getReferenceMobile',
			['body' => json_encode(
				[
					'companyCode' => Session::get('companyCode'),
					"variable" => "MedicalType_",
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

			$arrData = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) {
	    			if($value->code != 'FRM' && $value->code != 'ROO'){
	    				return $value;
	    			}
	    		}
	    	);
			
			if($arrResult->dataListSet !== null){
				$reimbursement_type = array_merge($reimbursement_type, $arrData);
			}

			if($search == ''){
				$data = $reimbursement_type;
			}else{
				$data    = array_filter(
	    		$reimbursement_type,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }
		return response()->json($data);
	}

	// Export Reimbursement 
	public function dataReimbursementTypeFunctionAPI (Request $request)
	{
		$search = $request->search;

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
			['body' => json_encode(
				[
					// 'companyCode' => Session::get('companyCode'),
					"variable" => "MedicalType_", 
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

			// foreach($arrResult->dataListSet as $value){
			// 	foreach($value as $v){
			// 		if($v['Value'] ==  )
			// 	}
			// }

			// var_dump($request);
			if($search == ''){
				$data = $arrResult->dataListSet;
			}else{
				$data    = array_filter(
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

	public function dataReimbursementTypeReimbursementAPI (Request $request)
	{
		$search = $request->search;

		$reimbursement_type[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
		];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
			['body' => json_encode(
				[
					// 'companyCode' => Session::get('companyCode'),
					"variable" => "List_ReimbursementExport_", 
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

			if($arrResult->dataListSet !== null){
				$reimbursement_type = array_merge($reimbursement_type, $arrResult->dataListSet);
			}

			if($search == ''){
				$data = $reimbursement_type;
			}else{
				$data = array_filter(
				$reimbursement_type, function($value) use ($search){
					if(preg_match('/' . $search . '/i', $value->value)){
						return preg_match('/' . $search . '/i', $value->value);
					}
				}
			);
		}
		return response()->json($data);
	}

	public function dataReimbursementTypeReimbursementFunctionAPI (Request $request)
	{
		$search = $request->search;

		$reimbursement_type[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
		];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
			['body' => json_encode(
				[
					// 'companyCode' => Session::get('companyCode'),
					"variable" => "List_ReimbursementExport_", 
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

			if($arrResult->dataListSet !== null){
				$reimbursement_type = array_merge($reimbursement_type, $arrResult->dataListSet);
			}

			if($search == ''){
				$data = $reimbursement_type;
			}else{
				$data    = array_filter(
				$reimbursement_type,
				function($value) use ($search){
					if(preg_match('/' . $search . '/i', $value->value)){
						return preg_match('/' . $search . '/i', $value->value);
					}
				}
			);
		}
		return response()->json($data);
	}
	
	public function dataNewsCategory (Request $request)
	{
		$search = $request->search;

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
					"languageCode" => App::getLocale(),
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
				$data    = array_filter(
				$arrResult->dataListSet,
				function($value) use ($search){
					if(preg_match('/' . $search . '/i', $value->categoryName)){
						return preg_match('/' . $search . '/i', $value->categoryName);
					}
				}
			);
		}
		return response()->json($data);
	}

	public function dataNewsCategoryDetail(Request $request)
	{
		$search = $request->search;

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
					'categoryName' => $request->categoryName,
					"languageCode" => App::getLocale(),
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
				$data    = array_filter(
				$arrResult->dataListSet,
				function($value) use ($search){
					if(preg_match('/' . $search . '/i', $value->categoryName)){
						return preg_match('/' . $search . '/i', $value->categoryName);
					}
				}
			);
		}
		return response()->json($data);
	}

	public function dataAnnouncementCategory(Request $request)
	{
		$search = $request->search;

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
					"languageCode" => App::getLocale(),
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
				$data    = array_filter(
				$arrResult->dataListSet,
				function($value) use ($search){
					if(preg_match('/' . $search . '/i', $value->categoryName)){
						return preg_match('/' . $search . '/i', $value->categoryName);
					}
				}
			);
		}
		return response()->json($data);
	}

	public function dataAnnouncementCategoryDetail(Request $request)
	{
		$search = $request->search;

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
					"languageCode" => App::getLocale(),
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

	public function dataReimbursementTypeExportAPI (Request $request)
	{
		$search = $request->search;

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
			['body' => json_encode(
				[
					// 'companyCode' => Session::get('companyCode'),
					"variable" => "ReimbursementExport_",
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

			// foreach($arrResult->dataListSet as $value){
			// 	foreach($value as $v){
			// 		if($v['Value'] ==  )
			// 	}
			// }

			// var_dump($request);
			if($search == ''){
				$data = $arrResult->dataListSet;
			}else{
				$data    = array_filter(
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

	public function dataReimbursementTypeMedicalFunctionAPI()
    {
    	$reimbursement_type[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
		];

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						"variable" => "MedicalType_",
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

		if($arrResult->dataListSet !== null){
	    	$reimbursement_type = array_merge($reimbursement_type, $arrResult->dataListSet);
		}

        return response()->json($reimbursement_type[0]);
	}
	
	public function dataTransportAll()
    {
    	$reimbursement_type[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
		];

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						"variable" => "List_ReimbursementTransport_",
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

		if($arrResult->dataListSet !== null){
	    	$reimbursement_type = array_merge($reimbursement_type, $arrResult->dataListSet);
		}

        return response()->json($reimbursement_type[0]);
	}

	// Export Reimbursement Transport
	public function dataReimbursementTypeTransportAPI(Request $request)
	{
		$search = $request->search;

		$reimbursement_type[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
		];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
			['body' => json_encode(
				[
					// 'companyCode' => Session::get('companyCode'),
					"variable" => "List_ReimbursementTransport_",
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

			if($arrResult->dataListSet !== null){
				$reimbursement_type = array_merge($reimbursement_type, $arrResult->dataListSet);
			}
			
			if($search == ''){
				$data = $reimbursement_type;
			}else{
				$data    = array_filter(
				$reimbursement_type,
				function($value) use ($search){
					if(preg_match('/' . $search . '/i', $value->value)){
						return preg_match('/' . $search . '/i', $value->value);
					}
				}
			);
		}
		return response()->json($data);
	}

	public function dataReimbursementTypeTransportFunctionAPI(Request $request)
	{
		$search = $request->search;
		$reimbursement_type[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
		];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
			['body' => json_encode(
				[
					// 'companyCode' => Session::get('companyCode'),
					"variable" => "List_ReimbursementTransport_",
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

			if($arrResult->dataListSet !== null){
				$reimbursement_type = array_merge($reimbursement_type, $arrResult->dataListSet);
			}
			
			if($search == ''){
				$data = $reimbursement_type;
			}else{
				$data    = array_filter(
				$reimbursement_type,
				function($value) use ($search){
					if(preg_match('/' . $search . '/i', $value->value)){
						return preg_match('/' . $search . '/i', $value->value);
					}
				}
			);
		}
		return response()->json($data);
	}
	
	public function dataTransportType(Request $request)
	{
		$search = $request->search;

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
			['body' => json_encode(
				[
					// 'companyCode' => Session::get('companyCode'),
					"variable" => "List_ReimbursementTransport_",
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
			
			if($search == ''){
				$data = $arrResult->dataListSet;
			}else{
				$data    = array_filter(
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

	// Export Reimbursement Overtime
	public function dataReimbursementTypeOvertimeAPI(Request $request)
	{
		$search = $request->search;

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
			['body' => json_encode(
				[
					// 'companyCode' => Session::get('companyCode'),
					"variable" => "Transaction_Ovt",
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
			
			if($search == ''){
				$data = $arrResult->dataListSet;
			}else{
				$data    = array_filter(
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
	
	// worflow
	public function dataWorkFlowAPI(Request $request)
	{
		$search = $request->search;

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
			['body' => json_encode(
				[
					// 'companyCode' => Session::get('companyCode'),
					"variable" => "Export_Workflow",
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
			// var_dump($arrResult);
			
			if($search == ''){
				$data = $arrResult->dataListSet;
			}else{
				$data    = array_filter(
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
	public function dataBusinessUnitFunctionAPI(Request $request)
	{
		$search = $request->search;
		$reimbursement_type[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
		];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
			['body' => json_encode(
				[
					// 'companyCode' => Session::get('companyCode'),
					"variable" => "Business_Unit_",
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

			if($arrResult->dataListSet !== null){
				$reimbursement_type = array_merge($reimbursement_type, $arrResult->dataListSet);
			}
			
			if($search == ''){
				$data = $reimbursement_type;
			}else{
				$data    = array_filter(
				$reimbursement_type,
				function($value) use ($search){
					if(preg_match('/' . $search . '/i', $value->value)){
						return preg_match('/' . $search . '/i', $value->value);
					}
				}
			);
		}
		return response()->json($data);
	}

	public function dataTravelTypeAPI(Request $request)
	{
		$search = $request->search;
		$reimbursement_type[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
		];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
			['body' => json_encode(
				[
					// 'companyCode' => Session::get('companyCode'),
					"variable" => "Travel_Type_",
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

			if($arrResult->dataListSet !== null){
				$reimbursement_type = array_merge($reimbursement_type, $arrResult->dataListSet);
			}
			
			if($search == ''){
				$data = $reimbursement_type;
			}else{
				$data = array_filter(
				$reimbursement_type,
				function($value) use ($search){
					if(preg_match('/' . $search . '/i', $value->value)){
						return preg_match('/' . $search . '/i', $value->value);
					}
				}
			);
		}
		return response()->json($data);
	}
	public function dataTravelTypeAllAPI(Request $request)
	{
		$travel_type[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
		];

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						"variable" => "Travel_Type_",
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

		if($arrResult->dataListSet !== null){
	    	$travel_type = array_merge($travel_type, $arrResult->dataListSet);
		}

        return response()->json($travel_type[0]);
	}

	public function dataStatusFunctionAPI (Request $request)
	{
		$search = $request->search;

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
			['body' => json_encode(
				[
					// 'companyCode' => Session::get('companyCode'),
					"variable" => "Status_",
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
			
			if($search == ''){
				$data = $arrResult->dataListSet;
			}else{
				$data    = array_filter(
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

	public function dataStatusTransactionAPI(Request $request)
	{
		$search = $request->search;
		$data[] = (object) [
    		'code' => 'ALL',
    		'value' => 'ALL'
		];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/referencemobile/getreferencemobile',
			['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"variable" => "Status_",
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->value)){
							return preg_match('/' . $search . '/i', $value->value);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

	public function dataStatusTransactionBusinessTripAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/referencemobile/getreferencemobile',
			['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"variable" => "StatusBST_",
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->value)){
							return preg_match('/' . $search . '/i', $value->value);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

	public function dataLeaveTypeAPI (Request $request)
	{
		$search = $request->search;

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);

			$response = $client->post(env('API_URL') . '/mobile/TmAbsentCode/getAbsentCode',
				['body' => json_encode([
					'companyCode' => Session::get('companyCode'),
					'absentType' => 'A',
					'deductLeave' => '1',
					"languageCode" => strtoupper(App::getLocale())
				])]
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
					if(preg_match('/' . $search . '/i', $value->absentCode)){
						return preg_match('/' . $search . '/i', $value->absentCode);
					}else if(preg_match('/' . $search . '/i', $value->description)){
						return preg_match('/' . $search . '/i', $value->description);
					}
				}
			);
		}
		return response()->json($data);
	}

	public function dataLeaveTypeFunctionAPI (Request $request)
	{
		$search = $request->search;

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
			['body' => json_encode(
				[
					// 'companyCode' => Session::get('companyCode'),
					"variable" => "Leave_Type_",
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
			
			if($search == ''){
				$data = $arrResult->dataListSet;
			}else{
				$data    = array_filter(
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
	public function dataSubmitTypeAPI (Request $request)
	{
		$search = $request->search;

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
			['body' => json_encode(
				[
					// 'companyCode' => Session::get('companyCode'),
					"variable" => "Submit_Type_",
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
			
			if($search == ''){
				$data = $arrResult->dataListSet;
			}else{
				$data    = array_filter(
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

	public function dataReimbursementOvertimeAPI (Request $request)
	{
		$search = $request->search;

		$reimbursement_type[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
		];
		
		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
			['body' => json_encode(
				[
					// 'companyCode' => Session::get('companyCode'),
					"variable" => "Transaction_Ovt",
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
			
			if($search == ''){
				$data = $arrResult->dataListSet;
			}else{
				$data    = array_filter(
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

	// Dropdown Master Data MOB 

	public function dataEmployeeCompanyCodeAPI(Request $request)
	{
		$search = $request->search;

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);

			$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
			['body' => json_encode(
				[
					// 'companyCode' => Session::get('companyCode'),
					"variable" => "CompanyCode_",
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
			
			
			if($search == ''){
				$data = $arrResult->dataListSet;
			}else{
				$data    = array_filter(
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

	public function dataOfficeLocationAPI(Request $request)
	{
		$search = $request->search;

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);

			$response = $client->post(env('API_URL') . '/mobile/OfficeLocation/getOfficeLocation',
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
				$data    = array_filter(
				$arrResult->dataListSet,
				function($value) use ($search){
					if(preg_match('/' . $search . '/i', $value->officeDesc)){
						return preg_match('/' . $search . '/i', $value->officeDesc);
					}
				}
			);
		}
		return response()->json($data);
	}

	public function dataOfficeLocationFunctionAPI(Request $request)
	{
		$search = $request->search;

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);

			$response = $client->post(env('API_URL') . '/mobile/OfficeLocation/getOfficeLocation',
				['body' => json_encode(
					[
						'recordStatus' => 'A',
						'companyCode' => Session::get('companyCode'),
						'officeCode' => $request->officeCode,
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

		if(empty($request->officeCode)){
			return response()->json(null);
		}else{
			return response()->json($arrResult->dataListSet);
		}
	}

	public function dataOutputFileAPI(Request $request)
	{
		$search = $request->search;

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);

			$response = $client->post(env('API_URL') . '/payroll/GetTransferBankFormatbyCompanyCodeBankCode',
					[
						'body' => json_encode([
							'companyCode' => Session::get('companyCode'),
							'bankCode' => $request->bankCode,
							"languageCode" => App::getLocale(),
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
				$data    = array_filter(
				$arrResult->dataListSet,
				function($value) use ($search){
					if(preg_match('/' . $search . '/i', $value->format)){
						return preg_match('/' . $search . '/i', $value->format);
					}
				}
			);
		}
		return response()->json($data);
	}
	
	
	// business unit
	public function dataBusinessUnitAPI(Request $request)
	{
		$search = $request->search;
		$reimbursement_type[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
		];

    	try {
			$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
			['body' => json_encode(
				[
					// 'companyCode' => Session::get('companyCode'),
					"variable" => "Business_Unit_",
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

			if($arrResult->dataListSet !== null){
				$reimbursement_type = array_merge($reimbursement_type, $arrResult->dataListSet);
			}
			
			if($search == ''){
				$data = $reimbursement_type;
			}else{
				$data    = array_filter(
	    		$reimbursement_type,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->value)){
	    				return preg_match('/' . $search . '/i', $value->value);
	    			}
	    		}
	    	);
	    }
		return response()->json($data);
	}
	
	// get All reimbursement Type 
	public function dataReimbursementTypeAllAPI(Request $request)
    {
    	$reimbursement_type[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
		];

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => "Export_Reimbursement_",
						'languageCode' => strtoupper(App::getLocale())
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

		if($arrResult->dataListSet !== null){
	    	$reimbursement_type = array_merge($reimbursement_type, $arrResult->dataListSet);
		}

        return response()->json($reimbursement_type[0]);
	}

	public function dataReimbursementTypeMedicalAllAPI(Request $request)
    {
    	$reimbursement_type[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
		];

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						'variable' => "MedicalType_",
						'languageCode' => strtoupper(App::getLocale())
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

		$arrData = array_filter(
			$arrResult->dataListSet,
			function($value) {
				if($value->comGenCode != 'FRM' && $value->comGenCode != 'ROO'){
					return $value;
				}
			}
		);

		if($arrResult->dataListSet !== null){
	    	$reimbursement_type = array_merge($reimbursement_type, $arrData);
		}

        return response()->json($reimbursement_type[0]);
	}
	
	public function dataReimbursementTypeTransportAllAPI(Request $request)
    {
    	$reimbursement_type[] = (object) [
    		'comGenCode' => 'ALL',
    		'value' => 'ALL'
		];

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
	    		['body' => json_encode(
	    			[
	    				// 'companyCode' => Session::get('companyCode'),
						"variable" => "List_ReimbursementTransport_",
						'languageCode' => strtoupper(App::getLocale())
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

		if($arrResult->dataListSet !== null){
	    	$reimbursement_type = array_merge($reimbursement_type, $arrResult->dataListSet);
		}

        return response()->json($reimbursement_type[0]);
	}

	public function dataHoldingCompanyAPI(Request $request)
    {
    	$search = $request->search;

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/Company/getcompany',
	    		['body' => json_encode(
	    			[
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
	    	$company = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->companyName)){
	    				return preg_match('/' . $search . '/i', $value->companyName);
	    			}else if(preg_match('/' . $search . '/i', $value->companyCode)){
	    				return preg_match('/' . $search . '/i', $value->companyCode);
	    			}
	    		}
	    	);
	    }

        return response()->json($company);
	}

	public function dataHoldingCompanyDetailAPI(Request $request)
    {
    	$search = $request->search;

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);

			$response = $client->post(env('API_URL') . '/personel/Company/getcompany',
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
			$company = array_filter(
				$arrResult->dataListSet,
				function($value) use ($search){
					if(preg_match('/' . $search . '/i', $value->companyName)){
						return preg_match('/' . $search . '/i', $value->companyName);
					}else if(preg_match('/' . $search . '/i', $value->companyCode)){
						return preg_match('/' . $search . '/i', $value->companyCode);
					}
				}
			);
		}

		return response()->json($company);
	}

	public function dataLeaveHourAPI(Request $request)
    {

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/mobile/ReferenceMobile/getReferenceMobile',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
	    				"variable" => "LeaveTime",
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

		if ($arrResult->dataListSet == null) {
			return response()->json([]);
		}
		else {
			return response()->json($arrResult->dataListSet);
		}
	}

	public function dataLoanBankAPI(Request $request)
    {

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/mobile/LoanWhiteList/getLoanCompany',
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

		if ($arrResult->dataListSet == null) {
			return response()->json([]);
		}
		else {
			return response()->json($arrResult->dataListSet);
		}
	}

	public function dataLoanWhitelistAPI(Request $request)
    {

    	try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
	    						'Authorization' => 'Bearer ' . Session::get('token') ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/mobile/LoanWhiteList/getWhiteList',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
						'loanBank' => $request->loanBank,
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

		if ($arrResult->dataListSet == null) {
			return response()->json([]);
		}
		else {
			return response()->json($arrResult->dataListSet);
		}
	}

	public function dataMenuMobileAPI(Request $request)
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

		// dd($arrResult->dataListSet);

		if ($arrResult->dataListSet == null) {
			return response()->json([]);
		}
		else {
			return response()->json($arrResult->dataListSet);
		}
	}

	public function dataMenuMobileTableAPI(Request $request)
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

		// dd($arrResult->dataListSet);

		if ($arrResult->dataListSet == null) {
			return Datatables::of([])->make(true);
		}
		else {
			return Datatables::of($arrResult->dataListSet)->make(true);
		}
	}

	public function dataTravelAdvanceAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/referencemobile/getreferencemobile',
			['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"variable" => "TravelAdvance-DestinationType_",
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->value)){
							return preg_match('/' . $search . '/i', $value->value);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

	public function dataTravelAdvanceFunctionAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/referencemobile/getreferencemobile',
			['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"variable" => "TravelAdvance-DestinationType_",
						"code" => $request->code,
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->value)){
							return preg_match('/' . $search . '/i', $value->value);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

	public function dataPlafonMedicalAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/referencemobile/getreferencemobile',
				['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"variable" => 'MedicalType_',
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->value)){
							return preg_match('/' . $search . '/i', $value->value);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

    public function dataPlafonTunjanganAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/referencemobile/getreferencemobile',
				['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"variable" => 'TunjanganType_',
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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

			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->value)){
							return preg_match('/' . $search . '/i', $value->value);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

	public function dataPlafonMedicalFunctionAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);

			$response = $client->post(env('API_URL') . '/personel/referencemobile/getreferencemobile',
				['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"variable" => 'MedicalType_',
						"code" => $request->code,
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->value)){
							return preg_match('/' . $search . '/i', $value->value);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

    public function dataPlafonTunjanganFunctionAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);

			$response = $client->post(env('API_URL') . '/personel/referencemobile/getreferencemobile',
				['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"variable" => 'TunjanganType_',
						"code" => $request->code,
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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

			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->value)){
							return preg_match('/' . $search . '/i', $value->value);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

	public function dataPlafonBusinessTripAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/referencemobile/getreferencemobile',
				['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"variable" => 'List_BusinessTrip_',
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->value)){
							return preg_match('/' . $search . '/i', $value->value);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

	public function dataPlafonBusinessTripFunctionAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);

			$response = $client->post(env('API_URL') . '/personel/referencemobile/getreferencemobile',
				['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"variable" => 'List_BusinessTrip_',
						"code" => $request->code,
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->value)){
							return preg_match('/' . $search . '/i', $value->value);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

	public function dataPlafonTransportAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/referencemobile/getreferencemobile',
				['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"variable" => 'List_Reimbursement_Transport',
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->value)){
							return preg_match('/' . $search . '/i', $value->value);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

	public function dataPlafonTransportFunctionAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);

			$response = $client->post(env('API_URL') . '/personel/referencemobile/getreferencemobile',
				['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"variable" => 'List_Reimbursement_Transport',
						"code" => $request->code,
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->value)){
							return preg_match('/' . $search . '/i', $value->value);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

	public function dataPlafonReimbursementAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/referencemobile/getreferencemobile',
				['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"variable" => 'List_Reimbursement_',
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->value)){
							return preg_match('/' . $search . '/i', $value->value);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

	public function dataPlafonReimbursementFunctionAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);

			$response = $client->post(env('API_URL') . '/personel/referencemobile/getreferencemobile',
				['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"variable" => 'List_Reimbursement_',
						"code" => $request->code,
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->value)){
							return preg_match('/' . $search . '/i', $value->value);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

	public function dataMedicalServiceCodeAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/referencemobile/getreferencemobile',
				['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"variable" => 'MasterMedicalPayment_',
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->value)){
							return preg_match('/' . $search . '/i', $value->value);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

	public function dataMedicalServiceCodeRankingAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);

			$serviceCode = $request->serviceCode;

			$response = $client->post(env('API_URL') . '/personel/referencemobile/getreferencemobile',
				['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"variable" => 'MedicalPayment_' . $serviceCode . '_',
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->value)){
							return preg_match('/' . $search . '/i', $value->value);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

	public function dataMedicalServiceCodePaidTypeAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/mobile/ReimbursementMedical/getMedicalPaymentList',
				['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"ticketNo" => $request->ticketNo,
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} 
		catch (RequestException $e) {
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
	    	$data = $arrResult->dataListSet[0]->serviceCodeList;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet[0]->serviceCodeList,
	    		function($item) use ($search) {
					$matchService = preg_match('/' . preg_quote($search, '/') . '/i', $item->serviceCode ?? '') ||
									preg_match('/' . preg_quote($search, '/') . '/i', $item->serviceName ?? '');
			
					$matchClaim = false;
					if (!empty($item->claimForDetail)) {
						foreach ($item->claimForDetail as $claim) {
							if (preg_match('/' . preg_quote($search, '/') . '/i', $claim->claimForCode ?? '') ||
								preg_match('/' . preg_quote($search, '/') . '/i', $claim->claimForName ?? '')) {
								$matchClaim = true;
								break;
							}
						}
					}
			
					return $matchService || $matchClaim;
				}
	    	);
	    }

        return response()->json($data);
	}

	public function dataVaccineMasterAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/HealthActivities/GetHealthActivitiesMaster',
				['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"recordStatus" => 'A',
						"activityType" => 'V',
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->name)){
							return preg_match('/' . $search . '/i', $value->name);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

	public function dataVaccineMasterDetailAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/HealthActivities/GetHealthActivitiesDetail',
				['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"recordStatus" => 'A',
						"activityType" => 'V',
						"activityCode" => $request->activityCode,
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->description)){
							return preg_match('/' . $search . '/i', $value->description);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

	public function dataMCUMasterAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/HealthActivities/GetHealthActivitiesMaster',
				['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"recordStatus" => 'A',
						"activityType" => 'MCU',
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->name)){
							return preg_match('/' . $search . '/i', $value->name);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

	public function dataMCUMasterDetailAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/HealthActivities/GetHealthActivitiesDetail',
				['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"recordStatus" => 'A',
						"activityType" => 'MCU',
						"activityCode" => $request->activityCode,
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->description)){
							return preg_match('/' . $search . '/i', $value->description);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

	public function dataMedicalTypeAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);
			$response = $client->post(env('API_URL') . '/personel/PePlafon/getPePlafon',
				['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"employeeNo" => $request->employeeNo,
						"category" => 'MEDICAL',
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->plafonDescription)){
							return preg_match('/' . $search . '/i', $value->plafonDescription);
						}
					}
				);
			}
		}
		return response()->json($data);
	}

	public function dataDependentNameAPI(Request $request)
	{
		$search = $request->search;
		$data = [];

		try {
			$client = new Client([
                'verify' => false,
				'headers' => [ 'Content-Type' => 'application/json',
								'Authorization' => 'Bearer ' . Session::get('token') ]
			]);

			$response = $client->post(env('API_URL') . '/personel/PeDependents/getlistfamily',
				['body' => json_encode(
					[
						'companyCode' => Session::get('companyCode'),
						"employeeNo" => $request->employeeNo,
						"category" => 'MEDICAL',
						"languageCode" => strtoupper(App::getLocale())
					]
				)]);
			} catch (RequestException $e) {
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
			
			if($arrResult->dataListSet !== null){
				if($search == ''){
					$data = array_merge($data, $arrResult->dataListSet);
				}else{
					$data = array_merge($data, $arrResult->dataListSet);
					$data = array_filter(
					$data,
					function($value) use ($search){
						if(preg_match('/' . $search . '/i', $value->familyName)){
							return preg_match('/' . $search . '/i', $value->familyName);
						}
					}
				);
			}
		}
		return response()->json($data);
	}
}