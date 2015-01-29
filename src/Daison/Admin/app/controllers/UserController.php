<?php namespace Daison\Admin\App\Controllers;

class UserController extends BaseController
{
  public function changePassword()
  {
    return \View::make('admin::admin.settings.change_password');
  }
}