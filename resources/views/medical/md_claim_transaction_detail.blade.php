<!DOCTYPE html>
<html>

<head>
    <title>{{ __('md_claim_transaction.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/medical_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-medical {
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
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .modal-header-notification-success {
            border-bottom: 1px solid #eee;
            background-color: #00a862;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
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
    <div class="div-medical">
        <div class="div-title">
            <a href="{{ url('medical/claim_transaction') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('md_claim_transaction.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="claim_transaction_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_no">{{ __('md_claim_transaction.label_employee_no') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="employee_no" name="employee_no" disabled></select>
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                        <input type="hidden" class="form-control" id="employee_no_det" name="employee_no_det">
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="claim_date">{{ __('md_claim_transaction.label_claim_date') }}</label>
                            <span class="required">*</span>
                            <div class="input-group">
                                <input type="text" class="form-control" id="claim_date" name="claim_date"
                                    placeholder="{{ __('md_claim_transaction.label_claim_date') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="claim_date_calendar"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="seq_no">{{ __('md_claim_transaction.label_seq_no') }}</label>
                            <input type="text" class="form-control" id="seq_no" name="seq_no"
                                placeholder="{{ __('md_claim_transaction.label_seq_no') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="claim_to">{{ __('md_claim_transaction.label_claim_to') }}</label>
                            <select class="form-control" id="claim_to" name="claim_to"
                                placeholder="{{ __('md_claim_transaction.label_claim_to') }}"> </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="receipt_date">{{ __('md_claim_transaction.label_receipt_date') }}</label>
                            <span class="required">*</span>
                            <div class="input-group">
                                <input type="text" class="form-control" id="receipt_date" name="receipt_date"
                                    placeholder="{{ __('md_claim_transaction.label_receipt_date') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="receipt_date_calendar"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="claim_for">{{ __('md_claim_transaction.label_claim_for') }}</label>
                            <select class="form-control" id="claim_for" name="claim_for"
                                placeholder="{{ __('md_claim_transaction.label_claim_for') }}"> </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="dependent_name">{{ __('md_claim_transaction.label_dependent_name') }}</label>
                            <select class="form-control" id="dependent_name" name="dependent_name"
                                placeholder="{{ __('md_claim_transaction.label_dependent_name') }}" disabled> </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="claim_currency">{{ __('md_claim_transaction.label_claim_currency') }}</label>
                            <select class="form-control" id="claim_currency" name="claim_currency"
                                placeholder="{{ __('md_claim_transaction.label_claim_currency') }}"> </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="claim_code">{{ __('md_claim_transaction.label_claim_code') }}</label>
                            <select class="form-control" id="claim_code" name="claim_code"
                                placeholder="{{ __('md_claim_transaction.label_claim_code') }}"> </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="claim_amount">{{ __('md_claim_transaction.label_claim_amount') }}</label>
                            <input type="number" class="form-control" min="0" id="claim_amount" name="claim_amount"
                                placeholder="{{ __('md_claim_transaction.label_claim_amount') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="disease_code">{{ __('md_claim_transaction.label_disease_code') }}</label>
                            <select class="form-control" id="disease_code" name="disease_code"
                                placeholder="{{ __('md_claim_transaction.label_disease_code') }}"> </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="claim_remarks">{{ __('md_claim_transaction.label_claim_remarks') }}</label>
                            <input type="text" class="form-control" id="claim_remarks" name="claim_remarks"
                                placeholder="{{ __('md_claim_transaction.label_claim_remarks') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="claim_status">{{ __('md_claim_transaction.label_claim_status') }}</label>
                            <input type="text" class="form-control" id="claim_status" name="claim_status"
                                placeholder="{{ __('md_claim_transaction.label_claim_status') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('md_claim_transaction.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-primary" href="{{ url('medical/claim_transaction') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('md_claim_transaction.btn_cancel') }}
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
                        <span class="title-text-notification">{{ __('md_claim_transaction.alert_success') }}</span>
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
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var func = "{{ $func }}";

        let claimDate = $('#claim_date').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#claim_date_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let receiptDate = $('#receipt_date').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#receipt_date_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        if (func == 'new') {
            $('#record_function').val("New");
            $('#employee_no').val(null).trigger('change');
            $('#employee_no_det').val("");
            $('#seq_no').val("");
            $('#claim_to').val(null).trigger('change');
            $('#claim_for').val(null).trigger('change');
            $('#dependent_name').val(null).trigger('change');
            $('#claim_currency').val(null).trigger('change');
            $('#claim_code').val(null).trigger('change');
            $('#claim_amount').val("0");
            $('#disease_code').val(null).trigger('change');
            $('#claim_remarks').val("");
            $('#claim_status').val("N");
            claimDate._input.removeAttribute('readonly');
            $('#seq_no').prop('readonly', false);
            $('#employee_no').attr("disabled", false);
        } else if (func == 'edit') {
            $('#record_function').val("Edit");
            $.ajax({
                type: 'GET',
                url: '/employee_no/req_detail/api',
                data: {
                    'employeeNo' : "{{ isset($data[0]->employeeNo) ? $data[0]->employeeNo : '' }}"
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2
                    .employeeNo).text(data2.fullName);
                $("#employee_no").append($newOption).trigger('change');
                $('#employee_no_det').val(data2.employeeNo);
                loadDataDependentName(data2.employeeNo);
            });
            claimDate.setDate("{{ isset($data[0]->claimDate) ? $data[0]->claimDate : '' }}");
            $('#seq_no').val("{{ isset($data[0]->seqNo) ? $data[0]->seqNo : '' }}");
            $.ajax({
                type: 'GET',
                url: '/claim_to/func/api',
                data: {
                    'claimTo' : "{{ isset($data[0]->claimTo) ? $data[0]->claimTo : '' }}"
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .comGenCode).text(data2[0].value);
                $("#claim_to").append($newOption).trigger('change');
            });
            receiptDate.setDate("{{ isset($data[0]->receiptDate) ? $data[0]->receiptDate : '' }}");
            $.ajax({
                type: 'GET',
                url: '/claim_for/func/api',
                data: {
                    'claimFor' : "{{ isset($data[0]->claimFor) ? $data[0]->claimFor : '' }}"
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .comGenCode).text(data2[0].value);
                $("#claim_for").append($newOption).trigger('change');
            });
            $.ajax({
                type: 'GET',
                url: '/dependents/func/api',
                data: {
                    'employeeNo' : "{{ isset($data[0]->employeeNo) ? $data[0]->employeeNo : '' }}",
                    'dependentName' : "{{ isset($data[0]->dependentName) ? $data[0]->dependentName : '' }}"
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .dependentName).text(data2[0].dependentName);
                $("#dependent_name").append($newOption).trigger('change');
            });
            $.ajax({
                type: 'GET',
                url: '/rate_type/func/api',
                data: {
                    'transactionRateTypeCode' : "{{ isset($data[0]->claimCurrencyCoe) ? $data[0]->claimCurrencyCoe : '' }}"
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .comGenCode).text(data2[0].value);
                $("#claim_currency").append($newOption).trigger('change');
            });
            $.ajax({
                type: 'GET',
                url: '/claim_code/func/api',
                data: {
                    'claimCode' : "{{ isset($data[0]->claimCode) ? $data[0]->claimCode : '' }}"
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .claimCode).text(data2[0].claimCode);
                $("#claim_code").append($newOption).trigger('change');
            });
            $('#claim_amount').val("{{ isset($data[0]->claimAmount) ? $data[0]->claimAmount : '' }}");
            $.ajax({
                type: 'GET',
                url: '/disease_code/func/api',
                data: {
                    'diseaseCode' : "{{ isset($data[0]->diseaseCode) ? $data[0]->diseaseCode : '' }}"
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .diseaseCode).text(data2[0].diseaseCode);
                $("#disease_code").append($newOption).trigger('change');
            });
            $('#claim_remarks').val("{{ isset($data[0]->claimRemarks) ? $data[0]->claimRemarks : '' }}");
            $('#claim_status').val("{{ isset($data[0]->claimStatus) ? $data[0]->claimStatus : '' }}");
            $('#employee_no').attr("disabled", true); 
            claimDate._input.setAttribute("readonly", "readonly");
            $('#seq_no').prop('readonly', true);
        }

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('medical/claim_transaction') }}";
        });

        $('#employee_no').on("select2:select", function (e) {
            var data = $('#employee_no').select2('data');
            $('#employee_no_det').val(data[0].id);
            loadDataDependentName(data[0].id);
        });

        $('#employee_no').on("select2:unselecting", function (e) {
            $('#employee_no_det').val('');
            // loadDataDependentName();
            $("#dependent_name").select2("destroy").select2();
            // $('#dependent_name').val(null).trigger('change');
        });

        $('#claim_for').on("change", function (e) {
            var data = $(this).val();
            if(data == "F"){
                $('#dependent_name').attr("disabled", false); 
            }else{
                $('#dependent_name').attr("disabled", true); 
            }
        });

        loadDataEmployeeNo();
        loadDataClaimTo();
        loadDataClaimFor();
        loadDataClaimCurrency();
        loadDataClaimCode();
        loadDataDiseaseCode();

        function loadDataEmployeeNo() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Employee No</b></div>' +
                        '<div class="col-6"><b>Employee Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.employeeNo + '</div>' +
                        '<div class="col-6">' + data.data.fullName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

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
                    url: '/employee_no/api',
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

        function loadDataClaimTo() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-12">' + data.data.value + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $employeeNo = $('#claim_to').select2({
                width: '100%',
                placeholder: 'Choose Claim To',
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
                    url: '/claim_to/api',
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

        function loadDataClaimFor() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-12">' + data.data.value + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $employeeNo = $('#claim_for').select2({
                width: '100%',
                placeholder: 'Choose Claim For',
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
                    url: '/claim_for/api',
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

        function loadDataDependentName(empId = null) {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-12">' + data.data.dependentName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $employeeNo = $('#dependent_name').select2({
                width: '100%',
                placeholder: 'Choose Dependent Name',
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
                    url: '/dependents/api',
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term,
                            employeeNo: empId
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.dependentName,
                                    id: item.dependentName,
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

        function loadDataClaimCurrency() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Currency Code</b></div>' +
                        '<div class="col-6"><b>Description</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.comGenCode + '</div>' +
                        '<div class="col-6">' + data.data.value + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $claimCode = $('#claim_currency').select2({
                width: '100%',
                placeholder: 'Choose Claim Currency',
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
                    url: '/rate_type/api',
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

        function loadDataClaimCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Claim Code</b></div>' +
                        '<div class="col-6"><b>Claim Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.claimCode + '</div>' +
                        '<div class="col-6">' + data.data.claimName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $claimCode = $('#claim_code').select2({
                width: '100%',
                placeholder: 'Choose Claim Code',
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
                    url: '/claim_code/api',
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
                                    text: item.claimCode,
                                    id: item.claimCode,
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

        function loadDataDiseaseCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Disease Code</b></div>' +
                        '<div class="col-6"><b>Description</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.diseaseCode + '</div>' +
                        '<div class="col-6">' + data.data.description + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $claimCode = $('#disease_code').select2({
                width: '100%',
                placeholder: 'Choose Disease Code',
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
                    url: '/disease_code/api',
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
                                    id: item.diseaseCode,
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
            $("#claim_transaction_form").submit();
        });

        if ($("#claim_transaction_form").length > 0) {
            $("#claim_transaction_form").validate({
                rules: {
                    employee_no: {
                        required: true,
                    },
                    seq_no: {
                        required: true,
                    },
                    claim_date: {
                        required: true,
                    },
                },
                messages: {
                    employee_no: {
                        required: "{{ __('md_claim_transaction.employee_no_required') }}",
                    },
                    seq_no: {
                        required: "{{ __('md_claim_transaction.seq_no_required') }}",
                    },
                    claim_date: {
                        required: "{{ __('md_claim_transaction.claim_date_required') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("md_claim_transaction.btn_save") }}'
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
                        url: "{{ url('medical/claim_transaction/proses') }}",
                        type: "POST",
                        data: $('#claim_transaction_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("md_claim_transaction.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('medical/claim_transaction') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("md_claim_transaction.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("md_claim_transaction.btn_save") }}'
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