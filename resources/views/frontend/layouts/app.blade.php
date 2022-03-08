<!DOCTYPE html>
<html lang="en">
	<head>
	    <title>Curefair Online Health Solution</title>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="description" content="medilinebd">
		<meta name="keywords" content="">

		<link rel="icon" type="image/png" href="/frontend/assets/img/logo_1.png">
	    <!-- Bootstrap Css -->
	    <link rel="stylesheet" type="text/css" href="/frontend/assets/css/bootstrap.min.css">  
	    <!-- Owl Carousel -->
	    <link rel="stylesheet" href="/frontend/assets/css/owl.carousel.min.css">
	    <!-- Fonts Css -->
	    <link rel="stylesheet" type="text/css" href="/frontend/assets/fontawesome/css/all.min.css">
	    <link rel="stylesheet" type="text/css" href="/frontend/assets/fontawesome/css/fontawesome.min.css">
	    <link rel="stylesheet" type="text/css" href="/frontend/assets/css/flaticon.css">
	    
	    <!-- Main Css -->
	    <link rel="stylesheet" type="text/css" href="/frontend/assets/css/theme.css">

	    <!-- Responsive Css -->
	    <link rel="stylesheet" type="text/css" href="/frontend/assets/css/responsive.css">
	    
	</head>
	<body id="home">
         
        @include('/frontend.inc.header')

	      @yield('main_content')

            <!-- Begin Shopping Cart -->
	        <div class="shopping-cart-wrapper">
	    		<div class="cart-header clr-4f4f4f">
					Shopping Cart
					<i class="fa fa-times close-icon float-right"></i>
				</div>
				<div class="cart-order-item-box">
					<div class="cart-section">
						<div class="cart-order-item d-flex align-items-center justify-content-between flex-sm-wrap">
							<div class="item-image">
								<a href="javascript:void(0)" class="font-14 clr-4f4f4f">
									Diasulin N
								</a>
							</div>
							<div class="item-price">
								<p class="font-14 mb-1">Price: 200/-</p>
								<p class="font-14 mb-1">SubTotal: 200/-</p>
							</div>
							<div class="cart-setion-quantity-box">
								<button type="button" class="quantity-inc-dec-btn">
									<i class="fa fa-minus"></i>
								</button>
								<div class="cart-setion-quantity-input">
									<input type="text" name="" step="1" min="1" max="33" value="10" autocomplete="off" height="100%">
								</div>
								<button type="button" class="quantity-inc-dec-btn">
									<i class="fa fa-plus next-icon"></i>
								</button>
							</div>
							<div class="action">
								<button type="button">
									<i class="fas fa-trash text-danger"></i>
								</button>
							</div>
						</div>
					</div>
					<div class="cart-section">
						<div class="cart-order-item d-flex align-items-center justify-content-between flex-sm-wrap">
							<div class="item-image">
								<a href="javascript:void(0)" class="font-14 clr-4f4f4f">
									Diasulin N
								</a>
							</div>
							<div class="item-price">
								<p class="font-14 mb-1">Price: 200/-</p>
								<p class="font-14 mb-1">SubTotal: 200/-</p>
							</div>
							<div class="cart-setion-quantity-box">
								<button type="button" class="quantity-inc-dec-btn">
									<i class="fa fa-minus"></i>
								</button>
								<div class="cart-setion-quantity-input">
									<input type="text" name="" step="1" min="1" max="33" value="10" autocomplete="off" height="100%">
								</div>
								<button type="button" class="quantity-inc-dec-btn">
									<i class="fa fa-plus next-icon"></i>
								</button>
							</div>
							<div class="action">
								<button type="button">
									<i class="fas fa-trash text-danger"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
    			<hr>
    			<div class="cart-footer">
					<p>
						<span class="font-w-700">Total</span>
						<span class="float-right font-w-700">৳ 200</span>
					</p>

					<a href="checkout.html">
						<button class="checkout-btn bg-color-alpa w-100 font-18 br-3 white-clr">Continue to Checkout</button>
					</a>
				</div>
	    	</div>
	        <!-- End Shopping Cart -->

	       
		
			@include('/frontend.inc.footer')

		</div>

	    <!-- Proper Js --> 
	    <script src="/frontend/assets/js/popper.min.js"></script>
	    <!-- Jquery Slim Js -->
	    <script src="/frontend/assets/js/jquery-3.2.1.slim.min.js"></script>
	    <!-- Jquery Js -->
	    <script src="/frontend/assets/js/jquery.min.js"></script>
	    <!-- Bootstrap Js -->
	    <script src="/frontend/assets/js/bootstrap.min.js"></script>

	    <script src="/frontend/assets/js/owl.carousel.min.js"></script>
	    <!-- Main JS -->
	    <script src="/frontend/assets/js/main.js"></script>
	</body>
</html>