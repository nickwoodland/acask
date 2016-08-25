<?php
/**
 * SITE -> Custom Meta for Home Page
 */	
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_front_page_metaboxes( array $meta_boxes ) {
	
	$prefix = '_front_page_';
	$front_page_id = get_page_by_title( 'Front Page' )->ID;	
	
    $meta_boxes[] = array(
		'id' => $prefix.'content_blocks',
		'title' => 'Repeatable Content Blocks',
		'pages' => array( 'page' ),
		'show_on' => array( 'id' => array( $front_page_id) ),
		'context' => 'normal',
		'priority' => 'default',
		'show_names' => true,
		'fields' => array(
			
			array( 
				'id'   			=> 'content_blocks',  
				'type' 			=> 'group',
				'repeatable' 	=> true,
				'fields' 		=> array(
					
		            array(
						'name' 	=> 'Image',
						'id'	=> $prefix.'image',
						'type'	=> 'image',
						'cols' 	=> 6,
		            ),
		            
		            array(
						'name' 	=> 'Hyperlink',
						'id'	=> $prefix.'hyperlink',
						'type'    => 'text_url', 
						'cols' 	=> 6,
		            ),		
					
					array(
		                'name' 		=> 'Text',
		                'id' 		=> $prefix.'text',
		                'type' 		=> 'text',
		                'cols' 		=> 12,
		            ),
		            	
				),
			),
			
		),
	);	
	
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'cmb_front_page_metaboxes' );