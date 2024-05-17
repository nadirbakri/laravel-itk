<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<style type="text/css">
		* { box-sizing: border-box; }
		body{
			margin-left: 30px;
			margin-right: 30px;
			margin-bottom: 25px;
			margin-top: 25px;
		}
	</style>
</head>

<body>
<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<thead>
            <tr>
				<th>Company Code *</th>
				<th>Employee No *</th>
				<th>Employee Name *</th>
				<th>Birth Place *</th>
				<th>Birth Date *</th>
				<th>Gender *</th>
				<th>MaritalStatus *</th>
				<th>TaxRegisteredNo</th>
				<th>ReligionCode</th>
				<th>NationalityCode</th>
				<th>CostCenterCode</th>
				<th>EmploymentStatus *</th>
				<th>FlagIsExpat *</th>
				<th>ExpatLicenceNo</th>
				<th>ExpatLicenceStartDate</th>
				<th>ExpatLicenceEndDate</th>
				<th>JoinDate *</th>
				<th>ProbationEndDate</th>
				<th>ContractStartDate</th>
				<th>ContractEndDate</th>
				<th>Employment Type</th>
				<th>Location Code</th>
				<th>Grade Code</th>
				<th>Position Code</th>
				<th>Ranking Code</th>
				<th>Work Nature Code</th>
				<th>Group Code</th>
				<th>Group Authorize Code</th>
				<th>Flag Commissioner *</th>
				<th>Mother Name</th>
				<th>Absenteeism Type *</th>
				<th>Work Pattern Code</th>
				<th>Start Join Day *</th>
				<th>Flag Not Absent *</th>
				<th>Flag Not Finger *</th>
				<th>Tax Status</th>
				<th>Tax Status Next Year</th>
				<th>Tax Calculation Method</th>
				<th>Flag Astek Death Non Accident *</th>
				<th>Flag Astek Work Accident *</th>
				<th>Flag Astek Work Accident 2 *</th>
				<th>Flag Astek Work Accident 3 *</th>
				<th>Flag Astek Pension Employee *</th>
				<th>Flag Astek Pension Employer *</th>
				<th>Flag Astek Health Insurance *</th>
				<th>Flag Tax By Government *</th>
				<th>Flag Pension Insurance *</th>
				<th>Group Npwp</th>
				<th>Group Bpjs</th>
				<th>Flag BPJS Kesehatan *</th>
				<th>BPJS Kesehatan No</th>
				<th>BPJS Kesehatan Join Date</th>
				<th>BPJS Kesehatan Period Start Date</th>
				<th>Flag BPJS Tenaga Kerja *</th>
				<th>BPJS Tenaga Kerja No</th>
				<th>BPJS Tenaga Kerja Join Date</th>
				<th>BPJS Tenaga Kerja Period Start Date</th>
				<th>Employee Bank Code 1</th>
				<th>Bank Account No 1</th>
				<th>Beneficiary Name 1</th>
				<th>Bank Percentage Salary 1</th>
				<th>Company Bank Code 1</th>
				<th>Currency Code 1</th>
				<th>Employee Bank Code 2</th>
				<th>Bank Account No 2</th>
				<th>Beneficiary Name 2</th>
				<th>Bank Percentage Salary 2</th>
				<th>Company Bank Code 2</th>
				<th>Currency Code 2</th>
				<th>Employee Bank Code 3</th>
				<th>Bank Account No 3</th>
				<th>Beneficiary Name 3</th>
				<th>Bank Percentage Salary 3</th>
				<th>Company Bank Code 3</th>
				<th>Currency Code 3</th>
				<th>Flag Exclude Payroll *</th>
				<th>Nickname</th>
				<th>Blood Type</th>
				<th>Passport No</th>
				<th>Passport Date</th>
				<th>Passport Place Registration</th>
				<th>Passport Expiry Date</th>
				<th>Driving License Car No</th>
				<th>Driving License Car Type</th>
				<th>Driving License Car No Date</th>
				<th>Driving License Car No Place Registration</th>
				<th>Driving License Car No Expiry Date</th>
				<th>Driving License Motor No</th>
				<th>Driving License Motor No Date</th>
				<th>Driving License Motor No Place Registration</th>
				<th>Driving License Motor No Expiry Date</th>
				<th>Employee Card ID</th>
				<th>ID No</th>
				<th>ID No Date</th>
				<th>ID No Place Registration</th>
				<th>ID No Expiry Date</th>
				<th>Home Address</th>
				<th>Home City Code</th>
				<th>Home Zip Code</th>
				<th>Home Phone</th>
				<th>Other Address</th>
				<th>Other City Code</th>
				<th>Other Zip Code</th>
				<th>Other Phone</th>
				<th>Work Address</th>
				<th>Work City Code</th>
				<th>Work Zip Code</th>
				<th>Work Phone</th>
				<th>Correspondence Address</th>
				<th>Correspondence City Code</th>
				<th>Correspondence Zip Code</th>
				<th>Correspondence Phone</th>
				<th>Personal Handphone</th>
				<th>Personal Email Address</th>
				<th>Company Email Address</th>
				<th>Emergency Name</th>
				<th>Emergency Address</th>
				<th>Emergency Phone</th>
				<th>Emergency Relation</th>
				<th>Emergency Email Address</th>
				<th>Home District Code</th>
				<th>Home Sub District Code</th>
				<th>Other District Code</th>
				<th>Other Sub District Code</th>
				<th>Insurance Code</th>
				<th>Insurance Class Code</th>
				<th>Insurance Start Date</th>
				<th>Insurance End Date</th>
				<th>Insurance Policy No</th>
				<th>Leave Code *</th>
			</tr>
		</thead>
        <tbody>
            @foreach($data as $value)
            <tr>
				<td data-format="@">{{ $value->companyCode }}</td>
                <td data-format="@">{{ $value->employeeNo }}</td>
                <td data-format="@">{{ $value->fullName }}</td>
                <td data-format="@">{{ $value->birthPlace }}</td>
				<td>{{ $value->birthDate ? date('Y-m-d', strtotime($value->birthDate)) : '' }}</td>
                <td data-format="@">{{ $value->gender }}</td>
                <td data-format="@">{{ $value->maritalStatus }}</td>
                <td data-format="@">{{ $value->taxRegisteredNo }}</td>
                <td data-format="@">{{ $value->religionCode }}</td>
                <td data-format="@">{{ $value->nationalityCode }}</td>
                <td>{{ $value->costCenterCode }}</td>
                <td data-format="@">{{ $value->employmentStatus }}</td>
                <td data-format="@">{{ ($value->flagIsExpat) ? "TRUE" : "FALSE" }}</td>
                <td data-format="@">{{ $value->expatLicenseNo }}</td>
                <td>{{ $value->expatLicenseStartDate ? date('Y-m-d', strtotime($value->expatLicenseStartDate)) : '' }}</td>
                <td>{{ $value->expatLicenseEndDate ? date('Y-m-d', strtotime($value->expatLicenseEndDate)) : '' }}</td>
				<td>{{ $value->joinDate ? date('Y-m-d', strtotime($value->joinDate)) : '' }}</td>
				<td>{{ $value->probationEndDate ? date('Y-m-d', strtotime($value->probationEndDate)) : '' }}</td>
				<td>{{ $value->contractStartDate ? date('Y-m-d', strtotime($value->contractStartDate)) : '' }}</td>
				<td>{{ $value->contractEndDate ? date('Y-m-d', strtotime($value->contractEndDate)) : '' }}</td>
                <td data-format="@">{{ $value->employmentType }}</td>
                <td data-format="@">{{ $value->locationCode }}</td>
                <td data-format="@">{{ $value->gradeCode }}</td>
                <td data-format="@">{{ $value->positionCode }}</td>
                <td data-format="@">{{ $value->rankingCode }}</td>
                <td data-format="@">{{ $value->workNatureCode }}</td>
                <td data-format="@">{{ $value->groupCode }}</td>
                <td data-format="@">{{ $value->groupAuthorizeCode }}</td>
                <td data-format="@">{{ ($value->flagIsCommissioner) ? "TRUE" : "FALSE" }}</td>
                <td data-format="@">{{ $value->motherName }}</td>
                <td data-format="@">{{ $value->absenteeismType }}</td>
                <td data-format="@">{{ $value->workPatternCode }}</td>
                <td>{{ $value->startAtDay }}</td>
                <td data-format="@">{{ ($value->flagNotAbsent) ? "TRUE" : "FALSE" }}</td>
                <td data-format="@">{{ ($value->flagNotFinger) ? "TRUE" : "FALSE" }}</td>
                <td data-format="@">{{ $value->taxStatus }}</td>
                <td data-format="@">{{ $value->taxStatusNextYear }}</td>
                <td data-format="@">{{ $value->taxCalculationMethod }}</td>
                <td data-format="@">{{ ($value->flagAstekDeathNonAccident) ? "TRUE" : "FALSE" }}</td>
                <td data-format="@">{{ ($value->flagAstekWorkAccident) ? "TRUE" : "FALSE" }}</td>
                <td data-format="@">{{ ($value->flagAstekWorkAccident2) ? "TRUE" : "FALSE" }}</td>
                <td data-format="@">{{ ($value->flagAstekWorkAccident3) ? "TRUE" : "FALSE" }}</td>
                <td data-format="@">{{ ($value->flagAstekPensionEmployee) ? "TRUE" : "FALSE" }}</td>
                <td data-format="@">{{ ($value->flagAstekPensionEmployer) ? "TRUE" : "FALSE" }}</td>
                <td data-format="@">{{ ($value->flagAstekHealthInsurance) ? "TRUE" : "FALSE" }}</td>
                <td data-format="@">{{ ($value->flagTaxByGovernment) ? "TRUE" : "FALSE" }}</td>
                <td data-format="@">{{ ($value->flagPensionInsurance) ? "TRUE" : "FALSE" }}</td>
                <td data-format="@">{{ $value->groupNpwp }}</td>
                <td data-format="@">{{ $value->groupBpjs }}</td>
                <td data-format="@">{{ ($value->flagBPJSKesehatan) ? "TRUE" : "FALSE" }}</td>
                <td data-format="@">{{ $value->bpjsKesehatanNo }}</td>
                <td>{{ $value->bpjsKesehatanJoinDate ? date('Y-m-d', strtotime($value->bpjsKesehatanJoinDate)) : '' }}</td>
				<td>{{ $value->bpjsKesehatanPeriodStartDate ? date('Y-m-d', strtotime($value->bpjsKesehatanPeriodStartDate)) : '' }}</td>
                <td data-format="@">{{ ($value->flagBPJSTenagaKerja) ? "TRUE" : "FALSE" }}</td>
                <td data-format="@">{{ $value->bpjsTenagaKerjaNo }}</td>
				<td>{{ $value->bpjsTenagaKerjaJoinDate ? date('Y-m-d', strtotime($value->bpjsTenagaKerjaJoinDate)) : '' }}</td>
				<td>{{ $value->bpjsTenagaKerjaPeriodStartDate ? date('Y-m-d', strtotime($value->bpjsTenagaKerjaPeriodStartDate)) : '' }}</td>
                <td data-format="@">{{ $value->employeeBankCode1 }}</td>
                <td data-format="@">{{ $value->bankAccountNo1 }}</td>
                <td data-format="@">{{ $value->beneficiaryName1 }}</td>
                <td>{{ $value->bankPercentageSalary1 }}</td>
                <td data-format="@">{{ $value->companyBankCode1 }}</td>
                <td data-format="@">{{ $value->currencyCode1 }}</td>
                <td data-format="@">{{ $value->employeeBankCode2 }}</td>
                <td data-format="@">{{ $value->bankAccountNo2 }}</td>
                <td data-format="@">{{ $value->beneficiaryName2 }}</td>
                <td>{{ $value->bankPercentageSalary2 }}</td>
                <td data-format="@">{{ $value->companyBankCode2 }}</td>
                <td data-format="@">{{ $value->currencyCode2 }}</td>
                <td data-format="@">{{ $value->employeeBankCode3 }}</td>
                <td data-format="@">{{ $value->bankAccountNo3 }}</td>
                <td data-format="@">{{ $value->beneficiaryName3 }}</td>
                <td>{{ $value->bankPercentageSalary3 }}</td>
                <td data-format="@">{{ $value->companyBankCode3 }}</td>
                <td data-format="@">{{ $value->currencyCode3 }}</td>
                <td data-format="@">{{ ($value->flagExcludePayroll) ? "TRUE" : "FALSE" }}</td>
				@if(count((array) $value->peMasterInfo) > 0)
					<td data-format="@">{{ $value->peMasterInfo->nickName }}</td>
					<td data-format="@">{{ $value->peMasterInfo->bloodType }}</td>
					<td data-format="@">{{ $value->peMasterInfo->passportNo }}</td>
					<td>{{ $value->peMasterInfo->passportDate ? date('Y-m-d', strtotime($value->peMasterInfo->passportDate)) : '' }}</td>
					<td data-format="@">{{ $value->peMasterInfo->passportPlaceRegistration }}</td>
					<td>{{ $value->peMasterInfo->passportExpiryDate ? date('Y-m-d', strtotime($value->peMasterInfo->passportExpiryDate)) : '' }}</td>
					<td data-format="@">{{ $value->peMasterInfo->drivingLicenseMobilNo }}</td>
					<td data-format="@">{{ $value->peMasterInfo->drivingLicenseMobilType }}</td>
					<td>{{ $value->peMasterInfo->drivingLicenseMobilNoDate ? date('Y-m-d', strtotime($value->peMasterInfo->drivingLicenseMobilNoDate)) : '' }}</td>
					<td data-format="@">{{ $value->peMasterInfo->drivingLicenseMobilNoPlaceRegistration }}</td>
					<td>{{ $value->peMasterInfo->drivingLicenseMobilNoExpiryDate ? date('Y-m-d', strtotime($value->peMasterInfo->drivingLicenseMobilNoExpiryDate)) : '' }}</td>
					<td data-format="@">{{ $value->peMasterInfo->drivingLicenseMotorNo }}</td>
					<td>{{ $value->peMasterInfo->drivingLicenseMotorNoDate ? date('Y-m-d', strtotime($value->peMasterInfo->drivingLicenseMotorNoDate)) : '' }}</td>
					<td data-format="@">{{ $value->peMasterInfo->drivingLicenseMotorNoPlaceRegistration }}</td>
					<td>{{ $value->peMasterInfo->drivingLicenseMotorNoExpiryDate ? date('Y-m-d', strtotime($value->peMasterInfo->drivingLicenseMotorNoExpiryDate)) : '' }}</td>
					<td data-format="@">{{ $value->peMasterInfo->employeeCardId }}</td>
					<td data-format="@">{{ $value->peMasterInfo->idNo }}</td>
					<td>{{ $value->peMasterInfo->idNoDate ? date('Y-m-d', strtotime($value->peMasterInfo->idNoDate)) : '' }}</td>
					<td data-format="@">{{ $value->peMasterInfo->idNoPlaceRegistration }}</td>
					<td>{{ $value->peMasterInfo->idNoExpiryDate ? date('Y-m-d', strtotime($value->peMasterInfo->idNoExpiryDate)) : '' }}</td>
					<td data-format="@">{{ $value->peMasterInfo->homeAddress }}</td>
					<td data-format="@">{{ $value->peMasterInfo->homeCityCode }}</td>
					<td data-format="@">{{ $value->peMasterInfo->homeZipCode }}</td>
					<td data-format="@">{{ $value->peMasterInfo->homePhone }}</td>
					<td data-format="@">{{ $value->peMasterInfo->otherAddress }}</td>
					<td data-format="@">{{ $value->peMasterInfo->otherCityCode }}</td>
					<td data-format="@">{{ $value->peMasterInfo->otherZipCode }}</td>
					<td data-format="@">{{ $value->peMasterInfo->otherPhone }}</td>
					<td data-format="@">{{ $value->peMasterInfo->workAddress }}</td>
					<td data-format="@">{{ $value->peMasterInfo->workCityCode }}</td>
					<td data-format="@">{{ $value->peMasterInfo->workZipCode }}</td>
					<td data-format="@">{{ $value->peMasterInfo->workPhone }}</td>
					<td data-format="@">{{ $value->peMasterInfo->correspondenceAddress }}</td>
					<td data-format="@">{{ $value->peMasterInfo->correspondenceCityCode }}</td>
					<td data-format="@">{{ $value->peMasterInfo->correspondenceZipCode }}</td>
					<td data-format="@">{{ $value->peMasterInfo->correspondencePhone }}</td>
					<td data-format="@">{{ $value->peMasterInfo->personalHandphone }}</td>
					<td data-format="@">{{ $value->peMasterInfo->personalEmailAddress }}</td>
					<td data-format="@">{{ $value->peMasterInfo->companyEmailAddress }}</td>
					<td data-format="@">{{ $value->peMasterInfo->emergencyName }}</td>
					<td data-format="@">{{ $value->peMasterInfo->emergencyAddress }}</td>
					<td data-format="@">{{ $value->peMasterInfo->emergencyPhone }}</td>
					<td data-format="@">{{ $value->peMasterInfo->emergencyRelation }}</td>
					<td data-format="@">{{ $value->peMasterInfo->emergencyEmailAddress }}</td>
					<td data-format="@">{{ $value->peMasterInfo->homeDistrictCode }}</td>
					<td data-format="@">{{ $value->peMasterInfo->homeSubDistrictCode }}</td>
					<td data-format="@">{{ $value->peMasterInfo->otherDistrictCode }}</td>
					<td data-format="@">{{ $value->peMasterInfo->otherSubDistrictCode }}</td>
				@else
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td></td>
					<td data-format="@"></td>
					<td></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td></td>
					<td data-format="@"></td>
					<td></td>
					<td data-format="@"></td>
					<td></td>
					<td data-format="@"></td>
					<td></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td></td>
					<td data-format="@"></td>
					<td></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td data-format="@"></td>
				@endif
				@if(count((array) $value->peMasterInsurance) > 0)
					<td data-format="@">{{ $value->peMasterInsurance->insuranceCode }}</td>
					<td data-format="@">{{ $value->peMasterInsurance->insuranceClassCode }}</td>
					<td>{{ $value->peMasterInsurance->insuranceStartDate ? date('Y-m-d', strtotime($value->peMasterInsurance->insuranceStartDate)) : '' }}</td>
					<td>{{ $value->peMasterInsurance->insuranceEndDate ? date('Y-m-d', strtotime($value->peMasterInsurance->insuranceEndDate)) : '' }}</td>
					<td data-format="@">{{ $value->peMasterInsurance->insurancePolicyNo }}</td>
				@else
					<td data-format="@"></td>
					<td data-format="@"></td>
					<td></td>
					<td></td>
					<td data-format="@"></td>
				@endif
				@if(count((array) $value->peMasterLeave) > 0)
                	<td data-format="@">{{ $value->peMasterLeave->leaveCode }}</td>
				@else
					<td data-format="@"></td>
				@endif
            </tr>
            @endforeach
        </tbody>
	</table>
</body>
</html>