<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class EmployeeReportByStatusExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($employeeNoFrom, $employeeNoTo, $periodFrom, $periodTo, $reportType, $includeResign)
    {
        $this->employeeNoFrom = $employeeNoFrom;
        $this->employeeNoTo = $employeeNoTo;
        $this->periodFrom = $periodFrom;
        $this->periodTo = $periodTo;
        $this->reportType = $reportType;
        $this->includeResign = $includeResign;
    }

    public function view(): View
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // if(!empty($this->employeeNoFrom) || !empty($this->employeeNoTo)){
            //     $param['employeeNoFrom'] = $this->employeeNoFrom;
            //     $param['employeeNoTo'] = $this->employeeNoTo;
            // }

            // if(!empty($this->periodFrom) || !empty($this->periodTo)){
            //     $param['periodFrom'] = $this->periodFrom;
            //     $param['periodTo'] = $this->periodTo;
            // }

            if ($this->reportType=='contract') {
                $URL = '/personel/employeereportbystatus/getemployeereportcontract';
            }

            else if ($this->reportType=='terminate') {
                $URL = '/personel/EmployeeReportByStatus/getEmployeeReportTerminate';
            }
            
            else {
                $URL = '/personel/EmployeeReportByStatus/getEmployeeReportProbation';
            }

            // var_dump(json_encode(
            //     [   
            //     'companyCode' => Session::get('companyCode'),
            //     'employeeNoFrom' => $this->employeeNoFrom,
            //     'employeeNoTo' => $this->employeeNoTo, 
            //     'periodFrom' => $this->periodFrom,
            //     'periodTo' => $this->periodTo,
            //     'languageCode' => App::getLocale(), 
            //     'sessionID' => 0, 
            //     'sessionUserID' => Session::get('userID'),
            //     'includeResign' => $this->includeResign
            //     ]
            // ));
            

            $response = $client->post(env('API_URL') . $URL,
                ['body' => json_encode(
                    [   
                    'companyCode' => Session::get('companyCode'),
                    'employeeNoFrom' => $this->employeeNoFrom,
                    'employeeNoTo' => $this->employeeNoTo, 
                    'periodFrom' => $this->periodFrom,
                    'periodTo' => $this->periodTo,
                    'languageID' => App::getLocale(), 
                    'sessionID' => 0, 
                    'sessionUserID' => Session::get('userID'),
                    'includeResign' => $this->includeResign
                    ]
                )]
            );
        } 
        catch (RequestException $e) {
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
            return view('personel.personel_export_employee_report_by_status', [
                'data' => [], 'report_type' => $this->reportType
            ]);
        }else{
            return view('personel.personel_export_employee_report_by_status', [
                'data' => $arrResult->dataListSet, 'report_type' => $this->reportType
            ]);
        }
    }
}