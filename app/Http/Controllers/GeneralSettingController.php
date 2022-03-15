<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\MediaSetting;

class GeneralSettingController extends Controller
{
    public function generalSetting()
    {
        $data['generalsetting'] = GeneralSetting::orderBy('id','DESC')->first();
        $data['mediasetting'] = MediaSetting::orderBy('id','DESC')->first();
        return view('setting.create',$data);
    }

    public function UpdateDescription(Request $request){

        $generalsetting = GeneralSetting::findOrFail($request->id);

        $data = $request->all();
        $generalsetting->update($data);
        notify()->success("Generall Settings updated successfully", "");
        return redirect()->route('setting.system');
    }

    public function UpdateSocial(Request $request){

        $generalsetting = GeneralSetting::findOrFail($request->id);

        $data = $request->all();
        $generalsetting->update($data);
        notify()->success("Generall Settings updated successfully", "");
        return redirect()->route('setting.system');
    }

    public function UpdateMedia(Request $request){
     
        $data = [];
        $mediasetting = MediaSetting::findOrFail($request->id);

        if($request->hasFile('home_banner')){
            
            // if($mediasetting->home_banner){

            //     unlink('storage/uploads/media/'.$mediasetting->home_banner);
            // }

            $extension = $request->home_banner->getClientOriginalExtension();
            $imageName = "media_banner".'_'.rand().'.'.$extension;
            $request->home_banner->storeAs('public/uploads/media/',$imageName);
            $data['home_banner'] = $imageName;
        }

        if($request->hasFile('logo')){

            // if($mediasetting->logo){

            //     unlink('storage/uploads/media/'.$mediasetting->logo);
            // }
            $extension = $request->logo->getClientOriginalExtension();
            $imageName = "logo".'_'.rand().'.'.$extension;
            $request->logo->storeAs('public/uploads/media/',$imageName);
            $data['logo'] = $imageName;
        }
        if($request->hasFile('favicon')){

            // if($mediasetting->favicon){

            //     unlink('storage/uploads/media/'.$mediasetting->favicon);
            // }
            $extension = $request->favicon->getClientOriginalExtension();
            $imageName = "favicon".'_'.rand().'.'.$extension;
            $request->favicon->storeAs('public/uploads/media/',$imageName);
            $data['favicon'] = $imageName;
        }

        $mediasetting->update($data);
        
        notify()->success("Generall Settings Media Update successfully", "");
        return redirect()->route('setting.system');

    }
}
