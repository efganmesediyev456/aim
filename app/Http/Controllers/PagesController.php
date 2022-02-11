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
            $blog=Blog::whereSlug($child)->whereType($view)->firstOrFail();
            $other_blogs=Blog::whereType($view)->latest()->get()->take(10);
            $data['blog']=$blog;
            $data['other_blogs']=$other_blogs;
            $view='xeberler';
        }elseif($view=='innovasiya-festivali'){
            $innovasiya=Innovasiya::whereSlug($child)->whereType('innovasiya-festivali')->firstOrFail();
            $other_innovasiyalar=Innovasiya::whereType('innovasiya-festivali')->latest()->get()->take(10);
            $data['innovasiya']=$innovasiya;
            $data['other_innovasiyalar']=$other_innovasiyalar;
        }elseif($view=="layiheler"){
            $layihe=Innovasiya::whereSlug($child)->whereType('layiheler')->firstOrFail();

            $other_layiheler=Innovasiya::whereType('layiheler')->latest()->get()->take(10);
            $data['layihe']=$layihe;
            $data['other_layiheler']=$other_layiheler;
        }elseif($view=="elanlar"){
            $elan=Elan::whereSlug($child)->firstOrFail();

            $other_elanlar=Elan::latest()->get()->take(10);
            $data['elan']=$elan;
            $data['other_elanlar']=$other_elanlar;
        }elseif($view=="multimedia"){
            $multimedia=Multimedia::whereSlug($child)->firstOrFail();

            $data['multimedia']=$multimedia;
        }



        return view('frontend.'.$view.'_child',$data);
    }
}
