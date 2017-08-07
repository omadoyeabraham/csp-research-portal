
<section id="fixed-income-section"  class="box">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<h3 class="section-heading text-center text-uppercase">Fixed Income</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12" >
				<ul class="nav nav-tabs my-nav-tabs">
					<li class="active"><a href="#fi-search" data-toggle="tab">Instruments</a></li>
					<li ><a href="#benchmark-bonds" data-toggle="tab">Benchmark Bonds</a></li>
					<li ><a href="#treasury-bills" data-toggle="tab"> Bills</a></li>
				</ul>

				<div class="tab-content">

					<!--Benchmark bonds section -->
					<div id="benchmark-bonds" class="tab-pane fade in ">
						<table class="table table-striped table-condensed">
							<thead>
								<tr>
									<th>Tenor</th>
									<th  class="text-right">Opening Yield</th>
									<th  class="text-right">Closing Yield</th>
									<th  class="text-right">Change (%)</th>
								</tr>
							</thead>
							<tbody >
								<tr>
									<td class="text-left">5 Year</td>
									<td class="text-right"> {{ $benchMarkBonds[0]->opening_yield }} </td>
									<td class=" text-right"> {{$benchMarkBonds[0]->closing_yield }} </td>
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
								</tr>
								<tr>
									<td class="text-left">10 Year</td>
									<td class="text-right"> {{ $benchMarkBonds[1]->opening_yield }} </td>
									<td class=" text-right"> {{$benchMarkBonds[1]->closing_yield }} </td>
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
								</tr>
								<tr>
									<td class="text-left">20 Year</td>
									<td class="text-right"> {{ $benchMarkBonds[2]->opening_yield }} </td>
									<td class=" text-right"> {{$benchMarkBonds[2]->closing_yield }} </td>
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
								</tr>
							</tbody>
						</table>
					</div>
					<!--End Benchmark bonds section -->
					
					<!--Treasury bills tab -->
					<div id="treasury-bills" class="tab-pane fade">
						<table class="table table-striped table-condensed">
							<thead>
								<tr>
									<th>Tenor</th>
									<!--th>Discount</th-->
									<th class="text-right">Opening Bid </th>
									<th class="text-right">Closing Bid</th>
									<th class="text-right">Change (%)</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td  class="text-left">90 days</td>
									
									<td class="text-right"> {{ $treasuryBill->FI_90D_opening_bid }} </td>
									<td class=" text-right"> {{ $treasuryBill->FI_90D_closing_bid }} </td>
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
								</tr>
								<tr>
									<td class="text-left">180 days</td>
									
									<td class="text-right"> {{ $treasuryBill->FI_180D_opening_bid }} </td>
									<td class=" text-right"> {{ $treasuryBill->FI_180D_closing_bid }} </td>
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
								</tr>
								<tr>
									<td class="text-left">360 days</td>
									
									<td class="text-right"> {{ $treasuryBill->FI_360D_opening_bid }} </td>
									<td class=" text-right"> {{ $treasuryBill->FI_360D_closing_bid }} </td>
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
								</tr>
							</tbody>
						</table>
					</div>
					<!--End Treasury bills tab -->

					<!-- Search tab -->
					<div id="fi-search" class="tab-pane fade in active">
						<div class="row">
							<div class="col-xs-offset-1 col-xs-10">
									
									{{ Form::open( 
										array( 
												'id' => 'fixed-income-search-form' ,  
												'action' => array('pagesController@showBondPage'),
												'url' => 'bond-page'
									 		) 
									 ) }}

										<div class="form-group">
											<select id="bond-select" class="form-control margin-center mt20" name="bond_id" required>

												<option value='' disabled hidden selected ">Select an instrument</option>
												 @foreach($bonds as $bond)
		                            				<option value="{{ $bond->bond_id }}"> {{ $bond->bond_name }} </option>
		                        				@endforeach
											</select>
										</div>
										
										<div class="form-group text-center">
											<input type="submit" value="Search" class="btn btn-info btn-instrument-search mt10">
											<!--input type="button" name="" value="click" data-toggle="modal" data-target="#myModal"--> 

											<!-- Trigger the modal with a button -->
											<!--button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button-->
											
											{{--<a href="{{ url('instrument-search') }}" class="btn btn-info mt20">SUBMIT</a>--}}
										</div>

									{{ Form::close() }}
							</div>
					</div>
					</div>
					<!-- End of search tab -->

				</div>
			</div>
		</div>
	</div>
</section>