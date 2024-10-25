<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use Validator;
use Session;
use App;

class CBIReportMonthlyExport extends DefaultValueBinder implements WithCustomValueBinder, FromView, WithEvents, ShouldAutoSize
{
    public function __construct($period, $reportType, $claimType)
    {
        $this->period = $period;
        $this->reportType = $reportType;
        $this->claimType = $claimType;
    }

    public function bindValue(Cell $cell, $value)
    {
        if (is_numeric($value) && strlen($value) > 15) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);

            return true;
        }

        // else return default behavior
        return parent::bindValue($cell, $value);
    }

    public function view(): View
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($this->reportType == 'MEDICAL_REIMBURSEMENT_LIMIT'){
                $param = [
                    'companyCode' => Session::get('companyCode'),
                    "periodYear" => (int) date('Y', strtotime($this->period)),
                    "languageCode" => App::getLocale(),
                    "sessionID" => 0,
                    "sessionUserID" => Session::get('userID'),
                    "logActionUsername" => Session::get('userName'),
                    "logActionUserID" => Session::get('userID')
                ];
    
                // dd(json_encode($param));
                $response = $client->post(env('API_URL').'/payroll/getLimitReport', [
                    'body' => json_encode($param)
                ]);
            }else if($this->reportType == 'UNUSED_LEAVE'){
                $param = [
                    'companyCode' => Session::get('companyCode'),
                    "periodYear" => (int) date('Y', strtotime($this->period)),
                    "periodMonth" => (int) date('m', strtotime($this->period)),
                    "languageCode" => App::getLocale(),
                    "sessionID" => 0,
                    "sessionUserID" => Session::get('userID'),
                    "logActionUsername" => Session::get('userName'),
                    "logActionUserID" => Session::get('userID')
                ];
    
                // dd(json_encode($param));
                $response = $client->post(env('API_URL').'/payroll/getUnusedLeave', [
                    'body' => json_encode($param)
                ]);
            }else if($this->reportType == 'MEDICAL_FACILITY_USED'){
                $param = [
                    'companyCode' => Session::get('companyCode'),
                    "periodYear" => (int) date('Y', strtotime($this->period)),
                    "periodMonth" => (int) date('m', strtotime($this->period)),
                    "claimType" => $this->claimType,
                    "languageCode" => App::getLocale(),
                    "sessionID" => 0,
                    "sessionUserID" => Session::get('userID'),
                    "logActionUsername" => Session::get('userName'),
                    "logActionUserID" => Session::get('userID')
                ];
    
                // dd(json_encode($param));
                $response = $client->post(env('API_URL').'/payroll/medicalClaimReport', [
                    'body' => json_encode($param)
                ]);
            }
        }catch (RequestException $e){
            $response = $e->getResponse();
            // dd($response);
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
            if($this->reportType == 'MEDICAL_REIMBURSEMENT_LIMIT'){
                return view('payroll.py_export_cbi_medical_reimbursement_limit_report_excel', [
                    'data' => []
                ]);
            }else if($this->reportType == 'UNUSED_LEAVE'){
                return view('payroll.py_export_cbi_unused_leave_report_excel', [
                    'data' => []
                ]);
            }else if($this->reportType == 'MEDICAL_FACILITY_USED'){
                return view('payroll.py_export_cbi_medical_facility_used_report_excel', [
                    'data' => []
                ]);
            }
            
        }else{
            if($this->reportType == 'MEDICAL_REIMBURSEMENT_LIMIT'){
                return view('payroll.py_export_cbi_medical_reimbursement_limit_report_excel', [
                    'data' => $arrResult->dataListSet
                ]);
            }else if($this->reportType == 'UNUSED_LEAVE'){
                return view('payroll.py_export_cbi_unused_leave_report_excel', [
                    'data' => $arrResult->dataListSet
                ]);
            }else if($this->reportType == 'MEDICAL_FACILITY_USED'){
                return view('payroll.py_export_cbi_medical_facility_used_report_excel', [
                    'data' => $arrResult->dataListSet
                ]);
            }
        }
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet;

                $cells = $sheet->getDelegate()->getElementsByTagName('td');
                foreach ($cells as $cell) {
                    $dataFormat = $cell->getAttribute('data-format');

                    // Set format sel jika atribut data-format ditemukan
                    if (!empty($dataFormat)) {
                        $sheet->getStyle($cell->getCoordinate())->getNumberFormat()->setFormatCode($dataFormat);
                    }
                }
            },
        ];
    }
}
