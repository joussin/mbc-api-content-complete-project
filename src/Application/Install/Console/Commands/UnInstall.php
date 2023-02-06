<?php

namespace MbcApiContent\Application\Install\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use MbcApiContent\Application\Install\Services\InstallApplicationService;
use MbcApiContent\Application\Install\Services\MigrationService;

class UnInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api-content:uninstall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(MigrationService $migrationService, InstallApplicationService $installApplicationService)
    {
        Artisan::call('migrate:rollback');

        $this->components->info(Artisan::output());

         $this->components->info('Running uninstall files');
         $this->components->info('uninstall config file');
         $this->components->info('uninstall public/ dir');
         $this->components->info('uninstall views/ dir');
         $this->components->info('uninstall routes/ dir');
        $installApplicationService->uninstallFiles();


        return Command::SUCCESS;
    }

}
