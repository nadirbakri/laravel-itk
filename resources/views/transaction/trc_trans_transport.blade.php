<!DOCTYPE html>
<html>
<head>
    <title>{{ __('trans_transport.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
    <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-trans-medical {
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

        .detailstatus h5{
            font-size: 16px;
        }
        .approve h5{
            font-size: 18px;
        }
        .detailstatus input{
            outline: none;
        }
    </style>
</head>

<body>
    <div class="div-form">
        <form id="trans_medical_form" method="post">
            @csrf
            <div class="div-trans-medical">
                <div class="div-title">
                    <a href="javascript:void(0);" onclick="goBackWithModuleID()" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('trans_transport.judul') }}</span>
                    </a>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_from form-check-label">{{ __('trans_transport.label_claim_date_start') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_from" name="claim_date_from"
                                placeholder="{{ __('trans_transport.label_claim_date_start') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="claim_date_from_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="claim_date_from_hidden" name="claim_date_from_hidden" hidden>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_to form-check-label">{{ __('trans_transport.label_claim_date_end') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_to" name="claim_date_to"
                                placeholder="{{ __('trans_transport.label_claim_date_end') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="claim_date_to_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="claim_date_to_hidden" name="claim_date_to_hidden" hidden>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="reimbursement_type form-check-label">{{ __('trans_transport.label_transport_type') }}</label>
                        </div>
                        <select class="form-control select2" id="reimbursement_type" name="reimbursement_type"></select>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="business_unit form-check-label">{{ __('trans_transport.label_business_unit') }}</label>
                        </div>
                        <select class="form-control select2" id="business_unit" name="business_unit"></select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="transport_status form-check-label">{{ __('trans_transport.label_transport_status') }}</label>
                        </div>
                        <select class="form-control select2" id="transport_status" name="transport_status"></select>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                                <label for="direct_superior form-check-label">Employee No</label>
                        </div>
                                <input type="text" class="form-control" id="direct_superior" name="direct_superior" placeholder="employee-no">
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="processed_date form-check-label">{{ __('trans_transport.label_processed_date') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="processed_date" name="processed_date"
                                placeholder="{{ __('trans_transport.label_processed_date') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="processed_date_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="processed_date_hidden" name="processed_date_hidden" hidden></div>
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary" name="btn-search" id="btn-search" value="preview" style="width: 100%;">
                            <img src="{{ url('icons/mob/button/button-search.svg') }}" alt="export"> {{ __('trans_transport.btn_search') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-upload" id="btn-upload"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_upload">
                        <i class="fa fa-plus"></i>{{ __('trans_transport.btn_upload') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-list" id="btn-list"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_list_mass_leave">
                        <i class="fa fa-plus"></i> {{ __('trans_transport.btn_list') }}
                        </button>
                    </div>
                </div>
<br>
                <!-- TABLE -->
                <div class="card">
                   
                <div class="row">
                    <div class="col-6">
                        <p><b>{{ __('trans_transport.list_table') }}</b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table id="medical_table" class="display table-striped table-hover dt-responsive display nowrap" cellspacing="10">
                            <thead>
                                <tr>
                                        <th>{{ __('trans_transport.detail') }}</th>
                                        <th>{{ __('trans_transport.rdate') }}</th>
                                        <th>{{ __('trans_transport.status') }}</th>
                                        <th>{{ __('trans_transport.tnom') }}</th>
                                        <th>{{ __('trans_transport.name') }}</th>
                                        <th>{{ __('trans_transport.type') }}</th>
                                        <th>{{ __('trans_transport.cname') }}</th>
                                        <th>{{ __('trans_transport.sloc') }}</th>
                                        <th>{{ __('trans_transport.eloc') }}</th>
                                        <th>{{ __('trans_transport.treq') }}</th>
                                        <th>{{ __('trans_transport.tpaid') }}</th>
                                        <th>{{ __('trans_transport.remarks') }}</th>
                                        <th>{{ __('trans_transport.parking') }}</th>
                                        <th>{{ __('trans_transport.tol') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                </div>
                

            </div>
        </form>
    </div>

    <div class="div-form">
        <div class="modal fade" id="modal_list_mass_leave">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-little">{{ __('trans_transport.luser') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table id="example" class="display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('trans_transport.employee') }}</th>
                                <th>{{ __('trans_transport.fname') }}</th>
                                <th>{{ __('trans_transport.division') }}</th>
                                <th>{{ __('trans_transport.ranking') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                {{-- <td>#</td>         --}}
                                <td>
                                    
                                </td>        
                                <td></td>        
                                <td></td>        
                                <td></td>        
                                <td></td>        
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>

                
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_list_detail">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-little">{{ __('trans_transport.dtransport') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update_approval_medical_history_form" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row detailstatus">
                            <div class="col-3  ">
                                <h5>{{ __('trans_transport.reqdate') }}</h5>
                            </div>
                            <div class="col-3">
                                <input id="reqdate" name="reqdate" type="hidden" class="form-control" readonly>
                                <input id="directsuperior" name="directsuperior" type="hidden" class="form-control" readonly>
                                <span id="reqdate_val"></span>
                            </div>
                            <div class="col-3">
                                <h5>{{ __('trans_transport.rdate') }}</h5>
                            </div>
                            <div class="col-3">
                                <input id="recdate" name="recdate" type="hidden" class="form-control" readonly><span id="recdate_val"></span>
                            </div>
                        </div>

                        <div class="row detailstatus">
                            <div class="col-3">
                                <h5>{{ __('trans_transport.tnom') }}</h5>
                            </div>
                            <div class="col-3">
                                <input id="tiketno" name="tiketno" type="hidden" class="form-control" readonly><span id="tiketno_val"></span>
                            </div>
                            <div class="col-3">
                                <h5>{{ __('trans_transport.status') }}</h5>
                            </div>
                            <div class="col-3">
                                <input id="status" name="status" type="hidden" class="form-control" readonly><span id="status_val"></span>
                            </div>
                        </div>

                        <div class="row detailstatus">
                            <div class="col-3">
                                <h5>{{ __('trans_transport.label_business_unit') }}</h5>
                            </div>
                            <div class="col-3">
                                <input id="b_unit" name="b_unit" type="hidden" class="form-control" readonly><span id="b_unit_val"></span>
                            </div>
                            <div class="col-3">
                                <h5>{{ __('trans_transport.type') }}</h5>
                            </div>
                            <div class="col-3">
                                <input id="c_type" name="c_type" type="hidden" class="form-control" readonly><span id="c_type_val"></span>
                            </div>
                        </div>

                        <div class="row detailstatus">
                            <div class="col-3">
                                <h5>{{ __('trans_transport.ename') }}</h5>                                    
                            </div>
                            <div class="col-3">
                                <input id="employee_no" name="employee_no" type="hidden" class="form-control" readonly><span id="employee_no_val"></span>
                            </div>
                            <div class="col-3">
                                <h5>{{ __('trans_transport.pname') }}</h5>
                            </div>
                            <div class="col-3">
                                <input type="hidden" class="form-control" id="project_name" name="project_name" readonly><span id="project_name_val"></span>
                            </div>
                        </div>
                    
                        <div class="row detailstatus">
                            <div class="col-3">
                                <h5>{{ __('trans_transport.treq') }}</h5>
                            </div>
                            <div class="col-3">
                                <input type="hidden" id="totalclaim" name="totalclaim" class="form-control" readonly><span id="totalclaim_val"></span>
                            </div>
                            <div class="col-3">
                                <h5>{{ __('trans_transport.dname') }}</h5>
                            </div>
                            <div class="col-3">
                                <input type="hidden" class="form-control" id="dependent" name="dependent" readonly><span id="dependent_val"></span>
                            </div>
                        </div>
                        <br>
                        <div class="row approve">
                            <div class="col-3">
                                <h5>{{ __('trans_transport.status') }}</h5>
                            </div>
                            <div class="col-5">
                                    <select name="reimbursement_status" id="reimbursement_status" class="custom-select">
                                        <option value="APPROVED">{{ __('trans_transport.approve') }}</option>
                                        <option value="REJECTED">{{ __('trans_transport.reject') }}</option>
                                        <option value="PAID">{{ __('trans_transport.paid') }}</option>
                                    </select>
                            </div>
                        </div>
                        <div class="row approve">
                            <div class="col-3">
                                <h5>{{ __('trans_transport.tpaid') }}</h5>
                            </div>
                            <div class="col-5">
                                <input id="totalpaid" name="totalpaid"  type="text" class="form-control" >
                            </div>
                        </div>
                        <div class="row approve">
                            <div class="col-3">
                                <h5>{{ __('trans_transport.remarks') }}</h5>
                            </div>
                            <div class="col-5">
                                <input id="approvalremarks" name="approvalremarks"  type="text" class="form-control" id="claim_date_from" name="claim_date_from" >
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-primary btn-block" id="btn-update" type="button">{{ __('trans_transport.update') }}</button>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>
        

    <div class="div-form">
        <form id="upload_paid_overtime_form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="modal_upload">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                   <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-little">{{ __('trans_transport.upaid') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive">
                        <div class="card">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="medical_history form-check-label"><b>{{ __('trans_transport.ftransport') }}</b></label>
                                        <input type="file" name="file_overtime" id="file_overtime">
                                    <br> <br>
                                    <button type="submit" class="btn btn-process" name="btn-process" id="btn-process">
                                        {{ __('trans_transport.btn_upload') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                </div>
            </div>
        </form>
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
     {{-- if status false --}}
     <div class="modal fade" role="dialog" id="notification_update_data_fail">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification-error">
                    <h5 class="modal-title">Update Data Failed!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="message-notification-update-data-fail"></span>
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
                        <span class="title-text-notification">{{ __('trans_transport.alert_success') }}</span>
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
    
    $(document).ready(function () {
        $('table.display').DataTable({
            scrollX: true
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        initDatePicker();
    });

    function initDatePicker() {
        $('.input-group input').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
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
    var table = null;
    function load_data_medical_history(claim_date_from, claim_date_to, direct_superior, reimbursement_type, business_unit, processed_date, status) {
        // console.log(claim_date_from)
            table = $('#medical_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url : "{{ url('trans/transport/table') }}",
                    data: {
                        'startDate': claim_date_from,
                        'endDate': claim_date_to,
                        'processDate' : processed_date,
                        'type' : reimbursement_type,
                        'businessUnit' : business_unit,
                        'employeeNo' : direct_superior,
                        'status' : status

                    }
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
                            return type === 'display'? '<button type="button" onclick="klikdetail(this)" class="btn btn-info" name="btn-detail" id="btn-detail" style="width: 100%;" data-toggle="modal" data-target="#modal_list_detail"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/></svg> {{ __('trans_medical.detail') }} </button>' : '';
                        }
                    },
                    {data: 'transportEntity.receiptDate', name: 'transportEntity.receiptDate', 
                            render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {data: 'transportEntity.status', name: 'transportEntity.status'},
                    {data: 'transportEntity.ticketNo', name: 'transportEntity.ticketNo'},
                    {data: 'transportEntity.fullnameRequester', name: 'transportEntity.fullnameRequester'},
                    {data: 'transportEntity.type', name: 'transportEntity.type'},
                    // {data: 'transportEntity.companyCostumer', name: 'companyCostumer'},
                    {data: 'transportEntity.customerName', name: 'transportEntity.customerName'},
                    {data: 'transportEntity.startLocation', name: 'transportEntity.startLocation'},
                    {data: 'transportEntity.endLocation', name: 'transportEntity.endLocation'},
                    {data: 'transportEntity.totalAmount', name: 'transportEntity.totalAmount'},
                    {data: 'transportEntity.paidAmount', name: 'transportEntity.paidAmount'},
                    {data: 'transportEntity.remarks', name: 'transportEntity.remarks'},
                    {data: 'transportEntity.amountParkir', name: 'transportEntity.amountParkir'},
                    {data: 'transportEntity.amountToll', name: 'transportEntity.amountToll'},
                    // {
                    //     data: 'leaveBalanceBeforeExpiredDate', 
                    //     name: 'leaveBalanceBeforeExpiredDate',
                    //     render: function (data, type, row) {
                    //         return moment(data).format('DD-MMM-YYYY');
                    //     }
                    // }
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }
            });

            $("#btn-search").prop("disabled", true);
            $("#btn-search").html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'

            );

            

            $("#btn-search").prop("disabled", false);
            $("#btn-search").html(
                "<img src={{ url('icons/mob/button/button-search.svg') }} alt='export'> {{ __('trans_transport.btn_search') }}"
            );
        }

        $("#trans_medical_form").submit((e)=>{
            e.preventDefault();

            var claim_date_from = $("#claim_date_from").val();
            var claim_date_to = $("#claim_date_to").val();
            var direct_superior = $("#direct_superior").val();
            var reimbursement_type = $("#reimbursement_type").val();
            var business_unit = $("#business_unit").val();
            var processed_date = $("#processed_date").val();
            var status = $("#transport_status").val();

            // $("#btn-search").prop("disabled", true);
            // $("#btn-search").html(
            //     '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            // );

            $('#medical_table').DataTable().destroy();
            load_data_medical_history(claim_date_from, claim_date_to, direct_superior, reimbursement_type, business_unit, processed_date, status);
    })
    const klikdetail = (element) => {
        let data = table.row($(element).parent()).data().transportEntity;

        $('#reqdate').val(data.createdDate)
        $('#reqdate_val').html(data.createdDate)
        $('#recdate').val(data.receiptDate)
        $('#recdate_val').html(data.receiptDate)
        $('#tiketno').val(data.ticketNo)
        $('#tiketno_val').html(data.ticketNo)
        $('#status').val(data.status)
        $('#status_val').html(data.status)
        $('#b_unit').val(data.business_unit)
        $('#b_unit_val').html(data.business_unit)
        $('#employee_no').val(data.employeeNo)
        $('#employee_no_val').html(data.fullnameRequester + '(' + data.employeeNo + ')')
        $('#c_type').val(data.type)
        $('#c_type_val').html(data.type)
        $('#totalclaim').val(data.totalAmount)
        $('#totalclaim_val').html(data.totalAmount)
        $('#approvalremarks').val(data.approvalRemarks)
        $('#totalpaid').val(data.paidAmount)
        $('#reimbursement_status').val(data.status).trigger('change')
        $('#project_name').val(data.projectName)
        $('#project_name_val').html(data.projectName)
        $('#directsuperior').val(data.directSuperiorID)
    }

    $('#btn-list').click(()=> {
        $('#example').DataTable().destroy();
        table2 = $('#example').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: {
                url : "{{ url('transaction/list/table') }}"             
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
                        return type === 'display'? '<button type="button"  onclick="klik(this)" class="btn btn-primary" id="btnaja" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg></button>' : '';
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
    
    const klik = (element) => {
        let employee_id = $(element).parent().siblings('.sorting_1').text()
        $('#direct_superior').val(employee_id)

        $('.close').click();
    }

</script>
<script>
    $('#btn-update').click(()=>{
        let reimbursement_status = $('#reimbursement_status').val();
        let totalpaid = $('#totalpaid').val();
        let ticketNo = $('#tiketno').val();
        let direct_superior = $("#directsuperior").val();
        let approvalremarks = $("#approvalremarks").val();
        // alert(totalpaid)
        $('.close').click();
        update_data(reimbursement_status,totalpaid,ticketNo,direct_superior,approvalremarks)
    })

    function update_data(reimbursement_status, totalpaid, ticketNo,direct_superior,approvalremarks){
        $.ajax({
            url: "{{ url('trans/update_transport/table') }}",
            type: "get",
            data: {
                'status': reimbursement_status,
                'paidAmount': totalpaid,
                'ticketNo' : ticketNo,
                'employeeNo' : direct_superior,
                'approvalRemarks' : approvalremarks
            },
            success: function (response) {
                        if (response.status == "true") {
                            $("#btn-update").prop("disabled", false);
                            $("#btn-update").html(
                                // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_update") }}'
                                'Update'
                            );
                            
                            $('#notification_success').modal('show');
                            $('#message-notification-success').html(response
                                .message);
                            setTimeout(function () {
                                window.location =
                                    "{{ url('transaction/transaction_transport') }}";
                            }, 3000);
                        } else{
                        $("#btn-update").prop("disabled", false);
                        $("#btn-update").html(
                            // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_process") }}'
                            'Update'
                        );
                        
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response
                            .message);
                        setTimeout(function () {
                            window.location =
                                "{{ url('transaction/transaction_transport') }}";
                        }, 3000);
                    }
                },
                error: function (response) {
                $("#btn-update").prop("disabled", false);
                $("#btn-update").html(
                    // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_process") }}'
                    'Update'
                );

                $('#notification_error').modal('show');
                $('#message-notification-error').html(response);
            }
        });
    }
</script>
<script>
$("#btn-process").click(function () {
    $(this).prop("disabled", true);
    $(this).html(
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
    );
    $("#upload_paid_overtime_form").submit();
});

$('#notification_success').on('hide.bs.modal', function () {
    window.location = "{{ url('transaction/transaction_transport') }}";
});

if ($("#upload_paid_overtime_form").length > 0) {
    $("#upload_paid_overtime_form").validate({
        submitHandler: function (form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var myForm = document.getElementById('upload_paid_overtime_form');
            var formdata = new FormData(myForm);
            
            $.ajax({
                url: "{{ url('transaction/update_transport/import') }}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (response) {
                    if (response[0].status == "true") {
                        $("#btn-process").prop("disabled", false);
                        $("#btn-process").html(
                            // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_process") }}'
                            'Update'
                        );
                        
                        $('#notification_success').modal('show');
                        $('#message-notification-success').html(response[0]
                            .message);
                        setTimeout(function () {
                            window.location =
                                "{{ url('transaction/transaction_transport') }}";
                        }, 3000);
                    } else {
                        $("#btn-process").prop("disabled", false);
                        $("#btn-process").html(
                            // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_process") }}'
                            'Update'
                        );

                        $('#notification_error').modal('show');
                        if (response[0].message == null || response[0].message ==
                            '') {
                            $('#message-notification-error').html(
                                "{{ __('login.error') }}");
                        } else {
                            $('#message-notification-error').html(response[0]
                                .message);
                        }
                    }
                },
                error: function (response) {
                    $("#btn-process").prop("disabled", false);
                    $("#btn-process").html(
                        // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_process") }}'
                        'Update'
                    );

                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        }
    })
}
</script>

<script type="text/javascript">

    loadDataExportReimbrusement();
    loadDataFirstLastAllReimbursement();
    loadDataBusinessUnit();
    loadDataFirstLastAllBusinessUnit();
    loadDataStatus();
    loadDataFirstLastAllStatus();
    
        $.get("{{ url('reimbursement_type/transport/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#reimbursement_type').append("<option value=" + v.comGenCode + ">" + v.value +
                    "</option>");
            });
        });

        $.get("{{ url('level/api') }}", function (data) {      
            $.each(data, function (k, v) {
                $('#business_unit').append("<option value=" + v.levelCode + ">" + v.levelName +
                    "</option>");
            });
        });

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

        
        function loadDataExportReimbrusement(){
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
            
            $('#reimbursement_type').select2({
                width: '100%',
                placeholder: 'Choose Reimbursement Type',
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
                    url: "{{ url('/reimbursement_type/transport/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: $('meta[name="csrf-token"]').attr('content'),
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

        function loadDataFirstLastAllReimbursement () {
            $('#reimbursement_type').addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/reimbursement_type/transport/func/api') }}",
            }).then(function (data) {
                if (!$('#reimbursement_type').find('option:contains(' + data[0].value + ')').length) {
                    $('#reimbursement_type').append($('<option>').val(data[0].comGenCode).text(data[0].value));
                }
                $('#reimbursement_type').val(data[0].comGenCode);
                $('#reimbursement_type').removeClass('loading');
            });
        }

        function loadDataBusinessUnit(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-6">' + data.data.levelName + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
            
            $('#business_unit').select2({
                width: '100%',
                placeholder: 'Choose Business Unit',
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
                    url: "{{ url('/level/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            search: params.term, 
                            levelType: '1' 

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

        function loadDataFirstLastAllBusinessUnit () {
            $('#business_unit').addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/level/func/api') }}",
            }).then(function (data) {
                if (!$('#business_unit').find('option:contains(' + data.levelName + ')').length) {
                    $('#business_unit').append($('<option>').val(data.levelCode).text(data.levelName));
                }
                $('#business_unit').val(data.levelCode);
                $('#business_unit').removeClass('loading');
            });
        }

        function loadDataStatus(){
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
            
            $('#transport_status').select2({
                width: '100%',
                placeholder: 'Choose Status',
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
                    url: "{{ url('/status_trans/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            search: params.term,
                        };
                    },
                    processResults: function (data) {
                        var filteredData = data.filter(function (item) {
                            var allowedStatuses = ["NEW", "APPROVED", "CANCELED", "PARTIAL APPROVED", "REJECTED"];
                            return allowedStatuses.includes(item.value);
                        });

                        return {
                            results: $.map(filteredData, function (item) {
                                return {
                                    text: item.value,
                                    id: item.value,
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

        function loadDataFirstLastAllStatus() {
            $('#transport_status').addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/status_trans/api') }}",
            }).then(function (data) {
                $('#transport_status').prepend($('<option>').val('ALL').text('ALL'));
                $('#transport_status option:contains("ALL")').not(':first').remove();
                $('#transport_status').val('ALL');
                $('#transport_status').removeClass('spinner-border');
            });
        }
    </script>

 </html>