<!DOCTYPE html>
<html>
<head>
	<title>{{ __('utilities_organization_structure.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
	<link rel="stylesheet" href="{{ asset('css/utilities_organization_structure.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
	<style type="text/css">
		.div-utilities {
			max-width: 100%;
			margin: auto;
			/*margin-top: 1%;*/
		}
	</style>
</head>

<body>
	<div class="div-utilities">
		<div class="div-title">
			<a href="{{ url('utilities') }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('utilities_user_security_maintenance.list') }}</span>
			</a>
		</div>
		<div class="div-organization">
			<div class="row">
				<div class="col-4">
					<div class="card h-100">
						<div class="card-body">
							<form>
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label for="employee_number_layer_one">LAYER 1 - Employee Number</label>
											<select class="form-control select2" id="employee_number_layer_one" name="employee_number_layer_one"></select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-7">
										<div class="carousel-caption-card d-none d-md-block">
											<h5 class="employee-name" id="employee-name-layer-one"></h5>
											<p id="position-name-layer-one"></p>
										</div>
									</div>
									<div class="col-1">
										<hr class="vertical" />
									</div>
									<div class="col-3">
										<div class="carousel-caption-card d-none d-md-block">
											<h5 id="direct-count-layer-one"></h5>
											<p>Directs</p>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
                <div class="col-8">
					<div class="bd-example">
						<div id="chartOrganizationLevelOne" class="carousel slide show-neighbors" data-interval="false" data-wrap="false">
							<div class="carousel-inner" id="div-organization-structure-level-one"></div>

							<a class="carousel-control-prev" href="#chartOrganizationLevelOne" role="button" data-slide="prev">
								<img src="{{ url('/pictures/previous-slide.png') }}" class="d-block" alt="">
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#chartOrganizationLevelOne" role="button" data-slide="next">
								<img src="{{ url('/pictures/next-slide.png') }}" class="d-block" alt="">
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-4"></div>
                <div class="col-8">
                	<img class="image-chart-line" src="{{ url('/pictures/line-chart-organization.png') }}" class="d-block" alt="">
                </div>
            </div>
            <div class="row">
				<div class="col-4">
					<div class="card h-100">
						<div class="card-body">
							<form>
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label for="employee_number_layer_two">LAYER 2 - Employee Number</label>
											<select class="form-control select2" id="employee_number_layer_two" name="employee_number_layer_two"></select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-7">
										<div class="carousel-caption-card d-none d-md-block">
											<h5 class="employee-name" id="employee-name-layer-two"></h5>
											<p id="position-name-layer-two"></p>
										</div>
									</div>
									<div class="col-1">
										<hr class="vertical" />
									</div>
									<div class="col-3">
										<div class="carousel-caption-card d-none d-md-block">
											<h5 id="direct-count-layer-two"></h5>
											<p>Directs</p>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
                <div class="col-8">
					<div class="bd-example">
						<div id="chartOrganizationLevelTwo" class="carousel slide show-neighbors" data-interval="false" data-wrap="false">
							<div class="carousel-inner" id="div-organization-structure-level-two"></div>

							<a class="carousel-control-prev" href="#chartOrganizationLevelTwo" role="button" data-slide="prev">
								<img src="{{ url('/pictures/previous-slide.png') }}" class="d-block" alt="">
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#chartOrganizationLevelTwo" role="button" data-slide="next">
								<img src="{{ url('/pictures/next-slide.png') }}" class="d-block" alt="">
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-4"></div>
                <div class="col-8">
                	<img class="image-chart-line" src="{{ url('/pictures/line-chart-organization.png') }}" class="d-block" alt="">
                </div>
            </div>
            <div class="row">
				<div class="col-4">
					<div class="card h-100">
						<div class="card-body">
							<form>
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label for="employee_number_layer_three">LAYER 3 - Employee Number</label>
											<select class="form-control select2" id="employee_number_layer_three" name="employee_number_layer_three"></select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-7">
										<div class="carousel-caption-card d-none d-md-block">
											<h5 class="employee-name" id="employee-name-layer-three"></h5>
											<p id="position-name-layer-three"></p>
										</div>
									</div>
									<div class="col-1">
										<hr class="vertical" />
									</div>
									<div class="col-3">
										<div class="carousel-caption-card d-none d-md-block">
											<h5 id="direct-count-layer-three"></h5>
											<p>Directs</p>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
                <div class="col-8">
					<div class="bd-example">
						<div id="chartOrganizationLevelThree" class="carousel slide show-neighbors" data-interval="false" data-wrap="false">
							<div class="carousel-inner" id="div-organization-structure-level-three"></div>

							<a class="carousel-control-prev" href="#chartOrganizationLevelThree" role="button" data-slide="prev">
								<img src="{{ url('/pictures/previous-slide.png') }}" class="d-block" alt="">
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#chartOrganizationLevelThree" role="button" data-slide="next">
								<img src="{{ url('/pictures/next-slide.png') }}" class="d-block" alt="">
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function () {
		var data_position = [];
		var urlPicture = "{{ url('/pictures/profile-picture.png') }}";

		load_data();

		loadDataEmployeeNo('#employee_number_layer_one', null);

		function set_carousel(paramClass = '') {
			$('.carousel-item', paramClass).each(function(){
				var next = $(this).next();
				var prev = $(this).prev();
				if(! next.length && ! prev.length){
					$(this).children(':first-child').clone().appendTo($(this)).css({"visibility":"hidden"});
				}else{
					if (! next.length) {
						next = $(this).siblings(':first');
						next.children(':first-child').clone().appendTo($(this)).css({"visibility":"hidden"});
					}else{
						next.children(':first-child').clone().appendTo($(this));
					}
				}
			}).each(function(){
				var next = $(this).next();
				var prev = $(this).prev();
				if(! next.length && ! prev.length){
					$(this).children(':last-child').clone().prependTo($(this));
				}else{
					if (! prev.length) {
						prev = $(this).siblings(':last');
						prev.children(':nth-last-child(2)').clone().prependTo($(this)).css({"visibility":"hidden"});
					}else{
						prev.children(':nth-last-child(2)').clone().prependTo($(this));
					}
				}
			});
		}

		$('#chartOrganizationLevelOne').on('slid.bs.carousel', function (e) {
			var ele = $('#chartOrganizationLevelOne .carousel-inner .carousel-item.active .item__third:first + .item__third');
			var positionCode = ele.data('pos');
			let select_data = data_position.filter(function(o){
				return o.positionCode == positionCode;
			});
			$('#employee-name-layer-one').html(select_data[0].fullName);
			$('#position-name-layer-one').html(select_data[0].positionName);
			load_data_layer_two(data_position, positionCode);
			loadDataEmployeeNo('#employee_number_layer_two', positionCode);
		});

		function load_data(supervisorPositionCode = '') {
			
		}

		function load_data_layer_one(supervisorPositionCode = '') {
			$.ajax({
				url: "{{ url('utilities/organization_chart/get/position') }}",
				type: "GET",
				data: {
                    'supervisorPositionCode': supervisorPositionCode
                },
				success: function(data) {
					data.forEach(function(value, key) {
						var htmlPicture = (value.photo == null || value.photo == "") ? '<img src="'+ urlPicture +'" class="d-block rounded-circle" style="width: 3.7rem;" alt="">' : '<img src="data:image/png;base64,' + value.photo + '" class="d-block rounded-circle" style="width: 4.2rem;" alt="">';
						if(key < 1){
							$('#div-organization-structure-level-one').append(
								'<div class="carousel-item active">'+
								'<div class="item__third" data-pos="' + value.employeeNo + '">'+
								htmlPicture +
								'<div class="carousel-caption d-none d-md-block">'+
								'<h5 class="employee-name">' + value.fullName + '</h5>'+
								'<p>' + value.positionName + '</p>'+
								'</div></div></div>'
							);

							$('#employee-name-layer-one').html(value.fullName);
							$('#position-name-layer-one').html(value.positionName);

							load_data_layer_two(value.positionCode);
							loadDataEmployeeNo('#employee_number_layer_two', value.positionCode);
						}else{
							$('#div-organization-structure-level-one').append(
								'<div class="carousel-item">'+
								'<div class="item__third" data-pos="' + value.employeeNo + '">'+
								htmlPicture +
								'<div class="carousel-caption d-none d-md-block">'+
								'<h5 class="employee-name">' + value.fullName + '</h5>'+
								'<p>' + value.positionName + '</p>'+
								'</div></div></div>'
							);
						}
					});

					set_carousel('#chartOrganizationLevelOne');			
				},
				error: function(data) {
					
				}

			});
			// let data_layer_one = data.filter(function(o){
			// 	return o.supervisorPositionCode == null;
			// });
		}

		$('#chartOrganizationLevelTwo').on('slid.bs.carousel', function (e) {
			var ele = $('#chartOrganizationLevelTwo .carousel-inner .carousel-item.active .item__third:first + .item__third');
			var positionCode = ele.data('pos');
			let select_data = data_position.filter(function(o){
				return o.positionCode == positionCode;
			});
			$('#employee-name-layer-two').html(select_data[0].fullName);
			$('#position-name-layer-two').html(select_data[0].positionName);
			load_data_layer_three(positionCode);
			loadDataEmployeeNo('#employee_number_layer_three', positionCode);
		});

		function load_data_layer_two(supervisorPositionCode = '') {
			$('#div-organization-structure-level-two').html('');
			$.ajax({
				url: "{{ url('utilities/organization_chart/get/position') }}",
				type: "GET",
				data: {
                    'supervisorPositionCode': supervisorPositionCode
                },
				success: function(data) {
					$('#direct-count-layer-one').html(data.length);

					data.forEach(function(value, key) {
						var htmlPicture = (value.photo == null || value.photo == "") ? '<img src="'+ urlPicture +'" class="d-block" style="max-width: 50px;" alt="">' : '<img src="data:image/png;base64,"' + value.photo + '" class="d-block" alt="">';
						if(key < 1){
							$('#div-organization-structure-level-two').append(
								'<div class="carousel-item active">'+
								'<div class="item__third" data-pos="' + value.positionCode + '">'+
								htmlPicture +
								'<div class="carousel-caption d-none d-md-block">'+
								'<h5 class="employee-name">' + value.fullName + '</h5>'+
								'<p>' + value.positionName + '</p>'+
								'</div></div></div>'
							);

							$('#employee-name-layer-two').html(value.fullName);
							$('#position-name-layer-two').html(value.positionName);

							load_data_layer_three(value.positionCode);
							loadDataEmployeeNo('#employee_number_layer_three', value.positionCode);
						}else{
							$('#div-organization-structure-level-two').append(
								'<div class="carousel-item">'+
								'<div class="item__third" data-pos="' + value.positionCode + '">'+
								htmlPicture +
								'<div class="carousel-caption d-none d-md-block">'+
								'<h5 class="employee-name">' + value.fullName + '</h5>'+
								'<p>' + value.positionName + '</p>'+
								'</div></div></div>'
							);
						}
					});

					set_carousel('#chartOrganizationLevelTwo');		
				},
				error: function(data) {
					
				}

			});

			// let data_layer_two = data.filter(function(o){
			// 	return o.supervisorPositionCode == positionCode;
			// });
		}

		$('#chartOrganizationLevelThree').on('slid.bs.carousel', function (e) {
			var ele = $('#chartOrganizationLevelThree .carousel-inner .carousel-item.active .item__third:first + .item__third');
			var positionCode = ele.data('pos');
			let select_data = data_position.filter(function(o){
				return o.positionCode == positionCode;
			});
			$('#employee-name-layer-three').html(select_data[0].fullName);
			$('#position-name-layer-three').html(select_data[0].positionName);
		});

		function load_data_layer_three(data = '', positionCode = '') {
			$('#div-organization-structure-level-three').html('');

			// let data_layer_three = data.filter(function(o){
			// 	return o.supervisorPositionCode == positionCode;
			// });
			$.ajax({
				url: "{{ url('utilities/organization_chart/get/position') }}",
				type: "GET",
				data: {
                    'supervisorPositionCode': supervisorPositionCode
                },
				success: function(data) {
					$('#direct-count-layer-two').html(data.length);

					data.forEach(function(value, key) {
						var htmlPicture = (value.photo == null || value.photo == "") ? '<img src="'+ urlPicture +'" class="d-block" style="max-width: 50px;" alt="">' : '<img src="data:image/png;base64,"' + value.photo + '" class="d-block" alt="">';

						if(key < 1){
							$('#div-organization-structure-level-three').append(
								'<div class="carousel-item active">'+
								'<div class="item__third" data-pos="' + value.positionCode + '">'+
								htmlPicture +
								'<div class="carousel-caption d-none d-md-block">'+
								'<h5 class="employee-name">' + value.fullName + '</h5>'+
								'<p>' + value.positionName + '</p>'+
								'</div></div></div>'
							);

							$('#employee-name-layer-three').html(value.fullName);
							$('#position-name-layer-three').html(value.positionName);
						}else{
							$('#div-organization-structure-level-three').append(
								'<div class="carousel-item">'+
								'<div class="item__third" data-pos="' + value.positionCode + '">'+
								htmlPicture +
								'<div class="carousel-caption d-none d-md-block">'+
								'<h5 class="employee-name">' + value.fullName + '</h5>'+
								'<p>' + value.positionName + '</p>'+
								'</div></div></div>'
							);
						}
					});

					set_carousel('#chartOrganizationLevelThree');	
				},
				error: function(data) {
					
				}

			});
		}

		$.fn.filterByData = function(prop, val) {
			return this.filter(
				function() { return $(this).data(prop)==val; }
			);
		}

		$('#employee_number_layer_one').on("select2:select", function(e) { 
            var data = $('#employee_number_layer_one').select2('data');
			// console.log(data[0]);
            $('#chartOrganizationLevelOne .carousel-inner .carousel-item.active').removeClass('active');
            var hasil = $('#chartOrganizationLevelOne .carousel-inner .carousel-item .item__third:nth-child(2)').filterByData('pos', data[0].data.employeeNo);
            if(hasil.length > 0){
            	hasil.parent().addClass('active');

            	// let select_data = data_position.filter(function(o){
            	// 	return o.positionCode == 'BU-Dev';
            	// });
				// console.log(data[0]);
            	$('#employee-name-layer-one').html(data[0].data.fullName);
            	$('#position-name-layer-one').html(data[0].data.positionName);
            	// load_data_layer_two(data, 'BU-Dev');
            }
        });

        $('#employee_number_layer_two').on("select2:select", function(e) { 
            var data = $('#employee_number_layer_two').select2('data');
            $('#chartOrganizationLevelTwo .carousel-inner .carousel-item.active').removeClass('active');
            var hasil = $('#chartOrganizationLevelTwo .carousel-inner .carousel-item .item__third:nth-child(2)').filterByData('pos', data[0].data.employeeNo);
            if(hasil.length > 0){
            	hasil.parent().addClass('active');
            	// let select_data = data_position.filter(function(o){
            	// 	return o.positionCode == 'BC4';
            	// });
            	$('#employee-name-layer-two').html(data[0].data.fullName);
            	$('#position-name-layer-two').html(data[0].data.positionName);
            	// load_data_layer_three(data_position, 'BC4');
            }
        });

        $('#employee_number_layer_three').on("select2:select", function(e) { 
            var data = $('#employee_number_layer_three').select2('data');
            $('#chartOrganizationLevelThree .carousel-inner .carousel-item.active').removeClass('active');
            var hasil = $('#chartOrganizationLevelThree .carousel-inner .carousel-item .item__third:nth-child(2)').filterByData('pos', 'Dev2');
            if(hasil.length > 0){
            	hasil.parent().addClass('active');
            	// let select_data = data_position.filter(function(o){
            	// 	return o.positionCode == 'Dev2';
            	// });
            	$('#employee-name-layer-three').html(data[0].data.fullName);
            	$('#position-name-layer-three').html(data[0].data.positionName);
            }
        });

		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

		function loadDataEmployeeNo(field = '', positionCode = '') {
			function formatSelect(data) {
				if (data.loading) {
                    return $search
                }

				if(data.id){
					var $result2 = $('<div class="row">' +
						'<div class="col-6">' + data.data.employeeNo + '</div>' +
						'<div class="col-6">' + data.data.fullName + '</div>' +
						'</div>');

					return $result2;
				}
			}

			var headerIsAppend = false;
			$(field).on('select2:open', function (e) {
				if (!headerIsAppend) {
					html = '<div class="row">' +
					'<div class="col-6"><b>Employee No</b></div>' +
					'<div class="col-6"><b>Employee Name</b></div>' +
					'</div>';
					$('.select2-search').append(html);
					headerIsAppend = true;
				}
			});

			var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

			$(field).select2({
				width: '100%',
				placeholder: 'Choose Employee No',
				allowClear: true,
				language: {
                    errorLoading: function() {
                        return $search;
                    },
                    searching: function() {
                        return $search;
                    }
                },
				ajax: {
					url: "{{ url('/employee_no/position/api') }}",
					dataType: 'json',
					delay: 250,
					type: "GET",
					data: function (params) {
						return {
							_token: CSRF_TOKEN,
							search: params.term,
							positionCode: positionCode
						};
					},
					processResults: function (data) {
						return {
							results: $.map(data, function (item) {
								return { text: item.fullName, id: item.employeeNo, data: item }
							})
						};
					},
					cache: true,
				},
				templateResult: formatSelect
			});
		}

		// $('.show-neighbors').on('slid.bs.carousel', '', function() {
		// 	var $this = $(this);

		// 	if($('.carousel-inner .carousel-item:first').hasClass('active')) {
		// 		$('.carousel-control-prev').hide();
		// 	}else if($('.carousel-inner .carousel-item:last').hasClass('active')) {
		// 		$('.carousel-control-next').hide();
		// 	}else{
		// 		$('.carousel-control-prev').show();
		// 		$('.carousel-control-next').show();
		// 	}
		// });
	});
</script>

</html>