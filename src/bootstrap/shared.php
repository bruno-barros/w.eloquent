<?php

/**
 * --------------------------------------------
 * Define if you want the w.eloquent running
 * inside admin environment
 * --------------------------------------------
 *
 * Just auto loaded files will be loaded
 */
define('WELOQUENT_PREVENT_LOAD_ON_ADMIN', false);


/**
 * ----------------------------------------------------
 * Paths to WordPress
 * ----------------------------------------------------
 * Constants for WordPress environment
 */
define('CONTENT_DIR', $contentDirectory);

define('WP_CONTENT_DIR', $root_path.DS.CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME.'/'.CONTENT_DIR);

define('WP_PLUGIN_DIR', WP_CONTENT_DIR.DS.'plugins');
define('WP_PLUGIN_URL', WP_HOME.'/'.CONTENT_DIR.'/plugins');

define('WPMU_PLUGIN_DIR', WP_CONTENT_DIR.DS.'mu-plugins');
define('WPMU_PLUGIN_URL', WP_HOME.'/'.CONTENT_DIR.'/mu-plugins');

if (!defined('ABSPATH'))
{
	define('ABSPATH', $root_path.DS.'cms'.DS);
}


/**
 * ----------------------------------------------------
 * Set the APP_THEME
 * ----------------------------------------------------
 * The theme the application is working.
 */
define('APP_THEME', getenv('APP_THEME'));

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
define('AUTH_KEY', 'put-your-unique-phrase-for-safe-');
define('SECURE_AUTH_KEY', 'put-your-unique-phrase-for-safe-');
define('LOGGED_IN_KEY', 'put-your-unique-phrase-for-safe-');
define('NONCE_KEY', 'put-your-unique-phrase-for-safe-');
define('AUTH_SALT', 'put-your-unique-phrase-for-safe-');
define('SECURE_AUTH_SALT', 'put-your-unique-phrase-for-safe-');
define('LOGGED_IN_SALT', 'put-your-unique-phrase-for-safe-');
define('NONCE_SALT', 'put-your-unique-phrase-for-safe-');

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

/**
 * enabling "trash" for media items
 * @link https://codex.wordpress.org/Version_4.1#Media_2
 */
define('MEDIA_TRASH', true);

/**
 * @link https://codex.wordpress.org/Trash_status
 * Note: If this constant is set to 0, the trash functionality will be disabled and the 'Delete Permanently'
 * button will appear instead of 'Trash' button. If you click 'Delete Permanently' button, the item will
 * immediately deleted without any alert message.
 */
define('EMPTY_TRASH_DAYS', 30); // 30 days