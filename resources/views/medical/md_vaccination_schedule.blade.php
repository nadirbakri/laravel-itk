<!DOCTYPE html>
<html>
<head>
    <title>{{ __('md_vaccination_schedule.judul') }}</title>
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
                <div style="display: flex; width: 100%; justify-content: space-between; align-items: center; padding: 0px 0px 20px 20px;">
                    <div style="display: flex; justify-content: flex-start; align-items: center;">
                        <div class="div-title">
                            <a href="{{ route('medical', ['moduleID' => 'MD']) }}" target="iframe_dashboard" style="display: flex; align-items: center; text-decoration: none; gap: 10px;">
                                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back" style="display: inline-block;">
                                <span class="title-text" style="white-space: nowrap;">{{ __('md_vaccination_schedule.list') }}</span>
                            </a>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: flex-end; align-items: center;">
                        <a href="vaccination_schedule_history" style="text-decoration: none;">
                            <button type="button" class="btn btn-secondary" id="btn-history">
                                <i class="fa fa-history" aria-hidden="true"></i> {{ __('md_vaccination_schedule.btn_history') }}
                            </button>
                        </a>
                    </div>
                </div>
                <div class="tab-input">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" role="tab" aria-controls="import" aria-selected="true" href="#import-tab">{{ __('md_vaccination_schedule.label_import') }}</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" role="tab" aria-controls="manual-input" aria-selected="false" href="#manual-input-tab">{{ __('md_vaccination_schedule.label_manual_input') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="tab-content">
                    <div class="tab-pane fade show active" id="import-tab" role="tabpanel" aria-labelledby="import-tab">
                        <form id="vaccination_schedule_import_form" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="file">{{ __('md_vaccination_schedule.label_file') }}</label>
                                        <span class="required">*</span>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file" name="file" onchange="handleFileUpload(this)">
                                            <label class="custom-file-label" for="file">{{ __('md_vaccination_schedule.label_file') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <button type="button" class="btn btn-primary" name="btn-process" id="btn-process" style="width: 100%;">
                                        <i class="fa fa-play-circle-o"></i> {{ __('md_vaccination_schedule.btn_process') }}
                                    </button>
                                </div>
                                <div class="col-3">
                                    <button type="button" class="btn btn-primary" name="btn-download-template" id="btn-download-template" style="width: 100%;">
                                        <i class="fa fa-download"></i> {{ __('md_vaccination_schedule.btn_download_template') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    
                    <div class="tab-pane fade" id="manual-input-tab" role="tabpanel" aria-labelledby="manual-input-tab">
                        <form id="vaccination_schedule_form" method="post">
                        @csrf
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label
                                            for="title">{{ __('md_vaccination_schedule.label_title') }}</label>
                                        <span class="required">*</span>
                                        <input class="form-control" id="title" name="title" maxlength="20" placeholder="{{ __('md_vaccination_schedule.label_title') }}">
                                        <small style="color: #49507D">The word should not exceed 20 characters.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label
                                            for="vaccine_name">{{ __('md_vaccination_schedule.label_vaccine_name') }}</label>
                                        <span class="required">*</span>
                                        <select class="form-control select2" id="vaccine_name" name="vaccine_name"></select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label
                                            for="batch_description">{{ __('md_vaccination_schedule.label_batch_description') }}</label>
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
                                            for="number_of_dose">{{ __('md_vaccination_schedule.label_number_of_dose') }}</label>
                                        <input type="number" class="form-control" id="number_of_dose" name="number_of_dose" placeholder="{{ __('md_vaccination_schedule.label_number_of_dose') }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="vaccine_date">{{ __('md_vaccination_schedule.label_vaccine_date') }}</label>
                                        <span class="required">*</span>
                                        <div class="input-group">
                                            <input type="text" class="form-control vaccine_date" id="vaccine_date" name="vaccine_date"
                                                placeholder="{{ __('md_vaccination_schedule.label_vaccine_date') }}">
                                            <div class="input-group-prepend vaccine_date_calendar" id="vaccine_date_calendar">
                                                <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="vaccine_time">{{ __('md_vaccination_schedule.label_vaccine_time') }}</label>
                                            <span class="required">*</span>
                                            <div class='input-group'>
                                                <input type="text" class="form-control vaccine_time" id="vaccine_time" name="vaccine_time"
                                                    placeholder="{{ __('md_vaccination_schedule.label_vaccine_time') }}">                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label
                                            for="employee_no">{{ __('md_vaccination_schedule.label_employee_no') }}</label>
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
                                            for="name_of_places">{{ __('md_vaccination_schedule.label_name_of_places') }}</label>
                                        <span class="required">*</span>
                                        <input class="form-control" id="name_of_places" name="name_of_places" placeholder="{{ __('md_vaccination_schedule.label_name_of_places') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label
                                            for="description">{{ __('md_vaccination_schedule.label_description') }}</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="{{ __('md_vaccination_schedule.label_description') }}"></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr style="margin: 0px 30px 0px 30px" />
                            {{-- <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; padding: 20px 30px;">
                                <h5>{{ __('md_vaccination_schedule.header_detail_vaccine_dose') }}</h5> --}}
                                {{-- <button type="button" class="btn btn-secondary" name="btn-add-dose" id="btn-add-dose" style="width: 150px;" >
                                    <i class="fa fa-plus"></i> {{ __('md_vaccination_schedule.btn_add_dose') }}
                                </button> --}}
                            {{-- </div> --}}
                            {{-- <div class="row" id="dose-container">
                                <div class="col-6 box-dose" id="box-dose" style="margin-bottom: 20px" data-index="0">
                                    <div style="border-radius: 16px; border: 1px solid #CED4DA; padding: 20px;">
                                        <div style="display: flex; justify-content: space-between">
                                            <div class="dropdown">
                                                <select class="form-control select2 vaccine_dose" id="vaccine_dose_1" name="detailVaccine[1][dose]">
                                                    <option value="1">{{ __('md_vaccination_schedule.header_dose') }} 1</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="vaccine_date_1">{{ __('md_vaccination_schedule.label_vaccine_date') }}</label>
                                                    <span class="required">*</span>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control vaccine_date" id="vaccine_date_1" name="detailVaccine[1][date]"
                                                            placeholder="{{ __('md_vaccination_schedule.label_vaccine_date') }}">
                                                        <div class="input-group-prepend vaccine_date_calendar" id="vaccine_date_calendar">
                                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="vaccine_time_1">{{ __('md_vaccination_schedule.label_vaccine_time') }}</label>
                                                        <span class="required">*</span>
                                                        <div class='input-group'>
                                                            <input type="text" class="form-control vaccine_time" id="vaccine_time_1" name="detailVaccine[1][time]"
                                                                placeholder="{{ __('md_vaccination_schedule.label_vaccine_time') }}">                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="different_name_of_places_description_1" name="detailVaccine[1][flagDifferentPlace]" value="true">
                                                        <label for="different_name_of_places_description_1">{{ __('md_vaccination_schedule.label_different_name_of_places_description') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="dose-input-1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-3">
                                    <button type="button" class="btn btn-primary" name="btn-submit" id="btn-submit" style="width: 100%;" >
                                        {{ __('md_vaccination_schedule.btn_submit') }}
                                    </button>
                                <div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <div class="div-form">
            <div class="modal fade" id="modal_employee_list">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-little">{{ __('md_vaccination_schedule.employee_list') }}</h4>
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
                                        <th>{{ __('md_vaccination_schedule.employee_id') }}</th>
                                        <th>{{ __('md_vaccination_schedule.fullname') }}</th>
                                        <th>{{ __('md_vaccination_schedule.division') }}</th>
                                        <th>{{ __('md_vaccination_schedule.ranking') }}</th>
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
                            <button type="button" class="btn btn-secondary w-25" data-dismiss="modal">{{ __('md_vaccination_schedule.btn_cancel') }}</button>
                            <button type="button" id="btn-process" class="btn btn-primary w-25" data-dismiss="modal">{{ __('md_vaccination_schedule.btn_save') }}</button>
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
                            <span class="title-text-notification">{{ __('md_vaccination_schedule.alert_success') }}</span>
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

    function handleFileUpload(input) {
        const file = input.files[0];
        const allowedExtensions = /(\.xls|\.xlsx|\.xml)$/i;
        
        if (file) {
            if (!allowedExtensions.exec(file.name)) {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('Upload file in .xls, .xlsx, or .xml');

                input.value = '';
                return false;
            }
        }
    }
    
    $(document).ready(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        let employeeList = []

        loadDataEmployeeNo();
        loadDataVaccineType();

        $('.vaccine_date').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".vaccine_date_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        $('.vaccine_time').flatpickr({
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

        $('#vaccine_name').on('change', function () {
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
                $('#number_of_dose').val(selectedValue[0].data.sequence);
                $('#batch_code_hidden').val(selectedValue[0].data.batchCode);
            } else {
                $('#number_of_dose').val('');
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

        $('.dropdown-item').on('click', function(e) {
            e.preventDefault();
            var selectedText = $(this).data('value');
            $('#dropdownDose').text(selectedText);
        });

        let childCounter = 1;

        // function updateDoseOptions() {
        //     let options = '';
        //     for (let i = 1; i <= childCounter; i++) {
        //         options += `<option value="${i}">{{ __('md_vaccination_schedule.header_dose') }} ${i}</option>`;
        //     }

        //     $(".vaccine_dose").each(function () {
        //         const currentVal = $(this).val();
        //         $(this).html(options);
        //         $(this).val(currentVal);
        //     });
        // }

        // function newDetailDose() {
        //     let options = '';
        //     for (let i = 1; i <= childCounter; i++) {
        //         options += `<option value="${i}">{{ __('md_vaccination_schedule.header_dose') }} ${i}</option>`;
        //     }

        //     const index = $(".box-dose").length + 1;

        //     let newBox = `
        //         <div class="col-6 box-dose" id="box-dose" style="margin-bottom: 20px" data-index="${index}">
        //             <div style="border-radius: 16px; border: 1px solid #CED4DA; padding: 20px;">
        //                 <div style="display: flex; justify-content: space-between">
        //                     <div class="dropdown">
        //                         <select class="form-control select2 vaccine_dose" id="vaccine_dose_${index}" name="detailVaccine[${index}][dose]">
        //                             ${options}
        //                         </select>
        //                     </div>
        //                     <img style="cursor: pointer;" class="btn-remove" id="btn-remove-${index}" src="{{ url('/icons/form/x-regular.svg') }}" alt="x" />
        //                 </div>
        //                 <div class="row">
        //                     <div class="col-6">
        //                         <div class="form-group">
        //                             <label for="vaccine_date_${index}">{{ __('md_vaccination_schedule.label_vaccine_date') }}</label>
        //                             <span class="required">*</span>
        //                             <div class="input-group">
        //                                 <input type="text" class="form-control vaccine_date" id="vaccine_date_${index}" name="detailVaccine[${index}][date]"
        //                                     placeholder="{{ __('md_vaccination_schedule.label_vaccine_date') }}">
        //                                 <div class="input-group-prepend vaccine_date_calendar" id="vaccine_date_calendar">
        //                                     <span class="input-group-text"><span class="fa fa-calendar"></span></span>
        //                                 </div>
        //                             </div>
        //                         </div>
        //                     </div>
        //                     <div class="col-6">
        //                         <div class="form-group">
        //                             <label for="vaccine_time_${index}">{{ __('md_vaccination_schedule.label_vaccine_time') }}</label>
        //                             <span class="required">*</span>
        //                             <div class='input-group'>
        //                                 <input type="text" class="form-control vaccine_time" id="vaccine_time_${index}" name="detailVaccine[${index}][time]"
        //                                     placeholder="{{ __('md_vaccination_schedule.label_vaccine_time') }}">                                        
        //                             </div>
        //                         </div>
        //                     </div>
        //                     <div class="col-12">
        //                         <div class="form-group">
        //                             <div class="form-check">
        //                                 <input class="form-check-input" type="checkbox" id="different_name_of_places_description_${index}" name="detailVaccine[${index}][flagDifferentPlace]" value="true">
        //                                 <label for="different_name_of_places_description_${index}">{{ __('md_vaccination_schedule.label_different_name_of_places_description') }}</label>
        //                             </div>
        //                         </div>
        //                     </div>
        //                     <div class="row" id="dose-input-${index}">
        //                     </div>
        //                 </div>
        //             </div>
        //         </div>
        //     `
        //     $("#dose-container").append(newBox);
        //     updateDoseOptions();

        //     $('.vaccine_date').flatpickr({
        //         altInput: true,
        //         allowInput: true,
        //         altFormat: "d-M-Y",
        //         dateFormat: "Y-m-d",
        //         onReady: function () {
        //             var flatPickrInstance = this;
        //             var $flatPickrInput = $(flatPickrInstance.element);
        //             $flatPickrInput.siblings(".vaccine_date_calendar").click(function () {
        //                 flatPickrInstance.toggle();
        //             });
        //         }
        //     });

        //     $('.vaccine_time').flatpickr({
        //         enableTime: true,
        //         noCalendar: true,
        //         altInput: true,
        //         allowInput: true,
        //         time_24hr: true,
        //         minuteIncrement: 1,
        //         defaultDate: "today",
        //         altFormat: "H:i",
        //         dateFormat: "H:i:ss"
        //     });

        //     addValidationRules(index)
        // }

        // function syncDetailDoseToInput(targetCount) {
        //     const currentCount = $(".box-dose").length;

        //     if (targetCount > currentCount) {
        //         for (let i = currentCount + 1; i <= targetCount; i++) {
        //             childCounter++;
        //             newDetailDose();
        //         }
        //     } else if (targetCount < currentCount) {
        //         for (let i = currentCount; i > targetCount; i--) {
        //             $(".box-dose").last().remove();
        //             childCounter--;
        //         }
        //     }

        //     updateDoseOptions();
        // }

        // $("#number_of_dose").on('input', function () {
        //     const val = parseInt($(this).val(), 10) || 1;
        //     syncDetailDoseToInput(val);
        // })

        // $("#btn-add-dose").click(function () {
        //     childCounter++;
        //     newDetailDose();
        //     $("#number_of_dose").val(childCounter); 
        // });

        // $('#dose-container').on('change', '[id^=different_name_of_places_description_]', function () {
        //     var id = $(this).attr('id');
        //     var index = id.split('_').pop();
        //     var target = '#dose-input-' + index;

        //     if ($(this).is(':checked')) {
        //         $(target).empty().append(
        //             `<div class="col-12">
        //                 <div class="form-group">
        //                     <label for="name_of_places_${index}">{{ __('md_vaccination_schedule.label_name_of_places') }}</label>
        //                     <span class="required">*</span>
        //                     <input type="text" class="form-control" id="name_of_places_${index}" name="detailVaccine[${index}][address]"
        //                         placeholder="{{ __('md_vaccination_schedule.label_name_of_places') }}">
        //                 </div>
        //             </div>
        //             <div class="col-12">
        //                 <div class="form-group">
        //                     <label for="description_${index}">{{ __('md_vaccination_schedule.label_description') }}</label>
        //                     <input type="text" class="form-control" id="description_${index}" name="detailVaccine[${index}][description]"
        //                         placeholder="{{ __('md_vaccination_schedule.label_description') }}">
        //                 </div>
        //             </div>`
        //         );
        //     } else {
        //         $(target).empty();
        //     }
        // });

        // $(document).on("click", ".btn-remove", function () {
        //     $(this).closest(".col-6").remove();
        //     childCounter = $(".box-dose").length;
        //     $("#number_of_dose").val(childCounter);
        //     updateDoseOptions();
        // });

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

        // function addValidationRules(index) {
        //     $("#vaccination_schedule_form").validate().settings.rules[`detailVaccine[${index}][date]`] = { required: true };
        //     $("#vaccination_schedule_form").validate().settings.rules[`detailVaccine[${index}][time]`] = { required: true };
        //     $("#vaccination_schedule_form").validate().settings.rules[`detailVaccine[${index}][address]`] = { required: true };

        //     $("#vaccination_schedule_form").validate().settings.messages[`detailVaccine[${index}][date]`] = { required: "{{ __('md_vaccination_schedule.label_vaccine_date_required') }}" };
        //     $("#vaccination_schedule_form").validate().settings.messages[`detailVaccine[${index}][time]`] = { required: "{{ __('md_vaccination_schedule.label_vaccine_time_required') }}" };
        //     $("#vaccination_schedule_form").validate().settings.messages[`detailVaccine[${index}][address]`] = { required: "{{ __('md_vaccination_schedule.label_name_of_places_required') }}" };
        // }

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

        function loadDataVaccineType() {
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

            $('#vaccine_name').select2({
                width: '100%',
                placeholder: 'Choose Vaccine Name',
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
                    url: "{{ url('/vaccine_master/api') }}",
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
                    url: "{{ url('/vaccine_master_detail/api') }}",
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
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#vaccination_schedule_form").submit();
        });

        $("#btn-process").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#vaccination_schedule_import_form").submit();
        });

        if ($("#vaccination_schedule_import_form").length > 0) {
            $("#vaccination_schedule_import_form").validate({
                rules: {
                    file: {
                        required: true,
                    },
                },
                messages: {
                    file: {
                        required: "{{ __('md_vaccination_schedule.label_file_required') }}",
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
                       '<i class="fa fa-play-circle-o"></i> {{ __("md_vaccination_schedule.btn_process") }}'
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

                    var myform = document.getElementById("vaccination_schedule_import_form");
                    var formdata = new FormData(myform);

                    $.ajax({
                        url: "{{ url('medical/vaccination_schedule/import') }}",
                        type: "POST",
                        processData: false,
                        contentType: false,
                        data: formdata,
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-process").prop("disabled",
                                    false);
                                $("#btn-process").html(
                                    '<i class="fa fa-play-circle-o"></i> {{ __("md_vaccination_schedule.btn_process") }}'
                                );
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                }, 3000);
                            } else {
                                $("#btn-process").prop("disabled",
                                    false);
                                $("#btn-process").html(
                                    '<i class="fa fa-play-circle-o"></i> {{ __("md_vaccination_schedule.btn_process") }}'
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
                                '<i class="fa fa-play-circle-o"></i> {{ __("md_vaccination_schedule.btn_process") }}'
                            );
                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }

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
                url: "{{ url('medical/vaccination_schedule/download_template') }}",
                type: "POST",
                success: function (result, status, xhr) {
                    $("#btn-download-template").prop("disabled", false);
                    $("#btn-download-template").html(
                        '<i class="fa fa-download"></i> {{ __('md_vaccination_schedule.btn_download_template') }}'
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
                        '<i class="fa fa-download"></i> {{ __('md_vaccination_schedule.btn_download_template') }}'
                    );
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        if ($("#vaccination_schedule_form").length > 0) {
            $("#vaccination_schedule_form").validate({  
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
                    vaccine_name: {
                        required: true,
                    },
                    // 'detailVaccine[1][date]': {
                    //     required: true,
                    // },
                    // 'detailVaccine[1][time]': {
                    //     required: true,
                    // },
                    // 'detailVaccine[1][address]': {
                    //     required: true,
                    // },
                },
                messages: {
                    employee_no: {
                        required: "{{ __('md_vaccination_schedule.label_employee_no_required') }}",
                    },
                    title: {
                        required: "{{ __('md_vaccination_schedule.label_title_required') }}",
                    },
                    name_of_places: {
                        required: "{{ __('md_vaccination_schedule.label_name_of_places_required') }}",
                    },
                    vaccine_name: {
                        required: "{{ __('md_vaccination_schedule.label_vaccine_name_required') }}",
                    },
                    // 'detailVaccine[1][date]': {
                    //     required: "{{ __('md_vaccination_schedule.label_vaccine_date_required') }}",
                    // },
                    // 'detailVaccine[1][time]': {
                    //     required: "{{ __('md_vaccination_schedule.label_vaccine_time_required') }}",
                    // },
                    // 'detailVaccine[1][address]': {
                    //     required: "{{ __('md_vaccination_schedule.label_name_of_places_required') }}",
                    // },
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                    $("#btn-submit").prop("disabled", false);
                    $("#btn-submit").html('<span> {{ __('md_vaccination_schedule.btn_submit') }} </span>');
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
                        url: "{{ url('medical/vaccination_schedule/proses') }}",
                        type: "POST",
                        data: $('#vaccination_schedule_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-submit").prop("disabled", false);                      
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('medical/vaccination_schedule') }}";
                                }, 3000);
                            } else {
                                $("#btn-submit").prop("disabled", false);
                                $("#btn-submit").html('<span> {{ __('md_vaccination_schedule.btn_submit') }} </span>');
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
                            $("#btn-submit").html('<span> {{ __('md_vaccination_schedule.btn_submit') }} </span>');                    
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