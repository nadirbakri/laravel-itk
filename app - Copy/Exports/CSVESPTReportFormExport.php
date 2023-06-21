<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class CSVESPTReportFormExport implements FromView, ShouldAutoSize
{
    public function __construct($format, $period, $rectification, $npwpGroup, $printDate, $groupAuthorizedCodeFrom, $groupAuthorizedCodeTo)
    {
        $this->format = $format;
        $this->period = $period;
        $this->rectification = $rectification;
        $this->npwpGroup = $npwpGroup;
        $this->printDate = $printDate;
        $this->groupAuthorizedCodeFrom = $groupAuthorizedCodeFrom;
        $this->groupAuthorizedCodeTo = $groupAuthorizedCodeTo;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
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
                'periodMonth' => (int) date('n', strtotime($this->period)),
                'periodYear' => (int) date('Y', strtotime($this->period)),
                'pembetulan' => (int) $this->rectification,
                'format' => $this->format,
                'npwpGroup' => $this->npwpGroup,
                'printDate' => $this->printDate,
                "languageCode" => App::getLocale(),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userName'),
                "logActionUserID" => Session::get('userID')
            ];

            if(!empty($this->groupAuthorizedCodeFrom) || !empty($this->groupAuthorizedCodeTo)){
                $param['groupAuthorizeCodeFrom'] = (int) $this->groupAuthorizedCodeFrom;
                $param['groupAuthorizeCodeTo'] = (int) $this->groupAuthorizedCodeTo;
            }

            // var_dump(json_encode($param));

            $response = $client->post(env('API_URL').'/exportcsvspt/getexportcsvspt', [
                'body' => json_encode($param)
            ]);
        }catch (RequestException $e){
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
            if($this->format == "periodical"){
                return view('payroll.py_export_csv_espt_report_form_periodical_excel', [
                    'data' => []
                ]);
            }else if($this->format == "annual"){
                return view('payroll.py_export_csv_espt_report_form_annual_excel', [
                    'data' => []
                ]);
            }else if($this->format == "final"){
                return view('payroll.py_export_csv_espt_report_form_final_excel', [
                    'data' => []
                ]);
            }
        }else{
            if($this->format == "periodical"){
                return view('payroll.py_export_csv_espt_report_form_periodical_excel', [
                    'data' => $arrResult->dataListSet
                ]);
            }else if($this->format == "annual"){
                return view('payroll.py_export_csv_espt_report_form_annual_excel', [
                    'data' => $arrResult->dataListSet
                ]);
            }else if($this->format == "final"){
                return view('payroll.py_export_csv_espt_report_form_final_excel', [
                    'data' => $arrResult->dataListSet
                ]);
            }
        }
    }
}