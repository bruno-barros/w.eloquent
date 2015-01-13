<?php
/**
 * --------------------------------------------------------------------
 *  Check if active theme match APP_THEME and is available
 * --------------------------------------------------------------------
 *
 *  !! You should remove it on production !!
 *
 *  It is just to prevent errors when installing and setting up.
 */

if(defined('WP_INSTALLING') && WP_INSTALLING)
{
	return;
}

if (wp_get_theme()->get_template() !== APP_THEME || wp_get_theme()->errors() !== false)
{

	$themesFolders = array_filter(scandir(SRC_PATH . '/themes/'), function ($dir)
	{
		return substr($dir, 0, 1) != '.';
	});


	if (in_array(APP_THEME, $themesFolders))
	{
		update_option('template', APP_THEME);
		update_option('stylesheet', APP_THEME);
	}
	else
	{
		printf('<h1>%s</h1>', 'Unable to locate [' . APP_THEME . '] theme directory. Fix it on your .env*.php file.');
		exit;
	}
}
