<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class ChangeLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if(session()->has('locale')) {
            app()->setLocale(session('locale'));
            app()->setLocale(config('app.locale'));
        }
        // if (Session::has('locale')) {
        //     App::setLocale( session('locale') );
            
        //     // app()->setLocale('en');
        //     // Log::info(app()->getLocale());

        //     // dd(app()->getLocale());
        //     //dd(session('locale'));

            
        // }
        // App::setLocale(session()->get('lang') ?? 'en');

        return $next($request);
    }
}
