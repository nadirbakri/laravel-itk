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
				<th>Employee No *</th>
				<th>Employee Name *</th>
				<th>Birth Place</th>
				<th>Birth Date *</th>
				<th>Gender *</th>
				<th>MaritalStatus *</th>
				<th>TaxRegisteredNo</th>
				<th>ReligionCode</th>
				<th>NationalityCode</th>
				<th>CostCenterCode</th>
				<th>EmploymentStatus *</th>
				<th>FlagIsExpat</th>
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
				<th>Flag Commissioner</th>
				<th>Mother Name</th>
				<th>Absenteeism Type</th>
				<th>Work Pattern Code</th>
				<th>Start Join Day</th>
				<th>Flag Not Absent</th>
				<th>Flag Not Finger</th>
				<th>Tax Status</th>
				<th>Tax Status Next Year</th>
				<th>Tax Calculation Method</th>
				<th>Flag Astek Death Non Accident</th>
				<th>Flag Astek Work Accident</th>
				<th>Flag Astek Work Accident 2</th>
				<th>Flag Astek Work Accident 3</th>
				<th>Flag Astek Pension Employee</th>
				<th>Flag Astek Pension Employer</th>
				<th>Flag Astek Health Insurance</th>
				<th>Flag Tax By Government</th>
				<th>Flag Pension Insurance</th>
				<th>Group Npwp</th>
				<th>Group Bpjs</th>
				<th>Flag BPJS Kesehatan</th>
				<th>BPJS Kesehatan No</th>
				<th>BPJS Kesehatan Join Date</th>
				<th>BPJS Kesehatan Period Start Date</th>
				<th>Flag BPJS Tenaga Kerja</th>
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
				<th>Flag Exclude Payroll</th>
			</tr>
		</thead>
        <tbody>
            @foreach($data as $value)
            <tr>
                <td>{{ $value->employeeNo }}</td>
                <td>{{ $value->fullName }}</td>
                <td>{{ $value->birthPlace }}</td>
                <td>{{ date('Y-m-d', strtotime($value->birthDate)) }}</td>
                <td>{{ $value->gender }}</td>
                <td>{{ $value->maritalStatus }}</td>
                <td>{{ $value->taxRegisteredNo }}</td>
                <td>{{ $value->religionCode }}</td>
                <td>{{ $value->nationalityCode }}</td>
                <td>{{ $value->costCenterCode }}</td>
                <td>{{ $value->employmentStatus }}</td>
                <td>{{ ($value->flagIsExpat) ? "1" : "0" }}</td>
                <td>{{ $value->expatLicenseNo }}</td>
                <td>{{ date('Y-m-d', strtotime($value->expatLicenseStartDate)) }}</td>
                <td>{{ date('Y-m-d', strtotime($value->expatLicenseEndDate)) }}</td>
                <td>{{ date('Y-m-d', strtotime($value->joinDate)) }}</td>
                <td>{{ date('Y-m-d', strtotime($value->probationEndDate)) }}</td>
                <td>{{ date('Y-m-d', strtotime($value->contractStartDate)) }}</td>
                <td>{{ date('Y-m-d', strtotime($value->contractEndDate)) }}</td>
                <td>{{ $value->employmentType }}</td>
                <td>{{ $value->locationCode }}</td>
                <td>{{ $value->gradeCode }}</td>
                <td>{{ $value->positionCode }}</td>
                <td>{{ $value->rankingCode }}</td>
                <td>{{ $value->workNatureCode }}</td>
                <td>{{ $value->groupCode }}</td>
                <td>{{ $value->groupAuthorizeCode }}</td>
                <td>{{ ($value->flagIsCommissioner) ? "1" : "0" }}</td>
                <td>{{ $value->motherName }}</td>
                <td>{{ $value->absenteeismType }}</td>
                <td>{{ $value->workPatternCode }}</td>
                <td>{{ $value->startAtDay }}</td>
                <td>{{ ($value->flagNotAbsent) ? "1" : "0" }}</td>
                <td>{{ ($value->flagNotFinger) ? "1" : "0" }}</td>
                <td>{{ $value->taxStatus }}</td>
                <td>{{ $value->taxStatusNextYear }}</td>
                <td>{{ $value->taxCalculationMethod }}</td>
                <td>{{ ($value->flagAstekDeathNonAccident) ? "1" : "0" }}</td>
                <td>{{ ($value->flagAstekWorkAccident) ? "1" : "0" }}</td>
                <td>{{ ($value->flagAstekWorkAccident2) ? "1" : "0" }}</td>
                <td>{{ ($value->flagAstekWorkAccident3) ? "1" : "0" }}</td>
                <td>{{ ($value->flagAstekPensionEmployee) ? "1" : "0" }}</td>
                <td>{{ ($value->flagAstekPensionEmployer) ? "1" : "0" }}</td>
                <td>{{ ($value->flagAstekHealthInsurance) ? "1" : "0" }}</td>
                <td>{{ ($value->flagTaxByGovernment) ? "1" : "0" }}</td>
                <td>{{ ($value->flagPensionInsurance) ? "1" : "0" }}</td>
                <td>{{ $value->groupNpwp }}</td>
                <td>{{ $value->groupBpjs }}</td>
                <td>{{ ($value->flagBPJSKesehatan) ? "1" : "0" }}</td>
                <td>{{ $value->bpjsKesehatanNo }}</td>
                <td>{{ date('Y-m-d', strtotime($value->bpjsKesehatanJoinDate)) }}</td>
                <td>{{ date('Y-m-d', strtotime($value->bpjsKesehatanPeriodStartDate)) }}</td>
                <td>{{ ($value->flagBPJSTenagaKerja) ? "1" : "0" }}</td>
                <td>{{ $value->bpjsTenagaKerjaNo }}</td>
                <td>{{ date('Y-m-d', strtotime($value->bpjsTenagaKerjaJoinDate)) }}</td>
                <td>{{ date('Y-m-d', strtotime($value->bpjsTenagaKerjaPeriodStartDate)) }}</td>
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
                <td>{{ ($value->flagExcludePayroll) ? "1" : "0" }}</td>
            </tr>
            @endforeach
        </tbody>
	</table>
</body>
</html>