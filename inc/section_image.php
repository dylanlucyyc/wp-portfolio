<?php
/**
 * Section: Image
 * ===============
 */
$image = get_sub_field('image');
$link = get_sub_field('link');
  
?>
<div class="section-image">
    <?php if( $link ) : ?>
        <a href="<?= esc_url($link['url']); ?>" title="<?= esc_html($link['title']); ?>" target="<?= esc_attr($link['target']); ?>"><?= wp_get_attachment_image($image, 'full'); ?></a>
    <?php else : ?>
        <?= wp_get_attachment_image($image, 'full'); ?>
    <?php endif; ?>
</div>