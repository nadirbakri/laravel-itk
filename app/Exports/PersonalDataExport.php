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

class PersonalDataExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeMaster/ExportPeMaster',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'languageCode' => App::getLocale(), 
                        'sessionID' => 0, 
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response2 = $client->post(env('API_URL') . '/personel/PeMaster/getTemplate',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode')
                    ]
                )]
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
        $arrResult2 = json_decode($response2->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return view('personel.personel_export_personal_data', [
                'data' => [], 'header' => $arrResult2
            ]);
        }else{
            return view('personel.personel_export_personal_data', [
                'data' => $arrResult->dataListSet, 'header' => $arrResult2
            ]);
        }
    }
}
