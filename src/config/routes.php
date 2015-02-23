<?php

return [

  /*---------------------------------------------------------------------------------
  | YOUR ROUTES HERE
  |----------------------------------------------------------------------------------
   */
  'admin_home' => [
    'process'           => 'get',
    'url'               => '/admin/dashboard',
    'is_auth'           => true,
    'uses'              => 'Daison\AdminLaravel\App\Controllers\DashboardController@index',
  ],












  /*---------------------------------------------------------------------------------
  | DO NOT EDIT BELOW THIS AREA IF YOU DONT KNOW WHAT YOU ARE DOING
  |----------------------------------------------------------------------------------
   */
  'admin' => [
    'process'           => 'get',
    'url'               => '/admin',
    'uses'              => 'Daison\AdminLaravel\App\Controllers\SecurityController@index',
  ],

  'admin_security_login' => [
    'process'           => 'post',
    'url'               => '/admin/security/login',
    'uses'              => 'Daison\AdminLaravel\App\Controllers\SecurityController@login',
  ],

  'admin_security_logout' => [
    'process'           => 'get',
    'url'               => '/admin/security/logout',
    'uses'              => 'Daison\AdminLaravel\App\Controllers\SecurityController@logout',
  ],

  'admin_user_profile' => [
    'process'           => 'get',
    'url'               => '/admin/user/profile',
    'is_auth'           => true,
    'uses'              => 'Daison\AdminLaravel\App\Controllers\UserController@profile',
  ],

  'admin_user_lists' => [
    'process'           => 'get',
    'url'               => '/admin/user/lists',
    'is_auth'           => true,
    'roles'             => ['superuser'],
    'uses'              => 'Daison\AdminLaravel\App\Controllers\UserController@showLists',
  ],

  'admin_user_reset_password' => [
    'process'           => 'get',
    'url'               => '/admin/user/reset-password',
    'is_auth'           => true,
    'roles'             => ['superuser'],
    'uses'              => 'Daison\AdminLaravel\App\Controllers\UserController@requestAResetPassword',
  ],

  'admin_user_forgot_password' => [
    'process'           => 'get',
    'url'               => '/admin/user/forgot-password',
    'uses'              => 'Daison\AdminLaravel\App\Controllers\UserController@requestAForgotPassword',
  ],
  
  'admin_user_add' => [
    'process'           => 'get',
    'url'               => '/admin/user/add',
    'is_auth'           => true,
    'roles'             => ['superuser'],
    'uses'              => 'Daison\AdminLaravel\App\Controllers\UserController@showAdd',
  ],

  'admin_user_edit' => [
    'process'           => 'get',
    'url'               => '/admin/user/{id}/edit',
    'is_auth'           => true,
    'roles'             => ['superuser'],
    'uses'              => 'Daison\AdminLaravel\App\Controllers\UserController@showEdit',
  ],

  'admin_user_edit_save' => [
    'process'           => 'post',
    'url'               => '/admin/user/{id}/edit',
    'is_auth'           => true,
    'roles'             => ['superuser'],
    'uses'              => 'Daison\AdminLaravel\App\Controllers\UserController@saveEdit',
  ],

  'admin_user_add_save' => [
    'process'           => 'post',
    'url'               => '/admin/user/add',
    'is_auth'           => true,
    'roles'             => ['superuser'],
    'uses'              => 'Daison\AdminLaravel\App\Controllers\UserController@saveAdd',
  ],

  'admin_user_id_roles' => [
    'process'           => 'get',
    'url'               => '/admin/user/{id}/roles',
    'is_auth'           => true,
    'roles'             => ['superuser'],
    'uses'              => 'Daison\AdminLaravel\App\Controllers\UserController@showRoles',
  ],

  'admin_user_id_roles_save' => [
    'process'           => 'post',
    'url'               => '/admin/user/{id}/roles',
    'is_auth'           => true,
    'roles'             => ['superuser'],
    'uses'              => 'Daison\AdminLaravel\App\Controllers\UserController@saveRoles',
  ],

  'admin_user_id_role_id_delete' => [
    'process'           => 'get',
    'url'               => '/admin/user/{id}/roles/{role_id}/delete',
    'is_auth'           => true,
    'roles'             => ['superuser'],
    'uses'              => 'Daison\AdminLaravel\App\Controllers\UserController@deleteRole',
  ],

  'admin_role_lists' => [
    'process'           => 'get',
    'url'               => '/admin/role/lists',
    'is_auth'           => true,
    'roles'             => ['superuser'],
    'uses'              => 'Daison\AdminLaravel\App\Controllers\RoleController@showRoles',
  ],

  'admin_roles_add' => [
    'process'           => 'get',
    'url'               => '/admin/role/add',
    'is_auth'           => true,
    'roles'             => ['superuser'],
    'uses'              => 'Daison\AdminLaravel\App\Controllers\RoleController@showAdd',
  ],

  'admin_roles_add_save' => [
    'process'           => 'post',
    'url'               => '/admin/role/add',
    'is_auth'           => true,
    'roles'             => ['superuser'],
    'uses'              => 'Daison\AdminLaravel\App\Controllers\RoleController@saveAdd',
  ],

  'admin_roles_edit' => [
    'process'           => 'get',
    'url'               => '/admin/role/{id}/edit',
    'is_auth'           => true,
    'roles'             => ['superuser'],
    'uses'              => 'Daison\AdminLaravel\App\Controllers\RoleController@showEdit',
  ],

  'admin_roles_edit_save' => [
    'process'           => 'post',
    'url'               => '/admin/role/{id}/edit',
    'is_auth'           => true,
    'roles'             => ['superuser'],
    'uses'              => 'Daison\AdminLaravel\App\Controllers\RoleController@saveEdit',
  ],

  'admin_changepass' => [
    'process'           => 'get',
    'url'               => '/admin/settings/change-password',
    'is_auth'           => true,
    'uses'              => 'Daison\AdminLaravel\App\Controllers\UserController@showChangePassword',
  ],

  'admin_changepass_save' => [
    'process'           => 'post',
    'url'               => '/admin/settings/change-password',
    'is_auth'           => true,
    'uses'              => 'Daison\AdminLaravel\App\Controllers\UserController@saveChangedPassword',
  ],

  'admin_resetpassword' => [
    'process'           => 'get',
    'url'               => '/admin/reset-password/{token}',
    'uses'              => 'Daison\AdminLaravel\App\Controllers\UserController@showResetPassword',
  ],

  'admin_resetpassword_save' => [
    'process'           => 'post',
    'url'               => '/admin/reset-password/{token}',
    'uses'              => 'Daison\AdminLaravel\App\Controllers\UserController@saveResettedPassword',
  ],



];