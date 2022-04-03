<?php

namespace App\Providers;

use App\Models\header;
use Illuminate\Support\ServiceProvider;

class HeaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->header();
    }

    private function header(){
        view()->composer('layouts.frontendapp', function($view){
            $view->with('header' , header::first());
        });
    }


    
}
