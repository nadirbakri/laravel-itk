<!DOCTYPE html>
<html>
<head>
<title>{{ __('report.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/report.css') }}">
	<style type="text/css">
		.div-report {
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
    <div class="div-report">
        <div class="div-title">
			<img src="{{ url('icons/sidebar/report.png') }}" alt="Title">
			<span class="title-text">{{ __('report.judul') }}</span>
		</div>
        <div class="card">
            <a class="collapsed" data-toggle="collapse"  href="#report-export-data" aria-expanded="true" aria-controls="report-export-data">
                <div class="card-header">
                    <div class="div-dropdown-title">
                        <img class="dropdown-logo" src="{{ url('icons/sidebar/report.png') }}" alt="report">
                        <span class="dropdown-title-text">{{__('report.export_data')}}</span>
                        <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                    </div>
                </div>
            </a>
            <div id="report-export-data" class="collapse">
                <div class="card-block">
                    <div class="row div-child-data">
                        <div class="col col-3">
                            <a href="{{ url('report/export_medical') }}" target="iframe_dashboard">
                                <img src="{{ url('/icons/report/submenu-report.svg') }}" alt="Child report">
                                <span class="child-title-text">{{ __('report.medical') }}</span>
                            </a>
                        </div>
                        <div class="col col-3">
                            <a href="{{ url('report/export_reimbursement') }}" target="iframe_dashboard">
                                <img src="{{ url('/icons/report/submenu-report.svg') }}" alt="Child report">
                                <span class="child-title-text">{{ __('report.reimbursement') }}</span>
                            </a>
                        </div>
                        <div class="col col-3">
                            <a href="{{ url('report/export_workflow') }}" target="iframe_dashboard">
                                <img src="{{ url('/icons/report/submenu-report.svg') }}" alt="Child report">
                                <span class="child-title-text">{{ __('report.workflow') }}</span>
                            </a>
                        </div>
                        <div class="col col-3">
                            <a href="{{ url('report/export_transport') }}" target="iframe_dashboard">
                                <img src="{{ url('/icons/report/submenu-report.svg') }}" alt="Child report">
                                <span class="child-title-text">{{ __('report.transport') }}</span>
                            </a>
                        </div>
                        <div class="col col-3">
                            <a href="{{ url('report/export_attendance') }}" target="iframe_dashboard">
                                <img src="{{ url('/icons/report/submenu-report.svg') }}" alt="Child report">
                                <span class="child-title-text">{{ __('report.attendance') }}</span>
                            </a>
                        </div>
                        <div class="col col-3">
                            <a href="{{ url('report/export_business_trip') }}" target="iframe_dashboard">
                                <img src="{{ url('/icons/report/submenu-report.svg') }}" alt="Child report">
                                <span class="child-title-text">{{ __('report.business_trip') }}</span>
                            </a>
                        </div>
                        <div class="col col-3">
                            <a href="{{ url('report/export_overtime') }}" target="iframe_dashboard">
                                <img src="{{ url('/icons/report/submenu-report.svg') }}" alt="Child report">
                                <span class="child-title-text">{{ __('report.overtime') }}</span>
                            </a>
                        </div>
                        <div class="col col-3">
                            <a href="{{ url('report/export_pdf_business_trip') }}" target="iframe_dashboard">
                                <img src="{{ url('/icons/report/submenu-report.svg') }}" alt="Child report">
                                <span class="child-title-text">{{ __('report.pdf_business_trip') }}</span>
                            </a>
                        </div>
                        <div class="col col-3">
                            <a href="{{ url('report/export_business_trip_checking') }}" target="iframe_dashboard">
                                <img src="{{ url('/icons/report/submenu-report.svg') }}" alt="Child report">
                                <span class="child-title-text">{{ __('report.business_trip_checking') }}</span>
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