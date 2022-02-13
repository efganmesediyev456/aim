<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $blogs=Blog::all();

       
       
        return view("backend.pages.blog.index",compact("blogs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.pages.blog.create");
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
            "name.az"=>"required",
            "text.az"=>"required",
            "image"=>"required|mimes:jpeg,png,jpg",
            "slug"=>"required|unique:blogs,slug",
        ]);

        


        $article = new Blog();


        $image_name=uniqid().'.'.$request->file("image")->getClientOriginalExtension();

        $request->file('image')->storeAs('/public/blogs', $image_name);

        $article->image=$image_name;
        $article->slug=Str::slug($request->slug);
        $article->type=$request->type;

       

        foreach (['az','en','ru'] as $locale) {
            $article->translateOrNew($locale)->name = $request->name["$locale"];
            $article->translateOrNew($locale)->text = $request->text["$locale"];
        }

        
        $article->save();


        if($request->hasFile("gallery")){
            $image_names=[];
            foreach($request->file('gallery') as $galery){
                $image_name=uniqid().'.'.$galery->getClientOriginalExtension();

                $galery->storeAs('/public/blogs/gallery', $image_name);

                $image_names[]=$image_name;
        
                $article->gallery=implode(",",$image_names);
            }
        }

        $article->save();

        return redirect()->route("blog.index")->withSuccess("Ugurla yaradildi");
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
        $blog=Blog::find($id);

        return view("backend.pages.blog.edit",compact('blog'));
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
        
        $article=Blog::find($id);
         
        $this->validate($request,[
            "name.az"=>"required",
            "text.az"=>"required",
            "slug"=>"required|unique:blogs,slug,".$article->id,
        ]);

        
        if($request->hasFile('image')){

            

            if(Storage::exists('/public/blogs/'.$article->image)) {
                Storage::delete('/public/blogs/'.$article->image);
            } 

            $image_name=uniqid().'.'.$request->file("image")->getClientOriginalExtension();

            $request->file('image')->storeAs('/public/blogs', $image_name);

            $article->image=$image_name;
            
        }

        
        $article->slug=Str::slug($request->slug);
        $article->type=$request->type;

        $article->deleteTranslations(); 


        foreach (['az','en','ru'] as $locale) {
            $article->translateOrNew($locale)->name = $request->name["$locale"];
            $article->translateOrNew($locale)->text = $request->text["$locale"];
        }


        if($request->hasFile("gallery")){
            $image_names=[];

            if($article->gallery){
                foreach(explode(',',$article->gallery) as $gy){
                    if(Storage::exists('/public/blogs/gallery/'.$gy)) {
                        Storage::delete('/public/blogs/gallery/'.$gy);
                    } 
                }
            }

            foreach($request->file('gallery') as $galery){
                $image_name=uniqid().'.'.$galery->getClientOriginalExtension();

                $galery->storeAs('/public/blogs/gallery', $image_name);

                $image_names[]=$image_name;
        
                $article->gallery=implode(",",$image_names);
            }
        }

        
        $article->save();

        return redirect()->route("blog.index")->withSuccess("Ugurla update edildi");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article=Blog::find($id);

        if(Storage::exists('/public/blogs/'.$article->image)) {
            Storage::delete('/public/blogs/'.$article->image);
        } 

        if($article->gallery){
            foreach(explode(',',$article->gallery) as $gy){
                if(Storage::exists('/public/blogs/gallery/'.$gy)) {
                    Storage::delete('/public/blogs/gallery/'.$gy);
                } 
            }
        }

        $article->deleteTranslations(); 

        $article->delete();

        return redirect()->route("blog.index")->withSuccess("Ugurla silindi");
    }
}
