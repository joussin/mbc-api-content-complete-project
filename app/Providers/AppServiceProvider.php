<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MbcApiContent\Application\ApiContentBootstrap;


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
    public function boot(ApiContentBootstrap $apiContentBootstrap)
    {
        // start apiContent
        $apiContentBootstrap->init(true, true);
    }
}
