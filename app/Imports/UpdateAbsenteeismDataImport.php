<?php

namespace App\Imports;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithValidation;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Session;
use App;

class UpdateAbsenteeismDataImport implements ToCollection, SkipsEmptyRows, WithStartRow
{
    /**
    * @param Collection $collection
    */
    private $arrResult = [];

    public function transformDate($value, $format = 'm/d/Y')
    {
        try {
            return Carbon::instance(Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return Carbon::createFromFormat($format, date('m/d/Y', strtotime($value)));
        }
    }

    public function transformDateTime($value, $format = 'Y-m-d\TH:i:s')
    {
        try {
            return Carbon::instance(Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return Carbon::createFromFormat($format, date("Y-m-d\TH:i:s", strtotime($value)));
        }
    }

    public function collection(Collection $rows)
    {
        $keys = null;
        $param = [];

        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            Validator::make($rows->toArray(), [
                '*.1' => 'date_format:m/d/Y',
                '*.3' => 'date_format:H:i',
                '*.4' => 'date_format:H:i'
            ], [
                '*.1.date_format' => 'Date Format Must Be (01/31/2000)',
                '*.3.date_format' => 'Hour & Minute In Format Must Be (07:01). Make Sure to Change Column Format to Text, not Time',
                '*.4.date_format' => 'Hour & Minute Out Format Must Be (07:01). Make Sure to Change Column Format to Text, not Time'
            ])->validate();

            foreach ($rows as $row) {
                $param[] = [
                    "companyCode" => Session::get('companyCode'),
                    "employeeNo" => isset($row[0]) ? (string) $row[0] : null,
                    "absentDate" => isset($row[1]) ? date("Y-m-d\TH:i:s", strtotime($row[1])) : null,
                    "absentCode" => isset($row[2]) ? (string) $row[2] : null,
                    "actualDateIn" => isset($row[3]) ? date("Y-m-d\TH:i:s", strtotime($row[1] . " " . $row[3])) : null,
                    "actualDateOut" => isset($row[4]) ? date("Y-m-d\TH:i:s", strtotime($row[1] . " " . $row[4])) : null,
                    "day" => isset($row[5]) ? $row[5] : null,
                    "shiftCode" => isset($row[6]) ? (string) $row[6] : null,
                    "costCenterCode" => isset($row[7]) ? (string) $row[7] : null,
                    "ovtCode" => isset($row[8]) ? (string) $row[8] : null,
                    "hourOvt" => isset($row[9]) ? date("Y-m-d\TH:i:s", strtotime($row[1] . " " . $row[9])) : null,
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
            }

            // dd(json_encode($param));

            $response = $client->put(env('API_URL') . '/mobile/TmAbsentEmployee/BulkUpdateTmAbsentEmployee',
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
