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
		@include('/frontend.inc.cart')


	      @yield('main_content')

            <!-- Begin Shopping Cart -->
			
	        <!-- End Shopping Cart -->

	       
		
			@include('/frontend.inc.footer')

		</div>
        @yield('script')

	    <!-- Proper Js --> 
	    <script src="/frontend/assets/js/popper.min.js"></script>
		<script src="/frontend/js/cart.js"></script>

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