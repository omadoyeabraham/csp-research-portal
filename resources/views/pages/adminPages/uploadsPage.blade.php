@extends('layouts.adminLayout')

@section('page-section')
	<div class="container" id="admin-uploads-wrapper">
		<div class="row">
			<div class="col-xs-offset-2 col-xs-8">
				<div class="card card-inverse card-primary">
					<div class="card-title section-heading text-center">Upload Files and Reports</div>
					<div class="card-block text-center">
					
						<form role="form" method="post" action="{{ url('upload-file') }}" id="uploads-form" enctype="multipart/form-data" ng-controller="uploadFormController">
							{!! csrf_field() !!}
							<div class="form-group">
									<select name="reportType" class="form-control w80p margin-center" value="{{ old('reportType') }}" ng-model="reportType" id="reportType">
										<option value="" disabled selected hidden>Select the report type</option>
										<option >Price List</option>
										<option>Market Summary</option>
										<option value="Corporate Result">Corporate Result</option>
									</select>
									
									<input type="text" name="reportDate" id="reportDate" class="form-control w80p margin-center mt10" placeholder="Select the report date" value="{{ old('reportDate') }}">
									</input>
									
									<!-- FIELDS FOR CORPORATE RESULT -->
									<input type="text" name="companyName" class="form-control w40p margin-center mt10 inline" placeholder="Company Name" ng-show ="reportType=='Corporate Result'">
									<input type="datetime" name="reportPeriod" class="form-control w40p margin-center mt10 inline" placeholder="Report period" ng-show ="reportType=='Corporate Result'">
									<input type="text" name="turnover" class="form-control w40p margin-center mt10 inline" placeholder="Turnover" ng-show ="reportType=='Corporate Result'">
									<input type="text" name="dividend" class="form-control w40p margin-center mt10 inline" placeholder="Dividend" ng-show ="reportType=='Corporate Result'">
									<input type="text" name="pbt" class="form-control w40p margin-center mt10 inline" placeholder="PBT" ng-show ="reportType=='Corporate Result'">
									<input type="text" name="pat" class="form-control w40p margin-center mt10 inline" placeholder="PAT" ng-show ="reportType=='Corporate Result'">
									<input type="text" name="grossEarnings" class="form-control w80p margin-center mt10 inline" placeholder="Gross Earnings" ng-show="reportType=='Corporate Result'">
									<input type="text" name="reportName" class="form-control w80p margin-center mt10 inline" placeholder="report name" ng-show="reportType=='Corporate Result'">


									<input type="file" name="reportFile" id="reportFile" class="form-control w80p margin-center mt10" value="{{ old('reportFile') }}"></input>

									
									<button type="button"  class=" btn btn-info  w30p mt20"  data-toggle="modal" data-target="#uploadConfirmationModal">
										 Next <i class="fa fa-arrow-right" aria-hidden="true"></i>
									</button>
									<!--a href="{{ url('corporate-results') }}">Corporate results</a-->
							</div>
						</form>



					</div>
				
				</div>
			</div>
		</div>

	</div>

				<!-- Modal -->
			<div id="uploadConfirmationModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title text-center">Confirm Upload</h4>
			      </div>
			      <div class="modal-body text-center">
				     
				       <table class="table table-striped">
				       		<tbody>
				       			<tr>
				       				<td  class="bold">Report Name</td>
				       				<td id="modalReportFile"></td>
				       			</tr>
				       			<tr>
				       				<td class="bold">Report Type</td>
				       				<td id="modalReportType"></td>
				       			</tr>
				       			<tr>
				       				<td class="bold">Report Date</td>
				       				<td id="modalReportDate"></td>
				       			</tr>
				       		</tbody>
				       </table>
			      </div>
			      <div class="modal-footer" style="text-align: center">
			      	<button type="submit"  form="uploads-form" class="btn btn-info mr20">
			      		Upload  <i class="fa fa-upload ml10" aria-hidden="true"></i>
			      	</button>
			        <button type="button" class="btn btn-danger" data-dismiss="modal">
			        	Cancel  <i class="fa fa-times-circle ml10" aria-hidden="true"></i>
			        </button>
			      </div>
			    </div>

			  </div>
			</div>

@endsection