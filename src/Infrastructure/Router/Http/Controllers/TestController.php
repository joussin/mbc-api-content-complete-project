<?php

namespace MbcApiContent\Infrastructure\Router\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MbcApiContent\Domain\Render\Services\RenderServiceInterface;
use MbcApiContent\Infrastructure\Router\Facades\RouterFacade;

class TestController extends Controller
{
    protected $renderService;

    public function __construct(RenderServiceInterface $renderService)
    {

        $this->renderService = $renderService;
    }

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


        return $this->renderService->render();

        return view('api_content_views::product/sub/hello');
    }
}
