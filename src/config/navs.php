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
                'name' => 'Report 1',
                'url' => '/admin/report/1',
            ],
            'report2' => [
                'name' => 'Report 2',
                'url' => '/admin/report/2',
            ],
        ],
    ],

];