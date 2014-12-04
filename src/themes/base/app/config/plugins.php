<?php
/**
 * Must use plugins
 */

return array(

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

	/**
	 * Blade engine
	 */
	SRC_PATH . '/framework/Plugins/Blade/blade.php',

	/**
	 * Router, Assets for Word press
	 */
	SRC_PATH . '/mu-plugins/cortex-plugin/plugin.php',

);