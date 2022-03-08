<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function getAllOrder(Request $request)
    {   
        if($request->start_date && $request->end_date) {
            $orders = Order::whereBetween('created_at',[$request->start_date." 00:00:00", $request->end_date." 23:59:59"])->paginate(20);
        } else {
            $orders = Order::latest()->paginate(20);
        }
        return view('order.index', compact('orders'));
    }

    public function viewOrder($orderCode)
    {    
        $order = Order::with('orderDetails','user')->where('order_code', $orderCode)->first();
        return view('order.order-details', compact('order'));
    }

    public function orderStatus($id, $status)
    {      
        $order = Order::findOrFail($id);
        $order->order_status = $status;
        $order->save();

        notify()->success("Order status changed successfully", "");
        return redirect()->route('order.index');
    }

    public function delete($id)
    {      
        $order = Order::findOrFail($id)->delete();

        notify()->success("Order deleted successfully", "");
        return redirect()->route('order.index');
    }
}
