<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
	<style type="text/css">
		.div-personel {
			max-width: 100%;
			margin: auto;
			/*margin-top: 1%;*/
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
        <div class="div-profile">
            <div class="row div-row-profile">
                <div class="col-2 subdiv-profile-image">
                    <img src="{{ url('/pictures/profile-picture.png') }}" alt="Profile">
                    <label class="btn btn-primary"><i class="fa fa-edit"></i> Change Picture
                        <input type="file" hidden>
                    </label>
                </div>
                <div class="col-9 subdiv-profile">
                    <p>{{ $employee_name }} &emsp; | &emsp; {{ $employee_no }}</p>
                    <p class="small">Director &emsp; | &emsp; Finance Accounting & Investment &emsp; | &emsp; Pegawai Tetap</p>
                    <p class="small">PT Intikom Berlian Mustika &emsp; | &emsp; Jakarta</p>
                    <p class="small">lina.sudrajat@intikom.co.id &emsp; | &emsp; 08111010101</p>
                </div>
            </div>
        </div>
		<div class="div-title">
			<a href="{{ url('personel/employee_performance') }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">Employee Performance List</span>
			</a>
		</div>

		<div class="div-form">
            <ul class="nav nav-tabs" id="tab-performance" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="award-tab" data-toggle="tab" href="#award" role="tab" aria-controls="award" aria-selected="true">Award</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="evaluation-tab" data-toggle="tab" href="#evaluation" role="tab" aria-controls="evaluation" aria-selected="false">Evaluation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="sanction-tab" data-toggle="tab" href="#sanction" role="tab" aria-controls="sanction" aria-selected="false">Sanction</a>
                </li>
            </ul>
            <div class="tab-content" id="tab-content-performance">
                <div class="tab-pane fade show active" id="award" role="tabpanel" aria-labelledby="award-tab">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <table id="award_data_table" class="table hover">
                                    <thead>
                                        <tr>
                                            <th>Award Type</th>
                                            <th>Employee No</th>
                                            <th>Award Name</th>
                                            <th>Award Date</th>
                                            <th>Event Name</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <button type="button" class="btn btn-primary" name="btn-add-award" id="btn-add-award" style="width: 100%;" data-toggle="modal" data-target="#modal_add_award">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-danger" name="btn-remove-award" id="btn-remove-award" style="width: 100%;">
                                    <i class="fa fa-times"></i> Remove
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="evaluation" role="tabpanel" aria-labelledby="evaluation-tab">
                    
                </div>
                <div class="tab-pane fade" id="sanction" role="tabpanel" aria-labelledby="sanction-tab">
                    
                </div>
            </div>
		</div>
	</div>
    <div class="modal fade" id="modal_add_award" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Award</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary w-25"><i class="fa fa-check"></i> OK</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    var table = null;
    $('#award_data_table thead tr').clone(true).appendTo('#award_data_table thead');
    $('#award_data_table thead tr:eq(1) th').each( function (i) {
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

    load_table_award();

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = e.target;

        if(target.id == "award-tab"){
            $('#award_data_table').DataTable().destroy();
            load_table_award();
        }
    });

    function load_table_award() {
        table = $('#award_data_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('personel/employee_performance/award/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'ellipses',
            columns: [
                {data: 'award_type', name: 'award_type'},
                {data: 'employee_no', name: 'employee_no'},
                {data: 'award_name', name: 'award_name'},
                {data: 'award_date', name: 'award_date'},
                {data: 'event_name', name: 'event_name'},
            ]
        });
    }
  });
</script>

</html>