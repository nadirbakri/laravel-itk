<?php

namespace App\Exports;
ini_set('memory_limit', '4096M');

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class BusinessTripExport implements FromView, ShouldAutoSize
{
    public function __construct($claimdateFrom, $claimdateTo, $businessunit, $dataLevel, $status, $type)
    {
        $this->claimdateFrom = $claimdateFrom;
        $this->claimdateTo = $claimdateTo;
        $this->businessUnit = ($businessunit == 'ALL') ? null : $businessunit;
        $this->dataLevel = $dataLevel;
        $this->status = ($status == 'ALL') ? null : $status;
        $this->type = ($type == 'ALL') ? null : $type;
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
                'startDate' => $this->claimdateFrom,
                'endDate' => $this->claimdateTo,
                'type' => $this->type,
                'exportMenu' => true,
                'isWeb' => true,
                'status' => $this->status,
                "allWaitingPayment" => true,
                'businessUnit' =>$this->businessUnit,
                'companyCode' => Session::get('companyCode'), 
                'languageCode' => App::getLocale(), 
                'userID' => Session::get('userID'),
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID')
            ];

            $response = $client->post(env('API_URL') . '/mobile/BusinessTrip/getExportBST',
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
            return view('export.exp_businesstriprequest_list', [
                'data' => []
            ]);
        }else{
            return view('export.exp_businesstriprequest_list', [
                'data' => $arrResult->dataListSet
            ]);
        }
    }
}
