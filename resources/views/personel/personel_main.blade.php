<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/personel.css') }}">
	<style type="text/css">
		.div-personel {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
	</style>
</head>

<body>
	<div class="div-personel">
		<div class="div-title">
			<img src="{{ url('/icons/sidebar/personel.png') }}" alt="Title">
			<span class="title-text">{{ __('personel.judul') }}</span>
		</div>

		<div class="card">
			<a class="collapsed" data-toggle="collapse" href="#personel-master-data" aria-expanded="true" aria-controls="personel-master-data">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="{{ url('/icons/personel/personel-data.png') }}" alt="Personel Data">
						<span class="dropdown-title-text">{{ __('personel.master_data') }}</span>
						<img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="personel-master-data" class="collapse">
				<div class="card-block">
					<div class="div-head-data">
						<span class="head-title-text">{{ __('personel.employee_master') }}</span>
					</div>
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('personel/personal_data') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-data.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.personal_data') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/employee_performance') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-data.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.performance') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/work_detail') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-data.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.work_detail') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/competency') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-data.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.competency') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/other_information') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-data.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.other_information') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/payroll_data') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-data.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.payroll_data') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/employee_approval') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-data.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.employee_approval') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/employee_attachment') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-data.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.employee_attachment') }}</span>
							</a>
						</div>
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('personel.employee_detail') }}</span>
					</div>
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="{{ url('personel/employee_mutation') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-data.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.employee_mutation') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/npwp_mutation') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-data.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.npwp_mutation') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/termination_data_entry') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-data.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.termination_data_entry') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/award_data_entry') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-data.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.award_data_entry') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/evaluation_data_entry') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-data.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.evaluation_data_entry') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/sanction_data_entry') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-data.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.sanction_data_entry') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/print_letter') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-data.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.print_letter') }}</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<a class="collapsed" data-toggle="collapse" href="#personel-maintenance" aria-expanded="true" aria-controls="personel-maintenance">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="{{ url('/icons/personel/personel-maintenance.png') }}" alt="Personel Maintenance">
						<span class="dropdown-title-text">{{ __('personel.personel_maintenance') }}</span>
						<img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="personel-maintenance" class="collapse">
				<div class="card-block">
					<div class="div-head-data">
						<span class="head-title-text">{{ __('personel.reference') }}</span>
					</div>
					<div class="row div-child-data-maintenance">
						<div class="col col-3">
							<a href="{{ url('personel/personel_reference') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.personel_reference') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/data_format') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.data_format') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/level') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.level') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/source_document') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.source_document') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/format_document') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.format_document') }}</span>
							</a>
						</div>
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('personel.job_description') }}</span>
					</div>
					<div class="row div-child-data-maintenance">
						<div class="col col-3">
							<a href="{{ url('personel/job_description') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.job_description') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/cost_center_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.cost_center_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/location_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.location_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/position') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.position') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/ranking_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.ranking_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/grade_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.grade_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/group_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.group_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/nature_of_work') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.nature_of_work') }}</span>
							</a>
						</div>
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('personel.npwp_bpjs_group') }}</span>
					</div>
					<div class="row div-child-data-maintenance">
						<div class="col col-3">
							<a href="{{ url('personel/bpjs_group') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.bpjs_group') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/npwp_group') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.npwp_group') }}</span>
							</a>
						</div>
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('personel.bank') }}</span>
					</div>
					<div class="row div-child-data-maintenance">
						<div class="col col-3">
							<a href="{{ url('personel/bank_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.bank_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/bank_branch') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.bank_branch') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/source_bank') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.source_bank') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/transfer_bank') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.transfer_bank') }}</span>
							</a>
						</div>
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('personel.currency') }}</span>
					</div>
					<div class="row div-child-data-maintenance">
						<div class="col col-3">
							<a href="{{ url('personel/currency_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.currency_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/rate_type') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.rate_type') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/exchange_rate') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.exchange_rate') }}</span>
							</a>
						</div>
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('personel.education') }}</span>
					</div>
					<div class="row div-child-data-maintenance">
						<div class="col col-3">
							<a href="{{ url('personel/education_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.education_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/education_status_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.education_status_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/institution_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.institution_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/major_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.major_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/type_of_course_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.type_of_course_code') }}</span>
							</a>
						</div>
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('personel.language') }}</span>
					</div>
					<div class="row div-child-data-maintenance">
						<div class="col col-3">
							<a href="{{ url('personel/language_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.language_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/language_ability_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.language_ability_code') }}</span>
							</a>
						</div>
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('personel.city') }}</span>
					</div>
					<div class="row div-child-data-maintenance">
						<div class="col col-3">
							<a href="{{ url('personel/city_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.city_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/zip_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.zip_code') }}</span>
							</a>
						</div>
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('personel.insurance') }}</span>
					</div>
					<div class="row div-child-data-maintenance">
						<div class="col col-3">
							<a href="{{ url('personel/insurance_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.insurance_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/insurance_class_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.insurance_class_code') }}</span>
							</a>
						</div>
					</div>
					<div class="div-head-data">
						<span class="head-title-text">{{ __('personel.other') }}</span>
					</div>
					<div class="row div-child-data-maintenance">
						<div class="col col-3">
							<a href="{{ url('personel/termination_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.termination_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/decree_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.decree_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/sanction_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.sanction_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/evaluation_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.evaluation_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/title_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.title_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/nationality_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.nationality_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/religion_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.religion_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/line_of_business') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.line_of_business') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/fringe_benefits_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.fringe_benefits_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/final_performance_result_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.final_performance_result_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/skill_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.skill_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/attachment_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.attachment_code') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/free_format_field') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.free_format_field') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/format_report') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.format_report') }}</span>
							</a>
						</div>
						<div class="col col-3">
							<a href="{{ url('personel/relation_code') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/personel/submenu-maintenance.svg') }}" alt="Child Personel">
								<span class="child-title-text">{{ __('personel.relation_code') }}</span>
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