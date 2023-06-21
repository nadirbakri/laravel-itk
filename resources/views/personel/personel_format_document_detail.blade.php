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
			<a href="{{ url('personnel/format_document') }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">Format Document List</span>
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
							<label for="document_format">Document Format</label>
							<select class="form-control" id="document_format" name="document_format">
								<option value="">Choose</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="prefix">Prefix</label>
							<input type="text" class="form-control" id="prefix" name="prefix" placeholder="Prefix" disabled>
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="last_no">Last No</label>
							<input type="text" class="form-control" id="last_no" name="last_no" placeholder="Last No" disabled>
						</div>
					</div>
					<div class="col-2">
                        <div class="form-group">
                        	<label for="auto_checkbox">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="auto_checkbox" name="auto_checkbox">
                                <label class="form-check-label" for="auto_checkbox">Auto</label>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="suffix_one">Suffix 1</label>
							<input type="text" class="form-control" id="suffix_one" name="suffix_one" placeholder="Suffix 1" disabled>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="suffix_two">Suffix 2</label>
							<input type="text" class="form-control" id="suffix_two" name="suffix_two" placeholder="Suffix 2" disabled>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="signer_left">Signer Left</label>
							<select class="form-control" id="signer_left" name="signer_left">
								<option value="">Choose</option>
							</select>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="signer_left_name">Signer Name</label>
							<input type="text" class="form-control" id="signer_left_name" name="signer_left_name" disabled>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="signer_center">Signer Center</label>
							<select class="form-control" id="signer_center" name="signer_center">
								<option value="">Choose</option>
							</select>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="signer_center_name">Signer Name</label>
							<input type="text" class="form-control" id="signer_center_name" name="signer_center_name" disabled>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="signer_right">Signer Right</label>
							<select class="form-control" id="signer_right" name="signer_right">
								<option value="">Choose</option>
							</select>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="signer_right_name">Signer Name</label>
							<input type="text" class="form-control" id="signer_right_name" name="signer_right_name" disabled>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="detail_amount">Detail Amount</label>
							<input type="text" class="form-control" id="detail_amount" name="detail_amount" placeholder="Detail Amount" disabled>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="source_document_code">Source Document Code</label>
							<select class="form-control" id="source_document_code" name="source_document_code">
								<option value="">Choose</option>
							</select>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="source_document_description">Source Document Description</label>
							<input type="text" class="form-control" id="source_document_description" name="source_document_description" disabled>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="link_directory_format">Link Directory Format</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="link_directory_format" name="link_directory_format" webkitdirectory directory multiple>
								<label class="custom-file-label" for="link_directory_format">Browse</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<table id="format_document_data_table" class="table hover">
							<thead>
								<tr>
									<th>Field Name</th>
									<th>Status</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<button type="button" class="btn btn-primary" name="btn-add-format-document" id="btn-add-format-document" style="width: 100%;" data-toggle="modal" data-target="#modal_add_format_document">
							<i class="fa fa-plus"></i> Add
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="modal fade" id="modal_add_format_document"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Format Document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="field_name">Field Name</label>
                                    <input type="text" class="form-control" id="field_name" name="field_name" placeholder="Field Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control" id="status" name="status" placeholder="Status">
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
    $('#format_document_data_table thead tr').clone(true).appendTo('#format_document_data_table thead');
    $('#format_document_data_table thead tr:eq(1) th').each( function (i) {
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

    load_table_format_document();

    function load_table_format_document() {
        table = $('#format_document_data_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('personnel/format_document/format_document/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'full_numbers',
            columns: [
                {data: 'field_name', name: 'field_name'},
                {data: 'status', name: 'status'}
            ]
        });
    }
  });
</script>

</html>