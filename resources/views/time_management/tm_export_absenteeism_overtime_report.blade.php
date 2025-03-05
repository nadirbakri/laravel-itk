<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_absenteeism_overtime_report.judul') }}</title>
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
    <table>
        <thead>
            <tr>
                <th style="font-weight: 700; text-align: center;">REPORT OVERTIME COMPENSATION</th>
            </tr>
        </thead>
    </table>
	<table style="width: 100%; font-size: 14px;" class="table table-bordered">
		<thead>
			<tr>
				<th style="font-weight: 700; border: 1px solid #000;">Company Code</th>
                <th style="font-weight: 700; border: 1px solid #000;">Status</th>
                <th style="font-weight: 700; border: 1px solid #000;">Ticket No</th>
                <th style="font-weight: 700; border: 1px solid #000;">Full Name</th>
                <th style="font-weight: 700; border: 1px solid #000;">Employee No</th>
                <th style="font-weight: 700; border: 1px solid #000;">Project Name</th>
                <th style="font-weight: 700; border: 1px solid #000;">Day</th>
                <th style="font-weight: 700; border: 1px solid #000;">Overtime Date</th>
                <th style="font-weight: 700; border: 1px solid #000;">Overtime Hour From</th>
                <th style="font-weight: 700; border: 1px solid #000;">Overtime Hour To</th>
                <th style="font-weight: 700; border: 1px solid #000;">Hour Ovt</th>
                <th style="font-weight: 700; border: 1px solid #000;">Hour Ovt Cvt</th>
                <th style="font-weight: 700; border: 1px solid #000;">Overtime Remarks</th>
                <th style="font-weight: 700; border: 1px solid #000;">Customer Name</th>
                <th style="font-weight: 700; border: 1px solid #000;">Overtime Compensation</th>
			</tr>
		</thead>
        @if(!empty($data))
		<tbody>
			@foreach($data as $value)
			<tr>
                <td style="border: 1px solid #000;">{{ $value->companyCode }}</td>
				<td style="border: 1px solid #000;">{{ $value->status }}</td>
                <td style="border: 1px solid #000;">{{ $value->ticketNo }}</td>
                <td style="border: 1px solid #000;">{{ $value->fullName }}</td>
                <td style="border: 1px solid #000;">{{ $value->employeeNo }}</td>
                <td style="border: 1px solid #000;">{{ $value->projectName }}</td>
                <td style="border: 1px solid #000;">{{ $value->day }}</td>
                <td style="border: 1px solid #000;">{{ date('Y-m-d', strtotime($value->overtimeDate)) }}</td>
                <td style="border: 1px solid #000;">{{ date('H:i:s', strtotime($value->overtimeHourFrom)) }}</td>
                <td style="border: 1px solid #000;">{{ date('H:i:s', strtotime($value->overtimeHourTo)) }}</td>
                <td style="border: 1px solid #000;">{{ date('H:i:s', strtotime($value->hourOvt)) }}</td>
                <td style="border: 1px solid #000;">{{ $value->hourOvtCvt }}</td>
                <td style="border: 1px solid #000;">{{ $value->overtimeRemarks }}</td>
                <td style="border: 1px solid #000;">{{ $value->customerName }}</td>
                <td style="border: 1px solid #000;">{{ $value->overtimeCompensation }}</td>
			</tr>
			@endforeach
		</tbody>
        @endif
	</table>
</body>
</html>