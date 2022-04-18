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
                    "peMasterFamily" => null,
                    "peMasterFringeBenefit" => null,
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
                    'logActionUsername' => Session::get('userName'),
                    'peMasterLeave' => [
                        "companyCode" => Session::get('companyCode'),
                        "employeeNo" => !is_null($row[0]) ? strval($row[0]) : null,
                        "leaveCode" => !is_null($row[127]) ? strval($row[127]) : null,
                        "deductLeave" => "0",
                        "leaveBalance" => 0,
                        "leaveBalanceBefore" => 0,
                        "leaveBalanceBeforeExpiredDate" => null, 
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ],
                    'peMasterHistoryJob' => [
                        "companyCode" => Session::get('companyCode'),
                        "employeeNo" => !is_null($row[0]) ? strval($row[0]) : null,
                        "seqNo" => 1,
                        "historyCompanyCode" => Session::get('companyCode'),
                        "startDate" => !is_null($row[15]) ? $this->transformDate($row[15]) : null,
                        "endDate" => null,
                        "employmentStatus" => !is_null($row[10]) ? strval($row[10]) : null,
                        "employmentType" => !is_null($row[19]) ? strval($row[19]) : null,
                        "contractStartDate" => !is_null($row[17]) ? $this->transformDate($row[17]) : null,
                        "contractEndDate" => !is_null($row[18]) ? $this->transformDate($row[18]) : null,
                        "decreeCode" => null,
                        "decreeNo" => null,
                        "decreeDate" => null,
                        "positionCode" => !is_null($row[22]) ? strval($row[22]) : null,
                        "rankingCode" => !is_null($row[23]) ? strval($row[23]) : null,
                        "gradeCode" => !is_null($row[21]) ? strval($row[21]) : null,
                        "groupCode" => !is_null($row[25]) ? strval($row[25]) : null,
                        "locationCode" => !is_null($row[20]) ? strval($row[20]) : null,
                        "workNatureCode" => !is_null($row[24]) ? strval($row[24]) : null,
                        "costCenterCode" => !is_null($row[9]) ? strval($row[9]) : null,
                        "remarks" => null,
                        "approvedBy" => null,
                        "flagisDirect" => false,
                        "flagisTemporary" => false,
                        "jobDesc" => null,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "languageCode" => App::getLocale(),
                        "languageID" => App::getLocale(),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ],
                    'peMasterInfo' => [
                        "companyCode" => Session::get('companyCode'),
                        "employeeNo" => !is_null($row[0]) ? strval($row[0]) : null,
                        "nickName" => !is_null($row[74]) ? strval($row[74]) : null,
                        "bloodType" => !is_null($row[75]) ? strval($row[75]) : null,
                        "passportNo" => !is_null($row[76]) ? strval($row[76]) : null,
                        "passportDate" => !is_null($row[77]) ? $this->transformDate($row[77]) : null,
                        "passportPlaceRegistration" => !is_null($row[78]) ? strval($row[78]) : null,
                        "passportExpiryDate" => !is_null($row[79]) ? $this->transformDate($row[79]) : null,
                        "drivingLicenseMobilNo" => !is_null($row[80]) ? strval($row[80]) : null,
                        "drivingLicenseMobilType" => !is_null($row[81]) ? strval($row[81]) : null,
                        "drivingLicenseMobilNoDate" => !is_null($row[82]) ? $this->transformDate($row[82]) : null,
                        "drivingLicenseMobilNoPlaceRegistration" => !is_null($row[83]) ? strval($row[83]) : null,
                        "drivingLicenseMobilNoExpiryDate" => !is_null($row[84]) ? $this->transformDate($row[84]) : null,
                        "drivingLicenseMotorNo" => !is_null($row[85]) ? strval($row[85]) : null,
                        "drivingLicenseMotorNoDate" => !is_null($row[86]) ? $this->transformDate($row[86]) : null,
                        "drivingLicenseMotorNoPlaceRegistration" => !is_null($row[87]) ? strval($row[87]) : null,
                        "drivingLicenseMotorNoExpiryDate" => !is_null($row[88]) ? $this->transformDate($row[88]) : null,
                        "employeeCardId" => !is_null($row[89]) ? strval($row[89]) : null,
                        "idNo" => !is_null($row[90]) ? strval($row[90]) : null,
                        "idNoDate" => !is_null($row[91]) ? $this->transformDate($row[91]) : null,
                        "idNoPlaceRegistration" => !is_null($row[92]) ? strval($row[83]) : null,
                        "idNoExpiryDate" => !is_null($row[93]) ? $this->transformDate($row[93]) : null,
                        "homeAddress" => !is_null($row[94]) ? strval($row[94]) : null,
                        "homeCityCode" => !is_null($row[95]) ? strval($row[95]) : null,
                        "homeZipCode" => !is_null($row[96]) ? strval($row[96]) : null,
                        "homePhone" => !is_null($row[97]) ? strval($row[97]) : null,
                        "otherAddress" => !is_null($row[98]) ? strval($row[98]) : null,
                        "otherCityCode" => !is_null($row[99]) ? strval($row[99]) : null,
                        "otherZipCode" => !is_null($row[100]) ? strval($row[100]) : null,
                        "otherPhone" => !is_null($row[101]) ? strval($row[101]) : null,
                        "workAddress" => !is_null($row[102]) ? strval($row[102]) : null,
                        "workCityCode" => !is_null($row[103]) ? strval($row[103]) : null,
                        "workZipCode" => !is_null($row[104]) ? strval($row[104]) : null,
                        "workPhone" => !is_null($row[105]) ? strval($row[105]) : null,
                        "correspondenceAddress" => !is_null($row[106]) ? strval($row[106]) : null,
                        "correspondenceCityCode" => !is_null($row[107]) ? strval($row[107]) : null,
                        "correspondenceZipCode" => !is_null($row[108]) ? strval($row[108]) : null,
                        "correspondencePhone" => !is_null($row[109]) ? strval($row[109]) : null,
                        "personalHandphone" => !is_null($row[110]) ? strval($row[110]) : null,
                        "personalEmailAddress" => !is_null($row[111]) ? strval($row[111]) : null,
                        "companyEmailAddress" => !is_null($row[112]) ? strval($row[112]) : null,
                        "emergencyName" => !is_null($row[113]) ? strval($row[113]) : null,
                        "emergencyAddress" => !is_null($row[114]) ? strval($row[114]) : null,
                        "emergencyPhone" => !is_null($row[115]) ? strval($row[115]) : null,
                        "emergencyRelation" => !is_null($row[116]) ? strval($row[116]) : null,
                        "emergencyEmailAddress" => !is_null($row[117]) ? strval($row[117]) : null,
                        "homeDistrictCode" => !is_null($row[118]) ? strval($row[118]) : null,
                        "homeSubDistrictCode" => !is_null($row[119]) ? strval($row[119]) : null,
                        "otherDistrictCode" => !is_null($row[120]) ? strval($row[120]) : null,
                        "otherSubDistrictCode" => !is_null($row[121]) ? strval($row[121]) : null,
                        "jobDesc" => null,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ],
                    'peMasterInsurance' => [
                        "companyCode" => Session::get('companyCode'),
                        "employeeNo" => !is_null($row[0]) ? strval($row[0]) : null,
                        "insuranceCode" => !is_null($row[122]) ? strval($row[122]) : null,
                        "insuranceClassCode" => !is_null($row[123]) ? strval($row[123]) : null,
                        "insuranceStartDate" => !is_null($row[124]) ? $this->transformDate($row[124]) : null,
                        "insuranceEndDate" => !is_null($row[125]) ? $this->transformDate($row[125]) : null,
                        "insurancePolicyNo" => !is_null($row[126]) ? strval($row[126]) : null,
                        "insuranceRemark" => null,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
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
