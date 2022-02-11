<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Str;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {

        $menus=Menu::all();


       
       
        return view("backend.pages.menu.index",compact("menus"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus=Menu::where('parent_id',0)->get();


        return view("backend.pages.menu.create",compact('menus'));
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
            "slug"=>"required|unique:menus,slug",
            "name.az"=>"required",
            "parent_id"=>"integer",
            "status"=>"required",
            "content.az"=>"required_if:status,1"
        ]);


        $menu=new Menu();
        $menu->parent_id=$request->parent_id;
        $menu->status=$request->status;
        $menu->slug=Str::slug($request->slug);

        foreach (['az','en','ru'] as $locale) {
            $menu->translateOrNew($locale)->name = $request->name["$locale"];
            $menu->translateOrNew($locale)->content = $request->content["$locale"];
        }

        $menu->save();


        return redirect()->route("menu.index")->withSuccess("Ugurla yaradildi");



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

       
        $menus=Menu::where('parent_id',0)->get();
        $menu=Menu::findOrFail($id);

        return view("backend.pages.menu.edit",compact('menu','menus'));
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
            "slug"=>"required|unique:menus,slug,".$id,
            "name.az"=>"required",
            "parent_id"=>"integer",
            "status"=>"required",
            "content.az"=>"required_if:status,1"
        ]);

        $menu=Menu::find($id);

        $menu->parent_id=$request->parent_id;
        $menu->status=$request->status;
        $menu->slug=Str::slug($request->slug);

        $menu->deleteTranslations(); 


        foreach (['az','en','ru'] as $locale) {
            $menu->translateOrNew($locale)->name = $request->name["$locale"];
            $menu->translateOrNew($locale)->content = $request->status==0 ? null : $request->content["$locale"];
        }

        $menu->save();

        return redirect()->route("menu.index")->withSuccess("Ugurla deyisdirildi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu=Menu::find($id);
        $menu->deleteTranslations(); 


        $menu->childs()->delete();

        $menu->delete();

        return redirect()->route("menu.index")->withSuccess("Ugurla silindi");
    }
}
