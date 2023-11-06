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

class SeveranceReportExcel implements FromView, ShouldAutoSize
{
    public function __construct($paymentDateFrom, $paymentDateTo, $employeeNoFrom, $employeeNoTo, $groupAuthorizedFrom, $groupAuthorizedTo)
    {
        $this->paymentDateFrom = $paymentDateFrom;
        $this->paymentDateTo = $paymentDateTo;
        $this->employeeNoFrom = $employeeNoFrom;
        $this->employeeNoTo = $employeeNoTo;
        $this->groupAuthorizedFrom = $groupAuthorizedFrom;
        $this->groupAuthorizedTo = $groupAuthorizedTo;
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
                'languageCode' => App::getLocale(), 
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID')
            ];

            
            $paramGetCompany = [
                'companyCode' => Session::get('companyCode'),
                'languageID' =>App::getLocale(),
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID')
            ];

            if(!empty($this->paymentDateFrom) || !empty($this->paymentDateTo)){
                $param['paymentdateFrom'] = $this->paymentDateFrom;
                $param['paymentDateTo'] = $this->paymentDateTo;
            }

            if(!empty($this->employeeNoFrom) || !empty($this->employeeNoTo)){
                $param['employeeNoFrom'] = $this->employeeNoFrom;
                $param['employeeNoTo'] = $this->employeeNoTo;
            }

            if(!empty($this->groupAuthorizedFrom) || !empty($this->groupAuthorizedTo)){
                $param['groupAuthorizedCodeFrom'] = intval($this->groupAuthorizedFrom);
                $param['groupAuthorizedCodeTo'] = intval($this->groupAuthorizedTo);
            }

            // var_dump(json_encode($param));

            $response = $client->post(env('API_URL') . '/PrSeveranceSlipReport/getSeveranceReport',
                ['body' => json_encode($param)]
            );

            $responseGetCompany = $client->post(env('API_URL').'/personel/Company/getcompany', [
                'body' => json_encode($paramGetCompany)
            ]);

        } catch (RequestException $e) {
            $response = $e->getResponse();
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
        // var_dump($arrResult->dataListSet[0]);
        
        $arraySend[] = $arrCompany->dataListSet[0];

        // var_dump($arraySend);

        if($arrResult->dataListSet == null){
            return view('payroll.py_export_severance_report_excel', [
                'data' => []
            ]);
        }else{
            $arraySend[] = $arrResult->dataListSet[0];
            
            return view('payroll.py_export_severance_report_excel', [
                'data' => [$arraySend]
            ]); 
        }
    }
}