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

class EmployeeMultipleLocationExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            $response = $client->post(env('API_URL') . '/mobile/OfficeLocation/getOfficeLocationV2',
                ['body' => json_encode([   
                    'companyCode' => Session::get('companyCode')
                ])]
            );
        }catch (RequestException $e) {
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
            return view('personel.personel_export_employee_multiple_location', [
                'data' => []
            ]);
        }else{
            return view('personel.personel_export_employee_multiple_location', [
                'data' => $arrResult->dataListSet
            ]);
        }
    }
}
