<header id="header">


	<h1><a href="{{ get_home_url() }}" class="brand">w.eloquent</a></h1>


	<?php

	wp_nav_menu( array(
        'theme_location'  => 'primary',
        'menu'            => 'primary',
        'container'       => 'div',
        'container_class' => 'main-menu',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
    ) );

	?>


</header>