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

class BonusTHRReportExport implements FromView, ShouldAutoSize
{
    public function __construct($report, $paymentDateFrom, $paymentDateTo, $employeeNoFrom, $employeeNoTo, $groupAuthorizedCodeFrom, $groupAuthorizedCodeTo)
    {
        $this->report = $report;
        $this->paymentDateFrom = $paymentDateFrom;
        $this->paymentDateTo = $paymentDateTo;
        $this->employeeNoFrom = $employeeNoFrom;
        $this->employeeNoTo = $employeeNoTo;
        $this->groupAuthorizedCodeFrom = $groupAuthorizedCodeFrom;
        $this->groupAuthorizedCodeTo = $groupAuthorizedCodeTo;
        
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
                "reportType" => $this->report,
                "languageCode" => App::getLocale(),
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
    
            if(!empty($this->groupAuthorizedCodeFrom) || !empty($this->groupAuthorizedCodeTo)){
                $param['groupAuthorizedCodeFrom'] = (int) $this->groupAuthorizedCodeFrom;
                $param['groupAuthorizedCodeTo'] = (int) $this->groupAuthorizedCodeTo;
            }

            if(!empty($this->paymentDateFrom) || !empty($this->paymentDateTo)){
                $param['paymentDateFrom'] = $this->paymentDateFrom;
                $param['paymentDateTo'] = $this->paymentDateTo;
            }

            $response = $client->post(env('API_URL').'/payroll/PrBonusTHRReport/ASDP/v1/getBonusTHRReport', [
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

        if ($arrResult->dataListSet !== null && $arrCompany->dataListSet !== null)
        {
            $arraySend[] = $arrCompany->dataListSet[0];
            $arraySend[] = $arrResult->dataListSet[0];
        } else {
            $arraySend[] = [];
        }

        // var_dump($arraySend);
        return view('payroll.py_export_bonus_thr_excel', [
            'data' => $arraySend
        ]);
    }
}