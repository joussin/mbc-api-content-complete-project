<?php

namespace MbcApiContent\Application;

use Illuminate\Support\ServiceProvider;
use MbcApiContent\Domain\ApiContent\Providers\ApiContentServiceProvider;
use MbcApiContent\Domain\BackOffice\Providers\BackOfficeServiceProvider;
use MbcApiContent\Domain\Router\Providers\ApiContentRouterServiceProvider;


class MbcApiContentProvider extends ServiceProvider
{

    /**
     *
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(ApiContentServiceProvider::class);
        $this->app->register(ApiContentRouterServiceProvider::class);
        $this->app->register(BackOfficeServiceProvider::class);
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
