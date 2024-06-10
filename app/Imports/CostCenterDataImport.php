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

class CostCenterDataImport implements ToCollection, SkipsEmptyRows, WithStartRow
{
    private $arrResult = [];

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
                '*.1' => 'required|not_in:NULL'
            ], [
                '*.0.required' => 'Cost Center Code is Required',
                '*.0.not_in' => 'Cost Center Code cannot be Null',
                '*.1.required' => 'Cost Center Description is Required',
                '*.1.not_in' => 'Cost Center Description cannot be Null'
            ])->validate();

            foreach ($rows as $row) {
                $param[] = [
                    "recordStatus" => "A",
                    "companyCode" => Session::get('companyCode'),
                    "costCenterCode" => (isset($row[0])) ? (string) $row[0] : null,
                    "costCenterDescription" => (isset($row[1])) ? (string) $row[1] : null,
                    "accountNo" => (isset($row[2])) ? (string) $row[2] : null,
                    "contraAccountNo" => (isset($row[3])) ? (string) $row[3] : null,
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

            $response = $client->post(env('API_URL') . '/personel/CostCenter/bulkInsert',
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
