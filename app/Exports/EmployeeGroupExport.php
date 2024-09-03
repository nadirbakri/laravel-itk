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

class EmployeeGroupExport implements FromView, ShouldAutoSize
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
            
            $response = $client->post(env('API_URL') . '/mobile/GmGroup/ExportGroupApproval',
                ['body' => json_encode([   
                    'companyCode' => Session::get('companyCode'),
                    'type' => $this->type,
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

        switch ($this->type) {
            case 'BUSINESS_TRIP':
                $view = 'master_data.master_data_export_employee_group_business_trip';
                break;
            case 'REIMBURSEMENT':
                $view = 'master_data.master_data_export_employee_group_reimbursement';
                break;
            case 'LEAVE':
                $view = 'master_data.master_data_export_employee_group_leave';
                break;
            case 'PERMIT':
                $view = 'master_data.master_data_export_employee_group_permit';
                break;
            case 'OVERTIME':
                $view = 'master_data.master_data_export_employee_group_overtime';
                break;
            case 'MULTIPLE_CHECK_IN':
                $view = 'master_data.master_data_export_employee_group_multiple_checkin';
                break;
            default:
                $view = 'master_data.master_data_export_employee_group_business_trip';
        }

        $arrResult = json_decode($response->getBody()->getContents());

        // dd($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            return view($view, [
                'data' => []
            ]);
        }else{
            return view($view, [
                'data' => $arrResult->dataListSet
            ]);
        }
    }
}
