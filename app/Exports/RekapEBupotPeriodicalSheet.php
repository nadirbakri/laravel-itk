<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Validator;
use Session;
use App;

class RekapEBupotPeriodicalSheet implements FromView, WithTitle, WithEvents, ShouldAutoSize
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
                'periodMonth' => (int) date('n', strtotime($this->period)),
                'periodYear' => (int) date('Y', strtotime($this->period)),
                'groupNPWPCode' => $this->npwpGroup,
                'printDate' => $this->printDate,
                'statusPeriod' => "1",
                "languageCode" => App::getLocale(),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID')
            ];

            // if(!empty($this->groupAuthorizedCodeFrom) || !empty($this->groupAuthorizedCodeTo)){
            //     $param['groupAuthorizeCodeFrom'] = (int) $this->groupAuthorizedCodeFrom;
            //     $param['groupAuthorizeCodeTo'] = (int) $this->groupAuthorizedCodeTo;
            // }

            // var_dump(json_encode($param));

            $response = $client->post(env('API_URL') . "/payroll/getEBupot", [
                'body' => json_encode($param)
            ]);

            $arrResult = json_decode($response->getBody()->getContents());

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

        return view('payroll.py_export_csv_espt_report_rekap_periodical_excel', [
            'periodMonth' => (isset($arrResult->dataListSet[0]->periodMonth)) ? $arrResult->dataListSet[0]->periodMonth : (int) date('n', strtotime($this->period)),
            'periodYear' => (isset($arrResult->dataListSet[0]->periodYear)) ? $arrResult->dataListSet[0]->periodYear : (int) date('Y', strtotime($this->period)),
            'jumlah21' => (isset($arrResult->dataListSet[0]->total21)) ? $arrResult->dataListSet[0]->total21 : 0,
            'jumlah26' => (isset($arrResult->dataListSet[0]->total26)) ? $arrResult->dataListSet[0]->total26 : 0,
        ]);
    }

    public function registerEvents(): array
    {
        return [
            \Maatwebsite\Excel\Events\AfterSheet::class => function(\Maatwebsite\Excel\Events\AfterSheet $event) {
                $sheet = $event->sheet;
                $sheet->getDelegate()->getStyle('A1:BN500')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
   
            },
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet;
                $cells = $sheet->getDelegate()->getElementsByTagName('td');
                foreach ($cells as $cell) {
                    $dataFormat = $cell->getAttribute('data-format');

                    // Set format sel jika atribut data-format ditemukan
                    if (!empty($dataFormat)) {
                        $sheet->getStyle($cell->getCoordinate())->getNumberFormat()->setFormatCode($dataFormat);
                    }
                }
   
            },
        ];
    }

    public function title(): string
    {
        return 'Rekap';
    }
}
