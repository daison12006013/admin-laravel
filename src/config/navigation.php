<?php

return [
    'home' => [
        'name' => 'Home',
        'icon' => 'fa fa-home fa-fw',
        'url' => '/admin/dashboard',
    ],

    /* 
    | ----------------------------------------------------------------
    | DO NOT EDIT BELOW THIS AREA IF YOU DONT KNOW WHAT YOU ARE DOING
    | ----------------------------------------------------------------
    */
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
        'url' => '/admin/user/lists',
        'roles' => ['superuser'],
    ],

    'roles_nav' => [
        'name' => 'Roles',
        'icon' => 'fa fa-list fa-fw',
        'url' => '/admin/role/lists',
        'roles' => ['superuser'],
    ],

];