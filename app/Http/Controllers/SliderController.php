<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::all();
        return view("backend.pages.slider.index",compact("sliders"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.pages.slider.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            "name.az"=>"required",
            "title.az"=>"required",
            "image"=>"required|mimes:jpeg,png,jpg",
        ]);

        


        $slider = new Slider();


        $image_name=uniqid().'.'.$request->file("image")->getClientOriginalExtension();

        $request->file('image')->storeAs('/public/slider', $image_name);

        $slider->image=$image_name;
        

       

        foreach (['az','en','ru'] as $locale) {
            $slider->translateOrNew($locale)->name = $request->name["$locale"];
            $slider->translateOrNew($locale)->title = $request->title["$locale"];
        }

        
        $slider->save();



        return redirect()->route("slider.index")->withSuccess("Ugurla yaradildi");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        $slider=Slider::find($id);

        return view("backend.pages.slider.edit",compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
            "name.az"=>"required",
            "title.az"=>"required",
            "image"=>"sometimes|mimes:jpeg,png,jpg",
        ]);

        


        $slider = Slider::findOrFail($id);
        
        if($request->hasFile('image')){

            

            if(Storage::exists('/public/slider/'.$slider->image)) {
                Storage::delete('/public/slider/'.$slider->image);
            } 

            $image_name=uniqid().'.'.$request->file("image")->getClientOriginalExtension();

            $request->file('image')->storeAs('/public/slider', $image_name);

            $slider->image=$image_name;
            
        }


        $slider->deleteTranslations();
       

        foreach (['az','en','ru'] as $locale) {
            $slider->translateOrNew($locale)->name = $request->name["$locale"];
            $slider->translateOrNew($locale)->title = $request->title["$locale"];
        }

        
        $slider->save();



        return redirect()->route("slider.index")->withSuccess("Ugurla deyisiklik edildi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $slider = Slider::findOrFail($id);

          if(Storage::exists('/public/slider/'.$slider->image)) {
                Storage::delete('/public/slider/'.$slider->image);
            } 

         $slider->deleteTranslations();
         $slider->delete();

        return redirect()->route("slider.index")->withSuccess("Ugurla silindi");

    }
}
