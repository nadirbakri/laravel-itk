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

class OutstandingClaimReportExport implements FromView, ShouldAutoSize
{
    public function __construct($employeeNoFrom, $employeeNoTo, $grandTotal, $insuranceCodeFrom, $insuranceCodeTo, $insuranceClassFrom, $insuranceClassTo, $claimCodeFrom, $claimCodeTo, $claimFor, $claimTo, $currencyCodeFrom, $currencyCodeTo, $groupAuthorizedCodeFrom, $groupAuthorizedCodeTo, $position, $ranking, $location, $dataLevel)
    {
        $this->employeeNoFrom = $employeeNoFrom;
        $this->employeeNoTo = $employeeNoTo;
        $this->grandTotal = $grandTotal;
        $this->insuranceCodeFrom = $insuranceCodeFrom;
        $this->insuranceCodeTo = $insuranceCodeTo;
        $this->insuranceClassFrom = $insuranceClassFrom;
        $this->insuranceClassTo = $insuranceClassTo;
        $this->claimCodeFrom = $claimCodeFrom;
        $this->claimCodeTo = $claimCodeTo;
        $this->claimFor = $claimFor;
        $this->claimTo = $claimTo;
        $this->currencyCodeFrom = $currencyCodeFrom;
        $this->currencyCodeTo = $currencyCodeTo;
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
                "claimFor" => $this->claimFor,
                "claimTo" => $this->claimTo,
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

            if(!empty($this->insuranceCodeFrom) || !empty($this->insuranceCodeTo)){
                $param['insuranceCodeFrom'] = $this->insuranceCodeFrom;
                $param['insuranceCodeTo'] = $this->insuranceCodeTo;
            }

            if(!empty($this->insuranceClassFrom) || !empty($this->insuranceClassTo)){
                $param['insuranceClassFrom'] = $this->insuranceClassFrom;
                $param['insuranceClassTo'] = $this->insuranceClassTo;
            }

            if(!empty($this->claimCodeFrom) || !empty($this->claimCodeTo)){
                $param['claimCodeFrom'] = $this->claimCodeFrom;
                $param['claimCodeTo'] = $this->claimCodeTo;
            }

            if(!empty($this->currencyCodeFrom) || !empty($this->currencyCodeTo)){
                $param['currencyCodeFrom'] = $this->currencyCodeFrom;
                $param['currencyCodeTo'] = $this->currencyCodeTo;
            }
    
            if(!empty($this->groupAuthorizedCodeFrom) || !empty($this->groupAuthorizedCodeTo)){
                $param['groupAuthorizeCodeFrom'] = (int) $this->groupAuthorizedCodeFrom;
                $param['groupAuthorizeCodeTo'] = (int) $this->groupAuthorizedCodeTo;
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
                foreach($this->dataLevel as $key => $value){
                    $data_level_detail = [];
                    foreach($this->dataLevel[$key] as $value2){
                        $data_level_detail[] = [
                            'levelCode' => $value2
                        ];
                    }
                    $data_level[] = [
                        "companyCode" => Session::get('companyCode'),
                        "levelType" => (string) ($key + 1),
                        "level" => $data_level_detail
                    ];
                }
                $param['levelMaster'] = $data_level;
            }

            // var_dump(json_encode($param));

            $response = $client->post(env('API_URL').'/mdoutstandingclaimreport/getmdoutstandingclaimreport', [
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

        // var_dump($arrResult->dataListSet);

        if($arrResult->dataListSet[0] == null){
            return view('medical.md_export_outstanding_claim_report_excel', [
                'data' => [], 'data_company' => $arrCompany->dataListSet, 'grand_total' => $this->grandTotal
            ]);
        }else{
            return view('medical.md_export_outstanding_claim_report_excel', [
                'data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet, 'grand_total' => $this->grandTotal
            ]); 
        }
    }
}
