<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon"/>
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
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
				<td><?php echo e($value->companyCode); ?></td>
                <td><?php echo e($value->employeeNo); ?></td>
                <td><?php echo e($value->fullName); ?></td>
                <td><?php echo e($value->birthPlace); ?></td>
                <td><?php echo e(date('Y-m-d', strtotime($value->birthDate))); ?></td>
                <td><?php echo e($value->gender); ?></td>
                <td><?php echo e($value->maritalStatus); ?></td>
                <td><?php echo e($value->taxRegisteredNo); ?></td>
                <td><?php echo e($value->religionCode); ?></td>
                <td><?php echo e($value->nationalityCode); ?></td>
                <td><?php echo e($value->costCenterCode); ?></td>
                <td><?php echo e($value->employmentStatus); ?></td>
                <td><?php echo e(($value->flagIsExpat) ? "TRUE" : "FALSE"); ?></td>
                <td><?php echo e($value->expatLicenseNo); ?></td>
                <td><?php echo e(date('Y-m-d', strtotime($value->expatLicenseStartDate))); ?></td>
                <td><?php echo e(date('Y-m-d', strtotime($value->expatLicenseEndDate))); ?></td>
                <td><?php echo e(date('Y-m-d', strtotime($value->joinDate))); ?></td>
                <td><?php echo e(date('Y-m-d', strtotime($value->probationEndDate))); ?></td>
                <td><?php echo e(date('Y-m-d', strtotime($value->contractStartDate))); ?></td>
                <td><?php echo e(date('Y-m-d', strtotime($value->contractEndDate))); ?></td>
                <td><?php echo e($value->employmentType); ?></td>
                <td><?php echo e($value->locationCode); ?></td>
                <td><?php echo e($value->gradeCode); ?></td>
                <td><?php echo e($value->positionCode); ?></td>
                <td><?php echo e($value->rankingCode); ?></td>
                <td><?php echo e($value->workNatureCode); ?></td>
                <td><?php echo e($value->groupCode); ?></td>
                <td><?php echo e($value->groupAuthorizeCode); ?></td>
                <td><?php echo e(($value->flagIsCommissioner) ? "TRUE" : "FALSE"); ?></td>
                <td><?php echo e($value->motherName); ?></td>
                <td><?php echo e($value->absenteeismType); ?></td>
                <td><?php echo e($value->workPatternCode); ?></td>
                <td><?php echo e($value->startAtDay); ?></td>
                <td><?php echo e(($value->flagNotAbsent) ? "TRUE" : "FALSE"); ?></td>
                <td><?php echo e(($value->flagNotFinger) ? "TRUE" : "FALSE"); ?></td>
                <td><?php echo e($value->taxStatus); ?></td>
                <td><?php echo e($value->taxStatusNextYear); ?></td>
                <td><?php echo e($value->taxCalculationMethod); ?></td>
                <td><?php echo e(($value->flagAstekDeathNonAccident) ? "TRUE" : "FALSE"); ?></td>
                <td><?php echo e(($value->flagAstekWorkAccident) ? "TRUE" : "FALSE"); ?></td>
                <td><?php echo e(($value->flagAstekWorkAccident2) ? "TRUE" : "FALSE"); ?></td>
                <td><?php echo e(($value->flagAstekWorkAccident3) ? "TRUE" : "FALSE"); ?></td>
                <td><?php echo e(($value->flagAstekPensionEmployee) ? "TRUE" : "FALSE"); ?></td>
                <td><?php echo e(($value->flagAstekPensionEmployer) ? "TRUE" : "FALSE"); ?></td>
                <td><?php echo e(($value->flagAstekHealthInsurance) ? "TRUE" : "FALSE"); ?></td>
                <td><?php echo e(($value->flagTaxByGovernment) ? "TRUE" : "FALSE"); ?></td>
                <td><?php echo e(($value->flagPensionInsurance) ? "TRUE" : "FALSE"); ?></td>
                <td><?php echo e($value->groupNpwp); ?></td>
                <td><?php echo e($value->groupBpjs); ?></td>
                <td><?php echo e(($value->flagBPJSKesehatan) ? "TRUE" : "FALSE"); ?></td>
                <td><?php echo e($value->bpjsKesehatanNo); ?></td>
                <td><?php echo e(date('Y-m-d', strtotime($value->bpjsKesehatanJoinDate))); ?></td>
                <td><?php echo e(date('Y-m-d', strtotime($value->bpjsKesehatanPeriodStartDate))); ?></td>
                <td><?php echo e(($value->flagBPJSTenagaKerja) ? "TRUE" : "FALSE"); ?></td>
                <td><?php echo e($value->bpjsTenagaKerjaNo); ?></td>
                <td><?php echo e(date('Y-m-d', strtotime($value->bpjsTenagaKerjaJoinDate))); ?></td>
                <td><?php echo e(date('Y-m-d', strtotime($value->bpjsTenagaKerjaPeriodStartDate))); ?></td>
                <td><?php echo e($value->employeeBankCode1); ?></td>
                <td><?php echo e($value->bankAccountNo1); ?></td>
                <td><?php echo e($value->beneficiaryName1); ?></td>
                <td><?php echo e($value->bankPercentageSalary1); ?></td>
                <td><?php echo e($value->companyBankCode1); ?></td>
                <td><?php echo e($value->currencyCode1); ?></td>
                <td><?php echo e($value->employeeBankCode2); ?></td>
                <td><?php echo e($value->bankAccountNo2); ?></td>
                <td><?php echo e($value->beneficiaryName2); ?></td>
                <td><?php echo e($value->bankPercentageSalary2); ?></td>
                <td><?php echo e($value->companyBankCode2); ?></td>
                <td><?php echo e($value->currencyCode2); ?></td>
                <td><?php echo e($value->employeeBankCode3); ?></td>
                <td><?php echo e($value->bankAccountNo3); ?></td>
                <td><?php echo e($value->beneficiaryName3); ?></td>
                <td><?php echo e($value->bankPercentageSalary3); ?></td>
                <td><?php echo e($value->companyBankCode3); ?></td>
                <td><?php echo e($value->currencyCode3); ?></td>
                <td><?php echo e(($value->flagExcludePayroll) ? "TRUE" : "FALSE"); ?></td>
				<?php if(count((array) $value->peMasterInfo) > 0): ?>
					<td><?php echo e($value->peMasterInfo->nickName); ?></td>
					<td><?php echo e($value->peMasterInfo->bloodType); ?></td>
					<td><?php echo e($value->peMasterInfo->passportNo); ?></td>
					<td><?php echo e(date('Y-m-d', strtotime($value->peMasterInfo->passportDate))); ?></td>
					<td><?php echo e($value->peMasterInfo->passportPlaceRegistration); ?></td>
					<td><?php echo e(date('Y-m-d', strtotime($value->peMasterInfo->passportExpiryDate))); ?></td>
					<td><?php echo e($value->peMasterInfo->drivingLicenseMobilNo); ?></td>
					<td><?php echo e($value->peMasterInfo->drivingLicenseMobilType); ?></td>
					<td><?php echo e(date('Y-m-d', strtotime($value->peMasterInfo->drivingLicenseMobilNoDate))); ?></td>
					<td><?php echo e($value->peMasterInfo->drivingLicenseMobilNoPlaceRegistration); ?></td>
					<td><?php echo e(date('Y-m-d', strtotime($value->peMasterInfo->drivingLicenseMobilNoExpiryDate))); ?></td>
					<td><?php echo e($value->peMasterInfo->drivingLicenseMotorNo); ?></td>
					<td><?php echo e(date('Y-m-d', strtotime($value->peMasterInfo->drivingLicenseMotorNoDate))); ?></td>
					<td><?php echo e($value->peMasterInfo->drivingLicenseMotorNoPlaceRegistration); ?></td>
					<td><?php echo e(date('Y-m-d', strtotime($value->peMasterInfo->drivingLicenseMotorNoExpiryDate))); ?></td>
					<td><?php echo e($value->peMasterInfo->employeeCardId); ?></td>
					<td><?php echo e($value->peMasterInfo->idNo); ?></td>
					<td><?php echo e(date('Y-m-d', strtotime($value->peMasterInfo->idNoDate))); ?></td>
					<td><?php echo e($value->peMasterInfo->idNoPlaceRegistration); ?></td>
					<td><?php echo e(date('Y-m-d', strtotime($value->peMasterInfo->idNoExpiryDate))); ?></td>
					<td><?php echo e($value->peMasterInfo->homeAddress); ?></td>
					<td><?php echo e($value->peMasterInfo->homeCityCode); ?></td>
					<td><?php echo e($value->peMasterInfo->homeZipCode); ?></td>
					<td><?php echo e($value->peMasterInfo->homePhone); ?></td>
					<td><?php echo e($value->peMasterInfo->otherAddress); ?></td>
					<td><?php echo e($value->peMasterInfo->otherCityCode); ?></td>
					<td><?php echo e($value->peMasterInfo->otherZipCode); ?></td>
					<td><?php echo e($value->peMasterInfo->otherPhone); ?></td>
					<td><?php echo e($value->peMasterInfo->workAddress); ?></td>
					<td><?php echo e($value->peMasterInfo->workCityCode); ?></td>
					<td><?php echo e($value->peMasterInfo->workZipCode); ?></td>
					<td><?php echo e($value->peMasterInfo->workPhone); ?></td>
					<td><?php echo e($value->peMasterInfo->correspondenceAddress); ?></td>
					<td><?php echo e($value->peMasterInfo->correspondenceCityCode); ?></td>
					<td><?php echo e($value->peMasterInfo->correspondenceZipCode); ?></td>
					<td><?php echo e($value->peMasterInfo->correspondencePhone); ?></td>
					<td><?php echo e($value->peMasterInfo->personalHandphone); ?></td>
					<td><?php echo e($value->peMasterInfo->personalEmailAddress); ?></td>
					<td><?php echo e($value->peMasterInfo->companyEmailAddress); ?></td>
					<td><?php echo e($value->peMasterInfo->emergencyName); ?></td>
					<td><?php echo e($value->peMasterInfo->emergencyAddress); ?></td>
					<td><?php echo e($value->peMasterInfo->emergencyPhone); ?></td>
					<td><?php echo e($value->peMasterInfo->emergencyRelation); ?></td>
					<td><?php echo e($value->peMasterInfo->emergencyEmailAddress); ?></td>
					<td><?php echo e($value->peMasterInfo->homeDistrictCode); ?></td>
					<td><?php echo e($value->peMasterInfo->homeSubDistrictCode); ?></td>
					<td><?php echo e($value->peMasterInfo->otherDistrictCode); ?></td>
					<td><?php echo e($value->peMasterInfo->otherSubDistrictCode); ?></td>
				<?php else: ?>
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
				<?php endif; ?>
				<?php if(count((array) $value->peMasterInsurance) > 0): ?>
					<td><?php echo e($value->peMasterInsurance->insuranceCode); ?></td>
					<td><?php echo e($value->peMasterInsurance->insuranceClassCode); ?></td>
					<td><?php echo e(date('Y-m-d', strtotime($value->peMasterInsurance->insuranceStartDate))); ?></td>
					<td><?php echo e(date('Y-m-d', strtotime($value->peMasterInsurance->insuranceEndDate))); ?></td>
					<td><?php echo e($value->peMasterInsurance->insurancePolicyNo); ?></td>
				<?php else: ?>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				<?php endif; ?>
				<?php if(count((array) $value->peMasterLeave) > 0): ?>
                	<td><?php echo e($value->peMasterLeave->leaveCode); ?></td>
				<?php else: ?>
					<td></td>
				<?php endif; ?>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
	</table>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/personel/personel_export_personal_data.blade.php ENDPATH**/ ?>