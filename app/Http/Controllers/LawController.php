<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Law;
use Illuminate\Support\Facades\Storage;


class LawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laws=Law::all();
        return view("backend.pages.law.index",compact("laws"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.pages.law.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public static function formatBytes($size, $precision = 2)
    {
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $size;
        }
    }

    public function store(Request $request)
    {





        $this->validate($request,[
            "file"=>"required|mimes:doc,pdf,docx",
            "name.az"=>"required"
        ]);
        $law=new Law;

        $law->type=$request->type;

        

        $fileSize = $request->file('file')->getSize();
        $size=$this->formatBytes($fileSize);


        $file=$request->file;
        $name=uniqid().".".$file->getClientOriginalExtension();

        $file->storeAs('/public/law', $name);
        $law->law_size=$size;
        $law->law_name=$name;
        $law->law_type=$file->getClientOriginalExtension();
        
        foreach (['az','en','ru'] as $locale) {
            $law->translateOrNew($locale)->name = $request->name["$locale"];
        }

        $law->save();

        return redirect()->route("law.index")->withSuccess("Ugurla yaradildi");


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
        $law=Law::find($id);
        return view("backend.pages.law.edit",compact('law'));
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
            "file"=>"sometimes|mimes:doc,pdf,docx",
            "name.az"=>"required"
        ]);
        $law=Law::findOrFail($id);

        $law->type=$request->type;

        if($request->hasFile('file')){
                if(Storage::exists('/public/law/'.$law->law_name)) {
                      Storage::delete('/public/law/'.$law->law_name);
                } 
                $fileSize = $request->file('file')->getSize();
                $size=$this->formatBytes($fileSize);
                $file=$request->file;
                $name=uniqid().".".$file->getClientOriginalExtension();
                $file->storeAs('/public/law', $name);
                $law->law_size=$size;
                $law->law_name=$name;
                $law->law_type=$file->getClientOriginalExtension();
        }
        $law->deleteTranslations(); 
        foreach (['az','en','ru'] as $locale) {
            $law->translateOrNew($locale)->name = $request->name["$locale"];
        }
        $law->save();
        return redirect()->route("law.index")->withSuccess("Ugurla deyisiklik edildi");
        
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
