// Hero banner Slider
$('.hero-slider-inner').owlCarousel({
    loop: true,
    margin: 0,
    mouseDrag: false,
    items: 1,
    autoHeight: true,
    autoplay: true,
    smartSpeed: 1500,
    autoplayHoverPause: true,
    navText: ['<span class="flaticon-left-arrow-1"></span>', '<span class="flaticon-right-arrow-1"></span>'],
    nav: false,
    dots: true,
    smartSpeed: 1500,
    responsive: {
        0: {
            items: 1,
            nav: false,
        },
        767: {
            items: 1,
            nav: false,
        },
        992: {
            items: 1,
            nav: true
        },
        1200: {
            items: 1,
            nav: true
        },
        1600: {
            items: 1,
            nav: true
        }
    }
});

$('.product-cate-slide-inner').owlCarousel({
    loop: true,
    margin: 10,
    mouseDrag: false,
    items: 1,
    autoHeight: true,
    autoplay: true,
    smartSpeed: 1500,
    navText: ['<span class="flaticon-left-arrow-1"></span>', '<span class="flaticon-right-arrow-1"></span>'],
    nav: false,
    dots: true,
    smartSpeed: 1500,
    responsive: {
        0: {
            items: 1,
            nav: false,
        },
        767: {
            items: 3,
            nav: false,
        },
        992: {
            items: 4,
            nav: true
        },
        1200: {
            items: 4,
            nav: true
        },
        1600: {
            items: 4,
            nav: true
        }
    }
});

// Cart toggole
$(".cart-dropdown-toggle").click(function() {
    $(".cart-dropdown-btn").toggleClass("open");
});
$('.menu-toggle > a').on('click', function(e) {
        e.preventDefault();
        $('#responsive-nav').toggleClass('active');
    })
    // Cart show & hide
$(".close-cart ").click(function() {
    $(".cart-wrapper ").removeClass('cart-open');
    $(".background-backdrop").removeClass('show');
    $("body").css("overflow", "auto")
})
$(".sticky-mycart").click(function() {
    $(".cart-wrapper.shop-bag").addClass('cart-open');
    $(".background-backdrop").addClass('show');
    $("body").css("overflow", "hidden")
})

// Login side show/hide
$(".login-trigger").click(function() {
    $("#reg-panel").addClass('d-none');
    $("#login-panel").show();
    $(".cart-wrapper.login").addClass('cart-open')
    $(".background-backdrop").addClass('show');
    $("body").css("overflow", "hidden")
})

$(".reg-trigger").click(function() {
        $("#login-panel").hide();
        $("#reg-panel").removeClass('d-none');
    })
    // For item details show & hide
$(".quick-view").click(function() {
    $('.item-detail-popup-wrap').show();
})

$(".close").click(function() {
    $('.item-detail-popup-wrap').hide();
})