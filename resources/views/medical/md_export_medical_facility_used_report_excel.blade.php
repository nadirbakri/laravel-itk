<!DOCTYPE html>
<html>
<head>
    <title>{{ __('md_medical_facility_used_report.judul') }}</title>
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
        .table_detail td{
            text-align:center;
			border:1px solid #000;
			text-align:center;
		}
		.table_detail thead tr th{
            text-align:center;
			border:1px solid #000;
            padding:4px;
            background-color:#97d7f7;
		}
		.table_detail{
			border-collapse:collapse;
		}
	</style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th colspan="16">{{ $data_company->companyName }}</th>
            </tr>
            <tr>
                <th colspan="16">{{ $data_company->address }}</th>
            </tr>
            <tr></tr>
            <tr>
                <th colspan="16" style="text-align:center; font-weight:bold;"><h3>Medical Facility Used {{  }}</h3></th>
            </tr>
            <tr>
                <th colspan="16" style="text-align:center; font-weight:bold;"><pre>{{ __('payroll_dumtk.label_as_of_period') }}       {{ $data[1]->asOfPeriod }}</pre></th>
            </tr>
            <tr></tr>
        </thead>
    </table>
    <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th rowspan="2" style="display:flex; text-align:center; align-items:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_dumtk.header_no') }}</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_dumtk.header_bpjs_no') }}</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_dumtk.header_employee_no') }}</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_dumtk.header_gender') }}</th>
                <th rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_dumtk.header_january') }}</th>
                <th rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_dumtk.header_february') }}</th>
                <th rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_dumtk.header_march') }}</th>
                <th rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_dumtk.header_april') }}</th>
                <th rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_dumtk.header_may') }}</th>
                <th rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_dumtk.header_june') }}</th>
                <th rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_dumtk.header_july') }}</th>
                <th rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_dumtk.header_august') }}</th>
                <th rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_dumtk.header_september') }}</th>
                <th rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_dumtk.header_october') }}</th>
                <th rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_dumtk.header_november') }}</th>
                <th rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_dumtk.header_december') }}</th>
            </tr>
            <tr>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_dumtk.header_bpjs_joining_date') }}</th>
                <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_dumtk.header_full_name') }}</th>
                <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ __('payroll_dumtk.header_birth_date') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data[1]->employeeDetail as $key => $dataTable)
            <tr>
                <td rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000;">{{ $key+1 }}</td>
                <td style="text-align:left; border:1px solid #000;">{{ $dataTable->bpjsNo }}</td>
                <td style="text-align:left; border:1px solid #000;">{{ $dataTable->employeeNo }}</td>
                <td style="text-align:left; border:1px solid #000;">{{ $dataTable->gender === 'M' ? 'Male' : ($dataTable->gender === 'F' ? 'Female' : '') }}</td>
                <td rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000;">{{ $dataTable->bulan->january }}</td>
                <td rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000;">{{ $dataTable->bulan->february }}</td>
                <td rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000;">{{ $dataTable->bulan->march }}</td>
                <td rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000;">{{ $dataTable->bulan->april }}</td>
                <td rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000;">{{ $dataTable->bulan->may }}</td>
                <td rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000;">{{ $dataTable->bulan->june }}</td>
                <td rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000;">{{ $dataTable->bulan->july }}</td>
                <td rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000;">{{ $dataTable->bulan->august }}</td>
                <td rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000;">{{ $dataTable->bulan->september }}</td>
                <td rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000;">{{ $dataTable->bulan->october }}</td>
                <td rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000;">{{ $dataTable->bulan->november }}</td>
                <td rowspan="2" style="text-align:center; vertical-align:middle; border:1px solid #000;">{{ $dataTable->bulan->december }}</td>
            </tr>
            <tr>
                <td style="text-align:left; border:1px solid #000;">{{ date('Y-m-d',strtotime($dataTable->bpjsJoiningDate)) }}</td>
                <td style="text-align:left; border:1px solid #000;">{{ $dataTable->fullName }}</td>
                <td style="text-align:left; border:1px solid #000;">{{ date('Y-m-d',strtotime($dataTable->birthDate)) }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="16" style="background-color: yellow; text-align:center; border:1px solid #000;">{{ __('payroll_dumtk.grand_total') }} : {{ $data[1]->grandTotal }}</td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="2" style="font-weight: bold;">{{ __('payroll_dumtk.report_parameter') }}</td>
            </tr>
            <tr>
                <td colspan="2">{{ __('payroll_dumtk.label_employee_no') }} : </td>
                <td>{{ $data2[0]->employeeNoFrom }} {{ __('payroll_dumtk.label_to') }} {{ $data2[0]->employeeNoTo }}</td>
            </tr>
            <tr>
                <td colspan="2">{{ __('payroll_dumtk.total_printed') }} : </td>
                <td>{{ count($data[1]->employeeDetail) }} Record{s}</td>
            </tr>
            <tr>
                <?php
                    $timestamp = time();
                    $dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
                    $dt->setTimestamp($timestamp);
                    echo '<td colspan="2" style="border-top: 2px solid #000">' . __('payroll_dumtk.date_now') . ' :' .'</td>';
                    echo '<td style="border-top: 2px solid #000">' . 'Server Date : ' . $dt->format('d/m/Y') .'</td>';
                    echo '<td style="border-top: 2px solid #000"></td>';
                    echo '<td colspan="2" style="border-top: 2px solid #000">' . __('payroll_dumtk.hour_now') . ' :' .'</td>';
                    echo '<td style="border-top: 2px solid #000">' . 'Server Hour : ' . $dt->format('H:i:s A') .'</td>';
                ?>
            </tr>
        </tbody>
    </table>
</body>
</html>