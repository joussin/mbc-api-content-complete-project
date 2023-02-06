<?php

namespace MbcApiContent\Infrastructure\Api\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use MbcApiContent\Domain\Api\EventListeners\ModelsEventListenerInterface;
use MbcApiContent\Infrastructure\Api\EventListeners\ModelsEventListener;


class ApiServiceProvider extends ServiceProvider
{

    /**
     *
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ModelsEventListenerInterface::class, ModelsEventListener::class);

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
