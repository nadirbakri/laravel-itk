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

class VaccinationScheduleImport implements ToCollection, SkipsEmptyRows, WithStartRow
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
                '*.3' => 'required|not_in:NULL',
                '*.4' => 'required|not_in:NULL',
                '*.5' => 'required|not_in:NULL|date_format:Y-m-d',
                '*.6' => 'required|not_in:NULL|date_format:H:i',
                '*.7' => 'required|not_in:NULL',
            ];

            $messages = [
                '*.0.required' => 'Employee No is Required',
                '*.0.not_in' => 'Employee No cannot be Null',
                '*.1.required' => 'Title is Required',
                '*.1.not_in' => 'Title cannot be Null',
                '*.2.required' => 'Vaccine Code is Required',
                '*.2.not_in' => 'Vaccine Code cannot be Null',
                '*.3.required' => 'Batch Code is Required',
                '*.3.not_in' => 'Batch Code cannot be Null',
                '*.4.required' => 'Number of Dose is Required',
                '*.4.not_in' => 'Number of Dose cannot be Null',
                '*.5.required' => 'Vaccine Date is Required',
                '*.5.not_in' => 'Vaccine Date cannot be Null',
                '*.5.date_format' => 'Vaccine Date Format Must Be (2020-01-31). Make Sure to Change Column Format to Text, not Date',
                '*.6.required' => 'Vaccine Time is Required',
                '*.6.not_in' => 'Vaccine Time cannot be Null',
                '*.6.date_format' => 'Vaccine Time Format Must Be (12:00). Make Sure to Change Column Format to Text, not Date',
                '*.7.required' => 'Address is Required',
                '*.7.not_in' => 'Address cannot be Null',
            ];

            Validator::make($rows->toArray(), $rules, $messages)->validate();

            foreach ($rows as $row) {
                $param[] = [
                    "companyCode" => Session::get('companyCode'),
                    "type" => 'V',
                    "employeeNo" => isset($row[0]) ? (string) $row[0] : null,
                    "description" => isset($row[1]) ? (string) $row[1] : null,
                    "code" => isset($row[2]) ? (string) $row[2] : null,
                    "date" => (isset($row[5]) && isset($row[6])) ? (string) $row[5] . 'T' . (string) $row[6] : null,
                    "address" => isset($row[7]) ? (string) $row[7] : null,
                    "languageCode" => App::getLocale(),
                    "sessionID" => 0,
                    "sessionUserID" => Session::get('userID'),
                    "logActionUserID" => Session::get('userID'),
                    "logActionUsername" => Session::get('userID'),
                    "detailActivities" => [
                        [
                            "sequence" => isset($row[4]) ? (string) $row[4] : null,
                            "activityType" => 'V',
                            "batchCode" => isset($row[3]) ? (string) $row[3] : null,
                            "date" => (isset($row[5]) && isset($row[6])) ? (string) $row[5] . 'T' . (string) $row[6] : null,
                            "amount" => (int) count($rows),
                            "address" => isset($row[7]) ? (string) $row[7] : null,
                            "description" => isset($row[8]) ? (string) $row[8] : null,
                        ]
                    ]
                ];
            }

            // dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/personel/HealthActivities/InsertHealthActivities',
                ['body' => json_encode($param)]
            );
        } catch (ValidationException $e) {
            $validationErrors = $e->validator->errors()->messages();
            $errorValidate = array_shift($validationErrors);
            $this->arrResult[] = (object)['status' => false, 'message' => $errorValidate];
            return $this->arrResult;
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response && $response->getStatusCode() == 400) {
                $body = json_decode($response->getBody()->getContents(), true);
                $message = $body['message'] ?? 'Bad Request';
                $this->arrResult[] = (object)['status' => false, 'message' => $message];
                return $this->arrResult;
            }
            $this->arrResult[]['message'] = $response;
            if($response && $response->getStatusCode() == 401){
                return view('error.login');
            }else if($response && $response->getStatusCode() == 404){
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
