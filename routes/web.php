<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\FrontBlogController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RehberController;
use App\Http\Controllers\LawController;
use App\Http\Controllers\InnovasiyaController;
use App\Http\Controllers\ElanController;
use App\Http\Controllers\MultimediaController;
use App\Http\Controllers\TeqvimController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FealiyyetController;
use App\Http\Controllers\TerefdasQurumController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['register' => false]);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(["middleware"=>"auth","prefix"=>"admin"],function(){
    Route::get("/",[AdminDashboardController::class,"index"]);
    Route::get("/contact",[AdminDashboardController::class,"contact"])->name('contact');
    Route::resource("/blog",BlogController::class);
    Route::resource("/menu",MenuController::class);
    Route::resource("/rehber",RehberController::class);
    Route::resource("/law",LawController::class);
    Route::resource("/innovasiya",InnovasiyaController::class);
    Route::resource("/elan",ElanController::class);
    Route::resource("/multimedia",MultimediaController::class);
    Route::resource("/teqvim",TeqvimController::class);
    Route::resource("/faq",FaqController::class);
    Route::resource("/fealiyyet",FealiyyetController::class);
    Route::resource("/terefdas",TerefdasQurumController::class);
    Route::resource("/link",LinkController::class);
    Route::resource("/slider",SliderController::class);
    Route::get("/setting",[SettingController::class,'index'])->name('setting.index');
    Route::post("/setting",[SettingController::class,'settingPost'])->name('setting.store');
    Route::post('ckeditor/image_upload', [AdminDashboardController::class, 'upload'])->name('upload');
});





Route::group(['prefix' => '{locale?}', 'middleware' => 'localize','as'=>'frond'], function () {
    
    Route::get('/',[FrontController::class,'index'])->name('.index');
    Route::get('/innovasiya-teqvimi',[FrontController::class,'teqvim']);
    Route::get('/elaqe',[FrontController::class,'elaqe'])->name('.elaqe');
    Route::get('/platforma',[FrontController::class,'platforma'])->name('.platforma');
    Route::post('/contact',[FrontController::class,'contact'])->name('.contact');
    Route::get('/fealiyyet',[FrontController::class,'fealiyyet'])->name('.fealiyyet');
    Route::get('/search/{search}',[SearchController::class,'search'])->name('.all.search');
    Route::post('/innovasiya-teqvimi/search',[FrontController::class,'search'])->name('.search');
   
   	Route::get('/{parent}/{dynamic}',[PagesController::class,'show'])->name('.page.show');
   	Route::get('/{parent}/{dynamic}/{child}',[PagesController::class,'child'])->name('.page.child');


   
});



// Route::get('/register', function() {
//     return redirect('/login');
// });

// Route::post('/register', function() {
//     return redirect('/login');
// });



