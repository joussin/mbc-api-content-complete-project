<?php

namespace MbcApiContent\Application\Install\Providers;

use Illuminate\Support\ServiceProvider;
use MbcApiContent\Application\Install\Console\Commands\Install;
use MbcApiContent\Application\Install\Console\Commands\UnInstall;
use MbcApiContent\Application\Install\Services\InstallApplicationService;
use MbcApiContent\Application\Install\Services\MigrationService;



class ApplicationInstallProvider extends ServiceProvider
{

    /**
     *
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MigrationService::class);
        $this->app->singleton(InstallApplicationService::class);
    }



    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot() //
    {
        $mp = base_path('/src/Application/Install/database/migrations/');
        $this->loadMigrationsFrom($mp);

        $this->commands([
            Install::class,
            UnInstall::class,
        ]);
    }
}
