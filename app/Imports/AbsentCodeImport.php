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

class AbsentCodeImport implements ToCollection, SkipsEmptyRows, WithStartRow
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
                '*.4' => 'required|not_in:NULL'
            ], [
                '*.0.required' => 'Record Status is Required',
                '*.0.not_in' => 'Record Status cannot be Null',
                '*.1.required' => 'Absent Code is Required',
                '*.1.not_in' => 'Absent Code cannot be Null',
                '*.2.required' => 'Absent Type is Required',
                '*.2.not_in' => 'Absent Type cannot be Null',
                '*.3.required' => 'Description (English) is Required',
                '*.3.not_in' => 'Description (English) cannot be Null',
                '*.4.required' => 'Description (Bahasa Indonesia) is Required',
                '*.4.not_in' => 'Description (Bahasa Indonesia) cannot be Null'
            ])->validate();

            foreach ($rows as $row) {
                $param[] = [
                    "RecordStatus" => (isset($row[0])) ? trim($row[0]) : null,
                    "CompanyCode" => Session::get('companyCode'),
                    "AbsentCode" => (isset($row[1])) ? trim($row[1]) : null,
                    "AbsentType" => (isset($row[2])) ? trim($row[2]) : null,
                    "DescriptionEN" => (isset($row[3])) ? $row[3] : null,
                    "DescriptionID" => (isset($row[4])) ? $row[4] : null,
                    "DeductLeave" => (isset($row[5])) ? (string)$row[5] : null,
                    "MustWoman" => ($row[6] == "1" || strtoupper($row[6]) == "TRUE") ? true : false,
                    "MustMan" => ($row[7] == "1" || strtoupper($row[7]) == "TRUE") ? true : false,
                    "DeductSalary" => ($row[8] == "1" || strtoupper($row[8]) == "TRUE") ? true : false,
                    "DeductAllowance" => ($row[9] == "1" || strtoupper($row[9]) == "TRUE") ? true : false,
                    "GetCompensationLeave" => ($row[10] == "1" || strtoupper($row[10]) == "TRUE") ? true : false,
                    "FlagDisplayESS" => ($row[11] == "1" || strtoupper($row[11]) == "TRUE") ? true : false,
                    "FlagAttachment" => ($row[12] == "1" || strtoupper($row[12]) == "TRUE") ? true : false,
                    "FlagReqDay" => ($row[13] == "1" || strtoupper($row[13]) == "TRUE") ? true : false,
                    "ReqBackDay" => (!is_null($row[14]) && $row[14] != "NULL") ? (int) $row[14] : null,
                    "ReqAdvanceDay" => (!is_null($row[15]) && $row[15] != "NULL") ? (int) $row[15] : null,
                    "TimesAllowed" => (!is_null($row[16]) && $row[16] != "NULL") ? (int) $row[16] : null,
                    "FlagWarning" => ($row[17] == "1" || strtoupper($row[17]) == "TRUE") ? true : false,
                    "payroll1" => ($row[18] == "1" || strtoupper($row[18]) == "TRUE") ? true : false,
                    "payroll2" => ($row[19] == "1" || strtoupper($row[19]) == "TRUE") ? true : false,
                    "payroll3" => ($row[20] == "1" || strtoupper($row[20]) == "TRUE") ? true : false,
                    "payroll4" => ($row[21] == "1" || strtoupper($row[21]) == "TRUE") ? true : false,
                    "payroll5" => ($row[22] == "1" || strtoupper($row[22]) == "TRUE") ? true : false,
                    "payroll6" => ($row[23] == "1" || strtoupper($row[23]) == "TRUE") ? true : false,
                    "payroll7" => ($row[24] == "1" || strtoupper($row[24]) == "TRUE") ? true : false,
                    "payroll8" => ($row[25] == "1" || strtoupper($row[25]) == "TRUE") ? true : false,
                    "payroll9" => ($row[26] == "1" || strtoupper($row[26]) == "TRUE") ? true : false,
                    "payroll10" => ($row[27] == "1" || strtoupper($row[27]) == "TRUE") ? true : false,
                    "payroll11" => ($row[28] == "1" || strtoupper($row[28]) == "TRUE") ? true : false,
                    "payroll12" => ($row[29] == "1" || strtoupper($row[29]) == "TRUE") ? true : false,
                    "payroll13" => ($row[30] == "1" || strtoupper($row[30]) == "TRUE") ? true : false,
                    "payroll14" => ($row[31] == "1" || strtoupper($row[31]) == "TRUE") ? true : false,
                    "payroll15" => ($row[32] == "1" || strtoupper($row[32]) == "TRUE") ? true : false,
                    "payroll16" => ($row[33] == "1" || strtoupper($row[33]) == "TRUE") ? true : false,
                    "payroll17" => ($row[34] == "1" || strtoupper($row[34]) == "TRUE") ? true : false,
                    "payroll18" => ($row[35] == "1" || strtoupper($row[35]) == "TRUE") ? true : false,
                    "payroll19" => ($row[36] == "1" || strtoupper($row[36]) == "TRUE") ? true : false,
                    "payroll20" => ($row[37] == "1" || strtoupper($row[37]) == "TRUE") ? true : false,
                    "payroll21" => ($row[38] == "1" || strtoupper($row[38]) == "TRUE") ? true : false,
                    "payroll22" => ($row[39] == "1" || strtoupper($row[39]) == "TRUE") ? true : false,
                    "payroll23" => ($row[40] == "1" || strtoupper($row[40]) == "TRUE") ? true : false,
                    "payroll24" => ($row[41] == "1" || strtoupper($row[41]) == "TRUE") ? true : false,
                    "payroll25" => ($row[42] == "1" || strtoupper($row[42]) == "TRUE") ? true : false,
                    "ApprovalDayLimit" => (!is_null($row[43]) && $row[43] != "NULL") ? (int) $row[43] : null,
                    "AllowNegativeBalance" => ($row[44] == "1" || strtoupper($row[44]) == "TRUE") ? true : false,
                    "CutOffDate" => (!is_null($row[45]) && $row[45] != "NULL") ? (int) $row[45] : null,
                    "NegativeBalance" => (!is_null($row[46]) && $row[46] != "NULL") ? (int) $row[46] : null,
                    "GetOffAddMonths" => (!is_null($row[47]) && $row[47] != "NULL") ? (int) $row[47] : null,
                    "changedNo" => 0,
                    "changedBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    "languageCode" => strtoupper(App::getLocale()),
                    "sessionID" => 0,
                    "sessionUserID" => Session::get('userID'),
                    "logActionUserID" => Session::get('userID'),
                    "logActionUsername" => Session::get('userName')
                ];
            }

            // dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/mobile/tmabsentcode/InsertUpdateBulk',
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
