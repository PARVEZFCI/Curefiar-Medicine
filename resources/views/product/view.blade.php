@extends('layouts.app')
@section('content')

<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Products Details</h3>
                <div class="breadcrumb-list">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
	                    <li class="breadcrumb-item ">All Products</li>
					 </ol>
	            </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt"><a href="{{ route('products.create') }}" class="btn theme-btn"><em class="icon ni ni-plus"></em><span>Add Product</span></a></li>
                        </ul>
                    </div>
                </div><!-- .toggle-wrap -->
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->

    <!-- product details -->
    <div class="nk-block">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="row pb-5">
                    <div class="col-lg-6">
                        <div class="product-gallery mr-xl-1 mr-xxl-5">
                            <div class="slider-init" id="sliderFor" data-slick='{"arrows": false, "fade": true, "asNavFor":"#sliderNav", "slidesToShow": 1, "slidesToScroll": 1}'>
                                <div class="slider-item rounded">
                                    <img src="/2.webp" class="rounded w-100" alt="">
                                </div>
                                <div class="slider-item rounded">
                                    <img src="/2.webp" class="rounded w-100" alt="">
                                </div>
                                <div class="slider-item rounded">
                                    <img src="/3.webp" class="rounded w-100" alt="">
                                </div>
                                <div class="slider-item rounded">
                                    <img src="/4.webp" class="rounded w-100" alt="">
                                </div>
                                <div class="slider-item rounded">
                                    <img src="/a.png" class="rounded w-100" alt="">
                                </div>
                            </div><!-- .slider-init -->
                            <div class="slider-init slider-nav" id="sliderNav" data-slick='{"arrows": false, "slidesToShow": 5, "slidesToScroll": 1, "asNavFor":"#sliderFor", "centerMode":true, "focusOnSelect": true, 
    "responsive":[ {"breakpoint": 1539,"settings":{"slidesToShow": 4}}, {"breakpoint": 768,"settings":{"slidesToShow": 3}}, {"breakpoint": 420,"settings":{"slidesToShow": 2}} ]
}'>
						        <div class="slider-item">
						            <div class="thumb">
						                <img src="/2.webp" class="rounded" alt="">
						            </div>
						        </div>
						        <div class="slider-item">
						            <div class="thumb">
						                <img src="/2.webp" class="rounded" alt="">
						            </div>
						        </div>
						        <div class="slider-item">
						            <div class="thumb">
						                <img src="/3.webp" class="rounded" alt="">
						            </div>
						        </div>
						        <div class="slider-item">
						            <div class="thumb">
						                <img src="/4.webp" class="rounded" alt="">
						            </div>
						        </div>
						        <div class="slider-item">
						            <div class="thumb">
						                <img src="/a.png" class="rounded" alt="">
						            </div>
						        </div>
						    </div><!-- .slider-nav -->
						</div><!-- .product-gallery -->
					</div><!-- .col -->
					<div class="col-lg-6">
						<div class="product-info mt-5 mr-xxl-5">
						    <h4 class="product-price text-primary">$78.00 <small class="text-muted fs-14px">$98.00</small></h4>
						    <h2 class="product-title">Classy Modern Smart watch</h2>
						    <div class="product-excrept text-soft">
						        <p class="lead">I must explain to you how all this mistaken idea of denoun cing ple praising pain was born and I will give you a complete account of the system, and expound the actual teaching.</p>
						    </div>
						    <div class="product-meta">
						        <ul class="d-flex g-3 gx-5">
						            <li>
						                <div class="fs-14px text-muted">Category</div>
						                <div class="fs-16px fw-bold text-secondary">Watch</div>
						            </li>
						            <li>
						                <div class="fs-14px text-muted">Sub Category</div>
						                <div class="fs-16px fw-bold text-secondary">Forerunner 290XT</div>
						            </li>
						            <li>
						                <div class="fs-14px text-muted">ChildCategory</div>
						                <div class="fs-16px fw-bold text-secondary">Forerunner 290XT</div>
						            </li>
						        </ul>
						    </div>
						</div><!-- .product-info -->
					</div><!-- .col -->
				</div><!-- .row -->
				<hr class="hr border-light">
			</div>
		</div>
	</div><!-- .nk-block -->
</div>	
@endsection