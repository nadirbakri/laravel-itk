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

class TemplatePlafonInfoTemplateSheet implements FromView, WithTitle, ShouldAutoSize
{
    public function __construct($type)
    {
        $this->type = $type;
    }

    public function view(): View
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $arrResult2 = (object) ['dataListSet' => []];

            $param = [
                "companyCode" => Session::get("companyCode"),
                "variable" => match ($this->type) {
                    "MEDICAL" => "MedicalType_",
                    "BUSINESSTRIP" => "List_BusinessTrip_",
                    "TRANSPORT" => "List_Reimbursement_Transport",
                },
                "languageCode" => strtoupper(App::getLocale())
            ];

            $param2 = [
                "companyCode" => Session::get("companyCode"),
                "variable" => "TravelAdvance-DestinationType_",
                "languageCode" => strtoupper(App::getLocale())
            ];

            $response = $client->post(env('API_URL') . '/personel/referencemobile/getreferencemobile',
				['body' => json_encode($param)]);

            if ($this->type === 'BUSINESSTRIP' || $this->type === 'TRANSPORT') {
                $response_status = $client->post(env('API_URL') . '/personel/referencemobile/getreferencemobile',
				    ['body' => json_encode($param2)]);
                $arrResult2 = json_decode($response_status->getBody()->getContents());
            }

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

        return view('personel.personel_plafon_info_template_sheet', [
            'data' => ($arrResult->dataListSet != null) ? $arrResult->dataListSet : [],
            'data_status' => ($arrResult2->dataListSet != null) ? $arrResult2->dataListSet : [],
        ]);
    }

    public function title(): string
    {
        return 'Info';
    }
}
