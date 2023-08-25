<!DOCTYPE html>
<html>
<head>
<title>{{ __('admin_menu.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/admin_menu.css') }}">
	<style type="text/css">
		.div-admin_menu {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
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
	</style>
</head>

<body>
    <div class="div-admin_menu">
        <div class="div-title">
			<img src="{{ url('icons/mob/sidebar/streammobportal-navbar-adminmenu.svg') }}" alt="Title">
			<span class="title-text">{{ __('admin_menu.judul') }}</span>
		</div>
        <div class="card">
            <a class="collapsed" data-toggle="collapse"  href="#admin_menu-admin_menu-data" aria-expanded="true" aria-controls="admin_menu-admin_menu-data">
                <div class="card-header">
                    <div class="div-dropdown-title">
                        <img class="dropdown-logo" src="{{ url('icons/mob/sidebar/streammobportal-navbar-adminmenu.svg') }}" alt="admin_menu">
                        <span class="dropdown-title-text">{{__('admin_menu.admin_menu_data')}}</span>
                        <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                    </div>
                </div>
            </a>
            <div id="admin_menu-admin_menu-data" class="collapse">
                <div class="card-block">
                    <div class="row div-child-data">
                        <!-- <div class="col col-3">
                            <a href="{{ url('admin_menu/user_master') }}" target="iframe_dashboard">
                                <img src="{{ url('/icons/mob/submenu/submenu-adminmenu.svg') }}" alt="Child admin_menu">
                                <span class="child-title-text">{{ __('admin_menu.user_master') }}</span>
                            </a>
                        </div>
                        <div class="col col-3">
                            <a href="{{ url('admin_menu/user_group') }}" target="iframe_dashboard">
                                <img src="{{ url('/icons/mob/submenu/submenu-adminmenu.svg') }}" alt="Child admin_menu">
                                <span class="child-title-text">{{ __('admin_menu.user_group') }}</span>
                            </a>
                        </div>
                        <div class="col col-3">
                            <a href="{{ url('admin_menu/menu_master') }}" target="iframe_dashboard">
                                <img src="{{ url('/icons/mob/submenu/submenu-adminmenu.svg') }}" alt="Child admin_menu">
                                <span class="child-title-text">{{ __('admin_menu.menu_master') }}</span>
                            </a>
                        </div> -->
                        <div class="col col-3">
                            <a href="{{ url('admin_menu/checkin_list') }}" target="iframe_dashboard">
                                <img src="{{ url('/icons/mob/submenu/submenu-adminmenu.svg') }}" alt="Child admin_menu">
                                <span class="child-title-text">{{ __('admin_menu.check_in_list') }}</span>
                            </a>
                        </div>
                        <div class="col col-3">
                            <a href="{{ url('admin_menu/news_master') }}" target="iframe_dashboard">
                                <img src="{{ url('/icons/mob/submenu/submenu-adminmenu.svg') }}" alt="Child admin_menu">
                                <span class="child-title-text">{{ __('admin_menu.news_aster') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($errors->any())
	<div class="modal fade" role="dialog" id="notification_error">
        <div class="modal-dialog modal-dialog-centered" data-toggle="modal" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification-error">
                    <h5 class="modal-title">Error!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="message-notification-error">{{$errors->first()}}</span>
                </div>
            </div>
        </div>
    </div>
	@endif
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
		var error = "{{ $errors->any() }}";
		if (error) {
			$('#notification_error').modal('show');
		}
	})
</script>


</html>