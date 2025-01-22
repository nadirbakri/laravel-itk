<?php

namespace App\Exports;
ini_set('memory_limit', '4096M');

use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class MultipleChecking implements FromView, ShouldAutoSize
{
    public function __construct($claimDateFrom, $claimDateTo, $businessUnit, $status, $userID, $dataLevel)
    {
        $this->claimDateFrom = $claimDateFrom;
        $this->claimDateTo = $claimDateTo;
        $this->businessUnit = $businessUnit;
        $this->status = $status;
        $this->userID = $userID;
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
                'startDate' => Carbon::parse($this->claimDateFrom)->format('Y-m-d'),
                'endDate' => Carbon::parse($this->claimDateTo)->format('Y-m-d'),
                'businessUnit' => $this->businessUnit === 'ALL' ? null : $this->businessUnit,
                'status' => $this->status === 'ALL' ? null : $this->status,
                'type' => 'TTB',
                // 'userID'=> $this->userID,
                'exportMenu'=> false,
                'isWeb' => true,
                'allWaitingPayment' => false,
                'companyCode' => Session::get('companyCode'), 
                'languageCode' => App::getLocale(), 
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID'),
                'userID'=> Session::get('userID'),
            ];
            
            // dd(json_encode($param));

            // if ($this->status == 'SETTLEMENT CHECKING'){
            //     $response = $client->post(env('API_URL') . '/mobile/BusinessTrip/getBusinessTripPDF',
            //         ['body' => json_encode($param)]
            //     );
            // }
            // else if ($this->status == 'WAITING_VERIFICATION'){
            //     $response = $client->post(env('API_URL') . '/mobile/BusinessTrip/getExportBST',
            //         ['body' => json_encode($param)]
            //     );
            // }
            $response = $client->post(env('API_URL') . '/mobile/BusinessTrip/getBusinessTripPDF',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            // dd($response);
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

        $data = $arrResult->dataListSet;

        return view('export.export_businesstrip_checking_list_settlement', [
            'data' => $data ? $data : [], 'companyCode' => Session::get('companyCode')
        ]);

        // if ($this->status == 'SETTLEMENT CHECKING'){
        //     return view('export.export_businesstrip_checking_list_settlement', [
        //         'data' => $data ? $data : []
        //     ]);
        // }
        // else if ($this->status == 'WAITING_VERIFICATION'){
        //     return view('export.exp_businesstriprequest_list', [
        //         'data' => $data ? $data : []
        //     ]);
        // }
        // else {
        //     return view('export.export_businesstrip_checking_list', [
        //         'data' => $arrResult->dataListSet
        //     ]);
        // }
    }
}
