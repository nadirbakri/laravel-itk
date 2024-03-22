<?php

namespace App\Exports;

// use Carbon\Carbon;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class TransportExport implements FromView, ShouldAutoSize
{
    public function __construct($claimDateFrom, $claimDateTo,$reimbursementType,$businessunit, $dataLevel, $status)
    {
        $this->claimDateFrom = $claimDateFrom ;
        $this->claimDateTo = $claimDateTo;
        $this->reimbursementType = $reimbursementType;
        $this->businessUnit = $businessunit;
        $this->dataLevel = $dataLevel;
        $this->status = ($status == 'ALL') ? null : $status;
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
                'companyCode' => Session::get('companyCode'), 
                'languageCode' => App::getLocale(), 
                'sessionID' => 0, 
                'exportMenu' => true,
                'status' => $this->status,
                'sessionUserID' => Session::get('userID'),
                'type' =>  $this->reimbursementType,
                'businessUnit'=> $this->businessUnit,
            ];

            $response = $client->post(env('API_URL') . '/mobile/Transport/getTransportDetailListAll',
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

        if($arrResult->dataListSet == null){
            return view('export.transport_export', [
                'data' => []
            ]);
        }else{
            return view('export.transport_export', [
                'data' => $arrResult->dataListSet
            ]);
        }
    }
}
