<?php get_header(); ?>

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

<div class="pad-wrapper">
	<div class="row">
		<div class="small-12 large-8 columns" role="main">

		<?php do_action( 'foundationpress_before_content' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<header>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				<footer>
					<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
					<p><?php the_tags(); ?></p>
				</footer>
				<?php do_action( 'foundationpress_page_before_comments' ); ?>
				<?php comments_template(); ?>
				<?php do_action( 'foundationpress_page_after_comments' ); ?>
			</article>
		<?php endwhile;?>

		<?php do_action( 'foundationpress_after_content' ); ?>

		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
