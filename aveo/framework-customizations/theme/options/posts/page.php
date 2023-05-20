<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$template_directory = get_template_directory_uri();
$settings_page_link = is_admin() ? menu_page_url( fw()->backend->_get_settings_page_slug(), false ) : '#';
$options            = array(
	'main' => array(
		'title'   => false,
		'type'    => 'box',
		'options' => array(
			'page_title_design' => array(
				'title'   => esc_html__( 'Page Title Design', 'aveo' ),
				'type'    => 'tab',
				'options' => array(
					'cp_custom_header'       => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'cp_custom_header_switcher' => array(
								'label'        => esc_html__( 'Custom Page Title Design', 'aveo' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'on', 'aveo' )
								),
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'Off', 'aveo' )
								),
								'value'        => 'off',
								'desc'         => esc_html__( 'If the switch is in the Off position, general page title design settings apply. General settings can be changed on the page "Appearance -> Theme Settings".',
									'aveo' ),
							)
						),
						'choices'      => array(
							'on' => array(
								'cp_bg_color' => array(
									'label' => __( 'Background Color', 'aveo' ),
									'type'  => 'rgba-color-picker',
									'value' => 'rgba(46, 202, 127, 1)',
									'desc'  => __( 'Select the background color of the title.',
										'aveo' ),
								),
								'cp_bg_img'        => array(
									'label' => __( 'Background Image', 'aveo' ),
									'desc'  => __( 'Select a background image.', 'aveo' ),
									'type'  => 'upload',
								),
								'cp_title_color'            => array(
									'label' => __( 'Title Color', 'aveo' ),
									'type'  => 'color-picker',
									'value' => '#ffffff',
									'desc'  => __( 'Select the color of the title.',
										'aveo' ),
								),
							),
						),
						'show_borders' => false,
					),
				),
			),
			'page_content_area_design' => array(
				'title'   => esc_html__( 'Page Content Area Design', 'aveo' ),
				'type'    => 'tab',
				'options' => array(
					'cp_custom_content_area'       => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'cp_custom_ca_switcher' => array(
								'label'        => esc_html__( 'Custom Content Area Design', 'aveo' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'on', 'aveo' )
								),
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'Off', 'aveo' )
								),
								'value'        => 'off',
								'desc'         => esc_html__( 'If the switch is in the Off position, general content area design settings apply. General settings can be changed on the page "Appearance -> Theme Settings".',
									'aveo' ),
							)
						),
						'choices'      => array(
							'on' => array(
								'cp_ca_bg_color' => array(
									'label' => __( 'Background Color', 'aveo' ),
									'type'  => 'rgba-color-picker',
									'value' => 'rgba(46, 202, 127, 1)',
									'desc'  => __( 'Select the background color of the title.',
										'aveo' ),
								),
							),
						),
						'show_borders' => false,
					),
				),
			),
		),
	),
);
