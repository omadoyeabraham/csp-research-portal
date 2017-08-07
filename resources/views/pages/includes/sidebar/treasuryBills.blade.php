@if( is_null($exchangeRate) )
			<h5>Cannot load data due to poor internet connection, please check your connection and reload the page</h5>
		@else
			<table class="table table-striped table-condensed">
							<thead>
								<tr style="font-size:11px">
									<th>Tenor</th>
									<!--th>Discount</th-->
									<th class="text-right">Opening Bid </th>
								
									<th class="text-right">Change (%)</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td  class="text-left">90 days</td>
									
									<td class="text-right"> {{ $treasuryBill->FI_90D_opening_bid or '-' }} </td>
										@if( isset($treasuryBill->FI_90D_change) )
											@if($treasuryBill->FI_90D_change < 0)
												<td class="red text-right">
													{{ sprintf("%+.2f",$treasuryBill->FI_90D_change) }}
													<span class="glyphicon glyphicon-arrow-down red" ></span>
												</td>
											@endif
											@if($treasuryBill->FI_90D_change > 0)
												<td class="green text-right">
													{{ sprintf("%+.2f",$treasuryBill->FI_90D_change) }}
													<span class="glyphicon glyphicon-arrow-up green" ></span>
												</td>
											@endif
											@if($treasuryBill->FI_90D_change == 0)
												<td class="blue text-right">
													{{ sprintf("%+.2f",$treasuryBill->FI_90D_change) }}
													<span class="glyphicon glyphicon-minus blue" ></span>
												</td>
											@endif
										@endif
								</tr>
								<tr>
									<td class="text-left">180 days</td>
									
									<td class="text-right"> {{ $treasuryBill->FI_180D_opening_bid or '-' }} </td>
										@if( isset($treasuryBill->FI_180D_change) )
											@if($treasuryBill->FI_180D_change < 0)
												<td class="red text-right">
													{{ sprintf("%+.2f",$treasuryBill->FI_180D_change) }}
													<span class="glyphicon glyphicon-arrow-down red" ></span>
												</td>
											@endif
											@if($treasuryBill->FI_180D_change > 0)
												<td class="green text-right">
													{{ sprintf("%+.2f",$treasuryBill->FI_180D_change) }}
													<span class="glyphicon glyphicon-arrow-up green" ></span>
												</td>
											@endif
											@if($treasuryBill->FI_180D_change == 0)
												<td class="blue text-right">
													{{ sprintf("%+.2f",$treasuryBill->FI_180D_change) }}
													<span class="glyphicon glyphicon-minus blue" ></span>
												</td>
											@endif
										@endif
								</tr>
								<tr>
									<td class="text-left">360 days</td>
									
									<td class="text-right"> {{ $treasuryBill->FI_360D_opening_bid or '-' }} </td>
										@if( isset($treasuryBill->FI_360D_change) )
											@if($treasuryBill->FI_360D_change < 0)
												<td class="red text-right">
													{{ sprintf("%+.2f",$treasuryBill->FI_360D_change) }}
													<span class="glyphicon glyphicon-arrow-down red" ></span>
												</td>
											@endif
											@if($treasuryBill->FI_360D_change > 0)
												<td class="green text-right">
													{{ sprintf("%+.2f",$treasuryBill->FI_360D_change) }}
													<span class="glyphicon glyphicon-arrow-up green" ></span>
												</td>
											@endif
											@if($treasuryBill->FI_360D_change == 0)
												<td class="blue text-right">
													{{ sprintf("%+.2f",$treasuryBill->FI_360D_change) }}
													<span class="glyphicon glyphicon-minus blue" ></span>
												</td>
											@endif
										@endif
								</tr>
							</tbody>
						</table>
		@endif