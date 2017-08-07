@extends('layouts.base')

@section('page-content')
	

	<div id="reports-page-wrapper" class="container-fluid" >
		<div class="row">
			<div class="col-xs-offset-1 col-xs-10 text-center inner-wrapper">
				<div class="section-heading">Reports Page</div>
					<div class="table-wrapper w100p margin-center">

				<table id="reportsTable" class="table table-bordered table-striped w100p margin-center reportsPageTable" width="100%">
					<thead>
						<tr>
							<td class="text-left vert-middle">Report Name/period</td>
							<td class="text-left vert-middle">Report Type</td>
							<td class="text-left vert-middle" >Company</td>
							<td class="text-left vert-middle">Date Published</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($allReports as $report)
							<tr>
								<!--td><a href="{{ $report['file_url'] }}">{{ $report['report_name'] or $report['report_period'] }}</a></td-->
								<td class="text-left">{{ $report['report_name'] or $report['report_period'] }}</td>
								<td class="text-left">{{ $report['report_type'] }}</td>
								<td class="text-left">{{ $report['company_name'] or "N/A" }}</td>
								<td class="text-left">{{ $report['date']  }}</td>
								<td>
									<!--a href="{{ $report['file_url'] }}" class="btn btn-reports-page">Download</a-->
									<button type="button" class="btn btn-reports-page" data-toggle="modal" data-target="#reportModal{{$loop->iteration}} ">View Report</button>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
					</div>

	@foreach($allReports as $report)
						
									<!-- Modal -->
			<div id="reportModal{{$loop->iteration}}" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-md">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header" style="background: rgb(26,33,85)">
			        <button type="button" class="close" data-dismiss="modal" style="color: #fff">&times;</button>
			        <!--h4 class="modal-title"></h4-->
			      </div>
			      <div class="modal-body">
			      		<form class="form-horizontal">	
							<div class="form-group">	
									<!--label class="control-label col-sm-3" for="reportName">Report Name</label-->
									<div class="col-sm-12">
											<h4 class="text-left">Report Name</h4>
											<input type="text" class="form-control" value="{{ $report['report_name'] or $report['report_period'] }}" id="reportName" readonly="true">
									</div>
							</div>
							<div class="form-group">	
									<!--label class="control-label col-sm-3" for="reportPreview">Report Preview</label-->
									<div class="col-sm-12">	
										<h4 class="text-left">Report Preview</h4>
										<textarea class="form-control" readonly="true" rows="10" style="text-align: left">{{ $report['preview'] or 'N/A' }}</textarea>
									</div>
							</div>

			      		</form>
			      		@if(isset($report['file_url']))
							 <a href="{{ str_replace('%', '%25', url($report['file_url']))  }}" 
							 class="btn btn-info mb20" target="_blank">
							 	Download Report
							 </a>
			      		@else
	
			      		@endif
			       

			      </div>
			      <!--div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div-->
			    </div>

			  </div>
			</div>

	@endforeach
			
		

			</div>
		</div>
	</div>

@endsection