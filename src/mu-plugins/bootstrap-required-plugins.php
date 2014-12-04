<?php
/**
 * Load required plugins
 */
$muPlugins = require_once SRC_PATH . '/themes/base/app/config/plugins.php';

foreach($muPlugins as $path)
{
	require_once $path;
}
