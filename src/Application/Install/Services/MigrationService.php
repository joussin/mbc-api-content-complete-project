<?php

namespace MbcApiContent\Application\Install\Services;

use MbcApiContent\Infrastructure\Api\Models\Factory\PageFactory;
use MbcApiContent\Infrastructure\Api\Models\Page;
use MbcApiContent\Infrastructure\Api\Models\PageContent;
use MbcApiContent\Infrastructure\Api\Models\Route;

class MigrationService
{


    public const TABLES = ['page', 'route', 'page_content'];


    public function seed(string $type = 'all') : void
    {
        $route = Route::factory(1)->create([]);

        $page = Page::factory(1)->create([
            'route_id' => 1
        ]);

        $definitions = PageFactory::getDynamicDefinitions();

        $page = Page::factory()->create($definitions);


        $pageContents = PageContent::factory(1)->create([
            'page_id' => $page,
            'name' => 'content_no_1',
        ]);


        $pageContents = PageContent::factory(1)->create([
            'page_id' => 1,
            'name' => 'content_h1',
        ]);

        $pageContents = PageContent::factory(1)->create([
            'page_id' => 2,
            'name' => 'content_no_2',
        ]);

        $pageContents = PageContent::factory(1)->create([
            'page_id' => 2,
            'name' => 'content_no_3',
        ]);
    }

    public function initDB()
    {
        try {

            $check  = $this->checkDB(self::TABLES);

            print(
            json_encode($check)
            );

//            if($check["isMissingDb"] )
//            {
//                throw new \Exception('Project not configured incorrect db : ' . $check["databaseName"] );
//            }
//
//            if(!$check["isMissingDb"] && $check["isMissingTables"] && $this->isCli())
//            {
//            }
//
//            if(!$check["isMissingDb"] && $check["isMissingTables"] && !$this->isCli())
//            {
//                throw new \Exception('Project not configured missing tables : ' . implode(', ', $check["tablesToCheck"]));
//            }
//
//            if(!$check["isMissingDb"] && !$check["isMissingTables"] )
//            {
//
//            }
        }
        catch (\Exception $e)
        {
            throw new \Exception('Error installing ' . $e->getMessage());
        }

    }

    public function checkDB(array $tablesToCheck = []) : array
    {

        try{
            $connection = \Illuminate\Support\Facades\Schema::connection('mysql');
            $databaseName = $connection->getConnection()->getDatabaseName();

            $tablesFound = $connection->getAllTables();

        } catch(\Exception $e)
        {
            return [
                'connection' => $connection,
                'databaseName' => $databaseName,
                'isMissingDb' => true,
                'isMissingTables' => true,
            ];
        }



        foreach ($tablesToCheck as $k => $tableToCheck)
        {
            if( $connection->hasTable($tableToCheck) )
            {
                unset($tablesToCheck[$k]);
            }
        }

        return [
            'connection' => $connection,
            'databaseName' => $databaseName,
            'isMissingDb' => false,
            'isMissingTables' => !empty($tablesToCheck),

            'tablesToCheck' => $tablesToCheck,
            'tablesFound'    => $tablesFound,
        ];
    }




}
