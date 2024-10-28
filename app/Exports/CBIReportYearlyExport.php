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

class CBIReportYearlyExport extends DefaultValueBinder implements WithCustomValueBinder, FromView, WithEvents, ShouldAutoSize
{
    public function __construct($period, $reportType)
    {
        $this->period = $period;
        $this->reportType = $reportType;
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

            if($this->reportType == 'SALARY_SUMMARY'){
                $param = [
                    'companyCode' => Session::get('companyCode'),
                    "languageCode" => App::getLocale(),
                    "sessionID" => 0,
                    "sessionUserID" => Session::get('userID'),
                    "logActionUsername" => Session::get('userName'),
                    "logActionUserID" => Session::get('userID')
                ];
    
                // dd(json_encode($param));
                $response = $client->post(env('API_URL').'/payroll/monthlySummaryReport', [
                    'body' => json_encode($param)
                ]);
            }else if($this->reportType == 'YEARLY_RECAP_JAMSOSTEK_REPORT'){
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
                $response = $client->post(env('API_URL').'/payroll/yearlyRecapJamsostekReport', [
                    'body' => json_encode($param)
                ]);
            }else if($this->reportType == 'YEARLY_RECAP_REPORT'){
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
                $response = $client->post(env('API_URL').'/payroll/yearlyRecapReport', [
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
            if($this->reportType == 'SALARY_SUMMARY'){
                return view('payroll.py_export_cbi_salary_summary_report_excel', [
                    'data' => []
                ]);
            }else if($this->reportType == 'YEARLY_RECAP_JAMSOSTEK_REPORT'){
                return view('payroll.py_export_cbi_yearly_recap_jamsostek_report_excel', [
                    'data' => []
                ]);
            }else if($this->reportType == 'YEARLY_RECAP_REPORT'){
                return view('payroll.py_export_cbi_yearly_recap_report_excel', [
                    'data' => []
                ]);
            }
            
        }else{
            if($this->reportType == 'SALARY_SUMMARY'){
                return view('payroll.py_export_cbi_salary_summary_report_excel', [
                    'data' => $arrResult->dataListSet
                ]);
            }else if($this->reportType == 'YEARLY_RECAP_JAMSOSTEK_REPORT'){
                return view('payroll.py_export_cbi_yearly_recap_jamsostek_report_excel', [
                    'data' => $arrResult->dataListSet
                ]);
            }else if($this->reportType == 'YEARLY_RECAP_REPORT'){
                return view('payroll.py_export_cbi_yearly_recap_report_excel', [
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
