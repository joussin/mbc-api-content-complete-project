<?php

namespace MbcApiContent\Domain\ApiContent\Events;

interface ApiContentEventInterface
{
    public function callback(mixed $callbackArgs = null) : mixed;
}
