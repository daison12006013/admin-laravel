<?php namespace Daison\Admin;

use Daison\Admin\App\Models\User;

class Admin
{


  /**
   *
   *
   * @param mixed $routes
   * @return mixed
   */
  public function start($routes)
  {
    // Create the routes and filters
    foreach ($routes as $route_name => $val) {
      $this->setRoute($val);
    }

    return $this;
  }


  /**
   *
   *
   */
  protected function setRoute($param)
  {
    $url = explode('@', $param['uses']);
    $controller = $url[0];
    $action = $url[1];

    \Route::{$param['process']}($param['url'],
      function($p1=null, $p2=null, $p3=null, $p4=null, $p5=null, $p6=null, $p7=null, $p8=null, $p9=null, $p10=null)
      use ($param, $controller, $action)
      {

        // check if the route requires an authentication
        // redirect the guest to the login page
        if (! $this->isAuthenticated($param)) {
          return \Redirect::to(\Config::get('admin::routes.admin.url'))->withError(\Config::get('admin::lang/lang.login_notifier'));
        }


        // check if user attempted to login
        // check if the user roles if it linked to the route roles.
        if (\Auth::check() == true && $this->hasAnAccess(@$param['roles']) == false ) {
          $msg = 'Access not allowed for ' . \Auth::user()->email . ' accessing ' . $param['url'];
          \Log::error($msg);
          return \Response::view('admin::admin.errors.roles', [], 404);
        }


        return \App::make($controller)->{$action}($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10);
      }
    );
  }


  /**
   *
   *
   * @param mixed $param
   * @return bool
   */
  public function hasAnAccess($roles)
  {
    if (empty($roles)) {
      return true;
    }

    if (count($roles) <= 0) {
      return true;
    }

    $user = User::find(\Auth::user()->id);
    $user->roles;

    foreach ($user['roles'] as $role) {
      if (in_array($role['name'], $roles)) {
        return true;
      }
    }

    return false;
  }


  /**
   *
   *
   * @param mixed $param
   * @return bool
   */
  private function isAuthenticated($param)
  {
    $current_url = \URL::to(\Route::getCurrentRoute()->getPath());

    // check current url and match to the url
    if (trim($current_url, '/') == \URL::to($param['url'])) {

      // matched, then check if is_auth is set and if it is true
      if (isset($param['is_auth']) && $param['is_auth'] == true) {

        // set, then we need to check if auth or not, redirect.
        if (\Auth::check() == false) {
          return false;
        }
      }
    }

    return true;
  }


}
