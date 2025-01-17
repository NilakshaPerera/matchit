<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/jpg" href="{{ url('assets_app/images/favicon.png') }}"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>MatchIT Admin</title>

	<script> var base = '{{ url('/') }}';</script>
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href=" {{ asset('assets_theme/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets_theme/common/css/bootstrap.min.css') }} " rel="stylesheet" type="text/css">
    
	<link href="{{ asset('assets_theme/common/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets_theme/common/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets_theme/common/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets_theme/common/css/colors.min.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	
	@yield('css')

	<!-- Core JS files -->
	<script src="{{ asset('assets_theme/js/main/jquery.min.js') }}"></script>
	<script src="{{ asset('assets_theme/js/main/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets_theme/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->

	@yield('theme-script')

	<script src="{{ asset('assets_theme/common/js/app.js') }}"></script>
	<!-- /theme JS files -->

	@yield('script')
	

</head>

<body>
	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="">
			<a href="Javascript:void(0)" class="d-inline-block pt-1 pb-1">
				<img src="{{ asset('assets_app/images/logo2.png') }}" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<span class="bg-success ml-md-3 mr-md-auto"></span>
			<ul class="navbar-nav">
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						{{-- <img src="{ asset('assets_theme/images/placeholders/placeholder.jpg') }}" class="rounded-circle mr-2" height="34" alt=""> --}}
						<span>{{ Auth::user()->name }}</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">

						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								{{-- <a href="#"><img src="{ asset('assets_theme/images/placeholders/placeholder.jpg') }}" width="38" height="38" class="rounded-circle" alt=""></a> --}}
							</div>
							<div class="media-body">
								<div class="media-title font-weight-semibold">{{ Auth::user()->name }}</div>
								<div class="font-size-xs opacity-50">
									&nbsp;{{ Auth::user()->role->name }}
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->

				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">
						<!-- Main -->
                        <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                    
						<li class="nav-item nav-item-submenu  {{(in_array( Route::currentRouteName() , ["hobby.index", "personality.index", "eventtype.index" ] ))? 'nav-item-expanded nav-item-open' : ""   }}">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>System</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item {{ (Route::currentRouteName() == "hobby.index")? "nav-item-open" : "" }}"><a href="{{ route('hobby.index') }}" class="nav-link ">Hobbies</a></li>
								<li class="nav-item {{ (Route::currentRouteName() == "personality.index")? "nav-item-open" : "" }}"><a href="{{ route('personality.index') }}" class="nav-link ">Personality Details</a></li>
								<li class="nav-item {{ (Route::currentRouteName() == "eventtype.index")? "nav-item-open" : "" }}"><a href="{{ route('eventtype.index') }}" class="nav-link ">Event Types</a></li>
							</ul>
						</li>

						<li class="nav-item nav-item-submenu {{(in_array( Route::currentRouteName() , ["user", "user.all"] ))? 'nav-item-expanded nav-item-open' : ""   }}">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Users</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item {{ (Route::currentRouteName() == "user")? "nav-item-open" : "" }}"><a href="{{route('user')}}" class="nav-link ">Create Users</a></li>
								<li class="nav-item {{ (Route::currentRouteName() == "user.all")? "nav-item-open" : "" }}"><a href="{{ route('user.all') }}" class="nav-link ">Show Users</a></li>					
						    </ul>
						</li>

						<li class="nav-item nav-item-submenu  {{(in_array( Route::currentRouteName() , ["booking.index", "payment.getall"] ))? 'nav-item-expanded nav-item-open' : ""   }}">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Event Bookings</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item {{ (Route::currentRouteName() == "booking.index")? "nav-item-open" : "" }}"><a href="{{route('booking.index')}}" class="nav-link ">Accept Bookings</a></li>
	            				<li class="nav-item {{ (Route::currentRouteName() == "payment.getall")? "nav-item-open" : "" }}"><a href="{{route('payment.getall')}}" class="nav-link ">Accept Payments</a></li>
						    </ul>
						</li>

						<li class="nav-item nav-item-submenu {{(in_array( Route::currentRouteName() , ["reports"] ))? 'nav-item-expanded nav-item-open' : ""   }}">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Reports</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item {{ (Route::currentRouteName() == "reports")? "nav-item-open" : "" }}"><a href="{{ route('reports', [0]) }}" class="nav-link ">Generate</a></li>
						    </ul>
						</li>

						<li class="nav-item nav-item-submenu {{(in_array( Route::currentRouteName() , ["events.index", "events.show" ] ))? 'nav-item-expanded nav-item-open' : ""   }}">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Events</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item {{ (Route::currentRouteName() == "events.index")? "nav-item-open" : "" }}"><a href="{{ route('events.index') }}" class="nav-link ">Create</a></li>
								<li class="nav-item {{ (Route::currentRouteName() == "events.show")? "nav-item-open" : "" }}"><a href="{{ route('events.show') }}" class="nav-link ">Event Schedule</a></li>
						    </ul>
						</li>

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			{{-- <div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Components</span> - Tabs</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

			</div> --}}
			<!-- /page header -->

			<!-- Content area -->
			<div class="content">

                @yield('content')

			</div>

			<!-- Footer Mobile -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
                    <span class="navbar-text">
                        &copy;{{ date('Y') }} University of Kingston Batch 2
                    </span>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy;{{ date('Y') }} University of Kingston Batch 2
					</span>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
