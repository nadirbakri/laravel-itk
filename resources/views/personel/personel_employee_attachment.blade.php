<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel_employee_attachment.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
	<style type="text/css">
		.div-personel {
			max-width: 100%;
			margin: auto;
			/* margin-top: 1%; */
		}
        .modal-header-notification-error {
            border-bottom:1px solid #eee;
            background-color: #f44336;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .modal-header-notification-success {
            border-bottom:1px solid #eee;
            background-color: #00a862;
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
	</style>
</head>

<body>
	<div class="div-personel">
		<div class="div-title">
			<a href="{{ url('/personnel') }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('personel_employee_attachment.list') }}</span>
			</a>
		</div>

		<div class="div-form">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label
                            for="employee_no">{{ __('personel_employee_attachment.label_employee_no') }}</label>
                        <select class="form-control select2" id="employee_no" name="employee_no"></select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="employee_name">{{ __('personel_employee_attachment.label_employee_name') }}</label>
                        <input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="{{ __('personel_employee_attachment.label_employee_name') }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table id="employee_attachment_table" class="table hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>File Name</th>
                                <th>Attachment Code</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-add"
                        id="btn-add" style="width: 100%;">
                        <i class="fa fa-plus"></i> {{ __('personel_employee_attachment.btn_add') }}
                    </button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-view"
                        id="btn-view" style="width: 100%;">
                        <i class="fa fa-eye"></i> {{ __('personel_employee_attachment.btn_view') }}
                    </button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-danger" name="btn-remove"
                        id="btn-remove" style="width: 100%;">
                        <i class="fa fa-times"></i> {{ __('personel_employee_attachment.btn_remove') }}
                    </button>
                </div>
            </div>
		</div>
	</div>
    <div class="modal fade" id="modal_add_attachment" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_employee_attachment.title_modal') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="employee_attachment_form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="seq_no">{{ __('personel_employee_attachment.label_seq_no') }}</label>
                                    <input type="text" class="form-control" id="seq_no"
                                        name="seq_no"
                                        placeholder="{{ __('personel_employee_attachment.label_seq_no') }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="file_name">{{ __('personel_employee_attachment.label_file_name') }}</label>
                                    <input type="text" class="form-control" id="file_name" name="file_name" placeholder="{{ __('personel_employee_attachment.label_file_name') }}">
                                </div>
                                <input type="hidden" class="form-control" id="employee_no_detail" name="employee_no_detail">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label
                                        for="attachment_code">{{ __('personel_employee_attachment.label_attachment_code') }}</label>
                                    <select class="form-control select2" id="attachment_code" name="attachment_code"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="attachment_file">{{ __('personel_employee_attachment.label_attachment_file') }}</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="attachment_file" id="attachment_file">
                                        <label class="custom-file-label" for="attachment_file">Choose file</label>
                                    </div>
                                    <small id="attachment_file_help" class="text-muted">
                                        {{ __('personel_employee_attachment.help_attachment_file') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i>
                        {{ __('personel_employee_attachment.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_employee_attachment.btn_cancel') }}</button>
                </div>
                </form>
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
                        <span class="title-text-notification">{{ __('personel_employee_attachment.alert_success') }}</span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    var table = null;
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

  	$('#employee_attachment_table thead tr').clone(true).appendTo('#employee_attachment_table thead');
    $('#employee_attachment_table thead tr:eq(1) th:not(:first-child)').each( function (i) {
        var title = $(this).text();
        $(this).html('<input class="form-control" type="text" placeholder="'+title+'" />');
 
        $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
                table
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        } );
    });

    function htmlDecode(value) {
        return $("<textarea/>").html(value).text();
    }

    $('input[type="file"]').change(function (e) {
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });

    loadDataEmployeeNo();
    loadDataAttachmentCode();

    $('#employee_no').on("select2:select", function (e) {
        var data = $('#employee_no').select2('data');
        $('#employee_name').val(htmlDecode(data[0].title));
        $('#employee_no_detail').val(htmlDecode(data[0].id));

        $('#employee_attachment_table').DataTable().destroy();
        load_table_employee_attachment(data[0].id);
    });

    $('#employee_no').on("select2:unselecting", function (e) {
        $('#employee_name').val('');
        $('#employee_no_detail').val('')
    });

    $("#btn-add").on('click', function () {
        var empNo = $('#employee_no').val();
        console.log(empNo);
        if(empNo == '' || empNo == null){
            $('#notification_error').modal('show');
            $('#message-notification-error').html('Please Choose Employee No First');
        }else{
            $('#modal_add_attachment').modal('show');
        }
    });

    $('#modal_add_attachment').on('show.bs.modal', function () {
        var empNo = $('#employee_no').val();
        $.ajax({
            url: "{{ url('personel/number/check') }}",
            type: "GET",
            data: {
                'url': '/peattachment/getpeattachment',
                'employeeNo': empNo
            },
            success: function (response) {
                $('#seq_no').val(response);
            },
            error: function (response) {
                $('#notification_error').modal('show');
                $('#message-notification-error').html(response);
            }
        });
    });

    $("#btn-remove").on('click', function () {
        var data = table.rows('.selected').data().toArray();
        if (data.length > 0) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                url: "{{ url('personel/employee_attachment/remove') }}",
                type: "POST",
                data: {
                    'data': data,
                },
                success: function (response) {
                    if (response.status == "true") {
                        $('#notification_success').modal('show');
                        $('#message-notification-success').html(response
                            .message);
                        $('#employee_attachment_table').DataTable().destroy();
                        load_table_employee_attachment(data[0].employeeNo);
                        setTimeout(function () {
                            $('#notification_success').modal('hide');
                        }, 3000);
                    } else {
                        $('#notification_error').modal('show');
                        if (response.message == null || response.message == '') {
                            $('#message-notification-error').html(
                                "{{ __('login.error') }}");
                        } else {
                            $('#message-notification-error').html(response.message);
                        }
                    }
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        } else {
            $('#notification_error').modal('show');
            $('#message-notification-error').html('No Data Selected');
        }
    });

    $("#btn-view").on('click', function () {
        var data = table.rows('.selected').data().toArray();
        if (data.length > 0) {
            console.log(data);
            $.ajax({
                url: "{{ url('personel/employee_attachment/view') }}",
                type: "GET",
                data: {
                    'attachmentCode': data[0].attachmentCode,
                    'employeeNo' : data[0].employeeNo,
                    'fileName' : data[0].fileName
                },
                success: function (response) {
                    if (response.filename != null) {
                        window.open('../attachment/' + response.filename, '_blank').focus();
                    } else {
                        $('#notification_error').modal('show');
                        if (response.message == null || response.message == '') {
                            $('#message-notification-error').html(
                                "{{ __('login.error') }}");
                        } else {
                            $('#message-notification-error').html(response.message);
                        }
                    }
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        } else {
            $('#notification_error').modal('show');
            $('#message-notification-error').html('No Data Selected');
        }
    });

    function load_table_employee_attachment(employeeNo = ''){
        table = $('#employee_attachment_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: {
                url: "{{ url('personel/employee_attachment/table') }}",
                data: {
                    'employeeNo': employeeNo
                }
            },
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'ellipses',
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
                {data: 'fileName', name: 'fileName'},
                {data: 'attachmentCode', name: 'attachmentCode'},
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }
        });
    }

    $('#employee_attachment_table').on('click', 'tbody input[type="checkbox"]', function(e){
        var $row = $(this).closest('tr');

        if(this.checked){
            $row.addClass('selected');
        } else {
            $row.removeClass('selected');
        }

        // Prevent click event from propagating to parent
        e.stopPropagation();
    });

    $('#employee_attachment_table').on('click', 'tr td:first-child', function(e){
        $(this).parent().find('input[type="checkbox"]').trigger('click');
    });

    function loadDataEmployeeNo() {
        function formatSelect(data) {
            if (data.loading) {
                return $search
            }

            if (data.id) {
                var $result2 = $('<div class="row">' +
                    '<div class="col-6">' + data.data.employeeNo + '</div>' +
                    '<div class="col-6">' + data.data.fullName + '</div>' +
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
                $('.select2-search').append(html);
                headerIsAppend = true;
            }
        });

        var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

        $('#employee_no').select2({
            width: '100%',
            placeholder: 'Choose Employee',
            allowClear: true,
            language: {
                errorLoading: function() {
                    return $search;
                },
                searching: function() {
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
                                title: item.fullName,
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

    function loadDataAttachmentCode() {
        function formatSelect(data) {
            if (data.loading) {
                return $search
            }

            if (data.id) {
                var $result2 = $('<div class="row">' +
                    '<div class="col-12">' + data.data.value + '</div>' +
                    '</div>');

                return $result2;
            }
        }

        // var headerIsAppend = false;
        // $('#employee_no').on('select2:open', function (e) {
        //     if (!headerIsAppend) {
        //         html = '<div class="row">' +
        //             '<div class="col-6"><b>Employee No</b></div>' +
        //             '<div class="col-6"><b>Employee Name</b></div>' +
        //             '</div>';
        //         $('.select2-search').append(html);
        //         headerIsAppend = true;
        //     }
        // });

        var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

        $('#attachment_code').select2({
            width: '100%',
            placeholder: 'Choose Attachment Code',
            allowClear: true,
            language: {
                errorLoading: function() {
                    return $search;
                },
                searching: function() {
                    return $search;
                }
            },
            ajax: {
                url: "{{ url('/attachment_code/api') }}",
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
                                text: item.value,
                                id: item.comGenCode,
                                title: item.value,
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

    if ($("#employee_attachment_form").length > 0) {
        $("#employee_attachment_form").validate({
            rules: {
                file_name: {
                    required: true,
                },
                attachment_code: {
                    required: true,
                },
                attachment_file: {
                    required: true,
                    extension: "jpg|jpeg|pdf|xlsx|docx",
                },
            },
            messages: {
                file_name: {
                    required: "{{ __('personel_employee_attachment.file_name_required') }}",
                },
                attachment_code: {
                    required: "{{ __('personel_employee_attachment.attachment_code_required') }}",
                },
                attachment_file: {
                    required: "{{ __('personel_employee_attachment.attachment_file_required') }}",
                    extension: "{{ __('personel_employee_attachment.attachment_file_extension') }}",
                },
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                $("#btn-save").prop("disabled", false);
                $("#btn-save").html(
                    '<i class="fa fa-floppy-o"></i> {{ __("personel_employee_attachment.btn_save") }}'
                );

                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var myform = document.getElementById("employee_attachment_form");
                var formdata = new FormData(myform);

                $.ajax({
                    url: "{{ url('personel/employee_attachment/proses') }}",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formdata,
                    success: function (response) {
                        if (response.status == "true") {
                            $("#btn-save").prop("disabled",
                                false);
                            $("#btn-save").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_employee_attachment.btn_save") }}'
                            );
                            $('#modal_add_attachment').modal('hide');
                            $('#employee_no').val(null).trigger('change');
                            $('#employee_attachment_table').DataTable()
                                .destroy();
                            load_table_employee_attachment(response.employeeNo);
                            $('#notification_success').modal('show');
                            $('#message-notification-success').html(response
                                .message);
                            setTimeout(function () {
                                $('#notification_success').modal('hide');
                            }, 3000);
                        } else {
                            $("#btn-save").prop("disabled",
                                false);
                            $("#btn-save").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_employee_attachment.btn_save") }}'
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
                            '<i class="fa fa-floppy-o"></i> {{ __("personel_employee_attachment.btn_save") }}'
                        );
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }

                });
            }
        })
    }
  });
</script>

</html>