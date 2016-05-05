<?php
/**
 * SITE -> Custom Meta for offers
 */
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_offers_metaboxes( array $meta_boxes ) {

	$prefix = '_offers_';
	$offers_page_id = get_page_by_title( 'Special Offers' )->ID;


    $meta_boxes[] = array(
		'id' => $prefix.'product_blocks',
		'title' => 'Repeatable Product Block',
		'pages' => array( 'page' ),
		'show_on' => array( 'id' => array( $offers_page_id) ),
		'context' => 'normal',
		'priority' => 'default',
		'show_names' => true,
		'fields' => array(

			array(
				'id'   			=> $prefix . 'products_group',
				'name'			=>  "Product Select",
				'type' 			=> 'group',
				'repeatable'    => true,
				'fields' 	=> array(

					array(
						'name' => 'Select Product',
						'id'   => $prefix . 'product_select',
						'type' => 'post_select',
						'query'	=> array(
							'post_type'	=> array( 'product' ),
							'posts_per_page' => -1,
						)
					)
				)


			),

		),
	);

	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'cmb_offers_metaboxes' );
