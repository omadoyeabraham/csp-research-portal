		<!-- TICKER SECTION -->
		<section id="ticker-section" >
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12 text-center">
						<ul id="WebTicker" class="list-unstyled list-inline">
						  	
 							@if(  is_null($webTickers) )
								<li>Unable to get web tickers because of poor internet connection. Please check your connection and reload the page</li>
 							@else
								@foreach($webTickers as $webTicker)
									<li>
										<span style="font-size: 1.5rem"> {{ $webTicker->symbol }} </span>
										<span style="font-size: 1.4rem"> {{ $webTicker->closePrice }} </span>
										<span style="font-size: 1.3rem" class="{{ $webTicker->percentageChangeStatus}} "> 
											{{ $webTicker->percentageChange }}
											<span class="glyphicon {{$webTicker->percentageChangeImage }} {{ $webTicker->percentageChangeStatus}} ">  </span>
										</span>
										<span class="ticker-divider"></span>
									</li>
								@endforeach 
 							@endif
							
	
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!-- END OF TICKER SECTION-->