<?php if( false != $block['_front_page_image'] ) : ?>
	<div class="cta-block landmark">
		<a href="<?php echo $block['_front_page_hyperlink']; ?>">
			<?php if ( false != wp_get_attachment_image_src( $block['_front_page_image'] ) ) : ?>
				<?php
			    $args = array(				
			    	'image' => $block['_front_page_image'],
			    	'settings' => array(
			            	
							array(
								'name' => 'small',
								'width' => 300,
								'height' => 225,
								'crop' => true,
								'resize' => true,
							),
			
							array(
								'name' => 'medium',
								'breakpoint' => 640,
								'width' => 218,
								'height' => 164,
								'crop' => true,
								'resize' => true,
							),
							
							array(
								'name' => 'large',
								'breakpoint' => 1025,
								'width' => 234,
								'height' => 176,
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
			<?php if(false != $block['_front_page_text']): ?>
				<div class="cta-block__text pad--half">
					
					<?php echo $block['_front_page_text']; ?>
					
				</div>
			<?php endif; ?>
		</a>
	</div>
<?php endif; ?>