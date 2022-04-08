<?php

namespace App\Imports;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Session;
use App;

class PersonalDataImport implements ToCollection, WithStartRow
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
                    "recordStatus" => "A",
                    "companyCode" => Session::get('companyCode'),
                    "employeeNo" => !is_null($row[0]) ? strval($row[0]) : null,
                    "title" => null,
                    "fullName" => !is_null($row[1]) ? strval($row[1]) : null,
                    "birthPlace" => !is_null($row[2]) ? strval($row[2]) : null,
                    "birthDate" => !is_null($row[3]) ? $this->transformDate($row[3]) : null,
                    "age" => 0,
                    "gender" => !is_null($row[4]) ? strval($row[4]) : null,
                    "educationCode" => null,
                    "maritalStatus" => !is_null($row[5]) ? strval($row[5]) : null,
                    "taxRegisteredNo" => !is_null($row[6]) ? strval($row[6]) : null,
                    "taxRegisteredDate" => null,
                    "taxRegisteredPlaceRegistration" => null,
                    "taxRegisteredExpiryDate" => null,
                    "religionCode" => !is_null($row[7]) ? strval($row[7]) : null,
                    "nationalityCode" => !is_null($row[8]) ? strval($row[8]) : null,
                    "costCenterCode" => !is_null($row[9]) ? strval($row[9]) : null,
                    "employmentStatus" => !is_null($row[10]) ? strval($row[10]) : null,
                    "flagIsExpat" => ($row[11] == "1" || $row[11] || strtoupper($row[11]) == "TRUE") ? true : false,
                    "expatLicenseNo" => !is_null($row[12]) ? strval($row[12]) : null,
                    "expatLicenseStartDate" => !is_null($row[13]) ? $this->transformDate($row[13]) : null,
                    "expatLicenseEndDate" => !is_null($row[14]) ? $this->transformDate($row[14]) : null,
                    "joinDate" => !is_null($row[15]) ? $this->transformDate($row[15]) : null,
                    "probationEndDate" => !is_null($row[16]) ? $this->transformDate($row[16]) : null,
                    "contractStartDate" => !is_null($row[17]) ? $this->transformDate($row[17]) : null,
                    "contractEndDate" => !is_null($row[18]) ? $this->transformDate($row[18]) : null,
                    "terminationDate" => null,
                    "terminationCode" => null,
                    "terminationRemarks" => null,
                    "effectiveTerminationDate" => null,
                    "pensionDate" => null,
                    "serviceYear" => 0,
                    "employmentType" => !is_null($row[19]) ? strval($row[19]) : null,
                    "locationCode" => !is_null($row[20]) ? strval($row[20]) : null,
                    "gradeCode" => !is_null($row[21]) ? strval($row[21]) : null,
                    "positionCode" => !is_null($row[22]) ? strval($row[22]) : null,
                    "rankingCode" => !is_null($row[23]) ? strval($row[23]) : null,
                    "workNatureCode" => !is_null($row[24]) ? strval($row[24]) : null,
                    "groupCode" => !is_null($row[25]) ? strval($row[25]) : null,
                    "groupAuthorizeCode" => !is_null($row[26]) ? (int) $row[26] : null,
                    "specialResign" => false,
                    "photo" => null,
                    "npwpMutationCode" => null,
                    "npwpMutationDate" => null,
                    "flagMutationNPWPFrom" => false,
                    "flagMutationNPWPTo" => false,
                    "flagMutationToSameGroup" => false,
                    "flagMutationToOtherDirectory" => false,
                    "auditLastSequenceNo" => 0,
                    "flagIsDirect" => false,
                    "flagIsTemporary" => false,
                    "flagIsCommissioner" => ($row[27] == "1" || $row[27] || strtoupper($row[27]) == "TRUE") ? true : false,
                    "motherName" => !is_null($row[28]) ? strval($row[28]) : null,
                    "absenteeismType" => !is_null($row[29]) ? strval($row[29]) : null,
                    "workPatternCode" => !is_null($row[30]) ? strval($row[30]) : null,
                    "startAtDay" => !is_null($row[31]) ? (int) $row[31] : null,
                    "flagNotAbsent" => ($row[32] == "1" || $row[32] || strtoupper($row[32]) == "TRUE") ? true : false,
                    "taxCalculationMethod" => !is_null($row[36]) ? strval($row[36]) : null,
                    "flagAstekDeathNonAccident" => ($row[37] == "1" || $row[37] || strtoupper($row[37]) == "TRUE") ? true : false,
                    "flagAstekWorkAccident" => ($row[38] == "1" || $row[38] || strtoupper($row[38]) == "TRUE") ? true : false,
                    "flagAstekWorkAccident2" => ($row[39] == "1" || $row[39] || strtoupper($row[39]) == "TRUE") ? true : false,
                    "flagAstekWorkAccident3" => ($row[40] == "1" || $row[40] || strtoupper($row[40]) == "TRUE") ? true : false,
                    "flagAstekPensionEmployee" => ($row[41] == "1" || $row[41] || strtoupper($row[41]) == "TRUE") ? true : false,
                    "flagAstekPensionEmployer" => ($row[42] == "1" || $row[42] || strtoupper($row[42]) == "TRUE") ? true : false,
                    "flagAstekHealthInsurance" => ($row[43] == "1" || $row[43] || strtoupper($row[43]) == "TRUE") ? true : false,
                    "flagTaxByGovernment" => ($row[44] == "1" || $row[44] || strtoupper($row[44]) == "TRUE") ? true : false,
                    "groupNpwp" => !is_null($row[45]) ? strval($row[45]) : null,
                    "groupBpjs" => !is_null($row[46]) ? strval($row[46]) : null,
                    "flagPensionInsurance" => false,
                    "flagBPJSKesehatan" => ($row[47] == "1" || $row[47] || strtoupper($row[47]) == "TRUE") ? true : false,
                    "bpjsKesehatanNo" => !is_null($row[48]) ? strval($row[48]) : null,
                    "bpjsKesehatanJoinDate" => !is_null($row[49]) ? $this->transformDate($row[49]) : null,
                    "bpjsKesehatanPeriodStartDate" => !is_null($row[50]) ? $this->transformDate($row[50]) : null,
                    "flagBPJSTenagaKerja" => ($row[51] == "1" || $row[51] || strtoupper($row[51]) == "TRUE") ? true : false,
                    "bpjsTenagaKerjaNo" => !is_null($row[52]) ? strval($row[52]) : null,
                    "bpjsTenagaKerjaJoinDate" => !is_null($row[53]) ? $this->transformDate($row[53]) : null,
                    "bpjsTenagaKerjaPeriodStartDate" => !is_null($row[54]) ? $this->transformDate($row[54]) : null,
                    "employeeBankCode1" => !is_null($row[55]) ? strval($row[55]) : null,
                    "employeeBankCode2" => !is_null($row[61]) ? strval($row[61]) : null,
                    "employeeBankCode3" => !is_null($row[67]) ? strval($row[67]) : null,
                    "companyBankCode1" => !is_null($row[59]) ? strval($row[59]) : null,
                    "companyBankCode2" => !is_null($row[65]) ? strval($row[65]) : null,
                    "companyBankCode3" => !is_null($row[71]) ? strval($row[71]) : null,
                    "bankAccountNo1" => !is_null($row[56]) ? strval($row[56]) : null,
                    "beneficiaryName1" => !is_null($row[57]) ? strval($row[57]) : null,
                    "bankPercentageSalary1" => !is_null($row[58]) ? (int) $row[58] : null,
                    "currencyCode1" => !is_null($row[60]) ? strval($row[60]) : null,
                    "bankAccountNo2" => !is_null($row[62]) ? strval($row[62]) : null,
                    "beneficiaryName2" => !is_null($row[63]) ? strval($row[63]) : null,
                    "bankPercentageSalary2" => !is_null($row[64]) ? (int) $row[64] : null,
                    "currencyCode2" => !is_null($row[66]) ? strval($row[66]) : null,
                    "bankAccountNo3" => !is_null($row[68]) ? strval($row[68]) : null,
                    "beneficiaryName3" => !is_null($row[69]) ? strval($row[69]) : null,
                    "bankPercentageSalary3" => !is_null($row[70]) ? (int) $row[70] : null,
                    "currencyCode3" => !is_null($row[72]) ? strval($row[72]) : null,
                    "originJoinDate" => !is_null($row[15]) ? $this->transformDate($row[15]) : null,
                    "flagNotFinger" => ($row[33] == "1" || $row[33] || strtoupper($row[33]) == "TRUE") ? true : false,
                    "taxStatus" => !is_null($row[34]) ? strval($row[34]) : null,
                    "taxStatusNextYear" => !is_null($row[35]) ? strval($row[35]) : null,
                    "flagExcludePayroll" => ($row[73] == "1" || $row[73] || strtoupper($row[73]) == "TRUE") ? true : false,
                    "token" => Session::get('token'),
                    "user" => null,
                    "userDetail" => null,
                    "userAkses" => null,
                    "peMasterInfo" => null,
                    "peMasterFamily" => null,
                    "peMasterFringeBenefit" => null,
                    "peMasterInsurance" => null,
                    "flagTemp" => "string",
                    "changedNo" => 0,
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "changedBy" => Session::get('userID'),
                    "languageCode" => App::getLocale(),
                    "sessionID" => 0,
                    "sessionUserID" => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName')
                ];
            }

            $response = $client->post(env('API_URL') . '/pemaster/importpemaster',
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

    public function startRow(): int
    {
        return 2;
    }

    public function getArrResult(): array
    {
        return $this->arrResult;
    }
}
