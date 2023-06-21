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

class PayrollBonusTHRDataImport implements ToCollection, SkipsEmptyRows, WithStartRow
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

    public function collection(Collection $rows)
    {
        $param = [];

        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            Validator::make($rows->toArray(), [
                '*.0' => 'required|not_in:NULL',
                '*.2' => 'required|not_in:NULL',
                '*.3' => 'required|not_in:NULL'
            ], [
                '*.0.required' => 'Employee No is Required',
                '*.0.not_in' => 'Employee No cannot be Null',
                '*.2.required' => 'Flag Type is Required',
                '*.2.not_in' => 'Flag Type cannot be Null',
                '*.3.required' => 'Process Date is Required',
                '*.3.not_in' => 'Process Date cannot be Null'
            ])->validate();

            foreach ($rows as $row) {
                $param[] = [
                    "companyCode" => Session::get('companyCode'),
                    "token" => Session::get('token'),
                    "columnA" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                    "columnB" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null,
                    "columnC" => (!is_null($row[2]) && $row[2] != "NULL") ? strval($row[2]) : null,
                    "columnD" => (!is_null($row[3]) && $row[3] != "NULL") ? $this->transformDate($row[3]) : null,
                    "columnE" => (!is_null($row[4]) && $row[4] != "NULL") ? floatval($row[4]) : 0,
                    "columnF" => (!is_null($row[5]) && $row[5] != "NULL") ? floatval($row[5]) : 0,
                    "columnG" => (!is_null($row[6]) && $row[6] != "NULL") ? strval($row[6]) : null,
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

            $response = $client->put(env('API_URL') . '/importfromexcel/updatebonusthr',
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
        return 2;
    }

    public function getArrResult(): array
    {
        return $this->arrResult;
    }
}
