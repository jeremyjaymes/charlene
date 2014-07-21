<?php
/**
 * Post Format Template - Standard
 *
 * @package Charlene
 * @subpackage Template
 * @author jeremyjaymes
 * @since Charlene 2.0
 */
?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" role="article" > 
             
   <header class="entry-header">
      <?php
            the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
      ?>
   </header><!-- .entry-header -->
   
   <div class="entry-summary" itemprop="text">
      <?php the_excerpt(); ?>
   </div><!-- .entry-summary -->              
            
   <footer class="entry-footer">
      <?php
         if ( has_category() ) :
            printf( __( '<span class="entry-categories">Filed under: %s</span>', 'charlene' ), get_the_category_list(', ') );
         endif;

         the_tags( '<span class="entry-tags"><span class="tags-title">' . __( 'Tags: ', 'charlene' ) . '</span>', ', ', '</span>' ); 
      ?>   
   </footer>  
         
</article><!-- .post -->