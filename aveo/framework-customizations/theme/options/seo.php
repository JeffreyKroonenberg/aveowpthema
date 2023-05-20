<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( function_exists( 'aveo_tracking_wp_head' ) ) {
	$options = array(
		'seo' => array(
			'title'   => esc_html__( 'SEO', 'aveo' ),
			'type'    => 'tab',
			'options' => array(
				'tracking_code' => array(
					'title'   => esc_html__( 'SEO', 'aveo' ),
					'type'    => 'box',
					'options' => array(
						'head_tracking_code'	=> array(
							'label' => esc_html__( 'Tracking Code (head)', 'aveo' ),
							'desc'  => esc_html__( 'Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing head tag.', 'aveo' ),
							'type'  => 'textarea',
							'value' => '',
						),
						'body_tracking_code'	=> array(
							'label' => esc_html__( 'Tracking Code (body)', 'aveo' ),
							'desc'  => esc_html__( 'Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing body tag.', 'aveo' ),
							'type'  => 'textarea',
							'value' => '',
						),
					)
				),
			)
		)
	);
}
