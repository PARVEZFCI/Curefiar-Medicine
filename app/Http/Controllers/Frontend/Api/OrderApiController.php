<?php

namespace App\Http\Controllers\Frontend\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\City;
use App\Models\Area;
use App\Http\Requests\OrderRequest;
use DB;
use Validator;

class OrderApiController extends Controller
{
    Public function storeOrder(Request $request)
    {    
        try {
            $validator = Validator::make($request->shipping_address, [
                'name' => 'required',
                'phone' => 'required',
                'city' => 'required',
                'area' => 'required',
                'address' => 'required',
            ]);

            if($validator->fails()){
                return response()->json($validator->errors(), 400);
            }
            
            DB::transaction(function () use($request) {
                $order = Order::latest()->first();

                if(!$order) {
                    if ( date('l',strtotime(date('Y-01-01'))) ){
                        $nextInvoiceNumber = date('Y').'0001';
                    }
                } else {
                    // $expNum = explode('-', $order->order_code);  
                    $nextInvoiceNumber = $order->order_code + 1;
                }

                $order = new Order();
                $city = City::where('id', $request->shipping_address['city'])->first(['city_name']);
                $area = Area::where('id', $request->shipping_address['area'])->first(['area_name']);
                $data = $request->all();
                if ($request->shipping_address) {
                    $cusAddress = [];
                    $cusAddress['name'] = $request->shipping_address['name'];
                    $cusAddress['city'] = $city['city_name'];
                    $cusAddress['area'] = $area['area_name'];
                    $cusAddress['address'] = $request->shipping_address['address'];
                    $data['shipping_address'] = json_encode($cusAddress);
                }
                $data['order_code'] = $nextInvoiceNumber;
                
                if($order->fill($data)->save()) {
                    foreach ($request->cartData as $product) {

                        $orderDetails = new OrderDetail();
                        $orderDetails->order_id = $order->id;
                        $orderDetails->product_id = $product['type'] != 'medicine' ? $product['id'] : NULL;
                        $orderDetails->medicine_id = $product['type'] == 'medicine' ? $product['id'] : NULL;
                        $orderDetails->product_name = $product['name'];
                        $orderDetails->discount = $product['discount'] ?? 0;
                        $orderDetails->price = $product['price'] ?? 0;
                        $orderDetails->quantity = $product['qty']; (float) ($product['price'] * $product['qty']);
                        $orderDetails->sub_total = (float) ($product['price'] * $product['qty']);
                        $orderDetails->product_type  = $product['type'] == 'medicine' ? 'medicine' : 'product';
                        $orderDetails->unit  = $product['unit'] ?? '';
                        $orderDetails->save();

                    }  
                }   
            }); 
            return response()->json([
                'status' => 'success',
                'message' => 'Order create successfully'
            ], 200);
        } catch(\Exception $e) {
            return response()->json('Something Went Wrong', 500);
        }
        
    }
}
