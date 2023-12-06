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
    public function __construct($employeeNoFrom, $employeeNoTo, $absentMonthFrom, $absentMonthTo, $includeResign, $changeHeader, $dataDetail, $hourOut, $hourTo, $groupAuthorizeFrom, $groupAuthorizeTo, $position, $ranking, $location, $dataLevel)
    {
        $this->employeeNoFrom = $employeeNoFrom;
        $this->employeeNoTo = $employeeNoTo;
        $this->absentMonthFrom = $absentMonthFrom;
        $this->absentMonthTo = $absentMonthTo;
        $this->includeResign = $includeResign;
        $this->changeHeader = $changeHeader;
        $this->dataDetail = $dataDetail;
        $this->hourOut = $hourOut;
        $this->hourTo = $hourTo;
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [ 
                'companyCode' => Session::get('companyCode'), 
                'languageCode' => App::getLocale(), 
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID'),
                'incResign' => $this->includeResign,
                'changeHeader' => $this->changeHeader
            ];

            if(!empty($this->employeeNoFrom) || !empty($this->employeeNoTo)){
                $param['employeeNoFrom'] = $this->employeeNoFrom;
                $param['employeeNoTo'] = $this->employeeNoTo;
            }

            if(!empty($this->absentMonthFrom) || !empty($this->absentMonthFrom)){
                $param['absentMonthFrom'] = $this->absentMonthFrom;
                $param['absentMonthTo'] = $this->absentMonthTo;
            }

            if(!empty($this->dataDetail) && !is_null($this->dataDetail[0])){
                foreach($this->dataDetail as $key => $value){
                    $data_detail[] = $value->absentCode;
                }
                $param['absenCode'] = $data_detail;
            }else{
                $this->dataDetail = null;
                $param['dataDetail'] = null;
            }

            if(!empty($this->hourOut) || !empty($this->hourOut)){
                $param['hourOut'] = date('Y-m-d') . "T" . $this->hourOut;
                $param['hourOutTo'] = date('Y-m-d') . "T" . $this->hourTo;
            }

            if(!empty($this->groupAuthorizeFrom) || !empty($this->groupAuthorizeTo)){
                $param['groupAuthorizeFrom'] = (int) $this->groupAuthorizeFrom;
                $param['groupAuthorizeTo'] = (int) $this->groupAuthorizeTo;
            }

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

            // var_dump(json_encode($param));

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
                'data' => [], 'data_detail' => $this->dataDetail, 'changeHeader' => $this->changeHeader, 'hourFrom' => $this->hourOut, 'hourTo' => $this->hourTo 
            ]);
        }else{
            return view('time_management.tm_export_monthly_absenteeism_detail', [
                'data' => $arrResult->dataListSet, 'data_detail' => $this->dataDetail, 'changeHeader' => $this->changeHeader, 'hourFrom' => $this->hourOut, 'hourTo' => $this->hourTo
            ]);
        }
    }
}