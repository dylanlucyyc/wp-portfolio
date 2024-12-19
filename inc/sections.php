<?php
/**
 * Sections
 * ====================
 * The sections() function can be found in functions.php
 */
  

while ( sections() ) : the_row(); ?>

    <div class="block-wrapper">

        <?php if( get_row_layout() == 'text' ) : get_template_part('inc/section_text');

        elseif( get_row_layout() == 'image' ) : get_template_part('inc/section_image');

        elseif( get_row_layout() == 'button' ) : get_template_part('inc/section_button');

        elseif( get_row_layout() == 'embedded' ) : get_template_part('inc/section_embed');

        elseif( get_row_layout() == 'cpt' ) : get_template_part('inc/section_cpt');

        endif; ?>

    </div>
    
 <?php endwhile; ?>

