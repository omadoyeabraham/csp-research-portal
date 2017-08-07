
<section id="homepage-subscribe-section" class="mt40">
	<div class="container-fluid text-center">
		<div class="row">
			<div class="col-xs-offset-2 col-xs-8 col-md-offset-4 col-md-4">
				<h3 class="section-heading text-center text-white border-white mb5 mt5">Subscribe to our newsletter</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-offset-1 col-xs-10 subscribe-form-wrapper text-center">
					{{ Form::open( 
								array( 
										'id' => 'subscribe-form' ,  
										'action' => array('pagesController@createNewSubscriber'),
										'url' => 'subscribe'
							 		) 
							 ) }}
					
						{!! csrf_field() !!}
						<div class="subscribe-form-inputs-wrapper ">
							
								<div class="input-group-wrapper mb10">
									<!--label for="subscriber-name">Name</label-->
									<input type="text" name="name" placeholder="Name" class="form-control br2 mr0">
								</div>
						
								<div class="input-group-wrapper">
									<!--label for="subscriber-name">Email</label-->
									<input type="email" name="email" placeholder="Email" class="form-control" required>
								</div>
									<input type="submit" name="" value="Subscribe" class=" br2 btn btn-subscribe btn-info margin-center text-center mt10 mb20">	
						</div>
					{{ Form::close() }}
			</div>
		</div>
	</div>
</section>