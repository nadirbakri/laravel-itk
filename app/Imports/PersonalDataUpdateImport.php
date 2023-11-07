<?php

namespace App\Imports;

set_time_limit(0);

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Session;
use App;

class PersonalDataUpdateImport implements ToCollection, SkipsEmptyRows, WithStartRow
{
    /**
    * @param Collection $collection
    */
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
        $keys = null;
        $param = [];

        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            Validator::make($rows->toArray(), [
                '*.0' => 'required|not_in:NULL',
                '*.1' => 'required|not_in:NULL'
            ], [
                '*.0.required' => 'Company Code is Required',
                '*.0.not_in' => 'Company Code cannot be Null',
                '*.1.required' => 'Employee No is Required',
                '*.1.not_in' => 'Employee No cannot be Null'
            ])->validate();

            foreach ($rows as $row) {
                if (!$keys) {
                    // Use the first row as keys
                    $keys = $row->toArray();
                } else {
                    $convertedRow = $row->toArray();
                    $convertedRow[0] = strval($row[0]);
                    $convertedRow[1] = strval($row[1]);
            
                    // Use the converted row for values
                    $param[] = array_combine($keys, $convertedRow);
                    $param[count($param) - 1]["createdBy"] = Session::get('userID');
                    $param[count($param) - 1]["changedBy"] = Session::get('userID');
                }
            }

            // dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/mobile/BulkSendEmail/BulkUpdateEmail',
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
            $this->arrResult[]['message'] = $e->getResponse();
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
        return 1;
    }

    public function getArrResult(): array
    {
        return $this->arrResult;
    }
}
