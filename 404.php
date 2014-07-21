<?php
/**
 * Page Template displays 404 (not found).
 *
 * @package Charlene
 * @subpackage Template
 */

get_header(); ?>
	<div id="primary" class="content-area col_4">

		<div class="entry error-404">

			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'charlene' ); ?></h1>
			</div>

			<p><?php printf( __( 'You attempted to go to %1$s, but we could not locate that file. Please try searching again to find what you\'re looking for.', 'charlene' ), '<code>' . site_url( esc_url( $_SERVER['REQUEST_URI'] ) ) . '</code>' ); ?></p>

			<?php get_search_form(); ?>
		</div><!-- end .post .error-404 -->	

	</div><!-- end primary -->

<?php 
get_sidebar();
get_footer(); 
?>