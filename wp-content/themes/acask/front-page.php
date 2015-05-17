<?php get_header(); ?>

<?php $slider = BC_Sliders::get_instance(); ?>

<?php if( false != ( $slides_obj = $slider->bc_get_slider($post->ID) ) ) : ?>
	<?php include(locate_template('parts/hero-slider.php')); ?>
<?php endif; ?>

<div class="strapline text-center pad--half landmark--double">
	<div class="row">
		<?php the_content(); ?>
	</div>
</div>

<div class="row">
	<div class="small-12 columns" role="main">

		<?php do_action( 'foundationpress_before_content' ); ?>

		<?php
		/**
		 * Repeatable Content Blocks
		 */	
		?>
		<?php $content_blocks = get_post_meta( $post->ID, 'content_blocks', false ); ?>
		<?php if(isset($content_blocks) && !empty($content_blocks)): ?>
			<div class="row">
				<?php foreach( $content_blocks AS $block ) : ?>
					<div class="columns medium-3 small-6">
					<?php include locate_template( 'parts/cmb-repeatable-block.php' ); ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		
		<?php do_action( 'foundationpress_after_content' ); ?>

	</div>
</div>
<?php get_footer(); ?>
