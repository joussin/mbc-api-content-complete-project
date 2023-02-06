
## Facades

RouterFacade

```php
use MbcApiContent\Infrastructure\Router\Facades\RouterFacade;


$request = request();

$routesModelsCollection = RouterFacade::getRoutesModelCollection();
$routesLaravelCollection = RouterFacade::getRoutesLaravelCollection();
$routesFrameworkCollection = RouterFacade::getRoutesFrameworkCollection();


$laravelRoute = RouterFacade::getLaravelRoute();
$routeModel = RouterFacade::getRouteModel();
$pageModel = RouterFacade::getPageModel();

$pageContents = RouterFacade::getPageContentModels();
$pageContent = RouterFacade::getPageContentModelByName('content_no_1');
$exporterDatas = RouterFacade::getRoutesDatasForExporter();

```
