<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class JournalTemplateReportExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode')
            ];

            // dd(json_encode($param));
            $response = $client->post(env('API_URL').'/payroll/ExportJournalTemplate', [
                'body' => json_encode($param)
            ]);
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
            return view('payroll.py_export_journal_template_report_excel', [
                'data' => []
            ]);
        }else{
            return view('payroll.py_export_journal_template_report_excel', [
                'data' => $arrResult->dataListSet[0]
            ]); 
        }
    }
}
