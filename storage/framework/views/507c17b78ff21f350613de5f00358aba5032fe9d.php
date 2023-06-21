<!DOCTYPE html>
<html>
<head>
	<title><?php echo e(__('utilities.judul')); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon"/>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo e(asset('css/utilities.css')); ?>">
	<style type="text/css">
		.div-utilities {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
	</style>
</head>

<body>
	<div class="div-utilities">
		<div class="div-title">
			<img src="<?php echo e(url('/icons/utilities/utilities.png')); ?>" alt="Title">
			<span class="title-text"><?php echo e(__('utilities.judul')); ?></span>
		</div>

		<div class="div-menu">
			<div class="row div-child-data">
				<div class="col col-4">
					<a href="<?php echo e(url('utilities/organization_chart')); ?>" target="iframe_dashboard">
						<img src="<?php echo e(url('/icons/utilities/submenu-utilities.png')); ?>" style="max-width: 7.5%;" alt="Child Personel">
						<span class="child-title-text"><?php echo e(__('utilities.organization_chart')); ?></span>
					</a>
				</div>
				<div class="col col-6">
					<a href="<?php echo e(url('utilities/user_log')); ?>" target="iframe_dashboard">
						<img src="<?php echo e(url('/icons/utilities/submenu-utilities.png')); ?>" alt="Child Personel">
						<span class="child-title-text"><?php echo e(__('utilities.user_log')); ?></span>
					</a>
				</div>
			</div>
			<div class="row div-child-data">
				<div class="col col-4">
					<a href="<?php echo e(url('utilities/user_security_maintenance')); ?>" target="iframe_dashboard">
						<img src="<?php echo e(url('/icons/utilities/submenu-utilities.png')); ?>" style="max-width: 7.5%;" alt="Child Personel">
						<span class="child-title-text"><?php echo e(__('utilities.user_security_maintenance')); ?></span>
					</a>
				</div>
				<div class="col col-6">
					<a href="<?php echo e(url('utilities/audit_trail')); ?>" target="iframe_dashboard">
						<img src="<?php echo e(url('/icons/utilities/submenu-utilities.png')); ?>" alt="Child Personel">
						<span class="child-title-text"><?php echo e(__('utilities.audit_trail')); ?></span>
					</a>
				</div>
			</div>
			<div class="row div-child-data">
				<div class="col col-4">
					<a href="<?php echo e(url('utilities/menu_master')); ?>" target="iframe_dashboard">
						<img src="<?php echo e(url('/icons/utilities/submenu-utilities.png')); ?>" style="max-width: 7.5%;" alt="Child Personel">
						<span class="child-title-text"><?php echo e(__('utilities.menu_master')); ?></span>
					</a>
				</div>
				<div class="col col-6">
					<a href="<?php echo e(url('utilities/change_employee_no')); ?>" target="iframe_dashboard">
						<img src="<?php echo e(url('/icons/utilities/submenu-utilities.png')); ?>" alt="Child Personel">
						<span class="child-title-text"><?php echo e(__('utilities.change_employee_no')); ?></span>
					</a>
				</div>
			</div>
			<div class="row div-child-data">
				<div class="col col-4">
					<a href="<?php echo e(url('utilities/group_authorization')); ?>" target="iframe_dashboard">
						<img src="<?php echo e(url('/icons/utilities/submenu-utilities.png')); ?>" style="max-width: 7.5%;" alt="Child Personel">
						<span class="child-title-text"><?php echo e(__('utilities.group_authorization')); ?></span>
					</a>
				</div>
				<div class="col col-6">
					<a href="<?php echo e(url('utilities/news_master')); ?>" target="iframe_dashboard">
						<img src="<?php echo e(url('/icons/utilities/submenu-utilities.png')); ?>" alt="Child Personel">
						<span class="child-title-text"><?php echo e(__('utilities.news_master')); ?></span>
					</a>
				</div>
			</div>
			<div class="row div-child-data">
				<div class="col col-4">
					<a href="<?php echo e(url('utilities/group_user_access')); ?>" target="iframe_dashboard">
						<img src="<?php echo e(url('/icons/utilities/submenu-utilities.png')); ?>" style="max-width: 7.5%;" alt="Child Personel">
						<span class="child-title-text"><?php echo e(__('utilities.group_user_access')); ?></span>
					</a>
				</div>
				<div class="col col-6">
					<a href="<?php echo e(url('utilities/announcement')); ?>" target="iframe_dashboard">
						<img src="<?php echo e(url('/icons/utilities/submenu-utilities.png')); ?>" alt="Child Personel">
						<span class="child-title-text"><?php echo e(__('utilities.announcement')); ?></span>
					</a>
				</div>
			</div>
			<!-- <div class="row div-child-data">
				<div class="col col-6">
					<a href="<?php echo e(url('utilities/change_password')); ?>" target="iframe_dashboard">
						<img src="<?php echo e(url('/icons/utilities/submenu-utilities.png')); ?>" alt="Child Personel">
						<span class="child-title-text"><?php echo e(__('utilities.change_password')); ?></span>
					</a>
				</div>
			</div> -->
			<div class="row div-child-data">
				<div class="col col-4">
					<a href="<?php echo e(url('utilities/company')); ?>" target="iframe_dashboard">
						<img src="<?php echo e(url('/icons/utilities/submenu-utilities.png')); ?>" style="max-width: 7.5%;" alt="Child Personel">
						<span class="child-title-text"><?php echo e(__('utilities.company_master')); ?></span>
					</a>
				</div>
				<div class="col col-6">
					<a href="<?php echo e(url('utilities/process_user_id')); ?>" target="iframe_dashboard">
						<img src="<?php echo e(url('/icons/utilities/submenu-utilities.png')); ?>" alt="Child Personel">
						<span class="child-title-text"><?php echo e(__('utilities.process_user_id')); ?></span>
					</a>
				</div>
			</div>
			<div class="row div-child-data">
				
			</div>
			<div class="row div-child-data">
				
			</div>
			<div class="row div-child-data">
				
			</div>
			<div class="row div-child-data">
				
			</div>
			<!-- <div class="row div-child-data">
				<div class="col col-6">
					<a href="<?php echo e(url('utilities/export_personal_data')); ?>" target="iframe_dashboard">
						<img src="<?php echo e(url('/icons/utilities/submenu-utilities.png')); ?>" alt="Child Personel">
						<span class="child-title-text"><?php echo e(__('utilities.export_personal_data')); ?></span>
					</a>
				</div>
			</div> -->
			<!-- <div class="row div-child-data">
				<div class="col col-6">
					<a href="<?php echo e(url('utilities/dashboard_admin_ess')); ?>" target="iframe_dashboard">
						<img src="<?php echo e(url('/icons/utilities/submenu-utilities.png')); ?>" alt="Child Personel">
						<span class="child-title-text"><?php echo e(__('utilities.dashboard_admin_ess')); ?></span>
					</a>
				</div>
			</div> -->
		</div>
	</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/utilities/utilities_main.blade.php ENDPATH**/ ?>