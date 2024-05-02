<!DOCTYPE html>
<html>

<head>
    <title>{{ __('payroll_report_format.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-payroll {
            max-width: 100%;
            margin: auto;
            /*margin-top: 1%;*/
        }

        .div-profile {
            margin-top: 0;
        }

        .div-row-profile {
            margin: 0;
        }

        .modal-header-notification-error {
            border-bottom: 1px solid #eee;
            background-color: #f44336;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .modal-header-notification-success {
            border-bottom: 1px solid #eee;
            background-color: #00a862;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
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

        .required {
            color: red;
        }

        .row .box {
            /* width: 300px; */
            border: 1px solid #CED4DA;
            padding: 5px;
            border-radius: 10px;
        }

    </style>
</head>

<body>
    <div class="div-payroll">
        <div class="div-title">
            <a href="{{ url()->previous() }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('payroll_report_format.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="report_format_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="report_code">{{ __('payroll_report_format.label_report_code') }}</label>
                            <span class="required">*</span>
                            <input type="text" class="form-control" id="report_code" name="report_code"
                                placeholder="{{ __('payroll_report_format.label_report_code') }}">
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="description">{{ __('payroll_report_format.label_description') }}</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="{{ __('payroll_report_format.label_description') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="font_size">{{ __('payroll_report_format.label_font_size') }}</label>
                            <input type="number" min="0" class="form-control" id="font_size" name="font_size"
                                placeholder="{{ __('payroll_report_format.label_font_size') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="div-table">
                            <table id="report_format_detail_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>{{ __('payroll_report_format.label_column_no') }}</th>
                                        <th>{{ __('payroll_report_format.label_table_name') }}</th>
                                        <th>{{ __('payroll_report_format.label_field_name') }}</th>
                                        <th>{{ __('payroll_report_format.label_column_header') }}</th>
                                        <th>{{ __('payroll_report_format.label_alignment') }}</th>
                                        <th>{{ __('payroll_report_format.label_data_format') }}</th>
                                        <th>{{ __('payroll_report_format.label_display') }}</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="div-table">
                            <h4>Table Formula</h4>
                            <br>
                            <table id="report_format_formula_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>{{ __('payroll_report_format.label_column_no') }}</th>
                                        <th>{{ __('payroll_report_format.label_column_header') }}</th>
                                        <th>{{ __('payroll_report_format.label_alignment') }}</th>
                                        <th>{{ __('payroll_report_format.label_data_format') }}</th>
                                        <th>{{ __('payroll_report_format.label_formula') }}</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-add-report-format-detail"
                            id="btn-add-report-format-detail" data-toggle="modal" style="width: 100%;"  data-target="#modal_add_report_format_detail">
                            <i class="fa fa-plus"></i> {{ __('payroll_report_format.btn_add') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-danger" name="btn-remove-report-format-detail"
                            id="btn-remove-report-format-detail" style="width: 100%;">
                            <i class="fa fa-times"></i> {{ __('payroll_report_format.btn_remove') }}
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="div-table">
                            <table id="report_format_condition_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>{{ __('payroll_report_format.label_seq_no') }}</th>
                                        <th>{{ __('payroll_report_format.label_table_name') }}</th>
                                        <th>{{ __('payroll_report_format.label_field_name') }}</th>
                                        <th>{{ __('payroll_report_format.label_criteria') }}</th>
                                        <th>{{ __('payroll_report_format.label_value') }}</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-add-report-format-condition" 
                            id="btn-add-report-format-condition" data-toggle="modal" style="width: 100%;" data-target="#modal_add_report_format_condition">
                            <i class="fa fa-plus"></i> {{ __('payroll_report_format.btn_add') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-danger" name="btn-remove-report-format-condition"
                            id="btn-remove-report-format-condition" style="width: 100%;">
                            <i class="fa fa-times"></i> {{ __('payroll_report_format.btn_remove') }}
                        </button>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('payroll_report_format.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" href="{{ url('payroll/report_format') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('payroll_report_format.btn_cancel') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modal_add_report_format_detail" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('payroll_report_format.list') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="report_format_detail_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="column_no">{{ __('payroll_report_format.label_column_no') }}</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" id="column_no" name="column_no"
                                        placeholder="{{ __('payroll_report_format.label_column_no') }}">
                                </div>
                                <input type="hidden" class="form-control" id="record_function_det" name="record_function_det">
                                <input type="hidden" class="form-control" id="column_no_edit" name="column_no_edit">
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="table_name_detail">{{ __('payroll_report_format.label_table_name') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control select2" id="table_name_detail" name="table_name_detail">
                                        <option value="" disabled selected>{{ __('payroll_report_format.label_select_table_name') }}</option>
                                        <option value="PeMasterInfo">PeMasterInfo</option>
                                        <option value="PrSalaryMaster">PrSalaryMaster</option>
                                        <option value="PrSalaryActual">PrSalaryActual</option>
                                        <option value="PrYearly">PrYearly</option>
                                        <option value="PeMaster">PeMaster</option>
                                        <option value="TmFixedComponent">TmFixedComponent</option>
                                        <option value="GmLevel">GmLevel</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="field_name_detail">{{ __('payroll_report_format.label_field_name') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control select2" id="field_name_detail" name="field_name_detail"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="column_header">{{ __('payroll_report_format.label_column_header') }}</label>
                                    <span class="required">*</span>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="column_header" name="column_header"
                                            placeholder="{{ __('payroll_report_format.label_column_header') }}">                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="alignment">{{ __('payroll_report_format.label_alignment') }}</label>
                                        <select class="form-control select2" id="alignment" name="alignment">
                                        <option value="" disabled selected>{{ __('payroll_report_format.label_select_alignment') }}</option>
                                        <option value="1">1. Left</option>
                                        <option value="2">2. Center</option>
                                        <option value="3">3. Right</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="data_format">{{ __('payroll_report_format.label_data_format') }}</label>
                                        <select class="form-control select2" id="data_format" name="data_format">
                                        <option value="" disabled selected>{{ __('payroll_report_format.label_select_data_format') }}</option>
                                        <option value="null">No Format</option>
                                        <option value="#,##0.00">#,##0.00</option>
                                        <option value="#,##0">#,##0</option>
                                        <option value="dd/MM/yyyy">dd/MM/yyyy</option>
                                        <option value="dd MM yyyy">dd MM yyyy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="display">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="display"
                                            name="display" value="true">
                                        <label class="form-check-label"
                                            for="display">{{ __('payroll_report_format.label_display') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="add_formula">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="add_formula"
                                            name="add_formula" value="true">
                                        <label class="form-check-label"
                                            for="add_formula">{{ __('payroll_report_format.label_add_formula') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="div_add_formula" style="display: none;">
                            <div class="col-12">
                                <div class="form-group box">
                                    <div class="row pt-2 pb-4" style="margin: 0;">
                                        <div class="col-12">
                                            <h5>{{ __('payroll_report_format.label_add_formula') }}</h5>
                                        </div>
                                    </div>
                                    <div class="row" style="margin: 0;">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="table_chooser">{{ __('payroll_report_format.label_table_chooser') }}</label>
                                                <span class="required">*</span>
                                                <select class="form-control select2" id="table_chooser" name="table_chooser">
                                                    <option value="" selected>{{ __('payroll_report_format.label_select_table_chooser') }}</option>
                                                    <option value="PeMaster">PeMaster</option>
                                                    <option value="TmFixedComponent">TmFixedComponent</option>
                                                    <option value="PrSalaryMaster">PrSalaryMaster</option>
                                                    <option value="PrSalaryActual">PrSalaryActual</option>
                                                    <option value="PrYearly">PrYearly</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label
                                                    for="field_chooser">{{ __('payroll_report_format.label_field_chooser') }}</label>
                                                <span class="required">*</span>
                                                <select class="form-control select2" id="field_chooser" name="field_chooser"></select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label
                                                    for="operator">&nbsp;</label>
                                                <div class="form-radio">
                                                    <input class="form-radio-input" type="radio" id="none_operator"
                                                        name="operator" value="none">
                                                    <label class="form-radio-label"
                                                        for="none_operator">None</label>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label
                                                    for="operator">&nbsp;</label>
                                                <div class="form-radio">
                                                    <input class="form-radio-input" type="radio" id="plus_operator"
                                                        name="operator" value="+">
                                                    <label class="form-radio-label"
                                                        for="plus_operator">+</label>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label
                                                    for="operator">&nbsp;</label>
                                                <div class="form-radio">
                                                    <input class="form-radio-input" type="radio" id="minus_operator"
                                                        name="operator" value="-">
                                                    <label class="form-radio-label"
                                                        for="minus_operator">-</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label
                                                    for="operator">&nbsp;</label>
                                                <div class="form-radio">
                                                    <input class="form-radio-input" type="radio" id="times_operator"
                                                        name="operator" value="*">
                                                    <label class="form-radio-label"
                                                        for="times_operator">*</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label
                                                    for="operator">&nbsp;</label>
                                                <div class="form-radio">
                                                    <input class="form-radio-input" type="radio" id="divide_operator"
                                                        name="operator" value="/">
                                                    <label class="form-radio-label"
                                                        for="divide_operator">/</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin: 0;">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="btn-add-to-formula">&nbsp;</label>
                                                <button type="button" class="btn btn-process" name="btn-add-to-formula" id="btn-add-to-formula">
                                                    {{ __('payroll_report_format.btn_add_to_formula') }}
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col-7">
                                            <div class="form-group">
                                                <label for="preview_formula">{{ __('payroll_report_format.label_preview_formula') }}</label>
                                                <textarea class="form-control" id="preview_formula" name="preview_formula" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" id="btn-save-report-format-detail" class="btn btn-primary w-25"><i 
                                    class="fa fa-floppy-o"></i> {{ __('payroll_report_format.btn_save') }}</button>
                            <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                                    class="fa fa-times-circle"></i> {{ __('payroll_report_format.btn_cancel') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_report_format_condition" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('payroll_report_format.list') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="report_format_condition_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="seq_no">{{ __('payroll_report_format.label_seq_no') }}</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" id="seq_no" name="seq_no"
                                        placeholder="{{ __('payroll_report_format.label_seq_no') }}">
                                </div>
                                <input type="hidden" class="form-control" id="record_function_con" name="record_function_con">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="table_name_condition">{{ __('payroll_report_format.label_table_name') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control select2" id="table_name_condition" name="table_name_condition">
                                        <option value="" disabled selected>{{ __('payroll_report_format.label_select_table_name') }}</option>
                                        <option value="PeMasterInfo">PeMasterInfo</option>
                                        <option value="PrSalaryMaster">PrSalaryMaster</option>
                                        <option value="PrSalaryActual">PrSalaryActual</option>
                                        <option value="PrYearly">PrYearly</option>
                                        <option value="PeMaster">PeMaster</option>
                                        <option value="TmFixedComponent">TmFixedComponent</option>
                                        <option value="GmLevel">GmLevel</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="field_name_condition">{{ __('payroll_report_format.label_field_name') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control select2" id="field_name_condition" name="field_name_condition"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="criteria">{{ __('payroll_report_format.label_criteria') }}</label>
                                        <select class="form-control select2" id="criteria" name="criteria">
                                        <option value="" disabled selected>{{ __('payroll_report_format.label_select_criteria') }}</option>
                                        <option value="=">=</option>
                                        <option value="<>"><></option>
                                        <option value=">=">>=</option>
                                        <option value="<="><=</option>
                                        <option value="like">like</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="value">{{ __('payroll_report_format.label_value') }}</label>
                                    <input type="text" class="form-control" id="value" name="value"
                                        placeholder="{{ __('payroll_report_format.label_value') }}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" id="btn-save-report-format-condition" class="btn btn-primary w-25"><i 
                                    class="fa fa-floppy-o"></i> {{ __('payroll_report_format.btn_save') }}</button>
                            <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                                    class="fa fa-times-circle"></i> {{ __('payroll_report_format.btn_cancel') }}</button>
                        </div>
                    </form>
                </div>
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
                        <span class="title-text-notification">{{ __('payroll_report_format.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
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
<script src="{{ asset('js/jquery.redirect.js') }}""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
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
    
    $(document).ready(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var func = "{{ $func }}";
        var arrData = @json($data);
        var arrDataFormula = @json($dataFormula);
        var tableName = null;
        var fieldName = null;
        var table1 = null;
        var table2 = null;
        var table3 = null;
        var arrayReportFormatDetail = [];
        var arrayReportFormatFormula = [];
        var arrayReportFormatCondition = [];


        if (func == 'new') {
            $('#record_function').val("New");
            $('#report_code').val("");
            $('#description').val("");
            $('#font_size').val("");
            $('#report_format_detail_table').DataTable().destroy();
            $('#report_format_formula_table').DataTable().destroy();
            $('#report_format_condition_table').DataTable().destroy();
            load_table_report_format_detail();
            load_table_report_format_formula();
            load_table_report_format_condition();
        }
        else if (func == 'edit') {
            $('#record_function').val("Edit");
            $('#report_code').val(((typeof arrData[0].reportCode !== 'undefined') ? arrData[0].reportCode : '')).prop('readonly', true);
            $('#description').val(htmlDecode(((typeof arrData[0].description !== 'undefined') ? arrData[0].description : '')));
            $('#font_size').val(((typeof arrData[0].fontSize !== 'undefined') ? arrData[0].fontSize : ''));

            load_table_report_format_detail();
            // console.log(arrData[0].detail);
            if (arrData[0].detail !== 'undefined' || arrData[0].detail !== null) {
                for (var i = 0; i < arrData[0].detail.length; i++) {
                    arrayReportFormatDetail.push({
                        "columnNo": ((typeof arrData[0].detail[i].columnNo !== 'undefined') ? arrData[0].detail[i].columnNo : ''),
                        "tableName": ((typeof arrData[0].detail[i].tableName !== 'undefined') ? arrData[0].detail[i].tableName : ''),
                        "fieldName": ((typeof arrData[0].detail[i].fieldName !== 'undefined') ? arrData[0].detail[i].fieldName : ''),
                        "columnHeader": ((typeof arrData[0].detail[i].columnHeader !== 'undefined') ? arrData[0].detail[i].columnHeader : ''),
                        "alignment": ((typeof arrData[0].detail[i].alignment !== 'undefined') ? arrData[0].detail[i].alignment : ''),
                        "dataFormat": ((typeof arrData[0].detail[i].dataFormat !== 'undefined') ? arrData[0].detail[i].dataFormat : ''),
                        "display": ((typeof arrData[0].detail[i].isDisplayed !== 'undefined') ? arrData[0].detail[i].isDisplayed : ''),
                        "fieldFormula": ((typeof arrData[0].detail[i].fieldFormula !== 'undefined') ? arrData[0].detail[i].fieldFormula : ''),
                    });
                    // console.log(arrayReportFormatDetail);
                }
            }
            $('#report_format_detail_table').DataTable().destroy();
            load_table_report_format_detail();

            load_table_report_format_formula();
            if (arrDataFormula[0].detail !== 'undefined' || arrDataFormula[0].detail !== null) {
                for (var i = 0; i < arrDataFormula[0].detail.length; i++) {
                    arrayReportFormatFormula.push({
                        "columnNo": ((typeof arrDataFormula[0].detail[i].columnNo !== 'undefined') ? arrDataFormula[0].detail[i].columnNo : ''),
                        "tableName": ((typeof arrDataFormula[0].detail[i].tableName !== 'undefined') ? arrDataFormula[0].detail[i].tableName : ''),
                        "fieldName": ((typeof arrDataFormula[0].detail[i].fieldName !== 'undefined') ? arrDataFormula[0].detail[i].fieldName : ''),
                        "columnHeader": ((typeof arrDataFormula[0].detail[i].columnHeader !== 'undefined') ? arrDataFormula[0].detail[i].columnHeader : ''),
                        "alignment": ((typeof arrDataFormula[0].detail[i].alignment !== 'undefined') ? arrDataFormula[0].detail[i].alignment : ''),
                        "dataFormat": ((typeof arrDataFormula[0].detail[i].dataFormat !== 'undefined') ? arrDataFormula[0].detail[i].dataFormat : ''),
                        "display": ((typeof arrDataFormula[0].detail[i].isDisplayed !== 'undefined') ? arrDataFormula[0].detail[i].isDisplayed : ''),
                        "fieldFormula": ((typeof arrDataFormula[0].detail[i].fieldFormula !== 'undefined') ? arrDataFormula[0].detail[i].fieldFormula : ''),
                    });
                    // console.log(arrayReportFormatDetail);
                }
            }
            $('#report_format_formula_table').DataTable().destroy();
            load_table_report_format_formula();

            load_table_report_format_condition();
            if (arrData[0].condition !== 'undefined' || arrData[0].condition !== null) {
                // console.log(arrData[0]);
                // console.log(arrData[1].condition);
                for (var i = 0; i < arrData[0].condition.length; i++) {
                    arrayReportFormatCondition.push({
                        "seqNo": ((typeof arrData[0].condition[i].seqNo !== 'undefined') ? arrData[0].condition[i].seqNo : i),
                        "tableName": ((typeof arrData[0].condition[i].tableName !== 'undefined') ? arrData[0].condition[i].tableName : ''),
                        "fieldName": ((typeof arrData[0].condition[i].fieldName !== 'undefined') ? arrData[0].condition[i].fieldName : ''),
                        "criteria": ((typeof arrData[0].condition[i].criteria !== 'undefined') ? arrData[0].condition[i].criteria : ''),
                        "value": ((typeof arrData[0].condition[i].value !== 'undefined') ? arrData[0].condition[i].value : ''),
                    });
                }
            }
            $('#report_format_condition_table').DataTable().destroy();
            load_table_report_format_condition();
        }

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        function load_table_report_format_detail() {
            arrayReportFormatDetail.sort(function(a, b) {
                return a.columnNo - b.columnNo;
            });

            table1 = $('#report_format_detail_table').DataTable({
                processing: true,
                // orderCellsTop: true,
                data: arrayReportFormatDetail,
                "paging": false,
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                columns: [
                    {
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ?
                                '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {   
                        data: 'columnNo',
                        name: 'columnNo',
                        render: function (data, type, row, meta) {
                            return '<input type="hidden" class="form-control" name="column_no[]" value="' +
                            data +'">' + (data + 1);
                        }
                    },
                    {
                        data: 'tableName',
                        name: 'tableName',
                        defaultContent: '-',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="table_name_detail[]" value="' +
                                data + '">' + ((data === null || data === '') ? '-' : data);
                        }
                    },
                    {
                        data: 'fieldName',
                        name: 'fieldName',
                        defaultContent: '-',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="field_name_detail[]" value="' +
                                data + '">' + ((data === null || data === '') ? '-' : data);
                        }
                    },
                    {
                        data: 'columnHeader',
                        name: 'columnHeader',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="column_header[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'alignment',
                        name: 'alignment',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="alignment[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'dataFormat',
                        name: 'dataFormat',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="data_format[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'display',
                        name: 'display',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="display[]" value="' +
                                data + '">' + '<textarea class="form-control" name="field_formula[]" style="display:none;">' + row.fieldFormula + '</textarea>' + data;
                        }
                    },
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#report_format_detail_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#report_format_formula_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        function getIndexByColumnNo(columnNoValue) {
            for (var i = 0; i < arrayReportFormatDetail.length; i++) {
                if (arrayReportFormatDetail[i].columnNo == columnNoValue) {
                    return i;
                }
            }
            return -1;
        }

        function getIndexByColumnNoFormula(columnNoValue) {
            for (var i = 0; i < arrayReportFormatFormula.length; i++) {
                if (arrayReportFormatFormula[i].columnNo == columnNoValue) {
                    return i;
                }
            }
            return -1;
        }

        $('#report_format_detail_table tbody').on('click', 'tr td:not(:first-child)', function () {
            var data = table1.row(this).data();
            var count = table1.rows().count();
            $('#modal_add_report_format_detail').modal('show');
            $('#record_function_det').val("Edit");
            $('#column_no').val((data.columnNo + 1));
            $('#column_no_edit').val((data.columnNo + 1));
            $('#table_name_detail').val(data.tableName);
            $('#column_header').val(data.columnHeader);
            $('#alignment').val(data.alignment);
            $('#data_format').val(data.dataFormat);
            $('#display').prop('checked', data.display);
            $('#preview_formula').val(data.fieldFormula);

            if(data.fieldFormula){
                $('#add_formula').prop('checked', true);
                $('#div_add_formula').show();
            }else{
                $('#add_formula').prop('checked', false);
                $('#div_add_formula').hide();
            }

            tableName = $('#table_name_detail').val();
            if(tableName == 'GmLevel'){
                loadDataLevelType();
            }else{
                loadDataFieldName();
            }

            $('#table_name_detail').on('change', function () {
                tableName = $('#table_name_detail').val();
                if(tableName == 'GmLevel'){
                    loadDataLevelType();
                }else{
                    loadDataFieldName();
                }
            });

            $.ajax({
                type: 'GET',
                url: "{{ url('/field/api') }}",
                data: {
                    'tableName' : tableName
                }
            }).then(function (data2) {
                var index = data2.indexOf(data.fieldName)
                var $newOption = $("<option selected='selected'></option>").val(data2[index]).text(data2[index]);
                $("#field_name_detail").append($newOption).trigger('change');
            });
        });

        $('#report_format_detail_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        $('#report_format_formula_table tbody').on('click', 'tr td:not(:first-child)', function () {
            var data = table3.row(this).data();
            var count = table3.rows().count();
            $('#modal_add_report_format_detail').modal('show');
            $('#record_function_det').val("Edit");
            $('#column_no').val((data.columnNo + 1));
            $('#column_no_edit').val((data.columnNo + 1));
            $('#table_name_detail').val(data.tableName);
            $('#column_header').val(data.columnHeader);
            $('#alignment').val(data.alignment);
            $('#data_format').val(data.dataFormat);
            $('#display').prop('checked', data.display);
            $('#preview_formula').val(data.fieldFormula);

            if(data.fieldFormula){
                $('#add_formula').prop('checked', true);
                $('#div_add_formula').show();
            }else{
                $('#add_formula').prop('checked', false);
                $('#div_add_formula').hide();
            }

            tableName = $('#table_name_detail').val();
            if(tableName == 'GmLevel'){
                loadDataLevelType();
            }else{
                loadDataFieldName();
            }

            $('#table_name_detail').on('change', function () {
                tableName = $('#table_name_detail').val();
                if(tableName == 'GmLevel'){
                    loadDataLevelType();
                }else{
                    loadDataFieldName();
                }
            });

            $.ajax({
                type: 'GET',
                url: "{{ url('/field/api') }}",
                data: {
                    'tableName' : tableName
                }
            }).then(function (data2) {
                var index = data2.indexOf(data.fieldName)
                var $newOption = $("<option selected='selected'></option>").val(data2[index]).text(data2[index]);
                $("#field_name_detail").append($newOption).trigger('change');
            });
        });

        $('#report_format_formula_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        $('#add_formula').change(function(){
            // Memeriksa apakah checkbox saat ini dicentang (checked) atau tidak (unchecked)
            if($(this).is(':checked')) {
                $('#div_add_formula').show();
            } else {
                $('#div_add_formula').hide();
            }
        });

        $('#table_chooser').on('change', function () {
            tableChooser = $('#table_chooser').val();
            $('#field_chooser').val(null).trigger('change');
            loadDataFieldChooser(tableChooser);
        });

        $('#field_chooser').on('select2:select', function (e) {
            fieldChooser = $('#field_chooser').val();
        });
        
        $('#field_chooser').on('select2:unselecting', function (e) {
            fieldChooser = null;
        });

        $('#btn-add-to-formula').on('click', function () {
            var operator = $('input[name="operator"]:checked').val();
            if(operator == 'none'){
                operator = '';
            }

            if (typeof fieldChooser !== 'undefined' && fieldChooser !== null) {
                var formula = '"' + tableChooser + '"' + '.' + '"' + fieldChooser + '"';
                $('#preview_formula').val($('#preview_formula').val() + ' ' + formula + ' ' + operator);
            } else {
                $('#preview_formula').val($('#preview_formula').val() + ' ' + operator);
            }
        });

        function load_table_report_format_formula() {
            arrayReportFormatFormula.sort(function(a, b) {
                return a.columnNo - b.columnNo;
            });

            table3 = $('#report_format_formula_table').DataTable({
                processing: true,
                // orderCellsTop: true,
                data: arrayReportFormatFormula,
                "paging": false,
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                columns: [
                    {
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ?
                                '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {   
                        data: 'columnNo',
                        name: 'columnNo',
                        render: function (data, type, row, meta) {
                            return '<input type="hidden" class="form-control" name="column_no_formula[]" value="' +
                            data +'">' + '<input type="hidden" class="form-control" name="table_name_formula[]" value="' +
                                row.tableName + '">' + '<input type="hidden" class="form-control" name="field_name_formula[]" value="' +
                                row.fieldName + '">' + (data + 1);
                        }
                    },
                    {
                        data: 'columnHeader',
                        name: 'columnHeader',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="column_header_formula[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'alignment',
                        name: 'alignment',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="alignment_formula[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'dataFormat',
                        name: 'dataFormat',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="data_format_formula[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'fieldFormula',
                        name: 'fieldFormula',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="display_formula[]" value="' +
                                row.display + '">' + '<textarea class="form-control" name="field_formula_formula[]" style="display:none;">' + data + '</textarea>' + data;
                        }
                    },
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        function load_table_report_format_condition() {
            arrayReportFormatCondition.sort(function(a, b) {
                return a.seqNo - b.seqNo;
            });

            table2 = $('#report_format_condition_table').DataTable({
                data: arrayReportFormatCondition,
                "paging": false,
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                columns: [
                    {
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ?
                                '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {   
                        data: 'seqNo',
                        name: 'seqNo',
                        render: function (data, type, row, meta) {
                            return '<input type="hidden" class="form-control" name="seq_no[]" value="' +
                            meta.row + '">' + (meta.row + 1);
                        }
                    },
                    {
                        data: 'tableName',
                        name: 'tableName',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="table_name_condition[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'fieldName',
                        name: 'fieldName',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="field_name_condition[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'criteria',
                        name: 'criteria',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="criteria[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'value',
                        name: 'value',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="value[]" value="' +
                                data + '">' + data;
                        }
                    },
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        function getIndexBySeqNo(seqNoValue) {
            for (var i = 0; i < arrayReportFormatCondition.length; i++) {
                if (arrayReportFormatCondition[i].seqNo == seqNoValue) {
                    return i;
                }
            }
            return -1;
        }

        $('#report_format_condition_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }
            
            e.stopPropagation();
        });

        $('#report_format_condition_table tbody').on('click', 'tr td:not(:first-child)', function () {
            var data = table2.row(this).data();
            var count = table2.rows().count();
            $('#modal_add_report_format_condition').modal('show');
            $('#record_function_con').val("Edit");
            $('#seq_no').val((data.seqNo + 1));
            $('#table_name_condition').val(data.tableName);
            $('#field_name_condition').val(data.fieldName);
            $('#criteria').val(data.criteria);
            $('#value').val(data.value);

            tableName = $('#table_name_condition').val();
            if(tableName == 'GmLevel'){
                loadDataLevelType();
            }else{
                loadDataFieldName();
            }

            $('#table_name_condition').on('change', function () {
                tableName = $('#table_name_condition').val();
                if(tableName == 'GmLevel'){
                    loadDataLevelType();
                }else{
                    loadDataFieldName();
                }
            });

            $.ajax({
                type: 'GET',
                url: "{{ url('/field/api') }}",
                data: {
                    'tableName' : tableName
                }
            }).then(function (data2) {
                var index = data2.indexOf(data.fieldName)
                var $newOption = $("<option selected='selected'></option>").val(data2[index]).text(data2[index]);
                $("#field_name_condition").append($newOption).trigger('change');
            });
        });

        $('#report_format_condition_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        $('#btn-add-report-format-detail').on('click', function () {
            $('#record_function_det').val("New");
            $('#column_no').val("");
            $('#column_no_edit').val("");
            $('#table_name_detail').val("");
            $('#field_name_detail').val("");
            $('#column_header').val("");
            $('#alignment').val("");
            $('#data_format').val("");
            $('#display').prop('checked', false);
            $('#add_formula').prop('checked', false);
            $("#div_add_formula").hide();
            $('#preview_formula').val("");
            $('#table_chooser').val("");
            $('#field_chooser').val("");
            $('input[name="operator"]').prop('checked', false);

            $('#table_name_detail').on('change', function () {
                tableName = $('#table_name_detail').val();
                if(tableName == 'GmLevel'){
                    loadDataLevelType();
                }else{
                    loadDataFieldName();
                }
            });

            $('#field_name_detail').on('change', function () {
                fieldName = $('#field_name_detail').val();
            });
        });

        $('#btn-add-report-format-condition').on('click', function () {
            $('#record_function_con').val("New");
            $('#seq_no').val("");
            $('#table_name_condition').val("");
            $('#field_name_condition').val("");
            $('#criteria').val("");
            $('#value').val("");

            $('#table_name_condition').on('change', function () {
                tableName = $('#table_name_condition').val();
                if(tableName == 'GmLevel'){
                    loadDataLevelType();
                }else{
                    loadDataFieldName();
                }
            });

            $('#field_name_condition').on('change', function () {
                fieldName = $('#field_name_condition').val();
            });
        });

        function loadDataFieldName(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-6">' + data.data + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#field_name_detail, #field_name_condition').select2({
                width: '100%',
                placeholder: 'Choose Field Name',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/field/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term,
                            tableName : tableName
                        };
                    },
                    processResults: function (data) {
                        // console.log(data);
                        return {
                            results: $.map(data, function (item) {
                                // console.log(item);
                                return {
                                    text: item,
                                    id: item,
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

        function loadDataFieldChooser(tableChooser = ''){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-6">' + data.data + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#field_chooser').select2({
                width: '100%',
                placeholder: 'Choose Field Chooser',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/field/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term,
                            tableName: tableChooser
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item,
                                    id: item,
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

        function loadDataLevelType() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.levelDescription + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#field_name_detail, #field_name_condition').select2({
                width: '100%',
                placeholder: 'Choose Field Name',
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
                    url: "{{ url('/level_type/api') }}",
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
                                    text: item.levelDescription,
                                    id: item.levelType,
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

        $("#btn-save-report-format-detail").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            var previewFormulaValue = $("#preview_formula").val();

            if($("#record_function_det").val() == "New"){
                if (previewFormulaValue !== null && previewFormulaValue !== '') {
                    arrayReportFormatFormula.push({
                        "columnNo": $("#column_no").val() ? parseInt($("#column_no").val()) - 1 : "",
                        "tableName": $("#table_name_detail").val(),
                        "fieldName": $("#field_name_detail").val(),
                        "columnHeader": $("#column_header").val(),
                        "alignment": $("#alignment").val(),
                        "dataFormat": $("#data_format").val(),
                        "display": ($("#display").is(":checked") ? $("#display").val() : false),
                        "fieldFormula": $("#preview_formula").val()
                    });
                }else{
                    arrayReportFormatDetail.push({
                        "columnNo": $("#column_no").val() ? parseInt($("#column_no").val()) - 1 : "",
                        "tableName": $("#table_name_detail").val(),
                        "fieldName": $("#field_name_detail").val(),
                        "columnHeader": $("#column_header").val(),
                        "alignment": $("#alignment").val(),
                        "dataFormat": $("#data_format").val(),
                        "display": ($("#display").is(":checked") ? $("#display").val() : false),
                        "fieldFormula": $("#preview_formula").val()
                    });
                }
            }else{
                var indexToEdit = getIndexByColumnNo(parseInt($("#column_no_edit").val()) - 1);
                var indexToEditFormula = getIndexByColumnNoFormula(parseInt($("#column_no_edit").val()) - 1);

                if (indexToEdit !== -1 || indexToEditFormula !== -1) {
                    if (previewFormulaValue !== null && previewFormulaValue !== '') {
                        if (arrayReportFormatFormula.hasOwnProperty(indexToEditFormula) && arrayReportFormatFormula[indexToEditFormula].hasOwnProperty('columnNo')) {
                            arrayReportFormatFormula[indexToEditFormula].columnNo = parseInt($("#column_no").val()) - 1;
                            arrayReportFormatFormula[indexToEditFormula].tableName = $("#table_name_detail").val();
                            arrayReportFormatFormula[indexToEditFormula].fieldName = $("#field_name_detail").val();
                            arrayReportFormatFormula[indexToEditFormula].columnHeader = $("#column_header").val();
                            arrayReportFormatFormula[indexToEditFormula].alignment = $("#alignment").val();
                            arrayReportFormatFormula[indexToEditFormula].dataFormat = $("#data_format").val();
                            arrayReportFormatFormula[indexToEditFormula].display = ($("#display").is(":checked") ? $("#display").val() : false);
                            arrayReportFormatFormula[indexToEditFormula].fieldFormula = $("#preview_formula").val();
                        }else{
                            arrayReportFormatFormula.push({
                                "columnNo": $("#column_no").val() ? parseInt($("#column_no").val()) - 1 : "",
                                "tableName": $("#table_name_detail").val(),
                                "fieldName": $("#field_name_detail").val(),
                                "columnHeader": $("#column_header").val(),
                                "alignment": $("#alignment").val(),
                                "dataFormat": $("#data_format").val(),
                                "display": ($("#display").is(":checked") ? $("#display").val() : false),
                                "fieldFormula": $("#preview_formula").val()
                            });

                            arrayReportFormatDetail.splice(indexToEdit, 1);
                        }
                    }else{
                        arrayReportFormatDetail[indexToEdit].columnNo = parseInt($("#column_no").val()) - 1;
                        arrayReportFormatDetail[indexToEdit].tableName = $("#table_name_detail").val();
                        arrayReportFormatDetail[indexToEdit].fieldName = $("#field_name_detail").val();
                        arrayReportFormatDetail[indexToEdit].columnHeader = $("#column_header").val();
                        arrayReportFormatDetail[indexToEdit].alignment = $("#alignment").val();
                        arrayReportFormatDetail[indexToEdit].dataFormat = $("#data_format").val();
                        arrayReportFormatDetail[indexToEdit].display = ($("#display").is(":checked") ? $("#display").val() : false);
                        arrayReportFormatDetail[indexToEdit].fieldFormula = $("#preview_formula").val();
                    }
                } else {
                    alert("Object with columnNo value " + $("#column_no_edit").val() + " not found.");
                }
            }

            $(this).prop("disabled", false);
            $(this).html(
                '<i class="fa fa-floppy-o"></i> {{ __("payroll_report_format.btn_save") }}'
            );
            $('#modal_add_report_format_detail').modal('hide');
            
            $('#report_format_detail_table').DataTable().destroy();
            load_table_report_format_detail();

            $('#report_format_formula_table').DataTable().destroy();
            load_table_report_format_formula();
        });

        $("#report_format_detail_form").on("submit", function(){
            $("#report_format_detail_form").validate({
                rules: {
                    column_no: {
                        required: true
                    },
                    table_name_detail: {
                        required: true
                    },
                    field_name_detail: {
                        required: true
                    }
                },
                messages: {
                    column_no: {
                        required: "{{ __('payroll_report_format.field_mandatory') }}",
                    },
                    table_name_detail: {
                        required: "{{ __('payroll_report_format.field_mandatory') }}",
                    },
                    field_name_detail: {
                        required: "{{ __('payroll_report_format.field_mandatory') }}",
                    }
                }
            });
        });

        $("#btn-save-report-format-condition").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            if($("#record_function_con").val() == "New"){
                arrayReportFormatCondition.push({
                    "seqNo": $("#seq_no").val() ? parseInt($("#seq_no").val()) - 1 : "",
                    "tableName": $("#table_name_condition").val(),
                    "fieldName": $("#field_name_condition").val(),
                    "criteria": $("#criteria").val(),
                    "value": $("#value").val(),
                });
            }else{
                var indexToEdit = getIndexBySeqNo(parseInt($("#seq_no").val()) - 1);

                if (indexToEdit !== -1) {
                    arrayReportFormatCondition[indexToEdit].seqNo = parseInt($("#seq_no").val()) - 1;
                    arrayReportFormatCondition[indexToEdit].tableName = $("#table_name_condition").val();
                    arrayReportFormatCondition[indexToEdit].fieldName = $("#field_name_condition").val();
                    arrayReportFormatCondition[indexToEdit].criteria = $("#criteria").val();
                    arrayReportFormatCondition[indexToEdit].value = $("#value").val();
                } else {
                    alert("Object with columnNo value " + $("#seq_no").val() + " not found.");
                }
            }

            $(this).prop("disabled", false);
            $(this).html(
                '<i class="fa fa-floppy-o"></i> {{ __("payroll_report_format.btn_save") }}'
            );

            $('#modal_add_report_format_condition').modal('hide');
            
            $('#report_format_condition_table').DataTable().destroy();
            load_table_report_format_condition();
        });

        $('#modal_add_report_format_detail').on('show.bs.modal', function () {
            var count = table1.rows().count();
            var count2 = table3.rows().count();
            $('#column_no').val(count+count2+1);
        });

        $('#modal_add_report_format_condition').on('show.bs.modal', function () {
            var count = table2.rows().count();
            $('#seq_no').val(count+1);
        });

        $("#btn-remove-report-format-detail").on('click', function() {
            var data = table1.rows('.selected').data().toArray();
            var data2 = table3.rows('.selected').data().toArray();
            if(data.length > 0){
                for (var i = 0; i < data.length; i++) {
                    var index = arrayReportFormatDetail.findIndex(x => x.columnNo == data[i].columnNo);
                    arrayReportFormatDetail.splice(index, 1);
                }
                $('#report_format_detail_table').DataTable().destroy();
                load_table_report_format_detail();
            }else if(data2.length > 0){
                for (var i = 0; i < data2.length; i++) {
                    var index = arrayReportFormatFormula.findIndex(x => x.columnNo == data2[i].columnNo);
                    arrayReportFormatFormula.splice(index, 1);
                }
                $('#report_format_formula_table').DataTable().destroy();
                load_table_report_format_formula();
            }else{
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $("#btn-remove-report-format-condition").on('click', function() {
            var data = table2.rows('.selected').data().toArray();
            if(data.length > 0){
                for (var i = 0; i < data.length; i++) {
                    var index = arrayReportFormatCondition.findIndex(x => x.seqNo == data[i].seqNo);
                    arrayReportFormatCondition.splice(index, 1);
                }
                $('#report_format_condition_table').DataTable().destroy();
                load_table_report_format_condition();
            }else{
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('payroll/report_format') }}";
        });

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            $("#report_format_form").submit();
        });

        if ($("#report_format_form").length > 0) {
            $("#report_format_form").validate({
            rules: {
                    report_code: {
                        required: true,
                    }
                },
                messages: {
                    report_code: {
                        required: "{{ __('payroll_report_format.field_mandatory') }}",
                    }
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    $("#btn-save").prop("disabled", false);
                    $("#btn-save").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("payroll_report_format.btn_save") }}'
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

                    var data = table1.$('input, textarea').serialize();
                    data += '&' + table2.$('input, textarea').serialize();
                    data += '&' + table3.$('input, textarea').serialize();
                    data += '&report_code=' + $('#report_code').val();
                    data += '&record_function=' + $('#record_function').val();
                    data += '&description=' + $('#description').val();
                    data += '&font_size=' + $('#font_size').val();

                    $.ajax({
                        url: "{{ url('payroll/report_format/proses') }}",
                        type: "POST",
                        data: data,
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_report_format.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/report_format') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_report_format.btn_save") }}'
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
                            $("#btn-save").prop("disabled", false);
                            $("#btn-save").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("payroll_report_format.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }
    })

</script>

</html>