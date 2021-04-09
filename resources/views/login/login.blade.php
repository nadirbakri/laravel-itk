@extends('login.template_login')

@section('title-content')
	<title>{{ __('login.judul') }}</title>
@endsection

@section('css-content')
<style type="text/css">
	@media only screen and (max-width: 2600px) {
		body{
			background: url('{{ url('/pictures/bg_image_login.png') }}');
			background-size: 75% !important;
			background-position: 100% -5% !important;
			background-repeat: no-repeat;
			padding-top: 6%;
		}
		a{
			width: -webkit-fill-available;
		}
		.right-content {
			margin-left: 6%;
			max-width: 24%;
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
			background: url('{{ url('/pictures/bg_image_login.png') }}');
			background-size: 70% !important;
			background-position: 100% 100% !important;
			background-repeat: no-repeat;
			padding-top: 4%;
		}
		.right-content {
			margin-left: 6%;
			max-width: 25%;
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
			position: unset;
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
			padding-left: 27%;
			align-items: center;
			text-align: center;
			vertical-align: middle;
		}
		a{
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
			position: unset;
			margin-left: 6%;
			align-items: center;
			text-align: center;
			vertical-align: middle;
		}
		label,input{
			display: inline-block;
			text-align: left;
		}
		.label-checkbox {
			display: inline-block;
			text-align: center;
		}
	}
	.bawah-judul-text {
		display: block;
		font-size: 2.3vh;
	}
	.judul-text {
		padding-top: 1%;
	}
	.modal-header {
		padding: 2%;
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
			<p class="judul-text">{{ __('login.judul') }}</p>
			<p class="bawah-judul-text">{{ __('login.bawah_judul') }}</p>

			<form id="login_form" action="{{ url('login/proses') }}" method="post">
				@csrf
				<div class="form-group">
					<label>{{ __('login.label_username') }}</label>
					<input type="text" class="form-control" name="username_login" id="username_login" value="{{ old('username_login') }}" placeholder="{{ __('login.placeholder_username') }}">
                    <span id="#username_error" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>{{ __('login.label_password') }}</label>
					<div class="input-group">
						<input type="password" class="form-control" name="password_login" id="password_login" placeholder="{{ __('login.placeholder_password') }}">
						<div class="input-group-append">
							<button class="btn rounded-right" type="button" id="show_password"><i id="icon_show_password" class="fa fa-eye" aria-hidden="true"></i></button>
						</div>
						<span id="#password_error" class="text-danger"></span>
					</div>
				</div>
				<p class="forgot-password-text"><a href="{{ url('reset_password') }}">{{ __('login.label_forgot_password') }}</a></p>
				<div class="row">
					<div class="col-6 form-group">
						<button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" style="width: 100%;">
							<i class="fa fa-sign-in"></i> {{ __('login.button_login') }}
						</button>
					</div>
					<div class="col-6 form-group">
						<button type="button" class="btn btn-primary" name="btn_clear" id="btn_clear" style="width: 100%;" disabled="true">
							{{ __('login.button_clear') }}
						</button>
					</div>
				</div>
				<div class="form-group">
					<label class="label-checkbox" for="chk_demo_account"><input type="checkbox" name="chk_demo_account" id="chk_demo_account" /> <span>{{ __('login.label_demo_account') }}</span></label>
				</div>
				
				<div class="form-group">
					<select class="form-control" name="pilih_bahasa" id="pilih_bahasa">
						@foreach (Config::get('languages') as $lang => $language)
							@if ($lang == App::getLocale())
								<option value="{{ route('lang.switch', $lang) }}" selected>{{ $language }}</option>
							@else
								<option value="{{ route('lang.switch', $lang) }}">{{ $language }}</option>
							@endif
						@endforeach
					</select>
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
<script>
	var exist = '{{$errors->any()}}';
	if(exist){
		$('#notification').modal('show');
	}
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#notification').on('hidden.bs.modal', function () {
			$('#notification').modal('hide');
		})
		$("#show_password").on('click', function(event) {
			event.preventDefault();
			if($('#password_login').attr("type") == "text"){
				$('#password_login').attr('type', 'password');
				$('#icon_show_password').addClass( "fa-eye" );
				$('#icon_show_password').removeClass( "fa-eye-slash" );
			}else if($('#password_login').attr("type") == "password"){
				$('#password_login').attr('type', 'text');
				$('#icon_show_password').removeClass( "fa-eye" );
				$('#icon_show_password').addClass( "fa-eye-slash" );
			}
		});

		$('#pilih_bahasa').on('change', function () {
			var url = $(this).val();
			if(url) { 
				window.location = url; 
			}
			return false;
		});

		$("#btn_clear").click(function(){
			$('#login_form').trigger("reset");
			$("#btn_clear").attr('disabled', true);
		}); 

		if($("#login_form").length > 0) {
			$("#login_form").validate({
				rules: {
					username_login: {
						required: true,
					},
					password_login: {
						required: true,
					},
				},
				messages: {
					username_login: {
						required: "{{ __('login.username_required') }}",
					},
					password_login: {
						required: "{{ __('login.password_required') }}",
					},
				},
				highlight: function(element) {
					jQuery(element).closest('.form-control').addClass('is-invalid');
					$('#show_password').addClass('danger');
				},
				unhighlight: function(element) {
					jQuery(element).closest('.form-control').removeClass('is-invalid');
					$('#show_password').removeClass('danger');
				},
				errorElement: 'label',
				errorClass: 'text-danger',
				errorPlacement: function(error, element) {
					if(element.parent('.input-group').length) {
						error.insertAfter(element.parent());
					} else {
						error.insertAfter(element);
					}
				}
			})
		} 
	});
</script>

@endsection