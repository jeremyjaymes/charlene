<?php 
/**
 * Search page template.
 *
 * @package Charlene
 * @subpackage Template
 * @author jeremyjaymes
 * @since Charlene 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area col_4">
		<main class="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/SearchResultsPage">
		
			<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class><?php printf( __( 'Search Results for: %s', 'charlene' ), esc_attr( get_search_query() ) ); ?></h1>
			</header><!-- end .site-title-->

		    	<?php 
		    		while ( have_posts() ) : the_post();

						get_template_part( 'content', get_post_format() );
				
					endwhile; 
					// Numerical paging
					charlene_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'noposts' );

			    endif; 
			?>

		</main>
	</div><!--End /#primary -->

<?php 
get_sidebar();
get_footer(); 
