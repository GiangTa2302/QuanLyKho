<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.adminkit.io/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Jul 2021 03:11:55 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com/">

	<title>FPT shop</title>

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">

	<link href="{{asset('assets/admin/css/light.css')}}" rel="stylesheet">
	<script src="{{asset('assets/admin/js/settings.js')}}"></script>
	<style>
		body {
			opacity: 0;
		}
	</style>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-120946860-10', { 'anonymize_ip': true });
	</script>
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
	<div class="wrapper">

        <nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
					<span class="sidebar-brand-text align-middle">
						<img src="{{asset('assets/admin/img/logo.png')}}" alt="">
						<sub><small class="badge text-uppercase">Shop</small></sub>
					</span>
					<svg class="sidebar-brand-icon align-middle" width="32px" height="32px" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="1.5"
						stroke-linecap="square" stroke-linejoin="miter" color="#FFFFFF" style="margin-left: -3px">
						<path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
						<path d="M20 12L12 16L4 12"></path>
						<path d="M20 16L12 20L4 16"></path>
					</svg>
				</a>
		
				<div class="sidebar-user">
					<div class="d-flex justify-content-center">
						<div class="flex-shrink-0">
							<img src="{{asset('storage/users/'.Auth::user()->image)}}" class="avatar img-fluid rounded me-1" alt="Charles Hall" />
						</div>
						<div class="flex-grow-1 ps-2">
							<a class="sidebar-user-title" href="#">
								{{Auth::user()->name}}
								<div class="sidebar-user-subtitle">Admin</div>
							</a>
						</div>
					</div>
				</div>
		
				<ul class="sidebar-nav">
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('admin.home')}}">
							<i class="align-middle" data-feather="home"></i> <span class="align-middle">Tổng quan</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('admin.sanpham')}}">
							<i class="align-middle" data-feather="inbox"></i> <span class="align-middle">Sản phẩm</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('admin.donxuat')}}">
							<i class="align-middle" data-feather="inbox"></i> <span class="align-middle">Đơn hàng xuất</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('admin.donnhap')}}">
							<i class="align-middle" data-feather="inbox"></i> <span class="align-middle">Đơn hàng nhập</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="file-minus"></i> <span class="align-middle">Đơn hàng</span>
						</a>
						<ul id="pages" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.donhangnhap')}}">Đơn nhập kho </a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.donhangxuat')}}">Đơn xuất kho </a></li>
						</ul>
					</li>
		
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('admin.nhacungcap')}}">
							<i class="align-middle" data-feather="layers"></i> <span class="align-middle">Nhà cung cấp</span>
						</a>
					</li>
		
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('admin.khachhang')}}">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Khách hàng</span>
						</a>
					</li>
		
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('admin.thongke')}}">
							<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Thống kê</span>
						</a>
					</li>
		
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('admin.nhanvien')}}">
							<i class="align-middle" data-feather="users"></i> <span class="align-middle">Nhân viên kho</span>
						</a>
					</li>
				</ul>
		
			</div>
		</nav>

        <div class="main"> 
            <nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>
			
				<form class="d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" class="form-control" placeholder="Search…" aria-label="Search">
						<button class="btn" type="button">
							<i class="align-middle" data-feather="search"></i>
						</button>
					</div>
				</form>
			
				<ul class="navbar-nav d-none d-lg-block">
					<li class="nav-item px-2 dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">
							Chọn kho
						</a>
						<div class="dropdown-menu dropdown-menu-start dropdown-mega" aria-labelledby="servicesDropdown">
							<div class="d-md-flex align-items-start justify-content-start">
								<div class="dropdown-mega-list">
									<div class="dropdown-header">Hà Nội</div>
									<a class="dropdown-item" href="#">Kho số 1</a>
									<a class="dropdown-item" href="#">Kho số 2</a>
									<a class="dropdown-item" href="#">Kho số 3</a>
									<a class="dropdown-item" href="#">Kho số 4</a>
									<a class="dropdown-item" href="#">Kho số 5</a>
									<a class="dropdown-item" href="#">Kho số 6</a>
									<a class="dropdown-item" href="#">Kho số 7</a>
								</div>
								<div class="dropdown-mega-list">
									<div class="dropdown-header">Đà Nẵng</div>
									<a class="dropdown-item" href="#">Kho số 1</a>
									<a class="dropdown-item" href="#">Kho số 2</a>
									<a class="dropdown-item" href="#">Kho số 3</a>
									<a class="dropdown-item" href="#">Kho số 4</a>
									<a class="dropdown-item" href="#">Kho số 5</a>
								</div>
								<div class="dropdown-mega-list">
									<div class="dropdown-header">TP Hồ Chí Minh</div>
									<a class="dropdown-item" href="#">Kho số 1</a>
									<a class="dropdown-item" href="#">Kho số 2</a>
									<a class="dropdown-item" href="#">Kho số 3</a>
									<a class="dropdown-item" href="#">Kho số 4</a>
									<a class="dropdown-item" href="#">Kho số 5</a>
									<a class="dropdown-item" href="#">Kho số 6</a>
								</div>
							</div>
						</div>
					</li>
				</ul>
			
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{asset('assets/admin/img/avatars/avatar-5.jpg')}}" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{asset('assets/admin/img/avatars/avatar-2.jpg')}}" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{asset('assets/admin/img/avatars/avatar-4.jpg')}}" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{asset('assets/admin/img/avatars/avatar-3.jpg')}}" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						
						<li class="nav-item">
							<a class="nav-icon js-fullscreen d-none d-lg-block" href="#">
								<div class="position-relative">
									<i class="align-middle" data-feather="maximize"></i>
								</div>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon pe-md-0 dropdown-toggle" href="#" data-bs-toggle="dropdown">
								<img src="{{asset('storage/users/'.Auth::user()->image)}}" class="avatar img-fluid rounded" alt="Charles Hall" />
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<div class="dropdown-divider"></div>
								
								<a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
								
								<form id="logout-form" method="POST" action="{{route('logout')}}">
									@csrf
								</form>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			
			@yield('content')
			
            <footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a href="index-2.html" class="text-muted"><strong>Group 3</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
        </div>

	</div>
</body>

	<script src="{{asset('assets/admin/js/app.js')}}"></script>
</html>