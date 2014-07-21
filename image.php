<?php
/**
 * Image Attachment Template
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
	 while (have_posts()) : the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                    <div class="entry-meta">
         				<span class="parent-post-link"><?php _e( 'Parent Post: ', 'charlene' ); ?> <a href="<?php echo get_permalink( $post->post_parent ); ?>" rel="gallery"><?php echo get_the_title( $post->post_parent ); ?></a></span>
         			</div>
                </header>
                
				<div class="entry-content">
				
					<div class="attachment-image">
						<a href="<?php echo wp_get_attachment_url(); ?>" title="<?php the_title_attribute(); ?>" type="<?php echo get_post_mime_type(); ?>">
							<img class="aligncenter" src="<?php echo wp_get_attachment_url(); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
						</a>
					</div><!-- .attachment-image -->
				
					<?php 
						the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'charlene' ) ); 

				        wp_link_pages( array(
				            'before'      => '<nav class="page-links"><span class="page-links-title">' . __( 'Pages:', 'charlene' ) . '</span>',
				            'after'       => '</nav>',
				            'link_before' => '<span>',
				            'link_after'  => '</span>',
				        ) );
			          ?>
				</div><!-- end .entry -->
				
				<nav class="image-navigation navigation">
					<?php previous_image_link( false, '<span class="prev-posts">' . __( 'Previous Image', 'charlene' ) . '</span>' ); ?>
					<?php next_image_link( false, '<span class="next-posts">' . __( 'Next Image', 'charlene' ) . '</span>' ); ?>
				</nav><!-- end .navigation -->
			
		</article> <!-- end .post -->

		<?php 
			comments_template('', true);
		
		endwhile; 
		?>

		</main>
	</div> <!-- end #primary -->
	
<?php 
get_sidebar();
get_footer();