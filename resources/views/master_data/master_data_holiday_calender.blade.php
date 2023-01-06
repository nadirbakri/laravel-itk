<!DOCTYPE html>
<html>
<head>
    <title>{{ __('holiday_calender.head') }}</title>
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
    <link rel="stylesheet" href="{{ asset('css/data_employee_grou.css') }}"> 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
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
        .card{
            max-width: 1200px;
            border-radius: 0.3rem;
            margin-left: 4%;
            margin-right: 2%;
            margin-top:15px
       }
       .judul h1{
        font-size: 35px;
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
        <div class="judul">
            <h1>{{ __('holiday_calender.judul') }}</h1>
            <hr>
        </div>
        <form id="holiday_calender_form" method="post">
            @csrf
            <div class="card" >
                <div class="card-header">
                {{ __('holiday_calender.judul2') }}
                </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="reimbursement_type form-check-label"><b>{{ __('holiday_calender.dateholiday') }}</b></label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <input type="text" class="form-control" id="date_holiday" name="date_holiday" placeholder="date-holiday">
                            {{-- <div class="input-group-prepend">
                                <span class="input-group-text" id="date-calendar"><span class="fa fa-calendar"></span></span>
                            </div> --}}
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="reimbursement_type form-check-label"><b>{{ __('holiday_calender.description') }}</b></label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="">
                            <div class="form-group">
                            <input type="text" class="form-control" id="description_date" name="description_date" >                        
                        </div>
                        </div>
                    </div>
                   
                </div>
              
<br>
                <!-- BUTOON -->
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary" name="btn-save" id="btn-save" value="preview">
                        {{ __('holiday_calender.button') }}
                        </button>     
                        <button type="button" class="btn btn-primary" onClick="window.location.reload();"  value="preview">
                            {{ __('admin_main_menu_news_master.cancel') }}
                        </button>     
                        <button class="btn btn-primary" name="btn-list" id="btn-list" data-toggle="modal" data-target="#modal_list_email_settings" type="button">
                        {{ __('holiday_calender.button2') }}
                        </button>     
                    </div>
                </div>  
            </div>
        </form>
    </div>

    <div class="div-form">
        <form id="payroll_calculation_detail_modal_form" method="post">
            @csrf
            <div class="modal fade" id="modal_list_email_settings">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-little">Holiday Calendar</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body table-responsive">
                        <table id="example" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Holiday Date</th>
                                    <th>Description</th>
                                    {{-- <th>Group Name</th> --}}
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
<script>
    $(document).ready(function () {
       $('table.display').DataTable();
   });
</script>
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
<script>
      $('#btn-list').click(()=> {
        $('#example').DataTable().destroy();
        table2 = $('#example').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: {
                url : "{{ url('master_data/holiday_calendar/table') }}"             
            },
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lfrtip',
            'sPaginationType': 'ellipses',
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
                {data: 'calendar', name: 'calendar',
                        render: function (data, type, row) {
                            return moment(data).format('YYYY-MM-DD');
                        }
                },
                {data: 'description', name: 'description'},
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }, 
            
        });        
    })

    const klik = (element) => {
        let employee_id = $(element).parent().siblings('.sorting_1').text()
        let fullname = $(element).parent().siblings('td').eq(1).text()

        $('#date_holiday').val(employee_id)
        $('#description_date').val(fullname)

        $('.close').click();
        // let division = $(element).parent().siblings('td').eq(2).text()
        // let rankingname = $(element).parent().siblings('td').eq(3).text()
        // alert(data1)
    }
</script>
<script>
    $("#btn-save").click(function () {
          $(this).prop("disabled", true);
          $(this).html(
              '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
          );
          $("#holiday_calender_form").submit();
      });

      if ($("#holiday_calender_form").length > 0) {
              $("#holiday_calender_form").validate({
                  submitHandler: function (form) {
                      $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                      });
                      $.ajax({
                          url: "{{ url('master_data/holiday_calendar/proses') }}",
                          type: "POST",
                          data: $('#holiday_calender_form').serialize(),
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
                                      "{{ url('master_data/holiday_calender') }}";
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