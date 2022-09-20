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
		.div-title a {
			text-decoration: none;
			display: flex;
			align-items:center;
		}
	</style>
</head>
<body>
<div class="div-payroll">
		<div class="div-title">
			<!-- <img src="{{ url('icons/sidebar/payroll.png') }}" alt="Title"> -->
			<a href="{{ url('payroll/transfer_data_to_bank') }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('payroll_transfer_data_to_bank.judul') }}</span>
			</a>
		</div>
		<div class="card">
			<div id="payroll-master-data">
				<div class="card-block">
					<div class="row div-child-data">
						<div class="col col-4">
							<a href="{{ url('payroll/transfer_data_to_bank/export_to_file') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-data.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll_transfer_data_to_bank.export_to_file') }}</span>
							</a>
						</div>
						<div class="col col-4">
							<a href="{{ url('payroll/transfer_data_to_bank/api') }}" target="iframe_dashboard">
								<img src="{{ url('/icons/payroll/submenu-data.svg') }}" alt="Child payroll">
								<span class="child-title-text">{{ __('payroll_transfer_data_to_bank.api') }}</span>
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