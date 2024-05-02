<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_calculation.judul') }}</title>
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
    </style>
</head>

<body>
    <div class="div-form">
        <form id="payroll_calculation_detail_form" method="post">
            @csrf
            <div class="div-payroll">
                <div class="div-title">
                    <a href="{{ url()->previous() }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('payroll_calculation.list_detail') }}</span>
                    </a>
                </div>
                <div class="div-form">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="field_name">{{ __('payroll_calculation.label_field_name') }}</label>
                                <span class="required">*</span>
                                <select class="form-control select2" id="field_name" name="field_name"></select>
                            </div>
                            <input type="text" class="form-control" id="record_function" name="record_function" hidden>
                            <input type="text" class="form-control" id="field_name_hidden" name="field_name_hidden" hidden>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="sequence">{{ __('payroll_calculation.label_sequence') }}</label>
                                <span class="required">*</span>
                                <input type="text" class="form-control" name="sequence" id="sequence">
                            </div>
                        </div>
                    </div>
                    <div class="div-table">
                        <table id="payroll_calculation_detail_table" class="table hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>{{ __('payroll_calculation.label_no') }}</th>
                                    <th>{{ __('payroll_calculation.label_condition') }}</th>
                                    <th>{{ __('payroll_calculation.label_formula') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <button type="button" class="btn btn-primary" name="btn-add" id="btn-add"
                                style="width: 100%;" data-toggle="modal" data-target="#modal_add_edit_payroll_calculation">
                                <i class="fa fa-plus"></i> {{ __('payroll_calculation.btn_add') }}
                            </button>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-primary" name="btn-edit" id="btn-edit"
                                style="width: 100%;">
                                <i class="fa fa-pencil"></i> {{ __('payroll_calculation.btn_edit') }}
                            </button>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-danger" name="btn-remove" id="btn-remove"
                                    style="width: 100%;">
                                <i class="fa fa-times"></i> {{ __('payroll_calculation.btn_remove') }}
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                                style="width: 100%;">
                                <i class="fa fa-floppy-o"></i> {{ __('payroll_calculation.btn_save') }}
                            </button>
                        </div>
                        <div class="col-3">
                            <a class="btn btn-outline-primary" href="{{ url('payroll/payroll_calculation') }}" target="iframe_dashboard"
                                name="btn-cancel" id="btn-cancel" style="width: 100%;">
                                <i class="fa fa-times-circle"></i> {{ __('payroll_calculation.btn_cancel') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- ini buat bikin pop up nya --}}
    <div class="div-form">
        <form id="payroll_calculation_detail_modal_form" method="post">
            @csrf
            <div class="modal fade" id="modal_add_edit_payroll_calculation"  role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ __('payroll_calculation.list') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="no">{{ __('payroll_calculation.label_no') }}</label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" id="no" name="no"
                                            placeholder="{{ __('payroll_calculation.label_no') }}">
                                    </div>
                                    <input type="hidden" class="form-control" id="func_detail" name="func_detail">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label
                                            for="table_chooser">{{ __('payroll_calculation.label_table_chooser') }}</label>
                                        <span class="required">*</span>
                                        <select class="form-control select2" id="table_chooser" name="table_chooser">
                                            <option value="" selected>{{ __('payroll_calculation.label_select_table_chooser') }}</option>
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
                                            for="field_chooser">{{ __('payroll_calculation.label_field_chooser') }}</label>
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
                                            <input class="form-radio-input" type="radio" id="and_operator"
                                                name="operator" value="And">
                                            <label class="form-radio-label"
                                                for="and_operator">And</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
                                <button type="button" id="btn-save-detail" class="btn btn-primary w-25"><i 
                                    class="fa fa-floppy-o"></i> {{ __('payroll_calculation.btn_save') }}</button>
                                <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                                    class="fa fa-times-circle"></i> {{ __('payroll_calculation.btn_cancel') }}</button>
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
                        <span class="title-text-notification">{{ __('payroll_calculation.alert_success') }}</span>
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
        var func = "{{ $func }}";
        var table = null;
        var tableChooser = null;
        var fieldChooser = null;
        var arrayPayrollCalculation = [];

        $('.div-navbar a.disabled').attr('onclick', 'return false;');

        $('#payroll_calculation_detail_table thead tr').clone(true).appendTo('#payroll_calculation_detail_table thead');
        $('#payroll_calculation_detail_table thead tr:eq(1) th:not(:first-child)').each( function (i) {
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

        if (func === 'new') {
            $('#record_function').val('New');
            $('#field_name').val(null).trigger('change');
            // $('#sequence').val(((typeof arrData[0].seqProcess !== 'undefined') ? arrData[0].seqProcess : '')+1);
            
            $('#payroll_calculation_detail_table').DataTable().destroy();
            load_table_payroll_calculation_detail();
            // console.log(arrData[0].seqProcess);
        }

        else if (func ==='edit') {
            $('#record_function').val('Edit');
            $('#field_name').prop('disabled', true);
            $('#sequence').val(((typeof arrData[0].seqProcess !== 'undefined') ? arrData[0].seqProcess : ''));
            $.ajax({
                type: 'GET',
                url: "{{ url('/field_name_edit_salary_component/api') }}",
                data: {
                    'fieldName': ((typeof arrData[0].fieldName !== 'undefined') ? arrData[0].fieldName : '')
                }
            }).then(function (data) {
                var option = $('<option/>', {
                    id: data[0].fieldName,
                    title: data[0].description,
                    text: data[0].description
                });
                // console.log(data);
                $("#field_name").append(option).attr('data-alias', 'yourvalue').trigger(
                    'change');
                $("#field_name").trigger({
                    type: 'select2:select',
                    params: {
                        id: data[0].fieldName,
                        text: data[0].description,
                        data: data[0]
                    }
                });
            });
            $('#field_name_hidden').val((typeof arrData[0].fieldName !== 'undefined') ? arrData[0].fieldName : '');

            load_table_payroll_calculation_detail();
            if (arrData2 != null) {
                for (var i = 0; i < arrData2.length; i++) {
                    arrayPayrollCalculation.push({
                        "seqNo": ((typeof arrData2[i].seqNo !== 'undefined') ? arrData2[i].seqNo : ''),
                        "condition": ((typeof arrData2[i].condition !== 'undefined') ? arrData2[i].condition : ''),
                        "formula": ((typeof arrData2[i].formula !== 'undefined') ? arrData2[i].formula : '')
                    });
                    // console.log(arrayPayrollCalculation);
                }
            }
            $('#payroll_calculation_detail_table').DataTable().destroy();
            load_table_payroll_calculation_detail();
        }

        $('#btn-add').on('click', function () {
            $('#no').val(arrayPayrollCalculation.length);
            $('#func_detail').val('new');
            $('#table_chooser').val(null).trigger('change');
            $('#field_chooser').val(null).trigger('change');
            $('#preview_formula').val('');
            $('#preview_condition').val('');
            $('#none_operator').prop('checked', true);
        });

        $("#btn-edit").on('click', function() {
            $('#table_chooser').val(null).trigger('change');
            $('#field_chooser').val(null).trigger('change');
            var data = table.rows('.selected').data();
            if(data.count() > 0){
                $('#modal_add_edit_payroll_calculation').modal('show');
                $('#func_detail').val('edit');
                $('#no').val((data[0].seqNo !== null) ? data[0].seqNo : '');
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

        $('#btn-add-to-condition').on('click', function () {
            var operator = $('input[name="operator"]:checked').val();
            if(operator == 'none'){
                operator = '';
            }

            if (typeof fieldChooser !== 'undefined' && fieldChooser !== null) {
                var formula = '"' + tableChooser + '"' + '.' + '"' + fieldChooser + '"';
                $('#preview_condition').val($('#preview_condition').val() + ' ' + formula + ' ' + operator);
            } else {
                $('#preview_condition').val($('#preview_condition').val() + ' ' + operator);
            }
        });

        loadDataFieldName();

        function loadDataFieldName() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.fieldName + '</div>' +
                        '<div class="col-6">' + data.data.description + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#field_name').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Field Name</b></div>' +
                        '<div class="col-6"><b>Description</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#field_name').select2({
                width: '100%',
                placeholder: 'Choose Field Name',
                allowClear: true,
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
                    url: "{{ url('/field_name_salary_component/api') }}",
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
                                    text: item.description,
                                    id: item.fieldName,
                                    title: item.description,
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

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function load_table_payroll_calculation_detail() {
            table = $('#payroll_calculation_detail_table').DataTable({
                processing: true,
                // orderCellsTop: true,
                data: arrayPayrollCalculation,

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
                            return '<input type="hidden" class="form-control" name="no[]" value="' +
                            meta.row +'">' + (meta.row + 1);
                        }
                    },
                    {
                        data: 'condition',
                        name: 'condition',
                        render: function (data, type, row) {
                            return '<textarea class="form-control" name="condition[]" style="display:none;">' + data + '</textarea>' + data;
                        }
                    },
                    {
                        data: 'formula',
                        name: 'formula',
                        render: function (data, type, row) {
                            return '<textarea class="form-control" name="formula[]" style="display:none;">' + data + '</textarea>' + data;
                        }
                    },
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#payroll_calculation_detail_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#payroll_calculation_detail_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });


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

        $("#btn-save-detail").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            var func_detail = $('#func_detail').val();

            if(func_detail == "new"){
                arrayPayrollCalculation.push({
                    "seqNo": $("#no").val() ? $("#no").val() : "",
                    "condition": $("#preview_condition").val(),
                    "formula": $("#preview_formula").val()
                });
            }else{
                var data = table.rows('.selected').data().toArray();
                for (var i = 0; i < data.length; i++) {
                    var index = arrayPayrollCalculation.findIndex(x => x.seqNo == data[i].seqNo);
                    arrayPayrollCalculation[index] = {
                        "seqNo": $("#no").val() ? $("#no").val() : "",
                        "condition": $("#preview_condition").val(),
                        "formula": $("#preview_formula").val()
                    };
                }
            }

            $(this).prop("disabled", false);
            $(this).html(
                '<i class="fa fa-floppy-o"></i> {{ __("payroll_calculation.btn_save") }}'
            );
            $('#modal_add_edit_payroll_calculation').modal('hide');
            
            $('#payroll_calculation_detail_table').DataTable().destroy();
            load_table_payroll_calculation_detail();
        });

        $("#btn-remove").on('click', function() {
            var data = table.rows('.selected').data().toArray();
            if(data.length > 0){
                for (var i = 0; i < data.length; i++) {
                    var index = arrayPayrollCalculation.findIndex(x => x.seqNo == data[i].seqNo);
                    arrayPayrollCalculation.splice(index, 1);
                }
                $('#payroll_calculation_detail_table').DataTable().destroy();
                load_table_payroll_calculation_detail();
            }else{
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $('#modal_add_edit_payroll_calculation').on('show.bs.modal', function () {
            if (func == 'new') {
                var count = table.rows().count();
                $('#no').val(count+1);
            }
            else {
                if(arrData2 != null){
                    $.ajax({
                        url: "{{ url('payroll/payroll_calculation_number/check') }}",
                        type: "GET",
                        data: {
                            'url': '/payroll/getPrCalculationDetail',
                            'seqNo': arrData2[0].seqNo
                        },
                        success: function (response) {
                            $('#no').val(response);
                            // console.log(table.rows().count());
                            // var count = (table.rows().count())+1;
                            // if (response > 0 && count !== response) {
                            //     var total = parseInt(response) + parseInt(count);
                            //     $('#no').val(total - 1);
                            // }
                            // else if (response > 0 && count == response) {
                            //     $('#no').val(response);
                            // }
                            // else {
                            //     for (var i = 0; i <= count; i++){
                            //         $('#no').val(i);
                            //     }
                            // }
                        },
                        error: function (response) {
                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }else{
                    var count = table.rows().count();
                    $('#no').val(count+1);
                }
            }
        });

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            $("#payroll_calculation_detail_form").submit();
        });

        if ($("#payroll_calculation_detail_form").length > 0) {
            $("#payroll_calculation_detail_form").validate({
            rules: {
                    field_name: {
                        required: true,
                    },
                    sequence: {
                        required: true,
                    },
                },
                messages: {
                    field_name: {
                        required: "{{ __('payroll_calculation.field_mandatory') }}",
                    },
                    sequence: {
                        required: "{{ __('payroll_calculation.field_mandatory') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("payroll_calculation.btn_save") }}'
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
                        url: "{{ url('payroll/payroll_calculation/proses') }}",
                        type: "POST",
                        data: $('#payroll_calculation_detail_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_calculation.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/payroll_calculation') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_calculation.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("payroll_calculation.btn_save") }}'
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