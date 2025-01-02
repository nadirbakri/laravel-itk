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

class EmployeeTransactionTemplateExport implements FromView, ShouldAutoSize
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

            $response = $client->post(env('API_URL') . '/personel/MutationEmployee/TemplateBulkMutation',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'mutationType' => $this->type,
                        'sessionID' => 0,
                        'sessionUserID' => Session::get('userID'), 
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

        // dd($arrResult);
            
        return view('personel.personel_export_template_employee_transaction', [
            'data' => ($arrResult->dataListSet != null) ? $arrResult->dataListSet : []
        ]);
    }
}
