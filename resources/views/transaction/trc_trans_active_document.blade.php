<!DOCTYPE html>
<html>
<head>
    <title>{{ __('trans_business_trip.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link  rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
    <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
   <style type="text/css">
        .div-trans-business-trip {
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
			margin-top: 20%;
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
    <div class="div-form">
        <form>
            <div class="div-trans-business-trip">
                <div class="div-title">
                    <a href="{{ route('transaction', ['moduleID' => 'TRX']) }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('trans_active_document.list') }}</span>
                    </a>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_from form-check-label">{{ __('trans_business_trip.label_claim_date_start') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_from" name="claim_date_from"
                                placeholder="{{ __('trans_business_trip.label_claim_date_start') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="claim_date_from_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="claim_date_from_hidden" name="claim_date_from_hidden" hidden>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_to form-check-label">{{ __('trans_business_trip.label_claim_date_end') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_to" name="claim_date_to"
                                placeholder="{{ __('trans_business_trip.label_claim_date_end') }}">
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
                            <label for="business_unit form-check-label">{{ __('trans_business_trip.label_bu') }}</label>
                        </div>
                        <select class="form-control select2" id="business_unit" name="business_unit"></select>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="reimbursement_type form-check-label">{{ __('trans_business_trip.label_reimbursement_type') }}</label>
                        </div>
                        <select class="form-control select2" id="reimbursement_type" name="reimbursement_type"></select>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-5">
                        <div class="form-group">
                                <label for="direct_superior form-check-label">{{ __('trans_business_trip.employee') }}</label>
                        </div>
                                <input type="text" class="form-control" id="direct_superior" name="direct_superior" placeholder="employee-no">
                    </div>
                    {{-- <div class="col-5">
                        <div class="form-group">
                            <label for="status form-check-label">{{ __('trans_business_trip.label_status') }}</label>
                        </div>
                        <select class="form-control select2" id="status" name="status"></select>
                    </div> --}}
                </div>

                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-search" id="btn-search" value="preview" style="width: 100%;">
                            <img src="{{ url('icons/mob/button/button-search.svg') }}" alt="export"> {{ __('trans_business_trip.btn_search') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-list" id="btn-list"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_list_mass_leave">
                        <i class="fa fa-plus"></i> {{ __('trans_business_trip.btn_list') }}
                        </button>
                    </div>
                </div>
            </form>
            <form id="trans_business_trip_form" method="post">
            @csrf
                <!-- TABLE -->
                <div class="card" style="position: relative;">
                    <div id="loading">
                        <div class="spinner"></div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p><b>{{ __('trans_business_trip.list_table') }}</b></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary" name="btn-upload" id="btn-upload"
                            style="width: 100%;">
                            {{ __('trans_business_trip.update') }}
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table id="business_trip_table" class="display table-striped table-hover dt-responsive display nowrap" cellspacing="10">
                                <thead>
                                    <tr>
                                        <th>{{ __('trans_business_trip.tnom') }}</th>
                                        <th>{{ __('trans_business_trip.name') }}</th>
                                        <th>{{ __('trans_business_trip.status') }}</th>
                                        <th>{{ __('trans_business_trip.destination') }}</th>
                                        <th>{{ __('trans_business_trip.treq') }}</th>
                                        <th>{{ __('trans_business_trip.cpaid') }}</th>
                                        <th>{{ __('trans_business_trip.tpaid') }}</th>
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
                        <h4 class="modal-little">{{ __('trans_business_trip.luser') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive">
                        <table id="example" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('trans_business_trip.employee') }}</th>
                                    <th>{{ __('trans_business_trip.name') }}</th>
                                    <th>{{ __('trans_business_trip.division') }}</th>
                                    <th>{{ __('trans_business_trip.ranking') }}</th>
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
                        <span class="title-text-notification">{{ __('trans_business_trip.alert_success') }}</span>
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
    $(document).ready( function () {
        $('table.display').DataTable({
            // scrollX: true,
        });
    } );
</script>
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
    
    $(function () {
        initDatePicker();
    });

    function initDatePicker() {
        $('.input-group input').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
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
    var table = null;
    var table2 = null;
    var arrayBusinessTrip = [];

    function load_data_business_trip(claim_date_from, claim_date_to, direct_superior, reimbursement_type, business_unit){
        $.ajax({
            type: 'GET',
            url: "{{ url('/trans/businesstrip/table') }}",
            data: {
                'startDate': claim_date_from,
                'endDate': claim_date_to,
                'employeeNo' : direct_superior,
                'type' : reimbursement_type,
                'businessUnit' : business_unit
            }
        }).then(function (data) {
            arrayBusinessTrip = data;
            $('#business_trip_table').DataTable().destroy();
            load_data_table_business_trip();
            $('#loading').hide();
        });
    }

    function load_data_table_business_trip(claim_date_from, claim_date_to, direct_superior, reimbursement_type, business_unit) {
        table = $('#business_trip_table').DataTable({
            processing: true,
            // serverSide: true,
            orderCellsTop: true,
            data: arrayBusinessTrip,
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lftip',
            'sPaginationType': 'full_numbers',
            "order": [[ 1, "asc" ]],
            columns: [
                {data: 'ticketNo', name: 'ticketNo',
                    render: function (data, type, row) {
                        return '<input type="hidden" class="form-control" name="ticketNo[]" value="' +
                            data + '">' + data;
                    }
                },
                {data: 'fullnameRequester', name: 'fullnameRequester'},
                {data: 'status', name: 'status'},
                {data: 'destination', name: 'destination'},
                {data: 'totalClaimAmount', name: 'totalClaimAmount'},
                {
                    orderable: false,
                    "defaultContent": '',
                    render: function(data, type, row){
                        // console.log(row.totalClaimAmount)
                        let totalcamount = parseInt(row.totalClaimAmount)
                        if(row.status == 'APPROVED'){ 
                            return `<input class="chk-select" type="checkbox" id="checkPaid" name="checkPaid[]" value="`+totalcamount+`">`;
                        }else{
                            return '<input class="chk-select" type="checkbox" name="checkPaid[]" readonly>';
                        }
                    }
                },
                {data: 'paidAmount', name: 'paidAmount',
                    render: function (data, type, row) {
                        if(row.status == 'APPROVED'){
                            return '<input type="text" class="form-control" name="paidAmount[]" value="' +
                                data + '">';
                        }else{
                            return '<input type="text" class="form-control" name="paidAmount[]" value="' +
    
                                data + '" readonly>';
                        }
                    }
                }
            ]
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

    $("#btn-search").click((e)=>{
        e.preventDefault();

        var claim_date_from = $("#claim_date_from").val();
        var claim_date_to = $("#claim_date_to").val();
        var direct_superior = $("#direct_superior").val();
        var reimbursement_type = $("#reimbursement_type").val();
        var business_unit = $("#business_unit").val();

        $('#loading').show();

        load_data_business_trip(claim_date_from, claim_date_to, direct_superior, reimbursement_type, business_unit);
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


    const klikdetail = (element) => {
        let ticket_number = $(element).parent().siblings('.sorting_1').text()
        let status = $(element).parent().siblings('td').eq(3).text()
        let totalclaim = $(element).parent().siblings('td').eq(8).text()
        var business_unit = $("#business_unit").val();
        var direct_superior = $("#direct_superior").val();
        var reimbursement_type = $("#reimbursement_type").val();

        $('#tiketno').val(ticket_number)
        $('#status').val(status)
        $('#b_unit').val(business_unit)
        $('#employeeno').val(direct_superior)
        $('#c_type').val(totalclaim)
        $('#type').val(reimbursement_type)
    }
    const klik = (element) => {
        let employee_id = $(element).parent().siblings('.sorting_1').text()

        $('#direct_superior').val(employee_id)

        $('.close').click();
    }

    $("#btn-update").click(function () {
        $(this).prop("disabled", true);
        $(this).html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
        );
        $("#trans_business_trip_form").submit();
    });
    
    $('#notification_success').on('hide.bs.modal', function () {
        window.location = "{{ url('transaction/transaction_active_document') }}";
    });

    function updateBusinessTripStatus() {
        var item = arrayBusinessTrip.find(obj => obj.ticketNo === ticketNo);

        if (item) {
            item.status = reimbursement_status;
            item.paidAmount = totalpaid;
            item.approvalRemarks = approvalremarks;

            table.clear().rows.add(arrayBusinessTrip).draw(false);
        }
    }
    
    if ($("#trans_business_trip_form").length > 0) {
        $("#trans_business_trip_form").validate({
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('transaction/transaction_active_document/proses') }}",
                    type: "POST",
                    data: $('#trans_business_trip_form').serialize(),
                    success: function (response) {
                        if (response.status == "true") {
                            $("#btn-update").prop("disabled", false);
                            $("#btn-update").html(
                                // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_process") }}'
                                'Update Data'
                            );
                            
                            $('#notification_success').modal('show');
                            $('#message-notification-success').html(response
                                .message);
                            setTimeout(function () {
                                window.location =
                                    "{{ url('transaction/transaction_active_document') }}";
                            }, 3000);
                        } else {
                            $("#btn-update").prop("disabled", false);
                            $("#btn-update").html(
                                // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_process") }}'
                                'Update Data'
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
                        $("#btn-update").prop("disabled", false);
                        $("#btn-update").html(
                            // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_process") }}'
                            'Update Data'
                        );
    
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            }
        })
    }

    $('#business_trip_table tbody').on('click', 'input[type="checkbox"]', function(e){
        var $row = $(this).closest('tr');

        if(this.checked){
            $row.addClass('selected');
        } else {
            $row.removeClass('selected');
        }

        // Prevent click event from propagating to parent
        e.stopPropagation();
    });

    $('#business_trip_table').on('click', 'tr td:first-child', function(e){
        $(this).parent().find('input[type="checkbox"]').trigger('click');
    });


</script>

<script type="text/javascript">

$('#business_trip_table').on('click', '.chk-select', function(){
    let all_checkbox = $('#business_trip_table .chk-select:checked');
    let getPaid = document.getElementById("checkPaid").value;
    $('#jesyca').val(getPaid);
// alert(all_checkbox);
    // $('#jesyca').val(all_checkbox);
})
</script>
<script>
loadDataBusinessUnit();
loadDataTravelType();
loadDataFirstLastAllTravelType();
loadDataFirstLastAllBusinessUnit();

$.get("{{ url('travel_type/api') }}", function (data) {
    $.each(data, function (k, v) {
        $('#travel_type').append("<option value=" + v.variable + ">" + v.value +
            "</option>");
    });
});

// $.get("{{ url('status/func/api') }}", function (data) {
//     $.each(data, function (k, v) {
//         $('#status').append("<option value=" + v.variable + ">" + v.value +
//             "</option>");
//     });
// });


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
                '<div class="col-4">' + data.id + '</div>' +
                '<div class="col-8">' + data.text + '</div>' +
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
            url: "{{ url('/level/access/all/api') }}",
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
                            text: item.desc,
                            id: item.code,
                            data: data
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
        url: "{{ url('/level/access/func/api') }}",
        data: {
            'levelType' : '1'
        },
    }).then(function (data) {
        if (!$('#business_unit').find('option:contains(' + data.desc + ')').length) {
            $('#business_unit').append($('<option>').val(data.code).text(data.desc));
        }
        $('#business_unit').val(data.code);
        $('#business_unit').removeClass('loading');
    });
}

function loadDataFirstLastAllTravelType () {
    $('#reimbursement_type').addClass('spinner-border');

    $.ajax({
        type: 'GET',
        url: "{{ url('/travel_type/all/api') }}",
    }).then(function (data) {
        if (!$('#reimbursement_type').find('option:contains(' + data.value + ')').length) {
            $('#reimbursement_type').append($('<option>').val(data.comGenCode).text(data.value));
        }
        $('#reimbursement_type').val(data.comGenCode);
        $('#reimbursement_type').removeClass('loading');
    });
}

function loadDataTravelType(){
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
        placeholder: 'Choose Travel Type',
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
            url: "{{ url('/travel_type/api') }}",
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

{{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script> --}}
</html>