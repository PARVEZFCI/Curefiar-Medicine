@extends('frontend.layouts.app')

@section('main_content')

 <!-- Begin Hero Area -->
 <section class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Banner -->
                <div class="slider_active owl-carousel">
                    <div class="single_slider overlay">
                        <img src="frontend/assets/img/banner/b1.webp">
                    </div>
                    <div class="single_slider overlay">
                        <img src="frontend/assets/img/banner/b2.jpg">
                    </div>
                    <div class="single_slider overlay">
                        <img src="frontend/assets/img/banner/b3.jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>	
<!-- End Hero Area -->

<!-- Begin Home Promo Area -->
<section class="home-promo-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="home-promo-wrap">
                    <img src="frontend/assets/img/promo/p1.jpg" alt="promo-img" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="home-promo-wrap">
                    <img src="frontend/assets/img/promo/p2.jpg" alt="promo-img" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="home-promo-wrap">
                    <img src="frontend/assets/img/promo/p3.jpg" alt="promo-img" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Home Promo Area -->

<!-- Begin Home Category wise Product Area -->
<section class="product-item-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="head-title font-ct">
                    <h2 class="modtitle">Medicines</h2>
                    <a href="{{url('/en/md/all')}}">View All</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($medicines as $medicine)
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p7.jpg">
                        </a>
                        <div class="product-desc-block">
                            <a href="javascript:void(0)">{{$medicine->medicine_name}}</a>
                            <p class="price-box">
                                @if($medicine->discount_price)
                                <span class="price-new">৳ {{$medicine->discount_price}}</span>
                                <span class="price-old">৳ {{$medicine->price}}</span>
                                @else 
                                <span class="price-new">৳ {{$medicine->price}}</span>
                                @endif
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
   
        </div>
    </div>
@foreach($categories as $key=>$category)
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="head-title font-ct">
                    <h2 class="modtitle">{{$category->name}}</h2>
                    <a href="{{route('category.product',$category->slug)}}">View All</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($category->products as $product)
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="{{route('product.single',$product->slug)}}" class="img-box block relative">
                            <img src="frontend/assets/img/product/p3.jpg">
                        </a>
                        <div class="product-desc-block">
                            <a href="javascript:void(0)">{{$product->name}}</a>
                            <p class="price-box">
                                @if($product->discount_price)
                                  <span class="price-new">৳ {{$product->discount_price}}</span>
                                  <span class="price-old">৳ {{$product->price}}</span>
                                  @else 
                                  <span class="price-new">৳ {{$product->price}}</span>
                                  @endif
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
      
        </div>
    </div>
@endforeach
    {{-- <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="head-title font-ct">
                    <h2 class="modtitle">Accesories Categories</h2>
                    <a href="single-product.html">View All</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="single-product.html" class="img-box block relative">
                            <img src="frontend/assets/img/product/p3.jpg">
                        </a>
                        <div class="product-desc-block">
                            <a href="single-product.html">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p3.jpg">
                        </a>
                        <div class="product-desc-block">
                            <a href="single-product.html">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p3.jpg">
                        </a>
                        <div class="box-label">
                            <span class="label-product label-sale">-20%</span>
                        </div>
                        <div class="product-desc-block">
                            <a href="single-product.html">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p3.jpg">
                        </a>
                        <div class="box-label">
                            <span class="label-product label-sale">-20%</span>
                        </div>
                        <div class="product-desc-block">
                            <a href="single-product.html">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p3.jpg">
                        </a>
                        <div class="box-label">
                            <span class="label-product label-sale">-20%</span>
                        </div>
                        <div class="product-desc-block">
                            <a href="single-product.html">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p3.jpg">
                        </a>
                        <div class="box-label">
                            <span class="label-product label-sale">-20%</span>
                        </div>
                        <div class="product-desc-block">
                            <a href="single-product.html">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p3.jpg">
                        </a>
                        <div class="box-label">
                            <span class="label-product label-sale">-20%</span>
                        </div>
                        <div class="product-desc-block">
                            <a href="single-product.html">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p3.jpg">
                        </a>
                        <div class="box-label">
                            <span class="label-product label-sale">-20%</span>
                        </div>
                        <div class="product-desc-block">
                            <a href="single-product.html">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p1.png">
                        </a>
                        <div class="box-label">
                            <span class="label-product label-sale">-20%</span>
                        </div>
                        <div class="product-desc-block">
                            <a href="javascript:void(0)">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p1.png">
                        </a>
                        <div class="box-label">
                            <span class="label-product label-sale">-20%</span>
                        </div>
                        <div class="product-desc-block">
                            <a href="javascript:void(0)">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="head-title font-ct">
                    <h2 class="modtitle">Kid's Item</h2>
                    <a href="single-product.html">View All</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p3.jpg">
                        </a>
                        <div class="box-label">
                            <span class="label-product label-sale">-20%</span>
                        </div>
                        <div class="product-desc-block">
                            <a href="single-product.html">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p3.jpg">
                        </a>
                        <div class="box-label">
                            <span class="label-product label-sale">-20%</span>
                        </div>
                        <div class="product-desc-block">
                            <a href="single-product.html">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p3.jpg">
                        </a>
                        <div class="box-label">
                            <span class="label-product label-sale">-20%</span>
                        </div>
                        <div class="product-desc-block">
                            <a href="single-product.html">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p3.jpg">
                        </a>
                        <div class="box-label">
                            <span class="label-product label-sale">-20%</span>
                        </div>
                        <div class="product-desc-block">
                            <a href="single-product.html">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p6.jpg">
                        </a>
                        <div class="box-label">
                            <span class="label-product label-sale">-20%</span>
                        </div>
                        <div class="product-desc-block">
                            <a href="single-product.html">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p5.jpg">
                        </a>
                        <div class="box-label">
                            <span class="label-product label-sale">-20%</span>
                        </div>
                        <div class="product-desc-block">
                            <a href="single-product.html">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p4.jpg">
                        </a>
                        <div class="box-label">
                            <span class="label-product label-sale">-20%</span>
                        </div>
                        <div class="product-desc-block">
                            <a href="javascript:void(0)">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p1.png">
                        </a>
                        <div class="box-label">
                            <span class="label-product label-sale">-20%</span>
                        </div>
                        <div class="product-desc-block">
                            <a href="javascript:void(0)">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p1.png">
                        </a>
                        <div class="box-label">
                            <span class="label-product label-sale">-20%</span>
                        </div>
                        <div class="product-desc-block">
                            <a href="javascript:void(0)">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="javascript:void(0)" class="img-box block relative">
                            <img src="frontend/assets/img/product/p1.png">
                        </a>
                        <div class="product-desc-block">
                            <a href="javascript:void(0)">Charger  Compact Portable with Premium</a>
                            <p class="price-box">
                                  <span class="price-new">৳ 80.00</span>
                                  <span class="price-old">৳ 100.00</span>
                              </p>
                            <div class="sku-quantity-section">
                                <input type="number" name="" min="1" value="1">
                                <button class="custom-btn bg-color-alpa font-14
                                font-w-700">
                                <span class="flaticon-shopping-bag"></span>
                                    Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</section>
<!-- End Home Category wise Product Area -->
@endsection
