<!DOCTYPE html>
<html>

<head>
    <title>{{ __('payroll_slip_format.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-payroll_slip_format {
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
    <div class="div-payroll_slip_format">
        <div class="div-title">
            <a href="{{ url('payroll') }}" target="iframe_dashboard" id="toolbar-prev-page">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('payroll_slip_format.list') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="slip_format_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label
                                for="slip_type">{{ __('payroll_slip_format.label_slip_type') }}</label>
                                <select class="form-control select2" id="slip_type" name="slip_type">
                                <option value="" disabled selected>{{ __('payroll_slip_format.label_select_slip_type') }}</option>
                                <option value="Salary">Salary<option>
                                <option value="THR">THR</option>
                                <option value="Bonus">Bonus</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label
                                for="format">{{ __('payroll_slip_format.label_format') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="up_down"
                                    name="format" value="up_down">
                                <label class="form-radio-label"
                                    for="format">{{ __('payroll_slip_format.label_up_down') }}</label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="left_right"
                                    name="format" value="left_right">
                                <label class="form-radio-label"
                                    for="format">{{ __('payroll_slip_format.label_left_right') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="font_size">{{ __('payroll_report_format.label_font_size') }}</label>
                            <input type="number" min="0" class="form-control" id="font_size" name="font_size"
                                placeholder="{{ __('payroll_report_format.label_font_size') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label
                                for="number_format">{{ __('payroll_slip_format.label_number_format') }}</label>
                                <select class="form-control select2" id="number_format" name="number_format">
                                <option value="" disabled selected>{{ __('payroll_slip_format.label_select_number_format') }}</option>
                                <option value="#,##0.00">#,##0.00<option>
                                <option value="#,##0">#,##0</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="employee_no">{{ __('payroll_slip_format.label_employee_no') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <input id="employee_no" name="employee_no">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="join_date">{{ __('payroll_slip_format.label_join_date') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="employee_no" name="employee_no"
                                    placeholder="{{ __('payroll_slip_format.label_employee_no') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="custom1">{{ __('payroll_slip_format.label_custom1') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="employee_no" name="employee_no"
                                    placeholder="{{ __('payroll_slip_format.label_employee_no') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="employee_name">{{ __('payroll_slip_format.label_employee_name') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="employee_no" name="employee_no"
                                    placeholder="{{ __('payroll_slip_format.label_employee_no') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="position">{{ __('payroll_slip_format.label_position') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="employee_no" name="employee_no"
                                    placeholder="{{ __('payroll_slip_format.label_employee_no') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="custom2">{{ __('payroll_slip_format.label_custom2') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="employee_no" name="employee_no"
                                    placeholder="{{ __('payroll_slip_format.label_employee_no') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(function () {
            initDatePicker();
        });

        function initDatePicker() {
            $('.input-group input').flatpickr({
                altInput: true,
                allowInput: true,
                altFormat: "j-M-y",
                dateFormat: "Y-m-d",
                defaultDate: "today",
                // plugins: [
                //     new monthSelectPlugin({
                //         shorthand: true, //defaults to false
                //         dateFormat: "Y-m-01", //defaults to "F Y"
                //         altFormat: "F Y", //defaults to "F Y"
                //     })
                // ],
                onReady: function () {
                    var flatPickrInstance = this;
                    var $flatPickrInput = $(flatPickrInstance.element);
                    $flatPickrInput.siblings(".input-group-prepend").click(function () {
                        flatPickrInstance.toggle();
                    });
                }
            });
        }
    });

</script>

<script type="text/javascript">
    $(document).ready(function () {
        var table = null;

        $.ajax({
            url: "{{ url('personel/report/level/check') }}",
            type: "GET",
            success: function (response) {
                $('#level_format').val(response.data[0].levelFormat);
                for (var i = 1; i <= response.data[0].levelFormat; i++) {
                    $('#div-level').append(
                        '<div class="col-6">' +
                        '<div class="form-group">' +
                        '<label for="level' + i + '">' + response.data_level[i - 1]
                        .levelDescription + '</label>' +
                        '<select class="form-control select2" id="level' + i + '" name="level' +
                        i + '[]" multiple="multiple"></select>' +
                        '</div></div>'
                    );

                    loadDataLevelCode('#level' + i, i);
                    loadDataFirstLastAllLevel('#level' + i, i);
                }
            },
            error: function (response) {
                $('#notification_error').modal('show');
                $('#message-notification-error').html(response);
            }
        });
        loadDataEmployeeNo('#employee_no_from');
        loadDataEmployeeNo('#employee_no_to');
        loadDataGroupAuthorize('#group_authorize_from');
        loadDataGroupAuthorize('#group_authorize_to');
        loadDataPositionCode();
        loadDataLocationCode();
        loadDataRankingCode();

        loadDataFirstLastAllEmployeeNo('#employee_no_from', 'First');
        loadDataFirstLastAllEmployeeNo('#employee_no_to', 'Last');
        loadDataFirstLastAllGroupAuthorize('#group_authorize_from', 'First');
        loadDataFirstLastAllGroupAuthorize('#group_authorize_to', 'Last');
        loadDataFirstLastAllPosition();
        loadDataFirstLastAllLocation();
        loadDataFirstLastAllRanking();

        load_data_absent_code();

        // $('select').on('select2:opening select2:closing', function( event ) {
        //     var $searchfield = $( '#'+event.target.id ).parent().find('.select2-search__field');
        //     $searchfield.prop('disabled', true);
        // });

        // $('#employee_no_from').on('select2:open', function (e) {
        //     html = '<div class="row header-select">' +
        //     '<div class="col-6"><b>Employee No</b></div>' +
        //     '<div class="col-6"><b>Employee Name</b></div>' +
        //     '</div>';
        //     $('.select2-search').append(html);
        // });

        // loadDataFirstLastAllLocation();

        // loadDataFirstLastAllLocation();

        $('#detail_absenteeism_report_table thead tr').clone(true).appendTo('#detail_absenteeism_report_table thead');
        $('#detail_absenteeism_report_table thead tr:eq(1) th:not(:first-child)').each( function (i) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="'+title+'" />');
    
            $('input', this).on('keyup change', function () {
                if (table.column(i + 1).search() !== this.value) {
                    table
                        .column(i + 1)
                        .search(this.value)
                        .draw();
                }
            } );
        });

        function load_data_absent_code() {
            table = $('#detail_absenteeism_report_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: "{{ url('time_management/absent_code/table') }}",
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
                        render: function(data, type, row) {
                            return type === 'display'? '<input class="chk-select" type="checkbox" name="check_absent_code[' + $("<div />").text(row.absentCode).html() + ']" value="1">' : ''
                        }
                    },
                    {data: 'absentCode', name: 'absentCode',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="absentCode[' + $("<div />").text(row.absentCode).html() + ']" value="' +
                                $('<div />').text(row.absentCode).html() + '">' + 
                                $('<div />').text(row.absentCode).html();
                        }},
                    {data: 'description', name: 'description',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="description[' + $("<div />").text(row.description).html() + ']" value="' +
                                $('<div />').text(row.description).html() + '">' + 
                                $('<div />').text(row.description).html();
                        }},
                    {data: 'deductLeave', name: 'deductLeave',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="deductLeave[' + $("<div />").text(row.deductLeave).html() + ']" value="' +
                                $('<div />').text(row.deductLeave).html() + '">' + 
                                $('<div />').text(row.deductLeave).html();
                        }},
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('input[name="absent_code"]').on('change', function () {
            $('input[name="' + this.name + '"]').not(this).prop('checked', false);
            var rows = table.rows({ 'search': 'applied' }).nodes();
            var data = table.rows({ 'search': 'applied' }).data().toArray();
            var result = [];
            if ($('#all_absent_code').is(':checked')) {
                table.rows().select();
                $('.chk-select', rows).prop('checked', true);
            }
            else {
                data = [];
                table.rows().deselect();
                $('.chk-select', rows).prop('checked', false);
            }

            $.each(data, function(key, value) {
                result.push(value.absentCode + " - " + value.description);
            });

            var textarea = document.getElementById("selected_absent_code");
            textarea.value = result.join("\n");
        });

        $('#detail_absenteeism_report_table tbody').on('click', '.chk-select', function () {     
            var data = table.rows('.selected').data().toArray();
            var data2 = table.row(this.closest('tr')).data();
            var result = [];
            
            if(!this.checked){
                data = data.filter(obj => obj.absentCode !== data2.absentCode);
                var all = $('#all_absent_code').get(0);
                var selection = $('#selection_absent_code').get(0);
                if(all && all.checked && ('checked' in all)){
                    all.checked = false;
                    selection.checked = true;
                }
            } else  {
                data.push(data2);
                var selection = $('#selection_absent_code').get(0);
                if(selection && selection.checked && ('checked' in selection)){
                    selection.checked = false;
                }
            }

            $.each(data, function(key, value) {
                result.push(value.absentCode + " - " + value.description);
            });

            var textarea = document.getElementById("selected_absent_code");
            textarea.value = result.join("\n");
        });

        // $('#detail_absenteeism_report_table tbody').on("change", 'input[type="checkbox"]', function(){
        //     if(this.checked){
        //         console.log("okay");
        //     //    $('input=[type="checkbox"]:checked.not(:first)').each(function (){
        //     //        selectvalue += table.row($(this).closest("tr")).data()[1]+" ";
        //     //    });
        //     }
        // });

        $('#detail_absenteeism_report_table tbody').on('change', '.chk-select', function(){
            if(!this.checked){
                var all = $('#all_absent_code').get(0);
                var selection = $('#selection_absent_code').get(0);
                if(all && all.checked && ('checked' in all)){
                    all.checked = false;
                    selection.checked = true;
                }
            } else  {
                var selection = $('#selection_absent_code').get(0);
                if(selection && selection.checked && ('checked' in selection)){
                    selection.checked = false;
                }
            }
        });

      
        $('#select').focus(function (event) {
            var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
        });

        $('#select').click(function (event) {
            var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
        });

        $('#select').change(function (event) {
            var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
        });

        $('select').on('select2:close', function (e) {
            $('.header-select').remove();
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function loadDataFirstLastAllEmployeeNo(field = '', func = '') {
            $.ajax({
                type: 'GET',
                url: '/employee_no/func/api',
                data: {
                    'func': func
                }
            }).then(function (data) {
                var $newOption = $("<option selected='selected'></option>").val(data.employeeNo).text(
                    data.fullName);
                $(field).append($newOption).trigger('change');
            });
        }

        function loadDataFirstLastAllGroupAuthorize(field = '', func = '') {
            $.ajax({
                type: 'GET',
                url: '/group_authorize/func/api',
                data: {
                    'func': func
                }
            }).then(function (data) {
                var $newOption = $("<option selected='selected'></option>").val(data.groupAuthorizeCode)
                    .text(data.groupAuthorizeDesc);
                $(field).append($newOption).trigger('change');
            });
        }

        function loadDataFirstLastAllPosition() {
            $('#position').addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: '/position/func/api',
            }).then(function (data) {
                if (!$('#position').find('option:contains(' + data.positionName + ')').length) {
                    $('#position').append($('<option>').val(data.positionCode).text(data.positionName));
                }
                $('#position').val(data.positionCode);
                $('#position').removeClass('loading');
            });
        }

        function loadDataFirstLastAllLocation() {
            $.ajax({
                type: 'GET',
                url: '/location/func/api',
            }).then(function (data) {
                if (!$('#location').find('option:contains(' + data.locationName + ')').length) {
                    $('#location').append($('<option>').val(data.locationCode).text(data.locationName));
                }
                $('#location').val(data.locationCode);
            });
        }

        function loadDataFirstLastAllRanking() {
            $.ajax({
                type: 'GET',
                url: '/ranking/func/api',
            }).then(function (data) {
                if (!$('#ranking').find('option:contains(' + data.rankingName + ')').length) {
                    $('#ranking').append($('<option>').val(data.rankingCode).text(data.rankingName));
                }
                $('#ranking').val(data.rankingCode);
            });
        }

        function loadDataFirstLastAllLevel(field = '', levelType = '') {
            $.ajax({
                type: 'GET',
                url: '/level/func/api',
                data: {
                    'levelType': levelType
                }
            }).then(function (data) {
                if (!$(field).find('option:contains(' + data.levelName + ')').length) {
                    $(field).append($('<option>').val(data.levelCode).text(data.levelName));
                }
                $(field).val(data.levelCode);
            });
        }

        function loadDataEmployeeNo(field = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Employee No</b></div>' +
                        '<div class="col-6"><b>Full Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.employeeNo + '</div>' +
                        '<div class="col-6">' + data.data.fullName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            // $(field).on('select2:open', function (e) {
            //     html = '<div class="row header-select">' +
            //         '<div class="col-6"><b>Employee No</b></div>' +
            //         '<div class="col-6"><b>Employee Name</b></div>' +
            //         '</div>';
            //     $('.select2-search').append(html);
            // });

            // $(field).on('select2:close', function (event) {
            //     var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
            //     $searchfield.prop('disabled', true);
            // });

            // var headerIsAppend = false;
            // $(field).on('select2:open', function (e) {
            //     if (!headerIsAppend) {
            //         html = '<div class="row">' +
            //             '<div class="col-6"><b>Employee No</b></div>' +
            //             '<div class="col-6"><b>Full Name</b></div>' +
            //             '</div>';
            //         $('.select2-search').append(html);
            //         headerIsAppend = true;
            //     }
            // });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $employeeNo = $(field).select2({
                width: '100%',
                placeholder: 'Choose Employee',
                allowClear: true,
                // tags: true,
                closeOnSelect: false,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: '/employee_no/api',
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
                                    text: item.fullName,
                                    id: item.employeeNo,
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

        function loadDataGroupAuthorize(field = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Group Authorize Code</b></div>' +
                        '<div class="col-6"><b>Group Authorize Desc</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.groupAuthorizeCode + '</div>' +
                        '<div class="col-6">' + data.data.groupAuthorizeDesc + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            // var headerIsAppend = false;
            // $(field).on('select2:open', function (e) {
            //     if (!headerIsAppend) {
            //         html = '<div class="row">' +
            //             '<div class="col-6"><b>Group Authorize Code</b></div>' +
            //             '<div class="col-6"><b>Group Authorize Desc</b></div>' +
            //             '</div>';
            //         $('.select2-search').append(html);
            //         headerIsAppend = true;
            //     }
            // });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Group Authorize',
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
                    url: '/group_authorize/api',
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
                                    text: item.groupAuthorizeDesc,
                                    id: item.groupAuthorizeCode,
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
                        '<div class="col-6"><b>Position Code</b></div>' +
                        '<div class="col-6"><b>Position Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.positionCode + '</div>' +
                        '<div class="col-6">' + data.data.positionName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            // var headerIsAppend = false;
            // $('#position').on('select2:open', function (e) {
            //     if (!headerIsAppend) {
            //         html = '<div class="row">' +
            //             '<div class="col-6"><b>Position Code</b></div>' +
            //             '<div class="col-6"><b>Position Name</b></div>' +
            //             '</div>';
            //         $('.select2-search').append(html);
            //         headerIsAppend = true;
            //     }
            // });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#position').select2({
                width: '100%',
                placeholder: 'Choose Position',
                allowClear: true,
                multiple: true,
                tags: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: '/position/all/api',
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
                                    text: item.positionName,
                                    id: item.positionCode,
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

        function loadDataLocationCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Location Code</b></div>' +
                        '<div class="col-6"><b>Location Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.locationCode + '</div>' +
                        '<div class="col-6">' + data.data.locationName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            // var headerIsAppend = false;
            // $('#location').on('select2:open', function (e) {
            //     if (!headerIsAppend) {
            //         html = '<div class="row">' +
            //             '<div class="col-6"><b>Location Code</b></div>' +
            //             '<div class="col-6"><b>Location Name</b></div>' +
            //             '</div>';
            //         $('.select2-search').append(html);
            //         headerIsAppend = true;
            //     }
            // });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#location').select2({
                width: '100%',
                placeholder: 'Choose Location',
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
                    url: '/location/all/api',
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
                                    text: item.locationName,
                                    id: item.locationCode,
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

        function loadDataRankingCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Ranking Code</b></div>' +
                        '<div class="col-6"><b>Ranking Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.rankingCode + '</div>' +
                        '<div class="col-6">' + data.data.rankingName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            // var headerIsAppend = false;
            // $('#ranking').on('select2:open', function (e) {
            //     if (!headerIsAppend) {
            //         html = '<div class="row">' +
            //             '<div class="col-6"><b>Ranking Code</b></div>' +
            //             '<div class="col-6"><b>Ranking Name</b></div>' +
            //             '</div>';
            //         $('.select2-search').append(html);
            //         headerIsAppend = true;
            //     }
            // });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#ranking').select2({
                width: '100%',
                placeholder: 'Choose Ranking',
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
                    url: '/ranking/all/api',
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
                                    text: item.rankingName,
                                    id: item.rankingCode,
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

        function loadDataLevelCode(field = '', levelType = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Level Code</b></div>' +
                        '<div class="col-6"><b>Level Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.levelCode + '</div>' +
                        '<div class="col-6">' + data.data.levelName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            // var headerIsAppend = false;
            // $(field).on('select2:open', function (e) {
            //     if (!headerIsAppend) {
            //         html = '<div class="row">' +
            //             '<div class="col-6"><b>Level Code</b></div>' +
            //             '<div class="col-6"><b>Level Name</b></div>' +
            //             '</div>';
            //         $('.select2-search').append(html);
            //         headerIsAppend = true;
            //     }
            // });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Level',
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
                    url: '/level/all/api',
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term,
                            'levelType': levelType
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.levelName,
                                    id: item.levelCode,
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

        $("#btn-print-data").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#slip_format_form").submit();
        });

        if ($("#slip_format_form").length > 0) {
            $("#slip_format_form").validate({
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        xhrFields: {
                            responseType: 'blob',
                        },
                        url: "{{ url('time_management/detail_absenteeism_report/print') }}",
                        type: "POST",
                        data: $('#slip_format_form').serialize(),
                        success: function (result, status, xhr) {
                            $("#btn-print-data").prop("disabled", false);
                            $("#btn-print-data").html(
                                '<i class="fa fa-print"></i> {{ __("payroll_slip_format.btn_print") }}'
                            );

                            var disposition = xhr.getResponseHeader(
                                'content-disposition');
                            var matches = /"([^"]*)"/.exec(disposition);
                            var filename = (matches != null && matches[1] ? matches[1] :
                                'audit_trail.xlsx');

                            // The actual download
                            var blob = new Blob([result], {
                                type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                            });
                            var link = document.createElement('a');
                            link.href = window.URL.createObjectURL(blob);
                            link.download = filename;

                            document.body.appendChild(link);

                            link.click();
                            document.body.removeChild(link);
                        },
                        error: function (response) {
                            $("#btn-print-data").prop("disabled", false);
                            $("#btn-print-data").html(
                                '<i class="fa fa-print"></i> {{ __("payroll_slip_format.btn_print") }}'
                            );
                            $('#notification').modal('show');
                            $('#message-notification').html(response);
                        }
                    });
                }
            })
        }
    });

</script>

</html>
