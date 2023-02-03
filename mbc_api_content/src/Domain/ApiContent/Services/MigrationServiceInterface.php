<?php

namespace MbcApiContent\Domain\ApiContent\Services;

interface MigrationServiceInterface
{
    public function seed(string $type = 'all') : void;
}
