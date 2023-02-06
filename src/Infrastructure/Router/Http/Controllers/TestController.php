<?php

namespace MbcApiContent\Infrastructure\Router\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MbcApiContent\Infrastructure\Router\Facades\RouterFacade;

class TestController extends Controller
{


    public function any(Request $request)
    {

        $page = RouterFacade::getPageModel();
        $route = RouterFacade::getRouteModel();
        $pageContents = RouterFacade::getPageContentModels();


        $result = [
            'page' => $page->toArray(),
            'route' => $route->toArray(),
            'page_contents' => ($pageContents) ? $pageContents->toArray() : null,
        ];

        return view('mbc_api_content::api/test/test-blade-template');
    }
}
