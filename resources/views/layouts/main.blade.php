<!DOCTYPE html>
<html lang="en">
<head>
	<title>College T Point</title>
	<meta charset="UTF-8">
	<meta name="description" content="college t point">
	<meta name="keywords" content="college, uptu, aktu, aieee, exam, student, admission, study">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}" />


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="container">
			<!-- logo -->
			<a class="site-logo" href="/">
				{{-- <img src="{{ asset('images/logo.png') }}" alt=""> --}}
				<span class="logo-small">college</span><span class="logo-large">T</span><span class="logo-small">point</span>
			</a>

			
				<!-- Authentication Links -->
				@if (Auth::guest())
				<div class="user-panel">
					<a href="{{ url('/login') }}">Login</a>  /  <a href="{{ url('/register') }}">Register</a>
				</div>
				@else
					<div class="logged-user">
						<span class="u-name">Hi, {{ Auth::user()->name }}</span> / <span class="u-logout"><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></span>
					</div>
				@endif
	
			<!-- responsive -->
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<!-- site menu -->
			<nav class="main-menu">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="{{ route('home.comingsoon') }}">News</a></li>
					<li><a href="{{ route('all.post') }}">Blog</a></li>
					<li><a href="{{ route('home.comingsoon') }}">Top Exams</a></li>
					<li><a href="{{ route('all.college') }}">Colleges</a></li>
					<li><a href="{{ route('home.comingsoon') }}">Cut Offs</a></li>
					{{-- <li><a href="contact.html">Contact</a></li>
					<li><a href="contact.html">About Us</a></li> --}}
				</ul>
			</nav>
		</div>
	</header>
	<!-- Header section end -->

	{{-- Main Content --}}
	@yield('content')
	{{-- Main Content end --}}
	
	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<ul class="footer-menu">
				<li><a href="/">Home</a></li>
				<li><a href="{{ route('home.comingsoon') }}">News</a></li>
				<li><a href="{{ route('all.post') }}">Blog</a></li>
				<li><a href="{{ route('home.comingsoon') }}">Top Exams</a></li>
				<li><a href="{{ route('home.comingsoon') }}">Colleges</a></li>
				<li><a href="{{ route('home.comingsoon') }}">Cut Offs</a></li>
				{{-- <li><a href="contact.html">Contact</a></li>
				<li><a href="contact.html">About Us</a></li> --}}
			</ul>
			<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | collegeTpoint
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
		</div>
	</footer>
	<!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="{{asset('js/libs.js')}}"></script>
    <script src="{{asset('js/blog-post.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
    </body>
</html>