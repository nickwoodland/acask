<?php $tel = of_get_option( 'contact_telephone' ); ?>
<?php $email = of_get_option( 'contact_email' ); ?>
</section>
<footer class="pad">
	<div class="row">
		<?php do_action( 'foundationpress_before_footer' ); ?>
			<nav class="columns medium-8">
			</nav>
			<section class="columns medium-4">


		        <?php if("" != $tel && false != $tel): ?>
		            <span><strong>T: </strong><a href="tel:<?php echo $tel; ?>"><?php echo $tel; ?></a></span>
		        <?php endif; ?>
		        <?php if("" != $email && false != $email): ?>
		            <span><strong>E: </strong><a href="mailto:<?php echo antispambot($email); ?>"><?php echo antispambot($email); ?></a></span>
		        <?php endif; ?>
	        </section>
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
