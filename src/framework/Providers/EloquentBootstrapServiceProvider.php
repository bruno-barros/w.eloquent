<?php  namespace Framework\Providers;

use Corcel\Database;
use Illuminate\Support\ServiceProvider;

/**
 * EloquentBootstrapServiceProvider
 * 
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright	Copyright (c) 2014 Bruno Barros
 */
class EloquentBootstrapServiceProvider extends ServiceProvider{

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$params = array(
			'database'  => DB_NAME,
			'username'  => DB_USER,
			'password'  => DB_PASSWORD,
			'prefix'    => $GLOBALS['table_prefix']
		);

		Database::connect($params);

	}
}