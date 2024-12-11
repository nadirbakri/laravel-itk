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
	<table style="width: 100%; font-size: 14px;" class="table table-bordered">
		<thead>
			<tr>
				<th style="font-weight: 300; text-align: center;">No</th>
				<th style="font-weight: 300; text-align: center;">Employee No</th>
				<th style="font-weight: 300; text-align: center;">Employee Name</th>
                <th style="font-weight: 300; text-align: center;">Status</th>
                <th style="font-weight: 300; text-align: center;">Ticket No</th>
                <th style="font-weight: 300; text-align: center;">Project Name</th>
                <th style="font-weight: 300; text-align: center;">Day</th>
                <th style="font-weight: 300; text-align: center;">Date</th>
                <th style="font-weight: 300; text-align: center;">Hour From</th>
                <th style="font-weight: 300; text-align: center;">Hour To</th>
                <th style="font-weight: 300; text-align: center;">Total Hour</th>
                <th style="font-weight: 300; text-align: center;">Total Hour Convert</th>
                <th style="font-weight: 300; text-align: center;">Remarks</th>
                <th style="font-weight: 300; text-align: center;">Customer Name</th>
                <th style="font-weight: 300; text-align: center;">Compensation</th>
                <th style="font-weight: 300; text-align: center;">Grand Total</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			@foreach($data as $value)
			    <tr>
                    <td rowspan="{{ count($value->overtimeReportDetail) }}" style="text-align: center; vertical-align: middle;">{{ $no++ }}</td>
                    <td rowspan="{{ count($value->overtimeReportDetail) }}" style="text-align: center; vertical-align: middle;">{{ $value->employeeNo }}</td>
                    @if(!empty($value->overtimeReportDetail))
                        <?php $firstDetail = $value->overtimeReportDetail[0]; ?>
                        <td rowspan="{{ count($value->overtimeReportDetail) }}" style="text-align: center; vertical-align: middle;">{{ $firstDetail->fullName }}</td>
                        <td style="text-align: left;">{{ $firstDetail->status }}</td>
                        <td style="text-align: left;">{{ $firstDetail->ticketNo }}</td>
                        <td style="text-align: left;">{{ $firstDetail->projectName }}</td>
                        <td style="text-align: left;">{{ $firstDetail->day }}</td>
                        <td style="text-align: left;">{{ date('Y-m-d', strtotime($firstDetail->overtimeDate)) }}</td>
                        <td style="text-align: left;">{{ date('H:i', strtotime($firstDetail->overtimeHourFrom)) }}</td>
                        <td style="text-align: left;">{{ date('H:i', strtotime($firstDetail->overtimeHourTo)) }}</td>
                        <td style="text-align: left;">{{ $firstDetail->hourOvt }}</td>
                        <td style="text-align: left;">{{ $firstDetail->hourOvtCvt }}</td>
                        <td style="text-align: left;">{{ $firstDetail->overtimeRemarks }}</td>
                        <td style="text-align: left;">{{ $firstDetail->customerName }}</td>
                        <td style="text-align: left;">{{ $firstDetail->overtimeCompensation }}</td>
                    @endif
                    <td rowspan="{{ count($value->overtimeReportDetail) }}" style="text-align: center; vertical-align: middle;">{{ $value->grandTotal }}</td>
                </tr>
                @foreach(array_slice($value->overtimeReportDetail, 1) as $detail)
                    <tr>
                        <td style="text-align: left;">{{ $detail->status }}</td>
                        <td style="text-align: left;">{{ $detail->ticketNo }}</td>
                        <td style="text-align: left;">{{ $detail->projectName }}</td>
                        <td style="text-align: left;">{{ $detail->day }}</td>
                        <td style="text-align: left;">{{ date('Y-m-d', strtotime($detail->overtimeDate)) }}</td>
                        <td style="text-align: left;">{{ date('H:i', strtotime($detail->overtimeHourFrom)) }}</td>
                        <td style="text-align: left;">{{ date('H:i', strtotime($detail->overtimeHourTo)) }}</td>
                        <td style="text-align: left;">{{ $detail->hourOvt }}</td>
                        <td style="text-align: left;">{{ $detail->hourOvtCvt }}</td>
                        <td style="text-align: left;">{{ $detail->overtimeRemarks }}</td>
                        <td style="text-align: left;">{{ $detail->customerName }}</td>
                        <td style="text-align: left;">{{ $detail->overtimeCompensation }}</td>
                    </tr>
                @endforeach
			@endforeach
		</tbody>
	</table>
</body>
</html>