<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_tariff_master.judul') }}</title>
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
    </style>
</head>

<body>
    <div class="div-payroll">
        <div class="div-title">
            <a href="javascript:void(0);" onclick="goBackWithModuleID('{{ url()->previous() }}')" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('payroll_tariff_master.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="tarif_master_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_no">{{ __('payroll_tariff_master.label_employee_no') }}</label>
                            <select class="form-control select2" id="employee_no" name="employee_no" disabled></select>
                        </div>
                        <input type="text" class="form-control" id="employee_no_hidden" name="employee_no_hidden" hidden>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_name">{{ __('payroll_tariff_master.label_employee_name') }}</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name"
                                placeholder="{{ __('payroll_tariff_master.label_employee_name') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="month_year">{{ __('payroll_tariff_master.label_month_year') }}</label>
                            <input type="text" class="form-control" id="month_year" name="month_year"
                                placeholder="{{ __('payroll_tariff_master.label_month_year') }}" readonly>
                        </div>
                        <input type="text" class="form-control" id="month" name="month" hidden>
                        <input type="text" class="form-control" id="year" name="year" hidden>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="period">{{ __('payroll_tariff_master.label_period') }}</label>
                            <input type="text" class="form-control" id="period" name="period"
                                placeholder="{{ __('payroll_tariff_master.label_period') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="div-table">
                    <table id="tariff_master_detail_table" class="table hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Field Name</th>
                                <th>Description</th>
                                <th>Fixed Component</th>
                                <th>Currency Code</th>
                                <th>Amount</th>
                                <th style="display: none;">Field Type</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('payroll_tariff_master.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" href="{{ url('payroll/tarif_master') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('payroll_tariff_master.btn_cancel') }}
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
                        <span class="title-text-notification">{{ __('payroll_tariff_master.alert_success') }}</span>
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

        var arrData = @json($data);
        var table = null;

        $.ajax({
            type: 'GET',
            url: "{{ url('/employee_no/req_detail/api') }}",
            data: {
                'employeeNo': ((typeof arrData[0].employeeNo !== 'undefined') ? arrData[0].employeeNo : '')
            }
        }).then(function (data) {
            var option = $('<option/>', {
                id: data.employeeNo,
                title: data.fullName,
                text: data.employeeNo
            });
            $("#employee_no").append(option).attr('data-alias', 'yourvalue').trigger(
                'change');
            $("#employee_no").trigger({
                type: 'select2:select',
                params: {
                    id: data.employeeNo,
                    text: data.employeeNo,
                    data: data
                }
            });
        });

        $('#employee_no_hidden').val((typeof arrData[0].employeeNo !== 'undefined') ? arrData[0].employeeNo : '');

        var month = (typeof arrData[0].periodMonth !== 'undefined') ? moment(arrData[0].periodMonth).format('MMMM') : '';
        var year = (typeof arrData[0].periodYear !== 'undefined') ? arrData[0].periodYear : '';

        $('#month_year').val(month + ' ' + year);
        $('#month').val((typeof arrData[0].periodMonth !== 'undefined') ? arrData[0].periodMonth : '');
        $('#year').val((typeof arrData[0].periodYear !== 'undefined') ? arrData[0].periodYear : '');
        $('#period').val((typeof arrData[0].statusPeriod !== 'undefined') ? arrData[0].statusPeriod : '');

        load_data_table_tariff_master_detail();
        if (typeof arrData[0].grid !== 'undefined') {
            $.each(arrData[0].grid, function(k, v) {
                table.row.add([
                    '<input type="text" class="form-control" name="field_name[]" id="field_name" value="'+ ((typeof v.fieldName !== 'undefined' && v.fieldName !== null) ? v.fieldName : '') +'" readonly>',
                    '<input type="text" class="form-control" name="description[]" id="description" value="'+ ((typeof v.description !== 'undefined' && v.description !== null) ? v.description : '') +'" readonly>',
                    '<input type="text" class="form-control" name="fixed_component[]" id="fixed_component" value="'+ ((typeof v.fieldType !== 'undefined' && v.fieldType !== null && v.fieldType !== 'T' || v.fieldType !== 'P') ? 'Yes' : 'No') +'" readonly>',
                    '<input type="text" class="form-control" name="currency_code[]" id="currency_code" value="'+ ((typeof v.currencyCode !== 'undefined' && v.currencyCode !== null) ? v.currencyCode : '') +'" readonly>',
                    '<input type="number" class="form-control" name="amount[]" id="amount" value="'+ ((typeof v.amount !== 'undefined' && v.amount !== null) ? v.amount : '') +'">',
                    '<input type="text" class="form-control" name="field_type[]" id="field_type" value="'+ ((typeof v.fieldType !== 'undefined' && v.fieldType !== null) ? v.fieldType : '') +'" hidden>',
                ]).draw();
            });
        }

        function htmlDecode(value) {
    	    return $("<textarea/>").html(value).text();
	    }

        $('#employee_no').on('select2:select', function (e) {
            var data = $('#employee_no').select2('data');
            $('#employee_name').val(htmlDecode(data[0].title));
        });

        $('#employee_no').on('select2:unselecting', function (e) {
            $('#employee_name').val('');
        });

        loadDataEmployeeNo();

        function load_data_table_tariff_master_detail() {
            table = $('#tariff_master_detail_table').DataTable({
                processing: true,
                orderCellsTop: true,
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
            });
        }

        function loadDataEmployeeNo() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
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
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#employee_no').select2({
                width: '100%',
                placeholder: 'Choose Employee',
                allowClear: true,
                language: {
                    errorLoading: function() {
                        return $search;
                    },
                    searching: function() {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/employee_no/api') }}",
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
                                    text: item.employeeNo,
                                    id: item.employeeNo,
                                    title: item.fullName,
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

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#tarif_master_form").submit();
        });

        if ($("#tarif_master_form").length > 0) {
            $("#tarif_master_form").validate({
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
                        '<i class="fa fa-floppy-o"></i> {{ __("payroll_tariff_master.btn_save") }}'
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
                        url: "{{ url('payroll/tariff_master/proses') }}",
                        type: "POST",
                        data: $('#tarif_master_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_tariff_master.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/tarif_master') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_tariff_master.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("payroll_tariff_master.btn_save") }}'
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