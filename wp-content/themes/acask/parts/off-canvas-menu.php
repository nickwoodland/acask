<aside class="left-off-canvas-menu" aria-hidden="true">
	<ul>
    	<?php if ( has_nav_menu( 'mobile-off-canvas' ) ) : 

			$args = array( 
				'theme_location' => 'mobile-off-canvas', 
				'container' => 'nav', 
				'container_class' => '', 
				'menu_class' => ' menu-primary--offcanvas', 
				'menu_id' => 'nav-offcanvas', 
				'fallback_cb' => '',
				//'walker' => new bc_add_cpt_descendants_primary_menu_walker,
			);

		wp_nav_menu( $args ); 

	endif; ?>
	</ul>
</aside>

<aside class="right-off-canvas-menu" aria-hidden="true">
    <div class="offcanvas__search--wrapper pad">
	    <h3 class="landmark">Product Search </h3>
	    <?php get_product_search_form(); ?>
    </div>
</aside>