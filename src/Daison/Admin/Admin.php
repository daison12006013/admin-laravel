<?php namespace Daison\Admin;

class Admin
{
  private $routes;

  public function __construct($routes)
  {
    $this->routes = $routes;
  }

  public static function getInstance()
  {
    $_self = new self($routes);
    $_self->start()

    return $_self;
  }


  public function start()
  {
    foreach (\Config::get('admin::routes') as $route_name => $val) {

      if (isset($val['is_auth']) && $val['is_auth'] == true) {
        if (! Auth::check()) {
          Redirect::to({{\Config::get('admin::routes.admin.url')}})->withError('Please login.');
        }
      }

      $this->_createRoute($route_name, $val);
    }
  }


  private function _createRoute($name, $route)
  {
    switch ($route['process']) {
      case 'get':
      case 'GET':
        Route::get($route['url'], [
          'as' => $name,
          'uses' => $route['uses'],
        ]);
      break;

      case 'post':
      case 'POST':
        Route::post($route['url'], [
          'as' => $name,
          'uses' => $route['uses'],
        ]);
      break;
    }
  }

}
