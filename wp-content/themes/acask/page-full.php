<?php
/*
Template Name: Full Width
*/
get_header(); ?>

<?php $page_meta = get_post_meta($post->ID); ?>

<?php
$hero_img = ($page_meta['_banner_image'][0] != '' ? $page_meta['_banner_image'][0] : false);
$content = ($page_meta['_banner_banner_text'][0] != '' ? $page_meta['_banner_banner_text'][0] : false);
$strapline = ($page_meta['_banner_strapline_text'][0] != '' ? $page_meta['_banner_strapline_text'][0] : false);
?>

<div class="hero-banner__wrapper landmark show-for-large-up">

	<?php if(false != $hero_img && wp_get_attachment_image_src($hero_img)): ?>
		<?php include(locate_template('parts/hero-banner.php')); ?>
	<?php endif; ?>

</div>

<div class="pad-wrapper">
	<div class="row">
		<div class="small-12 large-12 columns" role="main">

		<?php /* Start loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<header>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				<footer>
					<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
					<p><?php the_tags(); ?></p>
				</footer>
				<?php comments_template(); ?>
			</article>
		<?php endwhile; // End the loop ?>

		</div>
	</div>
</div>
<?php get_footer(); ?>
