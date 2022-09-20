<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel_employee_card.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">
		* { box-sizing: border-box; }
		body{
            margin: 0;
            padding: 0;
			margin-left: 10px;
			margin-right: 10px;
			margin-bottom: 25px;
			margin-top: 25px;
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

        /* @page { margin-bottom: 150px; size: auto; } */
        /* header { position: fixed; left: 0px; top: -90px; right: 0px; height: 150px; text-align: center; } */
        /* footer { position: absolute; left: 25px; bottom: -85px; right: 0px; height: 150px; }
        table { page-break-inside:auto }
        tr    { page-break-inside:avoid; page-break-after:auto; margin: 4px 0 4px 0; }
        td    { page-break-inside:avoid; page-break-after:auto }
        thead { display:table-header-group } */
	</style>
</head>
<body>
    <h3 style="text-align:center;">{{ __('personel_employee_card.report') }}</h3>
    &nbsp;
	<table style="width:100%;" class="table table-bordered table-hover responsive table_detail">
        <tbody>
            <tr>
                <td rowspan="4" width="30%">Photo</td>
                <td style="text-align: left; font-weight:bold;" width="30%">Employee No</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="40%">{{ $data->peMasterData->employeeNo }}</td>
            </tr>
            <tr>
                <td style="text-align: left; font-weight:bold;">Employee Name</td>
                <td width="3%">:</td>
                <td style="text-align: left;">{{ $data->peMasterData->fullName }}</td>
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
                <td style="text-align: left;" width="25%">{{ $data->peMasterData->gender }}</td>
                <td style="text-align: left;" width="25%">Blood Type</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data->peMasterData->bloodType }}</td>
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Birth Place</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data->peMasterData->birthPlace }}</td>
                <td style="text-align: left;" width="25%">Birth Date</td>
                <td width="3%">:</td>
                {{-- <td style="text-align: left;" width="25%">{{ isset($data->birthDate) ? date('d-M-Y', strtotime($data->birthDate)) : '' }}</td> --}}
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Nationality</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data->peMasterData->nationality }}</td>
                <td style="text-align: left;" width="25%">Marital Status</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data->peMasterData->maritalStatus }}</td>
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Religion</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data->peMasterData->religion }}</td>
                <td style="text-align: left;" width="25%">ID Number</td>
                <td width="3%">:</td>
                {{-- <td style="text-align: left;" width="25%">{{ $data->peMasterInfo->idNo }}</td> --}}
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Passport No</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data->peMasterInfo->passportNo }}</td>
                <td style="text-align: left;" width="25%">Passport Expiry Date</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ isset($data->peMasterInfo->passportExpiryDate) ? date('d-M-Y', strtotime($data->peMasterInfo->passportExpiryDate)) : '' }}</td>
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Driving License Car</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ isset($data->peMasterInfo->drivingLicenseMobilType) ? date('d-M-Y', strtotime($data->peMasterInfo->drivingLicenseMobilType)) : '' }} {{ $data->peMasterInfo->drivingLicenseMobilNo }}</td>
                <td style="text-align: left;" width="25%">Driving License Car Expiry Date</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ isset($data->peMasterInfo->drivingLicenseMobilNoExpiryDate) ? date('d-M-Y', strtotime($data->peMasterInfo->drivingLicenseMobilNoExpiryDate)) : '' }}</td>
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Driving License Bike</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data->peMasterInfo->drivingLicenseMotorNo }}</td>
                <td style="text-align: left;" width="25%">Driving License Bike Expiry Date</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ isset($data->peMasterInfo->drivingLicenseMotorNoExpiryDate) ? date('d-M-Y', strtotime($data->peMasterInfo->drivingLicenseMotorNoExpiryDate)) : '' }}</td>
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Phone No</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data->peMasterInfo->personalHandphone }}</td>
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
                <td width="10%">{{ $data->employeeBankCode1 }}</td>
                <td width="10%">{{ $data->bankAccountNo1 }}</td>
                <td width="10%">{{ $data->beneficiaryName1 }}</td>
                <td width="10%">{{ $data->currencyCode1 }}</td>
            </tr>
            <tr>
                <td width="3%">2</td>
                <td width="10%">{{ $data->employeeBankCode2 }}</td>
                <td width="10%">{{ $data->bankAccountNo2 }}</td>
                <td width="10%">{{ $data->beneficiaryName2 }}</td>
                <td width="10%">{{ $data->currencyCode2 }}</td>
            </tr>
            <tr>
                <td width="3%">3</td>
                <td width="10%">{{ $data->employeeBankCode3 }}</td>
                <td width="10%">{{ $data->bankAccountNo3 }}</td>
                <td width="10%">{{ $data->beneficiaryName3 }}</td>
                <td width="10%">{{ $data->currencyCode3 }}</td>
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
                <td style="text-align: left" width="85%">{{ $data->peMasterInfo->homeAddress }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">City</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%">{{ $data->peMasterInfo->homeCityCode }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">Phone</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%">{{ $data->peMasterInfo->homePhone }}</td>
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
                <td style="text-align: left" width="85%">{{ $data->peMasterInfo->otherAddress }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">City</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%">{{ $data->peMasterInfo->otherCityCode }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">Phone</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%">{{ $data->peMasterInfo->otherPhone }}</td>
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
                <td style="text-align: left" width="85%">{{ $data->peMasterInfo->workAddress }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">City</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%">{{ $data->peMasterInfo->workCityCode }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">Phone</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%">{{ $data->peMasterInfo->workPhone }}</td>
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
                <td style="text-align: left" width="85%">{{ $data->peMasterInfo->correspondenceAddress }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">City</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%">{{ $data->peMasterInfo->correspondenceCityCode }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">Phone</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%">{{ $data->peMasterInfo->correspondencePhone }}</td>
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
                <td style="text-align: left" width="85%">{{ $data->peMasterInfo->emergencyName }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">Address</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%">{{ $data->peMasterInfo->emergencyAddress }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">Relation</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%">{{ $data->peMasterInfo->emergencyRelation }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="5%"></td>
                <td style="text-align: left" width="20%">Phone No</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="85%">{{ $data->peMasterInfo->emergencyPhone }}</td>
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
                <td style="text-align: left" width="20%">{{ $data->employmentStatus }}</td>
                <td style="text-align: left" width="20%">Probation Period End</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ isset($data->probationEndDate) ? date('d-M-Y', strtotime($data->probationEndDate)) : '' }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">Join Date</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ isset($data->joinDate) ? date('d-M-Y', strtotime($data->joinDate)) : '' }}</td>
                <td style="text-align: left" width="20%">Contract Date</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="15%">{{ isset($data->contractStartDate) ? date('d-M-Y', strtotime($data->contractStartDate)) : '' }}</td>
                <td style="text-align: left" width="1%">To</td>
                <td style="text-align: left" width="15%">{{ isset($data->contractEndDate) ? date('d-M-Y', strtotime($data->contractEndDate)) : '' }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">Expatriat No</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ $data->expatLicenseNo }}</td>
                <td style="text-align: left" width="20%">Expatriat License Date</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="15%">{{ isset($data->expatLicenseStartDate) ? date('d-M-Y', strtotime($data->expatLicenseStartDate)) : '' }}</td>
                <td style="text-align: left" width="1%">To</td>
                <td style="text-align: left" width="15%">{{ isset($data->expatLicenseEndDate) ? date('d-M-Y', strtotime($data->expatLicenseEndDate)) : '' }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">Tax Registered No</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ $data->taxRegisteredNo }}</td>
                <td style="text-align: left" width="20%">Tax Registered Place</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ $data->taxRegisteredPlaceRegistration }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">BPJS Kesehatan No</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ $data->bpjsKesehatanNo }}</td>
                <td style="text-align: left" width="20%">BPJS Kesehatan Join Date</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ isset($data->bpjsKesehatanJoinDate) ? date('d-M-Y', strtotime($data->bpjsKesehatanJoinDate)) : '' }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%"></td>
                <td style="text-align: left" width="3%"></td>
                <td style="text-align: left" width="20%"></td>
                <td style="text-align: left" width="20%">BPJS Kesehatan Period Start</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ isset($data->bpjsKesehatanPeriodStartDate) ? date('d-M-Y', strtotime($data->bpjsKesehatanPeriodStartDate)) : '' }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">BPJS TenagaKerja No</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ $data->bpjsTenagaKerjaNo }}</td>
                <td style="text-align: left" width="20%">BPJS TenagaKerja Join Date</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ isset($data->bpjsTenagaKerjaJoinDate) ? date('d-M-Y', strtotime($data->bpjsTenagaKerjaJoinDate)) : '' }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%"></td>
                <td style="text-align: left" width="3%"></td>
                <td style="text-align: left" width="20%"></td>
                <td style="text-align: left" width="20%">BPJS TenagaKerja Period Start</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ isset($data->bpjsTenagaKerjaPeriodStartDate) ? date('d-M-Y', strtotime($data->bpjsTenagaKerjaPeriodStartDate)) : ''}}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">Terminate Date</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ isset($data->terminationDate) ? date('d-M-Y', strtotime($data->terminationDate)) : '' }}</td>
                <td style="text-align: left" width="20%">Terminate Reason</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ $data->terminationRemarks }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">Position</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ $data->positionCode }}</td>
                <td style="text-align: left" width="20%">Starting Date</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%"></td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">Ranking</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ $data->rankingCode }}</td>
                <td style="text-align: left" width="20%">Location</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ $data->locationCode }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">Grade</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ $data->gradeCode }}</td>
                <td style="text-align: left" width="20%">Group</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ $data->groupCode }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">Cost Center</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ $data->gradeCode }}</td>
                <td style="text-align: left" width="20%">Nature of Work</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ $data->workNatureCode }}</td>
            </tr>
            <tr>
                <td style="text-align: left" width="2%"></td>
                <td style="text-align: left" width="20%">Job Description</td>
                <td style="text-align: left" width="3%">:</td>
                <td style="text-align: left" width="20%">{{ $data->peMasterInfo->jobDesc }}</td>
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
            <tr>
                <td width="3%">1</td>
                <td width="10%"></td>
                <td width="10%"></td>
            </tr>
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
            @if ($data->peMasterFamily)
            @foreach ($data->peMasterFamily as $key => $dataFamily)
            <tr>
                <td width="3%">{{ $key+1 }}</td>
                <td width="10%">{{ $dataFamily->familyName }}</td>
                <td width="10%">{{ $dataFamily->relationCode }}</td>
                <td width="10%">{{ isset($dataFamily->birthDate) ? date('d-M-Y', strtotime($dataFamily->birthDate)) : ''}}</td>
                <td width="10%">{{ $dataFamily->gender }}</td>
                <td width="10%">{{ $dataFamily->bloodType }}</td>
                <td width="10%">{{ $dataFamily->occupation }}</td>
                <td width="10%">{{ $dataFamily->familyCardNumber }}</td>
                <td width="10%">{{ $dataFamily->flagMedical }}</td>
                <td width="10%">{{ $dataFamily->flagMedical }}</td>
            </tr>
            @endforeach
            @endif
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
            <tr>
                <td width="3%">1</td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
            </tr>
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
            <tr>
                <td width="3%">1</td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
            </tr>
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
            <tr>
                <td width="3%">1</td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
            </tr>
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
            <tr>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
            </tr>
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
                <th width="10%">Level 1 Name</th>
            </tr>
            <tr>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
            </tr>
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
            </tr>
            <tr>
                <td width="3%">1</td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
            </tr>
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
            <tr>
                <td width="3%">1</td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
            </tr>
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
            <tr>
                <td width="3%">1</td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
            </tr>
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
            <tr>
                <td width="3%">1</td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
            </tr>
        </tbody>
    </table>

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
</html>