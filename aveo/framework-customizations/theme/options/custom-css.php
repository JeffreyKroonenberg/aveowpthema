<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( function_exists( 'aveo_tracking_wp_head' ) ) {
	$options = array(
		'custom_css_js' => array(
			'title'   => esc_html__( 'Custom CSS and JS', 'aveo' ),
			'type'    => 'tab',
			'options' => array(
				'custom_css_js_fields' => array(
					'title'   => esc_html__( 'Custom CSS and JS', 'aveo' ),
					'type'    => 'box',
					'options' => array(
						'custom_styles'	=> array(
							'label' => esc_html__( 'Custom CSS', 'aveo' ),
							'desc'  => esc_html__( 'Add your custom CSS styles.', 'aveo' ),
							'type'  => 'textarea',
							'value' => '',
						),
						'external_styles'	=> array(
							'label' => esc_html__( 'External CSS', 'aveo' ),
							'desc'  => esc_html__( 'Add your custom external (.css) file. Example: &lt;link rel="stylesheet" type="text/css" href="yourstyle.css"&gt;', 'aveo' ),
							'type'  => 'textarea',
							'value' => '',
						),
						'external_js'	=> array(
							'label' => esc_html__( 'External JS', 'aveo' ),
							'desc'  => esc_html__( 'Add your custom external (.js) file. Example: &lt;script src="yourscript.js"&gt;&lt;/script&gt;', 'aveo' ),
							'type'  => 'textarea',
							'value' => '',
						),
					)
				)
			)
		)
	);
}
