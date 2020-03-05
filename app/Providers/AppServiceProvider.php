<?php

namespace App\Providers;
use View;
use Illuminate\Support\ServiceProvider;
use App\Catagory;

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
        View::composer('*', function($view)
        {
            $allcatagory= Catagory::all();
            $view->with('allcatagory', $allcatagory);


        });
    }
}
