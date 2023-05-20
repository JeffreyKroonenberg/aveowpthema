<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$options = array(
    'video' => array(
        'label' => esc_html__('Video', 'aveo'),
        'desc'  => esc_html__('Enter Youtube or Vimeo video URL', 'aveo'),
        'type'  => 'text',
    ),

    'format'   => array(
        'type'    => 'select',
        'label'   => esc_html__('Aspect Ratio', 'aveo'),
        'choices' => array(
            '16by9' => esc_html__('16:9', 'aveo'),
            '4by3' => esc_html__('4:3', 'aveo')
        ),
        'value'   => '16by9'
    ),

    'lazy_load'  => array(
        'label'        => esc_html__( 'YouTube and Vimeo video lazy loading', 'aveo' ),
        'type'         => 'switch',
        'right-choice' => array(
            'value' => 'on',
            'label' => esc_html__( 'On', 'aveo' )
        ),
        'left-choice'  => array(
            'value' => 'off',
            'label' => esc_html__( 'Off', 'aveo' )
        ),
        'value'        => 'on',
        'desc'         => false,
        'help'         => false,
    ),

    'class'  => array(
        'attr'  => array( 'class' => 'border-bottom-none'),
        'label'   => esc_html__( 'Custom Class', 'aveo' ),
        'desc'    => esc_html__( 'Enter custom CSS class', 'aveo' ),
        'type'    => 'text',
        'help' => esc_html__('You can use this class to further style this shortcode by adding your custom CSS.','aveo'),
        'value' => '',
    ),

);