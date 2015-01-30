<?php namespace Daison\Admin\App\Controllers;

class RoleController extends BaseController
{
  public function showRoles()
  {
    return \View::make('admin::admin.roles.list');
  }



}