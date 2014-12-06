<?php  namespace Framework\Core\Console;

use Illuminate\Console\Application;

/**
 * WelConsole
 * 
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright	Copyright (c) 2014 Bruno Barros
 */
class WelConsole extends Application{


	/**
	 * Create a new Console application.
	 *
	 * @param  \Framework\Core\Application $app
	 * @return \Illuminate\Console\Application
	 */
	public static function make($app)
	{
		$app->boot();

		$console = with($console = new static('WEL. A w.eloquent console by artisan.', $app::VERSION))
			->setLaravel($app)
			->setExceptionHandler($app['exception'])
			->setAutoExit(false);

		$app->instance('artisan', $console);

		return $console;
	}

	/**
	 * Boot the Console application.
	 *
	 * @return $this
	 */
	public function boot()
	{
		$path = $this->laravel['path'].'/config/wel.php';

		if (file_exists($path))
		{
			require $path;
		}

		// If the event dispatcher is set on the application, we will fire an event
		// with the Artisan instance to provide each listener the opportunity to
		// register their commands on this application before it gets started.
		if (isset($this->laravel['events']))
		{
			$this->laravel['events']
				->fire('artisan.start', array($this));
		}

		return $this;
	}

} 