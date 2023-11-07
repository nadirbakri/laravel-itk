<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;
use DataTables;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function pageHomeDashboard()
    {
    	if(Session::has('token')){
    		return view('home_dashboard');
    	}
    }

    public function saveToken(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response_Get = $client->post(env('API_URL') . '/mobile/Firebase/getFirebase',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        "sessionID" => 0,
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

        $arrResult_Get = json_decode($response_Get->getBody()->getContents());

        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if(empty($arrResult_Get)){
                $response = $client->post(env('API_URL') . '/mobile/Firebase',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'userID' => Session::get('userID'),
                            "firebaseToken" => $request->token,
                            "body" => 'This is Test Notification. If It Show, That Means Notification Has Successfully Created',
                            "title" => 'Title Test',
                            "platform" => "Web",
                            "imei" => "-",
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            "sessionID" => 0,
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/mobile/Firebase',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'userID' => Session::get('userID'),
                            "firebaseToken" => $request->token,
                            "body" => 'This is Test Notification. If It Show, That Means Notification Has Successfully Created',
                            "title" => 'Title Test',
                            "platform" => "Web",
                            "imei" => "-",
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            "sessionID" => 0,
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

        // dd($arrResult);

        return response()->json(['status' => true, 'message' => $arrResult->message]);
    }

    public function sendNotification(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/Firebase/getFirebase',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        "sessionID" => 0,
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
          
        $SERVER_API_KEY = 'AAAAihC__Bs:APA91bF0yBJKu45jbFpbyv6A9-9JjH6t9OfxtatOyLyCNE63iNu7oL1aH2CQrRUVAwjEF-sOTF9EpYH9hvPa6uD8jpFOww1wpC7jvSaJcEsugujOv85XelADHKixrO7aJPD2K7YjiIsX';
        

        // dd($arrResult[0]);

        $data = [
            "registration_ids" => [ 0 => $arrResult[0]->firebaseToken ],
            "notification" => [
                "title" => 'This is Test Notification. If It Show, That Means Notification Has Successfully Created',
                "body" => 'Title Test',  
            ]
        ];

        $dataString = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);

        // dd($response);

        return response()->json($response);
    }

    public function getEventCalendar(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/TmCalendar/getTmCalendar',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        // 'startDate' => date('Y-m-d\TH:i:s', strtotime($request->start_date)),
                        // 'endDate' => date('Y-m-d\TH:i:s', strtotime($request->end_date)),
                        'userID' => Session::get('userID'),
                        "sessionID" => 0,
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

        $arrData = [];

        if($arrResult->dataListSet == null){
            return response()->json($arrData);
        }else{
            foreach($arrResult->dataListSet as $value){
                $arrData[] = (object) [
                    "startDate" => date('Y-m-d', strtotime($value->calendar)), 
                    "endDate" => date('Y-m-d', strtotime($value->calendar)),
                    "summary" => $value->description
                ];
            }

            return response()->json($arrData);
        }
    }

    public function getActiveEmployee(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeMaster/getPeMasterGrid',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode')
	    			]
	    		)]
	    	);

            $response2 = $client->post(env('API_URL') . '/mobile/TmAbsence/getBySpecificDate',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
                        'startDate' => date('Y-m-d'),
                        'endDate' => date('Y-m-d')
	    			]
	    		)]
	    	);
        } catch (RequestException $e) {
            $response = $e->getResponse();
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

        // dd($arrResult2->dataListSet);

        if($arrResult->dataListSet == null){
            return response()->json(['totalEmployee' => 0, 'openPosition' => 0, 'maleEmployee' => 0, 'femaleEmployee' => 0, 'ageFirst' => 0, 'ageSecond' => 0, 'ageThird' => 0, 'ageFourth' => 0, 'ageFifth' => 0, 'joinFirst' => 0, 'joinSecond' => 0, 'joinThird' => 0, 'joinFourth' => 0,
            'endContractData' => [], 'endContractMonth' => 0, 'birthdayData' => [], 'birthdayMonth' => 0, 'endProbationData' => [], 'endProbationMonth' => 0, 'joinData' => [], 'joinMonth' => 0, 'hireData' => [], 'hireMonth' => 0, 'resignData' => [], 'resignMonth' => 0, 'dataAbsent' => []]);
        }else{
            $maleEmployee = array_filter($arrResult->dataListSet, function($obj){
                if(isset($obj->gender)){
                    if ($obj->gender == 'M' && $obj->terminationDate == null) return true;
                }
                return false;
            });
            $femaleEmployee = array_filter($arrResult->dataListSet, function($obj){
                if(isset($obj->gender)){
                    if ($obj->gender == 'F' && $obj->terminationDate == null) return true;
                }
                return false;
            });
            $ageFirst = array_filter($arrResult->dataListSet, function($obj){
                if(isset($obj->birthDate)){
                    $age = date_diff(date_create($obj->birthDate), date_create('today'))->y;
                    if ($age < 21 && $obj->terminationDate == null) return true;
                }
                return false;
            });
            $ageSecond = array_filter($arrResult->dataListSet, function($obj){
                if(isset($obj->birthDate)){
                    $age = date_diff(date_create($obj->birthDate), date_create('today'))->y;
                    if ($age >= 21 && $age < 30 && $obj->terminationDate == null) return true;
                }
                return false;
            });
            $ageThird = array_filter($arrResult->dataListSet, function($obj){
                if(isset($obj->birthDate)){
                    $age = date_diff(date_create($obj->birthDate), date_create('today'))->y;
                    if ($age >= 30 && $age < 40 && $obj->terminationDate == null) return true;
                }
                return false;
            });
            $ageFourth = array_filter($arrResult->dataListSet, function($obj){
                if(isset($obj->birthDate)){
                    $age = date_diff(date_create($obj->birthDate), date_create('today'))->y;
                    if ($age >= 40 && $age < 55 && $obj->terminationDate == null) return true;
                }
                return false;
            });
            $ageFifth = array_filter($arrResult->dataListSet, function($obj){
                if(isset($obj->birthDate)){
                    $age = date_diff(date_create($obj->birthDate), date_create('today'))->y;
                    if ($age >= 55 && $obj->terminationDate == null) return true;
                }
                return false;
            });

            $joinFirst = array_filter($arrResult->dataListSet, function($obj){
                if(isset($obj->joinDate)){
                    $join = date_diff(date_create($obj->joinDate), date_create('today'))->y;
                    if ($join < 5 && $obj->terminationDate == null) return true;
                }
                return false;
            });

            $joinSecond = array_filter($arrResult->dataListSet, function($obj){
                if(isset($obj->joinDate)){
                    $join = date_diff(date_create($obj->joinDate), date_create('today'))->y;
                    if ($join >= 5 && $join < 10 && $obj->terminationDate == null) return true;
                }
                return false;
            });

            $joinThird = array_filter($arrResult->dataListSet, function($obj){
                if(isset($obj->joinDate)){
                    $join = date_diff(date_create($obj->joinDate), date_create('today'))->y;
                    if ($join >= 10 && $join < 15 && $obj->terminationDate == null) return true;
                }
                return false;
            });

            $joinFourth = array_filter($arrResult->dataListSet, function($obj){
                if(isset($obj->joinDate)){
                    $join = date_diff(date_create($obj->joinDate), date_create('today'))->y;
                    if ($join >= 15 && $obj->terminationDate == null) return true;
                }
                return false;
            });

            $endContractMonth = array_filter($arrResult->dataListSet, function($obj){
                if(isset($obj->contractEndDate)){
                    // $contract = date_diff(date_create($obj->contractEndDate), date_create('today'));
                    // $yearContract = $contract->y;
                    // $monthContract = $contract->m;
                    // $valContract = ($contract->invert ? -1 : 1) * $monthContract + (12 * $yearContract);
                    // if ($valContract == 0) return true;
                    if(date('Y-m', strtotime($obj->contractEndDate)) == date('Y-m')) return true;
                }
                return false;
            });

            $birthdayMonth = array_filter($arrResult->dataListSet, function($obj){
                if(isset($obj->birthDate)){
                    // $birth = date('2022-m-01', strtotime($obj->birthDate));
                    // $birth2 = date('2022-m-01');
                    // if ($birth == $birth2) return true;
                    if(date('m', strtotime($obj->birthDate)) == date('m')) return true;
                }
                return false;
            });

            $endProbationMonth = array_filter($arrResult->dataListSet, function($obj){
                if(isset($obj->probationEndDate)){
                    // $probation = date_diff(date_create($obj->probationEndDate), date_create('today'));
                    // $yearProbation = $probation->y;
                    // $monthProbation = $probation->m;
                    // $valProbation = ($probation->invert ? -1 : 1) * $monthProbation + (12 * $yearProbation);
                    // if ($valProbation == 0) return true;
                    if(date('Y-m', strtotime($obj->probationEndDate)) == date('Y-m')) return true;
                }
                return false;
            });

            $joinMonth = array_filter($arrResult->dataListSet, function($obj){
                if(isset($obj->joinDate)){
                    // $join = date_diff(date_create($obj->joinDate), date_create('today'));
                    // $yearJoin = $join->y;
                    // $monthJoin = $join->m;
                    // $valJoin = ($join->invert ? -1 : 1) * $monthJoin + (12 * $yearJoin);
                    // if ($valJoin == 0) return true;
                    if(date('Y-m', strtotime($obj->joinDate)) == date('Y-m')) return true;
                }
                return false;
            });

            $resignMonth = array_filter($arrResult->dataListSet, function($obj){
                if(isset($obj->terminationDate)){
                    // $resign = date_diff(date_create($obj->terminationDate), date_create('today'));
                    // $yearResign = $resign->y;
                    // $monthResign = $resign->m;
                    // $valResign = ($resign->invert ? -1 : 1) * $monthResign + (12 * $yearResign);
                    // var_dump($valResign);
                    // if ($valResign == 0 && $obj->terminationCode == 'RS') return true;
                    if(date('Y-m', strtotime($obj->terminationDate)) == date('Y-m')) return true;
                }
                return false;
            });

            if($arrResult2->dataListSet == null){
                return response()->json(['totalEmployee' => count($arrResult->dataListSet), 'openPosition' => 0, 'maleEmployee' => count($maleEmployee), 'femaleEmployee' => count($femaleEmployee), 'ageFirst' => count($ageFirst), 'ageSecond' => count($ageSecond), 'ageThird' => count($ageThird),
                'ageFourth' => count($ageFourth), 'ageFifth' => count($ageFifth), 'joinFirst' => count($joinFirst), 'joinSecond' => count($joinSecond), 'joinThird' => count($joinThird), 'joinFourth' => count($joinFourth), 'endContractData' => $endContractMonth, 'endContractMonth' => count($endContractMonth), 
                'birthdayData' => $birthdayMonth, 'birthdayMonth' => count($birthdayMonth), 'endProbationData' => $endProbationMonth, 'endProbationMonth' => count($endProbationMonth), 'joinData' => $joinMonth, 'joinMonth' => count($joinMonth), 'resignData' => $resignMonth, 'resignMonth' => count($resignMonth), 'dataAbsent' => []]);
            }else{
                return response()->json(['totalEmployee' => count($arrResult->dataListSet), 'openPosition' => 0, 'maleEmployee' => count($maleEmployee), 'femaleEmployee' => count($femaleEmployee), 'ageFirst' => count($ageFirst), 'ageSecond' => count($ageSecond), 'ageThird' => count($ageThird),
                'ageFourth' => count($ageFourth), 'ageFifth' => count($ageFifth), 'joinFirst' => count($joinFirst), 'joinSecond' => count($joinSecond), 'joinThird' => count($joinThird), 'joinFourth' => count($joinFourth), 'endContractData' => $endContractMonth, 'endContractMonth' => count($endContractMonth), 
                'birthdayData' => $birthdayMonth, 'birthdayMonth' => count($birthdayMonth), 'endProbationData' => $endProbationMonth, 'endProbationMonth' => count($endProbationMonth), 'joinData' => $joinMonth, 'joinMonth' => count($joinMonth), 'resignData' => $resignMonth, 'resignMonth' => count($resignMonth), 'dataAbsent' => $arrResult2->dataListSet[0]->summaryAmount]);
            }
        }
    }

    public function getOvertime(Request $request)
    {
        $dataOvt1 = [];
        $dataOvt2 = [];

        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/TmOvertime/getOvertimeHourDashboard',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
                        'periodMonth' => (int) date('n'),
                        'periodYear' => (int) date('Y'),
                        'languageID' => App::getLocale(),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
                        "logActionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userID')
	    			]
	    		)]
	    	);

            $response2 = $client->post(env('API_URL') . '/mobile/TmOvertime/getOvertimeCostDashboard',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
                        'periodMonth' => (int) date('n'),
                        'periodYear' => (int) date('Y'),
                        'languageID' => App::getLocale(),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
                        "logActionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userID')
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
        $arrResult2 = json_decode($response2->getBody()->getContents());

        if($arrResult->dataListSet == null){
            $dataOvt1 = [];
        }else{
            usort($arrResult->dataListSet, function($a, $b) {return strcmp($a->periodmonth, $b->periodmonth);});

            foreach($arrResult->dataListSet as $val)
            {
                $dataOvt1['totalOvertimeHour'][] = $val->totalOvertimeHour;
                $dataOvt1['month'][] = date('F', mktime(0, 0, 0, $val->periodmonth, 10));
            }
        }

        $totalOvt = [];

        if($arrResult2->dataListSet == null){
            $dataOvt2 = [];
        }else{
            foreach($arrResult2->dataListSet as $key => $value){
                $dataOvt2['tanggal'][] = date('F Y', strtotime($value->overtimeDate));
                $dataOvt2['total'][] = $value->overtimeTotalCost;
            }
        }

        return response()->json(['data1' => $dataOvt1, 'data2' => $dataOvt2]);
    }

    public function getPayroll(Request $request)
    {
        $dataPay = [];

        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/PrSalaryCalculation/ASDP/v1/getBasicSalaryDashboardEntity',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
                        'periodYear' => (int) date('Y'),
                        'periodMonth' => (int) date('n'),
                        // 'periodYear' => 2022,
                        'languageID' => App::getLocale(),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
                        "logActionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userID')
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
        // var_dump($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            $dataPay = [];
        }else{
            foreach($arrResult->dataListSet as $key => $value){
                $dataPay['tanggal'][] = date('F Y', strtotime($value->period));
                $dataPay['total'][] = $value->takeHomePaySalary;
            }
        }

        return response()->json($dataPay);
    }
}
