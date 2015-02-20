<?php namespace Daison\AdminLaravel;

use Illuminate\Support\ServiceProvider;

class AdminLaravelServiceProvider extends ServiceProvider {

  /**
   * Indicates if loading of the provider is deferred.
   *
   * @var bool
   */
  protected $defer = false;

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
      // other code omitted...

      // Get config loader
      $loader = $this->app['config']->getLoader();

      // Get environment name
      $env = $this->app['config']->getEnvironment();

      // Add package namespace with path set, override package if app config exists in the main app directory
      if (file_exists(app_path() .'/config/packages/daison/admin-laravel')) {
        $loader->addNamespace('admin-laravel', app_path() .'/config/packages/daison/admin-laravel');
      } else {
        $loader->addNamespace('admin-laravel', __DIR__.'/../../config');
      }

      // Load package override config file
      $general = $loader->load($env, 'general', 'admin-laravel');
      $navigation = $loader->load($env, 'navigation', 'admin-laravel');
      $routes = $loader->load($env, 'routes', 'admin-laravel');

      // Override value
      $this->app['config']->set('admin-laravel::general', $general);
      $this->app['config']->set('admin-laravel::navigation', $navigation);
      $this->app['config']->set('admin-laravel::routes', $routes);
  }

  /**
   *
   */
  public function boot()
  {
    $this->package('daison/admin-laravel');
    require 'app/Helpers.php';

    $admin = new AdminLaravel;
    $admin->start(\Config::get('admin-laravel::routes'));
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return array();
  }

}
