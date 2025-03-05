<!DOCTYPE html>
<html>
<head>
    <title>{{ __('trans_medical_history.judul') }}</title>
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
    <link rel="stylesheet" href="{{ asset('css/flatpickr.monthselect.css') }}">
    <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-trans-medical {
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

        .detailstatus h5{
            font-size: 16px;
        }
        .approve h5{
            font-size: 18px;
        }
        .detailstatus input{
            outline: none;
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
        <form id="trans_medical_form" method="post">
            @csrf
            <div class="div-trans-medical">
                <div class="div-title">
                    <a href="{{ route('transaction', ['moduleID' => 'TRX']) }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('trans_medical_history.list') }}</span>
                    </a>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="year form-check-label">{{ __('trans_medical_history.label_year') }}</label>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                            <select class="form-control select2" id="year" name="year"></select>
                            {{-- <input type="text" class="form-control" id="year" name="year"
                                placeholder="{{ __('trans_medical_history.label_year') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="year_calendar"><span class="fa fa-calendar"></span></span>
                            </div> --}}
                        </div>
                        <input type="text" class="form-control" id="year_hidden" name="year_hidden" hidden>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="year form-check-label">{{ __('trans_medical_history.label_employee_no') }}</label>
                        </div>
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control" id="employee_no" name="employee_no" placeholder="{{ __('trans_medical_history.label_employee_no') }}">
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary" name="btn-search" id="btn-search" value="preview" style="width: 100%;">
                            <img src="{{ url('icons/mob/button/button-search.svg') }}" alt="export"> {{ __('trans_medical_history.btn_search') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-list" id="btn-list"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_list_mass_leave">
                        <i class="fa fa-plus"></i> {{ __('trans_medical_history.btn_list') }}
                        </button>
                    </div>
                </div>
                <br>
                <!-- TABLE -->

                <div class="card" style="position: relative;"> 
                    <div id="loading">
                        <div class="spinner"></div>
                    </div> 
                    <div class="row">
                        <div class="col-6">
                            <p><b>{{ __('trans_medical_history.list_table') }}</b></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table id="medical_history_table" class="display table-striped table-hover dt-responsive display nowrap" cellspacing="10">
                                <thead>
                                    <tr>
                                        <th>{{ __('trans_medical_history.rdate') }}</th>
                                        <th>{{ __('trans_medical_history.tnumber') }}</th>
                                        <th>{{ __('trans_medical_history.bunit') }}</th>
                                        <th>{{ __('trans_medical_history.ename') }}</th>
                                        <th>{{ __('trans_medical_history.status') }}</th>
                                        <th>{{ __('trans_medical_history.redate') }}</th>
                                        <th>{{ __('trans_medical_history.treq') }}</th>
                                        <th>{{ __('trans_medical_history.tpaid') }}</th>
                                        <th>{{ __('trans_medical_history.appdate') }}</th>
                                        <th>{{ __('trans_medical_history.prem') }}</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <td style="text-align: left;"><strong>{{ __('trans_medical_history.tmedical') }} :</strong></td>
                                        <td colspan="2" id="total_medical"></td>
                                        <td style="text-align: left;"><strong>{{ __('trans_medical_history.pbalance') }} :</strong></td>
                                        <td colspan="5" id="plafon_balance"></td>
                                    </tr>
                                </tfoot>
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
                        <h4 class="modal-little">{{ __('trans_medical_history.luser') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive">
                        <table id="list_employee" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    {{-- <th>User ID</th> --}}
                                    <th>{{ __('trans_medical_history.employeeid') }}</th>
                                    <th>{{ __('trans_medical_history.name') }}</th>
                                    <th>{{ __('trans_medical_history.div') }}</th>
                                    <th>{{ __('trans_medical_history.rank') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- <td>#</td>         --}}
                                    <td>
                                        
                                    </td>        
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
                        <span class="title-text-notification">{{ __('trans_medical_history.alert_success') }}</span>
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
    
    $(document).ready(function () {
        $('table.display').DataTable({
            scrollX: true
        });
    });
</script>

<script type="text/javascript">
    var prevYear = moment(moment().subtract(5, 'years')).format('YYYY');
    var defaultYear = moment().format('YYYY');

    for (var i = prevYear; i <= defaultYear; i++){
        var option = $("<option/>", {
            value: i,
            text: i
        });
        $('#year').append(option);
        $('#year').val(defaultYear);
    }

    var table = null;
    var table2 = null;
    var companyCode = "{{ Session::get('companyCode') }}";
    var arrayMedical = [];

    function load_data_medical_history(year, employee_no){
        $.ajax({
            type: 'GET',
            url: "{{ url('/trans/medical_history/table') }}",
            data: {
                'year': `${year}-01-01`,
                'employeeNo' : employee_no
            }
        }).then(function (data) {
            arrayMedical = data;
            $('#medical_history_table').DataTable().destroy();
            load_data_table_medical_history();
            $('#loading').hide();
        });
    }
    
    function load_data_table_medical_history() {
        table = $('#medical_history_table').DataTable({
            processing: true,
            // serverSide: true,
            orderCellsTop: true,
            data: arrayMedical,
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lfrtip',
            'sPaginationType': 'full_numbers',
            "order": [[ 1, "asc" ]],
            columns: [
                {data: 'reimbursementEntity.createdDate', name: 'reimbursementEntity.createdDate', 
                    render: function (data, type, row) {
                        if (data == null){
                            return '-'
                        }else {
                            return moment(data).format('DD-MM-YYYY');
                        }
                    }
                },
                {data: 'reimbursementEntity.ticketNo', name: 'reimbursementEntity.ticketNo'},
                {data: 'reimbursementEntity.businessUnit', name: 'reimbursementEntity.businessUnit'},
                {data: 'reimbursementEntity.fullnameRequester', name: 'reimbursementEntity.fullnameRequester'},
                {data: 'reimbursementEntity.reimbursementStatus', name: 'reimbursementEntity.reimbursementStatus'},
                {data: 'reimbursementEntity.receiptDate', name: 'reimbursementEntity.receiptDate',
                    render: function (data, type, row) {
                        if (data == null){
                            return '-'
                        }else {
                            return moment(data).format('DD-MM-YYYY');
                        }
                    }
                },
                {data: 'reimbursementEntity.totalClaimAmount', name: 'reimbursementEntity.totalClaimAmount',
                    render: function (data, type, row) {
                        return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    }
                },
                {data: 'reimbursementEntity.paidAmount', name: 'reimbursementEntity.paidAmount',
                    render: function (data, type, row) {
                        return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    }
                },
                {data: 'reimbursementEntity.changedDate', name: 'reimbursementEntity.changedDate', 
                    render: function (data, type, row) {
                        if (data == null || row.reimbursementEntity.reimbursementStatus == 'NEW'){
                            return '-'
                        }else {
                            return moment(data).format('YYYY-MM-DD');
                        }
                    }
                },
                {data: 'reimbursementEntity.hrdRemarks', name: 'reimbursementEntity.hrdRemarks'
                },
            ],
            footerCallback: function (row, data, start, end, display) {
                var plafonBalance = data.length > 0 ? data[0]?.balance?.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") : 0;
                var totalMedical = data.length > 0 ? data[0]?.totalClaim?.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") : 0;
                $('#total_medical').html(totalMedical);
                $('#plafon_balance').html(plafonBalance);
            }
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

    $("#trans_medical_form").submit((e)=>{
        e.preventDefault();

        var year = $("#year").val();
        var employee_no = $("#employee_no").val();
        $('#loading').show();

        load_data_medical_history(year, employee_no);
    })

    $('#btn-list').click(()=> {
        $('#list_employee').DataTable().destroy();
        table2 = $('#list_employee').DataTable({
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
    
    const klik = (element) => {
        let employee_id = $(element).parent().siblings('.sorting_1').text()
        $('#employee_no').val(employee_id)

        $('.close').click();
    }
         
    </script>
</html>