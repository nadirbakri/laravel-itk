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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            foreach ($rows as $row) {
                $param[] = [
                    "companyCode" => Session::get('companyCode'),
                    "processPeriod" => (!is_null($this->processPeriod) && $this->processPeriod != "NULL") ? date("Y-m-d", strtotime('01 '.$this->processPeriod)) : null,
                    "transferTo" => (!is_null($this->transferTo) && $this->transferTo != "NULL") ? strval($this->transferTo) : null,
                    "columnA" => (!is_null($this->columnA) && $this->columnA != "NULL") ? strval($this->columnA) : null,
                    "employeeNo" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                    "columnB" => (!is_null($this->columnB) && $this->columnB != "NULL") ? strval($this->columnB) : null,
                    "fullName" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null,
                    "columnC" => (!is_null($this->columnC) && $this->columnC != "NULL") ? strval($this->columnC) : null,
                    "valueColumnC" => (!is_null($row[2]) && $row[2] != "NULL") ? (float) $row[2] : null,
                    "currCodeColumnC" => (!is_null($this->columnC2) && $this->columnC2 != "NULL") ? strval($this->columnC2) : null,
                    "columnD" => (!is_null($this->columnD) && $this->columnD != "NULL") ? strval($this->columnD) : null,
                    "valueColumnD" => (!is_null($row[3]) && $row[3] != "NULL") ? floatval($row[3]) : null,
                    "currCodeColumnD" => (!is_null($this->columnD2) && $this->columnD2 != "NULL") ? strval($this->columnD2) : null,
                    "columnE" => (!is_null($this->columnE) && $this->columnE != "NULL") ? strval($this->columnE) : null,
                    "valueColumnE" => (!is_null($row[4]) && $row[4] != "NULL") ? floatval($row[4]) : null,
                    "currCodeColumnE" => (!is_null($this->columnE2) && $this->columnE2 != "NULL") ? strval($this->columnE2) : null,
                    "columnF" => (!is_null($this->columnF) && $this->columnF != "NULL") ? strval($this->columnF) : null,
                    "valueColumnF" => (!is_null($row[5]) && $row[5] != "NULL") ? floatval($row[5]) : null,
                    "currCodeColumnF" => (!is_null($this->columnF2) && $this->columnF2 != "NULL") ? strval($this->columnF2) : null,
                    "columnG" => (!is_null($this->columnG) && $this->columnG != "NULL") ? strval($this->columnG) : null,
                    "valueColumnG" => (!is_null($row[6]) && $row[6] != "NULL") ? floatval($row[6]) : null,
                    "currCodeColumnG" => (!is_null($this->columnG2) && $this->columnG2 != "NULL") ? strval($this->columnG2) : null,
                    "columnH" => (!is_null($this->columnH) && $this->columnH != "NULL") ? strval($this->columnH) : null,
                    "valueColumnH" => (!is_null($row[7]) && $row[7] != "NULL") ? floatval($row[7]) : null,
                    "currCodeColumnH" => (!is_null($this->columnH2) && $this->columnH2 != "NULL") ? strval($this->columnH2) : null,
                    "columnI" => (!is_null($this->columnI) && $this->columnI != "NULL") ? strval($this->columnI) : null,
                    "valueColumnI" => (!is_null($row[8]) && $row[8] != "NULL") ? floatval($row[8]) : null,
                    "currCodeColumnI" => (!is_null($this->columnI2) && $this->columnI2 != "NULL") ? strval($this->columnI2) : null,
                    "columnJ" => (!is_null($this->columnJ) && $this->columnJ != "NULL") ? strval($this->columnJ) : null,
                    "valueColumnJ" => (!is_null($row[9]) && $row[9] != "NULL") ? floatval($row[9]) : null,
                    "currCodeColumnJ" => (!is_null($this->columnJ2) && $this->columnJ2 != "NULL") ? strval($this->columnJ2) : null,
                    "columnK" => (!is_null($this->columnK) && $this->columnK != "NULL") ? strval($this->columnK) : null,
                    "valueColumnK" => (!is_null($row[10]) && $row[10] != "NULL") ? floatval($row[10]) : null,
                    "currCodeColumnK" => (!is_null($this->columnK2) && $this->columnK2 != "NULL") ? strval($this->columnK2) : null,
                    "columnL" => (!is_null($this->columnL) && $this->columnL != "NULL") ? strval($this->columnL) : null,
                    "valueColumnL" => (!is_null($row[11]) && $row[11] != "NULL") ? floatval($row[11]) : null,
                    "currCodeColumnL" => (!is_null($this->columnL2) && $this->columnL2 != "NULL") ? strval($this->columnL2) : null,
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
            }

            $response = $client->put(env('API_URL') . '/importfromexcel/updatesalaryyearly',
                ['body' => json_encode($param)]
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

        $this->arrResult[] = json_decode($response->getBody()->getContents());
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
