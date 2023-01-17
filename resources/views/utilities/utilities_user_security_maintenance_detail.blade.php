<!DOCTYPE html>
<html>

<head>
    <title>{{ __('utilities_user_security_maintenance.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
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

        .modal-header-notification-error {
            border-bottom: 1px solid #eee;
            background-color: #f44336;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .modal-header-notification-success {
            border-bottom: 1px solid #eee;
            background-color: #00a862;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .div-title-notification {
            margin: 1.5%;
            margin-top: 2%;
            margin-bottom: 5%;
            font-family: Monserrat;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .div-title-notification img {
            max-width: 100%;
            height: 6vh;
            margin-right: 5%;
        }

        .title-text-notification {
            font-family: Inter;
            font-weight: 700;
            font-size: 2.5vw;
            margin-left: 0.5%;
        }

    </style>
</head>

<body>
    <div class="div-utilities">
        <div class="div-navbar sticky-navbar">
            <a href="javascript:void(0)" style="display: none;" id="toolbar-back">
                <img src="{{ url('/icons/functionbar/functionbar-back-blue.svg') }}" alt="Back">
                <img src="{{ url('/icons/functionbar/functionbar-back-white.svg') }}" class="functionbar-hover"
                    alt="Back">
                <span>Back</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-next">
                <img src="{{ url('/icons/functionbar/functionbar-next-blue.svg') }}" alt="Next">
                <img src="{{ url('/icons/functionbar/functionbar-next-white.svg') }}" class="functionbar-hover"
                    alt="Next">
                <span>Next</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-new" target="iframe_dashboard">
                <img src="{{ url('/icons/functionbar/functionbar-new-blue.svg') }}" alt="New">
                <img src="{{ url('/icons/functionbar/functionbar-new-white.svg') }}" class="functionbar-hover"
                    alt="New">
                <span>New</span>
            </a>
            <a href="javascript:void(0)" id="toolbar-edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-blue.svg') }}" alt="Edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-white.svg') }}" class="functionbar-hover"
                    alt="Edit">
                <span>Edit</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-save">
                <img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">
                <img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover"
                    alt="Save">
                <span>Save</span>
            </a>
            <a class="list-functionbar-md" href="javascript:void(0)" id="toolbar-active">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-blue.svg') }}" alt="Activate">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-white.svg') }}" class="functionbar-hover"
                    alt="Activate">
                <span>Activate</span>
            </a>
            <a class="list-functionbar-lg" href="javascript:void(0)" id="toolbar-deactive">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-blue.svg') }}" alt="Deactivate">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-white.svg') }}" class="functionbar-hover"
                    alt="Deactivate">
                <span>Deactivate</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-list">
                <img src="{{ url('/icons/functionbar/functionbar-list-blue.svg') }}" alt="List">
                <img src="{{ url('/icons/functionbar/functionbar-list-white.svg') }}" class="functionbar-hover"
                    alt="List">
                <span>List</span>
            </a>
        </div>
        <div class="div-title">
            <a href="{{ url('utilities/user_security_maintenance') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('utilities_user_security_maintenance.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="user_security_maintenance_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="record_status">{{ __('utilities_user_security_maintenance.label_record_status') }}</label>
                            <input type="text" class="form-control" id="record_status" name="record_status"
                                placeholder="{{ __('utilities_user_security_maintenance.label_record_status') }}"
                                readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="user_id">{{ __('utilities_user_security_maintenance.label_user_id') }}</label>
                            <input type="text" class="form-control" id="user_id" name="user_id"
                                placeholder="{{ __('utilities_user_security_maintenance.label_user_id') }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="user_name">{{ __('utilities_user_security_maintenance.label_user_name') }}</label>
                            <input type="text" class="form-control" id="user_name" name="user_name"
                                placeholder="{{ __('utilities_user_security_maintenance.label_user_name') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="employee_no">{{ __('utilities_user_security_maintenance.label_employee_no') }}</label>
                            <input type="text" class="form-control" id="employee_no" name="employee_no"
                                placeholder="{{ __('utilities_user_security_maintenance.label_employee_no') }}"
                                readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="employee_name">{{ __('utilities_user_security_maintenance.label_employee_name') }}</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name"
                                placeholder="{{ __('utilities_user_security_maintenance.label_employee_name') }}"
                                readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="user_type">{{ __('utilities_user_security_maintenance.label_user_type') }}</label>
                            <select class="form-control" id="user_type" name="user_type" disabled>
                                <option value="">Choose Type</option>
                                <option value="sa">Super Admin</option>
                                <option value="admin">Admin</option>
                                <option value="employee">Employee</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-12">
                    <table id="company_table" class="table hover" style="width: 100%;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Company Code</th>
                                <th>Company Name</th>
                                <th>Set Default</th>
                                <th>Status</th>
                                <th>User Type</th>
                                <th>OvtAppLead</th>
                                <th>OvtAppHRD</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-edit-company" id="btn-edit-company"
                        style="width: 100%;">
                        {{ __('utilities_user_security_maintenance.btn_edit') }}
                    </button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-add-company" id="btn-add-company"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_add_company">
                        {{ __('utilities_user_security_maintenance.btn_add') }}
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <table id="level_table" class="table hover" style="width: 100%;">
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
                    <button type="button" class="btn btn-primary" name="btn-edit-level" id="btn-edit-level"
                        style="width: 100%;">
                        {{ __('utilities_user_security_maintenance.btn_edit') }}
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <table id="module_table" class="table hover" style="width: 100%;">
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
                    <button type="button" class="btn btn-primary" name="btn-edit-module" id="btn-edit-module"
                        style="width: 100%;">
                        {{ __('utilities_user_security_maintenance.btn_edit') }}
                    </button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-add-module" id="btn-add-module"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_add_module">
                        {{ __('utilities_user_security_maintenance.btn_add') }}
                    </button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-danger" name="btn-remove-module" id="btn-remove-module"
                        style="width: 100%;">
                        {{ __('utilities_user_security_maintenance.btn_remove') }}
                    </button>
                </div>
            </div>
            <!--             <div class="row">
                <hr class="horizontal" />
            </div>
            <div class="row">
                <div class="col-4">
                    <button type="button" class="btn btn-primary" name="btn-reset-password" id="btn-reset-password" style="width: 100%;">
                        {{ __('utilities_user_security_maintenance.btn_reset_password') }}
                    </button>
                </div>
            </div> -->
        </div>
    </div>
    <div class="modal fade" id="modal_add_level" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('utilities_user_security_maintenance.title_modal_add_level') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="level_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="level_type">{{ __('utilities_user_security_maintenance.label_level_type') }}</label>
                                    <input type="text" class="form-control" id="level_type" name="level_type"
                                        placeholder="{{ __('utilities_user_security_maintenance.label_level_type') }}"
                                        readonly>
                                </div>
                                <input type="hidden" class="form-control" id="user_id_level" name="user_id_level">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="level_name">{{ __('utilities_user_security_maintenance.label_level_name') }}</label>
                                    <input type="text" class="form-control" id="level_name" name="level_name"
                                        placeholder="{{ __('utilities_user_security_maintenance.label_level_name') }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label
                                        for="level_authorization">{{ __('utilities_user_security_maintenance.title_level_authorization') }}</label>
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
                    <button type="submit" id="btn-save-level" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i>
                        {{ __('utilities_user_security_maintenance.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i>
                        {{ __('utilities_user_security_maintenance.btn_cancel') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_company" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('utilities_user_security_maintenance.title_modal_add_company') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="company_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6" id="select_company_code">
                                <div class="form-group">
                                    <label
                                        for="company_code">{{ __('utilities_user_security_maintenance.label_company_code') }}</label>
                                    <select class="form-control select2" id="company_code" name="company_code"></select>
                                </div>
                            </div>
                            <div class="col-6" id="txt_company_code" style="display: none;">
                                <div class="form-group">
                                    <label
                                        for="company_code_edit">{{ __('utilities_user_security_maintenance.label_company_code') }}</label>
                                    <input type="text" class="form-control" id="company_code_edit"
                                        name="company_code_edit"
                                        placeholder="{{ __('utilities_user_security_maintenance.label_company_code') }}"
                                        readonly>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="record_function_company"
                                name="record_function_company">
                            <input type="hidden" class="form-control" id="user_id_company" name="user_id_company">
                            <input type="hidden" class="form-control" id="employee_no_company"
                                name="employee_no_company">
                            <input type="hidden" class="form-control" id="email_company" name="email_company">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="company_name">{{ __('utilities_user_security_maintenance.label_company_name') }}</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name"
                                        placeholder="{{ __('utilities_user_security_maintenance.label_company_name') }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="company_default_checkbox"
                                        name="company_default_checkbox" value="true">
                                    <label class="form-check-label"
                                        for="company_default_checkbox">{{ __('utilities_user_security_maintenance.label_set_default') }}</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                        id="company_overtime_app_leader_checkbox"
                                        name="company_overtime_app_leader_checkbox" value="true">
                                    <label class="form-check-label"
                                        for="company_overtime_app_leader_checkbox">{{ __('utilities_user_security_maintenance.label_overtime_app_leader') }}</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                        id="company_overtime_app_hrd_checkbox" name="company_overtime_app_hrd_checkbox"
                                        value="true">
                                    <label class="form-check-label"
                                        for="company_overtime_app_hrd_checkbox">{{ __('utilities_user_security_maintenance.label_overtime_app_hrd') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="user_type_company">{{ __('utilities_user_security_maintenance.label_user_type') }}</label>
                                    <select class="form-control" id="user_type_company" name="user_type_company">
                                        <option value="">Choose Type</option>
                                        <option value="sa">Super Admin</option>
                                        <option value="admin">Admin</option>
                                        <option value="employee">Employee</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="status">{{ __('utilities_user_security_maintenance.label_status') }}</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="">Choose Status</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-company" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i>
                        {{ __('utilities_user_security_maintenance.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i>
                        {{ __('utilities_user_security_maintenance.btn_cancel') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_module" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('utilities_user_security_maintenance.title_modal_add_module') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="module_form" method="post">
                        @csrf
                        <div class="row" id="select_module_name">
                            <div class="col-12">
                                <div class="form-group">
                                    <label
                                        for="module_name">{{ __('utilities_user_security_maintenance.label_module_name') }}</label>
                                    <select class="form-control select2" id="module_name" name="module_name"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="txt_module_name" style="display: none;">
                            <div class="col-12">
                                <div class="form-group">
                                    <label
                                        for="module_name_edit">{{ __('utilities_user_security_maintenance.label_module_name') }}</label>
                                    <input type="text" class="form-control" id="module_name_edit"
                                        name="module_name_edit"
                                        placeholder="{{ __('utilities_user_security_maintenance.label_module_name') }}"
                                        readonly>
                                </div>
                                <input type="hidden" class="form-control" id="module_id" name="module_id">
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="record_function_module"
                            name="record_function_module">
                        <input type="hidden" class="form-control" id="user_id_module" name="user_id_module">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label
                                        for="group_authorization">{{ __('utilities_user_security_maintenance.label_group_authorization') }}</label>
                                    <select class="form-control select2" id="group_authorization"
                                        name="group_authorization"></select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-module" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i>
                        {{ __('utilities_user_security_maintenance.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i>
                        {{ __('utilities_user_security_maintenance.btn_cancel') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="notification_error">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification-error">
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
    <div class="modal fade" role="dialog" id="notification_success">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification-success">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="div-title-notification">
                        <img src="{{ url('/pictures/checklist-green-confirm-password.svg') }}" alt="Password">
                        <span
                            class="title-text-notification">{{ __('utilities_user_security_maintenance.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="notification_success_detail">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification-success">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="div-title-notification">
                        <img src="{{ url('/pictures/checklist-green-confirm-password.svg') }}" alt="Password">
                        <span
                            class="title-text-notification">{{ __('utilities_user_security_maintenance.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success-detail"></span>
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
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var level_table = null;
        var company_table = null;
        var module_table = null;
        var level_auth_table = null;

        $('#record_status').val("{{ isset($data[0]->recordStatus) ? $data[0]->recordStatus : '' }}");
        $('#user_id').val("{{ isset($data[0]->userID) ? $data[0]->userID : '' }}");
        $('#user_name').val("{{ isset($data[0]->userName) ? $data[0]->userName : '' }}");
        $('#employee_no').val("{{ isset($data[0]->employeeNo) ? $data[0]->employeeNo : '' }}");
        $('#employee_name').val("{{ isset($data[0]->fullName) ? $data[0]->fullName : '' }}");
        $('#user_type').val("{{ isset($data[0]->userType) ? $data[0]->userType : '' }}").trigger('change');

        $('#level_table').DataTable().clear().destroy();
        load_table_level("{{ isset($data[0]->userID) ? $data[0]->userID : '' }}");
        $('#company_table').DataTable().clear().destroy();
        load_table_company("{{ isset($data[0]->userID) ? $data[0]->userID : '' }}");
        $('#module_table').DataTable().clear().destroy();
        load_table_module("{{ isset($data[0]->userID) ? $data[0]->userID : '' }}");

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        function load_table_level(userID = '') {
            level_table = $('#level_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('utilities/user_security_maintenance/level/table') }}",
                    data: {
                        userID: userID
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
                order: [
                    [1, 'asc']
                ],
                columns: [{
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ?
                                '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {
                        data: 'levelType',
                        name: 'levelType'
                    },
                    {
                        data: 'levelDescription',
                        name: 'levelDescription'
                    },
                    {
                        data: 'levelAuthorize',
                        name: 'levelAuthorize'
                    }
                ],
                select: {
                    style: 'single',
                    selector: 'td:first-child'
                }
            });
        }

        function load_table_company(userID = '') {
            company_table = $('#company_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('utilities/user_security_maintenance/company/table') }}",
                    data: {
                        userID: userID
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
                columns: [{
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ?
                                '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {
                        data: 'companyCode',
                        name: 'companyCode'
                    },
                    {
                        data: 'companyName',
                        name: 'companyName'
                    },
                    {
                        data: 'defaultCompany',
                        name: 'defaultCompany'
                    },
                    {
                        data: 'recordStatus',
                        name: 'recordStatus'
                    },
                    {
                        data: 'userType',
                        name: 'userType'
                    },
                    {
                        data: 'flagAppLead',
                        name: 'flagAppLead'
                    },
                    {
                        data: 'flagAppHRD',
                        name: 'flagAppHRD'
                    },
                ],
                select: {
                    style: 'single',
                    selector: 'td:first-child'
                }
            });
        }

        function load_table_module(userID = '') {
            module_table = $('#module_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('utilities/user_security_maintenance/module/table') }}",
                    data: {
                        userID: userID
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
                columns: [{
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ?
                                '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {
                        data: 'moduleName',
                        name: 'moduleName'
                    },
                    {
                        data: 'groupAuthorizeDesc',
                        name: 'groupAuthorizeDesc'
                    }
                ],
                select: {
                    style: 'single',
                    selector: 'td:first-child'
                }
            });
        }

        function load_table_level_authorization(levelType = '', levelCodeVal = {}) {
            level_auth_table = $('#level_authorization_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                paging: false,
                aaSorting: [],
                ajax: {
                    url: "{{ url('utilities/user_security_maintenance/level_authorization/table') }}",
                    data: {
                        levelType: levelType
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
                columns: [{
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type, row) {
                            return type === 'display' ?
                                '<input class="chk-select selected_authorization" type="checkbox" name="selected_authorization[' +
                                $('<div />').text(row.levelCode).html() + ']" value="1">' : '';
                        }
                    },
                    {
                        data: 'levelCode',
                        name: 'levelCode'
                    },
                    {
                        data: 'levelName',
                        name: 'levelName'
                    }
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                },
                initComplete: function (settings) {
                    var test2 = level_auth_table.rows().every(function (rowIdx, tableLoop,
                        rowLoop) {
                        var dataParent = this;
                        $.each(levelCodeVal, function (key, val) {
                            if (dataParent.data().levelCode === val) {
                                dataParent.select();
                                var node = dataParent.node();
                                $(node).find("input[type='checkbox']").prop(
                                    'checked', true);
                            }
                        });
                    });
                }
            });
        }

        $("#toolbar-edit").on('click', function () {
            $("#toolbar-save").show();
            $('#user_name').prop('readonly', false);
            $('#user_type').prop('disabled', false);
        });

        $("#toolbar-save").on('click', function () {
            $("#user_security_maintenance_form").submit();
        });

        $("#toolbar-active").on('click', function () {
            $.ajax({
                url: "{{ url('utilities/user/status') }}",
                type: "GET",
                data: {
                    'userID': "{{ isset($data[0]->userID) ? $data[0]->userID : '' }}",
                    'func': 'A'
                },
                success: function (response) {
                    if (response.status == "true") {
                        $('#notification_success').modal('show');
                        $('#message-notification-success').html(response.message);
                        setTimeout(function () {
                            window.location =
                                "{{ url('utilities/user_security_maintenance') }}";
                        }, 3000);
                    } else {
                        $('#notification_error').modal('show');
                        if (response.message == null || response.message == '') {
                            $('#message-notification-error').html(
                                "{{ __('login.error') }}");
                        } else {
                            $('#message-notification-error').html(response.message);
                        }
                    }
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $("#toolbar-deactive").on('click', function () {
            $.ajax({
                url: "{{ url('utilities/user/status') }}",
                type: "GET",
                data: {
                    'userID': "{{ isset($data[0]->userID) ? $data[0]->userID : '' }}",
                    'func': 'D'
                },
                success: function (response) {
                    if (response.status == "true") {
                        $('#notification_success').modal('show');
                        $('#message-notification-success').html(response.message);
                        setTimeout(function () {
                            window.location =
                                "{{ url('utilities/user_security_maintenance') }}";
                        }, 3000);
                    } else {
                        $('#notification_error').modal('show');
                        if (response.message == null || response.message == '') {
                            $('#message-notification-error').html(
                                "{{ __('login.error') }}");
                        } else {
                            $('#message-notification-error').html(response.message);
                        }
                    }
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('body').on('click', '#btn-edit-level', function () {
            var user_id = $('#user_id').val();
            $('#user_id_level').val(user_id);

            var data = level_table.rows('.selected').data();
            if (data.count() > 0) {
                $('#level_type').val(data[0].levelType);
                $('#level_name').val(htmlDecode(data[0].levelDescription));
                $('#modal_add_level').modal('show');
                $('#level_authorization_table').DataTable().destroy();
                load_table_level_authorization(data[0].levelType, data[0].level);
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $.get("{{ url('status/api') }}", function (data) {
            $.each(data, function (k, v) {
                // console.log(v);
                $('#status').append("<option value=" + v.comGenCode + ">" + v.value +
                    "</option>");
            });
        });

        $('body').on('click', '#btn-add-company', function () {
            var user_id = $('#user_id').val();
            var employee_no = $('#employee_no').val();
            $('#user_id_company').val(user_id);
            $('#employee_no_company').val(employee_no);
            $('#email_company').val("{{ isset($data[0]->email) ? $data[0]->email : '' }}");

            loadDataCompany();
            $('#company_code_edit').val('');
            $('#company_name').val('');
            $('#company_default_checkbox').prop('checked', false);
            $('#company_overtime_app_leader_checkbox').prop('checked', false);
            $('#company_overtime_app_hrd_checkbox').prop('checked', false);

            $('#company_code').on("select2:select", function (e) {
                var data = $('#company_code').select2('data');
                $('#company_name').val(htmlDecode(data[0].data.companyName));
            });

            $('#company_code').on("select2:unselecting", function (e) {
                $('#company_name').val('');
            });

            $('#select_company_code').show();
            $('#txt_company_code').hide();
            $('#record_function_company').val('New');
        });

        $('body').on('click', '#btn-edit-company', function () {
            var user_id = $('#user_id').val();
            var employee_no = $('#employee_no').val();
            $('#user_id_company').val(user_id);
            $('#employee_no_company').val(employee_no);

            var data = company_table.rows('.selected').data();
            // console.log(data[0]);
            if (data.count() > 0) {
                $('#modal_add_company').modal('show');
                $('#select_company_code').hide();
                $('#txt_company_code').show();
                $('#record_function_company').val('Edit');

                $('#company_code_edit').val(data[0].companyCode);
                $('#company_name').val(htmlDecode(data[0].companyName));
                $('#email_company').val(data[0].email);
                $('#user_type_company').val(data[0].userType).trigger('change');
                $('#status').val(data[0].recordStatus).trigger('change');
                if (data[0].defaultCompany) {
                    $('#company_default_checkbox').prop('checked', true);
                } else {
                    $('#company_default_checkbox').prop('checked', false);
                }

                if (data[0].flagAppLead) {
                    $('#company_overtime_app_leader_checkbox').prop('checked', true);
                } else {
                    $('#company_overtime_app_leader_checkbox').prop('checked', false);
                }

                if (data[0].flagAppHRD) {
                    $('#company_overtime_app_hrd_checkbox').prop('checked', true);
                } else {
                    $('#company_overtime_app_hrd_checkbox').prop('checked', false);
                }
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $('body').on('click', '#btn-add-module', function () {
            var user_id = $('#user_id').val();
            $('#user_id_module').val(user_id);

            loadDataModule(user_id);
            loadDataGroupAuthorize();

            $('#select_module_name').show();
            $('#txt_module_name').hide();
            $('#record_function_module').val('New');
        });

        $('body').on('click', '#btn-edit-module', function () {
            var user_id = $('#user_id').val();
            $('#user_id_module').val(user_id);

            loadDataGroupAuthorize();

            var data = module_table.rows('.selected').data();
            if (data.count() > 0) {
                $('#modal_add_module').modal('show');
                $('#select_module_name').hide();
                $('#txt_module_name').show();
                $('#record_function_module').val('Edit');

                $('#module_id').val(data[0].moduleID);
                $('#module_name_edit').val(htmlDecode(data[0].moduleName));
                $.ajax({
                    type: 'GET',
                    url: "{{ url('/group_authorize/group/api') }}",
                    data: {
                        'groupAuthorizeCode': data[0].groupAuthorizeCode
                    }
                }).then(function (response) {
                    var $newOption = $("<option selected='selected'></option>").val(response[0]
                        .groupAuthorizeCode).text(response[0].groupAuthorizeDesc);
                    $("#group_authorization").append($newOption).trigger('change');
                });
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function loadDataCompany() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
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

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#company_code').select2({
                width: '100%',
                placeholder: 'Choose Company Data',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/company/api') }}",
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
                                return {
                                    text: item.companyName,
                                    id: item.companyCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        $("#btn-remove-module").on('click', function () {
            var data = module_table.rows('.selected').data();
            // console.log(data[0]);
            if (data.count() > 0) {
                $.ajax({
                    url: "{{ url('utilities/user_security_maintenance/module/remove') }}",
                    type: "GET",
                    data: {
                        'userID': data[0].userId,
                        'moduleID': data[0].moduleID,
                        'groupAuthorizeCode': data[0].groupAuthorizeCode
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success_detail').modal('show');
                            $('#message-notification-success-detail').html(response
                                .message);
                            var oTable = $('#module_table').dataTable();
                            oTable.fnDraw(false);
                            setTimeout(function () {
                                $('#notification_success_detail').modal('hide');
                            }, 3000);
                        } else {
                            $('#notification_error').modal('show');
                            if (response.message == null || response.message == '') {
                                $('#message-notification-error').html(
                                    "{{ __('login.error') }}");
                            } else {
                                $('#message-notification-error').html(response.message);
                            }
                        }
                    },
                    error: function (response) {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        function loadDataModule(userID = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
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

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#module_name').select2({
                width: '100%',
                placeholder: 'Choose Module',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/module/user_security_maintenance/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term,
                            userID: userID
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.moduleName,
                                    id: item.moduleID,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataGroupAuthorize() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.groupAuthorizeCode + '</div>' +
                        '<div class="col-6">' + data.data.groupAuthorizeDesc + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#group_authorization').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Code</b></div>' +
                        '<div class="col-6"><b>Description</b></div>' +
                        '</div>';
                    $('.select2-search').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#group_authorization').select2({
                width: '100%',
                placeholder: 'Choose Group Authorization',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/group_authorize/api') }}",
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
                                return {
                                    text: item.groupAuthorizeDesc,
                                    id: item.groupAuthorizeCode,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        $("#btn-save-level").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#level_form").submit();
        });

        $("#btn-save-company").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#company_form").submit();
        });

        $("#btn-save-module").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#module_form").submit();
        });

        if ($("#user_security_maintenance_form").length > 0) {
            $("#user_security_maintenance_form").validate({
                rules: {
                    user_name: {
                        required: true,
                    },
                    user_type: {
                        required: true,
                    },
                },
                messages: {
                    user_name: {
                        required: "{{ __('utilities_user_security_maintenance.user_name_required') }}",
                    },
                    user_type: {
                        required: "{{ __('utilities_user_security_maintenance.user_type_required') }}",
                    },
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('utilities/user/proses') }}",
                        type: "POST",
                        data: $('#user_security_maintenance_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('utilities/user_security_maintenance') }}";
                                }, 3000);
                            } else {
                                $('#notification_error').modal('show');
                                if (response.message == null || response.message ==
                                    '') {
                                    $('#message-notification-error').html(
                                        "{{ __('login.error') }}");
                                } else {
                                    $('#message-notification-error').html(response
                                        .message);
                                }
                            }
                        },
                        error: function (response) {
                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            })
        }

        if ($("#level_form").length > 0) {
            $("#level_form").validate({
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    // $('#form1, #form2').serialize()
                    // $('#level_form').append(decodeURI(level_auth_table.rows('.selected').nodes().$('input')));
                    var data = $('#level_form').serialize();
                    var data2 = decodeURI(level_auth_table.rows('.selected').nodes().$('input')
                        .serialize());
                    var mergeData = data + '&' + data2;

                    var user_id = $('#user_id').val();

                    $.ajax({
                        url: "{{ url('utilities/user_security_maintenance/level/proses') }}",
                        type: "POST",
                        data: mergeData,
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-level").prop("disabled", false);
                                $("#btn-save-level").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_user_security_maintenance.btn_save") }}'
                                );

                                $('#modal_add_level').modal('hide');
                                $('#notification_success_detail').modal('show');
                                $('#message-notification-success-detail').html(response
                                    .message);
                                $('#level_table').DataTable().destroy();
                                load_table_level(user_id);
                                setTimeout(function () {
                                    $('#notification_success_detail').modal(
                                        'hide');
                                }, 3000);
                            } else {
                                $("#btn-save-level").prop("disabled", false);
                                $("#btn-save-level").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_user_security_maintenance.btn_save") }}'
                                );

                                $('#notification_error').modal('show');
                                if (response.message == null || response.message ==
                                    '') {
                                    $('#message-notification-error').html(
                                        "{{ __('login.error') }}");
                                } else {
                                    $('#message-notification-error').html(response
                                        .message);
                                }
                            }
                        },
                        error: function (response) {
                            $("#btn-save-level").prop("disabled", false);
                            $("#btn-save-level").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("utilities_user_security_maintenance.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            })
        }

        if ($("#company_form").length > 0) {
            $("#company_form").validate({
                rules: {
                    company_code: {
                        required: function (element) {
                            return $("#record_function_company").val() == "New";
                        }
                    },
                    company_code_edit: {
                        required: function (element) {
                            return $("#record_function_company").val() == "Edit";
                        }
                    },
                    status: {
                        required: true,
                    },
                    user_type_company: {
                        required: true,
                    },
                },
                messages: {
                    company_code: {
                        required: "{{ __('utilities_user_security_maintenance.company_code_required') }}",
                    },
                    company_code_edit: {
                        required: "{{ __('utilities_user_security_maintenance.company_code_required') }}",
                    },
                    status: {
                        required: "{{ __('utilities_user_security_maintenance.status_required') }}",
                    },
                    user_type_company: {
                        required: "{{ __('utilities_user_security_maintenance.user_type_required') }}",
                    },
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    $("#btn-save-company").prop("disabled", false);
                    $("#btn-save-company").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("utilities_user_security_maintenance.btn_save") }}'
                    );

                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var user_id = $('#user_id').val();

                    $.ajax({
                        url: "{{ url('utilities/user_security_maintenance/company/proses') }}",
                        type: "POST",
                        data: $('#company_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-company").prop("disabled", false);
                                $("#btn-save-company").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_user_security_maintenance.btn_save") }}'
                                );

                                $('#modal_add_company').modal('hide');
                                $('#notification_success_detail').modal('show');
                                $('#message-notification-success-detail').html(response
                                    .message);
                                $('#company_table').DataTable().destroy();
                                load_table_company(user_id);
                                setTimeout(function () {
                                    $('#notification_success_detail').modal(
                                        'hide');
                                }, 3000);
                            } else {
                                $("#btn-save-company").prop("disabled", false);
                                $("#btn-save-company").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_user_security_maintenance.btn_save") }}'
                                );

                                $('#notification_error').modal('show');
                                if (response.message == null || response.message ==
                                    '') {
                                    $('#message-notification-error').html(
                                        "{{ __('login.error') }}");
                                } else {
                                    $('#message-notification-error').html(response
                                        .message);
                                }
                            }
                        },
                        error: function (response) {
                            $("#btn-save-company").prop("disabled", false);
                            $("#btn-save-company").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("utilities_user_security_maintenance.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            })
        }

        if ($("#module_form").length > 0) {
            $("#module_form").validate({
                rules: {
                    module_name: {
                        required: function (element) {
                            return $("#record_function_module").val() == "New";
                        }
                    },
                    module_name_edit: {
                        required: function (element) {
                            return $("#record_function_module").val() == "Edit";
                        }
                    },
                    group_authorization: {
                        required: true,
                    },
                },
                messages: {
                    module_name: {
                        required: "{{ __('utilities_user_security_maintenance.module_name_required') }}",
                    },
                    module_name_edit: {
                        required: "{{ __('utilities_user_security_maintenance.module_name_required') }}",
                    },
                    group_authorization: {
                        required: "{{ __('utilities_user_security_maintenance.group_authorization_required') }}",
                    },
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    $("#btn-save-module").prop("disabled", false);
                    $("#btn-save-module").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("utilities_user_security_maintenance.btn_save") }}'
                    );

                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var user_id = $('#user_id').val();

                    $.ajax({
                        url: "{{ url('utilities/user_security_maintenance/module/proses') }}",
                        type: "POST",
                        data: $('#module_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-module").prop("disabled", false);
                                $("#btn-save-module").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_user_security_maintenance.btn_save") }}'
                                );

                                $('#modal_add_module').modal('hide');
                                $('#notification_success_detail').modal('show');
                                $('#message-notification-success-detail').html(response
                                    .message);
                                $('#module_table').DataTable().destroy();
                                load_table_module(user_id);
                                setTimeout(function () {
                                    $('#notification_success_detail').modal(
                                        'hide');
                                }, 3000);
                            } else {
                                $("#btn-save-module").prop("disabled", false);
                                $("#btn-save-module").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_user_security_maintenance.btn_save") }}'
                                );

                                $('#notification_error').modal('show');
                                if (response.message == null || response.message ==
                                    '') {
                                    $('#message-notification-error').html(
                                        "{{ __('login.error') }}");
                                } else {
                                    $('#message-notification-error').html(response
                                        .message);
                                }
                            }
                        },
                        error: function (response) {
                            $("#btn-save-module").prop("disabled", false);
                            $("#btn-save-module").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("utilities_user_security_maintenance.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            })
        }
    });

</script>

</html>
