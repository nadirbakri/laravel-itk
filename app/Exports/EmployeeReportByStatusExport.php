<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;

class EmployeeReportByStatusExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($employeeNoFrom, $employeeNoTo, $periodFrom, $periodTo, $includeResign, $groupAuthorizeFrom, $groupAuthorizeTo, $position, $ranking, $location)
    {
        $this->employeeNoFrom = $employeeNoFrom;
        $this->employeeNoTo = $employeeNoTo;
        $this->periodFrom = $periodFrom;
        $this->periodTo = $periodTo;
        $this->includeResign = $includeResign;
        $this->position = $position;
        $this->ranking = $ranking;
        $this->location = $location;
    }

    public function view(): View
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [ 
                'companyCode' => Session::get('companyCode'), 
                'languageCode' => App::getLocale(), 
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID'),
                'includeResign' => $this->includeResign
            ];

            if(!empty($this->employeeNoFrom) || !empty($this->employeeNoTo)){
                $param['employeeNoFrom'] = $this->employeeNoFrom;
                $param['employeeNoTo'] = $this->employeeNoTo;
            }

            if(!empty($this->periodFrom) || !empty($this->periodTo)){
                $param['periodFrom'] = $this->periodFrom;
                $param['periodTo'] = $this->periodTo;
            }

            var_dump(json_encode ($param));

            $response = $client->post(env('API_URL') . '/employeereportbystatus/getemployeecontract',
                ['body' => json_encode($param)]
            );
        } 
        catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return view('personel.personel_export_employee_report_by_status', [
                'data' => []
            ]);
        }else{
            return view('personel.personel_export_employee_report_by_status', [
                'data' => $arrResult->dataListSet
            ]);
        }
    }
}