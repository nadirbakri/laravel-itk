<!DOCTYPE html>
<html>
<head>
	<title>{{ __('main.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
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
	</style>
</head>

<body>
	<div class="d-flex" id="wrapper">
		<div class="border-right active" id="sidebar-wrapper">
			<div class="sidebar-heading">
				<img src="{{ url('/pictures/logo.png') }}" alt="Logo">
				<span class="logo-text">Stream</span>
			</div>
			<div class="list-group list-group-flush">
				@foreach (Session::get('menuList') as $menu)
				<a href="{{ url($menu['link']) }}" target="iframe_dashboard" class="list-group-item list-group-item-action">
					<div class="color-active"></div>
					<img src="{{ url('/icons/sidebar/' . $menu['icon']) }}" alt="Home">
					<img src="{{ url('/icons/sidebar/' . $menu['icon-name'] . '-bg.png') }}" class="image-hover" alt="{{ $menu['title'] }}">
					<span>{{ $menu['title'] }}</span>
					<span class="tooltiptext">{{ $menu['title'] }}</span>
				</a>
				@endforeach
			</div>
			<footer class="footer">
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
							<a class="dropdown-item" href="#"><img src="{{ url('/pictures/languages.png') }}" alt="Languages"> <span>{{ __('main.bahasa') }}</span></a>
							<a class="dropdown-item" href="#"><img src="{{ url('/pictures/password.png') }}" alt="Password"> <span>{{ __('main.password') }}</span></a>
							<a class="dropdown-item" href="{{ url('logout') }}"><img src="{{ url('/pictures/sign_out.png') }}" alt="Logout"> <span>{{ __('main.logout') }}</span></a>
						</div>
					</div>
				</div>
			</nav>
			<iframe src="{{ url('/home') }}" name="iframe_dashboard" id="iframe_dashboard" class="container-fluid" frameborder="0"></iframe>
		</div>
	</div>
</body>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
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
	});
</script>

</html>