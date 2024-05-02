<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_journal_template.judul') }}</title>
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
    <div class="div-payroll">
        <div class="div-title">
            <a href="javascript:void(0);" onclick="goBackWithModuleID('{{ url()->previous() }}')" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('payroll_journal_template.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="journal_template_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="journal_code">{{ __('payroll_journal_template.label_journal_code') }}</label>
                            <span class="required">*</span>
                            <input class="form-control" id="journal_code" name="journal_code" 
                            placeholder="{{ __('payroll_journal_template.label_journal_code') }}" disabled>
                        </div>
                        <input type="text" class="form-control" id="record_function" name="record_function" hidden>
                        <input type="text" class="form-control" id="journal_code_hidden" name="journal_code_hidden" hidden>
                        <input type="text" class="form-control" id="record_status" name="record_status" hidden>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="description">{{ __('payroll_journal_template.label_description') }}</label>
                            <input class="form-control" id="description" name="description"
                            placeholder="{{ __('payroll_journal_template.label_description') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="field_name">{{ __('payroll_journal_template.label_field_name') }}</label>
                            <span class="required">*</span>
                            <input class="form-control select2" id="field_name" name="field_name" 
                            placeholder="{{ __('payroll_journal_template.label_field_name') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="debit_kredit">{{ __('payroll_journal_template.label_debit_kredit') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="debit_kredit" name="debit_kredit">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="operator">{{ __('payroll_journal_template.label_operator') }}</label>
                            <select class="form-control select2" id="operator" name="operator"></select>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <br>
                            <button type="button" class="btn btn-primary" name="btn-add" id="btn-add">
                                {{ __('payroll_journal_template.btn_add') }}
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <br>
                        <button type="button" class="btn btn-primary" name="btn-plus" id="btn-plus">
                            +
                        </button>
                        <button type="button" class="btn btn-primary" name="btn-min" id="btn-min">
                            -
                        </button>
                    </div>    
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cost_center">{{ __('payroll_journal_template.label_cost_center') }}</label>
                            <select class="form-control select2" id="cost_center" name="cost_center"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cost_center_description">{{ __('payroll_journal_template.label_cost_center_desc') }}</label>
                            <input type="text" class="form-control" id="cost_center_description" name="cost_center_description"
                                placeholder="{{ __('payroll_journal_template.label_cost_center_desc') }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="account">{{ __('payroll_journal_template.label_account') }}</label>
                            <select class="form-control select2" id="account" name="account"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="account_description">{{ __('payroll_journal_template.label_account_desc') }}</label>
                            <input type="text" class="form-control" id="account_description" name="account_description"
                                placeholder="{{ __('payroll_journal_template.label_account_desc') }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="grouping_one">{{ __('payroll_journal_template.label_grouping_one') }}</label>
                            <input type="text" class="form-control" id="grouping_one" name="grouping_one"
                                placeholder="{{ __('payroll_journal_template.label_grouping_one') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="grouping_two">{{ __('payroll_journal_template.label_grouping_two') }}</label>
                            <input type="text" class="form-control" id="grouping_two" name="grouping_two"
                                placeholder="{{ __('payroll_journal_template.label_grouping_two') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('payroll_journal_template.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" href="{{ url('payroll/journal_template') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('payroll_journal_template.btn_cancel') }}
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
                        <span class="title-text-notification">{{ __('payroll_journal_template.alert_success') }}</span>
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
<script src="{{ asset('js/jquery.redirect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
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

        var func = '{{ $func }}';
        var arrData = @json($data);

        if (func == 'new') {
            $('#record_function').val('New');
            $('#record_status').val('A');
            $('#journal_code').prop('disabled', false);
            $('#journal_code').val('');
            $('#description').val('');
            $('#field_name').val('');
            $('#grouping_one').val('');
            $('#grouping_two').val('');
            $('#debit_kredit').val(null).trigger('change');
            $('#cost_center').val(null).trigger('change');
            $('#account').val(null).trigger('change');
        }
        else {
            $('#record_function').val('Edit');
            $('#record_status').val((typeof arrData[0].recordStatus !== 'undefined') ? arrData[0].recordStatus : '');
            $('#journal_code').prop('disabled', true);
            $('#journal_code').val((typeof arrData[0].journalCode !== 'undefined') ? arrData[0].journalCode : '');
            $('#description').val((typeof arrData[0].description !== 'undefined') ? arrData[0].description : '');
            $('#field_name').val((typeof arrData[0].fieldName !== 'undefined') ? arrData[0].fieldName : '');
            $('#grouping_one').val((typeof arrData[0].grouping1 !== 'undefined') ? arrData[0].grouping1 : '');
            $('#grouping_two').val((typeof arrData[0].grouping2 !== 'undefined') ? arrData[0].grouping2 : '');
            $('#debit_kredit').val((typeof arrData[0].debitKredit !== 'undefined') ? arrData[0].debitKredit : '').trigger('change');
            $('#journal_code_hidden').val((typeof arrData[0].journalCode !== 'undefined') ? arrData[0].journalCode : '');

            $.ajax({
                type: 'GET',
                url: "{{ url('/cost_center/func/api') }}",
                data: {
                    'costCenterCode': ((typeof arrData[0].costCenter !== 'undefined') ? arrData[0].costCenter : '')
                }
            }).then(function (data) {
                var option = $('<option/>', {
                    id: data[0].costCenterCode,
                    title: data[0].costCenterDescription,
                    text: data[0].costCenterCode
                });
                $("#cost_center").append(option).attr('data-alias', 'yourvalue').trigger(
                    'change');
                $("#cost_center").trigger({
                    type: 'select2:select',
                    params: {
                        id: data[0].costCenterCode,
                        text: data[0].costCenterCode,
                        data: data[0]
                    }
                });
            });
            
            $.ajax({
                type: 'GET',
                url: "{{ url('/account_edit/api') }}",
                data: {
                    'accountNo': ((typeof arrData[0].account !== 'undefined') ? arrData[0].account : '')
                }
            }).then(function (data) {
                var option = $('<option/>', {
                    id: data[0].accountNo,
                    title: data[0].accountDescription,
                    text: data[0].accountNo
                });
                $("#account").append(option).attr('data-alias', 'yourvalue').trigger(
                    'change');
                $("#account").trigger({
                    type: 'select2:select',
                    params: {
                        id: data[0].accountNo,
                        text: data[0].accountNo,
                        data: data[0]
                    }
                });
            });
        }

        $('#btn-add').on('click', function () {
            var operator = $('#operator').val();
            if (typeof operator !== 'undefined' && operator !== null) {
                $('#field_name').val($('#field_name').val() + operator);
            }
        });

        $('#btn-plus').on('click', function () {
            $('#field_name').val($('#field_name').val() + '+');
        });

        $('#btn-min').on('click', function () {
            $('#field_name').val($('#field_name').val() + '-');
        });

        loadDataDebitKredit();
        loadDataOperator();
        loadDataCostCenter();
        loadDataAccount();

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
        
        $('select').on('select2:opening select2:closing', function( event ) {
            var $searchfield = $( '#'+event.target.id ).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
        });

        function htmlDecode(value) {
    	    return $("<textarea/>").html(value).text();
	    }

        $('#cost_center').on('select2:select', function (e) {
            var data = $('#cost_center').select2('data');
            $('#cost_center_description').val(htmlDecode(data[0].title));
        });

        $('#cost_center').on('select2:unselecting', function (e) {
            $('#cost_center_description').val('');
        });

        $('#account').on('select2:select', function (e) {
            var data = $('#account').select2('data');
            $('#account_description').val(htmlDecode(data[0].title));
        });

        $('#account').on('select2:unselecting', function (e) {
            $('#account_description').val('');
        });

        function loadDataDebitKredit() {
            var listDebitKredit = [
                {id:"Debit", text:"Debit"},
                {id:"Kredit", text:"Kredit"}
            ];

            $('#debit_kredit').select2({
                data : listDebitKredit,
                width : '100%',
                placeholder : "Choose One",
                allowClear : true
            });
        }

        function loadDataOperator() {
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
            $('#operator').on('select2:open', function (e) {
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

            $('#operator').select2({
                width: '100%',
                placeholder: 'Choose Field Name',
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
                                    text: item.fieldName,
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

        function loadDataCostCenter(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-2">' + data.data.costCenterCode + '<div>' +
                        '<div class="col-10">' + data.data.costCenterDescription + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#cost_center').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Cost Center Code</b></div>' +
                        '<div class="col-6"><b>Cost Center Description</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#cost_center').select2({
                width: '100%',
                placeholder: 'Choose Cost Center Code',
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
                    url: "{{ url('/cost_center/api') }}",
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

        function loadDataAccount(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.accountNo + '<div>' +
                        '<div class="col-6">' + data.data.accountDescription + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#account').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Account No</b></div>' +
                        '<div class="col-6"><b>Account Description</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#account').select2({
                width: '100%',
                placeholder: 'Choose Account',
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
                    url: "{{ url('/account/api') }}",
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
                                    text: item.accountNo,
                                    id: item.accountNo,
                                    title: item.accountDescription,
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
            $("#journal_template_form").submit();
        });

        if ($("#journal_template_form").length > 0) {
            $("#journal_template_form").validate({
            rules: {
                    journal_code: {
                        required: true,
                    },
                    field_name: {
                        required: true,
                    },
                    debit_kredit: {
                        required: true,
                    },
                },
                messages: {
                    journal_code: {
                        required: "{{ __('payroll_journal_template.field_mandatory') }}",
                    },
                    field_name: {
                        required: "{{ __('payroll_journal_template.field_mandatory') }}",
                    },
                    debit_kredit: {
                        required: "{{ __('payroll_journal_template.field_mandatory') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("payroll_journal_template.btn_save") }}'
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
                        url: "{{ url('payroll/journal_template/proses') }}",
                        type: "POST",
                        data: $('#journal_template_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_journal_template.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/journal_template') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_journal_template.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("payroll_journal_template.btn_save") }}'
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