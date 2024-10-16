<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_custom_report_employee.judul') }}</title>
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
    <link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-personel {
            max-width: 100%;
            margin: auto;
            /*margin-top: 1%;*/
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

        .select2-results__option[aria-selected=true] {
            display: none;
        }

    </style>
</head>

<body>
    <div class="div-personel">
        <div class="div-title">
            <a href="{{ route('personnel', ['moduleID' => 'PE']) }}" target="iframe_dashboard" id="toolbar-prev-page">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('personel_custom_report_employee.list') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="custom_report_employee_form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="employee_no_from">{{ __('personel_custom_report_employee.label_employee_no_from') }}</label>
                            <select class="form-control select2" id="employee_no_from" name="employee_no_from"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_no_to">{{ __('personel_custom_report_employee.label_employee_no_to') }}</label>
                            <select class="form-control select2" id="employee_no_to" name="employee_no_to"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employment_status">{{ __('personel_custom_report_employee.label_employment_status') }}</label>
                            <select class="form-control select2 select2-hidden-accessible" id="employment_status" 
                                name="employment_status[]" multiple="multiple">
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="include_resign">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="include_resign"
                                    name="include_resign" value="true">
                                <label class="form-check-label"
                                    for="include_resign">{{ __('personel_custom_report_employee.label_include_resign') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="group_authorize_from">{{ __('personel_custom_report_employee.label_group_authorize_from') }}</label>
                            <select class="form-control select2" id="group_authorize_from"
                                name="group_authorize_from"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="group_authorize_to">{{ __('personel_custom_report_employee.label_group_authorize_to') }}</label>
                            <select class="form-control select2" id="group_authorize_to"
                                name="group_authorize_to"></select>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="div-table">
                        <table id="custom_report_employee_table" class="table hover">
                            <thead>
                                  <tr>
                                    <th></th>
                                    <th>Field Name</th>
                                    <th>Column Header</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <button type="submit" class="btn btn-primary" name="btn-add-field" id="btn-add-field"
                style="width: 100%;" data-toggle="modal" data-target="#modal_add_field_name">
                <i class="fa fa-plus"></i> {{ __('personel_custom_report_employee.btn_add') }}
            </button>
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-danger" name="btn-remove-data" id="btn-remove-data"
                style="width: 100%;">
                <i class="fa fa-times"></i> {{ __('personel_custom_report_employee.btn_remove') }}
            </button>
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-primary" name="btn-print-data" id="btn-print-data"
                style="width: 100%;">
                    <i class="fa fa-print"></i> {{ __('personel_custom_report_employee.btn_print') }}
            </button>
        </div>
    </div>
    <div class="modal fade" id="modal_add_field_name"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_custom_report_employee.title_modal_field_name') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="field_name_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label
                                            for="field_name">{{ __('personel_custom_report_employee.label_field_name') }}</label>
                                        <select class="form-control select2" id="field_name" name="field_name"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="column_header">{{ __('personel_custom_report_employee.label_column_header') }}</label>
                                    <input type="text" class="form-control" id="column_header"
                                        name="column_header">
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" id="btn-save-employment-data" class="btn btn-primary w-25"><i class="fa fa-floppy-o"></i> {{ __('personel_custom_report_employee.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_custom_report_employee.btn_cancel') }}</button>
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
        var table = null;
        var arrayfieldName = [];

        load_table_custom_report();

        function load_table_custom_report() {
            table = $('#custom_report_employee_table').DataTable( {
                processing: true,
                data: arrayfieldName,

                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [
                    [1, "asc"]
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
                        data: 'fieldName',
                        name: 'fieldName'
                    },
                    {
                        data: 'columnHeader',
                        name: 'columnHeader'
                    }],
                    select: {
                        style: 'multi',
                        selector: 'td:first-child'
                    }
            });
        }

        $('#custom_report_employee_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#custom_report_employee_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        loadDataEmployeeNo('#employee_no_from');
        loadDataEmployeeNo('#employee_no_to');
        loadDataGroupAuthorize('#group_authorize_from');
        loadDataGroupAuthorize('#group_authorize_to');
        loadDataEmploymentStatus();

        loadDataFirstLastAllEmployeeNo('#employee_no_from', 'First');
        loadDataFirstLastAllEmployeeNo('#employee_no_to', 'Last');
        loadDataFirstLastAllGroupAuthorize('#group_authorize_from', 'First');
        loadDataFirstLastAllGroupAuthorize('#group_authorize_to', 'Last');
        loadDataFirstLastAllEmploymentStatus();

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

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function loadDataFirstLastAllEmployeeNo(field = '', func = '') {
            $.ajax({
                type: 'GET',
                url: "{{ url('/employee_no/func/api') }}",
                data: {
                    'func': func
                }
            }).then(function (data) {
                var $newOption = $("<option selected='selected'></option>").val(data.employeeNo).text(
                    data.fullName);
                $(field).append($newOption).trigger('change');
            });
        }

        function loadDataFirstLastAllGroupAuthorize(field = '', func = '') {
            $.ajax({
                type: 'GET',
                url: "{{ url('/group_authorize/func/api') }}",
                data: {
                    'func': func,
                    'module': 'PE'
                }
            }).then(function (data) {
                var $newOption = $("<option selected='selected'></option>").val(data.groupAuthorizeCode)
                    .text(data.groupAuthorizeDesc);
                $(field).append($newOption).trigger('change');
            });
        }

        function loadDataEmployeeNo(field = '') {
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
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Employee No</b></div>' +
                        '<div class="col-6"><b>Full Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $employeeNo = $(field).select2({
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
                                    text: item.fullName,
                                    id: item.employeeNo,
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

        function loadDataFirstLastAllEmploymentStatus () {
            $('#employment_status').addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/employment_status/func/api') }}",
            }).then(function (data) {
                if (!$('#employment_status').find('option:contains(' + data.value + ')').length) {
                    $('#employment_status').append($('<option>').val(data.comGenCode).text(data.value));
                }
                $('#employment_status').val(data.comGenCode);
                $('#employment_status').removeClass('loading');
            });
        }

        function loadDataGroupAuthorize(field = '') {
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
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Group Authorize Code</b></div>' +
                        '<div class="col-6"><b>Group Authorize Desc</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Group Authorize',
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
                    url: "{{ url('/group_authorize/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term,
                            module: 'PE',
                            isRange: false
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

        function loadDataEmploymentStatus(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.comGenCode + '<div>' +
                        '<div class="col-6">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#employment_status').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Code</b></div>' +
                        '<div class="col-6"><b>Value</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#employment_status').select2({
                width: '100%',
                placeholder: 'Choose Employment Status',
                allowClear: true,
                multiple: true,
                tags: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/employment_status/all/api') }}",
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
                                    text: item.value,
                                    id: item.comGenCode,
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

        $("#btn-add-field").on('click', function () {
            loadDataFieldName();
        });

        function loadDataFieldName() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-12">' + data.text + '</div>' +
                        '</div>');

                    return $result2;
                }
                
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#field_name').select2({
                width: '100%',
                placeholder: 'Choose Field',
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
                    url: "{{ url('/field_name/api') }}",
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

        // var_dump(loadDataFieldName());

        $("#btn-print-data").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#custom_report_employee_form").submit();
        });

        $("#btn-remove-data").on('click', function() {
            var data = table.rows('.selected').data().toArray();
            if(data.length > 0){
                for (var i = 0; i < data.length; i++) {
                    var index = arrayfieldName.findIndex(x => x.fieldName === data[i].fieldName);
                    // console.log(index);
                    arrayfieldName.splice(index, 1);
                }
                $('#custom_report_employee_table').DataTable().destroy();
                load_table_custom_report();
                //console.log(arrayfieldName);
            }else{
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $("#btn-save-employment-data").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            // var arraypush = [];
            // arraypush["fieldName"] = $("#field_name").val();
            // arraypush["columnHeader"] = $("#column_header").val();
            arrayfieldName.push({
                "fieldName": $("#field_name").val(),
                "columnHeader": $("#column_header").val()
            });

            $("#field_name").val("");
            $("#column_header").val("");
            // console.log(arrayfieldName);

            $(this).prop("disabled", false);
            $(this).html(
                '<i class="fa fa-floppy-o"></i> {{ __("personel_custom_report_employee.btn_save") }}'
            );
            $('#modal_add_field_name').modal('hide');
            
            $('#custom_report_employee_table').DataTable().destroy();
            load_table_custom_report();
            //$("#field_name_form").submit();
        });

        if ($("#custom_report_employee_form").length > 0) {
            $("#custom_report_employee_form").validate({
                rules: {
                    employee_no_from: {
                        required: true,
                    },
                    employee_no_to: {
                        required: true,
                    },
                    group_authorize_from: {
                        required: true,
                    },
                    group_authorize_to: {
                        required: true,
                    },
                },
                messages: {
                    employee_no_from: {
                        required: "{{ __('personel_employee_list.field_required') }}",
                    },
                    employee_no_to: {
                        required: "{{ __('personel_employee_list.field_required') }}",
                    },
                    group_authorize_from: {
                        required: "{{ __('personel_employee_list.field_required') }}",
                    },
                    group_authorize_to: {
                        required: "{{ __('personel_employee_list.field_required') }}",
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
                    $("#btn-print-data").prop("disabled", false);
                    $("#btn-print-data").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_employee_list.btn_print") }}'
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
                        xhrFields: {
                            responseType: 'blob',
                        },
                        url: "{{ url('personnel/custom_report_employee/print') }}",
                        type: "POST",
                        data: { 'field' : $('#custom_report_employee_form').serialize(), 'field_name' : JSON.stringify(arrayfieldName) },
                        success: function (result, status, xhr) {
                            $("#btn-print-data").prop("disabled", false);
                            $("#btn-print-data").html(
                                '<i class="fa fa-print"></i> {{ __("personel_custom_report_employee.btn_print") }}'
                            );
                            var disposition = xhr.getResponseHeader(
                                'content-disposition');
                            var matches = /"([^"]*)"/.exec(disposition);
                            var filename = (matches != null && matches[1] ? matches[1] :
                                'noname_file.xlsx');

                            // The actual download
                            var blob = new Blob([result], {
                                type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                            });
                            var link = document.createElement('a');
                            link.href = window.URL.createObjectURL(blob);
                            link.download = filename;

                            document.body.appendChild(link);

                            link.click();
                            document.body.removeChild(link);
                        },
                        error: function (response) {
                            $("#btn-print-data").prop("disabled", false);
                            $("#btn-print-data").html(
                                '<i class="fa fa-print"></i> {{ __("personel_custom_report_employee.btn_print") }}'
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