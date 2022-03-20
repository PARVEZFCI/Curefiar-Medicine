@extends('frontend.layouts.app')
@section('main_content')
<!-- Contact Section -->
<section class="contact-section pad-80">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
    	    	<div class="section-right">
                    <div class="checkout-content checkout-cart">
					    <h2 class="secondary-title"><i class="fa fa-shopping-cart"></i>Shopping Cart </h2>
					    <div class="box-inner">
					        <div class="cart-container" id="cart">
								<table class="table table-bordered table-responsive">
								    <thead  style="width: 100%;">
								      <tr class="text-center">
								        <th>Image</th>
								        <th>Product Name</th>
								        <th>Price</th>
								        <th>Qty</th>
								        <th>Total</th>
								      </tr>
								    </thead>
								    <tbody>
								  		<tr>
									        <td>
									        	<img class="img-fluid" width="50" src="" alt="product image">
									        </td>
									        <td class="txt-cart">
									        	Basin Pillar Cock
									        </td>
									        <td class="txt-cart">
									        	680
									        </td>
									        <td class="txt-cart">
									        	1
									        </td>
									        <td class="txt-cart">
									        	680
									        </td>
								        </tr>
								    </tbody>
								</table>
							    <table class="table table-bordered table-hover">
						            <tfoot>
						                <tr>
					                        <td colspan="4" class="text-left">Total:</td>
					                        <td class="text-right">৳ 680.00</td>
					                    </tr>
						            </tfoot>
					            </table>
			 				</div>
					    </div>
					</div>
				</div>
    	    </div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="section-left">
	    			<div class="checkout-content checkout-payment-form">
		            	<h2 class="secondary-title"><i class="fa fa-user"></i> Billing Address </h2>
				        <div class="box-inner">
				            <div id="payment-new" style="display: block">
				                <div class="form-group required">
				                    <input type="text" name="name" required="" placeholder="Name *" id="input-payment-firstname" class="form-control">
				                </div>
				                <div class="form-group required">
				                    <input disabled="" placeholder="Email *" class="form-control">
				                </div>
				                <div class="form-group company-input">
				                    <input type="text" name="phone" required="" placeholder="Phone *" id="input-payment-company" class="form-control">
				                </div>
				                <div class="form-group required">
				                    <input type="text" name="address" required="" placeholder="Address *" id="input-payment-address-1" class="form-control">
				                </div>
				               <div class="ship-payment">
			                        <div class="checkout-content checkout-payment-methods">
						                <h2 class="secondary-title"><i class="fa fa-credit-card"></i> Payment Method</h2>
								        <div class="box-inner">
								            <select class="form-control mt-2" id="delivary_id" name="delivary" required="" onchange="showDiv()">
					               	    		<option value="">--select--</option>
					               	    		<option value="1">Cash On Delivery</option>
					               	    		<option value="2">B-kash</option>
					               	    		<option value="3">Nagad</option>
					               	    	</select>
					               	    	<div id="hidden_div">
					               	    		<input type="text" name="t_phone" class="form-control mt-2" placeholder="Phone Number *">
					               	    		<input type="text" name="trnx_id" class="form-control mt-2" placeholder="Trnx ID *">
					               	    	</div>
								        </div>
							   		</div>
			                    </div>
		                        <div class="pt-2">
									<button class="btn bg-color-alpa custom-btn br-3">Confirm Order</button>
								</div>
				            </div>
					    </div>
					</div>
				</div>
    	    </div>
		</div>
	</div>
</section>
<!-- End Contact Section-->
@endsection
