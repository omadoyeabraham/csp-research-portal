@extends('layouts.base')

@section('page-content')

<div id="corporate-results-page-wrapper" class="container-fluid" >
	<div class="row">

		<div class="col-xs-offset-1 col-xs-10 text-center inner-wrapper" ng-app="CorporateResultsApp">
			<div class="section-heading ">Corporate Results  </div>
			
				<div class="table-wrapper w100p margin-center" ng-controller="MainController">

				
					<table  datatable="ng" dt-options="dtOptions" class="table dataTable stable-bordered w100p table-striped margin-center" width="100%">
						<thead>
							<tr>
								<th class="text-left">Company Name</th>
								<th class="text-left">Date</th>
								<th class="text-left">Period</th>
								<th class="text-right">Turnover</th>
								<th class="text-right">Dividend</th>
								<th class="text-right">PBT</th>
								<th class="text-right">PAT</th>
								<th ></th>
							</tr>
						</thead>
						<tbody >
							<tr ng-repeat="corporateResult in allCorporateResults">
								<td class="text-left">
									@{{ corporateResult.company_name }}
								</td>
								<td class="text-left"> @{{ corporateResult.date }} </td>
								<td class="text-left"> @{{ corporateResult.report_period }} </td>
								<td class="text-right"> @{{ corporateResult.turnover | number:2 }} </td>
								<td class="text-right"> @{{ corporateResult.dividend }} </td>
								<td class="text-right"> @{{ corporateResult.pbt | number  }} </td>
								<td class="text-right"> @{{ corporateResult.pat  | number }} </td>
								<td>
									<a href="@{{ corporateResult.file_url }}" class="btn btn-reports-page btn-text-white">Download</a>
								</td>
							</tr>
						</tbody>
					</table>

				</div>
				
			
		</div>
	</div>
</div>

@endsection