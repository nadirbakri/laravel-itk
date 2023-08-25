<!DOCTYPE html>
<html>
<head>
	<title>{{ __('utilities.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/utilities.css') }}">
	<style type="text/css">
		.div-utilities {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
	</style>
</head>

<body>
	<div class="div-utilities">
		<div class="div-title">
			<img src="{{ url('/icons/utilities/utilities.png') }}" alt="Title">
			<span class="title-text">{{ __('utilities.judul') }}</span>
		</div>

		<div class="div-menu">
			<?php
				$menuChunks = array_chunk($dataParent, 2);
			?>
			@foreach($menuChunks as $key => $value)
				<div class="row div-child-data">
					<div class="col col-4">
						<a href="{{ url($value[0]->pageURL) }}" target="iframe_dashboard">
							<img src="{{ url('/icons/utilities/submenu-utilities.png') }}" style="max-width: 7.5%;" alt="Child Utilities">
							<span class="child-title-text">{{ $value[0]->menuName }}</span>
						</a>
					</div>
					@if(count($value) > 1)
					<div class="col col-6">
						<a href="{{ url($value[1]->pageURL) }}" target="iframe_dashboard">
							<img src="{{ url('/icons/utilities/submenu-utilities.png') }}" alt="Child Utilities">
							<span class="child-title-text">{{ $value[1]->menuName }}</span>
						</a>
					</div>
					@endif
				</div>
			@endforeach
		</div>
	</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>