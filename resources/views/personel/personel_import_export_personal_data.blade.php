<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_import_export_personal_data.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-personel {
            max-width: 100%;
            margin: auto;
            /*margin-top: 1%;*/
        }

        .loading {
            background-color: #ffffff;
            background-image: url("https://c.tenor.com/tEBoZu1ISJ8AAAAC/spinning-loading.gif");
            background-size: 60px 40px;
            background-position: right center;
            background-repeat: no-repeat;
        }

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

        .select2-results__option[aria-selected=true] {
            display: none;
        }
    </style>
</head>

<body>
    <div class="div-personel">
        <div class="div-title">
            <a href="{{ url('personel') }}" target="iframe_dashboard" id="toolbar-prev-page">
                <img src="{{ url('pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('personel_import_export_personal_data.list') }}</span>
            </a>
        </div>
    </div>
    <div class="div-form">
        <form id="import_export_personal_data_form" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="import_export">{{ __('personel_import_export_personal_data.label_import_export') }}</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="import_export" id="import_export">
                            <label class="custom-file-label" for="import_export">Choose file</label>
                        </div>
                        <small id="import_export_help" class="text-muted">
                            {{ __('personel_import_export_personal_data.help_import_export') }}
                        </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-import" id="btn-import"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_import_document">
                        {{ __('personel_import_export_personal_data.btn-import') }}
                    </button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-export" id="btn-export"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_export_document">
                        {{ __('personel_import_export_personal_data.btn-export') }}
                    </button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-download-template" id="btn-download-template"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_download_template_document">
                        {{ __('personel_import_export_personal_data.btn-download-template') }}
                    </button>
                </div>
            </div>
        </form>
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
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
    })
</script>