<?php

namespace App\Exports;

ini_set('max_execution_time', 180);

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class CustomReportEmployeeExport implements FromView, ShouldAutoSize
{
    public function __construct($employeeNoFrom, $employeeNoTo, $employmentStatus, $includeResign, $groupAuthorizeFrom, $groupAuthorizeTo, $dataField)
    {
        $this->employeeNoFrom = $employeeNoFrom;
        $this->employeeNoTo = $employeeNoTo;
        $this->employmentStatus = $employmentStatus;
        $this->includeResign = $includeResign;
        $this->groupAuthorizeFrom = $groupAuthorizeFrom;
        $this->groupAuthorizeTo = $groupAuthorizeTo;
        $this->dataField = $dataField;
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
                'languageID' => App::getLocale(), 
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID'),
                'includeResign' => $this->includeResign
            ];

            if(!empty($this->employeeNoFrom) || !empty($this->employeeNoTo)){
                $param['employeeNoFrom'] = $this->employeeNoFrom;
                $param['employeeNoTo'] = $this->employeeNoTo;
            }

            if(!empty($this->groupAuthorizeFrom) || !empty($this->groupAuthorizeTo)){
                $param['groupAuthorizeFrom'] = $this->groupAuthorizeFrom;
                $param['groupAuthorizeTo'] = $this->groupAuthorizeTo;
            }

            if(!empty($this->employmentStatus) && !is_null($this->employmentStatus[0])){
                foreach($this->employmentStatus as $value){
                    $data_employment_status[] = $value;
                }
                $param['employmentStatus'] = $data_employment_status;
            }

            if(!empty($this->dataField) && !is_null($this->dataField[0])){
                foreach($this->dataField as $key => $value){
                    $data_field[] = [
                        "fieldName" => $value->fieldName,
                        "columnHeader" => $value->columnHeader
                    ];
                }
                $param['fieldNames'] = $data_field;
            }

            // dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/personel/reportformatemployee/GetReportCustom',
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
            return view('personel.personel_export_custom_report_employee', [
                'data' => []
            ]);
        }else{
            return view('personel.personel_export_custom_report_employee', [
                'data' => $arrResult->dataListSet
            ]);
        }
    }
}
