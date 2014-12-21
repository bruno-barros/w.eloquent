<?php
/**
 * ----------------------------------------------------
 * Load required plugins
 * ----------------------------------------------------
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

/**
 * ------------------------------------------
 * Load plugins required from your app
 * ------------------------------------------
 * @see app/config/plugins.php
 */
if(file_exists($pluginsPath = $paths['app'].DS.'config'.DS.'plugins.php'))
{
	\Weloquent\Plugins\PluginsLoader::loadFromPath($pluginsPath);
}