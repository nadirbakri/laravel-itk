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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $urlReport = '/payroll/JournalReport';
    
            $param = [ 
                'companyCode' => Session::get('companyCode'), 
                'languageCode' => strtoupper(App::getLocale()), 
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID'),
                'logActionUserID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName')
            ];

            if(Session::get('companyCode') == 'SWG' || Session::get('companyCode') == 'XSYS' || 
                Session::get('companyCode') == 'GRC'){
                $urlReport = '/payroll/getSWGGroupJournal';

                if(!empty($this->journalPeriod)){
                    $param['periodMonth'] = (int) date('m', strtotime($this->journalPeriod));
                    $param['periodYear'] = (int) date('Y', strtotime($this->journalPeriod));
                }
            }else{
                if(!empty($this->journalPeriod)){
                    $param['journalPeriod'] = $this->journalPeriod;
                }
        
                if(!empty($this->groupAuthorizeFrom) || !empty($this->groupAuthorizeTo)){
                    $param['groupAuthorizeFrom'] = $this->groupAuthorizeFrom;
                    $param['groupAuthorizeTo'] = $this->groupAuthorizeTo;
                }
            }

            // dd(json_encode($param));
    
            $response = $client->post(env('API_URL').$urlReport,
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
        // dd($arrResult->dataListSet[0]);

        $viewReport = 'payroll.py_export_journal_report_excel';

        if(Session::get('companyCode') == 'SWG' || Session::get('companyCode') == 'XSYS' || 
            Session::get('companyCode') == 'GRC'){
            $viewReport = 'payroll.py_export_journal_report_excel_swg';
        }
    
        if($arrResult->dataListSet == null){
            return view($viewReport, [
                'data' => [], 'companyCode' => Session::get('companyName'), 'period' => (!empty($this->journalPeriod)) ? date('y-M', strtotime($this->journalPeriod)) : ""
            ]);
        }else{
            return view($viewReport, [
                'data' => $arrResult->dataListSet[0], 'companyCode' => Session::get('companyName'), 'period' => (!empty($this->journalPeriod)) ? date('y-M', strtotime($this->journalPeriod)) : ""
            ]); 
        }
    }
}