<?php
/**
 * SITE -> Custom Meta Gobal fields
 */	
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_banner_metaboxes( array $meta_boxes ) {
	
	$prefix = '_banner_';
	$front_page_id = get_page_by_title( 'Front Page' )->ID;	
	
    $meta_boxes[] = array(
		'id' => $prefix.'meta',
		'title' => 'Banner',
		'hide_on' => array('id' => array($front_page_id)),
		'pages' => array( 'page', 'product' ),
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true,
		'fields' => array(
		
            array(
				'name' 	=> 'Banner Image',
				'id'	=> $prefix.'image',
				'type'	=> 'image',
				'cols' 	=> 12,
            ),
            
			
			array(
                'name' 		=> 'Banner Text',
                'id' 		=> $prefix.'banner_text',
                'type' 		=> 'text',
                'cols' 		=> 12,
            ),

            array(
                'name' 		=> 'Strapline Text',
                'id' 		=> $prefix.'strapline_text',
                'type' 		=> 'text',
                'cols' 		=> 12,
            ),
            	
		),
	);	
	
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'cmb_banner_metaboxes' );