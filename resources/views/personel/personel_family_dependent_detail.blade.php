<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_family_dependent.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-personel {
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

    </style>
</head>

<body>
    <div class="div-personel">
        <div class="div-title">
            <a href="{{ url()->previous() }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('personel_family_dependent.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="family_dependent_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="employee_no">{{ __('personel_family_dependent.label_employee_no') }}</label>
                            <input type="text" class="form-control" id="employee_no" name="employee_no" placeholder="{{ __('personel_family_dependent.label_employee_no') }}" readonly>
                            <input type="hidden" class="form-control" id="record_function" name="record_function">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="employee_name">{{ __('personel_family_dependent.label_employee_name') }}</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="{{ __('personel_family_dependent.label_employee_name') }}" readonly>
                        </div>
                    </div>
                    <div class="col-4">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="full_name">{{ __('personel_family_dependent.label_full_name') }}</label>
                            <span class="required">*</span>
                            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="{{ __('personel_family_dependent.label_full_name') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="birth_date form-check-label">{{ __('personel_family_dependent.label_birth_date') }}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="birth_date" name="birth_date"
                                    placeholder="{{ __('personel_family_dependent.label_birth_date') }}">
                                <div class="input-group-prepend" id="birth_date_calendar">
                                    <span class="input-group-text" id="birth_date"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="birth_place">{{ __('personel_family_dependent.label_birth_place') }}</label>
                            <select class="form-control select2" id="birth_place" name="birth_place"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="gender">{{ __('personel_family_dependent.label_gender') }}</label>
                            <select class="form-control select2" id="gender" name="gender"></select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="occupation">{{ __('personel_family_dependent.label_occupation') }}</label>
                            <input type="text" class="form-control" id="occupation" name="occupation"
                                placeholder="{{ __('personel_family_dependent.label_occupation') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="blood_type">{{ __('personel_family_dependent.label_blood_type') }}</label>
                            <select class="form-control select2" id="blood_type" name="blood_type"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="family_card_number">{{ __('personel_family_dependent.label_family_card_number') }}</label>
                            <input type="text" class="form-control" id="family_card_number" name="family_card_number"
                                placeholder="{{ __('personel_family_dependent.label_family_card_number') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="relationship">{{ __('personel_family_dependent.label_relationship') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="relationship" name="relationship"></select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="phone_number">{{ __('personel_family_dependent.label_phone_number') }}</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                placeholder="{{ __('personel_family_dependent.label_phone_number') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    id="emergency_contact"
                                    name="emergency_contact" value="true">
                                <label class="form-check-label"
                                    for="emergency_contact">{{ __('personel_family_dependent.label_emergency_contact') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    id="persons_with_disabilities"
                                    name="persons_with_disabilities" value="true">
                                <label class="form-check-label"
                                    for="persons_with_disabilities">{{ __('personel_family_dependent.label_persons_with_disabilities') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    id="include_tax"
                                    name="include_tax" value="true">
                                <label class="form-check-label"
                                    for="include_tax">{{ __('personel_family_dependent.label_include_tax') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    id="full_time_student"
                                    name="full_time_student" value="true">
                                <label class="form-check-label"
                                    for="full_time_student">{{ __('personel_family_dependent.label_full_time_student') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    id="include_medical"
                                    name="include_medical" value="true">
                                <label class="form-check-label"
                                    for="include_medical">{{ __('personel_family_dependent.label_include_medical') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('personel_family_dependent.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" href="{{ url('personnel/family_dependent/detail_table') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('personel_family_dependent.btn_cancel') }}
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
                        <span class="title-text-notification">{{ __('personel_family_dependent.alert_success') }}</span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
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
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        loadDataBirthPlace()
        loadDataGender()
        loadDataBloodType()
        loadDataRelation()

        let pickerBirthDate = $('#birth_date').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            onReady: function () {
                var flatPickrInstance = this;
                // console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#birth_date_calendar").click(function () {
                    flatPickrInstance.togge();
                });
            }
        });

        if (func == 'new') {
            $('#record_function').val("New");
            $('#employee_no').val(arrData.employeeNo);
            $('#employee_name').val(arrData.employeeName);
            $('#full_name').val("");
            pickerBirthDate.clear();
            $('#birth_place').val("");
            $('#gender').val(null).trigger('change');
            $('#occupation').val("");
            $('#blood_type').val(null).trigger('change');
            $('#family_card_number').val("");
            $('#relationship').val(null).trigger('change');
            $('#phone_number').val("");
        } else if (func == 'edit') {
            $('#record_function').val("Edit");
            $('#employee_no').val(arrData.employeeNo);
            $('#employee_name').val(arrData.employeeName);
            $('#full_name').val(arrData.familyName);
            pickerBirthDate.setDate(arrData.birthDate);
            $('#occupation').val(arrData.occupation);
            $('#family_card_number').val(arrData.familyCardNumber);
            $('#phone_number').val(arrData.handPhone);
            
            arrData.disability === 'true' ? $('#emergency_contact').val(true) : $('#emergency_contact').val(false);
            arrData.disability === 'true' ? $('#persons_with_disabilities').val(true) : $('#persons_with_disabilities').val(false);
            arrData.flagPayroll === 'true' ? $('#include_tax').val(true) : $('#include_tax').val(false);
            arrData.fullTimeStudent === 'true' ? $('#full_time_student').val(true) : $('#full_time_student').val(false);
            arrData.flagMedical === 'true' ? $('#include_medical').val(true) : $('#include_medical').val(false);
            
            $.ajax({
                type: 'GET',
                url: "{{ url('/city/personal_data/api') }}",
                data: {
                    'birthPlace': ((typeof arrData.birthPlace !== 'undefined') ? arrData.birthPlace : '')
                }
            }).then(function (data) {
                var option = new Option(data.data_birth_place.cityCode, data.data_birth_place.cityCode, true, true);

                $('#birth_place').append(option).trigger('change');

                $('#birth_place').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_birth_place.cityCode,
                        text: data.data_birth_place.cityCode,
                        data: data.data_birth_place
                    }
                });
            });

            $.ajax({
                type: 'GET',
                url: "{{ url('/comgen/api') }}",
                data: {
                    'gender': ((typeof arrData.gender !== 'undefined') ? arrData.gender : ''),
                    'bloodType': ((typeof arrData.bloodType !== 'undefined') ? arrData.bloodType : ''),
                    'relationCode': ((typeof arrData.relationCode !== 'undefined') ? arrData.relationCode : ''),
                }
            }).then(function (data) {
                var option_gender = new Option(data.data_gender.comGenCode, data.data_gender.comGenCode, true, true);
                var option_blood_type = new Option(data.data_blood_type.comGenCode, data.data_blood_type.comGenCode, true, true);
                var option_relation_code = new Option(data.data_relation_code.comGenCode, data.data_relation_code.comGenCode, true, true);

                $('#gender').append(option_gender).trigger('change');

                $('#gender').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_gender.comGenCode,
                        text: data.data_gender.comGenCode,
                        data: data.data_gender
                    }
                });

                $('#blood_type').append(option_blood_type).trigger('change');

                $('#blood_type').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_blood_type.comGenCode,
                        text: data.data_blood_type.comGenCode,
                        data: data.data_blood_type
                    }
                });

                $('#relationship').append(option_relation_code).trigger('change');

                $('#relationship').trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_relation_code.comGenCode,
                        text: data.data_relation_code.comGenCode,
                        data: data.data_relation_code
                    }
                });
            });
        }

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('personnel/family_dependent/detail_table') }}";
        })

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#family_dependent_form").submit();
            // var form = $("#family_dependent_form");
            // var emptyFields = form.find("input").filter(function () {
            //     return $(this).prop("required") && $(this).val().trim() === "";
            // });

            // if (emptyFields.length > 0) {
            //     $('#notification_error').modal('show');
            //     $('#message-notification-error').html("Some Field Are Required, Please Check Again");
            // }else{
            //     $(this).prop("disabled", true);
            //     $(this).html(
            //         '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            //     );

            //     form.submit();
            // }
        });

        function loadDataBirthPlace(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.cityName + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#birth_place').select2({
                width: '100%',
                placeholder: 'Choose Birth Place',
                allowClear: true,
                // dropdownParent: $('#modal_add_family_dependent_data .modal-content'),
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
                    url: "{{ url('/city/api') }}",
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
                                    text: item.cityCode,
                                    id: item.cityCode,
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

        function loadDataGender(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#gender').select2({
                width: '100%',
                placeholder: 'Choose Gender',
                allowClear: true,
                minimumResultsForSearch: Infinity,
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
                    url: "{{ url('/gender/api') }}",
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
                                    text: item.comGenCode,
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

        function loadDataBloodType(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#blood_type').select2({
                width: '100%',
                placeholder: 'Choose Blood Type',
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
                    url: "{{ url('/blood/api') }}",
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
                                    text: item.comGenCode,
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

        function loadDataRelation(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#relationship').select2({
                width: '100%',
                placeholder: 'Choose Relationship',
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
                    url: "{{ url('/relation/api') }}",
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

        if ($("#family_dependent_form").length > 0) {
            $("#family_dependent_form").validate({
                rules: {
                    full_name: {
                        required: true,
                    },
                    relationship: {
                        required: true,
                    },
                },
                messages: {
                    full_name: {
                        required: "{{ __('personel_family_dependent.full_name_required') }}",
                    },
                    relationship: {
                        required: "{{ __('personel_family_dependent.relationship_required') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_family_dependent.btn_save") }}'
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
                        url: "{{ url('personnel/family_dependent/proses') }}",
                        type: "POST",
                        data: $('#family_dependent_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_family_dependent.btn_save") }}'
                                );
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('personnel/family_dependent/detail_table') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_family_dependent.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_family_dependent.btn_save") }}'
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
