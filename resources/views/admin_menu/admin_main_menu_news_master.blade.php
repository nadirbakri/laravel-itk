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
            -moz-bord er-radius-topleft: 5px;
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
       .newscategory select{
            width: 100px;
       }
    </style>
</head>

<body>
    <div class="div-form">
        <div class="div-title">
            <a href="{{ route('utilities', ['moduleID' => 'UTI']) }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('admin_main_menu_news_master.judul') }}</span>
            </a>
        </div>
        <form id="admin_menu_news_master" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card" >
                <div class="card-header">
                    <h5>{{ __('admin_main_menu_news_master.formjudul') }}</h5>
                </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="t_news form-check-label"><b>{{ __('admin_main_menu_news_master.form1') }}</b></label>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <input type="text" class="form-control" id="t_news" name="t_news">
                            <input type="hidden" value="new" class="form-control" id="t_news2" name="t_news2">
                            <input type="hidden" class="form-control" id="sysno" name="sysno">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="n_category form-check-label"><b>{{ __('admin_main_menu_news_master.form2') }}</b></label>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <select class="form-control select2" id="n_category" name="n_category"></select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="reimbursement_type form-check-label"><b>{{ __('admin_main_menu_news_master.form3') }}</b></label>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <textarea type="text" class="form-control" id="c_news" name="c_news"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="file_attachment form-check-label"><b>File Attachment</b></label>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file_attachment" name="file_attachment">
                                <label class="custom-file-label file-label" for="file_attachment">Select File Attachment</label>
                            </div>
                            <div id="div-file"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="image_attachment form-check-label"><b>Image Attachment</b></label>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image_attachment" name="image_attachment">
                                <label class="custom-file-label image-label" for="image_attachment">Select Image Attachment</label>
                            </div>
                            <div id="div-image"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save" style="width: 100%">{{ __('admin_main_menu_news_master.save') }}</button>  
                    </div>
                    <!-- <div class="col-2">
                        <button class="btn btn-primary" type="submit" name="btn-delete" id="btn-delete" style="width: 100%">{{ __('admin_main_menu_news_master.delete') }}</button>  
                    </div> -->
                    <div class="col-3">
                        <button class="btn btn-outline-primary" onClick="window.location.reload();" value="preview" style="width: 100%">{{ __('admin_main_menu_news_master.cancel') }}</button> 
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-list" id="btn-list" data-toggle="modal" data-target="#modal_list_news" style="width: 100%">{{ __('admin_main_menu_news_master.list') }}</button>  
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
                        <h4 class="modal-little">List News</h4>
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
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
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
    
    $('input[name="file_attachment"]').change(function (e) {
        var fileName = e.target.files[0].name;
        $('.file-label').html(fileName);
    });

    $('input[name="image_attachment"]').change(function (e) {
        var fileName = e.target.files[0].name;
        $('.image-label').html(fileName);
    });

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
        let title = $(element).parent().siblings('.sorting_1').text();
        let newscategory = $(element).parent().siblings('td').eq(1).text();
        let desc = $(element).parent().siblings('td').eq(2).text();
        // console.log(table2.row($(element).parent()).data());

        // alert(newscategory)
        $('#t_news').val(title);
        $('#t_news2').val("update");
        $('#c_news').val(table2.row($(element).parent()).data().content);
        $('#sysno').val(table2.row($(element).parent()).data().sysNo);
        $.ajax({
            type: 'GET',
            url: "{{ url('/news_category/detail/api') }}",
            data: {
                'categoryName' : newscategory
            }
        }).then(function (data2) {
            var $newOption = $("<option selected='selected'></option>").val(data2[0]
                .categoryName).text(data2[0].categoryName);
            $("#n_category").append($newOption).trigger('change');
        });
        // $('#n_category').append($('<option>', {
        //     value: newscategory,
        //     text: newscategory
        // }));
        // console.log(table2.row($(element).parent()).data().photo);
        $('#div-file').html('<a target="_self" href="data:application/pdf;base64, ' + table2.row($(element).parent()).data().pdfFile + '">Download PDF</a>');
        $('#div-image').html('<img src="data:image/png;base64, ' + table2.row($(element).parent()).data().photo + '" style="width: 170px; height: 50px;" alt="">');
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

                      var myForm = document.getElementById('admin_menu_news_master');
                      var formdata = new FormData(myForm);

                      $.ajax({
                          url: "{{ url('admin_menu/news_master/proses') }}",
                          type: "POST",
                          processData: false,
                          contentType: false,
                          data: formdata,
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
                    $('#n_category').append("<option value=" + v.categoryName + ">" + v.categoryName +
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
                            '<div class="col-6">' + data.data.categoryName + '<div>' +
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
                                        text: item.categoryName,
                                        id: item.categoryName,
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