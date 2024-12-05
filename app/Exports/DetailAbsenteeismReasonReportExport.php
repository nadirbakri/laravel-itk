<?php

namespace App\Exports;

set_time_limit(0);

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class DetailAbsenteeismReasonReportExport implements FromView, ShouldAutoSize
{
    public function __construct($employeeNoFrom, $employeeNoTo, $absentDateFrom, $absentDateTo, $groupAuthorizeFrom, $groupAuthorizeTo, $includeResign, $position, $ranking, $location, $dataLevel, $dataField)
    {
        $this->employeeNoFrom = $employeeNoFrom;
        $this->employeeNoTo = $employeeNoTo;
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
                'languageID' => App::getLocale(), 
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID'),
                // 'includeResign' => $this->includeResign
            ];

            // if(!empty($this->employeeNoFrom) || !empty($this->employeeNoTo)){
            //     $param['employeeNoFrom'] = $this->employeeNoFrom;
            //     $param['employeeNoTo'] = $this->employeeNoTo;
            // }

            if(!empty($this->absentDateFrom) || !empty($this->absentDateTo)){
                $param['absentDateFrom'] = $this->absentDateFrom;
                $param['absentDateTo'] = $this->absentDateTo;
            }

            // if(!empty($this->groupAuthorizeFrom) || !empty($this->groupAuthorizeTo)){
            //     $param['groupAuthorizeCodeFrom'] = $this->groupAuthorizeFrom;
            //     $param['groupAuthorizeCodeTo'] = $this->groupAuthorizeTo;
            // }

            // if(!empty($this->position) && !is_null($this->position[0])){
            //     foreach($this->position as $value){
            //         $data_position[] = $value;
            //     }
            //     $param['position'] = $data_position;
            // }

            // if(!empty($this->location) && !is_null($this->location[0])){
            //     foreach($this->location as $value){
            //         $data_location[] = $value;
            //     }
            //     $param['location'] = $data_location;
            // }

            // if(!empty($this->ranking) && !is_null($this->ranking[0])){
            //     foreach($this->ranking as $value){
            //         $data_ranking[] = $value;
            //     }
            //     $param['ranking'] = $data_ranking;
            // }

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

            if(!empty($this->dataField) && !is_null($this->dataField[0])){
                foreach($this->dataField as $key => $value){
                    $data_field[] = $value->absentCode;
                }
                $param['absenCode'] = $data_field;
            }

            // dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/mobile/MonthlyAbsenteeismDetailReport/getdailyabsenteeismdetailreasonreport',
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
        // dd($arrResult);

        if($arrResult->dataListSet == null){
            return view('time_management.tm_export_detail_absenteeism_reason_report', [
                'data' => []
            ]);
        }else{
          
            return view('time_management.tm_export_detail_absenteeism_reason_report', [
                'data' => $arrResult->dataListSet
            ]);
        }

        // $data = [
        //     [
        //         "companyCode" => "ITK",
        //         "employeeNo" => "000612",
        //         "fullName" => "Edwin Tanumiharja",
        //         "levelCode" => "MDSPAY",
        //         "listAbsentCode" => [
        //           [
        //             "absentCode" => "ABS",
        //             "absenteeismDetail" => [
        //               [
        //                 "absentDate" => "24-10-01",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-02",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-03",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-04",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-07",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-08",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-09",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-10",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-11",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-14",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-15",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-16",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-17",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-18",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-21",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-22",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-23",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-24",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-25",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-28",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-29",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-30",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ],
        //               [
        //                 "absentDate" => "24-10-31",
        //                 "hour" => "09:05:00",
        //                 "day" => 1
        //               ]
        //             ],
        //             "totalHour" => "208:55:00",
        //             "totalDays" => 23
        //           ],
        //           [
        //             "absentCode" => "AL",
        //             "absenteeismDetail" => [],
        //             "totalHour" => "00:00:00",
        //             "totalDays" => 0
        //           ]
        //         ]
        //     ],
        //     [
        //         "companyCode" => "ITK",
        //         "employeeNo" => "000625",
        //         "fullName" => "Indra Hermawan",
        //         "levelCode" => "MDSPAY",
        //         "listAbsentCode" => [
        //           [
        //             "absentCode" => "ABS",
        //             "absenteeismDetail" => [],
        //             "totalHour" => "00:00:00",
        //             "totalDays" => 0
        //           ],
        //           [
        //             "absentCode" => "AL",
        //             "absenteeismDetail" => [],
        //             "totalHour" => "00:00:00",
        //             "totalDays" => 0
        //           ]
        //         ]
        //     ],
        //     [
        //       "companyCode" => "ITK",
        //       "employeeNo" => "000713",
        //       "fullName" => "Hardy Horas",
        //       "levelCode" => "MDSPAY",
        //       "listAbsentCode" => [
        //         [
        //           "absentCode" => "ABS",
        //           "absenteeismDetail" => [],
        //           "totalHour" => "00:00:00",
        //           "totalDays" => 0
        //         ],
        //         [
        //           "absentCode" => "AL",
        //           "absenteeismDetail" => [
        //             [
        //               "absentDate" => "24-10-17",
        //               "hour" => "09:05:00",
        //               "day" => 1
        //             ],
        //             [
        //               "absentDate" => "24-10-18",
        //               "hour" => "09:05:00",
        //               "day" => 1
        //             ]
        //           ],
        //           "totalHour" => "18:10:00",
        //           "totalDays" => 2
        //         ]
        //       ]
        //     ],        
        // ];

        // dd(json_encode($param));
        // $data = json_decode(json_encode($data));

        // dd($data);

        // return view('time_management.tm_export_detail_absenteeism_reason_report', ['data' => $data]);
    }
}
