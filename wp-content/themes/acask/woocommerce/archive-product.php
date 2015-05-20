<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

<?php $hero_img = false; ?>
<?php $content = false; ?>

<?php if(is_shop()): ?>

	<?php $shop_page = get_page_by_path('Shop'); ?>
	<?php $shop_meta = get_post_meta($shop_page->ID); ?>

	<?php
	$hero_img = ($shop_meta['_banner_image'][0] != '' ? $shop_meta['_banner_image'][0] : false);
	$content = ($shop_meta['_banner_banner_text'][0] != '' ? $shop_meta['_banner_banner_text'][0] : false);
	$strapline = ($shop_meta['_banner_strapline_text'][0] != '' ? $shop_meta['_banner_strapline_text'][0] : false);
	?>


<?php elseif(is_product_category()): ?>

	<?php 
	global $wp_query;
    // get the query object
    $cat = $wp_query->get_queried_object();
    // get the thumbnail id user the term_id
    $hero_img = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); 
    ?>

    <?php $strapline = $cat->name; ?>
    <?php $content = $cat->description; ?>

<?php endif; ?>

<div class="hero-banner__wrapper landmark show-for-large-up">

	<?php if(false != $hero_img && wp_get_attachment_image_src($hero_img)): ?>
		<?php include(locate_template('parts/hero-banner.php')); ?>
	<?php endif; ?>

</div>

<!-- Row for main content area -->
<div class="pad-wrapper">
	<div class="row">
		<div class="columns small-12 large-9 negative-offest-left">
			<div class="row">
				<div class="columns small-12 medium-9">
					<?php woocommerce_breadcrumb(); ?>
					<?php woocommerce_result_count(); ?>
				</div>
				<div class="columns small-12 medium-3">
					<?php woocommerce_catalog_ordering(); ?>
				</div>
			</div>
		</div>

	</div>
	<div class="row">

		<div class="small-12 large-9 columns negative-offest-left" role="main">

			<?php if ( have_posts() ) : ?>

				<?php woocommerce_product_subcategories(); ?>

				<section class="row" data-equalizer>
					<div class="columns small-12">
					<?php wc_print_notices(); ?>
					</div>

					<?php $post_count = count($posts); ?>
					<?php $i = 0; ?>
				
					<?php while ( have_posts() ) : the_post(); ?>
						<?php $i++; ?>
						<article class="columns medium-4 small-6 landmark <?php echo($post_count == $i ? 'end' : ''); ?>"  data-equalizer-watch>	
							<?php include(locate_template('woocommerce/content-product.php')); ?>
						</article>
					<?php endwhile; // end of the loop. ?>

				</section>

			<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

					<?php wc_get_template( 'loop/no-products-found.php' ); ?>

			<?php endif; ?>
			<div class="landmark">
				<?php woocommerce_pagination(); ?>
			</div>
		</div>

		
		<?php
			/**
			 * woocommerce_sidebar hook
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			do_action( 'woocommerce_sidebar' );
		?>
		<?php // get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
