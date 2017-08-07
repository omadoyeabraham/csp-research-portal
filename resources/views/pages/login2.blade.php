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
						<form role="form" class="margin-center">
							<input type="text" name="" placeholder="Email" class="form-control w50p m10 margin-center">
							<input type="password" name="" placeholder="Password" class="form-control w50p m10 margin-center">
							<div class="btn btn-info mb20">
								<i class="fa fa-sign-in" aria-hidden="true"></i><input type="submit" class="btn-fa" value="Sign-in"></input>
							</div>
						</form>
					</div>
					<div class="card-footer text-center">
						<p>Don't yet have an account with us?.</p>
						<a href="register">Register Here</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection