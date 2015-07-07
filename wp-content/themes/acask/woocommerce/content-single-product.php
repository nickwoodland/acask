<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php 

$product_regular_price = ($product_meta['_regular_price'][0] != '' ? $product_meta['_regular_price'][0] : false);
$product_sale_price = ($product_meta['_sale_price'][0] != '' ? $product_meta['_sale_price'][0] : false);
?>

<?php $product_type = false; ?>
<?php $add_to_cart_base = 'woocommerce/single-product/add-to-cart/'; ?>

<?php if ( $product->is_type( 'variable' ) ) : ?>

	<?php $product_type = 'variable'; ?>
	<?php $add_to_cart_path = $add_to_cart_base . 'variable.php'; ?>

<?php elseif ($product->is_type('simple') ): ?>

	<?php $product_type = 'simple'; ?>
	<?php $add_to_cart_path = $add_to_cart_base . 'simple.php'; ?>

<?php elseif ($product->is_type('external') ): ?>

	<?php $product_type = 'external'; ?>
	<?php $add_to_cart_path = $add_to_cart_base . 'external.php'; ?>

<?php elseif ($product->is_type('grouped') ): ?>

	<?php $product_type = 'grouped'; ?>
	<?php $add_to_cart_path = $add_to_cart_base . 'grouped.php'; ?>

<?php endif; ?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
 	<div class="row">
 		<div class="columns medium-6">
 			<?php if(wp_get_attachment_image_src(get_post_thumbnail_id($post->ID))): ?>
 				<?php include(locate_template('parts/imagery/product-single.php')); ?>
 			<?php endif; ?>
 		</div>
 		<div class="columns medium-6 product__details">

	 		<?php the_title('<h2>', '</h2>'); ?>
	 		<div class="landmark">
	 			<?php woocommerce_breadcrumb(); ?>
	 		</div>
	 		
	 		<div class="row">
				<div class="columns medium-5 small-12 landmark--half">
					<span class="product-single__price ">
		 				<?php if($product_sale_price): ?>
		 					£<?php echo $product_sale_price; ?>
		 				<?php elseif($product_regular_price): ?>
		 					£<?php echo ($product_regular_price); ?>
		 				<?php endif; ?>
	 				</span>
	 			</div>
	 			<?php if($product_type): ?>
		 			<div class="product-single__add-to-cart columns medium-7 small-12">
		 				<?php include(locate_template($add_to_cart_path)); ?>
		 			</div>
	 			<?php endif; ?>
	 		</div>

	 		<p>
		 		<h3>Description: </h3>
		 		<?php echo wpautop(apply_filters('the_content', $post->post_content)); ?>
	 		</p>

 		</div>
 	</div>
	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
