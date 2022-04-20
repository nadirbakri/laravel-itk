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

class PersonalDataImport implements ToCollection, WithValidation, WithStartRow
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
                    "employeeNo" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                    "title" => null,
                    "fullName" => (!is_null($row[1]) && $row[1] != "NULL") ? strval($row[1]) : null,
                    "birthPlace" => (!is_null($row[2]) && $row[2] != "NULL") ? strval($row[2]) : null,
                    "birthDate" => (!is_null($row[3]) && $row[3] != "NULL") ? $this->transformDate($row[3]) : null,
                    "age" => 0,
                    "gender" => (!is_null($row[4]) && $row[4] != "NULL") ? strval($row[4]) : null,
                    "educationCode" => null,
                    "maritalStatus" => (!is_null($row[5]) && $row[5] != "NULL") ? strval($row[5]) : null,
                    "taxRegisteredNo" => (!is_null($row[6]) && $row[6] != "NULL") ? strval($row[6]) : null,
                    "taxRegisteredDate" => null,
                    "taxRegisteredPlaceRegistration" => null,
                    "taxRegisteredExpiryDate" => null,
                    "religionCode" => (!is_null($row[7]) && $row[7] != "NULL") ? strval($row[7]) : null,
                    "nationalityCode" => (!is_null($row[8]) && $row[8] != "NULL") ? strval($row[8]) : null,
                    "costCenterCode" => (!is_null($row[9]) && $row[9] != "NULL") ? strval($row[9]) : null,
                    "employmentStatus" => (!is_null($row[10]) && $row[10] != "NULL") ? strval($row[10]) : null,
                    "flagIsExpat" => ($row[11] == "1" || strtoupper($row[11]) == "TRUE") ? true : false,
                    "expatLicenseNo" => (!is_null($row[12]) && $row[12] != "NULL") ? strval($row[12]) : null,
                    "expatLicenseStartDate" => (!is_null($row[13]) && $row[13] != "NULL") ? $this->transformDate($row[13]) : null,
                    "expatLicenseEndDate" => (!is_null($row[14]) && $row[14] != "NULL") ? $this->transformDate($row[14]) : null,
                    "joinDate" => (!is_null($row[15]) && $row[15] != "NULL") ? $this->transformDate($row[15]) : null,
                    "probationEndDate" => (!is_null($row[16]) && $row[16] != "NULL") ? $this->transformDate($row[16]) : null,
                    "contractStartDate" => (!is_null($row[17]) && $row[17] != "NULL") ? $this->transformDate($row[17]) : null,
                    "contractEndDate" => (!is_null($row[18]) && $row[18] != "NULL") ? $this->transformDate($row[18]) : null,
                    "terminationDate" => null,
                    "terminationCode" => null,
                    "terminationRemarks" => null,
                    "effectiveTerminationDate" => null,
                    "pensionDate" => null,
                    "serviceYear" => 0,
                    "employmentType" => (!is_null($row[19]) && $row[19] != "NULL") ? strval($row[19]) : null,
                    "locationCode" => (!is_null($row[20]) && $row[20] != "NULL") ? strval($row[20]) : null,
                    "gradeCode" => (!is_null($row[21]) && $row[21] != "NULL") ? strval($row[21]) : null,
                    "positionCode" => (!is_null($row[22]) && $row[22] != "NULL") ? strval($row[22]) : null,
                    "rankingCode" => (!is_null($row[23]) && $row[23] != "NULL") ? strval($row[23]) : null,
                    "workNatureCode" => (!is_null($row[24]) && $row[24] != "NULL") ? strval($row[24]) : null,
                    "groupCode" => (!is_null($row[25]) && $row[25] != "NULL") ? strval($row[25]) : null,
                    "groupAuthorizeCode" => (!is_null($row[26]) && $row[26] != "NULL") ? (int) $row[26] : null,
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
                    "motherName" => (!is_null($row[28]) && $row[28] != "NULL") ? strval($row[28]) : null,
                    "absenteeismType" => (!is_null($row[29]) && $row[29] != "NULL") ? strval($row[29]) : null,
                    "workPatternCode" => (!is_null($row[30]) && $row[30] != "NULL") ? strval($row[30]) : null,
                    "startAtDay" => (!is_null($row[31]) && $row[31] != "NULL") ? (int) $row[31] : null,
                    "flagNotAbsent" => ($row[32] == "1" || strtoupper($row[32]) == "TRUE") ? true : false,
                    "taxCalculationMethod" => (!is_null($row[36]) && $row[36] != "NULL") ? strval($row[36]) : null,
                    "flagAstekDeathNonAccident" => ($row[37] == "1" || strtoupper($row[37]) == "TRUE") ? true : false,
                    "flagAstekWorkAccident" => ($row[38] == "1" || strtoupper($row[38]) == "TRUE") ? true : false,
                    "flagAstekWorkAccident2" => ($row[39] == "1" || strtoupper($row[39]) == "TRUE") ? true : false,
                    "flagAstekWorkAccident3" => ($row[40] == "1" || strtoupper($row[40]) == "TRUE") ? true : false,
                    "flagAstekPensionEmployee" => ($row[41] == "1" || strtoupper($row[41]) == "TRUE") ? true : false,
                    "flagAstekPensionEmployer" => ($row[42] == "1" || strtoupper($row[42]) == "TRUE") ? true : false,
                    "flagAstekHealthInsurance" => ($row[43] == "1" || strtoupper($row[43]) == "TRUE") ? true : false,
                    "flagTaxByGovernment" => ($row[44] == "1" || strtoupper($row[44]) == "TRUE") ? true : false,
                    "groupNpwp" => (!is_null($row[46]) && $row[46] != "NULL") ? strval($row[46]) : null,
                    "groupBpjs" => (!is_null($row[47]) && $row[47] != "NULL") ? strval($row[47]) : null,
                    "flagPensionInsurance" => ($row[45] == "1" || strtoupper($row[45]) == "TRUE") ? true : false,
                    "flagBPJSKesehatan" => ($row[48] == "1" || strtoupper($row[48]) == "TRUE") ? true : false,
                    "bpjsKesehatanNo" => (!is_null($row[49]) && $row[49] != "NULL") ? strval($row[49]) : null,
                    "bpjsKesehatanJoinDate" => (!is_null($row[50]) && $row[50] != "NULL") ? $this->transformDate($row[50]) : null,
                    "bpjsKesehatanPeriodStartDate" => (!is_null($row[51]) && $row[51] != "NULL") ? $this->transformDate($row[51]) : null,
                    "flagBPJSTenagaKerja" => ($row[52] == "1" || strtoupper($row[52]) == "TRUE") ? true : false,
                    "bpjsTenagaKerjaNo" => (!is_null($row[53]) && $row[53] != "NULL") ? strval($row[53]) : null,
                    "bpjsTenagaKerjaJoinDate" => (!is_null($row[54]) && $row[54] != "NULL") ? $this->transformDate($row[54]) : null,
                    "bpjsTenagaKerjaPeriodStartDate" => (!is_null($row[55]) && $row[55] != "NULL") ? $this->transformDate($row[55]) : null,
                    "employeeBankCode1" => (!is_null($row[56]) && $row[56] != "NULL") ? strval($row[56]) : null,
                    "employeeBankCode2" => (!is_null($row[62]) && $row[62] != "NULL") ? strval($row[62]) : null,
                    "employeeBankCode3" => (!is_null($row[68]) && $row[68] != "NULL") ? strval($row[68]) : null,
                    "companyBankCode1" => (!is_null($row[60]) && $row[60] != "NULL") ? strval($row[60]) : null,
                    "companyBankCode2" => (!is_null($row[66]) && $row[66] != "NULL") ? strval($row[66]) : null,
                    "companyBankCode3" => (!is_null($row[72]) && $row[72] != "NULL") ? strval($row[72]) : null,
                    "bankAccountNo1" => (!is_null($row[57]) && $row[57] != "NULL") ? strval($row[57]) : null,
                    "beneficiaryName1" => (!is_null($row[58]) && $row[58] != "NULL") ? strval($row[58]) : null,
                    "bankPercentageSalary1" => (!is_null($row[59]) && $row[59] != "NULL") ? (int) $row[59] : null,
                    "currencyCode1" => (!is_null($row[61]) && $row[61] != "NULL") ? strval($row[61]) : null,
                    "bankAccountNo2" => (!is_null($row[63]) && $row[63] != "NULL") ? strval($row[63]) : null,
                    "beneficiaryName2" => (!is_null($row[64]) && $row[64] != "NULL") ? strval($row[64]) : null,
                    "bankPercentageSalary2" => (!is_null($row[65]) && $row[65] != "NULL") ? (int) $row[65] : null,
                    "currencyCode2" => (!is_null($row[67]) && $row[67] != "NULL") ? strval($row[67]) : null,
                    "bankAccountNo3" => (!is_null($row[69]) && $row[69] != "NULL") ? strval($row[69]) : null,
                    "beneficiaryName3" => (!is_null($row[70]) && $row[70] != "NULL") ? strval($row[70]) : null,
                    "bankPercentageSalary3" => (!is_null($row[71]) && $row[71] != "NULL") ? (int) $row[71] : null,
                    "currencyCode3" => (!is_null($row[73]) && $row[73] != "NULL") ? strval($row[73]) : null,
                    "originJoinDate" => (!is_null($row[15]) && $row[15] != "NULL") ? $this->transformDate($row[15]) : null,
                    "flagNotFinger" => ($row[33] == "1" || strtoupper($row[33]) == "TRUE") ? true : false,
                    "taxStatus" => (!is_null($row[34]) && $row[34] != "NULL") ? strval($row[34]) : null,
                    "taxStatusNextYear" => (!is_null($row[35]) && $row[35] != "NULL") ? strval($row[35]) : null,
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
                        "employeeNo" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                        "leaveCode" => (!is_null($row[128]) && $row[128] != "NULL") ? strval($row[128]) : null,
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
                        "employeeNo" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                        "seqNo" => 1,
                        "historyCompanyCode" => Session::get('companyCode'),
                        "startDate" => (!is_null($row[15]) && $row[15] != "NULL") ? $this->transformDate($row[15]) : null,
                        "endDate" => null,
                        "employmentStatus" => (!is_null($row[10]) && $row[10] != "NULL") ? strval($row[10]) : null,
                        "employmentType" => (!is_null($row[19]) && $row[19] != "NULL") ? strval($row[19]) : null,
                        "contractStartDate" => (!is_null($row[17]) && $row[17] != "NULL") ? $this->transformDate($row[17]) : null,
                        "contractEndDate" => (!is_null($row[18]) && $row[18] != "NULL") ? $this->transformDate($row[18]) : null,
                        "decreeCode" => null,
                        "decreeNo" => null,
                        "decreeDate" => null,
                        "positionCode" => (!is_null($row[22] && $row[22] != "NULL")) ? strval($row[22]) : null,
                        "rankingCode" => (!is_null($row[23]) && $row[23] != "NULL") ? strval($row[23]) : null,
                        "gradeCode" => (!is_null($row[21]) && $row[21] != "NULL") ? strval($row[21]) : null,
                        "groupCode" => (!is_null($row[25]) && $row[25] != "NULL") ? strval($row[25]) : null,
                        "locationCode" => (!is_null($row[20]) && $row[20] != "NULL") ? strval($row[20]) : null,
                        "workNatureCode" => (!is_null($row[24]) && $row[24] != "NULL") ? strval($row[24]) : null,
                        "costCenterCode" => (!is_null($row[9]) && $row[9] != "NULL") ? strval($row[9]) : null,
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
                        "employeeNo" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                        "nickName" => (!is_null($row[75]) && $row[75] != "NULL") ? strval($row[75]) : null,
                        "bloodType" => (!is_null($row[76]) && $row[76] != "NULL") ? strval($row[76]) : null,
                        "passportNo" => (!is_null($row[77]) && $row[77] != "NULL") ? strval($row[77]) : null,
                        "passportDate" => (!is_null($row[78]) && $row[78] != "NULL") ? $this->transformDate($row[78]) : null,
                        "passportPlaceRegistration" => (!is_null($row[79]) && $row[79] != "NULL") ? strval($row[79]) : null,
                        "passportExpiryDate" => (!is_null($row[80]) && $row[80] != "NULL") ? $this->transformDate($row[80]) : null,
                        "drivingLicenseMobilNo" => (!is_null($row[81]) && $row[81] != "NULL") ? strval($row[81]) : null,
                        "drivingLicenseMobilType" => (!is_null($row[82]) && $row[82] != "NULL") ? strval($row[82]) : null,
                        "drivingLicenseMobilNoDate" => (!is_null($row[83]) && $row[83] != "NULL") ? $this->transformDate($row[83]) : null,
                        "drivingLicenseMobilNoPlaceRegistration" => (!is_null($row[84]) && $row[84] != "NULL") ? strval($row[84]) : null,
                        "drivingLicenseMobilNoExpiryDate" => (!is_null($row[85]) && $row[85] != "NULL") ? $this->transformDate($row[85]) : null,
                        "drivingLicenseMotorNo" => (!is_null($row[86]) && $row[86] != "NULL") ? strval($row[86]) : null,
                        "drivingLicenseMotorNoDate" => (!is_null($row[87]) && $row[87] != "NULL") ? $this->transformDate($row[87]) : null,
                        "drivingLicenseMotorNoPlaceRegistration" => (!is_null($row[88]) && $row[88] != "NULL") ? strval($row[88]) : null,
                        "drivingLicenseMotorNoExpiryDate" => (!is_null($row[89]) && $row[89] != "NULL") ? $this->transformDate($row[89]) : null,
                        "employeeCardId" => (!is_null($row[90]) && $row[90] != "NULL") ? strval($row[90]) : null,
                        "idNo" => (!is_null($row[91]) && $row[91] != "NULL") ? strval($row[91]) : null,
                        "idNoDate" => (!is_null($row[92]) && $row[92] != "NULL") ? $this->transformDate($row[92]) : null,
                        "idNoPlaceRegistration" => (!is_null($row[93]) && $row[93] != "NULL") ? strval($row[93]) : null,
                        "idNoExpiryDate" => (!is_null($row[94]) && $row[94] != "NULL") ? $this->transformDate($row[94]) : null,
                        "homeAddress" => (!is_null($row[95]) && $row[95] != "NULL") ? strval($row[95]) : null,
                        "homeCityCode" => (!is_null($row[96]) && $row[96] != "NULL") ? strval($row[96]) : null,
                        "homeZipCode" => (!is_null($row[97]) && $row[97] != "NULL") ? strval($row[97]) : null,
                        "homePhone" => (!is_null($row[98]) && $row[98] != "NULL") ? strval($row[98]) : null,
                        "otherAddress" => (!is_null($row[99]) && $row[99] != "NULL") ? strval($row[99]) : null,
                        "otherCityCode" => (!is_null($row[100]) && $row[100] != "NULL") ? strval($row[100]) : null,
                        "otherZipCode" => (!is_null($row[101]) && $row[101] != "NULL") ? strval($row[101]) : null,
                        "otherPhone" => (!is_null($row[102]) && $row[102] != "NULL") ? strval($row[102]) : null,
                        "workAddress" => (!is_null($row[103]) && $row[103] != "NULL") ? strval($row[103]) : null,
                        "workCityCode" => (!is_null($row[104]) && $row[104] != "NULL") ? strval($row[104]) : null,
                        "workZipCode" => (!is_null($row[105]) && $row[105] != "NULL") ? strval($row[105]) : null,
                        "workPhone" => (!is_null($row[106]) && $row[106] != "NULL") ? strval($row[106]) : null,
                        "correspondenceAddress" => (!is_null($row[107]) && $row[107] != "NULL") ? strval($row[107]) : null,
                        "correspondenceCityCode" => (!is_null($row[108]) && $row[107] != "NULL") ? strval($row[108]) : null,
                        "correspondenceZipCode" => (!is_null($row[109]) && $row[109] != "NULL") ? strval($row[109]) : null,
                        "correspondencePhone" => (!is_null($row[110]) && $row[110] != "NULL") ? strval($row[110]) : null,
                        "personalHandphone" => (!is_null($row[111]) && $row[111] != "NULL") ? strval($row[111]) : null,
                        "personalEmailAddress" => (!is_null($row[112]) && $row[112] != "NULL") ? strval($row[112]) : null,
                        "companyEmailAddress" => (!is_null($row[113]) && $row[113] != "NULL") ? strval($row[113]) : null,
                        "emergencyName" => (!is_null($row[114]) && $row[114] != "NULL") ? strval($row[114]) : null,
                        "emergencyAddress" => (!is_null($row[115]) && $row[115] != "NULL") ? strval($row[115]) : null,
                        "emergencyPhone" => (!is_null($row[116]) && $row[116] != "NULL") ? strval($row[116]) : null,
                        "emergencyRelation" => (!is_null($row[117]) && $row[117] != "NULL") ? strval($row[117]) : null,
                        "emergencyEmailAddress" => (!is_null($row[118]) && $row[118] != "NULL") ? strval($row[118]) : null,
                        "homeDistrictCode" => (!is_null($row[119]) && $row[119] != "NULL") ? strval($row[119]) : null,
                        "homeSubDistrictCode" => (!is_null($row[120]) && $row[120] != "NULL") ? strval($row[120]) : null,
                        "otherDistrictCode" => (!is_null($row[121]) && $row[121] != "NULL") ? strval($row[121]) : null,
                        "otherSubDistrictCode" => (!is_null($row[122]) && $row[122] != "NULL") ? strval($row[122]) : null,
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
                        "employeeNo" => (!is_null($row[0]) && $row[0] != "NULL") ? strval($row[0]) : null,
                        "insuranceCode" => (!is_null($row[123]) && $row[123] != "NULL") ? strval($row[123]) : null,
                        "insuranceClassCode" => (!is_null($row[124]) && $row[124] != "NULL") ? strval($row[124]) : null,
                        "insuranceStartDate" => (!is_null($row[125]) && $row[125] != "NULL") ? $this->transformDate($row[125]) : null,
                        "insuranceEndDate" => (!is_null($row[126]) && $row[126] != "NULL") ? $this->transformDate($row[126]) : null,
                        "insurancePolicyNo" => (!is_null($row[127]) && $row[127] != "NULL") ? strval($row[127]) : null,
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
