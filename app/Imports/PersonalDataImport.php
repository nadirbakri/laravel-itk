<?php

namespace App\Imports;

set_time_limit(0);

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Storage;
use Session;
use App;

class PersonalDataImport implements ToCollection, SkipsEmptyRows, WithStartRow, WithChunkReading
{
    /**
    * @param Collection $collection
    */
    private $arrResult = [];

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return Carbon::instance(Date::excelToDateTimeObject($value));
        } catch (\Throwable $e) {
            return Carbon::createFromFormat($format, date('Y-m-d', strtotime($value)));
        }
    }

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

            $headerRow = $rows->shift();
            $levelType = [];
            $dynamicRules = [];
            $dynamicRMessages = [];

            foreach ($headerRow as $key => $value) {
                if (strpos($value, '*') !== false) {
                    $dynamicRules["*.{$key}"] = 'required|not_in:NULL';
                    $dynamicRMessages["*.{$key}.required"] = strtr($value, ["*" => ""]) . ' is Required';
                    $dynamicRMessages["*.{$key}.not_in"] = strtr($value, ["*" => ""]) . ' cannot be Null';
                }
                
                if (strpos($value, 'Level Code') !== false) {
                    $parts = explode("-", $value);
                    $result = ltrim($parts[1]);    
                    $levelType[] = [
                        'levelType' => $result,
                        'index' => $key
                    ];
                }            
            }
                        
            try {
                Validator::make($rows->toArray(), $dynamicRules, $dynamicRMessages)->validate();
            } catch (\Illuminate\Validation\ValidationException $e) {
                $errors = $e->validator->errors()->messages();
                
                $errorMessages = [];
                foreach ($errors as $columnErrors) {
                    $this->arrResult[]['message'] = array_shift($columnErrors);
                }
                
                return $this->arrResult;
            }

            if (count($this->arrResult) > 0) {
                return $this->arrResult;
            }

            $rows->filter(function ($row) {
                return !empty($row[1]);
            })->each(function ($row) use (&$param, &$levelType) {
                $peMasterLevel = [] ;
                foreach ($levelType as $type) {
                    $peMasterLevel[] = [
                        "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                        'levelType' => (!is_null($type['levelType']) && $type['levelType'] != "NULL") ? strval($type['levelType']) : null,
                        'levelCode' => (!is_null($row[$type['index']]) && $row[$type['index']] != "NULL") ? strval($row[$type['index']]) : null,
                        "employeeNo" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null
                    ];
                }

                $param[] = [
                    "recordStatus" => "A",
                    "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? trim(strval($row[0])) : null,
                    "employeeNo" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null,
                    "title" => null,
                    "fullName" => (!is_null($row[2]) && $row[2] != "NULL") ? strval($row[2]) : null,
                    "birthPlace" => (!is_null($row[3]) && $row[3] != "NULL") ? strval($row[3]) : null,
                    "birthDate" => (!is_null($row[4]) && $row[4] != "NULL") ? $this->transformDate($row[4]) : null,
                    "age" => 0,
                    "gender" => (!is_null($row[5]) && $row[5] != "NULL") ? strval($row[5]) : null,
                    "educationCode" => null,
                    "maritalStatus" => (!is_null($row[6]) && $row[6] != "NULL") ? strval($row[6]) : null,
                    "taxRegisteredNo" => (!is_null($row[7]) && $row[7] != "NULL") ? strval($row[7]) : null,
                    "taxRegisteredDate" => null,
                    "taxRegisteredPlaceRegistration" => null,
                    "taxRegisteredExpiryDate" => null,
                    "religionCode" => (!is_null($row[8]) && $row[8] != "NULL") ? trim(strval($row[8])) : null,
                    "nationalityCode" => (!is_null($row[9]) && $row[9] != "NULL") ? trim(strval($row[9])) : null,
                    "costCenterCode" => (!is_null($row[10]) && $row[10] != "NULL") ? trim(strval($row[10])) : null,
                    "employmentStatus" => (!is_null($row[11]) && $row[11] != "NULL") ? strval($row[11]) : null,
                    "flagIsExpat" => ($row[12] == "1" || strtoupper($row[12]) == "TRUE") ? true : false,
                    "expatLicenseNo" => (!is_null($row[13]) && $row[13] != "NULL") ? strval($row[13]) : null,
                    "expatLicenseStartDate" => (!is_null($row[14]) && $row[14] != "NULL") ? $this->transformDate($row[14]) : null,
                    "expatLicenseEndDate" => (!is_null($row[15]) && $row[15] != "NULL") ? $this->transformDate($row[15]) : null,
                    "joinDate" => (!is_null($row[16]) && $row[16] != "NULL") ? $this->transformDate($row[16]) : null,
                    "probationEndDate" => (!is_null($row[17]) && $row[17] != "NULL") ? $this->transformDate($row[17]) : null,
                    "contractStartDate" => (!is_null($row[18]) && $row[18] != "NULL") ? $this->transformDate($row[18]) : null,
                    "contractEndDate" => (!is_null($row[19]) && $row[19] != "NULL") ? $this->transformDate($row[19]) : null,
                    "terminationDate" => null,
                    "terminationCode" => null,
                    "terminationRemarks" => null,
                    "effectiveTerminationDate" => null,
                    "pensionDate" => null,
                    "serviceYear" => 0,
                    "employmentType" => (!is_null($row[20]) && $row[20] != "NULL") ? strval($row[20]) : null,
                    "locationCode" => (!is_null($row[21]) && $row[21] != "NULL") ? trim(strval($row[21])) : null,
                    "officeCode" => (!is_null($row[21]) && $row[21] != "NULL") ? trim(strval($row[21])) : null,
                    "gradeCode" => (!is_null($row[22]) && $row[22] != "NULL") ? trim(strval($row[22])) : null,
                    "positionCode" => (!is_null($row[23]) && $row[23] != "NULL") ? trim(strval($row[23])) : null,
                    "rankingCode" => (!is_null($row[24]) && $row[24] != "NULL") ? trim(strval($row[24])) : null,
                    "workNatureCode" => (!is_null($row[25]) && $row[25] != "NULL") ? trim(strval($row[25])) : null,
                    "groupCode" => (!is_null($row[26]) && $row[26] != "NULL") ? trim(strval($row[26])) : null,
                    "groupAuthorizeCode" => (!is_null($row[27]) && $row[27] != "NULL") ? (int) $row[27] : null,
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
                    "flagIsCommissioner" => ($row[28] == "1" || strtoupper($row[28]) == "TRUE") ? true : false,
                    "motherName" => (!is_null($row[29]) && $row[29] != "NULL") ? strval($row[29]) : null,
                    "absenteeismType" => (!is_null($row[30]) && $row[30] != "NULL") ? strval($row[30]) : null,
                    "workPatternCode" => (!is_null($row[31]) && $row[31] != "NULL") ? trim(strval($row[31])) : null,
                    "startAtDay" => (!is_null($row[32]) && $row[32] != "NULL") ? (int) $row[32] : null,
                    "flagNotAbsent" => ($row[33] == "1" || strtoupper($row[33]) == "TRUE") ? true : false,
                    "taxCalculationMethod" => (!is_null($row[37]) && $row[37] != "NULL") ? strval($row[37]) : null,
                    "flagAstekDeathNonAccident" => ($row[38] == "1" || strtoupper($row[38]) == "TRUE") ? true : false,
                    "flagAstekWorkAccident" => ($row[39] == "1" || strtoupper($row[39]) == "TRUE") ? true : false,
                    "flagAstekWorkAccident2" => ($row[40] == "1" || strtoupper($row[40]) == "TRUE") ? true : false,
                    "flagAstekWorkAccident3" => ($row[41] == "1" || strtoupper($row[41]) == "TRUE") ? true : false,
                    "flagAstekPensionEmployee" => ($row[42] == "1" || strtoupper($row[42]) == "TRUE") ? true : false,
                    "flagAstekPensionEmployer" => ($row[43] == "1" || strtoupper($row[43]) == "TRUE") ? true : false,
                    "flagAstekHealthInsurance" => ($row[44] == "1" || strtoupper($row[44]) == "TRUE") ? true : false,
                    "flagTaxByGovernment" => ($row[45] == "1" || strtoupper($row[45]) == "TRUE") ? true : false,
                    "groupNpwp" => (!is_null($row[47]) && $row[47] != "NULL") ? strval($row[47]) : null,
                    "groupBpjs" => (!is_null($row[48]) && $row[48] != "NULL") ? strval($row[48]) : null,
                    "flagPensionInsurance" => ($row[46] == "1" || strtoupper($row[46]) == "TRUE") ? true : false,
                    "flagBPJSKesehatan" => ($row[49] == "1" || strtoupper($row[49]) == "TRUE") ? true : false,
                    "bpjsKesehatanNo" => (!is_null($row[50]) && $row[50] != "NULL") ? strval($row[50]) : null,
                    "bpjsKesehatanJoinDate" => (!is_null($row[51]) && $row[51] != "NULL") ? $this->transformDate($row[51]) : null,
                    "bpjsKesehatanPeriodStartDate" => (!is_null($row[52]) && $row[52] != "NULL") ? $this->transformDate($row[52]) : null,
                    "flagBPJSTenagaKerja" => ($row[53] == "1" || strtoupper($row[53]) == "TRUE") ? true : false,
                    "bpjsTenagaKerjaNo" => (!is_null($row[54]) && $row[54] != "NULL") ? strval($row[54]) : null,
                    "bpjsTenagaKerjaJoinDate" => (!is_null($row[55]) && $row[55] != "NULL") ? $this->transformDate($row[55]) : null,
                    "bpjsTenagaKerjaPeriodStartDate" => (!is_null($row[56]) && $row[56] != "NULL") ? $this->transformDate($row[56]) : null,
                    "employeeBankCode1" => (!is_null($row[57]) && $row[57] != "NULL") ? strval($row[57]) : null,
                    "employeeBankCode2" => (!is_null($row[63]) && $row[63] != "NULL") ? strval($row[63]) : null,
                    "employeeBankCode3" => (!is_null($row[69]) && $row[69] != "NULL") ? strval($row[69]) : null,
                    "companyBankCode1" => (!is_null($row[61]) && $row[61] != "NULL") ? strval($row[61]) : null,
                    "companyBankCode2" => (!is_null($row[67]) && $row[67] != "NULL") ? strval($row[67]) : null,
                    "companyBankCode3" => (!is_null($row[73]) && $row[73] != "NULL") ? strval($row[73]) : null,
                    "bankAccountNo1" => (!is_null($row[58]) && $row[58] != "NULL") ? strval($row[58]) : null,
                    "beneficiaryName1" => (!is_null($row[59]) && $row[59] != "NULL") ? strval($row[59]) : null,
                    "bankPercentageSalary1" => (!is_null($row[60]) && $row[60] != "NULL") ? (int) $row[60] : null,
                    "currencyCode1" => (!is_null($row[62]) && $row[62] != "NULL") ? strval($row[62]) : null,
                    "bankAccountNo2" => (!is_null($row[64]) && $row[64] != "NULL") ? strval($row[64]) : null,
                    "beneficiaryName2" => (!is_null($row[65]) && $row[65] != "NULL") ? strval($row[65]) : null,
                    "bankPercentageSalary2" => (!is_null($row[66]) && $row[66] != "NULL") ? (int) $row[66] : null,
                    "currencyCode2" => (!is_null($row[68]) && $row[68] != "NULL") ? strval($row[68]) : null,
                    "bankAccountNo3" => (!is_null($row[70]) && $row[70] != "NULL") ? strval($row[70]) : null,
                    "beneficiaryName3" => (!is_null($row[71]) && $row[71] != "NULL") ? strval($row[71]) : null,
                    "bankPercentageSalary3" => (!is_null($row[72]) && $row[72] != "NULL") ? (int) $row[72] : null,
                    "currencyCode3" => (!is_null($row[74]) && $row[74] != "NULL") ? strval($row[74]) : null,
                    "originJoinDate" => (!is_null($row[16]) && $row[16] != "NULL") ? $this->transformDate($row[16]) : null,
                    "flagNotFinger" => ($row[34] == "1" || strtoupper($row[34]) == "TRUE") ? true : false,
                    "taxStatus" => (!is_null($row[35]) && $row[35] != "NULL") ? strval($row[35]) : null,
                    "taxStatusNextYear" => (!is_null($row[36]) && $row[36] != "NULL") ? strval($row[36]) : null,
                    "flagExcludePayroll" => ($row[75] == "1" || strtoupper($row[75]) == "TRUE") ? true : false,
                    "danaPensiunNo" => (!is_null($row[129]) && $row[129] != "NULL") ? strval($row[129]) : null,
                    "danaPensiunJoinDate" => (!is_null($row[130]) && $row[130] != "NULL") ? $this->transformDate($row[130]) : null,
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
                    // 'peMasterLeave' => [
                    //     "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                    //     "employeeNo" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null,
                    //     "leaveCode" => (!is_null($row[129]) && $row[129] != "NULL") ? strval($row[129]) : null,
                    //     "deductLeave" => "0",
                    //     "leaveBalance" => 0,
                    //     "leaveBalanceBefore" => 0,
                    //     "leaveBalanceBeforeExpiredDate" => null, 
                    //     "changedNo" => 0,
                    //     "createdDate" => date("Y-m-d\TH:i:s"),
                    //     "createdBy" => Session::get('userID'),
                    //     "changedDate" => date("Y-m-d\TH:i:s"),
                    //     "changedBy" => Session::get('userID'),
                    //     'logActionUserID' => Session::get('userID'),
                    //     'logActionUsername' => Session::get('userName')
                    // ],
                    'peMasterHistoryJob' => [
                        "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? trim(strval($row[0])) : null,
                        "employeeNo" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null,
                        "seqNo" => 1,
                        "historyCompanyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? trim(strval($row[0])) : null,
                        "startDate" => (!is_null($row[16]) && $row[16] != "NULL") ? $this->transformDate($row[16]) : null,
                        "endDate" => null,
                        "employmentStatus" => (!is_null($row[11]) && $row[11] != "NULL") ? strval($row[11]) : null,
                        "employmentType" => (!is_null($row[20]) && $row[20] != "NULL") ? strval($row[20]) : null,
                        "contractStartDate" => (!is_null($row[18]) && $row[18] != "NULL") ? $this->transformDate($row[18]) : null,
                        "contractEndDate" => (!is_null($row[19]) && $row[19] != "NULL") ? $this->transformDate($row[19]) : null,
                        "decreeCode" => null,
                        "decreeNo" => null,
                        "decreeDate" => null,
                        "positionCode" => (!is_null($row[23] && $row[23] != "NULL")) ? trim(strval($row[23])) : null,
                        "rankingCode" => (!is_null($row[24]) && $row[24] != "NULL") ? trim(strval($row[24])) : null,
                        "gradeCode" => (!is_null($row[22]) && $row[22] != "NULL") ? trim(strval($row[22])) : null,
                        "groupCode" => (!is_null($row[26]) && $row[26] != "NULL") ? trim(strval($row[26])) : null,
                        "locationCode" => (!is_null($row[21]) && $row[21] != "NULL") ? trim(strval($row[21])) : null,
                        "workNatureCode" => (!is_null($row[25]) && $row[25] != "NULL") ? trim(strval($row[25])) : null,
                        "costCenterCode" => (!is_null($row[10]) && $row[10] != "NULL") ? trim(strval($row[10])) : null,
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
                        "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? trim(strval($row[0])) : null,
                        "employeeNo" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null,
                        "nickName" => (!is_null($row[76]) && $row[76] != "NULL") ? strval($row[76]) : null,
                        "bloodType" => (!is_null($row[77]) && $row[77] != "NULL") ? strval($row[77]) : null,
                        "passportNo" => (!is_null($row[78]) && $row[78] != "NULL") ? strval($row[78]) : null,
                        "passportDate" => (!is_null($row[79]) && $row[79] != "NULL") ? $this->transformDate($row[79]) : null,
                        "passportPlaceRegistration" => (!is_null($row[80]) && $row[80] != "NULL") ? strval($row[80]) : null,
                        "passportExpiryDate" => (!is_null($row[81]) && $row[81] != "NULL") ? $this->transformDate($row[81]) : null,
                        "drivingLicenseMobilNo" => (!is_null($row[82]) && $row[82] != "NULL") ? strval($row[82]) : null,
                        "drivingLicenseMobilType" => (!is_null($row[83]) && $row[83] != "NULL") ? strval($row[83]) : null,
                        "drivingLicenseMobilNoDate" => (!is_null($row[84]) && $row[84] != "NULL") ? $this->transformDate($row[84]) : null,
                        "drivingLicenseMobilNoPlaceRegistration" => (!is_null($row[85]) && $row[85] != "NULL") ? strval($row[85]) : null,
                        "drivingLicenseMobilNoExpiryDate" => (!is_null($row[86]) && $row[86] != "NULL") ? $this->transformDate($row[86]) : null,
                        "drivingLicenseMotorNo" => (!is_null($row[87]) && $row[87] != "NULL") ? strval($row[87]) : null,
                        "drivingLicenseMotorNoDate" => (!is_null($row[88]) && $row[88] != "NULL") ? $this->transformDate($row[88]) : null,
                        "drivingLicenseMotorNoPlaceRegistration" => (!is_null($row[89]) && $row[89] != "NULL") ? strval($row[89]) : null,
                        "drivingLicenseMotorNoExpiryDate" => (!is_null($row[90]) && $row[90] != "NULL") ? $this->transformDate($row[90]) : null,
                        "employeeCardId" => (!is_null($row[91]) && $row[91] != "NULL") ? strval($row[91]) : null,
                        "idNo" => (!is_null($row[92]) && $row[92] != "NULL") ? strval($row[92]) : null,
                        "idNoDate" => (!is_null($row[93]) && $row[93] != "NULL") ? $this->transformDate($row[93]) : null,
                        "idNoPlaceRegistration" => (!is_null($row[94]) && $row[94] != "NULL") ? strval($row[94]) : null,
                        "idNoExpiryDate" => (!is_null($row[95]) && $row[95] != "NULL") ? $this->transformDate($row[95]) : null,
                        "homeAddress" => (!is_null($row[96]) && $row[96] != "NULL") ? strval($row[96]) : null,
                        "homeCityCode" => (!is_null($row[97]) && $row[97] != "NULL") ? strval($row[97]) : null,
                        "homeZipCode" => (!is_null($row[98]) && $row[98] != "NULL") ? strval($row[98]) : null,
                        "homePhone" => (!is_null($row[99]) && $row[99] != "NULL") ? strval($row[99]) : null,
                        "otherAddress" => (!is_null($row[100]) && $row[100] != "NULL") ? strval($row[100]) : null,
                        "otherCityCode" => (!is_null($row[101]) && $row[101] != "NULL") ? strval($row[101]) : null,
                        "otherZipCode" => (!is_null($row[102]) && $row[102] != "NULL") ? strval($row[102]) : null,
                        "otherPhone" => (!is_null($row[103]) && $row[103] != "NULL") ? strval($row[103]) : null,
                        "workAddress" => (!is_null($row[104]) && $row[104] != "NULL") ? strval($row[104]) : null,
                        "workCityCode" => (!is_null($row[105]) && $row[105] != "NULL") ? strval($row[105]) : null,
                        "workZipCode" => (!is_null($row[106]) && $row[106] != "NULL") ? strval($row[106]) : null,
                        "workPhone" => (!is_null($row[107]) && $row[107] != "NULL") ? strval($row[107]) : null,
                        "correspondenceAddress" => (!is_null($row[108]) && $row[108] != "NULL") ? strval($row[108]) : null,
                        "correspondenceCityCode" => (!is_null($row[109]) && $row[109] != "NULL") ? strval($row[109]) : null,
                        "correspondenceZipCode" => (!is_null($row[110]) && $row[110] != "NULL") ? strval($row[110]) : null,
                        "correspondencePhone" => (!is_null($row[111]) && $row[111] != "NULL") ? strval($row[111]) : null,
                        "personalHandphone" => (!is_null($row[112]) && $row[112] != "NULL") ? strval($row[112]) : null,
                        "personalEmailAddress" => (!is_null($row[113]) && $row[113] != "NULL") ? strval($row[113]) : null,
                        "companyEmailAddress" => (!is_null($row[114]) && $row[114] != "NULL") ? strval($row[114]) : null,
                        "emergencyName" => (!is_null($row[115]) && $row[115] != "NULL") ? strval($row[115]) : null,
                        "emergencyAddress" => (!is_null($row[116]) && $row[116] != "NULL") ? strval($row[116]) : null,
                        "emergencyPhone" => (!is_null($row[117]) && $row[117] != "NULL") ? strval($row[117]) : null,
                        "emergencyRelation" => (!is_null($row[118]) && $row[118] != "NULL") ? strval($row[118]) : null,
                        "emergencyEmailAddress" => (!is_null($row[119]) && $row[119] != "NULL") ? strval($row[119]) : null,
                        "homeDistrictCode" => (!is_null($row[120]) && $row[120] != "NULL") ? strval($row[120]) : null,
                        "homeSubDistrictCode" => (!is_null($row[121]) && $row[121] != "NULL") ? strval($row[121]) : null,
                        "otherDistrictCode" => (!is_null($row[122]) && $row[122] != "NULL") ? strval($row[122]) : null,
                        "otherSubDistrictCode" => (!is_null($row[123]) && $row[123] != "NULL") ? strval($row[123]) : null,
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
                        "companyCode" => (!is_null($row[0]) && $row[0] != "NULL") ? trim(strval($row[0])) : null,
                        "employeeNo" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null,
                        "insuranceCode" => (!is_null($row[124]) && $row[124] != "NULL") ? trim(strval($row[124])) : null,
                        "insuranceClassCode" => (!is_null($row[125]) && $row[125] != "NULL") ? strval($row[125]) : null,
                        "insuranceStartDate" => (!is_null($row[126]) && $row[126] != "NULL") ? $this->transformDate($row[126]) : null,
                        "insuranceEndDate" => (!is_null($row[127]) && $row[127] != "NULL") ? $this->transformDate($row[127]) : null,
                        "insurancePolicyNo" => (!is_null($row[128]) && $row[128] != "NULL") ? strval($row[128]) : null,
                        "insuranceRemark" => null,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ],
                    'peMasterLevel' => $peMasterLevel
                ];
            });

            // Storage::put('debug_data.txt', json_encode($param));
            // dd(json_encode($param));
            // exit;

            $response = $client->post(env('API_URL') . '/personel/PeMaster/ImportPeMaster',
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
            $this->arrResult[]['message'] = $e->getResponse();
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

    public function chunkSize(): int
    {
        return 2000;
    }

    public function getArrResult(): array
    {
        return $this->arrResult;
    }
}