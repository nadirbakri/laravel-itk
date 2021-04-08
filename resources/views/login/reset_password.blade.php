@extends('login.template_login')

@section('title-content')
	<title>{{ __('reset_password.judul') }}</title>
@endsection

@section('css-content')
<style type="text/css">
	@media only screen and (max-width: 2600px) {
		body{
			background: url('{{ url('/pictures/bg_image_reset_password.png') }}');
			background-size: 50% !important;
			background-position: 90% -5% !important;
			background-repeat: no-repeat;
			padding-top: 6%;
		}
		a{
			width: -webkit-fill-available;
		}
		.right-content {
			margin-left: 6%;
			max-width: 27%;
			display: block;
		}
		.right-content img {
			max-width: 18%;
		}
		.logo-text {
			font-size: 6.5vh;
		}
		.judul-text {
			font-size: 4.7vh;
		}
		#pilih_bahasa{
			max-width: 45%;
		}
		footer{
			position: fixed;
			margin-left: 4.8%;
		}
	}
	@media only screen and (max-width: 1390px) {
		body{
			background: url('{{ url('/pictures/bg_image_reset_password.png') }}');
			background-size: 50% !important;
			background-position: 90% -5% !important;
			background-repeat: no-repeat;
			padding-top: 4%;
		}
		.right-content {
			margin-left: 6%;
			max-width: 27%;
			display: block;
		}
		.right-content img {
			max-width: 13%;
		}
		.logo-text {
			font-size: 6.5vh;
		}
		.judul-text {
			font-size: 4.7vh;
		}
		#pilih_bahasa{
			max-width: 45%;
		}
		footer{
			position: fixed;
			margin-left: 4.8%;
		}
	}
	@media only screen and (max-width: 990px) {
		body{
			background: unset;
			margin-left: 25%;
			padding-top: 4%;
		}
		.right-content {
			margin-left: 6%;
			max-width: 50%;
			display: block;
			align-items: center;
			text-align: center;
			vertical-align: middle;
		}
		.image-logo{
			padding-left: 30%;
			align-items: center;
			text-align: center;
			vertical-align: middle;
		}
		a{
			padding-left: 10%;
			align-items: center;
			text-align: center;
			vertical-align: middle;
		}
		.right-content img {
			max-width: 12%;
		}
		.logo-text {
			font-size: 5vh;
		}
		.judul-text {
			font-size: 4vh;
		}
		#pilih_bahasa{
			max-width: 100%;
		}
		footer{
			position: fixed;
			margin-left: -2%;
			align-items: center;
			text-align: center;
			vertical-align: middle;
		}
		label,input{
			display: inline-block;
			text-align: left;
		}
	}
	.bawah-judul-text {
		display: block;
		font-size: 2.3vh;
		padding-bottom: 5%;
	}
	.judul-text {
		padding-top: 3%;
	}
	#btn_submit {
		margin-top: 5%;
	}
</style>
@endsection

@section('content')
	<main role="main">
		<div class='right-content'>
			<a class="image-logo">
				<img src="{{ url('/pictures/logo.png') }}" alt="Logo">
				<h4 class="logo-text">Stream</h4>
			</a>
			<p class="judul-text">{{ __('reset_password.judul') }}</p>
			<p class="bawah-judul-text">{{ __('reset_password.bawah_judul') }}</p>

			<form id="reset_password_form" action="" method="post">
				@csrf
				<div class="form-group">
					<label>{{ __('reset_password.label_email') }}</label>
					<input type="email" class="form-control" name="email_reset_password" id="email_reset_password" value="{{ old('email_reset_password') }}" placeholder="{{ __('reset_password.placeholder_email') }}">
				</div>
				<div class="row">
					<div class="col-12 form-group">
						<button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" style="width: 100%;">
							{{ __('reset_password.button_otp') }}
						</button>
					</div>
				</div>
			</form>
		</div>
	</main>
	<footer class="footer">
		<div class="container">
			<span class="text-muted">© Copyright PT Intikom Berlian Mustika 2021</span>
		</div>
	</footer>
@endsection

@section('js-content')

@endsection