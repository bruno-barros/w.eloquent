<?php  namespace Framework\Providers;

use Brain\Container;
use Brain\Cortex;
use Illuminate\Support\ServiceProvider;

/**
 * RouteServiceProvider
 * 
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright	Copyright (c) 2014 Bruno Barros
 */
class RouteServiceProvider extends ServiceProvider{

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

			$this->app->bindShared('weloquent.route', function($app)
			{
				$container = Container::instance();
				return $container->get('cortex.api');
			});

	}
}