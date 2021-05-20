<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel_print_letter.judul') }}</title>
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
				<span class="title-text">{{ __('personel_print_letter.list') }}</span>
			</a>
		</div>
		<div class="div-form">
            <form>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="print_date_start">Print Date Start</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="print_date_start" name="print_date_start" placeholder="Print Date Start">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="print_date_end">Print Date End</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="print_date_end" name="print_date_end" placeholder="Print Date End">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="document_format">Document Format</label>
                            <select class="form-control" id="document_format" name="document_format" disabled>
                                <option value="">Choose Format</option>
                                <option value="Award">Award</option>
                                <option value="Demotion">Demotion</option>
                                <option value="Mutation">Mutation</option>
                                <option value="Promotion">Promotion</option>
                                <option value="Termination">Termination</option>
                                <option value="Sanction">Sanction</option>
                            </select>
                        </div>
                    </div>
                </div>
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
                    <div class="col-6">
                        <div class="form-group">
                            <label for="document_code">Document Code</label>
                            <select class="form-control" id="document_code" name="document_code" disabled>
                                <option value="">Choose</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="document_name">Document Name</label>
                            <input type="text" class="form-control" id="document_name" name="document_name" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="letter_no">Letter No</label>
                            <input type="text" class="form-control" id="letter_no" name="letter_no" placeholder="Letter No" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-search-print-letter" id="btn-search-print-letter" style="width: 100%;">
                            <i class="fa fa-search"></i> Search
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table id="print_letter_data_table" class="table hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Letter No</th>
                                    <th>Employee No</th>
                                    <th>Employee Name</th>
                                    <th>Print Date</th>
                                    <th>Document Format</th>
                                    <th>Document Code</th>
                                    <th>Show Title</th>
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
    $('#print_letter_data_table thead tr').clone(true).appendTo('#print_letter_data_table thead');
    $('#print_letter_data_table thead tr:eq(1) th').each( function (i) {
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

    load_table_print_letter();

    function load_table_print_letter() {
        table = $('#print_letter_data_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('personel/print_letter/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'ellipses',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'letter_no', name: 'letter_no'},
                {data: 'employee_no', name: 'employee_no'},
                {data: 'employee_name', name: 'employee_name'},
                {data: 'print_date', name: 'print_date'},
                {data: 'document_format', name: 'document_format'},
                {data: 'document_code', name: 'document_code'},
                {data: 'show_title', name: 'show_title'}
            ]
        });
    }
  });
</script>

</html>