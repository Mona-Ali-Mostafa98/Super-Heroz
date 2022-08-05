<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrapFive();

        view()->composer('*', function ($view)
        {
            $settings = \App\Models\Setting::first();
            $social_links=\App\Models\SocialLink::where('status' ,'عرض')->latest()->take(6)->get();
            $services = \App\Models\Service::where('status' ,'عرض')->get();
            // dd($social_links);
            $view->with(compact('settings' , 'social_links' , 'services'));
        });

    }
}