<!DOCTYPE html>
<html>
<head>
	<title><?php echo e(__('personel_employee_card.judul')); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">
		* { box-sizing: border-box; }
		body{
            margin: 0;
            padding: 0;
			margin-left: 10px;
			margin-right: 10px;
			margin-bottom: 15px;
			margin-top: 15px;
		}
		.table_detail th{
            padding:4px;
		}
		.table_detail, .table_detail_data{
			border-collapse:collapse;
		}
        .table_detail td {
			text-align:center;
            padding: 3px 0 3px 0;
        }
        .table_detail_data th, .table_detail_data td {
			border:1px solid #000;
			text-align:center;
            padding: 3px 0 3px 0;
        }

        .page_break { page-break-before: always; }

        /* @page  { margin-bottom: 150px; size: auto; } */
        /* header { position: fixed; left: 0px; top: -90px; right: 0px; height: 150px; text-align: center; } */
        /* footer { position: absolute; left: 25px; bottom: -85px; right: 0px; height: 150px; }
        table { page-break-inside:auto }
        tr    { page-break-inside:avoid; page-break-after:auto; margin: 4px 0 4px 0; }
        td    { page-break-inside:avoid; page-break-after:auto }
        thead { display:table-header-group } */
	</style>
</head>
<body>
    <h3 style="text-align:center;"><?php echo e(__('personel_employee_card.report')); ?></h3>
    &nbsp;
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<table style="width:100%;" class="table table-bordered table-hover responsive table_detail">
        <tbody>
            <tr>
                <td rowspan="4" width="30%" style="border: 3px solid black;"><img src="data:image/png;base64, <?php echo e((isset($data->peMasterData->photo) && $data->peMasterData->photo != '') ? $data->peMasterData->photo : ''); ?>" style="width: 180px; height: 200px" alt="Photo"></img></td>
                <td width="5%"></td>
                <td style="text-align: left; font-weight:bold;" width="30%">Employee No</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="40%"><?php echo e((isset($data->peMasterData->employeeNo)) ? $data->peMasterData->employeeNo : ''); ?></td>
            </tr>
            <tr>
                <td width="5%"></td>
                <td style="text-align: left; font-weight:bold;">Employee Name</td>
                <td width="3%">:</td>
                <td style="text-align: left;"><?php echo e((isset($data->peMasterData->fullName)) ? $data->peMasterData->fullName : ''); ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    &nbsp;
    <table style="width:100%;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th style="text-align: left;"><u>Personnel Data</u></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: left;" width="25%">Gender</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%"><?php echo e((isset($data->peMasterData->gender)) ? $data->peMasterData->gender : ''); ?></td>
                <td style="text-align: left;" width="25%">Blood Type</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%"><?php echo e((isset($data->peMasterInfoData->bloodType)) ? $data->peMasterInfoData->bloodType : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Birth Place</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%"><?php echo e((isset($data->peMasterData->birthPlace)) ? $data->peMasterData->birthPlace : ''); ?></td>
                <td style="text-align: left;" width="25%">Birth Date</td>
                <td width="3%">:</td>
                
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Nationality</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%"><?php echo e((isset($data->peMasterData->nationality)) ? $data->peMasterData->nationality : ''); ?></td>
                <td style="text-align: left;" width="25%">Marital Status</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%"><?php echo e((isset($data->peMasterData->maritalStatus)) ? $data->peMasterData->maritalStatus : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Religion</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%"><?php echo e((isset($data->peMasterData->religion)) ? $data->peMasterData->religion : ''); ?></td>
                <td style="text-align: left;" width="25%">ID Number</td>
                <td width="3%">:</td>
                
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Passport No</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%"><?php echo e((isset($data->peMasterInfoData->passportNo )) ? $data->peMasterInfoData->passportNo : ''); ?></td>
                <td style="text-align: left;" width="25%">Passport Expiry Date</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%"><?php echo e(isset($data->peMasterInfoData->passportExpiryDate) ? date('d-M-Y', strtotime($data->peMasterInfoData->passportExpiryDate)) : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Driving License Car</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%"><?php echo e(isset($data->peMasterInfoData->drivingLicenseMobilType) ? date('d-M-Y', strtotime($data->peMasterInfoData->drivingLicenseMobilType)) : ''); ?> <?php echo e(isset($data->peMasterInfoData->drivingLicenseMobilNo) ? $data->peMasterInfoData->drivingLicenseMobilNo : ''); ?></td>
                <td style="text-align: left;" width="25%">Driving License Car Expiry Date</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%"><?php echo e(isset($data->peMasterInfoData->drivingLicenseMobilNoExpiryDate) ? date('d-M-Y', strtotime($data->peMasterInfoData->drivingLicenseMobilNoExpiryDate)) : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Driving License Bike</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%"><?php echo e((isset($data->peMasterInfoData->drivingLicenseMotorNo)) ? $data->peMasterInfoData->drivingLicenseMotorNo : ''); ?></td>
                <td style="text-align: left;" width="25%">Driving License Bike Expiry Date</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%"><?php echo e(isset($data->peMasterInfoData->drivingLicenseMotorNoExpiryDate) ? date('d-M-Y', strtotime($data->peMasterInfoData->drivingLicenseMotorNoExpiryDate)) : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Phone No</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%"><?php echo e((isset($data->peMasterInfoData->personalHandphone)) ? $data->peMasterInfoData->personalHandphone : ''); ?></td>
                <td style="text-align: left;" width="25%"></td>
                <td width="3%"></td>
                <td style="text-align: left;" width="25%"></td>
            </tr>
        </tbody>
    </table>
    &nbsp;
    <h4><u>Bank Data</u></h4>
    <table style="width:100%;" class="table table-bordered table-hover responsive table_detail_data">
        <tbody>
            <tr>
                <th width="3%">No.</th>
                <th width="10%">Bank Name</th>
                <th width="10%">Account No</th>
                <th width="10%">Beneficiary Name</th>
                <th width="10%">Currency</th>
            </tr>
            <tr>
                <td width="3%">1</td>
                <td width="10%"><?php echo e((isset($data->peMasterData->employeeBankCode1)) ? $data->peMasterData->employeeBankCode1 : ''); ?></td>
                <td width="10%"><?php echo e((isset($data->peMasterData->bankAccountNo1)) ? $data->peMasterData->bankAccountNo1 : ''); ?></td>
                <td width="10%"><?php echo e((isset($data->peMasterData->beneficiaryName1)) ? $data->peMasterData->beneficiaryName1 : ''); ?></td>
                <td width="10%"><?php echo e((isset($data->peMasterData->currencyCode1)) ? $data->peMasterData->currencyCode1 : ''); ?></td>
            </tr>
            <tr>
                <td width="3%">2</td>
                <td width="10%"><?php echo e((isset($data->peMasterData->employeeBankCode2)) ? $data->peMasterData->employeeBankCode2 : ''); ?></td>
                <td width="10%"><?php echo e((isset($data->peMasterData->bankAccountNo2)) ? $data->peMasterData->bankAccountNo2 : ''); ?></td>
                <td width="10%"><?php echo e((isset($data->peMasterData->beneficiaryName2)) ? $data->peMasterData->beneficiaryName2 : ''); ?></td>
                <td width="10%"><?php echo e((isset($data->peMasterData->currencyCode2)) ? $data->peMasterData->currencyCode2 : ''); ?></td>
            </tr>
            <tr>
                <td width="3%">3</td>
                <td width="10%"><?php echo e((isset($data->peMasterData->employeeBankCode3)) ? $data->peMasterData->employeeBankCode3 : ''); ?></td>
                <td width="10%"><?php echo e((isset($data->peMasterData->bankAccountNo3)) ? $data->peMasterData->bankAccountNo3 : ''); ?></td>
                <td width="10%"><?php echo e((isset($data->peMasterData->beneficiaryName3)) ? $data->peMasterData->beneficiaryName3 : ''); ?></td>
                <td width="10%"><?php echo e((isset($data->peMasterData->currencyCode3)) ? $data->peMasterData->currencyCode3 : ''); ?></td>
            </tr>
        </tbody>
    </table>
    &nbsp;
    <h4><u>Address Data</u></h4>
    <h4 style="margin-left:2%">Home</h4>
    <table style="width:100%" class="table table-bordered table-hover responsive table_detail">
        <tbody>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">Address</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%"><?php echo e((isset($data->peMasterInfoData->homeAddress)) ? $data->peMasterInfoData->homeAddress : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">City</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%"><?php echo e((isset($data->peMasterInfoData->homeCity)) ? $data->peMasterInfoData->homeCity : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">Phone</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%"><?php echo e((isset($data->peMasterInfoData->homePhone)) ? $data->peMasterInfoData->homePhone : ''); ?></td>
            </tr>
        </tbody>
    </table>
    <h4 style="margin-left:2%">Other</h4>
    <table style="width:100%" class="table table-bordered table-hover responsive table_detail">
        <tbody>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">Address</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%"><?php echo e((isset($data->peMasterInfoData->otherAddress)) ? $data->peMasterInfoData->otherAddress : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">City</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%"><?php echo e((isset($data->peMasterInfoData->otherCity)) ? $data->peMasterInfoData->otherCity : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">Phone</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%"><?php echo e((isset($data->peMasterInfoData->otherPhone)) ? $data->peMasterInfoData->otherPhone : ''); ?></td>
            </tr>
        </tbody>
    </table>
    <h4 style="margin-left:2%">Work</h4>
    <table style="width:100%" class="table table-bordered table-hover responsive table_detail">
        <tbody>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">Address</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%"><?php echo e((isset($data->peMasterInfoData->workAddress)) ? $data->peMasterInfoData->workAddress : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">City</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%"><?php echo e((isset($data->peMasterInfoData->workCity)) ? $data->peMasterInfoData->workCity : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">Phone</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%"><?php echo e((isset($data->peMasterInfoData->workPhone)) ? $data->peMasterInfoData->workPhone : ''); ?></td>
            </tr>
        </tbody>
    </table>
    <h4 style="margin-left:2%">Correspondent</h4>
    <table style="width:100%" class="table table-bordered table-hover responsive table_detail">
        <tbody>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">Address</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%"><?php echo e((isset($data->peMasterInfoData->correspondenceAddress)) ? $data->peMasterInfoData->correspondenceAddress : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">City</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%"><?php echo e((isset($data->peMasterInfoData->correspondenceCity)) ? $data->peMasterInfoData->correspondenceCity : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">Phone</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%"><?php echo e((isset($data->peMasterInfoData->correspondencePhone)) ? $data->peMasterInfoData->correspondencePhone : ''); ?></td>
            </tr>
        </tbody>
    </table>

    <h4><u>Emergency Data</u></h4>
    <table style="width:100%" class="table table-bordered table-hover responsive table_detail">
        <tbody>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">Person Name</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%"><?php echo e((isset($data->peMasterInfoData->personName)) ? $data->peMasterInfoData->personName : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">Address</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%"><?php echo e((isset($data->peMasterInfoData->address)) ? $data->peMasterInfoData->address : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">Relation</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%"><?php echo e((isset($data->peMasterInfoData->relation)) ? $data->peMasterInfoData->relation : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">Phone No</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%"><?php echo e((isset($data->peMasterInfoData->phoneNo)) ? $data->peMasterInfoData->phoneNo : ''); ?></td>
            </tr>
        </tbody>
    </table>

    <h4><u>Occupational Data</u></h4>
    <table style="width:100%" class="table table-bordered table-hover responsive table_detail">
        <tbody>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">Employee Status</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e((isset($data->peMasterData->employeeStatus)) ? $data->peMasterData->employeeStatus : ''); ?></td>
                <td style="text-align: left" width="20%">Probation Period End</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e(isset($data->peMasterData->probationEndDate) ? date('d-M-Y', strtotime($data->peMasterData->probationEndDate)) : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">Join Date</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e(isset($data->peMasterData->joinDate) ? date('d-M-Y', strtotime($data->peMasterData->joinDate)) : ''); ?></td>
                <td style="text-align: left" width="20%">Contract Date</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e((isset($data->peMasterData->contractDate)) ? $data->peMasterData->contractDate : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">Expatriat No</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e((isset($data->peMasterData->expatLicenseNo)) ? $data->peMasterData->expatLicenseNo : ''); ?></td>
                <td style="text-align: left" width="20%">Expatriat License Date</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e((isset($data->peMasterData->expatLicenseDate)) ? $data->peMasterData->expatLicenseDate : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">Tax Registered No</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e((isset($data->peMasterData->taxRegisteredNo)) ? $data->peMasterData->taxRegisteredNo : ''); ?></td>
                <td style="text-align: left" width="20%">Tax Registered Place</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e((isset($data->peMasterData->taxRegisteredPlaceRegistration)) ? $data->peMasterData->taxRegisteredPlaceRegistration : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">BPJS Kesehatan No</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e((isset($data->peMasterData->bpjsKesehatanNo)) ? $data->peMasterData->bpjsKesehatanNo : ''); ?></td>
                <td style="text-align: left" width="20%">BPJS Kesehatan Join Date</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e(isset($data->peMasterData->bpjsKesehatanJoinDate) ? date('d-M-Y', strtotime($data->peMasterData->bpjsKesehatanJoinDate)) : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%"></td>
                <td style="text-align: left" width="3%"></td>
                <td style="text-align: left" width="20%"></td>
                <td style="text-align: left" width="20%">BPJS Kesehatan Period Start</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e(isset($data->peMasterData->bpjsKesehatanPeriodStart) ? date('d-M-Y', strtotime($data->peMasterData->bpjsKesehatanPeriodStart)) : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">BPJS TenagaKerja No</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e((isset($data->peMasterData->bpjsTenagaKerjaNo)) ? $data->peMasterData->bpjsTenagaKerjaNo : ''); ?></td>
                <td style="text-align: left" width="20%">BPJS TenagaKerja Join Date</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e(isset($data->peMasterData->bpjsTenagaKerjaJoinDate) ? date('d-M-Y', strtotime($data->peMasterData->bpjsTenagaKerjaJoinDate)) : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%"></td>
                <td style="text-align: left" width="3%"></td>
                <td style="text-align: left" width="20%"></td>
                <td style="text-align: left" width="20%">BPJS TenagaKerja Period Start</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e(isset($data->peMasterData->bpjsTenagaKerjaPeriodStart) ? date('d-M-Y', strtotime($data->peMasterData->bpjsTenagaKerjaPeriodStart)) : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">Terminate Date</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e(isset($data->peMasterData->terminateDate) ? date('d-M-Y', strtotime($data->peMasterData->terminateDate)) : ''); ?></td>
                <td style="text-align: left" width="20%">Terminate Reason</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e((isset($data->peMasterData->terminateReason)) ? $data->peMasterData->terminateReason : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">Position</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e((isset($data->peMasterData->position)) ? $data->peMasterData->position : ''); ?></td>
                <td style="text-align: left" width="20%">Starting Date</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e(isset($data->peMasterData->startingDate) ? date('d-M-Y', strtotime($data->peMasterData->startingDate)) : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">Ranking</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e((isset($data->peMasterData->ranking)) ? $data->peMasterData->ranking : ''); ?></td>
                <td style="text-align: left" width="20%">Location</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e((isset($data->peMasterData->location)) ? $data->peMasterData->location : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">Grade</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e((isset($data->peMasterData->grade)) ? $data->peMasterData->grade : ''); ?></td>
                <td style="text-align: left" width="20%">Group</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e((isset($data->peMasterData->group)) ? $data->peMasterData->group : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">Cost Center</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e((isset($data->peMasterData->costCenter)) ? $data->peMasterData->costCenter : ''); ?></td>
                <td style="text-align: left" width="20%">Nature of Work</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e((isset($data->peMasterData->natureOfWork)) ? $data->peMasterData->natureOfWork : ''); ?></td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">Job Description</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"><?php echo e((isset($data->peMasterInfoData->jobDesc)) ? $data->peMasterInfoData->jobDesc : ''); ?></td>
                <td style="text-align: left" width="20%"></td>
                <td style="text-align: left" width="3%"></td>
                <td style="text-align: left" width="20%"></td>
            </tr>
        </tbody>
    </table>
    &nbsp;
    <table style="width:50%;" class="table table-bordered table-hover responsive table_detail_data">
        <tbody>
            <tr>
                <th width="3%">No.</th>
                <th width="10%">Level</th>
                <th width="10%">Level Name</th>
            </tr>
            <?php if($data->levelData): ?>
            <?php $__currentLoopData = $data->levelData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width="3%"><?php echo e($key+1); ?></td>
                <td width="10%"><?php echo e($value->levelDescription); ?></td>
                <td width="10%"><?php echo e($value->levelName); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
                <th width="3%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h4>Family</h4>
    <table style="width:100%;" class="table table-bordered table-hover responsive table_detail_data">
        <tbody>
            <tr>
                <th width="3%">No.</th>
                <th width="10%">Name</th>
                <th width="10%">Relation</th>
                <th width="10%">Birth Date</th>
                <th width="10%">Gender</th>
                <th width="10%">Blood Type</th>
                <th width="10%">Occupation</th>
                <th width="10%">Family Card No</th>
                <th width="10%">Medical</th>
                <th width="10%">Tax</th>
            </tr>
            <?php if($data->familyData): ?>
            <?php $__currentLoopData = $data->familyData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width="3%"><?php echo e($key+1); ?></td>
                <td width="10%"><?php echo e($value->familyName); ?></td>
                <td width="10%"><?php echo e($value->relation); ?></td>
                <td width="10%"><?php echo e(isset($value->birthDate) ? date('d-M-Y', strtotime($value->birthDate)) : ''); ?></td>
                <td width="10%"><?php echo e($value->gender); ?></td>
                <td width="10%"><?php echo e($value->bloodType); ?></td>
                <td width="10%"><?php echo e($value->occupation); ?></td>
                <td width="10%"><?php echo e($value->familyCardNumber); ?></td>
                <td width="10%"><?php echo e($value->medical); ?></td>
                <td width="10%"><?php echo e($value->tax); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
                <th width="3%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h4>Formal Education</h4>
    <table style="width:100%;" class="table table-bordered table-hover responsive table_detail_data">
        <tbody>
            <tr>
                <th width="3%">No.</th>
                <th width="10%">Institution Name</th>
                <th width="10%">Education</th>
                <th width="10%">Major</th>
                <th width="10%">Status</th>
                <th width="10%">Year</th>
                <th width="10%">Title</th>
                <th width="10%">City</th>
            </tr>
            <?php if($data->educationData): ?>
            <?php $__currentLoopData = $data->educationData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width="3%"><?php echo e($key+1); ?></td>
                <td width="10%"><?php echo e($value->institution); ?></td>
                <td width="10%"><?php echo e($value->education); ?></td>
                <td width="10%"><?php echo e($value->major); ?></td>
                <td width="10%"><?php echo e($value->educationStatusCode); ?></td>
                <td width="10%"><?php echo e(isset($value->graduateYear) ? date('d-M-Y', strtotime($value->graduateYear)) : ''); ?></td>
                <td width="10%"><?php echo e($value->titleCode); ?></td>
                <td width="10%"><?php echo e($value->cityName); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
                <th width="3%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h4>Language</h4>
    <table style="width:100%;" class="table table-bordered table-hover responsive table_detail_data">
        <tbody>
            <tr>
                <th width="3%">No.</th>
                <th width="10%">Language</th>
                <th width="10%">Read</th>
                <th width="10%">Speak</th>
                <th width="10%">Write</th>
            </tr>
            <?php if($data->languageData): ?>
            <?php $__currentLoopData = $data->languageData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width="3%"><?php echo e($key+1); ?></td>
                <td width="10%"><?php echo e($value->language); ?></td>
                <td width="10%"><?php echo e($value->read); ?></td>
                <td width="10%"><?php echo e($value->speak); ?></td>
                <td width="10%"><?php echo e($value->write); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
                <th width="3%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h4>Training Records</h4>
    <table style="width:100%;" class="table table-bordered table-hover responsive table_detail_data">
        <tbody>
            <tr>
                <th width="3%">No.</th>
                <th width="10%">Training Name</th>
                <th width="10%">Organizer</th>
                <th width="10%">Start Date</th>
                <th width="10%">End Date</th>
                <th width="10%">Certificate Name</th>
            </tr>
            <?php if($data->trainingData): ?>
            <?php $__currentLoopData = $data->trainingData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width="3%"><?php echo e($key+1); ?></td>
                <td width="10%"><?php echo e($value->trainingName); ?></td>
                <td width="10%"><?php echo e($value->organizer); ?></td>
                <td width="10%"><?php echo e(isset($value->startDate) ? date('d-M-Y', strtotime($value->startDate)) : ''); ?></td>
                <td width="10%"><?php echo e(isset($value->endDate) ? date('d-M-Y', strtotime($value->endDate)) : ''); ?></td>
                <td width="10%"><?php echo e($value->certificateName); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
                <th width="3%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h4>Work Experience</h4>
    <table style="width:100%;" class="table table-bordered table-hover responsive table_detail_data">
        <tbody>
            <tr>
                <th width="10%">Company Name</th>
                <th width="10%">Line of Business</th>
                <th width="10%">Nature of Work</th>
                <th width="10%">Position</th>
                <th width="10%">Ranking</th>
                <th width="10%">Period From</th>
                <th width="10%">Period To</th>
            </tr>
            <?php if($data->workExperienceData): ?>
            <?php $__currentLoopData = $data->workExperienceData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width="10%"><?php echo e($value->companyName); ?></td>
                <td width="10%"><?php echo e($value->lineOfBusiness); ?></td>
                <td width="10%"><?php echo e($value->natureOfWork); ?></td>
                <td width="10%"><?php echo e($value->positionName); ?></td>
                <td width="10%"><?php echo e($value->rankingName); ?></td>
                <td width="10%"><?php echo e(isset($value->joinDate) ? date('d-M-Y', strtotime($value->joinDate)) : ''); ?></td>
                <td width="10%"><?php echo e(isset($value->terminateDate) ? date('d-M-Y', strtotime($value->terminateDate)) : ''); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h4>Historical Jobs</h4>
    <table style="width:100%;" class="table table-bordered table-hover responsive table_detail_data">
        <tbody>
            <tr>
                <th width="10%">Period From</th>
                <th width="10%">Period To</th>
                <th width="10%">Decree No</th>
                <th width="10%">Decree Date</th>
                <th width="10%">Work Location</th>
                <th width="10%">Position</th>
                <th width="10%">Ranking</th>
                <th width="10%">Nature of Work</th>
                <th width="10%">Grade</th>
                <th width="10%">Remarks</th>
                <?php if(isset($data->historyData->level)): ?>
                <?php $__currentLoopData = $data->historyData->level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th width="10%">$key</th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tr>
            <?php if($data->historyData): ?>
            <?php $__currentLoopData = $data->historyData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width="10%"><?php echo e(isset($value->startDate) ? date('d-M-Y', strtotime($value->startDate)) : ''); ?></td>
                <td width="10%"><?php echo e(isset($value->endDate) ? date('d-M-Y', strtotime($value->endDate)) : ''); ?></td>
                <td width="10%"><?php echo e($value->decreeNo); ?></td>
                <td width="10%"><?php echo e(isset($value->decreeDate) ? date('d-M-Y', strtotime($value->decreeDate)) : ''); ?></td>
                <td width="10%"><?php echo e($value->locationName); ?></td>
                <td width="10%"><?php echo e($value->positionName); ?></td>
                <td width="10%"><?php echo e($value->rankingName); ?></td>
                <td width="10%"><?php echo e($value->workNatureName); ?></td>
                <td width="10%"><?php echo e($value->gradeName); ?></td>
                <td width="10%"><?php echo e($value->remarks); ?></td>
                <?php $__currentLoopData = $value->level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td width="10%"><?php echo e($value2); ?></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h4>Project Experience</h4>
    <table style="width:100%;" class="table table-bordered table-hover responsive table_detail_data">
        <tbody>
            <tr>
                <th width="3%">No.</th>
                <th width="10%">Client Name</th>
                <th width="10%">Location</th>
                <th width="10%">Position</th>
                <th width="10%">Description</th>
                <th width="10%">Start Date</th>
                <th width="10%">End Date</th>
            </tr>
            <?php if($data->projectExperienceData): ?>
            <?php $__currentLoopData = $data->projectExperienceData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width="3%"><?php echo e($key+1); ?></td>
                <td width="10%"><?php echo e($value->client); ?></td>
                <td width="10%"><?php echo e($value->location); ?></td>
                <td width="10%"><?php echo e($value->position); ?></td>
                <td width="10%"><?php echo e($value->description); ?></td>
                <td width="10%"><?php echo e(isset($value->startDate) ? date('d-M-Y', strtotime($value->startDate)) : ''); ?></td>
                <td width="10%"><?php echo e(isset($value->endDate) ? date('d-M-Y', strtotime($value->endDate)) : ''); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
                <th width="3%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h4>Organization</h4>
    <table style="width:100%;" class="table table-bordered table-hover responsive table_detail_data">
        <tbody>
            <tr>
                <th width="3%">No.</th>
                <th width="10%">Organization Name</th>
                <th width="10%">Position</th>
                <th width="10%">Start Date</th>
                <th width="10%">End Date</th>
            </tr>
            <?php if($data->organizationData): ?>
            <?php $__currentLoopData = $data->organizationData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width="3%"><?php echo e($key+1); ?></td>
                <td width="10%"><?php echo e($value->organizationName); ?></td>
                <td width="10%"><?php echo e($value->position); ?></td>
                <td width="10%"><?php echo e(isset($value->startDate) ? date('d-M-Y', strtotime($value->startDate)) : ''); ?></td>
                <td width="10%"><?php echo e(isset($value->endDate) ? date('d-M-Y', strtotime($value->endDate)) : ''); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
                <th width="3%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h4>Award</h4>
    <table style="width:100%;" class="table table-bordered table-hover responsive table_detail_data">
        <tbody>
            <tr>
                <th width="3%">No.</th>
                <th width="10%">Award Type</th>
                <th width="10%">Award Name</th>
                <th width="10%">Date</th>
                <th width="10%">Event</th>
            </tr>
            <?php if($data->awardData): ?>
            <?php $__currentLoopData = $data->awardData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width="3%"><?php echo e($key+1); ?></td>
                <td width="10%"><?php echo e($value->awardType); ?></td>
                <td width="10%"><?php echo e($value->awardName); ?></td>
                <td width="10%"><?php echo e(isset($value->awardDate) ? date('d-M-Y', strtotime($value->awardDate)) : ''); ?></td>
                <td width="10%"><?php echo e($value->eventName); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
                <th width="3%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h4>Sanction</h4>
    <table style="width:100%;" class="table table-bordered table-hover responsive table_detail_data">
        <tbody>
            <tr>
                <th width="3%">No.</th>
                <th width="10%">Sanction Name</th>
                <th width="10%">Start Date</th>
                <th width="10%">End Date</th>
                <th width="10%">Decree No</th>
                <th width="10%">Decree Date</th>
                <th width="10%">Remarks</th>
            </tr>
            <?php if($data->sanctionData): ?>
            <?php $__currentLoopData = $data->sanctionData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width="3%"><?php echo e($key+1); ?></td>
                <td width="10%"><?php echo e($value->sanctionName); ?></td>
                <td width="10%"><?php echo e(isset($value->startDate) ? date('d-M-Y', strtotime($value->startDate)) : ''); ?></td>
                <td width="10%"><?php echo e(isset($value->endDate) ? date('d-M-Y', strtotime($value->endDate)) : ''); ?></td>
                <td width="10%"><?php echo e($value->decreeNo); ?></td>
                <td width="10%"><?php echo e(isset($value->decreeDate) ? date('d-M-Y', strtotime($value->decreeDate)) : ''); ?></td>
                <td width="10%"><?php echo e($value->sanctionRemarks); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
                <th width="3%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="page_break"></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <script type="text/php">
    if (isset($pdf)) {
        $pdf->page_script('
            $page = sprintf(_("Page %d/%d"),  $PAGE_NUM, $PAGE_COUNT);
            // Uncomment the following line if you use a Laravel-based i18n
            //$text = __("Page :pageNum/:pageCount", ["pageNum" => $PAGE_NUM, "pageCount" => $PAGE_COUNT]);
            $font = null;
            $size = 9;
            $color = array(0,0,0);
            $word_space = 0.5;  //  default
            $char_space = 0.5;  //  default
            $angle = 0.5;   //  default

            // Compute text width to center correctly
            $textWidth = $fontMetrics->getTextWidth($page, $font, $size);

            $x = ($pdf->get_width() - $textWidth) / 2;
            $y = $pdf->get_height() - 45;

            $pdf->text($x, $y, $page, $font, $size, $color, $word_space, $char_space, $angle);
        '); // End of page_script
    }
    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/personel/personel_export_employee_card.blade.php ENDPATH**/ ?>