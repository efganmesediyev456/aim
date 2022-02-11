<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class LocalizeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!in_array($request->locale, config('app.supported_locales'))) {


           

            $base = url()->to('');
            $path = str_replace($base, '', $request->fullUrl());



            if(app()->isProduction()){
                $path=str_replace('http', 'https',$request->fullUrl());
           
                $path = str_replace($base, '', $path);
            }


            return redirect()->to($base . '/' . config('app.locale') . $path);
        }

        app()->setLocale($request->locale);

        URL::defaults(['locale' => $request->locale]);

        return $next($request);
    }
}
