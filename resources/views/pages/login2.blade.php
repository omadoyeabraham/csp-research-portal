@extends('layouts.base')

@section('page-content')
<section id="login-page-section">
	<div class="container">
		<div class="row">
			<div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 login-page-wrapper">
				<div class="card card-outline-info" >
					<div class="card-title card-block text-center">
						<h4>LOGIN</h4>
					</div>
					<div class="card-body text-center">
						<form role="form" class="margin-center" method="POST" action="{{ url('/loginWithZanibal') }}">
						{{csrf_field()}}
							
							@if (count($errors) > 0 || session('invalidZanibalUserMessage'))
							    <div class="alert alert-danger">
							    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							        <ul class="list-unstyled">
							            @foreach ($errors->all() as $error)
							                <li >{{ $error }}</li>
							            @endforeach
							            @if (session('invalidZanibalUserMessage'))
											<li>{{ session('invalidZanibalUserMessage') }}</li>
							            @endif
							        </ul>
							    </div>
							@endif

							<input type="text" name="username" placeholder="Username" class="form-control w50p m10 margin-center">
							<input type="password" name="password" placeholder="Password" class="form-control w50p m10 margin-center">
							
								<button type="submit" class="btn-fa btn btn-info mb20" value="Sign-in">
									Sign-in
									<span><i class="fa fa-sign-in" aria-hidden="true"></i></span>
								</button>
						</form>
					</div>
					<!-- <div class="form-group">
					    <div class="col-md-6 col-md-offset-4">
					        <a href="{{ url('/auth/github') }}" class="btn btn-github"><i class="fa fa-github"></i> Github</a>
					        <a href="{{ url('/auth/twitter') }}" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
					        <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
					    </div>
					</div> -->
					<div class="card-footer text-center">
						<!-- <p>Don't yet have an account with us?.</p>
						<a href="register">Register Here</a> -->
						<div class="mb5">
							<p>Login using your social account</p>
						</div>
						<div class="mb10">
						<!-- 	<a class="button  btn-facebook mr20" href="{{ url('/auth/facebook') }}">
								<span><i class="fa fa-facebook" aria-hidden="true"></i></span>
							</a> -->
							<a class="button btn-google mr20" href="{{ url('/auth/google') }}">
								<span><i class="fa fa-google" aria-hidden="true"></i></span>
							</a>
							<a class="button btn-twitter " href="{{ url('/auth/twitter') }}">
								<span><i class="fa fa-twitter" aria-hidden="true"></i></span>
							</a>	
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection