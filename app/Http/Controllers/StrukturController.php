<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Struktur;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $strukturs=Struktur::all();
       
        return view("backend.pages.struktur.index",compact("strukturs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           $strukturs=Struktur::all();
        return view("backend.pages.struktur.create",compact('strukturs'));
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

            'name.az'=>'required'

        ]);

        $struktur=new Struktur;

        $struktur->step=$request->step;


        foreach (['az','en','ru'] as $locale) {
            $struktur->translateOrNew($locale)->name = $request->name["$locale"];
        }

        $struktur->save();

        return redirect()->route("struktur.index")->withSuccess("Ugurla yaradildi");
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
        $struktur=Struktur::find($id);
        $strukturs=Struktur::all();


        return view("backend.pages.struktur.edit",compact('struktur','strukturs'));
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

            'name.az'=>'required'

        ]);

        $struktur=Struktur::find($id);

        $struktur->step=$request->step;

        $struktur->deleteTranslations();


        foreach (['az','en','ru'] as $locale) {
            $struktur->translateOrNew($locale)->name = $request->name["$locale"];
        }

        $struktur->save();

        return redirect()->route("struktur.index")->withSuccess("Ugurla deyisiklik edildi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $struktur=Struktur::find($id);

           $struktur->deleteTranslations();

            $struktur->delete();

        return redirect()->route("struktur.index")->withSuccess("Ugurla silindi");

    }
}
