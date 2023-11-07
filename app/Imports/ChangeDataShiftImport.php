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
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Session;
use App;

class ChangeDataShiftImport implements ToCollection, SkipsEmptyRows, WithStartRow
{
    /**
    * @param Collection $collection
    */
    private $arrResult = [];

    public function collection(Collection $rows)
    {
        $keys = null;
        $param = [];

        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            Validator::make($rows->toArray(), [
                '*.0' => 'required|not_in:NULL'
            ], [
                '*.0.required' => 'Employee No is Required',
                '*.0.not_in' => 'Employee No cannot be Null'
            ])->validate();

            foreach ($rows as $row) {
                if (!$keys) {
                    // Use the first row as keys
                    $keys = $row->toArray();
                } else {
                    $convertedRow = $row->toArray();
                    $convertedRow[0] = strval($row[0]);
            
                    // Use the converted row for values
                    $param['companyCode'] = Session::get('companyCode');
                    $param['shiftLists'][] = array_combine($keys, $convertedRow);
                    $param["languageCode"] = App::getLocale();
                    $param["changedBy"] = Session::get('userID');
                    $param["sessionUserID"] = Session::get('userID');
                    $param["sessionID"] = 0;
                }
            }

            $response = $client->put(env('API_URL') . '/tmabsentemployee/updatetmshift',
                ['body' => json_encode($param)]
            );
        } catch (ValidationException $e) {
            $validationErrors = $e->validator->errors()->messages();
            $errorValidate = array_shift($validationErrors);
            $this->arrResult[]['message'] = array_shift($errorValidate);
            return $this->arrResult;
        } catch (RequestException $e) {
            $response = $e->getResponse();
            // var_dump($response);
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
        return 1;
    }

    public function getArrResult(): array
    {
        return $this->arrResult;
    }
}
