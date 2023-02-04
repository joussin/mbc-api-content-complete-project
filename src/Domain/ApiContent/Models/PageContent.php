<?php

namespace MbcApiContent\Domain\ApiContent\Models;



use MbcApiContent\Domain\ApiContent\Models\Factory\PageContentFactory;
use MbcApiContent\Domain\ApiContent\Models\Interfaces\AbstractModel;

class PageContent extends AbstractModel
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
