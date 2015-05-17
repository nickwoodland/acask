<?php
/**
 * Custom-Metaboxes-and-Fields-for-WordPress
 *
 * @link https://github.com/humanmade/Custom-Meta-Boxes
 */	
function ac_initialize_cmb_meta_boxes() {
	if ( !function_exists( 'cmb_init' ) ) {
		require( get_template_directory() . 'libs/Custom-Meta-Boxes/custom-meta-boxes.php');
	}
}
add_action( 'init', 'ac_initialize_cmb_meta_boxes', 1 );

/**
 * Custom Theme Options
 */
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/libs/options-framework/' );
	require_once get_template_directory() . '/libs/options-framework/options-framework.php';
}


?>