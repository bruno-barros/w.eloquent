<?php namespace Framework\Core\Console;

use Framework\Core\Console\WelConsole as ConsoleApplication;
use Illuminate\Foundation\Application;

class Wel{

	/**
	 * The application instance.
	 *
	 * @var \Illuminate\Foundation\Application
	 */
	protected $app;

	/**
	 * The Artisan console instance.
	 *
	 * @var  \Illuminate\Console\Application
	 */
	protected $wel;

	/**
	 * Create a new Artisan command runner instance.
	 *
	 * @param  \Illuminate\Foundation\Application $app
	 * @return \Framework\Core\Console\Wel
	 */
	public function __construct(Application $app)
	{
		$this->app = $app;
	}

	/**
	 * Get the Artisan console instance.
	 *
	 * @return \Illuminate\Console\Application
	 */
	protected function getWel()
	{
		if ( ! is_null($this->wel)) return $this->wel;

		$this->app->loadDeferredProviders();

		$this->wel = ConsoleApplication::make($this->app);

		return $this->wel->boot();
	}

	/**
	 * Dynamically pass all missing methods to console Artisan.
	 *
	 * @param  string  $method
	 * @param  array   $parameters
	 * @return mixed
	 */
	public function __call($method, $parameters)
	{
		return call_user_func_array(array($this->getWel(), $method), $parameters);
	}

}
