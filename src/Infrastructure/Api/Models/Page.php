<?php

namespace MbcApiContent\Infrastructure\Api\Models;


use MbcApiContent\Infrastructure\Api\Models\Factory\PageFactory;
use MbcApiContent\Infrastructure\Api\Models\Interfaces\AbstractEloquentModel;


class Page  extends AbstractEloquentModel
{

    protected $table = 'page';

    protected $connection = "mysql";

    protected $fillable = [
        "version",
        "name",
        "template_name",
        "route_id"
    ];

    protected $casts = [
    ];



    protected static function newFactory()
    {
        return PageFactory::new();
    }


    public function pageContents()
    {
        return $this->hasMany(PageContent::class);
    }



    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id', 'id');
    }
}
