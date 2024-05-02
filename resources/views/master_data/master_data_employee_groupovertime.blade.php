<!DOCTYPE html>
<html>
<head>
    <title>{{ __('data_employee_master.judul_employee_group_overtime') }}</title>
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
    <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
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

        .btn{
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
            <a href="javascript:void(0);" onclick="goBackWithModuleID()" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('data_employee_group.judul_employee_group_overtime') }}</span>
            </a>
        </div>
        <form id="md_employee_group" method="post">
            @csrf
            <div class="card" >
            <div class="card-header">
                <h5>{{ __('data_employee_group.judul_employee_group_overtime') }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="group_code form-check-label"><b>{{ __('data_employee_groupleave.formgroupname1') }}</b></label>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                        <input type="text" class="form-control" id="group_code" name="group_code">                        
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="group_name form-check-label"><b>{{ __('data_employee_groupleave.formgroupname2') }}</b></label>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                        <input type="text" class="form-control" id="group_name" name="group_name">                        
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="exampletwo form-check-label"><b>{{ __('data_employee_groupleave.formgroupname3') }}</b></label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-10">
                    <table id="exampletwo" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Approval Level</th>
                                <th>Approval Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="ceklis" name="ceklis"></td>
                                <td id="group_code1" name="group_code1"></td>
                                <td id="group_code2" name="group_code2"></td>
                            </tr>
                        </tbody>
                    </table>

                    <button class="button btn btn-primary buttonadd" name="btn-add" id="btn-add" data-toggle="modal" data-target="#modal_list_group_two" type="button">
                        <i class="fa fa-plus"></i>
                    </button>
                    <button class="button btn-danger buttonadd" name="btn-delete" id="btn-delete" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg>
                    </button>
                    </div>
                </div> 
                <br>
                
{{-- nambah ini --}}
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="reimbursement_type form-check-label"><b>{{ __('data_employee_groupleave.formgroupname3') }}</b></label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-10">
                    <table id="exampleemail" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Group ID</th>
                                <th>Group Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="ceklis" name="ceklis"></td>
                                <td id="group_id" name="group_id"></td>
                                <td id="group_name" name="group_name"></td>
                            </tr>
                        </tbody>
                    </table>

                    <button class="button btn btn-primary buttonadd" name="btn-add2" id="btn-add2" data-toggle="modal" data-target="#modal_list_group_email_setting" type="button">
                        <i class="fa fa-plus"></i>
                    </button>
                    <button class="button btn-danger buttonadd" name="btn-delete2" id="btn-delete2" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg>
                    </button>
                    </div>
                </div> 
                <br>
                <!-- BUTOON -->
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-list" id="btn-list"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_list_group">
                        <i class="fa fa-plus"></i> {{ __('trans_medical.btn_list') }}
                        </button>
                    </div>   
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('md_claim_transaction.btn_save') }}
                        </button>
                    </div>    
                    <div class="col-3">
                        <button type="button" class="btn btn-outline-primary"
                        onClick="window.location.reload();" value="preview" style="width: 100%;">
                            <i class="fa fa-times"></i> {{ __('admin_main_menu_news_master.cancel') }}
                        </button>   
                    </div>      
                </div>  
            </div>
        </form>
    </div>

{{-- modal btn-list --}}
    <div class="div-form">
        <form id="payroll_calculation_detail_modal_form" method="post">
            @csrf
            <div class="modal fade" id="modal_list_group">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-little">List User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body table-responsive">
                        <table id="example" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Group Code</th>
                                    <th>Group Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>        
                                    <td></td>        
                                    <td></td>       
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                    
            </div>
        </form>
    </div>


    {{-- modal btn-add --}}

    <div class="div-form">
        <form id="payroll_calculation_detail_two_modal_form" method="post">
            @csrf
            <div class="modal fade" id="modal_list_group_two">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-little">List User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body table-responsive">
                        <table id="examplethree" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Group Code</th>
                                    <th>Group Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>        
                                    <td></td>        
                                    <td></td>       
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                    
            </div>
        </form>
    </div>

     {{-- modal btn-add2 --}}
     <div class="div-form">
        <form id="payroll_calculation_detail_two_modal_form" method="post">
            @csrf
            <div class="modal fade" id="modal_list_group_email_setting">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-little">List User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body table-responsive">
                        <table id="modalexampleemail" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Group ID</th>
                                    <th>Group Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>        
                                    <td></td>        
                                    <td></td>       
                                </tr>
                            </tbody>
                        </table>
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
        $('table.display').DataTable();

        // $('#exampletwo').DataTable().destroy();
        // load_data_approval_table();
    });
    
    // $('#btn-add').click(e=>{
    //     e.prefentDefault()
    // })
</script>
<script>
    var table3 = null;
    var table5 = null;
    var arrApproval = [];
    var arrEmailSettings = [];
   $('#btn-list').click(()=> {
        $('#example').DataTable().destroy();
        table2 = $('#example').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: {
                url : "{{ url('master_data_overtime/list/table') }}"             
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
                {data: 'groupCode', name: 'groupCode'},
                {data: 'groupName', name: 'groupName'},
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }, 
            
        });        
    })

    $('#btn-delete').click(()=>{
        table3.rows('.selected').remove().draw()
    })
    $('#btn-delete2').click(()=>{
        table5.rows('.selected').remove().draw()
    })

    function load_data_approval_table(){
        $('#exampletwo').DataTable().destroy();
        table3 = $('#exampletwo').DataTable({
                processing: true,
                data: arrApproval,
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
                    {data: 'approvalLevel', name: 'approvalLevel',
                    render: function (data, type, row) {

                        return '<input type="hidden" class="form-control" name="approvalLevel[]" value="' +

                            data + '">' + data;

                        }
                    },
                    {data: 'approvalCode', name: 'approvalCode',
                    render: function (data, type, row) {

                    return '<input type="hidden" class="form-control" name="approvalCode[]" value="' +

                        data + '">' + data;

                    }}
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }, 
                
            }); 
        } 

    const klik = (element) => {
        let employee_id = $(element).parent().siblings('.sorting_1').text();
        let fullname = $(element).parent().siblings('td').eq(1).text();
        $('#group_code').val(employee_id);
        $('#group_name').val(fullname);
        $('#group_code').prop('readonly', true);
        $('#group_name').prop('readonly', true);

        $('.close').click();
        arrApproval = table2.row($(element).parent()).data().directApproval;
        load_data_approval_table();
        arrEmailSettings = table2.row($(element).parent()).data().emailSettings;
        load_data_email_table();
    }

    $('#exampletwo tbody').on('click', 'input[type="checkbox"]', function(e){
        var $row = $(this).closest('tr');

        if(this.checked){
            $row.addClass('selected');
        } else {
            $row.removeClass('selected');
        }

        // Prevent click event from propagating to parent
        e.stopPropagation();
    });

    $('#exampletwo').on('click', 'tr td:first-child', function(e){
        $(this).parent().find('input[type="checkbox"]').trigger('click');
    });

    $('#group_code').blur(function () {
        if($(this).val() != null && $(this).val() != ''){
            $.ajax({
                type: 'GET',
                url: "{{ url('/master_data/overtime/get') }}",
                data: {
                    'groupCode': $(this).val()
                }
            }).then(function (data) {
                $('#group_code').val(data[0].groupCode);
                $('#group_name').val(data[0].groupName);
                $('#group_code').prop('readonly', true);
                $('#group_name').prop('readonly', true);

                arrApproval = data[0].directApproval;
                load_data_approval_table();
                arrEmailSettings = data[0].emailSettings;
                load_data_email_table();
            });
        }
    });

    $('#btn-add').click(()=> {
        $('#examplethree').DataTable().destroy();
        table4 = $('#examplethree').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: {
                url : "{{ url('master_data/list/table') }}"
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
                        return type === 'display'? '<button type="button"  onclick="klikk(this)" class="btn btn-primary" id="btnaja" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg></button>' : '';
                             }
                },
                {data: 'groupCode', name: 'groupCode'},
                {data: 'groupName', name: 'groupName'},
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }, 
            
        });        
    })
    const klikk = (element) => {
        var count = table3.data().count();
        var appCode = $(element).parent().siblings('.sorting_1').text();
        // console.log(appCode);
        $('.close').click();
        table3.row.add({
            'no' : '<input class="chk-select" type="checkbox">',
            'approvalLevel' : (count+1),
            'approvalCode' : appCode
        }).draw();
        // arrApproval = table4.row($(element).parent()).data().directApproval;
        // load_data_approval_table();
    }
     
</script>
<script>
 $('#btn-add2').click(()=> {
        $('#modalexampleemail').DataTable().destroy();
        tableemail = $('#modalexampleemail').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: {
                url : "{{ url('master_data/list/table') }}"             
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
                        return type === 'display'? '<button type="button"  onclick="klikemail(this)" class="btn btn-primary" id="btnaja" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg></button>' : '';
                             }
                },
                {data: 'groupCode', name: 'groupCode'},
                {data: 'groupName', name: 'groupName'},
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }, 
            
        });        
    })

    function load_data_email_table(){
        $('#exampleemail').DataTable().destroy();
        table5 = $('#exampleemail').DataTable({
                processing: true,
                data: arrEmailSettings,
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
                    {data: 'groupID', name: 'groupID',
                    render: function (data, type, row) {

                        return '<input type="hidden" class="form-control" name="groupID[]" value="' +

                            data + '">' + data;

                        }
                    },
                    {data: 'groupName', name: 'groupName',
                    render: function (data, type, row) {

                    return '<input type="hidden" class="form-control" name="groupName[]" value="' +

                        data + '">' + data;

                    }}
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }, 
                
            }); 
        } 
    const klikemail = (element) => {
        var count = table5.data().count();
        var groupid = $(element).parent().siblings('.sorting_1').text();
        let groupname = $(element).parent().siblings('td').eq(1).text();
        // console.log(appCode);
        $('.close').click();
        table5.row.add({
            'no' : '<input class="chk-select" type="checkbox">',
            'groupID' : groupid,
            'groupName' : groupname
        }).draw();
        // arrApproval = table4.row($(element).parent()).data().directApproval;
        // load_data_approval_table();
    }

    $('#exampleemail tbody').on('click', 'input[type="checkbox"]', function(e){
        var $row = $(this).closest('tr');

        if(this.checked){
            $row.addClass('selected');
        } else {
            $row.removeClass('selected');
        }

        // Prevent click event from propagating to parent
        e.stopPropagation();
    });

    $('#exampleemail').on('click', 'tr td:first-child', function(e){
        $(this).parent().find('input[type="checkbox"]').trigger('click');
    });
     
</script>

<script>
      $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#md_employee_group").submit();
        });

        if ($("#md_employee_group").length > 0) {
                $("#md_employee_group").validate({
                    submitHandler: function (form) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "{{ url('master_data/employee_group_overtime/proses') }}",
                            type: "POST",
                            data: $('#md_employee_group').serialize(),
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
                                        "{{ url('master_data/employee_group_overtime') }}";
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