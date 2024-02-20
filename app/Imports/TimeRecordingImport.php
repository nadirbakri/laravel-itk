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

class TimeRecordingImport implements ToCollection, SkipsEmptyRows, WithStartRow
{
    /**
    * @param Collection $collection
    */
    private $arrResult = [];

    public function __construct($automatic)
    {
        $this->automatic = $automatic;
    }

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
                '*.1' => 'date_format:Y-m-d',
                '*.2' => 'date_format:H:i',
                '*.3' => 'date_format:Y-m-d',
                '*.4' => 'date_format:H:i'
            ], [
                '*.1.date_format' => 'Date Format Must Be (2020-01-31). Make Sure to Change Column Format to Text, not Date',
                '*.2.date_format' => 'Hour & Minute In Format Must Be (07:01). Make Sure to Change Column Format to Text, not Time',
                '*.3.date_format' => 'Date Format Must Be (2020-01-31). Make Sure to Change Column Format to Text, not Date',
                '*.4.date_format' => 'Hour & Minute Out Format Must Be (07:01). Make Sure to Change Column Format to Text, not Time'
            ])->validate();

            foreach ($rows as $row) {
                $param[] = [
                    "employeeNo" => isset($row[0]) ? (string) $row[0] : null,
                    "absentDateIn" => isset($row[1]) ? date("Y-m-d", strtotime($row[1])) : null,
                    "absentDateOut" => isset($row[3]) ? date("Y-m-d", strtotime($row[3])) : null,
                    "timeIn" => isset($row[2]) ? date("Y-m-d\TH:i:s", strtotime($row[1] . " " . $row[2])) : null,
                    "timeOut" => isset($row[4]) ? date("Y-m-d\TH:i:s", strtotime($row[3] . " " . $row[4])) : null,
                    "shiftCode" => isset($row[5]) ? (string) $row[5] : null,
                ];
            }

            // dd(json_encode(
            //     [
            //         'companyCode' => Session::get('companyCode'),
            //         'fileLocation' => null,
            //         'automaticInOut' => isset($this->automatic) ? (bool) $this->automatic : false,
            //         'file64' => null,
            //         'data' => $param,
            //         "changedNo" => 0,
            //         "createdDate" => date("Y-m-d\TH:i:s"),
            //         "createdBy" => Session::get('userID'),
            //         "changedDate" => date("Y-m-d\TH:i:s"),
            //         "changedBy" => Session::get('userID'),
            //         "languageCode" => App::getLocale(),
            //         'sessionID' => 0,
            //         'sessionUserID' => Session::get('userID'),
            //         'logActionUsername' => Session::get('userName'),
            //         'logActionUserID' => Session::get('userID')
            //     ]));

            $response = $client->post(env('API_URL') . '/mobile/TempAbsentMachine/InsertTempAbsentMachine',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'fileLocation' => null,
                        'automaticInOut' => isset($this->automatic) ? (bool) $this->automatic : false,
                        'file64' => null,
                        'data' => $param,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "languageCode" => App::getLocale(),
                        'sessionID' => 0,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        'logActionUserID' => Session::get('userID')
                    ])
                ]
            );
        } catch (ValidationException $e) {
            $validationErrors = $e->validator->errors()->messages();
            $errorValidate = array_shift($validationErrors);
            $this->arrResult[0] = (object) ['status' => false, 'message' => array_shift($errorValidate)];
            return $this->arrResult;
        } catch (RequestException $e) {
            $response = $e->getResponse();
            // dd($response);
            $this->arrResult[0] = (object) ['status' => false, 'message' => 'Something Went Wrong'];
            return $this->arrResult;
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
            $this->transformDateTime($invoice[2]),
            $this->transformDate($invoice[3]),
            $this->transformDateTime($invoice[4]),
            (string) $invoice[5]
        ];
    }
}
