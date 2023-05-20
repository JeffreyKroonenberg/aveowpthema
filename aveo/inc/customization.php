<?php

function aveo_theme_customizations() {

    //================================================================================================================================
    // Custom styles
    //================================================================================================================================
    $custom_styles = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('custom_styles') : '';
    $pages_shadow = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_content_shadow') : 'on';
    $border_radius = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_content_border_radius') : '15';
    $content_max_width = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('content_max_width') : '1032';

    //================================================================================================================================
    // Main color
    //================================================================================================================================
    $theme_main_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_color') : '#2eca7f';

    //================================================================================================================================
    // Backgrounds
    //================================================================================================================================
    $main_header_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_header_bg_color') : '#ffffff';

    $body_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_bg_color') : '#f5f5f5';
    $body_text_color  = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_text_color') : '#555555';

    $header_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('header_bg_color') : '#ffffff';

    $sidebar_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('sidebar_bg_color') : '#fcfcfc';

    $sp_title_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('start_page_title_color') : '#ffffff';
    $sp_subtitle_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('start_page_subtitle_color') : '#ffffff';

    $portfolio_odd_elements_bg = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('portfolio_odd_elements') : '#2eca7f';
    $portfolio_even_elements_bg = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('portfolio_even_elements') : '#9e51f3';


    //================================================================================================================================
    // Typography
    //================================================================================================================================'
    $body_text_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/family') : 'Roboto';
    $body_text_variation = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/variation') : '400';
    $body_text_weight = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/weight') : '400';
    $body_text_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/style') : 'normal';
    if ( $body_text_weight == '' ) {
        $body_text_weight = intval($body_text_variation);
        $body_text_style = ( strpos( $body_text_variation, 'italic' ) ) ? 'italic' : 'normal';
        if ( $body_text_weight == 'regular' ) {
            $body_text_weight = '400';
            $body_text_style = 'normal';
        }
        if ( $body_text_variation == 'italic' ) {
            $body_text_weight = '400';
            $body_text_style = 'italic';
        }
    }
    $body_text_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/color') : '#424242';

    $headings_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings/family') : 'Montserrat';
    $headings_variation = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings/variation') : '600';
    $headings_weight = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings/weight') : '600';
    $headings_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings/style') : 'normal';
    if ( $headings_weight == '' ) {
        $headings_weight = intval($headings_variation);
        $headings_style = ( strpos( $headings_variation, 'italic' ) ) ? 'italic' : 'normal';
        if ( $headings_weight == 'regular' ) {
            $headings_weight = '400';
            $headings_style = 'normal';
        }
        if ( $headings_variation == 'italic' ) {
            $headings_weight = '400';
            $headings_style = 'italic';
        }
    }
    $headings_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings/color') : '#212121';


    $h1_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h1/size') : '30';
    $h2_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h2/size') : '24';
    $h3_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h3/size') : '18';
    $h4_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h4/size') : '15';
    $h5_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h5/size') : '13';
    $h6_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h6/size') : '11';

    $links_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('links_color') : '#2eca7f';
    $links_hover_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('links_hover_color') : '#ff9800';


    /* logo vars */
    $logo_img_height = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('logo_img_height') : '';
    $logo_img_width = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('logo_img_width') : '';

    $text_logo_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_header_text_logo_color') : '#49515d';
    $text_logo_color_sticked = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_header_sticked_text_logo_color') : '#49515d';

    $main_menu_links_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_links_color') : '#49515d';
    $main_menu_links_color_sticked = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_links_color_sticked') : '#49515d';


    

    $css = '
    .header .header-content,
    .pt-page,
    .single-page-content .content-area {
        max-width: '.$content_max_width.'px;
    }

    .pt-page .section-inner,
    .single-page-content .content-area {
        border-radius: '.$border_radius.'px;
    }';


    $css .= '
    body,
    p {
        font-family: '.$body_text_font.', Helvetica, sans-serif;
        font-weight: '.$body_text_weight.';
        font-style: '.$body_text_style.';
        color: '.$body_text_color.';
    }

    .form-control,
    .form-control:focus,
    .has-error .form-control,
    .has-error .form-control:focus,
    .testimonial-author,
    .form-control,
    .form-control:focus,
    .has-error .form-control,
    .has-error .form-control:focus,
    .testimonial-author {
        font-family: '.$body_text_font.', Helvetica, sans-serif;
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: '.$headings_font.', Helvetica, sans-serif;
        font-weight: '.$headings_weight.';
        font-style: '.$headings_style.';
        color: '.$headings_color.';
    }

    h1 {
        font-size: '.$h1_size.'px;
        color: '.$headings_color.';
    }
    h2 {
        font-size: '.$h2_size.'px;
        color: '.$headings_color.';
    }
    h3 {
        font-size: '.$h3_size.'px;
        color: '.$headings_color.';
    }
    h4 {
        font-size: '.$h4_size.'px;
        color: '.$headings_color.';
    }
    h5 {
        font-size: '.$h5_size.'px;
        color: '.$headings_color.';
    }
    h6 {
        font-size: '.$h6_size.'px;
        color: '.$headings_color.';
    }

    .site-title {
        font-family: '.$headings_font.', Helvetica, sans-serif;
        font-weight: '.$headings_weight.';
        font-style: '.$headings_style.';
    }

    @media only screen and (min-width: 991px) {
      .site-main-menu li a, .site-main-menu li a:hover {
        color: '.$main_menu_links_color.';
      }

      .header.sticked .site-main-menu li a, .header.sticked .site-main-menu li a:hover {
        color: '.$main_menu_links_color_sticked.';
      }
    }';




    $css .= '
    .header .logo img {
    ';
    if( !empty( $logo_img_height ) ) {
        $css .= '
        height: '.$logo_img_height.'px;
        max-height: '.$logo_img_height.'px;
        ';
    }
    if( !empty( $logo_img_width ) ) {
        $css .= '
        width: '.$logo_img_width.'px;
        ';
    }
    $css .='
    }
    ';

    $css .= '
    @media only screen and (min-width: 991px) {
        .site-title {
            color: '.$text_logo_color.';
        }

        .header.sticked .site-title {
            color: '.$text_logo_color_sticked.';
        }
    }
    ';


    $css .= '
    body {
        background-color: '.$body_bg_color.';
    }

    @media only screen and (min-width: 991px) {
        .header.sticked {
            background-color: '.$main_header_bg_color.';
        }
    }

    .btn-primary,
    .btn-primary:hover,
    .btn-primary:focus,
    button, input[type="button"], input[type="submit"],
    .site-main-menu > li > a:after,
    .timeline-item:after,
    .skill-percentage,
    .service-icon,
    .lm-pricing .lm-package-wrap.highlight-col .lm-heading-row span:after,
    .portfolio-filters li.active a,
    .portfolio-filters li.active a:hover,
    .testimonials.owl-carousel .owl-nav .owl-prev:hover,
    .testimonials.owl-carousel .owl-nav .owl-next:hover,
    .clients.owl-carousel .owl-nav .owl-prev:hover,
    .clients.owl-carousel .owl-nav .owl-next:hover,
    .share-buttons a:hover,
    .fw-pricing .fw-package-wrap.highlight-col .fw-heading-row span:after,
    .cat-links li a,
    .cat-links li a:hover,
    .post-navigation .meta-nav:hover,
    .calendar_wrap td#today,
    .nothing-found p,
    .form-control + .form-control-border,
    .blog-sidebar .sidebar-title h4:after {
        background-color: '.$theme_main_color.';
    }

    .content-page-with-sidebar .blog-sidebar {
        background-color: '.$sidebar_bg_color.';
    }

    @media only screen and (max-width: 991px) {
      .header {
        background-color: '.$theme_main_color.';
      }
      .mobile-header {
        background-color: '.$theme_main_color.';
      }
    }
    ';




    $css .= '
    a,
    .form-group-with-icon.form-group-focus i,
    .site-title span,
    .header-search button:hover,
    .header-search button:focus,
    .block-title h3 span,
    .header-search button:hover,
    .header-search button:focus,
    .timeline-item .item-period,
    .fun-fact-block .fun-value,
    .blog-card .post-date span,
    .info-block-w-icon i,
    .ajax-page-nav > div.nav-item a:hover,
    .project-general-info .fa,
    .portfolio-page-nav > div.nav-item a:hover,
    .comment-author a:hover,
    .comment-list .pingback a:hover,
    .comment-list .trackback a:hover,
    .comment-metadata a:hover,
    .comment-reply-title small a:hover,
    .entry-title a:hover,
    .entry-meta a:hover,
    .entry-content .edit-link a:hover,
    .post-navigation a:hover,
    .image-navigation a:hover,
    .lmpixels-arrows-nav > div:hover i {
        color: '.$theme_main_color.';
    }

    .start-page-content .page-header .title-block h2 {
        color: '.$sp_title_color.';
    }

    .start-page-content .page-header .title-block .sp-subtitle {
        color: '.$sp_subtitle_color.';
    }

    a {
        color: '.$links_color.';
    }

    a:hover {
        color: '.$links_hover_color.';
    }
    ';




    $css .= '
    .border-top,
    .border-bottom,
    .timeline-item,
    .timeline-item:before,
    blockquote,
    .page-links a:hover,
    .paging-navigation .page-numbers.current,
    .paging-navigation a:hover {
        border-color: '.$theme_main_color.';
    }

    .testimonial-content .testimonial-text,
    .preloader-spinner:after {
        border-top-color: '.$theme_main_color.';
    }
    ';





    $cp_general_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_bg_color') : '#2eca7f';
    $cp_general_bg_image = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_bg_img') : '';
    $cp_general_content_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_content_bg_color') : '#ffffff';
    $cp_general_title_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/size') : '44';
    $cp_general_title_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/color') : '#ffffff';
    $cp_general_title_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/family') : 'Montserrat';
    $cp_general_title_variation = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/variation') : '600';
    $cp_general_title_weight = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/weight') : '600';
    $cp_general_title_spacing = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/letter-spacing') : '0';
    $cp_general_title_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/style') : 'normal';
    if ( $cp_general_title_weight == '' ) {
        $cp_general_title_weight = intval($cp_general_title_variation);
        $cp_general_title_style = ( strpos( $cp_general_title_variation, 'italic' ) ) ? 'italic' : 'normal';
        if ( $cp_general_title_weight == 'regular' ) {
            $cp_general_title_weight = '400';
            $cp_general_title_style = 'normal';
        }
        if ( $cp_general_title_weight == 'italic' ) {
            $cp_general_title_weight = '400';
            $cp_general_title_style = 'italic';
        }
    }
    $cp_general_title_align = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_align') : 'center';

    $css .= '
    .section-inner > .page-header,
    .content-area > .page-header {
        background-color: '.$cp_general_bg_color.';
    ';
    if (!empty($cp_general_bg_image)) {
        $css .= '
        background-image: url('.$cp_general_bg_image['url'].');
        ';
    }
    $css .='
    }
    ';

    $css .= '
    .page-header h2 {
        color: '.$cp_general_title_color.';
        font-size: '.$cp_general_title_size.'px;
        font-family: '.$cp_general_title_font.', Helvetica, sans-serif;
        font-weight: '.$cp_general_title_weight.';
        font-style: '.$cp_general_title_style.';
        letter-spacing: '.$cp_general_title_spacing.'px;
    ';
    if ($cp_general_title_align == 'left') {
        $css .= '
        text-align: left;
        ';
    } elseif ($cp_general_title_align == 'center') {
        $css .= '
        text-align: center;
        ';
    } elseif ($cp_general_title_align == 'right') {
        $css .= '
        text-align: right;
        ';
    }
    $css .= '
    }
    ';

    $css .= '
    .page-content,
    .custom-page-content .page-content,
    .portfolio-page-content,
    .content-page-with-sidebar .page-content,
    .start-page-content .page-content,
    .single-page-content .content-area .page-content {
        background-color: '.$cp_general_content_bg_color.';
    }
    ';

    $args = array(
        'numberposts' => -1,
        'category'    => 0,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'include'     => array(),
        'exclude'     => array(),
        'meta_key'    => '',
        'meta_value'  =>'',
        'post_type'   => 'page',
        'suppress_filters' => true,
    );

    $posts = get_posts( $args );

    foreach($posts as $post){ setup_postdata($post);
    $custom_page_header = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_post_option($post->ID, 'cp_custom_header/cp_custom_header_switcher', '') : 'off';


    if ($custom_page_header == "on") {
    $cp_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_post_option($post->ID, 'cp_custom_header/on/cp_bg_color', '') : '';
    $cp_title_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_post_option($post->ID, 'cp_custom_header/on/cp_title_color', '') : '';
    $cp_bg_image = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_post_option($post->ID, 'cp_custom_header/on/cp_bg_img', '') : '';
    
    $css .= '
    .pt-page-'.$post->post_name.' > .section-inner > .page-header,
    .page-id-'.$post->ID.' .content-area > .page-header {
        background-color: '.$cp_bg_color.';
    ';
    if (!empty($cp_bg_image)) {
        $css .= '
        background-image: url('.$cp_bg_image['url'].');
        ';
    }
    $css .= '
    }
    ';

    $css .= '
    .pt-page-'.$post->post_name.' .page-header h2,
    .page-id-'.$post->ID.' .page-header h2 {
        color: '.$cp_title_color.';
    }
    ';

    }


    $custom_page_content_area = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_post_option($post->ID, 'cp_custom_content_area/cp_custom_ca_switcher', '') : 'off';
    if ($custom_page_content_area == 'on') {
        $cp_ca_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_post_option($post->ID, 'cp_custom_content_area/on/cp_ca_bg_color', '') : '#ffffff';
        $css .= '
        .pt-page-'.$post->post_name.' .page-content,
        .page-id-'.$post->ID.' .page-content {
            background-color: '.$cp_ca_bg_color.' ?>
        }
        ';
    }

    }

    wp_reset_postdata();



    $css .= '
    .portfolio-grid figure .portfolio-preview-desc .portfolio-preview-desc-inner {
        background-color: '.$portfolio_odd_elements_bg.';
    }

    .portfolio-grid figure:nth-child(even) .portfolio-preview-desc .portfolio-preview-desc-inner {
        background-color: '.$portfolio_even_elements_bg.';
    }
    ';



    if ( $pages_shadow == 'off' ) {
    $css .= '
    .single-page-content .content-area,
    .pt-page .section-inner {
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
    }
    ';
    }





    $css .= $custom_styles;

    $customization_css = $css;

    return apply_filters( 'aveo_theme_customizations', $customization_css );

}