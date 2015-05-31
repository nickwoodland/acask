<div class="orbitwrapper">
	<div class="slider-container letterbox-slider double-landmark show-for-medium-up">

		<ul 
			id="#orbitslider"
			data-orbit
			data-options="
			animation:slide;
			pause_on_hover:true;
			timer_speed: 8000;
			animation_speed:600;
			slide_number: false;
			timer: true;
			bullets: false;
			resume_on_mouseout: true;
			variable_height: true;
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
									'width' => 820,
									'height' => 246,
									'crop' => true,
									'resize' => true,
								),
				
								array(
									'name' => 'medium',
									'breakpoint' => 820,
									'width' => 1024,
									'height' => 307,
									'crop' => true,
									'resize' => true,
								),
								
								array(
									'name' => 'large',
									'breakpoint' => 1025,
									'width' => 2000,
									'height' => 450,
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
</div>