<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/payroll.css') }}">
	<style type="text/css">
		.div-payroll {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
		.modal-header-notification-error {
            border-bottom: 1px solid #eee;
            background-color: #f44336;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
	</style>
</head>
<body>
	<div class="div-payroll">
		<div class="div-title">
			<img src="{{ url('icons/sidebar/payroll.png') }}" alt="Title">
			<span class="title-text">{{ __('payroll.judul') }}</span>
		</div>
		<div class="card">
			<a class="collapsed" data-toggle="collapse" href="#payroll-master-data" aria-expanded="true" aria-controls="payroll-master-data">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="{{ url('/icons/payroll/payroll-master-data.svg') }}" alt="payroll">
						<span class="dropdown-title-text">{{ __('payroll.data_entry') }}</span>
						<img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="payroll-master-data" class="collapse">
				<div class="card-block">
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('payroll/salary_master') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-data.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.salary_master') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/tarif_master') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-data.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.tarif_master') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/severance_data_entry') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-data.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.severance_data_entry') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/salary_accumulation_data') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-data.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.salary_accumulation_data') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/import_data_from_excel') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-data.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.import_data_from_excel') }}</span>
							</a>
						</div>
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('payroll.thr_bonus') }}</span>
					</div>
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('payroll/thr_data_entry') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-data.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.thr_data_entry') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/bonus_data_entry') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-data.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.bonus_data_entry') }}</span>
							</a>
						</div>	
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('payroll.loan') }}</span>
					</div>
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('payroll/loan_master') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-data.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.loan_master') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/loan_data_entry') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-data.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.loan_data_entry') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/full_partial_loan_payment') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-data.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.partial_full_loan_payment') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/loan_payment') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-data.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.loan_payment') }}</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<a class="collapsed" data-toggle="collapse" href="#payroll-maintenance" aria-expanded="true" aria-controls="payroll-maintenance">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="{{ url('/icons/payroll/payroll-settings.svg') }}" alt="payroll">
						<span class="dropdown-title-text">{{ __('payroll.maintenance') }}</span>
						<img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="payroll-maintenance" class="collapse">
				<div class="card-block">
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('payroll/payroll_calculation') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-maintenance.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.payroll_calculation') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/thr_formula') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-maintenance.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.thr_formula') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/bonus_formula') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-maintenance.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.bonus_formula') }}</span>
							</a>
						</div>
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('payroll.reference_program') }}</span>
					</div>
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('payroll/reference_payroll') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-maintenance.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.reference_payroll') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/account') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-maintenance.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.account') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/spt_format') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-maintenance.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.spt_format') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/salary_component_data') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-maintenance.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.salary_component_data') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/slip_format') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-maintenance.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.slip_format') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/report_format') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-maintenance.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.report_format') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/multi_cost_center') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-maintenance.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.multi_cost_center') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/journal_template') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-maintenance.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.journal_template') }}</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<a class="collapsed" data-toggle="collapse" href="#payroll-process" aria-expanded="true" aria-controls="payroll-process">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="{{ url('/icons/payroll/payroll-process.svg') }}" alt="payroll">
						<span class="dropdown-title-text">{{ __('payroll.process') }}</span>
						<img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="payroll-process" class="collapse">
				<div class="card-block">
					<div class="row div-child-data">
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('payroll.yearly_process') }}</span>
					</div>
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('payroll/year_end_process') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-process.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.year_end_process') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/spt_process') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-process.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.spt_process') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/final_tax_process') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-process.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.final_tax_process') }}</span>
							</a>
						</div>
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('payroll.monthly_process') }}</span>
					</div>
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('payroll/monthly_payroll_closing_process') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-process.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.monthly_payroll_closing_process') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/monthly_system_closing') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-process.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.monthly_system_closing') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/transfer_data_to_bank') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-process.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.transfer_data_to_bank') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/periodical_update_process') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-process.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.periodical_update_process') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/overtime_calculation_process') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-process.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.overtime_calculation_process') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/journal_process') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-process.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.journal_process') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/salary_calculation_process') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-process.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.salary_calculation_process') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/tax_calculation_process') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-process.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.tax_calculation_process') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/absenteeism_overtime_calculation_process') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-process.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.absenteeism_overtime_calculation_process') }}</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<a class="collapsed" data-toggle="collapse" href="#payroll-report" aria-expanded="true" aria-controls="payroll-report">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="{{ url('/icons/payroll/payroll-report.svg') }}" alt="payroll">
						<span class="dropdown-title-text">{{ __('payroll.report') }}</span>
						<img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="payroll-report" class="collapse">
				<div class="card-block">
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('payroll/dumtk') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-report.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.dumtk') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/monthly_jamsostek_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-report.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.monthly_jamsostek_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/export_sipp_online') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-report.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.export_sipp_online_report') }}</span>
							</a>
						</div>
						<!-- <div class="col col-3">
							<a href="{{ url('payroll/loan_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-report.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.loan_report') }}</span>
							</a>
						</div> -->
						<div class="col col-3">
							<a href="{{ url('payroll/journal_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-report.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.journal_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/bonus_thr_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-report.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.bonus_thr_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/export_data_kepesertaan_bpjs_tk_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-report.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.export_data_kepesertaan_bpjs_tk_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/periodical_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-report.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.periodical_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/payment_slip') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-report.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.payment_slip') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/severance_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-report.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.severance_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/salary_historical_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-report.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.salary_historical_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/csv_e-spt_report_form') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-report.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.csv_e-spt_report_form') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/retroactive_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-report.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.retroactive_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/signature_list_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-report.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.signature_list_report') }}</span>
							</a>
						</div>
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('payroll.annual') }}</span>
					</div>
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('payroll/spt_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-report.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.spt_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/spt_pph_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-report.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.spt_pph_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('payroll/annual_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-report.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll.annual_report') }}</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@if($errors->any())
	<div class="modal fade" role="dialog" id="notification_error">
        <div class="modal-dialog modal-dialog-centered" data-toggle="modal" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification-error">
                    <h5 class="modal-title">Error!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="message-notification-error">{{$errors->first()}}</span>
                </div>
            </div>
        </div>
    </div>

	@endif
    
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
		var error = "{{ $errors->any() }}";
		if (error) {
			$('#notification_error').modal('show');
		}
	})
</script>

</html>