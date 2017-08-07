@extends('layouts.base')

@section('page-content')
	
	<div id="reports-page-wrapper" class="container-fluid " >
		<div class="row">
			<div ng-app="marketDataApp" class=" col-xs-12 text-center inner-wrapper  margin-center" >
				<div class="section-heading">Market Data </div>
					<div class="table-wrapper w100p margin-center" id="marketDataTable-wrapper"  ng-controller="mainController">
						
				<table  id="marketDataTable" datatable="ng" dt-options="dtOptions" class="table dataTable table-bordered  table-striped table-condensed w100p margin-center reportsPageTable display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<td class="text-left">SYMBOL</td>
							<td class="text-right">P.CLOSE(N)</td>
							<td class="text-right">OPEN(N)</td>
							<td class="text-right">HIGH(N)</td>
							<td class="text-right">LOW(N)</td>
							<td class="text-right">CUR.PRICE(N)</td>
							<td class="text-right">CLOSE(N)</td>
							<td class="text-right">CHANGE(N)</td>
							<td class="text-right">CHANGE(%)</td>
							<td class="text-right">VOLUME</td>
							<td class="text-right">VALUE(N)</td>
							<td class="text-right">ACTION</td>
						</tr>
					</thead>
					<tbody>
					
						
						<tr ng-repeat="symbol in symbols">
							<td class="text-left">
								<a href="instrument-search/@{{ symbol.name }}">
									@{{ symbol.name }}
								</a>
							 	
							 </td>
							<td class="text-right"> @{{ symbol.previousClose }} </td>
							<td class="text-right"> @{{ symbol.openingPrice }} </td>
							<td class="text-right"> @{{ symbol.highPrice }} </td>
							<td class="text-right"> @{{ symbol.lowPrice }} </td>
							<td class="text-right"> @{{ symbol.currentPrice }} </td>
							<td class="text-right"> @{{ symbol.closingPrice }} </td>
							<td ng-class="{'text-danger-custom': symbol.priceGain < 0,
											'text-success-custom': symbol.priceGain > 0,
							}" class="text-right"> 
								@{{ symbol.priceGain }} 
							</td>
							<td ng-class="{'text-danger-custom': symbol.priceGainPercent < 0,
											'text-success-custom': symbol.priceGainPercent > 0,
							}" class="text-right">
								 @{{ symbol.priceGainPercent |number : 2}} 
								 <span ng-if="symbol.priceGainPercent == 0" class="glyphicon glyphicon-minus"></span>
								  <span ng-if="symbol.priceGainPercent > 0" class="glyphicon glyphicon-arrow-up"></span>
								   <span ng-if="symbol.priceGainPercent < 0" class="glyphicon glyphicon-arrow-down"></span>
							</td>
							<td class="text-right"> @{{ symbol.quantityTraded | currency:"" }} </td>
							<td class="text-right"> @{{ symbol.valueTraded | currency:"" }}</td>
							<td>
									<div class="btn btn-info btn-market-data  mb2" style="padding: 0px 4px">
										<a href="https://portal.cardinalstone.com/broker/desktop/public/user#/stb/mandate" class="white " style="font-size: 1.3rem">BUY</a>
									</div>
									<div class="btn btn-info btn-market-data mb2" style="padding: 0px 4px">
										<a href="https://portal.cardinalstone.com/broker/desktop/public/user#/stb/mandate" class="white " style="font-size: 1.3rem">SELL</a>
									</div>
							</td>
						</tr>

						
					</tbody>
				</table>
					</div>
						<!-- MODAL -->
						<div id="marketDataModal" class="modal fade" role="dialog">
							<div class="modal-dialog modal-lg">

								    <!-- Modal content-->
								<div class="modal-content">
								    <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">CEDARCHINWUBA.PLC</h4>
								     </div>
								     <div class="modal-body">
									       <div class="row">
												<div class="col-xs-6">
													<div id="marketDataGraph" style=" height:250px;">
														
													</div>
												</div>
											</div>
								     </div>
								     <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								     </div>
								 </div>

							</div>
						</div>

						<!-- END OF MODAL -->
			</div>
		</div>
	</div>
@include('footer')
@endsection