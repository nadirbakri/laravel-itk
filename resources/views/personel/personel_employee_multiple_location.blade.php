<!DOCTYPE html>
<html>
<head>
    <title>{{ __('personel_employee_multiple_location.judul') }}</title>
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
        .row .button {
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

        .btn-check{
            margin-top:10px;
            margin: 20px 40px;
        }
        .card{
            max-width: 1200px;
            border-radius: 0.3rem;
            margin-left: 4%;
            margin-right: 2%;
            margin-top:15px
        }
        .judul h1{
            font-size: 25px;
            margin-left: 4%;
            margin-right: 2%;
            margin-top:50px
        }
        .judul hr{
            max-width:1200px;
            margin-left:4%;
            margin-right: 2%;
        }
        .buttonadd{
            width: 40px;
            height: 40px;
            background: #dac52c;
            border-radius: 100%;
        }
    </style>
</head>

<body>
    <div class="div-form">
        <div class="div-title">
            <a href="{{ route('personnel', ['moduleID' => 'PE']) }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('personel_employee_multiple_location.judul') }}</span>
            </a>
        </div>
        <form id="employee_multiple_location_form" method="post">
            @csrf
            <div class="card" >
                <div class="card-header">
                    <h5>{{ __('personel_employee_multiple_location.list') }}</h5>
                </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="employee_no form-check-label"><b>{{ __('personel_employee_multiple_location.label_employee_no') }}</b></label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <select class="form-control select2" id="employee_no" name="employee_no"></select>               
                        </div>   
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="employee_name form-check-label"><b>{{ __('personel_employee_multiple_location.label_employee_name') }}</b></label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="employee_name" name="employee_name" disabled>                        
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="multiple_location form-check-label"><b>{{ __('personel_employee_multiple_location.label_multiple_location') }}</b></label>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group mb-0">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="multiple_location_all"
                                    name="multiple_location" value="all">
                                <label class="form-radio-label"
                                    for="template_preparation_process">{{ __('personel_employee_multiple_location.label_all') }}</label>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-1" style="gap: 12px">
                            <div class="form-group m-0 d-flex align-items-center">
                                <div class="form-radio m-0 d-flex align-items-center" style="gap: 4px">
                                    <input class="form-radio-input" type="radio" id="multiple_location_specific"
                                        name="multiple_location" value="specific">
                                    <label class="form-radio-label ms-1 mb-0" for="multiple_location_specific">
                                        {{ __('personel_employee_multiple_location.label_specific') }}
                                    </label>
                                </div>
                            </div>
                            <select class="form-control select2" id="office_location" name="office_location" disabled></select>
                        </div>
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="multiple_location_multiple"
                                    name="multiple_location" value="multiple">
                                <label class="form-radio-label"
                                    for="template_preparation_process">{{ __('personel_employee_multiple_location.label_multiple') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="form-check-label"><b>{{ __('personel_employee_multiple_location.label_list_location') }}</b></label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-11">
                        <table id="multiple_location_table" class="table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Seq No</th>
                                    <th>Office Location Code</th>
                                    <th>Office Location Description</th>
                                </tr>
                            </thead>
                        </table>

                        <button class="button btn btn-primary buttonadd" name="btn-add" id="btn-add" data-toggle="modal" data-target="#modal_list_office_location" type="button" disabled>
                            <i class="fa fa-plus"></i>
                        </button>
                        <button class="button btn btn-danger buttonadd" name="btn-delete" id="btn-delete" type="button" disabled>
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div> 
                <br>
                <!-- BUTOON -->
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-list" id="btn-list"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_list_employee">
                        <i class="fa fa-plus"></i> {{ __('personel_employee_multiple_location.btn-list') }}
                        </button>
                    </div>   
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('personel_employee_multiple_location.btn-save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-outline-primary"
                        onClick="window.location.reload();" value="preview" style="width: 100%;">
                            <i class="fa fa-times"></i> {{ __('personel_employee_multiple_location.btn-cancel') }}
                        </button>   
                    </div>  
                </div>  
                <hr>
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-import" id="btn-import"
                            style="width: 100%;" data-toggle="modal" data-target="#modal_import">
                            {{ __('personel_employee_multiple_location.btn-import') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-export" id="btn-export"
                            style="width: 100%;">
                            {{ __('personel_employee_multiple_location.btn-export') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-download-template" id="btn-download-template"
                            style="width: 100%;">
                            {{ __('personel_employee_multiple_location.btn-download-template') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="div-form">
        <form id="list_office_location_modal_form" method="post">
            @csrf
            <div class="modal fade" id="modal_list_office_location">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-little">List Office Location</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body table-responsive">
                            <table id="list_office_location_modal_table" class="display" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Office Location Code</th>
                                        <th>Office Location Description</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="div-form">
        <form id="list_employee_modal_form" method="post">
            @csrf
            <div class="modal fade" id="modal_list_employee">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-little">List Employee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body table-responsive">
                            <table id="list_employee_modal_table" class="display" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Employee No</th>
                                        <th>Employee Name</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="div-form">
        <form id="import_employee_multiple_location_form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="modal_import">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                   <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-little">Import Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="import_export">Import File</label>
                                    <span style="color: red;">*</span>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="import_export" name="import_export">
                                        <label class="custom-file-label" for="import_export">Choose Import File</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="btn-process-import" id="btn-process-import" style="width: 100%;">
                                        Upload
                                    </button>
                                </div>
                            </div>
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
                        <span class="title-text-notification">{{ __('personel_employee_multiple_location.alert_success') }}</span>
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
<script>
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
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('table.display').DataTable();

        loadDataEmployeeNo();
        loadDataOfficeLocation();
        // $('#exampletwo').DataTable().destroy();
        // load_data_approval_table();

        function loadDataEmployeeNo() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-4">' + data.data.employeeNo + '</div>' +
                        '<div class="col-8">' + data.data.fullName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#employee_no').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-4"><b>Employee No</b></div>' +
                        '<div class="col-8"><b>Full Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $employeeNo = $('#employee_no').select2({
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
                                    text: item.employeeNo,
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

        function loadDataOfficeLocation() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-4">' + data.data.officeCode + '</div>' +
                        '<div class="col-8">' + data.data.officeDesc + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#office_location').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-4"><b>Office Code</b></div>' +
                        '<div class="col-8"><b>Office Location</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $officeCode = $('#office_location').select2({
                width: '100%',
                placeholder: 'Choose Office Location',
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
                    url: "{{ url('/office_location/api') }}",
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
                                    text: item.officeDesc,
                                    id: item.officeCode,
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
    
    // $('#btn-add').click(e=>{
    //     e.prefentDefault()
    // })
</script>
<script>
    var table2 = null;
    var table3 = null;
    var table4 = null;
    var table5 = null;
    var arrLocation = [];
   $('#btn-list').click(()=> {
        $('#list_employee_modal_table').DataTable().destroy();
        table2 = $('#list_employee_modal_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: {
                url : "{{ url('employee_no/table/api') }}"             
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
                    width: "10%",
                    "defaultContent": '',
                    render: function(data, type) {
                        return type === 'display'? '<button type="button"  onclick="klik(this)" class="btn btn-primary btn-check" id="btnaja" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg></button>' : '';
                    }
                },
                {data: 'employeeNo', name: 'employeeNo', width: "30%"},
                {data: 'fullName', name: 'fullName', width: "60%"},
            ],
            select: {
                style:    'single',
                selector: 'td:first-child'
            }, 
            
        });        
    })

    $('#btn-delete').click(()=>{
        table3.rows('.selected').remove().draw()
    })

    function load_data_multiple_location_table(){
        $('#multiple_location_table').DataTable().destroy();
        table3 = $('#multiple_location_table').DataTable({
            processing: true,
            data: arrLocation,
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            "order": [[ 1, "asc" ]],
            paging: false,
            columns: [
                {
                    orderable: false,
                    targets: 0, 
                    "defaultContent": '',
                    render: function(data, type) {
                        return type === 'display'? '<input class="chk-select" type="checkbox">' : '';
                            }
                },
                {data: 'seq', name: 'seq',
                render: function (data, type, row) {
                    return '<input type="hidden" class="form-control" name="locationSeqNo[]" value="' +
                        data + '">' + data;
                    }
                },
                {data: 'officeCode', name: 'officeCode',
                render: function (data, type, row) {
                    return '<input type="hidden" class="form-control" name="locationOfficeCode[]" value="' +
                        data + '">' + data;
                    }
                },
                {data: 'officedesc', name: 'officedesc',
                    render: function (data, type, row) {
                        return '<input type="hidden" class="form-control" name="locationOfficeDesc[]" value="' +
                            data + '">' + data;
                    }
                },
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }, 
            
        }); 
    } 

    const klik = (element) => {
        let employeeNo = $(element).parent().siblings('.sorting_1').text();
        let fullName = $(element).parent().siblings('td').eq(1).text().replace("\u00A0", " ");
        
        var $newOption = $("<option selected='selected'></option>").val(employeeNo).text(employeeNo);
        $('#employee_no').append($newOption).trigger('change');

        $('#employee_name').val(fullName);
        $('#btn-add').prop('disabled', false);
        $('#btn-delete').prop('disabled', false);

        $('.close').click();
        // arrLocation = table2.row($(element).parent()).data().directApproval;
        // load_data_approval_table();
        // arrEmailSettings = table2.row($(element).parent()).data().emailSettings;
        // load_data_email_table();

        $.ajax({
            type: 'GET',
            url: "{{ url('/personnel/employee_multiple_location/detail/get') }}",
            data: {
                'employeeNo': employeeNo
            }
        }).then(function (data) {
            arrLocation = data;
            load_data_multiple_location_table();
        });
    }

    function fetchListLocation(employeeNo) {
        $.ajax({
            type: 'GET',
            url: "{{ url('/personnel/employee_multiple_location/detail/get') }}",
            data: {
                'employeeNo': employeeNo
            }
        }).then(function (data) {
            arrLocation = data;
            load_data_multiple_location_table();
        });
    }

    $('input[name="multiple_location"]').on('change', function () {
        if ($('#multiple_location_specific').is(':checked')) {
            $('#office_location').prop('disabled', false);
            $('#btn-add').prop('disabled', true);
            $('#btn-delete').prop('disabled', true);
        }
        else if ($('#multiple_location_multiple').is(':checked')) {
            $('#office_location').prop('disabled', true);
            $('#btn-add').prop('disabled', false);
            $('#btn-delete').prop('disabled', false);

            const employeeNo = $('#employee_no').val()
            employeeNo ? fetchListLocation(employeeNo) : null
        } 
        else {
            $('#office_location').prop('disabled', true);
            $('#btn-add').prop('disabled', true);
            $('#btn-delete').prop('disabled', true);
        }
    });

    $('#employee_no').on('select2:select', function (e) {
        var data = $('#employee_no').select2('data');
        $('#employee_name').val(data[0].data.fullName);

        fetchListLocation(data[0].data.employeeNo);
    });

    $('#employee_no').on("select2:clear", function () {
        $('#employee_name').val('');

        if ($.fn.DataTable.isDataTable('#multiple_location_table')) {
            $('#multiple_location_table').DataTable().clear().destroy();
        }
    });

    $('#multiple_location_table tbody').on('click', 'input[type="checkbox"]', function(e){
        var $row = $(this).closest('tr');

        if(this.checked){
            $row.addClass('selected');
        } else {
            $row.removeClass('selected');
        }

        // Prevent click event from propagating to parent
        e.stopPropagation();
    });

    // $('#multiple_location_table').on('click', 'tr td:first-child', function(e){
    //     $(this).parent().find('input[type="checkbox"]').trigger('click');
    // });

    $('#btn-add').click(()=> {
        $('#list_office_location_modal_table').DataTable().destroy();
        table4 = $('#list_office_location_modal_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: {
                url : "{{ url('/personnel/office_location/table') }}"
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
                    width: "10%",
                    "defaultContent": '',
                    render: function(data, type) {
                        return type === 'display'? '<button type="button"  onclick="klikk(this)" class="btn btn-primary btn-check" id="btnaja" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg></button>' : '';
                             }
                },
                {data: 'officeCode', name: 'officeCode', width: "30%"},
                {data: 'officeDesc', name: 'officeDesc'},
            ],
            select: {
                style:    'single',
                selector: 'td:first-child'
            }, 
            
        });        
    })
    const klikk = (element) => {
        var count = table3.data().count();
        var officeCode = $(element).parent().siblings('.sorting_1').text();
        var officeDesc = $(element).parent().siblings('td').eq(1).text().replace("\u00A0", " ");

        $('.close').click();

        table3.row.add({
            'no' : '<input class="chk-select" type="checkbox">',
            'seq' : (count+1),
            'officeCode' : officeCode,
            'officedesc' : officeDesc
        }).draw();
    }
     
</script>
<script>
    $("#btn-save").click(function () {
        $(this).prop("disabled", true);
        $(this).html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
        );
        $("#employee_multiple_location_form").submit();
    });

    if ($("#employee_multiple_location_form").length > 0) {
            $("#employee_multiple_location_form").validate({
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('personnel/employee_multiple_location/proses') }}",
                        type: "POST",
                        data: $('#employee_multiple_location_form').serialize(),
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
                                    "{{ url('personnel/employee_multiple_location') }}";
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

    $('input[type="file"]').change(function (e) {
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });

    $("#btn-process-import").on('click', function () {
        $(this).prop("disabled", true);
        $(this).html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
        );

        $('#import_employee_multiple_location_form').submit();
    });

    $("#btn-export").click(function () {
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
            xhrFields: {
                responseType: 'blob',
            },
            url: "{{ url('personnel/employee_multiple_location/export') }}",
            type: "POST",
            success: function (result, status, xhr) {
                $("#btn-export").prop("disabled", false);
                $("#btn-export").html(
                    '{{ __("personel_import_export_personal_data.btn-export") }}'
                );
                
                var disposition = xhr.getResponseHeader(
                    'content-disposition');
                var matches = /"([^"]*)"/.exec(disposition);
                var filename = (matches != null && matches[1] ? matches[1] :
                    'noname_file.xlsx');
            
                // The actual download
                var blob = new Blob([result], {
                    type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                });

                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = filename;

                document.body.appendChild(link);

                link.click();
                document.body.removeChild(link);
            },
            error: function (response) {
                $("#btn-export").prop("disabled", false);
                $("#btn-export").html(
                    '{{ __("personel_employee_multiple_location.btn-export") }}'
                );
                $('#notification_error').modal('show');
                $('#message-notification-error').html(response);
            }
        });
    });

    $("#btn-download-template").click(function () {
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
            xhrFields: {
                responseType: 'blob',
            },
            url: "{{ url('personnel/employee_multiple_location/download_template') }}",
            type: "POST",
            success: function (result, status, xhr) {
                $("#btn-download-template").prop("disabled", false);
                $("#btn-download-template").html(
                    '{{ __("personel_import_export_personal_data.btn-download-template") }}'
                );

                var disposition = xhr.getResponseHeader(
                    'content-disposition');
                var matches = /"([^"]*)"/.exec(disposition);
                var filename = (matches != null && matches[1] ? matches[1] :
                    'noname_file.xlsx');
            
                // The actual download
                var blob = new Blob([result], {
                    type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                });

                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = filename;

                document.body.appendChild(link);

                link.click();
                document.body.removeChild(link);
            },
            error: function (response) {
                $("#btn-download-template").prop("disabled", false);
                $("#btn-download-template").html(
                    '{{ __("personel_employee_multiple_location.btn-download-template") }}'
                );
                $('#notification_error').modal('show');
                $('#message-notification-error').html(response);
            }
        });
    });

    if ($("#import_employee_multiple_location_form").length > 0) {
        $("#import_employee_multiple_location_form").validate({
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var myform = document.getElementById("import_employee_multiple_location_form");
                var formdata = new FormData(myform);

                $.ajax({
                    url: "{{ url('personnel/employee_multiple_location/import') }}",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formdata,
                    success: function (response) {
                        // if (response.status == "true") {
                        if (response[0].status == "true") {
                            $("#btn-process-import").prop("disabled", false);
                            $("#btn-process-import").html(
                                '{{ __("personel_employee_multiple_location.btn-import") }}'
                            );
                            $('#modal_import').modal('hide');
                            $('#notification_success').modal('show');
                            // $('#message-notification-success').html(response
                            //     .message);
                            $('#message-notification-success').html(response[0]
                                .message);
                            // setTimeout(function () {
                            //     window.location =
                            //         "{{ url('personnel/import_export_personal_data') }}";
                            // }, 3000);
                        } else {
                            $("#btn-process-import").prop("disabled", false);
                            $("#btn-process-import").html(
                                '{{ __("personel_employee_multiple_location.btn-import") }}'
                            );
                            $('#notification_error').modal('show');
                            // if (response.message == null || response.message ==
                            //     '') {
                            if (response[0].message == null || response[0].message ==
                                '') {
                                $('#message-notification-error').html(
                                    "{{ __('login.error') }}");
                            } else {
                                // $('#message-notification-error').html(response
                                //     .message);
                                $('#message-notification-error').html(response[0]
                                    .message);
                            }
                        }
                    },
                    error: function (response) {
                        $("#btn-process-import").prop("disabled", false);
                        $("#btn-process-import").html(
                            '{{ __("personel_employee_multiple_location.btn-import") }}'
                        );
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            }
        })
    }
</script>

</html>