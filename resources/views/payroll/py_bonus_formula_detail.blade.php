<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_bonus_formula.judul') }}</title>
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
    <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-payroll {
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
    <div class="div-payroll">
        <div class="div-title">
            <a href="{{ url('payroll/bonus_formula') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('payroll_bonus_formula.list_detail') }}</span>
            </a>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="bonus_date">{{ __('payroll_bonus_formula.label_bonus_date') }}</label>
                    <input type="text" class="form-control" name="bonus_date" id="bonus_date" readonly>
                </div>
            </div>
        </div>
        <div class="div-table">
			<table id="bonus_formula_detail_table" class="table hover">
				<thead>
					<tr>
                        <th></th>
						<th>Service Month From</th>
						<th>Service Month To</th>
						<th>Performance Result</th>
						<th>Formula</th>
						<th>Condition</th>
					</tr>
				</thead>
			</table>
		</div>
        <div class="row">
            <div class="col-2">
                <button type="submit" class="btn btn-primary" name="btn-add" id="btn-add"
                    style="width: 100%;" data-toggle="modal" data-target="#modal_add_edit_bonus_formula">
                    <i class="fa fa-plus"></i> {{ __('payroll_bonus_formula.btn_add') }}
                </button>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary" name="btn-edit" id="btn-edit"
                    style="width: 100%;" data-toggle="modal" data-target="#modal_add_edit_bonus_formula">
                    <i class="fa fa-pencil"></i> {{ __('payroll_bonus_formula.btn_edit') }}
                </button>
            </div>
            <div class="col-2">
                <button type="button" id="btn-save" class="btn btn-primary" name="btn-save" style="width: 100%;">
                    <i class="fa fa-floppy-o"></i> {{ __('payroll_bonus_formula.btn_save') }}</button>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-danger" name="btn-remove" id="btn-remove"
                        style="width: 100%;">
                    <i class="fa fa-times"></i> {{ __('payroll_bonus_formula.btn_remove') }}
                </button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_edit_bonus_formula" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('payroll_bonus_formula.list') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="bonus_formula_detail_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="service_month_from">{{ __('payroll_bonus_formula.label_service_month_from') }}</label>
                                    <input type="number" class="form-control" id="service_month_from" name="service_month_from"
                                        placeholder={{ __('payroll_bonus_formula.label_service_month_from') }}>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="service_month_to">{{ __('payroll_bonus_formula.label_service_month_to') }}</label>
                                    <input type="text" class="form-control" id="service_month_to" name="service_month_to"
                                        placeholder={{ __('payroll_bonus_formula.label_service_month_to') }}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="performance_result">{{ __('payroll_bonus_formula.label_performance_result') }}</label>
                                    <select class="form-control select2" id="performance_result" name="performance_result"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="table_chooser">{{ __('payroll_bonus_formula.label_table_chooser') }}</label>
                                    <select class="form-control select2" id="table_chooser" name="table_chooser"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="field_chooser">{{ __('payroll_bonus_formula.label_field_chooser') }}</label>
                                    <select class="form-control select2" id="field_chooser" name="field_chooser"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <button type="submit" class="btn btn-process" name="btn-add-to-formula" id="btn-add-to-formula">
                                    {{ __('payroll_bonus_formula.btn_add_to_formula') }}
                                </button>
                            </div>
                            <div class="col-3"></div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="preview_formula">{{ __('payroll_bonus_formula.label_preview_formula') }}</label>
                                    <textarea class="form-control" id="preview-formula" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <button type="submit" class="btn btn-process" name="btn-add-to-condition" id="btn-add-to-condition">
                                    {{ __('payroll_bonus_formula.btn_add_to_condition') }}
                                </button>
                            </div>
                            <div class="col-3"></div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="preview_condition">{{ __('payroll_bonus_formula.label_preview_condition') }}</label>
                                    <textarea class="form-control" id="preview-condition" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" id="btn-save" class="btn btn-primary w-25"><i 
                                class="fa fa-floppy-o"></i> {{ __('payroll_bonus_formula.btn_save') }}</button>
                            <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                                class="fa fa-times-circle"></i> {{ __('payroll_bonus_formula.btn_cancel') }}</button>
                        </div>
                    </form>
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
                        <span class="title-text-notification">{{ __('payroll_bonus_formula.alert_success') }}</span>
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
    $(document).ready(function () {
        var table = null;
        var func = '{{ $func }}';
        var arrData = @json($data);

        $('.div-navbar a.disabled').attr('onclick', 'return false;');

        $('#bonus_formula_detail_table thead tr').clone(true).appendTo('#bonus_formula_detail_table thead');
        $('#bonus_formula_detail_table thead tr:eq(1) th:not(:first-child)').each( function (i) {
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

        if (func === 'new') {
            $('#bonus_date').prop('readonly', false);
            $('#bonus_date').val('');
        }

        else {
            $('#bonus_date').prop('readonly', true);
            // console.log(arrData);
            var bonusDate = typeof arrData[0].bonusDate !== 'undefined' ? moment(arrData[0].bonusDate).format('DD-MM-YYYY') : '';
            $('#bonus_date').val(bonusDate);
        }

        $('#btn-add').on('click', function () {
            $('#service_month_from').val('');
            $('#service_month_to').val('');
            $('#performance_result').val(null).trigger('change');
            $('#table_chooser').val(null).trigger('change');
            $('#field_chooser').val(null).trigger('change');
            $('#preview_formula').val('');
            $('#preview_condition').val('');
        });

        $("#btn-edit").on('click', function() {
            var data = table.rows('.selected').data();
            // console.log(data);
            if(data.count() > 0){
                $('#service_month_from').val((typeof arrData[0].serviceMonthFrom !== 'undefined') ? arrData[0].serviceMonthFrom : '');
                $('#service_month_to').val((typeof arrData[0].serviceMonthTo !== 'undefined') ? arrData[0].serviceMonthTo : '');
                $.ajax({
                    type: 'GET',
                    url: '/performance_result/bonus_thr_data_entry/api',
                    data: {
                        'value': ((typeof arrData[0].performanceResult !== 'undefined') ? arrData[0].performanceResult : '')
                    }
                }).then(function (data) {
                    var option = $('<option/>', {
                        id: data.value,
                        title: data.value,
                        text: data.value
                    });
                    $("#performance_result").append(option).attr('data-alias', 'yourvalue').trigger(
                        'change');
                    $("#performance_result").trigger({
                        type: 'select2:select',
                        params: {
                            id: data.value,
                            text: data.value,
                            data: data
                        }
                    });
                });
            }else{
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $('#bonus_formula_detail_table tbody').on('click', 'tr td:not(:first-child)', function () {
            var data = table.row(this).data();
            console.log(data);
            $('#modal_add_edit_bonus_formula').modal();

            $('#service_month_from').val((typeof arrData[0].serviceMonthFrom !== 'undefined') ? arrData[0].serviceMonthFrom : '');
            $('#service_month_to').val((typeof arrData[0].serviceMonthTo !== 'undefined') ? arrData[0].serviceMonthTo : '');
            $.ajax({
                type: 'GET',
                url: '/performance_result/bonus_thr_data_entry/api',
                data: {
                    'value': ((typeof arrData[0].performanceResult !== 'undefined') ? arrData[0].performanceResult : '')
                }
            }).then(function (data) {
                var option = $('<option/>', {
                    id: data.value,
                    title: data.value,
                    text: data.value
                });
                $("#performance_result").append(option).attr('data-alias', 'yourvalue').trigger(
                    'change');
                $("#performance_result").trigger({
                    type: 'select2:select',
                    params: {
                        id: data.value,
                        text: data.value,
                        data: data
                    }
                });
            });
        });

        loadDataPerformanceResult();
        load_data_table_bonus_formula_detail();

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function load_data_table_bonus_formula_detail() {
            table = $('#bonus_formula_detail_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: 
                    {
                        url : "{{ url('payroll/bonus_formula_detail/table') }}",
                        data: {
                            'bonusDate' : (typeof arrData[0].bonusDate !== 'undefined') ? arrData[0].bonusDate : ''
                        }
                    },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
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
                    {data: 'serviceMonthFrom', name: 'serviceMonthFrom'},
                    {data: 'serviceMonthTo', name: 'serviceMonthTo'},
                    {data: 'performanceResult', name: 'performanceResult'},
                    {data: 'formula', name: 'formula'},
                    {data: 'condition', name: 'condition'}
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }
            });
        }

        function loadDataPerformanceResult(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-6">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#performance_result').select2({
                width: '100%',
                placeholder: 'Choose Performance Result',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: false,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: '/performance_result/api',
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
                                    text: item.value,
                                    id: item.value,
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

        $("#btn-remove").on('click', function () {
            var data = table.rows('.selected').data();
            console.log(data.count());

            if (data.count() > 0) {
                $.ajax({
                    url: "{{ url('payroll/bonus_formula/remove') }}",
                    type: "GET",
                    data: {
                        'bonusDate' : data[0].bonusDate,
                        'serviceMonthFrom' : data[0].serviceMonthFrom,
                        'serviceMonthTo' : data[0].serviceMonthTo,
                        'performanceResult' : data[0].performanceResult,
                        'formula' : data[0].formula,
                        'condition' : data[0].condition
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success').modal('show');
                            $('#message-notification-success').html(response
                                .message);
                            $('#bonus_formula_detail_table').DataTable().destroy();
                            load_data_table_bonus_formula_detail();
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
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });
    });
</script>

</html>