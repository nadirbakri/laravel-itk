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
	    				'variable' => 'BloodType_',
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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

	public function dataRelationAPI()
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
	    				'variable' => 'Relation_',
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
	    }

	    $arrResult = json_decode($response->getBody()->getContents());

	    return response()->json($arrResult->dataListSet);
	}

	public function dataTaxStatusAPI()
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
	    				'variable' => 'TaxStatus_',
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

	public function dataAbsenteeismTypeAPI()
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
	    				'variable' => 'AbsenteeismType_',
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

	public function dataTaxCalculationMethodAPI()
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
	    				'variable' => 'TaxMethod_',
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

	public function dataCurrencyAPI()
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
	    				'variable' => 'Currency',
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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

	    	$response = $client->post(env('API_URL') . '/pemaster/getpemastergrid',
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
	    }

	    $arrResult = json_decode($response->getBody()->getContents());

	    if($search == ''){
	    	$data = $arrResult->dataListSet;
	    }else{
	    	$data = array_filter(
	    		$arrResult->dataListSet,
	    		function($value) use ($search){
	    			if(preg_match('/' . $search . '/i', $value->fieldName)){
	    				return preg_match('/' . $search . '/i', $value->fieldName);
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
	    }

	    $arrResult = json_decode($response->getBody()->getContents());

	    return response()->json($arrResult->dataListSet);
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
	    }

	    $arrResult = json_decode($response->getBody()->getContents());

	    return response()->json($arrResult->dataListSet);
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
					}
	    		}
	    	);
	    }

        return response()->json($npwp);
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
	    	var_dump($e->getResponse());
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
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode'),
	    				'comGenCode' => $request->flagType
	    			]
	    		)]
	    	);
	    } catch (RequestException $e) {
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    				'companyCode' => Session::get('companyCode')
	    			]
	    		)]
	    	);
	    } catch (RequestException $e) {
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
	    	var_dump($e->getResponse());
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
}
