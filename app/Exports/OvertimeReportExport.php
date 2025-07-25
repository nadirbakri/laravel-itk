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

class OvertimeReportExport implements FromView, ShouldAutoSize
{
    public function __construct($period, $groupAuthorizeFrom, $groupAuthorizeTo)
    {
        $this->period = $period;
        $this->groupAuthorizeFrom = $groupAuthorizeFrom;
        $this->groupAuthorizeTo = $groupAuthorizeTo;
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
                'period' => $this->period,
                'groupAuthorizeFrom' => (int) $this->groupAuthorizeFrom,
                'groupAuthorizeTo' => (int) $this->groupAuthorizeTo,
                'groupAuthorizeCode' => (string) Session::get('groupAuthorizePayroll'),
            ];

            // dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/mobile/getOvertimeReport',
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

        // dd($arrResult->dataListSet);

        return view('time_management.tm_export_overtime_report', ['data' => $arrResult->dataListSet ?? []]);
    }
}
