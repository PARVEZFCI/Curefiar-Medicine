<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Models\Order;
use App\Models\OrderDetail;
use Cart;
use Auth;

class OrderController extends Controller
{
    public function checkout(){
        return view('frontend.checkout');
    }
    public function orderConfirm(Request $request){

      
     
        try {
            // $validator = Validator::make($request->shipping_address, [
            //     'name' => 'required',
            //     'phone' => 'required',
            //     'city' => 'required',
            //     'area' => 'required',
            //     'address' => 'required',
            // ]);

            // if($validator->fails()){
            //     return response()->json($validator->errors(), 400);
            // }
            
            DB::transaction(function () use($request) {
                $order = Order::latest()->first();

                if(!$order) {
                    if ( date('l',strtotime(date('Y-01-01'))) ){
                        $nextInvoiceNumber = date('Y').'0001';
                    }
                } else {
                   
                    $nextInvoiceNumber = $order->order_code + 1;
                }

                $order = new Order();
           
                $data = $request->all();
               
                // if ($request->shipping_address) {
                //     $cusAddress = [];
                //     $cusAddress['name'] = $request->shipping_address['name'];
                //     $cusAddress['city'] = $city['city_name'];
                //     $cusAddress['area'] = $area['area_name'];
                //     $cusAddress['address'] = $request->shipping_address['address'];
                //     $data['shipping_address'] = json_encode($cusAddress);
                // }
                $cusAddress['name'] = $request->name;
                $cusAddress['email'] = $request->email;
                $cusAddress['cusAddress'] = $request->cusAddress;
                $cusAddress['payment_type'] = $request->payment_type;
                
                $cusAddress = json_encode($cusAddress);

                $data['order_code'] = $nextInvoiceNumber;
                $data['shipping_address'] = $cusAddress;
               $data['customer_id'] = Auth::guard('customer')->user()->id;
                
                if($order->fill($data)->save()) {
                    
                $cart_data = Cart::content();
                    foreach ($cart_data as $key => $product) {
                        // echo($product->options->type);
                        // exit()
                        $orderDetails = new OrderDetail();
                        $orderDetails->order_id = $order->id;
                        $orderDetails->product_id = $product->options->type != '1' ? $product->id : NULL;
                        $orderDetails->medicine_id = $product->options->type == '1' ? $product->id : NULL;
                        $orderDetails->product_name = $product->name;
                 
                        $orderDetails->price = $product->price ?? 0;
                        $orderDetails->quantity = $product->qty; (float) ($product->price * $product->qty);
                        $orderDetails->sub_total = (float) ($product->price * $product->qty);
                        $orderDetails->product_type  = $product->type == 'medicine' ? 'medicine' : 'product';
                        $orderDetails->save();
                    }  

                } 


                Cart::destroy();
                
               
            }); 

            notify()->success("Order Confirm successfully", "");
            return redirect('/');
           
        } catch(\Exception $e) {
            notify()->success("Something Want Wrong", "");        }
        
    }
}
