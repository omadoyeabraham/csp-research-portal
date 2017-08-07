<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title> @yield('page-title') </title>

	<meta name="author" content="Omadoye Abraham">
	<meta name="description" content="Research portal for CardinalStone">

	<!-- Mobile viewport meta tag -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Minified complete css file containing custom css, bootstrap, resets and all -->
	 <link rel="stylesheet" href="{{ URL::to('assets/css/0-tools/jquery.datetimepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/css/main.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/css/0-tools/font-awesome/css/font-awesome.min.css') }}">

</head>
<body >
	
	<!-- NAVIGATION BAR -->
		<nav class="myNavbar">
			<a href="{{ url('/') }}" class="logo-wrapper w20p m5 ml25">
				<img src="{{ url('assets/img/logo.png') }}" alt="CardinalStone logo" class="img-responsive logo w100p">
			</a>
			<span class="flex-space"></span>
			<ul class="nav-menus list-inline">
				<li class="nav-menu-item"><a href="{{ url('/') }}">Home</a></li>
				<!--li class="nav-menu-item"><a href="{{ url('/market-data') }}">Market Data</a></li-->
				<li class="nav-menu-item"><a href="{{ url('/reports') }}">Reports</a></li>
				<li class="nav-menu-item"><a href="{{ url('/admin') }}">Admin</a></li>
					<li class="nav-menu-item"> <a href="{{ url('market-data') }}">Market Data</a></li>
				@if( Auth::guest() )
					<li class="nav-menu-item"><a href="{{ url('/login') }}">Login</a></li>
				@else
					<li class="nav-menu-item"><a href="#">Logout</a></li>
				@endif
				<!--li class="nav-menu-item"><a href="{{ url('api/v1/price-lists') }}">API</a></li-->
				
			</ul>
			<div class="hamburger"><span></span></div>

			<div class="sidebar-slide-in">
				<ul class="sidebar-links">
					<li><a href="{{ url('/') }}">Home</a></li>
					
					<li><a href="{{ url('reports') }}">Reports</a></li>
					<li class="nav-menu-item"> <a href="{{ url('market-data') }}">Market Data</a></li>
					@if( !Auth::guest() )
					<li class="nav-menu-item"><a href="{{ url('/login') }}">Login</a></li>
					@else
						<li class="nav-menu-item"><a href="url('/logout')">Logout</a></li>
					@endif
				</ul>
			</div>
		</nav>
	<!-- END OF NAVIGATION BAR -->
	
		@yield('page-content')
	
	
		@include('footer')

		<!-- JAVASCRIPTS -->
		<!--script src="{{ url('assets/js/angular.min.js') }}"></script-->
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-route.js"></script>
		<script src= "{{url('assets/js/jquery.js')}}"></script>
		<script src= "{{url('assets/js/jquery.webticker.min.js')}}"></script>
		<script src= "{{url('assets/js/bootstrap.min.js')}}"></script>
		<script src= "{{url('assets/js/jqueryDataTables.min.js')}}" ></script>
		
		<script src="https://code.highcharts.com/stock/highstock.js"></script>
		<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
		 <script rel="stylesheet" src="{{ URL::to('assets/js/jquery.datetimepicker.full.min.js') }}"></script>
		<script src= "{{url('assets/js/instrumentSearch.js')}}" ></script>
		<script src= "{{url('assets/js/instrumentStockData.js')}}" ></script>
		<script src= "{{url('assets/js/main.js')}}" ></script>
		
</body>
</html>