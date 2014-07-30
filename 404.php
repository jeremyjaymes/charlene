<?php
/**
 * 404 Error Template
 *
 * @package Charlene
 * @since Charlene 1.0
 */

get_header(); ?>
	<div id="primary" class="content-area col_4">
        <main class="content" role="main" itemprop="mainContentOfPage">

		<article class="entry error-404">

			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'charlene' ); ?></h1>
			</header>
            
            <div class="error-message">
                <?php printf( __( '<p>It looks like the page you have requested no longer exists, you can return to the sites <a href="%s">homepage</a> or try a search using the form below.</p>', 'charlene' ), home_url() ); ?>
            </div>
            
			<?php get_search_form(); ?>
		</article<!-- .error-404 -->	
        
        </main>
	</div><!-- end primary -->

<?php 
get_sidebar();
get_footer(); 