<?php
/**
 * Load required plugins
 */
if(! file_exists(SRC_PATH . '/themes/base/app/config/plugins.php'))
{
	throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException("app/config/plugins.php is needed!");
}

$muPlugins = require_once SRC_PATH . '/themes/base/app/config/plugins.php';

foreach($muPlugins as $path)
{
	require_once $path;
}
