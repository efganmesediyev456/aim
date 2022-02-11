<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multimedia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class MultimediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $multimedias=Multimedia::all();



       
       
        return view("backend.pages.multimedia.index",compact("multimedias"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.pages.multimedia.create");
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
            "slug"=>"required|unique:multimedia,slug",
            "file"=>'required|array|min:1',
            "file.*"=>'image|mimes:jpg,jpeg,png'
            
        ]);


        $multimedia=new Multimedia;
        $multimedia->slug=Str::slug($request->slug);
        $multimedia->save();



        foreach($request->file as $file){

        $image_name=uniqid().'.'.$file->getClientOriginalExtension();

        $file->storeAs('/public/multimedia', $image_name);

        $multimedia->images()->create([

            'type'=>'image',
            "image"=>$image_name,

        ]);

        };
        

        if($request->has("video")){

            foreach($request->video as $video){

             $multimedia->images()->create([

                 'type'=>'video',
                 "image"=>$video,

            ]);


            }
        }


        foreach (['az','en','ru'] as $locale) {
            $multimedia->translateOrNew($locale)->name = $request->name["$locale"];
        }

        
        $multimedia->save();

        return redirect()->route("multimedia.index")->withSuccess("Ugurla yaradildi");
        






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
        $multimedia=Multimedia::find($id);
        return view('backend.pages.multimedia.edit',compact('multimedia'));
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
            "slug"=>"required|unique:multimedia,slug,".$id,
        ]);


        $multimedia=Multimedia::findOrFail($id);
        $multimedia->slug=Str::slug($request->slug);
        $multimedia->save();



        if($request->has('file')){


            foreach($multimedia->onlyImage as $multi){
                if(Storage::exists('/public/multimedia/'.$multi->image)) {
                Storage::delete('/public/multimedia/'.$multi->image);
                } 
            }


            $multimedia->onlyImage()->delete();

             foreach($request->file as $file){

                $image_name=uniqid().'.'.$file->getClientOriginalExtension();

                $file->storeAs('/public/multimedia', $image_name);

                $multimedia->images()->create([

                    'type'=>'image',
                    "image"=>$image_name,

                ]);

            };

        }


       
         if($request->has("video")){

            $multimedia->videos()->delete();

            foreach($request->video as $video){

             $multimedia->images()->create([

                 'type'=>'video',
                 "image"=>$video,

            ]);


            }
        }

           

        $multimedia->deleteTranslations(); 



       
         foreach (['az','en','ru'] as $locale) {
            $multimedia->translateOrNew($locale)->name = $request->name["$locale"];
        }

        
        $multimedia->save();

        return redirect()->route("multimedia.index")->withSuccess("Ugurla deyisiklik edildi");

       


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $multimedia=Multimedia::findOrFail($id);
        foreach($multimedia->onlyImage as $multi){
                if(Storage::exists('/public/multimedia/'.$multi->image)) {
                Storage::delete('/public/multimedia/'.$multi->image);
                } 
        }

        $multimedia->images()->delete();

        $multimedia->deleteTranslations(); 

        $multimedia->delete();

        return redirect()->route("multimedia.index")->withSuccess("Ugurla silindi");

    }
}
