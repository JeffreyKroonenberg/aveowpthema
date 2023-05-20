<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'id'     => array( 'type' => 'unique' ),
	'label'  => array(
		'label' => esc_html__( 'Button Label', 'aveo' ),
		'desc'  => esc_html__( 'This is the text that appears on your button', 'aveo' ),
		'type'  => 'text',
		'value' => 'Submit'
	),
	'link'   => array(
		'label' => esc_html__( 'Button Link', 'aveo' ),
		'desc'  => esc_html__( 'Where should your button link to', 'aveo' ),
		'type'  => 'text',
		'value' => '#'
	),
	'target' => array(
		'type'  => 'switch',
		'label'   => esc_html__( 'Open Link in New Window', 'aveo' ),
		'desc'    => esc_html__( 'Select here if you want to open the linked page in a new window', 'aveo' ),
		'right-choice' => array(
			'value' => '_blank',
			'label' => esc_html__('Yes', 'aveo'),
		),
		'left-choice' => array(
			'value' => '_self',
			'label' => esc_html__('No', 'aveo'),
		),
	),
	'btn_type'  => array(
		'label' => esc_html__( 'Button Type', 'aveo' ),
		'desc'  => esc_html__( 'Select the button type', 'aveo' ),
		'type'  => 'select',
		'value' => 'primary',
		'choices' => array(
            'primary'  => esc_html__( 'Primary Button', 'aveo' ),
            'secondary'  => esc_html__( 'Secondary Button', 'aveo' ),
		)
	),
	'margin_top'  => array(
		'label' => esc_html__( 'Margin Top', 'aveo' ),
		'desc'  => esc_html__( 'Margin top in pixels. Example: 10', 'aveo' ),
		'type'  => 'short-text',
		'value' => '0'
	),
	'margin_bottom'  => array(
		'label' => esc_html__( 'Margin Bottom', 'aveo' ),
		'desc'  => esc_html__( 'Margin bottom in pixels. Example: 10', 'aveo' ),
		'type'  => 'short-text',
		'value' => '0'
	),
);