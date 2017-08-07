<!-- corporate-information section -->
		<section id="homepage-corporate-information-section" class="box">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12">
						<h3 class="section-heading text-center text-uppercase">Corporate Results</h3>
					</div>
				</div>

				<div class="row">
					<div class=" col-xs-12">
						<table class="table table-striped table-condensed mb20" width="100%">
							<thead>
								<tr>
									<th>Company</th>
									<th class="text-right">Period</th>
									<th class="text-right">PBT</th>
									<th class="text-right">PAT</th>
								</tr>
							</thead>
							<tbody>
								@foreach($corporateResults as $corporateResult)
									<tr>
										<td class="text-left">
											<a href="{{ url('corporate-results') }}">
												{{ $corporateResult->company_name }}
											</a>
											
										</td>
										<td class="text-right">{{ $corporateResult->report_period }}</td>
										<td class="text-right">{{ number_format( $corporateResult->pbt) }} </td>
										<td class=" text-right"> {{ number_format( $corporateResult->pat)  }}</td>
									</tr>
								@endforeach	
							</tbody>
						</table>
						
					</div>
				</div>
			</div>
			<a href="{{ url('/corporate-results') }}" class=" " style="position: absolute; bottom: 10px; right: 25px;">More...</a>
		</section>
		<!-- End of corporate-information section -->