<?php

namespace MbcApiContent\Application;

use MbcApiContent\Domain\ApiContent\Events\ApiContentModelsEventListener;
use MbcApiContent\Domain\Router\Facades\RouterFacade;

class ApplicationMbcApiContent
{

    public ApiContentModelsEventListener $apiContentModelsEventListener;

    public const TABLES = ['page', 'route', 'page_content'];

    public function __construct(ApiContentModelsEventListener $apiContentModelsEventListener,

    )
    {
        $this->apiContentModelsEventListener = $apiContentModelsEventListener;

    }

    public function init(bool $initRouter = true, bool $initListener = true )
    {
        $check  = $this->check(self::TABLES);

        if($check["isMissingDb"] )
        {
            throw new \Exception('Project not configured incorrect db : ' . $check["databaseName"] );
        }

        if(!$check["isMissingDb"] && $check["isMissingTables"] && $this->isCli())
        {
//            $this->apiContentMigrationsEventListener->initListener();
        }

        if(!$check["isMissingDb"] && $check["isMissingTables"] && !$this->isCli())
        {
            throw new \Exception('Project not configured missing tables : ' . implode(', ', $check["tablesToCheck"]));
        }

        if(!$check["isMissingDb"] && !$check["isMissingTables"] )
        {
            $this->initRouter($initRouter);

            $this->apiContentModelsEventListener->initListener($initListener);
        }

    }

    public function initRouter(bool $initRouter = true)
    {
        if($initRouter)
        {
            RouterFacade::initCollections();
        }
    }


    public function isCli() : bool
    {
        return (php_sapi_name() == 'cli');
    }

    public function check(array $tablesToCheck = []) : array
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
