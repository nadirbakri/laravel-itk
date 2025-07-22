<!DOCTYPE html>
<html>
<head>
	<title>{{ __('md_payment_per_rank.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ asset('css/medical_detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
	<style type="text/css">
		.div-medical {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
        .modal-header-notification-error {
            border-bottom:1px solid #eee;
            background-color: #f44336;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
        .modal-header-notification-success {
            border-bottom:1px solid #eee;
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
        .required {
            color: red
        }

		.spinner {
            position: absolute;
			margin-left: 45%;
			margin-top: 20%;
			border-radius: 50%;
			width: 50px;
			height: 50px;
			border-radius: 50%;
			border: 5px solid #ccc;
			border-top-color: #333;
			animation: spin 1s infinite linear;
		}
	</style>
</head>

<body>
	<div class="div-medical">
        <div class="div-navbar sticky-navbar">
            <a href="javascript:void(0)" style="display: none;" id="toolbar-back">
                <img src="{{ url('/icons/functionbar/functionbar-back-blue.svg') }}" alt="Back">
                <img src="{{ url('/icons/functionbar/functionbar-back-white.svg') }}" class="functionbar-hover" alt="Back">
                <span>Back</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-next">
                <img src="{{ url('/icons/functionbar/functionbar-next-blue.svg') }}" alt="Next">
                <img src="{{ url('/icons/functionbar/functionbar-next-white.svg') }}" class="functionbar-hover" alt="Next">
                <span>Next</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-new" target="iframe_dashboard">
                <img src="{{ url('/icons/functionbar/functionbar-new-blue.svg') }}" alt="New">
                <img src="{{ url('/icons/functionbar/functionbar-new-white.svg') }}" class="functionbar-hover" alt="New">
                <span>New</span>
            </a>
            <a href="javascript:void(0)" id="toolbar-edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-blue.svg') }}" alt="Edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-white.svg') }}" class="functionbar-hover" alt="Edit">
                <span>Edit</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-save">
                <img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">
                <img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">
                <span>Save</span>
            </a>
            <a class="list-functionbar-md" href="javascript:void(0)" style="display: none;" id="toolbar-active">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-blue.svg') }}" alt="Activate">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-white.svg') }}" class="functionbar-hover" alt="Activate">
                <span>Activate</span>
            </a>
            <a class="list-functionbar-lg" href="javascript:void(0)" style="display: none;" id="toolbar-deactive">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-blue.svg') }}" alt="Deactivate">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-white.svg') }}" class="functionbar-hover" alt="Deactivate">
                <span>Deactivate</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-list">
                <img src="{{ url('/icons/functionbar/functionbar-list-blue.svg') }}" alt="List">
                <img src="{{ url('/icons/functionbar/functionbar-list-white.svg') }}" class="functionbar-hover" alt="List">
                <span>List</span>
            </a>
        </div>
		<div class="div-title">
			<a href="{{ route('medical', ['moduleID' => 'MD']) }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('md_payment_per_rank.list') }}</span>
			</a>
		</div>

        <div class="div-form">
            <form id="payment_per_rank_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="ranking_code">{{ __('md_payment_per_rank.label_ranking_code') }}</label>
                            <span class="required">*</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control" id="ranking_code" name="ranking_code"
                                placeholder="{{ __('md_payment_per_rank.label_ranking_code') }}"> </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary" name="btn-search" id="btn-search" value="preview" style="width: 100%;">
                            <img src="{{ url('icons/mob/button/button-search.svg') }}" alt="export"> {{ __('md_payment_per_rank.btn_search') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

		<div class="div-table">
			{{-- <div id="loading">
                <div class="spinner"></div>
            </div> --}}
            {{-- <div class="table-responsive"> --}}
                <table id="payment_per_rank_table" class="table hover" cellspacing="10">
                    <thead>
                        <tr>
                            <th></th>
                            {{-- <th></th> --}}
                            <th>Service Code</th>
                            <th>Service Name</th>
                        </tr>
                    </thead>
                </table>
            {{-- </div> --}}
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
                        <span class="title-text-notification">{{ __('md_payment_per_rank.alert_success') }}</span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="{{ asset('js/jquery.redirect.js') }}"></script>

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
    
  $(document).ready(function() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    var table = null;
    var arrayPaymentPerRank = []
    let ranking_code = null;

    loadDataRankingCode();

    $('.div-navbar a.disabled').attr('onclick', 'return false;');

    $("#payment_per_rank_form").submit((e)=>{
        e.preventDefault();

        $("#btn-search").prop("disabled", true);
        $("#btn-search").html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'

        );

        ranking_code = $("#ranking_code").val();
        load_data_payment_per_rank(ranking_code);
    });

    function load_data_payment_per_rank(ranking_code){
        $.ajax({
            type: 'GET',
            url: "{{ url('/medical/payment_per_rank/table') }}",
            data: {
                'rankCode': ranking_code
            }
        }).then(function (data) {
            arrayPaymentPerRank = data.data;
            $('#payment_per_rank_table').DataTable().destroy();
            load_data_table_payment_per_rank();
        });
    }

  	$('#payment_per_rank_table thead tr').clone(true).appendTo('#payment_per_rank_table thead');
    $('#payment_per_rank_table thead tr:eq(1) th:not(:first-child)').each( function (i) {
        // if (i > 0) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="' + title + '" />');

            $('input', this).on('keyup change', function () {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        // }
    });
    
    function load_data_table_payment_per_rank() {
        table = $('#payment_per_rank_table').DataTable({
            processing: true,
            // serverSide: true,
            orderCellsTop: true,
            data: arrayPaymentPerRank,
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lfrtip',
            'sPaginationType': 'full_numbers',
            "order": [[ 1, "asc" ]],
            columns: [
                {
                    "className": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                // {
                //     orderable: false,
                //     targets: 0,
                //     "defaultContent": '',
                //     render: function (data, type) {
                //         return type === 'display' ?
                //             '<input class="chk-select" type="checkbox">' : '';
                //     }
                // },
                {data: 'serviceCode', name: 'serviceCode'},
                {data: 'serviceName', name: 'serviceName'},
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }
        });

        $("#btn-search").prop("disabled", false);
        $("#btn-search").html(
            "<img src={{ url('icons/mob/button/button-search.svg') }} alt='export'> {{ __('trans_transport.btn_search') }}"
        );
    }

    $(document).on('click', '#payment_per_rank_table tbody td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            var d = row.data();
            
            if (d.claimForDetail && d.claimForDetail.length > 0) {
                var tableContent = `
                    <table class="table hover" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Claim For</th>
                                <th>Claim Code</th>
                                <th>Cut Off Year</th>
                                <th>Age Minimum</th>
                                <th>Max Payment</th>
                                <th>Minimum Month of Service</th>
                            </tr>
                        </thead>
                        <tbody>
                `;

                d.claimForDetail.forEach(detail => {
                    tableContent += `
                        <tr>
                            <td>${detail.claimForCode}</td>
                            <td>${detail.claimForName}</td>
                            <td>${detail.cutOffYear}</td>
                            <td>${detail.ageMinimum}</td>
                            <td>${(Number(detail.maxPayment).toLocaleString('id-ID'))}</td>
                            <td>${detail.minServiceMonth}</td>
                        </tr>
                    `;
                });

                tableContent += `</tbody></table>`;

                row.child(tableContent).show();
                tr.addClass('shown');
            }
        }
    });

    function loadDataRankingCode() {
        function formatSelect(data) {
            if (data.loading) {
                return $search
            }

            if (data.id) {
                var $result2 = $('<div class="row">' +
                    '<div class="col-6">' + data.data.rankingCode + '</div>' +
                    '<div class="col-6">' + data.data.rankingName + '</div>' +
                    '</div>');

                return $result2;
            }
        }

        var headerIsAppend = false;
        $('#ranking_code').on('select2:open', function (e) {
            if (!headerIsAppend) {
                html = '<div class="row">' +
                    '<div class="col-6"><b>Ranking Code</b></div>' +
                    '<div class="col-6"><b>Ranking Name</b></div>' +
                    '</div>';
                $('.select2-search--dropdown').append(html);
                headerIsAppend = true;
            }
        });

        var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

        $('#ranking_code').select2({
            width: '100%',
            placeholder: 'Choose Ranking Code',
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
                url: "{{ url('/ranking/api') }}",
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

    $('#payment_per_rank_table').on('click', 'tr td:first-child', function(e){
        $(this).parent().find('input[type="checkbox"]').trigger('click');
    });

    $('#notification_success').on('hide.bs.modal', function () {
        window.location = "{{ url('medical/payment_per_rank') }}";
    })

    $("#toolbar-edit").on('click', function() {
        ranking_code = $("#ranking_code").val();
        if (ranking_code !== null){
            $.redirect("{{ url('medical/payment_per_rank/detail_data') }}", { 'rankCode' : ranking_code }, "GET", "iframe_dashboard");
        }
        else {
            $('#notification_error').modal('show');
            $('#message-notification-error').html('No Ranking Code Selected');
        }
    });

    if ($("#payment_per_rank_form").length > 0) {
        $("#payment_per_rank_form").validate({
            rules: {
                ranking_code: {
                    required: true,
                },
            },
            messages: {
                ranking_code: {
                    required: "{{ __('md_payment_per_rank.label_ranking_code_required') }}",
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
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
        })
    }
    
  });
</script>

</html>