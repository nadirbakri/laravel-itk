<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel.judul') }}</title>
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
			<a href="{{ url('personel/evaluation_code') }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">Evaluation Code List</span>
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
							<label for="form_code">Form Code</label>
							<input type="text" class="form-control" id="form_code" name="form_code" placeholder="Form Code" disabled>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="form_name">Form Name</label>
							<input type="text" class="form-control" id="form_name" name="form_name" placeholder="Form Name" disabled>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-8">
						<table id="evaluation_code_table" class="table hover">
							<thead>
								<tr>
									<th></th>
									<th>Seq</th>
									<th>Evaluated Aspect</th>
									<th>Calculation</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<button type="button" class="btn btn-primary" name="btn-add-evaluation-code" id="btn-add-evaluation-code" style="width: 100%;" data-toggle="modal" data-target="#modal_add_evaluation_code">
							<i class="fa fa-plus"></i> Add
						</button>
					</div>
					<div class="col-3">
						<button type="button" class="btn btn-danger" name="btn-remove-evaluation-code" id="btn-remove-evaluation-code" style="width: 100%;">
							<i class="fa fa-times"></i> Remove
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="modal fade" id="modal_add_evaluation_code" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Evaluation Data Aspect</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="seq">Seq</label>
                                    <input type="text" class="form-control" id="seq" name="seq" placeholder="Seq">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="evaluated_aspect">Evaluated Aspect</label>
                                    <input type="text" class="form-control" id="evaluated_aspect" name="evaluated_aspect" placeholder="Evaluated Aspect">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="calculation">Calculation</label>
                                    <select class="form-control" id="calculation" name="calculation">
                                      <option value="">Choose</option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="H">H</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="calculation_to">To</label>
                                    <input type="text" class="form-control" id="calculation_to" name="calculation_to" placeholder="To">
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
    <div class="modal fade" id="modal_add_evaluation_code_detail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Value</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="predicate">Predicate</label>
                                    <input type="text" class="form-control" id="predicate" name="predicate" placeholder="Predicate">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="value">Value</label>
                                    <input type="text" class="form-control" id="value" name="value" placeholder="Value">
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
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    var table = null;

    load_table_evaluation_code();

    function load_table_evaluation_code() {
        table = $('#evaluation_code_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('personel/evaluation_code/evaluation_code/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'ellipses',
            columns: [
	            {
	            	"className":      'details-control',
	            	"orderable":      false,
	            	"data":           null,
	            	"defaultContent": ''
	            },
                {data: 'seq', name: 'seq'},
                {data: 'evaluated_aspect', name: 'evaluated_aspect'},
                {data: 'calculation', name: 'calculation'}
            ]
        });
    }

    $('#evaluation_code_table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            row.child.hide();
            tr.removeClass('shown');
        }else{
            var d = row.data();
            var tableID = "evaluation_code_" + d.seq;
            row.child( 
                '<table id = "' + tableID + '" cellpadding="5" cellspacing="0" border="0">'+
                '<thead><tr><th>Predicate</th><th>Value</th></tr></thead></table>'+
                '<div class="row"><div class="col-6">'+
                '<button type="button" class="btn btn-primary" name="btn-add-evaluation-code-detail" id="btn-add-evaluation-code-detail" style="width: 100%;" data-toggle="modal" data-target="#modal_add_evaluation_code_detail"><i class="fa fa-plus"></i> Add</button>'+
                '</div><div class="col-6">'+
                '<button type="button" class="btn btn-danger" name="btn-remove-evaluation-code-detail" id="btn-remove-evaluation-code-detail" style="width: 100%;"><i class="fa fa-times"></i> Remove</button>'+
                '</div></div>'+
                '').show();

            $('#' + tableID).DataTable({
                destroy: true,
                select: true,
                paging: false,
                bFilter: false,
                bInfo: false,
                bLengthChange: false,
                ajax: "{{ url('personel/evaluation_code/evaluation_code/detail/table') }}",
                columns: [
                    {data: 'predicate', name: 'predicate'},
                    {data: 'value', name: 'value'}
                ]
            })
            .on( 'select', function ( e, dt, type, indexes ) {
                console.log('select');
                if ( type === 'row' ) {
                    var data = $('#' + tableID).DataTable().rows( indexes ).data();
                    console.log(data.toArray());
                }
            });
            tr.addClass('shown');
        }
    });
  });
</script>

</html>