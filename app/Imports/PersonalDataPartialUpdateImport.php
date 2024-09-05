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
                    "columnA" => (isset($this->columnA)) ? strval($this->columnA) : null,
                    "employeeNo" => (isset($row[0])) ? strval($row[0]) : null,
                    "columnB" => (isset($this->columnB)) ? strval($this->columnB) : null,
                    "fullName" => (isset($row[1])) ? strval($row[1]) : null,
                    "columnC" => (isset($this->columnC)) ? strval($this->columnC) : null,
                    "valueColumnC" => (isset($row[2])) ? strval($row[2]) : null,
                    "columnD" => (isset($this->columnD)) ? strval($this->columnD) : null,
                    "valueColumnD" => (isset($row[3])) ? strval($row[3]) : null,
                    "columnE" => (isset($this->columnE)) ? strval($this->columnE) : null,
                    "valueColumnE" => (isset($row[4])) ? strval($row[4]) : null,
                    "columnF" => (isset($this->columnF)) ? strval($this->columnF) : null,
                    "valueColumnF" => (isset($row[5])) ? strval($row[5]) : null,
                    "columnG" => (isset($this->columnG)) ? strval($this->columnG) : null,
                    "valueColumnG" => (isset($row[6])) ? strval($row[6]) : null,
                    "columnH" => (isset($this->columnH)) ? strval($this->columnH) : null,
                    "valueColumnH" => (isset($row[7])) ? strval($row[7]) : null,
                    "columnI" => (isset($this->columnI)) ? strval($this->columnI) : null,
                    "valueColumnI" => (isset($row[8])) ? strval($row[8]) : null,
                    "columnJ" => (isset($this->columnJ)) ? strval($this->columnJ) : null,
                    "valueColumnJ" => (isset($row[9])) ? strval($row[9]) : null,
                    "columnK" => (isset($this->columnK)) ? strval($this->columnK) : null,
                    "valueColumnK" => (isset($row[10])) ? strval($row[10]) : null,
                    "columnL" => (isset($this->columnL)) ? strval($this->columnL) : null,
                    "valueColumnL" => (isset($row[11])) ? strval($row[11]) : null,
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
