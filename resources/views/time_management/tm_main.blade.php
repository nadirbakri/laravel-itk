<!DOCTYPE html>
<html>
<head>
    <title>{{ __('time_management.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/time_management.css') }}">
	<style type="text/css">
		.div-time_management {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
	</style>
</head>
<body>
	<div class="div-time_management">
		<div class="div-title">
			<img src="{{ url('icons/sidebar/time_management.png') }}" alt="Title">
			<span class="title-text">{{ __('time_management.judul') }}</span>
		</div>

		<div class="card">
			<a class="collapsed" data-toggle="collapse" href="#time_management-master-data" aria-expanded="true" aria-controls="time_management-master-data">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="{{ url('/icons/time_management/time-management-masterdata.svg') }}" alt="Time Management">
						<span class="dropdown-title-text">{{ __('time_management.data_entry') }}</span>
						<img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="time_management-master-data" class="collapse">
				<div class="card-block">
					<div class="div-head-data">
						<span class="head-title-text">{{ __('time_management.time_recording') }}</span>
					</div>
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('time_management/time_recording_process_form') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-data.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.time_recording_process_form') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/update_absenteeism_data') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-data.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.update_absenteeism_data') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/update_absenteeism_process') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-data.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.update_absenteeism_process') }}</span>
							</a>
						</div>
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('time_management.absenteeism') }}</span>
					</div>
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('time_management/absenteeism_data_entry_by_employee_no') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-data.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.absenteeism_data_entry_by_employee_no') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/absenteeism_data_entry_by_date') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-data.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.absenteeism_data_entry_by_date') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/template_preparation') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-data.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.template_preparation') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/update_shift_by_date') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-data.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.update_shift_by_date') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/overtime_spl') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-data.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.overtime_spl') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/company_working_calendar') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-data.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.company_working_calendar') }}</span>
							</a>
						</div>		
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('time_management.leave') }}</span>
					</div>
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('time_management/input_balance_leave') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-data.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.input_balance_leave') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/leave_transaction_by_employee_no') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-data.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.leave_transaction_by_employee_no') }}</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<a class="collapsed" data-toggle="collapse" href="#time_management-maintenance" aria-expanded="true" aria-controls="time_management-maintenance">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="{{ url('/icons/time_management/time-management-maintenance.svg') }}" alt="Time Management">
						<span class="dropdown-title-text">{{ __('time_management.maintenance') }}</span>
						<img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="time_management-maintenance" class="collapse">
				<div class="card-block">
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('time_management/time_recording_reference') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-maintenance.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.time_recording_reference') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/period_maintenance') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-maintenance.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.period_maintenance') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/work_pattern') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-maintenance.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.work_pattern') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/reference_time_management') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-maintenance.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.time_management_reference') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/shift_master_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-maintenance.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.shift_master_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/absent_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-maintenance.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.absent_code') }}</span>
							</a>
						</div>		
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<a class="collapsed" data-toggle="collapse" href="#time_management-report" aria-expanded="true" aria-controls="time_management-report">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="{{ url('/icons/time_management/time-management-report.svg') }}" alt="Time Management">
						<span class="dropdown-title-text">{{ __('time_management.report') }}</span>
						<img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="time_management-report" class="collapse">
				<div class="card-block">
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('time_management/monthly_absenteeism_analysis') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-report.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.monthly_absenteeism_analysis') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/monthly_absenteeism_detail') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-report.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.monthly_absenteeism_detail') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/absenteeism_overtime_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-report.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.absenteeism_overtime_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/detail_absenteeism_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-report.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.detail_absenteeism_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/monthly_leave_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-report.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.monthly_leave_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/detail_rate_overtime_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-report.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.detail_rate_overtime_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/detail_absenteeism_reason_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-report.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.detail_absenteeism_reason_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/postpone_leave_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-report.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.postpone_leave_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('time_management/unpaid_leave_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/time_management/submenu-report.svg') }}" alt="Child Time Management">
								<span class="child-title-text">{{ __('time_management.unpaid_leave_report') }}</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>