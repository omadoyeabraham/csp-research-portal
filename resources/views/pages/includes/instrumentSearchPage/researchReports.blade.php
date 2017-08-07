<div id="researchReports" class="tab-pane fade">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
				<table id="researchReportsTabTable" class="table table-bordered table-striped w100p margin-center" width="100%">
					<thead>
						<tr class="text-center">
							<td style="background: rgb(26,33,85); color: #fff">Report Name</td>
							<td style="background: rgb(26,33,85); color: #fff">Date Published</td>
							<td style="background: rgb(26,33,85); color: #fff"></td>
						</tr>
					</thead>
					<tbody>
						@foreach($researchReports as $researchReport)
							<tr class="text-center">
								<td>
									<a href="{{ $researchReport->file_url }}" style="color: rgb(26,33,85)">
										{{$researchReport->report_name}}
									</a>
								</td>
								<td>{{$researchReport->date}}</td>
								<td>
									<!--a href="#" class="btn btn-reports-page">Read Online</a-->
									<a href="{{ $researchReport->file_url  }}" class=" btn-info ">Download</a>
								</td>
							</tr>
						@endforeach

					</tbody>
				</table>
		</div>
	</div>
</div>