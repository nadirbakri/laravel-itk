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

class MedicalExport implements FromView, ShouldAutoSize
{
    public function __construct($claimDateFrom, $claimDateTo, $businessUnit, $reimbursementType, $dataLevel, $status)
    {
        $this->claimDateFrom = $claimDateFrom;
        $this->claimDateTo = $claimDateTo;
        $this->businessUnit = $businessUnit;
        $this->reimbursementType = $reimbursementType;
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
                'medicalType1'=> $this->reimbursementType,
                'businessUnit'=> $this->businessUnit,
                'exportMenu' => false,
                'isWeb' => true,
                'status'=> $this->status,
                'companyCode' => Session::get('companyCode'), 
                'languageCode' => App::getLocale(), 
                'userID' => Session::get('userID'),
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID'),
            ];

            $response = $client->post(env('API_URL') . '/mobile/reimbursementmedical/getreimbursementdetaillistallweb',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            // dd($response);
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

        if($arrResult->dataListSet == null){
            return view('export.export_medical_list', [
                'data' => []
            ]);
        }else{
            return view('export.export_medical_list', [
                'data' => $arrResult->dataListSet
            ]);
        }
    }
}
