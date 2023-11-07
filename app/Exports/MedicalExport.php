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

class MedicalExport implements FromView, ShouldAutoSize
{
    public function __construct($claimDateFrom, $claimDateTo, $businessUnit, $reimbursementType, $dataLevel)
    {
        $this->claimDateFrom = $claimDateFrom;
        $this->claimDateTo = $claimDateTo;
        $this->businessUnit = $businessUnit;
        $this->reimbursementType = $reimbursementType;
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
                'medicalType1'=> $this->reimbursementType,
                'businessUnit'=> $this->businessUnit,
                'exportMenu'=> true,
                'companyCode' => Session::get('companyCode'), 
                'languageCode' => App::getLocale(), 
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID'),
            ];


            // dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/reimbursementmedical/getreimbursementdetaillistall',
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
