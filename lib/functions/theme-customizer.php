<?php
/**
 * Theme customization support
 *
 * @package Charlene\Functions
 * @since Charlene 2.0
 */

class Charlene_Theme_Customize {
     /**
     * Implement Theme Customizer additions and adjustments.
     *
     * @since Charlene 2.0
     *
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     */
    public static function register( $wp_customize ) {
        // Add postMessage support for site title and description.
        $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
        $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
        $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

        $wp_customize->add_setting('link_color', array(
            'default'           => '80949c',
            'sanitize_callback' => 'sanitize_hex_color',
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'transport'         => 'postMessage'
        ));

        $wp_customize->add_setting('link_hover_color', array(
            'default'           => '0f3647',
            'sanitize_callback' => 'sanitize_hex_color',
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'transport'         => 'refresh'
        ));
         
        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'charlene_link_color', array(
            'label'    => __('Link Color', 'charlene'),
            'section'  => 'colors',
            'settings' => 'link_color',
            'priority' => '10',
            )
        ));

        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'charlene_link_hover_color', array(
            'label'    => __('Link Hover Color', 'charlene'),
            'section'  => 'colors',
            'settings' => 'link_hover_color',
            'priority' => '10',
            )
        ));


    }

    /**
    * Output custom CSS via hook
    * 
    * Used by hook: 'wp_head'
    * 
    * @see add_action('wp_head',$func)
    * @since Charlene 2.0
    */
   public static function header_output() {
      ?>
      <!--Customizer CSS--> 
      <style type="text/css">
           <?php 
              self::generate_css('a, a:visited', 'color', 'link_color');
              self::generate_css('input[type="button"], input[type="reset"], input[type="submit"], button', 'background-color', 'link_color');
              self::generate_css('input[type="button"], input[type="reset"], input[type="submit"], button', 'border-color', 'link_color');
              self::generate_css('.entry-title a:hover, .sidebar-secondary a:hover, .entry-title a:active, .sidebar-secondary a:active, .charlene-recent-posts .entry-title a, .charlene-recent-posts .entry-title a:visited ', 'color', 'link_color');
              self::generate_css('a:hover, a:active, .charlene-recent-posts .entry-title a:hover, .charlene-recent-posts .entry-title a:active',  'color', 'link_hover_color'); 
            ?>
      </style> 
      <!--/Customizer CSS-->
      <?php
   }

   /**
    * Output js for live preview
    * 
    * Used by hook: 'customize_preview_init'
    * 
    * @see add_action('customize_preview_init',$func)
    * @since Charlene 2.0
    */
   public static function live_preview() {
      wp_enqueue_script( 
           'charlene-themecustomizer', // Give the script a unique ID
           get_template_directory_uri() . '/lib/js/theme-customizer.js', // Define the path to the JS file
           array(  'jquery', 'customize-preview' ), // Define dependencies
           '', // Define a version (optional) 
           true // Specify whether to put in footer (leave this true)
      );
   }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     * 
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since Charlene 2.0
     */
    public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
    }
}

// Setup the Theme Customizer
add_action( 'customize_register' , array( 'Charlene_Theme_Customize' , 'register' ) );

// Output custom CSS to wp_head
add_action( 'wp_head' , array( 'Charlene_Theme_Customize' , 'header_output' ) );

// Enqueue live preview javascript
add_action( 'customize_preview_init' , array( 'Charlene_Theme_Customize' , 'live_preview' ) );