<?php
/**
 * Template outputs commentarea
 *
 * @package Charlene
 * @subpackage Template
 * @author jeremyjaymes
 * @since 2.0
 */

// Do not delete these lines
if ( post_password_required() ) {
    return;
}
?>

<?php // You can start editing here. ?>
<div id="comments" class="commment-area">
    
    <?php if ( have_comments() ) : ?>
    
    	<h3 class="comments-title">
            <?php printf( _n( 'One Comment', '%1$s Comments', 'charlene' ), get_comments_number() ); ?>
        </h3>
			
			
        	<section id="comment-list">
            	<?php 
                    wp_list_comments( array( 
                        'style'             => 'div',
                        'short_ping'        => true,
                        'avatar_size'       => 34,
                        'callback'          => 'charlene_comments',
                        'type'              => 'all',
                        'reply_text'        => 'Reply',
                        'page'              => '',
                        'per_page'          => '',
                        'reverse_top_level' => null,
                        'reverse_children'  => ''
                    ) ); 
                ?>
        	</section>
        	
		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    	<div class="navigation">
        	<div class="paginated-comments-links">
        		<?php paginate_comments_links(); ?>
        	</div>
    	</div>
    	<?php endif; ?>
    

	<?php if ( !comments_open() ) : ?>
		<p class="comments-closed"><?php _e( 'Comments are closed.', 'charlene' ); ?></p>
	<?php endif; ?>

    <?php endif; ?>

	<?php comment_form(); ?>

</div><!-- end comment area -->