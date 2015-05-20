<?php get_header(); ?>


<?php $news_page = get_page_by_path('News'); ?>
<?php $news_meta = get_post_meta($news_page->ID); ?>

<?php
$hero_img = ($news_meta['_banner_image'][0] != '' ? $news_meta['_banner_image'][0] : false);
$content = ($news_meta['_banner_banner_text'][0] != '' ? $news_meta['_banner_banner_text'][0] : false);
$strapline = ($news_meta['_banner_strapline_text'][0] != '' ? $news_meta['_banner_strapline_text'][0] : false);
?>

<div class="hero-banner__wrapper landmark show-for-large-up">

	<?php if(false != $hero_img && wp_get_attachment_image_src($hero_img)): ?>
		<?php include(locate_template('parts/hero-banner.php')); ?>
	<?php endif; ?>

</div>

<div class="pad-wrapper">
	<div class="row">

		<div class="small-12 large-9 columns" role="main">

		<?php if ( have_posts() ) : ?>

			<?php do_action( 'foundationpress_before_content' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>

			<?php do_action( 'foundationpress_before_pagination' ); ?>

		<?php endif;?>



		<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>
			<nav id="post-nav">
				<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
				<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
			</nav>
		<?php } ?>

		<?php do_action( 'foundationpress_after_content' ); ?>

		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
