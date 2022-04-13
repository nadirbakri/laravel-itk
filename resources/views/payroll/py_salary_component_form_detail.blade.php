<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_salary_component_data.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
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

        .required {
            color: red;
        }

        .row .box {
            /* width: 300px; */
            border: 1px solid #004883;
            padding: 5px;
        }

    </style>
</head>

<body>
    <div class="div-payroll">
        <div class="div-title">
            <a href="{{ url('payroll/salary_component_data') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('payroll_salary_component_data.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="salary_component_data_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="field_name">{{ __('payroll_salary_component_data.label_field_name') }}</label>
                            <span class="required">*</span>
                            <input type="text" class="form-control" id="field_name" name="field_name"
                                placeholder="{{ __('payroll_salary_component_data.label_field_name') }}" readonly>
                        </div>
                        <input type="text" class="form-control" id="record_function" name="record_function" hidden>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="description">{{ __('payroll_salary_component_data.label_description') }}</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="{{ __('payroll_salary_component_data.label_description') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="field_width">{{ __('payroll_salary_component_data.label_field_width') }}</label>
                            <input type="number" class="form-control" id="field_width" name="field_width"
                                placeholder="{{ __('payroll_salary_component_data.label_field_width') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="decimal_point">{{ __('payroll_salary_component_data.label_decimal_point') }}</label>
                            <small id="decimal_point_rules" class="text-muted">{{ __('payroll_salary_component_data.label_decimal_point_rules') }}</small>
                            <input type="number" class="form-control" id="decimal_point" name="decimal_point"
                                placeholder="{{ __('payroll_salary_component_data.label_decimal_point') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="include_prorate">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="include_prorate"
                                    name="include_prorate" value="true">
                                <label
                                    for="include_prorate">{{ __('payroll_salary_component_data.label_include_prorate') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="group_takehomepay">{{ __('payroll_salary_component_data.label_group_takehomepay') }}</label>
                            <select class="form-control select2" id="group_takehomepay" name="group_takehomepay">
                                <option value="" disabled selected>{{ __('payroll_salary_component_data.label_select_group_takehomepay') }}</option>
                                <option id="group_0" name="group_0" value=0 selected="selected">0</option>
                                <option id="group_1" name="group_1" value=1>1</option>
                                <option id="group_2" name="group_2" value=2>2</option>
                                <option id="group_3" name="group_3" value=3>3</option>
                                <option id="group_4" name="group_4" value=4>4</option>
                                <option id="group_5" name="group_5" value=5>5</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group box">
                            <div class="form-check">
                                <label for="display_in">{{ __('payroll_salary_component_data.label_display_in') }}</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="salary_master" name="display_in" value="M" checked>
                                <label for="salary_master">Salary Master</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="display_in_annual_data_entry" name="display_in" value="T">
                                <label for="display_in_annual_data_entry">Display In Annual Data Entry</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="tariff_master" name="display_in" value="F">
                                <label for="tariff_master">Tariff Master</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="not_display" name="display_in" value="N">
                                <label for="not_display">Not Display</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group box">
                            <div class="form-check">
                                <label for="field_type">{{ __('payroll_salary_component_data.label_field_type') }}</label>
                            </div>
                            <div class="form-check">
                                <input class="field_type" type="radio" id="fixed_allowance" name="field_type" value="T" checked>
                                <label for="fixed_allowance">Fixed Allowance</label>
                            </div>
                            <div class="form-check">
                                <input class="field_type" type="radio" id="non_fixed_allowance" name="field_type" value="N">
                                <label for="non_fixed_allowance">Non Fixed Allowance</label>
                            </div>
                            <div class="form-check">
                                <input class="field_type" type="radio" id="others" name="field_type" value="L">
                                <label for="others">Others</label>
                            </div>
                            <div class="form-check">
                                <input class="field_type" type="radio" id="fixed_deduction" name="field_type" value="P">
                                <label for="fixed_deduction">Fixed Deduction</label>
                            </div>
                            <div class="form-check">
                                <input class="field_type" type="radio" id="non_fixed_deduction" name="field_type" value="A">
                                <label for="non_fixed_deduction">Non Fixed Deduction</label>
                            </div>
                            <div class="form-check">
                                <input class="field_type" type="radio" id="flag" name="field_type" value="F">
                                <label for="flag">Flag</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group box">
                            <div class="form-check">
                                <label for="tax">{{ __('payroll_salary_component_data.label_tax') }}</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="increase_tax" name="tax" value="T" checked>
                                <label for="increase_tax">Increase Tax</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="non_taxable" name="tax" value="N">
                                <label for="non_taxable">Non Taxable</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="decrease_tax" name="tax" value="P">
                                <label for="decrease_tax">Decrease Tax</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="pension">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="pension"
                                    name="pension" value="true">
                                <label
                                    for="pension">{{ __('payroll_salary_component_data.label_pension') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="yearly_update">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="yearly_update"
                                    name="yearly_update" value="true">
                                <label
                                    for="yearly_update">{{ __('payroll_salary_component_data.label_yearly_update') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="cummulative_update">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cummulative_update"
                                    name="cummulative_update" value="true">
                                <label
                                    for="cummulative_update">{{ __('payroll_salary_component_data.label_cummulative_update') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-5"></div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="retroactive">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="retroactive"
                                    name="retroactive" value="true">
                                <label
                                    for="retroactive">{{ __('payroll_salary_component_data.label_retroactive') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="tax_allowance">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tax_allowance"
                                    name="tax_allowance" value="true">
                                <label
                                    for="tax_allowance">{{ __('payroll_salary_component_data.label_tax_allowance') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="for_limit_medical">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="for_limit_medical"
                                    name="for_limit_medical" value="true">
                                <label
                                    for="for_limit_medical">{{ __('payroll_salary_component_data.label_for_limit_medical') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="jamsostek">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="jamsostek"
                                    name="jamsostek" value="true" disabled>
                                <label
                                    for="jamsostek">{{ __('payroll_salary_component_data.label_jamsostek') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="health_insurance">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="health_insurance"
                                    name="health_insurance" value="true" disabled>
                                <label
                                    for="health_insurance">{{ __('payroll_salary_component_data.label_health_insurance') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="pension_insurance">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="pension_insurance"
                                    name="pension_insurance" value="true" disabled>
                                <label
                                    for="pension_insurance">{{ __('payroll_salary_component_data.label_pension_insurance') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="overtime_alternative_1">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="overtime_alternative_1"
                                    name="overtime_alternative_1" value="true" disabled>
                                <label
                                    for="overtime_alternative_1">{{ __('payroll_salary_component_data.label_overtime_alternative_1') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="overtime_alternative_2">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="overtime_alternative_2"
                                    name="overtime_alternative_2" value="true" disabled>
                                <label
                                    for="overtime_alternative_2">{{ __('payroll_salary_component_data.label_overtime_alternative_2') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('payroll_salary_component_data.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-primary" href="{{ url('payroll/salary_component_data') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('payroll_salary_component_data.btn_cancel') }}
                        </a>
                    </div>
                </div>
            </form>
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
                        <span class="title-text-notification">{{ __('payroll_salary_component_data.alert_success') }}</span>
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
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var func = '{{ $func }}';
        var arrData = @json($data);
        var displayIn = null;
        var fieldType = null;

        if (func === 'new') {
            $('#record_function').val('New');
            $('#field_name').prop('readonly', false);

            $('#field_name').val('');
            $('#description').val('');
            $('#field_width').val('');
            $('#decimal_point').val('');
            $('#include_prorate').prop('checked', false).trigger('change');
            $('#group_takehomepay').val(0).trigger('change');
            $('#pension').prop('checked', false).trigger('change');
            $('#yearly_update').prop('checked', false).trigger('change');
            $('#cummulative_update').prop('checked', false).trigger('change');
            $('#retroactive').prop('checked', false).trigger('change');
            $('#tax_allowance').prop('checked', false).trigger('change');
            $('#for_limit_medical').prop('checked', false).trigger('change');
            $('#jamsostek').prop('checked', false).trigger('change');
            $('#health_insurance').prop('checked', false).trigger('change');
            $('#pension_insurance').prop('checked', false).trigger('change');
            $('#overtime_alternative_1').prop('checked', false).trigger('change');
            $('#overtime_alternative_2').prop('checked', false).trigger('change');

            $('#jamsostek').prop('disabled', false);
            $('#health_insurance').prop('disabled', false);
            $('#pension_insurance').prop('disabled', false);
            $('#overtime_alternative_1').prop('disabled', false);
            $('#overtime_alternative_2').prop('disabled', false);

            displayIn = $('input[name=display_in]').val();
            fieldType = $('input[name=field_type]').val();
        } else {
            $('#record_function').val('Edit');
            $('#field_name').prop('readonly', true);
            $('#field_width').prop('readonly', true);
            $('#decimal_point').prop('readonly', true);

            $('#field_name').val((typeof arrData[0].fieldName !== 'undefined') ? arrData[0].fieldName : '');
            $('#description').val((typeof arrData[0].description !== 'undefined') ? arrData[0].description : '');
            $('#field_width').val((typeof arrData[0].fieldWidth !== 'undefined') ? arrData[0].fieldWidth : '');
            $('#decimal_point').val((typeof arrData[0].decimalPoint !== 'undefined') ? arrData[0].decimalPoint : '');
            if (typeof arrData[0].includeProrate !== 'undefined') {
                if (arrData[0].includeProrate === true) {
                    $('#include_prorate').prop('checked', true).trigger('change');
                }
                else {
                    $('#include_prorate').prop('checked', false).trigger('change');
                }
            }

            $('#group_takehomepay').val((typeof arrData[0].groupTakehomepay !== 'undefined') ? arrData[0].groupTakehomepay : '').trigger('change');
            displayIn = (typeof arrData[0].displayIn !== 'undefined') ? arrData[0].displayIn : '';

            if (typeof arrData[0].displayIn !== 'undefined') {
                if (arrData[0].displayIn === 'M') {
                    $('#salary_master').prop('checked', true).trigger('change');
                }
                else if (arrData[0].displayIn === 'T') {
                    $('#display_in_annual_data_entry').prop('checked', true).trigger('change');
                }
                else if (arrData[0].displayIn === 'F') {
                    $('#tariff_master').prop('checked', true).trigger('change');
                }
                else {
                    $('#not_display').prop('checked', true).trigger('change');
                }
            }

            fieldType = (typeof arrData[0].fieldType !== 'undefined') ? arrData[0].fieldType : '';

            if (typeof arrData[0].fieldType !== 'undefined') {
                if (arrData[0].fieldType === 'T') {
                    $('#fixed_allowance').prop('checked', true).trigger('change');
                }
                else if (arrData[0].fieldType === 'N') {
                    $('#non_fixed_allowance').prop('checked', true).trigger('change');
                }
                else if (arrData[0].fieldType === 'L') {
                    $('#others').prop('checked', true).trigger('change');
                }
                else if (arrData[0].fieldType === 'P') {
                    $('#fixed_deduction').prop('checked', true).trigger('change');
                }
                else if (arrData[0].fieldType === 'A') {
                    $('#non_fixed_deduction').prop('checked', true).trigger('change');
                }
                else {
                    $('#flag').prop('checked', true).trigger('change');
                }
            }    

            if (typeof arrData[0].flagTax !== 'undefined') {
                if (arrData[0].flagTax === 'T') {
                    $('#increase_tax').prop('checked', true).trigger('change');
                }
                else if (arrData[0].flagTax === 'N') {
                    $('#non_taxable').prop('checked', true).trigger('change');
                }
                else {
                    $('#decrease_tax').prop('checked', true).trigger('change');
                }
            }

            if (typeof arrData[0].flagPension !== 'undefined') {
                if (arrData[0].flagPension === true) {
                    $('#pension').prop('checked', true).trigger('change');
                }
                else {
                    $('#pension').prop('checked', false).trigger('change');
                }
            }

            if (typeof arrData[0].flagYearlyUpdate !== 'undefined') {
                if (arrData[0].flagYearlyUpdate === true) {
                    $('#yearly_update').prop('checked', true).trigger('change');
                }
                else {
                    $('#yearly_update').prop('checked', false).trigger('change');
                }
            }

            if (typeof arrData[0].flagCummulativeUpdate !== 'undefined') {
                if (arrData[0].flagCummulativeUpdate === true) {
                    $('#cummulative_update').prop('checked', true).trigger('change');
                }
                else {
                    $('#cummulative_update').prop('checked', false).trigger('change');
                }
            }

            if (typeof arrData[0].flagRetroactive !== 'undefined') {
                if (arrData[0].flagRetroactive === true) {
                    $('#retroactive').prop('checked', true).trigger('change');
                }
                else {
                    $('#retroactive').prop('checked', false).trigger('change');
                }
            }

            if (typeof arrData[0].flagTaxAllowance !== 'undefined') {
                if (arrData[0].flagTaxAllowance === true) {
                    $('#tax_allowance').prop('checked', true).trigger('change');
                }
                else {
                    $('#tax_allowance').prop('checked', false).trigger('change');
                }
            }

            if (typeof arrData[0].flagLimitMedical !== 'undefined') {
                if (arrData[0].flagLimitMedical === true) {
                    $('#for_limit_medical').prop('checked', true).trigger('change');
                }
                else {
                    $('#for_limit_medical').prop('checked', false).trigger('change');
                }
            }

            if (typeof arrData[0].flagJamsostek !== 'undefined') {
                if (arrData[0].flagJamsostek === true) {
                    $('#jamsostek').prop('checked', true).trigger('change');
                }
                else {
                    $('#jamsostek').prop('checked', false).trigger('change');
                }
            }

            if (typeof arrData[0].flagHealthInsurance !== 'undefined') {
                if (arrData[0].flagHealthInsurance === true) {
                    $('#health_insurance').prop('checked', true).trigger('change');
                }
                else {
                    $('#health_insurance').prop('checked', false).trigger('change');
                }
            }

            if (typeof arrData[0].flagPensionInsurance !== 'undefined') {
                if (arrData[0].flagPensionInsurance === true) {
                    $('#pension_insurance').prop('checked', true).trigger('change');
                }
                else {
                    $('#pension_insurance').prop('checked', false).trigger('change');
                }
            }

            if (typeof arrData[0].flagOvtAlternative1 !== 'undefined') {
                if (arrData[0].flagOvtAlternative1 === true) {
                    $('#overtime_alternative_1').prop('checked', true).trigger('change');
                }
                else {
                    $('#overtime_alternative_1').prop('checked', false).trigger('change');
                }
            }

            if (typeof arrData[0].flagOvtAlternative2 !== 'undefined') {
                if (arrData[0].flagOvtAlternative2 === true) {
                    $('#overtime_alternative_2').prop('checked', true).trigger('change');
                }
                else {
                    $('#overtime_alternative_2').prop('checked', false).trigger('change');
                }
            }

            if (arrData[0].fieldType === 'T') {
                $('#jamsostek').prop('disabled', false);
                $('#health_insurance').prop('disabled', false);
                $('#pension_insurance').prop('disabled', false);
                $('#overtime_alternative_1').prop('disabled', false);
                $('#overtime_alternative_2').prop('disabled', false);
            }else if(arrData[0].fieldType === 'L' && arrData[0].displayIn === 'F') {
                $('#jamsostek').prop('disabled', false);
                $('#health_insurance').prop('disabled', false);
                $('#pension_insurance').prop('disabled', false);
                $('#overtime_alternative_1').prop('disabled', false);
                $('#overtime_alternative_2').prop('disabled', false);
            }else{
                $('#jamsostek').prop('disabled', true);
                $('#health_insurance').prop('disabled', true);
                $('#pension_insurance').prop('disabled', true);
                $('#overtime_alternative_1').prop('disabled', true);
                $('#overtime_alternative_2').prop('disabled', true);
            }
        }

        $('input[name=display_in]').on('change', function () {
            displayIn = $('input[name=display_in]:checked').val();
            fieldType = $('input[name=field_type]:checked').val();
            if (displayIn == 'F' && fieldType === 'L') {
                $('#jamsostek').prop('disabled', false);
                $('#health_insurance').prop('disabled', false);
                $('#pension_insurance').prop('disabled', false);
                $('#overtime_alternative_1').prop('disabled', false);
                $('#overtime_alternative_2').prop('disabled', false);
            } else if (fieldType == 'T') {
                $('#jamsostek').prop('disabled', false);
                $('#health_insurance').prop('disabled', false);
                $('#pension_insurance').prop('disabled', false);
                $('#overtime_alternative_1').prop('disabled', false);
                $('#overtime_alternative_2').prop('disabled', false);
            } else {
                $('#jamsostek').prop('disabled', true);
                $('#health_insurance').prop('disabled', true);
                $('#pension_insurance').prop('disabled', true);
                $('#overtime_alternative_1').prop('disabled', true);
                $('#overtime_alternative_2').prop('disabled', true);
            }
        });

        $('input[name=field_type]').on('change', function () {
            fieldType = $('input[name=field_type]:checked').val();
            displayIn = $('input[name=display_in]:checked').val();
            if (fieldType == 'T') {
                $('#jamsostek').prop('disabled', false);
                $('#health_insurance').prop('disabled', false);
                $('#pension_insurance').prop('disabled', false);
                $('#overtime_alternative_1').prop('disabled', false);
                $('#overtime_alternative_2').prop('disabled', false);
            } else if (displayIn == 'F' && fieldType === 'L') {
                $('#jamsostek').prop('disabled', false);
                $('#health_insurance').prop('disabled', false);
                $('#pension_insurance').prop('disabled', false);
                $('#overtime_alternative_1').prop('disabled', false);
                $('#overtime_alternative_2').prop('disabled', false);
            }else {
                $('#jamsostek').prop('disabled', true);
                $('#health_insurance').prop('disabled', true);
                $('#pension_insurance').prop('disabled', true);
                $('#overtime_alternative_1').prop('disabled', true);
                $('#overtime_alternative_2').prop('disabled', true);
            }
        });

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#salary_component_data_form").submit();
        });

        if ($("#salary_component_data_form").length > 0) {
            $("#salary_component_data_form").validate({
                rules: {
                    field_name: {
                        required: true,
                    }
                },
                messages: {
                    field_name: {
                        required: "{{ __('payroll_salary_component_data.field_mandatory') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("payroll_salary_component_data.btn_save") }}'
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
                    $.ajax({
                        url: "{{ url('payroll/salary_component_data/proses') }}",
                        type: "POST",
                        data: $('#salary_component_data_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_salary_component_data.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/salary_component_data') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_salary_component_data.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("payroll_salary_component_data.btn_save") }}'
                            );

                            $('#notification').modal('show');
                            $('#message-notification').html(response);
                        }

                    });
                }
            })
        }
    });
</script>

</html>