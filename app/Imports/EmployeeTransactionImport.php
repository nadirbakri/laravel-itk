<?php

namespace App\Imports;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Storage;
use Session;
use App;

class EmployeeTransactionImport implements ToCollection, SkipsEmptyRows, WithStartRow, WithChunkReading
{
    private $arrResult = [];

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return Carbon::instance(Date::excelToDateTimeObject($value))->format('Y-m-d');
        } catch (\Throwable $e) {
            return Carbon::createFromFormat($format, date('Y-m-d', strtotime($value)))->format('Y-m-d');
        }
    }

    public function collection(Collection $rows)
    {
        $transactionData = [];
        $companyCode = Session::get('companyCode');

        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $headerRow = $rows->shift();
            $levelType = [];

            foreach ($headerRow as $key => $value) {
                
                if (strpos($value, 'Level Code') !== false) {
                    $parts = explode("-", $value);
                    $result = ltrim($parts[1]);    
                    $levelType[] = [
                        'levelType' => $result,
                        'index' => $key
                    ];
                }            
            }

            $rules = [
                '*.0' => 'required|not_in:NULL',
                '*.1' => 'required|not_in:NULL'
            ];

            $messages = [
                '*.0.required' => 'Company Code is Required',
                '*.0.not_in' => 'Company Code cannot be Null',
                '*.1.required' => 'Employee No is Required',
                '*.1.not_in' => 'Employee No cannot be Null'
            ];

            Validator::make($rows->toArray(), $rules, $messages)->validate();

            // $param = [
            //     "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
            //     "employeeNo" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null,
            //     "mutationType" => $this->type,
            //     "languageCode" => App::getLocale(),
            //     "sessionID" => 0,
            //     "sessionUserID" => Session::get('userID'),
            //     "logActionUserID" => Session::get('userID'),
            //     "logActionUsername" => Session::get('userName')
            // ];

            $param = [
                "companyCode" => $companyCode,
                "employeeNo" => Session::get('userID'),
                "mutationType" => $this->type,
                "languageCode" => App::getLocale(),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "logActionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userName')
            ];

            $rows->filter(function ($row) {
                return !empty($row[1]);
            })->each(function ($row) use (&$param, &$transactionData, &$levelType) {
                $companyCode = (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null;

                if ($this->type == 'N') {
                    $transactionData[] = [
                        "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                        "employeeNo" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null,
                        "npwpMutationCode" => (!is_null($row[2]) && $row[2] != "NULL") ? strval($row[2]) : null,
                        "npwpMutationDate" => (!is_null($row[3]) && $row[3] != "NULL") ? $this->transformDate($row[3]) : null,
                        "startDate" => (!is_null($row[4]) && $row[4] != "NULL")? $this->transformDate($row[4]) : null,
                        "remakrs" => (!is_null($row[5]) && $row[5] != "NULL") ? strval($row[5]) : null,
                    ];
                } else if ($this->type == 'M') {
                    $peMasterLevel = [] ;
                    foreach ($levelType as $type) {
                        $peMasterLevel[] = [
                            "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                            'levelType' => (!is_null($type['levelType']) && $type['levelType'] != "NULL") ? strval($type['levelType']) : null,
                            'levelCode' => (!is_null($row[$type['index']]) && $row[$type['index']] != "NULL") ? strval($row[$type['index']]) : null,
                            "employeeNo" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                        ];
                    }
                    $transactionData[] = [
                        "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                        "employeeNo" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null,
                        "locationCode" => (!is_null($row[2]) && $row[2] != "NULL") ? strval($row[2]) : null,
                        "groupCode" => (!is_null($row[3]) && $row[3] != "NULL") ? strval($row[3]) : null,
                        "gradeCode" => (!is_null($row[4]) && $row[4] != "NULL")? strval($row[4]) : null,
                        "positionCode" => (!is_null($row[5]) && $row[5] != "NULL") ? strval($row[5]) : null,
                        "rankingCode" => (!is_null($row[6]) && $row[6] != "NULL") ? strval($row[6]) : null,
                        "workNatureCode" => (!is_null($row[7]) && $row[7] != "NULL") ? strval($row[7]) : null,
                        "costCenterCode" => (!is_null($row[8]) && $row[8] != "NULL") ? strval($row[8]) : null,
                        "effectiveTerminantionDate" => (!is_null($row[9]) && $row[9] != "NULL") ? $this->transformDate($row[9]) : null,
                        "startDate" => (!is_null($row[10]) && $row[10] != "NULL") ? $this->transformDate($row[10]) : null,
                        "remakrs" => (!is_null($row[11]) && $row[11] != "NULL") ? strval($row[11]) : null,
                        'levelCode' => $peMasterLevel
                    ];
                } else if ($this->type == 'P') {
                    $peMasterLevel = [] ;
                    foreach ($levelType as $type) {
                        $peMasterLevel[] = [
                            "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                            'levelType' => (!is_null($type['levelType']) && $type['levelType'] != "NULL") ? strval($type['levelType']) : null,
                            'levelCode' => (!is_null($row[$type['index']]) && $row[$type['index']] != "NULL") ? strval($row[$type['index']]) : null,
                            "employeeNo" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                        ];
                    }
                    $transactionData[] = [
                        "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                        "employeeNo" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null,
                        "locationCode" => (!is_null($row[2]) && $row[2] != "NULL") ? strval($row[2]) : null,
                        "groupCode" => (!is_null($row[3]) && $row[3] != "NULL") ? strval($row[3]) : null,
                        "gradeCode" => (!is_null($row[4]) && $row[4] != "NULL")? strval($row[4]) : null,
                        "positionCode" => (!is_null($row[5]) && $row[5] != "NULL") ? strval($row[5]) : null,
                        "rankingCode" => (!is_null($row[6]) && $row[6] != "NULL") ? strval($row[6]) : null,
                        "workNatureCode" => (!is_null($row[7]) && $row[7] != "NULL") ? strval($row[7]) : null,
                        "costCenterCode" => (!is_null($row[8]) && $row[8] != "NULL") ? strval($row[8]) : null,
                        "effectiveTerminantionDate" => (!is_null($row[9]) && $row[9] != "NULL") ? $this->transformDate($row[9]) : null,
                        "startDate" => (!is_null($row[10]) && $row[10] != "NULL") ? $this->transformDate($row[10]) : null,
                        "remakrs" => (!is_null($row[11]) && $row[11] != "NULL") ? strval($row[11]) : null,
                        'levelCode' => $peMasterLevel
                    ];
                } else if ($this->type == 'D') {
                    $peMasterLevel = [] ;
                    foreach ($levelType as $type) {
                        $peMasterLevel[] = [
                            "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                            'levelType' => (!is_null($type['levelType']) && $type['levelType'] != "NULL") ? strval($type['levelType']) : null,
                            'levelCode' => (!is_null($row[$type['index']]) && $row[$type['index']] != "NULL") ? strval($row[$type['index']]) : null,
                            "employeeNo" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                        ];
                    }
                    $transactionData[] = [
                        "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                        "employeeNo" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null,
                        "locationCode" => (!is_null($row[2]) && $row[2] != "NULL") ? strval($row[2]) : null,
                        "groupCode" => (!is_null($row[3]) && $row[3] != "NULL") ? strval($row[3]) : null,
                        "gradeCode" => (!is_null($row[4]) && $row[4] != "NULL")? strval($row[4]) : null,
                        "positionCode" => (!is_null($row[5]) && $row[5] != "NULL") ? strval($row[5]) : null,
                        "rankingCode" => (!is_null($row[6]) && $row[6] != "NULL") ? strval($row[6]) : null,
                        "workNatureCode" => (!is_null($row[7]) && $row[7] != "NULL") ? strval($row[7]) : null,
                        "costCenterCode" => (!is_null($row[8]) && $row[8] != "NULL") ? strval($row[8]) : null,
                        "effectiveTerminantionDate" => (!is_null($row[9]) && $row[9] != "NULL") ? $this->transformDate($row[9]) : null,
                        "startDate" => (!is_null($row[10]) && $row[10] != "NULL") ? $this->transformDate($row[10]) : null,
                        "remakrs" => (!is_null($row[11]) && $row[11] != "NULL") ? strval($row[11]) : null,
                        'levelCode' => $peMasterLevel
                    ];
                } else if ($this->type == 'O') {
                    $transactionData[] = [
                        "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                        "employeeNo" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null,
                        "employmentStatus" => (!is_null($row[2]) && $row[2] != "NULL") ? strval($row[2]) : null,
                        "contractStartDate" => (!is_null($row[3]) && $row[3] != "NULL") ? $this->transformDate($row[3]) : null,
                        "contractEndDate" => (!is_null($row[4]) && $row[4] != "NULL") ? $this->transformDate($row[4]) : null,
                        "startDate" => (!is_null($row[5]) && $row[5] != "NULL")? $this->transformDate($row[5]) : null,
                        "effectiveTerminantionDate" => (!is_null($row[6]) && $row[6] != "NULL") ? $this->transformDate($row[6]) : null,
                        "remakrs" => (!is_null($row[7]) && $row[7] != "NULL") ? strval($row[7]) : null,
                    ];
                } else if ($this->type == 'T') {
                    $transactionData[] = [
                        "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                        "employeeNo" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null,
                        "terminationCode" => (!is_null($row[2]) && $row[2] != "NULL") ? strval($row[2]) : null,
                        "terminationRemarks" => (!is_null($row[3]) && $row[3] != "NULL") ? strval($row[3]) : null,
                        "terminationDate" => (!is_null($row[4]) && $row[4] != "NULL") ? $this->transformDate($row[4]) : null,
                        "effectiveTerminantionDate" => (!is_null($row[5]) && $row[5] != "NULL") ? $this->transformDate($row[5]) : null,
                    ];
                } else if ($this->type == 'PE') {
                    $transactionData[] = [
                        "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                        "employeeNo" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null,
                        "homeAddress" => (!is_null($row[2]) && $row[2] != "NULL") ? strval($row[2]) : null,
                        "homeCityCode" => (!is_null($row[3]) && $row[3] != "NULL") ? strval($row[3]) : null,
                        "homeZipCode" => (!is_null($row[4]) && $row[4] != "NULL") ? strval($row[4]) : null,
                        "homePhone" => (!is_null($row[5]) && $row[5] != "NULL") ? strval($row[5]) : null,
                        "emergencyName" => (!is_null($row[6]) && $row[6] != "NULL") ? strval($row[6]) : null,
                        "emergencyAddress" => (!is_null($row[7]) && $row[7] != "NULL") ? strval($row[7]) : null,
                        "emergencyPhone" => (!is_null($row[8]) && $row[8] != "NULL") ? strval($row[8]) : null,
                        "emergencyRelation" => (!is_null($row[9]) && $row[9] != "NULL") ? strval($row[9]) : null,
                        "otherAddress" => (!is_null($row[10]) && $row[10] != "NULL") ? strval($row[10]) : null,
                        "otherCityCode" => (!is_null($row[11]) && $row[11] != "NULL") ? strval($row[11]) : null,
                        "otherZipCode" => (!is_null($row[12]) && $row[12] != "NULL") ? strval($row[12]) : null,
                        "otherPhone" => (!is_null($row[13]) && $row[13] != "NULL") ? strval($row[13]) : null,
                        "persoanlEmailAddress" => (!is_null($row[14]) && $row[14] != "NULL") ? strval($row[14]) : null,
                        "companyEmailAddress" => (!is_null($row[15]) && $row[15] != "NULL") ? strval($row[15]) : null,
                    ];
                } else {
                    $transactionData[] = [
                        "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                        "employeeNo" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null
                    ];
                }
            });

            $param['mutationEmployee'] = $transactionData;

            // Storage::put('debug_data.txt', json_encode($param));
            // dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/personel/MutationEmployee/ImprotTransactionBulkEmployees',
                ['body' => json_encode($param)]
            );
        } catch (ValidationException $e) {
            $validationErrors = $e->validator->errors()->messages();
            $errorValidate = array_shift($validationErrors);
            $this->arrResult[]['message'] = array_shift($errorValidate);
            return $this->arrResult;
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $this->arrResult[]['message'] = $response;
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $this->arrResult[] = json_decode($response->getBody()->getContents());
    }

    public function startRow(): int
    {
        return 1;
    }

    public function chunkSize(): int
    {
        return 2000;
    }

    public function getArrResult(): array
    {
        return $this->arrResult;
    }
}
