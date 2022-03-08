<?php

namespace App\Http\Controllers\Frontend\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Http\Requests\OrderRequest;
use DB;
use Validator;

class CustomerAccountApiController extends Controller
{
    public function getCustomerOrder($id)
    {   
        $orders = Order::where('user_id', $id)->paginate(20);
        return response()->json($orders, 200);
    }

    public function getInvoiceProduct ($id) {
        $orderProduct = OrderDetail::where('order_id', $id)->get();
        return response()->json($orderProduct, 200);
    }
}
