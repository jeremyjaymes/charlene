<?php
/** 
 * Footer Template
 *
 * @package Charlene
 * @subpackage Template
 * @author jeremyjaymes
 * @since Charlene 2.0
 */
?>

        </div><!-- /.wrap -->
    </div><!-- /.content-wrap -->

    	<footer id="colophon" class="site-footer " role="contentinfo">
            <div class="wrap">
        	    <div class="site-info col_2 push_4">
        		 <p class="source-org copyright"><?php _e( 'Copyright' ); echo ' &copy; ' . date( 'Y' ); ?> <?php bloginfo( 'name' ); ?></p>
                 <p><?php printf( __( 'Powered by %1$s and %2$s', 'charlene' ), '<a href="' . esc_url( 'http://wordpress.org' ) . '">WordPress</a>', '<a href="' . esc_url( 'http://github.com/jeremyjaymes/charlene.git' ) . '">Charlene</a>' ); ?></p>
                </div>
            </div>
    	</footer><!-- end #footer -->

    </div><!-- end #wrapper -->

<?php wp_footer(); ?>

</body>
</html>