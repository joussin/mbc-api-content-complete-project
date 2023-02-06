<?php

namespace MbcApiContent\Infrastructure\Api\Models\Interfaces;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MbcApiContent\Domain\Api\Models\Interfaces\ModelInterface;

abstract class AbstractEloquentModel extends Model implements ModelInterface
{
    use HasFactory;


    public function createdEventCallback() : mixed
    {
        return null;
    }
    public function updatedEventCallback() : mixed
    {
        return null;
    }
    public function deletedEventCallback() : mixed
    {
        return null;
    }
    public function restoredEventCallback() : mixed
    {
        return null;
    }
    public function forceDeletedEventCallback(): mixed
    {
        return null;
    }
}
