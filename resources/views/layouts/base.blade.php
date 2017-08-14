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
		
		/* Dropdown Button */
.dropbtn {
    *background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.hover-dropdown {
    position: relative;
    display: inline-block;
      border-right: 1px solid #fff;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 250px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
   
    transition: all 1.7s ease-in-out
}
.drop-content
{
	 top: 36px;
}

/* Links inside the dropdown */
.dropdown-content button,
.dropdown-content a 
{
    color: black;
    padding: 12px 14px;
    font-size: 14px;
    text-decoration: none;
    background: #fff;
    font-weight: 200;
    display: block;
    transition: all ease .2s;
    width: 100%;
}

/* Change color of dropdown links on hover */
.drop-content button:hover,
.drop-content a:hover
 {
	background-color: rgb(26,33,85);
	color: #fff;
	cursor: pointer;
}

/* Show the dropdown menu on hover */
.hover-dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}

.drop-content{
	display: none;
	position: absolute;
	background: #f9f9f9;
	width: 100%;
	margin-top: 2px;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 999;
}
/*.drop-content a {
	color: rgb(26,33,85);
	padding: 5px 16px;
	text-decoration: none;
	display: block;
	font-weight: 100;
}*/
 #corp-btn:hover{
	background: rgb(26,33,85);
	color: #fff;
	box-shadow: none;
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
				<li class="nav-menu-item hover-dropdown">
					<form action="reports" method="POST" id="reportsFilterForm2">
						{!! csrf_field() !!}
					</form>
					
					<a href="#" class="dropbtn">Reports</a>
					<div class="dropdown-content drop-content">
						<button type="submit" class="text-left" form="reportsFilterForm2" name="filterParameter" value="company update">
							Company Updates
						</button>
						<button type="submit" class="text-left" form="reportsFilterForm2" name="filterParameter" value="full half year">
							Full & Half Year Reports
						</button>
						<button type="submit" class="text-left" form="reportsFilterForm2" name="filterParameter" value="sector report">
							Sector Reports
						</button>
						<button type="submit" class="text-left" form="reportsFilterForm2" name="filterParameter" value="economic update">
							Economic Reports
						</button>
						<a href="{{ url('/corporate-results') }}" id="corp-btn" class="text-left">Corporate Results</a>
			        </div>
				</li>
				
				<!--li class="nav-menu-item"><a href="{{ url('/african-global-market') }}">Admin</a></li-->
				<!-- <li class="nav-menu-item"><a href="{{ url('/african-global-market') }}">Admin</a></li> -->
				<li class="nav-menu-item"> <a href="{{ url('market-data') }}">Market Data</a></li>
				@if( Auth::guest() )
					<!-- <li class="nav-menu-item"><a href="{{ url('/login') }}" data-toggle="modal" data-target="#loginModal">Login</a></li> -->
					<li class="nav-menu-item"><a href="{{ url('/login') }}">Login</a></li>
				@else
					
					<li class="nav-menu-item">
						<a href="{{ url('/logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                     Logout</a>
					</li>
				@endif
				<!--li class="nav-menu-item"><a href="{{ url('api/v1/price-lists') }}">API</a></li-->
				
			</ul>
			<form id="logout-form"  action="{{ route('logout') }}" method="POST" style="display: none;">
					    {{ csrf_field() }}
					</form>
			<div class="hamburger"><span></span></div>

			<div class="sidebar-slide-in">
				<ul class="sidebar-links">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li><a href="{{ url('reports') }}">Reports</a></li>
					<li class="nav-menu-item"> <a href="{{ url('market-data') }}">Market Data</a></li>
					@if( !Auth::guest() )
					<!-- <li class="nav-menu-item"><a href="#">Login</a></li> -->
					<li class="nav-menu-item"><a href="{{ url('/login') }}">Login</a></li>
					@else
						<li class="nav-menu-item"><a href="url('/logout')">Logout</a></li>
					@endif
				</ul>
			</div>
		</nav>
	<!-- END OF NAVIGATION BAR -->

	<!-- Modal -->
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
	
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

			<link rel="stylesheet" href="https://cdn.datatables.net/scroller/1.4.2/css/scroller.dataTables.min.css">
			<script src="https://cdn.datatables.net/scroller/1.4.2/js/dataTables.scroller.min.js"></script>
			<script src="{{ url('assets/js/angular-datatables.scroller.min.js') }}"></script>
			<script src="https://cdn.datatables.net/fixedheader/3.1.2/js/dataTables.fixedHeader.min.js"></script>
			<script type="text/javascript" src="{{ url('assets/js/angular-datatables.fixedheader.min.js') }}"></script>
			<!--script src="https://code.highcharts.com/stock/highstock.js"></script-->
			<!--script src="https://code.highcharts.com/stock/modules/exporting.js"></script-->
			<script src= "{{url('assets/js/highstocks.min.js')}}" ></script>
			<script src= "{{url('assets/js/exporting.js')}}" ></script>
			<!--script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script-->
			 <script rel="stylesheet" src="{{ URL::to('assets/js/jquery.datetimepicker.full.min.js') }}"></script>
			<script src= "{{url('assets/js/main.js')}}" ></script>
			<script src= "{{url('assets/js/instrumentSearch.js')}}" ></script>
			<script src= "{{url('assets/js/marketDataApp.js')}}" ></script>
			<script src= "{{url('assets/js/DashboardApp.js')}}" ></script>
			<script src= "{{url('assets/js/bondsApp.js')}}" ></script>
			<script src= "{{url('assets/js/angular/corporateResultsApp.js')}}" ></script>
			<script src= "{{url('assets/js/angular/sideBarApp.js')}}" ></script>
			<script src= "{{url('assets/js/angular/scrollingTickersApp.js')}}" ></script>
			<!--script src="{{ url('assets/js/angular/homePageApp/homePageApp.js') }}"></script-->
		</div>
</body>
</html>