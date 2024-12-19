<?php
          $linkedin = get_field("linkedin", "option");
          $github = get_field("github", "option");
          $instagram = get_field("instagram", "option");
?>

<ul class="icon__links">
                        <a href="<?php echo $github; ?>" class="icon__link" target="_blank">
                              <?php echo file_get_contents(get_template_directory() . '/assets/images/github.svg'); ?>
                        </a>
                        <a href="<?php echo $instagram; ?>" class="icon__link" target="_blank">
                              <?php echo file_get_contents(get_template_directory() . '/assets/images/instagram.svg'); ?>
                        </a>
                        <a href="<?php echo $linkedin; ?>" class="icon__link" target="_blank">
                              <?php echo file_get_contents(get_template_directory() . '/assets/images/linkedin.svg'); ?>
                        </a>
</ul>