<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rehber;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class RehberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {

        $rehberler=Rehber::all();
        return view("backend.pages.rehber.index",compact("rehberler"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.pages.rehber.create");
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
            "slug"=>"required|unique:rehbers,slug",
            "position.az"=>"required",
            "name.az"=>"required|string",
            "position.az"=>"required|string",
            "surname.az"=>"required|string",
            "title.az"=>"required|string",
            "content.az"=>"required|string",
            "image"=>"required|image|mimes:png,jpg,jpeg",
        ]);

        $rehber=new Rehber();
        $rehber->slug=Str::slug($request->slug);



        $image_name=uniqid().'.'.$request->file("image")->getClientOriginalExtension();

        $request->file('image')->storeAs('/public/rehberler', $image_name);

        $rehber->image=$image_name;


        foreach (['az','en','ru'] as $locale) {
            $rehber->translateOrNew($locale)->name = $request->name["$locale"];
            $rehber->translateOrNew($locale)->surname = $request->surname["$locale"];
            $rehber->translateOrNew($locale)->position = $request->position["$locale"];
            $rehber->translateOrNew($locale)->title = $request->title["$locale"];
            $rehber->translateOrNew($locale)->content = $request->content["$locale"];
        }
        

         $rehber->save();


         return redirect()->route("rehber.index")->withSuccess("Ugurla yaradildi");



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
        $rehber=Rehber::find($id);

        return view("backend.pages.rehber.edit",compact('rehber'));
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
         $rehber=Rehber::findOrFail($id);
        
        $this->validate($request,[
            "slug"=>"required|unique:rehbers,slug,".$rehber->id,
            "position.az"=>"required",
            "name.az"=>"required|string",
            "position.az"=>"required|string",
            "surname.az"=>"required|string",
            "title.az"=>"required|string",
            "content.az"=>"required|string",
        ]);

       
        $rehber->slug=Str::slug($request->slug);



        if($request->hasFile('image')){

            

            if(Storage::exists('/public/rehberler/'.$rehber->image)) {
                Storage::delete('/public/rehberler/'.$rehber->image);
            } 

            $image_name=uniqid().'.'.$request->file("image")->getClientOriginalExtension();

            $request->file('image')->storeAs('/public/rehberler', $image_name);

            $rehber->image=$image_name;
            
        }

            $rehber->deleteTranslations(); 

       


        foreach (['az','en','ru'] as $locale) {
            $rehber->translateOrNew($locale)->name = $request->name["$locale"];
            $rehber->translateOrNew($locale)->surname = $request->surname["$locale"];
            $rehber->translateOrNew($locale)->position = $request->position["$locale"];
            $rehber->translateOrNew($locale)->title = $request->title["$locale"];
            $rehber->translateOrNew($locale)->content = $request->content["$locale"];
        }
        

         $rehber->save();


         return redirect()->route("rehber.index")->withSuccess("Ugurla update edildi");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $rehber=Rehber::find($id);

        if(Storage::exists('/public/rehberler/'.$rehber->image)) {
                Storage::delete('/public/rehberler/'.$rehber->image);
            } 

         $rehber->deleteTranslations(); 

         $rehber->delete();
        return redirect()->route("rehber.index")->withSuccess("Ugurla silindi");

    }
}
