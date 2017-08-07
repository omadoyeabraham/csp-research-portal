<div id="overview" class="tab-pane fade in active" ng-app="instrumentDataApp">

	<div class="row  text-center" ng-controller="mainController" ng-cloak>	

		<div class=" col-xs-12 col-md-12">	
			<div class="row">
				<div class="col-xs-12">
					<div id="instrument-graph" class="mb20"></div>
				</div>

				<div class="col-xs-12">
				
				</div>
			</div>
		</div>

		<div class="col-xs-12 ">	

			<div class="col-xs-12 col-md-6">
				

			<table class="table table-striped side-table">
				<tbody>
				
					<tr>
						<th class="text-left">Sector</th>
						<td class="text-left">{{ $companyProfile['sector'] or 'N/A' }}</td>
					</tr>
					<tr>
						<th class="text-left">Market Cap (Mils)</th>
						<td class="text-left">
							@if($companyProfile['market_cap'] === "")
								N/A
							@elseif(isset($companyProfile['market_cap']) )
								{{ $companyProfile['market_cap']  }}
							@else
								N/A
							@endif
						</td>
					</tr>
					<tr>
						<th class="text-left">Day's High</th>
						<td class="text-left">@{{ highPrice }}</td>
					</tr>
					<tr>	
						<th class="text-left">52 Week High</th>
						<td class="text-left">6.50</td>
					</tr>
					<tr>	
						<th class="text-left">52 Week Low</th>
						<td class="text-left">3.48</td>
					</tr>
					<tr>	
						<th class="text-left">Volume</th>
						<td class="text-left">@{{ volume }}</td>
					</tr>
					<tr>
						<th class="text-left">Value</th>
						<td class="text-left">@{{ value | currency:"" }}</td>
					</tr>
				
				</tbody>
		   </table>
				
			</div>

			<div class="col-xs-12 col-md-6">
					<table class="table table-bordered table-striped" id="seven-days-table">
				<thead>
					<tr>
						<th class="text-left">Date</th>
						<th class="text-right">Price</th>
						<th  class="text-right">No Of Deals</th>
					</tr>
				</thead>
				<tbody>
					@foreach($sevenDayTrades as $trade)
						<tr>
							<td  class="text-left">{{ $trade->date or 'N/A' }}</td>
							<td class="text-right">{{ $trade->close or 'N/A' }}</td>
							<td class="text-right">{{$trade->volume or 'N/A'}}</td>
						</tr>
					@endforeach
					
					
				</tbody>
			</table>
			</div>

		</div>

	</div>
	
</div>