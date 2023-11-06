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
use Session;
use App;

class PositionDataImport implements ToCollection, SkipsEmptyRows, WithStartRow
{
    private $arrResult = [];

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
                '*.1' => 'required|not_in:NULL',
                '*.2' => 'required|not_in:NULL'
            ], [
                '*.0.required' => 'Position Code is Required',
                '*.0.not_in' => 'Position Code cannot be Null',
                '*.1.required' => 'Position Name is Required',
                '*.1.not_in' => 'Position Name cannot be Null',
                '*.2.required' => 'Supervisor Position Code is Required',
                '*.2.not_in' => 'Supervisor Position Code cannot be Null'
            ])->validate();

            foreach ($rows as $row) {
                $param[] = [
                    "recordStatus" => "A",
                    "companyCode" => Session::get('companyCode'),
                    "positionCode" => (isset($row[0])) ? $row[0] : null,
                    "positionName" => (isset($row[1])) ? $row[1] : null,
                    "supervisorPositionCode" => (isset($row[2])) ? $row[2] : null,
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

            // var_dump(json_encode($param));

            $response = $client->post(env('API_URL') . '/personel/GmPosition/bulkInsert',
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
