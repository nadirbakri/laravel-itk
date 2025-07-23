<!DOCTYPE html>
<html>
<head>
    <title>{{ __('md_medical_checkup_schedule.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.monthselect.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/medical_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-medical {
            max-width: 100%;
            margin: auto;
            margin-top: 1%;
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

        .modal-header-notification-warning {
            border-bottom: 1px solid #eee;
            background-color: #f0bd18;
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

        .div-title-notification-warning {
            margin: 1.5%;
            margin-top: 2%;
            margin-bottom: 2%;
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

        .title-text-notification-warning {
            font-family: Inter;
            font-weight: 500;
            font-size: 2.5vw;
        }

        .required {
            color: red
        }

        .nav-pills .nav-item {
            border-radius: 0;
            background-color: #F5F5F5;
        }

        .nav-pills .nav-item:first-child {
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }

        .nav-pills .nav-item:last-child {
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;
        }

        .nav-pills .nav-link {
            color: #8F8F8F;
        }

        .nav-pills .nav-link.active {
            border-radius: 30px;
        }
    </style>
</head>

<body>
    <div class="div-medical">
        <div class="div-form">
            <form id="medical_checkup_schedule_form" method="post">
                @csrf
                <div style="display: flex; width: 100%; justify-content: space-between; align-items: center; padding: 0px 0px 20px 20px;">
                    <div style="display: flex; justify-content: flex-start; align-items: center;">
                        <div class="div-title">
                            <a href="{{ route('medical', ['moduleID' => 'MD']) }}" target="iframe_dashboard" style="display: flex; align-items: center; text-decoration: none; gap: 10px;">
                                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back" style="display: inline-block;">
                                <span class="title-text" style="white-space: nowrap;">{{ __('md_medical_checkup_schedule.list') }}</span>
                            </a>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: flex-end; align-items: center;">
                        <a href="medical_checkup_schedule_history" style="text-decoration: none;">
                            <button type="button" class="btn btn-secondary" id="btn-history">
                                <i class="fa fa-history" aria-hidden="true"></i> {{ __('md_vaccination_schedule.btn_history') }}
                            </button>
                        </a>
                    </div>
                </div>
                <div class="tab-input">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" role="tab" aria-controls="import" aria-selected="true" href="#import-tab">{{ __('md_medical_checkup_schedule.label_import') }}</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" role="tab" aria-controls="manual-input" aria-selected="false" href="#manual-input-tab">{{ __('md_medical_checkup_schedule.label_manual_input') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="tab-content">
                    <div class="tab-pane fade show active" id="import-tab" role="tabpanel" aria-labelledby="import-tab">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="import_file">{{ __('md_medical_checkup_schedule.label_file') }}</label>
                                    <span class="required">*</span>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="import_file" name="import_file">
                                        <label class="custom-file-label" for="import_file">{{ __('md_medical_checkup_schedule.label_file') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <button type="button" class="btn btn-primary" name="btn-process" id="btn-process" style="width: 100%;">
                                    <i class="fa fa-play-circle-o"></i> {{ __('md_medical_checkup_schedule.btn_process') }}
                                </button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-primary" name="btn-download-template" id="btn-download-template" style="width: 100%;">
                                    <i class="fa fa-download"></i> {{ __('md_medical_checkup_schedule.btn_download_template') }}
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="manual-input-tab" role="tabpanel" aria-labelledby="manual-input-tab">
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label
                                        for="title">{{ __('md_medical_checkup_schedule.label_title') }}</label>
                                    <span class="required">*</span>
                                    <input class="form-control" id="title" name="title" placeholder="{{ __('md_medical_checkup_schedule.label_title') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="mcu_name">{{ __('md_medical_checkup_schedule.label_mcu_name') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control select2" id="mcu_name" name="mcu_name"></select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="batch_description">{{ __('md_medical_checkup_schedule.label_batch_description') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control select2" id="batch_description" name="batch_description" disabled></select>
                                    <input type="hidden" class="form-control" id="batch_code_hidden" name="batch_code_hidden"></input>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label
                                        for="number_of_stage">{{ __('md_medical_checkup_schedule.label_number_of_stage') }}</label>
                                    <input type="number" class="form-control" id="number_of_stage" name="number_of_stage" placeholder="{{ __('md_medical_checkup_schedule.label_number_of_stage') }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="mcu_date">{{ __('md_medical_checkup_schedule.label_mcu_date') }}</label>
                                    <span class="required">*</span>
                                    <div class="input-group">
                                        <input type="text" class="form-control mcu_date" id="mcu_date" name="mcu_date"
                                            placeholder="{{ __('md_medical_checkup_schedule.label_mcu_date') }}">
                                        <div class="input-group-prepend mcu_date_calendar" id="mcu_date_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="mcu_time">{{ __('md_medical_checkup_schedule.label_mcu_time') }}</label>
                                        <span class="required">*</span>
                                        <div class='input-group'>
                                            <input type="text" class="form-control mcu_time" id="mcu_time" name="mcu_time"
                                                placeholder="{{ __('md_medical_checkup_schedule.label_mcu_time') }}">                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label
                                        for="employee_no">{{ __('md_medical_checkup_schedule.label_employee_no') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control select2" id="employee_no" name="employee_no[]" multiple="multiple"></select>
                                </div>
                            </div>
                            <div class="col-1 d-flex align-items-center pt-1">
                                <button type="button" class="btn btn-primary" name="btn-employee-list" id="btn-employee-list" data-toggle="modal" data-target="#modal_employee_list" style="width: 36px;">
                                    <i class="fa fa-bars"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label
                                        for="name_of_places">{{ __('md_medical_checkup_schedule.label_name_of_places') }}</label>
                                    <span class="required">*</span>
                                    <input class="form-control" id="name_of_places" name="name_of_places" placeholder="{{ __('md_medical_checkup_schedule.label_name_of_places') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label
                                        for="description">{{ __('md_medical_checkup_schedule.label_description') }}</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="{{ __('md_medical_checkup_schedule.label_description') }}"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button type="button" class="btn btn-primary" name="btn-submit" id="btn-submit" style="width: 150px;" >
                                {{ __('md_medical_checkup_schedule.btn_submit') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="div-form">
            <div class="modal fade" id="modal_employee_list">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-little">{{ __('md_medical_checkup_schedule.employee_list') }}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body table-responsive">
                            <div class="row" id="employee-list" style="gap: 8px;">
                            </div>
                            <table id="employee_list_table" class="display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('md_medical_checkup_schedule.employee_id') }}</th>
                                        <th>{{ __('md_medical_checkup_schedule.fullname') }}</th>
                                        <th>{{ __('md_medical_checkup_schedule.division') }}</th>
                                        <th>{{ __('md_medical_checkup_schedule.ranking') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>        
                                        <td></td>        
                                        <td></td>        
                                        <td></td>        
                                        <td></td>        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary w-25" data-dismiss="modal">{{ __('md_medical_checkup_schedule.btn_cancel') }}</button>
                            <button type="button" id="btn-save" class="btn btn-primary w-25" data-dismiss="modal">{{ __('md_medical_checkup_schedule.btn_save') }}</button>
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
                            <span class="title-text-notification">{{ __('md_medical_checkup_schedule.alert_success') }}</span>
                        </div>
                        <div class="div-title-notification">
                            <span id="message-notification-success"></span>
                        </div>
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
        let employeeList = []

        loadDataEmployeeNo();
        loadDataMCUName();

        $('#mcu_date').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#mcu_date_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        $('#mcu_time').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        $('input[type="file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });

        $('#mcu_name').on('change', function () {
            const selectedValue = $(this).val();
            if (selectedValue) {
                $('#batch_description').prop('disabled', false);
                loadDataBatchDescription(selectedValue);
            } else {
                $('#batch_description').prop('disabled', true);
                $('#batch_description').empty().trigger('change');
            }
        })

        $('#batch_description').on('change', function () {
            const selectedValue = $(this).select2('data');
            if (selectedValue.length > 0) {
                $('#number_of_stage').val(selectedValue[0].data.sequence);
                $('#batch_code_hidden').val(selectedValue[0].data.batchCode);
            } else {
                $('#number_of_stage').val('');
                $('#batch_code_hidden').val('');
            }
        })

        $('#btn-employee-list').click(()=> {
            $('#employee_list_table').DataTable().destroy();
            $('#employee_list_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url : "{{ url('medical/employee_list/table') }}"             
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lfrtip',
                'sPaginationType': 'full_numbers',
                "order": [[ 1, "asc" ]],
                columns: [
                    {
                        orderable: false,
                        targets: 0, 
                        "defaultContent": '',
                        render: function(data, type) {
                            return type === 'display'? '<button type="button"  class="btn btn-primary btn-klik" id="btnaja" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg></button>' : '';
                                }
                    },
                    {data: 'employeeNo', name: 'employeeNo'},
                    {data: 'fullName', name: 'fullName'},
                    {data: 'positionName', name: 'positionName'},
                    {data: 'rankingName', name: 'rankingName'},
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }, 
                
            });        
        })

        $('#employee_list_table tbody').on('click', '.btn-klik', function () {
            const table = $('#employee_list_table').DataTable();
            const rowData = table.row($(this).closest('tr')).data();
            const employeeNo = rowData.employeeNo
            const fullName = rowData.fullName

            if (!employeeList.find(emp => emp.employeeNo === employeeNo)) {
                employeeList.push({
                    employeeNo: employeeNo,
                    fullName: fullName
                });

                $('#employee-list').append(
                    `<span class="badge text-dark d-inline-flex align-items-center me-2" style="border: 1px solid #AAA; background-color: #E4E4E4;">
                        ${fullName}
                        <img style="cursor: pointer;" class="btn-remove-employee ms-2" width="16" height="16" src="{{ url('/icons/form/x-regular.svg') }}" alt="x" data-employee-no="${employeeNo}" />
                    </span>`
                );

                if ($('#employee_no').find("option[value='" + employeeNo + "']").length === 0) {
                    const newOption = new Option(fullName, employeeNo, true, true);
                    $('#employee_no').append(newOption).trigger('change');
                }
            }
        });

        $('#employee-list').on('click', '.btn-remove-employee', function () {
            const employeeNo = $(this).data('employee-no');

            const index = employeeList.findIndex(emp => emp.employeeNo === employeeNo);
            if (index > -1) employeeList.splice(index, 1);

            $(this).closest('span').remove();

            const selected = $('#employee_no').val().filter(val => val !== employeeNo);
            $('#employee_no').val(selected).trigger('change');
            $('#employee_no').find("option[value='" + employeeNo + "']").remove();
        });

        $('#employee_no').on('change', function () {
            const selectedValues = $(this).val() || [];

            selectedValues.forEach(employeeNo => {
                if (!employeeList.some(emp => emp.employeeNo === employeeNo)) {
                    const data = $('#employee_no').select2('data').find(emp => emp.id === employeeNo);
                    const fullName = data?.text || employeeNo;

                    employeeList.push({
                        employeeNo: employeeNo,
                        fullName: fullName
                    });

                    $('#employee-list').append(
                        `<span class="badge text-dark d-inline-flex align-items-center me-2" style="border: 1px solid #AAA; background-color: #E4E4E4;">
                            ${fullName}
                            <img class="btn-remove-employee ms-2" data-employee-no="${employeeNo}" style="cursor: pointer; width: 16px; height: 16px;" src="{{ url('/icons/form/x-regular.svg') }}" alt="x" />
                        </span>`
                    );
                }
            });

            $('#employee-list .btn-remove-employee').each(function () {
                const employeeNo = $(this).data('employee-no');
                if (!selectedValues.includes(employeeNo)) {
                    const index = employeeList.findIndex(emp => emp.employeeNo === employeeNo);
                    if (index > -1) employeeList.splice(index, 1);

                    $(this).closest('span').remove();
                }
            });
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
                        '<div class="col-6"><b>Full Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $employeeNo = $('#employee_no').select2({
                width: '100%',
                placeholder: 'Choose Employee No',
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

        function loadDataMCUName() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-12">' + data.data.activityName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#mcu_name').select2({
                width: '100%',
                placeholder: 'Choose MCU Name',
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
                    url: "{{ url('/medical_checkup_master/api') }}",
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
                                    text: item.activityName,
                                    id: item.activityCode,
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

        function loadDataBatchDescription(selectedVaccineType) {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-12">' + data.data.description + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#batch_description').select2({
                width: '100%',
                placeholder: 'Choose Batch Desciription',
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
                    url: "{{ url('/medical_checkup_master_detail/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term,
                            activityCode: selectedVaccineType
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.description,
                                    id: item.batchCode,
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

        $("#btn-submit").click(function () {
            $(this).prop("disabled", true);
            // $(this).html(
            //     '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            // );
            $("#medical_checkup_schedule_form").submit();
        });

        $("#btn-download-template").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                xhrFields: {
                    responseType: 'blob',
                },
                url: "{{ url('medical/medical_checkup_schedule/download_template') }}",
                type: "POST",
                success: function (result, status, xhr) {
                    $("#btn-download-template").prop("disabled", false);
                    $("#btn-download-template").html(
                        '<i class="fa fa-download"></i> {{ __('md_medical_checkup_schedule.btn_download_template') }}'
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
                    $("#btn-download-template").prop("disabled", false);
                    $("#btn-download-template").html(
                        '<i class="fa fa-download"></i> {{ __('md_medical_checkup_schedule.btn_download_template') }}'
                    );
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        if ($("#medical_checkup_schedule_form").length > 0) {
            $("#medical_checkup_schedule_form").validate({  
                rules: {
                    employee_no: {
                        required: true,
                    },
                    title: {
                        required: true,
                    },
                    name_of_places: {
                        required: true,
                    },
                    mcu_date: {
                        required: true,
                    },
                    mcu_time: {
                        required: true,
                    },
                },
                messages: {
                    employee_no: {
                        required: "{{ __('md_medical_checkup_schedule.label_employee_no_required') }}",
                    },
                    title: {
                        required: "{{ __('md_medical_checkup_schedule.label_title_required') }}",
                    },
                    name_of_places: {
                        required: "{{ __('md_medical_checkup_schedule.label_name_of_places_required') }}",
                    },
                    mcu_date: {
                        required: "{{ __('md_medical_checkup_schedule.label_mcu_date_required') }}",
                    },
                    mcu_time: {
                        required: "{{ __('md_medical_checkup_schedule.label_mcu_time_required') }}",
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
                    $("#btn-submit").prop("disabled", false);
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
                        url: "{{ url('medical/medical_checkup_schedule/proses') }}",
                        type: "POST",
                        data: $('#medical_checkup_schedule_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-submit").prop("disabled", false);                      
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('medical/medical_checkup') }}";
                                }, 3000);
                            } else {
                                $("#btn-submit").prop("disabled", false);
                                $("#btn-submit").html('<span> {{ __('md_medical_checkup_schedule.btn_submit') }} </span>');
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
                            $("#btn-submit").prop("disabled", false);
                            $("#btn-submit").html('<span> {{ __('md_medical_checkup_schedule.btn_submit') }} </span>');                    
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