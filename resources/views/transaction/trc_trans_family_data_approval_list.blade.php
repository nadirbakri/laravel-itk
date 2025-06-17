<!DOCTYPE html>
<html>
<head>
	<title>{{ __('trans_family_data_approval.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
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
        .modal {
            overflow-y:auto;
        }

        .modal-body {
            position: relative;
        }
        .div-employee-name {
            font-family: Montserrat-Medium;
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
        .chip-green {
            font-family: Montserrat-Medium;
            font-size: 12px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            letter-spacing: 0.01px;
            background-color: #EBFAF1; 
            border-radius: 30px; 
            color: #36C973;
            text-align: center; 
            padding: 4px 12px; 
            width: 42px
        }
        .chip-red {
            font-family: Montserrat-Medium;
            font-size: 12px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            letter-spacing: 0.01px;
            background-color: #FFEBEC; 
            border-radius: 30px; 
            color: #FE3440; 
            text-align: center; 
            padding: 4px 12px; 
            width: 42px
        }
        .chip-approved {
            font-family: Montserrat-Medium;
            font-size: 12px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            letter-spacing: 0.01px;
            display: flex;
            background-color: #E8F2FA; 
            border-radius: 30px; 
            border: 1px solid #D1E4F6;
            color: #1A7AD0; 
            text-align: center; 
            padding: 4px 12px 4px 6px;
            gap: 6px;
            width: 100px
        }
        .chip-rejected {
            font-family: Montserrat-Medium;
            font-size: 12px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            letter-spacing: 0.01px;
            display: flex;
            background-color: #FFEBEC; 
            border-radius: 30px; 
            border: 1px solid #FFD6D9;
            color: #FE3440; 
            text-align: center; 
            padding: 4px 12px 4px 6px;
            gap: 6px;
            width: 100px
        }
        .chip-history {
            display: flex; 
            width: 28px; 
            height: 28px; 
            justify-content: center; 
            align-items: center; 
            border-radius: 6px; 
            border: 1px solid #EBEEF2;
            cursor: pointer;
        }
        .btn-approve {
            font-family: Montserrat-Regular;
            font-size: 12px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            display: flex;
            background-color: #007BFF;
            color: #FFFFFF;
            border-radius: 6px;
            padding: 6px 12px;
            gap: 6px;
            justify-content: center;
            align-items: center;
            width: 99px;
            height: 28px;
        }
        .btn-approve:hover {
            color: #FFFFFF;
        }
        .btn-reject {
            font-family: Montserrat-Regular;
            font-size: 12px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            display: flex;
            background-color: #FFFFFF;
            color: #FE3440;
            border-radius: 6px;
            border: 1px solid #EBEEF2;
            padding: 6px 12px;
            gap: 6px;
            justify-content: center;
            align-items: center;
            width: 86px;
            height: 28px;
        }
        .btn-reject:hover {
            color: #FE3440;
        }
        .spinner-border {
            display: inline-block;
            width: 1rem;
            height: 1rem;
            vertical-align: text-bottom;
            border: 0.15em solid currentColor;
            border-right-color: transparent;
            border-radius: 50%;
            animation: spinner-border .75s linear infinite;
        }
	</style>
</head>

<body>
	<div class="div-personel">
		<div class="div-title">
            <a href="{{ route('transaction', ['moduleID' => 'TRX']) }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('trans_family_data_approval.judul') }}</span>
            </a>
        </div>

		<div class="div-table">
			<table id="family_data_approval_table" class="table hover">
				<thead>
					<tr>
						<th>Employee No</th>
						<th>Employee Name</th>
						<th>Family Full Name</th>
                        <th>Birth Date</th>
                        <th>Gender</th>
                        <th>Relationship</th>
                        <th>Phone Number</th>
                        <th>Emergency Contact</th>
                        <th>Full-Time Student</th>
                        <th>Persons with Disabilities</th>
                        <th>History</th>
                        <th>Action</th>
					</tr>
				</thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="display: flex; justify-content: center;"></td>
                        <td></td>
                    </tr>
                </tbody>
			</table>
		</div>

        <div class="modal fade" id="modal_history">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-little">History</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive">
                        <div class="row">
                            <div class="col-12 d-flex align-items-center mb-4" style="gap: 12px">
                                <p class="div-employee-name mb-0" id="employee_name"></p>
                                <span class="div-employee-no" id="employee_no"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6>{{ __('trans_family_data_approval.label_current') }}</h6>
                            </div>
                            <div class="col-12 mb-4">
                                <table id="family_data_history_current_table" class="table hover">
                                    <thead>
                                        <tr>
                                            <th style="min-width: 180px;">Family Full Name</th>
                                            <th style="min-width: 110px;">Birth Date</th>
                                            <th style="min-width: 96px;">Gender</th>
                                            <th style="min-width: 128px;">Relationship</th>
                                            <th style="min-width: 145px;">Phone Number</th>
                                            <th style="min-width: 121px;">Emergency Contact</th>
                                            <th style="min-width: 104px;">Full-Time Student</th>
                                            <th style="min-width: 123px;">Persons with Disabilities</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h6>{{ __('trans_family_data_approval.label_latest') }}</h6>
                            </div>
                            <div class="col-12">
                                <table id="family_data_history_latest_table" class="table hover">
                                    <thead>
                                        <tr>
                                            <th style="min-width: 138px;">Date Modified</th>
                                            <th style="min-width: 180px;">Family Full Name</th>
                                            <th style="min-width: 174px;">Birth Date</th>
                                            <th style="min-width: 96px;">Gender</th>
                                            <th style="min-width: 128px;">Relationship</th>
                                            <th style="min-width: 201px;">Phone Number</th>
                                            <th style="min-width: 121px;">Emergency Contact</th>
                                            <th style="min-width: 104px;">Full-Time Student</th>
                                            <th style="min-width: 123px;">Persons with Disabilities</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary w-25" data-dismiss="modal">{{ __('trans_family_data_approval.btn_cancel') }}</button>
                    </div>
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
                        <span class="title-text-notification">{{ __('trans_family_data_approval.alert_success') }}</span>
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
    $('.div-navbar a.disabled').attr('onclick', 'return false;');
  	
    $('#family_data_approval_table thead tr').clone(true).appendTo('#family_data_approval_table thead');
    $('#family_data_approval_table thead tr:eq(1) th').each( function (i) {
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
    
    function load_data_table_family_data() {
        table = $('#family_data_approval_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: {
                url: "{{ url('trans/family_data_approval/table') }}",
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText);
                }
            },
            "sDom": 'lrtip',
            'sPaginationType': 'full_numbers',
            "order": [[ 1, "asc" ]],
            columns: [
                {data: 'employeeNo', name: 'employeeNo'},
                {data: 'familyName', name: 'familyName'},
                {data: 'familyName', name: 'familyName'},
                {data: 'birthDate', name: 'birthDate',
                    render: function (data, type, row) {
                        return moment(data).format('DD-MMM-YYYY');
                    }
                },
                {data: 'genderName', name: 'genderName'},
                {data: 'relationName', name: 'relationName'},
                {data: 'handPhone', name: 'handPhone'},
                {data: 'emergencyContact', name: 'emergencyContact',
                    render: function (data, type, row) {
                        return data ? `<p class="chip-green">Yes</p>` : `<p class="chip-red">No</p>`;
                    }
                },
                {data: 'fullTimeStudent', name: 'fullTimeStudent',
                    render: function (data, type, row) {
                        return data ? `<p class="chip-green">Yes</p>` : `<p class="chip-red">No</p>`;
                    }
                },
                {data: 'disability', name: 'disability',
                    render: function (data, type, row) {
                        return data ? `<p class="chip-green">Yes</p>` : `<p class="chip-red">No</p>`;
                    }
                },
                {name: 'history', className: 'align-items-center justify-content-center',
                    render: function (data, type, row) {
                        return `<div class="chip-history" data-toggle="modal" data-target="#modal_history" onclick="historyPreview(this)"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none"><path d="M9 5.50002V8.21689L11.2575 9.57127C11.3712 9.63956 11.4531 9.75023 11.4853 9.87893C11.5174 10.0076 11.497 10.1438 11.4288 10.2575C11.3605 10.3712 11.2498 10.4532 11.1211 10.4853C10.9924 10.5174 10.8562 10.4971 10.7425 10.4288L8.2425 8.92877C8.16851 8.88431 8.10729 8.82146 8.06479 8.74633C8.02229 8.67119 7.99997 8.58634 8 8.50002V5.50002C8 5.36741 8.05268 5.24023 8.14645 5.14647C8.24022 5.0527 8.36739 5.00002 8.5 5.00002C8.63261 5.00002 8.75979 5.0527 8.85355 5.14647C8.94732 5.24023 9 5.36741 9 5.50002ZM8.5 2.50002C7.71125 2.49805 6.92994 2.65254 6.20128 2.95454C5.47263 3.25653 4.81111 3.70004 4.255 4.25939C3.80063 4.71939 3.39688 5.16189 3 5.62502V4.50002C3 4.36741 2.94732 4.24023 2.85355 4.14647C2.75979 4.0527 2.63261 4.00002 2.5 4.00002C2.36739 4.00002 2.24021 4.0527 2.14645 4.14647C2.05268 4.24023 2 4.36741 2 4.50002V7.00002C2 7.13263 2.05268 7.2598 2.14645 7.35357C2.24021 7.44734 2.36739 7.50002 2.5 7.50002H5C5.13261 7.50002 5.25979 7.44734 5.35355 7.35357C5.44732 7.2598 5.5 7.13263 5.5 7.00002C5.5 6.86741 5.44732 6.74023 5.35355 6.64647C5.25979 6.5527 5.13261 6.50002 5 6.50002H3.5625C4.00938 5.97377 4.45438 5.47814 4.96188 4.96439C5.65678 4.26949 6.54107 3.79477 7.50423 3.59957C8.46739 3.40436 9.46673 3.49732 10.3774 3.86682C11.288 4.23633 12.0696 4.866 12.6244 5.67715C13.1792 6.4883 13.4827 7.44497 13.4969 8.42761C13.5111 9.41026 13.2354 10.3753 12.7043 11.2022C12.1732 12.029 11.4102 12.681 10.5106 13.0767C9.61103 13.4724 8.6148 13.5942 7.6464 13.427C6.67799 13.2597 5.78034 12.8108 5.06563 12.1363C5.01786 12.0911 4.96167 12.0558 4.90026 12.0324C4.83885 12.009 4.77343 11.9979 4.70773 11.9997C4.64204 12.0016 4.57735 12.0164 4.51736 12.0432C4.45738 12.0701 4.40327 12.1085 4.35813 12.1563C4.31298 12.204 4.27769 12.2602 4.25427 12.3216C4.23084 12.383 4.21974 12.4485 4.2216 12.5142C4.22345 12.5799 4.23823 12.6445 4.26509 12.7045C4.29195 12.7645 4.33036 12.8186 4.37813 12.8638C5.09028 13.5358 5.95609 14.0234 6.9 14.2838C7.84391 14.5443 8.83722 14.5698 9.79326 14.3581C10.7493 14.1464 11.639 13.704 12.3847 13.0694C13.1304 12.4347 13.7095 11.6273 14.0713 10.7174C14.4332 9.80753 14.5669 8.82293 14.4607 7.84951C14.3546 6.87609 14.0118 5.94345 13.4623 5.13298C12.9128 4.3225 12.1733 3.65883 11.3083 3.19988C10.4433 2.74093 9.47919 2.50066 8.5 2.50002Z" fill="#FEC634"/></svg></div>`;
                    }
                },
                {data: 'status', name: 'status',
                    render: function (data, type, row) {
                        if (data === 'APPROVED') {
                            return `<p class="chip-approved"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none"><path d="M7.5 1.40625C6.29477 1.40625 5.11661 1.76364 4.1145 2.43323C3.11238 3.10282 2.33133 4.05454 1.87011 5.16802C1.40889 6.28151 1.28821 7.50676 1.52334 8.68883C1.75847 9.8709 2.33884 10.9567 3.19107 11.8089C4.0433 12.6612 5.1291 13.2415 6.31117 13.4767C7.49324 13.7118 8.71849 13.5911 9.83198 13.1299C10.9455 12.6687 11.8972 11.8876 12.5668 10.8855C13.2364 9.88339 13.5938 8.70523 13.5938 7.5C13.592 5.88436 12.9495 4.33538 11.807 3.19295C10.6646 2.05052 9.11564 1.40796 7.5 1.40625ZM10.1754 6.42539L6.89414 9.70664C6.85061 9.75022 6.79891 9.7848 6.74201 9.80839C6.6851 9.83198 6.6241 9.84412 6.5625 9.84412C6.5009 9.84412 6.4399 9.83198 6.383 9.80839C6.32609 9.7848 6.2744 9.75022 6.23086 9.70664L4.82461 8.30039C4.73666 8.21243 4.68724 8.09314 4.68724 7.96875C4.68724 7.84436 4.73666 7.72507 4.82461 7.63711C4.91257 7.54915 5.03186 7.49974 5.15625 7.49974C5.28064 7.49974 5.39994 7.54915 5.48789 7.63711L6.5625 8.7123L9.51211 5.76211C9.55566 5.71856 9.60737 5.68401 9.66427 5.66044C9.72117 5.63687 9.78216 5.62474 9.84375 5.62474C9.90534 5.62474 9.96633 5.63687 10.0232 5.66044C10.0801 5.68401 10.1318 5.71856 10.1754 5.76211C10.2189 5.80566 10.2535 5.85736 10.2771 5.91427C10.3006 5.97117 10.3128 6.03216 10.3128 6.09375C10.3128 6.15534 10.3006 6.21633 10.2771 6.27323C10.2535 6.33014 10.2189 6.38184 10.1754 6.42539Z" fill="#1A7AD0"/></svg>Approved</p>`;
                        }
                        else if (data === 'REJECTED') {
                            return `<p class="chip-rejected"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none"><path d="M7.5 1.40625C6.29477 1.40625 5.11661 1.76364 4.1145 2.43323C3.11238 3.10282 2.33133 4.05454 1.87011 5.16802C1.40889 6.28151 1.28821 7.50676 1.52334 8.68883C1.75847 9.8709 2.33884 10.9567 3.19107 11.8089C4.0433 12.6612 5.1291 13.2415 6.31117 13.4767C7.49324 13.7118 8.71849 13.5911 9.83198 13.1299C10.9455 12.6687 11.8972 11.8876 12.5668 10.8855C13.2364 9.88339 13.5938 8.70523 13.5938 7.5C13.592 5.88436 12.9495 4.33538 11.807 3.19295C10.6646 2.05052 9.11564 1.40796 7.5 1.40625ZM9.84375 7.96875H5.15625C5.03193 7.96875 4.9127 7.91936 4.8248 7.83146C4.73689 7.74355 4.6875 7.62432 4.6875 7.5C4.6875 7.37568 4.73689 7.25645 4.8248 7.16854C4.9127 7.08064 5.03193 7.03125 5.15625 7.03125H9.84375C9.96807 7.03125 10.0873 7.08064 10.1752 7.16854C10.2631 7.25645 10.3125 7.37568 10.3125 7.5C10.3125 7.62432 10.2631 7.74355 10.1752 7.83146C10.0873 7.91936 9.96807 7.96875 9.84375 7.96875Z" fill="#FE3440"/></svg>Rejected</p>`;
                        }
                        else if (data === 'NEW') {
                            return `<div class="status-new" style="display: flex; justify-content: center; gap: 8px;"><button type="button" class="btn btn-approve" onclick="updateApproval(this, 'APPROVED')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none"><path d="M14.3535 5.35403L6.35354 13.354C6.3071 13.4005 6.25196 13.4374 6.19126 13.4626C6.13056 13.4877 6.0655 13.5007 5.99979 13.5007C5.93408 13.5007 5.86902 13.4877 5.80832 13.4626C5.74762 13.4374 5.69248 13.4005 5.64604 13.354L2.14604 9.85403C2.05222 9.76021 1.99951 9.63296 1.99951 9.50028C1.99951 9.3676 2.05222 9.24035 2.14604 9.14653C2.23986 9.05271 2.36711 9 2.49979 9C2.63247 9 2.75972 9.05271 2.85354 9.14653L5.99979 12.2934L13.646 4.64653C13.7399 4.55271 13.8671 4.5 13.9998 4.5C14.1325 4.5 14.2597 4.55271 14.3535 4.64653C14.4474 4.74035 14.5001 4.8676 14.5001 5.00028C14.5001 5.13296 14.4474 5.26021 14.3535 5.35403Z" fill="white"/></svg>Approve</button><button type="button" class="btn btn-reject" onclick="updateApproval(this, 'REJECTED')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none"><path d="M12.8535 12.6465C12.9 12.693 12.9368 12.7481 12.962 12.8088C12.9871 12.8695 13.0001 12.9346 13.0001 13.0003C13.0001 13.066 12.9871 13.131 12.962 13.1917C12.9368 13.2524 12.9 13.3076 12.8535 13.354C12.8071 13.4005 12.7519 13.4373 12.6912 13.4625C12.6305 13.4876 12.5655 13.5006 12.4998 13.5006C12.4341 13.5006 12.369 13.4876 12.3083 13.4625C12.2476 13.4373 12.1925 13.4005 12.146 13.354L7.99979 9.20715L3.85354 13.354C3.75972 13.4478 3.63247 13.5006 3.49979 13.5006C3.36711 13.5006 3.23986 13.4478 3.14604 13.354C3.05222 13.2602 2.99951 13.133 2.99951 13.0003C2.99951 12.8676 3.05222 12.7403 3.14604 12.6465L7.29291 8.50028L3.14604 4.35403C3.05222 4.26021 2.99951 4.13296 2.99951 4.00028C2.99951 3.8676 3.05222 3.74035 3.14604 3.64653C3.23986 3.55271 3.36711 3.5 3.49979 3.5C3.63247 3.5 3.75972 3.55271 3.85354 3.64653L7.99979 7.7934L12.146 3.64653C12.2399 3.55271 12.3671 3.5 12.4998 3.5C12.6325 3.5 12.7597 3.55271 12.8535 3.64653C12.9474 3.74035 13.0001 3.8676 13.0001 4.00028C13.0001 4.13296 12.9474 4.26021 12.8535 4.35403L8.70666 8.50028L12.8535 12.6465Z" fill="#FE3440"/></svg>Reject</button></div>`;
                        }
                    }
                },
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }
        });
    }

    window.updateApproval = (element, status) => {
        $(element).prop("disabled", true);
        $(element).html(
            '<span></span> Loading...'
        );
        const row = $(element).closest('tr');
        const data = table.row(row).data();

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            type: 'POST',
            url: "{{ url('/transaction/family_data_approval/proses') }}",
            data: {
                'employeeNo' : data.employeeNo,
                'seqNo' : data.seqNo,
                'status' : status,
            },
            success: function (response) {
                if (response.status == "true") {  
                    $(element).prop("disabled", false);
                    $('#notification_success').modal('show');
                    $('#message-notification-success').html(response
                        .message);
                    setTimeout(function () {
                        window.location =
                            "{{ url('transaction/transaction_family_data_approval_list') }}";
                    }, 3000);
                } else {
                    $(element).prop("disabled", false);
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
            error: function(response) {
                $('#notification_error').modal('show');
                $('#message-notification-error').html(response);
            }
        })
    }

    window.historyPreview = (element) => {
        const row = $(element).closest('tr');
        const data = table.row(row).data();

        $('#employee_name').html(data.familyName)
        $('#employee_no').html(data.employeeNo)

        const tableData = prepareTableDataWithDiff(data.peMasterFamilyTemp);

        $('#family_data_history_current_table').DataTable().destroy();
        $('#family_data_history_latest_table').DataTable().destroy();

        $('#family_data_history_current_table').DataTable({
            processing: true,
            orderCellsTop: true,
            lengthChange: false,
            paging: false,
            info: false,  
            scrollY: 300,
            scrollX: 400,
            scrollCollapse: true,
            fixedHeader: true,
            data: data.peMasterFamilyTemp.length > 0 ? [data.peMasterFamilyTemp[0]] : [],
            "sDom": 'lrtip',
            'sPaginationType': 'full_numbers',
            "order": [[ 1, "asc" ]],
            columns: [
                {data: 'familyName', name: 'familyName'},
                {data: 'birthDate', name: 'birthDate',
                    render: function (data, type, row) {
                        return moment(data).format('DD MMM YYYY');
                    }
                },
                {data: 'genderName', name: 'genderName'},
                {data: 'relationName', name: 'relationName'},
                {data: 'handPhone', name: 'handPhone'},
                {data: 'emergencyContact', name: 'emergencyContact',
                    render: function (data, type, row) {
                        return data ? `<p class="chip-green">Yes</p>` : `<p class="chip-red">No</p>`;
                    }
                },
                {data: 'fullTimeStudent', name: 'fullTimeStudent',
                    render: function (data, type, row) {
                        return data ? `<p class="chip-green">Yes</p>` : `<p class="chip-red">No</p>`;
                    }
                },
                {data: 'disability', name: 'disability',
                    render: function (data, type, row) {
                        return data ? `<p class="chip-green">Yes</p>` : `<p class="chip-red">No</p>`;
                    }
                },
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }
        });

        $('#family_data_history_latest_table').DataTable({
            processing: true,
            orderCellsTop: true,
            lengthChange: false,
            scrollY: 300,
            scrollX: 400,
            scrollCollapse: true,
            fixedHeader: true,
            data: tableData,
            "sDom": 'lrtip',
            'sPaginationType': 'full_numbers',
            "order": [[ 1, "asc" ]],
            columns: [
                {data: 'changedDate', name: 'changedDate',
                    render: function (data, type, row) {
                        return moment(data).format('DD MMM YYYY');
                    }
                },
                {data: 'familyName', name: 'familyName',

                },
                {data: 'birthDate', name: 'birthDate',
                    render: function (data, type, row) {
                        return moment(data).format('DD MMM YYYY');
                    }
                },
                {data: 'genderName', name: 'genderName'},
                {data: 'relationName', name: 'relationName'},
                {data: 'handPhone', name: 'handPhone'},
                {data: 'emergencyContact', name: 'emergencyContact'},
                {data: 'fullTimeStudent', name: 'fullTimeStudent'},
                {data: 'disability', name: 'disability'},
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }
        });
    }

    function prepareTableDataWithDiff(dataArray) {
        if (!dataArray || dataArray.length === 0) return [];

        const result = [];

        for (let i = 0; i < dataArray.length - 1; i++) {
            const prev = dataArray[i + 1];
            const curr = dataArray[i];

            result.unshift({
                changedDate: moment(curr.changedDate).format("DD MMM YYYY"),
                familyName: compareValues(curr.familyName, prev.familyName),
                birthDate: compareValues(curr.birthDate, prev.birthDate),
                genderName: compareValues(curr.genderName, prev.genderName),
                relationName: compareValues(curr.relationName, prev.relationName),
                handPhone: compareValues(curr.handPhone, prev.handPhone),
                emergencyContact: compareValues(curr.emergencyContact, prev.emergencyContact, true),
                fullTimeStudent: compareValues(curr.fullTimeStudent, prev.fullTimeStudent, true),
                disability: compareValues(curr.disability, prev.disability, true),
            });
        }

        result.unshift({
            changedDate: moment(dataArray[dataArray.length - 1].changedDate).format("DD MMM YYYY"),
            familyName: dataArray[dataArray.length - 1].familyName,
            birthDate: dataArray[dataArray.length - 1].birthDate,
            genderName: dataArray[dataArray.length - 1].genderName,
            relationName: dataArray[dataArray.length - 1].relationName,
            handPhone: dataArray[dataArray.length - 1].handPhone,
            emergencyContact: formatBooleanChange(dataArray[dataArray.length - 1].emergencyContact),
            fullTimeStudent: formatBooleanChange(dataArray[dataArray.length - 1].fullTimeStudent),
            disability: formatBooleanChange(dataArray[dataArray.length - 1].disability),
        });

        return result
    }

    function formatBooleanChange(val) {
        const display = (val) => val ? "Yes" : "No";

        return `<p class="chip-${val ? "green" : "red"}">${display(val)}</p>`;
    }

    function compareValues(currVal, prevVal, isBoolean = false) {
        const display = (val) => {
            if (isBoolean) return val ? "Yes" : "No";
            return val ?? " ";
        };

        if (currVal === prevVal) {
            return isBoolean
                ? (currVal ? `<p class="chip-green">Yes</p>` : `<p class="chip-red">No</p>`)
                : display(currVal);
        }

        return `
            <div class="d-flex"><s>${display(prevVal)} </s><span> ${display(currVal)}</span></div>
        `;
    }

    load_data_table_family_data();

    $('#family_data_approval_table').on('click', 'tr td:first-child', function(e){
        $(this).parent().find('input[type="checkbox"]').trigger('click');
    });

    $('#notification_success').on('hide.bs.modal', function () {
        window.location = "{{ url('transaction/transaction_family_data_approval_list') }}";
    })

    $('#notification_error').on('hide.bs.modal', function () {
        window.location = "{{ url('transaction/transaction_family_data_approval_list') }}";
    })
    
  });
</script>

</html>