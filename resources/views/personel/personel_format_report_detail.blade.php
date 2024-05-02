<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel.judul') }}</title>
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
			<a href="{{ url()->previous() }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">Free Format Field List</span>
			</a>
		</div>
		<div class="div-form">
			<form>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="record_status">Record Status</label>
							<select class="form-control" id="record_status" name="record_status" disabled>
								<option value="">Choose Status</option>
								<option value="Active">Active</option>
								<option value="Inactive">Inactive</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="report_code">Report Code</label>
							<input type="text" class="form-control" id="report_code" name="report_code" placeholder="Report Code" disabled>
						</div>
					</div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="report_name">Report Name</label>
                            <input type="text" class="form-control" id="report_name" name="report_name" placeholder="Report Name" disabled>
                        </div>
                    </div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="font_size">Font Size</label>
							<select class="form-control" id="font_size" name="font_size" disabled>
								<option value="">Choose Size</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
                                <option value="10">10</option>
							</select>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="font_size_description">Description</label>
							<input type="text" class="form-control" id="font_size_description" name="font_size_description" disabled>
						</div>
					</div>
				</div>
			</form>
			<div class="row">
                <div class="col-12">
                    <table id="report_format_data_table" class="table hover">
                        <thead>
                            <tr>
                                <th>Column Name</th>
                                <th>Table Name</th>
                                <th>Field Name</th>
                                <th>Column Header</th>
                                <th>Alignment</th>
                                <th>Width</th>
                                <th>Data Format</th>
                                <th>Display</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-add-report-format" id="btn-add-report-format" style="width: 100%;" data-toggle="modal" data-target="#modal_add_report_format">
                        <i class="fa fa-plus"></i> Add
                    </button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-danger" name="btn-remove-report-format" id="btn-remove-report-format" style="width: 100%;">
                        <i class="fa fa-times"></i> Remove
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table id="report_format_condition_data_table" class="table hover">
                        <thead>
                            <tr>
                                <th>Seq No</th>
                                <th>Table Name</th>
                                <th>Field Name</th>
                                <th>Operator</th>
                                <th>Value From</th>
                                <th>Value To</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-add-report-format-condition" id="btn-add-report-format-condition" style="width: 100%;" data-toggle="modal" data-target="#modal_add_report_format_condition">
                        <i class="fa fa-plus"></i> Add
                    </button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-danger" name="btn-remove-report-format-condition" id="btn-remove-report-format-condition" style="width: 100%;">
                        <i class="fa fa-times"></i> Remove
                    </button>
                </div>
            </div>
		</div>
	</div>
	<div class="modal fade" id="modal_add_report_format"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Report Format</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_no">Column No</label>
                                    <input type="text" class="form-control" id="column_no" name="column_no" placeholder="Column No">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_header">Column Header</label>
                                    <input type="text" class="form-control" id="column_header" name="column_header" placeholder="Column Header">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="table_name">Table Name</label>
                                    <select class="form-control" id="table_name" name="table_name">
                                      <option value="">Choose Table Name</option>
                                      <option value="PeMaster">PeMaster</option>
                                      <option value="PeMasterInfo">PeMasterInfo</option>
                                      <option value="PeMasterAddress">PeMasterAddress</option>
                                      <option value="PeMasterBank">PeMasterBank</option>
                                      <option value="PeHistoryJob">PeHistoryJob</option>
                                      <option value="PeFreeFormat">PeFreeFormat</option>
                                      <option value="PeMasterPayroll">PeMasterPayroll</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="field_name">Field Name</label>
                                    <select class="form-control" id="field_name" name="field_name">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="alignment">Alignment</label>
                                    <select class="form-control" id="alignment" name="alignment">
                                      <option value="">Choose Alignment</option>
                                      <option value="Left">Left</option>
                                      <option value="Right">Right</option>
                                      <option value="Center">Center</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="width">Width</label>
                                    <input type="number" class="form-control" id="width" name="width" placeholder="Width">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="data_format">Data Format</label>
                                    <select class="form-control" id="data_format" name="data_format">
                                      <option value="">Choose Format</option>
                                      <option value="MMMM yyyy">MMMM yyyy</option>
                                      <option value="dd MM yyyy">dd MM yyyy</option>
                                      <option value="dd MMM yyyy">dd MMM yyyy</option>
                                      <option value="dd-MM-yyyy">dd-MM-yyyy</option>
                                      <option value="dd-MMM-yyyy">dd-MMM-yyyy</option>
                                      <option value="HH:mm">HH:mm</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="display_checkbox" name="display_checkbox">
                                    <label class="form-check-label" for="display_checkbox">Display</label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary w-25"><i class="fa fa-check"></i> OK</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_report_format_condition"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Report Format Condition</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                       <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="seq_no">Seq No</label>
                                    <input type="text" class="form-control" id="seq_no" name="seq_no" placeholder="Seq No">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="table_name">Table Name</label>
                                    <select class="form-control" id="table_name" name="table_name">
                                      <option value="">Choose Table Name</option>
                                      <option value="PeMaster">PeMaster</option>
                                      <option value="PeMasterInfo">PeMasterInfo</option>
                                      <option value="PeMasterAddress">PeMasterAddress</option>
                                      <option value="PeMasterBank">PeMasterBank</option>
                                      <option value="PeHistoryJob">PeHistoryJob</option>
                                      <option value="PeFreeFormat">PeFreeFormat</option>
                                      <option value="PeMasterPayroll">PeMasterPayroll</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="field_name">Field Name</label>
                                    <select class="form-control" id="field_name" name="field_name">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fringe_benefit_operator">Operator</label>
                                    <select class="form-control" id="fringe_benefit_operator" name="fringe_benefit_operator">
                                      <option value="">Choose Operator</option>
                                      <option value="=">=</option>
                                      <option value="<>"><></option>
                                      <option value="<="><=</option>
                                      <option value=">=">>=</option>
                                      <option value="Between">Between</option>
                                      <option value="Like">Like</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="value_from">Value From</label>
                                    <input type="text" class="form-control" id="value_from" name="value_from" placeholder="Value From">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="value_to">Value To</label>
                                    <input type="text" class="form-control" id="value_to" name="value_to" placeholder="Value To">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary w-25"><i class="fa fa-check"></i> OK</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="{{ asset('js/jquery.redirect.js') }}""></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    function savePreviousURL() {
        if(!sessionStorage.getItem('previousURLTwo')){
            const previousURL = document.referrer;
            sessionStorage.setItem('previousURLTwo', previousURL);
        }
    }

    // Fungsi untuk menangani navigasi mundur
    function goBackWithModuleID() {
        let newURL = sessionStorage.getItem('previousURLTwo');

        sessionStorage.removeItem('previousURLTwo');

        window.location.href = newURL;
    }

    window.onload = function() {
        savePreviousURL();
    }
    
  $(document).ready(function() {
    var table = null;
    $('#report_format_data_table thead tr').clone(true).appendTo('#report_format_data_table thead');
    $('#report_format_data_table thead tr:eq(1) th').each( function (i) {
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

    $('#report_format_condition_data_table thead tr').clone(true).appendTo('#report_format_condition_data_table thead');
    $('#report_format_condition_data_table thead tr:eq(1) th').each( function (i) {
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

    load_table_report_format();

    load_table_report_format_condition();

    function load_table_report_format() {
        table = $('#report_format_data_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('personnel/format_report/report_format/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'full_numbers',
            columns: [
                {data: 'column_name', name: 'column_name'},
                {data: 'table_name', name: 'table_name'},
                {data: 'field_name', name: 'field_name'},
                {data: 'column_header', name: 'column_header'},
                {data: 'alignment', name: 'alignment'},
                {data: 'width', name: 'width'},
                {data: 'data_format', name: 'data_format'},
                {
                    data: 'display', 
                    name: 'display',
                    render: function (data,type,row) {
                        if(data == 1){
                            return '<input type="checkbox" checked>';
                        }else{
                            return '<input type="checkbox">';
                        }
                    }
                }
            ]
        });
    }

    function load_table_report_format_condition() {
        table = $('#report_format_condition_data_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('personnel/format_report/report_format_condition/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'full_numbers',
            columns: [
                {data: 'seq_no', name: 'seq_no'},
                {data: 'table_name', name: 'table_name'},
                {data: 'field_name', name: 'field_name'},
                {data: 'operator', name: 'operator'},
                {data: 'value_from', name: 'value_from'},
                {data: 'value_to', name: 'value_to'}
            ]
        });
    }
  });
</script>

</html>