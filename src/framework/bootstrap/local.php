<?php

/*----------------------------------------------------*/
// Local config
/*----------------------------------------------------*/
// Database
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST') ? getenv('DB_HOST') : 'localhost');


// WordPress URLs
define('WP_HOME', getenv('WP_HOME'));
define('WP_SITEURL', getenv('WP_SITEURL'));


// Development
define('WP_DEBUG', true);

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