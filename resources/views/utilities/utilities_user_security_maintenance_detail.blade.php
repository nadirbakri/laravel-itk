<!DOCTYPE html>
<html>
<head>
	<title>{{ __('utilities.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.7/css/dataTables.checkboxes.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
	<style type="text/css">
		.div-utilities {
			max-width: 100%;
			margin: auto;
			/*margin-top: 1%;*/
		}
        .div-title {
            margin-top: 8%;
        }
        .modal-header-notification {
            border-bottom:1px solid #eee;
            background-color: #f44336;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
	</style>
</head>

<body>
	<div class="div-utilities">
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
			<a href="{{ url('utilities/user_security_maintenance') }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">User Security Maintenance List</span>
			</a>
		</div>
		<div class="div-form">
            <form>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="record_status">Record Status</label>
                            <input type="text" class="form-control" id="record_status" name="record_status" placeholder="Record Status" value="{{ $data->recordStatus }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="user_id">User ID</label>
                            <input type="text" class="form-control" id="user_id" name="user_id" placeholder="User ID" value="{{ $data->userID }}" disabled>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="user_name">User Name</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" value="{{ $data->userName }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_no">Employee No</label>
                            <select class="form-control select2" id="employee_no" name="employee_no"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_name">Employee Name</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="Employee Name" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="user_type">User Type</label>
                            <select class="form-control select2" id="user_type" name="user_type"></select>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-8">
                    <table id="level_data_table" class="table hover" style="width: 100%;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Level Type</th>
                                <th>Level Name</th>
                                <th>Level Authorization</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-edit-level" id="btn-edit-level" style="width: 100%;">
                        Edit
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table id="company_data_table" class="table hover" style="width: 100%;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Company Code</th>
                                <th>Company Name</th>
                                <th>Set Default</th>
                                <th>Status</th>
                                <th>User Type</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-edit-company" id="btn-edit-company" style="width: 100%;">
                        Edit
                    </button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-add-company" id="btn-add-company" style="width: 100%;" data-toggle="modal" data-target="#modal_add_company">
                        Add
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <table id="module_data_table" class="table hover" style="width: 100%;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Module Name</th>
                                <th>Group Authorization Name</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-edit-module" id="btn-edit-module" style="width: 100%;">
                        Edit
                    </button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-add-module" id="btn-add-module" style="width: 100%;" data-toggle="modal" data-target="#modal_add_module">
                        Add
                    </button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-remove-module" id="btn-remove-module" style="width: 100%;">
                        Remove
                    </button>
                </div>
            </div>
            <div class="row">
                <hr class="horizontal" />
            </div>
            <div class="row">
                <div class="col-4">
                    <button type="button" class="btn btn-primary" name="btn-reset-password" id="btn-reset-password" style="width: 100%;">
                        Reset Password
                    </button>
                </div>
            </div>
		</div>
	</div>
    <div class="modal fade" id="modal_edit_level" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="level_type">Level Type</label>
                                    <input type="text" class="form-control" id="level_type" name="level_type" placeholder="Level Type" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="level_name">Level Name</label>
                                    <input type="text" class="form-control" id="level_name" name="level_name" placeholder="Level Name" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="level_authorization">Level Authorization</label>
                                </div>
                                <table id="level_authorization_table" class="table hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Level Code</th>
                                            <th>Level Name</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary w-25"><i class="fa fa-floppy-o"></i> Save</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_company" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="company_code">Company Code</label>
                                    <select class="form-control select2" id="company_code" name="company_code"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="company_default_checkbox" name="company_default_checkbox">
                                    <label class="form-check-label" for="company_default_checkbox">Set Default</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="">Choose Status</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary w-25"><i class="fa fa-floppy-o"></i> Save</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_edit_company" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="edit_company_code">Company Code</label>
                                    <input type="text" class="form-control" id="edit_company_code" name="edit_company_code" placeholder="Company Code" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="edit_company_name">Company Name</label>
                                    <input type="text" class="form-control" id="edit_company_name" name="edit_company_name" placeholder="Company Name" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="edit_company_default_checkbox" name="edit_company_default_checkbox">
                                    <label class="form-check-label" for="edit_company_default_checkbox">Set Default</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="edit_status">Status</label>
                                    <select class="form-control" id="edit_status" name="edit_status">
                                        <option value="">Choose Status</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary w-25"><i class="fa fa-floppy-o"></i> Save</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_module" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Module</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="module_name">Module Name</label>
                                    <select class="form-control select2" id="module_name" name="module_name"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="group_authorization">Group Authorization</label>
                                    <select class="form-control select2" id="group_authorization" name="group_authorization"></select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary w-25"><i class="fa fa-floppy-o"></i> Save</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_edit_module" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Module</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit_module_name">Module Name</label>
                                    <input type="text" class="form-control" id="edit_module_name" name="edit_module_name" placeholder="Module Name" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit_group_authorization">Group Authorization</label>
                                    <select class="form-control" id="edit_group_authorization" name="edit_group_authorization">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary w-25"><i class="fa fa-floppy-o"></i> Save</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="notification_error">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification">
                    <h5 class="modal-title">Error!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="message-notification-error">{{ $errors->first() }}</span>
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
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<!-- <script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.7/js/dataTables.checkboxes.min.js"></script> -->
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    var level_table = null;
    var company_table = null;
    var module_table = null;
    var level_auth_table = null;

    load_table_level();

    load_table_company();

    load_table_module();

    loadDataEmployeeNo();

    function load_table_level() {
        level_table = $('#level_data_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('utilities/user_security_maintenance/level/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'ellipses',
            order: [[ 1, 'asc' ]],
            columns: [
                {orderable: false, className: 'select-checkbox', targets: 0, "defaultContent": ''},
                {data: 'level_type', name: 'level_type'},
                {data: 'level_name', name: 'level_name'},
                {data: 'level_authorization', name: 'level_authorization'}
            ],
            select: {
                style:    'single',
                selector: 'td:first-child'
            }
        });
    }

    function load_table_company() {
        company_table = $('#company_data_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('utilities/user_security_maintenance/company/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'ellipses',
            columns: [
                {orderable: false, className: 'select-checkbox', targets: 0, "defaultContent": ''},
                {data: 'company_code', name: 'company_code'},
                {data: 'company_name', name: 'company_name'},
                {data: 'set_default', name: 'set_default'},
                {data: 'status', name: 'status'}
            ],
            select: {
                style:    'single',
                selector: 'td:first-child'
            }
        });
    }

    function load_table_module() {
        module_table = $('#module_data_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('utilities/user_security_maintenance/module/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'ellipses',
            columns: [
                {orderable: false, className: 'select-checkbox', targets: 0, "defaultContent": ''},
                {data: 'module_name', name: 'module_name'},
                {data: 'group_authorization_name', name: 'group_authorization_name'}
            ],
            select: {
                style:    'single',
                selector: 'td:first-child'
            }
        });
    }

    function load_table_level_authorization() {
        level_auth_table = $('#level_authorization_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            paging: false,
            ajax: "{{ url('utilities/user_security_maintenance/level_authorization/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'ellipses',
            order: [[ 1, 'asc' ]],
            columns: [
                {
                    orderable: false,
                    className: 'select-checkbox',
                    // 'checkboxes': {
                    //     'selectRow': true
                    // }, 
                    targets: 0, 
                    "defaultContent": ''
                },
                {data: 'levelCode', name: 'levelCode'},
                {data: 'levelName', name: 'levelName'}
            ],
            select: {
                style: 'multi',
                selector: 'td:first-child'
            }
        });
    }

    $('body').on('click', '#btn-edit-level', function () {
        var data = level_table.rows('.selected').data();
        if(data.count() > 0){
            $('#modal_edit_level').modal('show');
            $('#level_authorization_table').DataTable().destroy();
            load_table_level_authorization();
        }else{
            $('#notification_error').modal('show');
            $('#message-notification-error').html('No Data Selected');
        }
    });

    $('body').on('click', '#btn-add-company', function () {
        loadDataCompany();
        // $('#company_default_checkbox').prop('checked',false);

        $('#company_code').on("select2:select", function(e) { 
            var data = $('#company_code').select2('data');
            $('#company_name').val(data[0].data.companyName);
        });

        $('#company_code').on("select2:unselecting", function(e) { 
            $('#company_name').val('');
        });

        $.get("{{ url('status/api') }}", function( data ) {
            $.each(data, function(k, v){
                $('#status').append("<option value=" + v.variable + ">" + v.value + "</option>");
            });    
        });
    });

    $('body').on('click', '#btn-edit-company', function () {
        $.get("{{ url('status/api') }}", function( data ) {
            $.each(data, function(k, v){
                $('#edit_status').append("<option value=" + v.variable + ">" + v.value + "</option>");
            });    
        });

        var data = company_table.rows('.selected').data();
        if(data.count() > 0){
            $('#modal_edit_company').modal('show');
        }else{
            $('#notification_error').modal('show');
            $('#message-notification-error').html('No Data Selected');
        }
    });

    $('body').on('click', '#btn-add-module', function () {
        loadDataModule();
        loadDataGroupAuthorize('#group_authorization');
    });

    $('body').on('click', '#btn-edit-module', function () {
        loadDataGroupAuthorize('#edit_group_authorization');

        var data = module_table.rows('.selected').data();
        if(data.count() > 0){
            $('#modal_edit_module').modal('show');
        }else{
            $('#notification_error').modal('show');
            $('#message-notification-error').html('No Data Selected');
        }
    });

    $('body').on('click', '#btn-remove-module', function () {
        var data = module_table.rows('.selected').data();
        if(data.count() > 0){
            
        }else{
            $('#notification_error').modal('show');
            $('#message-notification-error').html('No Data Selected');
        }
    });

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    function loadDataEmployeeNo() {
        function formatSelect(data) {
            if(data.id){
                var $result2 = $('<div class="row">' +
                    '<div class="col-6">' + data.data.employeeNo + '</div>' +
                    '<div class="col-6">' + data.data.fullName + '</div>' +
                    '</div>');

                return $result2;
            }
        }

        var headerIsAppend = false;
        $('#employee_no').on('select2:open', function (e) {
            if (!headerIsAppend) {
                html = '<div class="row">' +
                    '<div class="col-6"><b>Employee No</b></div>' +
                    '<div class="col-6"><b>Employee Name</b></div>' +
                    '</div>';
                $('.select2-search').append(html);
                headerIsAppend = true;
            }
        });

        $('#employee_no').select2({
            width: '100%',
            placeholder: 'Choose Employee No',
            allowClear: true,
            ajax: {
                url: '/employee_no/api',
                dataType: 'json',
                delay: 250,
                type: "GET",
                data: function (params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term
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

    function loadDataCompany() {
        function formatSelect(data) {
            if(data.id){
                var $result2 = $('<div class="row">' +
                    '<div class="col-6">' + data.data.companyCode + '</div>' +
                    '<div class="col-6">' + data.data.companyName + '</div>' +
                    '</div>');

                return $result2;
            }
        }

        var headerIsAppend = false;
        $('#company_code').on('select2:open', function (e) {
            if (!headerIsAppend) {
                html = '<div class="row">' +
                    '<div class="col-6"><b>Company Code</b></div>' +
                    '<div class="col-6"><b>Company Name</b></div>' +
                    '</div>';
                $('.select2-search').append(html);
                headerIsAppend = true;
            }
        });

        $('#company_code').select2({
            width: '100%',
            placeholder: 'Choose Company Data',
            allowClear: true,
            ajax: {
                url: '/company/api',
                dataType: 'json',
                delay: 250,
                type: "GET",
                data: function (params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return { text: item.companyName, id: item.companyCode, data: item }
                        })
                    };
                },
                cache: true,
            },
            templateResult: formatSelect
        });
    }

    function loadDataModule() {
        function formatSelect(data) {
            if(data.id){
                var $result2 = $('<div class="row">' +
                    '<div class="col-6">' + data.data.moduleID + '</div>' +
                    '<div class="col-6">' + data.data.moduleName + '</div>' +
                    '</div>');

                return $result2;
            }
        }

        var headerIsAppend = false;
        $('#module_name').on('select2:open', function (e) {
            if (!headerIsAppend) {
                html = '<div class="row">' +
                    '<div class="col-6"><b>Module ID</b></div>' +
                    '<div class="col-6"><b>Module Name</b></div>' +
                    '</div>';
                $('.select2-search').append(html);
                headerIsAppend = true;
            }
        });

        $('#module_name').select2({
            width: '100%',
            placeholder: 'Choose Module',
            allowClear: true,
            ajax: {
                url: '/module/api',
                dataType: 'json',
                delay: 250,
                type: "GET",
                data: function (params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return { text: item.moduleName, id: item.moduleID, data: item }
                        })
                    };
                },
                cache: true,
            },
            templateResult: formatSelect
        });
    }

    function loadDataGroupAuthorize(field = '') {
        function formatSelect(data) {
            if(data.id){
                var $result2 = $('<div class="row">' +
                    '<div class="col-6">' + data.data.groupAuthorizeCode + '</div>' +
                    '<div class="col-6">' + data.data.groupAuthorizeDesc + '</div>' +
                    '</div>');

                return $result2;
            }
        }

        var headerIsAppend = false;
        $(field).on('select2:open', function (e) {
            if (!headerIsAppend) {
                html = '<div class="row">' +
                    '<div class="col-6"><b>Code</b></div>' +
                    '<div class="col-6"><b>Description</b></div>' +
                    '</div>';
                $('.select2-search').append(html);
                headerIsAppend = true;
            }
        });

        $(field).select2({
            width: '100%',
            placeholder: 'Choose Group Authorization',
            allowClear: true,
            ajax: {
                url: '/group_authorize/api',
                dataType: 'json',
                delay: 250,
                type: "GET",
                data: function (params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return { text: item.groupAuthorizeDesc, id: item.groupAuthorizeCode, data: item }
                        })
                    };
                },
                cache: true,
            },
            templateResult: formatSelect
        });
    }
  });
</script>

</html>