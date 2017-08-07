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
	<style type="text/css">
		.no-js #loader { display: none;  }
		.js #loader { display: block; position: absolute; left: 100px; top: 0; }
		.se-pre-con {
			position: fixed;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background: url(assets/img/17.gif) center no-repeat #fff;
		}
	</style>
	<script src= "{{url('assets/js/jquery.min.js')}}"></script>
	<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script-->
	<script type="text/javascript">
		$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
	</script>
	
</head>
<body >
	<div class="se-pre-con"></div>
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
	
		
		
		<div class="container-fluid admin-homepage-wrapper margin-center">
			<div class="row">

				<div class="col-xs-3 col-md-2 flex-child-1">
					@include('pages.includes.adminPage.sidebar')
				</div>

				<div class="col-xs-9 col-md-10 flex-child-2">
					 @if(session()->has('statusDanger') )
                      <div class="alert alert-danger">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color: rgb(26,33,85)">&times;</a>
                         {{ session('statusDanger') }}
                      </div>
               @endif

               @if(session()->has('statusSuccess') )
                      <div class="alert alert-success">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color: rgb(26,33,85)">&times;</a>
                         {{ session('statusSuccess') }}
                      </div>
               @endif
				  

					@yield('page-content')
				</div>
				
			</div>
		</div>
	
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
		<script src= "{{url('assets/js/jqueryDataTables.min.js')}}" ></script>
		<!--script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script-->
		<script type="text/javascript " src="{{ url('assets/js/angular-datatables.min.js') }}"></script>
		<!--script src="https://code.highcharts.com/stock/highstock.js"></script-->
		<!--script src="https://code.highcharts.com/stock/modules/exporting.js"></script-->
		<script src= "{{url('assets/js/highstocks.min.js')}}" ></script>
		<script src= "{{url('assets/js/exporting.js')}}" ></script>
		<!--script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script-->
		 <script rel="stylesheet" src="{{ URL::to('assets/js/jquery.datetimepicker.full.min.js') }}"></script>
		<!--script src= "{{url('assets/js/main.js')}}" ></script-->
		<!--script src= "{{url('assets/js/instrumentSearch.js')}}" ></script-->
		<!--script src= "{{url('assets/js/marketDataApp.js')}}" ></script-->
		<!--script src="{{ url('assets/js/angular/homePageApp/homePageApp.js') }}"></script-->

		<script type="text/javascript">
				$(function() {
		     var pageurl = window.location.href;//.substr(window.location.href
		//.lastIndexOf("/")+1);
			console.log('page is ' + pageurl);

		     $(".list-wrapper a").each(function(){
		     			console.log($(this).attr("href"));
		          if ($(this).attr("href") == pageurl || $(this).attr("href") == '' ){
		          
		          $(this).addClass("active-tab");
		         }
		     })
		});

	</script>
</body>
</html>