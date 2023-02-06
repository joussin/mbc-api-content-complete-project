<?php

namespace MbcApiContent\Application\Install\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use MbcApiContent\Application\Install\Services\InstallApplicationService;
use MbcApiContent\Application\Install\Services\MigrationService;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api-content:install';

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
        Artisan::call('migrate:refresh', [
            '--path' => 'src/Application/Install/database/migrations/'
        ]);

        $this->components->info(Artisan::output());


        $this->components->info('Running migrations Seed');
        $migrationService->seed();

         $this->components->info('Running install files');
         $this->components->info('copy and move config file');
         $this->components->info('copy and move public/ dir');
         $this->components->info('copy and move views/ dir');
         $this->components->info('copy and move routes/ dir');
        $installApplicationService->installFiles();


        return Command::SUCCESS;
    }

}
