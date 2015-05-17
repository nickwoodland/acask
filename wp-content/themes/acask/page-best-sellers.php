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

<?php $page_meta = get_post_meta($post->ID); ?>

<?php
$hero_img = ($page_meta['_banner_image'][0] != '' ? $page_meta['_banner_image'][0] : false);
$content = ($page_meta['_banner_banner_text'][0] != '' ? $page_meta['_banner_banner_text'][0] : false);
$strapline = ($page_meta['_banner_strapline_text'][0] != '' ? $page_meta['_banner_strapline_text'][0] : false);
?>

<?php if(false != $hero_img && wp_get_attachment_image_src($hero_img)): ?>
	<div class="hero-banner__wrapper landmark show-for-large-up">

		<?php include(locate_template('parts/hero-banner.php')); ?>

	</div>
<?php endif; ?>

<!-- Row for main content area -->
<div class="pad-wrapper">

	<div class="row">
		<h3> <?php the_title(); ?></h3>
		<?php if("" != $post->post_content): ?>
			<p>
				<?php the_content(); ?>
			</p>
		<?php endif; ?>
		<div class="small-12 columns negative-offest-left" role="main">
			<?php 

			$bestsellers_args = array(
				'post_type' => 'product',
				'posts_per_page' => 12,
				'meta_key' => 'total_sales',
				'orderby' => 'meta_value_num',
			);

			$bestseller_posts = new WP_Query($bestsellers_args);
			$wp_query = $bestseller_posts;
			$posts = $wp_query->get_posts(); 

			?>
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
						<article class="columns medium-3 small-6 landmark <?php echo($post_count == $i ? 'end' : ''); ?>"  data-equalizer-watch>
							<?php include(locate_template('woocommerce/content-product.php')); ?>
						</article>
					<?php endwhile; // end of the loop. ?>

				</section>

			<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

					<?php wc_get_template( 'loop/no-products-found.php' ); ?>

			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>

	</div>
</div>
<?php get_footer(); ?>
