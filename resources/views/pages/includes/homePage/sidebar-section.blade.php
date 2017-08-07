		{{-- THE SIDEBAR FOR THE HOMEPAGE --}}

<section id="homepage-sidebar-section" ng-app="SideBarApp">

	<!-- Tab for Equities -->
	<div class="card mb20 w100p margin-center">

		<div class="card-block">
			<h4 class="card-title text-center text-uppercase">Equities
				<span class="ml2 mt2" style="font-size: 9px"> [{{ date('Y-m-d') }}] </span> 
			</h4>
		</div>

		<ul class="nav nav-tabs my-nav-tabs-sidebar">
			<li class="active w50p">
				<a data-toggle="tab" href="#topFiveGainers">Gainers</a>
			</li>
			<li class="w50p">
				<a data-toggle="tab" href="#topFiveLosers">Losers</a>
			</li>
		</ul>

		<div class="tab-content" ng-controller="MainController">
			<div id="topFiveGainers" class="tab-pane fade in active">
				@include('pages.includes.sidebar.topFiveGainers')
			</div>
			<div id="topFiveLosers" class="tab-pane fade in ">
				@include('pages.includes.sidebar.topFiveLosers')
			</div>
		</div>

	</div>
	<!-- End of equities tab -->


	<!-- Fixed Income -->
	<div class="card mb20 w100p margin-center">

		<div class="card-block">
			<h4 class="card-title text-center text-uppercase">Fixed Income</h4>
		</div>

		<ul class="nav nav-tabs my-nav-tabs-sidebar">
			<li class="active w50p">
				<a data-toggle="tab" href="#benchmarkBonds">Bonds</a>
			</li>
			<li class="w50p">
				<a data-toggle="tab" href="#treasuryBills">Bills</a>
			</li>
		</ul>

		<div class="tab-content">
			<div id="benchmarkBonds" class="tab-pane fade in active">
				@include('pages.includes.sidebar.benchmarkBonds')
			</div>
			<div id="treasuryBills" class="tab-pane fade in ">
				@include('pages.includes.sidebar.treasuryBills')
			</div>
		</div>

	</div>
	<!-- End of Fixed Income Section-->


	<!-- Foreign Exchange Tab -->
	<div class="card mb20 w100p margin-center">

		<div class="card-block">
			<h4 class="card-title text-center text-uppercase">Foreign Exchange <!-- <span class="ml2 mt2" style="font-size: 9px"> [{{ $exchangeRate->date or '-' }}] </span> --> </h4>
		</div>

		<ul class="nav nav-tabs my-nav-tabs-sidebar">
			<li class="active w50p">
				<a data-toggle="tab" href="#officialRates">Official Rates</a>
			</li>
			<li class="w50p">
				<a data-toggle="tab" href="#parallelMarket">Parallel Market</a>
			</li>
		</ul>

		<div class="tab-content">
			<div id="officialRates" class="tab-pane fade in active">
				@include('pages.includes.sidebar.officialRates')
			</div>
			<div id="parallelMarket" class="tab-pane fade in ">
				@include('pages.includes.sidebar.parallelMarket')
			</div>
		</div>

	</div>
	<!-- End of foreign exchange tab -->

	


</section>