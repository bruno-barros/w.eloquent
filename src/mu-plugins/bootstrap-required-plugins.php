<?php
/**
 * Load required plugins
 */
if(! file_exists(SRC_PATH.DS.'themes'.DS.APP_THEME.DS.'app'.DS.'config'.DS.'plugins.php'))
{
	throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException("app/config/plugins.php is needed!");
}

$defaults = [
	/**
	 * #1º
	 * Laravel intergation
	 */
	SRC_PATH.DS.'framework'.DS.'Core'.DS.'LaravelApplication.php',

	/**
	 * #2º
	 * w.eloquent modifications
	 */
	SRC_PATH.DS.'framework'.DS.'Plugins'.DS.'AppIntegration'.DS.'app-integration.php',
];

$muPlugins = require_once SRC_PATH.DS.'themes'.DS.APP_THEME.DS.'app'.DS.'config'.DS.'plugins.php';

foreach(array_merge($defaults, $muPlugins) as $path)
{
	if(file_exists($path))
	{
		require_once $path;
	}
}
