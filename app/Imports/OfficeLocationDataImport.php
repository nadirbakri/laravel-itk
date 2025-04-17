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

class OfficeLocationDataImport implements ToCollection, SkipsEmptyRows, WithStartRow
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
                '*.1' => 'required|not_in:NULL',
                '*.2' => 'required|not_in:NULL',
                '*.3' => 'required|not_in:NULL',
                '*.4' => 'required|not_in:NULL',
                '*.5' => 'required|not_in:NULL',
            ], [
                '*.0.required' => 'Office Code is Required',
                '*.0.not_in' => 'Office Code cannot be Null',
                '*.1.required' => 'Office Description is Required',
                '*.1.not_in' => 'Office Description cannot be Null',
                '*.2.required' => 'Longitude is Required',
                '*.2.not_in' => 'Longitude cannot be Null',
                '*.3.required' => 'Latitude is Required',
                '*.3.not_in' => 'Latitude cannot be Null',
                '*.4.required' => 'Max Tolerance is Required',
                '*.4.not_in' => 'Max Tolerance cannot be Null',
                '*.5.required' => 'Is Lock is Required',
                '*.5.not_in' => 'Is Lock cannot be Null'
            ])->validate();

            foreach ($rows as $row) {
                $param[] = [
                    "recordStatus" => "A",
                    "companyCode" => Session::get('companyCode'),
                    "officeCode" => (isset($row[0])) ? (string) trim($row[0]) : null,
                    "officeDesc" => (isset($row[1])) ? (string) $row[1] : null,
                    "longitude" => (isset($row[2])) ? (float) $row[2] : null,
                    "latitude" => (isset($row[3])) ? (float) $row[3] : null,
                    "maxTolerance" => (isset($row[4])) ? (float) $row[4] : null,
                    "isLock" => ($row[5] == "1" || strtoupper($row[5]) == "TRUE") ? true : false,
                    "changeNo" => 0,
                    "changeBy" => Session::get('userID'),
                    "changeDate" => date("Y-m-d\TH:i:s"),
                    "createBy" => Session::get('userID'),
                    "createDate" => date("Y-m-d\TH:i:s"),
                    "languageCode" => strtoupper(App::getLocale()),
                    "userID" => Session::get('userID'),
                    "sessionID" => 0,
                    "sessionUserID" => Session::get('userID'),
                    "logActionUserID" => Session::get('userID'),
                    "logActionUsername" => Session::get('userName')
                ];
            }

            // dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/mobile/OfficeLocation/BulkinsertOfficeLocation',
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
