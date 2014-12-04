<?php
/**
 * ----------------------------------------------------------
 * Register The Artisan Commands
 * ----------------------------------------------------------
 *
 * Each available Artisan command must be registered with the console so
 * that it is available to be called. We'll register every command so
 * the console gets access to each of the command object instances.
 */

/**
 * Example command, just for fun
 */
Artisan::add(new \App\Commands\ExampleCommand());