<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */

get_header(); ?>
<div id="main" class="site-main">
    <div id="main-content" class="single-page-content">
        <div id="primary" class="content-area">
            <div class="page-header">
                <?php
                    // Page thumbnail and title.
                    aveo_theme_post_thumbnail();
                    the_title( '<h2 class="single-page-title">', '</h2>' );
                ?>
            </div>
            <div id="content" class="page-content site-content single-post" role="main">
                <?php
                    // Start the Loop.
                    while ( have_posts() ) : the_post();

                        // Include the page content template.
                        get_template_part( 'content', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                    endwhile;
                ?>
            </div><!-- #content -->
        </div><!-- #primary -->
    </div><!-- #main-content -->
</div>
<?php get_footer(); ?>
