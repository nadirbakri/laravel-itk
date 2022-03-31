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
                    "employeeNo" => strval($row[0]),
                    "title" => null,
                    "fullName" => strval($row[1]),
                    "birthPlace" => strval($row[2]),
                    "birthDate" => $this->transformDate($row[3]),
                    "age" => 0,
                    "gender" => strval($row[4]),
                    "educationCode" => null,
                    "maritalStatus" => strval($row[5]),
                    "taxRegisteredNo" => strval($row[6]),
                    "taxRegisteredDate" => null,
                    "taxRegisteredPlaceRegistration" => null,
                    "taxRegisteredExpiryDate" => null,
                    "religionCode" => strval($row[7]),
                    "nationalityCode" => strval($row[8]),
                    "costCenterCode" => strval($row[9]),
                    "employmentStatus" => strval($row[10]),
                    "flagIsExpat" => ($row[11] == "1" || $row[11]) ? true : false,
                    "expatLicenseNo" => strval($row[12]),
                    "expatLicenseStartDate" => $this->transformDate($row[13]),
                    "expatLicenseEndDate" => $this->transformDate($row[14]),
                    "joinDate" => $this->transformDate($row[15]),
                    "probationEndDate" => $this->transformDate($row[16]),
                    "contractStartDate" => $this->transformDate($row[17]),
                    "contractEndDate" => $this->transformDate($row[18]),
                    "terminationDate" => null,
                    "terminationCode" => null,
                    "terminationRemarks" => null,
                    "effectiveTerminationDate" => null,
                    "pensionDate" => null,
                    "serviceYear" => 0,
                    "employmentType" => strval($row[19]),
                    "locationCode" => strval($row[20]),
                    "gradeCode" => strval($row[21]),
                    "positionCode" => strval($row[22]),
                    "rankingCode" => strval($row[23]),
                    "workNatureCode" => strval($row[24]),
                    "groupCode" => strval($row[25]),
                    "groupAuthorizeCode" => (int) $row[26],
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
                    "flagIsCommissioner" => ($row[27] == "1" || $row[27]) ? true : false,
                    "motherName" => strval($row[28]),
                    "absenteeismType" => strval($row[29]),
                    "workPatternCode" => strval($row[30]),
                    "startAtDay" => (int) $row[31],
                    "flagNotAbsent" => ($row[32] == "1" || $row[32]) ? true : false,
                    "taxCalculationMethod" => strval($row[36]),
                    "flagAstekDeathNonAccident" => ($row[37] == "1" || $row[37]) ? true : false,
                    "flagAstekWorkAccident" => ($row[38] == "1" || $row[38]) ? true : false,
                    "flagAstekWorkAccident2" => ($row[39] == "1" || $row[39]) ? true : false,
                    "flagAstekWorkAccident3" => ($row[40] == "1" || $row[40]) ? true : false,
                    "flagAstekPensionEmployee" => ($row[41] == "1" || $row[41]) ? true : false,
                    "flagAstekPensionEmployer" => ($row[42] == "1" || $row[42]) ? true : false,
                    "flagAstekHealthInsurance" => ($row[43] == "1" || $row[43]) ? true : false,
                    "flagTaxByGovernment" => ($row[44] == "1" || $row[44]) ? true : false,
                    "groupNpwp" => strval($row[45]),
                    "groupBpjs" => strval($row[46]),
                    "flagPensionInsurance" => false,
                    "flagBPJSKesehatan" => ($row[47] == "1" || $row[47]) ? true : false,
                    "bpjsKesehatanNo" => strval($row[48]),
                    "bpjsKesehatanJoinDate" => $this->transformDate($row[49]),
                    "bpjsKesehatanPeriodStartDate" => $this->transformDate($row[50]),
                    "flagBPJSTenagaKerja" => ($row[51] == "1" || $row[51]) ? true : false,
                    "bpjsTenagaKerjaNo" => strval($row[52]),
                    "bpjsTenagaKerjaJoinDate" => $this->transformDate($row[53]),
                    "bpjsTenagaKerjaPeriodStartDate" => $this->transformDate($row[54]),
                    "employeeBankCode1" => strval($row[55]),
                    "employeeBankCode2" => strval($row[61]),
                    "employeeBankCode3" => strval($row[67]),
                    "companyBankCode1" => strval($row[59]),
                    "companyBankCode2" => strval($row[65]),
                    "companyBankCode3" => strval($row[71]),
                    "bankAccountNo1" => strval($row[56]),
                    "beneficiaryName1" => strval($row[57]),
                    "bankPercentageSalary1" => (int) $row[58],
                    "currencyCode1" => strval($row[60]),
                    "bankAccountNo2" => strval($row[62]),
                    "beneficiaryName2" => strval($row[63]),
                    "bankPercentageSalary2" => (int) $row[64],
                    "currencyCode2" => strval($row[66]),
                    "bankAccountNo3" => strval($row[68]),
                    "beneficiaryName3" => strval($row[69]),
                    "bankPercentageSalary3" => (int) $row[70],
                    "currencyCode3" => strval($row[72]),
                    "originJoinDate" => $this->transformDate($row[15]),
                    "flagNotFinger" => ($row[33] == "1" || $row[33]) ? true : false,
                    "taxStatus" => strval($row[34]),
                    "taxStatusNextYear" => strval($row[35]),
                    "flagExcludePayroll" => ($row[73] == "1" || $row[33]) ? true : false,
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
