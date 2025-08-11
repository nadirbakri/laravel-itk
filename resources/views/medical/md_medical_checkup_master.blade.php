<!DOCTYPE html>
<html>
<head>
	<title>{{ __('md_medical_checkup_master.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.monthselect.css') }}">
    <link rel="stylesheet" href="{{ asset('css/medical_detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
	<style type="text/css">
		.div-medical {
            max-width: 97%;
            margin: auto;
            margin-top: 1%;
        }
        .modal-header-notification-error {
            border-bottom:1px solid #eee;
            background-color: #f44336;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
        .modal-header-notification-success {
            border-bottom:1px solid #eee;
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
            align-items:center;
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
        .button-details {
            display: inline-block;
            width: auto;
            border-radius: 6px;
            background: #007BFF;
            color: #FFFFFF;
            text-align: center;
            padding: 6px 10px;
            cursor: pointer;
        }
        .required {
            color: red;
        }
	</style>
</head>

<body>
	<div class="div-medical">
        <div class="div-navbar sticky-navbar">
            <a href="javascript:void(0)" style="display: none;" id="toolbar-back">
                <img src="{{ url('/icons/functionbar/functionbar-back-blue.svg') }}" alt="Back">
                <img src="{{ url('/icons/functionbar/functionbar-back-white.svg') }}" class="functionbar-hover" alt="Back">
                <span>Back</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-next">
                <img src="{{ url('/icons/functionbar/functionbar-next-blue.svg') }}" alt="Next">
                <img src="{{ url('/icons/functionbar/functionbar-next-white.svg') }}" class="functionbar-hover" alt="Next">
                <span>Next</span>
            </a>
            <a href="javascript:void(0)" id="toolbar-new" target="iframe_dashboard">
                <img src="{{ url('/icons/functionbar/functionbar-new-blue.svg') }}" alt="New">
                <img src="{{ url('/icons/functionbar/functionbar-new-white.svg') }}" class="functionbar-hover" alt="New">
                <span>New</span>
            </a>
            <a href="javascript:void(0)" id="toolbar-edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-blue.svg') }}" alt="Edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-white.svg') }}" class="functionbar-hover" alt="Edit">
                <span>Edit</span>
            </a>
            <a class="list-functionbar-sm" href="javascript:void(0)" id="toolbar-delete" style="width: 9%">
                <img src="{{ url('/icons/functionbar/functionbar-remove-blue.svg') }}" alt="Delete">
                <img src="{{ url('/icons/functionbar/functionbar-remove-white.svg') }}" class="functionbar-hover" alt="Delete">
                <span>Delete</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-save">
                <img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">
                <img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">
                <span>Save</span>
            </a>
            <a class="list-functionbar-md" style="display: none;" href="javascript:void(0)" id="toolbar-active">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-blue.svg') }}" alt="Activate">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-white.svg') }}" class="functionbar-hover" alt="Activate">
                <span>Activate</span>
            </a>
            <a class="list-functionbar-lg" style="display: none;" href="javascript:void(0)" id="toolbar-deactive">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-blue.svg') }}" alt="Deactivate">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-white.svg') }}" class="functionbar-hover" alt="Deactivate">
                <span>Deactivate</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-list">
                <img src="{{ url('/icons/functionbar/functionbar-list-blue.svg') }}" alt="List">
                <img src="{{ url('/icons/functionbar/functionbar-list-white.svg') }}" class="functionbar-hover" alt="List">
                <span>List</span>
            </a>
        </div>
		<div class="div-title">
            <a href="{{ route('medical', ['moduleID' => 'MD']) }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text" style="white-space: nowrap;">{{ __('md_vaccination_schedule.list') }}</span>
            </a>
        </div>

		<div class="div-table">
			<table id="medical_checkup_master_table" class="table hover">
				<thead>
					<tr>
                        <th></th>
						<th>MCU Code</th>
						<th>Total Batch</th>
						<th>MCU Name</th>
						<th>Details</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
    <div class="modal fade" id="medical_checkup_master_table_detail_modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-table-detail"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <div class="row">
                        <div class="col-12" style="display: flex; justify-content: flex-end; gap: 10px;">
                            <button type="button" class="btn btn-primary" id="btn-add" style="width: 100px">
                                <i class="fa fa-plus"></i> {{ __('md_medical_checkup_master.btn_add') }}
                            </button>
                            <button type="button" class="btn btn-secondary" id="btn-edit" style="width: 100px">
                                <i class="fa fa-pencil"></i> {{ __('md_medical_checkup_master.btn_edit') }}
                            </button>
                            <button type="button" class="btn btn-error" id="btn-remove" style="width: 100px">
                                <i class="fa fa-trash-o"></i> {{ __('md_medical_checkup_master.btn_remove') }}
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table id="medical_checkup_master_detail_table" class="table hover w-100">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Batch Code</th>
                                        <th>Capacity</th>
                                        <th>Stage</th>
                                        <th>Batch Description</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary w-25" data-dismiss="modal">{{ __('md_medical_checkup_master.btn_cancel') }}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="medical_checkup_master_detail_modal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-detail"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="medical_checkup_master_detail_form" method="post">
                    <div class="modal-body table-responsive">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="batch_code">{{ __('md_medical_checkup_master.label_batch_code') }}</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" id="batch_code" name="batch_code" placeholder="{{ __('md_medical_checkup_master.label_batch_code') }}">
                                    <input type="hidden" class="form-control" id="mcu_code" name="mcu_code" placeholder="{{ __('md_medical_checkup_master.label_mcu_code') }}">
                                    <input type="hidden" class="form-control" id="record_function_detail" name="record_function_detail">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="capacity">{{ __('md_medical_checkup_master.label_capacity') }}</label>
                                    <input type="number" class="form-control" id="capacity" name="capacity" placeholder="{{ __('md_medical_checkup_master.label_capacity') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="stage">{{ __('md_medical_checkup_master.label_stage') }}</label>
                                    <span class="required">*</span>
                                    <input type="number" class="form-control" id="stage" name="stage" placeholder="{{ __('md_medical_checkup_master.label_stage') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="batch_description">{{ __('md_medical_checkup_master.label_batch_description') }}</label>
                                    <input type="text" class="form-control" id="batch_description" name="batch_description" placeholder="{{ __('md_medical_checkup_master.label_batch_description') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-25" id="btn-save-detail"><i class="fa fa-floppy-o"></i> {{ __('md_medical_checkup_master.btn_save') }}</button>
                        <button type="button" class="btn btn-secondary w-25" data-dismiss="modal"><i class="fa fa-times-circle"></i> {{ __('md_medical_checkup_master.btn_cancel') }}</button>
                    </div>
                </form>
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
                        <span class="title-text-notification">{{ __('md_medical_checkup_master.alert_success') }}</span>
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
    
    $(document).ready(function() {
        let table = null;
        let table_detail = null;
        let dataDetail = null;
        $('.div-navbar a.disabled').attr('onclick', 'return false;');

        let expiredDate = $('#expired_date').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#expired_date_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });
        
        $('#medical_checkup_master_table thead tr').clone(true).appendTo('#medical_checkup_master_table thead');
        $('#medical_checkup_master_table thead tr:eq(1) th:not(:first-child)').each( function (i) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="'+title+'" />');
    
            $('input', this).on('keyup change', function () {
                if (table.column(i + 1).search() !== this.value) {
                    table
                        .column(i + 1)
                        .search(this.value)
                        .draw();
                }
            } );
        });

        $('#medical_checkup_master_detail_table thead tr').clone(true).appendTo('#medical_checkup_master_detail_table thead');
            $('#medical_checkup_master_detail_table thead tr:eq(1) th:not(:first-child)').each( function (i) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="'+title+'" />');
    
            $('input', this).on('keyup change', function () {
                if (table_detail.column(i + 1).search() !== this.value) {
                    table_detail
                        .column(i + 1)
                        .search(this.value)
                        .draw();
                }
            } );
        });
        
        function load_data_medical_checkup_master() {
            table = $('#medical_checkup_master_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: "{{ url('medical/medical_checkup_master/table') }}",
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [[ 1, "asc" ]],
                columns: [
                    {
                        orderable: false,
                        targets: 0, 
                        "defaultContent": '',
                        render: function(data, type) {
                            return type === 'display'? '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {data: 'activityCode', name: 'activityCode'},
                    {data: 'totalBatch', name: 'totalBatch'},
                    {data: 'activityName', name: 'activityName'},
                    {name: 'details',
                        render: function (data, type, row) {
                            return `<button type="button" class="btn btn-primary" style="display: inline-block; width: auto;" data-toggle="modal" data-target="#medical_checkup_master_table_detail_modal" onclick="medicalCheckupMasterDetail(this)">Details</button>`
                        }
                    },
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }
            });
        }

        function load_data_medical_checkup_master_detail(dataDetail) {
            table_detail = $('#medical_checkup_master_detail_table').DataTable({
                processing: true,
                orderCellsTop: true,
                fixedHeader: true,
                data: dataDetail,
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [[ 1, "asc" ]],
                columns: [
                    {
                        orderable: false,
                        targets: 0, 
                        "defaultContent": '',
                        render: function(data, type) {
                            return type === 'display'? '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {data: 'batchCode', name: 'batchCode'},
                    {data: 'capacity', name: 'capacity'},
                    {data: 'sequence', name: 'sequence'},
                    {data: 'description', name: 'description'},
                    // {data: 'handPhone', name: 'handPhone'},
                    // {data: 'expiredDate', name: 'expiredDate',
                    //     render: function (data, type, row) {
                    //         return data ? `<p class="chip-green">Yes</p>` : `<p class="chip-red">No</p>`;
                    //     }
                    // },
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }
            });
        }

        load_data_medical_checkup_master()

        window.medicalCheckupMasterDetail = (element) => {
            const row = $(element).closest('tr');
            const data = table.row(row).data();
            dataDetail = data.detail

            $('#modal-title-table-detail').html(`${data.activityName} Detail`)
            $('#mcu_code').val(data.activityCode)

            $('#medical_checkup_master_detail_table').DataTable().destroy();

            load_data_medical_checkup_master_detail(dataDetail)

            $('#medical_checkup_master_detail_table tbody').on('click', 'input[type="checkbox"]', function(e){
                var $row = $(this).closest('tr');

                if(this.checked){
                    $row.addClass('selected');
                } else {
                    $row.removeClass('selected');
                }

                e.stopPropagation();
            });

            $('#medical_checkup_master_detail_table').on('click', 'tr td:first-child', function(e){
                $(this).parent().find('input[type="checkbox"]').trigger('click');
            });

            $('#btn-add').on('click', function(e) {
                $('#record_function_detail').val('New')
                getValue(data, null, 'Add')
            })

            $('#btn-edit').on('click', function(e) {
                const value = table_detail.rows('.selected').data()[0];
                $('#record_function_detail').val('Edit')

                if (value) {
                    getValue(data, value, 'Edit')
                }
                else {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html('No Data Selected');
                }
            })

            $('#medical_checkup_master_detail_table tbody').on('click', 'tr td:not(:first-child)', function () {
                const value = table_detail.row(this).data();
                $('#record_function_detail').val('Edit')
                getValue(data, value, 'Edit')
            });

            $("#btn-remove").on('click', function() {
                var data = table_detail.rows('.selected').data().toArray();

                if(data.length > 0){
                    $.ajax({
                        url: "{{ url('medical/medical_checkup_master_detail/remove') }}",
                        type: "GET",
                        data: {
                            'data' : data
                        },
                        success: function (response) {
                            if (response.status == "true") {
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                $('#medical_checkup_master_table').DataTable().destroy();
                                load_data_medical_checkup_master()
                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                }, 3000);
                            } else {
                                $('#notification_error').modal('show');
                                if (response.message == null || response.message == '') {
                                    $('#message-notification-error').html(
                                        "{{ __('login.error') }}");
                                } else {
                                    $('#message-notification-error').html(response.message);
                                }
                            }
                        },
                        error: function (response) {
                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
                else{
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html('No Data Selected');
                }
            });
        }

        function getValue (data, dataDetail, func) {
            $('#medical_checkup_master_detail_modal').modal('show')
            $('#modal-title-detail').html(`${func} Batch for ${data.activityName}`)
            $('#batch_code').prop('readonly', func === 'Add' ? false : true)

            $('#batch_code').val(dataDetail ? dataDetail.batchCode : '')
            $('#capacity').val(dataDetail ? dataDetail.capacity : '')
            $('#stage').val(dataDetail ? dataDetail.sequence : '')
            $('#batch_description').val(dataDetail ? dataDetail.description : '')
        }

        $('#medical_checkup_master_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            e.stopPropagation();
        });

        $('#medical_checkup_master_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('medical/medical_checkup_master') }}";
        })

        // $('#notification_error').on('hide.bs.modal', function () {
        //     window.location = "{{ url('medical/medical_checkup_master') }}";
        // })

        $("#toolbar-new").on('click', function() {
            $.redirect("{{ url('medical/medical_checkup_master/detail_data') }}", { 'activityCode' : null, 'func': 'new' }, "GET", "iframe_dashboard");
        });

        $("#toolbar-edit").on('click', function() {
            var data = table.rows('.selected').data();
            if(data.count() > 0){
                $.redirect("{{ url('medical/medical_checkup_master/detail_data') }}", { 'activityCode' : data[0].activityCode, 'func' : 'edit' }, "GET", "iframe_dashboard");
            }else{
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        // $('#medical_checkup_master_table tbody').on('click', 'tr td:not(:first-child)', function () {
        //     var data = table.row(this).data();
        //     $.redirect("{{ url('medical/medical_checkup_master/detail_data') }}", { 'activityCode' : data[0].activityCode, 'func' : 'edit' }, "GET", "iframe_dashboard");
        // });
        
        $("#toolbar-delete").on('click', function() {
            var data = table.rows('.selected').data().toArray();

            if(data.length > 0){
                $.ajax({
                    url: "{{ url('medical/medical_checkup_master/remove') }}",
                    type: "GET",
                    data: {
                        'data' : data
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success').modal('show');
                            $('#message-notification-success').html(response
                                .message);
                            $('#medical_checkup_master_table').DataTable().destroy();
                            load_data_medical_checkup_master()
                            setTimeout(function () {
                                $('#notification_success').modal('hide');
                            }, 3000);
                        } else {
                            $('#notification_error').modal('show');
                            if (response.message == null || response.message == '') {
                                $('#message-notification-error').html(
                                    "{{ __('login.error') }}");
                            } else {
                                $('#message-notification-error').html(response.message);
                            }
                        }
                    },
                    error: function (response) {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            }
            else{
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $("#btn-save-detail").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#medical_checkup_master_detail_form").submit();
        });

        if ($("#medical_checkup_master_detail_form").length > 0) {
            $("#medical_checkup_master_detail_form").validate({
                rules: {
                    batch_code: {
                        required: true,
                    },
                    stage: {
                        required: true,
                    },
                },
                messages: {
                    batch_code: {
                        required: "{{ __('md_medical_checkup_master.batch_code_required') }}",
                    },
                    stage: {
                        required: "{{ __('md_medical_checkup_master.stage_required') }}",
                    },
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                    $("#btn-save-detail").prop("disabled", false);
                    $("#btn-save-detail").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("md_medical_checkup_master.btn_save") }}'
                    );
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    $("#btn-save-detail").prop("disabled", false);
                    $("#btn-save-detail").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("md_medical_checkup_master.btn_save") }}'
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
                        url: "{{ url('medical/medical_checkup_master_detail/proses') }}",
                        type: "POST",
                        data: $('#medical_checkup_master_detail_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-detail").prop("disabled", false);
                                $("#btn-save-detail").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("md_medical_checkup_master.btn_save") }}'
                                );
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                
                                // medicalCheckupMasterDetail();
                                $('#medical_checkup_master_detail_modal').modal('hide');
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('medical/medical_checkup_master') }}";
                                }, 3000);
                            } else {
                                $("#btn-save-detail").prop("disabled", false);
                                $("#btn-save-detail").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("md_medical_checkup_master.btn_save") }}'
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
                            $("#btn-save-detail").prop("disabled", false);
                            $("#btn-save-detail").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("md_medical_checkup_master.btn_save") }}'
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