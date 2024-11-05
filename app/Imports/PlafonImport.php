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

class PlafonImport implements ToCollection, SkipsEmptyRows, WithStartRow
{
    public function __construct($type)
    {
        $this->type = $type;
    }

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

            $rules = [
                '*.0' => 'required|not_in:NULL',
                '*.1' => 'required|not_in:NULL',
                '*.2' => 'required|not_in:NULL',
                '*.3' => 'required|not_in:NULL',
                '*.4' => 'required|not_in:NULL'
            ];

            $messages = [
                '*.0.required' => 'Plafon Year is Required',
                '*.0.not_in' => 'Plafon Year cannot be Null',
                '*.1.required' => 'Plafon Code is Required',
                '*.1.not_in' => 'Plafon Code cannot be Null',
                '*.2.required' => 'Plafon Status is Required',
                '*.2.not_in' => 'Plafon Status cannot be Null',
                '*.3.required' => 'Nominal is Required',
                '*.3.not_in' => 'Nominal cannot be Null',
                '*.4.required' => 'Ranking Code is Required',
                '*.4.not_in' => 'Ranking Code cannot be Null'
            ];

            if ($this->type === 'BUSINESSTRIP') {
                $rules['*.5'] = 'required|not_in:NULL';
                $messages['*.5.required'] = 'Is Duty is Required';
                $messages['*.5.not_in'] = 'Is Duty cannot be Null';
            }

            Validator::make($rows->toArray(), $rules, $messages)->validate();

            $param = [
                "companyCode" => Session::get('companyCode'),
                "languageCode" => App::getLocale(),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "logActionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userName')
            ];

            foreach ($rows as $row) {
                $isDuty = false;

                if ($this->type === 'BUSINESSTRIP') {
                    $isDuty = strtolower($row[5]) === 'kedinasan' ? true : false;
                }

                $plafonData[] = [
                    "companyCode" => Session::get('companyCode'),
                    "plafonYear" => (isset($row[0])) ? (string) $row[0] : null,
                    "category" => $this->type,
                    "plafonCode" => (isset($row[1])) ? (string) $row[1] : null,
                    "status" => (isset($row[2])) ? (string) $row[2] : null,
                    "plafonAmount" => (isset($row[3])) ? (int) $row[3] : null,
                    "rankCode" => (isset($row[4])) ? (string) $row[4] : null,
                    "isDuty" => $isDuty
                ];
            }

            $param['plafonData'] = $plafonData;
            // dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/personel/PePlafon/ImportPlafon',
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
