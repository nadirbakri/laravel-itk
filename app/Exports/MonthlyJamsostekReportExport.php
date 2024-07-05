<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use Validator;
use Session;
use App;

class MonthlyJamsostekReportExport extends DefaultValueBinder implements WithCustomValueBinder, FromView, ShouldAutoSize
{
    public function __construct($jamsostekReportType, $jamsostekPeriod, $groupAuthorizeCodeFrom, $groupAuthorizeCodeTo, $groupBPJSCode, $groupBPJSName)
    {
        $this->jamsostekReportType = $jamsostekReportType;
        $this->jamsostekPeriod = $jamsostekPeriod;
        $this->groupAuthorizeCodeFrom = $groupAuthorizeCodeFrom;
        $this->groupAuthorizeCodeTo = $groupAuthorizeCodeTo;
        $this->groupBPJSCode = $groupBPJSCode;
        $this->groupBPJSName = $groupBPJSName;
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

            $param = [ 
                'companyCode' => Session::get('companyCode'), 
                'languageID' => App::getLocale(),
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID'),
            ];

            if(!empty($this->jamsostekPeriod)){
                $param['periodYear'] = (int) date('Y', strtotime($this->jamsostekPeriod));
                $param['periodMonth'] = (int) date('m', strtotime($this->jamsostekPeriod));
            }

            if(!empty($this->groupAuthorizeCodeFrom) || !empty($this->groupAuthorizeCodeTo)){
                $param['gAuthFrom'] = $this->groupAuthorizeCodeFrom;
                $param['gAuthTo'] = $this->groupAuthorizeCodeTo;
            }

            if(!empty($this->groupBPJSCode)){
                $param['groupBPJS'] = $this->groupBPJSCode;
            }

            // dd(json_encode($param));

            if($this->jamsostekReportType == 'formulir2'){
                $response = $client->post(env('API_URL').'/payroll/getRincianIuran', [
                    'body' => json_encode($param)
                ]);
            }else if($this->jamsostekReportType == 'formulir1a'){
                $response = $client->post(env('API_URL').'/payroll/getDaftarTenagaKerja', [
                    'body' => json_encode($param)
                ]);
            }else if($this->jamsostekReportType == 'formulir1b'){
                $response = $client->post(env('API_URL').'/payroll/getDaftarTenagaKerjaKeluar', [
                'body' => json_encode($param)
                ]);
            }else if($this->jamsostekReportType == 'formulir2a'){
                $response = $client->post(env('API_URL').'/payroll/getPerubahanUpahTenagaKerja', [
                    'body' => json_encode($param)
                ]);
            }
        } catch (RequestException $e) {
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
            if($this->jamsostekReportType == 'formulir2'){
                return view('payroll.py_export_monthly_jamsostek_formulir2_report_excel', [
                    'data' => [],
                    'period' => $this->jamsostekPeriod,
                    'companyName' => Session::get('companyName'),
                    'bpjsNo' => $this->groupBPJSName
                ]);
            }else if($this->jamsostekReportType == 'formulir1a'){
                return view('payroll.py_export_monthly_jamsostek_formulir1a_report_excel', [
                    'data' => [],
                    'period' => $this->jamsostekPeriod,
                    'companyName' => Session::get('companyName'),
                    'bpjsNo' => $this->groupBPJSName
                ]);
            }else if($this->jamsostekReportType == 'formulir1b'){
                return view('payroll.py_export_monthly_jamsostek_formulir1b_report_excel', [
                    'data' => [],
                    'period' => $this->jamsostekPeriod,
                    'companyName' => Session::get('companyName'),
                    'bpjsNo' => $this->groupBPJSName
                ]);
            }else if($this->jamsostekReportType == 'formulir2a'){
                return view('payroll.py_export_monthly_jamsostek_formulir2a_report_excel', [
                    'data' => [],
                    'period' => $this->jamsostekPeriod,
                    'companyName' => Session::get('companyName'),
                    'bpjsNo' => $this->groupBPJSName
                ]);
            }
        }else{
            if($this->jamsostekReportType == 'formulir2'){
                return view('payroll.py_export_monthly_jamsostek_formulir2_report_excel', [
                    'data' => $arrResult->dataListSet,
                    'period' => $this->jamsostekPeriod,
                    'companyName' => Session::get('companyName'),
                    'bpjsNo' => $this->groupBPJSName
                ]);
            }else if($this->jamsostekReportType == 'formulir1a'){
                return view('payroll.py_export_monthly_jamsostek_formulir1a_report_excel', [
                    'data' => $arrResult->dataListSet,
                    'period' => $this->jamsostekPeriod,
                    'companyName' => Session::get('companyName'),
                    'bpjsNo' => $this->groupBPJSName
                ]);
            }else if($this->jamsostekReportType == 'formulir1b'){
                return view('payroll.py_export_monthly_jamsostek_formulir1b_report_excel', [
                    'data' => $arrResult->dataListSet,
                    'period' => $this->jamsostekPeriod,
                    'companyName' => Session::get('companyName'),
                    'bpjsNo' => $this->groupBPJSName
                ]);
            }else if($this->jamsostekReportType == 'formulir2a'){
                return view('payroll.py_export_monthly_jamsostek_formulir2a_report_excel', [
                    'data' => $arrResult->dataListSet,
                    'period' => $this->jamsostekPeriod,
                    'companyName' => Session::get('companyName'),
                    'bpjsNo' => $this->groupBPJSName
                ]);
            }
        }
    }
}
