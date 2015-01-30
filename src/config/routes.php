<?php

return [

  // ----------------
  // YOUR ROUTES HERE
  // ----------------
  'admin_home' => [
    'url'     => '/admin/dashboard',
    'is_auth' => true,
    'uses'    => 'Daison\Admin\App\Controllers\DashboardController@index',
  ],












  // ----------------------------------------------------------------
  // DO NOT EDIT BELOW THIS AREA IF YOU DONT KNOW WHAT YOU ARE DOING
  // ----------------------------------------------------------------
  'admin' => [
    'url'     => '/admin',
    'uses'    => 'Daison\Admin\App\Controllers\SecurityController@index',
  ],

  'admin_security_login' => [
    'url'     => '/admin/security/login',
    'uses'    => 'Daison\Admin\App\Controllers\SecurityController@login',
  ],

  'admin_security_logout' => [
    'url'               => '/admin/security/logout',
    'uses'              => 'Daison\Admin\App\Controllers\SecurityController@logout',
  ],

  'admin_user_profile' => [
    'url'               => '/admin/user/profile',
    'is_auth'           => true,
    'uses'              => 'Daison\Admin\App\Controllers\UserController@profile',
  ],

  'admin_user_lists' => [
    'url'               => '/admin/user/lists',
    'is_auth'           => true,
    'acl'               => ['superuser'],
    'uses'              => 'Daison\Admin\App\Controllers\UserController@showLists',
  ],
  
  'admin_user_add' => [
    'url'               => '/admin/user/add',
    'is_auth'           => true,
    'acl'               => ['superuser'],
    'uses'              => 'Daison\Admin\App\Controllers\UserController@new',
  ],
  
  'admin_user_edit' => [
    'url'               => '/admin/user/edit/{id}',
    'is_auth'           => true,
    'acl'               => ['superuser'],
    'uses'              => 'Daison\Admin\App\Controllers\UserController@showEdit',
  ],

  'admin_changepass' => [
    'url'               => '/admin/settings/changepassword',
    'is_auth'           => true,
    'uses'              => 'Daison\Admin\App\Controllers\UserController@showChangePassword',
  ],

  'admin_changepass_save' => [
    'url'               => '/admin/settings/change-password',
    'is_auth'           => true,
    'uses'              => 'Daison\Admin\App\Controllers\UserController@savePassword',
  ],


];