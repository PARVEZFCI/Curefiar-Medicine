<div class="fixed-social-area">
    <!--<ul class="fixed-social-list">-->
    <!--    <li>-->
    <!--        <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>-->
    <!--    </li>-->
    <!--    <li>-->
    <!--        <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>-->
    <!--    </li>-->
    <!--    <li>-->
    <!--        <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>-->
    <!--    </li>-->
    <!--    <li>-->
    <!--        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>-->
    <!--    </li>-->
    <!--    <li>-->
    <!--        <a href="https://www.linkedin.com/"><i class="fab fa-linkedin"></i></a>-->
    <!--    </li>-->
    <!--</ul>-->
</div>



<div class="page-wrapper">
    <!-- Header -->
    <header class="main-header">
        <!-- Header Top -->
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 white-clr d-flex align-items-center  hidden-xs">
                      
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 white-clr header-contact">
                        <ul class="list-item">
                             <li class="mr-lg-4">
                                <span class="icon fas fa-map-marker-alt font-14 font-xs"></span>
                                <a href="javascript:void(0)" class="white-clr font-14">Track Order</a>
                            </li>
                            <li class="mr-lg-4">
                                <span class="icon fas fa-phone-alt font-14 font-xs"></span>
                                <a href="javascript:void(0)" class="white-clr font-14">Doctor Login</a>
                            </li>
                            <li>
                                <span class="icon far fa-user font-14 font-xs"></span>
                                <a href="javascript:void(0)" class="white-clr font-14">Login/Register</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top -->

        @php 
                
             $categories =  App\Models\ProductCategory::limit(7)->get();

       @endphp 
        
        <!-- Header Center -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-3">
                        <div class="middle-header-left">
                            <div class="header-logo">
                            <a href="/">
                                    <img src="/frontend/assets/img/logo_1.png" alt="logo">
                                </a>
                            </div>
                            <div class="f-mbl-view-login f-mbl-view">
                                <a href="login.html">
                                    <i class="flaticon-user-3"></i>
                                </a>
                            </div>
                            <div class="f-mbl-view-cart f-mbl-view">
                                <a href="javascript:void(0)" class="cart-bag">
                                    <i class="flaticon-shopping-bag"></i>
                                    <span class="mini-item-counter">0</span>
                                </a>
                            </div>
                            <div class="toggole f-mbl-view">
                                <i class="fas fa-bars"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="middle-header-menu-wrap">
                            <div class="header-search-area">
                                <form class="header-product-search-form">
                                    <div class="header-product-search-content">
                                        <div class="search-wrapper">
                                            <input type="text" name="search" class="header-search-field" autocomplete="off" placeholder="Search here!">
                                        </div>
                                        <button type="button" class="header-search-submit-btn bg-color-alpa">
                                            Search
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <ul class="middle-header-menu">
                                <li class="middle-header-menu-item">
                                   
                                </li>
                                <li class="middle-header-menu-item">
                                    <a href="javascript:void(0)" class="cart-bag">
                                     <i class="flaticon-shopping-bag"></i>
                                      <span class="mini-item-counter">{{ Cart::count(); }}</span>
                                    </a>
                                </li>
                                <!-- <li class="middle-header-menu-item">
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-user"></i>
                                        <span class="login-text">Profile</span>
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Center -->

        <!-- Header Bottom -->
        <div class="header-bottom">
            <div class="container-fluide">
             
               <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <ul class="header-bottom-menu">
                     
                        <li class="header-menu-item">
                            <a href="/">
                                <i class="fa fa-home"></i>Home
                            </a>
                        </li>
                    
                        <li class="header-menu-item">
                            <a href="{{url('/en/md/all')}}">
                                Madicine
                            </a>
                        </li>
                        @if($categories)
                        @foreach($categories as $category)
                            <li class="header-menu-item">
                                <a href="{{route('category.product',$category->slug)}}">
                                    {{$category->name}}
                                </a>
                            </li>
                        @endforeach
                        @endif
                     
                    </ul>
                </div>
                     
                </div>      
              
            </div>
        </div>
        <!-- End Header Bottom -->
    </header>
    <!-- End Main Header -->

    <!-- Mobile Version Sidebar Start -->
    <section class="">
        <div class="container">
            <div class="row">
                <div class="side-menu-bar">
                    <div class="cate-menu-top f-mbl-view">
                        <img src="/frontend/assets/img/logo_1.png" alt="logo" width="100">
                        <button type="button">
                            <i class="fas fa-times close-icon"></i>
                        </button>
                    </div>

                    <ul class="cate-menu">
                        <li class="cate-menu-item">
                            <a href="/" class="has-children">
                                Home
                            </a>
                        </li>
                       
                        <li class="cate-menu-item">
                            <a href="{{url('/en/md/all')}}" class="has-children">
                                Madicine
                            </a>
                        </li>
                        
                        @foreach($categories as $category)
                        <li class="cate-menu-item">
                            <a href="{{route('category.product',$category->slug)}}" class="has-children">
                                {{$category->name}}
                            </a>
                        </li>
                        @endforeach
                        
                      
                    </ul>
                    <div class="f-overlay"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Mobile Version Sidebar End -->