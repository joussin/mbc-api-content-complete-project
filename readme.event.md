

## Event

You can create Laravel Event with Listener event.

But if you want to use ApiContent Event who are automaticaly handle, you must implements ApiContentEventInterface.
Interface obliges you to declare and implement callback method.
This method is called when event are dispatched and then handled.
This method allow pass args or not.
This method allow return something or not.

By default, there is only one Event which is called when Models change, and get model properties like:

$event->getModelInstance() : eloquent model instance
$event->getAction() : action name list ModelChangedEvent::MODEL_ACTIONS
$event->getModelClass() : eloquent model class name
$event->getCallbackMethodName() : le nom de la method du model sera appelé en callback de l'event

create Event:
```php
class CustomEvent extends BaseEvent
{
    public function callback(mixed $callbackArgs = null) : mixed
    {}
}
```
or
```php
class CustomEvent implements ApiContentEventInterface
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public function callback(mixed $callbackArgs = null) : mixed
    {}
}
```

Listener:
```php
MbcApiContent\Events\ApiContentEventListenerResolver
```        

Event Dispatched callback:

```php
\MbcApiContent\Domain\ApiContent\Events\ApiContentEventListener::eventClosure
```

Dispatch event:
```php
event(new CustomEvent());
```


Listener init:
```php
Bootstrap->apiContentEventListener->initListener(bool $modelsObservables)
```



Model are listen ? :
```php
Bootstrap->apiContentEventListener->isModelsObservables(): bool
```

set Model listened or not  :
```php
Bootstrap->apiContentEventListener->setModelsObservables(bool $observeModel): void
```


Add other event Closure: Listener Callback
```php
/**
 * @param \Closure $eventClosure : function(ApiContentEventInterface $event){};
 * @return void
 */ 
Bootstrap->apiContentEventListener->addEventClosureToList(\Closure $eventClosure): void
```

