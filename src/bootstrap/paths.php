<?php

return [

	/**
	 * --------------------------------------------------------------------------
	 * Application Path of the theme
	 * --------------------------------------------------------------------------
	 *
	 * Here we just defined the path to the application directory. Most likely
	 * you will never need to change this value as the default setup should
	 * work perfectly fine for the vast majority of all our applications.
	 *
	 */
	'app'       => __DIR__ . '/../themes/' . APP_THEME . '/app',

	/**
	 * --------------------------------------------------------------------------
	 * Theme Path
	 * --------------------------------------------------------------------------
	 *
	 * The public path contains the assets for your web application, such as
	 * your JavaScript and CSS files, and also contains the primary entry
	 * point for web requests into these applications from the outside.
	 * The 'public' index if to keep compatibility with some services.
	 *
	 */

	'theme'     => __DIR__ . '/../themes/' . APP_THEME,
	'public'    => __DIR__ . '/../themes/' . APP_THEME,

	/**
	 * --------------------------------------------------------------------------
	 * Base Path
	 * --------------------------------------------------------------------------
	 *
	 * The base path is the root of the WP installation. Most likely you
	 * will not need to change this value. But, if for some wild reason it
	 * is necessary you will do so here, just proceed with some caution.
	 *
	 */

	'base'      => __DIR__ . '/../..',

	/**
	 * --------------------------------------------------------------------------
	 * Storage Path
	 * --------------------------------------------------------------------------
	 *
	 * The storage path is used by WP to store cached Blade views, logs
	 * and other pieces of information. You may modify the path here when
	 * you want to change the location of this directory for your apps.
	 *
	 */

	'storage'   => __DIR__ . '/../storage',

	/**
	 * --------------------------------------------------------------------------
	 * Weloquent framework
	 * --------------------------------------------------------------------------
	 *
	 * Path to the framework
	 *
	 */

	'framework' => __DIR__ . '/../../vendor/bruno-barros/w.eloquent-framework/src/weloquent',

];