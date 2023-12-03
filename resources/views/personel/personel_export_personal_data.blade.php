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
				<td>{{ $value->companyCode }}</td>
                <td>{{ $value->employeeNo }}</td>
                <td>{{ $value->fullName }}</td>
                <td>{{ $value->birthPlace }}</td>
				<td>{{ $value->birthDate ? date('Y-m-d', strtotime($value->birthDate)) : '' }}</td>
                <td>{{ $value->gender }}</td>
                <td>{{ $value->maritalStatus }}</td>
                <td>{{ $value->taxRegisteredNo }}</td>
                <td>{{ $value->religionCode }}</td>
                <td>{{ $value->nationalityCode }}</td>
                <td>{{ $value->costCenterCode }}</td>
                <td>{{ $value->employmentStatus }}</td>
                <td>{{ ($value->flagIsExpat) ? "TRUE" : "FALSE" }}</td>
                <td>{{ $value->expatLicenseNo }}</td>
                <td>{{ $value->expatLicenseStartDate ? date('Y-m-d', strtotime($value->expatLicenseStartDate)) : '' }}</td>
                <td>{{ $value->expatLicenseEndDate ? date('Y-m-d', strtotime($value->expatLicenseEndDate)) : '' }}</td>
				<td>{{ $value->joinDate ? date('Y-m-d', strtotime($value->joinDate)) : '' }}</td>
				<td>{{ $value->probationEndDate ? date('Y-m-d', strtotime($value->probationEndDate)) : '' }}</td>
				<td>{{ $value->contractStartDate ? date('Y-m-d', strtotime($value->contractStartDate)) : '' }}</td>
				<td>{{ $value->contractEndDate ? date('Y-m-d', strtotime($value->contractEndDate)) : '' }}</td>
                <td>{{ $value->employmentType }}</td>
                <td>{{ $value->locationCode }}</td>
                <td>{{ $value->gradeCode }}</td>
                <td>{{ $value->positionCode }}</td>
                <td>{{ $value->rankingCode }}</td>
                <td>{{ $value->workNatureCode }}</td>
                <td>{{ $value->groupCode }}</td>
                <td>{{ $value->groupAuthorizeCode }}</td>
                <td>{{ ($value->flagIsCommissioner) ? "TRUE" : "FALSE" }}</td>
                <td>{{ $value->motherName }}</td>
                <td>{{ $value->absenteeismType }}</td>
                <td>{{ $value->workPatternCode }}</td>
                <td>{{ $value->startAtDay }}</td>
                <td>{{ ($value->flagNotAbsent) ? "TRUE" : "FALSE" }}</td>
                <td>{{ ($value->flagNotFinger) ? "TRUE" : "FALSE" }}</td>
                <td>{{ $value->taxStatus }}</td>
                <td>{{ $value->taxStatusNextYear }}</td>
                <td>{{ $value->taxCalculationMethod }}</td>
                <td>{{ ($value->flagAstekDeathNonAccident) ? "TRUE" : "FALSE" }}</td>
                <td>{{ ($value->flagAstekWorkAccident) ? "TRUE" : "FALSE" }}</td>
                <td>{{ ($value->flagAstekWorkAccident2) ? "TRUE" : "FALSE" }}</td>
                <td>{{ ($value->flagAstekWorkAccident3) ? "TRUE" : "FALSE" }}</td>
                <td>{{ ($value->flagAstekPensionEmployee) ? "TRUE" : "FALSE" }}</td>
                <td>{{ ($value->flagAstekPensionEmployer) ? "TRUE" : "FALSE" }}</td>
                <td>{{ ($value->flagAstekHealthInsurance) ? "TRUE" : "FALSE" }}</td>
                <td>{{ ($value->flagTaxByGovernment) ? "TRUE" : "FALSE" }}</td>
                <td>{{ ($value->flagPensionInsurance) ? "TRUE" : "FALSE" }}</td>
                <td>{{ $value->groupNpwp }}</td>
                <td>{{ $value->groupBpjs }}</td>
                <td>{{ ($value->flagBPJSKesehatan) ? "TRUE" : "FALSE" }}</td>
                <td>{{ $value->bpjsKesehatanNo }}</td>
                <td>{{ $value->bpjsKesehatanJoinDate ? date('Y-m-d', strtotime($value->bpjsKesehatanJoinDate)) : '' }}</td>
				<td>{{ $value->bpjsKesehatanPeriodStartDate ? date('Y-m-d', strtotime($value->bpjsKesehatanPeriodStartDate)) : '' }}</td>
                <td>{{ ($value->flagBPJSTenagaKerja) ? "TRUE" : "FALSE" }}</td>
                <td>{{ $value->bpjsTenagaKerjaNo }}</td>
				<td>{{ $value->bpjsTenagaKerjaJoinDate ? date('Y-m-d', strtotime($value->bpjsTenagaKerjaJoinDate)) : '' }}</td>
				<td>{{ $value->bpjsTenagaKerjaPeriodStartDate ? date('Y-m-d', strtotime($value->bpjsTenagaKerjaPeriodStartDate)) : '' }}</td>
                <td>{{ $value->employeeBankCode1 }}</td>
                <td>{{ $value->bankAccountNo1 }}</td>
                <td>{{ $value->beneficiaryName1 }}</td>
                <td>{{ $value->bankPercentageSalary1 }}</td>
                <td>{{ $value->companyBankCode1 }}</td>
                <td>{{ $value->currencyCode1 }}</td>
                <td>{{ $value->employeeBankCode2 }}</td>
                <td>{{ $value->bankAccountNo2 }}</td>
                <td>{{ $value->beneficiaryName2 }}</td>
                <td>{{ $value->bankPercentageSalary2 }}</td>
                <td>{{ $value->companyBankCode2 }}</td>
                <td>{{ $value->currencyCode2 }}</td>
                <td>{{ $value->employeeBankCode3 }}</td>
                <td>{{ $value->bankAccountNo3 }}</td>
                <td>{{ $value->beneficiaryName3 }}</td>
                <td>{{ $value->bankPercentageSalary3 }}</td>
                <td>{{ $value->companyBankCode3 }}</td>
                <td>{{ $value->currencyCode3 }}</td>
                <td>{{ ($value->flagExcludePayroll) ? "TRUE" : "FALSE" }}</td>
				@if(count((array) $value->peMasterInfo) > 0)
					<td>{{ $value->peMasterInfo->nickName }}</td>
					<td>{{ $value->peMasterInfo->bloodType }}</td>
					<td>{{ $value->peMasterInfo->passportNo }}</td>
					<td>{{ $value->peMasterInfo->passportDate ? date('Y-m-d', strtotime($value->peMasterInfo->passportDate)) : '' }}</td>
					<td>{{ $value->peMasterInfo->passportPlaceRegistration }}</td>
					<td>{{ $value->peMasterInfo->passportExpiryDate ? date('Y-m-d', strtotime($value->peMasterInfo->passportExpiryDate)) : '' }}</td>
					<td>{{ $value->peMasterInfo->drivingLicenseMobilNo }}</td>
					<td>{{ $value->peMasterInfo->drivingLicenseMobilType }}</td>
					<td>{{ $value->peMasterInfo->drivingLicenseMobilNoDate ? date('Y-m-d', strtotime($value->peMasterInfo->drivingLicenseMobilNoDate)) : '' }}</td>
					<td>{{ $value->peMasterInfo->drivingLicenseMobilNoPlaceRegistration }}</td>
					<td>{{ $value->peMasterInfo->drivingLicenseMobilNoExpiryDate ? date('Y-m-d', strtotime($value->peMasterInfo->drivingLicenseMobilNoExpiryDate)) : '' }}</td>
					<td>{{ $value->peMasterInfo->drivingLicenseMotorNo }}</td>
					<td>{{ $value->peMasterInfo->drivingLicenseMotorNoDate ? date('Y-m-d', strtotime($value->peMasterInfo->drivingLicenseMotorNoDate)) : '' }}</td>
					<td>{{ $value->peMasterInfo->drivingLicenseMotorNoPlaceRegistration }}</td>
					<td>{{ $value->peMasterInfo->drivingLicenseMotorNoExpiryDate ? date('Y-m-d', strtotime($value->peMasterInfo->drivingLicenseMotorNoExpiryDate)) : '' }}</td>
					<td>{{ $value->peMasterInfo->employeeCardId }}</td>
					<td>{{ $value->peMasterInfo->idNo }}</td>
					<td>{{ $value->peMasterInfo->idNoDate ? date('Y-m-d', strtotime($value->peMasterInfo->idNoDate)) : '' }}</td>
					<td>{{ $value->peMasterInfo->idNoPlaceRegistration }}</td>
					<td>{{ $value->peMasterInfo->idNoExpiryDate ? date('Y-m-d', strtotime($value->peMasterInfo->idNoExpiryDate)) : '' }}</td>
					<td>{{ $value->peMasterInfo->homeAddress }}</td>
					<td>{{ $value->peMasterInfo->homeCityCode }}</td>
					<td>{{ $value->peMasterInfo->homeZipCode }}</td>
					<td>{{ $value->peMasterInfo->homePhone }}</td>
					<td>{{ $value->peMasterInfo->otherAddress }}</td>
					<td>{{ $value->peMasterInfo->otherCityCode }}</td>
					<td>{{ $value->peMasterInfo->otherZipCode }}</td>
					<td>{{ $value->peMasterInfo->otherPhone }}</td>
					<td>{{ $value->peMasterInfo->workAddress }}</td>
					<td>{{ $value->peMasterInfo->workCityCode }}</td>
					<td>{{ $value->peMasterInfo->workZipCode }}</td>
					<td>{{ $value->peMasterInfo->workPhone }}</td>
					<td>{{ $value->peMasterInfo->correspondenceAddress }}</td>
					<td>{{ $value->peMasterInfo->correspondenceCityCode }}</td>
					<td>{{ $value->peMasterInfo->correspondenceZipCode }}</td>
					<td>{{ $value->peMasterInfo->correspondencePhone }}</td>
					<td>{{ $value->peMasterInfo->personalHandphone }}</td>
					<td>{{ $value->peMasterInfo->personalEmailAddress }}</td>
					<td>{{ $value->peMasterInfo->companyEmailAddress }}</td>
					<td>{{ $value->peMasterInfo->emergencyName }}</td>
					<td>{{ $value->peMasterInfo->emergencyAddress }}</td>
					<td>{{ $value->peMasterInfo->emergencyPhone }}</td>
					<td>{{ $value->peMasterInfo->emergencyRelation }}</td>
					<td>{{ $value->peMasterInfo->emergencyEmailAddress }}</td>
					<td>{{ $value->peMasterInfo->homeDistrictCode }}</td>
					<td>{{ $value->peMasterInfo->homeSubDistrictCode }}</td>
					<td>{{ $value->peMasterInfo->otherDistrictCode }}</td>
					<td>{{ $value->peMasterInfo->otherSubDistrictCode }}</td>
				@else
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				@endif
				@if(count((array) $value->peMasterInsurance) > 0)
					<td>{{ $value->peMasterInsurance->insuranceCode }}</td>
					<td>{{ $value->peMasterInsurance->insuranceClassCode }}</td>
					<td>{{ $value->peMasterInsurance->insuranceStartDate ? date('Y-m-d', strtotime($value->peMasterInsurance->insuranceStartDate)) : '' }}</td>
					<td>{{ $value->peMasterInsurance->insuranceEndDate ? date('Y-m-d', strtotime($value->peMasterInsurance->insuranceEndDate)) : '' }}</td>
					<td>{{ $value->peMasterInsurance->insurancePolicyNo }}</td>
				@else
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				@endif
				@if(count((array) $value->peMasterLeave) > 0)
                	<td>{{ $value->peMasterLeave->leaveCode }}</td>
				@else
					<td></td>
				@endif
            </tr>
            @endforeach
        </tbody>
	</table>
</body>
</html>