<?php

/**
 * -----------------------------------------------------
 * Database
 * -----------------------------------------------------
 */
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
$table_prefix = getenv('DB_PREFIX') ? getenv('DB_PREFIX') : 'wp_';

/**
 * -----------------------------------------------------
 * Authentication unique keys and salts
 * -----------------------------------------------------
 * WordPress.org secret-key service
 * @link https://api.wordpress.org/secret-key/1.1/salt/
 */
define('AUTH_KEY', 'put your unique phrase here');
define('SECURE_AUTH_KEY', 'put your unique phrase here');
define('LOGGED_IN_KEY', 'put your unique phrase here');
define('NONCE_KEY', 'put your unique phrase here');
define('AUTH_SALT', 'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT', 'put your unique phrase here');
define('NONCE_SALT', 'put your unique phrase here');

/**
 * ---------------------------------------------------------
 * Custom settings
 * ---------------------------------------------------------
 * @link http://codex.wordpress.org/Editing_wp-config.php
 */
define('WP_AUTO_UPDATE_CORE', 'minor');
define('DISALLOW_FILE_EDIT', true);
define('WP_POST_REVISIONS', 3);
define('AUTOSAVE_INTERVAL', 60); // Seconds
