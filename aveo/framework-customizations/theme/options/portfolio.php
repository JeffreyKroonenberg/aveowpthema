<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'portfolio' => array(
		'title'   => esc_html__( 'Portfolio', 'aveo' ),
		'type'    => 'tab',
		'options' => array(
			'portfolio_settings' => array(
				'title'   => esc_html__( 'Portfolio Settings', 'aveo' ),
				'type'    => 'box',
				'options' => array(
					'portfolio_titles' => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'portfolio_titles_switcher' => array(
								'label'        => esc_html__( 'Custom Portfolio Titles', 'aveo' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'on', 'aveo' )
								),
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'Off', 'aveo' )
								),
								'value'        => 'on',
							)
						),
						'choices'      => array(
							'on' => array(
								'description_title'	=> array(
									'label' => esc_html__( 'Description Title', 'aveo' ),
									'desc'  => esc_html__( 'Description title.', 'aveo' ),
									'type'  => 'text',
									'value' => esc_html__( 'Description', 'aveo' ),
								),
								'technology_title'	=> array(
									'label' => esc_html__( 'Technology Title', 'aveo' ),
									'desc'  => esc_html__( 'Technology title.', 'aveo' ),
									'type'  => 'text',
									'value' => esc_html__( 'Technology', 'aveo' ),
								),
								'share_title'	=> array(
									'label' => esc_html__( 'Share Title', 'aveo' ),
									'desc'  => esc_html__( 'Share title.', 'aveo' ),
									'type'  => 'text',
									'value' => esc_html__( 'Share', 'aveo' ),
								),
							),
						),
						'show_borders' => false,
					),
					'portfolio_desc_sidebar' => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'portfolio_sidebar_switcher' => array(
								'label'        => esc_html__( 'Display a Sidebar with a Description, Tags and Share Links.', 'aveo' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'on', 'aveo' )
								),
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'Off', 'aveo' )
								),
								'value'        => 'on',
							)
						),
						'choices'      => array(
							'on' => array(
								'portfolio_desc_fields' => array(
								    'type'  => 'checkboxes',
								    'value' => array(
								        'client' => true,
								        'site' => true,
								        'date' => true,
								    ),
								    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
								    'label' => __('Display Fields in the Description Block', 'aveo'),
								    'desc'  => __('These settings apply only to the standard project type.', 'aveo'),
								    'choices' => array(
								        'client' => __('Client', 'aveo'),
								        'site' => __('Site', 'aveo'),
								        'date' => __('Date', 'aveo'),
								    ),
								    'inline' => false,
								)
							),
						),
						'show_borders' => false,
					),
					'portfolio_load_more' => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'portfolio_load_more_switcher' => array(
								'label'        => esc_html__( 'Load More Feature', 'aveo' ),
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
							)
						),
						'choices'      => array(
							'on' => array(
								'projects_number'	=> array(
									'label' => esc_html__( 'Number of Projects Displayed by Default', 'aveo' ),
									'type'  => 'text',
									'value' => '9',
								),
								'button_text'	=> array(
									'label' => esc_html__( 'Load More Button Text', 'aveo' ),
									'type'  => 'text',
									'value' => esc_html__( 'Load More', 'aveo' ),
								),
								'button_text_loading'	=> array(
									'label' => esc_html__( 'Load More Button Text on Loading', 'aveo' ),
									'type'  => 'text',
									'value' => esc_html__( 'Loading...', 'aveo' ),
								),

							),
						),
						'show_borders' => false,
					)
				)
			),
		)
	)
);
