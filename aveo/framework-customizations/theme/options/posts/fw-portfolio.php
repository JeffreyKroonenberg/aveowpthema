<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$template_directory = get_template_directory_uri();
$settings_page_link = is_admin() ? menu_page_url( fw()->backend->_get_settings_page_slug(), false ) : '#';
$options            = array(
	'main' => array(
		'title'   => esc_html__( 'Project Options', 'aveo' ),
		'type'    => 'box',
		'options' => array(
			'portfolio_type'   => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'value'        => array(
				'portfolio_type_picker' => 'standard',
				),
				'picker'       => array(
					'portfolio_type_picker' => array(
						'label'   => esc_html__( 'Portfolio Type', 'aveo' ),
						'type'    => 'radio',
						'choices' => array(
							'standard' => esc_html__( 'Standard', 'aveo' ),
							'lbimage'  => esc_html__( 'Lightbox Featured Image', 'aveo' ),
							'lbvideo'  => esc_html__( 'Lightbox Video', 'aveo' ),
							'lbaudio'  => esc_html__( 'Lightbox Audio', 'aveo' ),
							'direct'   => esc_html__( 'Direct URL', 'aveo' ),
						),
					)
				),
				'choices'      => array(
					'standard'  => array(
						'pf_client'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Client', 'aveo' ),
						),
						'pf_site_text'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL Text', 'aveo' ),
						),
						'pf_site_url'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL', 'aveo' ),
						),
						'pf_description' => array(
							'label' => esc_html__( 'Short Description', 'aveo' ),
							'type'  => 'wp-editor',
							'value' => '',
							'desc'  => false,
							'help'  => false,
							'reinit' => true,
						),
						'pf_tags'            => array(
							'label'  => esc_html__( 'Project Tags', 'aveo' ),
							'type'   => 'addable-option',
							'option' => array(
								'type' => 'text',
							),
							'value'  => array(),
							'desc'   => false
						),
						'pf_gallery_grid' => array(
							'type'         => 'multi-picker',
							'label'        => false,
							'desc'         => false,
							'picker'       => array(
								'pf_gallery_grid_picker' => array(
									'label'        => esc_html__( 'Show Gallery as Grid', 'aveo' ),
									'type'         => 'switch',
									'right-choice' => array(
										'value' => 'on',
										'label' => esc_html__( 'On', 'aveo' )
									),
									'left-choice'  => array(
										'value' => 'off',
										'label' => esc_html__( 'Off', 'aveo' )
									),
									'value'        => 'off',
								)
							),
							'choices'      => array(
								'on' => array(
									'pf_gallery_grid_columns'	=> array(
										'label'   => esc_html__( 'Gallery Grid', 'aveo' ),
										'type'    => 'radio',
										'value'   => 'two-columns',
										'desc'    => false,
										'choices' => array(
											'one-column' => esc_html__( '1 Column', 'aveo' ),
											'two-columns' => esc_html__( '2 Columns', 'aveo' ),
											'three-columns' => esc_html__( '3 Columns', 'aveo' ),
										),
									),
								),
							),
							'show_borders' => false,
						),
					),
					'lbvideo'  => array(
						'videourl'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Video URL', 'aveo' ),
						)
					),
					'lbaudio'  => array(
						'audiourl'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Audio URL', 'aveo' ),
						)
					),
					'direct'  => array(
						'directurl'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Direct URL', 'aveo' ),
						)
					),
				),
				'show_borders' => false,
			),
		),
	),
);
