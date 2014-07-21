<?php
/**
 * Post format archive pages.
 *
 * @package Charlene
 * @subpackage Template
 * @author jeremyjaymes
 * @since Charlene 2.0
 */

get_header(); ?>

    <section id="primary" class="content-area col_4">
        <main class="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

            <?php if ( have_posts() ) : ?>

            <header class="archive-header">
                <h1 class="archive-title">
                    <?php
                        if ( is_tax( 'post_format', 'post-format-aside' ) ) :
                            _e( 'Aside Archives', 'charlene' );

                        elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                            _e( 'Image Archives', 'charlene' );

                        elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                            _e( 'Video Archives', 'charlene' );

                        elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
                            _e( 'Audio Archives', 'charlene' );

                        elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                            _e( 'Quote Archives', 'charlene' );

                        elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                            _e( 'Link Archives', 'charlene' );

                        elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
                            _e( 'Gallery Archives', 'charlene' );

                        else :
                            _e( 'Archives', 'charlene' );

                        endif;
                    ?>
                </h1>
            </header><!-- .archive-header -->

            <?php
                    // Loop
                    while ( have_posts() ) : the_post();

                        //* Post formats
                        get_template_part( 'content', get_post_format() );

                    endwhile;
                    // Previous/next page navigation.
                    charlene_paging_nav();

                else :
                    // No content
                    get_template_part( 'content', 'noposts' );

                endif;
            ?>
        </main><!-- #content -->
    </section><!-- #primary -->

<?php
get_sidebar();
get_footer();
