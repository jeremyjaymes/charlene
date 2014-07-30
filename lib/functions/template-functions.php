<?php
/**
 * Global Template Functions
 *
 * @package Charlene\Functions
 * @author jeremyjaymes
 */


if ( ! function_exists( 'charlene_paging_nav' ) ) :
/**
 * Numerical navigation for archive pages
 *
 * @since Charlene 2.0
 */
function charlene_paging_nav() {
	global $wp_query;
	$big = 999999999;

	$translated = __( 'Page', 'charlene' ); // Supply translatable string

	if ( $wp_query->max_num_pages <= 1 )
    return;
	
	echo '<nav class="pagination" role="navigation">';
    echo '<h1 class="screen-reader-text">' . __( 'All Posts Navigation', 'charlene' ) . '</h1>';
	echo paginate_links( array(
		'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'             => '?paged=%#%',
		'current'            => max( 1, get_query_var('paged') ),
		'total'              => $wp_query->max_num_pages,
		'prev_text'    		 => __( '&laquo; Previous', 'charlene' ),
    	'next_text'          => __( 'Next &raquo;', 'charlene' ),
    	'type'               => 'list',
    	'mid_size'           => 1,
	    
	) );
	echo '</nav>';
}

endif; // End Page Nav

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 * @link http://codex.wordpress.org/Function_Reference/wp_title
 *
 * @since Charlene 2.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function charlene_wp_title( $title, $sep ) {
    if ( is_feed() ) {
        return $title;
    }
    
    global $page, $paged;

    // Add the blog name
    $title .= get_bloginfo( 'name', 'display' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title .= " $sep $site_description";
    }

    // Add a page number if necessary:
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
        $title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
    }

    return $title;
}
add_filter( 'wp_title', 'charlene_wp_title', 10, 2 );

/** 
 * Filter WordPress body class
 *
 * @param array $classes List body class values.
 * @return array Body class list.
 */
function charlene_body_classes( $classes ) {
    
    // Add custom class for no sidebar page
    if ( is_page_template( 'page-no-sidebar.php' ) ) {
        $classes[] = 'full-width-content';
    }

    return $classes;
}
add_action( 'body_class', 'charlene_body_classes' );