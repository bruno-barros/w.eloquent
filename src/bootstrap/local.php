<?php
/**
 * ----------------------------------------------------
 * Local config environment
 * ----------------------------------------------------
 */

// Database
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST') ? getenv('DB_HOST') : 'localhost');

// WordPress URLs
define('WP_HOME', getenv('WP_HOME'));
define('WP_SITEURL', getenv('WP_SITEURL'));

$isPluginsPage = str_contains($_SERVER['PHP_SELF'], 'plugins.php');

// Development
define('WP_DEBUG', $isPluginsPage ? false : true);

// Cache system
define('WP_CACHE', true);

/**
 * SCRIPT_DEBUG is a related constant that will force WordPress to use the "dev" versions of core CSS and Javascript files rather than the minified versions that are normally loaded.
 */
define('SCRIPT_DEBUG', true);

/**
 * WP_DEBUG_DISPLAY is another companion to WP_DEBUG that controls whether
 * debug messages are shown inside the HTML of pages or not. The default is 'true'
 */
define('WP_DEBUG_DISPLAY', true);
@ini_set('display_errors', 1);

/**
 * WP_DEBUG_LOG is a companion to WP_DEBUG that causes all errors to also
 * be saved to a debug.log log file inside the /src/ directory.
 */
define('WP_DEBUG_LOG', true);

/**
 * The SAVEQUERIES definition saves the database queries to an array and that
 * array can be displayed to help analyze those queries. The constant defined
 * as true causes each query to be saved, how long that query took to execute,
 * and what function called it.
 */
define('SAVEQUERIES', true);

/**
 * --------------------------------------------------------------------------
 *  Auto load some files
 * --------------------------------------------------------------------------
 *
 *  By default are migrations and seeders
 */
if (!defined('WP_ADMIN') || !WP_ADMIN)
{
	$autoLoadDirectories = [
		SRC_PATH . '/themes/' . getenv('APP_THEME') . '/app/database/migrations',
		SRC_PATH . '/themes/' . getenv('APP_THEME') . '/app/database/seeds',
	];

	foreach ($autoLoadDirectories as $atdir)
	{
		foreach (new \DirectoryIterator($atdir) as $file)
		{
			if ($file->isFile() && !$file->isDot())
			{
				if (pathinfo($file->getFilename(), PATHINFO_EXTENSION) === 'php')
				{
					include_once $file->getPath() . DS . $file->getBasename();
				}
			}
		}
	}
}

