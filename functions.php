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

    // load editor styles
    add_action( 'init', 'charlene_editor_styles' );

    // Add feed links
    add_theme_support( 'automatic-feed-links' );

    // Title tag support
    add_theme_support( 'title-tag' );

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
      'search-form', 'comment-form', 'gallery', 'caption'
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
 * Register widgets and widget areas
 *
 * @since Charlene 2.0
 */
function charlene_widgets_init() {

    require get_template_directory() . '/lib/widgets/recent-posts.php';
    register_widget( 'Charlene_Widget_Recent' );

    register_sidebar(array(
       'name' => __( 'Site Intro', 'charlene' ),
       'id' => 'site-intro',
       'description' => __('Site Intro', 'charlene'),
       'before_widget' => '<section id="%1$s" class="site-intro widget %2$s">',
       'after_widget' => '</section>',
       'before_title' => '<h1 class="intro-title">',
       'after_title' => '</h1>',
    ));

    register_sidebar(array(
       'name' => __( 'Sidebar Main', 'charlene' ),
       'id' => 'sidebar-main',
       'description' => __('The main widget area. If the sidebar is split left and right this is the left area.', 'charlene'),
       'before_widget' => '<section id="%1$s" class="widget %2$s">',
       'after_widget' => '</section>',
       'before_title' => '<h4 class="widgettitle">',
       'after_title' => '</h4>',
    ));
   
    //Below post widget ready area.
    register_sidebar(array(
       'name' => __( 'After Post', 'charlene' ),
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
 * Register fonts url
 * 
 * @since 2.0.3
 * @param string $fonts_url
 * @return string
 */
function charlene_fonts_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Source Sans Pro, translate this to 'off'. Do not translate
    * into your own language.
    */
    $source = _x( 'on', 'Source Sans Pro font: on or off', 'charlene' );
 
 
    if ( 'off' !== $source ) {

      $font_family = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';
 
      $query_args = array(
          'family' => urlencode( $font_family ),
          'subset' => urlencode( 'latin,latin-ext,vietnamese' ),
      );
 
      $fonts_url = esc_url( add_query_arg( $query_args, '//fonts.googleapis.com/css' ) );
    }
 
    return $fonts_url;
}


/**
 * Register require scripts
 * @since Charlene 2.0
 */
function charlene_scripts_and_styles() {

    if (!is_admin()) {

        // main stylesheet
        wp_enqueue_style( 'charlene-stylesheet', get_stylesheet_uri(), array(), '', 'all' );

        // fonts
        wp_enqueue_style( 'googleFonts', charlene_fonts_url(), array(), '', 'all' );

        // IE condition style
        wp_enqueue_style( 'charlene-ie-stylesheet', get_stylesheet_directory_uri() . '/lib/css/ie.css', array(), '', '' );
        wp_style_add_data( 'charlene-ie-stylesheet', 'conditional', 'lt IE 9' );

        // theme js
        wp_enqueue_script( 'charlene-theme-functions', get_stylesheet_directory_uri() . '/lib/js/theme-functions.js', array('jquery'), '', true );


        // comment reply script for threaded comments
        if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
              wp_enqueue_script( 'comment-reply' );
        }

    }

}

/**
 * Add editor style
 *
 * @since Charlene 2.0
 */
function charlene_editor_styles() {
    $font_url = '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic';
    // Add theme editor style
    add_editor_style( array( 'lib/admin/editor-style.css', charlene_fonts_url() ) );
}

//* Theme Customizer
require get_template_directory() . '/lib/functions/theme-customizer.php';

//* Global template functions
require get_template_directory() . '/lib/functions/template-functions.php';

//* Custom comment callback
require get_template_directory() . '/lib/functions/theme-comments.php';
