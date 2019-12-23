<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'GarageParts',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Garage</b>Parts',

    'logo_mini' => '<b>G</b>pts',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'garage/linha-do-tempo/5',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        [
            'text' => 'Linha do Tempo',
            'icon' => 'clock-o ',
            'url'  => 'garage/linha-do-tempo',
        ],
        [
            'text'        => 'Garagem',
            'icon'        => 'home',
            'submenu'     => [

                [
                    'text' => 'Gerenciar Veiculos',
                    'icon' => 'flag-checkered',
                    'url'  => 'garage/gerenciar/veiculos',
                ],
                [
                    'text' => 'Cadastrar Veiculos',
                    'icon' => 'plus',
                    'url'  => '/garage/cadastro/veiculo',
                ],
            ]
        ],
        [
            'text'        => 'Abastecimento',
            'icon'        => 'tint',
            'submenu'     => [

                [
                    'text' => 'Gerenciar Abastecimentos',
                    'icon' => 'flag-checkered',
                    'url'  => '/abastecimento/gerenciar',
                ],
                [
                    'text' => 'Cadastrar Abastecimento',
                    'icon' => 'plus',
                    'url'  => '/abastecimento/cadastrar',
                ],
            ]
        ],
        [          
            'text'    => 'Serviços',
            'icon'    => 'cogs',
            'submenu' => [
                [
                    'text' => 'Gegenciar Serviços',
                    'icon' => 'flag-checkered',
                    'url'  => '/services/gerenciar',
                ],
                [
                    'text' => 'Cadastrar Serviços',
                    'icon' => 'plus',
                    'url'  => '/services/cadastrar'
                ],

            ],
        ],
        [          
            'text'    => 'Seguro',
            'icon'    => 'shield',
            'submenu' => [
                [
                    'text' => 'Gegenciar Seguro',
                    'icon' => 'flag-checkered',
                    'url'  => '/seguros/gerenciar',
                ],
                [
                    'text' => 'Cadastrar Seguro',
                    'icon' => 'plus',
                    'url'  => '/seguros/cadastrar'
                ],

            ],
        ],
        [
            'text'        => 'Notificações',
            'url'         => '/notificacoes/gerenciar',
            'icon'        => 'bell',
            'label_color' => 'success',
        ],
            // [
        //     'text'    => 'Veículos',
        //     'icon'    => 'car',
        //     'submenu' => [
        //         [
        //             'text' => 'Abastecimento',
        //             'icon' => 'tint',
        //             'url'  => '#',
        //             'label_color' => 'success',
        //         ],
        //         [
        //             'text' => 'Documentacao',
        //             'icon' => 'id-card-o',
        //             'url'  => '#',
        //             'label_color' => 'success',
        //         ],
        //         [
        //             'text' => 'Seguro',
        //             'icon' => 'shield',     
        //             'url'  => '#',
        //         ],
        //         [
        //             'text' => 'Infrações',
        //             'icon' => 'file-text-o',
        //             'url'  => '#',
        //         ],

        //     ],
        // ],
],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
