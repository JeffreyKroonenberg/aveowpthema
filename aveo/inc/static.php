<?php if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );
/**
 * Include static files: javascript and css
 */

if ( is_admin() ) {
    return;
}

wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css',array(),'3.3.7');
wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css',array(),'1.0');
wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css',array(),'2.0');
wp_enqueue_style('transition-animations', get_template_directory_uri() .  '/css/transition-animations.css',array(),'1.3.0');
wp_enqueue_style('animate', get_template_directory_uri() .  '/css/animate.css',array(),'1.0');
wp_enqueue_style('magnific-popup', get_template_directory_uri() .  '/css/magnific-popup.css',array(),'1.1.0');
wp_enqueue_style('material-design-iconic-font', get_template_directory_uri() .  '/css/material-design-iconic-font/css/material-design-iconic-font.min.css',array(),'1.0');
if ( ! defined( 'FW' ) ) {
    wp_enqueue_style('font-awesome', get_template_directory_uri() .  '/css/font-awesome/css/font-awesome.css',array(),'4.1.0');
}
if ( defined( 'FW' ) ) {
    fw()->backend->option_type('icon-v2')->packs_loader->enqueue_frontend_css();
}
wp_enqueue_style('aveo-main-styles', get_template_directory_uri().'/css/main.css',array(),'1.4.3');
wp_enqueue_style('aveo-customization', get_template_directory_uri().'/css/customization.css',array(),'1.4.3');
require_once get_parent_theme_file_path( '/inc/customization.php' );
wp_add_inline_style( 'aveo-customization', aveo_theme_customizations() );

/** Add Scripts in to the Head **/
wp_enqueue_script('jquery');
wp_enqueue_script('modernizr', get_template_directory_uri().'/js/modernizr.custom.js',array(),'2.8.3',true);

wp_enqueue_script('owl-carousel', get_template_directory_uri().'/js/owl.carousel.min.js',array(),'2.0',true);
wp_enqueue_script('aveo-jquery-validator', get_template_directory_uri().'/js/validator.js',array(),'1.0',true);
wp_enqueue_script('imagesloaded');
wp_enqueue_script('shuffle', get_template_directory_uri().'/js/jquery.shuffle.min.js',array(),'3.1.1',true);
wp_enqueue_script('masonry');
wp_enqueue_script('hoverdir', get_template_directory_uri().'/js/jquery.hoverdir.js',array(),'1.1.0',true);
wp_enqueue_script('magnific-popup', get_template_directory_uri().'/js/jquery.magnific-popup.min.js',array(),'1.1.0',true);
wp_enqueue_script('aveo-pages-switcher', get_template_directory_uri().'/js/pages-switcher.js',array(),'1.4.3',true);
$recaptcha = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('recaptcha/recaptcha_switcher') :  'on';
if( $recaptcha = 'on' ){
    wp_enqueue_script('js-recaptcha', 'https://www.google.com/recaptcha/api.js',array(),'2.0',true);
}
wp_enqueue_script('aveo-jquery-main', get_template_directory_uri().'/js/main.js',array(),'1.4.3',true);

if ( is_singular(array('post')) && comments_open() ){
  wp_enqueue_script('comment-reply');
}
