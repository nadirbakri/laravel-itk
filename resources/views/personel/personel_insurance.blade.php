<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel_insurance.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ asset('css/personel_detail.css') }}">
	<style type="text/css">
		.div-personel {
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
	</style>
</head>

<body>
	<div class="div-personel">
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
            <a href="javascript:void(0)" id="toolbar-import" style="width: 9%" onclick="document.getElementById('import').click()">
                <input type="file" class="custom-file-input" name="import" id="import" hidden onchange="handleFileUpload(this)">
                <img src="{{ url('/icons/functionbar/functionbar-import-blue.svg') }}" alt="Import">
                <img src="{{ url('/icons/functionbar/functionbar-import-white.svg') }}" class="functionbar-hover" alt="Import">
                <span>Import</span>
            </a>
            <a href="javascript:void(0)" id="toolbar-export" style="width: 9%">
                <img src="{{ url('/icons/functionbar/functionbar-export-blue.svg') }}" alt="Export">
                <img src="{{ url('/icons/functionbar/functionbar-export-white.svg') }}" class="functionbar-hover" alt="Export">
                <span>Export</span>
            </a>
            <a href="javascript:void(0)" id="toolbar-download-template" style="width: 17%">
                <img src="{{ url('/icons/functionbar/functionbar-download-blue.svg') }}" alt="Download Template">
                <img src="{{ url('/icons/functionbar/functionbar-download-white.svg') }}" class="functionbar-hover" alt="Download Template">
                <span>Download Template</span>
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
			<a href="{{ route('personnel', ['moduleID' => 'PE']) }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('personel_insurance.list') }}</span>
			</a>
		</div>

		<div class="div-table">
			<table id="insurance_table" class="table hover">
				<thead>
					<tr>
                        <th></th>
						<th>Employee No</th>
						<th>Full Name</th>
						{{-- <th>Code</th>
						<th>Class</th>
						<th>Start Date</th>
                        <th>End Date</th>
                        <th>Policy No</th>
                        <th>Remarks</th> --}}
					</tr>
				</thead>
			</table>
		</div>
	</div>
    <div class="modal fade" role="dialog" id="delete_insurance">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="display: flex; flex-direction: column; justify-content: center;  align-items: center;">
                        <img src="{{ url('/icons/warning/warning-circle-fill.svg') }}" alt="Warning">
                        <h6>Caution</h6>
                        <p>Are you sure you want to delete this insurance?</p>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn w-25" style="border: 1px solid #1A7AD0; color: #1A7AD0;" data-dismiss="modal">{{ __('personel_insurance.btn_no') }}</button>
                    <button type="button" class="btn w-25" style="background-color: #1A7AD0 ;color: #FFFFFF;" id="btn-yes" data-dismiss="modal">{{ __('personel_insurance.btn_yes') }}</button>
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
                        <span class="title-text-notification">{{ __('personel_insurance.alert_success') }}</span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('js/jquery.redirect.js') }}"></script>

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
            else {
                const formData = new FormData();
                formData.append('file', file);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('personnel/insurance/import') }}",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function (response) {
                        // if (response.status == "true") {
                        if (response[0].status == "true") {
                            $("#toolbar-import").prop("disabled", false);
                            $("#toolbar-import").html(
                                '<a href="javascript:void(0)" id="toolbar-import" style="width: 17%"><img src="{{ url('/icons/functionbar/functionbar-import-blue.svg') }}" alt="Import"><img src="{{ url('/icons/functionbar/functionbar-import-white.svg') }}" class="functionbar-hover" alt="Import"><span>Import</span></a>'
                            );
                            $('#notification_success').modal('show');
                            $('#message-notification-success').html(response[0]
                                .message);
                            setTimeout(function () {
                                window.location =
                                    "{{ url('personnel/insurance') }}";
                            }, 3000);
                        } else {
                            $("#toolbar-import").prop("disabled", false);
                            $("#toolbar-import").html(
                                '<a href="javascript:void(0)" id="toolbar-import" style="width: 17%"><img src="{{ url('/icons/functionbar/functionbar-import-blue.svg') }}" alt="Import"><img src="{{ url('/icons/functionbar/functionbar-import-white.svg') }}" class="functionbar-hover" alt="Import"><span>Import</span></a>'
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
                        $("#toolbar-import").prop("disabled", false);
                        $("#toolbar-import").html(
                            '<a href="javascript:void(0)" id="toolbar-import" style="width: 17%"><img src="{{ url('/icons/functionbar/functionbar-import-blue.svg') }}" alt="Import"><img src="{{ url('/icons/functionbar/functionbar-import-white.svg') }}" class="functionbar-hover" alt="Import"><span>Import</span></a>'
                        );
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            }
        }
    }
    
  $(document).ready(function() {
    var table = null;
    let selectedInsurance = {};
    $('.div-navbar a.disabled').attr('onclick', 'return false;');
  	
    $('#insurance_table thead tr').clone(true).appendTo('#insurance_table thead');
    $('#insurance_table thead tr:eq(1) th').each( function (i) {
        if (i === 0) {
            $(this).html('');
        }
        else {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="' + title + '" />');

            $('input', this).on('keyup change', function () {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        }
    });

    $("#toolbar-export").click(function () {
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
            url: "{{ url('personnel/insurance/export') }}",
            type: "POST",
            success: function (result, status, xhr) {
                $("#toolbar-export").prop("disabled", false);
                $("#toolbar-export").html(
                    '<a href="javascript:void(0)" id="toolbar-export" style="width: 17%"><img src="{{ url('/icons/functionbar/functionbar-export-blue.svg') }}" alt="Export"><img src="{{ url('/icons/functionbar/functionbar-export-white.svg') }}" class="functionbar-hover" alt="Export"><span>Export</span></a>'
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
                $("#toolbar-export").prop("disabled", false);
                $("#toolbar-export").html(
                    '<a href="javascript:void(0)" id="toolbar-export" style="width: 17%"><img src="{{ url('/icons/functionbar/functionbar-export-blue.svg') }}" alt="Export"><img src="{{ url('/icons/functionbar/functionbar-export-white.svg') }}" class="functionbar-hover" alt="Export"><span>Export</span></a>'
                );
                $('#notification_error').modal('show');
                $('#message-notification-error').html(response);
            }
        });
    });

    $("#toolbar-download-template").click(function () {
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
            url: "{{ url('personnel/insurance/download_template') }}",
            type: "POST",
            success: function (result, status, xhr) {
                $("#toolbar-download-template").prop("disabled", false);
                $("#toolbar-download-template").html(
                    '<a href="javascript:void(0)" id="toolbar-download-template" style="width: 17%"><img src="{{ url('/icons/functionbar/functionbar-download-blue.svg') }}" alt="Download Template"><img src="{{ url('/icons/functionbar/functionbar-download-white.svg') }}" class="functionbar-hover" alt="Download Template"><span>Download Template</span></a>'
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
                $("#toolbar-download-template").prop("disabled", false);
                $("#toolbar-download-template").html(
                    '<a href="javascript:void(0)" id="toolbar-download-template" style="width: 17%"><img src="{{ url('/icons/functionbar/functionbar-download-blue.svg') }}" alt="Download Template"><img src="{{ url('/icons/functionbar/functionbar-download-white.svg') }}" class="functionbar-hover" alt="Download Template"><span>Download Template</span></a>'
                );
                $('#notification_error').modal('show');
                $('#message-notification-error').html(response);
            }
        });
    });
    
    function load_data_table_insurance() {
        table = $('#insurance_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('personnel/insurance/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'full_numbers',
            "order": [[ 1, "asc" ]],
            columns: [
                {
                    "className": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                {data: 'employeeNo', name: 'employeeNo'},
                {data: 'fullName', name: 'fullName'},
                // {data: 'insurance.insuranceCode', name: 'insurance.insuranceCode'},
                // {data: 'insurance.insuranceClassCode', name: 'insurance.insuranceClassCode'},
                // {data: 'insurance.insuranceStartDate', name: 'insurance.insuranceStartDate',
                //     render: function (data, type, row) {
                //         return moment(data).format('DD-MMM-YYYY');
                //     }
                // },
                // {data: 'insurance.insuranceEndDate', name: 'insurance.insuranceEndDate',
                //     render: function (data, type, row) {
                //         return moment(data).format('DD-MMM-YYYY');
                //     }
                // },
                // {data: 'insurance.insurancePolicyNo', name: 'insurance.insurancePolicyNo'},
                // {data: 'insurance.insuranceRemark', name: 'insurance.insuranceRemark'},
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }
        });
    }

    load_data_table_insurance();

    $('#insurance_table').on('click', 'tr td:first-child', function(e){
        $(this).parent().find('input[type="checkbox"]').trigger('click');
    });

    $('#insurance_table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            if (!tr.hasClass('shown')) {
                var d = row.data();
                
                if (d.insurance && d.insurance.length > 0) {
                    var childTableId = 'child-table-' + d.employeeNo;

                    var childHtml = `
                        <table id="${childTableId}" class="display child-table" width="100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Insurance Code</th>
                                    <th>Class Code</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Policy No</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>
                        </table>
                    `;

                    row.child(childHtml).show();
                    tr.addClass('shown');

                    d.insurance.forEach(i => {
                        i.employeeNo = d.employeeNo;
                    });

                    var childTable = $('#' + childTableId).DataTable({
                        data: d.insurance,
                        paging: false,
                        searching: false,
                        info: false,
                        ordering: true,
                        order: [[ 1, "desc" ]],
                        columns: [
                            {
                                data: null,
                                orderable: false,
                                render: function(data, type, row, meta) {
                                    return type === 'display'? '<input class="chk-select" type="checkbox">' : '';
                                }
                            },
                            {data: 'insuranceCode'},
                            {data: 'insuranceClassCode'},
                            {
                                data: 'insuranceStartDate',
                                render: function (data) {
                                    return moment(data).format('DD-MMM-YYYY');
                                }
                            },
                            {
                                data: 'insuranceEndDate',
                                render: function (data) {
                                    return moment(data).format('DD-MMM-YYYY');
                                }
                            },
                            {data: 'insurancePolicyNo'},
                            {data: 'insuranceRemark'}
                        ]
                    });

                    $('#' + childTableId + ' tbody').on('click', 'input.chk-select', function (e) {
                        e.stopPropagation();
                    });

                    $('#' + childTableId + ' tbody').on('click', 'td:first-child', function (e) {
                        e.stopPropagation();
                    });

                    $('#' + childTableId + ' tbody').on('click', 'tr td:not(:first-child)', function (e) {
                        var row = childTable.row($(this).closest('tr'));
                        var data = row.data();
                        if (data) {
                            $.redirect("{{ url('personnel/insurance/detail_data') }}", {
                                'employeeNo': data.employeeNo,
                                'insuranceCode': data.insuranceCode,
                                'func': 'edit'
                            }, "GET", "iframe_dashboard");
                        }
                    })
                } else {
                    row.child('<div style="padding: 10px;">No insurance data available.</div>').show();
                    tr.addClass('shown');
                }
            }
        }
    });

    $('#notification_success').on('hide.bs.modal', function () {
        window.location = "{{ url('personnel/insurance') }}";
    })

    $('#notification_error').on('hide.bs.modal', function () {
        window.location = "{{ url('personnel/insurance') }}";
    })

    $("#toolbar-new").on('click', function() {
        $.redirect("{{ url('personnel/insurance/detail_data') }}", { 'employeeNo' : null, 'insuranceCode' : null, 'func' : 'new' }, "GET", "iframe_dashboard");
    });

    $("#toolbar-edit").on('click', function() {
        var selectedInsurance = null;

        $('.child-table').each(function () {
            if (selectedInsurance) return false;

            var childTable = $(this).DataTable();

            $(this).find('tbody input.chk-select:checked').each(function () {
                var row = $(this).closest('tr');
                var rowData = childTable.row(row).data();

                if (rowData) {
                    selectedInsurance = rowData;
                    return false;
                }
            });
        });

        if (selectedInsurance) {
            $.redirect("{{ url('personnel/insurance/detail_data') }}", {
                'employeeNo': selectedInsurance.employeeNo,
                'insuranceCode': selectedInsurance.insuranceCode,
                'func': 'edit'
            }, "GET", "iframe_dashboard");
        } else {
            $('#notification_error').modal('show');
            $('#message-notification-error').html('No Data Selected');
        }
    });

    $("#toolbar-delete").on('click', function() {
        var selectedInsurances = [];

        $('.child-table').each(function () {
            var childTable = $(this).DataTable();

            $(this).find('tbody input.chk-select:checked').each(function () {
                var row = $(this).closest('tr');
                var rowData = childTable.row(row).data();
                if (rowData) {
                    selectedInsurances.push(rowData);
                }
            });
        });
        
        if(selectedInsurances.length > 0){
            $('#delete_insurance').modal('show');

            $("#btn-yes").on('click', function() {
                $.ajax({
                    url: "{{ url('personnel/insurance/remove') }}",
                    type: "GET",
                    data: {
                        'data' : selectedInsurances
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success').modal('show');
                            $('#message-notification-success').html(response
                                .message);
                            $('#insurance_table').DataTable().destroy();
                            load_data_table_insurance();
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
            });
        }else{
            $('#notification_error').modal('show');
            $('#message-notification-error').html('No Data Selected');
        }
    });

    // $('#insurance_table tbody').on('click', 'tr td:not(:first-child)', function () {
    // 	var data = table.row(this).data();
    // 	$.redirect("{{ url('personnel/insurance/detail_data') }}", { 'employeeNo' : data.employeeNo, 'insuranceCode' : data.insuranceCode, 'func' : 'edit' }, "GET", "iframe_dashboard");
    // });
    
  });
</script>

</html>