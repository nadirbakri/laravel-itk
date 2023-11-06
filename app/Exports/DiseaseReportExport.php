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

class DiseaseReportExport implements FromView, ShouldAutoSize
{
    public function __construct($reportType, $employeeNoFrom, $employeeNoTo, $diseaseFrom, $diseaseTo, $periodClaimFrom, $periodClaimTo, $groupAuthorizedCodeFrom, $groupAuthorizedCodeTo, $position, $ranking, $location, $dataLevel)
    {
        $this->reportType = $reportType;
        $this->employeeNoFrom = $employeeNoFrom;
        $this->employeeNoTo = $employeeNoTo;
        $this->diseaseFrom = $diseaseFrom;
        $this->diseaseTo = $diseaseTo;
        $this->periodClaimFrom = $periodClaimFrom;
        $this->periodClaimTo = $periodClaimTo;
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

            if(!empty($this->periodClaimFrom) || !empty($this->periodClaimTo)){
                $param['periodClaimFrom'] = $this->periodClaimFrom;
                $param['periodClaimTo'] = $this->periodClaimTo;
            }
    
            if(!empty($this->groupAuthorizedCodeFrom) || !empty($this->groupAuthorizedCodeTo)){
                $param['groupAuthorizedCodeFrom'] = (int) $this->groupAuthorizedCodeFrom;
                $param['groupAuthorizedCodeTo'] = (int) $this->groupAuthorizedCodeTo;
            }

            if(!empty($this->diseaseFrom) || !empty($this->diseaseTo)){
                $param['diseaseFrom'] = $this->diseaseFrom;
                $param['diseaseTo'] = $this->diseaseTo;
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

            $response = $client->post(env('API_URL').'/mddiseasesreport/getdiseasereport', [
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
            if($this->reportType == 'detail'){
                return view('medical.md_export_disease_detail_report_excel', [
                    'data' => [], 'data_company' => $arrCompany->dataListSet, 'type' => $this->reportType, 'period' => date('d M Y', strtotime($this->periodClaimFrom)) . ' - ' . date('d M Y', strtotime($this->periodClaimTo))
                ]);
            }else{
                return view('medical.md_export_disease_summary_report_excel', [
                    'data' => [], 'data_company' => $arrCompany->dataListSet, 'type' => $this->reportType, 'period' => date('d M Y', strtotime($this->periodClaimFrom)) . ' - ' . date('d M Y', strtotime($this->periodClaimTo))
                ]);
            }
        }else{
            if($this->reportType == 'detail'){
                return view('medical.md_export_disease_detail_report_excel', [
                    'data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet, 'type' => $this->reportType, 'period' => date('d M Y', strtotime($this->periodClaimFrom)) . ' - ' . date('d M Y', strtotime($this->periodClaimTo))
                ]);
            }else{
                return view('medical.md_export_disease_summary_report_excel', [
                    'data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet, 'type' => $this->reportType, 'period' => date('d M Y', strtotime($this->periodClaimFrom)) . ' - ' . date('d M Y', strtotime($this->periodClaimTo))
                ]);
            }
        }
    }
}
