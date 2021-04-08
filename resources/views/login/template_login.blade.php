<!DOCTYPE html>
<html>
<head>
	@yield('title-content')
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ URL::asset('/pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<style type="text/css">
		@font-face {
			font-family: Montserrat;
			src: url('{{ url('/fonts/Montserrat-SemiBold.ttf') }}');
		}
		@font-face {
			font-family: Inter;
			src: url('{{ url('/fonts/Inter-SemiBold.ttf') }}');
		}
		body{
			display: block;
		}
		a{
			display: inline-block;
			align-items: center;
		}
		.right-content img {
			display: block;
			float: left;
			margin-right: 3%;
			height: auto;
		}
		.right-content p {
			clear: both;
		}
		.logo-text {
			display: block;
			float: left;
			font-family: Montserrat;
			color: #106DA7;
			font-weight: 500;
		}
		.judul-text {
			display: block;
			font-family: Inter;
			font-size: 4.7vh;
		}
		.forgot-password-text {
			display: block;
			font-family: Montserrat;
			font-size: 2.3vh;
			font-weight: 500;
		}
		form label {
			display: block;
			font-family: Montserrat;
			padding-top: 0.5%;
			font-size: 2.3vh;
			font-weight: 500;
		}
		footer {
			height: 7%;
			bottom: 0;
			width: 100%;
			max-width: 50%;
			display: block;
			font-size: 2.5vh;
		}
		.danger {
			border-color: #f44336;
		}
	</style>
	@yield('css-content')
</head>
<body>
	@yield('content')
</body>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
@yield('js-content')
</html>