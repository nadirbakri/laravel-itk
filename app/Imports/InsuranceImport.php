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

class InsuranceImport implements ToCollection, SkipsEmptyRows, WithStartRow
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

            $rules = [
                '*.0' => 'required|not_in:NULL',
                '*.1' => 'required|not_in:NULL',
                '*.2' => 'required|not_in:NULL',
                '*.3' => 'required|not_in:NULL|date_format:Y-m-d',
                '*.4' => 'required|not_in:NULL|date_format:Y-m-d',
                '*.5' => 'required|not_in:NULL',
            ];

            $messages = [
                '*.0.required' => 'Employee No is Required',
                '*.0.not_in' => 'Employee No cannot be Null',
                '*.1.required' => 'Insurance Code is Required',
                '*.1.not_in' => 'Insurance Code cannot be Null',
                '*.2.required' => 'Insurance Class is Required',
                '*.2.not_in' => 'Insurance Class cannot be Null',
                '*.3.required' => 'Insurance Start Date is Required',
                '*.3.not_in' => 'Insurance Start Date cannot be Null',
                '*.3.date_format' => 'Insurance Start Date Format Must Be (2020-01-31). Make Sure to Change Column Format to Text, not Date',
                '*.4.required' => 'Insurance End Date is Required',
                '*.4.not_in' => 'Insurance End Date cannot be Null',
                '*.4.date_format' => 'Insurance End Date Format Must Be (2020-01-31). Make Sure to Change Column Format to Text, not Date',
                '*.5.required' => 'Insurance Policy No is Required',
                '*.5.not_in' => 'Insurance Policy No cannot be Null'
            ];

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
                $insuranceEmployees[] = [
                    "companyCode" => Session::get('companyCode'),
                    "employeeNo" => (isset($row[0])) ? (string) $row[0] : null,
                    "insuranceCode" => (isset($row[1])) ? (string) $row[1] : null,
                    "insuranceClassCode" => (isset($row[2])) ? (string) $row[2] : null,
                    "insuranceStartDate" => (isset($row[3])) ? (string) $row[3] : null,
                    "insuranceEndDate" => (isset($row[4])) ? (string) $row[4] : null,
                    "insurancePolicyNo" => (isset($row[5])) ? (string) $row[5] : null,
                    "insuranceRemark" => (isset($row[6])) ? (string) $row[6] : null,
                ];
            }

            $param['insuranceEmployees'] = $insuranceEmployees;
            // dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/personel/PeMasterInsurance/InsertInsuranceEmployees',
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
