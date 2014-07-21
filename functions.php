<?php
/**
 * Organizes and loads necessary files/functions.
 *
 * @package Charlene\Functions
 * @author jeremyjaymes
 * @since Charlene 2.0
 */
 


/**
 * Set up the content width value.
 *
 *
 * @since Charlene 2.0
 */
if ( ! isset( $content_width ) ) {
    $content_width = 624;
}


add_action( 'after_setup_theme', 'charlene_setup_theme' );
/**
 * Charlene Theme Setup
 *
 * Setup and register all WordPress functions.
 * @since Charlene 2.0
 */

if ( ! function_exists( 'charlene_setup_theme' ) ) :

function charlene_setup_theme() {

    // language support
    load_theme_textdomain( 'charlene', get_template_directory() . '/lib/languages' );

    // remove version from head and css/js output
    add_action( 'init', 'charlene_cleanup' );

    // remove version from feeds
    add_filter( 'the_generator', 'charlene_remove_feed_version' );

    // load editor styles
    add_action( 'init', 'charlene_editor_styles' );

    // Add feed links
    add_theme_support( 'automatic-feed-links' );

    // Post thumbnails
    add_theme_support( 'post-thumbnails' );
    
    // Set Standard Thumbnail Size
    set_post_thumbnail_size( 150, 150, true );

    // Add custom thumbnail size
    add_image_size( 'post-full-width', 825, 412, true );

    /*
     * Switch default core markup to valid html5, see list of elements
     * See http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
     */
    add_theme_support( 'html5', array(
      'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
     * Enable Post Formats
     * See http://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
      'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
    ) );

    // Custom background
    add_theme_support( 'custom-background', apply_filters( 'charlene_custom_background_args', array(
        'default-color' => 'ffffff',
    ) ) );

    // enqueue base scripts and styles
    add_action( 'wp_enqueue_scripts', 'charlene_scripts_and_styles', 999 );

}

endif; /*-- end theme set up --*/

/**
 * Clean up version numbers
 *
 * This function prevents snooping but it is not the pathway
 * to a secure site. Updates should always be maintained.
 *
 * @since Charlene 2.0
 */
function charlene_cleanup() {
  remove_action('wp_head', 'wp_generator');

  add_filter( 'style_loader_src', 'charlene_remove_css_js_ver', 9999, 2 );
  add_filter( 'script_loader_src', 'charlene_remove_css_js_ver', 9999, 2 );

}

/**
 * Remove version number from RSS feed
 */
function charlene_remove_feed_version() {
  return '';
}

/**
 * Remove version number from js and css
 */
function charlene_remove_css_js_ver( $src ) {
    if( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

/**
 * Register widgets and widget areas
 *
 * @since Charlene 2.0
 */
function charlene_widgets_init() {

    require get_template_directory() . '/lib/widgets/recent-posts.php';
    register_widget( 'Charlene_Widget_Recent' );

    register_sidebar(array(
       'name' => 'Site Intro',
       'id' => 'site-intro',
       'description' => __('Site Intro', 'charlene'),
       'before_widget' => '<section id="%1$s" class="site-intro widget %2$s">',
       'after_widget' => '</section>',
       'before_title' => '<h1 class="intro-title">',
       'after_title' => '</h1>',
    ));

    register_sidebar(array(
       'name' => 'Sidebar Main',
       'id' => 'sidebar-main',
       'description' => __('The main widget area. If the sidebar is split left and right this is the left area.', 'charlene'),
       'before_widget' => '<aside id="%1$s" class="widget %2$s">',
       'after_widget' => '</aside>',
       'before_title' => '<h4 class="widgettitle">',
       'after_title' => '</h4>',
    ));
   
    //Below post widget ready area.
    register_sidebar(array(
       'name' => 'After Post',
       'id'   => 'after-post',
       'description' => __('A useful widget area which appears after the post single and before comments.', 'charlene'),
       'before_widget' => '<div id="%1$s" class="widget %2$s">',
       'after_widget' => '</div>',
       'before_title' => '<h4 class="widgettitle">',
       'after_title' => '</h4>',
    ));

}
add_action( 'widgets_init', 'charlene_widgets_init' );


/**
 * Register require scripts
 * @since Charlene 2.0
 */
function charlene_scripts_and_styles() {

    if (!is_admin()) {

        // register main stylesheet
        wp_register_style( 'charlene-stylesheet', get_stylesheet_uri(), array(), '', 'all' );


        // comment reply script for threaded comments
        if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
              wp_enqueue_script( 'comment-reply' );
        }

        // enqueue everything
        wp_enqueue_style( 'charlene-stylesheet' );

    }

}

function charlene_editor_styles() {
    $font_url = 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic';
    // Add theme editor style
    add_editor_style( array( 'lib/admin/editor-style.css', str_replace( ',', '%2C', $font_url ) ) );
}

/**
 * Registers and loads fonts
 * @since Charlene 2.0
 */
function charlene_load_fonts() {

  wp_register_style('googleFonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic');
  wp_enqueue_style( 'googleFonts');
  
}
add_action('wp_print_styles', 'charlene_load_fonts');

//* Theme Customizer
require get_template_directory() . '/lib/functions/theme-customizer.php';

//* Global template functions
require get_template_directory() . '/lib/functions/template-functions.php';

//* Custom comment callback
require get_template_directory() . '/lib/functions/theme-comments.php';

//* Theme shortcodes
require get_template_directory() . '/lib/functions/shortcodes.php';
