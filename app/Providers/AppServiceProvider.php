<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

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
     //    $this->app->bind('path.public', function() {
     //     return realpath(base_path().'/../public_html');
        // });
        Paginator::useBootstrap();
        Schema::defaultStringLength(191); 
    }
}
