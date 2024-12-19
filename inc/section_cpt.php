<?php
/**
 * Block: Custom Post Type
 * =============== 
 * 
 */

$cpt = get_sub_field('custom_posts');

if($cpt) : ?>

<div class="card__list">

    <?php foreach($cpt as $post) :

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post);

        ?>

        <article class="card">
            <?php if( $post->post_type == 'projects' ) {
                include get_template_directory() . '/inc/card-content-project.php'; 
            } else {
                include get_template_directory() . '/inc/card-content.php'; 
            } ?>
        </article>

    <?php endforeach; ?>

</div><!-- END post-list -->

<?php wp_reset_postdata();  endif; ?>