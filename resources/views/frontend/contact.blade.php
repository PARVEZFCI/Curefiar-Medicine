@extends('frontend.layouts.app')
@section('main_content')
<!-- Contact Section -->
<section class="contact-section pad-80">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-12">
				<div class="section-heading pab-20">
                    <h3>Contact with us</h3>
                    <p>It's very easy to get in touch with us. Just use the contact form or pay us a
                        visit for a coffee at the office. Dynamically innovate competitive technology after an expanded array of leadership.</p>
                </div>
                <div class="address-box">
                	<h5 class="font-w-700 mb-2">Head Office</h5>
                	<p>121 King St, VIC 3000, Bangladesh</p>
                </div>
			</div>
			<div class="col-md-7">
				<form action="#" method="" class="contact-us-form">
					<h5 class="font-w-700 mb-3">Reach us quickly</h5>
					<div class="row">
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<input type="text" name="" class="form-control" placeholder="Enter Name">
							</div>
						</div>
						<div class="col-md-6 col-xs-12">
							<div class="form-group">
								<input type="text" name="" class="form-control" placeholder="Enter Email">
							</div>
						</div>
						<div class="col-md-12 col-xs-12">
							<div class="form-group">
								<textarea class="form-control" rows="7" cols="25" placeholder="Message"></textarea>
							</div>
						</div>
						<div class="col-sm-12 col-xs-12">
							<div class="form-group text-center">
								<button class="btn bg-color-alpa custom-btn br-3">Send Message</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- End Contact Section-->
@endsection
