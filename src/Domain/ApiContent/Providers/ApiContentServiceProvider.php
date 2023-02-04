<?php

namespace MbcApiContent\Domain\ApiContent\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use MbcApiContent\Application\ApplicationMbcApiContent;
use MbcApiContent\Domain\ApiContent\Events\ApiContentMigrationsEventListener;
use MbcApiContent\Domain\ApiContent\Events\ApiContentModelsEventListener;
use MbcApiContent\Domain\ApiContent\Services\MigrationService;
use MbcApiContent\Domain\ApiContent\Services\MigrationServiceInterface;


class ApiContentServiceProvider extends ServiceProvider
{

    /**
     *
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(ApiContentRouteServiceProvider::class);


        $this->app->singleton(ApplicationMbcApiContent::class, function($app){
            return new ApplicationMbcApiContent(
                $app->make(ApiContentModelsEventListener::class),
                $app->make(ApiContentMigrationsEventListener::class),
            );
        });

        $this->app->singleton(ApiContentModelsEventListener::class);

        $this->app->singleton(ApiContentMigrationsEventListener::class, function($app) {
            return new ApiContentMigrationsEventListener(
                $app->make(MigrationServiceInterface::class),
            );
        });

        $this->app->singleton(MigrationServiceInterface::class, MigrationService::class);





        $path = base_path('mbc_api_content/') ;


//        $this->mergeConfigFrom(
//            file_exists( config_path('mbc-api-content-config.php') ) ? config_path('mbc-api-content-config.php') :  ($path . 'config/mbc-api-content-config.php') ,
//            'mbc_api_content_config'
//        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        JsonResource::withoutWrapping();



        $path = base_path('mbc_api_content/') ;

//        dd(
//            $path . 'resources/views'
//        );

        $this->loadViewsFrom($path . 'resources/views', 'api_content_views'); // return view('api_content_views::dashboard');

        $this->loadMigrationsFrom($path . 'database/migrations');


        if ($this->app->runningInConsole()) {

            try{

//                $this->publishes([
//                    $path . 'config/mbc-api-content-config.php' => config_path('mbc-api-content-config.php'),
//                ]);
//
//                $this->publishes([
//                    $path . 'public/api/' => public_path('api/'),
//                ]);
//
//
//                $this->publishes([
//                    $path . 'resources/views/' => resource_path('views/vendor/api_content_views/'),
//                ]);

            }
            catch (\Exception $e)
            {
                throw new \Exception('Error installing ' . $e->getMessage());
            }
        }
    }
}
