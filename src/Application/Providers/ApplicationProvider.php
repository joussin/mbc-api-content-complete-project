<?php

namespace MbcApiContent\Application\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use MbcApiContent\Application\Install\Providers\ApplicationInstallProvider;
use MbcApiContent\Application\ApiContentBootstrap;
use MbcApiContent\Infrastructure\Api\Providers\ApiServiceProvider;
use MbcApiContent\Infrastructure\BackOffice\Providers\BackOfficeServiceProvider;
use MbcApiContent\Infrastructure\Render\Providers\RenderServiceProvider;
use MbcApiContent\Infrastructure\Router\Providers\RouterServiceProvider;


class ApplicationProvider extends ServiceProvider
{

    /**
     *
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        // php artisan api-content:install
        // php artisan api-content:uninstall
        // Application Install/Uninstall
        if ($this->app->runningInConsole()) {
            $this->app->register(ApplicationInstallProvider::class);
        }



        $configFile = 'mbc-api-content.php';
        $configPath = base_path('src/Application/Install/config/');

        $this->mergeConfigFrom(
            file_exists( config_path($configFile) ) ? config_path($configFile) :  ($configPath . $configFile) ,
            'mbc-api-content'
        );



        // Application routes
        $this->app->register(ApplicationRouteProvider::class);


        // Application product : api
        $this->app->register(ApiServiceProvider::class);

        // Application product : router
        $this->app->register(RouterServiceProvider::class);

        // Application product : Render
        $this->app->register(RenderServiceProvider::class);


        // Application product : BackOffice
        $this->app->register(BackOfficeServiceProvider::class);



        // bootstrap Application
        $this->app->singleton(ApiContentBootstrap::class);

    }



    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        JsonResource::withoutWrapping(); // pour les resources
    }
}
