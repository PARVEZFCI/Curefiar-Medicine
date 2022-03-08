<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getAllCustomer()
    {
        return view('customer.index');
    }

    public function showCustomer()
    {
        return view('customer.show');
    }

    public function customerOrders()
    {
        return view('customer.customer-order');
    }

}
