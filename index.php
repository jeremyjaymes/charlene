<?php
/**
 * Main template file.
 *
 * @package Charlene
 * @author Papertree Design
 * @since Charlene v2.0
 */

get_header(); ?>

   <div id="primary" class="content-area col_4 push_0">
      <main class="content" role="main" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/Blog">

      <?php 
         /**
          * If this is the home page and is the first page
          * output the intro widget area if active
          */
         if ( is_home() && !is_paged() ) :
            if ( is_active_sidebar( 'site-intro' ) ) :
               // Output the widget area
               dynamic_sidebar( 'site-intro' );
            endif;
         endif;

         if ( have_posts() ) : 
            // Start loop
            while ( have_posts() ) : the_post();

               // Include content template
               get_template_part( 'content', get_post_format() );

            endwhile;
            // Numberical pagination
            charlene_paging_nav();
            
         else :
            // No posts
            get_template_part( 'content', 'noposts' );            

         endif; 
      ?>

      </main>
   </div><!--end #primary-->

<?php 
get_sidebar();
get_footer();