<?php
/*
Template Name: AVEO vCard
*/
$arrows_nav = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('arrows_nav') :  'on';
get_header(); ?>

<div id="main" class="site-main">
    <!-- Page changer wrapper -->
    <div class="pt-wrapper">
        <!-- Subpages -->
        <div class="subpages">
            <?php dynamic_sidebar( 'aveo_template_pages' ); ?>
        </div>
    </div>
</div>

<?php if($arrows_nav == "yes"): ?>
<!-- Arrows Nav -->
<div class="lmpixels-arrows-nav">
    <div class="lmpixels-arrow-left"><i class="zmdi zmdi-chevron-left"></i></div>
    <div class="lmpixels-arrow-right"><i class="zmdi zmdi-chevron-right"></i></div>
</div>
<!-- /Arrows Nav -->
<?php endif; ?>

<?php get_footer(); ?>
