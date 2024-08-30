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

class PeMasterLeaveImport implements ToCollection, SkipsEmptyRows, WithStartRow
{
    private $arrResult = [];

    public function transformDate($value, $format = 'Y-m-d')
    {
        date_default_timezone_set('Asia/Jakarta');
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
                '*.0' => 'required|not_in:NULL',
                '*.2' => 'required|not_in:NULL',
                '*.4' => 'required|not_in:NULL',
                '*.5' => 'required|not_in:NULL'
            ], [
                '*.0.required' => 'Employee No is Required',
                '*.0.not_in' => 'Employee No cannot be Null',
                '*.2.required' => 'Leave Code is Required',
                '*.2.not_in' => 'Leave Code cannot be Null',
                '*.4.required' => 'Leave Balance is Required',
                '*.4.not_in' => 'Leave Balance cannot be Null',
                '*.5.required' => 'Leave Balance Before is Required',
                '*.5.not_in' => 'Leave Balance Before cannot be Null'
            ])->validate();

            foreach ($rows as $row) {
                $param[] = [
                    "companyCode" => Session::get('companyCode'),
                    "employeeNo" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                    "leaveCode" => (!is_null($row[2]) && $row[2] != "NULL") ? trim($row[2]) : null,
                    "leaveBalance" => (!is_null($row[4]) && $row[4] != "NULL") ? (float) number_format($row[4], 1, '.', '') : null,
                    "leaveBalanceBefore" => (!is_null($row[5]) && $row[5] != "NULL") ? (float) number_format($row[5], 1, '.', '') : null,
                    "leaveBalanceBeforeExpiredDate" => (!is_null($row[6]) && $row[6] != "NULL") ? $this->transformDate($row[6])->toDateString() : null,
                    "changedNo" => 0,
                    "changedBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    "languageCode" => App::getLocale(),
                    "logActionUserID" => Session::get('userID'),
                    "logActionUsername" => Session::get('userName')
                ];
            }

            // dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/personel/PeMasterLeave/importPeMasterLeave',
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

        // dd(json_decode($response->getBody()->getContents()));

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
