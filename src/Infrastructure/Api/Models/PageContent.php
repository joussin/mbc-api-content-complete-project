<?php

namespace MbcApiContent\Infrastructure\Api\Models;



use MbcApiContent\Infrastructure\Api\Models\Factory\PageContentFactory;
use MbcApiContent\Infrastructure\Api\Models\Interfaces\AbstractEloquentModel;

class PageContent extends AbstractEloquentModel
{

    protected $table = 'page_content';

    protected $connection = "mysql";



    protected $fillable = [
        "name",
        "content",
        "page_id",
    ];




    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id', 'id');
    }


    protected static function newFactory()
    {
        return PageContentFactory::new();
    }

}
