<!DOCTYPE html>
<html>
<head>
    <title>{{ __('time_management.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/time_management.css') }}">
	<style type="text/css">
		.div-time_management {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
	</style>
</head>
<body>
	<div class="div-time_management">
		<div class="div-title">
			<img src="{{ url('icons/sidebar/time_management.png') }}" alt="Title">
			<span class="title-text">{{ __('time_management.judul') }}</span>
		</div>

		@foreach($dataParent as $key => $value)
		<div class="card">
			<a class="collapsed" data-toggle="collapse" href="#{{ $value->pageURL }}" aria-expanded="true" aria-controls="{{ $value->pageURL }}">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="{{ url('/icons/time_management/' . $value->pageURL . '.svg') }}" alt="time management">
						<span class="dropdown-title-text">{{ $value->menuName }}</span>
						<img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="{{ $value->pageURL }}" class="collapse">
				<div class="card-block">
					<?php
						$dataSubMenu = \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess($dataMenu, $value->menuID)
					?>
					@foreach($dataSubMenu as $key2 => $value2)
						@if($value2->isHaveChild)
							<div class="div-head-data">
								<span class="head-title-text">{{ $value2->menuName }}</span>
							</div>
							<div class="row div-child-data">
								<?php
									$dataSubSubMenu = \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess($dataMenu, $value2->menuID)
								?>
								@foreach($dataSubSubMenu as $key3 => $value3)
								<div class="col col-3">
									<a href="{{ url($value3->pageURL) }}" target="iframe_dashboard">
										<img src="{{ url('/icons/time_management/submenu-' . $value->pageURL . '.svg') }}" alt="Child Time Management">
										<span class="child-title-text">{{ $value3->menuName }}</span>
									</a>
								</div>
								@endforeach
							</div>
						@endif
					@endforeach
					<div class="row div-child-data">
					@foreach($dataSubMenu as $key2 => $value2)
						@if(!$value2->isHaveChild)
							<div class="col col-3">
								<a href="{{ url($value2->pageURL) }}" target="iframe_dashboard">
									<img src="{{ url('/icons/time_management/submenu-' . $value->pageURL . '.svg') }}" alt="Child Time Management">
									<span class="child-title-text">{{ $value2->menuName }}</span>
								</a>
							</div>
						@endif
					@endforeach
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
    
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>