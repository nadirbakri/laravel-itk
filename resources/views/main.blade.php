<!DOCTYPE html>
<html>
<head>
	<title>{{ __('main.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
	<style type="text/css">
		.toogle-icon img {
			max-width: 45%;
		}
		.rounded-image {
			max-width: 100%;
			max-height: 100%;
			object-fit: cover;
		}
		.sidebar-heading {
			margin-top: 2%;
			margin-left: 10%;
			display:flex;
    		align-items:center;
		}
		#sidebar-wrapper .list-group-item {
			border: 0;
			margin-top: 10%;
		}
		#sidebar-wrapper.active .list-group-item {
			border: 0;
			margin-top: 15%;
		}
		.logo-text {
			font-size: 4.5vh;
			text-align: center;
		}
		.list-group-item img {
			max-width: 50%;
			position: absolute;
			right: 20%;
			margin-right: 2%;
			margin-bottom: 10%;
			margin-top: 10%;
		}
		.list-group-item span {
			position: absolute;
			left: 30%;
		}
		.navbar {
			background-color: #004883;
		}
		.right-link a {
			display: inline-block;
		}
		.image-hover {
			position: absolute;
			opacity: 0;
			transition: opacity 0.2s ease-out;
		}
		.list-group-item:hover .image-hover {
			opacity: 1;
		}
		.img-setting-link img {
			max-width: 60%;
			max-height: 60%;
		}
		.dropdown-profile img {
			width: 1.6rem;
			height: 1.6rem;
			overflow: hidden;
		}
		.dropdown-profile-content img {
			width: 60%;
			height: 60%;
		}
		#modal-header-change-language {
			border-bottom: 0 none;
		}
		#modal-footer-change-language {
			border-top: 0 none;
		}
		input[name=change_language] {
			-ms-transform: scale(1.5);
			-moz-transform: scale(1.5);
			-webkit-transform: scale(1.5);
			-o-transform: scale(1.5);
			transform: scale(1.5);
			display: table-cell;
    		vertical-align: middle
		}
		.label-change-language {
			font-size: 110%;
			display: inline;
		}
		.form-check-change-language {
			margin-bottom: 7%;	
		}
		.select-company {
			border: none;
			background-color: transparent;
			padding: 5px;
			font-size: 1.5vh;
			width: 15%;
			color: #fff;
			font-family: Montserrat;
		}

		.select-company:focus {
			outline: none;
		}

		.select-company option {
			color: black; /* Font color for non-selected options */
		}
		.modal-header-notification-error {
            border-bottom:1px solid #eee;
            background-color: #f44336;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
        .modal-header-notification-success {
            border-bottom:1px solid #eee;
            background-color: #00a862;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
		.div-title-notification {
			margin: 1.5%;
			margin-top: 2%;
			margin-bottom: 5%;
			font-family: Monserrat;
			text-decoration: none;
			display: flex;
			align-items:center;
			justify-content: center;
		}
		.div-title-notification img {
			max-width: 100%;
			height: 6vh;
			margin-right: 5%;
		}
		.title-text-notification {
			font-family: Inter;
			font-weight: 700;
			font-size: 2.5vw;
			margin-left: 0.5%;
		}
	</style>
</head>

<body>
	<div class="d-flex" id="wrapper">
		<div class="border-right sidebar-bar active" id="sidebar-wrapper">
			<div class="sidebar-heading">
				<img class="full-image" src="{{ url('/pictures/blue-logo.png') }}" alt="Logo">
				<img class="half-image" src="{{ url('/pictures/blue-logos.png') }}" alt="Logo">
			</div>
			
			@foreach (Session::get('menuList') as $menu)

			@if ($menu->companyCode != Session::get('companyCode'))
				@continue
			@endif

			<div class="list-group list-group-flush">
				<a tabindex="0" role="button" data-url="{{ url($menu->link) }}" data-idd="{{ $menu->moduleID }}" class="list-group-item list-group-item-action menu">
					<div class="color-active"></div>
					<img src="{{ url('/icons/sidebar/' . $menu->icon) }}" alt="Home">
					<img src="{{ url('/icons/sidebar/' . $menu->icon_name . '-bg.svg') }}" class="image-hover" alt="{{ $menu->moduleName }}">
					<span>{{ $menu->moduleName }}</span>
					<span class="tooltiptext">{{ $menu->moduleName }}</span>
				</a>
			</div>
			@endforeach
		</div>
		<div class="bg-light" id="page-content-wrapper">

			<nav class="navbar navbar-expand-lg navbar-light border-bottom">
				<a href="javascript:void(0)" class="toogle-icon" id="menu-toggle"><img src="{{ url('/pictures/bars-white.png') }}" alt="Toogle"></a>

				<div class="navbar-collapse breadcrumb-link" id="div-breadcrumbs">
					
				</div>
				<!-- <div id="companyData" class="navbar-collapse company-link" style="display: block !important;">
					<span>{{ Session::get('companyName') }}</span> 
				</div>
				<div id="dropdownCompanyData"class="dropdown-company">
					<span>{{ Session::get('companyName') }}</span> 
					<div id="valueDropdownCompanyData" class="dropdown-company-content dropdown-menu"></div>
				</div> -->
				<select class="select-company" id="select-company" name="select-company"></select>
				<div class="navbar-collapse right-link">
					<span class="navbar-divide-complete">|</span>
					@if(Session::has('haveUtilities'))
					<div class="img-setting-link"><a role="button" data-url="{{ url('/utilities') }}" class="menu" data-idd="UTI" target="iframe_dashboard"><img src="{{ url('/pictures/setting-white.png') }}" alt="Setting"></a></div>
					<span class="navbar-divide">|</span>
					@endif
					<div class="dropdown-profile">
						@if(Session::get('photo') == NULL)
						<img class="rounded-circle" src="{{ url('/pictures/default-profile.png') }}" alt="Profile">
						@else
						<img class="rounded-circle" src="data:image/png;base64, {{ Session::get('photo') }}" alt="Profile">
						@endif
						<div class="dropdown-profile-content dropdown-menu">
							<p>{{ __('main.hello') }}, {{ Session::get('userName') }}</p>
							<p>{{ __('main.welcome') }}</p>
							<hr>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_change_language"><img src="{{ url('/pictures/languages.png') }}" alt="Languages"> <span>{{ __('main.bahasa') }}</span></a>
							<a class="dropdown-item" href="{{ url('change_password') }}" target="iframe_dashboard"><img src="{{ url('/pictures/password.png') }}" alt="Password"> <span>{{ __('main.password') }}</span></a>
							<a class="dropdown-item" href="{{ url('logout') }}"><img src="{{ url('/pictures/sign_out.png') }}" alt="Logout"> <span>{{ __('main.logout') }}</span></a>
						</div>
					</div>
				</div>
			</nav>
			<iframe src="{{ url('/home') }}" name="iframe_dashboard" id="iframe_dashboard" class="container-fluid" frameborder="0"></iframe>
		</div>
		<footer class="footer active" id="footer">
			<div class="container">
				<span class="text-muted">© Copyright PT Intikom Berlian Mustika {{ date('Y') }}</span>
			</div>
		</footer>
	</div>
	<div class="modal fade" id="modal_change_language"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            	<div class="modal-header" id="modal-header-change-language">
                    <h5 class="modal-title">Change Language</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="change_language_form" method="post" style="font-size: 17px;">
                    	@csrf
                    	<div class="row">
                    		<div class="col-12">
								<div class="form-check">
									<input type="radio" id="change_language_english" name="change_language" value="en" selected="none"
										{{ strtolower(App::getLocale()) == 'en' ? 'checked' : '' }}>
									<label for="change_language_english">English</label>
								</div>
                    		</div>
                    	</div>
						<div class="row">
                    		<div class="col-12">
								<div class="form-check">
									<input type="radio" id="change_language_bahasa_indonesia" name="change_language" value="id"
									{{ strtolower(App::getLocale()) == 'id' ? 'checked' : '' }}>
									<label for="change_language_bahasa_indonesia">Bahasa Indonesia</label>
								</div>
                    		</div>
                    	</div>
                </div>
                <div class="modal-footer justify-content-between" id="modal-footer-change-language">
                    <button type="submit" class="btn btn-primary w-25"><i class="fa fa-check"></i> Confirm</button>
                    <button type="button" class="btn btn-danger w-25" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="notification_error">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification-error">
                    <h5 class="modal-title">Error!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="message-notification-error">{{ $errors->first() }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="notification_language_success">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification-success">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                	<div class="div-title-notification">
                		<img src="{{ url('/pictures/checklist-green-confirm-password.svg') }}" alt="Password">
                		<span class="title-text-notification">{{ __('main.language_success_title') }}</span>
                	</div>
                	<div class="div-title-notification">
                    	<span id="message-notification-success">{{ __('main.language_success') }}</span>
                	</div>
                </div>
            </div>
        </div>
    </div>
	<div class="modal fade" role="dialog" id="notification_success">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification-success">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                	<div class="div-title-notification">
                		<img src="{{ url('/pictures/checklist-green-confirm-password.svg') }}" alt="Password">
                		<span class="title-text-notification">{{ __('main.success_title') }}</span>
                	</div>
                	<div class="div-title-notification">
                    	<span id="message-notification-success">{{ __('main.success') }}</span>
                	</div>
                </div>
            </div>
        </div>
    </div>

	<div class="modal fade" role="dialog" id="successModalDownload">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header modal-header-notification-success">
					<h5 class="modal-title">Download Complete</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="div-title-notification">
						<span class="message-notification-success">Your download has been successfully completed!</span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('js/jquery.redirect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
	var msg = '{{Session::get('alert')}}';
	var exist = '{{Session::has('alert')}}';
	if(exist){
		alert(msg);
	}
</script>

<script>
	(function($) {

		"use strict";

		var fullHeight = function() {

			$('.js-fullheight').css('height', $(window).height());
			$(window).resize(function(){
				$('.js-fullheight').css('height', $(window).height());
			});

		};
		fullHeight();

		$('#menu-toggle').on('click', function () {
			$('#sidebar-wrapper').toggleClass('active');
			$('#footer').toggleClass('active');
		});

	})(jQuery);

	// function checkDownloadStatus() {
    //    const interval = setInterval(() => {
    //        $.get('/get-report-filename', function(response) {
    //             if (response.filename) {
    //                 initiateDownload(response.filename); // Trigger download
	// 				$('#successModalDownload').modal('show');
    //                 $.get('/clear-report-filename'); // Clear cached filename after download
    //             }
    //         });
    //     }, 2000); // Poll every 2 seconds
    // }

    // function initiateDownload(filename) {
    //     const link = document.createElement('a');
    //     link.href = `/download-report/${filename}`;
    //     link.download = filename;
    //     link.click();
    // }

	$(document).ready(function() {
		var companyCode = "{{ Session::get('companyCode') }}";
		$('.list-group-item-action').first().toggleClass('active');
		$('.list-group-item-action').first().find('.color-active').toggleClass('active');

		$('.list-group-item-action').on('click', function () {
			$('.list-group-item-action').removeClass('active');
			$('.color-active').removeClass('active');
			$(this).find('.color-active').toggleClass('active');
			$(this).toggleClass('active');
		});

		$('#web-collapse').on('shown.bs.collapse', function () {
			// console.log("Yes");
			$("#footer").css("padding-top", "4%");
		});

		$('#web-collapse').on('hidden.bs.collapse', function () {
			$("#footer").css("padding-top", "0");
		});

		// checkDownloadStatus();

		function setRoundedImage() {
			const images = document.querySelectorAll('.rounded-image');
			
			images.forEach((image) => {
				const width = image.naturalWidth;
				const height = image.naturalHeight;
				
				const minDimension = Math.min(width, height);
				const radius = minDimension / 2;
				
				image.style.borderRadius = `${radius}px`;
			});
		}

		setRoundedImage();

		$(".menu").on('click', function() {
            var data = $(this).data("idd");
			var url = $(this).data('url');
			// console.log(url);
			$.redirect(url, 
			{ 
				'moduleID' : data 
			}, 
			"GET", "iframe_dashboard");
        });

		$('#iframe_dashboard').on('load', function(){
			$.ajax({
				url: "{{ url('home/breadcrumbs') }}",
				type: "GET",
				data: { "url_data" : $(this).get(0).contentWindow.location.href },
				success: function(response) {
					$('#div-breadcrumbs').html(response);
				},
				error: function(response) {
					
				}

			});

			$.ajax({
				url: "{{ url('session_company/api') }}",
				type: "GET",
				data: { "company" : companyCode },
				success: function(response) {
					if(response.length > 0){
						$('#select-company').empty();
						$.each(response, function (k, v) {
							if(v.companyCode != companyCode){
								$('#select-company').append(
									'<option value="' + v.companyCode + '">' + v.companyName + '</option>'
								);
							}else{
								$('#select-company').append(
									'<option value="' + v.companyCode + '" selected>' + v.companyName + '</option>'
								);
							}
						});
					}
				},
				error: function(response) {
					$('#notification_error').modal('show');
					$('#message-notification-error').html(response);
				}

			});
		});

		$('#select-company').on('change', function () {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url: "{{ url('session_company/change') }}",
				type: "POST",
				data: { "companyCode" : $(this).val(), "companyName" : $("#select-company option:selected").text() },
				success: function(response) {
					if(response.status){
						$('#notification_success').modal('show');
						setTimeout(function(){ 
							$('#notification_success').modal('hide');
							window.location.reload();
						}, 3000);
					}else{
						$('#notification_error').modal('show');
						$('#message-notification-error').html(response.message);
					}
				},
				error: function(response) {
					$('#notification_error').modal('show');
					$('#message-notification-error').html(response);
				}

			});
        });

		$('#notification_language_success').on('hide.bs.modal', function () {
			window.location.reload();
		})

		$('#notification_error').on('hide.bs.modal', function () {
			$('#modal_change_language').modal('show');
		})

		$('#modal_change_language').on('show.bs.modal', function () {
			var locale = "{!! config('app.locale') !!}";
			$('input[name=change_language][value=' + locale.toLowerCase() + ']').prop('checked', true);
		})

		if($("#change_language_form").length > 0) {
			$("#change_language_form").validate({
				submitHandler: function(form) {
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					$.ajax({
						url: "{{ url('change_language/proses') }}",
						type: "POST",
						data: $('#change_language_form').serialize(),
						success: function(response) {
							if(response.status){
								$('#modal_change_language').modal('hide');
								$('#notification_language_success').modal('show');
								setTimeout(function(){ 
									$('#notification_language_success').modal('hide');
									window.location.reload();
								}, 3000);
							}else{
								$('#modal_change_language').modal('hide');
								$('#notification_error').modal('show');
								$('#message-notification-error').html(response.message);
							}
						},
						error: function(response) {
							$('#notification_error').modal('show');
							$('#message-notification-error').html(response);
						}

					});
				}
			})
		}
	});

</script>

</html>