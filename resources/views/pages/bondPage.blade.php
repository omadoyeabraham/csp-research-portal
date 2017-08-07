@extends('layouts.baseInstrumentSearch')

@section('page-content')
<section class="instrument-search-page-wrapper" id="bond-page-wrapper">

	<div class="container inner-wrapper">

		<header class="instrument-search-header ">
			<h3 class="instrument-name ml20">{{ $bondName }}</h3>
			<h4 class="instrument-date mr20"> {{ date("l,  F jS Y") }} </h4>
		</header>

		<!--div class="instrument-page-main-content mt10 ">
			<ul class="nav nav-tabs">
			</ul>
			<div class="tab-content mt20 margin-center">	
			</div>
		</div-->
		<div class="container">	
			<div class="row">
				<div class="col-xs-12">
					
						<table class="side-table table-striped mt20 mb20 p5 bond-side-table">
							<tbody>
								<tr class="text-left p5">
									<th >Name</th>
									<td>{{ $bondName }}</td>
								</tr>
								<tr class="text-left">
									<th>Tenor</th>
									<td>{{ $bondTenor }} years</td>
								</tr>
								<tr class="text-left">
									<th>Issue Date</th>
									<td>{{ $bondIssueDate }}</td>
								</tr>
								<tr class="text-left">
									<th>Maturity Date</th>
									<td>{{ $bondMaturityDate }}</td>
								</tr>
							</tbody>
						</table>
						<table class="table table-bordered cardinalstone-table table-striped w100p" style="font-size: 11px">
							<thead>
								<tr>
									<th>Date</th>
									<th>Coupon</th>
									<th>TTM(yrs)</th>
									<th>Duration(yrs)</th>
									<th>Bid Yield(%)</th>
									<th>Offer Yield(%)</th>
									<th>Bid Price</th>
									<th>Offer Price</th>
								</tr>
							</thead>
							<tbody>
								@foreach( $bonds as $bond)
									<tr>
										<td>{{ $bond['date'] or "N/A"}}</td>
										<td>{{ $bond['coupon']  or "N/A" }}</td>
										<td>{{ $bond['ttm']  or "N/A" }}</td>										
										<td>{{ $bond['duration'] or "N/A" }}</td>
										<td>{{ $bond['bid_ytm'] or "N/A" }}</td>
										<td>{{ $bond['offer_ytm']  or "N/A" }}</td>
										<td>{{ $bond['bid_price']  or "N/A" }}</td>
										<td>{{ $bond['offer_price']  or "N/A" }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
				</div>
			</div>
		</div>


	</div>

</section>


@endsection