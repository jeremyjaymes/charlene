<?php
/**
 * Template outputs single page.
 *
 * @package Charlene
 * @subpackage Template
 * @author jeremyjaymes
 * @since Charlene 2.0
 */

get_header(); 
?>

    <div id="primary" class="content-area col_4">
        <main class="content" role="main" itemprop="mainContentOfPage">
        
    	<?php 
            while ( have_posts() ) : the_post(); ?>
    	    
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/CreativeWork">
                
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
                </header>
    				
                <div class="entry-content entry" itemprop="text">
                    <?php 
                        the_content();
    					
                        wp_link_pages( array(
                            'before' => '<nav class="page-links"><span class="page-links-title">' . __( 'Pages:','charlene' ),
                            'after' => '</span></nav>', 
                            'next_or_number' => 'number'
                        )); 
                    ?>
                
                </div><!-- end .entry-content -->
                    
            </article><!-- end .post -->
            
    		<?php 
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }

                endwhile; 
            ?>
	    </main>   
    </div><!-- end #primary-->

<?php 
get_sidebar();
get_footer();