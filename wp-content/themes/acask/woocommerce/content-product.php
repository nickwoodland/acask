<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;
$product_meta = get_post_meta($post->ID);

$product_regular_price = ($product_meta['_regular_price'][0] != '' ? $product->get_price_including_tax(1, $product_meta['_regular_price'][0]) : false);
$product_sale_price = ($product_meta['_sale_price'][0] != '' ? $product->get_price_including_tax(1, $product_meta['_sale_price'][0]) : false);


// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

?>
	<div class="product-block pad--half">
		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
		<a href="<?php the_permalink(); ?>">
			<figure>
				<?php if(has_post_thumbnail()): ?>
					<?php include(locate_template('parts/imagery/product-thumb.php')); ?>
				<?php endif; ?>
			</figure>
		</a>
		<a href="<?php the_permalink(); ?>">
			<h3 class="product-block__title"><?php the_title(); ?></h3>
		</a>
		<?php if(false != $product_regular_price or false != $product_sale_price): ?>
			<?php if(false != $product_sale_price && false != $product_regular_price): ?>
				<p class="product-block__price">
					<span><strong>Was: </strong>£<?php echo $product_regular_price; ?>,</span> <span><strong>Now: </strong>£<?php echo $product_sale_price; ?></span>
				</p>
			<?php else : ?>
				<p class="product-block__price">
					<strong>Now: </strong>£<?php echo $product_regular_price; ?>
				</p>
			<?php endif; ?>
		<?php endif; ?>

		<div class="product-block__add-to-cart">
			<?php include(locate_template('woocommerce/loop/add-to-cart.php')); ?>
		</div>
	</div>

