<?php
/**
 * Single Post Template
 *
 * @package Charlene
 * @subpackage Template
 * @author jeremyjaymes
 * @since Charlene 2.0
 */

get_header(); ?>

	<div id="primary" class="content-area col_4">
		<main class="content" role="main" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/Blog">
		<?php 
			// loop being
			while (have_posts()) : the_post();

				get_template_part( 'content', get_post_format() );
			
					if ( is_active_sidebar( 'after-post' ) ) { ?>

						<aside class="aside post-widget-area">
							<?php dynamic_sidebar( 'after-post' ); ?>
						</aside><!-- #third .aside -->
				
					<?php 
					} // end widget area

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

			endwhile;
		?>
		</main>
	</div> <!-- #primary -->

<?php 
get_sidebar();
get_footer(); 