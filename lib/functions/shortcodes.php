<?php
/**
 * Theme Shortcodes
 *
 * @package Charlene\Shortcodes
 * @author jeremyjaymes
 */
 
    
add_shortcode( 'introp', 'eighttwenty_intro_p' );
/**
 * Intro Paragraph Shortcode
 *
 * @since 2.0
 *
 * @param array $atts Shortcode attributes. Empty string if no attributes.
 * @param $content Shortcode content.
 */
function eighttwenty_intro_p( $atts, $content = null ) {

    return '<div class="introp">' . $content . '</div>';
}

add_shortcode('charlene_row', 'charlene_row_build' );
/**
 * Column Row
 *
 * @since Charlene 2.0
 *
 * @param array $atts Shortcode attributes. Empty string if no attributes.
 * @param $content Shortcode content.
 */
function charlene_row_build( $atts, $content='null' ) {
    
    return '<div class="content-column-row">' . do_shortcode( $content ) . '</div>';
}

add_shortcode('charlene_column', 'charlene_grid_shortcode_build' );
/**
 * Column Shortcodes
 *
 * @since Charlene 2.0
 *
 * @param array $atts Shortcode attributes. Empty string if no attributes.
 * @param $content Shortcode content.
 */
function charlene_grid_shortcode_build( $atts, $content = 'null' ) {
    extract( shortcode_atts( array(
          'size' => '',
          'position' => '',
          ),
      $atts, 'charlene_column' ) );
      
      $charlene_column_atts = 'col_' . $size;
      
      if ( $position ) {
        $charlene_column_atts .= ' push_' . $position;
      } else {
        $charlene_column_atts .= ' first-column';
      }


      $charlene_column = '<div class="content-column ' . $charlene_column_atts . '">' . do_shortcode($content) . '</div>';
      
      return $charlene_column;
}
