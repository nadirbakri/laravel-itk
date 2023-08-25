<!DOCTYPE html>
<html>
<head>
<title>{{ __('export.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/export.css') }}">
	<style type="text/css">
		.div-export {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
		.modal-header-notification-error {
            border-bottom: 1px solid #eee;
            background-color: #f44336;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
	</style>
</head>
<body>
    <div class="div-export">
        <div class="div-title">
			<img src="{{ url('icons/mob/sidebar/streammobportal-navbar-export.svg') }}" alt="Title">
			<span class="title-text">{{ __('export.judul') }}</span>
		</div>
        <div class="card">
			<a class="collapsed" data-toggle="collapse" href="#export-data" aria-expanded="true" aria-controls="export-data">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="{{ url('/icons/export/export-data.svg') }}" alt="export">
						<span class="dropdown-title-text">Export Data</span>
						<img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="export-data" class="collapse">
				<div class="card-block">
					<div class="row div-child-data">
					@foreach($dataParent as $key2 => $value2)
						<div class="col col-3">
							<a href="{{ url($value2->pageURL) }}" target="iframe_dashboard">
								<img src="{{ url('/icons/export/submenu-export-data.svg') }}" alt="Child export">
								<span class="child-title-text">{{ $value2->menuName }}</span>
							</a>
						</div>
					@endforeach
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