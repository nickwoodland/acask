<?php $thumbnail_id = get_post_thumbnail_id($post->ID); ?>
<?php if ( false != wp_get_attachment_image_src($thumbnail_id) ) : ?>
	<?php
    $args = array(				
    	'image' => $thumbnail_id,
    	'settings' => array(
            	
				array(
					'name' => 'small',
					'width' => 265,
					'height' => 199,
					'crop' => true,
					'resize' => true,
				),

				array(
					'name' => 'medium',
					'breakpoint' => 640,
					'width' => 300,
					'height' => 225,
					'crop' => true,
					'resize' => true,
				),
				
				array(
					'name' => 'large',
					'breakpoint' => 1025,
					'width' => 220,
					'height' => 165,
					'crop' => true,
					'resize' => true,
				),

			),
    );
    $ri = BC_Responsive_Images::get_instance(); 
    $image_data = $ri->image_data( $args );    
    ?>
        
    <?php foreach( $image_data['sized_imagery'] AS $break_name => $img_set ) : ?>    
    	<?php $sets[] = '['.$img_set['src'].', ('.$break_name.')]' ?>    
    <?php endforeach; ?>
    
    <img class="" data-interchange="<?php echo implode( ',', $sets ); ?>">
<?php endif; ?>