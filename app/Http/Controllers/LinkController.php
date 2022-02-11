<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UseFullLink;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $links=UseFullLink::all();
       
        return view("backend.pages.link.index",compact("links"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.pages.link.create");
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
            "link"=>"required",
        ]);

        $link=new UseFullLink;
        $link->link=$request->link;

        foreach (['az','en','ru'] as $locale) {
            $link->translateOrNew($locale)->name = $request->name["$locale"];
        }


        $link->save();

        return redirect()->route("link.index")->withSuccess("Ugurla yaradildi");
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
        $link=UseFullLink::findOrFail($id);
        return view("backend.pages.link.edit",compact('link'));
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
            "link"=>"required",
        ]);

        $link=UseFullLink::findOrFail($id);
        $link->link=$request->link;

        $link->deleteTranslations();

        foreach (['az','en','ru'] as $locale) {
            $link->translateOrNew($locale)->name = $request->name["$locale"];
        }


        $link->save();

        return redirect()->route("link.index")->withSuccess("Ugurla deyisiklik edildi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link=UseFullLink::find($id);
         $link->deleteTranslations();
          $link->delete();
                  return redirect()->route("link.index")->withSuccess("Ugurla silindi");

    }
}
