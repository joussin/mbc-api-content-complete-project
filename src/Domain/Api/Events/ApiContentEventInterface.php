<?php

namespace MbcApiContent\Domain\Api\Events;

interface ApiContentEventInterface
{
    public function callback(mixed $callbackArgs = null) : mixed;
}
