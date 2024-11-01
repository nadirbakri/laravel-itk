<!DOCTYPE html>
<html>
<head>
    <title>{{ __('trc_transaction_checkin.judul') }}</title>
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

        .myimage{
            width: 100%;
            height: 100%;
        }

        .imgdiv{
            height: 250px;
            overflow: hidden;
            margin: 1%;
            padding:0.5%;
            border:2px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="div-form">
        <form id="trans_checkin_form" method="post">
            @csrf
            <div class="div-trans-medical">
                <div class="div-title">
                    <a href="{{ route('transaction', ['moduleID' => 'TRX']) }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('trc_transaction_checkin.rjudul') }}</span>
                    </a>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_from form-check-label">{{ __('trc_transaction_checkin.label_claim_date_start') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_from" name="claim_date_from"
                                placeholder="{{ __('trc_transaction_checkin.label_claim_date_start') }}">
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
                                <label for="direct_superior form-check-label">{{ __('trc_transaction_checkin.employee') }}</label>
                        </div>
                                <input type="text" class="form-control" id="direct_superior" name="direct_superior" placeholder="employee-no">
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary" name="btn-search" id="btn-search" value="preview" style="width: 100%;">
                            <img src="{{ url('icons/mob/button/button-search.svg') }}" alt="export"> {{ __('trc_transaction_checkin.btn_search') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-list" id="btn-list"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_list_mass_leave">
                        <i class="fa fa-plus"></i> {{ __('trc_transaction_checkin.btn_list') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-maps" id="btn-maps"
                        style="width: 100%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                          </svg> {{ __('trc_transaction_checkin.btn_maps') }}
                        </button>
                    </div>
                </div>
<br>
                <!-- TABLE -->

               <div class="card">
               <div class="row">
                    <div class="col-6">
                        <p><b>{{ __('trc_transaction_checkin.list_user') }}</b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table id="checkin_table" class="display table-striped table-hover dt-responsive display nowrap" cellspacing="10">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('trc_transaction_checkin.userid') }}</th>
                                    <th>{{ __('trc_transaction_checkin.ename') }}</th>
                                    <th>{{ __('trc_transaction_checkin.lcheckin') }}</th>
                                    <th>{{ __('trc_transaction_checkin.description') }}</th>
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
        <form id="payroll_calculation_detail_modal_form" method="post">
            @csrf
            <div class="modal fade" id="modal_list_mass_leave">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                   <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-little">{{ __('trc_transaction_checkin.luser') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive">
                        <table id="example" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('trc_transaction_checkin.employee') }}</th>
                                    <th>{{ __('trc_transaction_checkin.name') }}</th>
                                    <th>{{ __('trc_transaction_checkin.division') }}</th>
                                    <th>{{ __('trc_transaction_checkin.ranking') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>        
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

    <div class="div-form">
        <div class="modal fade" id="modal_list_detail">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-little">Detail Multiple Checkin</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="form-group row" >
                                <label class="col-2 col-form-label">Employee</label>
                                <p class="col-4 " id="empName" name="empName"></p>
                                    
                                <label class="col-2 col-form-label">Division</label>
                                <p class="col-4 " id="empDivision" name="empDivision"></p>														
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Check Date</label>
                                <p class="col-4 " id="checkDate" name="checkDate"></p>
                                    
                                <label class="col-2 col-form-label">Type</label>
                                <p class="col-4 " id="checkType" name="checkType"></p>	
                            </div>
                            <div class="form-group row">														
                                <label class="col-2 col-form-label">Customer</label>
                                <p class="col-4 " id="customer" name="customer"></p>
                                    
                                <label class="col-2 col-form-label">Remarks</label>
                                <p class="col-4 " id="remarks" name="remarks"></p>
                            </div>
                            <hr/>
                            <div class="form-group row">														
                                <label class="col-2 col-form-label">Address</label>
                                <p class="col-6 " id="address" name="address"></p>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label"></label>																	
                                <a id="maps" class="col-4 " target="_blank">Maps</a>
                            </div>
                            <hr/>
                            <div class="form-group row">																
                                <p class="col-10 " id="photoCheck"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
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
                        <span class="title-text-notification">{{ __('trc_transaction_checkin.alert_success') }}</span>
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
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        initDatePicker();
    });

    function initDatePicker() {
        $('.input-group input').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
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
    function load_data_medical_history(claim_date_from, direct_superior) {
            table = $('#checkin_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url : "{{ url('adm/checkinlistmaps/table') }}",
                    data: {
                        'lastCheckIn': claim_date_from,
                        'employeeNo' : direct_superior
                    }
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
                        render: function(data, type,row) {
                            return type === 'display' ? '<button type="button" onclick="klikdetail(this)" class="btn btn-info" name="btn-detail" id="btn-detail" style="width: 100%;" data-toggle="modal" data-target="#modal_list_detail"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/></svg> {{ __('trans_medical.detail') }} </button>' : '';

                        }
                    },
                    {data: 'employeeNo', name: 'employeeNo'},
                    {data: 'fullname', name: 'fullname'},
                    {data: 'lastCheckIn', name: 'lastCheckIn', 
                            render: function (data, type, row) {
                            return moment(data).format('YYYY-MM-DD');
                        }
                    },
                    {data: 'officeDesc', name: 'officeDesc'},
                    // {data: 'checkInHour', name: 'checkInHour'},
                    // {data: 'checkOutHour', name: 'checkOutHour'}
                    // {data: 'longitude', name: 'longitude'},
                    // {data: 'latitude', name: 'latitude'}
                    
                ]
            });

            // console.log(allLongitudes)
            // console.log(allLatitudes)

            $("#btn-search").prop("disabled", true);
            $("#btn-search").html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'

            );

            

            $("#btn-search").prop("disabled", false);
            $("#btn-search").html(
                "<img src={{ url('icons/mob/button/button-search.svg') }} alt='export'> {{ __('trans_transport.btn_search') }}"
            );
        }

        $("#trans_checkin_form").submit((e)=>{
            e.preventDefault();

            var claim_date_from = $("#claim_date_from").val();
            var direct_superior = $("#direct_superior").val();

            $('#checkin_table').DataTable().destroy();
            load_data_medical_history(claim_date_from, direct_superior);
    })

    const klikdetail = (element) => {
        let data = table.row($(element).parent()).data();

        $('#detailPhoto').hide();
        $('#noDetailAtt').hide();

        if(data != null){
            $('#detailPhoto').show();

            $('#timeIn').html((data.checkInDate != null) ? moment(data.checkInDate).format('HH:mm') : '-');
            $('#addressIn').html((data.address != null) ? data.address : '-');
            $('#mapsIn').attr('href', "http://www.google.com/maps/place/" + data.latitude + "," + data.longitude);

            $('#timeOut').html((data.checkOutDate != null) ? moment(data.checkOutDate).format('HH:mm') : '-');
            $('#addressOut').html((data.addressOut != null) ? data.addressOut : '-');
            $('#mapsOut').attr('href', "http://www.google.com/maps/place/" + data.latitudeOut + "," + data.longitudeOut);

            if(data.photoCheckIn == "" || data.photoCheckIn == null){
                $('#photoIn').html('<div class="noImgdiv" ><img id="ItemPreview" alt="no image" class="myimage img-rounded" src="<?= asset('pictures/no_image.png') ?>"/></div>');
            }else{
                $('#photoIn').html('<div class="imgdiv" ><img id="ItemPreview" alt="in" class="myimage img-rounded" src="data:image/png;base64,'+ data.photoCheckIn +'"/></div>');
            }
            
            if(data.photoCheckOut == "" || data.photoCheckOut == null ){
                $('#photoOut').html('<div class="noImgdiv" ><img id="ItemPreview" alt="no image" class="myimage img-rounded" src="<?= asset('pictures/no_image.png') ?>"/></div>');
            }else{
                $('#photoOut').html('<div class="imgdiv" ><img id="ItemPreview" alt="in" class="myimage img-rounded" src="data:image/png;base64,'+ data.photoCheckOut +'"/></div>');
            }	

        }else{
            $('#noDetailAtt').show();
        }
    }

    
    $('#btn-list').click(()=> {
        $('#example').DataTable().destroy();
        table2 = $('#example').DataTable({
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
        $('#direct_superior').val(employee_id)

        $('.close').click();
    }
    


</script>
{{-- <script>
        $('#btn-maps').click(()=> {
            // alert("t")
            var claim_date_from = $("#claim_date_from").val();
            var direct_superior = $("#direct_superior").val();
            maps_all(claim_date_from,direct_superior);

        })


        function maps_all(claim_date_from,direct_superior){
            $.ajax({
                url : "{{url('adm/checkinlist_mapsall/table')}}",
                data : {
                    'checkInDate': claim_date_from,
                    'employeeNo' : direct_superior
                },
                type : "get",
                dataType : "json",
                contentType : "application/json",
                success : function(data){
                    const allLatitudes = [];
                    const allLongitudes = [];
                    const allNames = [];

                    data.dataListSet.forEach(x => {
                        allLatitudes.push(x.latitude)
                        allLongitudes.push(x.longitude)
                        allNames.push(x.directSuperiorID)
                    });

                    let allLatitudesSerialized = encodeURIComponent(JSON.stringify(allLatitudes));
                    let allLongitudesSerialized = encodeURIComponent(JSON.stringify(allLongitudes));
                    let allNamesSerialized = encodeURIComponent(JSON.stringify(allNames));

                    location.href = `{{ url('mapsall/location') }}?allnames=${allNamesSerialized}&allLatitudes=${allLatitudesSerialized}&allLongitudes=${allLongitudesSerialized}`
                },
                error : function(err){
                    console.log(err);
                }
            })
        }
</script> --}}
</html>