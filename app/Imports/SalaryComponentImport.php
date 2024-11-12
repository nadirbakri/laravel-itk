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

class SalaryComponentImport implements ToCollection, SkipsEmptyRows, WithStartRow
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
                '*.0.required' => 'Company Code is Required',
                '*.0.not_in' => 'Company Code cannot be Null',
                '*.1.required' => 'Field Name is Required',
                '*.1.not_in' => 'Field Name cannot be Null'
            ])->validate();

            foreach ($rows as $row) {
                $param[] = [
                    "companyCode" => (isset($row[0])) ? (string) trim($row[0]) : null,
                    "fieldName" => (isset($row[1])) ? (string) trim($row[1]) : null,
                    "description" => (isset($row[2])) ? (string) $row[2] : null,
                    "fieldWidth" => (!is_null($row[3]) && $row[3] != "NULL") ? (int) $row[3] : null,
                    "decimalPoint" => (!is_null($row[4]) && $row[4] != "NULL") ? (int) $row[4] : null,
                    "includeProrate" => ($row[5] == "1" || strtoupper($row[5]) == "TRUE") ? true : false,
                    "groupTakehomepay" => (!is_null($row[6]) && $row[6] != "NULL") ? (int) $row[6] : null,
                    "displayIn" => (isset($row[7])) ? (string) $row[7] : null,
                    "fieldType" => (isset($row[8])) ? (string) $row[8] : null,
                    "flagTax" => (isset($row[9])) ? (string) $row[9] : null,
                    "flagPension" => ($row[10] == "1" || strtoupper($row[10]) == "TRUE") ? true : false,
                    "flagRetroactive" => ($row[11] == "1" || strtoupper($row[11]) == "TRUE") ? true : false,
                    "flagCummulativeUpdate" => ($row[12] == "1" || strtoupper($row[12]) == "TRUE") ? true : false,
                    "flagYearlyUpdate" => ($row[13] == "1" || strtoupper($row[13]) == "TRUE") ? true : false,
                    "flagLimitMedical" => ($row[14] == "1" || strtoupper($row[14]) == "TRUE") ? true : false,
                    "flagTaxAllowance" => ($row[15] == "1" || strtoupper($row[15]) == "TRUE") ? true : false,
                    "flagNetCalculation" => ($row[16] == "1" || strtoupper($row[16]) == "TRUE") ? true : false,
                    "flagJamsostek" => ($row[17] == "1" || strtoupper($row[17]) == "TRUE") ? true : false,
                    "flagOvtAlternative1" => ($row[18] == "1" || strtoupper($row[18]) == "TRUE") ? true : false,
                    "flagOvtAlternative2" => ($row[19] == "1" || strtoupper($row[19]) == "TRUE") ? true : false,
                    "flagHealthInsurance" => ($row[20] == "1" || strtoupper($row[20]) == "TRUE") ? true : false,
                    "flagPensionInsurance" => ($row[21] == "1" || strtoupper($row[21]) == "TRUE") ? true : false,
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

            $response = $client->post(env('API_URL') . '/payroll/PRSalaryComponentData/ASDP/v1/InsertSalaryCmponentList',
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
