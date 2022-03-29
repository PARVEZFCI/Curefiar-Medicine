<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\Customer;
use App\Models\Order;
use Auth;

class ProfileController extends Controller
{
    public function UpdateProfile(Request $request){

     try{
         
        $customer = Customer::findOrFail($request->id);
   
        $data = $request->all();

        if($request->hasFile('image')){
            $extension = $request->image->getClientOriginalExtension();
            $imageName = "customer".'_'.time().'.'.$extension;
            $request->image->storeAs('public/uploads/customerprofile',$imageName);
            $data['image'] = $imageName;
        }

        $customer->fill($data)->save();

        notify()->success("Profile Info Update successfully", "");
            return redirect()->back();

    }catch(\Exception $e){
        
            abort(404);
    
    
          }


        
    }

    public function GetCustomerOrder(){

        $data['orderdata'] = Order::with('orderDetails')->where('customer_id',Auth::guard('customer')->user()->id)->orderBy('id','DESC')->get();

       

        return view('frontend.auth.order',$data);
        
    }

    public function logout(){
        Auth::guard('customer')->logout();

        notify()->success("Logout successfully", "");
        return redirect('/');

    }
}
