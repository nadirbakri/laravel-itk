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
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
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
            // dd(json_encode($param));

            if ($this->format === "coretax_mp") {
                $response = $client->post(env('API_URL') . "/payroll/getCoretaxMP", [
                    'body' => json_encode($param)
                ]);
            } 
            else if ($this->format === "coretax_a1") {
                $response = $client->post(env('API_URL') . "/payroll/getCoretaxA1", [
                    'body' => json_encode($param)
                ]);
            }
            else if ($this->format === "coretax_21") {
                $response = $client->post(env('API_URL') . "/payroll/getCoretax21", [
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
        else if ($this->format === "coretax_a1") {
            return view('payroll.py_export_csv_espt_report_coretax_excel', [
                'data' => (isset($arrResult->dataListSet[0]->coretax_A1)) ? $arrResult->dataListSet[0]->coretax_A1[0] : [],
                'data_company_npwp' => (isset($arrResult->dataListSet[0]->companyNPWP)) ? $arrResult->dataListSet[0]->companyNPWP : "",
            ]);
        }
        else if ($this->format === "coretax_21") {
            return view('payroll.py_export_csv_espt_report_coretax_excel', [
                'data' => (isset($arrResult->dataListSet[0]->coretax_21)) ? $arrResult->dataListSet[0]->coretax_21[0] : [],
                'data_company_npwp' => (isset($arrResult->dataListSet[0]->companyNPWP)) ? $arrResult->dataListSet[0]->companyNPWP : "",
            ]);
        }
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();
                $spreadsheet = $sheet->getParent();
                $dropdownSheet = $spreadsheet->createSheet();
                $dropdownSheet->setTitle('DropdownSheet');
                
                if ($this->format === "coretax_21") {
                    $dropdownMappings = [
                        'Kode Objek Pajak' => [
                            "21-100-35", "21-100-10", "21-100-27", "21-100-07", 
                            "21-100-18", "21-100-19", "21-100-20", "21-100-21",
                            "21-100-22", "21-100-23", "21-100-06", "21-100-05",
                            "21-100-04", "21-100-30", "21-100-31", "21-100-12",
                            "21-100-36", "21-100-14", "21-100-15", "21-100-16",
                            "21-100-17", "21-100-25", "21-100-33", "21-100-34",
                            "21-100-24", "21-100-29", "21-402-04", "21-402-02",
                            "21-402-03", "21-401-01", "21-401-02", "21-100-37",
                        ],
                        'Jenis Dok. Referensi' => [
                            "Announcement", "CommercialInvoice", "Contract", 
                            "CurrentAccount", "Decree", "DeedOfEngagement",
                            "DeedOfGeneral", "Other", "OtherFacilityDoc", 
                            "PaymentProof", "StatementLetter", "TaxInvoice",
                            "TaxRegulationDoc", "TradeConfirmation"
                        ],
                    ];
                    
                    $namedRanges = [];
                    foreach ($dropdownMappings as $key => $values) {
                        $col = chr(65 + count($namedRanges));
                        foreach ($values as $index => $value) {
                            $dropdownSheet->setCellValue("{$col}" . ($index + 1), $value);
                        }
                        $namedRanges[$key] = "DropdownSheet!{$col}1:{$col}" . count($values);
                    }

                    $highestRow = $sheet->getHighestRow();
                    $highestColumn = $sheet->getHighestColumn();

                    // Terapkan dropdown
                    foreach (range('B', $highestColumn) as $col) {
                        $cellValue = $sheet->getCell("{$col}3")->getValue();
                        
                        if (isset($namedRanges[$cellValue])) {
                            $validation = $sheet->getCell("{$col}4")->getDataValidation();
                            $validation->setType(DataValidation::TYPE_LIST);
                            $validation->setAllowBlank(false);
                            $validation->setShowDropDown(true);
                            $validation->setFormula1("=" . $namedRanges[$cellValue]);
                            $validation->setSqref("{$col}4:{$col}{$highestRow}"); // Terapkan untuk seluruh kolom
                        }
                    }
                }
            }
        ];
    }

    public function title(): string
    {
        if ($this->format === 'coretax_mp') {
            return 'Coretax MP';
        }
        else if ($this->format === "coretax_a1") {
            return 'Coretax A1';
        }
        else if ($this->format === "coretax_21") {
            return 'Coretax 21';
        }
    }
}
