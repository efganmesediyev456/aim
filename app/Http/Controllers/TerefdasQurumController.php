<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TerefdasQurum;
use Illuminate\Support\Facades\Storage;

class TerefdasQurumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index()
    {
        $terefdas=TerefdasQurum::all();
        return view("backend.pages.terefdas.index",compact('terefdas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.pages.terefdas.create");
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
             "image"=>"required|mimes:jpeg,png,jpg,svg",
        ]);

        $terefdas = new TerefdasQurum();

        $image_name=uniqid().'.'.$request->file("image")->getClientOriginalExtension();

        $request->file('image')->storeAs('/public/terefdas', $image_name);

        $terefdas->image=$image_name;

        foreach (['az','en','ru'] as $locale) {
            $terefdas->translateOrNew($locale)->name = $request->name["$locale"];
        }

        
        $terefdas->save();

        return redirect()->route("terefdas.index")->withSuccess("Ugurla yaradildi");
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
         $terefdas=TerefdasQurum::find($id);

        return view("backend.pages.terefdas.edit",compact('terefdas'));
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
             "image"=>"sometimes|mimes:jpeg,png,jpg,svg",
        ]);

        $terefdas = TerefdasQurum::findOrFail($id);

        
          if($request->hasFile('image')){

            

            if(Storage::exists('/public/terefdas/'.$terefdas->image)) {
                Storage::delete('/public/terefdas/'.$terefdas->image);
            } 

            $image_name=uniqid().'.'.$request->file("image")->getClientOriginalExtension();

            $request->file('image')->storeAs('/public/terefdas', $image_name);

            $terefdas->image=$image_name;
            
        }
        $terefdas->deleteTranslations();


        foreach (['az','en','ru'] as $locale) {
            $terefdas->translateOrNew($locale)->name = $request->name["$locale"];
        }

        
        $terefdas->save();

        return redirect()->route("terefdas.index")->withSuccess("Ugurla deysiklik edildi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
