<?php  namespace Framework\Providers;

use Framework\Support\Navigation\Menu;
use Illuminate\Support\ServiceProvider;

/**
 * NavigationServiceProvider
 * 
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright	Copyright (c) 2014 Bruno Barros
 */
class NavigationServiceProvider extends ServiceProvider{

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bindShared('weloquent.menu', function($app)
		{
			return new Menu($app);
		});
	}
}