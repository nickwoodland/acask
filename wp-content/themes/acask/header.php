<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php if ( is_category() ) {
			echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
		} elseif ( is_tag() ) {
			echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
		} elseif ( is_archive() ) {
			wp_title( '' ); echo ' Archive | '; bloginfo( 'name' );
		} elseif ( is_search() ) {
			echo 'Search for &quot;'.esc_html( $s ).'&quot; | '; bloginfo( 'name' );
		} elseif ( is_home() || is_front_page() ) {
			bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
		} elseif ( is_404() ) {
			echo 'Error 404 Not Found | '; bloginfo( 'name' );
		} elseif ( is_single() ) {
			wp_title( '' );
		} else {
			echo wp_title( ' | ', 'false', 'right' ); bloginfo( 'name' );
		} ?></title>

		<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-144x144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-114x114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-72x72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-precomposed.png">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		
		<?php wp_head(); ?>
	</head>
	<body onload="document.body.setAttribute('class','loaded')" <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>
	
	<div class="off-canvas-wrap" data-offcanvas>
		<div class="inner-wrap">
			<?php global $woocommerce; ?>
			<?php do_action( 'foundationpress_layout_start' ); ?>
			<nav class="tab-bar">
				<section>
					<a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
				</section>
				<section class="middle tab-bar-section">
					
					<h1 class="title"><?php bloginfo( 'name' ); ?></h1>

				</section>
				<section class="topbar__cart">
					<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
					<i class="fa fa-shopping-cart"></i>
					<span class="show-for-sr">Cart</span>
				</a>
				</section>

			</nav>

			<div class="text-center show-for-small">
				<a href="<?php echo home_url(); ?>" class="logo"><?php bloginfo( 'name' ); ?></a>
			</div>

			<div class="header-bg__wrapper show-for-large-up">
				<div class="pad-wrapper">

					<?php get_template_part( 'parts/top-bar' ); ?>

				</div>
			</div>


			<?php get_template_part( 'parts/off-canvas-menu' ); ?>

<section class="container" role="document">
	<?php do_action( 'foundationpress_after_header' ); ?>
