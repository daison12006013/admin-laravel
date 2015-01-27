<?php namespace Daison\Admin\App\Controllers;

class DashboardController extends BaseController
{
  public function __construct()
  {
    $this->beforeFilter('admin-guest');
    $this->beforeFilter('csrf', ['on' => 'post']);
  }

  public function index()
  {
    return \View::make('admin::admin.dashboard.index');
  }

}