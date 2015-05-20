<?php $thumbnail_id = get_post_thumbnail_id($post->ID); ?>
<?php $gallery_ids = $product->get_gallery_attachment_ids(); ?>

<?php if(!empty($gallery_ids) || false != $gallery_ids): ?>
	<?php $slide_ids = $gallery_ids; ?>
	<?php array_unshift( $slide_ids, $thumbnail_id); ?>
	<div class="product-slider__wrapper landmark">
		<ul 
			data-orbit
			data-options="
			animation:slide;
			pause_on_hover:true;
			timer_speed: 8000;
			animation_speed:750;
			slide_number: false;
			bullets: false;
			resume_on_mouseout: true;
			">

	        

	        <?php foreach ($slide_ids as $slide_id) : ?>

	                <?php
				    $args = array(				
				    	'image' => $slide_id,
				    	'settings' => array(
				            	
							array(
								'name' => 'small',
								'width' => 577,
								'height' => 433,
								'crop' => true,
								'resize' => true,
							),

							array(
								'name' => 'medium',
								'breakpoint' => 640,
								'width' => 370,
								'height' => 278,
								'crop' => true,
								'resize' => true,
							),
							
							array(
								'name' => 'large',
								'breakpoint' => 1025,
								'width' => 375,
								'height' => 281,
								'crop' => true,
								'resize' => true,
							),
						)
				    );
				    $ri = BC_Responsive_Images::get_instance(); 
				    $image_data = $ri->image_data( $args );    
				    ?>

				    <?php foreach( $image_data['sized_imagery'] AS $break_name => $img_set ) : ?>    
				    	<?php $sets[] = '['.$img_set['src'].', ('.$break_name.')]'; ?>    
				    <?php endforeach; ?>
				    
	                <li data-orbit-slide="<?php echo $slide_id; ?>" class="slider__slide">
	                	<img src="<?php echo $slide->image_src[0]; ?>" data-interchange="<?php echo implode( ',', $sets ); ?>">	   
	                </li>

	        <?php endforeach; ?> 
	     </ul>
	 </div>
     <ul class="small-block-grid-3">
        <?php foreach ($slide_ids as $slide_id) : ?>

                <?php
			    $args = array(				
			    	'image' => $slide_id,
			    	'settings' => array(
			            	
							array(
								'name' => 'small',
								'width' => 265,
								'height' => 199,
								'crop' => true,
								'resize' => true,
							),
			
						),
			    );
			    $ri = BC_Responsive_Images::get_instance(); 
			    $image_data = $ri->image_data( $args );    
			    ?>

			    <?php foreach( $image_data['sized_imagery'] AS $break_name => $img_set ) : ?>    
			    	<?php $sets[] = '['.$img_set['src'].', ('.$break_name.')]'; ?>    
			    <?php endforeach; ?>
			    
                <li>
                	<a data-orbit-link="<?php echo $slide_id; ?>">
                		<img src="<?php echo $slide->image_src[0]; ?>" data-interchange="<?php echo implode( ',', $sets ); ?>">
                	</a>	   
                </li>

        <?php endforeach; ?> 
   	</ul>

<?php elseif ( false != wp_get_attachment_image_src($thumbnail_id)) : ?>
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
					'width' => 375,
					'height' => 281,
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