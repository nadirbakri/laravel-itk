<!DOCTYPE html>
<html>
<head>
    <title>{{ __('admin_main_menu_news_master.head') }}</title>
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
    <link rel="stylesheet" href="{{ asset('admin_main_menu_checkin_list.css') }}"> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <style type="text/css">
        .modal-header-notification-error {
            border-bottom: 1px solid #eee;
            background-color: #f44336;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-bord er-radius-topleft: 5px;
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
       .newscategory select{
        width: 100px;
       }
    </style>
</head>

<body>
    <div class="div-form">
        <div class="judul">
            <h1>{{ __('admin_main_menu_news_master.judul') }}<h1>
            <hr>
        </div>
        <form id="admin_menu_news_master" method="post">
            @csrf
            <div class="card" >
                <div class="card-header">
                {{ __('admin_main_menu_news_master.formjudul') }}
                </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="reimbursement_type form-check-label"><b>{{ __('admin_main_menu_news_master.form1') }}</b></label>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                        <input type="text" class="form-control" id="t_news" name="t_news" ></div>
                            
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="reimbursement_type form-check-label"><b>{{ __('admin_main_menu_news_master.form2') }}</b></label>
                        </div>
                    </div>
                    <div class="newscategory">
                            <select  class="form-control select2" id="n_category" name="n_category"></select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="reimbursement_type form-check-label"><b>Content</b></label>
                        </div>
                    </div>
                    <div class="class">
                        <div class="form-group">
                            <textarea type="text" class="form-control" id="c_news" name="c_news"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="reimbursement_type form-check-label"><b>Attachment</b></label>
                        </div>
                    </div>
                        <form action="aksi.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="file">
	                    </form>
                </div>
                    <div class="row">
                        <div class="col-2">
                           
                        </div>
                            <img src="" alt="" id="photo" name="photo" style="width:200px" >
                    </div>
           
                <div class="row">
                    <div class="col-12"> 
                            <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save">
                            {{ __('admin_main_menu_news_master.save') }}                    </button>  
                            <button class="btn btn-primary" type="submit" name="btn-delete" id="btn-delete">
                            {{ __('admin_main_menu_news_master.delete') }}
                            </button>  
                            <button class="btn btn-primary" onClick="window.location.reload();"  value="preview">
                            {{ __('admin_main_menu_news_master.cancel') }}
                            </button> 
                            <button type="button" class="btn btn-primary" name="btn-list" id="btn-list" data-toggle="modal" data-target="#modal_list_news">
                            {{ __('admin_main_menu_news_master.list') }}
                            </button>  
                    </div>
                </div>
            </div>
         </form> 
    </div>

    <div class="div-form">
        <form id="payroll_calculation_detail_modal_form" method="post">
            @csrf
            <div class="modal fade" id="modal_list_news">
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
                                    <th>Title</th>
                                    <th>News Category</th>
                                    {{-- <th>Description</th> --}}
                                    <th>Create Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- <td>#</td>         --}}
                                    <td>
                                        
                                    </td>        
                                    <td></td>        
                                    <td></td>        
                                    {{-- <td></td>         --}}
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
<script>
    $('#btn-list').click(()=> {
        $('#example').DataTable().destroy();
        table2 = $('#example').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: {
                url : "{{ url('adm_main_menu/news_master/list') }}"             
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
                {data: 'title', name: 'title'},
                {data: 'category', name: 'category'},
                // {data: 'content', name: 'content'},
                {data: 'createDate', name: 'createDate',
                        render: function(data, row, type){
                            return moment(data).format('YYYY-MM-DD');
                        }
                },
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }, 
            
        });        
    })

    const klik = (element) => {
        let title = $(element).parent().siblings('.sorting_1').text()
        let newscategory = $(element).parent().siblings('td').eq(1).text()
        let desc = $(element).parent().siblings('td').eq(2).text()

        // alert(newscategory)
        $('#t_news').val(title)
        $('#c_news').val(table2.row($(element).parent()).data().content)
        $('#n_category').append($('<option>', {
            value: newscategory,
            text: newscategory
        }));
        $('#photo').attr('src', 'data:image/png;base64,' + table2.row($(element).parent()).data().photo);
        $('.close').click();
    }
</script>
<script>
    $("#btn-save").click(function () {
          $(this).prop("disabled", true);
          $(this).html(
              '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
          );
          $("#admin_menu_news_master").submit();
      });

      if ($("#admin_menu_news_master").length > 0) {
              $("#admin_menu_news_master").validate({
                  submitHandler: function (form) {
                      $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                      });
                      $.ajax({
                          url: "{{ url('admin_menu/news_master/proses') }}",
                          type: "POST",
                          data: $('#admin_menu_news_master').serialize(),
                          success: function (response) {
                              if (response.status == "true"){
                                  $("#btn-save").prop("disabled", false);
                                  $("#btn-save").html(
                                      'Save'
                                  );
                                  
                                  $('#notification_success').modal('show');
                                  $('#message-notification-success').html(response
                                  .message);
                                  setTimeout(function () {
                                  window.location =
                                      "{{ url('admin_menu/news_master') }}";
                                  }, 3000);
                              } else {
                              $("#btn-save").prop("disabled", false);
                              $("#btn-save").html(
                                  ' Save'
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
                              '{{ __("md_claim_transaction.btn_save") }}'
                          );

                          $('#notification').modal('show');
                          $('#message-notification').html(response);
                      }
                  });
              }
          })
      }

// Delete Button
      
    $("#btn-delete").on('click', function () {

            if ($("#admin_menu_news_master").length> 0) {
                $.ajax({
                    url: "{{ url('admin_menu/news_master/remove') }}",
                          type: "GET",
                          data: $('#admin_menu_news_master').serialize(),
                          success: function (response) {
                              if (response.status == "true"){
                                  $("#btn-Delete").prop("disabled", false);
                                  $("#btn-Delete").html(
                                      'Delete'
                                  );
                                  
                                  $('#notification_success').modal('show');
                                  $('#message-notification-success').html(response
                                  .message);
                                  setTimeout(function () {
                                  window.location =
                                      "{{ url('admin_menu/news_master') }}";
                                  }, 3000);
                              } else {
                              $("#btn-Delete").prop("disabled", false);
                              $("#btn-Delete").html(
                                  '<i class="fa fa-floppy-o"></i> Delete'
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
                          $("#btn-delete").prop("disabled", false);
                          $("#btn-delete").html(
                              '<i class="fa fa-floppy-o"></i> {{ __("md_claim_transaction.btn_save") }}'
                          );

                          $('#notification').modal('show');
                          $('#message-notification').html(response);
                      }
                });
            } 
        })
    
</script>
<script>
    loadDataNewsCategory();

    $.get("{{ url('news_category/api') }}", function (data) {
                $.each(data, function (k, v) {
                    $('#n_category').append("<option value=" + v.variable + ">" + v.value +
                        "</option>");
                });
            });

            function loadDataNewsCategory(){
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
                
                $('#n_category').select2({
                    width: '100%',
                    placeholder: 'Choose News Category',
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
                        url: "{{ url('/news_category/api') }}",
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