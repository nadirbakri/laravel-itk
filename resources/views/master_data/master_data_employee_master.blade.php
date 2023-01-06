<!DOCTYPE html>
<html>
<head>
    <title>{{ __('data_employee_master.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/data_employee_master.css') }}"> 
    <style type="text/css">
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
        .row button {
            background-color: #1E90FF;
            border: none;
            color: white;
            padding: 5px 11px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            cursor: pointer;
            }

        .btn{
            margin-top:10px;
            margin: 20px 40px;
        }
    </style>
</head>

<body>
    <div class="div-form">
        <form id="master_data_employee_master" method="post">
            @csrf
            <div class="div-employee-master">
                <div class="div-title">
                    <a href="{{ url('transaction') }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('data_employee_master.subjudul') }}</span>
                    </a>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="status form-check-label">{{ __('data_employee_master.status') }}</label>
                        </div>
                        <input type="text" class="form-control" id="status" name="status">
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="request_id form-check-label">{{ __('data_employee_master.userid') }}</label>
                        </div>
                        <input type="text" class="form-control" id="request_id" name="request_id">
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="request_id form-check-label">{{ __('data_employee_master.employeeid') }}</label>
                        </div>
                        <input type="text" class="form-control" id="request_id" name="request_id">
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_from form-check-label">{{ __('data_employee_master.label_claim_date_join') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_from" name="claim_date_from"
                                placeholder="{{ __('trans_mass_leave.label_claim_date_start') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="claim_date_from_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="claim_date_from_hidden" name="claim_date_from_hidden" hidden>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="company_code form-check-label">{{ __('data_employee_master.companycode') }}</label>
                        </div>
                        <select class="form-control select2" id="company_code" name="company_code"></select>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="office_location form-check-label">{{ __('data_employee_master.location') }}</label>
                        </div>
                        <select class="form-control select2" id="office_location" name="office_location"></select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="remarks form-check-label">{{ __('data_employee_master.name') }}</label>
                        </div>
                        <input type="text" class="form-control" id="remarks" name="remarks">
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="remarks form-check-label">{{ __('data_employee_master.password') }}</label>
                        </div>
                        <input type="text" class="form-control" id="remarks" name="remarks">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="remarks form-check-label">{{ __('data_employee_master.phone') }}</label>
                        </div>
                        <input type="text" class="form-control" id="remarks" name="remarks">
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="remarks form-check-label">{{ __('data_employee_master.addres') }}</label>
                        </div>
                        <input type="text" class="form-control" id="remarks" name="remarks">
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="leave_time form-check-label">{{ __('data_employee_master.division') }}</label>
                        </div>
                        <select class="form-control select2" id="leave_time" name="leave_time"></select>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                             <label for="leave_time form-check-label">{{ __('data_employee_master.photo') }}</label>
                        </div>
                        <form action="aksi.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="file">
	                    </form>
                    </div>
                </div>

                <!-- TABLE -->
                <div class="card-header" onclick="addChild();">
                   <a href="">{{ __('data_employee_master.formemployee') }}</a> 
                </div>
                <div class="card" id="form1">
                    <table id="mass_leave_table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Leave Type</th>
                                <th>Leave Balance</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="card-header" onclick="addChild2();">
                   <a href="">{{ __('data_employee_master.formemployee1') }}</a> 
                </div>
                <div class="card" id="form2">
                    <table id="mass_leave_table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Reimbursement Type</th>
                                <th>Reimbursement Plafon Balance</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="card-header" onclick="addChild3();">
                   <a href="">{{ __('data_employee_master.formemployee2') }}</a> 
                </div>
                <div class="card" id="form3">
                    <table id="mass_leave_table" class="table table-bordered">
                    <button type="button" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                     <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg> Add Dependant</button>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Relation</th>
                                <th>Dependant Name</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="card-header" onclick="addChild4();">
                   <a href="">{{ __('data_employee_master.formemployee3') }}</a> 
                </div>
                <div class="card" id="form4">
                    <table id="mass_leave_table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee Group</th>
                                <th>Approval</th>
                                <th>Employee Supervisor Group</th>
                                <th>Supervisor Name</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- BUTTON -->
                <div class="row">
                    
                        <button class="btn btn-primary" name="btn-save" id="btn-save" value="preview">
                            {{ __('trans_mass_leave.btn_save') }}
                        </button>
                  
                        <button class="btn btn-primary" name="btn-save" id="btn-save" value="preview">
                            Cancel
                        </button>
                  
                    
                        <button class="btn btn-primary" name="btn-list" id="btn-list" value="preview">
                            {{ __('trans_mass_leave.btn_list') }}
                        </button>
                  
                    
                        <button class="btn btn-danger" name="btn-remove" id="btn-remove" value="preview">
                            Reset Password
                        </button>
                  
                    
                        <button class="btn btn-danger" name="btn-remove" id="btn-remove" value="preview">
                            Active
                        </button>
                  
                    
                        <button class="btn btn-danger" name="btn-remove" id="btn-remove" value="preview">
                            Deactive
                        </button>
                  
                    
                        <button class="btn btn-danger" name="btn-remove" id="btn-remove" value="preview">
                            Invoice
                        </button>
                  
                    
                        <button class="btn btn-danger" name="btn-remove" id="btn-remove" value="preview">
                            Export Emp
                        </button>
                  
                </div>

                <!-- TABLE -->
                <!-- <div class="row">
                    <div class="col-6">
                        <p>{{ __('trans_mass_leave.list_table') }}</p>
                    </div>
                </div>
                <div class="div-table">
                    <table id="mass_leave_table" class="table hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Seq Number</th>
                                <th>Req Seq Number</th>
                                <th>User ID</th>
                                <th>Full Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div> -->

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
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script>
    function addChild() {
        document.getElementById('form1').style.display = 'block';
    }

    function addChild2() {
        document.getElementById('form2').style.display = 'block';
    }

    function addChild3() {
        document.getElementById('form3').style.display = 'block';
    }

    function addChild4() {
        document.getElementById('form4').style.display = 'block';
    }
</script>

<script type="text/javascript">

loadDataCompanyCode();
loadDataOfficeLocation();

    $.get("{{ url('employee_company_code/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#company_code').append("<option value=" + v.variable + ">" + v.value +
                    "</option>");
            });
        });

    $.get("{{ url('office_location/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#office_location').append("<option value=" + v.variable + ">" + v.value +
                    "</option>");
            });
        });

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

        function loadDataCompanyCode(){
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
            
            $('#company_code').select2({
                width: '100%',
                placeholder: 'Choose Company Code',
                allowClear: true,
                // multiple: true,
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
                    url: "{{ url('/employee_company_code/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.value,
                                    id: item.comGenCode,
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

        function loadDataOfficeLocation(){
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
            
            $('#office_location').select2({
                width: '100%',
                placeholder: 'Choose Office Location',
                allowClear: true,
                // multiple: true,
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
                    url: "{{ url('/office_location/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.value,
                                    id: item.comGenCode,
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
  
  
</script>

</html>