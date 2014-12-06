<?php namespace Framework\Plugins\AppIntegration\Includes;

use Framework\Core\Contracts\LoaderInterface;
use Framework\Core\Loader;

class ConfigurationsAutoLoader extends Loader implements LoaderInterface
{
	/**
	 * Load the files on app/autoload
	 * 
	 * @return bool True. False if not appended.
	 */
	public static function add()
	{
		return static::append(self::$app['path'].'/autoload');
	}

}