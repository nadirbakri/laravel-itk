<!DOCTYPE html>
<html>
<head>
    <title>{{ __('md_claim_list.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .modal-header-notification-success {
            border-bottom: 1px solid #eee;
            background-color: #00a862;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .modal-header-notification-warning {
            border-bottom: 1px solid #eee;
            background-color: #f0bd18;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
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
    </style>
</head>

<body>
    <div class="div-form">
        <form id="claim_list_form" method="post">
            @csrf
            <div class="div-medical">
                <div class="div-title">
                    <a href="{{ url('medical') }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('md_claim_list.list') }}</span>
                    </a>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="employee_no_from form-check-label">{{ __('md_claim_list.label_employee_no') }}</label>
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
                            <label for="employee_no_to form-check-label">{{ __('md_claim_list.label_to') }}</label>
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
                            <label for="claim_date_from form-check-label">{{ __('md_claim_list.label_claim_date') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_from" name="claim_date_from"
                                placeholder="{{ __('md_claim_list.label_claim_date') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="claim_date_from_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-0.5">
                        <div class="form-group">
                            <label for="claim_date_to form-check-label">{{ __('md_claim_list.label_to') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_to" name="claim_date_to"
                                placeholder="{{ __('md_claim_list.label_claim_date') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="claim_date_to_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="claim_status form-check-label">{{ __('md_claim_list.label_claim_status') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check_claim_status_not_processed"
                                name="check_claim_status_not_processed" value="true">
                            <label
                                for="check_claim_status_not_processed">{{ __('md_claim_list.label_check_claim_status_not_processed') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check_claim_status_rejected"
                                name="check_claim_status_rejected" value="true">
                            <label
                                for="check_claim_status_rejected">{{ __('md_claim_list.label_check_claim_status_rejected') }}</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="claim_status form-check-label">&nbsp;</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check_claim_status_accepted"
                                name="check_claim_status_accepted" value="true">
                            <label
                                for="check_claim_status_accepted">{{ __('md_claim_list.label_check_claim_status_accepted') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check_claim_status_full_paid"
                                name="check_claim_status_full_paid" value="true">
                            <label
                                for="check_claim_status_full_paid">{{ __('md_claim_list.label_check_claim_status_full_paid') }}</label>
                        </div>
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary" name="btn-filter" id="btn-filter" value="Filter" style="width: 100%;">
                            <i class="fa fa-filter"></i> {{ __('md_claim_list.btn_filter') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <div class="div-table" width="100%">
			<table id="claim_list_table" class="table hover">
				<thead>
					<tr>
                        <th></th>
						<th>Employee No</th>
						<th>Claim Date</th>
                        <th>Seq</th>
                        <th>Claim To</th>
                        <th>Claim Code</th>
                        <th>Claim For</th>
                        <th>Dependent Name</th>
                        <th>Claim Currency</th>
                        <th>Claim Amount</th>
                        <th>Total Facility in Used in Claim Currency</th>
                        <th>Payment Currency</th>
                        <th>Total Payment Amount</th>
                        <th>Claim Status</th>
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
                        <span class="title-text-notification">{{ __('md_claim_list.alert_success') }}</span>
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
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(function () {
        initDatePicker();
    });

    function initDatePicker() {
        $('.input-group input').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
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

        loadDataFirstLastAllEmployeeNo('#employee_no_from', 'First');
        loadDataFirstLastAllEmployeeNo('#employee_no_to', 'Last');

        load_data_table_claim_list();

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

        function load_data_table_claim_list() {
            table = $('#claim_list_table').DataTable({
                processing: true,
                orderCellsTop: true,
                paging: false,
                "sDom": 'lrtip',
                scrollY: 400,
                scrollX: "100%",
                scrollCollapse: true,
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

        function loadDataEmployeeNo(field = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Employee No</b></div>' +
                        '<div class="col-6"><b>Full Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.employeeNo + '</div>' +
                        '<div class="col-6">' + data.data.fullName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

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
                    url: '/employee_no/api',
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
                url: '/employee_no/func/api',
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
                                        v.employeeNo,
                                        v.claimDate,
                                        v.seqNo,
                                        v.claimTo,
                                        v.claimCode,
                                        v.claimFor,
                                        v.dependentName,
                                        v.claimCurrency,
                                        v.claimAmount,
                                        v.totalFacilityUsedInClaimCurrency,
                                        v.totalPaymentAmountInClaimCurrency,
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

                            $('#notification').modal('show');
                            $('#message-notification').html(response);
                        }
                    });
                }
            })
        }
    })
</script>

</html>