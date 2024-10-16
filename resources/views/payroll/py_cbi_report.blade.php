<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_cbi_report.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.monthselect.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
    
    <style type="text/css">
        .div-payroll {
            max-width: 97%;
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

        .overlay {
            background: #e9e9e9;  
            display: none;       
            position: fixed;   
            top: 0;                  
            right: 0;               
            bottom: 0;
            left: 0;
            opacity: 0.5;
        }

        .div-loading {
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            position: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-link {
            color: #0F5289 !important;
        }

        .nav-link.active {
            background: none !important;
            font-family: 'Montserrat';
        }

        .nav-link.active::after {
            content: "";
            display: block;
            width: 100%;
            height: 3px;
            background-color: #0F5289;
            position: relative;
            bottom: -10px;
        }

        .box {
            border: 1px solid #CED4DA;
            border-radius: 8px;
            padding: 24px;
        }

        .center-ul {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .process-input {
            width: 100%;
            position: relative;
            height: 55px;
        }

        .select2, .select2-selection__rendered { 
            line-height: calc(1.5em + .5rem + 2px) !important; 
        } 
        
        .select2-container .select2-selection--single { 
            height: calc(1.5em + .5rem + 2px) !important; 
        } 
        
        .select2-selection__arrow { 
            height: calc(1.5em + .5rem + 2px) !important; 
        }

        .modal-header-authentication {
            border-bottom: 1px solid #eee;
            background-color: #004883;
            color: white;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .font-label {
            font-size: 12px !important;
        }
    </style>
</head>

<body>
    <div class="div-form">
        <div class="div-payroll">
            <div class="div-title">
                <a href="{{ route('payroll', ['moduleID' => 'PY']) }}" target="iframe_dashboard">
                    <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                    <span class="title-text">{{ __('payroll_cbi_report.judul') }}</span>
                </a>
            </div>
            <div class="tab-nav">
                <div class="center-ul">
                    <ul class="nav nav-pills mb-4" id="myTab" role="tablist">
                        <li class="nav-item" style="margin-left:0;">
                            <a class="nav-link active" id="cbi-report-tab" data-toggle="tab" href="#cbi_report" role="tab" aria-controls="cbi_report">{{ __('payroll_cbi_report.judul') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="cbi_report" role="tabpanel" aria-labelledby="cbi-report-tab">
                        <div class="row">
                            <div class="offset-md-2 col-12 col-md-8 box">
                                <form id="cbi_report_form" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="font-label" for="report_type">{{ __('payroll_cbi_report.label_report_type') }}</label>
                                                <select class="form-control select2 form-control-sm" id="report_type" name="report_type">
                                                    <option value="MEDICAL_REIMBURSEMENT_LIMIT">{{ __('payroll_cbi_report.label_medical_reimbursement_limit') }}</option>
                                                    <option value="UNUSED_LEAVE">{{ __('payroll_cbi_report.label_unused_leave') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="period" class="font-label">{{ __('payroll_cbi_report.label_period') }}</label>
                                                <input type="text" class="form-control form-control-sm" id="period" name="period"
                                                    placeholder="{{ __('payroll_cbi_report.label_period') }}">
                                            </div>
                                            <input type="hidden" class="form-control" id="period_hidden" name="period_hidden">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <button class="btn btn-primary btn-sm" name="btn-download" id="btn-download" style="width:100%;">
                                                <i class="fa fa-download"></i> {{ __('payroll_cbi_report.btn_download') }}
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <a class="btn btn-outline-primary btn-sm" href="{{ route('payroll', ['moduleID' => 'PY']) }}" target="iframe_dashboard"
                                                name="btn-cancel" id="btn-cancel" style="width: 100%;">
                                                <i class="fa fa-times-circle"></i> {{ __('payroll_cbi_report.btn_cancel') }}
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                        <span class="title-text-notification">{{ __('payroll_cbi_report.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay" id="notification_loading">
        <div class="div-loading">
            <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.13.2/pagination/ellipses.js"></script>
<script src="{{ asset('js/jquery.redirect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/flatpickr.monthselect.js') }}"></script>


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

        var arrData = @json($data);

        let pickerPeriod = $('#period').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            // defaultDate: "today",
            plugins: [
                new monthSelectPlugin({
                    shorthand: true, //defaults to false
                    dateFormat: "Y-m-01", //defaults to "F Y"
                    altFormat: "F Y", //defaults to "F Y"
                })
            ],
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        if (arrData) {
            pickerPeriod.setDate(moment(arrData[0].periodYear.toString() + "-" + arrData[0].periodMonth.toString().padStart(2,0) + "-01").format('YYYY-MM-DD'));
        }

        $('#btn-download').click(function (){
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            $('#cbi_report_form').submit();
        });

        if($('#cbi_report_form').length > 0){
            $('#cbi_report_form').validate({
                rules: {
                    period: {
                        required: true,
                    },
                    report_type: {
                        required: true,
                    },
                },
                messages: {
                    period: {
                        required: "{{ __('personel_employee_list.field_required') }}",
                    },
                    report_type: {
                        required: "{{ __('personel_employee_list.field_required') }}",
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
                    $('#btn-download').prop("disabled", false);
                    $('#btn-download').html(
                        '<i class="fa fa-download"></i> {{ __("payroll_cbi_report.btn_download") }}'
                    );

                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                submitHandler: function(form){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        xhrFields: {
                            responseType: 'blob',
                        },
                        url: "{{ url('payroll/cbi_report/print/excel') }}",
                        type: "POST",
                        data: $('#cbi_report_form').serialize(),
                        success: function(result, status, xhr){
                            $('#btn-download').prop("disabled", false);
                            $("#btn-download").html(
                                '<i class="fa fa-download"></i> {{ __("payroll_cbi_report.btn_download") }}'
                            );
                            
                            var disposition = xhr.getResponseHeader('content-disposition');
                            var matches = /"([^"]*)"/.exec(disposition);
                            var filename = (matches != null && matches[1] ? matches[1] : 'noname_file.xlsx');

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
                        error: function(response){
                            $('#btn-download').prop("disabled", false);
                            $("#btn-download").html(
                                '<i class="fa fa-download"></i> {{ __("payroll_cbi_report.btn_download") }}'
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