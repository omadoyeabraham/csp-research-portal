<!-- INSTRUMENT SEARCH -->
		<section id="homepage-instrument-search-section" class="box">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12">
						<h3 class="section-heading text-center text-uppercase">Corporate Profiles</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-offset-1 col-xs-10">
							
							{{ Form::open( 
								array( 
										'id' => 'instrument-search-form' ,  
										'action' => array('instrumentsController@showHomePage'),
										'url' => 'show-instrument-homepage'
							 		) 
							 ) }}

								<div class="form-group">
									<select class="form-control margin-center mt10" name="instrument_id" required>
										<option value='' disabled selected ">Select an instrument</option>
										 @foreach($tickers as $ticker)
                            				<option value="{{ $ticker->id }}"> {{ $ticker->ticker }} </option>
                        				@endforeach
									</select>
								</div>
								
								<div class="form-group text-center">
									<input type="submit" value="Search" class="btn btn-info btn-instrument-search mt10"> 
									{{--<a href="{{ url('instrument-search') }}" class="btn btn-info mt20">SUBMIT</a>--}}
								</div>

							{{ Form::close() }}
					</div>
				</div>
			</div>
		</section>
		<!-- END INSTRUMENT SEARCH -->