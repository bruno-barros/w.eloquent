<?php  namespace Framework\Support\Navigation;


/**
 * BootstrapMenuWalker
 * 
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright	Copyright (c) 2014 Bruno Barros
 */
class BootstrapMenuWalker extends  \Walker_Nav_Menu{

	/**
	 * Starts the list before the elements are added.
	 * add classes to ul sub-menus
	 * @param  string $output
	 * @param  int $depth
	 * @param  array $args
	 * @return string
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() )
	{
		// depth dependent classes
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'sub-menu',
			( $display_depth == 0 ? 'dropdown' : '' ),
			( $display_depth > 0 ? 'dropdown-menu' : '' ),
		);
		$class_names = implode( ' ', $classes );

		// build html
		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}


	/**
	 * Start the element output.
	 * add main/sub classes to li's and links
	 * @param  string $output
	 * @param  object $item
	 * @param  int $depth
	 * @param  array $args
	 * @param  int $current_object_id
	 * @return string
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 )
	{
		global $wp_query, $wpdb;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent


		// só faz pesquisa pelos filhos no primeiro nível
		$has_children = 0;
		if($depth == 0){
			$has_children = $wpdb -> get_var( "SELECT COUNT(meta_id) FROM {$wpdb->prefix}postmeta WHERE meta_key='_menu_item_menu_item_parent' AND meta_value='" . $item->ID . "'" );

		}

		// depth dependent classes
		$depth_classes = array(
			( $depth == 0 ? 'dropdown' : 'sub-menu-item' ),
			$item->current ? 'active' : '',

		);
		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

		// passed classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

		// build html
		$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

		// link attributes
		// <a href="#" class="dropdown-toggle" data-toggle="dropdown">biblioteca <b class="caret"></b></a>
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ' class="menu-link menu-depth-'.$depth . ( $depth > 0 ? '' : ' dropdown-toggle' ) . '"';
		$attributes .= $has_children > 0 ? ' data-toggle="dropdown"' : '';

		$caret = $has_children > 0 ? ' <b class="caret"></b>' : '';

		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
			$args->before,
			$attributes,
			$args->link_before,
			apply_filters( 'the_title', $item->title, $item->ID ),
			$args->link_after . $caret,
			$args->after
		);

		// build html
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}