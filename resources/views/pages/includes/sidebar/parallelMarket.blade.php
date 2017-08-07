	@if( is_null($exchangeRate) )
			<h5>Cannot load data due to poor internet connection, please check your connection and reload the page</h5>
		@else
			<table class="table table-striped text-center">
				<tbody>
					<tr>
						<td class="gainers-losers-stock text-left">NGN/USD</td>  
						<td class="gainers-losers-price text-right">{{ $exchangeRate->ngn_usd_parallel or '-' }}</td> 
					</tr>
					<tr>
						<td class="gainers-losers-stock text-left"> NGN/GBP </td>  
						<td class="gainers-losers-price text-right">{{ $exchangeRate->ngn_gbp_parallel or '-' }}</td> 
					</tr>
					<tr>
						<td class="gainers-losers-stock text-left"> NGN/EUR </td>  
						<td class="gainers-losers-price text-right">{{ $exchangeRate->ngn_eur_parallel or '-' }}</td> 
					</tr>
				
				</tbody>
			</table>
		@endif