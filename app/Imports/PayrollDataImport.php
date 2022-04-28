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
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Session;
use App;

class PayrollDataImport implements ToCollection, WithValidation, WithStartRow
{
    /**
    * @param Collection $collection
    */
    private $arrResult = [];

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return Carbon::instance(Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return Carbon::createFromFormat($format, date('Y-m-d', strtotime($value)));
        }
    }

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
                    "processPeriod" => "2022-04-27T10:00:13.855Z",
                    "transferTo" => "string",
                    "companyCode" => "string",
                    "columnA" => "string",
                    "employeeNo" => "string",
                    "columnB" => "string",
                    "fullName" => "string",
                    "columnC" => "string",
                    "valueColumnC" => 0,
                    "currCodeColumnC" => "string",
                    "columnD" => "string",
                    "valueColumnD" => 0,
                    "currCodeColumnD" => "string",
                    "columnE" => "string",
                    "valueColumnE" => 0,
                    "currCodeColumnE" => "string",
                    "columnF" => "string",
                    "valueColumnF" => 0,
                    "currCodeColumnF" => "string",
                    "columnG" => "string",
                    "valueColumnG" => 0,
                    "currCodeColumnG" => "string",
                    "columnH" => "string",
                    "valueColumnH" => 0,
                    "currCodeColumnH" => "string",
                    "columnI" => "string",
                    "valueColumnI" => 0,
                    "currCodeColumnI" => "string",
                    "columnJ" => "string",
                    "valueColumnJ" => 0,
                    "currCodeColumnJ" => "string",
                    "columnK" => "string",
                    "valueColumnK" => 0,
                    "currCodeColumnK" => "string",
                    "columnL" => "string",
                    "valueColumnL" => 0,
                    "currCodeColumnL" => "string",
                    "changedNo" => 0,
                    "changedBy" => "string",
                    "changedDate" => "2022-04-27T10:00:13.855Z",
                    "createdBy" => "string",
                    "createdDate" => "2022-04-27T10:00:13.855Z",
                    "languageCode" => "string",
                    "sessionID" => 0,
                    "sessionUserID" => "string",
                    "logActionUserID" => "string",
                    "logActionUsername" => "string"
                ];
            }

            $response = $client->put(env('API_URL') . '/importfromexcel/updatesalaryyearly',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
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
            '4' => 'required|not_in:NULL',
            '5' => 'required|not_in:NULL',
            '11' => 'required|not_in:NULL',
            '27' => 'required|not_in:NULL',
            '29' => 'required|not_in:NULL',
            '31' => 'required|not_in:NULL',
            '32' => 'required|not_in:NULL',
            '37' => 'required|not_in:NULL',
            '38' => 'required|not_in:NULL',
            '39' => 'required|not_in:NULL',
            '40' => 'required|not_in:NULL',
            '41' => 'required|not_in:NULL',
            '42' => 'required|not_in:NULL',
            '43' => 'required|not_in:NULL',
            '44' => 'required|not_in:NULL',
            '45' => 'required|not_in:NULL',
            '48' => 'required|not_in:NULL',
            '52' => 'required|not_in:NULL',
            '74' => 'required|not_in:NULL',
            '33' => 'required|not_in:NULL',
            '128' => 'required|not_in:NULL',
        ];
    }

    public function customValidationMessages()
    {
        return [
            '0.required' => 'Employee No is Required',
            '0.not_in' => 'Employee No cannot be Null',
            '1.required' => 'Full Name is Required',
            '1.not_in' => 'Full Name cannot be Null',
            '2.required' => 'Birth Place is Required',
            '2.not_in' => 'Birth Place cannot be Null',
            '3.required' => 'Birth Date is Required',
            '3.not_in' => 'Birth Date cannot be Null',
            '4.required' => 'Gender is Required',
            '4.not_in' => 'Gender cannot be Null',
            '5.required' => 'Marital Status is Required',
            '5.not_in' => 'Marital Status cannot be Null',
            '11.required' => 'Flag is Expat is Required',
            '11.not_in' => 'Flag is Expat cannot be Null',
            '27.required' => 'Flag is Commissioner is Required',
            '27.not_in' => 'Flag is Commissioner cannot be Null',
            '29.required' => 'Absenteeism Type is Required',
            '29.not_in' => 'Absenteeism Type cannot be Null',
            '31.required' => 'Start At Day is Required',
            '31.not_in' => 'Start At Day cannot be Null',
            '32.required' => 'Flag Not Absent is Required',
            '32.not_in' => 'Flag Not Absent cannot be Null',
            '37.required' => 'Flag Astek Death Not Accident is Required',
            '37.not_in' => 'Flag Astek Death Not Accident cannot be Null',
            '38.required' => 'Flag Astek Work Accident is Required',
            '38.not_in' => 'Flag Astek Work Accident cannot be Null',
            '39.required' => 'Flag Astek Work Accident 2 is Required',
            '39.not_in' => 'Flag Astek Work Accident 2 cannot be Null',
            '40.required' => 'Flag Astek Work Accident 3 is Required',
            '40.not_in' => 'Flag Astek Work Accident 3 cannot be Null',
            '41.required' => 'Flag Astek Pension Employee is Required',
            '41.not_in' => 'Flag Astek Pension Employee cannot be Null',
            '42.required' => 'Flag Astek Pension Employer is Required',
            '42.not_in' => 'Flag Astek Pension Employer cannot be Null',
            '43.required' => 'Flag Astek Health Insurance is Required',
            '43.not_in' => 'Flag Astek Health Insurance cannot be Null',
            '44.required' => 'Flag Tax By Governent is Required',
            '44.not_in' => 'Flag Tax By Governent cannot be Null',
            '45.required' => 'Flag Pension Insurance is Required',
            '45.not_in' => 'Flag Pension Insurance cannot be Null',
            '48.required' => 'Flag BPJS Kesehatan is Required',
            '48.not_in' => 'Flag BPJS Kesehatan cannot be Null',
            '52.required' => 'Flag BPJS Tenaga Kerja is Required',
            '52.not_in' => 'Flag BPJS Tenaga Kerja cannot be Null',
            '74.required' => 'Flag Exclude Payroll is Required',
            '74.not_in' => 'Flag Exclude Payroll cannot be Null',
            '33.required' => 'Flag Not Finger is Required',
            '33.not_in' => 'Flag Not Finger cannot be Null',
            '128.required' => 'Leave Code is Required',
            '128.not_in' => 'Leave Code cannot be Null',
        ];
    }

    public function customValidationAttributes()
    {
        return [
            '0' => 'Employee No',
            '1' => 'Full Name',
            '2' => 'Birth Place',
            '3' => 'Birth Date',
            '4' => 'Gender',
            '5' => 'Marital Status',
            '11' => 'Flag is Expat',
            '27' => 'Flag is Commissioner',
            '29' => 'Absenteeism Type',
            '31' => 'Start At Day',
            '32' => 'Flag Not Absent',
            '37' => 'Flag Astek Death Not Accident',
            '38' => 'Flag Astek Work Accident',
            '39' => 'Flag Astek Work Accident 2',
            '40' => 'Flag Astek Work Accident 3',
            '41' => 'Flag Astek Pension Employee',
            '42' => 'Flag Astek Pension Employer',
            '43' => 'Flag Astek Health Insurance',
            '44' => 'Flag Tax By Governent',
            '45' => 'Flag Pension Insurance',
            '48' => 'Flag BPJS Kesehatan',
            '52' => 'Flag BPJS Tenaga Kerja',
            '74' => 'Flag Exclude Payroll',
            '33' => 'Flag Not Finger',
            '128' => 'Leave Code',
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
