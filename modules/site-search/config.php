<?php

return [
    '__name' => 'site-search',
    '__version' => '0.1.0',
    '__git' => 'git@github.com:getmim/site-search.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'app/site-search' => ['install','remove'],
        'modules/site-search' => ['install','update','remove'],
        'theme/site/search' => ['install','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'site' => NULL
            ],
            [
                'site-meta' => NULL
            ],
            [
                'site-setting' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'SiteSearch\\Controller' => [
                'type' => 'file',
                'base' => 'app/site-search/controller'
            ],
            'SiteSearch\\Library' => [
                'type' => 'file',
                'base' => 'modules/site-search/library'
            ]
        ],
        'files' => []
    ],
    'routes' => [
        'site' => [
            'siteSearch' => [
                'path' => [
                    'value' => '/search'
                ],
                'method' => 'GET',
                'handler' => 'SiteSearch\\Controller\\Search::index'
            ]
        ]
    ],
    'adminSetting' => [
        'menus' => [
            'site-search' => [
                'label' => 'Search Page',
                'icon' => '<i class="fas fa-search"></i>',
                'info' => 'Change site search preference',
                'perm' => 'update_site_setting',
                'index' => 0,
                'options' => [
                    'site-search' => [
                        'label' => 'Change settings',
                        'route' => ['adminSiteSettingSingle',['group' => 'Search']]
                    ]
                ]
            ]
        ]
    ]
];
