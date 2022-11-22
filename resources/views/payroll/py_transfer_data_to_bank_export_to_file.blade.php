<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_transfer_data_to_bank.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}"> -->
	<link rel="stylesheet" href="{{ asset('css/payroll.css') }}">
	
	<style type="text/css">
		.div-payroll {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
		.div-head-data {
			margin: 1% 7%;
			width: 80%;
			border-bottom: none; 
			line-height: 0;
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
			<a href="{{ url('payroll/transfer_data_to_bank') }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('payroll_transfer_data_to_bank.judul') }}</span>
			</a>
		</div>
		<div class="card">
            <div class="div-head-data">
				<span class="head-title-text">{{ __('payroll_transfer_data_to_bank.label_bank_output_file_option') }}</span>
			</div>
			<div class="row div-child-data">
				<div class="col col-4">
                    <a href="javascript:void(0)" class="bank" data-bank="bca">
                        <!-- <img src="{{ url('/icons/payroll/submenu-process.svg') }}" alt="Child payroll"> -->
                        <span class="child-title-text">{{ __('payroll_transfer_data_to_bank.label_bank_central_asia') }}</span>
                    </a>
                </div>
				<div class="col col-4">
                    <a href="javascript:void(0)" class="bank" data-bank="mcm_mandiri">
                        <!-- <img src="{{ url('/icons/payroll/submenu-process.svg') }}" alt="Child payroll"> -->
                        <span class="child-title-text">{{ __('payroll_transfer_data_to_bank.label_mcm_bank_mandiri') }}</span>
                    </a>
                </div>
				<div class="col col-4">
                    <a href="javascript:void(0)" class="bank" data-bank="bot">
                        <!-- <img src="{{ url('/icons/payroll/submenu-process.svg') }}" alt="Child payroll"> -->
                        <span class="child-title-text">{{ __('payroll_transfer_data_to_bank.label_bot') }}</span>
                    </a>
                </div>
            </div>
			<div class="row div-child-data">
				<div class="col col-4">
                    <a href="javascript:void(0)" class="bank" data-bank="btpn">
                        <!-- <img src="{{ url('/icons/payroll/submenu-process.svg') }}" alt="Child payroll"> -->
                        <span class="child-title-text">{{ __('payroll_transfer_data_to_bank.label_btpn') }}</span>
                    </a>
                </div>
				<div class="col col-4">
                    <a href="javascript:void(0)" class="bank" data-bank="ina">
                        <!-- <img src="{{ url('/icons/payroll/submenu-process.svg') }}" alt="Child payroll"> -->
                        <span class="child-title-text">{{ __('payroll_transfer_data_to_bank.label_bank_ina') }}</span>
                    </a>
                </div>
            </div>
			<div class="row div-child-data">
				<div class="col col-4">
                    <a href="javascript:void(0)" class="bank" data-bank="mandiri">
                        <!-- <img src="{{ url('/icons/payroll/submenu-process.svg') }}" alt="Child payroll"> -->
                        <span class="child-title-text">{{ __('payroll_transfer_data_to_bank.label_bank_mandiri') }}</span>
                    </a>
                </div>
				<div class="col col-4">
                    <a href="javascript:void(0)" class="bank" data-bank="ina_ma">
                        <!-- <img src="{{ url('/icons/payroll/submenu-process.svg') }}" alt="Child payroll"> -->
                        <span class="child-title-text">{{ __('payroll_transfer_data_to_bank.label_bank_ina_multi_account') }}</span>
                    </a>
                </div>
            </div>
        </div>
	</div>
    
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
		$(".bank").on('click', function() {
            var data = $(this).data("bank");
			$.redirect("{{ url('payroll/transfer_data_to_bank/detail_data') }}", 
			{ 
				'bankType' : data 
			}, 
			"GET", "iframe_dashboard");
        });
	})
</script>

</html>