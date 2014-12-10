<?php
/**
 * Load required plugins
 */

$paths = require SRC_PATH . '/bootstrap/paths.php';


if(! file_exists($paths['app'].DS.'config'.DS.'plugins.php'))
{
	throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException("app/config/plugins.php is needed!");
}

$defaults = [
	/**
	 * #1º
	 * Laravel intergation
	 */
	$paths['framework'].DS.'Core'.DS.'LaravelApplication.php',

	/**
	 * #2º
	 * w.eloquent modifications
	 */
	$paths['framework'].DS.'Plugins'.DS.'AppIntegration'.DS.'app-integration.php',
];

$muPlugins = require_once $paths['app'].DS.'config'.DS.'plugins.php';


foreach(array_merge($defaults, $muPlugins) as $path)
{
	if(file_exists($path))
	{
		require_once $path;
	}
}
