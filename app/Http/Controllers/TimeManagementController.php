<?php

namespace App\Http\Controllers;

use App\Exports\UnpaidLeaveReportExport;
use App\Exports\PostponeLeaveReportExport;
use App\Exports\MonthlyLeaveReportExport;
use App\Exports\MonthlyAbsenteeismAnalysisExport;
use App\Exports\MonthlyAbsenteeismDetailExport;
use App\Exports\AbsenteeismOvertimeReportExport;
use App\Exports\DetailAbsenteeismReportExport;
use App\Exports\DetailAbsenteeismReasonReportExport;
use App\Exports\DetailRateOvertimeReportExport;

use App\Imports\UpdateAbsenteeismDataImport;
use App\Imports\TimeRecordingProcessFormImport;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;
use File;
use DataTables;
use Excel;

class TimeManagementController extends Controller
{
    public function pageTimeManagement() 
    {
        return view ('time_management.tm_main');
    }

    public function pageTimeRecordingProcessForm() 
    {
        return view ('time_management.tm_time_recording_process_form');
    }

    public function pageUpdateAbsenteeismData()
    {
        return view ('time_management.tm_update_absenteeism_data');
    }

    public function pageAbsenteeismDataEntryByEmployeeNo()
    {
        return view ('time_management.tm_absenteeism_data_entry_by_employee_no');
    }

    public function pageAbsenteeismDataEntryByDate()
    {
        return view ('time_management.tm_absenteeism_data_entry_by_date');
    }

    public function pageTemplatePreparation()
    {
        return view ('time_management.tm_template_preparation');
    }

    public function pageUpdateShiftByDate()
    {
        return view ('time_management.tm_update_shift_by_date');
    }

    public function pageInputBalanceLeave()
    {
        return view ('time_management.tm_input_balance_leave');
    }

    public function pageCompanyWorkingCalendar()
    {
        return view ('time_management.tm_company_working_calendar');
    }

    public function pageLeaveTransactionByEmployeeNo()
    {
        return view ('time_management.tm_leave_transaction_by_employee_no');
    }

    public function pageOvertimeSPL()
    {
        return view ('time_management.tm_overtime_spl');
    }

    public function pageTimeRecordingReference()
    {
        return view ('time_management.tm_time_recording_reference');
    }

    public function pagePeriodMaintenance()
    {
        return view ('time_management.tm_period_maintenance');
    }

    public function pageWorkPattern()
    {
        return view ('time_management.tm_work_pattern');
    }

    public function pageAbsentCode()
    {
        return view ('time_management.tm_absent_code');
    }

    public function pageShiftMasterCode()
    {
        return view ('time_management.tm_shift_master_code');
    }

    public function pageReferenceTimeManagement()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/referencetm/getreferencetm',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
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

        return view('time_management.tm_reference_time_management', ['data' => $arrResult->dataListSet]);
    }    

    public function pageUnpaidLeaveReport()
    {
        return view ('time_management.tm_unpaid_leave_report');
    }

    public function pagePostponeLeaveReport()
    {
        return view ('time_management.tm_postpone_leave_report');
    }

    public function pageMonthlyLeaveReport()
    {
        return view ('time_management.tm_monthly_leave_report');
    }

    public function pageMonthlyAbsenteeismAnalysis()
    {
        return view ('time_management.tm_monthly_absenteeism_analysis');
    }

    public function pageDetailAbsenteeismReport()
    {
        return view ('time_management.tm_detail_absenteeism_report');
    }

    public function pageMonthlyAbsenteeismDetail()
    {
        return view ('time_management.tm_monthly_absenteeism_detail');
    }

    public function pageDetailAbsenteeismReasonReport()
    {
        return view ('time_management.tm_detail_absenteeism_reason_report');
    }

    public function pageAbsenteeismOvertimeReport()
    {
        return view ('time_management.tm_absenteeism_overtime_report');
    }

    public function pageDetailRateOvertimeReport()
    {
        return view ('time_management.tm_detail_rate_overtime_report');
    }

    public function tableCompanyWorkingCalendar()
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

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }
    
    public function tableAbsentCodeTM()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/tmabsentcode/gettmabsentcode',
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

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableShiftMasterCodeTM()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/tmshiftcode/gettmshiftcode',
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

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableReferenceTimeManagementTM()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/referencetm/getreferencetmdetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        "sessionID" => 0,
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
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
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableOvertimeCodeTM()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/tmabsentcode/gettmabsentcode',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'recordStatus' => 'A',
                        'absentType' => 'O'
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
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
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableInputBalanceLeave(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pemasterleave/getpemasterleave',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
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
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableOvertimeSPL(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/tmovtspl/gettmovtsplgrid',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNoFrom' => $request->employeeNoFrom,
                        'employeeNoTo' => $request->employeeNoTo,
                        'dateFrom' => $request->dateFrom,
                        'dateTo' => $request->dateTo,
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
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
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableWorkPatternTM(Request $request)
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
                        'userID' => Session::get('userID'),
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

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableWorkPatternDetailTM(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                'patternCode' => $request->patternCode,
                "sessionID" => 0,
                'userID' => Session::get('userID'),
                'logActionUserID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName'),
                "languageCode" => App::getLocale()
            ];
            
            foreach($request->seqNo as $value){
                $data_work_pattern_detail_list[] = [
                    'companyCode' => Session::get('companyCode'),
                    'patternCode' => $request->patternCode,
                    'seqNo' => $value,
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    "languageCode" => App::getLocale()
                ];
            }
            $param['workPatternDetailList'] = $data_work_pattern_detail_list;

            $response = $client->post(env('API_URL') . '/tmworkpattern/gettmworkpatternservice',
                    ['body' => json_encode($param)]
            );

        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if(!isset($request->patternCode)){
            return Datatables::of([])->make(true);
        }else{
            if($arrResult->dataListSet == null){
                return Datatables::of([])->make(true);
            }else{
                return Datatables::of($arrResult->dataListSet)->make(true);
            }
        }
    }

    public function tablePeriodMaintenanceTM()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/tmperiod/gettmperiod',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
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

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableTimeRecordingReferenceTM()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/referencetimerecord/getreferencetimerecord',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
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

        return response()->json($arrResult->dataListSet);
    }

    public function tableAbsenteeismDataEntryByEmployeeNoTM(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            $response = $client->post(env('API_URL') . '/tmabsentemployee/gettmabsentemployee',
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
        } catch (RequestException $e) {
            $response = $e->getResponse();
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

    public function dataDetailRankingPersonel(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmranking/getgmranking',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'rankingCode' => $request->rankingCode,
                        'userID' => Session::get('userID'),
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

        return view('personel.personel_ranking_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailPeriodTM () 
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/referencetm/getreferencetm',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
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

        return response()->json($arrResult->dataListSet);
    }

    public function dataDetailInputBalanceLeave(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pemasterleave/getpemasterleave',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'leaveCode' => $request->leaveCode,
                        'userID' => Session::get('userID'),
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

        return view('time_management.tm_input_balance_leave_detail', ['data' => $arrResult->dataListSet]);
    }

    public function dataDetailEmployeeNameTM(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/leavetransaction/getleavetransaction',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
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

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return response()->json($data);
    }

    public function dataDetailBalanceTM(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            $response = $client->post(env('API_URL') . '/leavetransaction/getleavetransaction',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'leaveCode' => $request->leaveCode,
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

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return response()->json($data);
    }

    public function dataDetailPeriodMaintenanceTM (Request $request) 
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/tmperiod/gettmperiod',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'periodMonth' => (int) $request->month,
                        'periodYear' => (int) $request->year,
                        'period' => (int) $request->period,
                        'userID' => Session::get('userID'),
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

        return response()->json($arrResult->dataListSet);
    }

    public function dataDetailWorkPatternTM(Request $request)
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
                        'patternCode' => $request->patternCode,
                        'userID' => Session::get('userID'),
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

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('time_management.tm_work_pattern_detail', ['data' => $data, 'func' => $request->func]);
    }

    public function dataDetailAbsentCodeTM(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/tmabsentcode/gettmabsentcode',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'absentCode' => $request->absentCode,
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

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return response()->json($data);
    }

    public function dataDetailDataAbsentCodeTM(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/tmabsentcode/gettmabsentcode',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'absentCode' => $request->absentCode,
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

        return view('time_management.tm_absent_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailShiftMasterCodeTM(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/tmshiftcode/gettmshiftcode',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'shiftCode' => $request->shiftCode,
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

        return view('time_management.tm_shift_master_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailAbsenteeismDataEntryTM(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pemaster/getpemasterdetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
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

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return response()->json($data);
    }

    public function printUnpaidLeaveReport(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new UnpaidLeaveReportExport($request->employee_no_from, $request->employee_no_to, $request->period, isset($request->include_resign) ? (bool) $request->include_resign : false, $request->group_authorize_from, $request->group_authorize_to, $request->position, $request->ranking, $request->location, $dataLevel), 'Unpaid Leave Report.xlsx');
    }

    public function printPostponeLeaveReport(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new PostponeLeaveReportExport($request->employee_no_from, $request->employee_no_to, $request->period, isset($request->include_resign) ? (bool) $request->include_resign : false, $request->group_authorize_from, $request->group_authorize_to, $request->position, $request->ranking, $request->location, $dataLevel), 'Postpone Leave Report.xlsx');
    }
    
    public function printMonthlyLeaveReport(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new MonthlyLeaveReportExport($request->employee_no_from, $request->employee_no_to, $request->period, isset($request->have_balance_only) ? (bool) $request->have_balance_only : false, isset($request->include_resign) ? (bool) $request->include_resign : false, $request->group_authorize_from, $request->group_authorize_to, $request->position, $request->ranking, $request->location, $dataLevel), 'Monthly Leave Report.xlsx');
    }

    public function printMonthlyAbsenteeismAnalysis(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new MonthlyAbsenteeismAnalysisExport($request->employee_no_from, $request->employee_no_to, $request->period, isset($request->include_resign) ? (bool) $request->include_resign : false, $request->group_authorize_from, $request->group_authorize_to, $request->position, $request->ranking, $request->location, $dataLevel), 'Monthly Absenteeism Analysis.xlsx');
    }

    public function printDetailAbsenteeismReport(Request $request)
    {
        $dataLevel = [];

        parse_str($request->field, $arrData);

        $arrData2 = json_decode($request->field_name);

        for($i = 0; $i < $arrData['level_format']; $i++){
            $dataLevel[] = $arrData['level' . ($i+1)];
        }

        return Excel::download(new DetailAbsenteeismReportExport($arrData['employee_no_from'],$arrData['employee_no_to'], $arrData['absent_date_from'], $arrData['absent_date_to'], $arrData['group_authorize_from'], $arrData['group_authorize_to'], isset($arrData['include_resign']) ? (bool) $arrData['include_resign'] : false, $arrData['position'], $arrData['ranking'], $arrData['location'], $dataLevel, $arrData2), 'Detail Absenteeism Report.xlsx');
    }

    public function printDetailAbsenteeismReasonReport(Request $request)
    {
        $dataLevel = [];

        parse_str($request->field, $arrData);

        $arrData2 = json_decode($request->field_name);

        for($i = 0; $i < $arrData['level_format']; $i++){
            $dataLevel[] = $arrData['level' . ($i+1)];
        }

        return Excel::download(new DetailAbsenteeismReasonReportExport($arrData['employee_no_from'],$arrData['employee_no_to'], $arrData['absent_date_from'], $arrData['absent_date_to'], $arrData['group_authorize_from'], $arrData['group_authorize_to'], isset($arrData['include_resign']) ? (bool) $arrData['include_resign'] : false, $arrData['position'], $arrData['ranking'], $arrData['location'], $dataLevel, $arrData2), 'Detail Absenteeism Reason Report.xlsx');    
    }

    public function printDetailRateOvertimeReport(Request $request)
    {
        $dataLevel = [];

        parse_str($request->field, $arrData);

        $arrData2 = json_decode($request->field_name);  

        for($i = 0; $i < $arrData['level_format']; $i++){
            $dataLevel[] = $arrData['level' . ($i+1)];
        }

        return Excel::download(new DetailRateOvertimeReportExport($arrData['employee_no_from'],$arrData['employee_no_to'], $arrData['absent_date_from'], $arrData['absent_date_to'], $arrData['group_authorize_from'], $arrData['group_authorize_to'], isset($arrData['include_resign']) ? (bool) $arrData['include_resign'] : false, $arrData['position'], $arrData['ranking'], $arrData['location'], $dataLevel, $arrData2), 'Detail Rate Overtime Report.xlsx');
    }

    public function printMonthlyAbsenteeismDetail(Request $request)
    {
        $dataLevel = [];

        parse_str($request->field, $arrData);
        $arrData2 = json_decode($request->field_name);

        for($i = 0; $i < $arrData['level_format']; $i++){
            $dataLevel[] = $arrData['level' . ($i+1)];
        }

        return Excel::download(new MonthlyAbsenteeismDetailExport($arrData['employee_no_from'], $arrData['employee_no_to'], $arrData['absent_month_from'], $arrData['absent_month_to'], isset($arrData['include_resign']) ? (bool) $arrData['include_resign'] : false, isset($arrData['change_header']) ? (bool) $arrData['change_header'] : false, $arrData2, $arrData['hour_out'], $arrData['hour_to'], $arrData['group_authorize_from'], $arrData['group_authorize_to'], $arrData['position'], $arrData['ranking'], $arrData['location'], $dataLevel), 'Monthly Absenteeism Analysis.xlsx');
    }

    public function printAbsenteeismOvertimeReport(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new AbsenteeismOvertimeReportExport($request->employee_no_from, $request->employee_no_to, $request->absent_date_from, $request->absent_date_to, $request->group_authorize_from, $request->group_authorize_to, $request->report_type, isset($request->include_resign) ? (bool) $request->include_resign : false, $request->position, $request->ranking, $request->location, $dataLevel), 'Absenteeism & Overtime Report.xlsx');
    }

    public function importUpdateAbsenteeismData(Request $request)
    {
        $file = $request->file('file_location');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('file_excel', $nama_file);
        $import = new UpdateAbsenteeismDataImport;
        Excel::import($import, public_path('file_excel/'.$nama_file));
        File::delete('file_excel/'.$nama_file);
        return $import->getArrResult();
    }


    public function prosesUpdateShiftByDateTM(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            $param = [ 
                'companyCode' => Session::get('companyCode'), 
                'dateFrom' => $request->date_from,
                'dateTo' => $request->date_to,
                'shiftFrom' => $request->shift_from,
                'shiftTo' => $request->shift_to,
                'locationCode' => $request->location,
                'religionCode' => $request->religion,
                'positionCode' => $request->position,
                'languageCode' => App::getLocale(), 
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID'),
                'logActionUserID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName')
            ];

            if(!empty($dataLevel) && !is_null($dataLevel[0])){
                foreach($dataLevel as $key => $value){
                    $data_level_detail = [];
                    foreach($dataLevel[$key] as $value2){
                        $data_level_detail[] = $value2;
                    }
                    $data_level[] = [
                        "levelType" => (string) ($key + 1),
                        "levelCode" => $data_level_detail
                    ];
                }
                $param['level'] = $data_level;
            }

            $response = $client->put(env('API_URL') . '/tempabsentmachine/updateshiftbydate',
                ['body' => json_encode($param)]
            );

        } catch (RequestException $e) {
            $response = $e->getResponse();
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

    public function prosesInputBalanceLeaveTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/pemasterleave',
                ['body' => json_encode(
                    [
                        "companyCode" => Session::get('companyCode'),
                        "employeeNo" => $request->employee_no,
                        "leaveCode" => $request->leave_code,
                        "leaveBalance" => (int) $request->leave_balance,
                        "leaveBalanceBefore" => (int) $request->leave_balance_before,
                        "leaveBalanceBeforeExpiredDate" => $request->expired_date,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "languageCode" => App::getLocale(),
                        "sessionID" => 0,
                        'userID' => Session::get('userID'),
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

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesOvertimeSPLTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/tmovtspl/inserttmovtspl',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employee_no,
                        "ovtDate" => $request->date_overtime_spl,
                        "shiftCode" => $request->shift_overtime_spl,
                        // "seqNo" => 2,
                        "ovtIn" => $request->date_overtime_spl . "T" . $request->start_overtime_spl,
                        "ovtOut" => $request->date_overtime_spl . "T" . $request->finish_overtime_spl,
                        "ovtHour" => $request->date_overtime_spl . "T" . $request->hour_overtime_spl,
                        "ovtConvert" => (int) $request->convert_overtime_spl,
                        "ovtBeforeIn" => $request->date_overtime_spl . "T" . $request->before_in,
                        "ovtCode" => $request->code_overtime_spl,
                        "ovtDescription" => $request->description,
                        "hrdApprove" => true,
                        "leadApprove" => true,
                        "xfactor1" => 0,
                        "xfactor2" => 0,
                        "xfactor3" => 0,
                        "xfactor4" => 0,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "sessionID" => 0,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
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

    public function prosesCompanyWorkingCalendar(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            if($request->record_function == 'Add'){
                $response = $client->post(env('API_URL') . '/tmcalendar',
                    ['body' => json_encode(
                        [
                            "companyCode" => Session::get('companyCode'),
                            "calendar" => $request->calendar_date,
                            "description" => $request->description,
                            "flagType" => $request->calendar_type,
                            "locationCode" => $request->location,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            'sessionUserID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/tmcalendar',
                    ['body' => json_encode(
                        [
                            "companyCode" => Session::get('companyCode'),
                            "calendar" => $request->calendar_date,
                            "description" => $request->description,
                            "flagType" => $request->calendar_type,
                            "locationCode" => $request->location,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            'sessionUserID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
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

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesWorkPatternTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'recordStatus' => $request->record_status,
                'companyCode' => Session::get('companyCode'),
                'patternCode' => $request->work_pattern_code,
                'description' => $request->description,
                'holidayFlag' => isset($request->check_work_on_holiday) ? (bool) $request->check_work_on_holiday : false,
                'noOfDay' => (int) $request->no_of_day,
                "changedNo" => 0,
                "createdDate" => date("Y-m-d\TH:i:s"),
                "createdBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "changedBy" => Session::get('userID'),
                "sessionID" => 0,
                'userID' => Session::get('userID'),
                'logActionUserID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName'),
                "languageCode" => App::getLocale()
            ];

            if(isset($request->seq_no)){
                foreach($request->seq_no as $value){
                    $data_work_pattern_detail_list[] = [
                        'recordStatus' => $request->record_status,
                        'companyCode' => Session::get('companyCode'),
                        'patternCode' => $request->work_pattern_code,
                        'seqNo' => (int) $value,
                        'dayCode' => $request->day_code[$value - 1],
                        'shiftCode' => $request->shift_code[$value - 1],
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
                    ];
                }
            }else{
                $data_work_pattern_detail_list[] = null; 
            }
            
            $param['workPatternDetailList'] = $data_work_pattern_detail_list;

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/tmworkpattern',
                    ['body' => json_encode($param)]
                );
            }else{
                $response = $client->put(env('API_URL') . '/tmworkpattern',
                    ['body' => json_encode($param)]
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

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesPeriodMaintenanceTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/tmperiod',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'periodMonth' => (int) $request->month,
                            'periodYear' => (int) $request->year,
                            'period' => (int) $request->period,
                            'salaryStart' => $request->salary_from,
                            'salaryEnd' => $request->salary_to,
                            'overtimeStart' => $request->overtime_from,
                            'overtimeEnd' => $request->overtime_to,
                            'absenteeismStart' => $request->absenteeism_from,
                            'absenteeismEnd' => $request->absenteeism_to,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionID' => 0,
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/tmperiod',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'periodMonth' => (int) $request->month,
                            'periodYear' => (int) $request->year,
                            'period' => (int) $request->period,
                            'salaryStart' => $request->salary_from,
                            'salaryEnd' => $request->salary_to,
                            'overtimeStart' => $request->overtime_from,
                            'overtimeEnd' => $request->overtime_to,
                            'absenteeismStart' => $request->absenteeism_from,
                            'absenteeismEnd' => $request->absenteeism_to,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionID' => 0,
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesLeaveTransactionTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/leavetransaction',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' =>  $request->employee_no,
                        'leaveCode' => $request->leave_code,
                        'leaveTime' => $request->radiobtn,
                        'leaveDateFrom' => $request->leave_date_from,
                        'leaveDateTo' => $request->leave_date_to,
                        "languageCode" => App::getLocale(),
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionID' => 0,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
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

    public function prosesAbsentCodeTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'recordStatus' => $request->record_status,
                'companyCode' => Session::get('companyCode'),
                'absentCode' => $request->absent_code,
                'absentType' => $request->category,
                'description' => $request->description,
                'deductLeave' => $request->deduct_leave,
                'mustWoman' => isset($request->check_must_woman) ? (bool) $request->check_must_woman : false,
                'deductSalary' => isset($request->check_deduct_salary) ? (bool) $request->check_deduct_salary : false,
                'deductAllowance' => isset($request->check_deduct_allowance) ? (bool) $request->check_deduct_allowance : false,
                'getCompensationLeave' => isset($request->check_get_compensation_leave) ? (bool) $request->check_get_compensation_leave : false,
                'flagDisplayESS' => isset($request->check_display_absent_code) ? (bool) $request->check_display_absent_code : false,
                'flagAttachment' => isset($request->check_need_attachment) ? (bool) $request->check_need_attachment : false,
                'flagReqDay' => isset($request->check_tolerance_request) ? (bool) $request->check_tolerance_request : false,
                'reqBackDay' => (int) $request->back_date,
                'reqAdvanceDay' => (int) $request->max_per_request,
                'timesAllowed' => (int) $request->times_allowed,
                'flagWarning' => isset($request->check_warning) ? (bool) $request->check_warning : false,
                'payroll',
                "changedNo" => 0,
                "createdDate" => date("Y-m-d\TH:i:s"),
                "createdBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "changedBy" => Session::get('userID'),
                "languageCode" => App::getLocale()             
            ];

            for($i=0; $i<25; $i++){
                $param['payroll'. ($i+1)] = isset($request->{'check_payroll' . ($i+1)}) ? (bool) $request->{'check_payroll' . ($i+1)} : false;
            }

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/tmabsentcode',
                    ['body' => json_encode($param)]
                );
            }else{
                $response = $client->put(env('API_URL') . '/tmabsentcode',
                    ['body' => json_encode($param)]
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

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesTimeRecordingReferenceTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            if ($request->record_function == 'New') {
                $response = $client->post(env('API_URL') . '/referencetimerecord',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            "inCode" => $request->in_code,
                            "outCode" => $request->out_code,
                            "employeeNoStart" => (int) $request->employee_no_start,
                            "employeeNoLong" => (int) $request->employee_no_long,
                            "yearStart" => (int) $request->year_start,
                            "yearLong" => (int) $request->year_long,
                            "monthStart" => (int) $request->month_start,
                            "monthLong" => (int) $request->month_long,
                            "dateStart" => (int) $request->day_start,
                            "dateLong" => (int) $request->day_long,
                            "hourStart" => (int) $request->hour_start,
                            "hourLong" => (int) $request->hour_long,
                            "minuteStart" => (int) $request->minute_start,
                            "minuteLong" => (int) $request->minute_long,
                            "flagStart" => (int) $request->flag_start,
                            "flagLong" => (int) $request->flag_long,
                            "machineCodeStart" => (int) $request->machine_code_start,
                            "machineCodeLong" => (int) $request->machine_code_long,
                            "shiftStart" => (int) $request->shift_start,
                            "shiftLong" => (int) $request->shift_long,
                            "codeInOutStart" => (int) $request->in_out_code_start,
                            "codeInOutLong" => (int) $request->in_out_code_long,
                            "timeInRecord" => $request->radiobtn1,
                            "timeOutRecord" => $request->radiobtn2,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionID' => 0,
                            'userID' => Session::get('userID'), 
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }

            else {
                $response = $client->put(env('API_URL') . '/referencetimerecord',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            "inCode" => $request->in_code,
                            "outCode" => $request->out_code,
                            "employeeNoStart" => (int) $request->employee_no_start,
                            "employeeNoLong" => (int) $request->employee_no_long,
                            "yearStart" => (int) $request->year_start,
                            "yearLong" => (int) $request->year_long,
                            "monthStart" => (int) $request->month_start,
                            "monthLong" => (int) $request->month_long,
                            "dateStart" => (int) $request->day_start,
                            "dateLong" => (int) $request->day_long,
                            "hourStart" => (int) $request->hour_start,
                            "hourLong" => (int) $request->hour_long,
                            "minuteStart" => (int) $request->minute_start,
                            "minuteLong" => (int) $request->minute_long,
                            "flagStart" => (int) $request->flag_start,
                            "flagLong" => (int) $request->flag_long,
                            "machineCodeStart" => (int) $request->machine_code_start,
                            "machineCodeLong" => (int) $request->machine_code_long,
                            "shiftStart" => (int) $request->shift_start,
                            "shiftLong" => (int) $request->shift_long,
                            "codeInOutStart" => (int) $request->in_out_code_start,
                            "codeInOutLong" => (int) $request->in_out_code_long,
                            "timeInRecord" => $request->radiobtn1,
                            "timeOutRecord" => $request->radiobtn2,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionID' => 0,
                            'userID' => Session::get('userID'), 
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesShiftMasterCodeTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
        
            $param = [
                'recordStatus' => $request->record_status,
                'companyCode' => Session::get('companyCode'),
                'shiftCode' => $request->shift_code,
                'shiftName' => $request->description,
                'groupShift' => $request->group_shift,
                'flexyFlag' => isset($request->check_flexy) ? (bool) $request->check_flexy : false,
                'flexyTime' => isset($request->flexy_work_hour) ? '1753-01-01T'.$request->flexy_work_hour : null,
                'flexyOvtAfter' => isset($request->flexy_overtime_after) ? '1753-01-01T'.$request->flexy_overtime_after : null,
                'toleranceInFrom' => isset($request->tolerance_in_from) ? '1753-01-01T'.$request->tolerance_in_from : null,
                'toleranceInTo' => isset($request->tolerance_in_to) ? '1753-01-01T'.$request->tolerance_in_to : null,
                'toleranceOutFrom' => isset($request->tolerance_out_from) ? '1753-01-01T'.$request->tolerance_out_from : null,
                'toleranceOutTo' => isset($request->tolerance_out_to) ? '1753-01-01T'.$request->tolerance_out_to : null,
                'normalTimeIn' => isset($request->th_monday_thursday_in) ? '1753-01-01T'.$request->th_monday_thursday_in : null,
                'normalTimeOut' => isset($request->th_monday_thursday_out) ? '1753-01-01T'.$request->th_monday_thursday_out : null,
                'normalBreakTime' => isset($request->th_monday_thursday_break) ? '1753-01-01T'.$request->th_monday_thursday_break : null,
                'normalBuiltInOvt' => isset($request->th_monday_thursday_bot) ? '1753-01-01T'.$request->th_monday_thursday_bot : null,
                'fridayTimeIn' => isset($request->th_friday_in) ? '1753-01-01T'.$request->th_friday_in : null,
                'fridayTimeOut' => isset($request->th_friday_out) ? '1753-01-01T'.$request->th_friday_out : null,
                'fridayBreakTime' => isset($request->th_friday_break) ? '1753-01-01T'.$request->th_friday_break : null,
                'fridayBuiltInOvt' => isset($request->th_friday_bot) ? '1753-01-01T'.$request->th_friday_bot : null,
                'saturdayTimeIn' => isset($request->th_saturday_in) ? '1753-01-01T'.$request->th_saturday_in : null,
                'saturdayTimeOut' => isset($request->th_saturday_out) ? '1753-01-01T'.$request->th_saturday_out : null,
                'saturdayBreakTime' => isset($request->th_saturday_break) ? '1753-01-01T'.$request->th_saturday_break : null,
                'saturdayBuiltInOvt' => isset($request->th_saturday_bot) ? '1753-01-01T'.$request->th_saturday_bot : null,
                'overtimeMeal' => isset($request->overtime_meal) ? '1753-01-01T'.$request->overtime_meal : null,
                'normalOvtBefore' => isset($request->oh_monday_thursday_before) ? '1753-01-01T'.$request->oh_monday_thursday_before : null,
                'normalMaxOvtBefore' => isset($request->oh_monday_thursday_before_max) ? '1753-01-01T'.$request->oh_monday_thursday_before_max : null,
                'normalOvtAfter' => isset($request->oh_monday_thursday_after) ? '1753-01-01T'.$request->oh_monday_thursday_after : null,
                'normalMaxOvtAfter' => isset($request->oh_monday_thursday_after_max) ? '1753-01-01T'.$request->oh_monday_thursday_after_max : null,
                'fridayOvtBefore' => isset($request->oh_friday_before) ? '1753-01-01T'.$request->oh_friday_before : null,
                'fridayMaxOvtBefore' => isset($request->oh_friday_before_max) ? '1753-01-01T'.$request->oh_friday_before_max : null,
                'fridayOvtAfter' => isset($request->oh_friday_after) ? '1753-01-01T'.$request->oh_friday_after : null,
                'fridayMaxOvtAfter' => isset($request->oh_friday_after_max) ? '1753-01-01T'.$request->oh_friday_after_max : null,
                'saturdayOvtBefore' => isset($request->oh_saturday_before) ? '1753-01-01T'.$request->oh_saturday_before : null,
                'saturdayMaxOvtBefore' => isset($request->oh_saturday_before_max) ? '1753-01-01T'.$request->oh_saturday_before_max : null,
                'saturdayOvtAfter' => isset($request->oh_saturday_after) ? '1753-01-01T'.$request->oh_saturday_after : null,
                'saturdayMaxOvtAfter' => isset($request->oh_saturday_after_max) ? '1753-01-01T'.$request->oh_saturday_after_max : null,
                'normalShiftAllowFlag' => $request->sa_monday_thursday_option,
                'normalAllowance' => (float) $request->sa_monday_thursday,
                'fridayShiftAllowFlag' => $request->sa_friday_option,
                'fridayAllowance' => (float) $request->sa_friday,
                'saturdayShiftAllowFlag' => $request->sa_saturday_option,
                'saturdayAllowance' => (float) $request->sa_saturday,
                'factorNormalHour1' => (float) $request->omt_monday_thursday_hour1,
                'factorNormal1' => (float) $request->omt_monday_thursday_hour1_factorx,
                'factorNormalHour2' => (float) $request->omt_monday_thursday_hour2,
                'factorNormal2' => (float) $request->omt_monday_thursday_hour2_factorx,
                'factorNormal3' => (float) $request->omt_monday_thursday_and_on_factorx,
                'factorFridayHour1' => (float) $request->omt_friday_hour1,
                'factorFriday1' => (float) $request->omt_friday_hour1_factorx,
                'factorFridayHour2' => (float) $request->omt_friday_hour2,
                'factorFriday2' => (float) $request->omt_friday_hour2_factorx,
                'factorFriday3' => (float) $request->omt_friday_and_on_factorx,
                'factorSaturdayHour1' => (float) $request->omt_saturday_hour1,
                'factorSaturday1' => (float) $request->omt_saturday_hour1_factorx,
                'factorSaturdayHour2' => (float) $request->omt_saturday_hour2,
                'factorSaturday2' => (float) $request->omt_saturday_hour2_factorx,
                'factorSaturday3' => (float) $request->omt_saturday_and_on_factorx,
                'factorSundayHour1' => (float) $request->omt_sunday_hour1,
                'factorSunday1' => (float) $request->omt_sunday_hour1_factorx,
                'factorSundayHour2' => (float) $request->omt_sunday_hour2,
                'factorSunday2' => (float) $request->omt_sunday_hour2_factorx,
                'factorSunday3' => (float) $request->omt_sunday_and_on_factorx,
                'factorHolidayHour1' => (float) $request->omt_holiday_hour1,
                'factorHoliday1' => (float) $request->omt_holiday_hour1_factorx,
                'factorHolidayHour2' => (float) $request->omt_holiday_hour2,
                'factorHoliday2' => (float) $request->omt_holiday_hour2_factorx,
                'factorHoliday3' => (float) $request->omt_holiday_and_on_factorx,
                'factorHolidaySaturdayHour1' => (float) $request->omt_holiday_on_saturday_hour1,
                'factorHolidaySaturday1' => (float) $request->omt_holiday_on_saturday_hour1_factorx,
                'factorHolidaySaturdayHour2' => (float) $request->omt_holiday_on_saturday_hour2,
                'factorHolidaySaturday2' => (float) $request->omt_holiday_on_saturday_hour2_factorx,
                'factorHolidaySaturday3' => (float) $request->omt_holiday_on_saturday_and_on_factorx,
                "changedNo" => 0,
                "createdDate" => date("Y-m-d\TH:i:s"),
                "createdBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "changedBy" => Session::get('userID'),
                "languageCode" => App::getLocale(),
                'sessionID' => 0,
                'userID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName'),
                'logActionUserID' => Session::get('userID')
            ];

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/tmshiftcode',
                    ['body' => json_encode($param)]

                );
                $arrResult = json_decode($response->getBody()->getContents());

                return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);

            }else{
                $response = $client->put(env('API_URL') . '/tmshiftcode',
                    ['body' => json_encode($param)]
                );
                $arrResult = json_decode($response->getBody()->getContents());

                return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);

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

    }

    public function prosesTimeRecordingProcessFormTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->hasFile('file_location')) {
                $file = $request->file('file_location');
                $filename = rand().$file->getClientOriginalName();
                $file->move('file_excel', $filename);
                $path = public_path('file_excel\\');

                $response = $client->post(env('API_URL') . '/tempabsentmachine/inserttempabsentmachine',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'fileLocation' =>  $path . '' . $filename,
                            'automaticInOut' => isset($request->automatic) ? (bool) $request->automatic : false,
                            'file64' => ($request->hasFile('file_location')) ? base64_encode(file_get_contents($path . $filename)) : '',
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            "languageCode" => App::getLocale(),
                            'sessionID' => 0,
                            'sessionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            'logActionUserID' => Session::get('userID')
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

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesTemplatePreparationTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/tmabsentemployee/createtemplate',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'newEmployee' =>  isset($request->radiobtn) ? $request->radiobtn : '',
                        'range' => isset($request->radiobtn) ? $request->radiobtn : '',
                        'employeeNoFrom' => isset($request->employee_no_from) ? $request->employee_no_from : '',
                        'employeeNoTo' => isset($request->employee_no_to) ? $request->employee_no_to : '',
                        'periodMonth' => $request->processing_period,
                        'periodYear' => $request->period_year,
                        "languageCode" => App::getLocale(),
                        'sessionID' => 0,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
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

    public function prosesReferenceTimeManagementTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump(json_encode(
            //     [
            //         'companyCode' => Session::get('companyCode'),
            //         'periodMonth' => (int) $request->processing_period_month,
            //         'periodYear' => (int) $request->processing_period_year,
            //         'statusProcess' => $request->process_status,
            //         'statusPeriod' => $request->period_status,
            //         'templatePreparation' => $request->template_preparation_process,
            //         'calculateLateHour' => $request->late_hour,
            //         'calculateEarlyBackHour' => $request->early_back_hour,
            //         'calculateOvertime' => $request->default_calculation,
            //         'ovtBeforeHourFrom' => $request->overtime_before_from,
            //         'ovtAfterHourFrom' => $request->overtime_after_from,
            //         'ovtRoundedFrom' => date("Y-m-d") . "T00:" . sprintf("%02d", $request->minute_rounded_from) . ":00",
            //         'ovtRoundedTo' => date("Y-m-d") . "T00:" . sprintf("%02d", $request->minute_rounded_to) . ":00",
            //         'ovtRoundedBecome' => date("Y-m-d") . "T00:" . sprintf("%02d", $request->minute_rounded_become) . ":00",
            //         'overtimeCode' => $request->overtime,
            //         'absentCode' => $request->absent,
            //         'unpaidLeaveCode' => $request->unpaid_leave,
            //         'lateCode' => $request->late,
            //         'earlybackCode' => $request->early_back,
            //         'lateEarlybackCode' => $request->late_early_back,
            //         'noTimeInCode' => $request->not_clock_in,
            //         'noTimeOutCode' => $request->not_clock_out,
            //         'noTimeInEarlybackCode' => $request->not_clock_in_early_back,
            //         'lateNoTimeOutCode' => $request->not_clock_out_late,
            //         "changedNo" => 0,
            //         "createdDate" => date("Y-m-d\TH:i:s"),
            //         "createdBy" => Session::get('userID'),
            //         "changedDate" => date("Y-m-d\TH:i:s"),
            //         "changedBy" => Session::get('userID'),  
            //         "languageCode" => App::getLocale(),
            //         'sessionID' => 0,
            //         'userID' => Session::get('userID'),
            //         'logActionUserID' => Session::get('userID'),
            //         'logActionUsername' => Session::get('userName'),
            //     ]
            //     ));

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/referencetm',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'periodMonth' => (int) $request->processing_period_month,
                            'periodYear' => (int) $request->processing_period_year,
                            'statusProcess' => $request->process_status,
                            'statusPeriod' => $request->period_status,
                            'templatePreparation' => $request->template_preparation_process,
                            'calculateLateHour' => $request->late_hour,
                            'calculateEarlyBackHour' => $request->early_back_hour,
                            'calculateOvertime' => $request->default_calculation,
                            'ovtBeforeHourFrom' => $request->overtime_before_from,
                            'ovtAfterHourFrom' => $request->overtime_after_from,
                            'ovtRoundedFrom' => date("Y-m-d") . "T00:" . sprintf("%02d", $request->minute_rounded_from) . ":00",
                            'ovtRoundedTo' => date("Y-m-d") . "T00:" . sprintf("%02d", $request->minute_rounded_to) . ":00",
                            'ovtRoundedBecome' => date("Y-m-d") . "T00:" . sprintf("%02d", $request->minute_rounded_become) . ":00",
                            'overtimeCode' => $request->overtime,
                            'absentCode' => $request->absent,
                            'unpaidLeaveCode' => $request->unpaid_leave,
                            'lateCode' => $request->late,
                            'earlybackCode' => $request->early_back,
                            'lateEarlybackCode' => $request->late_early_back,
                            'noTimeInCode' => $request->not_clock_in,
                            'noTimeOutCode' => $request->not_clock_out,
                            'noTimeInEarlybackCode' => $request->not_clock_in_early_back,
                            'lateNoTimeOutCode' => $request->not_clock_out_late,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),  
                            "languageCode" => App::getLocale(),
                            'sessionID' => 0,
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/referencetm',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'periodMonth' => (int) $request->processing_period_month,
                            'periodYear' => (int) $request->processing_period_year,
                            'statusProcess' => $request->process_status,
                            'statusPeriod' => $request->period_status,
                            'templatePreparation' => $request->template_preparation_process,
                            'calculateLateHour' => $request->late_hour,
                            'calculateEarlyBackHour' => $request->early_back_hour,
                            'calculateOvertime' => $request->default_calculation,
                            'ovtBeforeHourFrom' => $request->overtime_before_from,
                            'ovtAfterHourFrom' => $request->overtime_after_from,
                            'ovtRoundedFrom' => date("Y-m-d") . "T00:" . sprintf("%02d", $request->minute_rounded_from) . ":00",
                            'ovtRoundedTo' => date("Y-m-d") . "T00:" . sprintf("%02d", $request->minute_rounded_to) . ":00",
                            'ovtRoundedBecome' => date("Y-m-d") . "T00:" . sprintf("%02d", $request->minute_rounded_become) . ":00",
                            'overtimeCode' => $request->overtime,
                            'absentCode' => $request->absent,
                            'unpaidLeaveCode' => $request->unpaid_leave,
                            'lateCode' => $request->late,
                            'earlybackCode' => $request->early_back,
                            'lateEarlybackCode' => $request->late_early_back,
                            'noTimeInCode' => $request->not_clock_in,
                            'noTimeOutCode' => $request->not_clock_out,
                            'noTimeInEarlybackCode' => $request->not_clock_in_early_back,
                            'lateNoTimeOutCode' => $request->not_clock_out_late,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),  
                            "languageCode" => App::getLocale(),
                            'sessionID' => 0,
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            var_dump($response);
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

    public function prosesReferenceTimeManagementDetailTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/referencetm/insertdetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'deductOvtDay' => $request->deduct_day,
                        'deductFrom1' => date("Y-m-d") . "T" . $request->deduction1_from,
                        'deductTo1' => date("Y-m-d") . "T" . $request->deduction1_to,
                        'deductHour1' => date("Y-m-d") . "T" . $request->deduction1_deduct,
                        'deductFrom2' => date("Y-m-d") . "T" . $request->deduction2_from,
                        'deductTo2' => date("Y-m-d") . "T" . $request->deduction2_to,
                        'deductHour2' => date("Y-m-d") . "T" . $request->deduction2_deduct,
                        'deductEvery3' => date("Y-m-d") . "T" . $request->deduction3_every,
                        'deductHour3' => date("Y-m-d") . "T" . $request->deduction3_deduct,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),  
                        "languageCode" => App::getLocale(),
                        'sessionID' => 0,
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
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

    public function checkAppTM(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/user/getuserdetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
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

        if($arrResult->dataListSet == null){
            return response()->json([]);
        }else{
            return response()->json($arrResult->dataListSet);
        }
    }

    public function statusOvertimeSPLTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            $param = [];

            foreach($request->id_overtime_spl as $value){
                if(!empty($request->selected_overtime_spl_table) && isset($request->selected_overtime_spl_table[$value])){
                    $param = [ 
                        'companyCode' => Session::get('companyCode'), 
                        'employeeNo' => $request->employee_no_overtime_spl[$value],
                        'ovtDate' => $request->ovt_date_overtime_spl[$value],
                        'seqNo' => (int) $request->seq_no_overtime_spl[$value],
                        'hrdApprove' => isset($request->check_app_hrd[$value]) ? (bool) $request->check_app_hrd[$value] : false,
                        'leadApprove' => isset($request->check_app_leader[$value]) ? (bool) $request->check_app_leader[$value] : false,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        'languageCode' => App::getLocale(), 
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]; 
                }
            }

            $response = $client->put(env('API_URL') . '/tmovtspl/updatetmovtspl',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
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

    public function statusWorkPatternTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/tmworkpattern',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'patternCode' => $request->patternCode,
                        'description' => $request->description,
                        'holidayFlag' => (bool) $request->holidayFlag,
                        'noOfDay' => (int) $request->noOfDay,
                        'changedNo' => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionID' => 0,
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }
    
    public function statusAbsentCodeTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/tmabsentcode',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'absentCode' => $request->absentCode,
                        'description' => $request->description,
                        'absentType' => $request->absentType,
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

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusShiftMasterCodeTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/tmshiftcode',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'shiftCode' => $request->shiftCode,
                        'sessionID' => 0,
                        'userID' => Session::get('userID'),
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

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function removeOvertimeSPLTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            $param = [];

            foreach($request->data as $key => $value){
                $param[] = [
                    'companyCode' => $value['companyCode'],
                    'employeeNo' => $value['employeeNo'],
                    'ovtDate' => $value['ovtDate'],
                    'seqNo' => (int) $value['seqNo'],
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    'languageCode' => App::getLocale()
                ];
            }

            $response = $client->delete(env('API_URL') . '/tmovtspl/deletetmovtspl',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
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

    public function removePeriodMaintenanceTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            $param = [];

            foreach($request->data as $key => $value){
                $param[] = [
                    'companyCode' => $value['companyCode'],
                    'periodYear' => (int) $value['periodYear'],
                    'periodMonth' => (int) $value['periodMonth'],
                    'period' => (int) $value['period'],
                    'absenteeismStart' => $value['absenteeismStart'],
                    'absenteeismEnd' => $value['absenteeismEnd'],
                    'overtimeStart' => $value['overtimeStart'],
                    'overtimeEnd' => $value['overtimeEnd'],
                    'salaryStart' => $value['salaryStart'],
                    'salaryEnd' => $value['salaryEnd'],
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    'languageCode' => App::getLocale()
                ];
            }

            $response = $client->delete(env('API_URL') . '/tmperiod',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
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

    public function removeTimeRecordingProcessFormTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/tempabsentmachine/deletetempabsentmachine',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'deleteDateFrom' => $request->delete_date_from,
                        'deleteDateTo' => $request->delete_date_to,
                        'employeeNoFrom' => $request->employee_no_from,
                        'employeeNoTo' => $request->employee_no_to,
                        "languageCode" => App::getLocale(),
                        'sessionID' => 0,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
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

    public function removeCompanyWorkingCalendar(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            $param = [];

            foreach($request->data as $key => $value){
                $param[] = [
                    'companyCode' => $value['companyCode'],
                    'calendar' => $value['calendar'],
                    'description' => $value['description'],
                    'flagType' => $value['flagType'],
                    'locationCode' => $value['locationCode'],
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    'languageCode' => App::getLocale()
                ];
            }

            $response = $client->delete(env('API_URL') . '/tmcalendar',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
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

    public function removeReferenceTimeManagementDetail(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            $param = [];

            foreach($request->data as $key => $value){
                $param[] = [
                    'companyCode' => $value['companyCode'],
                    'deductOvtDay' => $value['deductOvtDay'],
                    'description' => $value['description'],
                    'sessionID' => 0,
                    'userID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    'languageCode' => App::getLocale()
                ];
            }

            $response = $client->delete(env('API_URL') . '/referencetm/removedetail',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
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
}
