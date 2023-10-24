<!DOCTYPE html>
<html>
<head>
	<title>{{ __('md_input_limit.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ asset('css/medical_detail.css') }}">
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
            <a href="javascript:void(0)" style="display: none;" id="toolbar-save">
                <img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">
                <img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">
                <span>Save</span>
            </a>
            <a class="list-functionbar-md" href="javascript:void(0)" id="toolbar-active">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-blue.svg') }}" alt="Activate">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-white.svg') }}" class="functionbar-hover" alt="Activate">
                <span>Activate</span>
            </a>
            <a class="list-functionbar-lg" href="javascript:void(0)" id="toolbar-deactive">
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
			<a href="javascript:void(0);" onclick="goBackWithModuleID()" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('md_input_limit.list') }}</span>
			</a>
		</div>

		<div class="div-table">
			<table id="input_limit_table" class="table hover">
				<thead>
					<tr>
                        <th></th>
						<th>Position Code</th>
						<th>Ranking Code</th>
                        <th>Claim Code</th>
                        <th>Currency Code</th>
                        <th>Service Month</th>
                        <th>Record Status</th>
					</tr>
				</thead>
			</table>
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
                        <span class="title-text-notification">{{ __('md_input_limit.alert_success') }}</span>
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
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>

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

  	$('#input_limit_table thead tr').clone(true).appendTo('#input_limit_table thead');
    $('#input_limit_table thead tr:eq(1) th:not(:first-child)').each( function (i) {
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
    
    var table = $('#input_limit_table').DataTable({
        processing: true,
        serverSide: true,
        orderCellsTop: true,
        ajax: "{{ url('medical/input_limit/table') }}",
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
            {data: 'positionCode', name: 'positionCode'},
            {data: 'rankingCode', name: 'rankingCode'},
            {data: 'claimCode', name: 'claimCode'},
            {data: 'currencyCode', name: 'currencyCode'},
            {data: 'serviceMonth', name: 'serviceMonth'},
            {data: 'recordStatus', name: 'recordStatus'}
        ],
        select: {
            style:    'multi',
            selector: 'td:first-child'
        }
    });

    function load_data_input_limit() {
        table = $('#input_limit_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('medical/input_limit/table') }}",
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
                {data: 'positionCode', name: 'positionCode'},
                {data: 'rankingCode', name: 'rankingCode'},
                {data: 'claimCode', name: 'claimCode'},
                {data: 'currencyCode', name: 'currencyCode'},
                {data: 'serviceMonth', name: 'serviceMonth'},
                {data: 'recordStatus', name: 'recordStatus'}
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }
        });
    }

    $('#input_limit_table tbody').on('click', 'input[type="checkbox"]', function(e){
        var $row = $(this).closest('tr');

        if(this.checked){
            $row.addClass('selected');
        } else {
            $row.removeClass('selected');
        }

        // Prevent click event from propagating to parent
        e.stopPropagation();
    });

    $('#input_limit_table').on('click', 'tr td:first-child', function(e){
        $(this).parent().find('input[type="checkbox"]').trigger('click');
    });

    $('#notification_success').on('hide.bs.modal', function () {
        window.location = "{{ url('medical/input_limit') }}";
    })

    $("#toolbar-new").on('click', function() {
        $.redirect("{{ url('medical/input_limit/detail_data') }}", { 'positionCode' : null, 'rankingCode' : null, 'serviceMonth' : null, 'claimCode' : null, 'currencyCode' : null, 'func' : 'new' }, "GET", "iframe_dashboard");
    });

    $("#toolbar-edit").on('click', function() {
        var data = table.rows('.selected').data();
        if(data.count() > 0){
            $.redirect("{{ url('medical/input_limit/detail_data') }}", { 'positionCode' : data[0].positionCode, 'rankingCode' : data[0].rankingCode, 'serviceMonth' : data[0].serviceMonth, 'claimCode' : data[0].claimCode, 'currencyCode' : data[0].currencyCode, 'func' : 'edit' }, "GET", "iframe_dashboard");
        }else{
            $('#notification_error').modal('show');
            $('#message-notification-error').html('No Data Selected');
        }
    });

    $("#toolbar-active").on('click', function() {
        var data = table.rows('.selected').data();
        if(data.count() > 0){
            $.ajax({
                url: "{{ url('medical/input_limit/status') }}",
                type: "GET",
                data: { 'positionCode' : data[0].positionCode, 'rankingCode' : data[0].rankingCode, 'serviceMonth' : data[0].serviceMonth, 'claimCode' : data[0].claimCode, 'currencyCode' : data[0].currencyCode, 'func' : 'A' },
                success: function(response) {
                    if(response.status == "true"){
                        $('#notification_success').modal('show');
                        $('#message-notification-success').html(response.message);
                        setTimeout(function(){ 
                            window.location = "{{ url('medical/input_limit') }}";
                        }, 3000);
                    }else{
                        $('#notification_error').modal('show');
                        if(response.message == null || response.message == ''){
                            $('#message-notification-error').html("{{ __('login.error') }}");
                        }else{
                            $('#message-notification-error').html(response.message);
                        }
                    }
                    var oTable = $('#input_limit_table').dataTable();
                    oTable.fnDraw(false);
                },
                error: function(response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        }else{
            $('#notification_error').modal('show');
            $('#message-notification-error').html('No Data Selected');
        }
    });

    $("#toolbar-deactive").on('click', function() {
        var data = table.rows('.selected').data();
        if(data.count() > 0){
            $.ajax({
                url: "{{ url('medical/input_limit/status') }}",
                type: "GET",
                data: { 'positionCode' : data[0].positionCode, 'rankingCode' : data[0].rankingCode, 'serviceMonth' : data[0].serviceMonth, 'claimCode' : data[0].claimCode, 'currencyCode' : data[0].currencyCode, 'func' : 'D' },
                success: function(response) {
                    if(response.status == "true"){
                        $('#notification_success').modal('show');
                        $('#message-notification-success').html(response.message);
                        setTimeout(function(){ 
                            window.location = "{{ url('medical/input_limit') }}";
                        }, 3000);
                    }else{
                        $('#notification_error').modal('show');
                        if(response.message == null || response.message == ''){
                            $('#message-notification-error').html("{{ __('login.error') }}");
                        }else{
                            $('#message-notification-error').html(response.message);
                        }
                    }
                    var oTable = $('#input_limit_table').dataTable();
                    oTable.fnDraw(false);
                },
                error: function(response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        }else{
            $('#notification_error').modal('show');
            $('#message-notification-error').html('No Data Selected');
        }
    });

    $('#input_limit_table tbody').on('click', 'tr td:not(:first-child)', function () {
    	var data = table.row(this).data();
    	$.redirect("{{ url('medical/input_limit/detail_data') }}", { 'positionCode' : data.positionCode, 'rankingCode' : data.rankingCode, 'serviceMonth' : data.serviceMonth, 'claimCode' : data.claimCode, 'currencyCode' : data.currencyCode, 'func' : 'edit' }, "GET", "iframe_dashboard");
    });
    
  });
</script>

</html>