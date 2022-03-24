@extends('frontend.layouts.app')
@section('main_content')
<!-- Begin Chekout Area-->
<section class="my-profile-area pad-80">
	<div class="container">
		<div class="row">
        	<div class="col-12 col-md-3">
        		<aside>
        			<div class="seller-left-sidebar">
        				<div class="sidebar-header">
        					<div class="seller-img text-center mb-4">
								@if(Auth::guard('customer')->user()->image)
								<img src="{{Auth::guard('customer')->user()->image ? '/storage/uploads/customerprofile/'.Auth::guard('customer')->user()->image : '/image.svg'}}" alt="customer">
								@else								
        						<img src="https://onlinemedicare.com.bd/frontend_assets/assets/img/blank.png" alt="customer">
								@endif
        					</div>
        					<div class="seller-name">
        						{{Auth::guard('customer')->user()->name}}
        					</div>
        				</div>
        				<!-- sidebar with menu -->
        				<div class="seller-sidebar-content">
        					<div class="nav-container">
	        					<ul class="seller-main-menu-navigation">
	        					    <li>
	        							<a href="/customer-order">
	        						       <i class="fa fa-bullhorn"></i> Orders
	        						    </a>
	        					    </li>
	        					    <li>
	        							<a href="/customer-profile">
	        						       <i class="fa fa-user"></i> Profile	
	        						    </a>
	        					    </li>
	        					    <li>
	        							<a href="javascript:void(0)">
	        						       <i class="fa fa-lock"></i> Log Out	
	        						    </a>
	        					    </li>
	        					</ul>
	        				</div>
        				</div>

        			</div>
        		</aside>
		    </div>
		    <div class="col-12 col-md-9">
				<div class="seller-dashboard-main-content-area">
					<div class="content-wrapper">
						<div class="row">
							<div class="col-md-12">
								<h1 class="secondary-title"><i class="fa fa-user mr-3"></i>Profile</h1>
							</div>
							<div class="col-md-12 m-auto">
								<form action="/updateprofile" method="post" enctype="multipart/form-data">
									@csrf
								<div class="profile">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="labels">Name</label>
												<input type="text" value="{{Auth::guard('customer')->user()->name}}" class="form-control" placeholder="Enter Name" name="name">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="labels">Email</label>
												<input type="text" name="email" value="{{Auth::guard('customer')->user()->email}}" class="form-control" placeholder="Enter Email" >
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="labels">Phone Number</label>
												<input name="phone" type="text" value="{{Auth::guard('customer')->user()->phone}}" class="form-control" placeholder="Enter Phone Number">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="labels">Full Address</label>
												<input type="hidden" name="id" value="{{Auth::guard('customer')->user()->id}}">
												<textarea name="address" class="form-control" placeholder="Enter Full Address">{{Auth::guard('customer')->user()->address}}</textarea>
											</div>
										</div>
										<div class="col-md-12">
											<label for="input-file">
													Profile Image
		                                    </label>
											@if(Auth::guard('customer')->user()->image)
											<div class="prescription-img">
												<div class="prescription-preview">
													<img height="200" src="{{Auth::guard('customer')->user()->image ? '/storage/uploads/customerprofile/'.Auth::guard('customer')->user()->image : '/image.svg'}}" alt="front_image">
												</div>
											</div>
											@endif
											<div class="pt-2 pb-2 file file--uploading">
		                                        <input id="input-file" name="image" type="file">
		                                    </div>
		                                </div>
									</div>
									<div class="text-center mt-4">
										<button type="submit" class="btn bg-color-alpa custom-btn br-3">Update Profile</button>
									</div>
								</div>
							</form>
							</div>
						</div>
					</div>
				</div>
		    	
		    </div>
		</div>
	</div>
</section>
<!-- End Chekout Product Area-->
@endsection
