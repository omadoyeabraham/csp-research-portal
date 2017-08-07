		@if( is_null($stockGainersLosers) )
			<h5>Cannot load data due to poor internet connection, please check your connection and reload the page</h5>
		@else
			<table class="table table-striped text-center">
				<tbody>
					{{--
						<tr ng-repeat="stocks in stockGainersLosers">
							<td class="gainers-losers-stock text-left">
								@{{ stocks.loss_symbol }}
							</td>
							<td class="gainers-losers-percentage red text-right">
								@{{ stocks.loss_percentPriceChange | number:2 }}%
							</td>
						</tr>
					--}}

					@foreach($stockGainersLosers as $stockGainersLoser)
						<tr>
							<td class="gainers-losers-stock  ml10 text-left">
								{{ $stockGainersLoser->loss_symbol }}
							</td>
							<td class="gainers-losers-percentage green text-right">
								{{ number_format($stockGainersLoser->loss_percentPriceChange, 2) }}%
							</td>
						</tr>
					@endforeach

				</tbody>
			</table>
		@endif