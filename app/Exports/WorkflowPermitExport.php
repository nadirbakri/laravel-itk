<?php

namespace App\Exports;
ini_set('memory_limit', '4096M');

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class WorkflowPermitExport implements FromView, ShouldAutoSize
{
    public function __construct($permitDateFrom, $permitDateTo,$businessunit,$dataLevel,$status)
    {
        $this->permitDateFrom = $permitDateFrom;
        $this->permitDateTo = $permitDateTo;
        $this->businessUnit = $businessunit;
        $this->dataLevel = $dataLevel;
        $this->status = ($status == 'ALL') ? null : $status;
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
                // 'exportReimbursement' => true,
                'startDate' => $this->permitDateFrom,
                'endDate' => $this->permitDateTo,
                'businessUnit' =>$this->businessUnit,
                'exportMenu' => false,
                'isWeb' => true,
                'status' => $this->status,
                'companyCode' => Session::get('companyCode'), 
                'languageCode' => App::getLocale(), 
                'userID' => Session::get('userID'),
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID')
            ];

            // if(!empty($this->permitDateFrom) || !empty($this->permitDateTo)){
            //     $param['permitDateFrom'] = $this->permitDateFrom;
            //     $param['permitDateTo'] = $this->permitDateTo;
            // }

            // if(!empty($this->businessUnit) || !empty($this->businessUnit)){
            //     $param['businessUnit'] = $this->businessUnit;
            // }
            // dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/mobile/TmPermit/getTmPermitDetailListWeb',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
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

        // dd($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            return view('export.export_workflow_list', [
                'data' => []
            ]);
        }else{
            return view('export.export_workflow_list', [
                'data' => $arrResult->dataListSet
            ]);
        }
    }
}
