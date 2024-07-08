<!DOCTYPE html>
<html>
<head>
    <title>{{ __('personel_loan_whitelist.judul') }}</title>
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
    <link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    
    <style type="text/css">
        .div-personel {
            max-width: 100%;
            margin: auto;
            /*margin-top: 1%;*/
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
    </style>
</head>
<body>
    <div class="div-personel">
        <div class="div-title">
            <a href="{{ route('personnel', ['moduleID' => 'PE']) }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('personel_loan_whitelist.list') }}</span>
			</a>
        </div>
        <div class="div-form">
            <form id="loan_whitelist_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label
                                for="loan_bank">{{ __('personel_loan_whitelist.label_loan_bank') }}</label>
                            <select class="form-control select2" id="loan_bank" name="loan_bank"></select>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="loan_company_code">{{ __('personel_loan_whitelist.label_loan_company_code') }}</label>
                            <input type="text" class="form-control" id="loan_company_code" name="loan_company_code"
                                placeholder="{{ __('personel_loan_whitelist.label_loan_company_code') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10">
                        <div class="div-table">
                            <table id="loan_whitelist_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>NIK</th>
                                        <th>Employee No</th>
                                        <th>Employee Name</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1" style="padding-right: 0.3rem;">
                        <button class="button btn btn-primary" name="btn-add" id="btn-add" data-toggle="modal" data-target="#modal_list_employee" type="button" style="width: 100%;" disabled>
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <div class="col-1" style="padding-left: 0.3rem;">
                        <button class="button btn btn-danger" name="btn-delete" id="btn-delete" type="button" style="width: 100%;" disabled>
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('personel_loan_whitelist.btn_save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modal_list_employee"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">List Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="div-table">
                        <table id="list_employee_table" class="table hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>NIK</th>
                                    <th>Employee No</th>
                                    <th>Employee Name</th>
                            </thead>
                        </table>
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
                        <span class="title-text-notification">{{ __('trans_mass_leave.alert_success') }}</span>
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
    $(document).ready(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var arrayEmp = [];
        var table = null;

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

        loadDataLoanBank();
        load_table_loan_whitelist();

        function htmlDecode(value) {
    	    return $("<textarea/>").html(value).text();
	    }

        $('#loan_bank').on('select2:select', function (e) {
            if($(this).val() != null && $(this).val() != ''){
                var data = $('#loan_bank').select2('data');
                $('#loan_company_code').val(htmlDecode(data[0].data.loanCompanyCode));
                $.ajax({
                    type: 'GET',
                    url: "{{ url('/loan_whitelist/api') }}",
                    data: {
                        'loanBank': $(this).val()
                    }
                }).then(function (response) {
                    var updatedDataArray = response.map(function(item) {
                        var newItem = Object.assign({}, item);
                        
                        if (newItem.hasOwnProperty('nik')) {
                            newItem.idNo = newItem.nik;
                            newItem.fullName = newItem.employeeName;
                            delete newItem.nik;
                        }
                        
                        return newItem;
                    });
                    arrayEmp = updatedDataArray;
                    $('#btn-add, #btn-delete').prop('disabled', false);
                    load_table_loan_whitelist();
                });
            }
        });

        $('#loan_bank').on('select2:unselecting', function (e) {
            $('#btn-add, #btn-delete').prop('disabled', true);
            $('#loan_company_code').val('');
        });

        $('#modal_list_employee').on('show.bs.modal', function () {
            load_table_list_employee();
        });

        function load_table_list_employee() {
            $('#list_employee_table').DataTable().destroy();
            $('#list_employee_table').DataTable( {
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url : "{{ url('/employee_no/table/api') }}"             
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lfrtip',
                'sPaginationType': 'full_numbers',
                "order": [[ 1, "asc" ]],
                columns: [{
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        "className": "text-center",
                        render: function (data, type) {
                            return type === 'display' ?
                                '<button type="button" class="btn btn-primary btn-choose-employee"><i class="fa fa-check"></i></button>' : '';
                        }
                    },
                    {   
                        data: 'idNo',
                        name: 'idNo'
                    },
                    {
                        data: 'employeeNo',
                        name: 'employeeNo'
                    },
                    {
                        data: 'fullName',
                        name: 'fullName'
                    }],
                    select: {
                        style: 'single',
                        selector: 'td:first-child'
                    }
            });
        }

        function load_table_loan_whitelist() {
            $('#loan_whitelist_table').DataTable().destroy();
            table = $('#loan_whitelist_table').DataTable( {
                processing: true,
                data: arrayEmp,

                "sDom": 'lrtip',
                "order": [
                    [1, "asc"]
                ],
                paging: false,
                columns: [{
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ?
                                '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {   
                        data: 'idNo',
                        name: 'idNo',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="nik[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'employeeNo',
                        name: 'employeeNo',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="employee_no[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'fullName',
                        name: 'fullName',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="employee_name[]" value="' +
                                data + '">' + data;
                        }
                    }],
                    select: {
                        style: 'single',
                        selector: 'td:first-child'
                    }
            });
        }

        $('#loan_whitelist_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#loan_whitelist_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        $('#list_employee_table').on('click', '.btn-choose-employee', function () {
            let idNo = $(this).parent().siblings('.sorting_1').text();
            let employeeNo = $(this).parent().siblings('td').eq(1).text().replace("\u00A0", " ");
            let fullName = $(this).parent().siblings('td').eq(2).text().replace("\u00A0", " ");

            table.row.add({
                'no' : '<input class="chk-select" type="checkbox">',
                'idNo' : idNo,
                'employeeNo' : employeeNo,
                'fullName' : fullName
            }).draw();

            $('#modal_list_employee').modal('hide');
        });

        $('#btn-delete').click(()=>{
            table.rows('.selected').remove().draw()
        });

        function loadDataLoanBank() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.loanBank + '</div>' +
                        '<div class="col-6">' + data.data.loanCompanyCode + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#loan_bank').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Loan Bank</b></div>' +
                        '<div class="col-6"><b>Loan Company Code</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#loan_bank').select2({
                width: '100%',
                placeholder: 'Choose Loan Bank',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/loan_bank/api') }}",
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
                                    text: item.loanBank,
                                    id: item.loanBank,
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
    });

    $("#btn-save").click(function () {
        $(this).prop("disabled", true);
        $(this).html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
        );
        $("#loan_whitelist_form").submit();
    });

    if ($("#loan_whitelist_form").length > 0) {
            $("#loan_whitelist_form").validate({
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('personnel/loan_whitelist/proses') }}",
                        type: "POST",
                        data: $('#loan_whitelist_form').serialize(),
                        success: function (response) {
                            if (response.status == "true"){
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_employee_list.btn_print") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                .message);
                                setTimeout(function () {
                                window.location =
                                    "{{ url('personnel/loan_whitelist') }}";
                                }, 3000);
                            } else {
                            $("#btn-save").prop("disabled", false);
                            $("#btn-save").html(
                                '<i class="fa fa-floppy-o"></i> Save'
                            );
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
                    error: function (response) {
                        $("#btn-save").prop("disabled", false);
                        $("#btn-save").html(
                            '<i class="fa fa-floppy-o"></i> {{ __("md_claim_transaction.btn_save") }}'
                        );

                        $('#notification').modal('show');
                        $('#message-notification').html(response);
                    }
                });
            }
        })
    }
</script>

</html>