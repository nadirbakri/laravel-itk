<!DOCTYPE html>
<html>
<head>
	<title>{{ __('payroll_dumtk.judul') }}</title>
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
			margin-left: 30px;
			margin-right: 30px;
			margin-bottom: 25px;
			margin-top: 25px;
		}
		.table_detail td{
			border:1px solid #000;
			text-align:center;
		}
		.table_detail th{
			border:1px solid #000;
            padding:4px;
            background-color:#97d7f7;
		}
		.table_detail{
			border-collapse:collapse;
		}

		.page_break { page-break-before: always; }
	</style>
</head>
<body>
    @foreach($data as $key => $value)
    <p style="text-align:left">{{ $value[0]->companyName }}</p>
    <p style="text-align:left">{{ $value[0]->address }}</p>
    <h3 style="text-align:center">{{ __('payroll_dumtk.list') }}</h3>
    <h5 style="text-align:center">{{ __('payroll_dumtk.label_as_of_period') }}<span style="display: inline-block; margin-left: 60px;"></span>{{ $value[1]->asOfPeriod }}</h5>
	<table style="width:100%" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th rowspan="2">{{ __('payroll_dumtk.header_no') }}</th>
                <th>{{ __('payroll_dumtk.header_bpjs_no') }}</th>
                <th>{{ __('payroll_dumtk.header_employee_no') }}</th>
                <th>{{ __('payroll_dumtk.header_gender') }}</th>
                <th rowspan="2">{{ __('payroll_dumtk.header_january') }}</th>
                <th rowspan="2">{{ __('payroll_dumtk.header_february') }}</th>
                <th rowspan="2">{{ __('payroll_dumtk.header_march') }}</th>
                <th rowspan="2">{{ __('payroll_dumtk.header_april') }}</th>
                <th rowspan="2">{{ __('payroll_dumtk.header_may') }}</th>
                <th rowspan="2">{{ __('payroll_dumtk.header_june') }}</th>
                <th rowspan="2">{{ __('payroll_dumtk.header_july') }}</th>
                <th rowspan="2">{{ __('payroll_dumtk.header_august') }}</th>
                <th rowspan="2">{{ __('payroll_dumtk.header_september') }}</th>
                <th rowspan="2">{{ __('payroll_dumtk.header_october') }}</th>
                <th rowspan="2">{{ __('payroll_dumtk.header_november') }}</th>
                <th rowspan="2">{{ __('payroll_dumtk.header_december') }}</th>
            </tr>
            <tr>
                <th>{{ __('payroll_dumtk.header_bpjs_joining_date') }}</th>
                <th>{{ __('payroll_dumtk.header_full_name') }}</th>
                <th>{{ __('payroll_dumtk.header_birth_date') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($value[1]->employeeDetail as $dataTable)
                <td rowspan="2">{{ $key+1 }}</td>
                <td>{{ $dataTable->bpjsNo }}</td>
                <td>{{ $dataTable->employeeNo }}</td>
                <td>{{ $dataTable->gender }}</td>
                <td rowspan="2">{{ $dataTable->bulan->january }}</td>
                <td rowspan="2">{{ $dataTable->bulan->february }}</td>
                <td rowspan="2">{{ $dataTable->bulan->march }}</td>
                <td rowspan="2">{{ $dataTable->bulan->april }}</td>
                <td rowspan="2">{{ $dataTable->bulan->may }}</td>
                <td rowspan="2">{{ $dataTable->bulan->june }}</td>
                <td rowspan="2">{{ $dataTable->bulan->july }}</td>
                <td rowspan="2">{{ $dataTable->bulan->august }}</td>
                <td rowspan="2">{{ $dataTable->bulan->september }}</td>
                <td rowspan="2">{{ $dataTable->bulan->october }}</td>
                <td rowspan="2">{{ $dataTable->bulan->november }}</td>
                <td rowspan="2">{{ $dataTable->bulan->december }}</td>
                @endforeach
            </tr>
            <tr>
                <td>{{ $dataTable->bpjsJoiningDate }}</td>
                <td>{{ $dataTable->fullName }}</td>
                <td>{{ $dataTable->birthDate }}</td>
            </tr>
            <tr>
                <td colspan="16" style="background-color: yellow">{{ __('payroll_dumtk.grand_total') }} : {{ $value[1]->grandTotal }}</td>
            </tr>
        </tbody>
    </table>
    <br>
    @foreach($data2 as $key2 => $value2)
    <p>{{ __('payroll_dumtk.report_parameter') }}</p>
    <p>{{ __('payroll_dumtk.label_employee_no') }}<span style="display: inline-block; margin-left: 40px;"></span> : {{ $value2[0]->employeeNoFrom }} {{ __('payroll_dumtk.label_to') }} {{ $value2[0]->employeeNoTo }}</p>
    <p>{{ __('payroll_dumtk.total_printed') }} <span style="display: inline-block; margin-left: 40px;"></span> : {{ count($value2) }} Record{s}</p>
    @endforeach
    <hr/>
    <?php
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $dt->setTimestamp($timestamp);
        echo __('payroll_dumtk.date_now') . '<span style="display: inline-block; margin-left: 60px;"></span> {Server Date : ' . $dt->format('d/m/Y') . '}<span style="display: inline-block; margin-left: 40px;"></span>' . __('payroll_dumtk.hour_now') . '<span style="display: inline-block; margin-left: 40px;"></span> {Server Hour : ' . $dt->format('H:i:s A') . '}'
    ?>
    @endforeach

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
            $y = $pdf->get_height() - 35;

            $pdf->text($x, $y, $page, $font, $size, $color, $word_space, $char_space, $angle);
        '); // End of page_script
    }
    </script>
</body>
</html>