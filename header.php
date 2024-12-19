<!DOCTYPE html>

<!-- =============================================== -->
<!-- Website by Dylan Luc - https://dylanluc.ca/ -->
<!-- =============================================== -->

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Import Fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  
  <?php wp_head(); ?>
  
</head>
<body id="container" <?php body_class('typography'); ?>>

<header>
  <div class="header hidden">
    <?php get_template_part('inc/navigation'); ?>
  </div>
</header>
