@extends('frontend.layouts.app')

@section('main_content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="head-title font-ct">
                <h2 class="modtitle">{{$categories->name}}</h2>
                {{-- <a href="{{route('category.product',$category->slug)}}">View All</a> --}}
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($products as $product)
        <div class="col-6 col-md-3 col-md-3half">
            <div class="item">
                <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                    <a href="{{route('product.single',$product->slug)}}" class="img-box block relative">
                        <img src="/frontend/assets/img/product/{{$product->image ? $product->image:'p3.jpg'}} ">
                    </a>
                    <div class="product-desc-block">
                        <a href="{{route('product.single',$product->slug)}}">{{$product->name}}</a>
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
                            <button onclick="forAddToCart({{$product->id}},0)" class="cart-bag custom-btn bg-color-alpa font-14
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
    {{ $products->links() }}
</div>

@endsection