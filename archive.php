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
			<h1 class="page-title">
				<?php
					if ( is_category() ) :
						single_cat_title();

					elseif ( is_tag() ) :
						single_tag_title();

					elseif ( is_day() ) :
						printf( __( 'Day: %s', 'charlene' ), get_the_date() );

					elseif ( is_month() ) :
						printf( __( 'Month: %s', 'charlene' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'charlene' ) ) );

					elseif ( is_year() ) :
						printf( __( 'Year: %s', 'charlene' ), get_the_date( _x( 'Y', 'yearly archives date format', 'charlene' ) ) );

					elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
						_e( 'Asides', 'charlene' );

					elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
						_e( 'Galleries', 'charlene');

					elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
						_e( 'Images', 'charlene');

					elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
						_e( 'Video', 'charlene' );

					elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
						_e( 'Quotes', 'charlene' );

					elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
						_e( 'Links', 'charlene' );

					elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
						_e( 'Audio', 'charlene' );

					else :
						_e( 'Archives', 'charlene' );

					endif;
				?>
			</h1>
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