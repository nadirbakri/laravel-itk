<!DOCTYPE html>
<html>

<head>
    <title>{{ __('payroll_multi_cost_center.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
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

    </style>
</head>

<body>
    <div class="div-payroll">
        <div class="div-title">
            <a href="{{ url('payroll/multi_cost_center') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('payroll_multi_cost_center.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="multi_cost_center_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_no">{{ __('payroll_multi_cost_center.label_employee_no') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="employee_no" name="employee_no"></select>
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                        <input type="hidden" class="form-control" id="employee_no_det" name="employee_no_det">
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_name">{{ __('payroll_multi_cost_center.label_employee_name') }}</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name"
                                placeholder="{{ __('payroll_multi_cost_center.label_employee_name') }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="month_year">{{ __('payroll_multi_cost_center.label_month_year') }}</label>
                            <span class="required">*</span>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="month_year" name="month_year"
                                    placeholder="{{ __('payroll_multi_cost_center.label_month_year') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="month_year_calender"><span class="fa fa-calendar"></span></span>
                                </div>
                                <input type="text" class="form-control" id="month_year_hidden" name="month_year_hidden" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="period">{{ __('payroll_multi_cost_center.label_period') }}</label>
                            <span class="required">*</span>
                            <input type="number" min=0 class="form-control" id="period" name="period"
                                placeholder="{{ __('payroll_multi_cost_center.label_period') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <table id="cost_center_table" class="table hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th width="25%">{{ __('payroll_multi_cost_center.label_cost_center') }}</th>
                                    <th width="40%">{{ __('payroll_multi_cost_center.label_description') }}</th>
                                    <th>{{ __('payroll_multi_cost_center.label_percentage') }}</th>
                                    <th>{{ __('payroll_multi_cost_center.label_isdefault') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-add-cost"
                            id="btn-add-cost" style="width: 100%;">
                            <i class="fa fa-plus"></i> {{ __('payroll_multi_cost_center.btn_add') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-danger" name="btn-remove-cost"
                            id="btn-remove-cost" style="width: 100%;">
                            <i class="fa fa-times"></i> {{ __('payroll_multi_cost_center.btn_remove') }}
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('payroll_multi_cost_center.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-primary" href="{{ url('payroll/multi_cost_center') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('payroll_multi_cost_center.btn_cancel') }}
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
                        <span class="title-text-notification">{{ __('payroll_multi_cost_center.alert_success') }}</span>
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
        let pickerMonthYear = $('#month_year').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            plugins: [
                new monthSelectPlugin({
                    shorthand: true, //defaults to false
                    dateFormat: "Y-m-01", //defaults to "F Y"
                    altFormat: "F Y", //defaults to "F Y"
                })
            ],
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#month_year_hidden").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var func = "{{ $func }}";
        var arrData = @json($data);
        var arrData2 = @json($data_det);
        var table = null;
        var data_cost_center = 0;

        if (func == 'new') {
            $('#record_function').val("New");
            $('#employee_no').val(null).trigger('change');
            $('#period').val('1');
            $('#cost_center_table').DataTable().destroy();
            load_table_cost_center();
        }
        else if (func == 'edit') {
            $('#record_function').val("Edit");
            $('#employee_no').prop('disabled', true);
            $('#period').prop('readonly', true);
            $('#month_year').prop('readonly', true);
            $('#period').val(((typeof arrData[0].statusPeriod !== 'undefined') ? arrData[0].statusPeriod : ''));
            $('#cost_center_table').DataTable().destroy();
            load_table_cost_center();
            for (var i = 0; i < arrData2.length; i++){
                data_cost_center++;

                table.row.add([
                    '<input type="checkbox" class="chk-select" id="check_grid">',
                    '<select class="form-control select2 cost_center" id="cost_center'+(data_cost_center)+'" name="cost_center[]">',
                    '<input type="text" class="form-control description" id="description'+(data_cost_center)+'" name="description[]" readonly>',
                    '<input type="number" min=0 max=100 default=0 class="form-control" id="percentage'+(data_cost_center)+'" name="percentage[]">',
                    '<input type="checkbox" class="dt-center isDefault" id="isDefault'+(data_cost_center)+'" name="isDefault[]">'
                ]).draw();

                if ((typeof arrData2[i].isDefault !== 'undefined' || arrData2[i].isDefault !== null) && arrData2[i].isDefault == 'true') {
                    $('.isDefault').prop('checked', true);
                }
                else {
                    $('.isDefault').prop('checked', false);
                }

                loadDataDetailCostCenter("#cost_center"+(data_cost_center), "#description"+(data_cost_center), ((typeof arrData2[i].costCenterCode !== 'undefined') ? arrData2[i].costCenterCode : ''));

                loadDataCostCenterCode("#cost_center"+(data_cost_center));

                $('#percentage'+data_cost_center).val((typeof arrData2[i].percentage !== 'undefined' || arrData2[i].percentage !== null) ? arrData2[i].percentage : '');

                $('#cost_center'+(data_cost_center)).on("select2:select", function (e) {
                    var data = $('#cost_center'+data_cost_center).select2('data');
                    $('#description'+(data_cost_center)).val(htmlDecode(data[0].title));
                });

                $('#cost_center'+(data_cost_center)).on("select2:unselecting", function (e) {
                    $('#description'+(data_cost_center)).val('');
                });
            }

            $.ajax({
                type: 'GET',
                url: '/employee_no/req_detail/api',
                data: {
                    'employeeNo': ((typeof arrData[0].employeeNo !== 'undefined') ? arrData[0].employeeNo : '')
                }
            }).then(function (data) {
                $("#employee_no_det").val(data.employeeNo);
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

            var month_year = moment(arrData[0].periodYear.toString() + "-" + arrData[0].periodMonth.toString().padStart(2,0) + "-01").format('YYYY-MM-DD');
            let pickerMonthYear = $('#month_year').flatpickr({
                altInput: true,
                allowInput: true,
                altFormat: "j-M-y",
                dateFormat: "Y-m-d",
                defaultDate: "today",
                plugins: [
                    new monthSelectPlugin({
                        shorthand: true, //defaults to false
                        dateFormat: "Y-m-01", //defaults to "F Y"
                        altFormat: "F Y", //defaults to "F Y"
                    })
                ],
                onReady: function () {
                    var flatPickrInstance = this;
                    var $flatPickrInput = $(flatPickrInstance.element);
                    $flatPickrInput.siblings("#month_year_calendar").click(function () {
                        flatPickrInstance.toggle();
                    });
                }
            });
            pickerMonthYear._input.setAttribute("disabled", "disabled");
            pickerMonthYear.setDate(month_year);
        }

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        $('#employee_no').on("select2:select", function (e) {
            var data = $('#employee_no').select2('data');
            $('#employee_no_det').val(data[0].id);
            $('#employee_name').val(htmlDecode(data[0].title));
        });

        $('#employee_no').on("select2:unselecting", function (e) {
            $('#employee_no_det').val('');
            $('#employee_name').val('');
        });

        loadDataEmployeeNo();

        function loadDataEmployeeNo() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Employee No</b></div>' +
                        '<div class="col-6"><b>Full Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.employeeNo + '</div>' +
                        '<div class="col-6">' + data.data.fullName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#employee_no').select2({
                width: '100%',
                placeholder: 'Choose Employee',
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

        function loadDataDetailCostCenter(field = '', field2 = '', costCenterCode = '') {
            $.ajax({
                type: 'GET',
                url: '/cost_center/func/api',
                data: {
                    'costCenterCode': costCenterCode
                }
            }).then(function (data) {
                var option = $('<option/>', {
                    id: data[0].costCenterCode,
                    title: data[0].costCenterDescription,
                    text: data[0].costCenterCode
                });
                $(field).append(option).attr('data-alias', 'yourvalue').trigger(
                    'change');
                $(field2).val(data[0].costCenterDescription);
                $(field).trigger({
                    type: 'select2:select',
                    params: {
                        id: data[0].costCenterCode,
                        text: data[0].costCenterCode,
                        data: data[0]
                    } 
                });
            });
        }

        function loadDataCostCenterCode(field = ''){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Cost Center Code</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.costCenterCode + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Cost Center Code',
                allowClear: true,
                // multiple: true,
                // tags: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: '/cost_center/api',
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
                                    text: item.costCenterCode,
                                    id: item.costCenterCode,
                                    title: item.costCenterDescription,
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

        function load_table_cost_center() {
            table = $('#cost_center_table').DataTable({
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
                "columnDefs": [
                    {
                        "className": "dt-center",
                        "targets": "_all"
                    }
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#btn-add-cost').on('click', function () {
            data_cost_center++;

            table.row.add([
                '<input type="checkbox" class="chk-select" id="check_grid">',
                '<select class="form-control select2 cost_center" id="cost_center'+(data_cost_center)+'" name="cost_center[]">',
                '<input type="text" class="form-control description" id="description'+(data_cost_center)+'" name="description[]" readonly>',
                '<input type="number" min=0 max=100 default=0 class="form-control" name="percentage[]">',
                '<input type="checkbox" class="dt-center isDefault" id="isDefault'+(data_cost_center)+'" name="isDefault[]">'
            ]).draw();

            loadDataCostCenterCode("#cost_center"+(data_cost_center));
            
            $('#cost_center'+(data_cost_center)).on("select2:select", function (e) {
                var data = $('#cost_center'+data_cost_center).select2('data');
                $('#description'+(data_cost_center )).val(htmlDecode(data[0].title));
            });

            $('#cost_center'+(data_cost_center)).on("select2:unselecting", function (e) {
                $('#description'+(data_cost_center)).val('');
            });
        });

        $('.isDefault').on('change', function() {
            $('.isDefault').not(this).prop('checked', false);
        });

        $('#btn-remove-cost').on("click", function () {
            table.rows('.selected').remove().draw();
        });

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('payroll/multi_cost_center') }}";
        });

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#multi_cost_center_form").submit();
        });

        if ($("#multi_cost_center_form").length > 0) {
            $("#multi_cost_center_form").validate({
                rules: {
                    employee_no: {
                        required: true,
                    },
                    month_year: {
                        required: true,
                    },
                    period: {
                        required: true,
                    },
                },
                messages: {
                    employee_no: {
                        required: "{{ __('payroll_multi_cost_center.field_mandatory') }}",
                    },
                    month_year: {
                        required: "{{ __('payroll_multi_cost_center.field_mandatory') }}",
                    },
                    period: {
                        required: "{{ __('payroll_multi_cost_center.field_mandatory') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("payroll_multi_cost_center.btn_save") }}'
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
                        url: "{{ url('payroll/multi_cost_center/proses') }}",
                        type: "POST",
                        data: $('#multi_cost_center_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_multi_cost_center.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/multi_cost_center') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_multi_cost_center.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("payroll_multi_cost_center.btn_save") }}'
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