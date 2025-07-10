<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel_family_dependent.judul') }}</title>
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
			margin-top: 0;
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
        .div-employee-name {
            font-family: Montserrat;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            color: #737373;
        }
        .div-employee-no {
            font-family: Montserrat-Regular;
            font-size: 13px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            letter-spacing: 0.01px;
            color: #8F8F8F; 
            border-radius: 16px; 
            background-color: #F5F5F5; 
            text-align: center;
            padding: 4px 12px;
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
			<a href="{{ url('personnel/family_dependent') }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('personel_family_dependent.list_detail') }}</span>
			</a>
		</div>

        <div class="div-form px-5">
            <div class="row">
                <div class="col-2 d-flex align-items-center" style="gap: 12px">
                    <p class="div-employee-name mb-0" id="employee_name"></p>
                    <span class="div-employee-no" id="employee_no"></span>
                </div>
            </div>
        </div>

		<div class="div-table">
			<table id="family_dependent_table_detail" class="table hover">
				<thead>
					<tr>
                        <th></th>
						<th>Seq No</th>
						<th>Family Name</th>
						<th>Birth Date</th>
                        <th>Birth Place</th>
                        <th>Gender</th>
                        <th>Occupation</th>
                        <th>Blood Type</th>
                        <th>Family Card Number</th>
                        <th>Relationship</th>
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
                        <span class="title-text-notification">{{ __('personel_family_dependent.alert_success') }}</span>
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
    var table = null;
    let selectedInsurance = {};
    const arrData = @json($data[0]);
    $('.div-navbar a.disabled').attr('onclick', 'return false;');

    $('#employee_name').html(arrData.familyName)
    $('#employee_no').html(arrData.employeeNo)
  	
    $('#family_dependent_table_detail thead tr').clone(true).appendTo('#family_dependent_table_detail thead');
    $('#family_dependent_table_detail thead tr:eq(1) th:not(:first-child)').each( function (i) {
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
    
    function load_data_table_family_dependent() {
        table = $('#family_dependent_table_detail').DataTable({
            processing: true,
            // serverSide: true,
            orderCellsTop: true,
            data: arrData.peMasterFamilyTemp,
            // error: function(jqXHR, ajaxOptions, thrownError) {
            //     alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            // },
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
                {data: 'seqNo', name: 'seqNo'},
                {data: 'familyName', name: 'familyName'},
                {data: 'birthDate', name: 'birthDate',
                    render: function (data, type, row) {
                        return moment(data).format('DD-MMM-YYYY');
                    }
                },
                {data: 'birthPlace', name: 'birthPlace'},
                {data: 'genderName', name: 'genderName'},
                {data: 'occupation', name: 'occupation'},
                {data: 'bloodType', name: 'bloodType'},
                {data: 'familyCardNumber', name: 'familyCardNumber'},
                {data: 'relationName', name: 'relationName'},
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }
        });
    }

    load_data_table_family_dependent();

    $('#family_dependent_table_detail').on('click', 'tr td:first-child', function(e){
        $(this).parent().find('input[type="checkbox"]').trigger('click');
    });

    $('#notification_success').on('hide.bs.modal', function () {
        window.location = "{{ url('personnel/family_dependent') }}";
    })

    $('#notification_error').on('hide.bs.modal', function () {
        window.location = "{{ url('personnel/family_dependent') }}";
    })

    $("#toolbar-new").on('click', function() {
        const dataDetail = {
            employeeNo : arrData.employeeNo,
            employeeName : arrData.familyName,
        }
        $.redirect("{{ url('personnel/family_dependent/detail_table/detail_data') }}", { data: dataDetail, func : 'new' }, "GET", "iframe_dashboard");
    });

    $("#toolbar-edit").on('click', function() {
        var data = table.rows('.selected').data();
        const dataDetail = {
            employeeNo : arrData.employeeNo,
            employeeName : arrData.familyName,
            ...data
        }
        if(data.count() > 0){
            $.redirect("{{ url('personnel/family_dependent/detail_table/detail_data') }}", { data: dataDetail, 'func' : 'edit' }, "GET", "iframe_dashboard");
        }else{
            $('#notification_error').modal('show');
            $('#message-notification-error').html('No Data Selected');
        }
    });

    $('#family_dependent_table_detail tbody').on('click', 'tr td:not(:first-child)', function () {
    	var data = table.row(this).data();
        const dataDetail = {
            employeeNo : arrData.employeeNo,
            employeeName : arrData.familyName,
            ...data
        }
    	$.redirect("{{ url('personnel/family_dependent/detail_table/detail_data') }}", { data: dataDetail, func:  'edit' }, "GET", "iframe_dashboard");
    });
    
  });
</script>

</html>