<?php

namespace App\Exports;

set_time_limit(0);
ini_set('memory_limit', '1024M');

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class DetailRateOvertimeReportExport implements FromView, ShouldAutoSize
{
    public function __construct($employeeType, $employeeNoFrom, $employeeNoTo, $employeeNoList, $dateType, $period, $absentDateFrom, $absentDateTo, $groupAuthorizeFrom, $groupAuthorizeTo, $includeResign, $position, $ranking, $location, $dataLevel)
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
        $this->position = $position;
        $this->ranking = $ranking;
        $this->location = $location;
        $this->dataLevel = $dataLevel;
        // $this->dataField = $dataField;
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
                'period' => $this->dateType === 'PERIOD' ? $this->period : null,
                'startDate' => $this->dateType === 'RANGE_DATE' ? $this->absentDateFrom : null,
                'endDate' => $this->dateType === 'RANGE_DATE' ? $this->absentDateTo : null,
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
                $param['levelMaster'] = $this->dataLevel;
            }

            // if(!empty($this->dataField) && !is_null($this->dataField[0])){
            //     foreach($this->dataField as $key => $value){
            //         $data_field[] = $value->absentCode;
            //     }
            //     $param['overtimeCode'] = $data_field;
            // }

            // dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/mobile/detailRateOvertimeReport',
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
            return view('time_management.tm_export_detail_rate_overtime_report', [
                'data' => []
            ]);
        }else{
            return view('time_management.tm_export_detail_rate_overtime_report', [
                'data' => $arrResult->dataListSet
            ]);
        }
    }
}
