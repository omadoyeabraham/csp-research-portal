@extends('layouts.base')

@section('page-content')
	
	<div id="reports-page-wrapper" class="container-fluid" ng-controller="priceListController ">
		<div class="row">
			<div class="col-xs-offset-1 col-xs-10 text-center inner-wrapper">
				<div class="section-heading">Daily Market Summaries</div>
					<div class="table-wrapper w100p margin-center">
		
				<table id="priceListTable" class="table table-bordered table-striped w100p margin-center reportsPageTable" width="100%" >

					<thead>
						<tr>
							<td>Date</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($marketSummaries as $marketSummary)
							<tr>
								<td>{{ $marketSummary->date }}</td>
								<td><a href="{{ url($marketSummary->file_url) }}" class="btn btn-reports-page">Download</a></td>
							</tr>
						@endforeach
					</tbody>
					<!--tbody>
						@for($i = 1; $i<32; $i++)
							<tr>
								<td><a href="{{ url('assets/docs/pdf/lorem.pdf') }}">{{ date( 'd-M-Y') }}</a></td>
								
								<td>
									<!a href="#" class="btn btn-reports-page">Read Online</a>
									<a href="{{ url('assets/docs/pdf/lorem.pdf') }}" class="btn btn-reports-page">Download</a>
								</td>
							</tr>
						@endfor
					</tbody-->
				</table>
					</div>
				
			</div>
		</div>
	</div>

@endsection