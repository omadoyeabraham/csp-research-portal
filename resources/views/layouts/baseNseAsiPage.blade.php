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
	<!--script type="text/javascript" src="{{ url('assets/js/pace.min.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="{{ url('assets/css/0-tools/pace-theme-flash.scss') }}"-->
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	 <link rel="stylesheet" href="{{ URL::to('assets/css/0-tools/jquery.datetimepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/css/main.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/css/0-tools/font-awesome/css/font-awesome.min.css') }}">
	<style type="text/css">
		.no-js #loader { display: none;  }
		.js #loader { display: block; position: absolute; left: 100px; top: 0; }
		.progress-wrapper{
			*width: 100%;

		}
		.se-pre-con {
			position: fixed;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background: url(assets/img/17.gif) center no-repeat #fff;
		}

		.window-loading {
		    *position: absolute;
		    *top: 35%;
		    *left: 40%;
		    *margin-top: -50px;
		    *margin-left: -50px;
		    *width: 400px;
		    *height: 50px;
		    *z-index: 9999;
		}
		
	</style>
	<script src= "{{url('assets/js/jquery.min.js')}}"></script>
	<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script-->
	<script type="text/javascript">
		$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");
		//$(".progress").fadeOut("slow");
	});
	</script>
</head>
<body >
	<div class="se-pre-con"></div>
	<div class="homepage-entire-page-wrapper">
	
	
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
				<li class="nav-menu-item"><a href="{{ url('/african-global-market') }}">Admin</a></li>
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
			
			<!--script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.js"></script-->
		    <script src= "{{url('assets/js/angular.min.js')}}" ></script>
		    <script src= "{{url('assets/js/angular-route.min.js')}}" ></script>
			<!--script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-route.js"></script-->
			<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script-->
			<!--script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script-->
			<script src= "{{url('assets/js/jquery.webticker.min.js')}}"></script>
			<!-- Latest compiled and minified JavaScript -->
			<!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script-->
			<script src= "{{url('assets/js/bootstrap.min.js')}}" ></script>
			<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/fh-3.1.2/r-2.1.0/sc-1.4.2/datatables.js"></script>
			
			<!--script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script-->
			<script type="text/javascript " src="{{ url('assets/js/angular-datatables.min.js') }}"></script>

			
			<!--script src="https://code.highcharts.com/stock/highstock.js"></script-->
			<!--script src="https://code.highcharts.com/stock/modules/exporting.js"></script-->
			<script src= "{{url('assets/js/highstocks.min.js')}}" ></script>
			<script src= "{{url('assets/js/exporting.js')}}" ></script>
			<!--script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script-->
			 <script rel="stylesheet" src="{{ URL::to('assets/js/jquery.datetimepicker.full.min.js') }}"></script>
			 <script src= "{{url('assets/js/nse-asi-page.js')}}" ></script>
			<script src= "{{url('assets/js/main.js')}}" ></script>
			
			
			<!--script src="{{ url('assets/js/angular/homePageApp/homePageApp.js') }}"></script-->
		</div>
</body>
</html>