<?php $tel = of_get_option( 'contact_telephone' ); ?>
<?php $email = of_get_option( 'contact_email' ); ?>
</section>
<footer class="pad">
	<div class="row">
		<?php do_action( 'foundationpress_before_footer' ); ?>
				<?php if(of_get_option( 'contact_address_street_address_1' ) || of_get_option( 'contact_address_street_address_2' )) : ?>
					<span class="address__line" itemprop="streetAddress">
						
						<?php if(of_get_option( 'contact_address_street_address_1' )) : ?>
						<span class="address__subrow">
							<?php echo of_get_option( 'contact_address_street_address_1' ); ?>
						</span>
						<?php endif; ?>
						
						<?php if(of_get_option( 'contact_address_street_address_2' )) : ?>
						<span class="address__subrow">
							<?php echo of_get_option( 'contact_address_street_address_2' ); ?>
						</span>
						<?php endif; ?>
						
					</span>
				<?php endif; ?>
					
				<?php if(of_get_option( 'contact_address_locality' )) : ?>
					<span itemprop="addressLocality"><?php echo of_get_option( 'contact_address_locality' ); ?></span>
				<?php endif; ?>
				
				<?php if(of_get_option( 'contact_address_region' )) : ?>
					<span itemprop="addressRegion"><?php echo of_get_option( 'contact_address_region' ); ?></span>
				<?php endif; ?>
				
				<?php if(of_get_option( 'contact_address_post_code' )) : ?>
					<span itemprop="postalCode"><?php echo of_get_option( 'contact_address_post_code' ); ?></span>
				<?php endif; ?>
				<?php if("" != $email && false != $email): ?>
		            <span><strong>E: </strong><a href="mailto:<?php echo antispambot($email); ?>"><?php echo antispambot($email); ?></a></span>
		        <?php endif; ?>
					
		        <?php if("" != $tel && false != $tel): ?>
		            <span><strong>T: </strong><a href="tel:<?php echo $tel; ?>"><?php echo $tel; ?></a></span>
		        <?php endif; ?>
		<?php do_action( 'foundationpress_after_footer' ); ?>
	</div>
</footer>
<a class="exit-off-canvas"></a>

	<?php do_action( 'foundationpress_layout_end' ); ?>
	</div>
</div>
<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>
</body>
</html>
