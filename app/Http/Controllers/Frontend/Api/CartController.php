<?php

namespace App\Http\Controllers\Frontend\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Medicine;

use Cart;

class CartController extends Controller
{
    public function addtocart(Request $request){
       
        if($request->type==1){
            
            $product  = Medicine::relation()->findOrFail($request->id);
            dd($product);
            $price = $product->discount_price ? $product->discount_price : $product->price;
            $data['id']=$product->id;
            $data['name']=$product->name;
            $data['qty']=1;
            $data['weight'] = '1';
            $data['price']=$price;
            $data['options']['image']=$product->product_img;
            $succ =   Cart::add($data);


        }else{

            $product  = Product::findOrFail($request->id);
            $price = $product->discount_price ? $product->discount_price : $product->price;
    
            $data['id']=$product->id;
            $data['name']=$product->name;
            $data['qty']=1;
            $data['weight'] = '1';
            $data['price']=$price;
            $data['options']['image']=$product->product_img;
            $succ =   Cart::add($data);

        }
      
        $cartdata = Cart::content();
      
        $html = '';
        foreach($cartdata as $row){
        
            $html.= '
            <div class="cart-section">
            <div class="cart-order-item d-flex align-items-center justify-content-between flex-sm-wrap">
                <div class="item-image">
                    <a href="javascript:void(0)" class="font-14 clr-4f4f4f">
                       '.$row->name.'
                    </a>
                </div>
                <div class="item-price">
                    <p class="font-14 mb-1">Price: '.$row->price.' X '. $row->qty . ' </p>
                    <p class="font-14 mb-1">SubTotal: '.$row->price*$row->qty.'/-</p>
                </div>
                <div class="cart-setion-quantity-box">
                    <button type="button" class="quantity-inc-dec-btn">
                        <i class="fa fa-minus"></i>
                    </button>
                    <div class="cart-setion-quantity-input">
                        <input type="text" name="" step="1" min="1" max="33" value="'.$row->qty.'" autocomplete="off" height="100%">
                    </div>
                    <button type="button" class="quantity-inc-dec-btn">
                        <i class="fa fa-plus next-icon"></i>
                    </button>
                </div>
                <div class="action">
                    <button type="button" onclick="('.$row->rowId.')">
                        <i class="fas fa-trash text-danger"></i>
                    </button>
                </div>
            </div>
        </div>

        <hr>
';
        }
        $html.='
        <div class="cart-order-item d-flex align-items-center justify-content-between flex-sm-wrap">
        <div class="item-image">
            Total
        </div>
        <div class="item-price">
            <p class="font-14 mb-1">'.Cart::total().'/-</p>
            
        </div>

        <div class="">
        </div>
        <div class="action">
        </div>
    </div>';
        return $html;

    }

    public function removeCart(Request $request){

        Cart::remove($request->id);
        $cartdata = Cart::content();
        $html = '';
        foreach($cartdata as $row){
        
            $html.= '
            <div class="cart-section">
            <div class="cart-order-item d-flex align-items-center justify-content-between flex-sm-wrap">
                <div class="item-image">
                    <a href="javascript:void(0)" class="font-14 clr-4f4f4f">
                       '.$row->name.'
                    </a>
                </div>
                <div class="item-price">
                    <p class="font-14 mb-1">Price: '.$row->price.' X '. $row->qty . ' </p>
                    <p class="font-14 mb-1">SubTotal: '.$row->price*$row->qty.'/-</p>
                </div>
                <div class="cart-setion-quantity-box">
                    <button type="button" class="quantity-inc-dec-btn">
                        <i class="fa fa-minus"></i>
                    </button>

                    <div class="cart-setion-quantity-input">
                    
                        <input type="text" name="" step="1" min="1" max="33" value="'.$row->qty.'" autocomplete="off" height="100%">

                    </div>
                    <button type="button" class="quantity-inc-dec-btn">
                        <i class="fa fa-plus next-icon"></i>
                    </button>
                </div>
                <div class="action">
                    <button type="button" onclick="deleteCart('.$row->rowId.')">
                        <i class="fas fa-trash text-danger"></i>
                    </button>
                </div>
            </div>
        </div>
        <hr>
';
        }
        $html.='
        <div class="cart-order-item d-flex align-items-center justify-content-between flex-sm-wrap">
        <div class="item-image">
            Total
        </div>
        <div class="item-price">
            <p class="font-14 mb-1">'.Cart::total().'/-</p>
        </div>
        <div class="">
        </div>
        <div class="action">
        </div>
    </div>';
        return $html;

    }
    
}
