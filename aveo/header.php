<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Loading animation -->
<div class="preloader">
  <div class="preloader-animation">
    <div class="preloader-spinner">
    </div>
  </div>
</div>
<!-- /Loading animation -->

<div id="page" class="page-layout">

    <header id="site_header" class="header mobile-menu-hide">
        <div class="header-content clearfix">
            <?php
            $logo_img = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('photo') : '';
            if( !empty( $logo_img ) ) :
            ?>
            <div class="logo mobile-hidden">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url($logo_img['url']); ?>" alt="<?php esc_attr_e('image', 'aveo'); ?>">
                </a>
            </div>
            <?php endif ?>

            <?php
            $text_logo = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('logo') :  get_bloginfo( 'name' );
            $text_logo_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('logo_color') :  '';

            if( !empty( $text_logo ) || !empty( $text_logo_color ) ) :
            ?>
            <div class="site-title-block mobile-hidden">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if( !empty( $text_logo_color ) ) : ?>
                        <h1 class="site-title"><?php echo esc_html($text_logo); ?><span><?php echo esc_html($text_logo_color); ?></span></h1>
                    <?php else : ?>
                        <h1 class="site-title"><?php echo esc_html($text_logo); ?></h1>
                    <?php endif; ?>
                </a>
            </div>
            <?php endif ?>


            <!-- Navigation -->
            <div class="site-nav">
                <?php
                if (is_page_template('page-templates/template-aveo-vcard.php'))
                {   
                    $random_animations = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('subpages_animations/subpages_animations_switcher') :  'on';
                    $animation_type = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('subpages_animations/off/animation_number') :  '';
                    ?>
                    <!-- Main menu -->
                    <ul id="nav" class="site-main-menu site-auto-menu" <?php if ($random_animations == 'off'): ?>data-animation="<?php echo esc_attr($animation_type) ?>"<?php endif; ?>>

                    </ul>
                    <?php if(has_nav_menu('aveo-template-menu')){ wp_nav_menu( array( 'menu_class' => 'aveo-additional-menu site-main-menu', 'theme_location' => 'aveo-template-menu', 'container' => '', 'depth' => 2) ); }
                    ?>
                    <!-- /Main menu -->
                <?php
                }
                else
                {
                    if(has_nav_menu('classic-menu')){ wp_nav_menu( array( 'menu_class' => 'aveo-classic-menu site-main-menu', 'theme_location' => 'classic-menu', 'container' => '', 'depth' => 2) ); }
                    $display_header_search = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('header_search') :  'yes';
                    ?>
                        <?php if ($display_header_search == 'yes'): ?>
                        <div class="header-search">
                            <form role="search" id="search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                <input type="text" id="search" class="form-control" name="s" value="<?php the_search_query(); ?>" placeholder="<?php esc_html_e('Search', 'aveo'); ?>" required="required">
                                <button type="submit" id="search-submit" class="search-submit" title="<?php esc_html_e('Search', 'aveo'); ?>">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <?php endif; ?>
                    <?php
                }
                ?>
            </div>
            <!-- Navigation -->
        </div>
    </header>
    <!-- /Header -->

    <!-- Mobile Header -->
    <div class="mobile-header mobile-visible">
        <div class="mobile-logo-container">
            <?php if( !empty( $logo_img ) ) : ?>
            <div class="mobile-header-image">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url($logo_img['url']); ?>" alt="<?php esc_attr_e('image', 'aveo'); ?>">
                </a>
            </div>
            <?php endif; ?>

            <div class="mobile-site-title">
                <?php if( !empty( $text_logo ) || !empty( $text_logo_color ) ) :
                ?>
                    <?php if( !empty( $text_logo_color ) ) : ?>
                        <?php echo esc_html($text_logo); ?><?php echo esc_html($text_logo_color); ?>
                    <?php else : ?>
                        <?php echo esc_html($text_logo); ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        <a class="menu-toggle mobile-visible">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <!-- /Mobile Header -->
