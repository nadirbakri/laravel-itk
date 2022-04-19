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
                    "flagIsExpat" => ($row[11] == "1" || strtoupper($row[11]) == "TRUE") ? true : false,
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
                    "flagIsCommissioner" => ($row[27] == "1" || strtoupper($row[27]) == "TRUE") ? true : false,
                    "motherName" => !is_null($row[28]) ? strval($row[28]) : null,
                    "absenteeismType" => !is_null($row[29]) ? strval($row[29]) : null,
                    "workPatternCode" => !is_null($row[30]) ? strval($row[30]) : null,
                    "startAtDay" => !is_null($row[31]) ? (int) $row[31] : null,
                    "flagNotAbsent" => ($row[32] == "1" || strtoupper($row[32]) == "TRUE") ? true : false,
                    "taxCalculationMethod" => !is_null($row[36]) ? strval($row[36]) : null,
                    "flagAstekDeathNonAccident" => ($row[37] == "1" || strtoupper($row[37]) == "TRUE") ? true : false,
                    "flagAstekWorkAccident" => ($row[38] == "1" || strtoupper($row[38]) == "TRUE") ? true : false,
                    "flagAstekWorkAccident2" => ($row[39] == "1" || strtoupper($row[39]) == "TRUE") ? true : false,
                    "flagAstekWorkAccident3" => ($row[40] == "1" || strtoupper($row[40]) == "TRUE") ? true : false,
                    "flagAstekPensionEmployee" => ($row[41] == "1" || strtoupper($row[41]) == "TRUE") ? true : false,
                    "flagAstekPensionEmployer" => ($row[42] == "1" || strtoupper($row[42]) == "TRUE") ? true : false,
                    "flagAstekHealthInsurance" => ($row[43] == "1" || strtoupper($row[43]) == "TRUE") ? true : false,
                    "flagTaxByGovernment" => ($row[44] == "1" || strtoupper($row[44]) == "TRUE") ? true : false,
                    "groupNpwp" => !is_null($row[46]) ? strval($row[46]) : null,
                    "groupBpjs" => !is_null($row[47]) ? strval($row[47]) : null,
                    "flagPensionInsurance" => ($row[45] == "1" || strtoupper($row[45]) == "TRUE") ? true : false,
                    "flagBPJSKesehatan" => ($row[48] == "1" || strtoupper($row[48]) == "TRUE") ? true : false,
                    "bpjsKesehatanNo" => !is_null($row[49]) ? strval($row[49]) : null,
                    "bpjsKesehatanJoinDate" => !is_null($row[50]) ? $this->transformDate($row[50]) : null,
                    "bpjsKesehatanPeriodStartDate" => !is_null($row[51]) ? $this->transformDate($row[51]) : null,
                    "flagBPJSTenagaKerja" => ($row[52] == "1" || strtoupper($row[52]) == "TRUE") ? true : false,
                    "bpjsTenagaKerjaNo" => !is_null($row[53]) ? strval($row[53]) : null,
                    "bpjsTenagaKerjaJoinDate" => !is_null($row[54]) ? $this->transformDate($row[54]) : null,
                    "bpjsTenagaKerjaPeriodStartDate" => !is_null($row[55]) ? $this->transformDate($row[55]) : null,
                    "employeeBankCode1" => !is_null($row[56]) ? strval($row[56]) : null,
                    "employeeBankCode2" => !is_null($row[62]) ? strval($row[62]) : null,
                    "employeeBankCode3" => !is_null($row[68]) ? strval($row[68]) : null,
                    "companyBankCode1" => !is_null($row[60]) ? strval($row[60]) : null,
                    "companyBankCode2" => !is_null($row[66]) ? strval($row[66]) : null,
                    "companyBankCode3" => !is_null($row[72]) ? strval($row[72]) : null,
                    "bankAccountNo1" => !is_null($row[57]) ? strval($row[57]) : null,
                    "beneficiaryName1" => !is_null($row[58]) ? strval($row[58]) : null,
                    "bankPercentageSalary1" => !is_null($row[59]) ? (int) $row[59] : null,
                    "currencyCode1" => !is_null($row[61]) ? strval($row[61]) : null,
                    "bankAccountNo2" => !is_null($row[63]) ? strval($row[63]) : null,
                    "beneficiaryName2" => !is_null($row[64]) ? strval($row[64]) : null,
                    "bankPercentageSalary2" => !is_null($row[65]) ? (int) $row[65] : null,
                    "currencyCode2" => !is_null($row[67]) ? strval($row[67]) : null,
                    "bankAccountNo3" => !is_null($row[69]) ? strval($row[69]) : null,
                    "beneficiaryName3" => !is_null($row[70]) ? strval($row[70]) : null,
                    "bankPercentageSalary3" => !is_null($row[71]) ? (int) $row[71] : null,
                    "currencyCode3" => !is_null($row[73]) ? strval($row[73]) : null,
                    "originJoinDate" => !is_null($row[15]) ? $this->transformDate($row[15]) : null,
                    "flagNotFinger" => ($row[33] == "1" || strtoupper($row[33]) == "TRUE") ? true : false,
                    "taxStatus" => !is_null($row[34]) ? strval($row[34]) : null,
                    "taxStatusNextYear" => !is_null($row[35]) ? strval($row[35]) : null,
                    "flagExcludePayroll" => ($row[74] == "1" || strtoupper($row[74]) == "TRUE") ? true : false,
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
                        "leaveCode" => !is_null($row[128]) ? strval($row[128]) : null,
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
                        "nickName" => !is_null($row[75]) ? strval($row[75]) : null,
                        "bloodType" => !is_null($row[76]) ? strval($row[76]) : null,
                        "passportNo" => !is_null($row[77]) ? strval($row[77]) : null,
                        "passportDate" => !is_null($row[78]) ? $this->transformDate($row[78]) : null,
                        "passportPlaceRegistration" => !is_null($row[79]) ? strval($row[79]) : null,
                        "passportExpiryDate" => !is_null($row[80]) ? $this->transformDate($row[80]) : null,
                        "drivingLicenseMobilNo" => !is_null($row[81]) ? strval($row[81]) : null,
                        "drivingLicenseMobilType" => !is_null($row[82]) ? strval($row[82]) : null,
                        "drivingLicenseMobilNoDate" => !is_null($row[83]) ? $this->transformDate($row[83]) : null,
                        "drivingLicenseMobilNoPlaceRegistration" => !is_null($row[84]) ? strval($row[84]) : null,
                        "drivingLicenseMobilNoExpiryDate" => !is_null($row[85]) ? $this->transformDate($row[85]) : null,
                        "drivingLicenseMotorNo" => !is_null($row[86]) ? strval($row[86]) : null,
                        "drivingLicenseMotorNoDate" => !is_null($row[87]) ? $this->transformDate($row[87]) : null,
                        "drivingLicenseMotorNoPlaceRegistration" => !is_null($row[88]) ? strval($row[88]) : null,
                        "drivingLicenseMotorNoExpiryDate" => !is_null($row[89]) ? $this->transformDate($row[89]) : null,
                        "employeeCardId" => !is_null($row[90]) ? strval($row[90]) : null,
                        "idNo" => !is_null($row[91]) ? strval($row[91]) : null,
                        "idNoDate" => !is_null($row[92]) ? $this->transformDate($row[92]) : null,
                        "idNoPlaceRegistration" => !is_null($row[93]) ? strval($row[93]) : null,
                        "idNoExpiryDate" => !is_null($row[94]) ? $this->transformDate($row[94]) : null,
                        "homeAddress" => !is_null($row[95]) ? strval($row[95]) : null,
                        "homeCityCode" => !is_null($row[96]) ? strval($row[96]) : null,
                        "homeZipCode" => !is_null($row[97]) ? strval($row[97]) : null,
                        "homePhone" => !is_null($row[98]) ? strval($row[98]) : null,
                        "otherAddress" => !is_null($row[99]) ? strval($row[99]) : null,
                        "otherCityCode" => !is_null($row[100]) ? strval($row[100]) : null,
                        "otherZipCode" => !is_null($row[101]) ? strval($row[101]) : null,
                        "otherPhone" => !is_null($row[102]) ? strval($row[102]) : null,
                        "workAddress" => !is_null($row[103]) ? strval($row[103]) : null,
                        "workCityCode" => !is_null($row[104]) ? strval($row[104]) : null,
                        "workZipCode" => !is_null($row[105]) ? strval($row[105]) : null,
                        "workPhone" => !is_null($row[106]) ? strval($row[106]) : null,
                        "correspondenceAddress" => !is_null($row[107]) ? strval($row[107]) : null,
                        "correspondenceCityCode" => !is_null($row[108]) ? strval($row[108]) : null,
                        "correspondenceZipCode" => !is_null($row[109]) ? strval($row[109]) : null,
                        "correspondencePhone" => !is_null($row[110]) ? strval($row[110]) : null,
                        "personalHandphone" => !is_null($row[111]) ? strval($row[111]) : null,
                        "personalEmailAddress" => !is_null($row[112]) ? strval($row[112]) : null,
                        "companyEmailAddress" => !is_null($row[113]) ? strval($row[113]) : null,
                        "emergencyName" => !is_null($row[114]) ? strval($row[114]) : null,
                        "emergencyAddress" => !is_null($row[115]) ? strval($row[115]) : null,
                        "emergencyPhone" => !is_null($row[116]) ? strval($row[116]) : null,
                        "emergencyRelation" => !is_null($row[117]) ? strval($row[117]) : null,
                        "emergencyEmailAddress" => !is_null($row[118]) ? strval($row[118]) : null,
                        "homeDistrictCode" => !is_null($row[119]) ? strval($row[119]) : null,
                        "homeSubDistrictCode" => !is_null($row[120]) ? strval($row[120]) : null,
                        "otherDistrictCode" => !is_null($row[121]) ? strval($row[121]) : null,
                        "otherSubDistrictCode" => !is_null($row[122]) ? strval($row[122]) : null,
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
                        "insuranceCode" => !is_null($row[123]) ? strval($row[123]) : null,
                        "insuranceClassCode" => !is_null($row[124]) ? strval($row[124]) : null,
                        "insuranceStartDate" => !is_null($row[125]) ? $this->transformDate($row[125]) : null,
                        "insuranceEndDate" => !is_null($row[126]) ? $this->transformDate($row[126]) : null,
                        "insurancePolicyNo" => !is_null($row[127]) ? strval($row[127]) : null,
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
