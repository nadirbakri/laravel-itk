<!DOCTYPE html>
<html>
<head>
	<title><?php echo e(__('personel.judul')); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon"/>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo e(asset('css/personel.css')); ?>">
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
			<img src="<?php echo e(url('/icons/sidebar/personel.png')); ?>" alt="Title">
			<span class="title-text"><?php echo e(__('personel.judul')); ?></span>
		</div>

		<div class="card">
			<a class="collapsed" data-toggle="collapse" href="#personel-master-data" aria-expanded="true" aria-controls="personel-master-data">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="<?php echo e(url('/icons/personnel/personel-master-data.svg')); ?>" alt="Personel Data">
						<span class="dropdown-title-text"><?php echo e(__('personel.data_entry')); ?></span>
						<img class="dropdown-triangle" src="<?php echo e(url('/pictures/triangle.png')); ?>" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="personel-master-data" class="collapse">
				<div class="card-block">
					<div class="div-head-data">
						<span class="head-title-text"><?php echo e(__('personel.employee_master')); ?></span>
					</div>
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/personal_data')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-data.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.personnel_data')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/work_detail')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-data.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.work_detail')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/performance')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-data.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.performance')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/competency')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-data.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.competency')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/other_information')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-data.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.other_information')); ?></span>
							</a>
						</div>
						<!-- <div class="col col-3">
							<a href="<?php echo e(url('personnel/payroll_data')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-data.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.payroll_data')); ?></span>
							</a>
						</div> -->
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/employee_approval')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-data.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.employee_approval')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/employee_attachment')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-data.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.employee_attachment')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/import_export_personal_data')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-data.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.import_export_personal_data')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/import_master_data')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-data.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.import_master_data')); ?></span>
							</a>
						</div>
						<!-- <div class="col col-3">
							<a href="<?php echo e(url('personnel/change_employee_no')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-data.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.change_employee_no')); ?></span>
							</a>
						</div> -->
						<!--<div class="col col-3">
							<a href="<?php echo e(url('personnel/import_personal_data')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-data.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.import_personal_data')); ?></span>
							</a>
						</div>-->
					</div>
					<div class="div-head-data">
						<span class="head-title-text"><?php echo e(__('personel.employee_detail')); ?></span>
					</div>
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/employee_mutation')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-data.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.employee_mutation')); ?></span>
							</a>
						</div>
						<!-- <div class="col col-3">
							<a href="<?php echo e(url('personnel/npwp_mutation')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-data.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.npwp_mutation')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/termination_data_entry')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-data.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.termination_data_entry')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/award_data_entry')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-data.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.award_data_entry')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/evaluation_data_entry')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-data.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.evaluation_data_entry')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/sanction_data_entry')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-data.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.sanction_data_entry')); ?></span>
							</a>
						</div> -->
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/print_letter')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-data.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.print_letter')); ?></span>
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
						<img class="dropdown-logo" src="<?php echo e(url('/icons/personnel/personel-maintenance.svg')); ?>" alt="Personel Maintenance">
						<span class="dropdown-title-text"><?php echo e(__('personel.personel_maintenance')); ?></span>
						<img class="dropdown-triangle" src="<?php echo e(url('/pictures/triangle.png')); ?>" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="personel-maintenance" class="collapse">
				<div class="card-block">
					<div class="div-head-data">
						<span class="head-title-text"><?php echo e(__('personel.reference')); ?></span>
					</div>
					<div class="row div-child-data-maintenance">
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/personel_reference')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.personnel_reference')); ?></span>
							</a>
						</div>
						<!-- <div class="col col-3">
							<a href="<?php echo e(url('personnel/data_format')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.data_format')); ?></span>
							</a>
						</div> -->
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/level')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.level')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/source_document')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.source_document')); ?></span>
							</a>
						</div>
						<!-- <div class="col col-3">
							<a href="<?php echo e(url('personnel/format_document')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.format_document')); ?></span>
							</a>
						</div> -->
					</div>
					<div class="div-head-data">
						<span class="head-title-text"><?php echo e(__('personel.job_description')); ?></span>
					</div>
					<div class="row div-child-data-maintenance">
						<!-- <div class="col col-3">
							<a href="<?php echo e(url('personnel/job_description')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.job_description')); ?></span>
							</a>
						</div> -->
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/cost_center')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.cost_center')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/location')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.location')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/position')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.position')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/ranking')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.ranking')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/grade')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.grade')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/group')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.group')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/nature_of_work')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.nature_of_work')); ?></span>
							</a>
						</div>
					</div>
					<div class="div-head-data">
						<span class="head-title-text"><?php echo e(__('personel.npwp_bpjs_group')); ?></span>
					</div>
					<div class="row div-child-data-maintenance">
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/bpjs_group')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.bpjs_group')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/npwp_group')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.npwp_group')); ?></span>
							</a>
						</div>
					</div>
					<div class="div-head-data">
						<span class="head-title-text"><?php echo e(__('personel.bank')); ?></span>
					</div>
					<div class="row div-child-data-maintenance">
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/bank')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.bank')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/company_bank')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.company_bank')); ?></span>
							</a>
						</div>
						<!-- <div class="col col-3">
							<a href="<?php echo e(url('personnel/source_bank')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.source_bank')); ?></span>
							</a>
						</div> -->
						<!-- <div class="col col-3">
							<a href="<?php echo e(url('personnel/transfer_bank')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.transfer_bank')); ?></span>
							</a>
						</div> -->
					</div>
					<!-- <div class="div-head-data">
						<span class="head-title-text"><?php echo e(__('personel.currency')); ?></span>
					</div>
					<div class="row div-child-data-maintenance">
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/currency_code')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.currency_code')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/rate_type')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.rate_type')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/exchange_rate')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.exchange_rate')); ?></span>
							</a>
						</div>
					</div> -->
					<div class="div-head-data">
						<span class="head-title-text"><?php echo e(__('personel.education')); ?></span>
					</div>
					<div class="row div-child-data-maintenance">
						<!-- <div class="col col-3">
							<a href="<?php echo e(url('personnel/education_code')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.education_code')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/education_status_code')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.education_status_code')); ?></span>
							</a>
						</div> -->
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/institution')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.institution')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/major')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.major')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/type_of_course')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.type_of_course')); ?></span>
							</a>
						</div>
					</div>
					<!-- <div class="div-head-data">
						<span class="head-title-text"><?php echo e(__('personel.language')); ?></span>
					</div>
					<div class="row div-child-data-maintenance">
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/language_code')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.language_code')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/language_ability_code')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.language_ability_code')); ?></span>
							</a>
						</div>
					</div> -->
					<div class="div-head-data">
						<span class="head-title-text"><?php echo e(__('personel.city')); ?></span>
					</div>
					<div class="row div-child-data-maintenance">
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/city')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.city')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/zip')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.zip')); ?></span>
							</a>
						</div>
					</div>
					<!-- <div class="div-head-data">
						<span class="head-title-text"><?php echo e(__('personel.insurance')); ?></span>
					</div>
					<div class="row div-child-data-maintenance">
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/insurance_code')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.insurance_code')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/insurance_class_code')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.insurance_class_code')); ?></span>
							</a>
						</div>
					</div> -->
					<div class="div-head-data">
						<span class="head-title-text"><?php echo e(__('personel.other')); ?></span>
					</div>
					<div class="row div-child-data-maintenance">
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/exchange_rate')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.exchange_rate')); ?></span>
							</a>
						</div>
						<!-- <div class="col col-3">
							<a href="<?php echo e(url('personnel/termination_code')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.termination_code')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/decree_code')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.decree_code')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/sanction_code')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.sanction_code')); ?></span>
							</a>
						</div> -->
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/evaluation_form')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.evaluation_form')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/title')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.title')); ?></span>
							</a>
						</div>
						<!-- <div class="col col-3">
							<a href="<?php echo e(url('personnel/nationality_code')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.nationality_code')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/religion_code')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.religion_code')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/line_of_business')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.line_of_business')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/fringe_benefits_code')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.fringe_benefits_code')); ?></span>
							</a>
						</div> -->
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/final_performance_result')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.final_performance_result')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/skill')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.skill')); ?></span>
							</a>
						</div>
						<!-- <div class="col col-3">
							<a href="<?php echo e(url('personnel/attachment_code')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.attachment_code')); ?></span>
							</a>
						</div> -->
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/free_format_field')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.free_format_field')); ?></span>
							</a>
						</div>
						<!-- <div class="col col-3">
							<a href="<?php echo e(url('personnel/format_report')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.format_report')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/relation_code')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-maintenance.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.relation_code')); ?></span>
							</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<a class="collapsed" data-toggle="collapse" href="#personel-report" aria-expanded="true" aria-controls="personel-report">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="<?php echo e(url('/icons/personnel/personel-report.svg')); ?>" alt="Personel Report">
						<span class="dropdown-title-text"><?php echo e(__('personel.personel_report')); ?></span>
						<img class="dropdown-triangle" src="<?php echo e(url('/pictures/triangle.png')); ?>" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="personel-report" class="collapse">
				<div class="card-block">
					<div class="row div-child-data">
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/employee_list')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-report.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.employee_list')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/employee_turn_over_report')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-report.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.employee_turn_over_report')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/employee_report_by_status')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-report.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.employee_report_by_status')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/employee_dependents')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-report.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.employee_dependents')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/employee_skill_report')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-report.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.employee_skill_report')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/evaluation_report')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-report.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.evaluation_report')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/custom_report_employee')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-report.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.custom_report_employee')); ?></span>
							</a>
						</div>
						<div class="col col-3">
							<a href="<?php echo e(url('personnel/employee_card')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-report.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.employee_card')); ?></span>
							</a>
						</div>
						<!-- <div class="col col-3">
							<a href="<?php echo e(url('personnel/employee_notice_report')); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/personnel/submenu-report.svg')); ?>" alt="Child Personel">
								<span class="child-title-text"><?php echo e(__('personel.employee_notice_report')); ?></span>
							</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/personel/personel_main.blade.php ENDPATH**/ ?>