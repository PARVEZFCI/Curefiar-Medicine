<?php

namespace App\Http\Controllers\Frontend\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerApiController extends Controller
{
    public function getAuthenticateCustomer(Request $request)
    {
        return Customer::first();
    }
}
