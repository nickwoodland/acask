<aside id="sidebar" class="small-12 large-3 columns">
	<?php do_action( 'foundationpress_before_sidebar' ); ?>
		<?php if(is_shop() || is_product() || is_product_category()) : ?>
			<?php include(locate_template('parts/shop-sidebar.php')); ?>
		<?php endif; ?>
		<?php if(is_home()) : ?>
			<?php include(locate_template('parts/blog-sidebar.php')); ?>
		<?php endif; ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>
