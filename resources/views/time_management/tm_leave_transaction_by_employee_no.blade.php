<!DOCTYPE html>
<html>

<head>
    <title>{{ __('tm_leave_transaction_by_employee_no.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.monthselect.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/time_management_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-time_management {
            max-width: 100%;
            margin: auto;
            /*margin-top: 1%;*/
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

        .select2-results__option[aria-selected=true] {
            display: none;
        }

    </style>
</head>

<body>
    <div class="div-time_management">
        <div class="div-title">
            <a href="{{ route('time_management', ['moduleID' => 'TM']) }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('tm_leave_transaction_by_employee_no.list') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="leave_transaction_by_employee_no_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="employee_no">{{ __('tm_leave_transaction_by_employee_no.label_employee_no') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="employee_no" name="employee_no"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_name">{{ __('tm_leave_transaction_by_employee_no.label_employee_name') }}</label>
                            <span class="required">*</span>
                            <input type="text" class="form-control" id="employee_name" name="employee_name"
                                placeholder={{ __('tm_leave_transaction_by_employee_no.label_employee_name') }} disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="leave_code">{{ __('tm_leave_transaction_by_employee_no.label_leave_code') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="leave_code" name="leave_code"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="balance">{{ __('tm_leave_transaction_by_employee_no.label_balance') }}</label>
                            <input type="text" class="form-control" id="balance" name="balance"
                                placeholder={{ __('tm_leave_transaction_by_employee_no.label_balance') }} disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="leave_hour form-check-label">{{ __('tm_leave_transaction_by_employee_no.label_leave_hour') }}</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group" id="radio-button-leave-hour">
                            {{-- <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="full_day"
                                    name="radiobtn" value="F0" checked>
                                <label class="form-check-label"
                                    for="full_day">{{ __('tm_leave_transaction_by_employee_no.label_full_day') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="half_day"
                                    name="radiobtn" value="H0">
                                <label class="form-check-label"
                                    for="half_day">{{ __('tm_leave_transaction_by_employee_no.label_half_day') }}</label>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="leave_date_from">{{ __('tm_leave_transaction_by_employee_no.label_leave_date_from') }}</label>
                            <span class="required">*</span>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="leave_date_from" name="leave_date_from"
                                    placeholder="{{ __('tm_leave_transaction_by_employee_no.label_leave_date_from') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="leave_date_to">{{ __('tm_leave_transaction_by_employee_no.label_leave_date_to') }}</label>
                            <span class="required">*</span>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="leave_date_to" name="leave_date_to"
                                    placeholder="{{ __('tm_leave_transaction_by_employee_no.label_leave_date_to') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('tm_leave_transaction_by_employee_no.btn_save') }}
                        </button>
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
                        <span class="title-text-notification">{{ __('tm_leave_transaction_by_employee_no.alert_success') }}</span>
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
<script src="{{ asset('js/jquery.redirect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
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
    
    $(function () {
        initDatePicker();
    });

    function initDatePicker() {
        $('.input-group input').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var val_balance = 0;

        function htmlDecode(value) {
    	    return $("<textarea/>").html(value).text();
	    }

        loadDataEmployeeNo();
        loadDataLeaveCode();

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
        
        // $('select').on('select2:opening select2:closing', function( event ) {
        //     var $searchfield = $( '#'+event.target.id ).parent().find('.select2-search__field');
        //     $searchfield.prop('disabled', true);
        // });

        $.get("{{ url('leave_hour/api') }}", function (data) {
            $.each(data, function (k, v) {
                var radioButton = $('<input>')
                .attr('type', 'radio')
                .addClass('form-check-input')
                .attr('id', v.variable)
                .attr('name', 'radiobtn')
                .val(v.code);

                var label = $('<label>')
                    .addClass('form-check-label')
                    .attr('for', v.variable)
                    .text(v.value);

                var formCheckDiv = $('<div>')
                    .addClass('form-check form-check-inline')
                    .append(radioButton)
                    .append(label);

                $('#radio-button-leave-hour').append(formCheckDiv);

                if (v.code === 'F0') {
                    radioButton.prop('checked', true);
                }
            });
        })

        var balance = $('#employee_no, #leave_code');

        balance.on("select2:select", function (e) {
            var data = $('#employee_no').select2('data');
            var data2 = $('#leave_code').select2('data');
            $('#employee_name').val(htmlDecode(data[0].title));
            if (data.length > 0 && data2.length > 0) {
                $.ajax({
                url: "{{ url('time_management/balance/detail') }}",
                type: "GET",
                data: {
                    'employeeNo': data[0].id,
                    'leaveCode' : data2[0].id
                },
                success: function (response) {
                    if (response.length > 0){
                        val_balance = response[0].balance;

                        var leave_date_from = $('#leave_date_from').val();
                        var format_leave_date_from = moment(leave_date_from, 'YYYY-MM-DD');
                        var leave_date_to = $('#leave_date_to').val();
                        var format_leave_date_to = moment(leave_date_to, 'YYYY-MM-DD');

                        var diff = moment.duration(format_leave_date_to.diff(format_leave_date_from)).asDays();
                        var difference_day = diff + 1;

                        if ($('#LeaveTime_F').is(':checked')) {
                            var total_balance = val_balance - (difference_day * 1);
                        }
                        else {
                            var total_balance = val_balance - (difference_day * 0.5);
                        }
                        $('#balance').val(total_balance);

                        var calculate = $('#leave_date_from, #leave_date_to, #LeaveTime_F, #LeaveTime_H0, #LeaveTime_H1');

                        calculate.on('change', function () {
                            var leave_date_from = $('#leave_date_from').val();
                            var format_leave_date_from = moment(leave_date_from, 'YYYY-MM-DD');
                            var leave_date_to = $('#leave_date_to').val();
                            var format_leave_date_to = moment(leave_date_to, 'YYYY-MM-DD');

                            var diff = moment.duration(format_leave_date_to.diff(format_leave_date_from)).asDays();
                            var difference_day = diff + 1;

                            if ($('#LeaveTime_F').is(':checked')) {
                                var total_balance = val_balance - (difference_day * 1);
                            }
                            else {
                                var total_balance = val_balance - (difference_day * 0.5);
                            }

                            $('#balance').val(total_balance);
                        })
                    }
                    else {
                        val_balance = 0,
                        $('#balance').val(val_balance);
                    }
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            })
            }
        });
        
        balance.on("select2:unselecting", function (e) {
            $('#employee_name').val('');
            $('#balance').val('');
        });

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
                closeOnSelect: true,
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

        function loadDataLeaveCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        // '<div class="col-6"><b>Description</b></div>' +
                        '<div class="col-12">' + data.data.description + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#leave_code').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-12"><b>Description</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#leave_code').select2({
                width: '100%',
                placeholder: 'Choose Leave Code',
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
                    url: "{{ url('/leave_code/api') }}",
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
                                    id: item.absentCode,
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
            $("#leave_transaction_by_employee_no_form").submit();
        });

        if ($("#leave_transaction_by_employee_no_form").length > 0) {
            $("#leave_transaction_by_employee_no_form").validate({
            rules: {
                    employee_no: {
                        required: true,
                    },
                    leave_code: {
                        required: true,
                    },
                    leave_date_from: {
                        required: true,
                    },
                    leave_date_to: {
                        required: true,
                        greaterThan: '#leave_date_from'
                    }
                },
                messages: {
                    employee_no: {
                        required: "{{ __('tm_leave_transaction_by_employee_no.field_mandatory') }}",
                    },
                    leave_code: {
                        required: "{{ __('tm_leave_transaction_by_employee_no.field_mandatory') }}",
                    },
                    leave_date_from: {
                        required: "{{ __('tm_leave_transaction_by_employee_no.field_mandatory') }}",
                    },
                    leave_date_to: {
                        required: "{{ __('tm_leave_transaction_by_employee_no.field_mandatory') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("tm_leave_transaction_by_employee_no.btn_save") }}'
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
                        url: "{{ url('time_management/leave_transaction/proses') }}",
                        type: "POST",
                        data: $('#leave_transaction_by_employee_no_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_leave_transaction_by_employee_no.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('time_management/leave_transaction_by_employee_no') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_leave_transaction_by_employee_no.btn_save") }}'
                                );

                                $('#notification_error').modal('show');
                                if (response.message == null || response.message ==
                                    '') {
                                    $('#message-notification-error').html(
                                        "{{ __('login.error') }}");
                                } else if (response.message == 'Is Bigger than Leave Date To'){
                                    $('#message-notification-error').html('Leave Date From' + " " + response
                                        .message);
                                } else {
                                    $('#message-notification-error').html(response
                                        .message);
                                }
                            }
                        },
                        error: function (response) {
                            $("#btn-save").prop("disabled", false);
                            $("#btn-save").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("tm_leave_transaction_by_employee_no.btn_save") }}'
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