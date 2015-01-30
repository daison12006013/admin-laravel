<?php

return [

  // ----------------
  // YOUR ROUTES HERE
  // ----------------
  'admin_home' => [
    'process' => 'get',
    'url'     => '/admin/dashboard',
    'is_auth' => true,
    'uses'    => 'Daison\Admin\App\Controllers\DashboardController@index',
  ],












  // ----------------------------------------------------------------
  // DO NOT EDIT BELOW THIS AREA IF YOU DONT KNOW WHAT YOU ARE DOING
  // ----------------------------------------------------------------
  'admin' => [
    'process'           => 'get',
    'url'               => '/admin',
    'uses'              => 'Daison\Admin\App\Controllers\SecurityController@index',
  ],

  'admin_security_login' => [
    'process'           => 'post',
    'url'               => '/admin/security/login',
    'uses'              => 'Daison\Admin\App\Controllers\SecurityController@login',
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
    'uses'              => 'Daison\Admin\App\Controllers\UserController@showLists',
  ],
  
  'admin_user_add' => [
    'process'           => 'get',
    'url'               => '/admin/user/add',
    'is_auth'           => true,
    'acl'               => ['superuser'],
    'uses'              => 'Daison\Admin\App\Controllers\UserController@showNew',
  ],
  
  'admin_user_edit' => [
    'process'           => 'get',
    'url'               => '/admin/user/edit/{id}',
    'is_auth'           => true,
    'acl'               => ['superuser'],
    'uses'              => 'Daison\Admin\App\Controllers\UserController@showEdit',
  ],
  'admin_user_edit_save' => [
    'process'           => 'post',
    'url'               => '/admin/user/edit/{id}',
    'is_auth'           => true,
    'acl'               => ['superuser'],
    'uses'              => 'Daison\Admin\App\Controllers\UserController@saveEdit',
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
    'uses'              => 'Daison\Admin\App\Controllers\UserController@updatePassword',
  ],


];