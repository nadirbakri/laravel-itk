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

class LocationDataImport implements ToCollection, WithValidation, WithStartRow
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
                    "locationCode" => (isset($row[0])) ? $row[0] : null,
                    "locationName" => (isset($row[1])) ? $row[1] : null,
                    "bpjsLocationCode" => (isset($row[2])) ? $row[2] : null,
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

            $response = $client->post(env('API_URL') . '/location/bulkinsert',
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
            '2' => 'required|not_in:NULL'
        ];
    }

    public function customValidationMessages()
    {
        return [
            '0.required' => 'Location Code is Required',
            '0.not_in' => 'Location Code cannot be Null',
            '1.required' => 'Location Name is Required',
            '1.not_in' => 'Location Name cannot be Null',
            '2.required' => 'BPJS Location Code is Required',
            '2.not_in' => 'BPJS Location Code cannot be Null'
        ];
    }

    public function customValidationAttributes()
    {
        return [
            '0' => 'Location Code',
            '1' => 'Location Name',
            '2' => 'BPJS Location Code'
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
