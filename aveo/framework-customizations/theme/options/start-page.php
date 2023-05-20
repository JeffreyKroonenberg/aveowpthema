<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'start_page' => array(
		'title'   => esc_html__( 'Start Page', 'aveo' ),
		'type'    => 'tab',
		'options' => array(
			'general-box' => array(
				'title'   => esc_html__( 'Start Page Settings', 'aveo' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'hp_main_photo'	=> array(
						'label' => esc_html__( 'Main Photo', 'aveo' ),
						'desc'  => esc_html__( 'Upload a main photo.', 'aveo' ),
						'type'  => 'upload'
					),
					'hp_main_title'	=> array(
						'label' => esc_html__( 'Main Title', 'aveo' ),
						'desc'  => esc_html__( 'Write your main title', 'aveo' ),
						'type'  => 'text',
						'value' => get_bloginfo( 'name' )
					),
					'hp_subtitles'            => array(
						'label'  => esc_html__( 'Subtitles Carousel', 'aveo' ),
						'type'   => 'addable-option',
						'option' => array(
							'type' => 'text',
						),
						'value'  => array(),
						'desc'   => false
					),
					'hp_social'            => array(
					    'type' => 'addable-popup',
					    'value' => array(
					    ),
					    'label' => __('Social Icons', 'aveo'),
					    'template' => '{{- title }}',
					    'popup-title' => null,
					    'size' => 'small', // small, medium, large
					    'limit' => 0, // limit the number of popup`s that can be added
					    'add-button-text' => __('Add', 'aveo'),
					    'sortable' => true,
					    'popup-options' => array(
					    	'title' => array(
					            'label' => __('Title', 'aveo'),
					            'type' => 'text',
					            'value' => '',
					        ),
					        'icon'    => array(
								'type'  => 'icon',
								'label' => esc_html__('Choose an Icon', 'aveo'),
							),
							'image'	=> array(
								'label' => esc_html__( 'Use a Graphic Icon Instead of a Font', 'aveo' ),
								'desc'  => esc_html__( 'Add an icon image. In this case, the previous field will have no effect.', 'aveo' ),
								'type'  => 'upload',
							),
					        'link' => array(
					            'label' => __('Social Link', 'aveo'),
					            'type' => 'text',
					            'value' => '',
					        ),
					    ),
					),
				)
			),
		)
	)
);