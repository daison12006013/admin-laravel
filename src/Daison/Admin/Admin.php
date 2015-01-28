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
    foreach (\Config::get('admin::routes') as $route_name => $val) {

      // always check the auth for each route
      $this->_checkAuth($val);

      // check the access
      if (! $this->_checkAccessList($val)) {
        $msg = 'Access not allowed for ' . \Auth::user()->email . ' accessing ' . $val['url'];
        \Log::error($msg);
        throw new \Exception($msg);
      }

      // always create the route
      $this->_createRoute($route_name, $val);
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

  private function _checkAuth($val)
  {
    // check current url and match to the url
    if (trim(\URL::current(), '/') == \URL::to($val['url'])) {


      // matched, then check if is_auth is set and if it is true
      if (isset($val['is_auth']) && $val['is_auth'] == true) {


        // set, then we need to check if auth or not, redirect.
        if (! \Auth::check()) {
          \Redirect::to(\Config::get('admin::routes.admin.url'))->withError(\Config::get('admin::lang\lang.login_notifier'));
        }
      }
    }
  }


  private function _createRoute($name, $val)
  {
    switch ($val['process']) {
      case 'get':
      case 'GET':
        \Route::get($val['url'], [
          'as' => $name,
          'uses' => $val['uses'],
        ]);
      break;

      case 'post':
      case 'POST':
        \Route::post($val['url'], [
          'as' => $name,
          'uses' => $val['uses'],
        ]);
      break;
    }
  }

}
