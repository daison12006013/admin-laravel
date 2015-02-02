<?php namespace Daison\Admin;

use Daison\Admin\App\Models\User;

class Admin
{


  /**
   *
   *
   * @param unknown $routes
   */
  public function start($routes)
  {
    // Create the routes and filters
    foreach ($routes as $route_name => $val) {
      call_user_func_array(array($this, "setRoute"), [$val]);
    }

    return $this;
  }

  /**
   *
   *
   * @param unknown $val
   * @param unknown $controller
   * @param unknown $action
   * @param unknown $p1         (optional)
   * @param unknown $p2         (optional)
   * @param unknown $p3         (optional)
   * @param unknown $p4         (optional)
   * @param unknown $p5         (optional)
   * @param unknown $p6         (optional)
   * @param unknown $p7         (optional)
   * @param unknown $p8         (optional)
   * @return unknown
   */
  private function setRoute($val, $p1 = null, $p2 = null, $p3 = null, $p4 = null, $p5 = null, $p6 = null, $p7 = null, $p8 = null)
  {
    $url = explode('@', $val['uses']);
    $controller = $url[0];
    $action = $url[1];

    \Route::{$val['process']}($val['url'],
      function($p1=null, $p2=null, $p3=null, $p4=null, $p5=null, $p6=null, $p7=null, $p8=null)
      use ($val, $controller, $action)
      {

        // always check the auth for each route
        if (! $this->_authCheck($val)) {
          return \Redirect::to(\Config::get('admin::routes.admin.url'))->withError(\Config::get('admin::lang/lang.login_notifier'));
        }


        // check the access
        if (\Auth::check() == true && $this->_checkAccessList($val) == false ) {
          $msg = 'Access not allowed for ' . \Auth::user()->email . ' accessing ' . $val['url'];
          \Log::error($msg);
          return \Response::view('admin::admin.errors.roles', [], 404);
        }


        return \App::make($controller)->{$action}($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8);
      }
    );
  }


  /**
   *
   *
   * @param unknown $val
   * @return unknown
   */
  private function _checkAccessList($val)
  {
    if (! isset($val['roles'])) {
      return true;
    }

    if (count($val['roles']) <= 0) {
      return true;
    }

    $user = User::find(\Auth::user()->id);
    $user->roles;

    foreach ($user['roles'] as $role) {
      if (in_array($role['name'], $val['roles'])) {
        return true;
      }
    }

    $current_url = \URL::to(\Route::getCurrentRoute()->getPath());
    if (\URL::to($val['url']) == trim($current_url, '/')) {
      return false;
    } else {
      return true;
    }
  }


  /**
   *
   *
   * @param unknown $val
   * @return unknown
   */
  private function _authCheck($val)
  {
    $current_url = \URL::to(\Route::getCurrentRoute()->getPath());

    // check current url and match to the url
    if (trim($current_url, '/') == \URL::to($val['url'])) {

      // matched, then check if is_auth is set and if it is true
      if (isset($val['is_auth']) && $val['is_auth'] == true) {

        // set, then we need to check if auth or not, redirect.
        if (\Auth::check() == false) {
          return false;
        }
      }
    }

    return true;
  }


}
