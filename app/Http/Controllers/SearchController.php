<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Blog;
use App\Models\Elan;
use App\Models\Faq;
use App\Models\Innovasiya;
use App\Models\Law;
use App\Models\Multimedia;
use App\Models\Rehber;
use App\Models\Struktur;
use App\Models\Teqvim;

class SearchController extends Controller
{
     public function search($search,$axtar)
    {
    	$menus=Menu::whereParent_id(0)->where('slug','<>','platforma');

    	$data=[];
    	



		$blogs = Blog::whereType('xeberler')->whereHas('translations', function ($query) use($axtar) {
			$query->where("locale",app()->getLocale());
         $query->where('name', 'like', '%'.$axtar.'%')->orWhere('text','like', '%'.$axtar.'%');
    	})->get();

		$data['xeberler']=$blogs;



        $blogs = Blog::whereType('musabiqeler')->whereHas('translations', function ($query) use($axtar) {
            $query->where("locale",app()->getLocale());
         $query->where('name', 'like', '%'.$axtar.'%')->orWhere('text','like', '%'.$axtar.'%');
        })->get();

        $data['musabiqeler']=$blogs;



		$elanlar = Elan::whereHas('translations', function ($query) use($axtar) {
			$query->where("locale",app()->getLocale());

         $query->where('name', 'like', '%'.$axtar.'%')->orWhere('content','like', '%'.$axtar.'%')->
         orWhere("from",'like', '%'.$axtar.'%')->
         orWhere("to",'like', '%'.$axtar.'%');
    	})->get();

		$data['elanlar']=$elanlar;
       


       $faqs = Faq::whereHas('translations', function ($query) use($axtar) {

		 $query->where("locale",app()->getLocale());

         $query->where('name', 'like', "%{$axtar}%")->orWhere('content','like', "%{$axtar}%");
    	})->get();

		$data['elaqe']=$faqs;
       




       $innovasiyalar = Innovasiya::whereType('innovasiya-festivali')->whereHas('translations', function ($query) use($axtar) {

		 $query->where("locale",app()->getLocale());

         $query->where('name', 'like', "%{$axtar}%")->orWhere('content','like', "%{$axtar}%");
    	})->get();

		$data['innovasiya-festivali']=$innovasiyalar;




		$layiheler = Innovasiya::whereType('layiheler')->whereHas('translations', function ($query) use($axtar) {

		 $query->where("locale",app()->getLocale());

         $query->where('name', 'like', "%{$axtar}%")->orWhere('content','like', "%{$axtar}%");
    	})->get();

		$data['layiheler']=$layiheler;




        $laws = Law::whereType('umumi-hesabatlar')->whereHas('translations', function ($query) use($axtar) {

         $query->where("locale",app()->getLocale() );

         $query->where('name', 'like', "%".$axtar."%");
        })->get();

        $data['umumi-hesabatlar']=$laws;




        $laws = Law::whereType('qanunlar')->whereHas('translations', function ($query) use($axtar) {

         $query->where("locale",app()->getLocale() );

         $query->where('name', 'like', "%".$axtar."%");
        })->get();

        $data['qanunlar']=$laws;




        $laws = Law::whereType('strateji-yol-xeritesi')->whereHas('translations', function ($query) use($axtar) {

         $query->where("locale",app()->getLocale() );

         $query->where('name', 'like', "%".$axtar."%");
        })->get();

        $data['strateji-yol-xeritesi']=$laws;



         $laws = Law::whereType('dovlet-proqramlari')->whereHas('translations', function ($query) use($axtar) {

         $query->where("locale",app()->getLocale() );

         $query->where('name', 'like', "%".$axtar."%");
        })->get();

        $data['dovlet-proqramlari']=$laws;





         $multimedias = Multimedia::whereHas('translations', function ($query) use($axtar) {

         $query->where("locale",app()->getLocale() );

         $query->where('name', 'like', "%".$axtar."%");
        })->get();

        $data['multimedia']=$multimedias;




        $rehberler = Rehber::whereHas('translations', function ($query) use($axtar) {

         $query->where("locale",app()->getLocale() );

         $query->where('name', 'like', "%".$axtar."%")
            ->orWhere('position', 'like', "%".$axtar."%")
            ->orWhere('surname', 'like', "%".$axtar."%")
            ->orWhere('title', 'like', "%".$axtar."%")
            ->orWhere('content', 'like', "%".$axtar."%");
        })->get();

        $data['rehberlik']=$rehberler;



        $strukturs = Struktur::whereHas('translations', function ($query) use($axtar) {

        $query->where("locale",app()->getLocale());

         $query->where('name', 'like', "%".$axtar."%");
        })->get();

        $data['struktur']=$strukturs;






        $teqvims = Teqvim::whereType('teqvim')->whereHas('translations', function ($query) use($axtar) {

        $query->where("locale",app()->getLocale());

         $query->where('name', 'like', "%".$axtar."%")
            ->orWhere('title', 'like', "%".$axtar."%")
            ->orWhere('content', 'like', "%".$axtar."%");



        })->get();

        $data['innovasiya-teqvimi']=$teqvims;


        










       



        

         

              


    	return view("frontend.search",compact('data',"menus"));
    	
    }
}
