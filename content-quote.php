<?php
/**
 * Post Format Template - Quote
 *
 * @package Charlene
 * @subpackage Template
 * @author jeremyjaymes
 * @since Charlene 2.0
 */
?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/BlogPosting" role="article" > 
             
   <header class="entry-header">
      <?php
         //Output post title
         if ( is_single() ) :
            the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
         else :
            the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
         endif;
      ?>

      <div class="entry-meta">
         <?php 
            printf( __( '<span class="byline vcard">Posted <time class="updated" datetime="%1$s" pubdate itemprop="datePublished">%2$s</time> by <span class="entry-author" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"><a class="url fn n" href="%3$s" itemprop="url" rel="author"><span class="entry-author_name" itemprop="name">%4$s</span></a></span></span>', 'charlene' ),
               esc_attr( get_the_date( 'c' ) ),
               esc_html( get_the_date() ), 
               esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
               get_the_author()
            ); 
         ?>

         <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
         <span class="sep"> | </span><span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'charlene' ), __( '1 Comment', 'charlene' ), __( '% Comments', 'twentyfourteen' ) ); ?></span>
         <?php endif; ?>
      </div><!-- entry-meta -->
   </header><!-- .entry-header -->
   
   <div class="entry-content" itemprop="articleBody">
      <?php 
         the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'charlene' ) ); 

         wp_link_pages( array(
            'before'      => '<nav class="page-links"><span class="page-links-title">' . __( 'Pages:', 'charlene' ) . '</span>',
            'after'       => '</nav>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
         ) );
      ?>
   </div><!-- .entry-content -->             
            
   <footer class="entry-footer">
      <?php
         if ( has_category() ) :
            printf( __( '<span class="entry-categories">Filed under: %s</span>', 'charlene' ), get_the_category_list(', ') );
         endif;

         the_tags( '<span class="entry-tags" itemprop="keywords"><span class="tags-title">' . __( 'Tags: ', 'charlene' ) . '</span>', ', ', '</span>' ); 
      ?>   
   </footer>  
         
</article><!-- .post -->