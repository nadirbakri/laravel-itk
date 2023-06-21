<?php

namespace App\Imports;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithValidation;
use Session;
use App;

class AccountDataImport implements ToCollection, WithValidation, WithStartRow
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

            foreach ($rows as $row) {
                $param[] = [
                    "recordStatus" => "A",
                    "companyCode" => Session::get('companyCode'),
                    "accountNo" => (isset($row[0])) ? $row[0] : null,
                    "accountDescription" => (isset($row[1])) ? $row[1] : null,
                    "reference" => (isset($row[2])) ? $row[2] : null,
                    "grouping1" => (isset($row[3])) ? $row[3] : null,
                    "grouping2" => (isset($row[4])) ? $row[4] : null,
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

            $response = $client->post(env('API_URL') . '/gmaccount/bulkinsert',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $this->arrResult[] = $response;
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

    public function rules(): array
    {
        return [
            '0' => 'required|not_in:NULL',
            '1' => 'required|not_in:NULL',
            '2' => 'required|not_in:NULL',
            '3' => 'required|not_in:NULL',
            '4' => 'required|not_in:NULL'
        ];
    }

    public function customValidationMessages()
    {
        return [
            '0.required' => 'Account No is Required',
            '0.not_in' => 'Account No cannot be Null',
            '1.required' => 'Account Description is Required',
            '1.not_in' => 'Account Description cannot be Null',
            '2.required' => 'Reference is Required',
            '2.not_in' => 'Reference cannot be Null',
            '3.required' => 'Grouping 1 is Required',
            '3.not_in' => 'Grouping 1 cannot be Null',
            '4.required' => 'Grouping 2 is Required',
            '4.not_in' => 'Grouping 2 cannot be Null'
        ];
    }

    public function customValidationAttributes()
    {
        return [
            '0' => 'Account No',
            '1' => 'Account Description',
            '2' => 'Reference',
            '3' => 'Grouping 1',
            '4' => 'Grouping 2'
        ];
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
