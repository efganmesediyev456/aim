<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Blog;
use App\Models\Elan;
use App\Models\Faq;
use App\Models\Innovasiya;

class SearchController extends Controller
{
     public function search($search,$axtar)
    {
    	$menus=Menu::whereParent_id(0)->where('slug','<>','platforma');

    	$data=[];
    	



		$blogs = Blog::whereHas('translations', function ($query) use($axtar) {
			$query->where("locale",'{{app()->getLocale()}}');
         $query->where('name', 'like', '%'.$axtar.'%')->orWhere('text','like', '%'.$axtar.'%');
    	})->get();

		$data['xeberler']=$blogs;



		$elanlar = Elan::whereHas('translations', function ($query) use($axtar) {
			$query->where("locale",'{{app()->getLocale()}}');

         $query->where('name', 'like', '%'.$axtar.'%')->orWhere('content','like', '%'.$axtar.'%')->
         orWhere("from",'like', '%'.$axtar.'%')->
         orWhere("to",'like', '%'.$axtar.'%');
    	})->get();

		$data['elanlar']=$elanlar;
       


       $faqs = Faq::whereHas('translations', function ($query) use($axtar) {

		 $query->where("locale",'{{app()->getLocale()}}');

         $query->where('name', 'like', "%{$axtar}%")->orWhere('content','like', "%{$axtar}%");
    	})->get();

		$data['elaqe']=$faqs;
       




       $innovasiyalar = Innovasiya::whereType('innovasiya-festivali')->whereHas('translations', function ($query) use($axtar) {

		 $query->where("locale",'{{app()->getLocale()}}');

         $query->where('name', 'like', "%{$axtar}%")->orWhere('content','like', "%{$axtar}%");
    	})->get();

		$data['innovasiya-festivali']=$innovasiyalar;




		 $layiheler = Innovasiya::whereType('layiheler')->whereHas('translations', function ($query) use($axtar) {

		 $query->where("locale",'{{app()->getLocale()}}');

         $query->where('name', 'like', "%{$axtar}%")->orWhere('content','like', "%{$axtar}%");
    	})->get();

		$data['layiheler']=$layiheler;










       



        

         

              


    	return view("frontend.search",compact('data',"menus"));
    	
    }
}
