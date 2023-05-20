<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Filters and Actions
 */

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 * @internal
 */
function aveo_action_theme_admin_fonts() {
	wp_enqueue_style( 'fw-theme-lato', aveo_theme_font_url(), array(), '1.0' );
}

add_action( 'admin_print_scripts-appearance_page_custom-header', 'aveo_action_theme_admin_fonts' );

add_action( 'admin_enqueue_scripts', 'aveo_load_admin_styles' );
function aveo_load_admin_styles() {
    wp_enqueue_style( 'admin_css_foo', get_template_directory_uri() . '/css/admin-style.css', false, '1.0' );
}

if ( ! function_exists( 'aveo_action_theme_setup' ) ) : /**
 * Theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 * @internal
 */ {
	function aveo_action_theme_setup() {

		/*
		 * Make Theme available for translation.
		 */
		load_theme_textdomain( 'aveo', get_template_directory() . '/languages' );

		// This theme styles the visual editor to resemble the theme style.
		add_editor_style( array( 'css/editor-style.css', aveo_theme_font_url() ) );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'custom-background');
        add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 811, 372, true );
		add_image_size( 'aveo-theme-full-width', 1038, 576, true );

        add_theme_support( 'admin-bar', array( 'callback'=>'__return_false' ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );
	}
}
endif;
add_action( 'init', 'aveo_action_theme_setup' );

/**
 * Adjust content_width value for image attachment template.
 * @internal
 */
function aveo_action_theme_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}

add_action( 'template_redirect', 'aveo_action_theme_content_width' );

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 *
 * @param array $classes A list of existing body class values.
 *
 * @return array The filtered body class list.
 * @internal
 */
function aveo_filter_theme_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} else {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( function_exists('fw_ext_sidebars_get_current_position') ) {
		$current_position = fw_ext_sidebars_get_current_position();
		if ( in_array( $current_position, array( 'full', 'left' ) )
		     || empty($current_position)
		     || is_attachment()
		) {
			$classes[] = 'full-width';
		}
	} else {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}

	return $classes;
}

add_filter( 'body_class', 'aveo_filter_theme_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @param array $classes A list of existing post class values.
 *
 * @return array The filtered post class list.
 * @internal
 */
function aveo_filter_theme_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}

add_filter( 'post_class', 'aveo_filter_theme_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 *
 * @return string The filtered title.
 * @internal
 */
function aveo_filter_theme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'aveo' ), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', 'aveo_filter_theme_wp_title', 10, 2 );


/**
 * Flush out the transients used in fw_theme_categorized_blog.
 * @internal
 */
function aveo_action_theme_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'fw_theme_category_count' );
}

add_action( 'edit_category', 'aveo_action_theme_category_transient_flusher' );
add_action( 'save_post', 'aveo_action_theme_category_transient_flusher' );

/**
 * Theme Customizer support
 */
{
	/**
	 * Implement Theme Customizer additions and adjustments.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 *
	 * @internal
	 */
	function aveo_action_theme_customize_register( $wp_customize ) {
        $wp_customize->remove_section("colors");
		// Add postMessage support for site title and description.
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		// Rename the label to "Site Title Color" because this only affects the site title in this theme.
		$wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Site Title Color', 'aveo' );

		// Rename the label to "Display Site Title & Tagline" in order to make this option extra clear.
		$wp_customize->get_control( 'display_header_text' )->label = esc_html__( 'Display Site Title &amp; Tagline', 'aveo' );
	}

	add_action( 'customize_register', 'aveo_action_theme_customize_register' );

	/**
	 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
	 * @internal
	 */
	function aveo_action_theme_customize_preview_js() {
		wp_enqueue_script(
			'fw-theme-customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'1.0',
			true
		);
	}

	add_action( 'customize_preview_init', 'aveo_action_theme_customize_preview_js' );
}

/**
 * Register widget areas.
 * @internal
 */
function aveo_action_theme_widgets_init() {
    register_sidebar(
        array(
            'name' => esc_html__('Blog Page Sidebar','aveo'),
            'id'   => 'aveo-blog-sidebar',
            'description'   => esc_html__('AVEO Theme Blog Page Sidebar','aveo'),
            'before_widget' => '<div class="sidebar-item">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="sidebar-title"><h4>',
            'after_title'   => '</h4></div>'
        )
    );
    
	register_sidebar( 
		array(
			'name' => esc_html__( 'AVEO Template Pages', 'aveo' ),
			'id'            => 'aveo_template_pages',
			'description'   => esc_html__( 'Use only AVEO widgets in here.', 'aveo' ),
			'before_widget' => "",
			'after_widget'  => "",
			'before_title'  => '<span class="hidden">',
			'after_title'   => '</span>'
		) 
	);
}

add_action( 'widgets_init', 'aveo_action_theme_widgets_init' );

if ( defined( 'FW' ) ):
	/**
	 * Display current submitted FW_Form errors
	 * @return array
	 */
	if ( ! function_exists( '_action_theme_display_form_errors' ) ):
		function aveo_action_theme_display_form_errors() {
			$form = FW_Form::get_submitted();

			if ( ! $form || $form->is_valid() ) {
				return;
			}

			wp_enqueue_script(
				'fw-theme-show-form-errors',
				get_template_directory_uri() . '/js/form-errors.js',
				array( 'jquery' ),
				'1.0',
				true
			);

			wp_localize_script( 'fw-theme-show-form-errors', '_localized_form_errors', array(
				'errors'  => $form->get_errors(),
				'form_id' => $form->get_id()
			) );
		}
	endif;
	add_action('wp_enqueue_scripts', 'aveo_action_theme_display_form_errors');
endif;


add_filter('fw:option_type:icon-v2:packs', 'aveo_add_peicon_pack');
function aveo_add_peicon_pack($default_packs) {
    return array(
      'my_pack' => array(
        'name' => 'my_pack',
        'title' => 'Material Design Iconic Font',
        'css_class_prefix' => 'zmdi',
        'css_file' => get_template_directory() . ('/css/material-design-iconic-font/css/material-design-iconic-font.css'),
        'css_file_uri' => get_template_directory_uri() . ('/css/material-design-iconic-font/css/material-design-iconic-font.css'),
      )
    );
}



/**
 * Megamenu icons set
 */
function aveo_filter_mega_menu_icon_customizations($option) {
    $option['type'] = 'icon-v2';

    return $option;
}
add_filter( 'fw:ext:megamenu:icon-option', 'aveo_filter_mega_menu_icon_customizations' );



/**
 * Enqueue Google fonts style to frontend.
 */

if (!defined('FW')) {
    function aveo_action_theme_process_google_fonts_default()
    {
    // this array contain default theme fonts
    $include_from_google = array(
        'Montserrat' => array(
            'family' => 'Montserrat',
            'variants' => array(
                '0' => '300',
                '1' => 'regular',
                '2' => '600',
            ),
            'position' => 11278
        ),
        'Roboto' => array(
            'family' => 'Roboto',
            'variants' => array(
                '0' => 'regular',
                '1' => 'italic',
                '2' => '600',
                '3' => '700',
                '4' => '700italic',
            ),
            'position' => 12958
        )
    );

    $google_fonts_links = aveo_theme_get_remote_fonts($include_from_google);
    // set an array of google fonts in db
    update_option( 'aveo_theme_google_fonts_link', $google_fonts_links );

    }
    add_action('after_setup_theme', 'aveo_action_theme_process_google_fonts_default', 999, 2);
}


if(!function_exists('aveo_action_theme_process_google_fonts')) {
    function aveo_action_theme_process_google_fonts()
    {
        $include_from_google = array();
        $google_fonts = fw_get_google_fonts();

        $body_typography = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography') :  'PT Sans';
        $headings_typography = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings') :  'Oxygen';

        // if is google font
        if( isset($google_fonts[$body_typography['family']]) ){
            $include_from_google[$body_typography['family']] =   $google_fonts[$body_typography['family']];
        }

        if( isset($google_fonts[$headings_typography['family']]) ){
            $include_from_google[$headings_typography['family']] =   $google_fonts[$headings_typography['family']];
        }

        $google_fonts_links = aveo_theme_get_remote_fonts($include_from_google);
        // set a option in db for save google fonts link
        update_option( 'aveo_theme_google_fonts_link', $google_fonts_links );
    }
    add_action('fw_settings_form_saved', 'aveo_action_theme_process_google_fonts', 999, 2);
}

if (!function_exists('aveo_theme_get_remote_fonts')) :
    function aveo_theme_get_remote_fonts($include_from_google) {
        /**
         * Get remote fonts
         * @param array $include_from_google
         */
        if ( ! sizeof( $include_from_google ) ) {
            return '';
        }

        $protocol  = is_ssl() ? 'https' : 'http';

        $html = "{$protocol}://fonts.googleapis.com/css?family=";

        foreach ( $include_from_google as $font => $styles ) {
            $html .= str_replace( ' ', '+', $font ) . ':' . implode( ',', $styles['variants'] ) . '%7C';
        }

        $html = substr( $html, 0, - 3 );

        return $html;
    }
endif;

if (!function_exists('aveo_action_theme_enqueue_google_fonts_styles')) :
    function aveo_action_theme_enqueue_google_fonts_styles() {
        /**
         * Enqueue google fonts styles
         */
        $google_fonts_link = get_option('aveo_theme_google_fonts_link', '');
        if($google_fonts_link != ''){
            wp_enqueue_style( 'aveo-google-fonts', $google_fonts_link, array(), null);
        }
    }
    add_action('wp_head', 'aveo_action_theme_enqueue_google_fonts_styles', 1);
endif;




/**
 * Porfolio detailed page Ajax query.
 */

function aveo_ajax_query() {
    // Return normally if the ajax query isn't set
    if ( ! isset( $_GET['ajax'] ) ) {
        return;
    }

    set_query_var( 'ajax', 'true' );
}

add_filter( 'template_redirect', 'aveo_ajax_query' );

function aveo_add_anchor( $atts, $item, $args ) {

    $atts['href'] .= ( !empty( $item->xfn ) ? '#' . $item->xfn : '' );

    return $atts;

}

add_filter( 'nav_menu_link_attributes', 'aveo_add_anchor', 10, 3 );

function aveo_masonry_post_thumbnail_sizes_attr($attr, $attachment, $size) {
    //Blog Masonry Grid Thumbnails
    if ($size === 'blog-masonry-image-one-c') {
        $attr['sizes'] = '92vw';
    } elseif ($size === 'blog-masonry-image-two-c') {
        $attr['sizes'] = '(max-width: 768px) 92vw, (max-width: 992px) 450px, (max-width: 1200px) 597px, 40vw';
    } elseif  ($size === 'blog-masonry-image-three-c') {
        $attr['sizes'] = '(max-width: 768px) 92vw, (max-width: 992px) 320px, (max-width: 1200px) 400px, 25vw';
    }
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'aveo_masonry_post_thumbnail_sizes_attr', 10 , 3);