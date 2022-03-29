@extends('frontend.layouts.app')

@section('main_content')

<style>
   
</style>

<div class="container-fluide">
    <div class="row">
        <div class="col-md-12">
            <div class="">
                {{-- <h2 class="modtitle text-center">All Medicine</h2> --}}
                {{-- <a href="{{route('category.product',$category->slug)}}">View All</a> --}}
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-3">
            <div class="cat_head">
                <h2 class="cat_head pl-3">Medicine Category</h2>

            </div>
            <ul class="p-0 mt-2 py-1 cate_container">
                       
                @foreach($medicine_categories as $key => $category)
                    
              
                <li class="cate_name">
                  <a style="color: #141313e0" href="/medicinecat/{{$category->slug}}" class="cate_item">{{$category->name}}</a>
                </li> 
                @endforeach
              
          
          </ul>
        </div>
        <div class="col-md-9 pt-5">
            <div class="row">
            @foreach($medicines as $key=>$medicine)
                <div class="col-6 col-md-3 col-md-3half mr-3">
                    <div class="item">
                        <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                            <a href="{{route('medicine.single',$medicine->slug)}}" class="img-box block relative">
                                <img src="{{ $medicine->image ? '/storage/uploads/medicines/' . $medicine->image : '/frontend/assets/img/product/p3.jpg'}}" alt="item">
                            </a>
                            <div class="product-desc-block">
                                <a href="{{route('medicine.single',$medicine->slug)}}">{{$medicine->medicine_name}}</a>
                                <p class="price-box">
                                    @if($medicine->medicinePrices[0]->discount_price)
                                    <span class="price-new">৳ {{$medicine->medicinePrices[0]->discount_price}}</span>
                                    <span class="price-old">৳ {{$medicine->medicinePrices[0]->price}}</span>
                                    @else 
                                    <span class="price-new">৳

                                        {{$medicine->medicinePrices[0]->price}}
                                                            
                                    </span>
                                    @endif
                                </p>
                                <div class="sku-quantity-section">
                                    <input type="number" name="" min="1" value="1">
                                    <button onclick="forAddToCart({{$medicine->id}},1)" class="custom-btn bg-color-alpa font-14
                                    font-w-700 cart-bag">
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

    </div>
    {{ $medicines->links() }}
</div>

@endsection