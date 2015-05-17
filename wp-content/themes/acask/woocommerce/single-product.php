<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header( 'shop' ); ?>

<?php global $product; ?>

<?php $product_meta = get_post_meta($post->ID); ?>

<?php
$product_banner_image = ($product_meta['_banner_image'][0] != '' ? $product_meta['_banner_image'][0] : false);
$product_banner_text = ($product_meta['_banner_banner_text'][0] != '' ? $product_meta['_banner_banner_text'][0] : false);
$product_strapline_text = ($product_meta['_banner_strapline_text'][0] != '' ? $product_meta['_banner_strapline_text'][0] : false);
?>

<?php if($product_banner_image&& wp_get_attachment_image_src($product_banner_image)): ?>
 	<div class="hero-banner__wrapper landmark--double">
	 	<?php $hero_img = $product_banner_image; ?>
	 	<?php $content = $product_banner_text; ?>
	 	<?php $strapline = $product_strapline_text; ?>
		<?php include(locate_template('parts/hero-banner.php')); ?>
	</div>
<?php endif; ?>

<div class="pad-wrapper">
	<div class="row">
		<div class="small-12 large-9 columns negative-offest-left" role="main">
			<div>
				<?php wc_print_notices(); ?>
			</div>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php include(locate_template('woocommerce/content-single-product.php')); ?>

			<?php endwhile; // end of the loop. ?>
		</div>

		<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
		?>

	</div>
</div>
<?php get_footer( 'shop' ); ?>