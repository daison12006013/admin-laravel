<?php

return [

  // ----------------
  // YOUR ROUTES HERE
  // ----------------
  'admin_home' => [
    'process' => 'get',
    'url'     => '/admin/dashboard',
    'uses'    => 'Daison\Admin\App\Controllers\DashboardController@index',
  ],












  // ----------------------------------------------------------------
  // DO NOT EDIT BELOW THIS AREA IF YOU DONT KNOW WHAT YOU ARE DOING
  // ----------------------------------------------------------------
  'admin' => [
    'process' => 'get',
    'url'     => '/admin',
    'uses'    => 'Daison\Admin\App\Controllers\SecurityController@index',
  ],

  'admin_security_login' => [
    'process' => 'post',
    'url'     => '/admin/security/login',
    'uses'    => 'Daison\Admin\App\Controllers\SecurityController@login',
  ],

  'admin_security_logout' => [
    'process'           => 'get',
    'url'               => '/admin/security/logout',
    'uses'              => 'Daison\Admin\App\Controllers\SecurityController@logout',
  ],

  'admin_user_profile' => [
    'process'           => 'get',
    'url'               => '/admin/user/profile',
    'is_auth'           => true,
    'uses'              => 'Daison\Admin\App\Controllers\UserController@profile',
  ],

  'admin_user_lists' => [
    'process'           => 'get',
    'url'               => '/admin/user/lists',
    'is_auth'           => true,
    'acl'               => ['superuser'],
    'uses'              => 'Daison\Admin\App\Controllers\UserController@lists',
  ],
  
  'admin_user_add' => [
    'process'           => 'get',
    'url'               => '/admin/user/add',
    'is_auth'           => true,
    'acl'               => ['superuser'],
    'uses'              => 'Daison\Admin\App\Controllers\UserController@addNewUser',
  ],

  'admin_changepass' => [
    'process'           => 'get',
    'url'               => '/admin/settings/change-password',
    'is_auth'           => true,
    'uses'              => 'Daison\Admin\App\Controllers\UserController@showChangePassword',
  ],

  'admin_changepass_save' => [
    'process'           => 'post',
    'url'               => '/admin/settings/change-password',
    'is_auth'           => true,
    'uses'              => 'Daison\Admin\App\Controllers\UserController@savePassword',
  ],


];