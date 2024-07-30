@extends('login.template_login')

@section('title-content')
	<title>{{ __('reset_password.judul') }}</title>
@endsection

@section('css-content')
<style type="text/css">
	@media only screen and (max-width: 2600px) {
		body{
			background: url('/pictures/bg_image_reset_password.svg');
			background-size: 50% !important;
			background-position: 95% -1500% !important;
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
			background: url('/pictures/bg_image_reset_password.svg');
			background-size: 50% !important;
			background-position: 95% -1300% !important;
			background-repeat: no-repeat;
			padding-top: 4%;
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
			padding-left: 31%;
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
				<img src="{{ url('/pictures/blue-logo.png') }}" alt="Logo">
			</a>
			<p class="judul-text">{{ __('reset_password.judul') }}</p>
			<p class="bawah-judul-text">{{ __('reset_password.bawah_judul') }}</p>

			<form id="reset_password_form" method="post">
				@csrf
				<div class="form-group form-invalid">
					<label>{{ __('reset_password.label_email') }}</label>
					<input type="email" class="form-control" name="email_reset_password" id="email_reset_password" value="{{ old('email_reset_password') }}" placeholder="{{ __('reset_password.placeholder_email') }}">
					<label class="text-danger">&nbsp;</label>
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
			<span class="text-muted">© Copyright PT Intikom Berlian Mustika {{ date('Y') }}</span>
		</div>
	</footer>
	<div class="modal fade" role="dialog" id="notification">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Error!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<span id="message-notification">{{ $errors->first() }}</span>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js-content')
<script type="text/javascript">
	$(document).ready(function() {
		if($("#reset_password_form").length > 0) {
			$("#reset_password_form").validate({
				rules: {
					email_reset_password: {
						required: true,
						email: true,
					},
				},
				messages: {
					email_reset_password: {
						required: "{{ __('reset_password.email_required') }}",
						email: "{{ __('reset_password.email_email') }}",
					},
				},
				highlight: function(element) {
					jQuery(element).closest('.form-control').addClass('is-invalid');
				},
				unhighlight: function(element) {
					jQuery(element).closest('.form-control').removeClass('is-invalid');
				},
				errorElement: 'label',
				errorClass: 'text-danger',
				errorPlacement: function(error, element) {
					if(element.parent('.input-group').length) {
						error.insertAfter(element.parent());
					} else {
						error.insertAfter(element);
					}
				},
				submitHandler: function(form) {
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					$.ajax({
						url: "{{ url('reset_password/proses') }}",
						type: "POST",
						data: $('#reset_password_form').serialize(),
						success: function(response) {
							if(response.status == "true"){
								window.location = response.message;
							}else{
								$('#notification').modal('show');
								$('#message-notification').html(response.message);
							}
						},
						error: function(response) {
							$('#notification').modal('show');
							$('#message-notification').html(response);
						}
					});
				}
			})
		} 
	});
</script>
@endsection