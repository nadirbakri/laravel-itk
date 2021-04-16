@extends('login.template_login')

@section('title-content')
	<title>{{ __('reset_password.judul') }}</title>
@endsection

@section('css-content')
<style type="text/css">
	@media only screen and (max-width: 2600px) {
		body{
			background: url('/pictures/bg_image_reset_password.png');
			background-size: 50% !important;
			background-position: 90% -5% !important;
			background-repeat: no-repeat;
			padding-top: 5%;
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
			background: url('/pictures/bg_image_reset_password.png');
			background-size: 50% !important;
			background-position: 90% -5% !important;
			background-repeat: no-repeat;
			padding-top: 3%;
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
			padding-left: 25%;
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
	.count-text {
		font-family: Inter;
		font-size: 2.3vh;
		font-weight: 700;
	}
	.time-text {
		font-family: Inter;
		font-size: 2.3vh;
	}
	.time-text-bold {
		font-weight: 700;
	}
	.bawah-judul-text {
		display: block;
		font-size: 2.3vh;
	}
	.judul-text {
		padding-top: 3%;
	}
	#btn_submit {
		margin-top: 5%;
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
	.text-danger {
		font-size: 1.5vh;
	}
</style>
@endsection

@section('content')
	<main role="main">
		<div class='right-content'>
			<a>
				<img src="{{ url('/pictures/logo.png') }}" alt="Logo">
				<h4 class="logo-text">Stream</h4>
			</a>
			<p class="judul-text">{{ __('resend_reset_password.judul') }}</p>
			<p class="bawah-judul-text">{{ __('resend_reset_password.bawah_judul') }}</p>
			<p class="count-text">{{ __('resend_reset_password.count_otp_one') }} 5 {{ __('resend_reset_password.count_otp_two') }}</p>

			<form id="reset_password_form" method="post">
				@csrf
				<div class="form-group form-invalid">
					<label>{{ __('resend_reset_password.label_email') }}</label>
					<div class="input-group">
						<input type="email" class="form-control" name="email_reset_password" id="email_reset_password" placeholder="{{ __('resend_reset_password.placeholder_email') }}">
						<div class="input-group-append">
							<button class="btn btn-primary rounded-right" type="submit" id="resend_otp">{{ __('resend_reset_password.button_resend') }}</button>
						</div>
					</div>
					<label class="text-danger" id="label-message-email">&nbsp;</label>
				</div>
			</form>
			<p class="time-text">{{ __('resend_reset_password.time_resend_otp_one') }} <span class="time-text-bold" id="time">0:00</span> {{ __('resend_reset_password.time_resend_otp_two') }}</p>
			<form id="send_otp_form" method="post">
				@csrf
				<div class="form-group form-invalid">
					<label>{{ __('resend_reset_password.label_otp') }}</label>
					<input type="hidden" class="form-control" name="email_otp" id="email_otp" value="{{ Session::get('email_reset_password') }}">
					<input type="text" class="form-control enter-otp" name="enter_otp" id="enter_otp" value="{{ old('enter_otp') }}" placeholder="{{ __('resend_reset_password.placeholder_otp') }}">
					<label class="text-danger">&nbsp;</label>
				</div>
				<div class="row">
					<div class="col-12 form-group">
						<button type="submit" class="btn btn-primary" id="send_otp" style="width: 100%;">
							{{ __('resend_reset_password.button_reset') }}
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
					<span id="message-notification">{{ $errors->first() }}</span>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js-content')
<script type="text/javascript">
	$(document).ready(function() {
		// function startTimer(duration, display) {
		// 	var timer = duration, minutes, seconds;
		// 	var time = setInterval(function () {
		// 		minutes = parseInt(timer / 60, 10)
		// 		seconds = parseInt(timer % 60, 10);

		// 		minutes = minutes < 10 ? "0" + minutes : minutes;
		// 		seconds = seconds < 10 ? "0" + seconds : seconds;

		// 		display.text(minutes + ":" + seconds);

		// 		if (--timer < 0) {
		// 			clearInterval(time);
		// 			$('#resend_otp').attr('disabled', false);
		// 		}
		// 	}, 1000);
		// }

		function startTimer(){
			var timer2 = localStorage.getItem('timer');
	        if(timer2 === null) timer2 = "1:00";
	        $('#time').html(timer2);
	        var interval = setInterval(function() {
	        	var timer = timer2.split(':');
	        	var minutes = parseInt(timer[0], 10);
	        	var seconds = parseInt(timer[1], 10);
	        	--seconds;
	        	minutes = (seconds < 0) ? --minutes : minutes;
	        	if (minutes < 0){
	        		clearInterval(interval);
	        		localStorage.removeItem('timer');
	        		$('#resend_otp').attr('disabled', false);
	        	}else{
	        		seconds = (seconds < 0) ? 59 : seconds;
	        		seconds = (seconds < 10) ? '0' + seconds : seconds;
	        		$('#time').html(minutes + ':' + seconds);
	        		timer2 = minutes + ':' + seconds;
	        		localStorage.setItem('timer',timer2);
	        	}
	        }, 1000);
		}

		var timer2 = localStorage.getItem('timer');
		if(timer2 != null){
			startTimer();
			$('#resend_otp').attr('disabled', true);
		}

		function hideLabel(){
			$('#label-message-email').addClass('text-danger');
			$('#label-message-email').removeClass('text-success');
			$('#label-message-email').html('&nbsp;');
		}

		$('#email_reset_password').on("input", function() {
			var dInput = this.value;
			$('#email_otp').val(dInput);
		});

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
						required: "{{ __('resend_reset_password.email_required') }}",
						email: "{{ __('resend_reset_password.email_email') }}",
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
								$('#resend_otp').attr('disabled', true);
								startTimer();
								$('#reset_password_form').trigger("reset");
								$('#label-message-email').addClass('text-success');
								$('#label-message-email').removeClass('text-danger');
								$('#label-message-email').html('OTP Sent. Check your email.');
								$('#label-message-email').show();
								setInterval(hideLabel,3000);
							}else{
								$('#label-message-email').html(response.message);
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
						required: "{{ __('resend_reset_password.email_required') }}",
					},
					enter_otp: {
						required: "{{ __('resend_reset_password.otp_required') }}",
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