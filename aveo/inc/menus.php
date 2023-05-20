<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Register menus
 */
register_nav_menus( array(
    'classic-menu' => esc_html__( 'Classic Menu', 'aveo' ),
    'aveo-template-menu' => esc_html__( 'AVEO Template Additional Menu', 'aveo' ),
) );