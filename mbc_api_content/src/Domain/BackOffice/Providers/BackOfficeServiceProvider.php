<?php

namespace MbcApiContent\Domain\BackOffice\Providers;

use Illuminate\Support\ServiceProvider;



class BackOfficeServiceProvider extends ServiceProvider
{

    /**
     *
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(BackOfficeRouteServiceProvider::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


    }
}
