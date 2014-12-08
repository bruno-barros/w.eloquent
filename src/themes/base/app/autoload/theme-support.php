<?php
/**
 * -------------------------------------------
 * Theme support options
 * -------------------------------------------
 */

add_action( 'after_setup_theme', function(){

	/**
	 * Post formats
	 *
	 * @link http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

	/**
	 * Post thumbnails
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' ); // all
//	add_theme_support( 'post-thumbnails', array( 'post', 'movie' ) ); // Posts and Movies

	/**
	 * Custom background
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Custom_Background
	 */
	add_theme_support( 'custom-background', array(
		'default-color'          => '',
		'default-image'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	));



	/**
	 * Custom header
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Custom_Header
	 */
	add_theme_support( 'custom-header', array(
		'default-image'          => '',
		'random-default'         => false,
		'width'                  => 0,
		'height'                 => 0,
		'flex-height'            => false,
		'flex-width'             => false,
		'default-text-color'     => '',
		'header-text'            => true,
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	));


	/**
	 * Feed links
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
	 */
	add_theme_support( 'automatic-feed-links' );


	/**
	 * HTML5 support
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
	 */
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );


	/**
	 * Title tag
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
	 */
	add_theme_support( 'title-tag' );

});
