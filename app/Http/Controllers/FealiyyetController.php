<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fealiyyet;
use Illuminate\Support\Facades\Storage;

class FealiyyetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $fealiyyets=Fealiyyet::all();

       
       
        return view("backend.pages.fealiyyet.index",compact("fealiyyets"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.pages.fealiyyet.create");
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
            'image'=>"required|image|mimes:jpg,jpeg,png,svg",
            'content.az'=>'required',
            'name.az'=>'required',
        ]);



        $fealiyyet=new Fealiyyet;


        $image_name=uniqid().'.'.$request->file("image")->getClientOriginalExtension();

        $request->file('image')->storeAs('/public/fealiyyet', $image_name);

        $fealiyyet->image=$image_name;


        foreach (['az','en','ru'] as $locale) {
            $fealiyyet->translateOrNew($locale)->name = $request->name["$locale"];
            $fealiyyet->translateOrNew($locale)->content = $request->content["$locale"];
        }


        $fealiyyet->save();

        return redirect()->route("fealiyyet.index")->withSuccess("Ugurla yaradildi");

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
        $fealiyyet=Fealiyyet::find($id);

        return view("backend.pages.fealiyyet.edit",compact('fealiyyet'));
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
            'image'=>"sometimes|image|mimes:jpg,jpeg,png,svg",
            'content.az'=>'required',
            'name.az'=>'required',
        ]);



        $fealiyyet=Fealiyyet::findOrFail($id);




        if($request->hasFile('image')){

            

            if(Storage::exists('/public/fealiyyet/'.$fealiyyet->image)) {
                Storage::delete('/public/fealiyyet/'.$fealiyyet->image);
            } 

            $image_name=uniqid().'.'.$request->file("image")->getClientOriginalExtension();

            $request->file('image')->storeAs('/public/fealiyyet', $image_name);

            $fealiyyet->image=$image_name;
            
        }



        $fealiyyet->deleteTranslations();

   


        foreach (['az','en','ru'] as $locale) {
            $fealiyyet->translateOrNew($locale)->name = $request->name["$locale"];
            $fealiyyet->translateOrNew($locale)->content = $request->content["$locale"];
        }


        $fealiyyet->save();

        return redirect()->route("fealiyyet.index")->withSuccess("Ugurla deyisiklik edildi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $fealiyyet=Fealiyyet::findOrFail($id);



            if(Storage::exists('/public/fealiyyet/'.$fealiyyet->image)) {
                Storage::delete('/public/fealiyyet/'.$fealiyyet->image);
            } 


           $fealiyyet->deleteTranslations();

           $fealiyyet->delete();

            return redirect()->route("fealiyyet.index")->withSuccess("Ugurla silindi");

    }
}
