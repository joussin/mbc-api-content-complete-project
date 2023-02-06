<?php

namespace MbcApiContent\Application\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class ApplicationRouteProvider  extends ServiceProvider
{



    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $config = config('mbc-api-content');
        $routesPath = base_path('routes/');

        $this->routes(function () use($config, $routesPath) {

            $prefix = $config['api']['routes']['prefix'];

            Route::middleware('api')
                ->prefix($prefix)
                ->group($routesPath  . 'api-content.php');


            $prefix = $config['backoffice']['routes']['prefix'];

            Route::middleware('web')
                ->prefix($prefix)
                ->group($routesPath  . 'backoffice.php');


        });
    }

}
