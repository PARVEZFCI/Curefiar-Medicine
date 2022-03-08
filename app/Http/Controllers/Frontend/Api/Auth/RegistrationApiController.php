<?php

namespace App\Http\Controllers\Frontend\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CustomerRegistrationRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class RegistrationApiController extends Controller
{
    public function doRegister(CustomerRegistrationRequest $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'is_customer' => 1,
            'password' => Hash::make($request['password']),
        ]);

        // return response()->json([
        //     'success' => true,
        //     'message' => 'User Registration Successfully',
        // ], 201);
        event(new Registered($user));

        Auth::login($user);
        
        return response()->json([
                'success' => true,
                'message' => 'User Registration Successfully',
            ], 201);
       // return redirect(RouteServiceProvider::HOME);
    }
}
