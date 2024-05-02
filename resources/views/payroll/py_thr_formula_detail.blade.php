<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_thr_formula.judul') }}</title>
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

        .select2-results__option[aria-selected=true] {
            display: none;
        }

        .required {
            color: red;
        }
    </style>
</head>

<body>
    <div class="div-form">
        <form id="thr_formula_detail_form" method="post">
            @csrf
            <div class="div-payroll">
                <div class="div-title">
                    <a href="{{ url()->previous() }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('payroll_thr_formula.list_detail') }}</span>
                    </a>
                </div>
                <div class="div-form">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="religion_code">{{ __('payroll_thr_formula.label_religion_code') }}</label>
                                <input type="text" class="form-control" name="religion_code" id="religion_code" readonly>
                            </div>
                            <input type="text" class="form-control" id="record_function" name="record_function" hidden>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="religion_name">{{ __('payroll_thr_formula.label_religion_name') }}</label>
                                <input type="text" class="form-control" name="religion_name" id="religion_name" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="div-table">
                        <table id="thr_formula_detail_table" class="table hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Service Month From</th>
                                    <th>Service Month To</th>
                                    <th>Formula</th>
                                    <th>Condition</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <button type="button" class="btn btn-primary" name="btn-add" id="btn-add"
                                style="width: 100%;" data-toggle="modal" data-target="#modal_add_edit_thr_formula">
                                <i class="fa fa-plus"></i> {{ __('payroll_thr_formula.btn_add') }}
                            </button>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-primary" name="btn-edit" id="btn-edit"
                                style="width: 100%;">
                                <i class="fa fa-pencil"></i> {{ __('payroll_thr_formula.btn_edit') }}
                            </button>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-danger" name="btn-remove" id="btn-remove"
                                    style="width: 100%;">
                                <i class="fa fa-times"></i> {{ __('payroll_thr_formula.btn_remove') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal_add_edit_thr_formula"  role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ __('payroll_thr_formula.list') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label
                                            for="service_month_from">{{ __('payroll_thr_formula.label_service_month_from') }}</label>
                                        <span class="required">*</span>
                                        <input type="number" class="form-control" min="1" max="12" id="service_month_from" name="service_month_from"
                                            placeholder="{{ __('payroll_thr_formula.label_service_month_from') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="service_month_to">{{ __('payroll_thr_formula.label_service_month_to') }}</label>
                                        <span class="required">*</span>
                                        <input type="number" class="form-control" min="1" max="12" id="service_month_to" name="service_month_to"
                                            placeholder="{{ __('payroll_thr_formula.label_service_month_to') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label
                                            for="table_chooser">{{ __('payroll_thr_formula.label_table_chooser') }}</label>
                                        <span class="required">*</span>
                                        <select class="form-control select2" id="table_chooser" name="table_chooser">
                                            <option value="" selected>{{ __('payroll_thr_formula.label_select_table_chooser') }}</option>
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
                                            for="field_chooser">{{ __('payroll_thr_formula.label_field_chooser') }}</label>
                                        <span class="required">*</span>
                                        <select class="form-control select2" id="field_chooser" name="field_chooser"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-group">
                                        <label
                                            for="operator">{{ __('payroll_thr_formula.label_operator') }}</label>
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
                                <div class="col-2">
                                    <div class="form-group">
                                        <label
                                            for="operator">&nbsp;</label>
                                        <div class="form-radio">
                                            <input class="form-radio-input" type="radio" id="is_operator"
                                                name="operator" value="=">
                                            <label class="form-radio-label"
                                                for="is_operator">=</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-group">
                                        <div class="form-radio">
                                            <input class="form-radio-input" type="radio" id="not_operator"
                                                name="operator" value="<>">
                                            <label class="form-radio-label"
                                                for="not_operator"><></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <div class="form-radio">
                                            <input class="form-radio-input" type="radio" id="less_operator"
                                                name="operator" value="<=">
                                            <label class="form-radio-label"
                                                for="less_operator"><=</label>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-2">
                                    <div class="form-group">
                                        <div class="form-radio">
                                            <input class="form-radio-input" type="radio" id="more_operator"
                                                name="operator" value=">=">
                                            <label class="form-radio-label"
                                                for="more_operator">>=</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <div class="form-radio">
                                            <input class="form-radio-input" type="radio" id="and_operator"
                                                name="operator" value="And">
                                            <label class="form-radio-label"
                                                for="and_operator">And</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <div class="form-radio">
                                            <input class="form-radio-input" type="radio" id="or_operator"
                                                name="operator" value="Or">
                                            <label class="form-radio-label"
                                                for="or_operator">Or</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <div class="form-radio">
                                            <input class="form-radio-input" type="radio" id="between_operator"
                                                name="operator" value="Between">
                                            <label class="form-radio-label"
                                                for="between_operator">Between</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-group">
                                        <div class="form-radio">
                                            <input class="form-radio-input" type="radio" id="like_operator"
                                                name="operator" value="Like">
                                            <label class="form-radio-label"
                                                for="like_operator">Like</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="form-radio">
                                            <input class="form-radio-input" type="radio" id="true_operator"
                                                name="operator" value="=True">
                                            <label class="form-radio-label"
                                                for="true_operator">True Condition</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="form-radio">
                                            <input class="form-radio-input" type="radio" id="false_operator"
                                                name="operator" value="=False">
                                            <label class="form-radio-label"
                                                for="false_operator">False Condition</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="btn-add-to-condition">&nbsp;</label>
                                        <button type="button" class="btn btn-process" name="btn-add-to-condition" id="btn-add-to-condition">
                                            {{ __('payroll_thr_formula.btn_add_to_condition') }}
                                        </button>
                                    </div>
                                </div>
                                <div class="col-3"></div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="preview_condition">{{ __('payroll_thr_formula.label_preview_condition') }}</label>
                                        <textarea class="form-control" id="preview_condition" name="preview_condition" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="btn-add-to-condition">&nbsp;</label>
                                        <button type="button" class="btn btn-process" name="btn-add-to-formula" id="btn-add-to-formula">
                                            {{ __('payroll_thr_formula.btn_add_to_formula') }}
                                        </button>
                                    </div>
                                </div>
                                <div class="col-3"></div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="preview_formula">{{ __('payroll_thr_formula.label_preview_formula') }}</label>
                                        <textarea class="form-control" id="preview_formula" name="preview_formula" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" id="btn-save" class="btn btn-primary w-25"><i 
                                    class="fa fa-floppy-o"></i> {{ __('payroll_thr_formula.btn_save') }}</button>
                                <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                                    class="fa fa-times-circle"></i> {{ __('payroll_thr_formula.btn_cancel') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
                        <span class="title-text-notification">{{ __('payroll_thr_formula.alert_success') }}</span>
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
        var arrData = @json($data);
        var arrData2 = @json($data_table);
        var table = null;
        var tableChooser = null;
        var fieldChooser = null;
        var arrayTHRFormulaDetail = null;

        $('#thr_formula_detail_table thead tr').clone(true).appendTo('#thr_formula_detail_table thead');
        $('#thr_formula_detail_table thead tr:eq(1) th:not(:first-child)').each( function (i) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="'+title+'" />');

            $('input', this).on('keyup change', function () {
                if (table.column(i + 1).search() !== this.value) {
                    table
                        .column(i + 1)
                        .search(this.value)
                        .draw();
                }
            } );
        });

        $('#select').focus(function (event) {
                var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
                $searchfield.prop('disabled', true);
        });

        $('#select').click(function (event) {
            var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
        });

        $('#select').change(function (event) {
            var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
        });

        $('select').on('select2:close', function (e) {
            $('.header-select').remove();
        });
        
        $('#religion_code').val((typeof arrData[0].comGenCode !== 'undefined') ? arrData[0].comGenCode : '');
        $('#religion_name').val((typeof arrData[0].value !== 'undefined') ? arrData[0].value : '');

        $('#btn-add').on('click', function () {
            $('#service_month_from').prop('readonly', false);

            $('#record_function').val('New');
            $('#service_month_from').val('');
            $('#service_month_to').val('');
            $('#none_operator').prop('checked', true);
            $('#table_chooser').val(null).trigger('change');
            $('#field_chooser').val(null).trigger('change');
            $('#preview_formula').val('');
            $('#preview_condition').val('');
        });

        $("#btn-edit").on('click', function() {
            var data = table.rows('.selected').data();
            
            if(data.count() > 0){
                $('#modal_add_edit_thr_formula').modal('show');
                $('#service_month_from').prop('readonly', true);
                
                $('#record_function').val('Edit');
                $('#table_chooser').val(null).trigger('change');
                $('#field_chooser').val(null).trigger('change');
                $('#service_month_from').val((data[0].serviceMonthFrom !== null) ? data[0].serviceMonthFrom : '');
                $('#service_month_to').val((data[0].serviceMonthTo !== null) ? data[0].serviceMonthTo : '');
                $('#preview_formula').val((data[0].formula !== null) ? data[0].formula : '');
                $('#preview_condition').val((data[0].condition !== null) ? data[0].condition : '');
                $('#none_operator').prop('checked', true);
            }else{
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $('#table_chooser').on('change', function () {
            tableChooser = $('#table_chooser').val();
            $('#field_chooser').val(null).trigger('change');
            loadDataFieldChooser();
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
                var formula = tableChooser + '.' + fieldChooser;
                $('#preview_formula').val($('#preview_formula').val() + ' ' + formula + ' ' + operator);
            } else {
                $('#preview_formula').val($('#preview_formula').val() + ' ' + operator);
            }
        });

        $('#btn-add-to-condition').on('click', function () {
            var operator = $('input[name="operator"]:checked').val();
            if(operator == 'none'){
                operator = '';
            }

            if (typeof fieldChooser !== 'undefined' && fieldChooser !== null) {
                var formula = tableChooser + '.' + fieldChooser;
                $('#preview_condition').val($('#preview_condition').val() + ' ' + formula + ' ' + operator);
            } else {
                $('#preview_condition').val($('#preview_condition').val() + ' ' + operator);
            }
        });

        // $('#thr_formula_detail_table tbody').on('click', 'tr td:not(:first-child)', function () {
        //     var data = table.row(this).data();
        // });

        load_data_table_thr_formula_detail();

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function load_data_table_thr_formula_detail() {
            table = $('#thr_formula_detail_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: 
                    {
                        url : "{{ url('payroll/thr_formula_detail/table') }}",
                        data: {
                            'religionCode' : $('#religion_code').val()
                        }
                    },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [[ 1, "asc" ]],
                columns: [
                    {
                        orderable: false,
                        targets: 0, 
                        "defaultContent": '',
                        render: function(data, type) {
                            return type === 'display'? '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {data: 'serviceMonthFrom', name: 'serviceMonthFrom'},
                    {data: 'serviceMonthTo', name: 'serviceMonthTo'},
                    {data: 'formula', name: 'formula'},
                    {data: 'condition', name: 'condition'}
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#thr_formula_detail_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#thr_formula_detail_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        function loadDataFieldChooser(){
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

        $("#btn-remove").on('click', function () {
            var data = table.rows('.selected').data();

            if (data.count() > 0) {
                $.ajax({
                    url: "{{ url('payroll/thr_formula/remove') }}",
                    type: "GET",
                    data: {
                        'religionCode' : data[0].religionCode,
                        'serviceMonthFrom' : data[0].serviceMonthFrom,
                        'serviceMonthTo' : data[0].serviceMonthTo,
                        'formula' : data[0].formula,
                        'condition' : data[0].condition,
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success').modal('show');
                            $('#message-notification-success').html(response
                                .message);
                            $('#thr_formula_detail_table').DataTable().destroy();
                            load_data_table_thr_formula_detail();
                            setTimeout(function () {
                                $('#notification_success').modal('hide');
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

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#thr_formula_detail_form").submit();
        });

        if ($("#thr_formula_detail_form").length > 0) {
            $("#thr_formula_detail_form").validate({
            rules: {
                    religion_code: {
                        required: true,
                    },
                    service_month_from: {
                        required: true,
                    },
                    service_month_to: {
                        required: true,
                    },
                },
                messages: {
                    religion_code: {
                        required: "{{ __('payroll_thr_formula.field_mandatory') }}",
                    },
                    service_month_from: {
                        required: "{{ __('payroll_thr_formula.field_mandatory') }}",
                    },
                    service_month_to: {
                        required: "{{ __('payroll_thr_formula.field_mandatory') }}",
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
                    $("#btn-save").prop("disabled", false);
                    $("#btn-save").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("payroll_thr_formula.btn_save") }}'
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
                        url: "{{ url('payroll/thr_formula/proses') }}",
                        type: "POST",
                        data: $('#thr_formula_detail_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_thr_formula.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                $('#thr_formula_detail_table').DataTable().destroy();
                                load_data_table_thr_formula_detail();
                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                }, 3000);
                                $('#modal_add_edit_thr_formula').modal('hide');
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_thr_formula.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("payroll_thr_formula.btn_save") }}'
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