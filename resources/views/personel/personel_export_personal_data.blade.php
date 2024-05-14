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
				@foreach($header as $value)
				<th>{{ $value }}</th>
				@endforeach
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
				@if(count((array) $value->peMasterLevel) > 0)
					@foreach($value->peMasterLevel as $value)
                		<td data-format="@">{{ $value->levelCode }}</td>
					@endforeach
				@else
					@foreach($value->peMasterLevel as $value)
                		<td data-format="@"></td>
					@endforeach
				@endif
            </tr>
            @endforeach
        </tbody>
	</table>
</body>
</html>