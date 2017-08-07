
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" ng-app="bondsApp">
  <div class="modal-dialog modal-lg" ng-controller="mainController">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header" style="background: rgb(26,33,85); color: #fff">
        <button type="button" class="close" data-dismiss="modal" style="color: #fff">&times;</button>
        <h4 class="modal-title">@{{ bondName }}</h4>
      </div>

      <div class="modal-body">
		    <div >
				<div class="row" >
					<div class="col-xs-12">
						<table class="table cardinalstone-table table-bordered w70p " >
							<thead>
								<tr>
									<th>Name</th>
									<th>Tenor</th>
									<th>Issue Date</th>
									<th>Maturity Date</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>11</td>
									<td>11</td>
									<td>11</td>
									<td>11</td>
								</tr>
							</tbody>
						</table>
						<table class="table table-bordered cardinalstone-table table-striped w100p" style="font-size: 11px">
							<thead>
								<tr>
									<th>Date</th>
									<th>TTM(yrs)</th>
									<th>Coupon</th>
									<th>Duration</th>
									<th>Bid Yield(%)</th>
									<th>Offer Yield(%)</th>
									<th>Bid Price</th>
									<th>Offer Price</th>
								</tr>
							</thead>
							<tbody>
								@foreach( $bonds as $bond)
									<tr>
										<td>{{ $bond->date or "N/A"}}</td>
										<td>{{ $bond->ttm  or "N/A" }}</td>
										<td>{{ $bond->coupon  or "N/A" }}</td>
										<td>{{ $bond->duration  or "N/A" }}</td>
										<td>{{ $bond->bid_yield  or "N/A" }}</td>
										<td>{{ $bond->offer_yield  or "N/A" }}</td>
										<td>{{ $bond->bid_price  or "N/A" }}</td>
										<td>{{ $bond->offer_price  or "N/A" }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		 </div>

     
    </div>
	<!-- End of modal content -->


  </div>

</div>


