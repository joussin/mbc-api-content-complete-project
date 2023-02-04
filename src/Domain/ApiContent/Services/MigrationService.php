<?php

namespace MbcApiContent\Domain\ApiContent\Services;

use MbcApiContent\Domain\ApiContent\Models\Factory\PageFactory;
use MbcApiContent\Domain\ApiContent\Models\Page;
use MbcApiContent\Domain\ApiContent\Models\PageContent;
use MbcApiContent\Domain\ApiContent\Models\Route;

class MigrationService implements MigrationServiceInterface
{

    public function seed(string $type = 'all') : void
    {
        $route = Route::factory(1)->create([]);

        $page = Page::factory(1)->create([
            'route_id' => 1
        ]);

        $definitions = PageFactory::getDynamicDefinitions();

        $page = Page::factory()->create($definitions);


        $pageContents = PageContent::factory(1)->create([
            'page_id' => $page,
            'name' => 'content_no_1',
        ]);


        $pageContents = PageContent::factory(1)->create([
            'page_id' => 1,
            'name' => 'content_h1',
        ]);

        $pageContents = PageContent::factory(1)->create([
            'page_id' => 2,
            'name' => 'content_no_2',
        ]);

        $pageContents = PageContent::factory(1)->create([
            'page_id' => 2,
            'name' => 'content_no_3',
        ]);
    }
}
