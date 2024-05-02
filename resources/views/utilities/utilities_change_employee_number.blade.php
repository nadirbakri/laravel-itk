<!DOCTYPE html>
<html>
<head>
	<title>{{ __('utilities_change_employee_number.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
	<style type="text/css">
		.div-utilities {
			max-width: 100%;
			margin: auto;
			/*margin-top: 1%;*/
		}
        .table tr {
            cursor: pointer;
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
	<div class="div-utilities">
		<div class="div-title">
			<a href="{{ route('utilities', ['moduleID' => 'UTI']) }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('utilities_change_employee_number.list') }}</span>
			</a>
		</div>
		<div class="div-form">
            <form id="change_employee_no_form" method="post">
                @csrf   
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_no">{{ __('utilities_change_employee_number.label_employee_no') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="employee_no" name="employee_no"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_name">{{ __('utilities_change_employee_number.label_employee_name') }}</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name"
                                placeholder="{{ __('utilities_change_employee_number.label_employee_name') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_no_new">{{ __('utilities_change_employee_number.label_employee_no_new') }}</label>
                            <input type="text" class="form-control" id="employee_no_new" name="employee_no_new"
                                placeholder="{{ __('utilities_change_employee_number.label_employee_no_new') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-process" id="btn-process"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('utilities_change_employee_number.btn_process') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" href="{{ url('utilities/change_employee_no') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('utilities_change_employee_number.btn_cancel') }}
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
                        <span class="title-text-notification">{{ __('utilities_change_employee_number.alert_success') }}</span>
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
<script src="{{ asset('js/jquery.redirect.js') }}""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
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
    
  $(document).ready(function() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    loadDataEmployeeNo();

    $('#employee_no').on('select2:select', function (e) {
        var data = $('#employee_no').select2('data');
        $('#employee_name').val(htmlDecode(data[0].title));
    });

    $('#employee_no').on('select2:unselecting', function (e) {
        $('#employee_name').val('');
    });

    function htmlDecode(value) {
        return $("<textarea/>").html(value).text();
    }

    $('#notification_success').on('hide.bs.modal', function () {
        window.location = "{{ url('utilities/change_employee_no') }}";
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

    $("#btn-process").click(function () {
        $(this).prop("disabled", true);
        $(this).html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
        );
        $("#change_employee_no_form").submit();
    });

    if ($("#change_employee_no_form").length > 0) {
        $("#change_employee_no_form").validate({
        rules: {
                employee_no: {
                    required: true,
                },
                employee_no_new: {
                    required: true,
                },
            },
            messages: {
                employee_no: {
                    required: "{{ __('utilities_change_employee_number.field_mandatory') }}",
                },
                employee_no_new: {
                    required: "{{ __('utilities_change_employee_number.field_mandatory') }}",
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
                $("#btn-process").prop("disabled", false);
                $("#btn-process").html(
                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_change_employee_number.btn_process") }}'
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
                    url: "{{ url('utilities/change_employee_no/proses') }}",
                    type: "POST",
                    data: $('#change_employee_no_form').serialize(),
                    success: function (response) {
                        if (response.status == "true") {
                            $("#btn-process").prop("disabled", false);
                            $("#btn-process").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("utilities_change_employee_number.btn_process") }}'
                            );
                            
                            $('#notification_success').modal('show');
                            $('#message-notification-success').html(response
                                .message);
                            setTimeout(function () {
                                window.location =
                                    "{{ url('payroll/change_employee_no') }}";
                            }, 3000);
                        } else {
                            $("#btn-process").prop("disabled", false);
                            $("#btn-process").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("utilities_change_employee_number.btn_process") }}'
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
                        $("#btn-process").prop("disabled", false);
                        $("#btn-process").html(
                            '<i class="fa fa-floppy-o"></i> {{ __("utilities_change_employee_number.btn_process") }}'
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