<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_source_document.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
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
            <a href="{{ url()->previous() }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('personel_source_document.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="source_document_form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="record_status">{{ __('personel_source_document.label_record_status') }}</label>
                            <input type="text" class="form-control" id="record_status" name="record_status"
                                placeholder="{{ __('personel_source_document.label_record_status') }}" readonly>
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="letter_type">{{ __('personel_source_document.label_letter_type') }}</label>
                            <input type="text" class="form-control" id="letter_type" name="letter_type"
                                placeholder="{{ __('personel_source_document.label_letter_type') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="letter_file">{{ __('personel_source_document.label_letter_file') }}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="letter_file" id="letter_file">
                                <label class="custom-file-label" for="letter_file">Choose file</label>
                            </div>
                            <small id="letter_file_help" class="text-muted">
                                {{ __('personel_source_document.help_letter_file') }}
                            </small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="language_id">{{ __('personel_source_document.label_language_id') }}</label>
                            <select class="form-control" id="language_id" name="language_id">
                                <option value="">{{ __('personel_source_document.label_select_language_id') }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-6">
                    <table id="detail_document_table" class="table hover">
                        <thead>
                            <tr>
                                <!-- <th></th> -->
                                <th>Detail Field</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-add-detail" id="btn-add-detail"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_add_detail_document">
                        <i class="fa fa-plus"></i> {{ __('personel_source_document.btn_add') }}
                    </button>
                </div>
                <!-- <div class="col-3">
					<button type="button" class="btn btn-danger" name="btn-remove-detail" id="btn-remove-detail" style="width: 100%;">
						<i class="fa fa-times"></i> {{ __('personel_source_document.btn_remove') }}
					</button>
				</div> -->
            </div>
            <div class="row">
                <div class="col-8">
                    <table id="signer_document_table" class="table hover">
                        <thead>
                            <tr>
                                <!-- <th></th> -->
                                <th>Seq No</th>
                                <th>Position Code</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-add-signer" id="btn-add-signer"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_add_signer_document">
                        <i class="fa fa-plus"></i> {{ __('personel_source_document.btn_add') }}
                    </button>
                </div>
                <!-- <div class="col-3">
					<button type="button" class="btn btn-danger" name="btn-remove-signer" id="btn-remove-signer" style="width: 100%;">
						<i class="fa fa-times"></i> {{ __('personel_source_document.btn_remove') }}
					</button>
				</div> -->
            </div>
            <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-save-letter" id="btn-save-letter"
                        style="width: 100%;">
                        <i class="fa fa-floppy-o"></i> {{ __('personel_source_document.btn_save') }}
                    </button>
                </div>
                <div class="col-3">
                    <a class="btn btn-outline-primary" href="{{ url('personnel/source_document') }}" target="iframe_dashboard"
                        name="btn-cancel-letter" id="btn-cancel-letter" style="width: 100%;">
                        <i class="fa fa-times-circle"></i> {{ __('personel_source_document.btn_cancel') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_detail_document" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_source_document.title_modal_detail_document') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="detail_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="detail_field">{{ __('personel_source_document.label_detail_field') }}</label>
                                    <select class="form-control select2" id="detail_field" name="detail_field"></select>
                                </div>
                                <input type="hidden" class="form-control" id="letter_type_detail"
                                    name="letter_type_detail">
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-detail-document" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i>
                        {{ __('personel_source_document.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_source_document.btn_cancel') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_signer_document" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_source_document.title_modal_signer_document') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="signer_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="seq_no">{{ __('personel_source_document.label_seq_no') }}</label>
                                    <input type="text" class="form-control" id="seq_no" name="seq_no"
                                        placeholder="{{ __('personel_source_document.label_seq_no') }}">
                                </div>
                                <input type="hidden" class="form-control" id="letter_type_signer"
                                    name="letter_type_signer">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="position_code">{{ __('personel_source_document.label_position_code') }}</label>
                                    <select class="form-control select2" id="position_code"
                                        name="position_code"></select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-signer" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i>
                        {{ __('personel_source_document.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_source_document.btn_cancel') }}</button>
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
                        <span class="title-text-notification">{{ __('personel_source_document.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="notification_success_detail">
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
                        <span class="title-text-notification">{{ __('personel_source_document.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success-detail"></span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    function savePreviousURL() {
        if(!sessionStorage.getItem('previousURLTwo')){
            const previousURL = document.referrer;
            sessionStorage.setItem('previousURLTwo', previousURL);
        }
    }

    // Fungsi untuk menangani navigasi mundur
    function goBackWithModuleID() {
        let newURL = sessionStorage.getItem('previousURLTwo');

        sessionStorage.removeItem('previousURLTwo');

        window.location.href = newURL;
    }

    window.onload = function() {
        savePreviousURL();
    }
    
    $(document).ready(function () {
        var func = "{{ $func }}";
        var table = null;

        $.get("{{ url('language/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#language_id').append("<option value=" + v.comGenCode + ">" + v
                    .value + "</option>");
            });
            if (func == 'edit') {
                $('#language_id').val("{{ isset($data[0]->languageID) ? $data[0]->languageID : '' }}");
            }
        });

        if (func == 'new') {
            $('#language_id').prop('disabled', false);
            $('#record_status').val("A");
            $('#record_function').val("New");
            $('#letter_type').val("");
            $('#letter_file').val("");
            $('#language_id').val("");
            $('#detail_document_table').DataTable().destroy();
            // load_table_detail_document();
            $('#signer_document_table').DataTable().destroy();
            // load_table_signer_document();
            $('#letter_type').prop('readonly', false);
        } else if (func == 'edit') {
            $('#language_id').prop('disabled', true);
            $('#record_function').val("Edit");
            $('#record_status').val("{{ isset($data[0]->recordStatus) ? $data[0]->recordStatus : '' }}");
            $('#letter_type').val("{{ isset($data[0]->letterType) ? $data[0]->letterType : '' }}");
            $('#language_id').val("{{ isset($data[0]->languageID) ? $data[0]->languageID : '' }}");
            $('#detail_document_table').DataTable().destroy();
            load_table_detail_document("{{ isset($data[0]->letterType) ? $data[0]->letterType : '' }}");
            $('#signer_document_table').DataTable().destroy();
            load_table_signer_document("{{ isset($data[0]->letterType) ? $data[0]->letterType : '' }}");
            $('#letter_type').prop('readonly', true);
        }

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        function load_table_detail_document(letterType = '') {
            table = $('#detail_document_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('personnel/source_document/detail/table') }}",
                    data: {
                        letterType: letterType
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [
                    [0, "asc"]
                ],
                columns: [
                    // {
                    //     orderable: false,
                    //     targets: 0, 
                    //     "defaultContent": '',
                    //     render: function(data, type) {
                    //         return type === 'display'? '<input class="chk-select" type="checkbox">' : '';
                    //     }
                    // },
                    {
                        data: 'detailField',
                        name: 'detailField'
                    }
                ],
                // select: {
                //     style:    'multi',
                //     selector: 'td:first-child'
                // }
            });
        }

        function load_table_signer_document(letterType = '') {
            table = $('#signer_document_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('personnel/source_document/signer/table') }}",
                    data: {
                        letterType: letterType
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [
                    [0, "asc"]
                ],
                columns: [
                    // {
                    //     orderable: false,
                    //     targets: 0, 
                    //     "defaultContent": '',
                    //     render: function(data, type) {
                    //         return type === 'display'? '<input class="chk-select" type="checkbox">' : '';
                    //     }
                    // },
                    {
                        data: 'signerSequence',
                        name: 'signerSequence'
                    },
                    {
                        data: 'signerPositionCode',
                        name: 'signerPositionCode'
                    }
                ],
                // select: {
                //     style:    'multi',
                //     selector: 'td:first-child'
                // }
            });
        }

        $('input[type="file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('personnel/source_document') }}";
        })

        $('#notification_success_detail').on('hide.bs.modal', function () {
            var oTable = $('#detail_document_table').dataTable();
            oTable.fnDraw(false);
            var oTable2 = $('#signer_document_table').dataTable();
            oTable2.fnDraw(false);
        });

        $('#letter_type').on('input', function (e) {
            var value = $(this).val();

            $('#letter_type_detail').val(value);
            $('#letter_type_signer').val(value);
        });

        $("#btn-add-detail").on('click', function () {
            var value = $('#letter_type').val();

            $('#letter_type_detail').val(value);
            loadDataDetailField();
        });

        $("#btn-add-signer").on('click', function () {
            var value = $('#letter_type').val();

            $('#letter_type_signer').val(value);
            loadDataPositionCode();
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function loadDataDetailField() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-12">' + data.data.fieldName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#detail_field').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-12"><b>Field</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#detail_field').select2({
                width: '100%',
                placeholder: 'Choose Field',
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
                    url: "{{ url('/detail_field/api') }}",
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
                                    text: item.fieldName,
                                    id: item.fieldName,
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

        function loadDataPositionCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.positionCode + '</div>' +
                        '<div class="col-6">' + data.data.positionName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#position_code').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Position Code</b></div>' +
                        '<div class="col-6"><b>Position Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#position_code').select2({
                width: '100%',
                placeholder: 'Choose Position',
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
                    url: "{{ url('/position/api') }}",
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
                                    text: item.positionCode,
                                    id: item.positionCode,
                                    title: item.positionName,
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

        $("#btn-save-letter").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#source_document_form").submit();
        });

        $("#btn-save-detail-document").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#detail_form").submit();
        });

        $("#btn-save-signer").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#signer_form").submit();
        });

        if ($("#source_document_form").length > 0) {
            $("#source_document_form").validate({
                rules: {
                    letter_type: {
                        required: true,
                    },
                    letter_file: {
                        extension: "doc|docx",
                    },
                },
                messages: {
                    letter_type: {
                        required: "{{ __('personel_source_document.letter_type_required') }}",
                    },
                    letter_file: {
                        extension: "{{ __('personel_source_document.letter_file_extension') }}",
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
                    $("#btn-save-letter").prop("disabled", false);
                    $("#btn-save-letter").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_source_document.btn_save") }}'
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

                    $('#language_id').prop('disabled', false);

                    var myform = document.getElementById("source_document_form");
                    var formdata = new FormData(myform);
                    // var form_data = new FormData($('#source_document_form')[0]);
                    // var formData = new FormData(this);
                    // for (var key of formdata.entries()) {
                    // 	console.log(key[0] + ', ' + key[1])
                    // }

                    $.ajax({
                        url: "{{ url('personnel/source_document/proses') }}",
                        type: "POST",
                        processData: false,
                        contentType: false,
                        data: formdata,
                        // data: $('#source_document_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-letter").prop("disabled", false);
                                $("#btn-save-letter").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_source_document.btn_save") }}'
                                );
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('personnel/source_document') }}";
                                }, 3000);
                            } else {
                                $("#btn-save-letter").prop("disabled", false);
                                $("#btn-save-letter").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_source_document.btn_save") }}'
                                );
                                $('#language_id').prop('disabled', true);
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
                            $("#btn-save-letter").prop("disabled", false);
                            $("#btn-save-letter").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_source_document.btn_save") }}'
                            );
                            $('#language_id').prop('disabled', true);
                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            })
        }

        if ($("#detail_form").length > 0) {
            $("#detail_form").validate({
                rules: {
                    detail_field: {
                        required: true,
                    },
                },
                messages: {
                    detail_field: {
                        required: "{{ __('personel_source_document.detail_field_required') }}",
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
                    $("#btn-save-detail-document").prop("disabled", false);
                    $("#btn-save-detail-document").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_source_document.btn_save") }}'
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

                    var letter_type = $('#letter_type').val();

                    if (letter_type === "") {
                        $("#btn-save-detail-document").prop("disabled",
                            false);
                        $("#btn-save-detail-document").html(
                            '<i class="fa fa-floppy-o"></i> {{ __("personel_source_document.btn_save") }}'
                        );
                        
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html("Letter Type Must Be Filled");
                    } else {
                        $.ajax({
                            url: "{{ url('personnel/source_document/detail/proses') }}",
                            type: "POST",
                            data: $('#detail_form').serialize(),
                            success: function (response) {
                                if (response.status == "true") {
                                    $("#btn-save-detail-document").prop("disabled",
                                        false);
                                    $("#btn-save-detail-document").html(
                                        '<i class="fa fa-floppy-o"></i> {{ __("personel_source_document.btn_save") }}'
                                    );

                                    $('#modal_add_detail_document').modal('hide');
                                    $('#notification_success_detail').modal('show');
                                    $('#message-notification-success-detail').html(
                                        response.message);
                                    $('#detail_document_table').DataTable().destroy();
                                    load_table_detail_document(letter_type);
                                    setTimeout(function () {
                                        $('#notification_success_detail').modal(
                                            'hide');
                                    }, 3000);
                                } else {
                                    $("#btn-save-detail-document").prop("disabled",
                                        false);
                                    $("#btn-save-detail-document").html(
                                        '<i class="fa fa-floppy-o"></i> {{ __("personel_source_document.btn_save") }}'
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
                                $("#btn-save-detail-document").prop("disabled", false);
                                $("#btn-save-detail-document").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_source_document.btn_save") }}'
                                );
                                $('#notification_error').modal('show');
                                $('#message-notification-error').html(response);
                            }
                        });
                    }
                }
            })
        }

        if ($("#signer_form").length > 0) {
            $("#signer_form").validate({
                rules: {
                    seq_no: {
                        required: true,
                    },
                    position_code: {
                        required: true,
                    },
                },
                messages: {
                    seq_no: {
                        required: "{{ __('personel_source_document.seq_no_required') }}",
                    },
                    position_code: {
                        required: "{{ __('personel_source_document.position_code_required') }}",
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
                    $("#btn-save-signer").prop("disabled", false);
                    $("#btn-save-signer").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_source_document.btn_save") }}'
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

                    var letter_type = $('#letter_type').val();

                    if (letter_type === "") {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html("Letter Type Must Be Filled");
                    } else {
                        $.ajax({
                            url: "{{ url('personnel/source_document/signer/proses') }}",
                            type: "POST",
                            data: $('#signer_form').serialize(),
                            success: function (response) {
                                if (response.status == "true") {
                                    $("#btn-save-signer").prop("disabled", false);
                                    $("#btn-save-signer").html(
                                        '<i class="fa fa-floppy-o"></i> {{ __("personel_source_document.btn_save") }}'
                                    );

                                    $('#notification_success_detail').modal('show');
                                    $('#message-notification-success-detail').html(
                                        response.message);
                                    $('#signer_document_table').DataTable().destroy();
                                    load_table_signer_document(letter_type);
                                    setTimeout(function () {
                                        $('#notification_success_detail').modal(
                                            'hide');
                                        $('#modal_add_signer_document').modal(
                                            'hide');
                                    }, 3000);
                                } else {
                                    $("#btn-save-signer").prop("disabled", false);
                                    $("#btn-save-signer").html(
                                        '<i class="fa fa-floppy-o"></i> {{ __("personel_source_document.btn_save") }}'
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
                                $("#btn-save-signer").prop("disabled", false);
                                $("#btn-save-signer").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_source_document.btn_save") }}'
                                );

                                $('#notification_error').modal('show');
                                $('#message-notification-error').html(response);
                            }
                        });
                    }
                }
            })
        }
    });

</script>

</html>
