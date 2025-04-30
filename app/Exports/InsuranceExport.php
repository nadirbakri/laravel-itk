<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use Validator;
use Session;
use App;

class InsuranceExport extends DefaultValueBinder implements WithCustomValueBinder, FromView, ShouldAutoSize
{
    public function view(): View
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                'userID' => Session::get('userID'),
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID'),
                'logActionUserID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName'),
                'languageCode' => App::getLocale()
            ];

            // dd(json_encode($param));

            $response = $client->get(env('API_URL') . '/personel/PeMasterInsurance/GetAllInsuranceEmployees',
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
            return view('export.export_personnel_insurance', [ 'data' => [] ]);
        }else{
            return view('export.export_personnel_insurance', [ 'data' => $arrResult->dataListSet ]);
        }
    }
}
