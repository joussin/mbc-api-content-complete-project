<?php

namespace MbcApiContent\Domain\Router\Facades;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use Illuminate\Support\Facades\Facade;
use MbcApiContent\Domain\ApiContent\Models\Collections\LaravelRouteCollectionInterface;
use MbcApiContent\Domain\ApiContent\Models\Page as PageModel;
use MbcApiContent\Domain\ApiContent\Models\PageContent as PageContentModel;
use MbcApiContent\Domain\ApiContent\Models\Route as RouteModel;

/**
 *
 * @method static void initCollections()
 *
 * @method static array getRoutesDatasForExporter()
 * @method static null|PageContentModel getPageContentModelByName(string $name)
 * @method static null|EloquentCollection getPageContentModels()
 * @method static null|PageModel getPageModel()
 * @method static null|RouteModel getRouteModel()
 * @method static null|LaravelRoute getLaravelRoute()
 *
 * @method static EloquentCollection getRoutesModelCollection()
 * @method static RouteCollectionInterface getRoutesFrameworkCollection()
 * @method static LaravelRouteCollectionInterface getRoutesLaravelCollection()
 *
 * @see \MbcApiContent\Domain\Router\Services\RouterService;
 */
class RouterFacade  extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'router_service_facade_accessor';
    }
}
