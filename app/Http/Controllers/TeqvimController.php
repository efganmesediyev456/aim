<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teqvim;

class TeqvimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {

        $teqvims=Teqvim::all();

       
       
        return view("backend.pages.teqvim.index",compact("teqvims"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.pages.teqvim.create");
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
            "type"=>"required|array|min:1",
            'day'=>"required|array|min:1",
            'day.*'=>"required",
            'from'=>"required|string",
            "to"=>"required|string",
            'name.az'=>"required",
            'title.az'=>"required",
            'content.az'=>"required",
        ]);
        $teqvim=new Teqvim;
        $teqvim->format_type=$request->format;
        $teqvim->page_type=$request->page_type;

        $teqvim->type=implode(',',$request->type);
        
        $teqvim->day=implode(',',$request->day);

        $teqvim->from_hour=$request->from;
        $teqvim->to_hour=$request->to;


        foreach (['az','en','ru'] as $locale) {
            $teqvim->translateOrNew($locale)->name = $request->name["$locale"];
            $teqvim->translateOrNew($locale)->title = $request->title["$locale"];
            $teqvim->translateOrNew($locale)->content = $request->content["$locale"];
        }

        $teqvim->save();

        return redirect()->route("teqvim.index")->withSuccess("Ugurla yaradildi");

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
        $teqvim=Teqvim::find($id);
      return view("backend.pages.teqvim.edit",compact('teqvim'));
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
            "type"=>"required|array|min:1",
            'day'=>"required|array|min:1",
            'day.*'=>"required",
            'from'=>"required|string",
            "to"=>"required|string",
            'name.az'=>"required",
            'title.az'=>"required",
            'content.az'=>"required",
        ]);
        $teqvim=Teqvim::findOrFail($id);
        $teqvim->format_type=$request->format;
        $teqvim->page_type=$request->page_type;


        $teqvim->type=implode(',',$request->type);
        
        $teqvim->day=implode(',',$request->day);

        $teqvim->from_hour=$request->from;
        $teqvim->to_hour=$request->to;

        $teqvim->deleteTranslations();


        foreach (['az','en','ru'] as $locale) {
            $teqvim->translateOrNew($locale)->name = $request->name["$locale"];
            $teqvim->translateOrNew($locale)->title = $request->title["$locale"];
            $teqvim->translateOrNew($locale)->content = $request->content["$locale"];
        }

        $teqvim->save();

        return redirect()->route("teqvim.index")->withSuccess("Ugurla deyisiklik edildi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teqvim=Teqvim::find($id);
        $teqvim->deleteTranslations();
        $teqvim->delete();

        return redirect()->route("teqvim.index")->withSuccess("Ugurla silindi");
    }
}
