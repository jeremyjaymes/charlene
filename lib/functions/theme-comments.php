<?php
/**
 * Filter comment form defaults in WP 3.0
 *
 * @package Charlene\Functions
 * @author jeremyjaymes
 * @since 1.0
 */



/**
 * Comments Custom Callback
 *
 * @since 1.0
 */
function charlene_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    ?>
    
    <div id="comment-<?php comment_ID(); ?>" <?php comment_class( 'group' ); ?>>
        
        <article class="comment-entry">
            <header class="comment-author vcard">
                <?php printf( '<cite class="fn">%1$s</cite> %2$s', get_comment_author_link(), edit_comment_link(__( '(Edit)', 'charlene' ),'  ','') ) ?>
                <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a class="timestamp" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'charlene' )); ?> </a></time>
            
                <div class="avatar_cont">
                	<?php 
                		if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); 
                	?>
                </div>

            </header><!-- end .comment-left-->
      
            <section class="comment-text">
            <?php if ( $comment->comment_approved == '0' ) _e( '<span class="not-approved">Your comment is awaiting moderation.</span>', 'charlene' ); ?>
                
                <span class="comment-content">
                    <?php comment_text(); ?>
                </span><!-- comment-content -->
            
            <?php echo comment_reply_link(array( 'before' => '<span class="reply">', 'after' => '</span>', 'reply_text' => 'Reply', 'depth' => $depth, 'max_depth' => $args['max_depth'] ));  ?>
      
            </section><!-- end .comment-right -->
        </article><!-- end #comment -->

    <?php // </li> is added by WordPress automatically ?>
    <?php
}