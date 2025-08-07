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

class PeMasterLeaveExport implements FromView, ShouldAutoSize
{
    public function __construct($chooseSpecificEmployeeNo, $employeeNo, $chooseSpecificLeaveCode, $leaveCode, $employeeStatus)
    {
        $this->chooseSpecificEmployeeNo = $chooseSpecificEmployeeNo;
        $this->employeeNo = $employeeNo;
        $this->chooseSpecificLeaveCode = $chooseSpecificLeaveCode;
        $this->leaveCode = $leaveCode;
        $this->employeeStatus = $employeeStatus;
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
                'companyCode' => Session::get('companyCode'), 
                'languageCode' => App::getLocale(), 
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID'),
                "employeeStatus" => $this->employeeStatus
            ];

            if($this->chooseSpecificEmployeeNo){
                $param['employeeNo'] = $this->employeeNo;
            }else{
                $param['employeeNo'] = "";
            }

            if($this->chooseSpecificLeaveCode){
                $param['leaveCode'] = $this->leaveCode;
            }else{
                $param['leaveCode'] = "";
            }

            // dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/personel/PeMasterLeave/getPeMasterLeave',
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

        // dd($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            return view('time_management.tm_export_pemaster_leave_list', [
                'data' => []
            ]);
        }else{
            return view('time_management.tm_export_pemaster_leave_list', [
                'data' => $arrResult->dataListSet
            ]);
        }
    }
}
