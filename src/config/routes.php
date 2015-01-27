<?php

return [

  // Add your own routes here, dedicated for Admin Package, or do it manually to your route
  
  //EX:
  // [route_name] => [
  //   'process' => 'get', // get or post
  //   'url'     => '/',   // the url to use
  //   'uses'    => 'HomeController@index',    // the controller and function name
  // ],






  // ----------------------------------------------------------------------------
  // DO NOT EDIT BELOW
  // ----------------------------------------------------------------------------
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

  'admin_user_settings' => [
    'process' => 'get',
    'url'     => '/admin/user/settings',
    'uses'    => 'Daison\Admin\App\Controllers\UserController@settings',
  ],

];