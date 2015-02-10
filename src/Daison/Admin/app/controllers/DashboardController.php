<?php namespace Daison\Admin\App\Controllers;

use Illuminate\Support\Facades\View;

class DashboardController extends BaseController
{

  /**
   *
   *
   * @return unknown
   */
  public function index()
  {
    return View::make('admin::admin.dashboard.index');
  }

}
