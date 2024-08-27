<!DOCTYPE html>
<html>
<head>
	<title>{{ __('utilities_reference_mobile.judul') }}</title>
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
		.div-utilities {
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
	<div class="div-utilities">
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
            <a href="javascript:void(0)" style="display: none;" id="toolbar-save">
                <img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">
                <img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">
                <span>Save</span>
            </a>
            <a class="list-functionbar-md" href="javascript:void(0)" id="toolbar-active" style="display: none;">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-blue.svg') }}" alt="Activate">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-white.svg') }}" class="functionbar-hover" alt="Activate">
                <span>Activate</span>
            </a>
            <a class="list-functionbar-lg" href="javascript:void(0)" id="toolbar-deactive" style="display: none;">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-blue.svg') }}" alt="Deactivate">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-white.svg') }}" class="functionbar-hover" alt="Deactivate">
                <span>Deactivate</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-list">
                <img src="{{ url('/icons/functionbar/functionbar-list-blue.svg') }}" alt="List">
                <img src="{{ url('/icons/functionbar/functionbar-list-white.svg') }}" class="functionbar-hover" alt="List">
                <span>List</span>
            </a>
            <a class="list-functionbar-md" href="javascript:void(0)" id="toolbar-remove">
                <img src="{{ url('/icons/functionbar/functionbar-remove-blue.svg') }}" alt="List">
                <img src="{{ url('/icons/functionbar/functionbar-remove-white.svg') }}" class="functionbar-hover" alt="Delete">
                <span>Delete</span>
            </a>
            <a class="list-functionbar-lgm" href="javascript:void(0)" id="toolbar-template">
                <span class="no-image">Download Template</span>
            </a>
            <a href="javascript:void(0)" id="toolbar-import" data-toggle="modal" data-target="#modal_import">
                <span class="no-image">Import</span>
            </a>
        </div>
		<div class="div-title">
			<a href="{{ route('utilities', ['moduleID' => 'UTI']) }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('utilities_reference_mobile.list') }}</span>
			</a>
		</div>
		<div class="div-table">
            <table id="reference_mobile_table" class="table hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>Variable</th>
                        <th>Code</th>
                        <th>Value</th>
                    </tr>
                </thead>
            </table>
		</div>
	</div>
    <div class="modal fade" id="modal_import"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('utilities_reference_mobile.btn_import') }} {{ __('utilities_reference_mobile.list_detail') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="import_reference_mobile_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="import_file">{{ __('utilities_reference_mobile.label_import_file') }}</label>
                                    <span style="color: red;">*</span>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="import_file" name="import_file">
                                        <label class="custom-file-label" for="import_file">{{ __('utilities_reference_mobile.label_select_import_file') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary w-25" name="btn-import" id="btn-import">
                        <i class="fa fa-play-circle-o"></i> {{ __('utilities_reference_mobile.btn_import') }}
                    </button>
                    <button type="button" class="btn btn-outline-primary w-25" data-dismiss="modal"><i
                        class="fa fa-times-circle"></i> {{ __('utilities_reference_mobile.btn_cancel') }}</button>
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
                        <span class="title-text-notification">{{ __('utilities_reference_mobile.alert_success') }}</span>
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
    
  $(document).ready(function() {
    //addClass = disabled first;
    $('.div-navbar a.disabled').attr('onclick', 'return false;');

    $('#reference_mobile_table thead tr').clone(true).appendTo('#reference_mobile_table thead');
    $('#reference_mobile_table thead tr:eq(1) th:not(:first-child)').each( function (i) {
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
    
    var table = $('#reference_mobile_table').DataTable({
        processing: true,
        serverSide: true,
        orderCellsTop: true,
        ajax: "{{ url('utilities/reference_mobile/table') }}",
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
            {data: 'variable', name: 'variable'},
            {data: 'code', name: 'code'},
            {data: 'value', name: 'value'}
        ],
        select: {
            style:    'single',
            selector: 'td:first-child'
        }
    });

    function load_data_reference_mobile() {
        table = $('#reference_mobile_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('utilities/reference_mobile/table') }}",
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
                {data: 'variable', name: 'variable'},
                {data: 'code', name: 'code'},
                {data: 'value', name: 'value'}
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }
        });
    }

    $('#reference_mobile_table tbody').on('click', 'input[type="checkbox"]', function(e){
        var $row = $(this).closest('tr');

        if(this.checked){
            $row.addClass('selected');
        } else {
            $row.removeClass('selected');
        }

        // Prevent click event from propagating to parent
        e.stopPropagation();
    });

    $('#reference_mobile_table').on('click', 'tr td:first-child', function(e){
        $(this).parent().find('input[type="checkbox"]').trigger('click');
    });

    $('#notification_success').on('hide.bs.modal', function () {
        window.location = "{{ url('utilities/reference_mobile') }}";
    })

    $("#toolbar-new").on('click', function() {
        $.redirect("{{ url('utilities/reference_mobile/detail_data') }}", { 'variable' : null, 'code' : null, 'func' : 'new' }, "GET", "iframe_dashboard");
    });

    $("#toolbar-edit").on('click', function() {
        var data = table.rows('.selected').data();
        if(data.count() > 0){
            $.redirect("{{ url('utilities/reference_mobile/detail_data') }}", { 'variable' : data[0].variable, 'code' : data[0].code, 'func' : 'edit' }, "GET", "iframe_dashboard");
        }else{
            $('#notification_error').modal('show');
            $('#message-notification-error').html('No Data Selected');
        }
    });

    $("#toolbar-remove").on('click', function() {
        var data = table.rows('.selected').data();
        if(data.count() > 0){
            if (confirm("Are you sure you want to delete this data?")) {
                $.ajax({
                    url: "{{ url('utilities/reference_mobile/delete') }}",
                    type: "GET",
                    data: { 'variable' : data[0].variable, 'code' : data[0].code },
                    success: function(response) {
                        if(response.status == "true"){
                            $('#notification_success').modal('show');
                            $('#message-notification-success').html(response.message);
                            setTimeout(function(){ 
                                window.location = "{{ url('utilities/reference_mobile') }}";
                            }, 3000);
                        }else{
                            $('#notification_error').modal('show');
                            if(response.message == null || response.message == ''){
                                $('#message-notification-error').html("{{ __('login.error') }}");
                            }else{
                                $('#message-notification-error').html(response.message);
                            }
                        }
                        var oTable = $('#reference_mobile_table').dataTable();
                        oTable.fnDraw(false);
                    },
                    error: function(response) {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            }
        }else{
            $('#notification_error').modal('show');
            $('#message-notification-error').html('No Data Selected');
        }
    });

    $("#toolbar-template").on('click', function() {
        var data = table.rows('.selected').data();
        if(data.count() > 0){
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            $.ajax({
                xhrFields: {
                    responseType: 'blob',
                },
                url: "{{ url('payroll/reference_mobile/template') }}",
                type: "POST",
                processData: false,
                contentType: false,
                data: { 'variable' : data[0].variable, 'code' : data[0].code },
                success: function (result, status, xhr) {
                    $("#toolbar-template").prop("disabled", false);
                    $("#toolbar-template").html(
                        '<span class="no-image">Download Template</span>'
                    );
                    var disposition = xhr.getResponseHeader(
                        'content-disposition');
                    var matches = /"([^"]*)"/.exec(disposition);
                    var filename = (matches != null && matches[1] ? matches[1] :
                        'audit_trail.xlsx');

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
                    $("#toolbar-template").prop("disabled", false);
                    $("#toolbar-template").html(
                        '<span class="no-image">Download Template</span>'
                    );
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        }else{
            $('#notification_error').modal('show');
            $('#message-notification-error').html('No Data Selected');
        }
    });

    $("#btn-import").on('click', function() {
        $(this).prop("disabled", true);
        $(this).html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
        );
        
        $("#import_reference_mobile_form").validate({
            rules: {
                import_file: {
                    required: true,
                    extension: "xls|xlsx|xml"
                }
            },
            messages: {
                import_file: {
                    required: "{{ __('utilities_reference_mobile.import_required') }}",
                    extension: "{{ __('utilities_reference_mobile.import_extension') }}"
                }
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                $("#btn-import").prop("disabled", false);
                $("#btn-import").html(
                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_reference_mobile.btn_import") }}'
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

                var myform = document.getElementById("import_reference_mobile_form");
                data = new FormData(myform);

                $.ajax({
                    url: "{{ url('payroll/reference_mobile/import') }}",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: data,
                    success: function (response) {
                        if (response[0].status == "true") {
                            $("#btn-import").prop("disabled", false);
                            $("#btn-import").html(
                                '<i class="fa fa-play-circle-o"></i> {{ __("utilities_reference_mobile.btn_import") }}'
                            );
                            $('#modal_import').hide();
                            $('#notification_success').modal('show');
                            $('#message-notification-success').html(response[0]
                                .message);
                            setTimeout(function () {
                                window.location =
                                    "{{ url('payroll/reference_mobile') }}";
                            }, 3000);
                        } else {
                            $("#btn-import").prop("disabled", false);
                            $("#btn-import").html(
                                '<i class="fa fa-play-circle-o"></i> {{ __("utilities_reference_mobile.btn_import") }}'
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
                        $("#btn-import").prop("disabled", false);
                        $("#btn-import").html(
                            '<i class="fa fa-play-circle-o"></i> {{ __("utilities_reference_mobile.btn_import") }}'
                        );
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            }
        })
    });

    $('#reference_mobile_table tbody').on('click', 'tr td:not(:first-child)', function () {
        var data = table.row(this).data();
        $.redirect("{{ url('utilities/reference_mobile/detail_data') }}", { 'variable' : data.variable, 'code' : data.code, 'func' : 'edit' }, "GET", "iframe_dashboard");
    });
    
  });
</script>

</html>