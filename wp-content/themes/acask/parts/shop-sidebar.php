<?php get_product_search_form(); ?>

<?php $args = array(
		'orderby' => 'name',
		'order' => 'ASC',
		'hide_empty' => true,
	);
?>
<?php $product_categories = get_terms( 'product_cat', $args ); ?>

<h4>Product Categories</h4>
<ul>
	<?php foreach($product_categories as $cat): ?>
		<li>
				<a href="<?php echo get_term_link($cat); ?>"><?php echo $cat->name; ?></a>
		</li>
	<?php endforeach; ?>
</ul>