<?php $tel = of_get_option( 'contact_telephone' ); ?>
<?php $email = of_get_option( 'contact_email' ); ?>

<div class="show-for-large-up" data-equalizer>
    <nav class="header" data-topbar role="navigation">
        <section class="row collapse">
            <div class="columns medium-3 header--leftcol" data-equalizer-watch>
                <?php if("" != $tel && false != $tel): ?>
                    <span><strong>T: </strong><a href="tel:<?php echo $tel; ?>"><?php echo $tel; ?></a></span>
                <?php endif; ?>
            </div>
            <div class="name columns medium-6 text-center" data-equalizer-watch>
                <h1><a href="<?php echo home_url(); ?>" class="logo"><?php bloginfo( 'name' ); ?></a></h1>
            </div>
            <div class="columns medium-3 header--rightcol" data-equalizer-watch>
                <?php if("" != $email && false != $email): ?>
                    <span><strong>E: </strong><a href="mailto:<?php echo antispambot($email); ?>"><?php echo antispambot($email); ?></a></span>
                <?php endif; ?>
            </div>
        </section>
        <section class="row collapse">
           <?php get_template_part( 'parts/primary-nav' ); ?>
        </section>
    </nav>
</div>
