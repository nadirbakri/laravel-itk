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

class JournalReportExcel implements FromView, ShouldAutoSize{
    public function __construct($journalPeriod, $groupAuthorizeFrom, $groupAuthorizeTo){
        $this->journalPeriod = $journalPeriod;
        $this->groupAuthorizeFrom = $groupAuthorizeFrom;
        $this->groupAuthorizeTo = $groupAuthorizeTo;
    }

    public function view(): View{
        try{
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
    
            $param = [ 
                'companyCode' => Session::get('companyCode'), 
                'languageCode' => App::getLocale(), 
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID')
            ];
    
            if(!empty($this->journalPeriod)){
                $param['journalPeriod'] = $this->journalPeriod;
            }
    
            if(!empty($this->groupAuthorizeFrom) || !empty($this->groupAuthorizeTo)){
                $param['groupAuthorizeFrom'] = $this->groupAuthorizeFrom;
                $param['groupAuthorizeTo'] = $this->groupAuthorizeTo;
            }

            // var_dump(json_encode($param));
    
            $response = $client->post(env('API_URL').'/PrJournalReport/JournalReport',
            ['body' => json_encode($param)]);

        }catch(RequestException $e){
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
        // var_dump($arrResult->dataListSet[0]);
    
        if($arrResult->dataListSet == null){
            return view('payroll.py_export_journal_report_excel', [
                'data' => []
            ]);
        }else{
            return view('payroll.py_export_journal_report_excel', [
                'data' => [$arrResult->dataListSet[0]]
            ]); 
        }
    }
}