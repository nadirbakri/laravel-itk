<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel_data_format.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
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
            <a href="javascript:void(0)"><i class="fa fa-arrow-left"></i> Back</a>
            <a href="javascript:void(0)"><i class="fa fa-arrow-right"></i> Next</a>
            <a href="javascript:void(0)"><i class="fa fa-plus-square"></i> New</a>
            <a href="javascript:void(0)"><i class="fa fa-edit"></i> Edit</a>
            <a href="javascript:void(0)"><i class="fa fa-floppy-o"></i> Save</a>
            <a href="javascript:void(0)"><i class="fa fa-check-circle-o"></i> Activate</a>
            <a href="javascript:void(0)"><i class="fa fa-stop-circle-o"></i> Deactivate</a>
            <a href="javascript:void(0)"><i class="fa fa-list-ul"></i> List</a>
        </div>
		<div class="div-title">
			<a href="{{ url('personel') }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('personel_data_format.list') }}</span>
			</a>
		</div>
		<div class="div-form">
            <form>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="level_one_description">Level 1 Description</label>
                            <input type="text" class="form-control" id="level_one_description" name="level_one_description" placeholder="Level 1 Description">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="level_one_length">Length</label>
                            <input type="text" class="form-control" id="level_one_length" name="level_one_length" placeholder="Length" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="level_two_description">Level 2 Description</label>
                            <input type="text" class="form-control" id="level_two_description" name="level_two_description" placeholder="Level 2 Description">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="level_two_length">Length</label>
                            <input type="text" class="form-control" id="level_two_length" name="level_two_length" placeholder="Length" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="level_three_description">Level 3 Description</label>
                            <input type="text" class="form-control" id="level_three_description" name="level_three_description" placeholder="Level 3 Description">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="level_three_length">Length</label>
                            <input type="text" class="form-control" id="level_three_length" name="level_three_length" placeholder="Length" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="level_four_description">Level 4 Description</label>
                            <input type="text" class="form-control" id="level_four_description" name="level_four_description" placeholder="Level 4 Description">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="level_four_length">Length</label>
                            <input type="text" class="form-control" id="level_four_length" name="level_four_length" placeholder="Length" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <hr class="horizontal" />
                </div>
                <div class="row">
                    <div class="col-12">
                        <span class="div-title-text">Employee</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_no_format">Employee No Format</label>
                            <input type="text" class="form-control" id="employee_no_format" name="employee_no_format" placeholder="Employee No Format">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="last_employee_no">Last Employee No</label>
                            <input type="text" class="form-control" id="last_employee_no" name="last_employee_no" placeholder="Last Employee No">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="auto_generate_checkbox" name="auto_generate_checkbox">
                                <label class="form-check-label" for="auto_generate_checkbox">Auto Generate</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <hr class="horizontal" />
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cost_center_format">Cost Center Format</label>
                            <input type="text" class="form-control" id="cost_center_format" name="cost_center_format" placeholder="Cost Center Format">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="format_tax_registration_no">Format Tax Registration No</label>
                            <input type="text" class="form-control" id="format_tax_registration_no" name="format_tax_registration_no" placeholder="Format Tax Registration No">
                        </div>
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
    $('#award_data_entry_table thead tr').clone(true).appendTo('#award_data_entry_table thead');
    $('#award_data_entry_table thead tr:eq(1) th').each( function (i) {
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

    load_table_award_data_entry();

    function load_table_award_data_entry() {
        table = $('#award_data_entry_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('personel/award_data_entry/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'ellipses',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'employee_no', name: 'employee_no'},
                {data: 'award_date', name: 'award_date'},
                {data: 'award_type', name: 'award_type'},
                {data: 'award_name', name: 'award_name'},
                {data: 'event_name', name: 'event_name'}
            ]
        });
    }
  });
</script>

</html>