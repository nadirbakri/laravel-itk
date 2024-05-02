<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ __('tm_input_balance_leave.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/time_management_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-time_management {
            max-width: 97%;
            margin: auto;
            margin-top: 1%;
        }

        .loading {
            background-color: #ffffff;
            background-image: url("https://c.tenor.com/tEBoZu1ISJ8AAAAC/spinning-loading.gif");
            background-size: 60px 40px;
            background-position: right center;
            background-repeat: no-repeat;
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

        .select2-results__option[aria-selected=true] {
            display: none;
        }
    </style>
</head>

<body>
    <div class="time_management">
        <div class="div-title">
            <a href="javascript:void(0);" onclick="goBackWithModuleID()" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('tm_input_balance_leave.list') }}</span>
            </a> 
        </div>
        <div class="div-form">
            <form id="tm_input_balance_leave" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="employee_no">{{ __('tm_input_balance_leave.label_employee_no') }}</label>
                            <select class="form-control select2" id="employee_no" name="employee_no"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="period">{{ __('tm_input_balance_leave.period') }}</label>
                            <input type="text" class="form-control" id="period" name="period"
                                placeholder="{{ __('tm_input_balance_leave.period') }}" disabled>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="div-table">
            <table id="input_balance_leave_table" class="table hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>Leave Code</th>
                        <th>Balance This Year</th>
                        <th>Balance Previous Year</th>
                        <th>Expired Previous Year</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <button type="submit" class="btn btn-primary" name="btn-edit" id="btn-edit"
                style="width: 100%;">
                <i class="fa fa-pencil"></i> {{ __('tm_input_balance_leave.btn_edit') }}
            </button>
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
                        <span class="title-text-notification">{{ __('personel_position.alert_success') }}</span>
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
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
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
        $.ajax({
            url: "{{ url('/time_management/period/data/detail') }}",
            type: "GET",
            success: function (response) {
                $('#period').val(response[0].periodYear);
            },
            error: function (response) {
                $('#notification_error').modal('show');
                $('#message-notification-error').html(response);
            }
        });

        loadDataEmployeeNo();

        $('#input_balance_leave_table thead tr').clone(true).appendTo('#input_balance_leave_table thead');
        $('#input_balance_leave_table thead tr:eq(1) th:not(:first-child)').each( function (i) {
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

        // var table = $('#input_balance_leave_table').DataTable({
        //     processing: true,
        //     serverSide: true,
        //     orderCellsTop: true,
        //     ajax: { 
        //         url: "{{ url('time_management/input_balance_leave/table') }}"
        //         // data: {
        //         //     'employeeNo' : employee_no
        //         // }  
        //     },
        //     error: function(jqXHR, ajaxOptions, thrownError) {
        //         alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
        //     },
        //     "sDom": 'lrtip',
        //     'sPaginationType': 'full_numbers',
        //     "order": [[ 1, "asc" ]],
        //     columns: [
        //         {
        //             orderable: false,
        //             targets: 0, 
        //             "defaultContent": '',
        //             render: function(data, type) {
        //                 return type === 'display'? '<input class="chk-select" type="checkbox">' : '';
        //             }
        //         },
        //         {data: 'leaveCode', name: 'leaveCode'},
        //         {data: 'leaveBalance', name: 'leaveBalance'},
        //         {data: 'leaveBalanceBefore', name: 'leaveBalanceBefore'},
        //         {data: 'leaveBalanceBeforeExpiredDate', name: 'leaveBalanceBeforeExpiredDate'}
        //     ],
        //     select: {
        //         style:    'multi',
        //         selector: 'td:first-child'
        //     }
        // });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function load_data_input_balance_leave(employee_no = '') {
            table = $('#input_balance_leave_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url : "{{ url('time_management/input_balance_leave/table') }}",
                    data: {
                        'employeeNo' : employee_no
                    },
                },
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
                    {data: 'leaveCode', name: 'leaveCode'},
                    {data: 'leaveBalance', name: 'leaveBalance'},
                    {data: 'leaveBalanceBefore', name: 'leaveBalanceBefore'},
                    {
                        data: 'leaveBalanceBeforeExpiredDate', 
                        name: 'leaveBalanceBeforeExpiredDate',
                        render: function (data, type, row) {
                            if(data){
                                return moment(data).format('DD-MMM-YYYY');
                            }else{
                                return '-';
                            }
                        }
                    }
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }
            });

            $('#input_balance_leave_table tbody').on('click', 'input[type="checkbox"]', function(e){
                var $row = $(this).closest('tr');

                if(this.checked){
                    $row.addClass('selected');
                } else {
                    $row.removeClass('selected');
                }

                // Prevent click event from propagating to parent
                e.stopPropagation();
            });

            $('#input_balance_leave_table').on('click', 'tr td:first-child', function(e){
                $(this).parent().find('input[type="checkbox"]').trigger('click');
            });
        }

        

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

        function loadDataEmployeeNo() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search;
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.employeeNo + '</div>' +
                        '<div class="col-6">' + data.data.employeeName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#employee_no').on('select2:open', function (e) {
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

            $('#employee_no').select2({
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
                    url: "{{ url('/employee_no/api2') }}",
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
                        var result = data.reduce((unique, o) => {
                            if (!unique.some(obj => obj.employeeNo === o.employeeNo)) {
                                unique.push(o);
                            }
                            return unique;
                        }, []);
                        return {
                            results: $.map(result, function (item) {
                                return {
                                    text: item.employeeNo + ' - ' + item.employeeName,
                                    id: item.employeeNo,
                                    data: item
                                };
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect,
                templateSelection: function (data) {
                    return data.text;
                }
            });
        }

        $("#employee_no").on('change', function() {
            var employee_no = $(this).val();
            $('#input_balance_leave_table').DataTable().destroy();
            load_data_input_balance_leave(employee_no);
        })

        $("#btn-edit").on('click', function() {
            var data = table.rows('.selected').data();
            if(data.count() > 0 && $('#employee_no') != null){
                // console.log(data[0].employeeNo);
                $.redirect("{{ url('time_management/input_balance_leave/detail') }}", { 'employeeNo' : data[0].employeeNo, 'leaveCode' : data[0].leaveCode }, "GET", "iframe_dashboard");
            }else{
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });
    });
</script>
</html>