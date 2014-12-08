<?php  namespace Framework\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Route
 * 
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright	Copyright (c) 2014 Bruno Barros
 */
class Route extends Facade{

	/**
	 * @throws \RuntimeException
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'weloquent.route';
	}

} 