<?php
/**
 * Load required plugins
 */
if(! file_exists(SRC_PATH . '/themes/'.APP_THEME.'/app/config/plugins.php'))
{
	throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException("app/config/plugins.php is needed!");
}

$defaults = [
	/**
	 * #1º
	 * Laravel intergation
	 */
	SRC_PATH . '/framework/Plugins/LaravelApplication/laravel-app-init.php',

	/**
	 * #2º
	 * w.eloquent modifications
	 */
	SRC_PATH . '/framework/Plugins/AppIntegration/app-integration.php',
];

$muPlugins = require_once SRC_PATH . '/themes/'.APP_THEME.'/app/config/plugins.php';

foreach(array_merge($defaults, $muPlugins) as $path)
{
	if(file_exists($path))
	{
		require_once $path;
	}
}
