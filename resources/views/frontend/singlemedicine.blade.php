@extends('frontend.layouts.app')

@section('main_content')

<!-- Begin Single Product Details Area -->
			<section class="single-product-area pad-40">
				<div class="container">
					<div class="row">
						<div class="col-md-10 m-auto">
							<div class="row">
								<div class="col-md-4">
									<div class="single-product-left-side">
										<div class="single-product-image text-center">
											<img style="height: 200px;
											width: 259px;" src="{{ $medicinesingle->image ? '/storage/uploads/medicines/' . $medicinesingle->image : '/frontend/assets/img/product/p3.jpg'}}" alt="item">
										</div>
									</div>
								</div>
								<div class="col-md-8">
									<div class="single-product-right-side">
										<div class="single-product-desc-box">
											<div class="single-product-name">
												<h2 class="txt-clr-1 mb-3">{{$medicinesingle->medicine_name}}</h2>
											</div>
										      
                                            @foreach($medicinesingle->medicinePrices as $row)
											<input type="radio" name="unit"> 1 {{$row->unit->unit_name}} = 	@if($row->discount_price)
											<span class="price-new">৳ {{$row->discount_price}}</span>
											<span class="price-old">৳ {{$row->price}}</span>
											@else 
											<span class="price-new">৳
												 {{$row->price}}        
											</span>
											@endif<br>
											@endforeach
											{{-- <input type="radio" name="unit" value=""> 1 Pata --}}
										    
											<p class="price-box">
											
										  	</p>
											<p class="single-product-details">
										    {!! $medicinesingle->details !!}	
											</p>
											<div class="d-flex align-items-center mt-4">
												{{-- <div class="cart-setion-quantity-box">
													<button type="button" class="quantity-inc-dec-btn">
														<i class="fa fa-minus"></i>
													</button>
													<div class="cart-setion-quantity-input">
														<input type="text" name="" step="1" min="1" max="33" value="10" autocomplete="off" height="100%">
													</div>
													<button type="button" class="quantity-inc-dec-btn">
														<i class="fa fa-plus next-icon"></i>
													</button>
												</div> --}}
										    	<button onclick="forAddToCart({{$medicinesingle->id}},1)" class="custom-btn bg-color-alpa font-14
										    	font-w-700 cart-bag">Add To Cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Single Product Details Area -->
      <section class="related-product">
        <div class="container">

			<div class="row">
				<div class="col-md-12">
					<div class="head-title font-ct">
						<h2 class="modtitle">Related Product</h2>
						{{-- <a href="{{route('category.product',$category->slug)}}">View All</a> --}}
					</div>
				</div>
			</div>
			
          <div class="row">

            @foreach($medicines as $medicine)
            <div class="col-6 col-md-3 col-md-3half">
                <div class="item">
                    <div class="product-item-container h-full w-full ct-item-box box-shadow-1">
                        <a href="{{route('medicine.single',$medicine->slug)}}" class="img-box block relative">
                            <img src="{{ $medicine->image ? '/storage/uploads/medicines/' . $medicine->image : '/frontend/assets/img/product/p3.jpg'}}">
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
      </section>



@endsection
@section('script')

<script>
// function forAddToCart(id,type){
//        console.log(type);
//     $.ajax({
//          url:'/cart/product',
//          data:{id:id},
//          type:"GET",
//          success:function(data){
//             $('#cart-data').html(data);
//          }
//     })
             
//  }

//  function deleteCart(id){
// 	 console.log(id);
//  }
</script>
@endsection

