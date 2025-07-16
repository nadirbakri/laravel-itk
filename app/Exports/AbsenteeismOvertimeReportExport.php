<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class AbsenteeismOvertimeReportExport implements FromView, ShouldAutoSize
{
    public function __construct($employeeType, $employeeNoFrom, $employeeNoTo, $employeeNoList, $absentDateFrom, $absentDateTo, $groupAuthorizeFrom, $groupAuthorizeTo, $reportType, $includeResign, $position, $ranking, $location, $dataLevel)
    {
        $this->employeeType = $employeeType;
        $this->employeeNoFrom = $employeeNoFrom;
        $this->employeeNoTo = $employeeNoTo;
        $this->employeeNoList = $employeeNoList;
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

            if($this->reportType == "overtime"){
                // $viewFile = 'time_management.tm_export_absenteeism_overtime_report';
                $viewFile = 'time_management.tm_export_absenteeism_overtime_new_report';

                // $response = $client->post(env('API_URL') . '/mobile/TmOvertime/GetOvertimeReport',
                //     ['body' => json_encode($param)]
                // );

                // $response = $client->post(env('API_URL') . '/mobile/absenteeismOvertimeReport/getOvertimeAbsenteeismReportByDate',
                //     ['body' => json_encode($param)]
                // );

                $response = $client->post('https://f5769e56691c.ngrok-free.app/absenteeismOvertimeReport/getOvertimeAbsenteeismReportByDate',
                    ['body' => json_encode($param)]
                );
            }else{
                // $viewFile = 'time_management.tm_export_absenteeism_absent_report';
                $viewFile = 'time_management.tm_export_absenteeism_absent_new_report';
                            
                // $response = $client->post(env('API_URL') . '/absentovertimereport/getabsenteeismreport',
                //     ['body' => json_encode($param)]
                // );
            
                // $response = $client->post(env('API_URL') . '/mobile/absenteeismOvertimeReport/getAbsenteeismReportByDate',
                //     ['body' => json_encode($param)]
                // );
                $response = $client->post('https://f5769e56691c.ngrok-free.app/absenteeismOvertimeReport/getAbsenteeismReportByDate',
                    ['body' => json_encode($param)]
                );
            }
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

        if($arrResult->dataListSet == null){
            return view($viewFile, [
                'data' => [],
            ]); 
        }else{
            return view($viewFile, [
                'data' => $arrResult->dataListSet,
            ]);
        }
    }
}
