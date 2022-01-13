<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;

class PostponeLeaveReportExport implements FromView
{
    public function __construct($employeeNoFrom, $employeeNoTo, $absentDateFrom, $absentDateTo, $groupAuthorizeFrom, $groupAuthorizeTo, $reportType, $includeResign, $position, $ranking, $location, $dataLevel)
    {
        $this->employeeNoFrom = $employeeNoFrom;
        $this->employeeNoTo = $employeeNoTo;
        $this->absentDateFrom = $absentDateFrom;
        $this->absentDateTo = $absentDateTo;
        $this->groupAuthorizeFrom = $groupAuthorizeFrom;
        $this->groupAuthorizeTo = $groupAuthorizeTo;
        $this->reportType = $reportType;
        $this->includeResign = $includeResign;
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
                'languageID' => App::getLocale(), 
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID'),
                'incResign' => $this->includeResign
            ];

            if(!empty($this->employeeNoFrom) || !empty($this->employeeNoTo)){
                $param['employeeNoFrom'] = $this->employeeNoFrom;
                $param['employeeNoTo'] = $this->employeeNoTo;
            }

            if(!empty($this->absentDateFrom) || !empty($this->absentDateTo)){
                $param['absenDateFrom'] = $this->absentDateFrom;
                $param['absenDateTo'] = $this->absentDateTo;
            }

            if(!empty($this->groupAuthorizeFrom) || !empty($this->groupAuthorizeTo)){
                $param['groupAuthorizeFrom'] = $this->groupAuthorizeFrom;
                $param['groupAuthorizeTo'] = $this->groupAuthorizeTo;
            }

            if(!empty($request->position) && !is_null($request->position[0])){
                foreach($request->position as $value){
                    $data_position[] = $value;
                }
                $param['position'] = $data_position;
            }

            if(!empty($request->location) && !is_null($request->location[0])){
                foreach($request->location as $value){
                    $data_location[] = $value;
                }
                $param['location'] = $data_location;
            }

            if(!empty($request->ranking) && !is_null($request->ranking[0])){
                foreach($request->ranking as $value){
                    $data_ranking[] = $value;
                }
                $param['ranking'] = $data_ranking;
            }

            if(!empty($this->dataLevel) && !is_null($this->dataLevel[0])){
                foreach($this->dataLevel as $key => $value){
                    $data_level_detail = [];
                    foreach($this->dataLevel[$key] as $value2){
                        $data_level_detail[] = [
                            'level' => $value2
                        ];
                    }
                    $data_level[] = [
                        "companyCode" => Session::get('companyCode'),
                        "levelType" => (string) ($key + 1),
                        "level" => $data_level_detail
                    ];
                }
                $param['level'] = $data_level;
            }

            // var_dump($param['levelMaster']);

            if($reportType == "absent"){
                $response = $client->post(env('API_URL') . '/absentovertimereport/getabsenteeismreport',
                ['body' => json_encode($param)]
            );
            }
            else{
                $response = $client->post(env('API_URL') . '/absentovertimereport/getovertimereport',
                ['body' => json_encode($param)]
            );
            }
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        // var_dump($arrResult->dataListSet);

        if($reportType == "absent"){
            if($arrResult->dataListSet == null){
                return view('time_management.tm_export_absenteeism_absent_report', [
                    'data' => []
                ]); 
            }else{
                return view('time_management.tm_export_absenteeism_absent_report', [
                    'data' => $arrResult->dataListSet
                ]);
            }
        }
        else{
            if($arrResult->dataListSet == null){
                return view('time_management.tm_export_absenteeism_overtime_report', [
                    'data' => []
                ]); 
            }else{
                return view('time_management.tm_export_absenteeism_overtime_report', [
                    'data' => $arrResult->dataListSet
                ]);
            }
        }
    }
}
