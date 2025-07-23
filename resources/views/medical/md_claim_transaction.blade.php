<!DOCTYPE html>
<html>

<head>
    <title>{{ __('md_claim_transaction.judul') }}</title>
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
        
        .attachment {
            display: flex; 
            flex-direction: column; 
            height: 112px; 
            cursor: pointer;
            border-radius: 8px; 
            border: 1.5px dashed #1A7AD0; 
            align-items: center; 
            justify-content: center;
            padding: 16px 12px;
        }

        .attachment:hover {
            background-color: #F5F9FF;
        }

        .file_input {
            font-family: Montserrat;
            font-size: 12px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            letter-spacing: -0.09px;
            display: flex; 
            height: 54px;
            border-radius: 8px; 
            border: 1px solid #CED4DA;
            align-items: center; 
            justify-content: space-between;
            padding: 10px 12px;
        }

    </style>
</head>

<body>
    <div class="div-medical">
        <div class="div-title">
            <a href="{{ url()->previous() }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('md_claim_transaction.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="claim_transaction_form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
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
                            <label for="employee_no">{{ __('md_claim_transaction.label_employee_no') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="employee_no" name="employee_no"></select>
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_name">{{ __('md_claim_transaction.label_employee_name') }}</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name"
                                placeholder="{{ __('md_claim_transaction.label_employee_name') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="medical_type_1">{{ __('md_claim_transaction.label_medical_type_1') }}</label>
                            <span class="required">*</span>
                            <select class="form-control" id="medical_type_1" name="medical_type_1"
                                placeholder="{{ __('md_claim_transaction.label_medical_type_1') }}"> </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="amount_of_type_1">{{ __('md_claim_transaction.label_amount_of_type_1') }}</label>
                            <span class="required">*</span>
                            <input type="number" class="form-control amount_of_type" inputmode="numeric" id="amount_of_type_1" name="amount_of_type_1"
                                placeholder="{{ __('md_claim_transaction.label_amount_of_type_1') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="medical_type_2">{{ __('md_claim_transaction.label_medical_type_2') }}</label>
                            <select class="form-control" id="medical_type_2" name="medical_type_2"
                                placeholder="{{ __('md_claim_transaction.label_medical_type_2') }}"> </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="amount_of_type_2">{{ __('md_claim_transaction.label_amount_of_type_2') }}</label>
                            <input type="number" class="form-control amount_of_type" inputmode="numeric" id="amount_of_type_2" name="amount_of_type_2"
                                placeholder="{{ __('md_claim_transaction.label_amount_of_type_2') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="claim_for">{{ __('md_claim_transaction.label_claim_for') }}</label>
                            <span class="required">*</span>
                            <select class="form-control" id="claim_for" name="claim_for"
                                placeholder="{{ __('md_claim_transaction.label_claim_for') }}"> </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="dependent_name">{{ __('md_claim_transaction.label_dependent_name') }}</label>
                            <select class="form-control" id="dependent_name" name="dependent_name"
                                placeholder="{{ __('md_claim_transaction.label_dependent_name') }}"> </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="currency">{{ __('md_claim_transaction.label_currency') }}</label>
                            <input type="text" class="form-control" id="currency" name="currency" value="IDR"
                                placeholder="{{ __('md_claim_transaction.label_currency') }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="total_claim_amount">{{ __('md_claim_transaction.label_total_claim_amount') }}</label>
                            <input type="text" class="form-control" id="total_claim_amount" name="total_claim_amount"
                                placeholder="{{ __('md_claim_transaction.label_total_claim_amount') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="reimbursement_remarks">{{ __('md_claim_transaction.label_reimbursement_remarks') }}</label>
                            <span class="required">*</span>
                            <textarea rows="4" type="text" class="form-control" id="reimbursement_remarks" name="reimbursement_remarks" placeholder="{{ __('md_claim_transaction.label_reimbursement_remarks') }}"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="attachment">{{ __('md_claim_transaction.label_attachment') }}</label>
                            <span class="required">*</span>
                            <input type="file" id="attachment_input" name="attachments[]" multiple style="display: none;">
                            <div class="form-control attachment" id="attachment" name="attachment">
                                <div style="border-radius: 100px; background: #E8F2FA; padding: 8px;">
                                    <img src="{{ url('/icons/form/cloud-arrow-up-regular.svg') }}" alt="Image Upload">
                                </div>
                                <p style="color: #1A7AD0">Upload or drag files to upload</p>
                            </div>
                            <small class="text-muted">(File Extension: PNG, IMG)</small>
                        </div>
                    </div>
                </div>
                <div class="row files">
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-submit" id="btn-submit"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('md_claim_transaction.btn_submit') }}
                        </button>
                    </div>
                    {{-- <div class="col-3">
                        <a class="btn btn-outline-primary" href="{{ url('medical/claim_transaction') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('md_claim_transaction.btn_cancel') }}
                        </a>
                    </div> --}}
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
<script src="{{ asset('js/jquery.redirect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/flatpickr.monthselect.js') }}"></script>
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

        let claimDate = $('#claim_date').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
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
            altFormat: "d-M-Y",
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

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('medical/claim_transaction') }}";
        });

        $('#employee_no').on("select2:select", function (e) {
            var data = $('#employee_no').select2('data');
            $('#employee_name').val(data[0].data.fullName);
            loadDataDependentName(data[0].id);
            loadDataMedicalType(data[0].id)
        });

        $('#employee_no').on("select2:unselecting", function (e) {
            $('#employee_name').val('');
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

        $('.amount_of_type').on('input', function (e) {
            let total = 0;
            $('.amount_of_type').each(function () {
                const value = parseFloat($(this).val());
                if (!isNaN(value)) {
                    total += value;
                }
            });
            $('#total_claim_amount').val(total.toLocaleString('en-US'));
        })

        let selectedFiles = [];

        $('#attachment').on('dragover', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).css('background-color', '#F5F9FF');
        });

        $('#attachment').on('dragleave', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).css('background-color', '#FFFFF');
        });

        $('#attachment').on('drop', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).css('background-color', '#FFFFF');
            
            let files = Array.from(e.originalEvent.dataTransfer.files);
            handleFiles(files);
        });

        $('#attachment_input').on('change', function () {
            let files = Array.from(this.files);
            handleFiles(files)
        });

        function handleFiles(files) {
            const allowedTypes = ['image/png', 'image/jpeg'];

            const validFiles = files.filter(file => allowedTypes.includes(file.type));
            
            if (validFiles.length !== files.length) {
                alert('Please input files in jpg or png format!');
            }

            selectedFiles = [...selectedFiles, ...validFiles];
            updateFileInput();
            displayFiles();
        }

        function displayFiles() {
            $('.files').empty();
            
            if (selectedFiles.length > 0) {
                selectedFiles.forEach((file, index) => {
                    const reader = new FileReader();
                    const fileId = 'file-' + Date.now() + '-' + index;

                    reader.onload = function (e) {
                        const imageUrl = e.target.result;

                        $('.files').append(
                            $(`<div class="col-12" id="${fileId}">
                                <div class="file_input" style="margin-bottom: 8px; display: flex; align-items: center; gap: 12px;">
                                    <div style="width: 32px; height: 32px; border-radius: 6px; overflow: hidden;">
                                        <img src="${imageUrl}" alt="${file.name}" style="width: 100%; height: 100%; object-fit: cover;" />
                                    </div>
                                    <div style="display: flex; flex-direction: column; flex-grow: 1;">
                                        <p style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">${file.name}</p>
                                    </div>
                                    <div style="cursor: pointer;" class="remove-file" data-index="${index}">
                                        <img src="{{ url('/icons/form/x-circle-fill.svg') }}" alt="X">
                                    </div>
                                </div>
                            </div>`)
                        );

                        $(`#${fileId} .remove-file`).on('click', function() {
                            const indexToRemove = $(this).data('index');
                            selectedFiles.splice(indexToRemove, 1);
                            updateFileInput();
                            displayFiles();
                        });
                    };

                    reader.readAsDataURL(file);
                });
            }
        }

        function updateFileInput() {
            const dataTransfer = new DataTransfer();
            
            selectedFiles.forEach(file => {
                dataTransfer.items.add(file);
            });
            
            $('#attachment_input')[0].files = dataTransfer.files;
        }

        $('#attachment').on('click', function() {
            $('#attachment_input').click();
        });

        $('#attachment_input').on('change', function () {
            console.log(this.files); // Harus terlihat di browser
        });

        loadDataEmployeeNo();
        loadDataClaimFor();
        loadDataClaimCurrency();

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
                                    text: item.employeeNo,
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

        function loadDataMedicalType(empId = null) {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-12">' + data.data.plafonDescription + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $employeeNo = $('#medical_type_1, #medical_type_2').select2({
                width: '100%',
                placeholder: 'Choose Medical Type',
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
                    url: "{{ url('/medical_type/api') }}",
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
                                    text: item.plafonDescription,
                                    id: item.plafonCode,
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
                    url: "{{ url('/claim_for/api') }}",
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
                        '<div class="col-12">' + data.data.familyName + '</div>' +
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
                    url: "{{ url('/dependent_name/api') }}",
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
                                    text: item.familyName,
                                    id: item.familyName,
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
                        '<div class="col-6">' + data.data.comGenCode + '</div>' +
                        '<div class="col-6">' + data.data.value + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#claim_currency').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Currency Code</b></div>' +
                        '<div class="col-6"><b>Description</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

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
                    url: "{{ url('/rate_type/api') }}",
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

        $("#btn-submit").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#claim_transaction_form").submit();
        });

        if ($("#claim_transaction_form").length > 0) {
            $("#claim_transaction_form").validate({
                rules: {
                    receipt_date: {
                        required: true,
                    },
                    claim_date: {
                        required: true,
                    },
                    employee_no: {
                        required: true,
                    },
                    medical_type_1: {
                        required: true,
                    },
                    amount_of_type_1: {
                        required: true,
                    },
                    claim_for: {
                        required: true,
                    },
                    reimbursement_remarks: {
                        required: true,
                    },
                    'attachments[]': {
                        required: true,
                    },
                },
                messages: {
                    receipt_date: {
                        required: "{{ __('md_claim_transaction.receipt_date_required') }}",
                    },
                    claim_date: {
                        required: "{{ __('md_claim_transaction.claim_date_required') }}",
                    },
                    employee_no: {
                        required: "{{ __('md_claim_transaction.employee_no_required') }}",
                    },
                    medical_type_1: {
                        required: "{{ __('md_claim_transaction.medical_type_1_required') }}",
                    },
                    amount_of_type_1: {
                        required: "{{ __('md_claim_transaction.amount_of_type_1_required') }}",
                    },
                    claim_for: {
                        required: "{{ __('md_claim_transaction.claim_for_required') }}",
                    },
                    reimbursement_remarks: {
                        required: "{{ __('md_claim_transaction.reimbursement_remarks_required') }}",
                    },
                    'attachments[]': {
                        required: "{{ __('md_claim_transaction.attachment_required') }}",
                    },
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                    $("#btn-submit").prop("disabled", false);
                    $("#btn-submit").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("md_claim_transaction.btn_submit") }}'
                    );
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    $("#btn-submit").prop("disabled", false);
                    $("#btn-submit").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("md_claim_transaction.btn_submit") }}'
                    );

                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                submitHandler: function (form) {
                    const fileInput = $('#attachment_input');
                    const files = fileInput.get(0).files;

                    if (files.length === 0) {
                        fileInput.addClass('is-invalid');

                        if (fileInput.next('span.invalid-feedback').length === 0) {
                            fileInput.after('<span class="invalid-feedback d-block">{{ __("md_claim_transaction.attachment_required") }}</span>');
                        }

                        $("#btn-submit").prop("disabled", false);
                        $("#btn-submit").html(
                            '<i class="fa fa-floppy-o"></i> {{ __("md_claim_transaction.btn_submit") }}'
                        );

                        return false;
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var myform = document.getElementById("claim_transaction_form");
                    var formdata = new FormData(myform);

                    $.ajax({
                        url: "{{ url('medical/claim_transaction/proses') }}",
                        type: "POST",
                        processData: false,
                        contentType: false,
                        data: formdata,
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-submit").prop("disabled", false);
                                $("#btn-submit").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("md_claim_transaction.btn_submit") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('medical/claim_transaction') }}";
                                }, 3000);
                            } else {
                                $("#btn-submit").prop("disabled", false);
                                $("#btn-submit").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("md_claim_transaction.btn_submit") }}'
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
                            $("#btn-submit").prop("disabled", false);
                            $("#btn-submit").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("md_claim_transaction.btn_submit") }}'
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