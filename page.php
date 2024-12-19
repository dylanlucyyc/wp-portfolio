<?php
get_header(); 

$title = get_field('title');
$image = get_field('image');
?>

<?php
// Check if the image field exists and contains data
if ($image) {
          // If the image is an array (e.g., if you chose to return an array), extract the URL
          $image_url = is_array($image) ? $image['url'] : $image;
      }
      ?>
      <section class="flexible-hero">
          <?php if ($image) : ?>
              <style>
                  .flexible-hero::before {
                      content: "";
                      position: absolute;
                      top: 0;
                      left: 0;
                      width: 100%;
                      height: 100%;
                      background-image: url('<?php echo esc_url($image_url); ?>');
                      background-size: cover;
                      background-repeat: no-repeat;
                      background-position: center;
                      filter: grayscale(100%) blur(2px);
                  }
              </style>
          <?php endif; ?>
</section>

<section class="flexible-sections">
                <?php get_template_part('inc/sections'); ?>
</section>

<?php include('footer.php'); ?>
