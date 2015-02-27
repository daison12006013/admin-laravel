<?php namespace Daison\AdminLaravel\App\Controllers;

use Illuminate\Support\Facades\View;

class DashboardController extends BaseController
{

  public function index()
  {
    return View::make('admin-laravel::admin.dashboard.index');
  }

}
