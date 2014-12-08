<?php
/**
 * Helpers
 */

if(! function_exists('assets'))
{
	/**
	 * Full url to assets folder.
	 *
	 * @see themes/base/app/config/assets.php
	 *
	 * @param string $assetsName
	 * @return string
	 */
	function assets($assetsName = '')
	{
		return Config::get('assets.url').'/'.trim($assetsName, '/');
	}
}
