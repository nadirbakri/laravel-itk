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

class OvertimeDetailReportExport implements FromView, ShouldAutoSize
{
    public function __construct($employeeNoFrom, $employeeNoTo, $period, $noOvertime, $hideTariff, $orderByName, $groupAuthorizeFrom, $groupAuthorizeTo, $increment, $group, $incrementDate, $groupBy, $position, $ranking, $location, $dataLevel)
    {
        $this->employeeNoFrom = $employeeNoFrom;
        $this->employeeNoTo = $employeeNoTo;
        $this->period = $period;
        $this->noOvertime = $noOvertime;
        $this->hideTariff = $hideTariff;
        $this->orderByName = $orderByName;
        $this->groupAuthorizeFrom = $groupAuthorizeFrom;
        $this->groupAuthorizeTo = $groupAuthorizeTo;
        $this->increment = $increment;
        $this->group = $group;
        $this->incrementDate = $incrementDate;
        $this->groupBy = $groupBy;
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
                "companyCode" => Session::get("companyCode"),
                "employeeNoFrom" => $this->employeeNoFrom,
                "employeeNoTo" => $this->employeeNoTo,
                "periodMonth" => (int) date('m', strtotime($this->period)),
                "periodYear" => (int) date('Y', strtotime($this->period)),
                "isNoOvertime" => $this->noOvertime,
                "isHideTariff" => $this->hideTariff,
                "isOrderByName" => $this->orderByName,
                "groupAuthorizeCodeFrom" => $this->groupAuthorizeFrom,
                "groupAuthorizeCodeTo" => $this->groupAuthorizeTo,
                "isIncrement" => $this->increment,
                "isGroup" => $this->group,
                "incrementDate" => $this->incrementDate,
                "groupBy" => $this->groupBy,
                "position" => $this->position,
                "ranking" => $this->ranking,
                "location" => $this->location,
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userName'),
                "logActionUserID" => Session::get('userID'),
                "languageCode" => strtoupper(App::getLocale()),
            ];

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
                $param['levelMaster'] = $this->dataLevel;
            }

            // dd(json_encode($param));

            $response = $client->post(env('API_URL').'/mobile/TmOvertimeReport/getTmOvertimeReport', [
                'body' => json_encode($param)
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

        return view('payroll.py_export_overtime_detail_report_excel', [
            'data' => $arrResult->dataListSet ?? [],
            'period' => $this->period
        ]);
    }
}
?>