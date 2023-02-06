<?php

namespace MbcApiContent\Infrastructure\Api\Events;


use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use MbcApiContent\Domain\Api\Events\ApiContentEventInterface;

abstract class BaseEvent implements ApiContentEventInterface
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
}
