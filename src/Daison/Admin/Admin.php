<?php namespace Daison\Admin;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

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
  protected function setRoute($param, $routeParam = null)
  {
    $uses = explode('@', $param['uses']);
    $controller = $uses[0];
    $action = $uses[1];

    Route::{$param['process']}($param['url'],
      // $p1=null, $p2=null, $p3=null, $p4=null, $p5=null, $p6=null, $p7=null, $p8=null, $p9=null, $p10=null
      function()
      use ($param, $controller, $action)
      {

        // check if the route requires an authentication
        // redirect the guest to the login page
        if (! $this->isAuthenticated($param)) {
          return Redirect::to(Config::get('admin::routes.admin.url'))->withError(Config::get('admin::lang/lang.login_notifier'));
        }


        // check if user attempted to login
        // check if the user roles if it linked to the route roles.
        if (Auth::check() == true && $this->hasAnAccess(@$param['roles']) == false ) {
          $msg = 'Access not allowed for ' . json_encode(Auth::user()) . ' accessing ' . $param['url'];
          \Log::error($msg);
          return Response::view('admin::admin.errors.roles', [], 404);
        }


        return call_user_func_array([\App::make($controller), $action], func_get_args());
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

    $user = User::find(Auth::user()->id);
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
    $current_url = URL::to(Route::getCurrentRoute()->getPath());

    // check current url and match to the url
    if (trim($current_url, '/') == URL::to($param['url'])) {

      // matched, then check if is_auth is set and if it is true
      if (isset($param['is_auth']) && $param['is_auth'] == true) {

        // set, then we need to check if auth or not, redirect.
        if (Auth::check() == false) {
          return false;
        }
      }
    }

    return true;
  }


}
