<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\ShouldQueue;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class CSVESPTReportFormExport implements FromView, ShouldAutoSize, ShouldQueue
{
    public function __construct($format, $periodMonth, $periodYear, $rectification, $npwpGroup, $printDate, $groupAuthorizedCodeFrom, $groupAuthorizedCodeTo)
    {
        $this->format = $format;
        $this->periodMonth = $periodMonth;
        $this->periodYear = $periodYear;
        $this->rectification = $rectification;
        $this->npwpGroup = $npwpGroup;
        $this->printDate = $printDate;
        $this->groupAuthorizedCodeFrom = $groupAuthorizedCodeFrom;
        $this->groupAuthorizedCodeTo = $groupAuthorizedCodeTo;
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
                'periodMonth' => (int) $this->periodMonth,
                'periodYear' => (int) $this->periodYear,
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

            var_dump(json_encode($param));

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

        if ($arrResult->dataListSet[0] !== null)
        {
            $arraySend[] = $arrResult->dataListSet[0];
        } else {
            $arraySend[] = [];
        }

        if($arrResult->dataListSet[0] == null){
            return view('payroll.py_export_csv_espt_report_form_excel', [
                'data' => []
            ]);
        }else{
            return view('payroll.py_export_csv_espt_report_form_excel', [
                'data' => $arraySend
            ]); 
        }
    }
}