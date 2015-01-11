<?php
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
$paths = require SRC_PATH . '/bootstrap/paths.php';

if(file_exists($pluginsPath = $paths['app'].DS.'config'.DS.'plugins.php'))
{
	\Weloquent\Plugins\PluginsLoader::loadFromPath($pluginsPath);
}