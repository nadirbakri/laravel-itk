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

class EmployeeLevelImport implements ToCollection, SkipsEmptyRows, WithStartRow, WithChunkReading
{
    /**
    * @param Collection $collection
    */
    private $arrResult = [];

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return Carbon::instance(Date::excelToDateTimeObject($value));
        } catch (\Throwable $e) {
            return Carbon::createFromFormat($format, date('Y-m-d', strtotime($value)));
        }
    }

    public function collection(Collection $rows)
    {
        $param = [];

        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $headerRow = $rows->shift();
            $levelType = [];
            $dynamicRules = [];
            $dynamicRMessages = [];

            foreach ($headerRow as $key => $value) {
                if (strpos($value, '*') !== false) {
                    $dynamicRules["*.{$key}"] = 'required|not_in:NULL';
                    $dynamicRMessages["*.{$key}.required"] = strtr($value, ["*" => ""]) . ' is Required';
                    $dynamicRMessages["*.{$key}.not_in"] = strtr($value, ["*" => ""]) . ' cannot be Null';
                }
                
                if (strpos($value, 'Level Code') !== false) {
                    $parts = explode("-", $value);
                    $result = ltrim($parts[1]);    
                    $levelType[] = [
                        'levelType' => $result,
                        'index' => $key
                    ];
                }            
            }
                        
            try {
                Validator::make($rows->toArray(), $dynamicRules, $dynamicRMessages)->validate();
            } catch (\Illuminate\Validation\ValidationException $e) {
                $errors = $e->validator->errors()->messages();
                
                $errorMessages = [];
                foreach ($errors as $columnErrors) {
                    $this->arrResult[]['message'] = array_shift($columnErrors);
                }
                
                return $this->arrResult;
            }

            if (count($this->arrResult) > 0) {
                return $this->arrResult;
            }

            $rows->filter(function ($row) {
                return !empty($row[1]);
            })->each(function ($row) use (&$param, &$levelType) {
                $peMasterLevel = [] ;
                foreach ($levelType as $type) {
                    $peMasterLevel[] = [
                        "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                        'levelType' => (!is_null($type['levelType']) && $type['levelType'] != "NULL") ? strval($type['levelType']) : null,
                        'levelCode' => (!is_null($row[$type['index']]) && $row[$type['index']] != "NULL") ? strval($row[$type['index']]) : null,
                        "employeeNo" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null
                    ];
                }
                $param[] = [
                    "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? trim(strval($row[0])) : null,
                    "languageCode" => App::getLocale(),
                    "sessionID" => 0,
                    "sessionUserID" => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    'levelData' => $peMasterLevel
                ];
            });

            // Storage::put('debug_data.txt', json_encode($param));
            dd(json_encode($param));
            // exit;

            $response = $client->post(env('API_URL') . '/personel/MutationEmployee/BulkPeMasterLevel',
                ['body' => json_encode($param)]
            );
        } catch (ValidationException $e) {
            $validationErrors = $e->validator->errors()->messages();
            $errorValidate = array_shift($validationErrors);
            $this->arrResult[]['message'] = array_shift($errorValidate);
            return $this->arrResult;
        } catch (RequestException $e) {
            $response = $e->getResponse();
            // var_dump($response);
            $this->arrResult[]['message'] = $e->getResponse();
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
