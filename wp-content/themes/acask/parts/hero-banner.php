<?php 
    $args = array(
        'image' => $hero_img,
        'settings' => array(
            
                array(
                    'name' => 'small',
                    'width' => 820,
                    'height' => 185,
                    'crop' => true,
                    'resize' => true,
                ),

                array(
                    'name' => 'medium',
                    'breakpoint' => 820,
                    'width' => 1024,
                    'height' => 230,
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

            'ie_fallback' => 'large',
        );
?>


<?php $ri = BC_Responsive_Images::get_instance(); ?>
<?php $image_sized_array = $ri->get_sized_srcs( $args ); ?>

<?php $bg_image_interchange = ""; ?>

<?php foreach($image_sized_array as $breakpoint => $value ) : ?>
    <?php $bg_image_interchange.= '['.$value['src'].', ('.strtolower($breakpoint).')], '; ?>
<?php endforeach; ?>

<header role="banner">
    <div class="hero-banner">
        <img data-interchange="<?php echo $bg_image_interchange;?>" class="hero-slider--img hero-slider--img__general"/>
    
        <?php if( $content && $content != '' ): ?>
            <div class="hero-cta">
                <?php echo apply_filters('the_content', $content); ?>
            </div>
        <?php endif; ?>
    </div>
</header>

<?php if($strapline): ?>
    <div class="strapline text-center pad--half">
        <div class="row">
            <?php echo $strapline; ?>
        </div>
    </div>
<?php endif; ?>
