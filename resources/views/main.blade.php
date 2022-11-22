<!DOCTYPE html>
<html>
<head>
	<title>{{ __('main.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
	<style type="text/css">
		.toogle-icon img {
			max-width: 45%;
		}
		.sidebar-heading {
			margin-top: 2%;
			display:flex;
    		align-items:center;
		}
		.list-group-item {
			border: 0;
			margin-top: 15%;
		}
		.logo-text {
			font-size: 4.5vh;
			text-align: center;
		}
		.list-group-item img {
			max-width: 17%;
			position: absolute;
			right: 70%;
			margin-right: 2%;
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
			max-width: 60%;
			max-height: 60%;
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
		.modal-header-notification {
			border-bottom: 0 none;
			-webkit-border-top-left-radius: 5px;
			-webkit-border-top-right-radius: 5px;
			-moz-border-radius-topleft: 5px;
			-moz-border-radius-topright: 5px;
			border-top-left-radius: 5px;
			border-top-right-radius: 5px;
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
		<div class="border-right active" id="sidebar-wrapper">
			<div class="sidebar-heading">
				<img src="{{ url('/pictures/logo.png') }}" alt="Logo">
				<span class="logo-text">Stream</span>
			</div>
			<div class="card" style="margin-bottom: 1rem;">
				<!-- STYLINGNYA GUA GABISA SORRY BANGET -ILYAS -->
				<a class="collapsed" data-toggle="collapse" href="#web-collapse" aria-expanded="true" aria-controls="web-collapse">
					<div class="card-header">
						<div class="div-dropdown-title">
							<span class="dropdown-title-text">WEB</span>
							<img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
						</div>
					</div>
				</a>
				<div id="web-collapse" class="collapse show" data-parent="#sidebar-wrapper">
					@foreach (Session::get('menuList') as $menu)
					<div class="list-group list-group-flush">
						<a href="{{ url($menu['link']) }}" target="iframe_dashboard" class="list-group-item list-group-item-action">
							<div class="color-active"></div>
							<img src="{{ url('/icons/sidebar/' . $menu['icon']) }}" alt="Home">
							<img src="{{ url('/icons/sidebar/' . $menu['icon-name'] . '-bg.svg') }}" class="image-hover" alt="{{ $menu['title'] }}">
							<span>{{ $menu['title'] }}</span>
							<span class="tooltiptext">{{ $menu['title'] }}</span>
						</a>
					</div>
					@endforeach
				</div>
			</div>
			<!-- <br> -->
			<div class="card">
				<a class="collapsed" data-toggle="collapse" href="#mob-collapse" aria-expanded="true" aria-controls="mob-collapse">
					<div class="card-header">
						<div class="div-dropdown-title">
							<span class="dropdown-title-text">MOB</span>
							<img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
						</div>
					</div>
				</a>
				<div class="collapse" id="mob-collapse" data-parent="#sidebar-wrapper">
					@foreach (Session::get('menuListMob') as $menu)
					<div class="list-group list-group-flush">
						<a href="{{ url($menu['link']) }}" target="iframe_dashboard" class="list-group-item list-group-item-action">
							<div class="color-active"></div>
							<img src="{{ url('/icons/mob/sidebar/' . $menu['icon']) }}" alt="Home">
							<img src="{{ url('/icons/mob/sidebar/' . $menu['icon-name'] . '-bg.svg') }}" class="image-hover" alt="{{ $menu['title'] }}">
							<span>{{ $menu['title'] }}</span>
							<span class="tooltiptext">{{ $menu['title'] }}</span>
						</a>
					</div>
					@endforeach
				</div>
			</div>
			<footer class="footer" id="footer">
				<div class="container">
					<span class="text-muted">© Copyright <br>PT Intikom Berlian Mustika <br>2021</span>
				</div>
			</footer>
		</div>
		<div class="bg-light" id="page-content-wrapper">

			<nav class="navbar navbar-expand-lg navbar-light border-bottom">
				<a href="#" class="toogle-icon" id="menu-toggle"><img src="{{ url('/pictures/bars-white.png') }}" alt="Toogle"></a>

				<div class="navbar-collapse breadcrumb-link" id="div-breadcrumbs">
					
				</div>
				<div class="navbar-collapse company-link" style="display: block !important;">
					<span>{{ Session::get('companyName') }}</span> 
				</div>
				<div class="navbar-collapse right-link">
					<span class="navbar-divide-complete">|</span>
					<div class="img-setting-link"><a href="{{ url('/utilities') }}" target="iframe_dashboard"><img src="{{ url('/pictures/setting-white.png') }}" alt="Setting"></a></div>
					<span class="navbar-divide">|</span>
					<div class="dropdown-profile">
						@if(Session::get('photo') == NULL)
						<img src="{{ url('/pictures/default-profile.png') }}" alt="Profile">
						@else
						<img src="{{ url(Session::get('photo')) }}" alt="Profile">
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
	</div>
	<div class="modal fade" id="modal_change_language" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            	<div class="modal-header" id="modal-header-change-language">
                    <h5 class="modal-title">Change Language</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="change_language_form" method="post">
                    	@csrf
                    	<div class="row">
                    		<div class="col-6">
                    			<div class="form-check form-check-change-language">
                    				<input class="form-check-input" type="radio" name="change_language" id="change_language_english" value="en">
                    				<label class="form-check-label label-change-language" for="change_language_english">English</label>
                    			</div>
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-6">
                    			<div class="form-check form-check-change-language">
                    				<input class="form-check-input" type="radio" name="change_language" id="change_language_bahasa_indonesia" value="id">
                    				<label class="form-check-label label-change-language" for="change_language_bahasa_indonesia">Bahasa Indonesia</label>
                    			</div>
                    		</div>
                    	</div>
                </div>
                <div class="modal-footer justify-content-between" id="modal-footer-change-language">
                    <button type="submit" class="btn btn-primary w-50"><i class="fa fa-check"></i> Confirm</button>
                    <button type="button" class="btn btn-danger w-50" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="notification_error">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification">
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
                <div class="modal-header modal-header-notification">
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
</body>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
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
		});

	})(jQuery);

	$(document).ready(function() {
		$('.list-group-item-action').first().toggleClass('active');
		$('.list-group-item-action').first().find('.color-active').toggleClass('active');

		$('.list-group-item-action').on('click', function () {
			$('.list-group-item-action').removeClass('active');
			$('.color-active').removeClass('active');
			$(this).find('.color-active').toggleClass('active');
			$(this).toggleClass('active');
		});

		$('#web-collapse').on('shown.bs.collapse', function () {
			console.log("Yes");
			$("#footer").css("padding-top", "4%");
		});

		$('#web-collapse').on('hidden.bs.collapse', function () {
			$("#footer").css("padding-top", "0");
		});

		$('#iframe_dashboard').load(function() {
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