<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class LoanReportExport implements FromView, ShouldAutoSize
{
    public function __construct($employeeNoFrom, $employeeNoTo, $loanType, $reportType, $period, $includeResign, $groupAuthorizeCodeFrom, $groupAuthorizeCodeTo, $position, $ranking, $location, $dataLevel)
    {
        $this->employeeNoFrom = $employeeNoFrom;
        $this->employeeNoTo = $employeeNoTo;
        $this->loanType = $loanType;
        $this->reportType = $reportType;
        $this->period = $period;
        $this->includeResign = $includeResign;
        $this->groupAuthorizeCodeFrom = $groupAuthorizeCodeFrom;
        $this->groupAuthorizeCodeTo = $groupAuthorizeCodeTo;
        $this->position = $position;
        $this->ranking = $ranking;
        $this->location = $location;
        $this->dataLevel = $dataLevel;
    }

    public function view(): View
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                "employeeNoFrom" => $this->employeeNoFrom,
                "employeeNoTo" => $this->employeeNoTo,
                "reportType" => $this->reportType === 'OTH_SUM' ? 'DTL' : $this->reportType,
                "periodMonth" => (int) date('m', strtotime($this->period)),
                "periodYear" => (int) date('Y', strtotime($this->period)),
                "groupAuthorizeCodeFrom" => $this->groupAuthorizeCodeFrom,
                "groupAuthorizeCodeTo" => $this->groupAuthorizeCodeTo,
                "includeResign" => $this->includeResign,
                "languageID" => App::getLocale(),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userName'),
                "logActionUserID" => Session::get('userID')
            ];

            $paramGetCompany = [
                'companyCode' => Session::get('companyCode'),
                'languageID' =>App::getLocale(),
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID')
            ];

            if(!empty($this->loanType) && !is_null($this->loanType[0])){
                foreach($this->loanType as $value){
                    $data_loan_type[] = $value;
                }
                $param['loanTypeList'] = $data_loan_type;
            }

            if(!empty($this->position) && !is_null($this->position[0])){
                foreach($this->position as $value){
                    $data_position[] = [
                        'positionCode' => $value
                    ];
                }
                $param['position'] = $data_position;
            }

            if(!empty($this->location) && !is_null($this->location[0])){
                foreach($this->location as $value){
                    $data_location[] = [
                        'locationCode' => $value
                    ];
                }
                $param['location'] = $data_location;
            }

            if(!empty($this->ranking) && !is_null($this->ranking[0])){
                foreach($this->ranking as $value){
                    $data_ranking[] = [
                        'rankingCode' => $value
                    ];
                }
                $param['ranking'] = $data_ranking;
            }

            if(!empty($this->dataLevel) && !is_null($this->dataLevel[0])){
                $param['levelMaster'] = $this->dataLevel;
            }

            // dd(json_encode($param));

            $response = $client->post(env('API_URL').'/payroll/LoanReport', [
                'body' => json_encode($param)
            ]);

            $responseGetCompany = $client->post(env('API_URL').'/personel/Company/getcompany', [
                'body' => json_encode($paramGetCompany)
            ]);
        }catch (RequestException $e){
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());
        $arrCompany = json_decode($responseGetCompany->getBody()->getContents());

        // var_dump($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            if($this->reportType == "LOAN_RPT"){
                return view('payroll.py_export_loan_report_loan_report_excel', [
                    'data' => [], 'data_company' => $arrCompany->dataListSet
                ]);
            }else if($this->reportType == "PAY_RPT"){
                return view('payroll.py_export_loan_report_loan_payment_excel', [
                    'data' => [], 'data_company' => $arrCompany->dataListSet
                ]);
            }else if($this->reportType == "DTL"){
                return view('payroll.py_export_loan_report_detail_report_excel', [
                    'data' => [], 'data_company' => $arrCompany->dataListSet,
                    'period' => $this->period
                ]);
            }else if($this->reportType == "SCH"){
                return view('payroll.py_export_loan_report_loan_schedule_excel', [
                    'data' => [], 'data_company' => $arrCompany->dataListSet
                ]);
            }else if($this->reportType == "SUM"){
                return view('payroll.py_export_loan_report_summary_report_excel', [
                    'data' => [], 'data_company' => $arrCompany->dataListSet, 
                    'period' => $this->period
                ]);
            }
            else if($this->reportType == "OTH_SUM"){
                return view('payroll.py_export_loan_report_other_loan_summary_report_excel', [
                    'data' => [], 'data_company' => $arrCompany->dataListSet, 
                    'period' => $this->period
                ]);
            }
        }else{
            if($this->reportType == "LOAN_RPT"){
                return view('payroll.py_export_loan_report_loan_report_excel', [
                    'data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet
                ]);
            }else if($this->reportType == "PAY_RPT"){
                return view('payroll.py_export_loan_report_loan_payment_excel', [
                    'data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet
                ]);
            }else if($this->reportType == "DTL"){
                return view('payroll.py_export_loan_report_detail_report_excel', [
                    'data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet,
                    'period' => $this->period
                ]);
            }else if($this->reportType == "SCH"){
                return view('payroll.py_export_loan_report_loan_schedule_excel', [
                    'data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet
                ]);
            }else if($this->reportType == "SUM"){
                return view('payroll.py_export_loan_report_summary_report_excel', [
                    'data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet,
                    'period' => $this->period
                ]);
            }
            else if($this->reportType == "OTH_SUM"){
                return view('payroll.py_export_loan_report_other_loan_summary_report_excel', [
                    'data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet,
                    'period' => $this->period
                ]);
            }
        }
    }
}
