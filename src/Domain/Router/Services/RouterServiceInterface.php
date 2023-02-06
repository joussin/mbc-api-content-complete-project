<?php

namespace MbcApiContent\Domain\Router\Services;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Routing\Route as LaravelRoute;
use Illuminate\Routing\RouteCollectionInterface;
use MbcApiContent\Domain\Api\Models\Collections\ModelRouteCollectionInterface;
use MbcApiContent\Infrastructure\Api\Models\Page as PageModel;
use MbcApiContent\Infrastructure\Api\Models\PageContent as PageContentModel;
use MbcApiContent\Infrastructure\Api\Models\Route as RouteModel;

interface RouterServiceInterface
{
    public function initCollections(): void;

    public function getRoutesModelCollection(): EloquentCollection;

    public function getRoutesFrameworkCollection() : RouteCollectionInterface;

    public function getRoutesLaravelCollection() : ModelRouteCollectionInterface;

    public function getLaravelRoute() : ?LaravelRoute;

    public function getRouteModel(): ?RouteModel;

    public function getPageModel() : ?PageModel;

    public function getPageContentModels() : ?EloquentCollection;

    public function getPageContentModelByName(string $name) : ?PageContentModel;

    public function getRoutesDatasForExporter() : array;
}
