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

class AuditTrailExport implements FromView, ShouldAutoSize
{
    public function __construct($userID, $userName, $dateFrom, $dateTo, $url)
    {
        $this->userId = $userID;
        $this->userName = $userName;
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
        $this->url = $url;
    }
    public function view(): View
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [ 'companyCode' => Session::get('companyCode') ];

            if(!empty($this->dateFrom) || !empty($this->dateTo)){
                $param['dateFrom'] = $this->dateFrom;
                $param['dateTo'] = $this->dateTo;
            }
            
            if(!empty($this->userId)){
                $param['logActionUserID'] = $this->userId;
                $param['logActionUsername'] = $this->userName;
            }

            $response = $client->post(env('API_URL') . '/' . $this->url,
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
            return view('utilities.utilities_export_audit_trail', [
                'data' => []
            ]);
        }else{
            return view('utilities.utilities_export_audit_trail', [
                'data' => $arrResult->dataListSet
            ]);
        }
    }
}
