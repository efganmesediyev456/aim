<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Rehber;
use App\Models\Law;
use App\Models\Blog;
use App\Models\Innovasiya;
use App\Models\Elan;
use App\Models\Multimedia;
use App\Models\Setting;
use App\Models\Struktur;

class PagesController extends Controller
{
    public function show($language,$parent,$page){

        $view=$page;
    	$parent=Menu::whereSlug($parent)->firstOrFail();
    	$page=Menu::whereSlug($view)->firstOrFail();
        
    	if($page->parent->id!=$parent->id){
    		abort(404);
    	}


    	$menus=Menu::whereParent_id(0)->where('slug','<>','platforma');
    	$menu=Menu::whereSlug($view)->first();

        
    	
    	if($menu->status==1){

    		return view('frontend.dynamic',['menu'=>$menu,'menus'=>$menus,'page'=>$page]);
    	}

        $data=[
            'menus'=>$menus,
            'page'=>$page,
        ];
        if($view=='rehberlik'){
            $rehberler=Rehber::all();
            $data['rehberler']=$rehberler;
        }elseif(in_array($view,['qanunlar','strateji-yol-xeritesi','dovlet-proqramlari','umumi-hesabatlar','brandbook'])){
            $qanunlar=Law::whereType($view)->get();
            $data['qanunlar']=$qanunlar;
            $view="qanunlar";
        }elseif(in_array($view,['xeberler','musabiqeler'])){

            $xeberler=Blog::whereType($view)->paginate(10);
            $data['xeberler']=$xeberler;
            $view="xeberler";
        }elseif($view=='innovasiya-festivali'){

            $innovasiyalar=Innovasiya::whereType('innovasiya-festivali')->get();

            $data['innovasiyalar']=$innovasiyalar;
        }elseif($view=='layiheler'){

            $setting=Setting::first();


            $layiheler=Innovasiya::whereType('layiheler')->get();

            $data['layiheler']=$layiheler;
            $data['setting']=$setting;
        }elseif($view=='elanlar'){

            $elanlar=ELan::paginate(6);

            $data['elanlar']=$elanlar;
        }elseif($view=='multimedia'){


            $multimedias=Multimedia::all();

            $data['multimedias']=$multimedias;
        }elseif($view=='struktur'){

            $strukturs=Struktur::all();

            $data['strukturs']=$strukturs;

            
        }


    	return view('frontend.'.$view,$data);
    }





     public function child($language,$parent,$page,$child){

        $view=$page;

        $parent=Menu::whereSlug($parent)->firstOrFail();
        $page=Menu::whereSlug($page)->firstOrFail();

        if($page->parent->id!=$parent->id){
            abort(404);
        }



       $menus=Menu::whereParent_id(0)->where('slug','<>','platforma');

        $data=[
            'menus'=>$menus,
            'page'=>$page,
        ];

        if($view=='rehberlik'){
            $rehber=Rehber::whereSlug($child)->firstOrFail();
            $data['rehber']=$rehber;
        }elseif(in_array($view,['xeberler','musabiqeler'])){
            $meta=[];





            $blog=Blog::whereSlug($child)->whereType($view)->firstOrFail();
            $other_blogs=Blog::whereType($view)->latest()->get()->take(10);
            $data['blog']=$blog;
            $data['other_blogs']=$other_blogs;

            $meta['title']=$blog->name;
            $meta['content']=strip_tags($blog->text);
            $meta['image']=asset('storage/blogs/'.$blog->image);
            $data['meta']=$meta;

            $view='xeberler';
        }elseif($view=='innovasiya-festivali'){
            $innovasiya=Innovasiya::whereSlug($child)->whereType('innovasiya-festivali')->firstOrFail();
            $other_innovasiyalar=Innovasiya::whereType('innovasiya-festivali')->latest()->get()->take(10);
            $data['innovasiya']=$innovasiya;
            $data['other_innovasiyalar']=$other_innovasiyalar;

             $meta=[];
              $meta['title']=$innovasiya->name;
            $meta['content']=strip_tags($innovasiya->content);
             $meta['image']=asset('storage/innovasiyalar/'.$innovasiya->image);
              $data['meta']=$meta;


        }elseif($view=="layiheler"){
            $layihe=Innovasiya::whereSlug($child)->whereType('layiheler')->firstOrFail();

            $other_layiheler=Innovasiya::whereType('layiheler')->latest()->get()->take(10);
            $data['layihe']=$layihe;
            $data['other_layiheler']=$other_layiheler;


             $meta=[];
              $meta['title']=$layihe->name;
            $meta['content']=strip_tags($layihe->content);
             $meta['image']=asset('storage/innovasiyalar/'.$layihe->image);
              $data['meta']=$meta;

        }elseif($view=="elanlar"){
            $meta=[];

            $elan=Elan::whereSlug($child)->firstOrFail();
            $meta['title']=$elan->title;
            $meta['content']=strip_tags($elan->content);
            

            $other_elanlar=Elan::latest()->get()->take(10);
            $data['elan']=$elan;
            $data['other_elanlar']=$other_elanlar;
            $data['meta']=$meta;
        }elseif($view=="multimedia"){
            $multimedia=Multimedia::whereSlug($child)->firstOrFail();

             $meta=[];
              $meta['title']=$multimedia->name;
            $meta['content']=strip_tags($multimedia->name);
             $meta['image']=asset('storage/multimedia/'.$multimedia->onlyImage[0]->image);
              $data['meta']=$meta;

            $data['multimedia']=$multimedia;
        }



        return view('frontend.'.$view.'_child',$data);
    }



    public function parent($locale,$parent){

        $menus=Menu::whereParent_id(0)->where('slug','<>','platforma');

        $page=Menu::whereSlug($parent)->firstOrFail();

        $menu=new Menu();


        


        return view('frontend.dynamic',['menu'=>$menu,'menus'=>$menus,'page'=>$page]);
    }
}
