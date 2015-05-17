<div class="slider-container letterbox-slider double-landmark show-for-medium-up">

	<ul 
		data-orbit
		data-options="
		animation:fade;
		pause_on_hover:true;
		timer_speed: 4000;
		animation_speed:750;
		slide_number: false;
		timer: true;
		bullets: false;
		resume_on_mouseout: true;
		">

        <?php $slides = $slides_obj ?>

        <?php foreach ($slides_obj as $slide) : ?>
        
            <?php if( false != $slide->image ) : ?>

                <?php
			    $args = array(				
			    	'image' => $slide->image,
			    	'settings' => array(
			            	
							array(
								'name' => 'small',
								'width' => 640,
								'height' => 213,
								'crop' => true,
								'resize' => true,
							),
			
							array(
								'name' => 'medium',
								'breakpoint' => 640,
								'width' => 1024,
								'height' => 341,
								'crop' => true,
								'resize' => true,
							),
							
							array(
								'name' => 'large',
								'breakpoint' => 1025,
								'width' => 2000,
								'height' => 600,
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
			    
                <li class="slider__slide">
                	<img src="<?php echo $slide->image_src[0]; ?>" data-interchange="<?php echo implode( ',', $sets ); ?>">
					<?php if(false != $slide->content && "" != $slide->content): ?>
						<div class="hero-cta">
                        	<?php echo $slide->content; ?>
						</div>
                    <?php endif; ?>			
                    
                </li>

            <?php endif; ?>
        <?php endforeach; ?> 
    </ul>

</div>