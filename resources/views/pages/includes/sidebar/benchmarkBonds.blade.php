@if( is_null($benchMarkBonds) )
			<h5>Cannot load data due to poor internet connection, please check your connection and reload the page</h5>
		@else
				<table class="table table-striped table-condensed">
							<thead>
								<tr style="font-size:11px">
									<th>Tenor</th>
									<th class="text-right">Opening Yield</th>
									<th class="text-right">Change (%)</th>
								</tr>
							</thead>
							<tbody >
								<tr>
									<td class="text-left  tenor">5 Year</td>
									<td class="text-right"> {{ $benchMarkBonds[0]->opening_yield or "N/A" }} </td>
										
										@if(isset($benchMarkBonds[0]->change)  )

												@if($benchMarkBonds[0]->change < 0)
													<td class="red text-right">
														{{ sprintf("%+.2f",$benchMarkBonds[0]->change) }}
														<span class="glyphicon glyphicon-arrow-down red" ></span>
													</td>
												@endif
												@if($benchMarkBonds[0]->change > 0)
													<td class="green text-right">
														{{ sprintf("%+.2f",$benchMarkBonds[0]->change) }}
														<span class="glyphicon glyphicon-arrow-up green" ></span>
													</td>
												@endif
												@if($benchMarkBonds[0]->change == 0)
													<td class="blue text-right">
														{{ sprintf("%+.2f",$benchMarkBonds[0]->change) }}
														<span class="glyphicon glyphicon-minus blue" ></span>
													</td>
												@endif

										@endif 
											
								</tr>
								<tr>
									<td class="text-left tenor">10 Year</td>
									<td class="text-right"> {{ $benchMarkBonds[1]->opening_yield or "N/A"}} </td>
										
										@if( isset($benchMarkBonds[1]->change) )

												@if($benchMarkBonds[1]->change < 0)
													<td class="red text-right">
														{{ sprintf("%+.2f",$benchMarkBonds[1]->change) }}
														<span class="glyphicon glyphicon-arrow-down red" ></span>
													</td>
												@endif
												@if($benchMarkBonds[1]->change > 0)
													<td class="green text-right">
														{{ sprintf("%+.2f",$benchMarkBonds[1]->change) }}
														<span class="glyphicon glyphicon-arrow-up green" ></span>
													</td>
												@endif
												@if($benchMarkBonds[1]->change == 0)
													<td class="blue text-right">
														{{ sprintf("%+.2f",$benchMarkBonds[1]->change) }}
														<span class="glyphicon glyphicon-minus blue" ></span>
													</td>
												@endif

										@endif
											
								</tr>
								<tr>
									<td class="text-left tenor">20 Year</td>
									<td class="text-right"> {{ $benchMarkBonds[2]->opening_yield or "N/A" }} </td>
										
										@if(isset( $benchMarkBonds[2]->change)  )

												@if($benchMarkBonds[2]->change < 0)
												<td class="red text-right">
													{{ sprintf("%+.2f",$benchMarkBonds[2]->change) }}
													<span class="glyphicon glyphicon-arrow-down red" ></span>
												</td>
											@endif
											@if($benchMarkBonds[2]->change > 0)
												<td class="green text-right">
													{{ sprintf("%+.2f",$benchMarkBonds[2]->change) }}
													<span class="glyphicon glyphicon-arrow-up green" ></span>
												</td>
											@endif
											@if($benchMarkBonds[2]->change == 0)
												<td class="blue text-right">
													{{ sprintf("%+.2f",$benchMarkBonds[2]->change) }}
													<span class="glyphicon glyphicon-minus blue" ></span>
												</td>
											@endif

										@endif
											
								</tr>
							</tbody>
						</table>
		@endif