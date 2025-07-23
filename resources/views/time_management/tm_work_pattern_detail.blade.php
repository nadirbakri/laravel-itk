<!DOCTYPE html>
<html>

<head>
    <title>{{ __('tm_work_pattern.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
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
    <div class="div-time_management">
        <div class="div-title">
            <a href="{{ url()->previous() }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('tm_work_pattern.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="work_pattern_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="record_status">{{ __('tm_work_pattern.label_record_status') }}</label>
                            <input type="text" class="form-control" id="record_status" name="record_status"
                                placeholder="{{ __('tm_work_pattern.label_record_status') }}" readonly>
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="work_pattern_code">{{ __('tm_work_pattern.label_work_pattern_code') }}</label>
                            <span class="required">*</span>
                            <input type="text" class="form-control" id="work_pattern_code" name="work_pattern_code"
                                placeholder="{{ __('tm_work_pattern.label_work_pattern_code') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="description">{{ __('tm_work_pattern.label_description') }}</label>
                            <span class="required">*</span>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="{{ __('tm_work_pattern.label_description') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="work_on_holiday">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_work_on_holiday"
                                    name="check_work_on_holiday" value="true">
                                <label
                                    for="check_work_on_holiday">{{ __('tm_work_pattern.label_work_on_holiday') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="no_of_day">{{ __('tm_work_pattern.label_no_of_day') }}</label>
                            <span class="required">*</span>
                            <input type="number" min="0" class="form-control" id="no_of_day"
                                name="no_of_day"
                                placeholder="{{ __('tm_work_pattern.label_no_of_day') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="working_days">{{ __('tm_work_pattern.label_working_days') }}</label>
                            <span class="required">*</span>
                            <input type="number" min="0" class="form-control" id="working_days"
                                name="working_days"
                                placeholder="{{ __('tm_work_pattern.label_working_days') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="div-table">
                            <table id="work_pattern_detail_table" class="table hover">
                                <thead>
                                      <tr>
                                        <th width="15%">Seq No</th>
                                        <th width="30%">Day Code</th>
                                        <th>Shift Code</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('tm_work_pattern.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" href="{{ url('time_management/work_pattern') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('tm_work_pattern.btn_cancel') }}
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
                        <span class="title-text-notification">{{ __('tm_work_pattern.alert_success') }}</span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
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
        var func = "{{ $func }}";
        var arrData = @json($data);
        var table = null;

        // $('#work_pattern_detail_table').DataTable().destroy();
        // load_table_detail_work_pattern();
        // table.clear().draw();

        if (func == 'new') {
            $('#record_status').val("A");
            $('#record_function').val("New");
            $('#work_pattern_code').val("");
            $('#description').val("");
            $('#check_work_on_holiday').prop('checked', false);
            $('#no_of_day').val("");
            $('#working_days').val(0);
            $('#work_pattern_detail_table').DataTable().destroy();
            load_table_detail_work_pattern();
        } else if (func == 'edit') {
            $('#record_status').val(((typeof arrData[0].recordStatus !== 'undefined') ? arrData[0].recordStatus : ''));
            $('#record_function').val("Edit");
            $('#work_pattern_code').val(((typeof arrData[0].patternCode !== 'undefined') ? arrData[0].patternCode : ''));
            $('#description').val(htmlDecode(((typeof arrData[0].description !== 'undefined') ? arrData[0].description : '')));
            var work_on_holiday = ((typeof arrData[0].holidayFlag !== 'undefined') ? arrData[0].holidayFlag : '');
            // console.log(work_on_holiday);
            if ( work_on_holiday == 1 ) {
                $('#check_work_on_holiday').prop('checked', true)
            }
            else {
                $('#check_work_on_holiday').prop('checked', false)
            }
            $('#no_of_day').val(((typeof arrData[0].noOfDay !== 'undefined') ? arrData[0].noOfDay : ''));
            $('#working_days').val(arrData[0].workingDays ?? 0);
            load_table_detail_work_pattern();
            // console.log(arrData[0]);
            if (typeof arrData[0].noOfDay !== 'undefined') {
                for (var i = 0; i < arrData[0].workPatternDetailList.length; i++) {
                    table.row.add([
                        '<input type="hidden" class="form-control" name="seq_no[]" value="'+ ((typeof arrData[0].workPatternDetailList[i].seqNo !== 'undefined') ? arrData[0].workPatternDetailList[i].seqNo : i) +'">' + ((typeof arrData[0].workPatternDetailList[i].seqNo !== 'undefined') ? arrData[0].workPatternDetailList[i].seqNo : (i+1)),
                        '<select class="form-control select2 day_code" id="day_code'+ (i+1) +'" name="day_code[]">',
                        '<select class="form-control select2 shift_code" id="shift_code'+ (i+1) +'" name="shift_code[]">',
                    ]).draw();

                    loadDataDayCode("#day_code" + (i+1));
                    loadDataShiftCode("#shift_code" + (i+1));
                    loadDataDetailDayCode('#day_code' + (i+1), ((typeof arrData[0].workPatternDetailList[i].dayCode !== 'undefined') ? arrData[0].workPatternDetailList[i].dayCode : ''));
                    loadDataDetailShiftCode('#shift_code' + (i+1), ((typeof arrData[0].workPatternDetailList[i].shiftCode !== 'undefined') ? arrData[0].workPatternDetailList[i].shiftCode : ''));
                }
                // load_table_detail_work_pattern(((typeof arrData[0].patternCode !== 'undefined') ? arrData[0].patternCode : ''), 
                //     ((typeof arrData[0].workPatternDetailList[0].seqNo !== 'undefined') ? arrData[0].workPatternDetailList[0].seqNo : ''));
            }
            // load_table_detail_work_pattern("{{ isset($data[0]->patternCode) ? $data[0]->patternCode : '' , isset($data[0]->seqNo) ? $data[0]->seqNo : ''}}");
        }

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('time_management/work_pattern') }}";
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function load_table_detail_work_pattern() {
            table = $('#work_pattern_detail_table').DataTable({
                "sDom": 'lrtip',
                "bPaginate": false,
            });
        }

        function loadDataDetailDayCode(field = '', dayCode = '') {
            $(field).addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/day_code/func/api') }}",
                data: {
                    dayCode : dayCode
                }
            }).then(function (data) {
                if (!$(field).find('option:contains(' + data[0].value + ')').length) {
                    $(field).append($('<option>').val(data[0].comGenCode).text(data[0].value));
                }
                $(field).val(data[0].comGenCode);
                $(field).removeClass('loading');
            });
        }

        function loadDataDetailShiftCode(field = '', shiftCode = '') {
            $(field).addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/shift_code/func/api') }}",
                data: {
                    shiftCode : shiftCode
                }
            }).then(function (data) {
                // console.log(data);
                if (!$(field).find('option:contains(' + data[0].shiftName + ')').length) {
                    $(field).append($('<option>').val(data[0].shiftCode).text(data[0].shiftName));
                }
                $(field).val(data[0].shiftCode);
                $(field).removeClass('loading');
            });
        }

        $('#no_of_day').on('input', function () {
        var no_of_day = $('#no_of_day').val();
        
        table.clear().draw();

            for (var i = 1; i <= no_of_day; i++) {

                if (func == 'new') {
                    table.row.add([
                    '<input type="hidden" class="form-control" name="seq_no[]" value="'+ i +'">' + i,
                    '<select class="form-control select2 day_code" id="day_code'+ i +'" name="day_code[]">',
                    '<select class="form-control select2 shift_code" id="shift_code'+ i +'" name="shift_code[]">',
                    ]).draw();

                    loadDataDayCode("#day_code" + i);
                    loadDataShiftCode("#shift_code" + i);
                }

                else {
                    table.row.add([
                    '<input type="hidden" class="form-control" name="seq_no[]" value="'+ i +'">' + i,
                    '<select class="form-control select2" id="day_code'+ i +'" name="day_code[]">',
                    '<select class="form-control select2" id="shift_code'+ i +'" name="shift_code[]">',
                    ]).draw();
                    // console.log(arrData[0].workPatternDetailList[i-1].dayCode);

                    loadDataDayCode("#day_code" + i);
                    loadDataShiftCode("#shift_code" + i);
                    if (typeof arrData[0].workPatternDetailList[i-1] !== 'undefined') {
                        loadDataDetailDayCode('#day_code' + i, ((typeof arrData[0].workPatternDetailList[i-1].dayCode !== 'undefined') ? arrData[0].workPatternDetailList[i-1].dayCode : ''));
                        loadDataDetailShiftCode('#shift_code' + i, ((typeof arrData[0].workPatternDetailList[i-1].shiftCode !== 'undefined') ? arrData[0].workPatternDetailList[i-1].shiftCode : ''));
                    }
                }
            }
        });

        function loadDataDayCode(field = ''){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-6">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Day Code',
                allowClear: true,
                closeOnSelect: true,
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
                    url: "{{ url('/day_code/api') }}",
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

        function loadDataShiftCode(field = ''){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.shiftCode + '</div>' +
                        '<div class="col-6">' + data.data.shiftName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Shift Code</b></div>' +
                        '<div class="col-6"><b>Shift Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Shift Code',
                allowClear: true,
                closeOnSelect: true,
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
                    url: "{{ url('/shift_code/api') }}",
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
                                    text: item.shiftName,
                                    id: item.shiftCode,
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
            $("#work_pattern_form").submit();
        });

        if ($("#work_pattern_form").length > 0) {
            $("#work_pattern_form").validate({
            rules: {
                    work_pattern_code: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    no_of_day: {
                        required: true,
                    },
                    working_days: {
                        required: true,
                    },
                },
                messages: {
                    work_pattern_code: {
                        required: "{{ __('tm_work_pattern.work_pattern_code_required') }}",
                    },
                    description: {
                        required: "{{ __('tm_work_pattern.description_required') }}",
                    },
                    no_of_day: {
                        required: "{{ __('tm_work_pattern.no_of_day_required') }}",
                    },
                    working_days: {
                        required: "{{ __('tm_work_pattern.working_days_required') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("tm_work_pattern.btn_save") }}'
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
                        url: "{{ url('time_management/work_pattern/proses') }}",
                        type: "POST",
                        data: $('#work_pattern_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_work_pattern.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('time_management/work_pattern') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_work_pattern.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("tm_work_pattern.btn_save") }}'
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