<?php 
/**
 * Ideally, only include actions that affect the theme, not actions that would
 * influence the database (i.e. registering a custom post type). Those actions
 * should take place in a site-specific plugin so that content is not destroyed
 * when the theme is changed.
 */
 
/**
* * ===============================
* * Required Theme Functions
* * ===============================
*/

/**
 * Enqueue styles and JavaScript
 */ 
function scripts() {

  $ver = 1; //Change this to update the cache

  wp_register_style('style', get_template_directory_uri() . '/assets/dist/styles/main.css', [], $ver, 'all');
  wp_enqueue_style('style');

  wp_enqueue_script('jquery');

  wp_register_script('js', get_template_directory_uri() . '/assets/dist/scripts/main.js', ['jquery'], $ver, true);
  wp_enqueue_script('js');

  // wp_register_style('sal', get_template_directory_uri() . '/node_modules/sal.js/dist/sal.css', [], 1, 'all');
  // wp_enqueue_style('sal');

  //wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/src/scripts/main.js', array('jquery'), null, true);
  // Pass AJAX URL and other data to the script
  wp_localize_script('js', 'myAjax', array(
      'ajaxUrl' => admin_url('admin-ajax.php')
  ));


}
add_action('wp_enqueue_scripts', 'scripts');

function my_image_size_override() {
    return array( 825, 510 );
}

/**
 * Theme support
 */ 
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);
add_theme_support('custom-logo');
add_post_type_support( 'page', 'excerpt' );

/**
 * Remove the "type" attribute from javascript/stylesheet resources
 * @source https://wordpress.stackexchange.com/questions/287830/remove-type-attribute-from-script-and-style-tags-added-by-wordpress
 */
add_action(
  'after_setup_theme',
  function() {
      add_theme_support( 'html5', [ 'script', 'style' ] );
  }
);

/**
 * Title tag suport
 */
function theme_slug_setup() {
  add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );

function theme_document_title_separator( $sep ) {
  return "|";
}
add_filter( 'document_title_separator', 'theme_document_title_separator', 10, 1 );

/**
 * Register Menus 
 */ 
register_nav_menus(
  array(
    'main-menu' => __('Main Menu', 'theme'),
    'mobile-menu' => __('Mobile Menu', 'theme'),
    'footer-menu' => __('Footer Menu', 'theme'),
  )
);

/**
* * ===============================
* * Optional Theme Functions
* * ===============================
*/

/**
 * Remove comments functionality from WordPress
 */
// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );


/**
* * ===============================
* * Speed Optimizations
* * ===============================
*/

/**
 * Remove jquery migrate if not in backend
 */
function dequeue_jquery_migrate( $scripts ) {
  if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
    $scripts->registered['jquery']->deps = array_diff(
      $scripts->registered['jquery']->deps,
      [ 'jquery-migrate' ]
    );
  }
}
add_action( 'wp_default_scripts', 'dequeue_jquery_migrate' );

/**
 * Disable the emoji's
 * @source https://kinsta.com/knowledgebase/disable-emojis-wordpress/#disable-emojis-code
 */
function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
  add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
 }
 add_action( 'init', 'disable_emojis' );

/**
* Filter function used to remove the tinymce emoji plugin.
* 
* @param array $plugins 
* @return array Difference betwen the two arrays
*/
function disable_emojis_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

/**
* Remove emoji CDN hostname from DNS prefetching hints.
*
* @param array $urls URLs to print for resource hints.
* @param string $relation_type The relation type the URLs are printed for.
* @return array Difference betwen the two arrays.
*/
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
  if ( 'dns-prefetch' == $relation_type ) {
  /** This filter is documented in wp-includes/formatting.php */
  $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
  
  $urls = array_diff( $urls, array( $emoji_svg_url ) );
  }
  
  return $urls;
  }

  /* Increase the amount of time it takes for Dropbox to timeout before giving an error */
function __extend_http_request_timeout( $timeout ) {
  return 60;
}
add_filter( 'http_request_timeout', '__extend_http_request_timeout' );

/**
 * Remove WordPress unused styles. 
 * Add any other styles below where the string for wp_dequeue_style 
 * is the id of the stylesheet you want to disable
 */
function remove_unused_styles(){
  wp_dequeue_style( 'classic-theme-styles' );
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
  wp_dequeue_style( 'wc-block-style' ); // REMOVE WOOCOMMERCE BLOCK CSS
  wp_dequeue_style( 'global-styles' ); // REMOVE  GUTENBERG STYLE IN HEADER
}
add_action( 'wp_enqueue_scripts', 'remove_unused_styles', 999 );



/**
* * ===============================
* * Utility Functions
* * ===============================
*/

/**
 * Remove everything from a string except the tags specified below
 */
function cleanText($text) {
  $text = strip_tags($text, '<em>, <br>, <u>, <span>, <strong>, <sup>');

  return $text;
}

/**
 * Slugify
 */
function slugify($text, string $divider = '-') {
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}


//Remove default editor in Pages
add_action('init', 'my_remove_editor_from_post_type');
function my_remove_editor_from_post_type() {
    remove_post_type_support( 'page', 'editor' );
}


 /**
 * Check if on archive page, if so, add the page_for_posts option
 */
function sections() {
  if( is_home() || is_archive() || is_search() ) { 
    return have_rows('sections', get_option('page_for_posts'));
  } else {
    return have_rows('sections');
  }
}