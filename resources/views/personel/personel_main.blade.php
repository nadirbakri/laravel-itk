<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/personel.css') }}">
	<style type="text/css">
		.div-personel {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
	</style>
</head>

<body>
	<div class="div-personel">
		<div class="div-title">
			<img src="{{ url('/icons/sidebar/personel.png') }}" alt="Title">
			<span class="title-text">{{ __('personel.judul') }}</span>
		</div>

		@foreach($dataParent as $key => $value)
		<div class="card">
			<a class="collapsed" data-toggle="collapse" href="#{{ $value->pageURL }}" aria-expanded="true" aria-controls="{{ $value->pageURL }}">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="{{ url('/icons/personnel/' . $value->pageURL . '.svg') }}" alt="personel">
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
								<div class="col col-4">
									<a href="{{ url($value3->pageURL) }}" target="iframe_dashboard">
										<img src="{{ url('/icons/personnel/submenu-' . $value->pageURL . '.svg') }}" alt="Child Personnel">
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
									<img src="{{ url('/icons/personnel/submenu-' . $value->pageURL . '.svg') }}" alt="Child Personnel">
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