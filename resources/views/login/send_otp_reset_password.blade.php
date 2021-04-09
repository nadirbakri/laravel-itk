@extends('login.template_login')

@section('title-content')
	<title>{{ __('send_otp_reset_password.judul') }}</title>
@endsection

@section('css-content')
<style type="text/css">
	@media only screen and (max-width: 2600px) {
		body{
			background: url('{{ url('/pictures/bg_image_reset_password.png') }}');
			background-size: 50% !important;
			background-position: 75% -5% !important;
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
			font-size: 4.5vh;
		}
		.resend-otp-link img {
			max-width: 5%;
		}
		.resend-otp-text {
			font-size: 2.5vh;
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
		.resend-otp-link img {
			max-width: 5%;
		}
		.logo-text {
			font-size: 6.5vh;
		}
		.judul-text {
			font-size: 4.7vh;
		}
		.resend-otp-text {
			font-size: 2.5vh;
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
			max-width: 12%;
		}
		.logo-text {
			font-size: 5vh;
		}
		.judul-text {
			font-size: 4vh;
		}
		.resend-otp-link img{
			max-width: 5%;
		}
		.resend-otp-text {
			font-size: 2.5vh;
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
	.resend-otp-link img{
		margin-right: 1%;
	}
	.enter-otp::-webkit-input-placeholder { /* WebKit browsers */
		font-size: 0.8em;
	}

	.enter-otp:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
		font-size: 0.8em;
	}

	.enter-otp::-moz-placeholder { /* Mozilla Firefox 19+ */
		font-size: 0.8em;
	}

	.enter-otp:-ms-input-placeholder { /* Internet Explorer 10+ */
		font-size: 0.8em;
	} 
	.resend-otp-text {
		display: block;
		float: left;
		font-family: Montserrat;
		color: #106DA7;
		font-weight: 500;
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
			<p class="judul-text">{{ __('send_otp_reset_password.judul') }}</p>
			<p class="bawah-judul-text">{{ __('send_otp_reset_password.bawah_judul') }}</p>
			<a class="resend-otp-link" href="{{ url('reset_password/resend_otp') }}">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Resend">
				<h4 class="resend-otp-text">{{ __('send_otp_reset_password.resend_otp') }}</h4>
			</a>
			<form id="send_otp_form" method="post">
				@csrf
				<div class="form-group">
					<label>{{ __('send_otp_reset_password.label_otp') }}</label>
					<input type="hidden" class="form-control" name="email_otp" id="email_otp" value="yafie.achmad@intikom.co.id">
					<input type="text" class="form-control enter-otp" name="enter_otp" id="enter_otp" value="{{ old('enter_otp') }}" placeholder="{{ __('send_otp_reset_password.placeholder_otp') }}">
				</div>
				<div class="row">
					<div class="col-12 form-group">
						<button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" style="width: 100%;">
							{{ __('send_otp_reset_password.button_send') }}
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
					<span id="message-notification"></span>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js-content')
<script type="text/javascript">
	$(document).ready(function() {
		if($("#send_otp_form").length > 0) {
			$("#send_otp_form").validate({
				rules: {
					email_otp: {
						required: true,
					},
					enter_otp: {
						required: true,
					},
				},
				messages: {
					email_otp: {
						required: "{{ __('reset_password.email_required') }}",
					},
					enter_otp: {
						required: "{{ __('send_otp_reset_password.otp_required') }}",
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
						url: "{{ url('reset_password/send_otp/proses') }}",
						type: "POST",
						data: $('#send_otp_form').serialize(),
						success: function(response) {
							$('#notification').modal('show');
							$('#message-notification').html(response);
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