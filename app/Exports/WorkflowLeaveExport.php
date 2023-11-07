<?php

namespace App\Exports;

use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class WorkflowLeaveExport implements FromView, ShouldAutoSize
{
    public function __construct($permitDateFrom, $permitDateTo,$businessunit,$dataLevel)
    {
        $this->permitDateFrom = $permitDateFrom;
        $this->permitDateTo = $permitDateTo;
        $this->businessUnit = $businessunit;
        $this->dataLevel = $dataLevel;
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
                // 'startDate' => Carbon::parse($this->permitDateFrom)->format('Y-d-m'),
                // 'endDate' => Carbon::parse($this->permitDateTo)->format('Y-d-m'),
                'startDate' => $this->permitDateFrom,
                'endDate' => $this->permitDateTo,
                'businessUnit' =>$this->businessUnit,
                'exportMenu' => true,
                'companyCode' => Session::get('companyCode'), 
                'languageCode' => App::getLocale(), 
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
            // var_dump(json_encode($param));

            $response = $client->post(env('API_URL') . '/mobile/TmLeave/getLeaveDetailList',
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

        // var_dump($arrResult->dataListSet);
        // exit;

        if($arrResult->dataListSet == null){
            return view('export.exp_workflow_list_leave', [
                'data' => []
            ]);
        }else{
            return view('export.exp_workflow_list_leave', [
                'data' => $arrResult->dataListSet
            ]);
        }
    }
}
