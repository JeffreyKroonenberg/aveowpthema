<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'aveo' ),
		'popup-title'   => esc_html__( 'Add/Edit Tab', 'aveo' ),
		'desc'          => esc_html__( 'Create your tabs', 'aveo' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title' => array(
				'type'  => 'text',
				'label' => esc_html__('Title', 'aveo' )
			),
			'tab_content' => array(
				'type'  => 'textarea',
				'label' => esc_html__('Content', 'aveo' )
			)
		),
	)
);