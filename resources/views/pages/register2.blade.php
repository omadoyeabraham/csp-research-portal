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
						<form role="form" class="margin-center">
					<!-- 		<div class="row">
								<div class="col-sm-6">
									<input type="text" name="" placeholder="First Name" class="form-control m10 margin-center">
								</div>
								<div class="col-sm-6">
									<input type="text" name="" placeholder="Last Name" class="form-control  m10 margin-center">
								</div>
								<div class="col-sm-6">
									<input type="text" name="" placeholder="Email" class="form-control m10 margin-center">
								</div>
								<div class="col-sm-6">
									<input type="text" name="" placeholder="Phone Number" class="form-control m10 margin-center">
								</div>
								<div class="col-sm-6">
									<input type="password" name="" placeholder="Password" class="form-control m10 margin-center">
								</div>
								<div class="col-sm-6">
									<input type="password" name="" placeholder="Confirm Password" class="form-control m10 margin-center">
								</div>
							</div> -->
							
							<input type="text" name="" placeholder="First Name" class="form-control w50p m10 margin-center">
							<input type="text" name="" placeholder="Last Name" class="form-control w50p m10 margin-center">
							<input type="text" name="" placeholder="Email" class="form-control w50p m10 margin-center">
							<input type="text" name="" placeholder="Phone Number" class="form-control w50p m10 margin-center">
							<input type="password" name="" placeholder="Password" class="form-control w50p m10 margin-center">
							<input type="password" name="" placeholder="Confirm Password" class="form-control w50p m10 margin-center">
							<div class="btn btn-info mb20">
								<i class="fa fa-user-plus" aria-hidden="true"></i><input type="submit" class="btn-fa" value="Register"></input>
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