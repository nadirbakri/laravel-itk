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

class TransferPaymentToExcelRemainingLimitExport implements FromView, ShouldAutoSize
{
    public function __construct($period, $claimCodeFrom, $claimCodeTo, $includeResign, $position, $ranking, $location, $dataLevel)
    {
        $this->period = $period;
        $this->claimCodeFrom = $claimCodeFrom;
        $this->claimCodeTo = $claimCodeTo;
        $this->includeResign = $includeResign;
        $this->position = $position;
        $this->ranking = $ranking;
        $this->location = $location;
        $this->dataLevel = $dataLevel;
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
                'periode' => $this->period,
                'reportType' => 'R',
                'includeResign' => $this->includeResign,
                'employeeNoFrom' => null,
                'employeeNoTo' => null,
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userName'),
                "logActionUserID" => Session::get('userID')
            ];

            if(!empty($this->claimCodeFrom) || !empty($this->claimCodeTo)){
                $param['claimCodeFrom'] = $this->claimCodeFrom;
                $param['claimCodeTo'] = $this->claimCodeTo;
            }

            if(!empty($this->position) && !is_null($this->position[0])){
                foreach($this->position as $value){
                    $data_position[] = $value;
                }
                $param['position'] = $data_position;
            }

            if(!empty($this->location) && !is_null($this->location[0])){
                foreach($this->location as $value){
                    $data_location[] =$value;
                }
                $param['location'] = $data_location;
            }

            if(!empty($this->ranking) && !is_null($this->ranking[0])){
                foreach($this->ranking as $value){
                    $data_ranking[] = $value;
                }
                $param['ranking'] = $data_ranking;
            }

            if(!empty($this->dataLevel) && !is_null($this->dataLevel[0])){
                foreach($this->dataLevel as $key => $value){
                    $data_level_detail = [];
                    foreach($this->dataLevel[$key] as $value2){
                        $data_level_detail[] =$value2;
                    }
                    $data_level[] = [
                        "levelType" => (string) ($key + 1),
                        "levelCode" => $data_level_detail
                    ];
                }
                $param['levelMaster'] = $data_level;
            }

            // var_dump(json_encode($param));
            $response = $client->post(env('API_URL').'/MdTfPayment/MedicalTransferToExcell', [
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

        // var_dump($arrResult->dataListSet);

        if($arrResult->dataListSet[0] == null){
            return view('medical.md_transfer_payment_to_excel_remaining_limit_excel', [
                'data' => []
            ]);
        }else{
            return view('medical.md_transfer_payment_to_excel_remaining_limit_excel', [
                'data' => $arrResult->dataListSet
            ]); 
        }
    }
}
