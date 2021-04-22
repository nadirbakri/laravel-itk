<!DOCTYPE html>
<html>
<head>
	<title>{{ __('dashboard.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/simple-calendar.css') }}">
	<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
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
			max-width: 90%;
		}
	</style>
</head>

<body>
	<div class="div-dashboard">
		<div class="row card-top">
			<div class="col col-8">
				<div class="card h-100">
					<div class="card-body">
						<div class="text-card-welcome">
							<div class="hello-text">Hello {{ Session::get('userName') }}</div>
							<p>Welcome Back</p>

							<p>PT Intikom Berlian Mustika</p>
							<div class="text-company-detail">
								<div class="col-6">
									<div class="number-company-detail">1000</div>
									<div>Employees</div>
								</div>
								<div class="col-6">
									<div class="number-company-detail">30</div>
									<div>Open Positions</div>
								</div>
							</div>
						</div>
						<div class="img-card-welcome"><img src="{{ url('/pictures/welcome-card.png') }}" alt="Toogle"></div>
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
						<h4 class="title-attendance">Attendance Today</h4>
						<table class="table table-attendance">
							<tbody>
								<tr>
									<th>Present</td>
									<td>950</td>
									<td>95,0%</td>
								</tr>
								<tr>
									<th>Late</td>
									<td>35</td>
									<td>3,5%</td>
								</tr>
								<tr>
									<th>Absent</td>
									<td>15</td>
									<td>1,5%</td>
								</tr>
								<tr>
									<th>Early Back</td>
									<td>5</td>
									<td>0,5%</td>
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
						<h4 class="title-chart">Payroll</h4>
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
						<h4 class="title-chart">Overtime Pay</h4>
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
							<p>{{ __('dashboard.middle-one') }}</p>
							<p class="count-card-middle">1</p>
						</div>
					</div>
				</a>
			</div>

			<div class="col col-2">
				<a class="tabs-card" id="card-middle-two" href="#middle-two" data-toggle="tab" role="tab">
					<div class="card h-100">
						<div class="card-body">
							<p>{{ __('dashboard.middle-two') }}</p>
							<p class="count-card-middle">4</p>
						</div>
					</div>
				</a>
			</div>

			<div class="col col-2">
				<a class="tabs-card" id="card-middle-three" href="#middle-three" data-toggle="tab" role="tab">
					<div class="card h-100">
						<div class="card-body">
							<p>{{ __('dashboard.middle-three') }}</p>
							<p class="count-card-middle">0</p>
						</div>
					</div>
				</a>
			</div>

			<div class="col col-2">
				<a class="tabs-card" id="card-middle-four" href="#middle-four" data-toggle="tab" role="tab">
					<div class="card h-100">
						<div class="card-body">
							<p>{{ __('dashboard.middle-four') }}</p>
							<p class="count-card-middle">1</p>
						</div>
					</div>
				</a>
			</div>

			<div class="col col-2">
				<a class="tabs-card" id="card-middle-five" href="#middle-five" data-toggle="tab" role="tab">
					<div class="card h-100">
						<div class="card-body">
							<p>{{ __('dashboard.middle-five') }}</p>
							<p class="count-card-middle">4</p>
						</div>
					</div>
				</a>
			</div>

			<div class="col col-2">
				<a class="tabs-card" id="card-middle-six" href="#middle-six" data-toggle="tab" role="tab">
					<div class="card h-100">
						<div class="card-body">
							<p>{{ __('dashboard.middle-six') }}</p>
							<p class="count-card-middle">0</p>
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
								<p>{{ __('dashboard.middle-one') }}</p>
								<p class="count-card-middle">1</p>
							</div>
							<div class="vl"></div>
							<div class="line-bottom-card"></div>
							<div class="table-middle-card">
								<table class="card-table table">
									<thead>
										<tr>
											<th>Employee No</th>
											<th>Name</th>
											<th>Location</th>
											<th>Position</th>
											<th>Start Date</th>
											<th>End Date</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>9999002</td>
											<td>Budiman Purnomo</td>
											<td>Head Office</td>
											<td>Komisaris Independen</td>
											<td>01-Jan-1960</td>
											<td>01-Jan-2025</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div id="middle-two" class="card-body tab-pane fade" role="tabpanel">
						<div class="detail-middle-card">
							<div class="text-middle-card">
								<p>{{ __('dashboard.middle-two') }}</p>
								<p class="count-card-middle">4</p>
							</div>
							<div class="vl"></div>
							<div class="line-bottom-card"></div>
							<div class="table-middle-card">
								<table class="card-table table">
									<thead>
										<tr>
											<th>Employee No</th>
											<th>Name</th>
											<th>Location</th>
											<th>Position</th>
											<th>Birth Date</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>9999002</td>
											<td>Budiman Purnomo</td>
											<td>Head Office</td>
											<td>Komisaris Independen</td>
											<td>01-Jan-1960</td>
										</tr>
										<tr>
											<td>9999002</td>
											<td>Budiman Purnomo</td>
											<td>Head Office</td>
											<td>Komisaris Independen</td>
											<td>01-Jan-1960</td>
										</tr>
										<tr>
											<td>9999002</td>
											<td>Budiman Purnomo</td>
											<td>Head Office</td>
											<td>Komisaris Independen</td>
											<td>01-Jan-1960</td>
										</tr>
										<tr>
											<td>9999002</td>
											<td>Budiman Purnomo</td>
											<td>Head Office</td>
											<td>Komisaris Independen</td>
											<td>01-Jan-1960</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div id="middle-three" class="card-body tab-pane fade" role="tabpanel">
						<div class="detail-middle-card">
							<div class="text-middle-card">
								<p>{{ __('dashboard.middle-three') }}</p>
								<p class="count-card-middle">0</p>
							</div>
							<div class="vl"></div>
							<div class="line-bottom-card"></div>
							<div class="table-middle-card">
								<table class="card-table table">
									<thead>
										<tr>
											<th>Employee No</th>
											<th>Name</th>
											<th>Location</th>
											<th>Position</th>
											<th>Birth Date</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td colspan="5" align="center">No Data To Display</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div id="middle-four" class="card-body tab-pane fade" role="tabpanel">
						<div class="detail-middle-card">
							<div class="text-middle-card">
								<p>{{ __('dashboard.middle-four') }}</p>
								<p class="count-card-middle">1</p>
							</div>
							<div class="vl"></div>
							<div class="line-bottom-card"></div>
							<div class="table-middle-card">
								<table class="card-table table">
									<thead>
										<tr>
											<th>Employee No</th>
											<th>Name</th>
											<th>Location</th>
											<th>Position</th>
											<th>Start Date</th>
											<th>End Date</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>9999002</td>
											<td>Budiman Purnomo</td>
											<td>Head Office</td>
											<td>Komisaris Independen</td>
											<td>01-Jan-1960</td>
											<td>01-Jan-2025</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div id="middle-five" class="card-body tab-pane fade" role="tabpanel">
						<div class="detail-middle-card">
							<div class="text-middle-card">
								<p>{{ __('dashboard.middle-five') }}</p>
								<p class="count-card-middle">4</p>
							</div>
							<div class="vl"></div>
							<div class="line-bottom-card"></div>
							<div class="table-middle-card">
								<table class="card-table table">
									<thead>
										<tr>
											<th>Employee No</th>
											<th>Name</th>
											<th>Location</th>
											<th>Position</th>
											<th>Birth Date</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>9999002</td>
											<td>Budiman Purnomo</td>
											<td>Head Office</td>
											<td>Komisaris Independen</td>
											<td>01-Jan-1960</td>
										</tr>
										<tr>
											<td>9999002</td>
											<td>Budiman Purnomo</td>
											<td>Head Office</td>
											<td>Komisaris Independen</td>
											<td>01-Jan-1960</td>
										</tr>
										<tr>
											<td>9999002</td>
											<td>Budiman Purnomo</td>
											<td>Head Office</td>
											<td>Komisaris Independen</td>
											<td>01-Jan-1960</td>
										</tr>
										<tr>
											<td>9999002</td>
											<td>Budiman Purnomo</td>
											<td>Head Office</td>
											<td>Komisaris Independen</td>
											<td>01-Jan-1960</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div id="middle-six" class="card-body tab-pane fade" role="tabpanel">
						<div class="detail-middle-card">
							<div class="text-middle-card">
								<p>{{ __('dashboard.middle-six') }}</p>
								<p class="count-card-middle">0</p>
							</div>
							<div class="vl"></div>
							<div class="line-bottom-card"></div>
							<div class="table-middle-card">
								<table class="card-table table">
									<thead>
										<tr>
											<th>Employee No</th>
											<th>Name</th>
											<th>Location</th>
											<th>Position</th>
											<th>Birth Date</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td colspan="5" align="center">No Data To Display</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script src="https://rawgit.com/beaver71/Chart.PieceLabel.js/master/build/Chart.PieceLabel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
<script src="{{ asset('js/jquery.simple-calendar.js') }}"></script>
<script>
	var $calendar;
	$(document).ready(function () {
		let container = $(".calendar-dashboard").simpleCalendar({
      		fixedStartDay: 0, // Awal Minggu adalah hari Minggu
      		disableEmptyDetails: true,
      		displayEvent: true,
      		events: [
		        {
		        	startDate: new Date('2021-04-12'),
		        	endDate: new Date('2021-04-12'),
		        	summary: 'Event A'
		        },
		        {
		        	startDate: new Date('2021-04-21'),
		        	endDate: new Date('2021-04-22'),
		        	summary: 'Event B'
		        },
		        {
		        	startDate: new Date('2021-04-27'),
		        	endDate: new Date('2021-04-30'),
		        	summary: 'Event C'
		        }
		    ],
      	});

		$calendar = container.data('plugin_simpleCalendar');

		$(".tabs-card").click(function() {  
			$(".tabs-card").removeClass("active"); 
		});

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
					var txt = total + ' Employees';
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

		var employeeActiveData = {
			labels: [
			"Male",
			"Female"
			],
			datasets: [
			{
				data: [580, 420],
				backgroundColor: [
				"#004883",
				"#E75B52"
				]
			}]
		};

		var employeeAgeData = {
			labels: [
			"Age 21 - 30",
			"Age 30 - 40",
			"Age 40 - 55"
			],
			datasets: [
			{
				data: [350, 550, 100],
				backgroundColor: [
				"#4472C4",
				"#E75B52",
				"#A5A5A5"
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
				data: [58, 34, 6, 12],
				backgroundColor: [
				"#004883",
				"#004883",
				"#004883",
				"#004883"
				],
				maxBarThickness: 20
			}]
		};

		var payrollData = {
			labels: [
			"January",
			"February",
			"March",
			"April",
			"May",
			"June",
			"July",
			"August",
			"September",
			"October",
			"November",
			"December"
			],
			datasets: [
			{
				data: [4000000000, 3500000000, 4250000000, 4500000000, 4250000000],
				borderColor: "#FFC814",
				fill: false,
			}]
		};

		var overtimePayData = {
			labels: [
			"March 01",
			"March 02",
			"March 03",
			"March 04",
			"March 05",
			"March 06",
			"March 07",
			"March 08",
			"March 09",
			"March 10"
			],
			datasets: [
			{
				data: [3000000, 3500000, 3250000, 4000000, 4250000],
				borderColor: "#004883",
				fill: false,
			}]
		};

		var overtimeHourData = {
			labels: [
			"June",
			"July"
			],
			datasets: [
			{
				data: [15, 20],
				backgroundColor: [
				"#4472C4",
				"#004883"
				],
				maxBarThickness: 20
			}]
		};

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
				text: 'Active Employee'
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
				text: 'Employee Headcount By Age'
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
				text: 'Employee Length of Service',
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
							return value.toFixed(1) + ' %';
						},
						beginAtZero: true
					}
				}]
			},
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
				text: 'Payroll',
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
						stepSize: 1000000000,
						max: 7000000000
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
				text: 'Overtime Pay',
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
				text: 'Overtime Hours',
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

		var doughnutChartEmployeeActive = new Chart(chartEmployeeActive, {
			type: 'doughnut',
			data: employeeActiveData,
			options: chartOptionsEmployeeActive
		});

		var doughnutChartEmployeeAge = new Chart(chartEmployeeAge, {
			type: 'doughnut',
			data: employeeAgeData,
			options: chartOptionsEmployeeAge
		});

		var barChartEmployeeService = new Chart(chartEmployeeService, {
			type: 'bar',
			data: employeeServiceData,
			options: chartOptionsEmployeeService
		});

		var lineChartPayroll = new Chart(chartPayroll, {
			type: 'line',
			data: payrollData,
			options: chartOptionsPayroll
		});

		var lineChartOvertimePay = new Chart(chartOvertimePay, {
			type: 'line',
			data: overtimePayData,
			options: chartOptionsOvertimePay
		});

		var barChartOvertimeHour = new Chart(chartOvertimeHour, {
			type: 'bar',
			data: overtimeHourData,
			options: chartOptionsOvertimeHour
		});

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

				$('#graph_employee_service').hide();
			}
		};
	});
</script>

</html>