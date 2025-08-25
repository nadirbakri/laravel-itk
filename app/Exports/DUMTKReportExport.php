<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\ShouldQueue;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class DUMTKReportExport implements FromView, ShouldAutoSize, ShouldQueue
{
    public function __construct($asOfPeriod, $employeeNoFrom, $employeeNoTo, $groupAuthorizedCodeFrom, $groupAuthorizedCodeTo, $BPJSGroupFrom, $BPJSGroupTo)
    {
        $this->asOfPeriod = $asOfPeriod;
        $this->employeeNoFrom = $employeeNoFrom;
        $this->employeeNoTo = $employeeNoTo;
        $this->groupAuthorizedCodeFrom = $groupAuthorizedCodeFrom;
        $this->groupAuthorizedCodeTo = $groupAuthorizedCodeTo;
        $this->BPJSGroupFrom = $BPJSGroupFrom;
        $this->BPJSGroupTo = $BPJSGroupTo;
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
                "asOfPeriod" => $this->asOfPeriod,
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
                $param['groupAuthorizedCodeFrom'] = $this->groupAuthorizedCodeFrom;
                $param['groupAuthorizedCodeTo'] = $this->groupAuthorizedCodeTo;
            }

            if(!empty($this->BPJSGroupFrom) || !empty($this->BPJSGroupTo)){
                $param['bpjsGroupFrom'] = $this->BPJSGroupFrom;
                $param['bpjsGroupTo'] = $this->BPJSGroupTo;
            }

            $response = $client->post(env('API_URL').'/dumtkreport/getdumtkreport', [
                'body' => json_encode($param)
            ]);

            $responseGetCompany = $client->post(env('API_URL').'/company/getcompany', [
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

        if ($arrResult->dataListSet[0] !== null || $arrCompany->dataListSet[0] !== null)
        {
            $arraySend[] = $arrCompany->dataListSet[0];
            $arraySend[] = $arrResult->dataListSet[0];
        } else {
            $arraySend[] = [];
        }

        $paramSend[] = (object) $param;

        if($arrResult->dataListSet[0] == null){
            return view('payroll.py_export_dumtk_excel', [
                'data' => []
            ]);
        }else{
            return view('payroll.py_export_dumtk_excel', [
                'data' => $arraySend, 'data2' => $paramSend
            ]); 
        }
    }
}