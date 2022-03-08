<?php

namespace App\Http\Controllers\Frontend\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class LoginApiController extends Controller
{
    public function doLogin(CustomerRegistrationRequest $request)
    {   
        // dd($request->all());
        $user = User::create([
            'name' => $request['name'] ?? '',
            'email' => $request['email'] ?? '',
            'phone' => $request['phone'] ?? '',
            'is_customer' => 1,
            'password' => Hash::make($request['password']),
        ]);

        // $token = $user->createToken('myapptoken')->planTextToken;
        
        return response()->json([
            'user'  => $user,
            // 'token' => $token
        ], 201);
    }
}
