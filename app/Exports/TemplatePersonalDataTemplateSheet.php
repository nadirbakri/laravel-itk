<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class TemplatePersonalDataTemplateSheet implements FromView, WithTitle, ShouldAutoSize
{
    public function view(): View
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
                ['body' => json_encode(
                    [
                        'languageCode' => strtoupper(App::getLocale())
                    ]
                )]
            );

            $arrResult = json_decode($response->getBody()->getContents());

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
            
        return view('personel.personel_export_template_personal_data_template_sheet', [
            'data' => ($arrResult->dataListSet != null) ? $arrResult->dataListSet : []
        ]);
    }

    public function title(): string
    {
        return 'Template';
    }
}