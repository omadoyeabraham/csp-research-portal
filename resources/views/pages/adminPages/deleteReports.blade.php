@extends('layouts.adminLayout')

@section('page-section')


	<div id="reports-page-wrapper" class="container-fluid" >
		<div class="row">
			<div class="col-xs-offset-1 col-xs-10 text-center inner-wrapper">
				<div class="section-heading">Delete Reports</div>
					<div class="table-wrapper w100p margin-center">
						
				<table id="reportsTable" class="table table-bordered table-striped w100p margin-center reportsPageTable" width="100%">
					<thead>
						<tr>
							<td>Report Name</td>
							<td>Report Type</td>
							<td>Date Published</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($allReports as $report)
							<tr>
								<td>{{ $report['report_name'] }}</td>
								<td>{{ $report['report_type'] }}</td>
								<td>{{ $report['file_date'] }}</td>
								<td>
									<form action="delete-report" method="post">
										{!! csrf_field() !!}
										<input type="hidden" name="reportID" value="{{ $report['id'] }}">
										<input type="hidden" name="reportType" value="{{ $report['report_type'] }}">
										<input type="submit" name="deleteReport" value="Delete" name="deleteReport" class="btn btn-reports-page btn-reports-page-delete ">
									</form>
								</td>
							</tr>

						@endforeach
						

						
					</tbody>
				</table>
					</div>
				
			</div>
		</div>
	</div>

@endsection