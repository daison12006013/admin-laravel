<?php

return [
    'home' => [
        'name' => 'Home',
        'icon' => 'fa fa-home fa-fw',
        'url' => '/admin/dashboard',
    ],

    'tagging' => [
        'name' => 'Tagging',
        'icon' => 'fa fa-edit fa-fw',
        'url' => '#',
        'items' => [
            'receiving' => [
                'name'      => 'Receiving Tagging',
                'url'       => '/admin/tagging/receiving',
            ],
            'releasing' => [
                'name'      => 'Releasing Tagging',
                'url'       => '/admin/tagging/releasing',
            ],
        ],
    ],

    'reports' => [
        'name' => 'Reports',
        'icon' => 'fa fa-table fa-fw',
        'url' => '#',
        'items' => [
            'report1' => [
                'name' => 'Import Courier A',
                'url' => '/admin/report/import-courier-a',
            ],
            'report2' => [
                'name' => 'Import Courier B',
                'url' => '/admin/report/import-courier-b',
            ],
        ],
    ],



    // ----------------------------------------------------------------
    // DO NOT EDIT BELOW THIS AREA IF YOU DONT KNOW WHAT YOU ARE DOING
    // ----------------------------------------------------------------
    'settings' => [
        'name' => 'Settings',
        'icon' => 'fa fa-cogs fa-fw',
        'url' => '#',
        'items' => [
            'change_password' => [
                'name' => 'Change Password',
                'url' => '/admin/settings/change-password',
            ],
        ],
    ],

    'users' => [
        'name' => 'Users',
        'icon' => 'fa fa-users fa-fw',
        'url' => '#',
        'roles' => ['superuser'],
        'items' => [
            'lists' => [
                'name' => 'Lists',
                'url' => '/admin/user/lists',
            ],
        ],
    ],

    'roles_nav' => [
        'name' => 'Roles',
        'icon' => 'fa fa-list fa-fw',
        'url' => '#',
        'roles' => ['superuser'],
        'items' => [
            'lists' => [
                'name' => 'Lists',
                'url' => '/admin/role/lists',
            ],
        ],
    ],

];