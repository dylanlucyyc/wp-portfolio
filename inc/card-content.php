<?php if ( has_post_thumbnail($post->ID) ) : ?>
    <div class="card__image">
        <a href="<?php the_permalink($post->ID); ?>">
            <?php the_post_thumbnail('large'); ?>
        </a>              
    </div>
<?php endif; ?>
<div class="card__body">
    <h4 class="card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <div class="card__categories">
        <?php $categories = get_the_category($post->ID);
        foreach( $categories as $category ) : ?>
            <a class="card__category" href="<?php "". print home_url() . "/category/" . $category->slug . "/" ?>"><?php print $category->cat_name; ?></a>
        <?php endforeach; ?>
    </div>
    <p class="card__excerpt">
        <?php if( has_excerpt($post->ID) ) :
            print get_the_excerpt($post->ID);
        endif; ?>
    </p>
    <a href="<?php the_permalink(); ?>" class="">Read More</a>
</div>