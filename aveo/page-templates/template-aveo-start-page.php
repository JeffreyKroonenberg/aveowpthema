<?php
/*
Template Name: AVEO Start Page
*/

get_header(); ?>

<div id="main" class="site-main">
    <div id="main-content" class="single-page-content">
        <div id="primary" class="content-area">
            <div class="section-inner start-page-content">
                <div class="page-header">
                    <div class="row">
                        <?php
                        $photo = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('hp_main_photo') : '';
                        if( !empty( $photo ) ) :
                        ?>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="photo">
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                    <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php esc_attr_e('image', 'aveo'); ?>">
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-8 col-md-8 col-lg-8">
                        <?php else: ?>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                        <?php endif ?>
                            <div class="title-block">
                                <?php
                                $main_title = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('hp_main_title') :  get_bloginfo( 'name' );
                                if( !empty( $main_title ) ) :
                                ?>
                                <h2><?php echo esc_html($main_title); ?></h2>
                                <?php endif; ?>
                                <?php if ( function_exists('fw_get_db_settings_option') ): ?>
                                <div class="owl-carousel text-rotation">                                    
                                    <?php foreach (( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('hp_subtitles') : '' as $aveo_project_tags): ?>
                                        <div class="item">
                                            <div class="sp-subtitle"><?php echo esc_html($aveo_project_tags); ?></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </div>

                            <?php if ( function_exists('fw_get_db_settings_option') ): ?>
                            <div class="social-links">
                                <?php foreach (( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('hp_social') : '' as $aveo_hp_social): 
                                    if( !empty( $aveo_hp_social['link'] ) ) {
                                        if (!empty($aveo_hp_social['image']['url'])) { ?>
                                            <a href="<?php echo esc_url($aveo_hp_social['link']); ?>" target="_blank" title="<?php echo esc_attr($aveo_hp_social['title']); ?>">
                                                <img src="<?php echo esc_url($aveo_hp_social['image']['url']); ?>" alt="<?php echo esc_attr($aveo_hp_social['title']); ?>">
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?php echo esc_url($aveo_hp_social['link']); ?>" target="_blank" title="<?php echo esc_attr($aveo_hp_social['title']); ?>">
                                                <i class="<?php echo esc_attr($aveo_hp_social['icon']); ?>"></i>
                                            </a>
                                        <?php
                                        }
                                    }
                                endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="page-content">
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
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
