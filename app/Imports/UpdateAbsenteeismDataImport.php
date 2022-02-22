<?php

namespace App\Imports;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Session;
use App;

class UpdateAbsenteeismDataImport implements ToCollection, WithStartRow, WithMapping
{
    /**
    * @param Collection $collection
    */
    private $arrResult = [];

    public function transformDate($value, $format = 'm/d/Y')
    {
        // var_dump(Date::excelToDateTimeObject($value)->format('m/d/Y'));
        try {
            return Carbon::instance(Date::excelToDateTimeObject($value));
            // return Date::excelToDateTimeObject($value)->format('m/d/Y');
        } catch (\ErrorException $e) {
            return Carbon::createFromFormat($format, date('m/d/Y', strtotime($value)));
        }
    }

    public function transformDateTime($value, $format = 'Y-m-d\TH:i:s')
    {
        // var_dump(Date::excelToDateTimeObject($value)->format('H:i'));
        try {
            return Carbon::instance(Date::excelToDateTimeObject($value));
            // return Date::excelToDateTimeObject($value)->format('H:i');
        } catch (\ErrorException $e) {
            return Carbon::createFromFormat($format, date("Y-m-d\TH:i:s", strtotime($value)));
        }
    }

    public function collection(Collection $rows)
    {
        $param = [];
        $date_ovt = date("Y-m-d\TH:i:s");

        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // Validator::make($rows->toArray(), [
                // '*.0' => 'date_format:m/\d/\Y',
                // '*.3' => 'date_format:H:i',
                // '*.4' => 'date_format:H:i:ss|after:ovtIn',
                // '*.9' => 'date_format:H:i:ss'
            // ])->validate();

            foreach ($rows as $row) {
                // var_dump($row[3]);
                // var_dump($this->transformDateTime($row[9])->setDate(date("Y",strtotime($date_ovt)), date("m",strtotime($date_ovt)), date("d",strtotime($date_ovt))));
                $param[] = [
                    "companyCode" => Session::get('companyCode'),
                    "employeeNo" => $row[0],
                    "absentDate" => $row[1],
                    "absentCode" => $row[2],
                    "ovtIn" => $row[3],
                    "ovtOut" => $row[4],
                    "day" => $row[5],
                    "shiftCode" => $row[6],
                    "costCenterCode" => $row[7],
                    "ovtCode" => $row[8],
                    "hourOvt" => $row[9],
                    "changedNo" => 0,
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "changedBy" => Session::get('userID'),
                    "languageCode" => App::getLocale(),
                    "sessionID" => 0,
                    "sessionUserID" => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName')
                ];
                // var_dump($param);
            }
            $response = $client->put(env('API_URL') . '/tmabsentemployee/bulkupdatetmabsentemployee',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $this->arrResult = [json_decode($response->getBody()->getContents())];

        // var_dump($this->arrResult[0]->status);

        return response()->json(['status' => $this->arrResult[0]->status, 'message' => $this->arrResult[0]->message]);
    }

    public function startRow(): int
    {
        return 2;
    }

    public function getArrResult(): array
    {
        return $this->arrResult;
    }

    public function map($invoice): array
    {
        $date_ovt = date("Y-m-d\TH:i:s");
        
        return [
            (string) $invoice[0],
            $this->transformDate($invoice[1]),
            (string) $invoice[2],
            $this->transformDateTime($invoice[3]),
            $this->transformDateTime($invoice[4]),
            (string) $invoice[5],
            (string) $invoice[6],
            (string) $invoice[7],
            (string) $invoice[8],
            $this->transformDateTime($invoice[9])
        ];
    }
}
