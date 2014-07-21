<?php
/**
 * Template outputs author page.
 *
 * @package Charlene
 * @subpackage Template
 * @author jeremyjaymes
 * @since Charlene 2.0
 */

get_header(); ?>

	<div id="primary" class="content-area col_4">
		<main class="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
		
		<?php 
			if ( have_posts() ) : ?>
			
			<header class="author-profile vcard">
				
				<?php 

					the_post(); 

					printf( __( '<h1 class="author-name fn n">Author: %s</h1>', 'charlene' ), get_the_author() );
				?>

				<?php if ( get_the_author_meta( 'description' ) ) : ?>
					<div class="author-description"><?php the_author_meta( 'description' ); ?></div>
				<?php endif; ?>
				<?php if ( get_the_author_meta( 'user_url' ) ) : ?>
					<p class="url"><?php the_author_meta( 'user_url' ); ?></p>
				<?php endif; ?>
		    </header><!-- .author-info -->

		<?php
			//* After calling posts above, rewind		
			rewind_posts();

			// Start the Loop.
			while ( have_posts() ) : the_post(); ?>

				 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" role="article" > 
             
				   <header class="entry-header">
				      <?php
				            the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				      ?>
				   </header><!-- .entry-header -->
				   
				   <div class="entry-summary" itemprop="text">
				      <?php the_excerpt(); ?>
				   </div><!-- .entry-summary -->              
				            
				   <?php the_tags( '<footer class="entry-footer"><span class="tags">' . __( 'Tags: ', 'charlene' ) . '</span>', ', ', '</footer>' ); ?>   
				         
				</article><!-- .post -->

			<?php
				endwhile;
				// Paginate
				charlene_paging_nav();

			else :
				// No posts
				get_template_part( 'content', 'noposts' );

			endif;
			?>

		</main>
	</div> <!-- end #primary -->

<?php 
get_sidebar();
get_footer();