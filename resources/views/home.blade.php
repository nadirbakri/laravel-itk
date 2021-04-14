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
		.toogle-icon {
			max-width: 15%;
		}
		.toogle-icon img {
			max-width: 15%;
		}
		.sidebar-heading {
			margin-top: 5%;
			display:flex;
    		align-items:center;
		}
		.sidebar-heading img {
			max-width: 30%;
		}
		.list-group-item {
			border: 0;
			margin-top: 15%;
		}
		.logo-text {
			font-size: 5vh;
			text-align: center;
		}
		.list-group-item img {
			max-width: 20%;
			position: absolute;
			right: 70%;
		}
		.list-group-item span {
			position: absolute;
			left: 30%;
		}
		.navbar {
			background-color: #004883;
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
			<footer class="footer">
				<div class="container">
					<span class="text-muted">© Copyright <br>PT Intikom Berlian Mustika <br>2021</span>
				</div>
			</footer>
		</div>
		<div class="bg-light" id="page-content-wrapper">

			<nav class="navbar navbar-expand-lg navbar-light border-bottom">
				<a href="#" class="toogle-icon" id="menu-toggle"><img src="{{ url('/pictures/bars-white.png') }}" alt="Toogle"></a>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
						<li class="nav-item active">
							<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Dropdown
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<div class="container-fluid">
				<h1 class="mt-4">Simple Sidebar</h1>
				<p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
				<p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>
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