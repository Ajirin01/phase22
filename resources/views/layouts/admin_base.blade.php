<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/img/olabisi-logo.png') }}">
    <title>Digi-Realm City Solution Online Learning</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/fullcalendar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">
    <!--[if lt IE 9]>
		<script src="{{ asset('admin/assets/js/html5shiv.min.js') }}"></script>
		<script src="{{ asset('admin/assets/js/respond.min.js') }}"></script>
    <![endif]-->
    
</head>

<body>
    
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="{{ url('admin/dashoard') }}" class="logo">
					<img style="width: 70px; height: 40px" src="{{asset('site/images/digi-logo-dashboard.png')}}" width="70" height="35" alt="">
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="{{ asset('admin/assets/img/user.jpg') }}" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
						<span>Admin</span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ route('profile.index') }}">My Profile</a>
						{{-- <a class="dropdown-item" href="{{ url('admin/profile/'.Auth::user()->id.'/edit ') }}">Edit Profile</a> --}}
						<a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                        </form>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('profile.index') }}">My Profile</a>
                    <a class="dropdown-item" href="{{ url('admin/profile/Auth::user->id/edit ') }}">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="active">
                            <a href="{{ url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
						<li>
                            <a href="{{ url('admin/students') }}"><i class="fa fa-group"></i> <span>Students</span></a>
                        </li>
                        <li>
                            <a href="{{ route('tutors.index') }}"><i class="fa fa-graduation-cap"></i> <span>Tutors</span></a>
                        </li>
                        <li>
                            <a href="{{ route('courses.index') }}"><i class="fa fa-graduation-cap"></i> <span>Courses</span></a>
                        </li>
                        <li>
                            <a href="{{ route('users.index') }}"><i class="fa fa-group"></i> <span>Users</span></a>
                        </li>
                        <li>
                            <a href="{{ route('lectures.index') }}"><i class="fa fa-book"></i> <span>Lectures</span></a>
                        </li>
                        <li>
                            <a href="{{ route('assignments.index') }}"><i class="fa fa-book"></i> <span>Assignments</span></a>
                        </li>
                        <li>
                            <a href="{{ route('chats.index') }}"><i class="fa fa-comment"></i> <span>chats</span></a>
                        </li>
                        <li>
                            {{-- <a href="{{ route('adverts.index') }}"><i class="fa fa-book"></i> <span>adverts</span></a> --}}
                        </li>
                        <li>
                            {{-- <a href="{{ route('appointments.index') }}"><i class="fa fa-calendar"></i> <span>Appointments</span></a> --}}
                        </li>
                        <li>
                        {{-- <li class="submenu">
                            <a href="#"><i class="fa fa-commenting-o"></i> <span> Blog</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{ route('blog.index') }}">Posts</a></li>
                                <li><a href="{{ route('blog.create') }}">Add Post</a></li>
                            </ul>
                        </li> --}}
                        {{-- <li>
                            <a href="{{ url('admin/calender')}}"><i class="fa fa-calendar"></i> <span>Calendar</span></a>
                        </li> --}}
                        <li>
                            <a href="{{ url('admin/subscriptions')}}"><i class="fa fa-calendar"></i> <span>Subscriptions</span></a>
                        </li>
                        {{-- <li>
                            <a href="{{ url('admin/tutorw')}}"><i class="fa fa-calendar"></i> <span>Subscriptions</span></a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
        
        @yield('content')

    <div class="sidebar-overlay" data-reff=""></div>
    </div>

    <script>
        var config = {
            routes:{
                tiny_url: "{{URL::to('/api/upload-tinymce')}}"
            },
            variables:{
                image_src: Array()
            }
        }
    </script>
    <script src="{{ asset('admin/assets/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('admin/assets/js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart.js') }}"></script>
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>

    <script src="{{ asset('admin/assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery-ui.min.html') }}"></script>
    <script src="{{ asset('admin/assets/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.fullcalendar.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/js/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/js/ini_tinymce.js') }}"></script>
</body>