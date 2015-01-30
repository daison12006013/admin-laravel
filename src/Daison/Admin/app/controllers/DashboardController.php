<?php namespace Daison\Admin\App\Controllers;

class DashboardController extends BaseController
{
  public function index()
  {
    return \View::make('admin::admin.dashboard.index');
  }

}