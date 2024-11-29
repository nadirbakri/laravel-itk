<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel_employee_termination.judul') }}</title>
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
        
        thead tr .middle {
            text-align: center !important;
            vertical-align: middle;
        }

        .form-control {
            height: 2rem;
        }
	</style>
</head>

<body>
	<div class="div-personel">
        <div class="div-navbar sticky-navbar">
            <a href="javascript:void(0)" id="toolbar-cancel-termination" style="width: 16%">
                <img src="{{ url('/icons/functionbar/functionbar-x-blue.svg') }}" alt="Cancel Termination">
                <img src="{{ url('/icons/functionbar/functionbar-x-white.svg') }}" class="functionbar-hover" alt="Cancel Termination">
                <span>Cancel Termination</span>
            </a>
        </div>
		<div class="div-title">
			<a href="{{ route('personnel', ['moduleID' => 'PE']) }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('personel_employee_termination.list') }}</span>
			</a>
		</div>

		<div class="div-table">
			<table id="employee_termination_table" class="table hover">
				<thead>
					<tr>
                        <th></th>
						<th class="middle">Employee No</th>
                        <th class="middle">Employee Name</th>
                        <th class="middle">Termination Date</th>
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
                        <span class="title-text-notification">{{ __('personel_employee_termination.alert_success') }}</span>
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
    
  $(document).ready(function() {
    //addClass = disabled first;
    $('.div-navbar a.disabled').attr('onclick', 'return false;');

  	$('#employee_termination_table thead tr').clone(true).appendTo('#employee_termination_table thead');
    $('#employee_termination_table thead tr:eq(1) th:not(:first-child)').each( function (i) {
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

    load_data_table_employee_termination()

    function load_data_table_employee_termination() {
        table = $('#employee_termination_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('personnel/employee_termination/table') }}",
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
                    render: function(data, type, row) {
                        return type === 'display'? '<input class="chk-select" type="checkbox">' : '';
                    }
                },
                {data: 'employeeNo', name: 'employeeNo'},
                {data: 'fullName', name: 'fullName'},
                {
                    data: 'terminationDate', 
                    name: 'terminationDate',
                    render: function (data, type, row) {
                        return moment(data).format('DD-MMM-YYYY');
                    }
                },
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }
        });
    }

    $('#employee_termination_table tbody').on('click', 'input[type="checkbox"]', function(e){
        var $row = $(this).closest('tr');

        if(this.checked){
            $row.addClass('selected');
        } else {
            $row.removeClass('selected');
        }

        // Prevent click event from propagating to parent
        e.stopPropagation();
    });

    $('#employee_termination_table').on('click', 'tr td:first-child', function(e){
        $(this).parent().find('input[type="checkbox"]').trigger('click');
    });

    $("#toolbar-cancel-termination").on('click', function() {
        var data = table.rows('.selected').data().toArray();

        if (data.length > 0) {
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
                url: "{{ url('personnel/employee_termination/proses') }}",
                type: "POST",
                data: {
                    'data' : data
                },
                success: function (response) {
                    $("#toolbar-cancel-termination").prop("disabled", false);
                    $("#toolbar-cancel-termination").html(
                        '<a href="javascript:void(0)" id="toolbar-cancel-termination" style="width: 17%"><img src="{{ url('/icons/functionbar/functionbar-x-blue.svg') }}" alt="Cancel Termination"><img src="{{ url('/icons/functionbar/functionbar-x-white.svg') }}" class="functionbar-hover" alt="Cancel Termination"><span>Cancel Termination</span></a>'
                    );

                    if (response.status == "true") {
                        $('#notification_success').modal('show');
                        $('#message-notification-success').html(response
                            .message);
                        $('#employee_termination_table').DataTable().destroy();
                        load_data_table_employee_termination();
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
                    $("#toolbar-cancel-termination").prop("disabled", false);
                    $("#toolbar-cancel-termination").html(
                        '<a href="javascript:void(0)" id="toolbar-cancel-termination" style="width: 17%"><img src="{{ url('/icons/functionbar/functionbar-x-blue.svg') }}" alt="Cancel Termination"><img src="{{ url('/icons/functionbar/functionbar-x-white.svg') }}" class="functionbar-hover" alt="Cancel Termination"><span>Cancel Termination</span></a>'
                    );
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        } else {
            $('#notification_error').modal('show');
            $('#message-notification-error').html('No Data Selected');
        }
    });
    
  });
</script>

</html>