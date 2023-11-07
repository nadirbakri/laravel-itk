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

class BusinessTripAllExport implements FromView, ShouldAutoSize
{
    public function __construct($claimdateFrom, $claimdateTo,$businessunit,$dataLevel)
    {
        $this->claimdateFrom = $claimdateFrom;
        $this->claimdateTo = $claimdateTo;
        // $this->travelAdvances = $travelAdvances;
        $this->businessUnit = $businessunit;
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
                'startDate' => $this->claimdateFrom,
                'endDate' => $this->claimdateTo,
                'companyCode' => Session::get('companyCode'), 
                'languageCode' => App::getLocale(), 
                'sessionID' => 0, 
                'exportMenu' => true,
                'type' => 'ALL',
                'businessUnit' =>$this->businessUnit,
                'sessionUserID' => Session::get('userID')
            ];

            // if(!empty($this->permitDateFrom) || !empty($this->permitDateTo)){
            //     $param['permitDateFrom'] = $this->permitDateFrom;
            //     $param['permitDateTo'] = $this->permitDateTo;
            // }

            // if(!empty($this->businessUnit) || !empty($this->businessUnit)){
            //     $param['businessUnit'] = $this->businessUnit;
            // }
            // var_dump(json_encode($param));

            $response = $client->post(env('API_URL') . '/mobile/BusinessTrip/getBusinessTripAndSettlement',
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
            return view('export.exp_businesstripall_list', [
                'data' => []
            ]);
        }else{
            return view('export.exp_businesstripall_list', [
                'data' => $arrResult->dataListSet
            ]);
        }
    }
}
