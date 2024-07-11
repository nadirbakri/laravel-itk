<!DOCTYPE html>
<html>
<head>
    <title>{{ __('admin_main_announcement.head') }}</title>
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
                <span class="title-text">{{ __('admin_main_announcement.judul') }}</span>
            </a>
        </div>
        <form id="admin_menu_announcement" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card" >
                <div class="card-header">
                    <h5>{{ __('admin_main_announcement.formjudul') }}</h5>
                </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="t_announcement form-check-label"><b>{{ __('admin_main_announcement.form1') }}</b></label>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <input type="text" class="form-control" id="t_announcement" name="t_announcement">
                            <input type="hidden" value="new" class="form-control" id="status" name="status">
                            <input type="hidden" class="form-control" id="seq_no" name="seq_no">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="n_announcement form-check-label"><b>{{ __('admin_main_announcement.form2') }}</b></label>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <select class="form-control select2" id="n_announcement" name="n_announcement"></select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="c_announcement form-check-label"><b>{{ __('admin_main_announcement.form3') }}</b></label>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <textarea type="text" class="form-control" id="c_announcement" name="c_announcement"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label mr-3" for="pinned_announcement">{{ __('admin_main_announcement.pinned') }}</label>
                            <input class="form-check-input" type="checkbox" id="pinned_announcement" name="pinned_announcement" value="true">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save" style="width: 100%">{{ __('admin_main_announcement.save') }}</button>  
                    </div>
                    <!-- <div class="col-2">
                        <button class="btn btn-primary" type="submit" name="btn-delete" id="btn-delete" style="width: 100%">{{ __('admin_main_menu_news_master.delete') }}</button>  
                    </div> -->
                    <div class="col-3">
                        <button class="btn btn-outline-primary" onClick="window.location.reload();" value="preview" style="width: 100%">{{ __('admin_main_announcement.cancel') }}</button> 
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-list" id="btn-list" data-toggle="modal" data-target="#modal_list_news" style="width: 100%">{{ __('admin_main_announcement.list') }}</button>  
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
                        <h4 class="modal-little">List Announcement</h4>
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
                                    <th>Category</th>
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
    
    $('#btn-list').click(()=> {
        $('#example').DataTable().destroy();
        table2 = $('#example').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: {
                url : "{{ url('adm_main_menu/announcement/list') }}"             
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
                        return '<button type="button"  onclick="klik(this)" class="btn btn-primary" id="btnaja" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg></button>';
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
            ]
            
        });        
    })

    const klik = (element) => {
        let title = $(element).parent().siblings('.sorting_1').text();
        let announcementcategory = $(element).parent().siblings('td').eq(1).text();
        let desc = $(element).parent().siblings('td').eq(2).text();
        // console.log(table2.row($(element).parent()).data());

        // alert(newscategory)
        $('#t_announcement').val(title);
        $('#status').val("update");
        $('#c_announcement').val(table2.row($(element).parent()).data().content);
        $('#seq_no').val(table2.row($(element).parent()).data().seqNo);
        $.ajax({
            type: 'GET',
            url: "{{ url('/announcement_category/detail/api') }}",
            data: {
                'categoryCode' : announcementcategory
            }
        }).then(function (data2) {
            console.log(data2);
            var $newOption = $("<option selected='selected'></option>").val(data2[0]
                .categoryCode).text(data2[0].categoryName);
            $("#n_announcement").append($newOption).trigger('change');
        });
        $('.close').click();
    }

    $(document).ready(function () {
        // $('table.display').DataTable();
        loadDataAnnouncementCategory()

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#admin_menu_announcement").submit();
        });

        if ($("#admin_menu_announcement").length > 0) {
            $("#admin_menu_announcement").validate({
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var myForm = document.getElementById('admin_menu_announcement');
                    var formdata = new FormData(myForm);

                    $.ajax({
                        url: "{{ url('admin_menu/announcement/proses') }}",
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
                                    "{{ url('utilities/announcement') }}";
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

        $.get("{{ url('announcement_category/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#n_announcement').append("<option value=" + v.categoryCode + ">" + v.categoryName +
                    "</option>");
            });
        });

        function loadDataAnnouncementCategory(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.categoryName + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
            
            var $announcementCat = $('#n_announcement').select2({
                width: '100%',
                placeholder: 'Choose Category',
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
                    url: "{{ url('/announcement_category/api') }}",
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
                                    id: item.categoryCode,
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
</script>
</html>