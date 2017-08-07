<div id="dividendsBonuses" class="tab-pane fade">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
				<table id="dividendsBonusesTabTable" class="table table-bordered table-striped w100p margin-center" width="100%">
					<thead>
						<tr class="text-center">
							<td style="background: rgb(26,33,85); color: #fff">Period</td>
							<td style="background: rgb(26,33,85); color: #fff">Dividend</td>
							<td style="background: rgb(26,33,85); color: #fff">Bonus</td>
							<td style="background: rgb(26,33,85); color: #fff">Closure of Register</td>
							<td style="background: rgb(26,33,85); color: #fff">AGM Date</td>
							<td style="background: rgb(26,33,85); color: #fff">Payment Date</td>
						</tr>
					</thead>
					<tbody>
						@foreach($dividendsBonuses as $dividendBonus)
							<tr class="text-center">
								<td>{{ $dividendBonus->period }}</td>
								<td>{{ $dividendBonus->dividend }}</td>
								<td>{{ $dividendBonus->bonus or "N/A"}}</td>
								<td>{{ $dividendBonus->closure_of_register or "N/A"}}</td>
								<td>{{ $dividendBonus->agm_date or "N/A"}}</td>
								<td>{{ $dividendBonus->payment_date or "N/A"}}</td>
							</tr>
						@endforeach

					</tbody>
				</table>
		</div>
	</div>
</div>