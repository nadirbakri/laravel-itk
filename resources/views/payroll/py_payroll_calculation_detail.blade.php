<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_payroll_calculation.judul') }}</title>
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
    </style>
</head>

<body>
    <div class="div-form">
        <form id="payroll_payroll_calculation_detail_form" method="post">
            @csrf
            <div class="div-payroll">
                <div class="div-title">
                    <a href="{{ url('payroll/payroll_calculation') }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('payroll_payroll_calculation.list_detail') }}</span>
                    </a>
                </div>
                <div class="div-form">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="field_name">{{ __('payroll_payroll_calculation.label_field_name') }}</label>
                                <select class="form-control select2" id="field_name" name="field_name"></select>
                            </div>
                            <input type="text" class="form-control" id="record_function" name="record_function" hidden>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="sequence">{{ __('payroll_payroll_calculation.label_sequence') }}</label>
                                <input type="text" class="form-control" name="sequence" id="sequence">
                            </div>
                        </div>
                    </div>
                    <div class="div-table">
                        <table id="payroll_calculation_detail_table" class="table hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>{{ __('payroll_payroll_calculation.label_no') }}</th>
                                    <th>{{ __('payroll_payroll_calculation.label_condition') }}</th>
                                    <th>{{ __('payroll_payroll_calculation.label_formula') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <button type="button" class="btn btn-primary" name="btn-add" id="btn-add"
                                style="width: 100%;" data-toggle="modal" data-target="#modal_add_edit_payroll_payroll_calculation">
                                <i class="fa fa-plus"></i> {{ __('payroll_payroll_calculation.btn_add') }}
                            </button>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-primary" name="btn-edit" id="btn-edit"
                                style="width: 100%;">
                                <i class="fa fa-pencil"></i> {{ __('payroll_payroll_calculation.btn_edit') }}
                            </button>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-danger" name="btn-remove" id="btn-remove"
                                    style="width: 100%;">
                                <i class="fa fa-times"></i> {{ __('payroll_payroll_calculation.btn_remove') }}
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                                style="width: 100%;">
                                <i class="fa fa-floppy-o"></i> {{ __('payroll_payroll_calculation.btn_save') }}
                            </button>
                        </div>
                        <div class="col-3">
                            <a class="btn btn-primary" href="{{ url('payroll/report_format') }}" target="iframe_dashboard"
                                name="btn-cancel" id="btn-cancel" style="width: 100%;">
                                <i class="fa fa-times-circle"></i> {{ __('payroll_payroll_calculation.btn_cancel') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal_add_edit_payroll_payroll_calculation" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ __('payroll_payroll_calculation.list') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="no">{{ __('payroll_payroll_calculation.label_no') }}</label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" id="no" name="no"
                                            placeholder="{{ __('payroll_payroll_calculation.label_no') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label
                                            for="table_chooser">{{ __('payroll_payroll_calculation.label_table_chooser') }}</label>
                                        <span class="required">*</span>
                                        <select class="form-control select2" id="table_chooser" name="table_chooser">
                                            <option value="" disabled selected>{{ __('payroll_payroll_calculation.label_select_table_chooser') }}</option>
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
                                            for="field_chooser">{{ __('payroll_payroll_calculation.label_field_chooser') }}</label>
                                        <span class="required">*</span>
                                        <select class="form-control select2" id="field_chooser" name="field_chooser"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <button type="button" class="btn btn-process" name="btn-add-to-formula" id="btn-add-to-formula">
                                        {{ __('payroll_payroll_calculation.btn_add_to_formula') }}
                                    </button>
                                </div>
                                <div class="col-3"></div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="preview_formula">{{ __('payroll_payroll_calculation.label_preview_formula') }}</label>
                                        <textarea class="form-control" id="preview_formula" name="preview_formula" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <button type="button" class="btn btn-process" name="btn-add-to-condition" id="btn-add-to-condition">
                                        {{ __('payroll_payroll_calculation.btn_add_to_condition') }}
                                    </button>
                                </div>
                                <div class="col-3"></div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="preview_condition">{{ __('payroll_payroll_calculation.label_preview_condition') }}</label>
                                        <textarea class="form-control" id="preview_condition" name="preview_condition" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" id="btn-save" class="btn btn-primary w-25"><i 
                                    class="fa fa-floppy-o"></i> {{ __('payroll_payroll_calculation.btn_save') }}</button>
                                <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                                    class="fa fa-times-circle"></i> {{ __('payroll_payroll_calculation.btn_cancel') }}</button>
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
                        <span class="title-text-notification">{{ __('payroll_payroll_calculation.alert_success') }}</span>
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
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var arrData = @json($data);
        var table = null;
        var tableChooser = null;
        var fieldChooser = null;
        var arrayTHRFormulaDetail = null;

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
            $('#sequence').val('');
            $('#payroll_calculation_detail_table').DataTable().destroy();
            load_table_payroll_calculation_detail();

        }

        else {
            $('#record_function').val('Edit');
            $('#bonus_date').prop('readonly', true);
            pickerBonusDate._input.setAttribute("disabled", "disabled");

            pickerBonusDate.setDate(((typeof arrData[0].bonusDate !== 'undefined') ? arrData[0].bonusDate : ''));
        }

        $('#btn-add').on('click', function () {
            $('#record_function').val('New');
            $('#no').val('');
            $('#table_chooser').val(null).trigger('change');
            $('#field_chooser').val(null).trigger('change');
            $('#preview_formula').val('');
            $('#preview_condition').val('');

            $('#table_chooser').on('change', function () {
                tableChooser = $('#table_chooser').val();
                loadDataFieldChooser();
            });

            $('#field_chooser').on('change', function () {
                fieldChooser = $('#field_chooser').val();
            });

            $('#btn-add-to-formula').on('click', function () {
                $('#preview_formula').val(tableChooser + "." + fieldChooser);
            });

            $('#btn-add-to-condition').on('click', function () {
                $('#preview_condition').val(tableChooser + "." + fieldChooser);
            })
        });

        $("#btn-edit").on('click', function() {
            var data = table.rows('.selected').data();
            
            if(data.count() > 0){
                $('#modal_add_edit_payroll_calculation').modal('show');
                
                $('#record_function').val('Edit');
                $('#no').val((data[0].seqNo !== null) ? data[0].seqNo : '');
                $('#preview_formula').val((data[0].formula !== null) ? data[0].formula : '');
                $('#preview_condition').val((data[0].condition !== null) ? data[0].condition : '');

                $('#table_chooser').on('change', function () {
                    tableChooser = $('#table_chooser').val();
                    loadDataFieldChooser();
                });

                $('#field_chooser').on('change', function () {
                    fieldChooser = $('#field_chooser').val();
                });

                $('#btn-add-to-formula').on('click', function () {
                    $('#preview_formula').val(tableChooser + "." + fieldChooser);
                });

                $('#btn-add-to-condition').on('click', function () {
                    $('#preview_condition').val(tableChooser + "." + fieldChooser);
                })
            }else{
                $('#modal_add_edit_payroll_calculation').modal('hide');
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $('#payroll_calculation_detail_table tbody').on('click', 'tr td:not(:first-child)', function () {
            var data = table.row(this).data();
            console.log(data);
        });

        load_table_payroll_calculation_detail();

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function load_table_payroll_calculation_detail() {
            table = $('#payroll_calculation_detail_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: 
                    {
                        url : "{{ url('payroll/payroll_calculation_detail/table') }}",
                        data: {
                            'religionCode' : $('#religion_code').val()
                        }
                    },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
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
                    {data: 'no', name: 'no'},
                    {data: 'condition', name: 'condition'},
                    {data: 'formula', name: 'formula'},
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }
            });
        }

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
                    url: '/field/api',
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: {
                        'tableName' : tableChooser
                    }, function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
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
                            $('#payroll_calculation_detail_table').DataTable().destroy();
                            load_data_table_payroll_calculation_detail();
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
                    table_chooser: {
                        required: true,
                    },
                    field_chooser: {
                        required: true,
                    }
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
                    table_chooser: {
                        required: "{{ __('payroll_thr_formula.field_mandatory') }}",
                    },
                    field_chooser: {
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
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/thr_formula') }}";
                                }, 3000);
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

                            $('#notification').modal('show');
                            $('#message-notification').html(response);
                        }

                    });
                }
            })
        }
    })
</script>

</html>