<?php
/**
 * Section: Button
 * ===============
 */
  $buttons = get_sub_field('buttons');
  
?>
<a class="button" href="<?php print esc_url( $buttons['url'] ); ?>" <?php if( $buttons['target'] ) : ?>target="<?php print esc_attr( $buttons['target'] ); ?>"<?php endif; ?>><?php print esc_html( $buttons['title'] ); ?></a>