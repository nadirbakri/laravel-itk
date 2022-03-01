<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;
use DataTables;
use Excel;

class PayrollController extends Controller
{
    public function pagePayroll() 
    {
        return view ('payroll.py_main');
    }

    public function pageAccount()
    {
        return view ('payroll.py_account');
    }

    public function pageBonusFormula()
    {
        return view ('payroll.py_bonus_formula');
    }
    
    public function pageThrFormula()
    {
        return view ('payroll.py_thr_formula');
    }

    public function pageBonusDataEntry()
    {
        return view ('payroll.py_bonus_data_entry');
    }

    public function pageThrDataEntry()
    {
        return view ('payroll.py_thr_data_entry');
    }

    public function tableAccount()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmaccount/getgmaccount',
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

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableTHRDataEntryPY(Request $request) {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prbonusthr/getprbonusthr',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'flagType' => 'T',
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableBonusDataEntryPY(Request $request) {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prbonusthr/getprbonusthr',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'flagType' => 'B',
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableTHRFormulaPY(Request $request) {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/comgen/getcomgen',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        "variable" => "religion_",
                        "languageCode" => App::getLocale(),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableTHRFormulaDetailPY(Request $request) {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump($request->religionCode);

            $response = $client->post(env('API_URL') . '/prformulathr/getprformulathr',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        "religionCode" => $request->religionCode,
                        "languageCode" => App::getLocale(),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableBonusFormulaDetailPY(Request $request) {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump($request->religionCode);

            $response = $client->post(env('API_URL') . '/prformulabonus/getformulabonus',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        "bonusDate" => $request->bonusDate,
                        "languageCode" => App::getLocale(),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableBonusFormulaPY(Request $request) {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prformulabonus/getformulabonus',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        "languageCode" => App::getLocale(),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function dataDetailTHRDataEntryPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->func == 'new') {
                $response = $client->post(env('API_URL') . '/prbonusthr/getprbonusthr',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employeeNo,
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );
            }
            else {
                $response = $client->post(env('API_URL') . '/prbonusthr/getprbonusthr',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employeeNo,
                            'receiptDate' => $request->receiptDate,
                            'flagType' => $request->type,
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return view('payroll.py_thr_data_entry_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailBonusDataEntryPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->func == 'new') {
                $response = $client->post(env('API_URL') . '/prbonusthr/getprbonusthr',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employeeNo,
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );
            }
            else {
                $response = $client->post(env('API_URL') . '/prbonusthr/getprbonusthr',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employeeNo,
                            'receiptDate' => $request->receiptDate,
                            'flagType' => $request->type,
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return view('payroll.py_bonus_data_entry_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailTHRFormulaPY(Request $request)
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
                        'comGenCode' => $request->religionCode,
                        'languageCode' => App::getLocale(),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return view('payroll.py_thr_formula_detail', ['data' => $arrResult->dataListSet]);
    }

    public function dataDetailBonusFormulaPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->func === 'new') {
                $response = $client->post(env('API_URL') . '/prformulabonus/getformulabonus',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'languageCode' => App::getLocale(),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );
            }

            else {
                $response = $client->post(env('API_URL') . '/prformulabonus/getformulabonus',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'bonusDate' => $request->bonusDate,
                            'languageCode' => App::getLocale(),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return view('payroll.py_bonus_formula_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function prosesTHRBonusDataEntryPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function == 'New') {
                $response = $client->post(env('API_URL') . '/prbonusthr/insertprbonusthr',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employee_no,
                            'receiptDate' => $request->payment_date,
                            'flagType' => $request->entry_type,
                            "currencyCode" => $request->currency_code,
                            "amount" => (int) $request->nominal,
                            "serviceMonth" => (int) $request->service_month,
                            "performanceResult" => $request->performance_result,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
                );
            }else {
                $param[] = [
                    'companyCode' => Session::get('companyCode'),
                    'employeeNo' => $request->employee_no,
                    'receiptDate' => $request->payment_date_hidden,
                    'flagType' => $request->entry_type_hidden,
                    "currencyCode" => $request->currency_code,
                    "amount" => (int) $request->nominal,
                    "serviceMonth" => (int) $request->service_month,
                    "performanceResult" => $request->performance_result,
                    "changedNo" => 0,
                    "changedBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    "languageCode" => App::getLocale(),
                    "sessionID" => 0,
                    "sessionUserID" => Session::get('userID'),
                    "logActionUserID" => Session::get('userID'),
                    "logActionUsername" => Session::get('userID')
                ];

                $response = $client->put(env('API_URL') . '/prbonusthr/updateprbonusthr',
                    ['body' => json_encode($param)]
                );
            }
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesTHRDataEntryProcessPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump($request->religion_code);

            $response = $client->post(env('API_URL') . '/prbonusthr/processbonusthr',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        "processType" => $request->process_type,
                        "cutOffDate" => $request->thr_cut_off_date,
                        "religionCode" => $request->religion_code,
                        "rounded" => isset($request->service_month_rounded) ? (bool) $request->service_month_rounded : false,
                        "greaterThan" => (int) $request->greater_than,
                        "languageCode" => App::getLocale(),
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
                        "logActionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userID')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesBonusDataEntryProcessPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prbonusthr/processbonusthr',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        "processType" => $request->process_type,
                        "cutOffDate" => $request->bonus_cut_off_date,
                        "rounded" => isset($request->service_month_rounded) ? (bool) $request->service_month_rounded : false,
                        "greaterThan" => (int) $request->greater_than,
                        "languageCode" => App::getLocale(),
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
                        "logActionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userID')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function removeTHRBonusDataEntryPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            $param = [];

            foreach($request->data as $value){
                $param[] = [
                    'companyCode' => $value['companyCode'],
                    'employeeNo' => $value['employeeNo'],
                    'employeeName' => $value['employeeName'],
                    'receiptDate' => $value['receiptDate'],
                    'flagType' => $value['flagType'],
                    'changedNo' => 0,
                    "changedBy" => Session::get('userID'),
                    "createdBy" => Session::get('userID'),
                    'languageCode' => App::getLocale(),
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                ];
            }

            $response = $client->delete(env('API_URL') . '/prbonusthr/deleteprbonusthr',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removeBonusFormulaPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump($request->data);
            // var_dump($request->serviceMonthFrom);

            $response = $client->delete(env('API_URL') . '/prformulabonus/deleteformulabonus',
                ['body' => json_encode(
                    [
                        "companyCode" => Session::get('companyCode'),
                        "bonusDate" => $request->bonusDate,
                        "serviceMonthFrom" => (int) $request->serviceMonthFrom,
                        "serviceMonthTo" => (int) $request->serviceMonthTo,
                        "performanceResult" => $request->performanceResult,
                        "formula" => $request->formula,
                        "condition" => $request->condition,
                        "changedNo" => 0,
                        "languageCode" => App::getLocale(),
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
                        "logActionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function dataAccount(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmaccount/getgmaccount',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'accountNo' => $request->accountNo,
                        'languageCode' => App::getLocale()
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return view('payroll.py_account_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function statusAccount(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump($request->accountNo);

            $response = $client->put(env('API_URL') . '/gmaccount/updategmaccount',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'accountNo' => $request->accountNo,
                        'accountDescription' => $request->accountDescription,
                        'reference' => $request->reference,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "languageCode" => App::getLocale(),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
            
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesAccount(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'recordStatus' => "A",
                'companyCode' => Session::get('companyCode'),
                'accountNo' => $request->account_no,
                'accountDescription' => $request->account_description,
                'reference' => $request->reference,
                "changedNo" => 0,
                "createdDate" => date("Y-m-d\TH:i:s"),
                "createdBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "changedBy" => Session::get('userID'),
                "languageCode" => App::getLocale(),
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID'),
                'logActionUserID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName')        
            ];

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/gmaccount/insertgmaccount',
                    ['body' => json_encode($param)]
                );
            }else{
                $response = $client->put(env('API_URL') . '/gmaccount/updategmaccount',
                    ['body' => json_encode($param)]
                );
            }
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }
}