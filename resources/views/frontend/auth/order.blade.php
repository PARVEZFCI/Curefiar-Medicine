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
		    	<div class="block_content-right bg-white p-3">
        			<h2 class="font-25 font-bold pb-4">Order History</h2>
                  	<div class="table-responsive">
                  		<table class="table table-striped table-bordered">
				            <thead class="thead-default">
				              <tr>
				                <th class="text-center">Order Invoice</th>
				                <th class="text-center">Date</th>
				                <th class="text-center">Total price</th>
				                <th class="text-center">Phone</th>
				                <th class="text-center">Status</th>
				                <th class="text-center">Action</th>
				              </tr>
				            </thead>
				            <tbody>
				            	<tr>
				                  	<th class="text-center">#Invoice-31</th>
				                  	<td class="text-center">2022-03-20</td>
				                  	<td class="text-center">৳680.00</td>
				                  	<td class="text-center">018xxxxxxxxx</td>
				                 	<td class="text-center">
				                 		<span class="badge badge-warning">Panding</span>
				                  	</td>
				                  	<td class="text-center">
				                  		<a href=""><i class="fa fa-list"></i></a>
				                  	</td>
				                </tr>
				                <tr>
				                  	<th class="text-center">#Invoice-31</th>
				                  	<td class="text-center">2022-03-20</td>
				                  	<td class="text-center">৳680.00</td>
				                  	<td class="text-center">018xxxxxxxxx</td>
				                 	<td class="text-center">
				                 		<span class="badge badge-warning">Panding</span>
				                  	</td>
				                  	<td class="text-center">
				                  		<a href=""><i class="fa fa-list"></i></a>
				                  	</td>
				                </tr>
				                <tr>
				                  	<th class="text-center">#Invoice-31</th>
				                  	<td class="text-center">2022-03-20</td>
				                  	<td class="text-center">৳680.00</td>
				                  	<td class="text-center">018xxxxxxxxx</td>
				                 	<td class="text-center">
				                 		<span class="badge badge-warning">Panding</span>
				                  	</td>
				                  	<td class="text-center">
				                  		<a href=""><i class="fa fa-list"></i></a>
				                  	</td>
				                </tr>
				                <tr>
				                  	<th class="text-center">#Invoice-31</th>
				                  	<td class="text-center">2022-03-20</td>
				                  	<td class="text-center">৳680.00</td>
				                  	<td class="text-center">018xxxxxxxxx</td>
				                 	<td class="text-center">
				                 		<span class="badge badge-warning">Panding</span>
				                  	</td>
				                  	<td class="text-center">
				                  		<a href=""><i class="fa fa-list"></i></a>
				                  	</td>
				                </tr>
				                <tr>
				                  	<th class="text-center">#Invoice-31</th>
				                  	<td class="text-center">2022-03-20</td>
				                  	<td class="text-center">৳680.00</td>
				                  	<td class="text-center">018xxxxxxxxx</td>
				                 	<td class="text-center">
				                 		<span class="badge badge-warning">Panding</span>
				                  	</td>
				                  	<td class="text-center">
				                  		<a href=""><i class="fa fa-list"></i></a>
				                  	</td>
				                </tr>
				                <tr>
				                  	<th class="text-center">#Invoice-31</th>
				                  	<td class="text-center">2022-03-20</td>
				                  	<td class="text-center">৳680.00</td>
				                  	<td class="text-center">018xxxxxxxxx</td>
				                 	<td class="text-center">
				                 		<span class="badge badge-warning">Panding</span>
				                  	</td>
				                  	<td class="text-center">
				                  		<a href=""><i class="fa fa-list"></i></a>
				                  	</td>
				                </tr>
				            </tbody>
	          			</table>
                  	</div>
                </div>
		    </div>
		</div>
	</div>
</section>
<!-- End Chekout Product Area-->
@endsection
