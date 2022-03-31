<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;

class TemplatePersonalDataInfoSheet implements FromView, WithTitle
{
    public function view(): View
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/comgen/getcomgen',
                ['body' => json_encode(
                    [
                        'languageCode' => App::getLocale()
                    ]
                )]
            );

            $response2 = $client->post(env('API_URL') . '/costcenter/getcostcenter',
                ['body' => json_encode(
                    [
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response3 = $client->post(env('API_URL') . '/location/getlocation',
                ['body' => json_encode(
                    [
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response4 = $client->post(env('API_URL') . '/grade/getgrade',
                ['body' => json_encode(
                    [
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response5 = $client->post(env('API_URL') . '/position/getposition',
                ['body' => json_encode(
                    [
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response6 = $client->post(env('API_URL') . '/gmranking/getgmranking',
                ['body' => json_encode(
                    [
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response7 = $client->post(env('API_URL') . '/worknature/getworknature',
                ['body' => json_encode(
                    [
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response8 = $client->post(env('API_URL') . '/group/getgroup',
                ['body' => json_encode(
                    [
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response9 = $client->post(env('API_URL') . '/groupauthorize/getgroupauthorize',
                ['body' => json_encode(
                    [
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response10 = $client->post(env('API_URL') . '/tmworkpattern/gettmworkpatternservice',
                ['body' => json_encode(
                    [
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response11 = $client->post(env('API_URL') . '/npwp/getnpwp',
                ['body' => json_encode(
                    [
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response12 = $client->post(env('API_URL') . '/bpjs/getbpjs',
                ['body' => json_encode(
                    [
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response13 = $client->post(env('API_URL') . '/gmbank/getgmbank',
                ['body' => json_encode(
                    [
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response14 = $client->post(env('API_URL') . '/companybank/getcompanybank',
                ['body' => json_encode(
                    [
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $arrResult = json_decode($response->getBody()->getContents());
            $arrResult2 = json_decode($response2->getBody()->getContents());
            $arrResult3 = json_decode($response3->getBody()->getContents());
            $arrResult4 = json_decode($response4->getBody()->getContents());
            $arrResult5 = json_decode($response5->getBody()->getContents());
            $arrResult6 = json_decode($response6->getBody()->getContents());
            $arrResult7 = json_decode($response7->getBody()->getContents());
            $arrResult8 = json_decode($response8->getBody()->getContents());
            $arrResult9 = json_decode($response9->getBody()->getContents());
            $arrResult10 = json_decode($response10->getBody()->getContents());
            $arrResult11 = json_decode($response11->getBody()->getContents());
            $arrResult12 = json_decode($response12->getBody()->getContents());
            $arrResult13 = json_decode($response13->getBody()->getContents());
            $arrResult14 = json_decode($response14->getBody()->getContents());

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

        return view('personel.personel_export_template_personal_data_info_sheet', [
            'data' => ($arrResult->dataListSet != null) ? $arrResult->dataListSet : [],
            'data2' => ($arrResult2->dataListSet != null) ? $arrResult2->dataListSet : [],
            'data3' => ($arrResult3->dataListSet != null) ? $arrResult3->dataListSet : [],
            'data4' => ($arrResult4->dataListSet != null) ? $arrResult4->dataListSet : [],
            'data5' => ($arrResult5->dataListSet != null) ? $arrResult5->dataListSet : [],
            'data6' => ($arrResult6->dataListSet != null) ? $arrResult6->dataListSet : [],
            'data7' => ($arrResult7->dataListSet != null) ? $arrResult7->dataListSet : [],
            'data8' => ($arrResult8->dataListSet != null) ? $arrResult8->dataListSet : [],
            'data9' => ($arrResult9->dataListSet != null) ? $arrResult9->dataListSet : [],
            'data10' => ($arrResult10->dataListSet != null) ? $arrResult10->dataListSet : [],
            'data11' => ($arrResult11->dataListSet != null) ? $arrResult11->dataListSet : [],
            'data12' => ($arrResult12->dataListSet != null) ? $arrResult12->dataListSet : [],
            'data13' => ($arrResult13->dataListSet != null) ? $arrResult13->dataListSet : [],
            'data14' => ($arrResult14->dataListSet != null) ? $arrResult14->dataListSet : []
        ]);
    }

    public function title(): string
    {
        return 'Info';
    }
}
