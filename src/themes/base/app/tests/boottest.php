<?php
define( 'WPINC', 'wp-includes' );
define( 'WELOQUENT_TEST_ENV', true );
defined('DS') ? DS : define('DS', DIRECTORY_SEPARATOR);

/**
 * root level of the application
 */
$root = __DIR__ . '/../../../../..';

/**
 * ------------------------------------------------
 * Load vendor packages
 * Set up variables
 * ------------------------------------------------
 */
require $root . '/src/bootstrap/start.php';

/**
 * ------------------------------------------------
 * Load PHPUnit helpers
 * ------------------------------------------------
 */
if(file_exists($root . '/vendor/phpunit/phpunit/PHPUnit/Framework/Assert/Functions.php'))
{
	require_once $root . '/vendor/phpunit/phpunit/PHPUnit/Framework/Assert/Functions.php';
}
