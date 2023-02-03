<?php

namespace MbcApiContent\Domain\ApiContent\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

class ApiContentRouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {

        $config = config('mbc_api_content_config');

        $apiPrefix = $config['api']['routes']['prefix'] ?? 'api';

        $this->routes(function () use($apiPrefix) {
            Route::middleware('api')
                ->prefix($apiPrefix)
                ->group(__DIR__.'/../../../../'  . 'routes/api.php');
        });
    }



}
