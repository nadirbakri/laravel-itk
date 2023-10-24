<?php

namespace App\Exports;

use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class ChangeDataShiftTemplateExcel implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/referencetm/getreferencetm',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $arrResult = json_decode($response->getBody()->getContents());

            if(!empty($arrResult->dataListSet)){
                $response_tm = $client->post(env('API_URL') . '/tmperiod/gettmperiod',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            "periodMonth" => $arrResult->dataListSet[0]->periodMonth,
                            "periodYear" => $arrResult->dataListSet[0]->periodYear,
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );

                $arrResult_tm = json_decode($response_tm->getBody()->getContents());

                if(!empty($arrResult_tm->dataListSet)){
                    $startDate = new \DateTime($arrResult_tm->dataListSet[0]->absenteeismStart);
                    $endDate = new \DateTime($arrResult_tm->dataListSet[0]->absenteeismEnd);
                    
                    $dateRange = floor(($endDate->getTimestamp() - $startDate->getTimestamp()) / (60 * 60 * 24));;

                    $data = array_map(function ($day_offset) use ($startDate) {
                        return date('Y-m-d', strtotime('+ ' . $day_offset . ' days', $startDate->getTimestamp()));
                    }, range(0, $dateRange));

                    // var_dump($data);
                    // exit;
                }else{
                    $data = null;
                }
            }else{
                $data = null;
            }

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

        return view('time_management.tm_export_template_change_data_shift', [
            'data' => $data
        ]);
    }
}
