@extends('frontend.layouts.app')
@section('main_content')
<!-- Register Section -->
<section class="contact-section pad-80">
	<div class="container">
		<div class="row">
			<div class="col-md-5 m-auto">
				<h5 class="font-w-700 mb-4 text-center">Login With User Credentials</h5>
				<form action="{{route('login.customer')}}" method="post" class="register-form box-shadow-1 br-5 p-4">
					@csrf
					<div class="row p-4">
						<div class="col-md-12 col-xs-12">
							<div class="form-group">
								<input type="email" name="email" required class="form-control" placeholder="Enter Email *">
							</div>
						</div>
						<div class="col-md-12 col-xs-12">
							<div class="form-group">
								<input type="password" name="password" required class="form-control" placeholder="Enter Password *">
							</div>
						</div>
						<div class="col-sm-12 col-xs-12 mt-3">
							<div class="form-group mb-0">
								<button type="submit" class="btn bg-color-alpa custom-btn br-3 w-100">Login</button>
							</div>
						</div>

						<div class="col-md-12 col-xs-12 text-center pt-4">
							<span class="psw">New User? <a href="/customer-registration" style="color: #174f4f; text-decoration: underline;">Registration?</a></span>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- End Register Section-->
@endsection
