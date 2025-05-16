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
use Illuminate\Support\Facades\Storage;
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
                '*.6' => 'required|not_in:NULL',
                '*.7' => 'required|not_in:NULL',
                '*.8' => 'required|not_in:NULL',
                '*.9' => 'required|not_in:NULL'
            ], [
                '*.0.required' => 'Record Status is Required',
                '*.0.not_in' => 'Record Status cannot be Null',
                '*.1.required' => 'Company Code is Required',
                '*.1.not_in' => 'Company Code cannot be Null',
                '*.2.required' => 'Journal Code is Required',
                '*.2.not_in' => 'Journal Code cannot be Null',
                '*.3.required' => 'Seq No is Required',
                '*.3.not_in' => 'Seq No cannot be Null',
                '*.4.required' => 'Doc No is Required',
                '*.4.not_in' => 'Doc No cannot be Null',
                '*.6.required' => 'Debit Kredit is Required',
                '*.6.not_in' => 'Debit Kredit cannot be Null',
                '*.7.required' => 'Description is Required',
                '*.7.not_in' => 'Description cannot be Null',
                '*.8.required' => 'Cost Center is Required',
                '*.8.not_in' => 'Cost Center cannot be Null',
                '*.9.required' => 'Account is Required',
                '*.9.not_in' => 'Account cannot be Null'
            ])->validate();

            foreach ($rows as $row) {
                $param[] = [
                    "recordStatus" => (isset($row[0])) ? $row[0] : null,
                    "companyCode" => (isset($row[1])) ? $row[1] : null,
                    "journalCode" => (isset($row[2])) ? $row[2] : null,
                    "seqNo" => (isset($row[3])) ? (int) $row[3] : null,
                    "docNo" => (isset($row[4])) ? (int) $row[4] : null,
                    "fieldName" => (isset($row[5])) ? $row[5] : null,
                    "debitKredit" => (isset($row[6])) ? $row[6] : null,
                    "description" => (isset($row[7])) ? $row[7] : null,
                    "costCenter" => (isset($row[8])) ? strval($row[8]) : null,
                    "account" => (isset($row[9])) ? strval($row[9]) : null,
                    "grouping1" => (isset($row[10])) ? $row[10] : null,
                    "grouping2" => (isset($row[11])) ? $row[11] : null,
                    "condition" => (isset($row[12])) ? $row[12] : null,
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

            // Storage::put('debug_data.txt', json_encode($param));
            // dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/payroll/importJournalTemplate',
                ['body' => json_encode($param)]
            );
        } catch (ValidationException $e) {
            $validationErrors = $e->validator->errors()->messages();
            $errorValidate = array_shift($validationErrors);
            $this->arrResult[]['message'] = array_shift($errorValidate);
            return $this->arrResult;
        } catch (RequestException $e) {
            $response = $e->getResponse();
            // dd($response);
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
