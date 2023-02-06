<?php

namespace MbcApiContent\Infrastructure\Router\Providers;

use Illuminate\Support\ServiceProvider;
use MbcApiContent\Domain\Router\Services\RouterServiceInterface;
use MbcApiContent\Infrastructure\Router\Services\RouterService;


class RouterServiceProvider extends ServiceProvider
{

    /**
     *
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        // RouterFacade::
        $this->app->singleton('router_service_facade_accessor', function ($app) {
            return $app->make(RouterServiceInterface::class);
        });

        $this->app->singleton(RouterServiceInterface::class, RouterService::class);

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
