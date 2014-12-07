<?php
/**
 * -----------------------------------
 * Images sizes
 * -----------------------------------
 * @link http://codex.wordpress.org/Function_Reference/add_image_size
 */

/**
 * Update the default thumbnail
 */
update_option('thumbnail_size_w', 160);
update_option('thumbnail_size_h', 160);
update_option('thumbnail_crop', 1);

/**
 * ---------------------------
 * Add new image sizes
 * ---------------------------
 * add_image_size( [name], [width], [height], [cropped] );
 */
add_image_size('spacial-size', 100, 50, true);

/**
 * ---------------------------------
 * Register th sizes to admin choose
 * ---------------------------------
 */
add_filter('image_size_names_choose', function ($sizes)
{
	return array_merge($sizes, array(
		'spacial-size' => __('Your Custom Size Name'),
	));

});
