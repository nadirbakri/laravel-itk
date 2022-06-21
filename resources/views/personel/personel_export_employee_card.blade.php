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
                <td style="text-align: left;" width="40%">{{ $data[0]->employeeNo }}</td>
            </tr>
            <tr>
                <td style="text-align: left; font-weight:bold;">Employee Name</td>
                <td width="3%">:</td>
                <td style="text-align: left;">{{ $data[0]->fullName }}</td>
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
                <td style="text-align: left;" width="25%">{{ $data[0]->gender }}</td>
                <td style="text-align: left;" width="25%">Blood Type</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data[0]->peMasterInfo->bloodType }}</td>
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Birth Place</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data[0]->birthPlace }}</td>
                <td style="text-align: left;" width="25%">Birth Date</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data[0]->birthDate }}</td>
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Nationality</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data[0]->nationalityCode }}</td>
                <td style="text-align: left;" width="25%">Marital Status</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data[0]->maritalStatus }}</td>
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Religion</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data[0]->religionCode }}</td>
                <td style="text-align: left;" width="25%">ID Number</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data[0]->peMasterInfo->idNo }}</td>
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Passport No</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data[0]->peMasterInfo->passportNo }}</td>
                <td style="text-align: left;" width="25%">Passport Expiry Date</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data[0]->peMasterInfo->passportExpiryDate }}</td>
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Driving License Car</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data[0]->peMasterInfo->drivingLicenseMobilType }} {{ $data[0]->peMasterInfo->drivingLicenseMobilNo }}</td>
                <td style="text-align: left;" width="25%">Driving License Car Expiry Date</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data[0]->peMasterInfo->drivingLicenseMobilNoExpiryDate }}</td>
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Driving License Bike</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data[0]->peMasterInfo->drivingLicenseMotorNo }}</td>
                <td style="text-align: left;" width="25%">Driving License Bike Expiry Date</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data[0]->peMasterInfo->drivingLicenseMotorNoExpiryDate }}</td>
            </tr>
            <tr>
                <td style="text-align: left;" width="25%">Phone No</td>
                <td width="3%">:</td>
                <td style="text-align: left;" width="25%">{{ $data[0]->peMasterInfo->personalHandphone }}</td>
                <td style="text-align: left;" width="25%"></td>
                <td width="3%"></td>
                <td style="text-align: left;" width="25%"></td>
            </tr>
        </tbody>
    </table>
    &nbsp;
    <table style="width:100%;" class="table table-bordered table-hover responsive table_detail_data">
        <thead>
            <tr>
                <th style="text-align: left; border:0"><u>Bank Data</u></th>
            </tr>
        </thead>
        &nbsp;
        <tbody>
            <tr>
                <th width="10%">No.</th>
                <th width="10%">Bank Name</th>
                <th width="10%">Account No</th>
                <th width="10%">Beneficiary Name</th>
                <th width="10%">Currency</th>
            </tr>
            <tr>
                <td width="10%">1</td>
                <td width="10%">{{ $data[0]->employeeBankCode1 }}</td>
                <td width="10%">{{ $data[0]->bankAccountNo1 }}</td>
                <td width="10%">{{ $data[0]->beneficiaryName1 }}</td>
                <td width="10%">{{ $data[0]->currencyCode1 }}</td>
            </tr>
            <tr>
                <td width="10%">2</td>
                <td width="10%">{{ $data[0]->employeeBankCode2 }}</td>
                <td width="10%">{{ $data[0]->bankAccountNo2 }}</td>
                <td width="10%">{{ $data[0]->beneficiaryName2 }}</td>
                <td width="10%">{{ $data[0]->currencyCode2 }}</td>
            </tr>
            <tr>
                <td width="10%">3</td>
                <td width="10%">{{ $data[0]->employeeBankCode3 }}</td>
                <td width="10%">{{ $data[0]->bankAccountNo3 }}</td>
                <td width="10%">{{ $data[0]->beneficiaryName3 }}</td>
                <td width="10%">{{ $data[0]->currencyCode3 }}</td>
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