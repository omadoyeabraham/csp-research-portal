@extends('layouts.adminLayout')

@section('page-section')
	<div class="container" id="admin-uploads-wrapper">
		<div class="row">
			<div class="col-xs-offset-2 col-xs-8">
				<div class="card card-inverse card-primary">
					<div class="card-title section-heading text-center">Upload Excel Templates</div>
					<div class="card-block text-center">
					
						<form role="form" method="post" action="{{ url('upload-template') }}" id="uploads-form" enctype="multipart/form-data" ng-controller="uploadFormController">
							{!! csrf_field() !!}
							<div class="form-group">
									<select name="templateType" class="form-control w80p margin-center" value="{{ old('templateType') }}" ng-model="templateType" id="templateType">
										<option value="" disabled selected hidden>Select the template type</option>
										<option value="African & Global Markets">African & Global Markets Template</option>
										<option value="Bonds & Tbills">Bonds & Tbills Template</option>
									</select>
									
									<input type="text" name="templateDate" id="templateDate" class="form-control w80p margin-center mt10" placeholder="Select the date" value="{{ old('templateDate') }}">
									</input>
									
									<input type="file" name="templateFile" id="templateFile" class="form-control w80p margin-center mt10" value="{{ old('templateFile') }}"></input>

									<button type="button"  class=" btn btn-info  w30p mt20"  data-toggle="modal" data-target="#uploadConfirmationModal">
										 Next <i class="fa fa-arrow-right" aria-hidden="true"></i>
									</button>
									
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
				       				<td class="bold">Template Type</td>
				       				<td id="modalTemplateType"></td>
				       			</tr>
				       			<tr>
				       				<td class="bold">Template Date</td>
				       				<td id="modalTemplateDate"></td>
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