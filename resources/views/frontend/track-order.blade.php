@extends('frontend.layouts.app')
@section('main_content')
<!-- Register Section -->
<section class="track-section py-4">
	<div class="container">
		<div class="text-center pb-4">
            <h2 class="modtitle">Traking Order</h2>
        </div>

		<div class="row justify-content-center">
        	<div class="col-md-8">
        		<ul class="pb-4">
					<li>ডেলিভারী আপডেট পেতে আপনার Traking ID দিয়ে অর্ডার ট্র্যাক করুন।</li>
				</ul>
        		<form action="" method="">
        			<div class="input-group">
	                    <input type="text" name="traking_id" class="form-control track-control" required="" placeholder="Track Your Order. Please Enter Your Order Traking ID....">
	                    <div class="input-group-prepend">
	                        <button type="submit" class="btn btn-warning order-traking-button">
	                            <i class="fa fa-search"></i> Search
	                        </button>
	                    </div>
	                </div>
        		</form>
        	</div>
        </div>
	</div>
</section>
<!-- End Register Section-->
@endsection
