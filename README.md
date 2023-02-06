# Mbc api content

[//]: # ([![Latest Version on Packagist]&#40;https://img.shields.io/packagist/v/spatie/laravel-export.svg?style=flat-square&#41;]&#40;https://packagist.org/packages/spatie/laravel-export&#41;)
[//]: # ([![Total Downloads]&#40;https://img.shields.io/packagist/dt/spatie/laravel-export.svg?style=flat-square&#41;]&#40;https://packagist.org/packages/spatie/laravel-export&#41;)

## Configuration

Secrets DB conf.

```php
// .env

DB_CONNECTION=mysql
DB_DATABASE=cms_headless
DB_HOST=192.168.0.21
DB_PORT=3094
DB_USERNAME=root
DB_PASSWORD=
```

#### Install : Database - Config - Routes - Views - Swagger

## Install:

in app/Providers/AppServiceProvider.php, add :
``` php
    'providers' => [
        ...
        // api content
        \MbcApiContent\Application\Providers\ApplicationProvider::class,
        ...
     ]
```


``` bash
php artisan api-content:install
```

## Uninstall:
``` bash
php artisan api-content:uninstall
```

## Liste des routes:
``` bash
php artisan route:list --except-vendor
```



#### Boot application

Boot app : install before

```php
use Illuminate\Support\ServiceProvider;
use MbcApiContent\Application\ApiContentBootstrap;
    
    class AppServiceProvider extends ServiceProvider
    {
        public function boot(ApiContentBootstrap $bootstrap)
        {
       
            $bootstrap->init();
            
//            $paths = RouterFacade::getRoutesDatasForExporter();
//        
//            $exporter->paths($paths);

        }
    }
```



## Test

Launch server
``` bash
php artisan serve --port=8000
```

SWAGGER
``` bash
http://127.0.0.1:8000/docs/api/index.html
```

BACKOFFICE
``` bash
http://127.0.0.1:8000/backoffice
```




## DOCUMENTATION TECHNIQUE



Le projet est divisé en 3 sous projets:

    - Api
    - Router
    - Backoffice

Api:

    1/ Api REST permettant la gestion de resources modélisant un site web: de son accès à son contenu:

        - Route:
            Model correspondant à une route laravel modelisé

        - Page:
            Model correspondant à un page html censé etre rendu si une Route est appelé

        - PageContent:
            Model correspondant aux différents contenus de cette page sous forme de texte brut.


    2/ L'api permet de faire un crud sur chaque resource:

            - search : GET /{resource}/search?column=name&column_value=route-name : ResourceObject|ResourceObjectCollection        
            - list : GET /{resource} : ResourceObjectCollection
            - show : GET /{resource}/{resource_id} : ResourceObject
            - create : POST /{resource} : ResourceObject
            - edit : PUT /{resource}/{resource_id} : ResourceObject
            - delete : DELETE /{resource}/{resource_id} : bool

    3/ Une fois la DB remplies:
            
            - une Collection de Route: 
                    - RouteCollection : correspondant à la liste des routes/urls du site. 
                    - Une ResourceObject Route possedant une URL et une ResourceObject Page 

            - Une Collection de Page où chaque Page est associée à une Route
                    - chaque Page repésentant la page web d'une url
                    - chaque Page posséde un template_name (modele de la page) et une Collection PageContent correspondant à l'ensemble des textes de la page

            - Une Collection PageContent associée à une Page
                    - L'idée est de générer la Page grace au template_name (forme) et à  Collection PageContent (contenu)



    4/ L'api ne représente que la modélisation et les données d'un site.
       L'idée est que un site web statique soit susceptible d'être créé via ces données.
       Un générateur de site doit être créé, il doit être capable de résoudre ces problématiques:

        - Exposer la liste RouteCollection représentant les RouteModel de la BDD
        - Recevoir des requetes et matcher via une url à quelle RouteModel cela correspond
        - Récupérer la PageModel correspondant à la RouteModel
        - Générer la page html via PageModel->template_name (présentation) et PageContent Collection (contenu)
        - Retourner une response http sous forme de html


Router:

    Le sous projet router doit répondre à la problématique précédente.

    1/ Récupérer RouteCollection et l'exposer sur le web avec laravel
        - créer des routes Laravel avec RouteModel et les ajouter au Router laravel
        - le Router laravel va se charger de matcher ces routes, à nous de relier route laravel & route model
    

    2/ relier route laravel & route model
        pour cela on ajoute un id à chaque route laravel et chaque model route lors de l'ajout au Router 

    3/ intercepter la requete associé à la route et retourner une reponse personalisé
        pour cela on a ajouté ces routes dans le router de laravel  avec un RouterMiddleware.
        RouterMiddleware : handle server request et peut retourner une response html.

    4/ générer la réponse html souhaité
        Obtenir la PageModel par relation : url -> route laravel -> RouteModel -> PageModel
        PageModel :  template_name & PageContentCollection
        générer la reponse html avec le blade template name et les PageContent:  Template ( blade template_name html ) + PageContent Collection
        retourner la response html




Backoffice:

    1/ interface graphique permettant de gérer les données des resources en BDD
    2/ plusieurs types de personnes peuvent modifier ces données
            plusieurs roles

