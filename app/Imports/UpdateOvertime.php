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

class UpdateOvertime implements ToCollection, WithStartRow
{
    /**
    * @param Collection $collection
    */
    private $arrResult = [];

    // public function transformDate($value, $format = 'm/d/Y')
    // {
    //     try {
    //         return Carbon::instance(Date::excelToDateTimeObject($value));
    //     } catch (\ErrorException $e) {
    //         return Carbon::createFromFormat($format, date('m/d/Y', strtotime($value)));
    //     }
    // }

    // public function transformDateTime($value, $format = 'Y-m-d\TH:i:s')
    // {
    //     try {
    //         return Carbon::instance(Date::excelToDateTimeObject($value));
    //     } catch (\ErrorException $e) {
    //         return Carbon::createFromFormat($format, date("Y-m-d\TH:i:s", strtotime($value)));
    //     }
    // }

    public function collection(Collection $rows)
    {
        $param = [];

        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            foreach ($rows as $row) {
                $param[] = [
                    "companyCode" => Session::get('companyCode'),
                    "sessionID" => 0,
                    "sessionUserID" => Session::get('userID'),
                    "languageCode" => App::getLocale(),
                    "changedBy" => Session::get('userID'),
                    "status" => $row[1],
                    "ticketNo" => $row[2],
                    "paidAmount" => $row[12]
                ];
            }

            // var_dump(json_encode($param));

            $response = $client->put(env('API_URL') . '/reimbursementmedical/updatelistticketno',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            // var_dump($response);
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

    // public function rules(): array
    // {
    //     return [
    //         '1' => 'date_format:m/d/Y',
    //         '3' => 'date_format:H:i',
    //         '4' => 'date_format:H:i',
    //     ];
    // }

    // public function customValidationMessages()
    // {
    //     return [
    //         '1.date_format' => 'Date Format Must Be (01/31/2000)',
    //         '3.date_format' => 'Hour & Minute In Format Must Be (07:01)',
    //         '4.date_format' => 'Hour & Minute Out Format Must Be (07:01)',
    //     ];
    // }

    // public function customValidationAttributes()
    // {
    //     return [
    //         '1' => 'Date',
    //         '3' => 'Hour & Minute In',
    //         '4' => 'Hour & Minute Out',
    //     ];
    // }

    public function startRow(): int
    {
        return 2;
    }

    public function getArrResult(): array
    {
        return $this->arrResult;
    }

    // public function map($invoice): array
    // {
    //     $date_ovt = date("Y-m-d\TH:i:s");
        
    //     return [
    //         (string) $invoice[0],
    //         $this->transformDate($invoice[1]),
    //         (string) $invoice[2],
    //         $this->transformDateTime($invoice[3]),
    //         $this->transformDateTime($invoice[4]),
    //         (string) $invoice[5],
    //         (string) $invoice[6],
    //         (string) $invoice[7],
    //         (string) $invoice[8],
    //         $this->transformDateTime($invoice[9])
    //     ];
    // }
}
