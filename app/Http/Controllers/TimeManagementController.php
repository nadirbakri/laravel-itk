<?php

namespace App\Http\Controllers;

use App\Exports\UnpaidLeaveReportExport;
use App\Exports\PostponeLeaveReportExport;
use App\Exports\MonthlyLeaveReportExport;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;
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
        return view ('time_management.tm_process_form');
    }

    public function pageUpdateAbsenteeismData()
    {
        return view ('time_management.tm_update_absenteeism_data');
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

    public function pagePeriodMaintenance()
    {
        return view ('time_management.tm_period_maintenance');
    }

    public function pageWorkPattern()
    {
        return view ('time_management.tm_work_pattern');
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
        return view ('time_management.tm_detail_absenteeism_report');
    }

    public function pageAbsenteeismOvertimeReport()
    {
        return view ('time_management.tm_absenteeism_overtime_report');
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
            var_dump($e->getResponse());
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }

        // var_dump($arrResult);
    }

    public function tableOvertimeSPL(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump($request->dateFrom);

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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }

        // var_dump($arrResult->dataListSet);
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
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
            var_dump($e->getResponse());
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
            var_dump($e->getResponse());
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  
        // var_dump($arrResult->dataListSet);
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
            var_dump($e->getResponse());
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

            $response = $client->post(env('API_URL') . '/balanceleave/getbalanceleave',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return response()->json($data);
    }

    public function dataDetailPeriodMaintenanceTM () 
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
            var_dump($e->getResponse());
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return view('time_management.tm_work_pattern_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function printUnpaidLeaveReport(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        // var_dump($request->period);

        return Excel::download(new UnpaidLeaveReportExport($request->employee_no_from, $request->employee_no_to, $request->period, isset($request->include_resign) ? (bool) $request->include_resign : false, $request->group_authorize_from, $request->group_authorize_to, $request->position, $request->ranking, $request->location, $dataLevel), 'Unpaid Leave Report.xlsx');
    }

    public function printPostponeLeaveReport(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        // var_dump($request->period);

        return Excel::download(new PostponeLeaveReportExport($request->employee_no_from, $request->employee_no_to, $request->period, isset($request->include_resign) ? (bool) $request->include_resign : false, $request->group_authorize_from, $request->group_authorize_to, $request->position, $request->ranking, $request->location, $dataLevel), 'Postpone Leave Report.xlsx');
    }
    
    public function printMonthlyLeaveReport(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        // var_dump($request->period);

        return Excel::download(new MonthlyLeaveReportExport($request->employee_no_from, $request->employee_no_to, $request->period, isset($request->have_balance_only) ? (bool) $request->have_balance_only : false, isset($request->include_resign) ? (bool) $request->include_resign : false, $request->group_authorize_from, $request->group_authorize_to, $request->position, $request->ranking, $request->location, $dataLevel), 'Monthly Leave Report.xlsx');
    }

    public function printMonthlyAbsenteeismAnalysis(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        // var_dump($request->period);

        return Excel::download(new MonthlyAbsenteeismAnalysisExport($request->employee_no_from, $request->employee_no_to, $request->period, isset($request->include_resign) ? (bool) $request->include_resign : false, $request->group_authorize_from, $request->group_authorize_to, $request->position, $request->ranking, $request->location, $dataLevel), 'Monthly Absenteeism Analysis.xlsx');
    }

    public function printDetailAbsenteeismReport(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        // var_dump($request->period);

        return Excel::download(new DetailAbsenteeismReportExport($request->employee_no_from, $request->employee_no_to, $request->period, isset($request->include_resign) ? (bool) $request->include_resign : false, $request->group_authorize_from, $request->group_authorize_to, $request->position, $request->ranking, $request->location, $dataLevel), 'Monthly Absenteeism Analysis.xlsx');
    }

    public function printMonthlyAbsenteeismDetail(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        // var_dump($request->period);

        return Excel::download(new MonthlyAbsenteeismDetailExport($request->employee_no_from, $request->employee_no_to, $request->period, isset($request->include_resign) ? (bool) $request->include_resign : false, $request->group_authorize_from, $request->group_authorize_to, $request->position, $request->ranking, $request->location, $dataLevel), 'Monthly Absenteeism Analysis.xlsx');
    }

    public function printAbsenteeismOvertimeReport(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        // var_dump($request->period);

        return Excel::download(new AbsenteeismOvertimeReportExport($request->employee_no_from, $request->employee_no_to, $request->absent_date_from, $request->absent_date_to, $request->group_authorize_from, $request->group_authorize_to, $request->report_type, isset($request->include_resign) ? (bool) $request->include_resign : false, $request->position, $request->ranking, $request->location, $dataLevel), 'Absenteeism & Overtime Report.xlsx');
    }


    public function prosesUpdateShiftByDateTM(Request $request)
    {
        $dataLevel = [];

        // var_dump($request->level_format);

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

            // var_dump($param);

            $response = $client->put(env('API_URL') . '/tempabsentmachine/updateshiftbydate',
                ['body' => json_encode($param)]
            );

        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        // var_dump($arrResult->message);

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
        // return response()->json();
    }

    public function prosesInputBalanceLeaveTM(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            // var_dump($request->expired_date);
            // var_dump($request->employee_no);
            // var_dump($request->leave_name);
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
            var_dump($e->getResponse());
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

            // var_dump($request->date_overtime_spl . "T" . $request->start_overtime_spl);
            // var_dump($request->date_overtime_spl . "T" . $request->finish_overtime_spl);
            // var_dump($request->date_overtime_spl . "T" . $request->hour_overtime_spl);
            // var_dump($request->date_overtime_spl . "T" . $request->before_in);

            $response = $client->post(env('API_URL') . '/tmovtspl/inserttmovtspl',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employee_no,
                        "ovtDate" => $request->date_overtime_spl,
                        "shiftCode" => $request->shift_overtime_spl,
                        "ovtIn" => $request->date_overtime_spl . "T" . $request->start_overtime_spl,
                        "ovtOut" => $request->date_overtime_spl . "T" . $request->finish_overtime_spl,
                        "ovtHour" => $request->date_overtime_spl . "T" . $request->hour_overtime_spl,
                        "ovtConvert" => (int) $request->convert_overtime_spl,
                        "ovtBeforeIn" => $request->date_overtime_spl . "T" . $request->before_in,
                        "ovtCode" => $request->code_overtime_spl,
                        "ovtDescription" => $request->description,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        // var_dump($arrResult->message);

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
            // var_dump($request->calendar_date);
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
                $response = $client->put(env('API_URL') . '/position',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'positionCode' => $request->position_code,
                            'positionName' => $request->position_name,
                            'supervisorPositionCode' => $request->supervisor_position_code,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            var_dump($e->getResponse());
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
                'holidayFlag' => isset($request->work_on_holiday) ? (bool) $request->work_on_holiday : false,
                'no_of_day' => (int) $request->no_of_day,
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

            // var_dump($request->day_code[1]);
            foreach($request->seq_no as $value){
                $data_work_pattern_detail_list[] = [
                    'recordStatus' => $request->record_status,
                    'companyCode' => Session::get('companyCode'),
                    'patternCode' => $request->work_pattern_code,
                    'seqNo' => $value,
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
            $param['workWPatternDetailList'] = $data_work_pattern_detail_list;

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
            var_dump($e->getResponse());
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
            var_dump($e->getResponse());
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

            // var_dump($request->id_overtime_spl);

            foreach($request->id_overtime_spl as $key => $value){
                // var_dump()
                if(!empty($request->selected_overtime_spl_table) && isset($request->selected_overtime_spl_table[$value])){
                    $param = [ 
                        'companyCode' => Session::get('companyCode'), 
                        'employeeNo' => $request->employee_no_overtime_spl[$value],
                        'ovtDate' => $request->ovt_date_overtime_spl[$value],
                        'seqNo' => $request->seq_no_overtime_spl[$value],
                        'hrdApprove' => isset($request->check_app_leader[$value]) ? (bool) $request->check_app_leader[$value] : false,
                        'leadApprove' => isset($request->check_app_hrd[$value]) ? (bool) $request->check_app_hrd[$value] : false,
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
            var_dump($e->getResponse());
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
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }
}
