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

class PostponeLeaveReportExport implements FromView, ShouldAutoSize , ShouldQueue
{
    public function __construct($employeeNoFrom, $employeeNoTo, $period, $includeResign, $groupAuthorizeFrom, $groupAuthorizeTo, $position, $ranking, $location, $dataLevel)
    {
        $this->employeeNoFrom = $employeeNoFrom;
        $this->employeeNoTo = $employeeNoTo;
        $this->period = $period;
        $this->includeResign = $includeResign;
        $this->groupAuthorizeFrom = $groupAuthorizeFrom;
        $this->groupAuthorizeTo = $groupAuthorizeTo;
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
                'languageCode' => App::getLocale(), 
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID'),
                'includeResign' => $this->includeResign
            ];

            if(!empty($this->employeeNoFrom) || !empty($this->employeeNoTo)){
                $param['employeeNoFrom'] = $this->employeeNoFrom;
                $param['employeeNoTo'] = $this->employeeNoTo;
            }

            if(!empty($this->period) || !empty($this->period)){
                $param['period'] = $this->period;
            }

            if(!empty($this->groupAuthorizeFrom) || !empty($this->groupAuthorizeTo)){
                $param['groupAuthorizeFrom'] = $this->groupAuthorizeFrom;
                $param['groupAuthorizeTo'] = $this->groupAuthorizeTo;
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

            // var_dump($param['levelMaster']);

            $response = $client->post(env('API_URL') . '/postponeleavereport/getpostponereportleave',
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

        // var_dump($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            return view('time_management.tm_export_postpone_leave_report', [
                'data' => []
            ]);
        }else{
            return view('time_management.tm_export_postpone_leave_report', [
                'data' => $arrResult->dataListSet
            ]);
        }
    }
}
