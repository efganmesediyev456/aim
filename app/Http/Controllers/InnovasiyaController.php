<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Innovasiya;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class InnovasiyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $innovasiyalar=Innovasiya::all();
        return view("backend.pages.innovasiya.index",compact("innovasiyalar"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.pages.innovasiya.create");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['slug'=>Str::slug($request->slug)]);
        
        $this->validate($request,[
            "image"=>"required|mimes:jpg,jpeg,png",
            "name.az"=>"required",
            "content.az"=>"required",
            "slug"=>"required|unique:innovasiyas,slug",
        ]);
        $innovasiya=new Innovasiya;

        $innovasiya->slug=Str::slug($request->slug);
        $innovasiya->type=$request->type;

        

    

        $image_name=uniqid().'.'.$request->file("image")->getClientOriginalExtension();

        $request->file('image')->storeAs('/public/innovasiyalar', $image_name);

        $innovasiya->image=$image_name;


       
        
        foreach (['az','en','ru'] as $locale) {
            $innovasiya->translateOrNew($locale)->name = $request->name["$locale"];
            $innovasiya->translateOrNew($locale)->content = $request->content["$locale"];
        }

        $innovasiya->save();

        return redirect()->route("innovasiya.index")->withSuccess("Ugurla yaradildi");
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
        $innovasiya=Innovasiya::findOrFail($id);

        return view("backend.pages.innovasiya.edit",compact('innovasiya'));
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
        $request->merge(['slug'=>Str::slug($request->slug)]);

          $this->validate($request,[
            "image"=>"sometimes|mimes:jpg,jpeg,png",
            "name.az"=>"required",
            "content.az"=>"required",
            "slug"=>"required|unique:innovasiyas,slug,".$id,
        ]);


        $innovasiya=Innovasiya::findOrFail($id);

        $innovasiya->slug=Str::slug($request->slug);
        $innovasiya->type=$request->type;



        if($request->hasFile('image')){

            

            if(Storage::exists('/public/innovasiyalar/'.$innovasiya->image)) {
                Storage::delete('/public/innovasiyalar/'.$innovasiya->image);
            } 

            $image_name=uniqid().'.'.$request->file("image")->getClientOriginalExtension();

            $request->file('image')->storeAs('/public/innovasiyalar', $image_name);

            $innovasiya->image=$image_name;
            
        }


        

    

        


          $innovasiya->deleteTranslations(); 



        foreach (['az','en','ru'] as $locale) {
            $innovasiya->translateOrNew($locale)->name = $request->name["$locale"];
            $innovasiya->translateOrNew($locale)->content = $request->content["$locale"];
        }

        $innovasiya->save();

        return redirect()->route("innovasiya.index")->withSuccess("Ugurla deyisiklik edildi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $innovasiya=Innovasiya::findOrFail($id);

        if(Storage::exists('/public/innovasiyalar/'.$innovasiya->image)) {
                Storage::delete('/public/innovasiyalar/'.$innovasiya->image);
        } 

        $innovasiya->deleteTranslations(); 
        $innovasiya->delete();
        return redirect()->route("innovasiya.index")->withSuccess("Ugurla silindi");


    }
}
