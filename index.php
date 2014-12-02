<?php

/*----------------------------------------------------*/
// Local environment vars => .env.local.php
// Production environment vars => .env.production.php
/*----------------------------------------------------*/
/*
return array(

	'APP_ENV'     => 'local',

	'DB_NAME'     => '',
	'DB_USER'     => '',
	'DB_PASSWORD' => '',
	'DB_HOST'     => 'localhost',
	'DB_PREFIX'           => 'sig_',
	'INSTALLATION_FOLDER'     => '/',

);
*/

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require(dirname(__FILE__) . '/cms/wp-blog-header.php');
