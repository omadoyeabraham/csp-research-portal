@extends('layouts.base')

@section('page-title') CardinalStone Research Portal @endsection

@section('page-content')
<div class="homepage-main-wrapper" ng-app="homePageApp" ng-controller="homePageController">
		
	@include('pages.includes.homePage.ticker-section')
	
	<div class="homepage-sidebar-content-wrapper ">
		<div class="container-fluid">
			<div class="row ">
				<div class="col-md-3 col-lg-1 p0 w15p" >
					@include('pages.includes.homePage.sidebar-section')
				</div>
				<div class="col-md-9 col-lg-11 homepage-main-content-wrapper p0 w85p mt20">
					<div class="container-fluid">
						<div class="row row-no-padding ">
							<div class="col-xs-12 col-sm-6 col-md-4">
								@include('pages.includes.homePage.african-global-markets-section')
							</div>
							<div class="col-xs-12 col-sm-6  col-md-4">
								@include('pages.includes.homePage.reports-media-section')
							</div>
							<div class="col-xs-12 col-sm-6  col-md-4">
								@include('pages.includes.homePage.fixed-income-section')
							</div>
						</div>
					</div>
					<div class="container-fluid">
						<div class="row row-no-padding">
							<div class="col-xs-12 col-sm-6  col-md-4">
								@include('pages.includes.homePage.corporate-information-section')
							</div>
							<div class="col-xs-12 col-sm-6  col-md-4">
								@include('pages.includes.homePage.market-summary-graph-section')
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4">
								@include('pages.includes.homePage.homepage-instrument-search-section')
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
		
	</div>
	
		

	<!--Subscribe div and ticker wrapper -->
	<div class="homepage-subscribe-ticker-wrapper">
		<div class="container-fluid">

			<div class="row">
				<div class="col-xs-offset-1 col-xs-10">
					@include('pages.includes.homePage.subscribe-section')
				</div>
			</div>
		</div>
	</div>
	<!--End Subscribe div and ticker wrapper -->

</div>

@endsection