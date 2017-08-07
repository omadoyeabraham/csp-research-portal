<!-- African and Global markets section -->
		<section id="homepage-african-global-markets-section" class="box">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12">
						<h3 class="section-heading text-center text-uppercase">African and Global Markets</h3>
					</div>
				</div>
				<div class="row">
					<div class=" col-xs-12">

						<ul class="nav nav-tabs ">
							<li class="active"><a href="#african-markets" data-toggle="tab">AFRICA</a></li>
							<li ><a href="#global-markets" data-toggle="tab">GLOBAL</a></li>
						</ul>

						<div class="tab-content">

							<!-- African markets -->
							<div id="african-markets" class="tab-pane fade in active">
								<table class="table table-condensed table-striped " width="100%">
									<tbody>
										<tr>
											<td class="text-left">JAISH</td>
											<td class=" text-right"> {{number_format($africanGlobalMarkets->JAISH_INDEX, 2)}} </td>
											@if($africanGlobalMarkets->JAISH_CHANGE < 0)
												<td class="red text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->JAISH_CHANGE) }}
													<span class="glyphicon glyphicon-arrow-down red" ></span>
												</td>
											@endif
											@if($africanGlobalMarkets->JAISH_CHANGE > 0)
												<td class="green text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->JAISH_CHANGE) }}
													<span class="glyphicon glyphicon-arrow-up green" ></span>
												</td>
											@endif
											@if($africanGlobalMarkets->JAISH_CHANGE == 0)
												<td class="blue text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->JAISH_CHANGE) }}
													<span class="glyphicon glyphicon-minus blue" ></span>
												</td>
											@endif
										</tr>
										<tr>
											<td class="text-left">NSEASI</td>
											<td class=" text-right">{{number_format($africanGlobalMarkets->NSE_ASI_INDEX, 2)}} </td>
											@if($africanGlobalMarkets->NSE_ASI_CHANGE < 0)
												<td class="red text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->NSE_ASI_CHANGE) }}
													<span class="glyphicon glyphicon-arrow-down red" ></span>
												</td>
											@endif
											@if($africanGlobalMarkets->NSE_ASI_CHANGE > 0)
												<td class="green text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->NSE_ASI_CHANGE) }}
													<span class="glyphicon glyphicon-arrow-up green" ></span>
												</td>
											@endif
											@if($africanGlobalMarkets->NSE_ASI_CHANGE == 0)
												<td class="blue text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->NSE_ASI_CHANGE) }}
													<span class="glyphicon glyphicon-minus blue" ></span>
												</td>
											@endif
										</tr>
										<tr>
											<td class="text-left">GGSECI</td>
											<td class=" text-right">{{number_format($africanGlobalMarkets->GGSECI_INDEX,2)}} </td>
											@if($africanGlobalMarkets->GGSECI_CHANGE < 0)
												<td class="red text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->GGSECI_CHANGE) }}
													<span class="glyphicon glyphicon-arrow-down red" ></span>
												</td>
											@endif
											@if($africanGlobalMarkets->GGSECI_CHANGE > 0)
												<td class="green text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->GGSECI_CHANGE) }}
													<span class="glyphicon glyphicon-arrow-up green" ></span>
												</td>
											@endif
											@if($africanGlobalMarkets->GGSECI_CHANGE == 0)
												<td class="blue text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->GGSECI_CHANGE) }}
													<span class="glyphicon glyphicon-minus blue" ></span>
												</td>
											@endif
										</tr>
										<tr>
											<td class="text-left">EGX30</td>
											<td class=" text-right">{{number_format($africanGlobalMarkets->EGX30_INDEX,2)}} </td>

											@if($africanGlobalMarkets->EGX30_CHANGE < 0)
												<td class="red text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->EGX30_CHANGE) }}
													<span class="glyphicon glyphicon-arrow-down red" ></span>
												</td>
											@endif
											@if($africanGlobalMarkets->EGX30_CHANGE > 0)
												<td class="green text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->EGX30_CHANGE) }}
													<span class="glyphicon glyphicon-arrow-up green" ></span>
												</td>
											@endif
											@if($africanGlobalMarkets->EGX30_CHANGE == 0)
												<td class="blue text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->EGX30_CHANGE) }}
													<span class="glyphicon glyphicon-minus blue" ></span>
												</td>
											@endif
											
										</tr>
									</tbody>
								</table>
							</div>

							<!-- Global markets -->
							<div id="global-markets" class="tab-pane fade">
								<table class="table table-striped table-condensed" width="100%">
									<tbody>
										<tr>
											<td class="text-left">S&P 500</td>
											<td class="text-right">{{number_format($africanGlobalMarkets->SP_500_INDEX,2)}}</td>
											@if($africanGlobalMarkets->SP_500_CHANGE < 0)
												<td class="red text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->SP_500_CHANGE) }}
													<span class="glyphicon glyphicon-arrow-down red" ></span>
												</td>
											@endif
											@if($africanGlobalMarkets->SP_500_CHANGE > 0)
												<td class="green text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->SP_500_CHANGE) }}
													<span class="glyphicon glyphicon-arrow-up green" ></span>
												</td>
											@endif
											@if($africanGlobalMarkets->SP_500_CHANGE == 0)
												<td class="blue text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->SP_500_CHANGE) }}
													<span class="glyphicon glyphicon-minus blue" ></span>
												</td>
											@endif
										</tr>
										<tr>
											<td class="text-left">DJIA</td>
											<td class=" text-right">{{number_format($africanGlobalMarkets->DJIA_INDEX,2)}}</td>
											@if($africanGlobalMarkets->DJIA_CHANGE < 0)
												<td class="red text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->DJIA_CHANGE) }}
													<span class="glyphicon glyphicon-arrow-down red" ></span>
												</td>
											@endif
											@if($africanGlobalMarkets->DJIA_CHANGE > 0)
												<td class="green text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->DJIA_CHANGE) }}
													<span class="glyphicon glyphicon-arrow-up green" ></span>
												</td>
											@endif
											@if($africanGlobalMarkets->DJIA_CHANGE == 0)
												<td class="blue text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->DJIA_CHANGE) }}
													<span class="glyphicon glyphicon-minus blue" ></span>
												</td>
											@endif
										</tr>
										<tr>
											<td class="text-left">FTSE</td>
											<td class="text-right">{{number_format($africanGlobalMarkets->FTSE_INDEX,2)}}</td>
											@if($africanGlobalMarkets->FTSE_CHANGE < 0)
												<td class="red text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->FTSE_CHANGE) }}
													<span class="glyphicon glyphicon-arrow-down red" ></span>
												</td>
											@endif
											@if($africanGlobalMarkets->FTSE_CHANGE > 0)
												<td class="green text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->FTSE_CHANGE) }}
													<span class="glyphicon glyphicon-arrow-up green" ></span>
												</td>
											@endif
											@if($africanGlobalMarkets->FTSE_CHANGE == 0)
												<td class="blue text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->FTSE_CHANGE) }}
													<span class="glyphicon glyphicon-minus blue" ></span>
												</td>
											@endif
										</tr>
										<tr>
											<td class="text-left">NIKKEL</td>
											<td class="text-right">{{number_format($africanGlobalMarkets->NIKKEL_INDEX,2)}}</td>
											@if($africanGlobalMarkets->NIKKEL_CHANGE < 0)
												<td class="red text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->NIKKEL_CHANGE) }}
													<span class="glyphicon glyphicon-arrow-down red" ></span>
												</td>
											@endif
											@if($africanGlobalMarkets->NIKKEL_CHANGE > 0)
												<td class="green text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->NIKKEL_CHANGE) }}
													<span class="glyphicon glyphicon-arrow-up green" ></span>
												</td>
											@endif
											@if($africanGlobalMarkets->NIKKEL_CHANGE == 0)
												<td class="blue text-right">
													{{ sprintf("%+.2f",$africanGlobalMarkets->NIKKEL_CHANGE) }}
													<span class="glyphicon glyphicon-minus blue" ></span>
												</td>
											@endif
										</tr>
									</tbody>
								</table>
							</div>

						</div>

					</div>
				</div>
			</div>
			
		</section>
		<!-- End of African and global markets section -->