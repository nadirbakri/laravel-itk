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
use Session;
use App;

class EmployeeFamilyImport implements ToCollection, SkipsEmptyRows, WithStartRow
{
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

            Validator::make($rows->toArray(), [
                '*.0' => 'required|not_in:NULL'
            ], [
                '*.0.required' => 'Employee No is Required',
                '*.0.not_in' => 'Employee No cannot be Null'
            ])->validate();

            foreach ($rows as $row) {
                $param[] = [
                    "companyCode" => Session::get('companyCode'),
                    "employeeNo" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                    "seqNo" => (!is_null($row[1]) && $row[1] != "NULL") ? (int) $row[1] : null,
                    "familyName" => (!is_null($row[2]) && $row[2] != "NULL") ? strval($row[2]) : null,
                    "relationCode" => (!is_null($row[3]) && $row[3] != "NULL") ? strval($row[3]) : null,
                    "birthDate" => (!is_null($row[4]) && $row[4] != "NULL") ? $this->transformDate($row[4]) : null,
                    "birthPlace" => (!is_null($row[5]) && $row[5] != "NULL") ? strval($row[5]) : null,
                    "gender" => (!is_null($row[6]) && $row[6] != "NULL") ? strval($row[6]) : null,
                    "occupation" => (!is_null($row[7]) && $row[7] != "NULL") ? strval($row[7]) : null,
                    "flagMedical" => ($row[8] == "1" || strtoupper($row[8]) == "TRUE") ? true : false,
                    "flagPayroll" => ($row[9] == "1" || strtoupper($row[9]) == "TRUE") ? true : false,
                    "bloodType" => (!is_null($row[10]) && $row[10] != "NULL") ? strval($row[10]) : null,
                    "familyCardNumber" => (!is_null($row[11]) && $row[11] != "NULL") ? strval($row[11]) : null,
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

            // dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/personel/PeMaster/importFam',
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
