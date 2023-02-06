<?php

return [

    'package' => [

        'paths' => [
            'base' => 'src/',


            'infrastructure' => [
                'base' =>  'src/Infrastructure/',
                'api' =>  'src/Infrastructure/Api/',
                'backoffice' =>  'src/Infrastructure/BackOffice/',
                'router' =>  'src/Infrastructure/Router/',

            ],

            'domain' => [
                'base' =>  'src/Domain/',
                'api' =>  'src/Domain/Api/',
                'backoffice' =>  'src/Domain/BackOffice/',
                'router' =>  'src/Domain/Router/',
            ],

        ],
    ],

    'api' => [
        'routes' => [
            'prefix' => 'api'
        ]
    ],
    'backoffice' => [
        'routes' => [
            'prefix' => 'backoffice'
        ]
    ],

    'static' => [
        'export' => [
            'paths' => [
                '/'
            ],
        ]
    ]
];
