@extends('layouts.baseInstrumentSearch')

@section('page-content')
<section class="instrument-search-page-wrapper">

	<div class="container inner-wrapper">

		<header class="instrument-search-header ">
			<h3 class="instrument-name ml20">{{ $companyName }}</h3>
			<h4 class="instrument-date mr20"> {{ date("l,  F jS Y") }} </h4>
		</header>

		<div class="instrument-page-main-content mt10 ">
			
			<ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#overview">Overview</a></li>
				  <li><a data-toggle="tab" href="#companyInformation">Company Information</a></li>
				  <li><a data-toggle="tab" href="#financialReports">Corporate Reports</a></li>
				  <!--li><a data-toggle="tab" href="#mediaHighlights">Media Highlights</a></li-->
				   <li><a data-toggle="tab" href="#researchReports">Research Reports</a></li>
				  <li><a data-toggle="tab" href="#presentations">Presentations</a></li>
				  <li><a data-toggle="tab" href="#dividendsBonuses">Dividends & Bonuses</a></li>
			</ul>

			<div class="tab-content mt20 margin-center">
				@include('pages.includes.instrumentSearchPage.overview')
				@include('pages.includes.instrumentSearchPage.companyInformation')
				@include('pages.includes.instrumentSearchPage.financialReports')
				<!-- @include('pages.includes.instrumentSearchPage.mediaHighlights') -->
				@include('pages.includes.instrumentSearchPage.researchReports')
				@include('pages.includes.instrumentSearchPage.presentations')
				@include('pages.includes.instrumentSearchPage.dividendsBonuses')
			</div>

		</div>

	</div>

</section>


@endsection