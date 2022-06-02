<!DOCTYPE html>
<html>
<head>
    <title>{{ __('medical.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/medical.css') }}">
	<style type="text/css">
		.div-medical {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
	</style>
</head>
<body>
	<div class="div-medical">
		<div class="div-title">
			<img src="{{ url('icons/sidebar/medical.png') }}" alt="Title">
			<span class="title-text">{{ __('medical.judul') }}</span>
		</div>
		<div class="card">
			<a class="collapsed" data-toggle="collapse" href="#medical-master-data" aria-expanded="true" aria-controls="medical-master-data">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="{{ url('/icons/medical/medical-master-data.svg') }}" alt="medical">
						<span class="dropdown-title-text">{{ __('medical.data_entry') }}</span>
						<img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="medical-master-data" class="collapse">
				<div class="card-block">
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('medical/claim_transaction') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-data.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.claim_transaction') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/multiple_payment_plan_transaction') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-data.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.multiple_payment_plan_transaction') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/claim_transaction_transaction') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-data.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.claim_transaction') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/reimbursement_recapitulation') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-data.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.reimbursement_recapitulation') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/claim_list') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-data.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.claim_list') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/print_claim_letter_for_insurance') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-data.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.print_claim_letter_for_insurance') }}</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<a class="collapsed" data-toggle="collapse" href="#medical-maintenance" aria-expanded="true" aria-controls="medical-maintenance">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="{{ url('/icons/medical/medical-settings.svg') }}" alt="medical">
						<span class="dropdown-title-text">{{ __('medical.maintenance') }}</span>
						<img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="medical-maintenance" class="collapse">
				<div class="card-block">
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('medical/medical_reference') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-maintenance.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.medical_reference') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/claim_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-maintenance.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.claim_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/disease_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-maintenance.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.disease_code') }}</span>
							</a>
						</div>
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('medical.method_by_company') }}</span>
					</div>
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('medical/input_limit') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-maintenance.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.input_limit') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/input_personnel_limit') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-maintenance.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.input_personnel_limit') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/input_personnel_limit_for_all_employee') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-maintenance.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.input_personnel_limit_for_all_employee') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/treatment_eligibility') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-maintenance.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.treatment_eligibility') }}</span>
							</a>
						</div>
					</div>
					<!-- <div class="div-head-data">
						<span class="head-title-text">{{ __('medical.method_by_insurance') }}</span>
					</div>
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('medical/insurance_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-maintenance.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.insurance_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/insurance_class') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-maintenance.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.insurance_class') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/input_limit_insurance') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-maintenance.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.input_limit') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/treatment_eligibility_insurance') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-maintenance.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.treatment_eligibility') }}</span>
							</a>
						</div>
					</div> -->
				</div>
			</div>
		</div>
		<div class="card">
			<a class="collapsed" data-toggle="collapse" href="#medical-process" aria-expanded="true" aria-controls="medical-process">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="{{ url('/icons/medical/medical-process.svg') }}" alt="medical">
						<span class="dropdown-title-text">{{ __('medical.process') }}</span>
						<img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="medical-process" class="collapse">
				<div class="card-block">
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('medical/confirmation_for_medical_transaction') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-process.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.confirmation_for_medical_transaction') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/process_personal_limit') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-process.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.process_personal_limit') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/month_end_process') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-process.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.month_end_process') }}</span>
							</a>
						</div>
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('medical.transfer_payment_to_excel') }}</span>
					</div>
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('medical/monthly') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-process.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.monthly') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/remaining_limit') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-process.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.remaining_limit') }}</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<a class="collapsed" data-toggle="collapse" href="#medical-report" aria-expanded="true" aria-controls="medical-report">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="{{ url('/icons/medical/medical-report.svg') }}" alt="medical">
						<span class="dropdown-title-text">{{ __('medical.report') }}</span>
						<img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="medical-report" class="collapse">
				<div class="card-block">
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('medical/medical_facility_used_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-report.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.medical_facility_used_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/claim_payment_transaction_report_slip') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-report.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.claim_payment_transaction_report_slip') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/medical_claim_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-report.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.medical_claim_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/insurance_premium_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-report.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.insurance_premium_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/remaining_medical_limit_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-report.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.remaining_medical_limit_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/outstanding_claim_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-report.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.outstanding_claim_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('medical/disease_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/medical/submenu-report.svg') }}" alt="Child medical">
								<span class="child-title-text">{{ __('medical.disease_report') }}</span>
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