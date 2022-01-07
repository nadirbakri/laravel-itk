<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_monthly_absenteeism_analysis.judul') }}</title>
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
				<th></th>
				<th></th>
				<th></th>
				<th colspan="2">Normal</th>
				<th colspan="2">Actual</th>
				<th colspan="4">Variance Actual With Normal</th>
				<th colspan="4">Overtime</th>
				<th colspan="2">Absent</th>
				<th colspan="2">Others</th>
				<th colspan="2">Leave Permit</th>
				<th colspan="2">Total Absent</th>
				<th colspan="2">Effective Working</th>
			</tr>
			<tr>
				<th>No</th>
				<th>Employee No</th>
				<th>Employee Name</th>
				<th>Days</th>
				<th>Hours</th>
				<th>Days</th>
				<th>Hours</th>
				<th>Days</th>
				<th>%</th>
				<th>Hours</th>
				<th>%</th>
				<th>Days</th>
				<th>%</th>
				<th>Hours</th>
				<th>%</th>
				<th>Convert</th>
				<th>Days</th>
				<th>Hours</th>
				<th>Days</th>
				<th>Hours</th>
				<th>Days</th>
				<th>Hours</th>
				<th>Days</th>
				<th>Hours</th>
				<th>Days</th>
				<th>%</th>
				<th>Hours</th>
				<th>%</th>
			</tr>
		</thead>
		<tbody>
			@foreach($this->datanormal as $value){
				$data_normal[] = [
					'totalHours' => $value
					];
				$param['normalhours'] = $data_normal;
			}

			@foreach($this->dataactual as $value){
				$data_actual[] = [
					'totalHours' => $value
					];
				$param['actualhours'] = $data_actual;
			}

			@foreach($this->datavan as $value){
				$data_van[] = [
					'totalHours' => $value
					];
				$param['vanHours'] = $data_van;
			}

			@foreach($this->dataovertime as $value){
				$data_overtime[] = [
					'totalHours' => $value
					];
				$param['actualhours'] = $data_actual;
			}

			@foreach($data as $value)
			<tr>
                <td>{{ $value->no }}</td>
				<td>{{ $value->employeeno }}</td>
				<td>{{ $value->employeename }}</td>
				<td>{{ $value->normaldays }}</td>
				<td>{{ $value->normalhours }}</td>
                <td>{{ $value->actualdays }}</td>
				<td>{{ $value->actualhours }}</td>
				<td>{{ $value->vanDays }}</td>
				<td>{{ $value->vanDaysP }}</td>
				<td>{{ $value->vanHours }}</td>
				<td>{{ $value->vanHoursP }}</td>
				<td>{{ $value->overtimeDays }}</td>
				<td>{{ $value->overtimeDaysP }}</td>
				<td>{{ $value->overtimeHours }}</td>
				<td>{{ $value->overtimeHoursP }}</td>
				<td>{{ $value->overtimeConvert }}</td>
				<td>{{ $value->absentDays }}</td>
				<td>{{ $value->absentHours }}</td>
				<td>{{ $value->othersDays }}</td>
				<td>{{ $value->othersHours }}</td>
				<td>{{ $value->leavePermitDays }}</td>
				<td>{{ $value->leavePermitHours }}</td>
				<td>{{ $value->totalAbsentDays }}</td>
				<td>{{ $value->totalAbsentHours }}</td>
				<td>{{ $value->ewDays }}</td>
				<td>{{ $value->ewDaysP }}</td>
				<td>{{ $value->ewHours }}</td>
				<td>{{ $value->ewHoursP }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>
if(!empty($this->position) && !is_null($this->position[0])){
                foreach($this->position as $value){
                    $data_position[] = [
                        'positionCode' => $value
                    ];
                }
                $param['position'] = $data_position;
            }