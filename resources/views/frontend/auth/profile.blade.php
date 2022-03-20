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
        						<img src="https://onlinemedicare.com.bd/frontend_assets/assets/img/blank.png" alt="customer">
        					</div>
        					<div class="seller-name">
        						Jon Doe
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
								<div class="profile">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="labels">Name</label>
												<input type="text" class="form-control" placeholder="Enter Name" value="">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="labels">Email</label>
												<input type="text" class="form-control" placeholder="Enter Email" value="">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="labels">Phone Number</label>
												<input type="text" class="form-control" placeholder="Enter Phone Number" value="">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="labels">Full Address</label>
												<textarea class="form-control" placeholder="Enter Full Address"></textarea>
											</div>
										</div>
										<div class="col-md-12">
											<label for="input-file">
													Profile Image
		                                    </label>
											<div class="prescription-img">
												<div class="prescription-preview">
													<img src="https://onlinemedicare.com.bd/frontend_assets/assets/img/blank.png" alt="front_image">
												</div>
											</div>
											<div class="pt-2 pb-2 file file--uploading">
		                                        <input id="input-file" type="file">
		                                    </div>
		                                </div>
									</div>
									<div class="text-center mt-4">
										<button class="btn bg-color-alpa custom-btn br-3">Update Profile</button>
									</div>
								</div>
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
