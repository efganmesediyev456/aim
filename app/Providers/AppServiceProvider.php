<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        
        if (app()->isProduction()) {
            \URL::forceScheme("https");
         }

         $setting=Setting::first();

         view()->share([
            "setting"=>$setting
         ]);
    }
}
