<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel_award_data_entry.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
	<style type="text/css">
		.div-personel {
			max-width: 100%;
			margin: auto;
			/*margin-top: 1%;*/
		}
        .div-title {
            margin-top: 8%;
        }
	</style>
</head>

<body>
	<div class="div-personel">
        <div class="div-navbar sticky-navbar">
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-back-blue.svg') }}" alt="Back">
                <img src="{{ url('/icons/functionbar/functionbar-back-white.svg') }}" class="functionbar-hover" alt="Back">
                <span>Back</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-next-blue.svg') }}" alt="Next">
                <img src="{{ url('/icons/functionbar/functionbar-next-white.svg') }}" class="functionbar-hover" alt="Next">
                <span>Next</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-new-blue.svg') }}" alt="New">
                <img src="{{ url('/icons/functionbar/functionbar-new-white.svg') }}" class="functionbar-hover" alt="New">
                <span>New</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-edit-blue.svg') }}" alt="Edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-white.svg') }}" class="functionbar-hover" alt="Edit">
                <span>Edit</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">
                <img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">
                <span>Save</span>
            </a>
            <a class="list-functionbar-md" href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-blue.svg') }}" alt="Activate">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-white.svg') }}" class="functionbar-hover" alt="Activate">
                <span>Activate</span>
            </a>
            <a class="list-functionbar-lg" href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-blue.svg') }}" alt="Deactivate">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-white.svg') }}" class="functionbar-hover" alt="Deactivate">
                <span>Deactivate</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-list-blue.svg') }}" alt="List">
                <img src="{{ url('/icons/functionbar/functionbar-list-white.svg') }}" class="functionbar-hover" alt="List">
                <span>List</span>
            </a>
        </div>
		<div class="div-title">
			<a href="{{ url('/personnel') }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('personel_award_data_entry.list') }}</span>
			</a>
		</div>
		<div class="div-form">
            <form>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_number">Employee Number</label>
                            <select class="form-control" id="employee_number" name="employee_number">
                                <option value="">Choose</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_name">Employee Name</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="award_date_start">Award Date Start</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="award_date_start" name="award_date_start" placeholder="Award Date Start" data-input>
                                <div class="input-group-prepend award_date_start">
                                    <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="award_date_end">Award Date End</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="award_date_end" name="award_date_end" placeholder="Award Date End">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="award_type">Award Type</label>
                            <select class="form-control" id="award_type" name="award_type" disabled>
                                <option value="">Choose</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="award_name">Award Name</label>
                            <input type="text" class="form-control" id="award_name" name="award_name" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="event_name">Event Name</label>
                            <input type="text" class="form-control" id="event_name" name="event_name" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-search-award-data" id="btn-search-award-data" style="width: 100%;">
                            <i class="fa fa-search"></i> Search
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table id="award_data_entry_table" class="table hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Employee No</th>
                                    <th>Award Date</th>
                                    <th>Award Type</th>
                                    <th>Award Name</th>
                                    <th>Event Name</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </form>
		</div>
	</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(function() {
        initDatePicker();
    });

    function initDatePicker() {
        $('.input-group input').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function() {
                var flatPickrInstance = this;
                console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });
    }
</script>

<script type="text/javascript">
  $(document).ready(function() {
    var table = null;
    $('#award_data_entry_table thead tr').clone(true).appendTo('#award_data_entry_table thead');
    $('#award_data_entry_table thead tr:eq(1) th').each( function (i) {
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

    load_table_award_data_entry();

    function load_table_award_data_entry() {
        table = $('#award_data_entry_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('personnel/award_data_entry/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'ellipses',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'employee_no', name: 'employee_no'},
                {data: 'award_date', name: 'award_date'},
                {data: 'award_type', name: 'award_type'},
                {data: 'award_name', name: 'award_name'},
                {data: 'event_name', name: 'event_name'}
            ]
        });
    }
  });
</script>

</html>