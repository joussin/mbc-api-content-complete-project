<?php

namespace MbcApiContent\Application;

use MbcApiContent\Domain\Api\EventListeners\ModelsEventListenerInterface;
use MbcApiContent\Infrastructure\Router\Facades\RouterFacade;

class ApiContentBootstrap
{

    public ModelsEventListenerInterface $apiContentModelsEventListener;



    public function __construct(ModelsEventListenerInterface $apiContentModelsEventListener)
    {
        $this->apiContentModelsEventListener = $apiContentModelsEventListener;

    }

    public function init(bool $initRouter = true, bool $initListener = true ) : void
    {
        $this->initRouter($initRouter);

        $this->apiContentModelsEventListener->initListener($initListener);
    }

    public function initRouter(bool $initRouter = true)
    {
        if($initRouter)
        {
            RouterFacade::initCollections();
        }
    }

}
