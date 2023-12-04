<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel_evaluation_data_entry.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
	<style type="text/css">
		.div-personel {
			max-width: 100%;
			margin: auto;
			/*margin-top: 1%;*/
		}
        .div-title {
            margin-top: 8%;
        }
	</style>
</head>

<body>
	<div class="div-personel">
        <div class="div-navbar sticky-navbar">
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-back-blue.svg') }}" alt="Back">
                <img src="{{ url('/icons/functionbar/functionbar-back-white.svg') }}" class="functionbar-hover" alt="Back">
                <span>Back</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-next-blue.svg') }}" alt="Next">
                <img src="{{ url('/icons/functionbar/functionbar-next-white.svg') }}" class="functionbar-hover" alt="Next">
                <span>Next</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-new-blue.svg') }}" alt="New">
                <img src="{{ url('/icons/functionbar/functionbar-new-white.svg') }}" class="functionbar-hover" alt="New">
                <span>New</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-edit-blue.svg') }}" alt="Edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-white.svg') }}" class="functionbar-hover" alt="Edit">
                <span>Edit</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">
                <img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">
                <span>Save</span>
            </a>
            <a class="list-functionbar-md" href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-blue.svg') }}" alt="Activate">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-white.svg') }}" class="functionbar-hover" alt="Activate">
                <span>Activate</span>
            </a>
            <a class="list-functionbar-lg" href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-blue.svg') }}" alt="Deactivate">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-white.svg') }}" class="functionbar-hover" alt="Deactivate">
                <span>Deactivate</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-list-blue.svg') }}" alt="List">
                <img src="{{ url('/icons/functionbar/functionbar-list-white.svg') }}" class="functionbar-hover" alt="List">
                <span>List</span>
            </a>
        </div>
		<div class="div-title">
			<a href="{{ route('personnel', ['moduleID' => 'PE']) }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('personel_evaluation_data_entry.list') }}</span>
			</a>
		</div>
		<div class="div-form">
            <form>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_number">Employee Number</label>
                            <select class="form-control" id="employee_number" name="employee_number">
                                <option value="">Choose</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_name">Employee Name</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="evaluation_period_start_month">Evaluation Period Start</label>
                            <select class="form-control" id="evaluation_period_start_month" name="evaluation_period_start_month">
                                <option value="">Month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="evaluation_period_start_year">&nbsp;</label>
                            <select class="form-control" id="evaluation_period_start_year" name="evaluation_period_start_year">
                                <option value="">Year</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="evaluation_period_end_month">Evaluation Period End</label>
                            <select class="form-control" id="evaluation_period_end_month" name="evaluation_period_end_month">
                                <option value="">Month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="evaluation_period_end_year">&nbsp;</label>
                            <select class="form-control" id="evaluation_period_end_year" name="evaluation_period_end_year">
                                <option value="">Year</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="ranking">Ranking</label>
                            <select class="form-control" id="ranking" name="ranking">
                                <option value="">Choose</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="ranking_description">Ranking Description</label>
                            <input type="text" class="form-control" id="ranking_description" name="ranking_description" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="position">Position</label>
                            <select class="form-control" id="position" name="position">
                                <option value="">Choose</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="position_description">Position Description</label>
                            <input type="text" class="form-control" id="position_description" name="position_description" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="form">Form</label>
                            <select class="form-control" id="form" name="form">
                                <option value="">Choose</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="form_description">Form Description</label>
                            <input type="text" class="form-control" id="form_description" name="form_description" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="evaluator">Evaluator</label>
                            <select class="form-control" id="evaluator" name="evaluator">
                                <option value="">Choose</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="evaluator_name">Evaluator Name</label>
                            <input type="text" class="form-control" id="evaluator_name" name="evaluator_name" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-search-evaluation-data" id="btn-search-evaluation-data" style="width: 100%;">
                            <i class="fa fa-search"></i> Search
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table id="evaluation_data_entry_table" class="table hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Employee No</th>
                                    <th>Employee Name</th>
                                    <th>Period From</th>
                                    <th>Period To</th>
                                    <th>Evaluation Date</th>
                                    <th>From Code</th>
                                    <th>Eval ID</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </form>
		</div>
	</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    var table = null;
    $('#evaluation_data_entry_table thead tr').clone(true).appendTo('#evaluation_data_entry_table thead');
    $('#evaluation_data_entry_table thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html('<input class="form-control" type="text" placeholder="'+title+'" />');
 
        $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
                table
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        } );
    });

    load_table_evaluation_data_entry();

    function load_table_evaluation_data_entry() {
        table = $('#evaluation_data_entry_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('personnel/evaluation_data_entry/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'full_numbers',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'employee_no', name: 'employee_no'},
                {data: 'employee_name', name: 'employee_name'},
                {data: 'period_from', name: 'period_from'},
                {data: 'period_to', name: 'period_to'},
                {data: 'evaluation_date', name: 'evaluation_date'},
                {data: 'form_code', name: 'form_code'},
                {data: 'eval_id', name: 'eval_id'}
            ]
        });
    }
  });
</script>

</html>