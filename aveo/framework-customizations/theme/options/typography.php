<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'typography_customization' => array(
		'title'   => esc_html__( 'Typography', 'aveo' ),
		'type'    => 'tab',
		'options' => array(
			'typography_options' => array(
				'title'   => esc_html__( 'Typography', 'aveo' ),
				'type'    => 'box',
				'options' => array(
					'body_typography' => array(
					    'type' => 'typography-v2',
					    'value' => array(
					        'family' => 'Roboto',
					        // For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
					        'style' => 'normal',
					        'weight' => 400,
					        'subset' => 'latin-ext',
					        'variation' => 'regular',
					        'size' => 33,
					        'line-height' => 33,
					        'letter-spacing' => 0,
					        'color' => '#424242'
					    ),
					    'components' => array(
					        'family'         => true,
					        // 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
					        'size'           => false,
					        'line-height'    => false,
					        'letter-spacing' => false
					    ),
					    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					    'label' => esc_html__('Body Text', 'aveo'),
					    'desc'  => false,
					    'help'  => false,
					),
					'headings' => array(
					    'type' => 'typography-v2',
					    'value' => array(
					        'family' => 'Montserrat',
					        // For standard fonts, instead of subset and variation you should set 'style' and 'weight'.
					        'style' => 'normal',
					        'weight' => 600,
					        'subset' => 'latin-ext',
					        'variation' => '600',
					        'size' => 33,
					        'line-height' => 33,
					        'letter-spacing' => 0,
					        'color' => '#212121'
					    ),
					    'components' => array(
					        'family'         => true,
					        // 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
					        'size'           => false,
					        'line-height'    => false,
					        'letter-spacing' => false
					    ),
					    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					    'label' => esc_html__('Headings Font', 'aveo'),
					    'desc'  => false,
					    'help'  => false,
					),
					'h1'                => array(
						'label' => esc_html__( 'H1 Size', 'aveo' ),
						'type'  => 'typography',
						'value' => array(
							'size' => 30,
							'style'  => '600',
						),
						'components' => array(
					        'family' => false,
					        'size'   => true,
					        'style'  => true,
					        'color'  => false
					    ),
						'desc'  => esc_html__( 'H1 heading size',
							'aveo' ),
					),
					'h2'                => array(
						'label' => esc_html__( 'H2 Size', 'aveo' ),
						'type'  => 'typography',
						'value' => array(
							'size' => 24,
							'style'  => '600',
						),
						'components' => array(
					        'family' => false,
					        'size'   => true,
					        'style'  => true,
					        'color'  => false
					    ),
						'desc'  => esc_html__( 'H2 heading size',
							'aveo' ),
					),
					'h3'                => array(
						'label' => esc_html__( 'H3 Size', 'aveo' ),
						'type'  => 'typography',
						'value' => array(
							'size' => 18,
							'style'  => '600',
						),
						'components' => array(
					        'family' => false,
					        'size'   => true,
					        'style'  => true,
					        'color'  => false
					    ),
						'desc'  => esc_html__( 'H1 heading size',
							'aveo' ),
					),
					'h4'                => array(
						'label' => esc_html__( 'H4 Size', 'aveo' ),
						'type'  => 'typography',
						'value' => array(
							'size' => 15,
							'style'  => '600',
						),
						'components' => array(
					        'family' => false,
					        'size'   => true,
					        'style'  => true,
					        'color'  => false
					    ),
						'desc'  => esc_html__( 'H4 heading size',
							'aveo' ),
					),
					'h5'                => array(
						'label' => esc_html__( 'H5 Size', 'aveo' ),
						'type'  => 'typography',
						'value' => array(
							'size' => 13,
							'style'  => '600',
						),
						'components' => array(
					        'family' => false,
					        'size'   => true,
					        'style'  => true,
					        'color'  => false
					    ),
						'desc'  => esc_html__( 'H5 heading size',
							'aveo' ),
					),
					'h6'                => array(
						'label' => esc_html__( 'H6 Size', 'aveo' ),
						'type'  => 'typography',
						'value' => array(
							'size' => 11,
							'style'  => '600',
						),
						'components' => array(
					        'family' => false,
					        'size'   => true,
					        'style'  => true,
					        'color'  => false
					    ),
						'desc'  => esc_html__( 'H6 heading size',
							'aveo' ),
					),

				)
			),
		)
	)
);