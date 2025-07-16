<?php

namespace App\Exports;

ini_set('max_execution_time', 180);

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class DetailAbsenteeismReportExport implements FromView, ShouldAutoSize
{
    public function __construct($employeeType, $employeeNoFrom, $employeeNoTo, $employeeNoList, $absentDateFrom, $absentDateTo, $groupAuthorizeFrom, $groupAuthorizeTo, $includeResign, $position, $ranking, $location, $dataLevel, $dataField)
    {
        $this->employeeType = $employeeType;
        $this->employeeNoFrom = $employeeNoFrom;
        $this->employeeNoTo = $employeeNoTo;
        $this->employeeNoList = $employeeNoList;
        $this->absentDateFrom = $absentDateFrom;
        $this->absentDateTo = $absentDateTo;
        $this->groupAuthorizeFrom = $groupAuthorizeFrom;
        $this->groupAuthorizeTo = $groupAuthorizeTo;
        $this->includeResign = $includeResign;
        $this->position = $position;
        $this->ranking = $ranking;
        $this->location = $location;
        $this->dataLevel = $dataLevel;
        $this->dataField = $dataField;
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
                'range' => $this->employeeType === 'RANGE' ? true : false,
                'employeeNoFrom' => $this->employeeNoFrom,
                'employeeNoTo' => $this->employeeNoTo,
                'employeeList' => $this->employeeType === 'ALL' || $this->employeeType === 'RANGE' ? [] : $this->employeeNoList,
                'absentDateFrom' => $this->absentDateFrom,
                'absentDateTo' => $this->absentDateTo,
                'groupAuthorizeFrom' => (int) $this->groupAuthorizeFrom,
                'groupAuthorizeTo' => (int) $this->groupAuthorizeTo,
                'includeResign' => $this->includeResign ?? false,
                'userID' => Session::get('userID'),
            ];

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
                $param['level'] = $data_level;
            }

            if(!empty($this->dataField) && !is_null($this->dataField[0])){
                foreach($this->dataField as $key => $value){
                    $data_field[] = $value->absentCode;
                }
                $param['absentCode'] = $data_field;
            }

            dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/AbsenteeismDetailReport/getAbsenteeismDetailReport',
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

        if($arrResult->dataListSet == null){
            return view('time_management.tm_export_detail_absenteeism_report', [
                'data' => []
            ]);
        }else{
            return view('time_management.tm_export_detail_absenteeism_report', [
                'data' => $arrResult->dataListSet
            ]);
        }
    }
}
