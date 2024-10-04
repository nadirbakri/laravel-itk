<?php

namespace App\Exports;
ini_set('memory_limit', '4096M');

use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use Illuminate\Support\Facades\Storage;
use Validator;
use Session;
use App;

class ReimbursementExport extends DefaultValueBinder implements WithCustomValueBinder, FromView, WithEvents, ShouldAutoSize
{
    public function __construct($claimDateFrom, $claimDateTo, $reimbursementType, $businessUnit, $dataLevel, $status)
    {
        $this->claimDateFrom = $claimDateFrom;
        $this->claimDateTo = $claimDateTo;
        $this->reimbursementType = $reimbursementType;
        $this->businessUnit = $businessUnit;
        $this->dataLevel = $dataLevel;
        $this->status = ($status == 'ALL') ? null : $status;
    }

    public function bindValue(Cell $cell, $value)
    {
        if (is_numeric($value) && strlen($value) > 15) {
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

            $response = $client->post(env('API_URL') . '/mobile/TmReimbursement/getReimbursementDetailListAllWeb',
                ['body' => json_encode(
                    [
                        'startDate' => Carbon::parse($this->claimDateFrom)->format('Y-m-d'),
                        'endDate' => Carbon::parse($this->claimDateTo)->format('Y-m-d'),
                        'reimbursementType' => $this->reimbursementType,
                        'businessUnit'=> $this->businessUnit,
                        'exportMenu' => false,
                        'isWeb' => true,
                        'status' => $this->status,
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => strtoupper(App::getLocale()), 
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                        'userID' => Session::get('userID'),
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

        // dd($arrResult->dataListSet);

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

    public function registerEvents(): array
    {
        return [
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
}
