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
		//
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
