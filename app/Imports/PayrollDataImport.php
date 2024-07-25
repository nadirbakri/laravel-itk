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

class PayrollDataImport implements ToCollection, WithStartRow
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

    public function __construct($processPeriod, $transferTo, $columnA, $columnB, $columnC, $columnC2, $columnD, $columnD2, $columnE, $columnE2, $columnF, $columnF2, $columnG, $columnG2, $columnH, $columnH2, $columnI, $columnI2, $columnJ, $columnJ2, $columnK, $columnK2, $columnL, $columnL2)
    {
        $this->processPeriod = $processPeriod;
        $this->transferTo = $transferTo;
        $this->columnA = $columnA;
        $this->columnB = $columnB;
        $this->columnC = $columnC;
        $this->columnC2 = $columnC2;
        $this->columnD = $columnD;
        $this->columnD2 = $columnD2;
        $this->columnE = $columnE;
        $this->columnE2 = $columnE2;
        $this->columnF = $columnF;
        $this->columnF2 = $columnF2;
        $this->columnG = $columnG;
        $this->columnG2 = $columnG2;
        $this->columnH = $columnH;
        $this->columnH2 = $columnH2;
        $this->columnI = $columnI;
        $this->columnI2 = $columnI2;
        $this->columnJ = $columnJ;
        $this->columnJ2 = $columnJ2;
        $this->columnK = $columnK;
        $this->columnK2 = $columnK2;
        $this->columnL = $columnL;
        $this->columnL2 = $columnL2;
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
                    "processPeriod" => (isset($this->processPeriod)) ? date("Y-m-d", strtotime('01 '.$this->processPeriod)) : null,
                    "transferTo" => (isset($this->transferTo)) ? strval($this->transferTo) : null,
                    "columnA" => (isset($this->columnA)) ? strval($this->columnA) : null,
                    "employeeNo" => (isset($row[0])) ? strval($row[0]) : null,
                    "columnB" => (isset($this->columnB)) ? strval($this->columnB) : null,
                    "fullName" => (isset($row[1])) ? strval($row[1]) : null,
                    "columnC" => (isset($this->columnC)) ? strval($this->columnC) : null,
                    "valueColumnC" => (isset($row[2])) ? (float) $row[2] : null,
                    "currCodeColumnC" => (isset($this->columnC2)) ? strval($this->columnC2) : null,
                    "columnD" => (isset($this->columnD)) ? strval($this->columnD) : null,
                    "valueColumnD" => (isset($row[3])) ? floatval($row[3]) : null,
                    "currCodeColumnD" => (isset($this->columnD2)) ? strval($this->columnD2) : null,
                    "columnE" => (isset($this->columnE)) ? strval($this->columnE) : null,
                    "valueColumnE" => (isset($row[4])) ? floatval($row[4]) : null,
                    "currCodeColumnE" => (isset($this->columnE2)) ? strval($this->columnE2) : null,
                    "columnF" => (isset($this->columnF)) ? strval($this->columnF) : null,
                    "valueColumnF" => (isset($row[5])) ? floatval($row[5]) : null,
                    "currCodeColumnF" => (isset($this->columnF2)) ? strval($this->columnF2) : null,
                    "columnG" => (isset($this->columnG)) ? strval($this->columnG) : null,
                    "valueColumnG" => (isset($row[6])) ? floatval($row[6]) : null,
                    "currCodeColumnG" => (isset($this->columnG2)) ? strval($this->columnG2) : null,
                    "columnH" => (isset($this->columnH)) ? strval($this->columnH) : null,
                    "valueColumnH" => (isset($row[7])) ? floatval($row[7]) : null,
                    "currCodeColumnH" => (isset($this->columnH2)) ? strval($this->columnH2) : null,
                    "columnI" => (isset($this->columnI)) ? strval($this->columnI) : null,
                    "valueColumnI" => (isset($row[8])) ? floatval($row[8]) : null,
                    "currCodeColumnI" => (isset($this->columnI2)) ? strval($this->columnI2) : null,
                    "columnJ" => (isset($this->columnJ)) ? strval($this->columnJ) : null,
                    "valueColumnJ" => (isset($row[9])) ? floatval($row[9]) : null,
                    "currCodeColumnJ" => (isset($this->columnJ2)) ? strval($this->columnJ2) : null,
                    "columnK" => (isset($this->columnK)) ? strval($this->columnK) : null,
                    "valueColumnK" => (isset($row[10])) ? floatval($row[10]) : null,
                    "currCodeColumnK" => (isset($this->columnK2)) ? strval($this->columnK2) : null,
                    "columnL" => (isset($this->columnL)) ? strval($this->columnL) : null,
                    "valueColumnL" => (isset($row[11])) ? floatval($row[11]) : null,
                    "currCodeColumnL" => (isset($this->columnL2)) ? strval($this->columnL2) : null,
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

            $response = $client->put(env('API_URL') . '/payroll/UpdateSalaryYearly',
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
