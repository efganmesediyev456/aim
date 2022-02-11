<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $faqs=Faq::all();
       
        return view("backend.pages.faq.index",compact("faqs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.pages.faq.create");
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
        ]);

        $faq=new Faq;

        foreach (['az','en','ru'] as $locale) {
            $faq->translateOrNew($locale)->name = $request->name["$locale"];
            $faq->translateOrNew($locale)->content = $request->content["$locale"];
        }


        $faq->save();

        return redirect()->route("faq.index")->withSuccess("Ugurla yaradildi");
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
        $faq=Faq::findOrFail($id);
        return view("backend.pages.faq.edit",compact('faq'));
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
            "content.az"=>"required",
        ]);

        $faq=Faq::findOrFail($id);

        $faq->deleteTranslations();

        foreach (['az','en','ru'] as $locale) {
            $faq->translateOrNew($locale)->name = $request->name["$locale"];
            $faq->translateOrNew($locale)->content = $request->content["$locale"];
        }


        $faq->save();

        return redirect()->route("faq.index")->withSuccess("Ugurla deyisiklik edildi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq=Faq::find($id);
        $faq->deleteTranslations();
        $faq->delete();

        return redirect()->route("faq.index")->withSuccess("Ugurla silindi");
    }
}
