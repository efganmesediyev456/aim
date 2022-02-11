<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index(){
    	$setting=Setting::first();
    	return view("backend.setting",compact('setting'));
    }


    public function settingPost(Request $request){
    	$this->validate($request,[
    		"address"=>"required",
    		"mobile"=>"required",
    		"map"=>"required",
    		"layihe_image_page"=>"sometimes|mimes:jpg,jpeg,png,svg",
    		'innovasiya_festivali_image_page'=>'sometimes|mimes:jpg,jpeg,png,svg',
    		'facebook'=>'required',
            'email'=>'required',
    	]);


    	$setting=Setting::first();

    	if(!$setting){
    		$setting=new Setting;
    		
    	}

    	$setting->address=$request->address;
        $setting->number=$request->mobile;
    	$setting->email=$request->email;
    	$setting->map=$request->map;



         if($request->hasFile('layihe_image_page')){

            if(Storage::exists('/public/setting/'.$setting->layihe_image_page)) {
                Storage::delete('/public/setting/'.$setting->layihe_image_page);
            } 

            $image_name=uniqid().'.'.$request->file("layihe_image_page")->getClientOriginalExtension();

            $request->file('layihe_image_page')->storeAs('/public/setting', $image_name);

            $setting->layihe_image_page=$image_name;
            
            
            }






        if($request->hasFile('innovasiya_festivali_image_page')){

            if(Storage::exists('/public/setting/'.$setting->innovasiya_festivali_image_page)) {
                Storage::delete('/public/setting/'.$setting->innovasiya_festivali_image_page);
            } 

            $image_name=uniqid().'.'.$request->file("innovasiya_festivali_image_page")->getClientOriginalExtension();

            $request->file('innovasiya_festivali_image_page')->storeAs('/public/setting', $image_name);

            $setting->innovasiya_festivali_image_page=$image_name;
            
            
        }



        $setting->facebook=$request->facebook;


        $setting->save();



        return redirect()->to("admin/setting")->withSuccess("Ugurla deyikilk etildi");

  
    }
}
