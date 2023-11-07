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
    public function __construct($employeeNoFrom, $employeeNoTo, $loanTypeFrom, $loanTypeTo, $reportType, $loanTypeOne, $loanTypeTwo, $loanTypeThree, $includeResign, $groupAuthorizedCodeFrom, $groupAuthorizedCodeTo, $position, $ranking, $location, $dataLevel)
    {
        $this->employeeNoFrom = $employeeNoFrom;
        $this->employeeNoTo = $employeeNoTo;
        $this->loanTypeFrom = $loanTypeFrom;
        $this->loanTypeTo = $loanTypeTo;
        $this->reportType = $reportType;
        $this->loanTypeOne = $loanTypeOne;
        $this->loanTypeTwo = $loanTypeTwo;
        $this->loanTypeThree = $loanTypeThree;
        $this->includeResign = $includeResign;
        $this->groupAuthorizedCodeFrom = $groupAuthorizedCodeFrom;
        $this->groupAuthorizedCodeTo = $groupAuthorizedCodeTo;
        $this->position = $position;
        $this->ranking = $ranking;
        $this->location = $location;
        $this->dataLevel = $dataLevel;
    }

    public function view(): View
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                "reportType" => $this->reportType,
                "loanType1" => $this->loanTypeOne, 
                "loanType2" => $this->loanTypeTwo, 
                "loanType3" => $this->loanTypeThree,
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

            if(!empty($this->employeeNoFrom) || !empty($this->employeeNoTo)){
                $param['employeeNoFrom'] = $this->employeeNoFrom;
                $param['employeeNoTo'] = $this->employeeNoTo;
            }

            if(!empty($this->loanTypeFrom) || !empty($this->loanTypeTo)){
                $param['loanTypeFrom'] = $this->loanTypeFrom;
                $param['loanTypeTo'] = $this->loanTypeTo;
            }

            if(!empty($this->groupAuthorizedCodeFrom) || !empty($this->groupAuthorizedCodeTo)){
                $param['groupAuthorizeCodeFrom'] = $this->groupAuthorizedCodeFrom;
                $param['groupAuthorizeCodeTo'] = $this->groupAuthorizedCodeTo;
            }

            if(!empty($this->position) && !is_null($this->position[0])){
                foreach($this->position as $value){
                    $data_position[] = $value;
                }
                $param['position'] = $data_position;
            }

            if(!empty($this->location) && !is_null($this->location[0])){
                foreach($this->location as $value){
                    $data_location[] = $value;
                }
                $param['location'] = $data_location;
            }

            if(!empty($this->ranking) && !is_null($this->ranking[0])){
                foreach($this->ranking as $value){
                    $data_ranking[] = $value;
                }
                $param['ranking'] = $data_ranking;
            }

            if(!empty($this->dataLevel) && !is_null($this->dataLevel[0])){
                foreach($this->dataLevel as $key => $value){
                    $data_level_detail = [];
                    foreach($this->dataLevel[$key] as $value2){
                        $data_level_detail[] = $value2;
                    }
                    $data_level[] = [
                        "levelType" => (string) ($key + 1),
                        "levelCode" => $data_level_detail
                    ];
                }
                $param['levelMaster'] = $data_level;
            }

            // var_dump(json_encode($param));

            $response = $client->post(env('API_URL').'/payroll/PrLoanReport/ASDP/v1/PrLoanReport', [
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
            if($this->reportType == "L"){
                return view('payroll.py_export_loan_report_loan_report_excel', [
                    'data' => [], 'data_company' => $arrCompany->dataListSet
                ]);
            }else if($this->reportType == "P"){
                return view('payroll.py_export_loan_report_loan_payment_excel', [
                    'data' => [], 'data_company' => $arrCompany->dataListSet
                ]);
            }else if($this->reportType == "D"){
                return view('payroll.py_export_loan_report_detail_report_excel', [
                    'data' => [], 'data_company' => $arrCompany->dataListSet
                ]);
            }else if($this->reportType == "C"){
                return view('payroll.py_export_loan_report_loan_schedule_excel', [
                    'data' => [], 'data_company' => $arrCompany->dataListSet
                ]);
            }else if($this->reportType == "S"){
                return view('payroll.py_export_loan_report_summary_report_excel', [
                    'data' => [], 'data_company' => $arrCompany->dataListSet, 
                    'loanDesc1' => $this->loanTypeOne, 'loanDesc2' => $this->loanTypeTwo, 'loanDesc3' => $this->loanTypeThree
                ]);
            }
        }else{
            if($this->reportType == "L"){
                return view('payroll.py_export_loan_report_loan_report_excel', [
                    'data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet
                ]);
            }else if($this->reportType == "P"){
                return view('payroll.py_export_loan_report_loan_payment_excel', [
                    'data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet
                ]);
            }else if($this->reportType == "D"){
                return view('payroll.py_export_loan_report_detail_report_excel', [
                    'data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet
                ]);
            }else if($this->reportType == "C"){
                return view('payroll.py_export_loan_report_loan_schedule_excel', [
                    'data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet
                ]);
            }else if($this->reportType == "S"){
                return view('payroll.py_export_loan_report_summary_report_excel', [
                    'data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet,
                    'loanDesc1' => $this->loanTypeOne, 'loanDesc2' => $this->loanTypeTwo, 'loanDesc3' => $this->loanTypeThree
                ]);
            }
        }
    }
}
