<?php $image = get_post_thumbnail_id( $post->ID ); ?>
    <?php if ( false != wp_get_attachment_image_src( $image ) ) : ?>
    <a href="<?php the_permalink() ?>">
    	<?php
        $args = array(				
        	'image' => $image,
        	'settings' => array(
                	
    				array(
    					'name' => 'default',
    					'width' => 1550,
    					'height' => 530,
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
        
        <img data-interchange="<?php echo implode( ',', $sets ); ?>">   
    </a>
<?php endif; ?>