<!DOCTYPE html>
<html>
<head>
	<title>{{ __('utilities.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/utilities.css') }}">
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
			<img src="{{ url('/icons/utilities/utilities.png') }}" alt="Title">
			<span class="title-text">{{ __('utilities.judul') }}</span>
		</div>

		<div class="div-menu">
			<div class="row div-child-data">
				<div class="col col-6">
					<a href="{{ url('utilities/organization_chart') }}" target="iframe_dashboard">
						<img src="{{ url('/icons/utilities/submenu-utilities.png') }}" alt="Child Personel">
						<span class="child-title-text">{{ __('utilities.organization_chart') }}</span>
					</a>
				</div>
			</div>
			<div class="row div-child-data">
				<div class="col col-6">
					<a href="{{ url('utilities/user_security_maintenance') }}" target="iframe_dashboard">
						<img src="{{ url('/icons/utilities/submenu-utilities.png') }}" alt="Child Personel">
						<span class="child-title-text">{{ __('utilities.user_security_maintenance') }}</span>
					</a>
				</div>
			</div>
			<div class="row div-child-data">
				<div class="col col-6">
					<a href="{{ url('utilities/menu_master') }}" target="iframe_dashboard">
						<img src="{{ url('/icons/utilities/submenu-utilities.png') }}" alt="Child Personel">
						<span class="child-title-text">{{ __('utilities.menu_master') }}</span>
					</a>
				</div>
			</div>
			<div class="row div-child-data">
				<div class="col col-6">
					<a href="{{ url('utilities/group_authorization') }}" target="iframe_dashboard">
						<img src="{{ url('/icons/utilities/submenu-utilities.png') }}" alt="Child Personel">
						<span class="child-title-text">{{ __('utilities.group_authorization') }}</span>
					</a>
				</div>
			</div>
			<div class="row div-child-data">
				<div class="col col-6">
					<a href="{{ url('utilities/group_user_access') }}" target="iframe_dashboard">
						<img src="{{ url('/icons/utilities/submenu-utilities.png') }}" alt="Child Personel">
						<span class="child-title-text">{{ __('utilities.group_user_access') }}</span>
					</a>
				</div>
			</div>
			<!-- <div class="row div-child-data">
				<div class="col col-6">
					<a href="{{ url('utilities/change_password') }}" target="iframe_dashboard">
						<img src="{{ url('/icons/utilities/submenu-utilities.png') }}" alt="Child Personel">
						<span class="child-title-text">{{ __('utilities.change_password') }}</span>
					</a>
				</div>
			</div> -->
			<div class="row div-child-data">
				<div class="col col-6">
					<a href="{{ url('utilities/user_log') }}" target="iframe_dashboard">
						<img src="{{ url('/icons/utilities/submenu-utilities.png') }}" alt="Child Personel">
						<span class="child-title-text">{{ __('utilities.user_log') }}</span>
					</a>
				</div>
			</div>
			<div class="row div-child-data">
				<div class="col col-6">
					<a href="{{ url('utilities/audit_trail') }}" target="iframe_dashboard">
						<img src="{{ url('/icons/utilities/submenu-utilities.png') }}" alt="Child Personel">
						<span class="child-title-text">{{ __('utilities.audit_trail') }}</span>
					</a>
				</div>
			</div>
			<!-- <div class="row div-child-data">
				<div class="col col-6">
					<a href="{{ url('utilities/export_personal_data') }}" target="iframe_dashboard">
						<img src="{{ url('/icons/utilities/submenu-utilities.png') }}" alt="Child Personel">
						<span class="child-title-text">{{ __('utilities.export_personal_data') }}</span>
					</a>
				</div>
			</div> -->
			<!-- <div class="row div-child-data">
				<div class="col col-6">
					<a href="{{ url('utilities/dashboard_admin_ess') }}" target="iframe_dashboard">
						<img src="{{ url('/icons/utilities/submenu-utilities.png') }}" alt="Child Personel">
						<span class="child-title-text">{{ __('utilities.dashboard_admin_ess') }}</span>
					</a>
				</div>
			</div> -->
		</div>
	</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>