<?php
/**
 * Page Template displays Archive Pages.
 *
 * Example (Category/Date etc) if no specific template is found.
 *
 * @package Charlene
 * @subpackage Template
 * @author jeremyjaymes
 * @since Charlene 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area col_4">
		<main class="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
		
		<header class="page-header">
			<h1 class="page-title"><?php wp_title( '',true,'' ); ?></h1>
		</header>

		<?php 
			if ( have_posts() ) : 
			
				while ( have_posts() ) : the_post();
        
					get_template_part( 'content' );
		
				endwhile; 
			
				charlene_paging_nav();
		
			else : 
		
				get_template_part( 'content', 'noposts' );
				    
			endif; 
		?>

	    </main>    
	</div><!--end #primary-->

<?php 
get_sidebar();
get_footer();