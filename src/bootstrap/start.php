<?php
/**
 * ----------------------------------------------------
 * Paths
 * ----------------------------------------------------
 */

/** @var string $contentDirectory The source folder of the theme */
$contentDirectory = 'src';

define('SRC_PATH', dirname(__DIR__));

/** @var string $root_path The root folder of the project */
$root_path = str_replace(DS . $contentDirectory, '', SRC_PATH);

/**
 * ----------------------------------------------------
 * Include composer autoloading
 * ----------------------------------------------------
 */
if (file_exists($autoload = $root_path . DS . 'vendor' . DS . 'autoload.php'))
{
	require_once($autoload);
}

/**
 * --------------------------------------------------------------------------
 *  Include The Compiled Class File
 * --------------------------------------------------------------------------
 *
 *  To dramatically increase your application's performance, you may use a
 *  compiled class file which contains all of the classes commonly used
 *  by a request. The Wel "optimize --force" is used to create this file.
 */
if (file_exists($compiled = SRC_PATH. '/storage/compiled.php'))
{
	require $compiled;
}

/**
 * ----------------------------------------------------
 * Set environment
 * ----------------------------------------------------
 * Define path and the environment locations.
 */
$env = new \Weloquent\Config\Environment($root_path);

/**
 * ----------------------------------------------------
 * Load .env file
 * ----------------------------------------------------
 */
$location = $env->which();

if (empty($location))
{
	printf('<h1>%s</h1>', 'Unable to define the environment. Make sure to define your hostname.');
}

$loaded = $env->load($location);

if (empty($loaded))
{
	printf('<h1>%s</h1>', 'Unable to locate your environment file.');
}

/**
 * ----------------------------------------------------
 * Check required vars
 * ----------------------------------------------------
 */
$check = $env->check(array(
	'APP_ENV',
	'APP_THEME',
	'DB_NAME',
	'DB_USER',
	'DB_PASSWORD',
	'DB_HOST',
	'WP_HOME',
	'WP_SITEURL'
), $loaded);

/**
 * ----------------------------------------------------
 * Populate environment vars
 * ----------------------------------------------------
 */
if ($check)
{
	$env->populate($loaded);
}
else
{
	printf('<h2>%s</h2>', 'Missing environment variables.');
}

/**
 * ----------------------------------------------------
 * Load environment config constants
 * ----------------------------------------------------
 */
if (file_exists($config = $root_path . DS . 'src' . DS . 'bootstrap' . DS . $location . '.php'))
{
	require_once($config);
}

/**
 * ----------------------------------------------------
 * Include shared configuration
 * ----------------------------------------------------
 */
if (file_exists($shared = $root_path . DS . 'src' . DS . 'bootstrap' . DS . 'shared.php'))
{
	require_once($shared);
}