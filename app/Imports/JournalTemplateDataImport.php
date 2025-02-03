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

class JournalTemplateDataImport implements ToCollection, SkipsEmptyRows, WithStartRow
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
                '*.6' => 'required|not_in:NULL',
                '*.7' => 'required|not_in:NULL'
            ], [
                '*.0.required' => 'Journal Code is Required',
                '*.0.not_in' => 'Journal Code cannot be Null',
                '*.1.required' => 'Field Name is Required',
                '*.1.not_in' => 'Field Name cannot be Null',
                '*.2.required' => 'Debit Kredit is Required',
                '*.2.not_in' => 'Debit Kredit cannot be Null',
                '*.3.required' => 'Operator is Required',
                '*.3.not_in' => 'Operator cannot be Null',
                '*.4.required' => 'Cost Center is Required',
                '*.4.not_in' => 'Cost Center cannot be Null',
                '*.5.required' => 'Account is Required',
                '*.5.not_in' => 'Account cannot be Null',
                '*.6.required' => 'Grouping 1 is Required',
                '*.6.not_in' => 'Grouping 1 cannot be Null',
                '*.7.required' => 'Grouping 2 is Required',
                '*.7.not_in' => 'Grouping 2 cannot be Null'
            ])->validate();

            foreach ($rows as $row) {
                $param[] = [
                    "recordStatus" => "A",
                    "companyCode" => Session::get('companyCode'),
                    "journalCode" => (isset($row[0])) ? $row[0] : null,
                    "fieldName" => (isset($row[1])) ? $row[1] : null,
                    "debitKredit" => (isset($row[2])) ? $row[2] : null,
                    "operator" => (isset($row[3])) ? $row[3] : null,
                    "costCenter" => (isset($row[4])) ? $row[4] : null,
                    "account" => (isset($row[5])) ? $row[5] : null,
                    "grouping1" => (isset($row[6])) ? $row[6] : null,
                    "grouping2" => (isset($row[7])) ? $row[7] : null,
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

            $response = $client->post(env('API_URL') . '/payroll/bulkInsertPrJournalTemplate',
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
