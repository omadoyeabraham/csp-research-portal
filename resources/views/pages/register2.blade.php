@extends('layouts.base')

@section('page-content')
<section id="login-page-section">
	<div class="container">
		<div class="row">
			<div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 login-page-wrapper">
				<div class="card card-outline-info">
					<div class="card-title card-block text-center">
						<h4>Register</h4>
					</div>
					<div class="card-body text-center">
						<form role="form" class="margin-center" method="POST" action="{{ url('register') }}">
							{{csrf_field()}}

							@if (count($errors) > 0)
							    <div class="alert alert-danger">
							    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							        <ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
							    </div>
							@endif
							
							<!-- FIRST NAME -->
							<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
									<input id="first_name" type="text" name="first_name" placeholder="First Name" class="form-control w50p margin-center" value="{{ old('first_name') }}" autofocus>
							</div>
							<!--EOF FIRST NAME -->

							<!-- LAST NAME -->
							<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
									<input id="last_name" type="text" name="last_name" placeholder="Last Name" class="form-control w50p  margin-center" value="{{ old('last_name') }}">
							</div>
							<!--EOF LAST NAME -->

							<!-- USERNAME -->
							<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
									<input id="username" type="text" name="username" placeholder="Username" class="form-control w50p  margin-center" value="{{ old('username') }}">
							</div>
							<!--EOF USERNAME -->

							<!-- EMAIL -->
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
									<input id="email" type="text" name="email" placeholder="Email" class="form-control w50p  margin-center" value="{{ old('email') }}">
							</div>
							<!--EOF EMAIL -->

							<!-- PHONE NUMBER -->
							<div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
									<input id="phone_number" type="text" name="phone_number" placeholder="Phone Number" class="form-control w50p  margin-center" value="{{ old('phone_number') }}">
							</div>
							<!--EOF PHONE NUMBER -->

							<!-- PASSWORD -->
							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
									<input id="password" type="password" name="password" placeholder="Password" class="form-control w50p  margin-center" value="{{ old('password') }}">
							</div>
							<!--EOF PASSWORD -->

							<!-- CONFIRM PASSWORD -->
							<div class="form-group{{ $errors->has('confirm') ? ' has-error' : '' }}">
									<input id="confirm" type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control w50p  margin-center" value="{{ old('confirm') }}">
							</div>
							<!--EOF CONFIRM PASSWORD -->

							<div class="btn btn-info mb20">
								<input type="submit" class="btn-fa" value="Register">
									<i class="fa fa-user-plus" aria-hidden="true"></i>
								</input>
							</div>
							
						</form>
					</div>
					<div class="card-footer text-center">
						<p>Already have an account with us?.</p>
						<a href="{{ url('login') }}">Login Here</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection