<div class="shopping-cart-wrapper">
    <div class="cart-header clr-4f4f4f">
        Shopping Cart
        <i class="fa fa-times close-icon float-right"></i>
    </div>
    <div class="cart-order-item-box">
        <div class="" id="cart-data">
          @php 
            $cartdata = Cart::content();
          @endphp
          @foreach($cartdata as $key => $row)
            <div class="cart-section">
                <div class="cart-order-item d-flex align-items-center justify-content-between flex-sm-wrap">
                    <div class="item-image">
                        <a href="javascript:void(0)" class="font-14 clr-4f4f4f">
                           {{$row->name}}
                        </a>
                    </div>
                    <div class="item-price">
                        <p class="font-14 mb-1">Price: {{ $row->price }}/-</p>
                        <p class="font-14 mb-1">SubTotal: {{$row->price*$row->qty }}/-</p>
                    </div>
                    <div class="cart-setion-quantity-box">
                        <button type="button" class="quantity-inc-dec-btn">
                            <i class="fa fa-minus"></i>
                        </button>
                        <div class="cart-setion-quantity-input">
                            <input type="text" name="" step="1" min="1" max="33" value="{{$row->qty}}" autocomplete="off" height="100%">
                        </div>
                        <button type="button" class="quantity-inc-dec-btn">
                            <i class="fa fa-plus next-icon"></i>
                        </button>
                    </div>
                    <div class="action">
                        <button type="button" onclick="deleteCart('{{ $key }}')">
                            <i class="fas fa-trash text-danger"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="cart-order-item d-flex align-items-center justify-content-between flex-sm-wrap">
            <div class="item-image">
                Total
            </div>
            <div class="item-price">
                <p class="font-14 mb-1">{{Cart::total()}}/-</p>
            </div>

            <div class="">
            </div>
            
            <div class="action">
            </div>

        </div>
    </div>
   
    </div>
    <hr>
    <div class="cart-footer">
     
      @if(Auth::guard('customer')->user())

        <a href="/checkout">
            <button class="checkout-btn bg-color-alpa w-100 font-18 br-3 white-clr">Continue to Checkout</button>
        </a>
        @else 

        <a href="/customer-login">
          <button class="checkout-btn bg-color-alpa w-100 font-18 br-3 white-clr">Continue to Checkout</button>
      </a>

      @endif
    </div>
</div>

<script>
      $(".count").each(function () {
    var count = $(this),
      input = count.find('input[type="number"]'),
      increament = count.find(".increment"),
      decreament = count.find(".decrement"),
      minValue = input.attr("min"),
      maxValue = input.attr("max");
    increament.on("click", function () {
      var oldValue = parseFloat(input.val());

      if (oldValue >= maxValue) {
        var newVal = oldValue;
      } else {
        var newVal = oldValue + 1;
      }

      count.find("input").val(newVal);
      count.find("input").trigger("change");
    });
    decreament.on("click", function () {
      var oldValue = parseFloat(input.val());

      if (oldValue <= minValue) {
        var newVal = oldValue;
      } else {
        var newVal = oldValue - 1;
      }

      count.find("input").val(newVal);
      count.find("input").trigger("change");
    });
  });
</script>

