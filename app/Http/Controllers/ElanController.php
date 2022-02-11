<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Elan;
use Illuminate\Validation\Rule;

class ElanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index()
    {

        $elanlar=Elan::all();

       
       
        return view("backend.pages.elan.index",compact("elanlar"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.pages.elan.create");
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
            "content.az"=>"required",
            "slug"=>"required|unique:elans,slug",
            "from"=>Rule::requiredIf($request->to!=''),
            "to"=>Rule::requiredIf($request->from!=''),
        ]);

        $elan=new Elan;


        $elan->from=$request->from;
        $elan->to=$request->to;

        $elan->slug=Str::slug($request->slug);
        foreach (['az','en','ru'] as $locale) {
            $elan->translateOrNew($locale)->name = $request->name["$locale"];
            $elan->translateOrNew($locale)->content = $request->content["$locale"];
        }
        $elan->save();
        return redirect()->route("elan.index")->withSuccess("Ugurla yaradildi");
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
        $elan=Elan::findOrFail($id);

        return view("backend.pages.elan.edit",compact('elan'));
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

        $elan=Elan::findOrFail($id);

    
         $this->validate($request,[
            "name.az"=>"required",
            "content.az"=>"required",
            "slug"=>"required|unique:elans,slug,".$elan->id,

            "from"=>Rule::requiredIf($request->to!=''),
            "to"=>Rule::requiredIf($request->from!=''),
        ]);

        

        $elan->deleteTranslations(); 

        $elan->slug=Str::slug($request->slug);
        foreach (['az','en','ru'] as $locale) {
            $elan->translateOrNew($locale)->name = $request->name["$locale"];
            $elan->translateOrNew($locale)->content = $request->content["$locale"];
        }
        $elan->save();
        return redirect()->route("elan.index")->withSuccess("Ugurla deyisiklik edildi");
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
