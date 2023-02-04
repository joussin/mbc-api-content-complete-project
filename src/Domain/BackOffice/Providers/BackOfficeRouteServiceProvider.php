<?php

namespace MbcApiContent\Domain\BackOffice\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class BackOfficeRouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {

        $config = config('mbc_api_content_config');

        $backofficePrefix = $config['backoffice']['routes']['prefix'] ?? 'backoffice';



        $this->routes(function () use( $backofficePrefix) {

            Route::middleware('web')
                ->prefix($backofficePrefix)
                ->group(__DIR__.'/../../../../'  . 'routes/backoffice.php');
        });
    }



}
