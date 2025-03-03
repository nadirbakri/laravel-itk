<?php

namespace App\Imports;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithValidation;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Storage;
use Session;
use App;

class PersonalDataPartialUpdateImport implements ToCollection, WithStartRow
{
    /**
    * @param Collection $collection
    */
    private $arrResult = [];

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return Carbon::instance(Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return Carbon::createFromFormat($format, date('Y-m-d', strtotime($value)));
        }
    }

    public function __construct($transferTo, $columnA, $columnB, $columnC, $columnD, $columnE, $columnF, $columnG, $columnH, $columnI, $columnJ, $columnK, $columnL)
    {
        $this->transferTo = $transferTo;
        $this->columnA = $columnA;
        $this->columnB = $columnB;
        $this->columnC = $columnC;
        $this->columnD = $columnD;
        $this->columnE = $columnE;
        $this->columnF = $columnF;
        $this->columnG = $columnG;
        $this->columnH = $columnH;
        $this->columnI = $columnI;
        $this->columnJ = $columnJ;
        $this->columnK = $columnK;
        $this->columnL = $columnL;
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

            $rows->filter(function ($row) {
                return !empty($row[0]);
            })->each(function ($row) use (&$param) {
                $param[] = [
                    "companyCode" => Session::get('companyCode'),
                    "updatedTo" => (isset($this->transferTo)) ? strval($this->transferTo) : null,
                    "columnA" => (isset($this->columnA) && !empty($this->columnA) && $this->columnA !== "NULL") ? strval($this->columnA) : null,
                    "employeeNo" => isset($row[0]) && $row[0] !== "NULL" ? (is_bool($row[0]) ? ($row[0] ? "TRUE" : "FALSE") : (!empty($row[0]) ? strval($row[0]) : null)) : null,
                    "columnB" => (isset($this->columnB) && !empty($this->columnB) && $this->columnB !== "NULL") ? strval($this->columnB) : null,
                    "fullName" => isset($row[1]) && $row[1] !== "NULL" ? (is_bool($row[1]) ? ($row[1] ? "TRUE" : "FALSE") : (!empty($row[1]) ? strval($row[1]) : null)) : null,
                    "columnC" => (isset($this->columnC) && !empty($this->columnC) && $this->columnC !== "NULL") ? strval($this->columnC) : null,
                    "valueColumnC" => isset($row[2]) && $row[2] !== "NULL" ? (is_bool($row[2]) ? ($row[2] ? "TRUE" : "FALSE") : (!empty($row[2]) ? strval($row[2]) : null)) : null,
                    "columnD" => (isset($this->columnD) && !empty($this->columnD) && $this->columnD !== "NULL") ? strval($this->columnD) : null,
                    "valueColumnD" => isset($row[3]) && $row[3] !== "NULL" ? (is_bool($row[3]) ? ($row[3] ? "TRUE" : "FALSE") : (!empty($row[3]) ? strval($row[3]) : null)) : null,
                    "columnE" => (isset($this->columnE) && !empty($this->columnE) && $this->columnE !== "NULL") ? strval($this->columnE) : null,
                    "valueColumnE" => isset($row[4]) && $row[4] !== "NULL" ? (is_bool($row[4]) ? ($row[4] ? "TRUE" : "FALSE") : (!empty($row[4]) ? strval($row[4]) : null)) : null,
                    "columnF" => (isset($this->columnF) && !empty($this->columnF) && $this->columnF !== "NULL") ? strval($this->columnF) : null,
                    "valueColumnF" => isset($row[5]) && $row[5] !== "NULL" ? (is_bool($row[5]) ? ($row[5] ? "TRUE" : "FALSE") : (!empty($row[5]) ? strval($row[5]) : null)) : null,
                    "columnG" => (isset($this->columnG) && !empty($this->columnG) && $this->columnG !== "NULL") ? strval($this->columnG) : null,
                    "valueColumnG" => isset($row[6]) && $row[6] !== "NULL" ? (is_bool($row[6]) ? ($row[6] ? "TRUE" : "FALSE") : (!empty($row[6]) ? strval($row[6]) : null)) : null,
                    "columnH" => (isset($this->columnH) && !empty($this->columnH) && $this->columnH !== "NULL") ? strval($this->columnH) : null,
                    "valueColumnH" => isset($row[7]) && $row[7] !== "NULL" ? (is_bool($row[7]) ? ($row[7] ? "TRUE" : "FALSE") : (!empty($row[7]) ? strval($row[7]) : null)) : null,
                    "columnI" => (isset($this->columnI) && !empty($this->columnI) && $this->columnI !== "NULL") ? strval($this->columnI) : null,
                    "valueColumnI" => isset($row[8]) && $row[8] !== "NULL" ? (is_bool($row[8]) ? ($row[8] ? "TRUE" : "FALSE") : (!empty($row[8]) ? strval($row[8]) : null)) : null,
                    "columnJ" => (isset($this->columnJ) && !empty($this->columnJ) && $this->columnJ !== "NULL") ? strval($this->columnJ) : null,
                    "valueColumnJ" => isset($row[9]) && $row[9] !== "NULL" ? (is_bool($row[9]) ? ($row[9] ? "TRUE" : "FALSE") : (!empty($row[9]) ? strval($row[9]) : null)) : null,
                    "columnK" => (isset($this->columnK) && !empty($this->columnK) && $this->columnK !== "NULL") ? strval($this->columnK) : null,
                    "valueColumnK" => isset($row[10]) && $row[10] !== "NULL" ? (is_bool($row[10]) ? ($row[10] ? "TRUE" : "FALSE") : (!empty($row[10]) ? strval($row[10]) : null)) : null,
                    "columnL" => (isset($this->columnL) && !empty($this->columnL) && $this->columnL !== "NULL") ? strval($this->columnL) : null,
                    "valueColumnL" => isset($row[11]) && $row[11] !== "NULL" ? (is_bool($row[11]) ? ($row[11] ? "TRUE" : "FALSE") : (!empty($row[11]) ? strval($row[11]) : null)) : null,
                    "changedNo" => 0,
                    "changedBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    "languageCode" => App::getLocale(),
                    "sessionID" => 0,
                    "sessionUserID" => Session::get('userID'),
                    "logActionUserID" => Session::get('userID'),
                    "logActionUsername" => Session::get('userName')
                ];
            });

            // Storage::put('debug_data.txt', json_encode($param));
            // dd(json_encode($param));

            $response = $client->put(env('API_URL') . '/personel/BulkUpdatePartialPersonalData',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
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

        $this->arrResult[] = json_decode($response->getBody()->getContents());
        // dd($this->arrResult);
    }

    public function startRow(): int
    {
        return 2;
    }

    public function getArrResult(): array
    {
        return $this->arrResult;
    }
}
