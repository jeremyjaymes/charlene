<?php
/**
 * Template Name: No Sidebar
 *
 * @package Charlene
 * @subpackage Template
 * @author jeremyjaymes
 * @since Charlene 2.0
 */

get_header(); 
?>

    <div id="primary" class="content-area col_6">
        <main class="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
        <?php 
            while ( have_posts() ) : the_post(); 
        ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header>
                    
                <div class="entry-content entry">
                    <?php the_content(); ?>
                        
                    <?php 
                        wp_link_pages( array(
                            'before' => '<p><strong>' . __( 'Pages:','charlene' ), 'after' => '</strong></p>', 'next_or_number' => 'number'
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
get_footer();