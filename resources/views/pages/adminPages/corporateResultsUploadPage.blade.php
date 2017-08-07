@extends('layouts.base')

@section('page-content')
<div class="container">
	<div class="row">
		<div class="col-xs-offset-2 col-xs-8">
			<div class="card card-inverse card-primary">
				<div class="card-title section-heading text-center">Upload New Corporate result details</div>
					<div class="card-block text-center">
			
						<form role="form" class="">
							<div class="form-group">
								<input type="text" name="" class="form-control w70p margin-center mt10 block" placeholder="Company Name">
								<input type="datetime" name="" class="form-control w35p margin-center mt10 inline" placeholder="Report Date">
								<input type="datetime" name="" class="form-control w35p margin-center mt10 inline" placeholder="Report period">
								<input type="text" name="" class="form-control w35p margin-center mt10 inline" placeholder="Turnover">
								<input type="text" name="" class="form-control w35p margin-center mt10 inline" placeholder="Dividend">
								<input type="text" name="" class="form-control w35p margin-center mt10 inline" placeholder="PBT">
								<input type="text" name="" class="form-control w35p margin-center mt10 inline" placeholder="PAT">
								<input type="text" name="" class="form-control w70p margin-center mt10 inline" placeholder="Gross Earnings">
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

@endsection