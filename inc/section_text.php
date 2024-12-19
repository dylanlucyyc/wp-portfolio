<?php
/**
 * Section: Text 
 * ===============
 */
$text = get_sub_field('text');

// Dynamically generate an anchor ID based on the block's heading 
$blockID = preg_match_all('#<(h2|h3|h4)>(.*?)</\1>#', $text, $matches);
$blockID = implode ( ' - ', array_slice($matches[0], 0, 1));
$blockID = strip_tags($blockID); 
?>

<div class="section-text">
    <?= $text; ?>
</div>