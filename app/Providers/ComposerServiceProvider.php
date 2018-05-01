<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\GroupComposer;
use App\Http\ViewComposers\OfficeComposer;
use App\Http\ViewComposers\OptionComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('offices.create', GroupComposer::class);
        
        View::composer('officer.offices', OfficeComposer::class);
        
        View::composer('officer.create', OptionComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
