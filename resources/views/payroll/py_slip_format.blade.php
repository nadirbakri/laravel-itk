<!DOCTYPE html>
<html>

<head>
    <title>{{ __('payroll_slip_format.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.monthselect.css') }}">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-payroll {
            max-width: 100%;
            margin: auto;
            /*margin-top: 1%;*/
        }

        .col-0-5 {
            @extend .col;
            flex: 0 0 4.16666667%;
            max-width: 4.16666667%;
        }

        .col-1-5 {
            @extend .col;
            flex: 0 0 8.5%;
            max-width: 12.5%;
        }

        .no-border {
            border-width:0px; 
            border:none;
        }

        .loading {
            background-color: #ffffff;
            background-image: url("https://c.tenor.com/tEBoZu1ISJ8AAAAC/spinning-loading.gif");
            background-size: 60px 40px;
            background-position: right center;
            background-repeat: no-repeat;
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

    </style>
</head>

<body>
    <div class="div-payroll">
        <div class="div-title">
            <a href="{{ route('payroll', ['moduleID' => 'PY']) }}" target="iframe_dashboard" id="toolbar-prev-page">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('payroll_slip_format.list') }}</span>
            </a>
        </div>
        <div class="div-form">
        <form id="slip_format_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label
                                for="slip_type">{{ __('payroll_slip_format.label_slip_code') }}</label>
                                <select class="form-control select2" id="slip_code" name="slip_code">
                                <option value="" disabled selected>{{ __('payroll_slip_format.label_select_slip_code') }}</option>
                            </select>
                        </div>                        
                        <input type="text" class="form-control" id="slip_name" name="slip_name" hidden>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label
                                for="column_type">{{ __('payroll_slip_format.label_column_type') }}</label>
                                <select class="form-control select2" id="column_type" name="column_type">
                                <option value="" disabled selected>{{ __('payroll_slip_format.label_select_column_type') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="div-table">
                        <table id="payroll_slip_format_table" class="table hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>{{ __('payroll_slip_format.label_seq_no') }}</th>
                                    <th>{{ __('payroll_slip_format.label_field_name') }}</th>
                                    <th>{{ __('payroll_slip_format.label_label_name') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <button type="button" class="btn btn-primary" name="btn-add" id="btn-add"
                                style="width: 100%;" data-toggle="modal" data-target="#modal_add_edit_slip_format">
                                <i class="fa fa-plus"></i> {{ __('payroll_slip_format.btn_add') }}
                            </button>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-primary" name="btn-edit" id="btn-edit"
                                style="width: 100%;">
                                <i class="fa fa-pencil"></i> {{ __('payroll_slip_format.btn_edit') }}
                            </button>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-danger" name="btn-remove" id="btn-remove"
                                    style="width: 100%;">
                                <i class="fa fa-times"></i> {{ __('payroll_slip_format.btn_remove') }}
                            </button>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                                style="width: 100%;">
                                <i class="fa fa-floppy-o"></i> {{ __('payroll_slip_format.btn_save') }}
                            </button>
                        </div>
                        <div class="col-3">
                            <a class="btn btn-outline-primary" href="{{ url('payroll/slip_format') }}" target="iframe_dashboard"
                                name="btn-cancel" id="btn-cancel" style="width: 100%;">
                                <i class="fa fa-times-circle"></i> {{ __('payroll_slip_format.btn_cancel') }}
                            </a>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    <div class="div-form">
        <form id="slip_format_modal_form" method="post">
            @csrf
            <div class="modal fade" id="modal_add_edit_slip_format"  role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ __('payroll_slip_format.list') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="no">{{ __('payroll_slip_format.label_no') }}</label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" id="no" name="no"
                                            placeholder="{{ __('payroll_slip_format.label_no') }}">
                                    </div>
                                    <input type="hidden" class="form-control" id="func_detail" name="func_detail">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label
                                            for="field_chooser">{{ __('payroll_slip_format.label_field_chooser') }}</label>
                                        <span class="required">*</span>
                                        <select class="form-control select2" id="field_chooser" name="field_chooser"></select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label
                                            for="label_name">{{ __('payroll_slip_format.label_label_name') }}</label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" id="label_name" name="label_name"
                                            placeholder="{{ __('payroll_slip_format.label_label_name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" id="btn-save-detail" class="btn btn-primary w-25"><i 
                                    class="fa fa-floppy-o"></i> {{ __('payroll_slip_format.btn_save') }}</button>
                                <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                                    class="fa fa-times-circle"></i> {{ __('payroll_slip_format.btn_cancel') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="{{ asset('js/jquery.redirect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/flatpickr.monthselect.js') }}"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    function savePreviousURL() {
        if(!sessionStorage.getItem('previousURL')){
            const previousURL = document.referrer;
            sessionStorage.setItem('previousURL', previousURL);
        }
    }

    // Fungsi untuk menangani navigasi mundur
    function goBackWithModuleID() {
        let newURL = sessionStorage.getItem('previousURL');

        sessionStorage.removeItem('previousURL');

        window.location.href = newURL;
    }

    window.onload = function() {
        savePreviousURL();
    }
    
    $(document).ready(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var table = null;
        var arraySlipFormat = [];

        function isEmpty(obj) {
            return Object.keys(obj).length === 0;
        }

        $('#notification_success').on('hidden.bs.modal', function () {
            $('#notification_success').modal('hide');
        })

        loadDataSlipCode();
        loadDataColumnType();
        loadDataFieldChooser();

        function loadDataSlipCode() {
            var listSlipType = [
                {id:"SALARY_SLIP", text:"Salary"},
                {id:"THR_SLIP", text:"THR"},
                {id:"BONUS_SLIP", text:"Bonus"}
            ];

            $('#slip_code').select2({
                data : listSlipType,
                width : '100%',
                placeholder : "Choose Slip Code",
                allowClear : true
            });
        }

        function loadDataColumnType() {
            var listColumnType = [
                {id:"A", text:"Allowance"},
                {id:"B", text:"Benefit"},
                {id:"C", text:"Company"},
                {id:"D", text:"Deduction"},
            ];

            $('#column_type').select2({
                data : listColumnType,
                width : '100%',
                placeholder : "Choose Column Type",
                allowClear : true
            });
        }

        load_table_slip_format();

        function load_table_slip_format() {
            table = $('#payroll_slip_format_table').DataTable({
                processing: true,
                // orderCellsTop: true,
                data: arraySlipFormat,
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
                            (meta.row + 1) +'">' + (meta.row + 1);
                        }
                    },
                    {
                        data: 'columnName',
                        name: 'columnName',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="column_name[]" value="' + data + '">' + data;
                        }
                    },
                    {
                        data: 'header',
                        name: 'header',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="header[]" value="' + data + '">' + data;
                        }
                    },
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });

            $('#payroll_slip_format_table tbody').on('click', 'input[type="checkbox"]', function(e){
                var $row = $(this).closest('tr');

                if(this.checked){
                    $row.addClass('selected');
                } else {
                    $row.removeClass('selected');
                }

                // Prevent click event from propagating to parent
                e.stopPropagation();
            });

            $('#payroll_slip_format_table').on('click', 'tr td:first-child', function(e){
                $(this).parent().find('input[type="checkbox"]').trigger('click');
            });
        }

        $('#slip_code, #column_type').on("select2:select, change", function (e) {
            var data = $('#slip_code').select2('data');
            var data2 = $('#column_type').select2('data');

            arraySlipFormat = [];
            if(!jQuery.isEmptyObject(data[0].id) && !jQuery.isEmptyObject(data2[0].id)){
                $.ajax({
                    type: 'GET',
                    url: "{{ url('/payroll/slip_format/detail_data') }}",
                    data: {
                        'slipCode': data[0].id,
                        'columnType' : data2[0].id
                    }
                }).then(function (data) {
                    console.log(data);
                    $.each(data, function (k, v) {
                        arraySlipFormat.push({
                            "seqNo": ((typeof v.seqNo !== 'undefined') ? v.seqNo : ''),
                            "columnName": ((typeof v.columnName !== 'undefined') ? v.columnName : ''),
                            "header": ((typeof v.header !== 'undefined') ? v.header : '')
                        });
                    });

                    $('#payroll_slip_format_table').DataTable().destroy();
                    load_table_slip_format();
                });
            }
        });

        $('#btn-add').on('click', function () {
            $('#no').val(arraySlipFormat.length + 1);
            $('#func_detail').val('new');
            $('#field_chooser').val(null).trigger('change');
            $('#label_name').val('');
        });

        $("#btn-edit").on('click', function() {
            $('#field_chooser').val(null).trigger('change');
            var data = table.rows('.selected').data();
            if(data.count() > 0){
                $('#modal_add_edit_slip_format').modal('show');
                $('#func_detail').val('edit');
                $('#no').val((data[0].seqNo !== null) ? data[0].seqNo : '');
                $('#label_name').val((data[0].header !== null) ? data[0].header : '');
            }else{
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $("#btn-remove").on('click', function() {
            var data = table.rows('.selected').data().toArray();
            if(data.length > 0){
                for (var i = 0; i < data.length; i++) {
                    var index = arraySlipFormat.findIndex(x => x.seqNo == data[i].seqNo);
                    arraySlipFormat.splice(index, 1);
                }
                $('#payroll_slip_format_table').DataTable().destroy();
                load_table_slip_format();
            }else{
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $("#btn-save-detail").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            var func_detail = $('#func_detail').val();

            if(func_detail == "new"){
                arraySlipFormat.push({
                    "seqNo": $("#no").val() ? $("#no").val() : "",
                    "columnName": $("#field_chooser").val(),
                    "header": $("#label_name").val()
                });
            }else{
                var data = table.rows('.selected').data().toArray();
                for (var i = 0; i < data.length; i++) {
                    var index = arraySlipFormat.findIndex(x => x.seqNo == data[i].seqNo);
                    arraySlipFormat[index] = {
                        "seqNo": $("#no").val() ? $("#no").val() : "",
                        "columnName": $("#field_chooser").val(),
                        "header": $("#label_name").val()
                    };
                }
            }

            $(this).prop("disabled", false);
            $(this).html(
                '<i class="fa fa-floppy-o"></i> {{ __("payroll_slip_format.btn_save") }}'
            );
            $('#modal_add_edit_slip_format').modal('hide');
            
            $('#payroll_slip_format_table').DataTable().destroy();
            load_table_slip_format();
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
                    url: "{{ url('/field/slip/api') }}",
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

        $("#btn-save-custom").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#custom_form").submit();
        });

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            $("#slip_format_form").submit();
        });

        if ($("#slip_format_form").length > 0) {
            $("#slip_format_form").validate({
            rules: {
                    slip_code: {
                        required: true,
                    },
                    column_type: {
                        required: true,
                    },
                },
                messages: {
                    slip_code: {
                        required: "{{ __('payroll_calculation.field_mandatory') }}",
                    },
                    column_type: {
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
                        '<i class="fa fa-floppy-o"></i> {{ __("payroll_slip_format.btn_save") }}'
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

                    var data = table.$('input').serialize();
                    data += '&slip_code=' + $('#slip_code').val();
                    data += '&record_function=' + $('#record_function').val();
                    data += '&column_type=' + $('#column_type').val();

                    $.ajax({
                        url: "{{ url('payroll/slip_format/proses') }}",
                        type: "POST",
                        data: data,
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_slip_format.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/slip_format') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_slip_format.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("payroll_slip_format.btn_save") }}'
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
