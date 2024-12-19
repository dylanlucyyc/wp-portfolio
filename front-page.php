<?php 

/**
 * Home Page
 * @source https://developer.wordpress.org/themes/functionality/custom-front-page-templates/#custom-site-front-page-template
 */
get_header(); 

//hero
$subtitle = get_field("sub_title");
$title = get_field("title");


//story
$heading = get_field("heading");
$description = get_field("description");

//connect 
$call_to_action = get_field("call_to_action");

//general information 
$resume = get_field("resume", "option");
$email = get_field("email", "option");




?>

<div class="spinner">
       <img src="<?php echo get_template_directory_uri() . '/assets/images/spinner.svg'; ?>" alt="Spinner">
</div>


<main class="main">    
       <section class="hero">
          <div class="macicons">
                    <span>🔴</span>
                    <span>🟡</span>
                    <span>🟢</span>
          </div>
          <h1 class="hero__subheading"><?php echo $subtitle; ?></h1>
          <p class="hero__heading"><?php echo $title; ?></p>
       </section>

       <section class="story section" id="story">
         <img class="story__profilepic" src="<?php echo get_template_directory_uri() . '/assets/images/profilepicture.png'; ?>" alt="Dylan's headshot" />
         <div class="story__content">
               <h2 class="heading"><?php echo $heading; ?></h2>
               <p class="story__description">
                     <?php echo $description; ?> 
               </p>
               <div class="story__links">
                  <a class="btn btn--cta" target="_blank" href="<?php echo $resume; ?>">Resume</a>
                  <?php include get_template_directory() . '/inc/icons.php'; ?>
               </div>
         </div>
       </section>

       <section class="story__clients section">
            <h2 class="heading">Websites Built for Real Clients</h2>
            <ul class="story__client-list">
               <li class="story__client">
                     <img src="<?php echo get_template_directory_uri() . '/assets/images/logo-1.png'; ?>" alt="Client Logo">
               </li>
               <li class="story__client">
                     <img src="<?php echo get_template_directory_uri() . '/assets/images/logo-2.png'; ?>" alt="Client Logo">
               </li>
               <li class="story__client">
                     <img src="<?php echo get_template_directory_uri() . '/assets/images/logo-3.png'; ?>" alt="Client Logo">
               </li>
               <li class="story__client">
                     <img src="<?php echo get_template_directory_uri() . '/assets/images/logo-4.png'; ?>" alt="Client Logo">
               </li>
               <li class="story__client">
                     <img src="<?php echo get_template_directory_uri() . '/assets/images/logo-5.png'; ?>" alt="Client Logo">
               </li>
            </ul>
       </section>

      <section class="works" id="works"> 
         <h2 class="heading section">Featured Projects</h2>
         <!-- <article class="work section">
            <div class="work__content">
               <p class="work__category">Web Developement</p>
               <h3 class="work__heading">Brand Christian School</h3>
               <p class="work__description">Based in Calgary, I am a dedicated Junior Web Developer specializing in creating dynamic, high-quality websites that convert browsers into buyers.</p>
               <button class="btn btn--cta btn--work">Read More</button>
            </div>
            <div class="work__thumbnail" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/BCS.png'; ?>');">
            </div>
         </article> -->
      </section>

      <section class="skills section" id="skills">
         <h2 class="heading">Skills</h2>
         <div class="skills__wrapper">
         <div class="skills__container">
            <h3 class="skills__heading">🔴 Web Development</h3>
            <ul class="skills__list">
               <li class="skills__item">
                  HTML
               </li>
               <li class="skills__item">
                  CSS
               </li>
               <li class="skills__item">
                  SCSS
               </li>
               <li class="skills__item">
                  Tailwind
               </li>
               <li class="skills__item">
                  Bootstrap
               </li>
               <li class="skills__item">
                  JavaScript
               </li>
               <li class="skills__item">
                  React
               </li>
               <li class="skills__item">
                  Python
               </li>
               <li class="skills__item">
                  Django
               </li>
               <li class="skills__item">
                  PHP
               </li>
               <li class="skills__item">
                  WordPress
               </li>
            </ul>
         </div>

         <div class="skills__container">
            <h3 class="skills__heading">🟡 Web Design</h3>
            <ul class="skills__list">
               <li class="skills__item">
                  Figma
               </li>
               <li class="skills__item">
                  Adobe XD
               </li>
               <li class="skills__item">
                  Adobe Photoshop
               </li>
               <li class="skills__item">
                  Adobe Illustrator
               </li>
            </ul>
         </div>

         <div class="skills__container">
            <h3 class="skills__heading">🟢 Others</h3>
            <ul class="skills__list">
               <li class="skills__item">
                  GitHub
               </li>
               <li class="skills__item">
                  Bitbucket
               </li>
               <li class="skills__item">
                  Visual Studio
               </li>
               <li class="skills__item">
                  Trello
               </li>
               <li class="skills__item">
                  ClickUp
               </li>
               <li class="skills__item">
                  Jira
               </li>
            </ul>
         </div>
         </div>
      </section>

      <section class="connect cta section" id="connect">
         <div class="macicons">
            <span>🔴</span>
            <span>🟡</span>
            <span>🟢</span>
         </div>
         <div class="connect__content">
            <p class="connect__heading"><?php echo $call_to_action; ?></p>
            <a class="btn btn--cta" target="_blank" href="<?php echo $resume; ?>">Resume</a>
         </div>      
         <div class="connect__links">
            <div class="connect__email">
               <p>Email:</p>
               <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
            </div>
            <div class="connect__other">
            <p>Others:</p>
            <?php include get_template_directory() . '/inc/icons.php'; ?>
            </div>
         </div>
      </section>


   <div class="overlay hidden"></div>
    <div class="display-window hidden">
      <button class="btn--close-modal">&times;</button>
      <div class="display-window__wrapper">
         <div class="display-window__main-content">
            <div class="macicons">
                     <span>🔴</span>
                     <span>🟡</span>
                     <span>🟢</span>
            </div>
            <p class="display-window__category">Web Developement</p>
            <h3 class="display-window__heading">Brand Christian School</h3>
            <p class="display-window__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
         </div>
        
          
          <div class="display-window__skill-list">
            <!-- <button class="btn btn--blue">Skill 1</button>
            <button class="btn btn--green">Skill 2</button>
            <button class="btn btn--orange">Skill 3</button>
            <button class="btn btn--purple">Skill 4</button>
            <button class="btn btn--neon">Skill 5</button> -->
          </div>

          <div class="display-window__image-list">
            <!-- <div class="display-window__image-item">
               <img class="" src="<?php echo get_template_directory_uri() . '/assets/images/Dylan-TM-Portfolio-images-0.jpg'; ?>" alt=""> 
            </div>   -->
          </div>
      </div>
    </div>

</main>

<?php include('footer.php'); ?>
