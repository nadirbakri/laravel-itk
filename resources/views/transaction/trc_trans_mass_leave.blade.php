<!DOCTYPE html>
<html>
<head>
    <title>{{ __('trans_mass_leave.judul') }}</title>
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
        .div-trans-mass-leave {
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
        <form id="trans_mass-leave_form" method="post">
            @csrf
            <div class="div-trans-mass-leave">
                <div class="div-title">
                    <a href="{{ route('transaction', ['moduleID' => 'TRX']) }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('trans_mass_leave.list') }}</span>
                    </a>
                </div>
                <div class="row" id="div-edit-data" style="display: none;">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="status form-check-label">{{ __('trans_mass_leave.label_status') }}</label>
                        </div>
                        <input type="text" class="form-control" id="status" name="status" placeholder="{{ __('trans_mass_leave.label_status') }}" readonly>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="seq_no form-check-label">{{ __('trans_mass_leave.label_seq_no') }}</label>
                        </div>
                        <input type="text" class="form-control" id="seq_no" name="seq_no" placeholder="{{ __('trans_mass_leave.label_seq_no') }}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_from form-check-label">{{ __('trans_mass_leave.label_claim_date_start') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_from" name="claim_date_from"
                                placeholder="{{ __('trans_mass_leave.label_claim_date_start') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="claim_date_from_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="claim_date_from_hidden" name="claim_date_from_hidden" hidden>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_to form-check-label">{{ __('trans_mass_leave.label_claim_date_end') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_to" name="claim_date_to"
                                placeholder="{{ __('trans_mass_leave.label_claim_date_end') }}">
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
                            <label for="leave_type form-check-label">{{ __('trans_mass_leave.label_leave_type') }}</label>
                        </div>
                        <select class="form-control select2" id="leave_type" name="leave_type"></select>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="leave_time form-check-label">{{ __('trans_mass_leave.label_leave_time') }}</label>
                        </div>
                        <select class="form-control select2" id="leave_time" name="leave_time"></select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="submit_type form-check-label">{{ __('trans_mass_leave.label_submit_type') }}</label>
                        </div>
                        <select class="form-control select2" id="submit_type" name="submit_type"></select>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="remarks form-check-label">{{ __('trans_mass_leave.label_remarks') }}</label>
                        </div>
                        <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-save" id="btn-save" value="preview" style="width: 100%;">
                            <i class="fa fa-save"></i> {{ __('trans_mass_leave.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-list" id="btn-list"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_list_mass_leave">
                            <i class="fa fa-list"></i> {{ __('trans_mass_leave.button1') }}
                        </button>
                    </div>
                    <div class="col-3" id="div-btn-remove" style="display: none;">
                        <button class="btn btn-danger" name="btn-remove" id="btn-remove" value="preview" style="width: 100%;">
                            <i class="fa fa-times"></i> {{ __('trans_mass_leave.btn_remove') }}
                        </button>
                    </div>
                </div>
                <div class="card" id="div-list-employee" style="display: none;">
                    <!-- TABLE -->
                    <div class="row">
                        <div class="col-6">
                            <p><b>{{ __('trans_mass_leave.list_table') }}</b></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table id="list_employee_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" class="select_all" name="select_all" value="all"></th>
                                        <th>User ID</th>
                                        <th>Employee No</th>
                                        <th>Full Name</th>
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
                        <h4 class="modal-little">List Cuti Massal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="loading">
                            <div class="spinner"></div>
                        </div>
                        <table id="list_mass_leave_table" class="table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Seq No</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Leave Type</th>
                                    <th>Leave Time</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
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
                        <span class="title-text-notification">{{ __('trans_mass_leave.alert_success') }}</span>
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
<script type="text/javascript">
    var table = null;
    var table2 = null;
    var arrayEmployee = [];
    var arrayMassLeave = [];
    var selectedEmployees = {};

    load_data_employee();
    load_data_table_mass_leave();

    $('#submit_type').on('change', function() {
        if (this.value == "STB") {
            $('#div-list-employee').show();
            $('#list_employee_table').DataTable().destroy();
            load_data_table_employee();
        }else{
            $('#div-list-employee').hide();
        }
    });

    function load_data_employee(){
        $.ajax({
            type: 'GET',
            url: "{{ url('/employee_no/api') }}",
        }).then(function (data) {
            arrayEmployee = data;
            $('#list_employee_table').DataTable().destroy();
            load_data_table_employee();
        });
    }

    function load_data_table_employee() {
        table = $('#list_employee_table').DataTable({
            processing: true,
            // serverSide: true,
            orderCellsTop: true,
            data: arrayEmployee,
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
                    render: function(data, type, row) {
                        return type === 'display'? '<input class="chk-select selected_employee" type="checkbox" name="selected_employee[]" data-employee="'+
                           row.employeeNo + '" data-userid="' + row.userID + '" value="true">' : '';
                    }
                },
                {data: 'userID', name: 'userID',
                    render: function(data, type, row) {
                        return '<input type="hidden" name="user_id[]" value"' + row.userID + '">' + row.userID;
                    }
                },
                {data: 'employeeNo', name: 'employeeNo',
                    render: function(data, type, row) {
                        return '<input type="hidden" name="employee_no[]" value"' + row.employeeNo + '">' + row.employeeNo;
                    }
                },
                {data: 'fullName', name: 'fullName'},
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }, 
        });

        // Ketika checkbox select all diklik
        $(".select_all").on("click", function (e) {
            var isChecked = $(this).is(":checked");
            // Iterasi semua baris dalam DataTable
            table.rows({ search: 'applied' }).every(function (index) {
                var data = this.data();
                var rowId = data.employeeNo;
                var userId = data.userID;

                // Simpan status baris dalam object selectedEmployees
                if (isChecked) {
                    selectedEmployees[rowId] = {
                        isChecked: true,
                        userId: userId,
                        employeeId: rowId
                    };
                    table.rows({ search: 'applied' }).select();
                } else {
                    delete selectedEmployees[rowId];
                    table.rows({ search: 'applied' }).deselect();
                }
            });

            $('.selected_employee').prop('checked', isChecked);
        });

        table.on('draw', function () {
            table.rows({ page: 'current' }).every(function (index) {
                var data = this.data();
                var rowId = data.employeeNo;
                var userId = data.userID;

                if (selectedEmployees[rowId] && selectedEmployees[rowId].isChecked) {
                    $(this.node()).find('.selected_employee').prop('checked', true);
                } else {
                    $(this.node()).find('.selected_employee').prop('checked', false);
                }

                $(this.node()).find('.selected_employee').off('change').on('change', function () {
                    if ($(this).is(':checked')) {
                        selectedEmployees[rowId] = {
                            isChecked: true,
                            userId: userId,
                            employeeId: rowId
                        };
                    } else {
                        delete selectedEmployees[rowId];
                    }
                });
            });
        });
    }

    $(document).on('change', '.selected_employee', function () {
        var $checkbox = $(this);
        var rowId = $checkbox.data('employee'); // Atau ambil dari data lainnya jika diperlukan
        var userId = $checkbox.data('userid'); // Ambil userId jika tersedia
        
        if ($checkbox.is(':checked')) {
            selectedEmployees[rowId] = {
                isChecked: true,
                userId: userId,
                employeeId: rowId
            };
        } else {
            delete selectedEmployees[rowId];
        }
        console.log(selectedEmployees);
    });

    function load_data_mass_leave(){
        $.ajax({
            type: 'GET',
            url: "{{ url('/trans/mass_leave/table') }}",
        }).then(function (data) {
            arrayMassLeave = data;
            $('#list_mass_leave_table').DataTable().destroy();
            load_data_table_mass_leave();
            $('#loading').hide();
        });
    }

    function load_data_table_mass_leave() {
        table2 = $('#list_mass_leave_table').DataTable({
            processing: true,
            // serverSide: true,
            orderCellsTop: true,
            data: arrayMassLeave,
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lfrtip',
            'sPaginationType': 'full_numbers',
            ordering: false,
            columns: [
                {
                    orderable: false,
                    targets: 0, 
                    "defaultContent": '',
                    render: function(data, type) {
                        return type === 'display'? '<button type="button" onclick="klikdetail(this)" class="btn btn-info" name="btn-detail" id="btn-detail" style="width: 100%;" data-toggle="modal" data-target="#modal_list_detail"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/></svg> {{ __('trans_medical.detail') }} </button>' : '';
                    }
                },
                {data: 'seqNo', name: 'seqNo'},
                {data: 'status', name: 'status'},
                {data: 'dateFrom', name: 'dateFrom', 
                    render: function (data, type, row){
                        return moment(data).format('YYYY-MM-DD');
                    }
                },
                {data: 'dateTo', name: 'dateTo', 
                    render: function (data, type, row){
                        return moment(data).format('YYYY-MM-DD');
                    }
                },
                {data: 'leaveType', name: 'leaveType'},
                {data: 'leaveTime', name: 'leaveTime'},
                {data: 'description', name: 'description'},
            ],
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

    $('#modal_list_mass_leave').on('show.bs.modal', function () {
        $('#loading').show();
        load_data_mass_leave();
    })
    
    const klikdetail = (element) => {
        var data = table.row($(element).parents('tr')).data();

        $('#claim_date_from').html(moment(data.createdDate).format('YYYY-MM-DD'))
        $('#claim_date_to').html(moment(data.overtimeDate).format('YYYY-MM-DD'))
        $('#seq_no').val(data.seqNo)
        $('#status').html(data.status)
        $('#leave_type').val(data.leaveType).trigger('change')
        $('#leave_time').val(data.leaveTime).trigger('change')
        $('#submit_type').val(data.submitType).trigger('change')
        $('#remarks').val(data.description)
        $('#btn-save').prop('disabled', true)

        $('.close').click();
    }

    $('#btn-save').click(()=>{
        let status = $('#status').val();
        let seqNo = $('#seq_no').val();
        let dateFrom = $("#claim_date_from").val();
        let dateTo = $("#claim_date_to").val();
        let leaveType = $("#leave_type").val();
        let leaveTime = $("#leave_time").val();
        let submitType = $("#submit_type").val();
        let remarks = $("#remarks").val();

        // $('.close').click();
        update_data(status, seqNo, dateFrom, dateTo, leaveType, leaveTime, submitType, remarks, selectedEmployees)
    })

    function update_data(status, seqNo, dateFrom, dateTo, leaveType, leaveTime, submitType, remarks, selectedEmployees){
        $.ajax({
            url: "{{ url('trans/update_mass_leave/table') }}",
            type: "get",
            data: {
                'status': status,
                'seqNo': seqNo,
                'dateFrom' : dateFrom,
                'dateTo' : dateTo,
                'leaveType' : leaveType,
                'leaveTime' : leaveTime,
                'submitType' : submitType,
                'remarks' : remarks,
                'selectedEmployees' : selectedEmployees
            },
            success: function (response) {
                // console.log(response);
                if (response.status == "true") {
                    $("#btn-save").prop("disabled", false);
                    $("#btn-save").html(
                        '<i class="fa fa-save"></i> {{ __("trans_mass_leave.btn_save") }}'
                    );

                    $('.close').click();
                    
                    $('#notification_success').modal('show');
                    $('#message-notification-success').html(response
                        .message);

                    // setTimeout(function () {
                    //     window.location =
                    //         "{{ url('transaction/transaction_overtime') }}";
                    // }, 3000);
                } else{
                    $("#btn-save").prop("disabled", false);
                    $("#btn-save").html(
                        '<i class="fa fa-save"></i> {{ __("trans_mass_leave.btn_save") }}'
                    );
                    
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response
                        .message);
                    // setTimeout(function () {
                    //     window.location =
                    //         "{{ url('transaction/transaction_overtime') }}";
                    // }, 3000);
                }
            },
            error: function (response) {
                $("#btn-save").prop("disabled", false);
                $("#btn-save").html(
                    '<i class="fa fa-save"></i> {{ __("trans_mass_leave.btn_save") }}'
                );

                $('#notification_error').modal('show');
                $('#message-notification-error').html(response);
            }
        });        
    }
</script>
<script type="text/javascript">
    loadDataLeaveType();
    loadDataLeaveTimeType();
    loadDataSubmitType();

    $.get("{{ url('leave_type/api') }}", function (data) {
        $.each(data, function (k, v) {
            $('#leave_type').append("<option value=" + v.absentCode + ">" + v.description +
                "</option>");
        });
    });
    $.get("{{ url('leave_hour/api') }}", function (data) {
        $.each(data, function (k, v) {
            $('#leave_time').append("<option value=" + v.code + ">" + v.value +
                "</option>");
        });
    });
    $.get("{{ url('submit_type/api') }}", function (data) {
        $.each(data, function (k, v) {
            $('#submit_type').append("<option value=" + v.variable + ">" + v.value +
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

    function loadDataLeaveType(){
        function formatSelect(data) {
            if (data.loading) {
                return $search
            }

            if (data.id) {
                var $result2 = $('<div class="row">' + 
                    '<div class="col-6">' + data.data.absentCode + '</div>' +
                    '<div class="col-6">' + data.data.description + '</div>' +
                    '</div>');

                return $result2;
            }
        }

        var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
        
        $('#leave_type').select2({
            width: '100%',
            placeholder: 'Choose Leave Type',
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
                url: "{{ url('/leave_type/api') }}",
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
                                text: item.description,
                                id: item.absentCode,
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
    function loadDataLeaveTimeType(){
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
        
        $('#leave_time').select2({
            width: '100%',
            placeholder: 'Choose Leave Time',
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
                url: "{{ url('/leave_hour/api') }}",
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
                                id: item.code,
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
    function loadDataSubmitType(){
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
        
        $('#submit_type').select2({
            width: '100%',
            placeholder: 'Choose Submit Type',
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
                url: "{{ url('/submit_type/api') }}",
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