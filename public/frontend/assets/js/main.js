$(document).ready(function() {
    //For toggole dropdown
    $('.dropdown-toggle').dropdown();
    
    $(document).ready(function() {
		$('.has-children').click( function() {
			// $('.mega-dropdown.show').removeClass('show');
			$(this).find('.sub-menu-icon').toggleClass('rotate');
			$(this).siblings('.mega-dropdown').toggleClass('show');

		})

		$('.side-menu-bar .cate-menu .cate-menu-item').click(function() {
			$(this).siblings().removeClass('active')
			$(this).addClass('active');
		});
	})
    
    //Dropdown when hover
	$('ul.navbar-nav li.dropdown').hover(function() {
		  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function() {
		  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
	});

	$('.cart-bag').click(function() {
		$('#home').css("overflow","hidden");
		$('.shopping-cart-wrapper').addClass('shopping-cart-appended');
		$('.f-overlay').addClass('menu-overlay');
	})

	$('.toggole').click(function() {
		$('#home').css("overflow","hidden");
		$('.side-menu-bar').addClass('side-menu-push');
	})


	$('.close-icon').click(function() {
		$('.shopping-cart-wrapper').removeClass('shopping-cart-appended');
		$('.side-menu-bar').removeClass('side-menu-push');
		$('.f-overlay').removeClass('menu-overlay');
		$('#home').css("overflow","auto");
	})

	$(window).scroll(function(){
	    if ($(window).scrollTop() >= 10) {
	        $('.header-upper').addClass('fixed-header');
	    }
	    else {
	        $('.header-upper').removeClass('fixed-header');
	    }
	});

	$('.slider_active').owlCarousel({
	  loop:true,
	  margin:0,
	  items:1,
	  autoplay:true,
	  navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
	  nav:false,
	  dots:false,
	  autoplayHoverPause: true,
	  autoplaySpeed: 800,
	  animateOut: 'fadeOut',
	  animateIn: 'fadeIn',
	  responsive:{
	      0:{
	          items:1,
	          nav:false,
	      },
	      767:{
	          items:1,
	          nav:false,
	      },
	      992:{
	          items:1,
	          nav:true
	      },
	      1200:{
	          items:1,
	          nav:true
	      },
	      1600:{
	          items:1,
	          nav:true
	      }
	  }
	});

	$('.recommended-category-list-inner').owlCarousel({
	  loop:true,
	  margin:10,
	  items:1,
	  autoplay:true,
	  navText:['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
	  nav:false,
	  dots:false,
	  autoplayTimeout:2000,
	  autoplayHoverPause: false,
	  autoplaySpeed: 2500,
	  animateOut: 'fadeOut',
	  animateIn: 'fadeIn',
	  responsive:{
	      0:{
	          items:2,
	          nav:false,
	      },
	      767:{
	          items:2,
	          nav:false,
	      },
	      992:{
	          items:7,
	          nav:true
	      },
	      1200:{
	          items:7,
	          nav:true
	      },
	      1600:{
	          items:7,
	          nav:true
	      }
	  }
	});


})


