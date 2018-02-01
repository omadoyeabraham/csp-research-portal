@extends('layouts.base')

@section('page-title') CardinalStone Research Portal @endsection

@section('page-content')

<div class="homepage-main-wrapper w100p" >
		
		<div class="row" >
			<div class="col-xs-12" >
				  @include('pages.includes.homePage.ticker-section') 
			</div>
		</div>
	

	<div class="container-fluid">
		
		<div class="row" id="downloads-row">

			<div class="col-sm-4 col-md-2 hidden-xs p5 pb0">
				<!-- Button for downloads -->
				<div class="price-list-btn text-center w100p margin-center">
					
					<div class="dropdown w100p">
					  <button class="btn btn-info btn-sidebar w100p">Downloads <i class="fa fa-download pull-right" aria-hidden="true"></i></button>
					  <div class="dropdown-content">
					    <a href="{{ url('/price-lists') }}" class="text-left">Price Lists</a>
					    <a href="{{ url('/market-summaries') }}" class="text-left">Market Summaries</a>
					    <a href="{{ url('/reports') }}" class="text-left">Reports</a>
					  </div>
					</div>

				</div>
				<!-- End Button for download -->
			</div>
			
			<div class="col-sm-8 col-md-10 col-xs-12 pl5 pr5">
				
			</div>

		</div>



		<div class="row" id="sidebar-main-content-wrapper">
			<div class=" col-sm-4 col-md-2 hidden-xs p5" style="background: #FFFFFF">
				   @include('pages.includes.homePage.sidebar-section') 
			</div>
			<div class=" col-sm-8 col-md-10 col-xs-12 homepage-main-content-wrapper pl5 pr5" >
				<div class="row-no-padding text-center">
					<div class="col-xs-12 col-md-6 col-lg-4 margin-center ">
						 @include('pages.includes.homePage.african-global-markets-section')  
					</div>
					<div class="col-xs-12 col-md-6 col-lg-4  margin-center ">
						  @include('pages.includes.homePage.market-summary-graph-section') 
					</div>
					<div class="col-xs-12 col-md-6 col-lg-4  margin-center ">
						 @include('pages.includes.homePage.fixed-income-section')  
					</div>
					<div class="col-xs-12 col-md-6 col-lg-4  margin-center ">
						 @include('pages.includes.homePage.reports-media-section') 
					</div>
					<div class="col-xs-12 col-md-6 col-lg-4  margin-center ">
					    @include('pages.includes.homePage.corporate-information-section')  
					    
					</div>
					<div class="col-xs-12 col-md-6 col-lg-4  margin-center ">
						 @include('pages.includes.homePage.homepage-instrument-search-section')  
					</div>
				</div>
			</div>
		</div>
	</div>


	
	{{-- @include('pages.includes.homePage.nse-asi-main-graph-section') --}}
	 @include('pages.includes.homePage.bondPage') 



</div>

 @include('pages.includes.homePage.subscribe-section')

@endsection