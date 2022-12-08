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

class ReimbursementExport implements FromView, ShouldAutoSize
{
    public function __construct($claimDateFrom, $claimDateTo, $reimbursementType,$businessUnit,$dataLevel)
    {
        $this->claimDateFrom = $claimDateFrom;
        $this->claimDateTo = $claimDateTo;
        $this->reimbursementType = $reimbursementType;
        $this->businessUnit = $businessUnit;
        $this->dataLevel = $dataLevel;
    }
    public function view(): View
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

        //    var_dump(json_encode(
        //     [
        //             'startDate' => Carbon::parse($this->claimDateFrom)->format('Y-m-d'),
        //             'endDate' => Carbon::parse($this->claimDateTo)->format('Y-m-d'),
        //             // 'endDate' => $this->claimDateTo,
        //             'reimbursementType' => $this->reimbursementType,
        //             'businessUnit'=> $this->businessUnit,
        //             'exportMenu' => true,
        //             'companyCode' => Session::get('companyCode'), 
        //             'languageCode' => App::getLocale(), 
        //             'sessionID' => 0, 
        //             'sessionUserID' => Session::get('userID'),
        //     ]
        //     ));
            
            // if(!empty($this->permitDateFrom) || !empty($this->permitDateTo)){
            //     $param['permitDateFrom'] = $this->permitDateFrom;
            //     $param['permitDateTo'] = $this->permitDateTo;
            // }

            // if(!empty($this->businessUnit) || !empty($this->businessUnit)){
            //     $param['businessUnit'] = $this->businessUnit;
            // }
            // var_dump(json_encode($param));

            $response = $client->post(env('API_URL') . '/tmreimbursement/getreimbursementdetaillistall',
                ['body' => json_encode(
                    [
                            'startDate' => Carbon::parse($this->claimDateFrom)->format('Y-m-d'),
                            'endDate' => Carbon::parse($this->claimDateTo)->format('Y-m-d'),
                            // 'endDate' => $this->claimDateTo,
                            'reimbursementType' => $this->reimbursementType,
                            'businessUnit'=> $this->businessUnit,
                            'exportMenu' => true,
                            'companyCode' => Session::get('companyCode'), 
                            'languageCode' => App::getLocale(), 
                            'sessionID' => 0, 
                            'sessionUserID' => Session::get('userID'),
                    ]
                )]
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

        if($arrResult->dataListSet == null){
            return view('export.export_reimbursement_list', [
                'data' => []
            ]);
        }else{
            return view('export.export_reimbursement_list', [
                'data' => $arrResult->dataListSet
            ]);
        }
    }
}
