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

class MonthlyAbsenteeismDetailExport implements FromView, ShouldAutoSize
{
    public function __construct($employeeType, $employeeNoFrom, $employeeNoTo, $employeeNoList, $dateType, $period, $absentDateFrom, $absentDateTo, $groupAuthorizeFrom, $groupAuthorizeTo, $includeResign, $changeHeader, $position, $ranking, $location, $dataLevel)
    {
        $this->employeeType = $employeeType;
        $this->employeeNoFrom = $employeeNoFrom;
        $this->employeeNoTo = $employeeNoTo;
        $this->employeeNoList = $employeeNoList;
        $this->dateType = $dateType;
        $this->period = $period;
        $this->absentDateFrom = $absentDateFrom;
        $this->absentDateTo = $absentDateTo;
        $this->groupAuthorizeFrom = $groupAuthorizeFrom;
        $this->groupAuthorizeTo = $groupAuthorizeTo;
        $this->includeResign = $includeResign;
        $this->changeHeader = $changeHeader;
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
                'range' => $this->employeeType === 'RANGE' ? true : false,
                'employeeNoFrom' => $this->employeeNoFrom,
                'employeeNoTo' => $this->employeeNoTo,
                'employeeList' => $this->employeeNoList,
                'period' => $this->dateType === 'PERIOD' ? $this->period : null,
                'absentDateFrom' => $this->dateType === 'RANGE_DATE' ? $this->absentDateFrom : null,
                'absentDateTo' => $this->dateType === 'RANGE_DATE' ? $this->absentDateTo : null,
                'groupAuthorizeFrom' => (int) $this->groupAuthorizeFrom,
                'groupAuthorizeTo' => (int) $this->groupAuthorizeTo,
                'includeResign' => $this->includeResign,
                'changeHeader' => $this->changeHeader,
                'userID' => Session::get('userID'),
                'languageID' => App::getLocale(),
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID')
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
                $param['levelMaster'] = $data_level;
            }

            // dd(json_encode($param));

            // var_dump($param['levelMaster']);

            $response = $client->post(env('API_URL') . '/mobile/monthlyabsenteeismdetailreport/getmonthlyabsenteeismdetailreport',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            // var_dump($response);
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        // var_dump($this->changeHeader);

        if($arrResult->dataListSet == null){
            return view('time_management.tm_export_monthly_absenteeism_detail', [
                'data' => [], 'changeHeader' => $this->changeHeader, 'absentDateFrom' => $this->absentDateFrom, 'absentDateTo' => $this->absentDateTo, 'dataLevel' => $data_level
            ]);
        }else{
            return view('time_management.tm_export_monthly_absenteeism_detail', [
                'data' => $arrResult->dataListSet, 'changeHeader' => $this->changeHeader, 'absentDateFrom' => $this->absentDateFrom, 'absentDateTo' => $this->absentDateTo, 'dataLevel' => $data_level
            ]);
        }
    }
}