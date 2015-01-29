<?php namespace Daison\Admin;

use Daison\Admin\App\Models\User;

class Admin
{
  public static function start()
  {
    $_self = new static;
    $_self->_start();

    return $_self;
  }


  private function _start()
  {
    // create the routes
    foreach (\Config::get('admin::routes') as $route_name => $val) {
      $this->_createRoute($route_name, $val);
    }
  }


  private function _createRoute($name, $val)
  {
    $url = explode('@', $val['uses']);
    $controller = $url[0];
    $action = $url[1];

    switch (strtoupper($val['process'])) {
      case 'GET':
        \Route::get($val['url'], function() use ($controller, $action, $val) {

          // always check the auth for each route
          if (! $this->_authCheck($val)) {
            return \Redirect::to(\Config::get('admin::routes.admin.url'))->withError(\Config::get('admin::lang/lang.login_notifier'));
          }

          // check the access
          if (\Auth::check() == true && $this->_checkAccessList($val) == false ) {
            $msg = 'Access not allowed for ' . \Auth::user()->email . ' accessing ' . $val['url'];
            \Log::error($msg);
            return \Response::view('admin::admin.errors.acl', [], 404);
          }

          return \App::make($controller)->{$action}();
        });
      break;

      case 'POST':
        \Route::post($val['url'], function() use ($controller, $action, $val) {

          // always check the auth for each route
          if (! $this->_authCheck($val)) {
            return \Redirect::to(\Config::get('admin::routes.admin.url'))->withError(\Config::get('admin::lang/lang.login_notifier'));
          }

          // check the access
          if (\Auth::check() == true && $this->_checkAccessList($val) == false ) {
            $msg = 'Access not allowed for ' . \Auth::user()->email . ' accessing ' . $val['url'];
            \Log::error($msg);
            return \Response::view('admin::admin.errors.acl', [], 404);
          }

          return \App::make($controller)->{$action}();
        });
      break;
    }
  }


  private function _checkAccessList($val)
  {
    if (! isset($val['acl'])) {
      return true;
    }

    if (count($val['acl']) <= 0) {
      return true;
    }

    $user = User::find(\Auth::user()->id);
    $user->roles;

    foreach ($user['roles'] as $role) {
      if (in_array($role['name'], $val['acl'])) {
        return true;
      }
    }

    if (\URL::to($val['url']) == trim(\URL::current(), '/')) {
      return false;
    } else {
      return true;
    }
  }


  private function _authCheck($val)
  {
    // check current url and match to the url
    if (trim(\URL::current(), '/') == \URL::to($val['url'])) {

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
