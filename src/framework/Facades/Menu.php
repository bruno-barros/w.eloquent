<?php  namespace Framework\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Menu
 * 
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright	Copyright (c) 2014 Bruno Barros
 */
class Menu extends Facade{

	/**
	 * @throws \RuntimeException
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'weloquent.menu';
	}

} 