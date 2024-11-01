<!DOCTYPE html>
<html>
<head>
    <title>{{ __('md_claim_payment_transaction.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/medical_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-medical {
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

        h6{
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="div-form">
        <form id="claim_payment_transaction_form" method="post">
            @csrf
            <div class="div-medical">
                <div class="div-title">
                    <a href="{{ route('medical', ['moduleID' => 'MD']) }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('md_claim_payment_transaction.list') }}</span>
                    </a>
                </div>
                <div class="row">
                    <h6>{{ __('md_claim_payment_transaction.label_filter') }}</h6>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="employee_no_from form-check-label">{{ __('md_claim_payment_transaction.label_employee_no') }}</label>
                            <span style="color: red">*</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <select class="form-control select2" id="employee_no_from" name="employee_no_from"></select>
                        </div>
                    </div>
                    <div class="col-0.5">
                        <div class="form-group">
                            <label for="employee_no_to form-check-label">{{ __('md_claim_payment_transaction.label_to') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <select class="form-control select2" id="employee_no_to" name="employee_no_to"></select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="plan_date_from form-check-label">{{ __('md_claim_payment_transaction.label_plan_date') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="plan_date_from" name="plan_date_from"
                                placeholder="{{ __('md_claim_payment_transaction.label_plan_date') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="plan_date_from_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-0.5">
                        <div class="form-group">
                            <label for="plan_date_to form-check-label">{{ __('md_claim_payment_transaction.label_to') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="plan_date_to" name="plan_date_to"
                                placeholder="{{ __('md_claim_payment_transaction.label_plan_date') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="plan_date_to_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="claim_status form-check-label">{{ __('md_claim_payment_transaction.label_claim_status') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check_claim_status_accepted"
                                name="check_claim_status_accepted" value="true">
                            <label
                                for="check_claim_status_accepted">{{ __('md_claim_payment_transaction.label_check_claim_status_accepted') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check_claim_status_paid"
                                name="check_claim_status_paid" value="true">
                            <label
                                for="check_claim_status_paid">{{ __('md_claim_payment_transaction.label_check_claim_status_paid') }}</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="payment_date_from form-check-label">{{ __('md_claim_payment_transaction.label_payment_date') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="payment_date_from" name="payment_date_from"
                                placeholder="{{ __('md_claim_payment_transaction.label_payment_date') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="payment_date_from_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-0.5">
                        <div class="form-group">
                            <label for="payment_date_to form-check-label">{{ __('md_claim_payment_transaction.label_to') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="payment_date_to" name="payment_date_to"
                                placeholder="{{ __('md_claim_payment_transaction.label_payment_date') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="payment_date_to_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary" name="btn-filter" id="btn-filter" value="Filter" style="width: 100%;">
                            <i class="fa fa-filter"></i> {{ __('md_claim_payment_transaction.btn_filter') }}
                        </button>
                    </div>
                </div>

                <div class="row">
                    <h6>{{ __('md_claim_payment_transaction.label_default_value') }}</h6>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="source_document form-check-label">{{ __('md_claim_payment_transaction.label_source_document') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <select class="form-control select2" id="source_document" name="source_document"></select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="document_number form-check-label">{{ __('md_claim_payment_transaction.label_document_number') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <input type="text" class="form-control" id="document_number" name="document_number"
                                placeholder="{{ __('md_claim_payment_transaction.label_document_number') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="payment_date_process form-check-label">{{ __('md_claim_payment_transaction.label_payment_date') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="payment_date_process" name="payment_date_process"
                                placeholder="{{ __('md_claim_payment_transaction.label_payment_date') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="payment_date_process_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary" name="btn-process" id="btn-process" value="Process All" style="width: 100%;">
                        <i class="fa fa-play-circle-o"></i> {{ __('md_claim_payment_transaction.btn_process_all') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <div class="div-table" width="100%">
			<table id="claim_payment_transaction_table" class="table hover">
				<thead>
					<tr>
                        <th rowspan="2"></th>
						<th rowspan="2">Employee No</th>
						<th rowspan="2">Claim Date</th>
                        <th rowspan="2">Seq</th>
                        <th rowspan="2">Claim To</th>
                        <th rowspan="2">Claim Amount</th>
                        <th rowspan="2">Plan Date</th>
                        <th rowspan="2">Plan Amount</th>
                        <th rowspan="2">Status</th>
                        <th rowspan="2">Payment Date</th>
                        <th rowspan="2">Payment Amount</th>
                        <th colspan="2" style="text-align:center;">Plan Amount in Claim Currency</th>
                        <th colspan="2" style="text-align:center;">Plan Amount in Limit Currency</th>
                        <th colspan="3" style="text-align:center;">Bank</th>
                        <th colspan="2" style="text-align:center;">Payment Document</th>
                        <th rowspan="2">Payment Plan Remarks</th>
					</tr>
                    <tr>
                        <th>Exchange Rate</th>
                        <th>Amount</th>
                        <th>Exchange Rate</th>
                        <th>Amount</th>
                        <th>Bank Code</th>
                        <th>Account No</th>
                        <th>Account Name</th>
                        <th>Source Document</th>
                        <th>Document Number</th>
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
                        <span class="title-text-notification">{{ __('md_claim_payment_transaction.alert_success') }}</span>
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
            defaultDate: "today",
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
    $(document).ready(function () {
        var table = null;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        loadDataEmployeeNo('#employee_no_from');
        loadDataEmployeeNo('#employee_no_to');
        loadDataSourceDocument();

        loadDataFirstLastAllEmployeeNo('#employee_no_from', 'First');
        loadDataFirstLastAllEmployeeNo('#employee_no_to', 'Last');

        load_data_table_claim_payment_transaction();

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

        $('#claim_payment_transaction_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#claim_payment_transaction_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        function load_data_table_claim_payment_transaction() {
            table = $('#claim_payment_transaction_table').DataTable({
                processing: true,
                orderCellsTop: true,
                paging: false,
                "sDom": 'lrtip',
                scrollY: 400,
                scrollX: "100%",
                scrollCollapse: true,
                order: [[1, 'asc']],
                aoColumns : [
                    { "sWidth": '30px' },
                    { "sWidth": '110px' },
                    { "sWidth": '100px' },
                    { "sWidth": '50px' },
                    { "sWidth": '100px' },
                    { "sWidth": '110px' },
                    { "sWidth": '100px' },
                    { "sWidth": '150px' },
                    { "sWidth": '100px' },
                    { "sWidth": '100px' },
                    { "sWidth": '200px' },
                    { "sWidth": '100px' },
                    { "sWidth": '150px' },
                    { "sWidth": '100px' }
                ]
            });
        }

        $('#claim_payment_transaction_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#claim_payment_transaction_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        function loadDataEmployeeNo(field = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.employeeNo + '</div>' +
                        '<div class="col-6">' + data.data.fullName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Employee No</b></div>' +
                        '<div class="col-6"><b>Employee Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $employeeNo = $(field).select2({
                width: '100%',
                placeholder: 'Choose Employee',
                allowClear: true,
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
                    url: "{{ url('/employee_no/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.fullName,
                                    id: item.employeeNo,
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

        function loadDataFirstLastAllEmployeeNo(field = '', func = '') {
            $.ajax({
                type: 'GET',
                url: "{{ url('/employee_no/func/api') }}",
                data: {
                    'func': func
                }
            }).then(function (data) {
                var $newOption = $("<option selected='selected'></option>").val(data.employeeNo).text(
                    data.fullName);
                $(field).append($newOption).trigger('change');
            });
        }

        $('#btn-filter').click(function (){
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $('#claim_list_form').submit();
        });

        function isEmpty(obj) {
            for(var prop in obj) {
                if(Object.prototype.hasOwnProperty.call(obj, prop)) {
                    return false;
                }
            }

            return JSON.stringify(obj) === JSON.stringify({});
        }

        if($('#claim_list_form').length > 0){
            $('#claim_list_form').validate({
                rules: {
                    employee_no_from: {
                        required: true
                    },
                    employee_no_to: {
                        required: true
                    },
                },
                messages: {
                    employee_no_from: {
                        required: "{{ __('md_claim_list.employee_no_from_required') }}"
                    },
                    employee_no_to: {
                        required: "{{ __('md_claim_list.employee_no_to_required') }}"
                    },
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    $("#btn-filter").prop("disabled", false);
                    $("#btn-filter").html(
                        '<i class="fa fa-filter"></i> {{ __("md_claim_list.btn_filter") }}'
                    );

                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                submitHandler: function(form){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('medical/claim_list/proses') }}",
                        type: "POST",
                        data: $('#claim_list_form').serialize(),
                        success: function (response) {
                            $("#btn-filter").prop("disabled", false);
                            $("#btn-filter").html(
                                '<i class="fa fa-filter"></i> {{ __("md_claim_list.btn_filter") }}'
                            );

                            // $('#claim_list_table').DataTable().destroy();
                            table.clear().draw();
                            
                            if(!isEmpty(response)){
                                $.each(response, function(k, v) {
                                    table.row.add([
                                        '<input class="chk-select" type="checkbox">',
                                        v.employeeNo,
                                        moment(v.claimDate).format('YYYY-MM-DD'),
                                        v.seqNo,
                                        v.claimTo,
                                        v.claimCode,
                                        v.claimFor,
                                        v.dependentName,
                                        v.claimCurrency,
                                        v.claimAmount,
                                        v.totalFacilityUsedInClaimCurrency,
                                        v.paymentCurrency,
                                        v.totalPaymentAmount,
                                        v.claimStatus
                                    ]).draw();
                                });

                                table.columns.adjust();
                            }
                        },
                        error: function (response) {
                            $("#btn-filter").prop("disabled", false);
                            $("#btn-filter").html(
                                '<i class="fa fa-filter"></i> {{ __("md_claim_list.btn_filter") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            })
        }
    })
</script>

</html>