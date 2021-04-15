<!DOCTYPE html>
<html>
<head>
	<title>{{ __('home.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
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
		.sidebar-heading img {
			max-width: 25%;
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
		.list-group-item .color-active {
			position: relative;
			left: 10%;
			background-color: #004883;
		}
	</style>
</head>

<body>
	<div class="d-flex" id="wrapper">
		<div class="border-right" id="sidebar-wrapper">
			<div class="sidebar-heading">
				<img src="{{ url('/pictures/logo.png') }}" alt="Logo">
				<span class="logo-text">Stream</span>
			</div>
			<div class="list-group list-group-flush">
				<a href="#" class="list-group-item list-group-item-action">
					<div class="color-active"></div>
					<img src="{{ url('/icons/sidebar/home.png') }}" alt="Home">
					<img src="{{ url('/icons/sidebar/home-bg.png') }}" class="image-hover" alt="Home"> 
					<span>Home</span>
				</a>
				<a href="#" class="list-group-item list-group-item-action">
					<img src="{{ url('/icons/sidebar/personel.png') }}" alt="Personel"> 
					<img src="{{ url('/icons/sidebar/personel-bg.png') }}" class="image-hover" alt="Personel">
					<span>Personel</span>
				</a>
				<a href="#" class="list-group-item list-group-item-action">
					<img src="{{ url('/icons/sidebar/time_management.png') }}" alt="Time Management"> 
					<img src="{{ url('/icons/sidebar/time_management-bg.png') }}" class="image-hover" alt="Time Management">
					<span>Time Management</span>
				</a>
				<a href="#" class="list-group-item list-group-item-action">
					<img src="{{ url('/icons/sidebar/payroll.png') }}" alt="Payroll"> 
					<img src="{{ url('/icons/sidebar/payroll-bg.png') }}" class="image-hover" alt="Payroll">
					<span>Payroll</span>
				</a>
				<a href="#" class="list-group-item list-group-item-action">
					<img src="{{ url('/icons/sidebar/report.png') }}" alt="Report"> 
					<img src="{{ url('/icons/sidebar/report-bg.png') }}" class="image-hover" alt="Report">
					<span>Report</span>
				</a>
				<a href="#" class="list-group-item list-group-item-action">
					<img src="{{ url('/icons/sidebar/medical.png') }}" alt="Medical"> 
					<img src="{{ url('/icons/sidebar/medical-bg.png') }}" class="image-hover" alt="Home">
					<span>Medical</span>
				</a>
			</div>
			<div>
				<ul class="pagination">
					<li><a href="#">1</a></li>
					<li class="active"><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
				</ul>
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
				<div class="navbar-collapse breadcrumb-link">
					<?php $link = "" ?>
					@for($i = 1; $i <= count(Request::segments()); $i++)
						@if($i < count(Request::segments()) & $i > 0)
							<?php $link .= "/" . Request::segment($i); ?>
							<a href="<?= $link ?>">{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</a> /
						@else {{ucwords(str_replace('-',' ',Request::segment($i)))}}
						@endif
					@endfor
				</div>
				<div class="navbar-collapse company-link" style="display: block !important;">
					<span>PT {{ Session::get('companyName') }} Berlian Mustika</span> 
				</div>
				<div class="navbar-collapse right-link">
					<span class="navbar-divide-complete">|</span>
					<div class="img-setting-link"><a href="#"><img src="{{ url('/pictures/setting-white.png') }}" alt="Setting"></a></div>
					<span class="navbar-divide">|</span>
					<div class="dropdown-profile">
						@if(Session::get('photo') == NULL)
						<img src="{{ url('/pictures/default-profile.png') }}" alt="Profile">
						@else
						<img src="{{ url(Session::get('photo')) }}" alt="Profile">
						@endif
						<div class="dropdown-profile-content dropdown-menu">
							<p>Hello, {{ Session::get('userName') }}</p>
							<p>Welcome Back</p>
							<hr>
							<a class="dropdown-item" href="#"><img src="{{ url('/pictures/languages.png') }}" alt="Languages"> <span>Change Language</span></a>
							<a class="dropdown-item" href="#"><img src="{{ url('/pictures/password.png') }}" alt="Password"> <span>Change Password</span></a>
							<a class="dropdown-item" href="#"><img src="{{ url('/pictures/sign_out.png') }}" alt="Logout"> <span>Sign Out</span></a>
						</div>
					</div>
				</div>
			</nav>

			<div class="container-fluid">
				
			</div>
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
    $("#menu-toggle").click(function(e) {
      e.preventDefault();	
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</html>