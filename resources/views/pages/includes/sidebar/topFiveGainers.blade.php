@if( is_null($stockGainersLosers) )
	<h5>Cannot load data due to poor internet connection, please check your connection and reload the page</h5>
	@else
		<table class="table table-striped text-center" >
			<tbody>
			{{-- 
				<tr ng-repeat="stocks in stockGainersLosers">
					<td class="gainers-losers-stock  ml10 text-left">
						@{{ stocks.gain_symbol }}
					</td>
					<td class="gainers-losers-percentage green text-right">
						@{{ stocks.gain_percentPriceChange | number:2 }}%
					</td>
				</tr>
			--}}

				@foreach($stockGainersLosers as $stockGainersLoser)
					<tr>
						<td class="gainers-losers-stock  ml10 text-left">
							{{ $stockGainersLoser->gain_symbol }}
						</td>
						<td class="gainers-losers-percentage green text-right">
							{{ number_format($stockGainersLoser->gain_percentPriceChange, 2) }}%
						</td>
					</tr>
				@endforeach
				
			</tbody>
		</table>
@endif