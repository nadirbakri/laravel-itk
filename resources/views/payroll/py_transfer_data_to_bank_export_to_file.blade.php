<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_transfer_data_to_bank.judul') }}</title>
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
	</style>
</head>
<body>
<div class="div-payroll">
		<div class="div-title">
			<img src="{{ url('icons/sidebar/payroll.png') }}" alt="Title">
			<span class="title-text">{{ __('payroll.judul') }}</span>
		</div>
		<div class="card">
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
            </div>
        </div>
	</div>
    
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>