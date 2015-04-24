<?php
/**
 * Recent Posts Widget
 *
 * Recents posts with excerpt.
 *
 * @package Charlene
 * @subpackage Widgets
 * @author jeremyjaymes
 * @since Charlene 1.0
 */


/**
 * Widget Class
 */
class Charlene_Widget_Recent extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {

        parent::__construct(
            'charlene_recent', // Base ID
            __('Charlene Theme Recent Posts Widget', 'charlene'), // Name
            array( 'description' => __( 'Recent Posts Widget for Charlene', 'charlene' ), ) // Args
        );

    }

	/**
	 * Display the widget.
	 */
	function widget( $args, $instance ) {

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recently Written', 'charlene' );
		
		$title = apply_filters('widget_title', $title, $instance );

        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number )
            $number = 5;
		
		$cr = new WP_Query( array(
                    'posts_per_page' => $number, 
                    'offset' => $number, 
                    'ignore_sticky_posts' => 1
            )); // offsets same number of posts

		if ( $cr->have_posts() ) :

	        // Before widget
            echo $args[ 'before_widget'];
		    
            	if ( ! empty( $title ) ) {
                    echo $args['before_title'] . $title . $args['after_title'];
                }

                echo '<ul class="charlene-recent-posts">';
                while ($cr->have_posts()) : $cr->the_post();
            ?>
                <li class="entry">
                    
                    <header class="entry-header">
                      <h3 class="entry-title"><a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                    </header>
                    
                    <div class="entry-summary">
                    <?php
                        $excerpt = strip_tags( get_the_excerpt() );
                        echo wp_trim_words( $excerpt, 15 );
                    ?>
                    </div><!-- end .aside-content -->	
			 	</li>
        <?php 
            endwhile;
            wp_reset_postdata(); ?> 

            </ul>

		<?php
            // After widget 
            echo $args['after_widget']; 		
		  
	    endif;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];

		return $instance;
	}

	/**
	 * Displays the widget settings controls
	 */
	public function form( $instance ) {

        $title = isset( $instance[ 'title' ] ) ? esc_attr( $instance['title'] ) : __( 'Recently Written', 'charlene' );
        $number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
    ?>
          <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','charlene'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
  
          <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:','charlene'); ?></label>
          <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /><br />
          <small><?php _e('(at most 10)','charlene'); ?></small></p>
	<?php
	}
}

?>