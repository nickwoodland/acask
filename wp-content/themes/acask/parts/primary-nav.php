<div class="columns medium-10">
	<?php if ( has_nav_menu( 'primary' ) ) : 

		$args = array( 
			'theme_location' => 'primary', 
			'container' => 'nav', 
			'container_class' => '', 
			'menu_class' => 'inline-list visible-for-medium-up menu-primary--oncanvas', 
			'menu_id' => 'nav-primary', 
			'fallback_cb' => '',
			//'walker' => new bc_add_cpt_descendants_primary_menu_walker,
		);

		wp_nav_menu( $args ); 

	endif; ?>
</div>
<?php global $woocommerce; ?>
<div class="columns medium-2 nav__icons">
	<div class="topbar__search--link">
		 <a class="right-off-canvas-toggle" href="#" ><i class="fa fa-search"></i><span class="show-for-sr">Search</a>
	</div>
	<div class="topbar__checkout--link">
		<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
			<i class="fa fa-shopping-cart"></i>
			<span class="show-for-sr">Cart</span>
		</a>
	</div>
</div>


