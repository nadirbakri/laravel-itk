<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_employee_ess_configuration.judul') }}</title>
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

        .modal-header-notification-error {
            border-bottom:1px solid #eee;
            background-color: #f44336;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
        .modal-header-notification-success {
            border-bottom:1px solid #eee;
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
            align-items:center;
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

        th,
        td {
            text-align: center;
            vertical-align: middle;
        }

        #loading {
			display: none;
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(255, 255, 255, 0.8);
			z-index: 9999;
		}

		.spinner {
            position: absolute;
			margin-left: 45%;
			margin-top: 10%;
			border-radius: 50%;
			width: 50px;
			height: 50px;
			border-radius: 50%;
			border: 5px solid #ccc;
			border-top-color: #333;
			animation: spin 1s infinite linear;
		}

        @keyframes spin {
		    to { transform: rotate(360deg); }
		}

    </style>
</head>

<body>
    <div class="div-personel">
        <div class="div-title">
            <a href="{{ route('personnel', ['moduleID' => 'PE']) }}" target="iframe_dashboard" id="toolbar-prev-page">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('personel_employee_ess_configuration.list') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="employee_ess_configuration_form" method="post">
                @csrf
                <div class="row d-flex gap-4">
                    <div class="form-group" style="padding-left: 15px">
                        <label for="get_employee form-check-label">{{ __('personel_employee_ess_configuration.label_get_employee') }}</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="get_employee_all" name="get_employee" value="ALL" checked>
                        <label for="get_employee_all">{{ __('personel_employee_ess_configuration.label_all') }}</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="get_employee_range" name="get_employee" value="RANGE">
                        <label for="get_employee_range">{{ __('personel_employee_ess_configuration.label_range') }}</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="get_employee_list" name="get_employee" value="LIST">
                        <label for="get_employee_list">{{ __('personel_employee_ess_configuration.label_list') }}</label>
                    </div>
                </div>
                <div class="row" id="employee_range">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="employee_no_from">{{ __('personel_employee_ess_configuration.label_employee_no_from') }}</label>
                            <select class="form-control select2" id="employee_no_from" name="employee_no_from" disabled></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_no_to">{{ __('personel_employee_ess_configuration.label_employee_no_to') }}</label>
                            <select class="form-control select2" id="employee_no_to" name="employee_no_to" disabled></select>
                        </div>
                    </div>
                </div>
                <div class="row" id="employee_list">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_no_list">{{ __('personel_employee_ess_configuration.label_employee_no_list') }}</label>
                            <select class="form-control select2" id="employee_no_list" name="employee_no_list[]" multiple="multiple" disabled></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="group_authorize_from">{{ __('personel_employee_ess_configuration.label_group_authorize_from') }}</label>
                            <select class="form-control select2" id="group_authorize_from"
                                name="group_authorize_from"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="group_authorize_to">{{ __('personel_employee_ess_configuration.label_group_authorize_to') }}</label>
                            <select class="form-control select2" id="group_authorize_to"
                                name="group_authorize_to"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="position">{{ __('personel_employee_ess_configuration.label_position') }}</label>
                            <select class="form-control select2 select2-hidden-accessible" id="position"
                                name="position[]" multiple="multiple">
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="ranking">{{ __('personel_employee_ess_configuration.label_ranking') }}</label>
                            <select class="form-control select2" id="ranking" name="ranking[]"
                                multiple="multiple"></select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="location">{{ __('personel_employee_ess_configuration.label_location') }}</label>
                            <select class="form-control select2" id="location" name="location[]"
                                multiple="multiple"></select>
                        </div>
                    </div>
                </div>
                <div class="row" id="div-level">
                    <input type="hidden" class="form-control" id="level_format" name="level_format">
                </div>
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary" name="btn-search" id="btn-search" style="width: 100%;">
                            <img src="{{ url('icons/mob/button/button-search.svg') }}" alt="search"> {{ __('personel_employee_ess_configuration.btn_search') }}
                        </button>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-end align-items-center px-4" style="gap: 12px">
                    <button type="button" class="btn btn-primary" name="btn-edit" id="btn-edit" style="width: 100px;">
                        <i class="fa fa-pencil"></i> {{ __('personel_employee_ess_configuration.btn_edit') }}
                    </button>
                    <button type="button" class="btn btn-primary" name="btn-cancel" id="btn-cancel" style="width: 100px;" hidden>
                        <i class="fa fa-times"></i> {{ __('personel_employee_ess_configuration.btn_cancel') }}
                    </button>
                    <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save" style="width: 100px;" disabled>
                        <i class="fa fa-floppy-o"></i> {{ __('personel_employee_ess_configuration.btn_save') }}
                    </button>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="loading">
                            <div class="spinner"></div>
                        </div>
                        <table id="employee_ess_configuration_table" class="table hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Employee No</th>
                                    {{-- <th>Employee Name</th> --}}
                                    <th><input type="checkbox" class="form-check-input" id="select_all_permit_eligible" name="select_all_permit_eligible" disabled> Permit</th>
                                    <th><input type="checkbox" class="form-check-input" id="select_all_leave_eligible" name="select_all_leave_eligible" disabled> Leave</th>
                                    <th><input type="checkbox" class="form-check-input" id="select_all_overtime_eligible" name="select_all_overtime_eligible" disabled> Overtime</th>
                                    <th><input type="checkbox" class="form-check-input" id="select_all_business_trip_eligible" name="select_all_business_trip_eligible" disabled> Business Trip</th>
                                    <th><input type="checkbox" class="form-check-input" id="select_all_multiple_check_in_eligible" name="select_all_multiple_check_in_eligible" disabled> Multiple Check In</th>
                                    <th><input type="checkbox" class="form-check-input" id="select_all_reimbursement_eligible" name="select_all_reimbursement_eligible" disabled> Reimbursement</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tbody>
                        </table>
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
                        <span class="title-text-notification">{{ __('personel_employee_ess_configuration.alert_success') }}</span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/flatpickr.monthselect.js') }}"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>

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
        let table = []
        let arrData = []
        let isEditMode = false

        $.ajax({
            url: "{{ url('personnel/report/level/check') }}",
            type: "GET",
            success: function (response) {
                $('#level_format').val(response.data[0].levelFormat);
                for (var i = 1; i <= response.data[0].levelFormat; i++) {
                    $('#div-level').append(
                        '<div class="col-4">' +
                        '<div class="form-group">' +
                        '<label for="level' + i + '">' + response.data_level[i - 1]
                        .levelDescription + '</label>' +
                        '<select class="form-control select2" id="level' + i + '" name="level' +
                        i + '[]" multiple="multiple"></select>' +
                        '</div></div>'
                    );

                    loadDataLevelCode('#level' + i, i);
                    loadDataFirstLastAllLevel('#level' + i, i);
                }
            },
            error: function (response) {
                $('#notification_error').modal('show');
                $('#message-notification-error').html(response);
            }
        });

        loadDataEmployeeNo('#employee_no_from');
        loadDataEmployeeNo('#employee_no_to');
        loadDataEmployeeNo('#employee_no_list');
        loadDataGroupAuthorize('#group_authorize_from');
        loadDataGroupAuthorize('#group_authorize_to');
        loadDataPositionCode();
        loadDataLocationCode();
        loadDataRankingCode();

        loadDataFirstLastAllEmployeeNo('#employee_no_from', 'First');
        loadDataFirstLastAllEmployeeNo('#employee_no_to', 'Last');
        loadDataFirstLastAllGroupAuthorize('#group_authorize_from', 'First');
        loadDataFirstLastAllGroupAuthorize('#group_authorize_to', 'Last');
        loadDataFirstLastAllPosition();
        loadDataFirstLastAllLocation();
        loadDataFirstLastAllRanking();

        $('#employee_list').hide();

        $('input[name=get_employee]').on("change", function (e) {
            var data = $(this).val();
            if(data == "ALL"){
                $('#employee_range').show();
                $('#employee_list').hide();
                $('#employee_no_from').prop('disabled', true);
                $('#employee_no_to').prop('disabled', true);
                $('#employee_no_list').prop('disabled', true);
            } 
            else if (data === "RANGE") {
                $('#employee_range').show();
                $('#employee_list').hide();
                $('#employee_no_from').prop('disabled', false);
                $('#employee_no_to').prop('disabled', false);
                $('#employee_no_list').prop('disabled', true);
            } 
            else {
                $('#employee_range').hide();
                $('#employee_list').show();
                $('#employee_no_from').prop('disabled', true);
                $('#employee_no_to').prop('disabled', true);
                $('#employee_no_list').prop('disabled', false);
            }
        });

        $('#employee_ess_configuration_form').submit((e) => {
            $('#btn-edit').removeAttr('hidden');
            $('#btn-cancel').attr('hidden', true);

            e.preventDefault()

            $("#btn-search").prop("disabled", true);
            $("#btn-search").html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            $('#loading').show()

            load_data_employee_ess_configuration()

            $('#btn-edit').on('click', function () {
                isEditMode = true;
                $(this).attr('hidden', true);
                $('#btn-cancel').removeAttr('hidden');
                $('.form-check-input').prop('disabled', false)
                $('#btn-save').prop('disabled', false)

                enableAllCheckboxes()
            })
        })

        $('#btn-cancel').on('click', function() {
            isEditMode = false
            $(this).attr('hidden', true);
            $('#btn-edit').removeAttr('hidden');
            $('.form-check-input').prop('disabled', true)
            $('#btn-save').prop('disabled', true)

            load_data_employee_ess_configuration()
        })

        $('#select_all_permit_eligible').on('click', function() {
            table.$('.permit_eligible').prop('checked', $(this).is(':checked') ? true : false)
        })

        $('#select_all_leave_eligible').on('click', function() {
            table.$('.leave_eligible').prop('checked', $(this).is(':checked') ? true : false)
        })

        $('#select_all_overtime_eligible').on('click', function() {
            table.$('.overtime_eligible').prop('checked', $(this).is(':checked') ? true : false)
        })

        $('#select_all_business_trip_eligible').on('click', function() {
            table.$('.business_trip_eligible').prop('checked', $(this).is(':checked') ? true : false)
        })

        $('#select_all_multiple_check_in_eligible').on('click', function() {
            table.$('.multiple_check_in_eligible').prop('checked', $(this).is(':checked') ? true : false)
        })

        $('#select_all_reimbursement_eligible').on('click', function() {
            table.$('.reimbursement_eligible').prop('checked', $(this).is(':checked') ? true : false)
        })

        $(document).on('change', '.permit_eligible', function () {
            updateSelectAllStatus('#select_all_permit_eligible', 'permit_eligible');
        });

        $(document).on('change', '.leave_eligible', function () {
            updateSelectAllStatus('#select_all_leave_eligible', 'leave_eligible');
        });

        $(document).on('change', '.overtime_eligible', function () {
            updateSelectAllStatus('#select_all_overtime_eligible', 'overtime_eligible');
        });

        $(document).on('change', '.business_trip_eligible', function () {
            updateSelectAllStatus('#select_all_business_trip_eligible', 'business_trip_eligible');
        });

        $(document).on('change', '.multiple_check_in_eligible', function () {
            updateSelectAllStatus('#select_all_multiple_check_in_eligible', 'multiple_check_in_eligible');
        });

        $(document).on('change', '.reimbursement_eligible', function () {
            updateSelectAllStatus('#select_all_reimbursement_eligible', 'reimbursement_eligible');
        });

        $('#employee_ess_configuration_table').on('draw.dt', function () {
            if (isEditMode) {
                enableAllCheckboxes();
            }
        });

        function updateSelectAllStatus(selector, checkboxClass) {
            const allCheckboxes = table.$(`.${checkboxClass}`);
            const checkedCheckboxes = table.$(`.${checkboxClass}:checked`);
            
            const allChecked = allCheckboxes.length > 0 && allCheckboxes.length === checkedCheckboxes.length;
            $(selector).prop('checked', allChecked);
        }

        function enableAllCheckboxes() {
            $('.form-check-input').prop('disabled', false)
        }

        function load_data_employee_ess_configuration() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/personnel/employee_ess_configuration/table') }}",
                data: $('#employee_ess_configuration_form').serializeArray(),
            }).then(function (data) {
                arrData = data.data
                $('#employee_ess_configuration_table').DataTable().destroy();
                load_table_employee_ess_configuration()
                setTimeout(() => {
                    updateSelectAllStatus('#select_all_permit_eligible', 'permit_eligible');
                    updateSelectAllStatus('#select_all_leave_eligible', 'leave_eligible');
                    updateSelectAllStatus('#select_all_overtime_eligible', 'overtime_eligible');
                    updateSelectAllStatus('#select_all_business_trip_eligible', 'business_trip_eligible');
                    updateSelectAllStatus('#select_all_multiple_check_in_eligible', 'multiple_check_in_eligible');
                    updateSelectAllStatus('#select_all_reimbursement_eligible', 'reimbursement_eligible');
                }, 500);
                $("#btn-search").prop("disabled", false);
                $("#btn-search").html(
                    "<img src={{ url('icons/mob/button/button-search.svg') }} alt='export'> {{ __('personel_employee_ess_configuration.btn_search') }}"
                );
                $('#loading').hide()
            })
        }

        function load_table_employee_ess_configuration() {
            table = $('#employee_ess_configuration_table').DataTable({
                processing: true,
                // serverSide: true,
                orderCellsTop: true,
                data: arrData,
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lfrtip',
                'sPaginationType': 'full_numbers',
                columns: [{
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type, row) {
                            return type === 'display' ?
                                '<input class="chk-select selected_employee" type="checkbox" name="selected_employee">' : '';
                        }
                    },
                    { data: 'employeeNo', name: 'employeeNo',
                        render: function (data, type, row) {
                            return '<input type="hidden" name="employee_no[]" value='+ data + ' />'+ data + '';
                        }
                    },
                    {
                        orderable: false,
                        data: 'permitEgb',
                        name: 'permitEgb',
                        render: function (data, type, row) {
                            const isChecked = data ? 'checked' : ''
                            return '<input type="checkbox" class="form-check-input permit_eligible" name="permit_eligible[]" value='+ data + ' ' + isChecked +' disabled />';
                        }
                    },
                    {
                        orderable: false,
                        data: 'leaveEgb',
                        name: 'leaveEgb',
                        render: function (data, type, row) {
                            const isChecked = data ? 'checked' : ''
                            return '<input type="checkbox" class="form-check-input leave_eligible" name="leave_eligible[]" value='+ data + ' ' + isChecked +' disabled />';
                        }
                    },
                    {
                        orderable: false,
                        data: 'overtimeEgb',
                        name: 'overtimeEgb',
                        render: function (data, type, row) {
                            const isChecked = data ? 'checked' : ''
                            return '<input type="checkbox" class="form-check-input overtime_eligible" name="overtime_eligible[]" value='+ data + ' ' + isChecked +' disabled />';
                        }
                    },
                    {
                        orderable: false,
                        data: 'bstEgb',
                        name: 'bstEgb',
                        render: function (data, type, row) {
                            const isChecked = data ? 'checked' : ''
                            return '<input type="checkbox" class="form-check-input business_trip_eligible" name="business_trip_eligible[]" value='+ data + ' ' + isChecked +' disabled />';
                        }
                    },
                    {
                        orderable: false,
                        data: 'multiCheckInEgb',
                        name: 'multiCheckInEgb',
                        render: function (data, type, row) {
                            const isChecked = data ? 'checked' : ''
                            return '<input type="checkbox" class="form-check-input multiple_check_in_eligible" name="multiple_check_in_eligible[]" value='+ data + ' ' + isChecked +' disabled />';
                        }
                    },
                    {
                        orderable: false,
                        data: 'reimbEgb',
                        name: 'reimbEgb',
                        render: function (data, type, row) {
                            const isChecked = data ? 'checked' : ''
                            return '<input type="checkbox" class="form-check-input reimbursement_eligible" name="reimbursement_eligible[]" value='+ data + ' ' + isChecked +' disabled />';
                        }
                    },
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                },
            });
        }

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

        function loadDataFirstLastAllPosition() {
            $('#position').addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/position/func/api') }}",
            }).then(function (data) {
                if (!$('#position').find('option:contains(' + data.positionName + ')').length) {
                    $('#position').append($('<option>').val(data.positionCode).text(data.positionName));
                }
                $('#position').val(data.positionCode);
                $('#position').removeClass('loading');
            });
        }

        function loadDataFirstLastAllLocation() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/location/func/api') }}",
            }).then(function (data) {
                if (!$('#location').find('option:contains(' + data.locationName + ')').length) {
                    $('#location').append($('<option>').val(data.locationCode).text(data.locationName));
                }
                $('#location').val(data.locationCode);
            });
        }

        function loadDataFirstLastAllRanking() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/ranking/func/api') }}",
            }).then(function (data) {
                if (!$('#ranking').find('option:contains(' + data.rankingName + ')').length) {
                    $('#ranking').append($('<option>').val(data.rankingCode).text(data.rankingName));
                }
                $('#ranking').val(data.rankingCode);
            });
        }

        function loadDataFirstLastAllLevel(field = '', levelType = '') {
            $.ajax({
                type: 'GET',
                url: "{{ url('/level/func/api') }}",
                data: {
                    'levelType': levelType
                }
            }).then(function (data) {
                if (!$(field).find('option:contains(' + data.levelName + ')').length) {
                    $(field).append($('<option>').val(data.levelCode).text(data.levelName));
                }
                $(field).val(data.levelCode);
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
                    url: '../group_authorize/api',
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term,
                            module: 'PE',
                            isRange: true,
                            isModule: false
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

        function loadDataPositionCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.positionCode + '</div>' +
                        '<div class="col-6">' + data.data.positionName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#position').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Position Code</b></div>' +
                        '<div class="col-6"><b>Position Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#position').select2({
                width: '100%',
                placeholder: 'Choose Position',
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
                    url: "{{ url('/position/all/api') }}",
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
                                    text: item.positionName,
                                    id: item.positionCode,
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

        function loadDataLocationCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.locationCode + '</div>' +
                        '<div class="col-6">' + data.data.locationName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#location').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Location Code</b></div>' +
                        '<div class="col-6"><b>Location Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#location').select2({
                width: '100%',
                placeholder: 'Choose Location',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/location/all/api') }}",
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
                                    text: item.locationName,
                                    id: item.locationCode,
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

        function loadDataRankingCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.rankingCode + '</div>' +
                        '<div class="col-6">' + data.data.rankingName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#ranking').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Ranking Code</b></div>' +
                        '<div class="col-6"><b>Ranking Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#ranking').select2({
                width: '100%',
                placeholder: 'Choose Ranking',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/ranking/all/api') }}",
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
                                    text: item.rankingName,
                                    id: item.rankingCode,
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

        function loadDataLevelCode(field = '', levelType = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.levelCode + '</div>' +
                        '<div class="col-6">' + data.data.levelName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Level Code</b></div>' +
                        '<div class="col-6"><b>Level Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Level',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/level/all/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term,
                            levelType: levelType
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.levelName,
                                    id: item.levelCode,
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

        $('#btn-save').on('click', function () {
            var rows = table.rows().nodes();
            var serializedData = [];

            $(rows).each(function () {
                serializedData.push({
                    employeeNo: $(this).find('input[name="employee_no[]"]').val(),
                    permitEgb: $(this).find('input[name="permit_eligible[]"]').is(':checked'),
                    leaveEgb: $(this).find('input[name="leave_eligible[]"]').is(':checked'),
                    overtimeEgb: $(this).find('input[name="overtime_eligible[]"]').is(':checked'),
                    bstEgb: $(this).find('input[name="business_trip_eligible[]"]').is(':checked'),
                    multiCheckInEgb: $(this).find('input[name="multiple_check_in_eligible[]"]').is(':checked'),
                    reimbEgb: $(this).find('input[name="reimbursement_eligible[]"]').is(':checked'),
                });
            });

            $.ajax({
                type: "POST",
                url: "{{ url('personnel/employee_ess_configuration/proses') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: 'application/json',
                dataType: 'json',
                data: JSON.stringify(serializedData),
                success: function (response) {
                    if (response.status == "true") {
                        $("#btn-save").prop("disabled", false);
                        $("#btn-save").html(
                            '<i class="fa fa-floppy-o"></i> {{ __("personel_employee_ess_configuration.btn_save") }}'
                        );

                        $('#notification_success').modal('show');
                        $('#message-notification-success').html(response.message);
                        setTimeout(function () {
                            $('#notification_success').modal('hide');
                            window.location = "{{ url('personnel/employee_ess_configuration') }}";
                        }, 3000);
                    } else {
                        $("#btn-save").prop("disabled", false);
                        $("#btn-save").html(
                            '<i class="fa fa-floppy-o"></i> {{ __("personel_employee_ess_configuration.btn_save") }}'
                        );

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
                    $("#btn-save").prop("disabled",
                    false);
                    $("#btn-save").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_employee_ess_configuration.btn_save") }}'
                    );
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });

            return false;
        });
    });

</script>

</html>
