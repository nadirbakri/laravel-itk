<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
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

class CoretaxEBupotSheet extends DefaultValueBinder implements WithCustomValueBinder, FromView, WithTitle, WithEvents, ShouldAutoSize
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

    public function bindValue(Cell $cell, $value)
    {
        if (is_numeric($value)) {
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

            // dd(json_encode($param));

            if ($this->format === "coretax_mp") {
                $response = $client->post(env('API_URL') . "/payroll/getCoretaxMP", [
                    'body' => json_encode($param)
                ]);
            } 
            else {
                $response = $client->post(env('API_URL') . "/payroll/getCoretaxA1", [
                    'body' => json_encode($param)
                ]);
            }

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

        // dd($arrResult->dataListSet);

        if ($this->format === "coretax_mp") {
            return view('payroll.py_export_csv_espt_report_coretax_excel', [
                'data' => (isset($arrResult->dataListSet[0]->coretax_MP)) ? $arrResult->dataListSet[0]->coretax_MP[0] : [],
                'data_company_npwp' => (isset($arrResult->dataListSet[0]->companyNPWP)) ? $arrResult->dataListSet[0]->companyNPWP : "",
            ]);
        }
        else {
            return view('payroll.py_export_csv_espt_report_coretax_excel', [
                'data' => (isset($arrResult->dataListSet[0]->coretax_A1)) ? $arrResult->dataListSet[0]->coretax_A1[0] : [],
                'data_company_npwp' => (isset($arrResult->dataListSet[0]->companyNPWP)) ? $arrResult->dataListSet[0]->companyNPWP : "",
            ]);
        }
    }

    public function registerEvents(): array
    {
        return [
            \Maatwebsite\Excel\Events\BeforeExport::class => function(\Maatwebsite\Excel\Events\BeforeExport $event) {
                $sheet = $event->sheet;
                $sheet->getDelegate()->getStyle('A1:BN2')
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
        if ($this->format === 'coretax_mp') {
            return 'Coretax MP';
        }
        else {
            return 'Coretax A1';
        }
    }
}
