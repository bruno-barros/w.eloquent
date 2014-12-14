<?php
/**
 * Load required plugins
 */

if(defined('WELOQUENT_TEST_ENV'))
{
	// On comand line environment prevent booting twice
	// and load unnecessary plugins
	return;
}

$paths = require SRC_PATH . '/bootstrap/paths.php';

/**
 * --------------------------------------------
 * Load required plugins (do not remove it)
 * --------------------------------------------
 */
\Weloquent\Plugins\PluginsLoader::bootRequired();


if(file_exists($paths['app'].DS.'config'.DS.'plugins.php'))
{
	/**
	 * ------------------------------------------
	 * Load plugins required from your app
	 * ------------------------------------------
	 * Some plugins are registered inside w.eloquent framework,
	 * but it is still optional.
	 * @see app/config/plugins.php
	 */
	\Weloquent\Plugins\PluginsLoader::loadFromPath($paths['app'].DS.'config'.DS.'plugins.php');
}
