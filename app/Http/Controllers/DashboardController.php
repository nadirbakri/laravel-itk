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

            $response_Get = $client->post(env('API_URL') . '/firebase/getfirebase',
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
                $response = $client->post(env('API_URL') . '/firebase',
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
                $response = $client->put(env('API_URL') . '/firebase',
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

            $response = $client->post(env('API_URL') . '/firebase/getfirebase',
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

            $response = $client->post(env('API_URL') . '/tmcalendar/gettmcalendar',
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

            $response = $client->post(env('API_URL') . '/pemaster/getpemastergrid',
	    		['body' => json_encode(
	    			[
	    				'recordStatus' => 'A',
	    				'companyCode' => Session::get('companyCode')
	    			]
	    		)]
	    	);

            $response2 = $client->post(env('API_URL') . '/tmabsence/getbyspecificdate',
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

        if($arrResult->dataListSet == null){
            return response()->json(['totalEmployee' => 0, 'openPosition' => 0, 'maleEmployee' => 0, 'femaleEmployee' => 0, 'ageFirst' => 0, 'ageSecond' => 0, 'ageThird' => 0, 'joinFirst' => 0, 'joinSecond' => 0, 'joinThird' => 0, 'joinFourth' => 0,
            'endContractData' => [], 'endContractMonth' => 0, 'birthdayData' => [], 'birthdayMonth' => 0, 'endProbationData' => [], 'endProbationMonth' => 0, 'joinData' => [], 'joinMonth' => 0, 'hireData' => [], 'hireMonth' => 0, 'resignData' => [], 'resignMonth' => 0]);
        }else{
            $maleEmployee = array_filter($arrResult->dataListSet, function($obj){
                if ($obj->gender == 'M') return true;
                return false;
            });
            $femaleEmployee = array_filter($arrResult->dataListSet, function($obj){
                if ($obj->gender == 'F') return true;
                return false;
            });
            $ageFirst = array_filter($arrResult->dataListSet, function($obj){
                $age = date_diff(date_create($obj->birthDate), date_create('today'))->y;
                if ($age >= 21 && $age < 30) return true;
                return false;
            });
            $ageSecond = array_filter($arrResult->dataListSet, function($obj){
                $age = date_diff(date_create($obj->birthDate), date_create('today'))->y;
                if ($age >= 30 && $age < 40) return true;
                return false;
            });
            $ageThird = array_filter($arrResult->dataListSet, function($obj){
                $age = date_diff(date_create($obj->birthDate), date_create('today'))->y;
                if ($age >= 40 && $age < 55) return true;
                return false;
            });

            $joinFirst = array_filter($arrResult->dataListSet, function($obj){
                $join = date_diff(date_create($obj->joinDate), date_create('today'))->y;
                if ($join < 5) return true;
                return false;
            });

            $joinSecond = array_filter($arrResult->dataListSet, function($obj){
                $join = date_diff(date_create($obj->joinDate), date_create('today'))->y;
                if ($join >= 5 && $join < 10) return true;
                return false;
            });

            $joinThird = array_filter($arrResult->dataListSet, function($obj){
                $join = date_diff(date_create($obj->joinDate), date_create('today'))->y;
                if ($join >= 10 && $join < 15) return true;
                return false;
            });

            $joinFourth = array_filter($arrResult->dataListSet, function($obj){
                $join = date_diff(date_create($obj->joinDate), date_create('today'))->y;
                if ($join >= 15) return true;
                return false;
            });

            $endContractMonth = array_filter($arrResult->dataListSet, function($obj){
                $contract = date_diff(date_create($obj->contractEndDate), date_create('today'));
                $yearContract = $contract->y;
                $monthContract = $contract->m;
                $valContract = ($contract->invert ? -1 : 1) * $monthContract + (12 * $yearContract);
                if ($valContract == 0) return true;
                return false;
            });

            $birthdayMonth = array_filter($arrResult->dataListSet, function($obj){
                $birth = date('2022-m-01', strtotime($obj->birthDate));
                $birth2 = date('2022-m-01');
                if ($birth == $birth2) return true;
                return false;
            });

            $endProbationMonth = array_filter($arrResult->dataListSet, function($obj){
                $probation = date_diff(date_create($obj->probationEndDate), date_create('today'));
                $yearProbation = $probation->y;
                $monthProbation = $probation->m;
                $valProbation = ($probation->invert ? -1 : 1) * $monthProbation + (12 * $yearProbation);
                if ($valProbation == 0) return true;
                return false;
            });

            $joinMonth = array_filter($arrResult->dataListSet, function($obj){
                $join = date_diff(date_create($obj->joinDate), date_create('today'));
                $yearJoin = $join->y;
                $monthJoin = $join->m;
                $valJoin = ($join->invert ? -1 : 1) * $monthJoin + (12 * $yearJoin);
                if ($valJoin == 0) return true;
                return false;
            });

            $hireMonth = [];

            $resignMonth = array_filter($arrResult->dataListSet, function($obj){
                if(isset($obj->terminationDate)){
                    $resign = date_diff(date_create($obj->terminationDate), date_create('today'));
                    $yearResign = $resign->y;
                    $monthResign = $resign->m;
                    $valResign = ($resign->invert ? -1 : 1) * $monthResign + (12 * $yearResign);
                    if ($valResign == 0 && $obj->terminationCode == 'RS') return true;
                }
                return false;
            });

            if($arrResult2->dataListSet == null){
                return response()->json(['totalEmployee' => count($arrResult->dataListSet), 'openPosition' => 0, 'maleEmployee' => count($maleEmployee), 'femaleEmployee' => count($femaleEmployee), 'ageFirst' => count($ageFirst), 'ageSecond' => count($ageSecond), 'ageThird' => count($ageThird),
                'joinFirst' => count($joinFirst), 'joinSecond' => count($joinSecond), 'joinThird' => count($joinThird), 'joinFourth' => count($joinFourth), 'endContractData' => $endContractMonth, 'endContractMonth' => count($endContractMonth), 'birthdayData' => $birthdayMonth, 'birthdayMonth' => count($birthdayMonth), 
                'endProbationData' => $endProbationMonth, 'endProbationMonth' => count($endProbationMonth), 'joinData' => $joinMonth, 'joinMonth' => count($joinMonth), 'hireData' => $hireMonth, 'hireMonth' => count($hireMonth), 'resignData' => $resignMonth, 'resignMonth' => count($resignMonth), 'dataAbsent' => []]);
            }else{
                return response()->json(['totalEmployee' => count($arrResult->dataListSet), 'openPosition' => 0, 'maleEmployee' => count($maleEmployee), 'femaleEmployee' => count($femaleEmployee), 'ageFirst' => count($ageFirst), 'ageSecond' => count($ageSecond), 'ageThird' => count($ageThird),
                'joinFirst' => count($joinFirst), 'joinSecond' => count($joinSecond), 'joinThird' => count($joinThird), 'joinFourth' => count($joinFourth), 'endContractData' => $endContractMonth, 'endContractMonth' => count($endContractMonth), 'birthdayData' => $birthdayMonth, 'birthdayMonth' => count($birthdayMonth), 
                'endProbationData' => $endProbationMonth, 'endProbationMonth' => count($endProbationMonth), 'joinData' => $joinMonth, 'joinMonth' => count($joinMonth), 'hireData' => $hireMonth, 'hireMonth' => count($hireMonth), 'resignData' => $resignMonth, 'resignMonth' => count($resignMonth), 'dataAbsent' => $arrResult2->dataListSet[0]->summaryAmount]);
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

            $response = $client->post(env('API_URL') . '/TmOvertime/getOvertimeHourDashboard',
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

            $response2 = $client->post(env('API_URL') . '/TmOvertime/getOvertimeCostDashboard',
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

        for($i = 1; $i <= Carbon::now()->daysInMonth; $i++){
            $dataOvt2['tanggal'][] = date("Y-m-d", mktime(0, 0, 0, date('m'), $i, date('Y')));
            $totalOvt[date("Y-m-d", mktime(0, 0, 0, date('m'), $i, date('Y')))] = 0;
        }

        // var_dump($dataOvt2);

        if($arrResult2->dataListSet == null){
            $dataOvt2 = [];
        }else{
            foreach($arrResult2->dataListSet as $key => $value){
                $tanggal = date("Y-m-d", strtotime($value->overtimeDate));
                if(array_key_exists($tanggal, $totalOvt)){
                    $totalOvt[$tanggal] += $value->overtimeTotalCost;
                }
            }

            $dataOvt2['total'] = array_values($totalOvt);
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

            $response = $client->post(env('API_URL') . '/salarycalculation/getbasicsalarydashboardentity',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
                        // 'periodYear' => (int) date('Y'),
                        'periodYear' => 2022,
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

        $totalPay = [];

        for($i = 1; $i <= 12; $i++){
            $dataPay['month'][] = date('F', mktime(0, 0, 0, $i, 10));
            $totalPay[date('F', mktime(0, 0, 0, $i, 10))] = 0;
        }

        if($arrResult->dataListSet == null){
            $dataPay = [];
        }else{
            foreach($arrResult->dataListSet as $key => $value){
                $tanggal = date("F", strtotime($value->periodYear . '-' . $value->periodMonth . '-01'));
                if(array_key_exists($tanggal, $totalPay)){
                    $totalPay[$tanggal] += $value->basicSalary;
                }
            }

            $dataPay['total'] = array_values($totalPay);
        }

        return response()->json($dataPay);
    }
}
