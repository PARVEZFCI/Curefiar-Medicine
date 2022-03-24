<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Frontend\Customer;
use Hash;
use Auth;

class LoginController extends Controller
{

    public function CustomerRegistration(LoginRequest $request){

       $customer = new Customer;
       $data = $request->all();
       $data['password'] = Hash::make($request->password);
       $succ = $customer->fill($data)->save();

       if($succ){
        notify()->success("Customer created successfully", "");
       }else{
        notify()->success("Customer  created not successfully", "");

       }
       return redirect()->back();

    }
    public function CustomerLogin(Request $request){

        if (Auth::guard('customer')->attempt(['email' => $request->email , 'password' => $request->password], $request->remember)) {        	
            notify()->success("Customer Login successfully", "");

         
            return redirect()->route('customer.profile');
        }else{
            notify()->success("Customer Login not successfully", "");
        	return back();
        }
    }
}
