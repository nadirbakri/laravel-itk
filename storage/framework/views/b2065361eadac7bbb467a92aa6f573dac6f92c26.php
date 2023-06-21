<!DOCTYPE html>
<html>
<head>
	<title><?php echo e(__('dashboard.judul')); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon"/>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo e(asset('css/simple-calendar.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/dashboard.css')); ?>">
	<style type="text/css">
		body {
			background-color: transparent;
		}
		.div-dashboard {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
		.row-dashboard {
			height: 30%;
		}
		.calendar-dashboard{
			font-size: 1vw;
			position: relative;
			/*margin: 50px auto;*/
			/*max-width: 100%;*/
		}
		.img-card-welcome img {
			max-width: 75%;
		}

		#loading {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(255, 255, 255, 0.8);
			z-index: 9999;
		}

		.spinner {
			margin-left: 45%;
			margin-top: 20%;
			border-radius: 50%;
			width: 50px;
			height: 50px;
			border-radius: 50%;
			border: 5px solid #ccc;
			border-top-color: #333;
			animation: spin 1s infinite linear;
		}

		@keyframes  spin {
		to { transform: rotate(360deg); }
		}
	</style>
</head>

<body>
	<?php if(Session::has('haveHome')): ?>
	<div id="loading">
        <div class="spinner"></div>
    </div>
	<div class="div-dashboard">
		<div class="row card-top">
			<div class="col col-8">
				<div class="card h-100">
					<div class="card-body">
						<div class="text-card-welcome">
							<div class="hello-text"><?php echo e(__('dashboard.hello')); ?> <?php echo e(Session::get('userName')); ?></div>
							<p><?php echo e(__('dashboard.welcome')); ?></p>

							<p><?php echo e(Session::get('companyName')); ?></p>
							<div class="text-company-detail">
								<div class="col-12">
									<div class="number-company-detail" id="totalEmployee"></div>
									<div><?php echo e(__('dashboard.employee')); ?></div>
								</div>
								<!-- <div class="col-6">
									<div class="number-company-detail" id="openPosition"></div>
									<div><?php echo e(__('dashboard.posisi')); ?></div>
								</div> -->
							</div>
						</div>
						<div class="img-card-welcome"><img src="<?php echo e(url('/pictures/welcome-card.svg')); ?>" alt="Toogle"></div>
					</div>
				</div>
			</div>

			<div class="col col-4">
				<div class="card h-100">
					<div class="card-body">
						<div class="calendar-dashboard"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row card-top">
			<div class="col col-4">
				<div class="card h-100">
					<div class="card-body">
						<h4 class="title-attendance"><?php echo e(__('dashboard.attend')); ?></h4>
						<table class="table table-attendance">
							<tbody>
								<tr>
									<th><?php echo e(__('dashboard.present')); ?></td>
									<td id="total_present"></td>
									<td id="persentage_present"></td>
								</tr>
								<tr>
									<th><?php echo e(__('dashboard.late')); ?></td>
									<td id="total_late"></td>
									<td id="persentage_late"></td>
								</tr>
								<tr>
									<th><?php echo e(__('dashboard.absent')); ?></td>
									<td id="total_absent"></td>
									<td id="persentage_absent"></td>
								</tr>
								<tr>
									<th><?php echo e(__('dashboard.leave')); ?></td>
									<td id="total_leave"></td>
									<td id="persentage_leave"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="col col-4">
				<div class="card h-100">
					<div class="card-body">
						<canvas id="graph_employee_age" height="300" width="300"></canvas>
					</div>
				</div>
			</div>

			<div class="col col-4">
				<div class="card h-100">
					<div class="card-body">
						<canvas id="graph_employee_active" height="300" width="300"></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="row card-top">
			<div class="col col-8">
				<div class="card h-100">
					<div class="card-body">
						<h4 class="title-chart"><?php echo e(__('dashboard.payroll')); ?></h4>
						<div class="chart-area-payroll">
							<div class="chart-payroll">
								<canvas id="graph_payroll" height="300" width="0"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col col-4">
				<div class="card h-100">
					<div class="card-body">
						<canvas id="graph_employee_service" height="300" width="300"></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="row card-top">
			<div class="col col-8">
				<div class="card h-100">
					<div class="card-body">
						<h4 class="title-chart"><?php echo e(__('dashboard.overtime_pay')); ?></h4>
						<div class="chart-area-overtimepay">
							<div class="chart-overtimepay">
								<canvas id="graph_overtime_pay" height="300" width="0"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col col-4">
				<div class="card h-100">
					<div class="card-body">
						<canvas id="graph_overtime_hour" height="300" width="300"></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="row card-middle">
			<div class="col col-2">
				<a class="tabs-card" id="card-middle-one" href="#middle-one" data-toggle="tab" role="tab">
					<div class="card h-100">
						<div class="card-body">
							<p><?php echo e(__('dashboard.middle-one')); ?></p>
							<p class="count-card-middle" id="end_contract_month"></p>
						</div>
					</div>
				</a>
			</div>

			<div class="col col-2">
				<a class="tabs-card" id="card-middle-two" href="#middle-two" data-toggle="tab" role="tab">
					<div class="card h-100">
						<div class="card-body">
							<p><?php echo e(__('dashboard.middle-two')); ?></p>
							<p class="count-card-middle" id="birthday_month"></p>
						</div>
					</div>
				</a>
			</div>

			<div class="col col-2">
				<a class="tabs-card" id="card-middle-three" href="#middle-three" data-toggle="tab" role="tab">
					<div class="card h-100">
						<div class="card-body">
							<p><?php echo e(__('dashboard.middle-three')); ?></p>
							<p class="count-card-middle" id="end_probation_month"></p>
						</div>
					</div>
				</a>
			</div>

			<div class="col col-2">
				<a class="tabs-card" id="card-middle-five" href="#middle-five" data-toggle="tab" role="tab">
					<div class="card h-100">
						<div class="card-body">
							<p><?php echo e(__('dashboard.middle-five')); ?></p>
							<p class="count-card-middle" id="join_month"></p>
						</div>
					</div>
				</a>
			</div>

			<div class="col col-2">
				<a class="tabs-card" id="card-middle-six" href="#middle-six" data-toggle="tab" role="tab">
					<div class="card h-100">
						<div class="card-body">
							<p><?php echo e(__('dashboard.middle-six')); ?></p>
							<p class="count-card-middle" id="resign_month"></p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col col-12">
				<div class="card tab-content">
					<div id="middle-one" class="card-body tab-pane fade show active" role="tabpanel">
						<div class="detail-middle-card">
							<div class="text-middle-card">
								<p><?php echo e(__('dashboard.middle-one')); ?></p>
								<p class="count-card-middle" id="end_contract_month_tab"></p>
							</div>
							<div class="vl"></div>
							<div class="line-bottom-card"></div>
							<div class="table-middle-card">
								<table class="card-table table" id="end_contract_month_table" style="width: 100%">
									<thead>
										<tr>
											<th><?php echo e(__('dashboard.table_employee_no')); ?></th>
											<th><?php echo e(__('dashboard.table_name')); ?></th>
											<th><?php echo e(__('dashboard.table_location')); ?></th>
											<th><?php echo e(__('dashboard.table_position')); ?></th>
											<th><?php echo e(__('dashboard.table_start_date')); ?></th>
											<th><?php echo e(__('dashboard.table_end_date')); ?></th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
					<div id="middle-two" class="card-body tab-pane fade" role="tabpanel">
						<div class="detail-middle-card">
							<div class="text-middle-card">
								<p><?php echo e(__('dashboard.middle-two')); ?></p>
								<p class="count-card-middle" id="birthday_month_tab"></p>
							</div>
							<div class="vl"></div>
							<div class="line-bottom-card"></div>
							<div class="table-middle-card">
								<table class="card-table table" id="birthday_month_table" style="width: 100%">
									<thead>
										<tr>
											<th><?php echo e(__('dashboard.table_employee_no')); ?></th>
											<th><?php echo e(__('dashboard.table_name')); ?></th>
											<th><?php echo e(__('dashboard.table_location')); ?></th>
											<th><?php echo e(__('dashboard.table_position')); ?></th>
											<th><?php echo e(__('dashboard.table_birth_date')); ?></th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
					<div id="middle-three" class="card-body tab-pane fade" role="tabpanel">
						<div class="detail-middle-card">
							<div class="text-middle-card">
								<p><?php echo e(__('dashboard.middle-three')); ?></p>
								<p class="count-card-middle" id="end_probation_month_tab"></p>
							</div>
							<div class="vl"></div>
							<div class="line-bottom-card"></div>
							<div class="table-middle-card">
								<table class="card-table table" id="end_probation_month_table" style="width: 100%">
									<thead>
										<tr>
											<th><?php echo e(__('dashboard.table_employee_no')); ?></th>
											<th><?php echo e(__('dashboard.table_name')); ?></th>
											<th><?php echo e(__('dashboard.table_location')); ?></th>
											<th><?php echo e(__('dashboard.table_position')); ?></th>
											<th><?php echo e(__('dashboard.table_start_date')); ?></th>
											<th><?php echo e(__('dashboard.table_end_date')); ?></th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
					<div id="middle-five" class="card-body tab-pane fade" role="tabpanel">
						<div class="detail-middle-card">
							<div class="text-middle-card">
								<p><?php echo e(__('dashboard.middle-five')); ?></p>
								<p class="count-card-middle" id="join_month_tab"></p>
							</div>
							<div class="vl"></div>
							<div class="line-bottom-card"></div>
							<div class="table-middle-card">
								<table class="card-table table" id="join_month_table" style="width: 100%">
									<thead>
										<tr>
											<th><?php echo e(__('dashboard.table_employee_no')); ?></th>
											<th><?php echo e(__('dashboard.table_name')); ?></th>
											<th><?php echo e(__('dashboard.table_location')); ?></th>
											<th><?php echo e(__('dashboard.table_position')); ?></th>
											<th><?php echo e(__('dashboard.table_join_date')); ?></th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
					<div id="middle-six" class="card-body tab-pane fade" role="tabpanel">
						<div class="detail-middle-card">
							<div class="text-middle-card">
								<p><?php echo e(__('dashboard.middle-six')); ?></p>
								<p class="count-card-middle" id="resign_month_tab"></p>
							</div>
							<div class="vl"></div>
							<div class="line-bottom-card"></div>
							<div class="table-middle-card">
								<table class="card-table table" id="resign_month_table" style="width: 100%">
									<thead>
										<tr>
											<th><?php echo e(__('dashboard.table_employee_no')); ?></th>
											<th><?php echo e(__('dashboard.table_name')); ?></th>
											<th><?php echo e(__('dashboard.table_location')); ?></th>
											<th><?php echo e(__('dashboard.table_position')); ?></th>
											<th><?php echo e(__('dashboard.table_termination_date')); ?></th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="modal fade" role="dialog" id="data-from-chart">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="title-modal-from-chart"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="card-table table">
						<thead>
							<tr>
								<th>Label</th>
								<th>Value</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td id="label-value"></td>
								<td id="value-value"></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-messaging.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-analytics.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script src="https://rawgit.com/beaver71/Chart.PieceLabel.js/master/build/Chart.PieceLabel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
<script src="<?php echo e(asset('js/jquery.simple-calendar.js')); ?>"></script>
<script>
	var $calendar;
	// var employeeActiveData = null;
	$(document).ready(function () {
		var barChartEmployeeService = null;
		var lineChartOvertimePay = null;
		var lineChartPayroll = null;
		var barChartOvertimeHour = null;
		var doughnutChartEmployeeActive = null;
		var doughnutChartEmployeeAge = null;

		var firebaseConfig = {
			apiKey: "AIzaSyB0e5Cq6q0c7rFx-YtSIa8Ib4h85xjTd6I",
			authDomain: "laravel-itk.firebaseapp.com",
			projectId: "laravel-itk",
			storageBucket: "laravel-itk.appspot.com",
			messagingSenderId: "592986504219",
			appId: "1:592986504219:web:93d88f5e6dc231d88c8cbe",
			measurementId: "G-3DS7F0TQVC"
		};

		$('#loading').show();

		firebase.initializeApp(firebaseConfig);
		firebase.analytics();

		const messaging = firebase.messaging();
		messaging.requestPermission().then(function () {
			return messaging.getToken({ vapidKey: 'BPs3b45H-tsEOSAUaPD3u26i_7oypoAlQJWrU0YwBEOucilDhyph-lez2xQm_rSBljwc_omZEX_y9pWtFaug0Ac' });
		}).then(function(token) {

     		$.ajaxSetup({
     			headers: {
     				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     			}
     		});

     		$.ajax({
     			url: '<?php echo e(url("save-token")); ?>',
     			type: 'GET',
     			data: {
     				token: token
     			},
     			dataType: 'JSON',
     			success: function (response) {
     				// console.log(response);
     			},
     			error: function (err) {
     				console.log('User Chat Token Error'+ err);
     			},
     		});

     		$.ajax({
     			url: '<?php echo e(url("send-notification")); ?>',
     			type: 'GET',
     			dataType: 'JSON',
     			success: function (response) {
     				console.log(response);
     			},
     			error: function (err) {
     				console.log('User Chat Token Error'+ err);
     			},
     		});
 		}).catch(function (err) {
			// ErrElem.innerHTML = ErrElem.innerHTML + "; " + err;
			console.log("Unable to get permission to notify.", err);
		});

 		messaging.onMessage(function(payload) {
 			const noteTitle = payload.notification.title;
 			const noteOptions = {
 				body: payload.notification.body,
 				icon: payload.notification.icon,
 			};
 			new Notification(noteTitle, noteOptions);
 		});

 		var reqCalendar = $.ajax({
 			url: '<?php echo e(url("calendar/event")); ?>',
 			type: 'GET',
 			dataType: 'JSON',
 			success: function (response) {
				let container = $(".calendar-dashboard").simpleCalendar({
					fixedStartDay: 0, // Awal Minggu adalah hari Minggu
					disableEmptyDetails: true,
					displayEvent: true,
					events: response
				});

				$calendar = container.data('plugin_simpleCalendar');
 			},
 			error: function (err) {
 				console.log('Error Get Event Calendar : '+ err);
 			},
 		});

		var reqPayroll = $.ajax({
 			url: '<?php echo e(url("getPayroll")); ?>',
 			type: 'GET',
 			dataType: 'JSON',
 			success: function (response) {
				var payrollData = {
					labels: response.tanggal,
					datasets: [
					{
						data: response.total,
						borderColor: "#FFC814",
						fill: false,
					}]
				};

				lineChartPayroll = new Chart(chartPayroll, {
					type: 'line',
					data: payrollData,
					options: chartOptionsPayroll
				});
 			},
 			error: function (err) {
 				console.log('Error Get Event Calendar : '+ err);
 			},
 		});

		var reqOvertime = $.ajax({
 			url: '<?php echo e(url("getOvertime")); ?>',
 			type: 'GET',
 			dataType: 'JSON',
 			success: function (response) {
				// console.log(response.data2);
				var overtimePayData = {
					labels: response.data2.tanggal,
					datasets: [
					{
						data: response.data2.total,
						borderColor: "#004883",
						fill: false,
					}]
				};

				var overtimeHourData = {
					labels: response.data1.month,
					datasets: [
					{
						data: response.data1.totalOvertimeHour,
						backgroundColor: [
						"#4472C4",
						"#004883"
						],
						maxBarThickness: 20
					}]
				};

				lineChartOvertimePay = new Chart(chartOvertimePay, {
					type: 'line',
					data: overtimePayData,
					options: chartOptionsOvertimePay
				});

				barChartOvertimeHour = new Chart(chartOvertimeHour, {
					type: 'bar',
					data: overtimeHourData,
					options: chartOptionsOvertimeHour
				});
 			},
 			error: function (err) {
 				console.log('Error Get Event Calendar : '+ err);
 			},
 		});

		 function isEmpty(obj) {
            for(var prop in obj) {
                if(Object.prototype.hasOwnProperty.call(obj, prop)) {
                    return false;
                }
            }

            return JSON.stringify(obj) === JSON.stringify({});
        }

		var reqActiveEmp = $.ajax({
 			url: '<?php echo e(url("active_employee")); ?>',
 			type: 'GET',
 			dataType: 'JSON',
 			success: function (response) {
				var totalPresent = 0;
				var totalLate = 0;
				var totalAbsent = 0;
				var totalLeave = 0;
				if(!isEmpty(response.dataAbsent)){
					$.each(response.dataAbsent, function (key, val) {
						if(val.description == "ABSENT"){
							totalAbsent += val.amount;
						}

						if(val.description == "LATE"){
							totalLate += val.amount;
						}

						if(val.description == "AL"){
							totalLeave += val.amount;
						}

						if(val.description == "LEB"){
							totalLate += val.amount;
						}

						if(val.description == "LT+NO"){
							totalLate += val.amount;
						}
					});
				}

				totalPresent = response.totalEmployee - (totalLate + totalAbsent + totalLeave);

				$('#total_present').html(totalPresent);
				$('#total_late').html(totalLate);
				$('#total_absent').html(totalAbsent);
				$('#total_leave').html(totalLeave);
				if(response.totalEmployee > 0){
					$('#persentage_present').html(Math.round((totalPresent / response.totalEmployee) * 100) + '%');
					$('#persentage_late').html(Math.round((totalLate / response.totalEmployee) * 100) + '%');
					$('#persentage_absent').html(Math.round((totalAbsent / response.totalEmployee) * 100) + '%');
					$('#persentage_leave').html(Math.round((totalLeave / response.totalEmployee) * 100) + '%');
				}else{
					$('#persentage_present').html('0%');
					$('#persentage_late').html('0%');
					$('#persentage_absent').html('0%');
					$('#persentage_leave').html('0%');
				}
				

				// console.log(response);s
				$('#totalEmployee').html(response.totalEmployee);
				$('#openPosition').html(response.openPosition);

				var employeeActiveData = {
					labels: [
					"Male",
					"Female"
					],
					datasets: [
					{
						data: [response.maleEmployee, response.femaleEmployee],
						backgroundColor: [
						"#004883",
						"#E75B52"
						]
					}]
				};

				var employeeAgeData = {
					labels: [
					"Age < 21",
					"Age 21 - 30",
					"Age 30 - 40",
					"Age 40 - 55",
					"Age > 55"
					],
					datasets: [
					{
						data: [response.ageFirst, response.ageSecond, response.ageThird, response.ageFourth, response.ageFifth],
						backgroundColor: [
						"#4472C4",
						"#E75B52",
						"#A5A5A5",
						"#9ACD32",
						"#FF7F50"
						]
					}]
				};

				var employeeServiceData = {
					labels: [
					"< 5 Years",
					"5 - 10 Years",
					"10 - 15 Years",
					"> 15 Years"
					],
					datasets: [
					{
						data: [response.joinFirst, response.joinSecond, response.joinThird, response.joinFourth],
						backgroundColor: [
						"#004883",
						"#004883",
						"#004883",
						"#004883"
						],
						maxBarThickness: 20
					}]
				};

				doughnutChartEmployeeActive = new Chart(chartEmployeeActive, {
					type: 'doughnut',
					data: employeeActiveData,
					options: chartOptionsEmployeeActive
				});

				doughnutChartEmployeeAge = new Chart(chartEmployeeAge, {
					type: 'doughnut',
					data: employeeAgeData,
					options: chartOptionsEmployeeAge
				});

				barChartEmployeeService = new Chart(chartEmployeeService, {
					type: 'bar',
					data: employeeServiceData,
					options: chartOptionsEmployeeService
				});

				$('#end_contract_month, #end_contract_month_tab').html(response.endContractMonth);
				$('#birthday_month, #birthday_month_tab').html(response.birthdayMonth);
				$('#end_probation_month, #end_probation_month_tab').html(response.endProbationMonth);
				$('#join_month, #join_month_tab').html(response.joinMonth);
				$('#resign_month, #resign_month_tab').html(response.resignMonth);

				load_data_table_end_contract_month(Object.keys(response.endContractData).map(function (key) { return response.endContractData[key]; }));
				load_data_table_birthday_month(Object.keys(response.birthdayData).map(function (key) { return response.birthdayData[key]; }));
				load_data_table_end_probation_month(Object.keys(response.endProbationData).map(function (key) { return response.endProbationData[key]; }));
				load_data_table_join_month(Object.keys(response.joinData).map(function (key) { return response.joinData[key]; }));
				load_data_table_resign_month(Object.keys(response.resignData).map(function (key) { return response.resignData[key]; }));
				
 			},
 			error: function (err) {
 				console.log('Error : '+ err);
 			},
 		});

		$.when(reqCalendar, reqPayroll, reqOvertime, reqActiveEmp).done(function() {
			$('#loading').hide();
		}).fail(function() {
			console.log('Error!');
		});

		$(".tabs-card").click(function() {  
			$(".tabs-card").removeClass("active"); 
		});

		function load_data_table_end_contract_month(data) {
            table = $('#end_contract_month_table').DataTable({
                // processing: true,
                // serverSide: true,
                orderCellsTop: true,
                data: data,
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [[ 0, "asc" ]],
                columns: [
                    {data: 'employeeNo', name: 'employeeNo'},
                    {data: 'fullName', name: 'fullName'},
					{data: 'locationName', name: 'locationName'},
					{data: 'positionName', name: 'positionName'},
                    {
                        data: 'contractStartDate', 
                        name: 'contractStartDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
					{
                        data: 'contractEndDate', 
                        name: 'contractEndDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    }
                ]
            });
        }

		function load_data_table_birthday_month(data) {
            table = $('#birthday_month_table').DataTable({
                // processing: true,
                // serverSide: true,
                orderCellsTop: true,
                data: data,
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [[ 0, "asc" ]],
                columns: [
                    {data: 'employeeNo', name: 'employeeNo'},
                    {data: 'fullName', name: 'fullName'},
					{data: 'locationName', name: 'locationName'},
					{data: 'positionName', name: 'positionName'},
                    {
                        data: 'birthDate', 
                        name: 'birthDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    }
                ]
            });
        }

		function load_data_table_end_probation_month(data) {
            table = $('#end_probation_month_table').DataTable({
                // processing: true,
                // serverSide: true,
                orderCellsTop: true,
                data: data,
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [[ 0, "asc" ]],
                columns: [
                    {data: 'employeeNo', name: 'employeeNo'},
                    {data: 'fullName', name: 'fullName'},
					{data: 'locationName', name: 'locationName'},
					{data: 'positionName', name: 'positionName'},
                    {
                        data: 'joinDate', 
                        name: 'joinDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
					{
                        data: 'probationEndDate', 
                        name: 'probationEndDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    }
                ]
            });
        }

		function load_data_table_join_month(data) {
            table = $('#join_month_table').DataTable({
                // processing: true,
                // serverSide: true,
                orderCellsTop: true,
                data: data,
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [[ 0, "asc" ]],
                columns: [
                    {data: 'employeeNo', name: 'employeeNo'},
                    {data: 'fullName', name: 'fullName'},
					{data: 'locationName', name: 'locationName'},
					{data: 'positionName', name: 'positionName'},
                    {
                        data: 'joinDate', 
                        name: 'joinDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    }
                ]
            });
        }

		function load_data_table_resign_month(data) {
            table = $('#resign_month_table').DataTable({
                // processing: true,
                // serverSide: true,
                orderCellsTop: true,
                data: data,
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [[ 0, "asc" ]],
                columns: [
                    {data: 'employeeNo', name: 'employeeNo'},
                    {data: 'fullName', name: 'fullName'},
					{data: 'locationName', name: 'locationName'},
					{data: 'positionName', name: 'positionName'},
                    {
                        data: 'terminationDate', 
                        name: 'terminationDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    }
                ]
            });
        }

		var chartEmployeeActive = document.getElementById("graph_employee_active");
		var chartEmployeeAge = document.getElementById("graph_employee_age");
		var chartEmployeeService = document.getElementById("graph_employee_service");
		var chartPayroll = document.getElementById("graph_payroll");
		var chartOvertimePay = document.getElementById("graph_overtime_pay");
		var chartOvertimeHour = document.getElementById("graph_overtime_hour");

		Chart.pluginService.register({
			beforeDraw: function (chart) {
				if (chart.config.options.elements.center) {
					var ctx = chart.chart.ctx;

					var total = 0;
					chart.data.datasets.forEach(function(dataset, i) {
						total = dataset.data.reduce((a, b) => a + b, 0);
					});

					var centerConfig = chart.config.options.elements.center;
					var fontStyle = centerConfig.fontStyle || 'Arial';
					var txt = total + " <?php echo e(__('dashboard.employee')); ?>";
					var color = centerConfig.color || '#000';
					var sidePadding = centerConfig.sidePadding || 20;
					var sidePaddingCalculated = (sidePadding/100) * (chart.innerRadius * 2)

					ctx.font = "30px " + fontStyle;

					var stringWidth = ctx.measureText(txt).width;
					var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

					var widthRatio = elementWidth / stringWidth;
					var newFontSize = Math.floor(30 * widthRatio);
					var elementHeight = (chart.innerRadius * 2);

					var fontSizeToUse = Math.min(newFontSize, elementHeight);

					ctx.textAlign = 'center';
					ctx.textBaseline = 'middle';
					var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
					var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
					ctx.font = fontSizeToUse+"px " + fontStyle;
					ctx.fillStyle = color;

					ctx.fillText(txt, centerX, centerY);
				}
			}
		});

		var chartOptionsEmployeeActive = {
			responsive: true,
			maintainAspectRatio: false,
			cutoutPercentage: 70,
			legend: {
				position: 'bottom',
			},
			title: {
				display: true,
				fontSize: 16,
				fontFamily: 'Montserrat',
				fontColor: '#2E8181',
				text: "<?php echo e(__('dashboard.chart_active_employee')); ?>"
			},
			elements: {
				center: {
					color: '#2E8181',
					fontStyle: 'MontSerrat',
					sidePadding: 20
				}
			},
			pieceLabel: {
				render: function (args) {
					const label = args.label,
					percentage = args.percentage.toFixed(1) + '%';

					return percentage;
				},
				fontColor: '#004883',
				fontSize: 13,
				fontFamily: 'Montserrat',
				position: 'outside',
				segment: false,
				showActualPercentages: true,
			}
		};

		var chartOptionsEmployeeAge = {
			responsive: true,
			maintainAspectRatio: false,
			cutoutPercentage: 70,
			legend: {
				position: 'bottom',
			},
			title: {
				display: true,
				fontSize: 16,
				fontFamily: 'Montserrat',
				fontColor: '#2E8181',
				text: "<?php echo e(__('dashboard.chart_employee_count')); ?>"
			},
			elements: {
				center: {
					color: '#2E8181',
					fontStyle: 'MontSerrat',
					sidePadding: 20
				}
			},
			pieceLabel: {
				render: function (args) {
					const label = args.label,
					percentage = args.percentage.toFixed(1) + '%';

					return percentage;
				},
				fontColor: '#004883',
				fontSize: 13,
				fontFamily: 'Montserrat',
				position: 'outside',
				segment: true,
				showActualPercentages: true,
			}
		};

		var chartOptionsEmployeeService = {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display: false
			},
			title: {
				display: true,
				fontSize: 16,
				fontFamily: 'Montserrat',
				fontColor: '#2E8181',
				text: "<?php echo e(__('dashboard.chart_employee_length')); ?>",
				padding: 20
			},
			scales: {
				xAxes: [{
					gridLines: {
						display:false
					} 
				}],
				yAxes: [{
					ticks: {
						fontFamily: 'Montserrat',
						fontColor: '#4472C4',
						callback: function(value, index, values) {
							return value;
						},
						beginAtZero: true
					}
				}]
			}
		};

		var chartOptionsPayroll = {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display: false
			},
			title: {
				display: false,
				fontSize: 16,
				fontFamily: 'Montserrat',
				fontColor: '#2E8181',
				text: "<?php echo e(__('dashboard.chart_payroll')); ?>",
				padding: 30
			},
			scales: {
				xAxes: [{
					gridLines: {
						display:false
					} 
				}],
				yAxes: [{
					display: true,
					ticks: {
						fontFamily: 'Montserrat',
						fontColor: '#4472C4',
						callback: function(value, index, values) {
							return 'Rp ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
						},
						beginAtZero: true,
						// stepSize: 1000000000,
						// max: 7000000000
					}
				}]
			},
			elements: {
				line: {
					tension: 0
				},
				point: {
					radius: 5
				}
			},
			tooltips: {
				callbacks: {
					label: function(tooltipItem, data) {
						return 'Rp ' + data['datasets'][0]['data'][tooltipItem['index']].toFixed().toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
					},
				},
			}
		};

		var chartOptionsOvertimePay = {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display: false
			},
			title: {
				display: false,
				fontSize: 16,
				fontFamily: 'Montserrat',
				fontColor: '#2E8181',
				text: "<?php echo e(__('dashboard.chart_overtime_pay')); ?>",
				padding: 30
			},
			scales: {
				xAxes: [{
					gridLines: {
						display: false
					},
					ticks: {
						padding: 20
					},
				}],
				yAxes: [{
					display: true,
					ticks: {
						fontFamily: 'Montserrat',
						fontColor: '#4472C4',
						callback: function(value, index, values) {
							return 'Rp ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
						},
						beginAtZero: true,
						stepSize: 1000000,
						max: 7000000
					},
				}]
			},
			elements: {
				line: {
					tension: 0
				},
				point: {
					radius: 5
				}
			},
			tooltips: {
				callbacks: {
					label: function(tooltipItem, data) {
						return 'Rp ' + data['datasets'][0]['data'][tooltipItem['index']].toFixed().toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
					},
				},
			}
		};

		var chartOptionsOvertimeHour = {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display: false
			},
			title: {
				display: true,
				fontSize: 16,
				fontFamily: 'Montserrat',
				fontColor: '#2E8181',
				text: "<?php echo e(__('dashboard.chart_overtime_hour')); ?>",
				padding: 30
			},
			scales: {
				xAxes: [{
					gridLines: {
						display:false
					} 
				}],
				yAxes: [{
					display: true,
					ticks: {
						fontFamily: 'Montserrat',
						fontColor: '#4472C4',
						beginAtZero: true,
						stepSize: 5,
						max: 30
					},
				}]
			},
		};

		chartEmployeeActive.onclick = function(evt) {
			var activePoints = doughnutChartEmployeeActive.getElementsAtEvent(evt);
			if (activePoints[0]) {
				var chartData = activePoints[0]['_chart'].config.data;
				var idx = activePoints[0]['_index'];
				var chartOption = activePoints[0]['_chart'].options;

				var label = chartData.labels[idx];
				var value = chartData.datasets[0].data[idx];

				$('#title-modal-from-chart').html(chartOption.title.text);
				$('#label-value').html(label);
				$('#value-value').html(value);
				$('#data-from-chart').modal('show');
			}
		};

		chartEmployeeService.onclick = function(evt) {
			var activePoints = barChartEmployeeService.getElementsAtEvent(evt);
			if (activePoints[0]) {
				var chartData = activePoints[0]['_chart'].config.data;
				var idx = activePoints[0]['_index'];
				var chartOption = activePoints[0]['_chart'].options;

				var label = chartData.labels[idx];
				var value = chartData.datasets[0].data[idx];

				$('#data-from-chart').modal('show');
			}
		};
	});
</script>

</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/home_dashboard.blade.php ENDPATH**/ ?>