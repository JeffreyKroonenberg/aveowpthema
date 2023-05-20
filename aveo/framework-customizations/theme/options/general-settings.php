<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'general' => array(
		'title'   => esc_html__( 'General', 'aveo' ),
		'type'    => 'tab',
		'options' => array(
			'general-box' => array(
				'title'   => esc_html__( 'General Settings', 'aveo' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'logo'	=> array(
						'label' => esc_html__( 'Text Logo', 'aveo' ),
						'desc'  => esc_html__( 'Write your website logo name', 'aveo' ),
						'type'  => 'text',
						'value' => get_bloginfo( 'name' ),
						'help'    => esc_html__( 'If you want to use the logo as an image, you can upload it below, in which case this field can be left blank.', 'aveo' ),
					),
					'logo_color'	=> array(
						'label' => esc_html__( 'The Color Part of the Text Logo', 'aveo' ),
						'desc'  => esc_html__( 'Write your website logo name', 'aveo' ),
						'type'  => 'text',
						'value' => '',
						'help'    => esc_html__( 'If you want to use the logo as an image, you can upload it below, in which case this field can be left blank.', 'aveo' ),
					),
					'photo'	=> array(
						'label' => esc_html__( 'Image Logo', 'aveo' ),
						'desc'  => esc_html__( 'Upload the logo.', 'aveo' ),
						'type'  => 'upload',
					),
					'logo_img_height'	=> array(
						'label' => esc_html__( 'Logo Image Height', 'aveo' ),
						'desc'  => esc_html__( 'Set logo image height in the pixels. Example: 40.', 'aveo' ),
						'type'  => 'short-text',
						'value' => '40'
					),
					'logo_img_width'	=> array(
						'label' => esc_html__( 'Logo Image Width', 'aveo' ),
						'desc'  => esc_html__( 'Set logo image width in the pixels. Example 100.', 'aveo' ),
						'type'  => 'short-text',
						'value' => '40'
					),
					'copyrights' => array(
						'label' => esc_html__( 'Copyrights', 'aveo' ),
						'desc'  => false,
						'type'  => 'text',
						'value' => ''
					),
				)
			)
		)
	)
);