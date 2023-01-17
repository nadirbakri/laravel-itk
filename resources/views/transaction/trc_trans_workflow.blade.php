<!DOCTYPE html>
<html>
<head>
    <title>{{ __('trans_workflow.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
   <style type="text/css">
        .div-trans-workflow {
            max-width: 100%;
            margin: auto;
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

        .modal-header-notification-warning {
            border-bottom: 1px solid #eee;
            background-color: #f0bd18;
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
        .detailstatus input{
            outline: none;
        }
    </style>
</head>

<body>
    <div class="div-form">
        <form id="trans_workflow_form" method="post">
            @csrf
            <div class="div-trans-workflow">
                <div class="div-title">
                    <a href="{{ url('transaction') }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('trans_workflow.judul') }}</span>
                    </a>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_from form-check-label">{{ __('trans_workflow.label_claim_date_start') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_from" name="claim_date_from"
                                placeholder="{{ __('trans_workflow.label_claim_date_start') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="claim_date_from_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="claim_date_from_hidden" name="claim_date_from_hidden" hidden>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_to form-check-label">{{ __('trans_workflow.label_claim_date_end') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_to" name="claim_date_to"
                                placeholder="{{ __('trans_workflow.label_claim_date_end') }}">
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
                            <label for="bu form-check-label">{{ __('trans_workflow.label_bu') }}</label>
                        </div>
                        <select class="form-control select2" id="business_unit" name="business_unit"></select>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="workflow_type form-check-label">{{ __('trans_workflow.label_workflow_type') }}</label>
                        </div>
                        <select class="form-control select2" id="workflow_type" name="workflow_type"></select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="employee_no form-check-label">{{ __('trans_workflow.employee') }}</label>
                        </div>
                        <input type="text" class="form-control" id="employee_no" name="employee_no" placeholder="employee-no">
                    </div>
                </div>
                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary" name="btn-search" id="btn-search" value="preview" style="width: 100%;">
                            <img src="{{ url('icons/mob/button/button-search.svg') }}" alt="export"> {{ __('trans_workflow.btn_search') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-list" id="btn-list"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_list_mass_leave">
                        <i class="fa fa-plus"></i> {{ __('trans_workflow.btn_list') }}
                        </button>
                    </div>
                </div>
                <br>

                <!-- TABLE -->
                <div class="card">
                    <div class="row">
                        <div class="col-6">
                            <p><b>{{ __('trans_workflow.list_table') }}</b></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table id="workflow_table" class="display table-striped table-hover dt-responsive display nowrap" cellspacing="10">
                                <thead>
                                    <tr>
                                        <th>{{ __('trans_workflow.rdate') }}</th>
                                        <th>{{ __('trans_workflow.employee') }}</th>
                                        <th>{{ __('trans_workflow.ename') }}</th>
                                        <th>{{ __('trans_workflow.status') }}</th>
                                        <th>{{ __('trans_workflow.remarks') }}</th>
                                        <th>{{ __('trans_workflow.lduration') }}</th>
                                        <th>{{ __('trans_workflow.aby') }}</th>
                                        <th>{{ __('trans_workflow.tno') }}</th>
                                        <th>{{ __('trans_workflow.appremarks') }}</th>
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
        <form id="payroll_calculation_detail_modal_form" method="post">
            @csrf
            <div class="modal fade" id="modal_list_mass_leave">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                   <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-little">{{ __('trans_workflow.luser') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive">
                        <table id="example" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('trans_workflow.fname') }}</th>
                                    <th>{{ __('trans_workflow.employee') }}</th>
                                    <th>{{ __('trans_workflow.division') }}</th>
                                    <th>{{ __('trans_workflow.ranking') }}</th>
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
                   </div>

                    
                </div>
            </div>
        </form>
    </div>
    {{-- <div class="div-form">
        <form id="payroll_calculation_detail_modal_form" method="post">
            @csrf
            <div class="modal fade" id="modal_list_detail">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                   <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-little">Detail Reimbursement</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row detailstatus">
                                    <div class="col-3  ">
                                        <h5>Request Date</h5>
                                    </div>
                                    <div class="col">
                                        <input id="reqdate" name="reqdate" style="border: none" style="outline: none" type="text" class="form-control" id="claim_date_from" name="claim_date_from">
                                    </div>
                                    <div class="col-3">
                                        <h5>Receipt Date</h5>
                                    </div>
                                    <div class="col">
                                        <input id="recdate" name="recdate" style="border: none" style="outline: none"  type="text" class="form-control" id="claim_date_from" name="claim_date_from">
                                    </div>
                                </div>

                                <div class="row detailstatus">
                                    <div class="col-3">
                                        <h5>Ticket Number</h5>
                                    </div>
                                    <div class="col">
                                        <input id="tiketno" name="tiketno" style="border: none" style="outline: none" type="text" class="form-control" id="claim_date_from" name="claim_date_from">
                                    </div>
                                    <div class="col-3">
                                        <h5>Status</h5>
                                    </div>
                                    <div class="col">
                                        <input id="status" name="status" style="border: none" style="outline: none" type="text" class="form-control" id="claim_date_from" name="claim_date_from">
                                    </div>
                                </div>

                                <div class="row detailstatus">
                                    <div class="col-3">
                                        <h5>Business Unit</h5>
                                    </div>
                                    <div class="col">
                                        <input id="b_unit" name="b_unit" style="border: none" style="outline: none"  type="text" class="form-control" id="claim_date_from" name="claim_date_from">
                                    </div>
                                    <div class="col-3">
                                        <h5>Total Claim </h5>
                                    </div>
                                    <div class="col">
                                        <input id="c_type" name="c_type" style="border: none" style="outline: none" type="text" class="form-control" id="claim_date_from" name="claim_date_from">
                                    </div>
                                </div>

                                <div class="row detailstatus">
                                    <div class="col-3">
                                        <h5>Dependent Name</h5>
                                    </div>
                                    <div class="col">
                                        <input style="border: none" style="outline: none" type="text" class="form-control" id="claim_date_from" name="claim_date_from">
                                    </div>
                                </div>
                            
                                <br>
                                <hr>
                            </div>
                        </div>
                    </div>
                   </div>
                </div>
            </div>
        </form>
    </div> --}}
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
                        <span class="title-text-notification">{{ __('trans_workflow.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function () {
        $('table.display').DataTable({
            scrollX: true,
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

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

<script>
     function load_data_workflow(claim_date_from, claim_date_to, employee_no,  business_unit, workflow_type) {
        
        if(workflow_type == "ER"){
            table = $('#workflow_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url : "{{ url('trans/workflow/table') }}",
                    data: {
                        'startDate': claim_date_from,
                        'endDate': claim_date_to,
                        'employeeNo' : employee_no,
                        'businessUnit' : business_unit,
                        'workflowType' : workflow_type

                    }
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lfrtip',
                'sPaginationType': 'ellipses',
                "order": [[ 1, "asc" ]],
                columns: [
                    // {
                    //     orderable: false,
                    //     targets: 0, 
                    //     "defaultContent": '',
                    //     render: function(data, type) {
                    //         return type === 'display'? '<button type="button" onclick="klikdetail(this)" class="btn btn-info" name="btn-detail" id="btn-detail" style="width: 100%;" data-toggle="modal" data-target="#modal_list_detail"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/></svg> {{ __('trans_medical.detail') }} </button>' : '';
                    //     }
                    // },
                    {data: 'permitEntity.createdDate', name: 'createdDate', 
                                render: function (data, type, row) {
                                if (data == null){
                                    return '-'
                                }else {
                                    return moment(data).format('YYYY-MM-DD');
                                }
                            }
                    },
                    {data: 'permitEntity.employeeNo', name: 'permitEntity.employeeNo'},
                    {data: 'permitEntity.fullnameRequester', name: 'permitEntity.fullnameRequester'},
                    {data: 'permitEntity.status', name: 'permitEntity.status'},
                    {data: 'permitEntity.approvalRemarks', name: 'permitEntity.approvalRemarks'},
                    {data: 'permitEntity.time', name: 'permitEntity.time'},
                    {data: 'permitEntity.superiorFullname', name: 'permitEntity.superiorFullname'},
                    {data: 'permitEntity.ticketNo', name: 'permitEntity.ticketNo'},
                    {data: 'permitEntity.approvalRemarks', name: 'permitEntity.approvalRemarks'},
                    // {data: 'permitEntity.fullnameRequester', name: 'fullnameRequester'},
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
        }else{
            table = $('#workflow_table').DataTable({
                    processing: true,
                    serverSide: true,
                    orderCellsTop: true,
                    ajax: {
                        url : "{{ url('trans/workflow/table') }}",
                        data: {
                            'startDate': claim_date_from,
                            'endDate': claim_date_to,
                            'employeeNo' : employee_no,
                            'businessUnit' : business_unit,
                            'workflowType' : workflow_type
    
                        }
                    },
                    error: function(jqXHR, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                    },
                    "sDom": 'lfrtip',
                    'sPaginationType': 'ellipses',
                    "order": [[ 1, "asc" ]],
                    columns: [
                        // {
                        //     orderable: false,
                        //     targets: 0, 
                        //     "defaultContent": '',
                        //     render: function(data, type) {
                        //         return type === 'display'? '<button type="button" onclick="klikdetail(this)" class="btn btn-info" name="btn-detail" id="btn-detail" style="width: 100%;" data-toggle="modal" data-target="#modal_list_detail"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/></svg> {{ __('trans_medical.detail') }} </button>' : '';
                        //     }
                        // },
                        {data: 'leaveEntity.createdDate', name: 'createdDate', 
                                render: function (data, type, row) {
                                if (data == null){
                                    return '-'
                                }else {
                                    return moment(data).format('YYYY-MM-DD');
                                }
                            }
                        },
                        {data: 'leaveEntity.employeeNo', name: 'leaveEntity.employeeNo'},
                        {data: 'leaveEntity.fullnameRequester', name: 'leaveEntity.fullnameRequester'},
                        {data: 'leaveEntity.status', name: 'leaveEntity.status'},
                        {data: 'leaveEntity.approvalRemarks', name: 'leaveEntity.approvalRemarks'},
                        {data: 'leaveEntity.leaveDurationDepan', name: 'leaveEntity.leaveDurationDepan'},
                        {data: 'leaveEntity.createdBy', name: 'leaveEntity.createdBy'},
                        {data: 'leaveEntity.ticketNo', name: 'leaveEntity.ticketNo'},
                        {data: 'leaveEntity.approvalRemarks', name: 'leaveEntity.approvalRemarks'},
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
        }
            // dari sini

            $("#btn-search").prop("disabled", true);
            $("#btn-search").html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'

            );
       

            $("#btn-search").prop("disabled", false);
            $("#btn-search").html(
                "<img src={{ url('icons/mob/button/button-search.svg') }} alt='export'> {{ __('trans_transport.btn_search') }}"
            );



        }

        $("#trans_workflow_form").submit((e)=>{
            e.preventDefault();

            var claim_date_from = $("#claim_date_from").val();
            var claim_date_to = $("#claim_date_to").val();
            var employee_no = $("#employee_no").val();
            var business_unit = $("#business_unit").val();
            var workflow_type = $("#workflow_type").val();
            // $("#btn-search").prop("disabled", true);
            // $("#btn-search").html(
            //     '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            // );

            $('#workflow_table').DataTable().destroy();
            load_data_workflow(claim_date_from, claim_date_to, employee_no,  business_unit, workflow_type);
            })

  
  
  
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
            'sPaginationType': 'ellipses',
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

        $('#employee_no').val(employee_id)

        $('.close').click();
        // let fullname = $(element).parent().siblings('td').eq(1).text()
        // let division = $(element).parent().siblings('td').eq(2).text()
        // let rankingname = $(element).parent().siblings('td').eq(3).text()
        // alert(data1)
    }
   
    const klikdetail = (element) => {
        let request_date = $(element).parent().siblings('.sorting_1').text()
        let ticket_number = $(element).parent().siblings('td').eq(9).text()
        let status = $(element).parent().siblings('td').eq(3).text()
        let approvalremarks = $(element).parent().siblings('td').eq(10).text()
        var business_unit = $("#business_unit").val();

        $('#reqdate').val(request_date)
        $('#recdate').val(request_date)
        $('#tiketno').val(ticket_number)
        $('#status').val(status)
        $('#b_unit').val(business_unit)
        $('#approvalremarks').val(approvalremarks)

        $('.close').click();
        // let division = $(elemt).parent().siblings('td').eq(2).text()
        // let rankingname = $(element).parent().siblings('td').eq(3).text()
        // alert(data1)
    }
</script>
<script type="text/javascript">

    loadDataBusinessUnit();
    loadDataWorkflowType();
    loadDataFirstLastAllBusinessUnit();
    
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
                            search: params.term, 'levelType' : '1' 

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
            function loadDataWorkflowType(){
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
                
                $('#workflow_type').select2({
                    width: '100%',
                    placeholder: 'Choose Workflow Type',
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
                        url: "{{ url('/workflow/api') }}",
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
    </script>
</html>