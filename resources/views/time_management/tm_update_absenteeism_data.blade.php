<!DOCTYPE html>
<html>

<head>
    <title>{{ __('tm_update_absenteeism_data.judul') }}</title>
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
    <link rel="stylesheet" href="{{ asset('css/time_management_detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-time_management {
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

        br {
            line-height: 300%;
        }
    </style>
</head>

<body>
    <div class="div-time_management">
        <div class="div-title">
            <a href="{{ url('time_management') }}" target="iframe_dashboard" id="toolbar-prev-page">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('tm_update_absenteeism_data.list') }}</span>
            </a> 
        </div>
        <div class="div-form">
            <form id="tm_update_absenteeism_data" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="process_date">{{ __('tm_update_absenteeism_data.label_file_location') }}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file_location" name="file_location">
                                <label class="custom-file-label" for="file_location">{{ __('tm_update_absenteeism_data.label_select_file_location') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-process" name="btn-process-delete" id="btn-process">
                            <i class="fa fa-play-circle-o">{{ __('tm_update_absenteeism_data.btn_process') }}</i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <p>{{ __('tm_update_absenteeism_data.label_notes') }}</p>
                        <p>{{ __('tm_update_absenteeism_data.label_column_a') }}</p>
                        <p>{{ __('tm_update_absenteeism_data.label_column_b') }}</p>
                        <p>{{ __('tm_update_absenteeism_data.label_column_c') }}</p>
                        <p>{{ __('tm_update_absenteeism_data.label_column_d') }}</p>
                        <p>{{ __('tm_update_absenteeism_data.label_column_e') }}</p>
                    </div>
                    <div class="col-3">
                        <br/>
                        <p>{{ __('tm_update_absenteeism_data.label_column_f') }}</p>
                        <p>{{ __('tm_update_absenteeism_data.label_column_g') }}</p>
                        <p>{{ __('tm_update_absenteeism_data.label_column_h') }}</p>
                        <p>{{ __('tm_update_absenteeism_data.label_column_i') }}</p>
                        <p>{{ __('tm_update_absenteeism_data.label_column_j') }}</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

</html>