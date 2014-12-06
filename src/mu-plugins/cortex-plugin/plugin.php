<?php
/**
 * Plugin Name: Cortex Plugin
 * Plugin URI: https://github.com/Giuseppe-Mazzapica/Cortex
 * Description: Cortex implements a routing system in WordPress.
 * Version: 0.1.0
 * Author: Giuseppe Mazzapica
 * Requires at least: 3.9
 * Tested up to: 3.9.1
 *
 */
if ( ! defined( 'ABSPATH' ) ) exit();

if ( ! defined( 'CORTEXBASEPATH' ) ) define( 'CORTEXBASEPATH', plugin_dir_path( __FILE__ ) );

if ( ! class_exists( 'Brain\Container' ) && is_file( CORTEXBASEPATH . 'vendor/autoload.php' ) ) {
	require_once CORTEXBASEPATH . 'vendor/autoload.php';
}
// routes
Brain\Cortex::boot();
// assets
Brain\Occipital::boot();
