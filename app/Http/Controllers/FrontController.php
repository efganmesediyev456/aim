<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Menu;
use App\Models\Teqvim;
use App\Models\Faq;
use App\Models\Contact;
use App\Models\Fealiyyet;
use App\Models\Innovasiya;
use App\Models\TerefdasQurum;
use App\Models\UseFullLink;
use App\Models\Slider;
use App\Models\Elan;
use App\Models\Setting;

use Illuminate\Support\Facades\Validator;



class FrontController extends Controller
{
    public function index(){
    	$blogs=Blog::whereType('xeberler')->get();
    	$menus=Menu::whereParent_id(0)->where("slug","<>","platforma");
        $tedbirler=Teqvim::wherePage_type('tedbir')->latest()->get()->take(3);
        $fealiyyetler=Fealiyyet::all();

        $layiheler=Innovasiya::whereType('layiheler')->get();
        $terefdas_qurums=TerefdasQurum::all();
        $links=UseFullLink::all();
        $sliders=Slider::all();
        $elanlar=Elan::whereNotNull('to')->whereNotNull('from')->latest()->get()->take(3);


    	return view("frontend.home",compact('blogs','menus','tedbirler','fealiyyetler','layiheler','terefdas_qurums','links','sliders','elanlar'));
    }


    public function teqvim(){
    	$menus=Menu::whereParent_id(0)->where("slug","<>","platforma");
    	$page=Menu::whereSlug('innovasiya-teqvimi')->first();
    	$teqvims=Teqvim::wherePage_type('teqvim')->get();
        $data=[
            'menus'=>$menus,
            'page'=>$page,
            'teqvims'=>$teqvims,
        ];
    		
    		return view('frontend.teqvim',$data);
    }

    public function search(Request $request){

        $search='';
        $selections=[];
        $format_type='';
        if($request->has('search')){
            $search=$request->search;
        }

        if($request->has('selections')){
            $selections=$request->selections;
        }

         if($request->has('format_type')){
            $format_type=$request->format_type;
        }




        


        $teqvims = Teqvim::wherePage_type('teqvim')->whereHas('translations', function ($query) use ($search, $selections, $format_type) {
            
                $query->where('locale', app()->getLocale());
                if($search){

                    $query->where(function($s) use ($search){
                            $s->where('name', 'like', '%'.$search.'%')->orWhere('title', 'like', '%'.$search.'%')->
                            orWhere('content', 'like', '%'.$search.'%');
                    
                    });
                   
                }
                if($format_type){
                    $query->where('format_type', $format_type);
                }
                
                if(count($selections)){
                      foreach($selections as $select){
                  $query->where('type', 'like', '%'.$select.'%');   
                }
                }

              
            
        })
        ->get();


        $view=view('frontend.partials.teqvim',compact('teqvims'))->render();






        return $view;


    }


    public function contact(Request $request){

        $request->merge(['fin_code'=>trim($request->fin_code,'_')]);
        $request->merge(['mobile'=>trim($request->mobile,'_')]);

    



      

        $validator=Validator::make($request->all(),[

            "name"=>"required",
            "surname"=>"required",
            "address"=>"required",
            "topic"=>"required",
            "fin_code"=>"required|string|size:7",
            "email"=>"required|email",
            "mobile"=>"required|string|size:15",
            "message"=>"required",

        ],[

                "mobile.size"=>"mobile 10 rəqəmli olmalidir"

        ]);



        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

         $contact=Contact::create($request->all());



        return response()->json('success',200);




    }




    public function elaqe(){
        $menus=Menu::whereParent_id(0)->where("slug","<>","platforma");;
        $page=Menu::whereSlug('elaqe')->first();
        $setting=Setting::first();
        $faqs=Faq::all();
        $data=[
            'menus'=>$menus,
            'page'=>$page,
            'faqs'=>$faqs,
            'setting'=>$setting,
        ];
        
        return view('frontend.elaqe',$data);
    }



    public function fealiyyet(){


        $menus=Menu::whereParent_id(0)->where("slug","<>","platforma");;
        $page='';
        $fealiyyetler=Fealiyyet::all();
        $data=[
            'menus'=>$menus,
            'page'=>$page,
            'fealiyyetler'=>$fealiyyetler,
        ];
        
        return view('frontend.fealiyyet',$data);


    }


    public function platforma(){

        $menus=Menu::whereParent_id(0)->where('slug','<>','platforma');
        $page=Menu::whereSlug('platforma')->firstOrFail();


         $data=[
            'menus'=>$menus,
            'page'=>$page,
        ];
        
        return view('frontend.platforma',$data);
        
    }
}
