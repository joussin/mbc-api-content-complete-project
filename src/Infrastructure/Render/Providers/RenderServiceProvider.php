<?php

namespace MbcApiContent\Infrastructure\Render\Providers;

use Illuminate\Support\ServiceProvider;
use MbcApiContent\Domain\Render\Services\RenderServiceInterface;
use MbcApiContent\Infrastructure\Render\Services\RenderService;

class RenderServiceProvider extends ServiceProvider
{


    public function register()
    {
        $this->app->singleton(RenderServiceInterface::class, RenderService::class);
    }


    public function boot()
    {
        $this->loadViewsFrom(resource_path('views/vendor/'), 'mbc_api_content');

    }
}
