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

class EmployeeGroupMemberExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            $response = $client->post(env('API_URL') . '/mobile/GmGroup/ExportGroupApprovalMember',
                ['body' => json_encode([   
                    'companyCode' => Session::get('companyCode'),
                    "changedNo" => 0,
                    "changedBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    'languageCode' => App::getLocale(), 
                    'sessionID' => 0, 
                    'sessionUserID' => Session::get('userID')
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
            return view('master_data.master_data_export_employee_group_member', [
                'data' => []
            ]);
        }else{
            return view('master_data.master_data_export_employee_group_member', [
                'data' => $arrResult->dataListSet
            ]);
        }
    }
}
