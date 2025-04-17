<?php

namespace App\Exports;

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

class PeriodicalReportExport extends DefaultValueBinder implements WithCustomValueBinder, FromView, WithEvents, ShouldAutoSize
{
    public function __construct($reportName, $grandTotal, $employeeNoFrom, $employeeNoTo, $period, $costCenterCodeFrom, $costCenterCodeTo, $grouping, $groupingType, $multiCostCenter, $reportStatus, $reportType, $groupAuthorizedCodeFrom, $groupAuthorizedCodeTo, $displayLine, $printSignature, $position, $ranking, $location, $group, $dataLevel, $reportNameDetail, $groupNameDetail)
    {
        $this->reportName = $reportName;
        $this->grandTotal = $grandTotal;
        $this->employeeNoFrom = $employeeNoFrom;
        $this->employeeNoTo = $employeeNoTo;
        $this->period = $period;
        $this->costCenterCodeFrom = $costCenterCodeFrom;
        $this->costCenterCodeTo = $costCenterCodeTo;
        $this->grouping = $grouping;
        $this->groupingType = $groupingType; 
        $this->multiCostCenter = $multiCostCenter;
        $this->reportStatus = $reportStatus;
        $this->reportType = $reportType;
        $this->groupAuthorizedCodeFrom = $groupAuthorizedCodeFrom;
        $this->groupAuthorizedCodeTo = $groupAuthorizedCodeTo;
        $this->displayLine = $displayLine;
        $this->printSignature = $printSignature;
        $this->position = $position;
        $this->ranking = $ranking;
        $this->location = $location;
        $this->group = $group;
        $this->dataLevel = $dataLevel;
        $this->reportNameDetail = $reportNameDetail;
        $this->groupNameDetail = $groupNameDetail;
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

            $param = [
                'companyCode' => Session::get('companyCode'),
                "reportCode" => $this->reportName,
                "employeeNoFrom" => $this->employeeNoFrom,
                "employeeNoTo" => $this->employeeNoTo,
                "period" => $this->period,
                "statusPeriod" => 0,
                "deptGroup" => $this->grouping,
                "multiCostCenter" => $this->multiCostCenter,
                "reportStatus" => $this->reportStatus,
                "reportType" => $this->reportType,
                "displayLine" => $this->displayLine,
                "printSignature" => $this->printSignature,
                "groupBy" => $this->groupingType,
                "languageCode" => App::getLocale(),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userName'),
                "logActionUserID" => Session::get('userID')
            ];

            $paramGetCompany = [
                'companyCode' => Session::get('companyCode'),
                'languageID' =>App::getLocale(),
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID')
            ];

            if(!empty($this->employeeNoFrom) || !empty($this->employeeNoTo)){
                $param['employeeNoFrom'] = $this->employeeNoFrom;
                $param['employeeNoTo'] = $this->employeeNoTo;
            }

            if(!empty($this->costCenterCodeFrom) || !empty($this->costCenterCodeTo)){
                $param['costCenterFrom'] = $this->costCenterCodeFrom;
                $param['costCenterTo'] = $this->costCenterCodeTo;
            }

            if(!empty($this->groupAuthorizedCodeFrom) || !empty($this->groupAuthorizedCodeTo)){
                $param['groupAuthorizedCodeFrom'] = (int) $this->groupAuthorizedCodeFrom;
                $param['groupAuthorizedCodeTo'] = (int) $this->groupAuthorizedCodeTo;
            }

            if(!empty($this->position) && !is_null($this->position[0])){
                foreach($this->position as $value){
                    $data_position[] = [
                        'positionCode' => $value
                    ];
                }
                $param['position'] = $data_position;
            }

            if(!empty($this->location) && !is_null($this->location[0])){
                foreach($this->location as $value){
                    $data_location[] = [
                        'locationCode' => $value
                    ];
                }
                $param['location'] = $data_location;
            }

            if(!empty($this->ranking) && !is_null($this->ranking[0])){
                foreach($this->ranking as $value){
                    $data_ranking[] = [
                        'rankingCode' => $value
                    ];
                }
                $param['ranking'] = $data_ranking;
            }

            if(!empty($this->group) && !is_null($this->group[0])){
                foreach($this->group as $value){
                    $data_group[] = [
                        'groupCode' => $value
                    ];
                }
                $param['group'] = $data_group;
            }

            if(!empty($this->dataLevel)){
                foreach($this->dataLevel as $key => $value){
                    $data_level_detail = [];
                    if(empty($this->dataLevel[$key])){
                        $data_level_detail[] = ['levelCode' => ''];
                    }else{
                        foreach($this->dataLevel[$key] as $value2){
                            $data_level_detail[] = [
                                'levelCode' => $value2
                            ];
                        }
                    }
                    $data_level[] = [
                        "companyCode" => Session::get('companyCode'),
                        "levelType" => (string) ($key + 1),
                        "level" => $data_level_detail
                    ];
                }
                $param['levelMaster'] = $data_level;
            }

            // dd(json_encode($param));
            $response = $client->post(env('API_URL').'/payroll/GetPeriodicalReport', [
                'body' => json_encode($param)
            ]);

            $responseGetCompany = $client->post(env('API_URL').'/personel/Company/getcompany', [
                'body' => json_encode($paramGetCompany)
            ]);
        }catch (RequestException $e){
            $response = $e->getResponse();
            // dd($response);
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());
        $arrCompany = json_decode($responseGetCompany->getBody()->getContents());

        // dd($arrResult->dataListSet);

        // $total = [];
        // $totalEmployee = 0;
        // for($i = 0; $i < count($arrResult->dataListSet[0]->departementGroup); $i++){
        //     $dataTable = $arrResult->dataListSet[0]->departementGroup[$i];
        //     $branch = null;
        //     if(!empty($dataTable->data)){
        //         $totalEmployee += count($dataTable->data);
        //         foreach($dataTable->data as $key => $dataRow) {
        //             foreach($dataRow->field as $key2 => $dataRow2) {
        //                 if($dataRow2->tableName === 'Company') {
        //                     $branch = $dataRow2->value;
        //                 }
        //             }
        //         }
        //     }
        // }

        // dd('');

        // foreach ($arrResult->dataListSet[0]->detail as $key => $dataTable) {
        //     var_dump($dataTable->employeeNo);
        //     var_dump(count($dataTable->field));
        //     foreach ($dataTable->field as $key2 => $dataTable2) {
        //         if (!is_string($dataTable2->value) && $dataTable2->dataFormat == "#,##0") {
        //             $totalKey = $dataTable2->field . '_' . $key2;
        //             $total[$totalKey] += $dataTable2->value;
        //         } else if (!is_string($dataTable2->value) && $dataTable2->dataFormat == "#,##0.00") {
        //             $totalKey = $dataTable2->field . '_' . $key2;
        //             $total[$totalKey] += $dataTable2->value;
        //         }
        //     }
        // }
        // exit;

        // $total = [];
        // $totalEmployee = 0;
        // foreach ($arrResult->dataListSet[0]->departementGroup as $detailKey => $detail) {
        //     $branch = null;
        //     $totalEmployee += count($detail->data);
        //     foreach($detail->data as $key => $dataRow) {
        //         foreach($dataRow->field as $key2 => $dataRow2) {
        //             if($dataRow2->tableName === 'Company') {
        //                 $branch = $dataRow2->value;
        //             }
        //         }
        //     }
        //     if(!empty($detail->data[0]->field)){
        //         foreach($detail->data[0]->field as $key_data => $dataRow){
        //             if(!is_string($dataRow->value)){
        //                 $totalKey = $dataRow->field . '_' . $key_data;
        //                 $total[$branch][$totalKey] = 0;
        //                 $totalBranch[$branch] = 0;
        //             }else{
        //                 $totalKey = $dataRow->field . '_' . $key_data;
        //                 if($totalKey == 'EmployeeNo_0'){
        //                     $total[$branch][$totalKey] = count($detail->data);
        //                 }else{
        //                     $total[$branch][$totalKey] = '';
        //                 }
        //             }
        //         }
        //     }
        //     foreach ($detail->data as $key => $value) {
        //         // Loop melalui array 'field'
        //         foreach ($value->field as $fieldKey => $field) {
        //             if (!is_string($field->value)) {
        //                 // var_dump($field->field);
        //                 $totalKey = $field->field . '_' . $fieldKey;
        //                 $total[$branch][$totalKey] = 0;
        //                 $totalBranch[$branch] = 0;
        //             } else {
        //                 $totalKey = $field->field . '_' . $fieldKey;
        //                 if($totalKey == 'EmployeeNo_0'){
        //                     $total[$branch][$totalKey] = count($detail->data);
        //                 }else{
        //                     $total[$branch][$totalKey] = '';
        //                 }
        //             }
        //         }
        //     }
        // }
        // dd($total);
        // exit;

        // $indexes = [];

        // Loop melalui array 'detail'
        // foreach ($arrResult->dataListSet[0]->departementGroup as $detailKey => $detail) {
        //     foreach ($detail->data as $key => $value) {
        //         // Loop melalui array 'field'
        //         foreach ($value->field as $fieldKey => $field) {
        //             if ($field->field === 'BasicSalary') {
        //                 // Simpan indeks array yang ditemukan
        //                 $indexes[$value->employeeNo] = $fieldKey;
        //             }
        //         }
        //     }
        // }

        // Check Total
        // foreach ($arrResult->dataListSet[0]->detail[0]->field as $key => $dataTable) {
        //     if(!empty($dataTable->value) && !is_string($dataTable->value)){
        //         $totalKey = $dataTable->field . '_' . $key;
        //         $total[$totalKey] = 0;
        //     }else{
        //         $totalKey = $dataTable->field . '_' . $key;
        //         $total[$totalKey] = '';
        //     }
        // }

        // foreach ($arrResult->dataListSet[0]->detail as $key => $dataTable) {
        //     foreach ($dataTable->field as $key2 => $dataTable2) {
        //         if (!empty($dataTable2->value) && !is_string($dataTable2->value) && $dataTable2->dataFormat == "#,##0") {
        //             $totalKey = $dataTable2->field . '_' . $key2;
        //             $total[$totalKey] += $dataTable2->value;
        //         } else if (!empty($dataTable2->value) && !is_string($dataTable2->value) && $dataTable2->dataFormat == "#,##0.00") {
        //             $totalKey = $dataTable2->field . '_' . $key2;
        //             $total[$totalKey] += $dataTable2->value;
        //         }
        //     }
        // }

        // Storage::put('debug_data.txt', json_encode($arrResult->dataListSet));
        // dd(implode(', ', $indexes));
        // dd($indexes);
        // dd($this->groupNameDetail);
        // exit;

        if($arrResult->dataListSet == null){
            return view('payroll.py_export_periodical_report_excel', [
                'param' => $param, 'grandTotal' => [], 'data' => [], 'data_company' => $arrCompany->dataListSet, 'data_period' => $this->period, 'grand_total' => $this->grandTotal, 'print_signature' => $this->printSignature, 'level1' => $this->dataLevel[0], 'report_name' => $this->reportNameDetail, 'group_name' => $this->groupNameDetail, 'company' => Session::get('companyCode')
            ]);
        }else{
            $total = [];
            
            if(Session::get('companyCode') == 'NMDI' || Session::get('companyCode') == 'CITROEN'){
                if(isset($arrResult->dataListSet[0]->detail)){
                    usort($arrResult->dataListSet[0]->detail, function ($a, $b) {
                        return (int) $a->employeeNo - (int) $b->employeeNo;
                    });
                }

                if(isset($arrResult->dataListSet[0]->summary)){
                    usort($arrResult->dataListSet[0]->summary, function ($a, $b) {
                        return (int) $a->employeeNo - (int) $b->employeeNo;
                    });
                }

                $branch = null;
                
                foreach ($arrResult->dataListSet[0]->departementGroup as $key => $dept) {
                    $totalEmployee = count($dept->data);
                    foreach ($dept->data as $key => $value) {
                        foreach ($value->field as $k => $v) {
                            // if ($v->tableName === 'Company') {
                            //     // $branch = $v->value;
                            //     // if (!isset($total[$branch])) {
                            //     //     $total[$branch] = [];
                            //     // }
                            // }
                            if (!is_string($v->value) && !empty($v->value)) {
                                // $total[$branch][$v->field . '_' . $k] = (isset($total[$branch][$v->field . '_' . $k])) ? $total[$branch][$v->field . '_' . $k] + $v->value : $v->value;
                                $total[$v->field . '_' . $k] = (isset($total[$v->field . '_' . $k]) && !empty($total[$v->field . '_' . $k])) ? $total[$v->field . '_' . $k] + $v->value : $v->value;
                            }else{
                                if($v->field == 'EmployeeNo'){
                                    // $total[$branch][$v->field . '_' . $k] = (isset($total[$branch][$v->field . '_' . $k])) ? $total[$branch][$v->field . '_' . $k] + $totalEmployee : $totalEmployee;
                                    $total[$v->field . '_' . $k] = (isset($total[$v->field . '_' . $k])) ? $total[$v->field . '_' . $k] + $totalEmployee : $totalEmployee;
                                    $totalEmployee = 0;
                                }else{
                                    // $total[$branch][$v->field . '_' . $k] = '';
                                    $total[$v->field . '_' . $k] = '';
                                }
                            }
                        }
                    }
                }
            }else{
                if(isset($arrResult->dataListSet[0]->detail)){
                    usort($arrResult->dataListSet[0]->detail, function ($a, $b) {
                        return (int) $a->employeeNo - (int) $b->employeeNo;
                    });
                }

                if(isset($arrResult->dataListSet[0]->summary)){
                    usort($arrResult->dataListSet[0]->summary, function ($a, $b) {
                        return (int) $a->employeeNo - (int) $b->employeeNo;
                    });
                }
                
                foreach ($arrResult->dataListSet[0]->departementGroup as $key => $dept) {
                    $totalEmployee = count($dept->data);
                    foreach ($dept->data as $key => $value) {
                        foreach ($value->field as $k => $v) {
                            if (($v->value !== NULL) && !is_string($v->value)) {
                                $total[$v->field . '_' . $k] = (isset($total[$v->field . '_' . $k])) ? $total[$v->field . '_' . $k] + $v->value : $v->value;
                            }else{
                                if($v->field == 'EmployeeNo'){
                                    $total[$v->field . '_' . $k] = (isset($total[$v->field . '_' . $k])) ? $total[$v->field . '_' . $k] + $totalEmployee : $totalEmployee;
                                    $totalEmployee = 0;
                                }else{
                                    $total[$v->field . '_' . $k] = '';
                                }
                            }
                        }
                    }
                }
            }

            // dd($total);

            return view('payroll.py_export_periodical_report_excel', [
                'param' => $param, 'grandTotal' => $total, 'data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet, 'data_period' => $this->period, 'grand_total' => $this->grandTotal, 'print_signature' => $this->printSignature, 'level1' => $this->dataLevel[0], 'report_name' => $this->reportNameDetail, 'group_name' => $this->groupNameDetail, 'company' => Session::get('companyCode')
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
