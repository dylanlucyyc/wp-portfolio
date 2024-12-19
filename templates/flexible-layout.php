<?php
/**
 * Template Name: Flexible Template
*/
get_header(); 
?>

<?php
if( have_rows('flexible_sections') ) : ?>

<div class="flexible-layout__container">

    <?php while( have_rows('flexible_sections') ) : the_row(); 
        $cols = count(get_sub_field('columns'));
        $layout = get_sub_field('layout');
        ?>
        <section class="flexible-layout flexible-layout--<?php print $cols; ?> <?php if (($cols == 2) && ($layout !== "default")) { echo "flexible-layout--" . $layout; } 
?>">
                <?php if( have_rows('columns') ) : ?>
                    <?php while( have_rows('columns') ) : the_row(); ?>
                        <div class="flexbile-layout__column">
                            <?php get_template_part('inc/sections'); ?>
                        </div>     
                    <?php endwhile; ?>
                <?php endif; ?>
        </section>

        <?php endwhile; ?>

</div><!-- END flexible-layout-container -->

<?php
    $cta_text = get_field('cta_text');
    $cta_button = get_field('cta_button');
    $background_image = get_field('background_image');

?>
<section class="cta flexible-layout flexible-layout__container">
                    <div class="cta__background"></div>
                    <div class="cta__overlay"></div>
                    <style>
                        .cta__background {
                            background-image: url('<?php echo esc_url($background_image); ?>');
                            background-size: cover;
                            background-position: center;
                            background-repeat: no-repeat;
                        }
                    </style>
                    <h2 class="cta__text"><?php echo $cta_text; ?></h2>
                    <a class="button cta__button" href="<?php echo $cta_button['url'];?>"><?php echo $cta_button['title']; ?></a>
</section>

<?php endif; ?>

<?php get_footer(); ?>