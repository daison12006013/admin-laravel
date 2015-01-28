<?php

return [

  // --------------
  // YOUR CODE HERE
  // --------------
  // Ex:
  // 'route_name' => [
  //   'process' => 'get',                      -     You can use get/post
  //   'url'     => '/admin/my-link-here',      -     Use /admin or putting your own custom link
  //   'uses'    => 'MyController@myMethod',    -     Tell us the controller
  // ],







  // ----------------------------------------------------------------
  // DO NOT EDIT BELOW THIS AREA IF YOU DONT KNOW WHAT YOU ARE DOING
  // ----------------------------------------------------------------
  'admin' => [
    'process' => 'get',
    'url'     => '/admin',
    'uses'    => 'Daison\Admin\App\Controllers\SecurityController@index',
  ],

  'admin_dashboard' => [
    'process' => 'get',
    'url'     => Config::get('admin::general.homepage_url'),
    'uses'    => Config::get('admin::general.homepage_controller'),
  ],

  'admin_security_login' => [
    'process' => 'post',
    'url'     => '/admin/security/login',
    'uses'    => 'Daison\Admin\App\Controllers\SecurityController@login',
  ],

  'admin_security_logout' => [
    'process' => 'get',
    'url'     => '/admin/security/logout',
    'uses'    => 'Daison\Admin\App\Controllers\SecurityController@logout',
  ],

  'admin_user_profile' => [
    'process' => 'get',
    'url'     => '/admin/user/profile',
    'uses'    => 'Daison\Admin\App\Controllers\UserController@profile',
  ],

  'admin_user_lists' => [
    'process' => 'get',
    'url'     => '/admin/user/lists',
    'roles'   => ['superuser'],
    'uses'    => 'Daison\Admin\App\Controllers\UserController@lists',
  ],

];