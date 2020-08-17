<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/css/font-awesome.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }}<span class="caret"></span>
									
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-heading"><i class="fa fa-dashboard fa-fw"></i> Bảng điều khiển</div>
							<div class="panel-body">
								<ul class="list-group">
									<a href="{{url('/admin/dashboard')}}" class="list-group-item">
										<i class="fa fa-home fa-fw"></i> Trang chính
									</a>
									<a href="#" class="list-group-item" data-toggle="collapse" data-target="#quanly">
										<i class="fa fa-edit fa-fw"></i> Quản lý
										<span class="fa fa-caret-down"></span>
									</a>
										
									<div id="quanly" class="collapse">
										<ul>
											<a href="{{url('/admin/user')}}" class="list-group-item">Người dùng</a>
											<a href="{{url('/admin/thread')}}" class="list-group-item">Bài viết</a>
											<a href="{{url('/admin/category')}}" class="list-group-item">Danh mục</a>
											<a href="{{url('/admin/brand')}}" class="list-group-item">Nhãn hiệu</a>
											<a href="{{url('/admin/location')}}" class="list-group-item">Vị trí</a>
										</ul>
									</div>
									
									<a href="{{url('/admin/report')}}" class="list-group-item">
									<i class="fa fa-area-chart fa-fw"></i> Thống kê
									</a>
									<a href="{{url('/admin/approval')}}" class="list-group-item">
									<i class="fa fa-hourglass-start fa-fw"></i> Phê duyệt
									</a>
									<a href="{{url('/admin/notice')}}" class="list-group-item">
									<i class="fa fa-comments-o fa-fw"></i> Thông báo
									</a>
									<a href="{{url('/admin/info')}}" class="list-group-item">
									<i class="fa fa-info fa-fw"></i> Thông tin website
									</a>
								</ul>
								
							</div>
					</div>
				</div>
				<div class="col-md-9">
					@yield('content')
				</div>
			</div>
		</div>
    </div>
</body>
</html>
