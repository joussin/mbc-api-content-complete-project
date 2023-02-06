<?php

namespace MbcApiContent\Infrastructure\Api\EventListeners;

use Illuminate\Support\Facades\Event;
use MbcApiContent\Domain\Api\EventListeners\ModelsEventListenerInterface;
use MbcApiContent\Domain\Api\Events\ApiContentEventInterface;
use MbcApiContent\Domain\Api\Events\ModelChangedEvent;
use MbcApiContent\Domain\Api\Observers\ModelObserver;
use MbcApiContent\Infrastructure\Api\Models\Page;
use MbcApiContent\Infrastructure\Api\Models\Route;

class ModelsEventListener implements ModelsEventListenerInterface
{

    /**
     * @var bool
     */
    protected bool $modelsObservables;

    /**
     * @var \Closure|null
     */
    protected ?\Closure $modelEventClosure;

    //  $this->initListener(); // dans Bootstrap
    public function initListener(bool $modelsObservables = true): void
    {

        $this->setModelsObservables($modelsObservables);

        $this->setModelEventClosure(
            function(ApiContentEventInterface $event){

                if($event instanceof ModelChangedEvent)
                {
                    \Illuminate\Support\Facades\Log::info('$event instanceof ApiContentModelEvent', [
                        $event->getModelInstance(),
                        $event->getAction(),
                        $event->getModelClass(),
                        $event->getCallbackMethodName(),
                    ]);

                    $event->callback();
                }
            }
        );


        Event::listen(function (ApiContentEventInterface $event) {

            if ($this->isModelsObservables() && !is_null($this->modelEventClosure) )
            {
                $this->getModelEventClosure()($event);
            }
        });

    }

    /**
     * @return bool
     */
    public function isModelsObservables(): bool
    {
        return $this->modelsObservables;
    }

    /**
     * @param bool $modelsObservables
     */
    public function setModelsObservables(bool $modelsObservables): void
    {
        $this->modelsObservables = $modelsObservables;
        $this->setModelObservable($modelsObservables);
    }



    private function setModelObservable(bool $modelsObservables): void
    {
        if($this->isModelsObservables())
        {
            Page::observe(ModelObserver::class);
            Route::observe(ModelObserver::class);
        } else {
            $eventActions = ModelChangedEvent::MODEL_ACTIONS;

            foreach ($eventActions as $eventAction)
            {
                Page::getEventDispatcher()->forget("eloquent.$eventAction: MbcApiContent\Models\Page");
                Route::getEventDispatcher()->forget("eloquent.$eventAction: MbcApiContent\Models\Route");
            }
        }
    }



    public function getModelEventClosure(): ?\Closure
    {
        return $this->modelEventClosure;
    }


    public function setModelEventClosure(?\Closure $modelEventClosure): void
    {
        $this->modelEventClosure = $modelEventClosure;
    }



}
