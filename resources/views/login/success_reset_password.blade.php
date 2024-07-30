@extends('login.template_login')

@section('title-content')
	<title>{{ __('success_reset_password.judul') }}</title>
@endsection

@section('css-content')
<style type="text/css">
	@media only screen and (max-width: 2600px) {
		body{
			background: url('/pictures/bg_image_success_reset_password.svg');
			background-size: 50% !important;
			background-position: 90% 60% !important;
			background-repeat: no-repeat;
			padding-top: 6%;
		}
		.image-logo{
			width: -webkit-fill-available;
			margin-bottom: 5%;
		}
		.right-content {
			margin-left: 6%;
			max-width: 30%;
			display: block;
		}
		.right-content img {
			max-width: 100%;
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
			background: url('/pictures/bg_image_success_reset_password.svg');
			background-size: 50% !important;
			background-position: 90% 60% !important;
			background-repeat: no-repeat;
			padding-top: 4%;
		}
		.image-logo{
			margin-bottom: 7%;
		}
		.right-content {
			margin-left: 6%;
			max-width: 27%;
			display: block;
		}
		.right-content img {
			max-width: 100%;
		}
		.logo-text {
			font-size: 6.5vh;
		}
		.judul-text {
			font-size: 4vh;
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
		.right-content img {
			max-width: 100%;
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
			vertical-align: middle;
		}
	}
	.bawah-judul-text {
		display: block;
		font-size: 2.3vh;
		padding-top: 10%;
	}
	.bawah-judul-text-dua {
		display: block;
		font-size: 2.3vh;
		padding-bottom: 10%;
	}
	.fa-check-circle {
		color: #00A862;
		max-height: 20%;
		margin-right: 3%;
	}
</style>
@endsection

@section('content')
	<main role="main">
		<div class='right-content'>
			<a class="image-logo">
				<img src="{{ url('/pictures/blue-logo.png') }}" alt="Logo">
			</a>
			<p class="judul-text"><i class="fa fa-check-circle fa-lg" aria-hidden="true"></i> {{ __('success_reset_password.judul_dua') }}</p>
			<p class="bawah-judul-text">{{ __('success_reset_password.bawah_judul') }}</p>
			<p class="bawah-judul-text-dua">{{ __('success_reset_password.bawah_judul_dua') }}</p>
			<div class="row">
				<div class="col-12 form-group">
					<a href="{{ url('login') }}" class="btn btn-primary" name="btn_back" id="btn_back" style="width: 100%;">
						{{ __('success_reset_password.button_back') }}
					</a>
				</div>
			</div>
			<p class="bawah-judul-text">{{ __('success_reset_password.bawah_button') }}</p>
			<p class="bawah-judul-text-dua">{!! __('success_reset_password.bawah_button_dua') !!}</p>
		</div>
	</main>
	<footer class="footer">
		<div class="container">
			<span class="text-muted">© Copyright PT Intikom Berlian Mustika {{ date('Y') }}</span>
		</div>
	</footer>
@endsection

@section('js-content')

@endsection